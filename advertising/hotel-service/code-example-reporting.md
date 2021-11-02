---
title: "Hotel Ads Reporting Code Example"
description: Shows how to request and download a hotel ads report.
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
dev_langs:
  - csharp
---

# Reporting code example

The following example shows how to request a Hotel Ads Performance report, poll for the status of the report, and download the report when it's complete. 

For details about the elements used in this example, see the [reference](../hotel-service/reference.md) section. 

For additional information, see [Hotel Ads Reporting API](../hotel-service/reporting.md). 

This example uses the [CodeGrantFlow code example](../hotel-service/code-example-code-grant-flow.md) to get the access token. For this example to work, you must include CodeGrantFlow example in your project. For other options that you can use to get the OAuth access and refresh tokens, see [Getting Started](../hotel-service/get-started.md). 


```csharp
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading;
using System.Threading.Tasks;
using System.IO;
using System.Net;
using System.Net.Http;
using System.Web;
using System.Timers;
using System.Windows.Forms;  // Add reference; required for CodeGrantFlow
using System.IO.Compression; // Add reference; required for ZIP compression
using Content.OAuth;
using Newtonsoft.Json;       // NuGet Json.NET
using Newtonsoft.Json.Linq;

namespace Reporting
{
    class Program
    {
        // The client ID that you were given when you
        // registered your application. This is a desktop app so there's no secret.

        private static string clientId = "<CLIENTIDGOESHERE>";
        private static string storedRefreshToken = null; 
        private static CodeGrantOauth tokens = null;
        private static DateTime tokenExpiration;

        private static string customerId = "<CUSTOMERIDGOESHERE>"; 
        private static string accountId = "<ACCOUNTIDGOESHERE>";

        private static string BaseUri = "https://partner.api.sandbox.bingads.microsoft.com/Travel/V1";
        private static string ReportJobsTemplate = "/Customers({0})/Accounts({1})/ReportJobs";
        private static string ReportJobTemplate = "/Customers({0})/Accounts({1})/ReportJobs('{2}')";

        private static WebHeaderCollection headers = null;
        private static string jobId = null;
        private static string downloadUrl = null;

        // The extension you use depends of the requested format and whether you requested compression.
        // This example downloads a report in uncompressed CSV format so the file's extension is .csv.
        // If you request compression, use .zip.

        public static string downloadPath = string.Format(@"c:\reports\{0}.csv",
            "Performance_" + DateTime.Now.ToString("yyyyMMddThhmm"));


        // You can optionally pass the ID of a previous report job.

        static void Main(string[] args)
        {
            try
            {
                tokens = GetOauthTokens(storedRefreshToken);

                if (tokens.AccessToken != null)
                {
                    if (args.Length == 1)  // Passed report job ID
                    {
                        jobId = args[0];
                    }
                    else
                    {
                        jobId = RequestReport();
                    }

                    downloadUrl = GetReportJobStatus(jobId);

                    if (null != downloadUrl)
                    {
                        DownloadReport(downloadUrl, downloadPath);
                        var reportPath = DecompressReport(downloadPath);  // Include if you use compression
                        Console.WriteLine("Report downloaded to: " + reportPath);  // Include if you use compression
                    }
                }
            }
            catch (WebException e)
            {
                HttpWebResponse response = (HttpWebResponse)e.Response;

                Console.WriteLine("\nHTTP status: " + response.StatusCode);
                Console.WriteLine("\n" + e.Message);

                // If the request is bad, the API returns the errors in the 
                // body of the response. 

                if (response != null &&
                    (HttpStatusCode.BadRequest == response.StatusCode))
                {
                    using (Stream stream = response.GetResponseStream())
                    {
                        StreamReader reader = new StreamReader(stream);
                        string json = reader.ReadToEnd();
                        reader.Close();

                        var collection = JsonConvert.DeserializeObject<CollectionResponse>(json);

                        PrintErrors(collection.value);
                    }
                }
            }
            catch (Exception e)
            {
                Console.WriteLine("\n" + e.Message);
            }
        }


        private static string RequestReport()
        {
            headers = new WebHeaderCollection();
            headers.Add(HttpRequestHeader.Authorization, "Bearer " + tokens.AccessToken);

            Console.WriteLine("**** Request a report with the following parameters: ****\n");

            // Must specify at least one dimension column and one measure column.

            var columns = new List<string>();
            columns.Add(PerformanceColumn.Date.ToString());
            columns.Add(PerformanceColumn.SubAccountId.ToString());
            columns.Add(PerformanceColumn.HotelGroupId.ToString());
            columns.Add(PerformanceColumn.Clicks.ToString());
            columns.Add(PerformanceColumn.CTR.ToString());
            columns.Add(PerformanceColumn.Impressions.ToString());
            columns.Add(PerformanceColumn.SpendUSD.ToString());
            columns.Add(PerformanceColumn.UserCountry.ToString());


            var job = new ReportJob()
            {
                // Required parameters

                ReportType = ReportType.Performance.ToString(),
                StartDate = DateTime.UtcNow.AddDays(-30).ToString("yyyy-MM-dd"),  // today minus 30 days
                EndDate = DateTime.UtcNow.ToString("yyyy-MM-dd"),
                Columns = columns,

                // Optional parameters

                //Format = ReportFormat.Csv.ToString(),
                //Compression = CompressionType.Zip.ToString(),
                //Filter = "DeviceType eq Enum.DeviceType'Desktop' or DeviceType eq Enum.DeviceType'Tablet'"
            };

            PrintReportParameters(job);

            var uri = string.Format(BaseUri + ReportJobsTemplate, customerId, accountId);
            jobId = AddResource(uri, headers, job, typeof(ReportJob));

            return jobId;
        }


        private static string GetReportJobStatus(string jobId)
        {
            headers = new WebHeaderCollection();
            headers.Add(HttpRequestHeader.Authorization, "Bearer " + tokens.AccessToken);

            Console.WriteLine("**** Get the status of report job {0} ****\n", jobId);

            var uri = string.Format(BaseUri + ReportJobTemplate, customerId, accountId, jobId);
            ReportJob pollJob = null;

            // Poll for the status of the report job every 5 seconds. Try getting 
            // the status up to five times until the job completes or fails. If 
            // the job doesn't complete or fail in five attempts (~25 seconds), give up
            // and try again later.

            for (int i = 0; i < 5; i++)
            {
                pollJob = GetResource(uri, headers, typeof(ReportJob)) as ReportJob;

                Console.WriteLine($"Status: {pollJob.Status}");

                if (pollJob.Status == ReportJobStatus.Completed.ToString() ||
                    pollJob.Status == ReportJobStatus.Failed.ToString())
                {
                    if (pollJob.Status == ReportJobStatus.Completed.ToString())
                    {
                        downloadUrl = pollJob.Url;
                    }

                    break;
                }

                Thread.Sleep(5000);
            }

            if (null == downloadUrl)
            {
                if (pollJob.Status != ReportJobStatus.Failed.ToString())
                {
                    Console.WriteLine("The report job is taking longer than expected. Use the ID ({0}) later to check the report's status.", jobId);
                }
                else
                {
                    // Consider getting the X-MS-RequestId header from the response and printing it.
                    // Providing the request ID to support will help track down the issue.

                    Console.WriteLine("The job failed. Try again and if it fails again, contact support.");
                }
            }

            return downloadUrl;
        }


        // Gets the status of the report job.

        private static object GetResource(string uri, WebHeaderCollection headers, Type resourceType)
        {
            object resource = null;
            var request = (HttpWebRequest)WebRequest.Create(uri);
            request.Method = "GET";
            request.Headers = headers;
            request.Accept = "application/json";
            var response = (HttpWebResponse)request.GetResponse();

            using (Stream responseStream = response.GetResponseStream())
            {
                var reader = new StreamReader(responseStream);
                string json = reader.ReadToEnd();
                reader.Close();
                resource = JsonConvert.DeserializeObject(json, resourceType);
            }

            return resource;
        }


        // Adds the report job.

        private static string AddResource(string uri, WebHeaderCollection headers, object resource, Type type)
        {
            var request = (HttpWebRequest)WebRequest.Create(uri);
            request.Method = "POST";
            request.Headers = headers;
            request.ContentType = "application/json";

            var serializerSettings = new JsonSerializerSettings();
            serializerSettings.NullValueHandling = NullValueHandling.Ignore;

            var json = JsonConvert.SerializeObject(resource, type, serializerSettings);
            request.ContentLength = json.Length;
            using (Stream requestStream = request.GetRequestStream())
            {
                StreamWriter writer = new StreamWriter(requestStream);
                writer.Write(json);
                writer.Close();
            }

            var response = (HttpWebResponse)request.GetResponse();

            AddResponse addResponse = null;

            using (Stream responseStream = response.GetResponseStream())
            {
                var reader = new StreamReader(responseStream);
                var jsonOut = reader.ReadToEnd();
                reader.Close();
                addResponse = JsonConvert.DeserializeObject<AddResponse>(jsonOut);
            }

            return addResponse.value;
        }



        // Prints the report's parameters.

        private static void PrintReportParameters(ReportJob job)
        {
            Console.WriteLine("Report type: " + job.ReportType);
            Console.WriteLine("Start date: " + job.StartDate);
            Console.WriteLine("End date: " + job.EndDate);

            Console.WriteLine("Columns:");
            foreach (var column in job.Columns)
            {
                Console.WriteLine("\t" + column);
            }

            Console.WriteLine("Format: " + (job.Format ?? "default CSV"));
            Console.WriteLine("Compression: " + (job.Compression ?? "uncompressed"));
            Console.WriteLine("Filter: " + (job.Filter ?? "none"));

            Console.WriteLine("Subaccount ID: " + job.SubaccountId ?? "");
            Console.WriteLine("Hotel group ID: " + job.HotelGroupId ?? "");

            Console.WriteLine("Status: " + job.Status);
            Console.WriteLine("Download URL: " + job.Url ?? "");

            Console.WriteLine();
        }


        // Gets the OAuth tokens. If the refresh token doesn't exist, get 
        // the user's consent and a new access and refresh token.

        private static CodeGrantOauth GetOauthTokens(string refreshToken)
        {
            CodeGrantOauth auth = null;

            if (string.IsNullOrEmpty(refreshToken))
            {
                auth = new CodeGrantOauth(clientId);
                auth.GetAccessToken();
            }
            else
            {
                auth = new CodeGrantOauth(clientId);
                auth.RefreshAccessToken(refreshToken);

                // Refresh tokens can become invalid for several reasons
                // such as the user's password changed.

                if (!string.IsNullOrEmpty(auth.Error))
                {
                    auth = GetOauthTokens(null);
                }
            }

            // TODO: Store the new refresh token in secured storage
            // for the logged on user.

            storedRefreshToken = auth.RefreshToken;
            tokenExpiration = DateTime.Now.AddSeconds(auth.Expiration);

            return auth;
        }

        private static void PrintErrors(List<object> errors)
        {
            foreach (var error in errors)
            {
                var e = ((JObject)error).ToObject<AdsApiError>();

                Console.WriteLine("\nError code: " + e.Code);
                Console.WriteLine("Error message: " + e.Message);
                Console.WriteLine("Error parameter: " + e.Property);
            }
        }


        // Download the report to the specified local file.

        private static void DownloadReport(string uri, string path)
        {
            var request = (HttpWebRequest)WebRequest.Create(uri);
            request.Method = "GET";
            //request.Accept = "application/zip";  // Include if you request compression
            var response = (HttpWebResponse)request.GetResponse();

            var fileInfo = new FileInfo(path);
            if (fileInfo.Directory != null && !fileInfo.Directory.Exists)
            {
                fileInfo.Directory.Create();
            }

            var bufferSize = 100 * 1024;
            var fileStream = new FileStream(fileInfo.FullName, FileMode.Create, FileAccess.Write, FileShare.None, bufferSize);

            using (BinaryReader reader = new BinaryReader(response.GetResponseStream()))
            {
                using (BinaryWriter writer = new BinaryWriter(fileStream))
                {
                    while (true)
                    {
                        byte[] buffer = reader.ReadBytes(bufferSize);
                        writer.Write(buffer);
                        if (buffer.Length != bufferSize)
                        {
                            break;
                        }
                    }
                }
            }

            fileStream.Close();
        }

        // Decompresses the report. Include if you use compression.

        private static string DecompressReport(String path)  
        {
            var fileInfo = new FileInfo(downloadPath);
            var decompressedFileName = fileInfo.Name.Remove(fileInfo.Name.Length - fileInfo.Extension.Length);
            var decompressedPath = fileInfo.Directory.FullName + "\\" + decompressedFileName;
            ZipFile.ExtractToDirectory(downloadPath, decompressedPath);
            return decompressedPath;
        }

    }


    // Defines the report job.

    class ReportJob
    {
        // Contains the ID of the report job.
        public string Id { get; set; }

        // The list of columns to include in the report.
        public List<string> Columns { get; set; }

        // The compression algorithm to apply to the report.
        public string Compression { get; set; }

        // The format of the report's contents.
        public string Format { get; set; }

        // The report's type.
        public string ReportType { get; set; }

        // The start date of the reporting period.
        public string StartDate { get; set; }

        // The end date of the reporting period.
        public string EndDate { get; set; }

        // The OData filter string to apply to the report data.
        public string Filter { get; set; }

        // The subaccount to scope the report to.
        public string SubaccountId { get; set; }

        // The hotel group within SubaccountId to scope the report to.
        public string HotelGroupId { get; set; }

        // The status of the report job.
        public string Status { get; set; }

        // The URL that you use to download the report.
        public string Url { get; set; }
    }


    // Defines the possible column names for the Performance report.

    enum PerformanceColumn
    {
        Date,
        DeviceType,
        SubAccountId,
        SubAccountName,
        HotelGroupId,
        HotelGroupName,
        HotelId,
        HotelName,
        PartnerHotelId,
        LengthOfStay,
        HotelCountry,
        UserCountry,
        SlotType,
        Clicks,
        CTR,
        Impressions,
        Spend,
        AverageCPC,
        AveragePosition,
        AverageSlotPosition
    }


    // Defines the possible compression algorithms to apply to the report.
    // Currently not supported.

    enum CompressionType
    {
        Zip
    }


    // Defines the possible report formats.

    enum ReportFormat
    {
        Csv
    }

    
    // Defines the possible report types.

    enum ReportType
    {
        Performance
    }


    // Defines the possible report job status values.

    enum ReportJobStatus
    {
        Completed,
        Failed,
        InProgress,
        PendingExecution
    }


    // Defines the response object that POSTs return when
    // you add a resource.

    class AddResponse
    {
        // Contains the ID of the newly added resource (report job).

        public string value { get; set; }

    }


    // Defines the response object if the report request returns errors.

    class CollectionResponse
    {
        // Contains the list of errors.

        public List<object> value { get; set; }

    }



    // Defines the error object that an HTTP status code 400 includes in the
    // response body. 

    class AdsApiError
    {
        public string Code { get; set; }
        public string Message { get; set; }
        public string Property { get; set; }
    }

}
```
