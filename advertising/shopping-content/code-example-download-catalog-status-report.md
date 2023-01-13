---
title: "Downloading a Catalog Status Report Code Example"
description: "Code sample showing how to download a catalog status report with the Content API."
author: rgaritta
ms.service: "bing-ads-shopping-content"
ms.topic: "article"
ms.author: v-rgaritta

dev_langs: 
  - csharp
  - java
  - python
---
# Downloading a Catalog Status Report Code Example
This example shows how to get the status of product offers that were uploaded to the specified catalog. If offers failed validation or editorial review, the example downloads the report that shows the reasons why the offer failed the review. 

For information about the class used by this example, see [Status](../shopping-content/status-resource.md#status). For information about getting the report, see [How Do I Get the Status of Product Offers?](../shopping-content/how-get-status-product-offers.md)

```csharp
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.IO;
using System.Threading.Tasks;
using System.Net;
using System.Globalization;
using System.IO.Compression;     // Add reference System.IO.Compression.FileSystem
using Content.OAuth;
using Newtonsoft.Json;           // NuGet Json.NET


namespace StatusReport
{
    class Program
    {
        // The client ID and secret that you were given when you
        // registered your application.

        private static string clientId = "<CLIENTIDGOESHERE>";
        private static string clientSecret = "<CLIENTSECRETGOESHERE>";
        private static string storedRefreshToken = "<REFRESHTOKENGOESHERE OR NULL>";
        private static CodeGrantOauth tokens = null;
        private static DateTime tokenExpiration;

        private static string devToken = "<DEVELOPERTOKENGOESHERE>";

        // URI templates used to get resources.
        
        public const string BaseUri = "https://content.api.bingads.microsoft.com/shopping/v9.1";
        public static string BmcUri = BaseUri + "/bmc/{0}";

        // Query string.

        public static string queryString = "?alt=json";

        // Replace with your store ID and catalog ID.

        public static long merchantId = <STOREIDGOESHERE>;
        public static long catalogId = <CATALOGIDGOESHERE>;

        // The path where the compressed report is written to.

        public static string downloadPath = string.Format(@"c:\reports\{0}.zip",
            "Rejection_" + DateTime.Now.ToString("yyyyMMddThhmm"));

        static void Main(string[] args)
        {
            try
            {
                var headers = GetCredentialHeaders();

                // Build URL with query string and store id.

                var url = string.Format(StatusUri + queryString, merchantId, catalogId);

                // Get the catalog's status.

                var status = GetResource(url, headers, typeof(CatalogStatus)) as CatalogStatus;

                PrintCatalogStatus(status, catalogId);
                Console.WriteLine();
            }
            catch (WebException e)
            {
                Console.WriteLine("\n" + e.Message);

                HttpWebResponse response = (HttpWebResponse)e.Response;

                // If the request is bad, the API returns the errors in the 
                // body of the request. For cases where the path may be valid, but
                // the resource does not belong to the user, the API returns not found.

                if (HttpStatusCode.BadRequest == response.StatusCode ||
                    HttpStatusCode.NotFound == response.StatusCode ||
                    HttpStatusCode.InternalServerError == response.StatusCode)
                {
                    using (Stream stream = response.GetResponseStream())
                    {
                        StreamReader reader = new StreamReader(stream);
                        string json = reader.ReadToEnd();
                        reader.Close();

                        try
                        {
                            var errors = JsonConvert.DeserializeObject<ContentError>(json);

                            PrintErrors(errors);
                        }
                        catch (Exception deserializeError)
                        {
                            // This case occurs when the path is not valid.

                            if (HttpStatusCode.NotFound == response.StatusCode)
                            {
                                Console.WriteLine("Path not found: " + response.ResponseUri);
                            }
                            else
                            {
                                Console.WriteLine(deserializeError.Message);
                            }
                        }
                    }
                }
            }
            catch (Exception e)
            {
                Console.WriteLine("\n" + e.Message);
            }
        }

        // Gets the catalog's status.
        
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


        // Prints the catalog's status.
        
        private static void PrintCatalogStatus(CatalogStatus status, long catalogId)
        {
            Console.WriteLine("Catalog {0} Status Report", catalogId);
            Console.WriteLine("Published offers: " + status.PublishedCount);
            Console.WriteLine("Rejected offers: " + status.RejectedCount);

            if (status.RejectedCount > 0)
            {
                var reportPath = GetRejectionReport(status.RejectionReportUrl);
                Console.WriteLine("Report was written to " + reportPath);
            }
        }

        // Gets the rejection report. The report is 
        // named MerchantCatalogReport.csv.
        
        private static string GetRejectionReport(string url)
        {
            DownloadReport(url, downloadPath);
            var reportPath = DecompressZipFile(downloadPath);
            return reportPath;
        }

        // Downloads the rejection report and writes
        // it to the specified folder.
        
        private static void DownloadReport(string uri, string path)
        {
            var request = (HttpWebRequest)WebRequest.Create(uri);
            request.Method = "GET";
            request.Accept = "application/x-zip-compressed";
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

        // Decompresses the report.
        
        private static string DecompressZipFile(String path)
        {
            var fileInfo = new FileInfo(downloadPath);
            var decompressedFileName = fileInfo.Name.Remove(fileInfo.Name.Length - fileInfo.Extension.Length);
            var decompressedPath = fileInfo.Directory.FullName + "\\" + decompressedFileName;
            ZipFile.ExtractToDirectory(downloadPath, decompressedPath);
            return decompressedPath;
        }


        // Print errors.
        
        private static void PrintErrors(ContentError contentError)
        {
            Console.WriteLine("HTTP status code: " + contentError.Error.Code);

            foreach (Error error in contentError.Error.Errors)
            {
                Console.WriteLine("reason: {0}\nmessage: {1}\nlocation type: {2}\nlocation: {3}\n",
                    error.Reason, error.Message, error.LocationType, error.Location);
            }
        }


        // Gets the AuthenticationToken and DeveloperToken headers 
        // that are required to call the API. This example use OAuth
        // instead of using the legacy credentials (username and password).

        private static WebHeaderCollection GetCredentialHeaders()
        {
            // TODO: Add logic to get the logged on user's refresh token 
            // from secured storage. 

            tokens = GetOauthTokens(storedRefreshToken);

            var headers = new WebHeaderCollection();
            headers.Add("AuthenticationToken", tokens.AccessToken);
            headers.Add("DeveloperToken", devToken);

            return headers;
        }

        // Gets the OAuth tokens. If the refresh token doesn't exist, get 
        // the user's consent and a new access and refresh token.
        
        private static CodeGrantOauth GetOauthTokens(string refreshToken)
        {
            CodeGrantOauth auth = null;

            if (string.IsNullOrEmpty(refreshToken))
            {
                auth = new CodeGrantOauth(clientId, clientSecret);
                auth.GetAccessToken();
            }
            else
            {
                auth = new CodeGrantOauth(clientId, clientSecret);
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
    }

    // Reporting classes.

    public class CatalogStatus
    {
        [JsonProperty("catalogId")]
        public ulong CatalogId { get; set; }

        [JsonProperty("publishedCount")]
        public ulong PublishedCount { get; set; }

        [JsonProperty("rejectedCount")]
        public ulong RejectedCount { get; set; }

        [JsonProperty("rejectionReportUrl")]
        public string RejectionReportUrl { get; set; }
    }

    // Classes used to handle errors.
    
    public class Error
    {
        [JsonProperty("location")]
        public string Location { get; set; }

        [JsonProperty("locationType")]
        public string LocationType { get; set; }

        [JsonProperty("domain")]
        public string Domain { get; set; }

        [JsonProperty("message")]
        public string Message { get; set; }

        [JsonProperty("reason")]
        public string Reason { get; set; }
    }

    public class ErrorCollection
    {
        [JsonProperty("code")]
        public string Code { get; set; }

        [JsonProperty("errors")]
        public List<Error> Errors { get; set; }

        [JsonProperty("message")]
        public string Message { get; set; }

    }

    public class ContentError
    {
        [JsonProperty("error")]
        public ErrorCollection Error { get; set; }
    }
}
```

```java
package status.capi.microsoft.com;

import java.io.BufferedInputStream;
import java.io.BufferedOutputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.List;
import java.util.Map;
import java.util.HashMap;
import java.util.Map.Entry;
import java.util.regex.Pattern;
import java.util.zip.*;
import java.time.LocalDateTime;
import java.time.format.DateTimeFormatter;

// Uses Jackson to serialize and deserialize JSON.

import com.fasterxml.jackson.core.JsonParseException;
import com.fasterxml.jackson.databind.JsonMappingException;
import com.fasterxml.jackson.databind.ObjectMapper;


class Catalogs {

	// Jackson object used to serialize and deserialize JSON.

	private static ObjectMapper jsonMapper = new ObjectMapper();

	private static String accessToken = "<accesstokengoeshere>"; 
    public static String devToken = "<devtokengoeshere>"; 

    // URI templates used to get resources.
    
    public static final String BaseUri = "https://content.api.bingads.microsoft.com/shopping/v9.1";
    public static final String BmcUri = BaseUri + "/bmc/%d";


    // Replace with your IDs.
    
    public static long merchantId = <merchantidgoeshere>; 
    public static long catalogId = <catalogidgoeshere>;

    // The path where the uncompressed report is written to.

    public static String downloadPath = "c:\\reports\\";


	// Gets the status of the products in the specified catalog. If any
    // of the products failed editorial review, the example downloads
    // the report.
    
	public static void main(String[] args) throws JsonParseException, JsonMappingException, IOException {

		try {
			Map<String, String> headers = getCredentialHeaders();

            String url = String.format(StatusUri, merchantId, catalogId);
            
            // Get the catalog's status.

            CatalogStatus status = (CatalogStatus) getResource(url, headers, CatalogStatus.class);

            // Prints the status and downloads the report.
            
            printCatalogStatus(status, catalogId);
            System.out.println();
		}
		catch (CapiException e) {
			if (e.getErrors() != null){
	    		printErrors(e.getErrors());
			}
			else
			{
				System.out.println(e.getMessage());
			}
		}
    	catch (IOException e) {
    		System.out.println(e.getMessage());
    	}
		catch (Exception e) {
			System.out.println("\n" + e.getMessage());
		}

	}


	// Get tokens for the authentication headers.
	
    private static Map<String, String> getCredentialHeaders()
    {
        // TODO: Add logic to get the user's OAuth token. 

        Map<String, String> headers = new HashMap<String, String>();
        headers.put("AuthenticationToken", accessToken);
        headers.put("DeveloperToken", devToken);

        return headers;
    }
    

    // Generic method to get a resource from the specified URL.
    
    private static Object getResource(String uri, Map<String, String> headers, Class\<?> type) throws IOException, CapiException 
    {
    	Object resource = null;
    	HttpURLConnection connection = null;
    	URL url;
    	InputStream istream = null;
    	BufferedReader reader = null;
    	final int BUFFER_SIZE = 2048;

    	try {
    		url = new URL(uri);
    		connection = (HttpURLConnection) url.openConnection();

    		connection.setRequestMethod("GET");
    		connection.setRequestProperty("Accept", "application/json");

    		for (Entry\<String, String> header : headers.entrySet())
    		{
    			connection.setRequestProperty(header.getKey(), header.getValue());
    		}

    		connection.setUseCaches(false);

    		int statusCode = connection.getResponseCode();
    		
    		if (statusCode >= HttpURLConnection.HTTP_BAD_REQUEST) {
    			istream = connection.getErrorStream();
    		}
    		else {
    			istream = connection.getInputStream();
    		}
 
    		StringBuffer response = new StringBuffer();
    		reader = new BufferedReader(new InputStreamReader(istream));
    		char[] buffer = new char[BUFFER_SIZE];
    		int len = 0;
    		
    		while ((len = reader.read(buffer)) != -1) {
    			response.append(new String(buffer, 0, len));
    		}

    		System.out.println(response);
    		
    		
    		if (statusCode >= HttpURLConnection.HTTP_BAD_REQUEST) {
    			if (statusCode == HttpURLConnection.HTTP_BAD_REQUEST) {
    	    		ContentError errors = jsonMapper.readValue(response.toString(), ContentError.class);
    				throw new CapiException("Batch request failed.\n", errors.getError().getErrors());
    			}
    			else {
    				throw new CapiException(response.toString());
    			}
    		}

    		resource = jsonMapper.readValue(response.toString(), type);
    	}
    	finally {
    		if (connection != null) {
    			connection.disconnect();
    		}

    		if (reader != null) {
    			reader.close();
    		}

    		if (istream != null) {
    			istream.close();
    		}
    	}

    	return resource;
    }

    // Prints the catalog's status. If a product failed review,
    // downloads the rejection report.
    
    private static void printCatalogStatus(CatalogStatus status, long catalogId) throws IOException, CapiException
    {
        System.out.printf("Catalog %d Status Report\n", catalogId);
        System.out.println("Published offers: " + status.getPublishedCount());
        System.out.println("Rejected offers: " + status.getRejectedCount());

        if (status.getRejectedCount() > 0)
        {
            String reportPath = getRejectionReport(status.getRejectionReportUrl());
            System.out.println("Report was written to " + reportPath);
        }
    }


    // Gets the rejection report. The report is 
    // named MerchantCatalogReport.csv.
    
    private static String getRejectionReport(String url) throws IOException, CapiException
    {
        return downloadReport(url, downloadPath);
    }


    // Downloads the rejection report and writes
    // it to the specified path.
    
    private static String downloadReport(String uri, String path) throws IOException, CapiException
    {
    	HttpURLConnection connection = null;
    	URL url;
    	InputStream istream = null;
    	BufferedReader reader = null;
    	ZipInputStream zipIStream = null;
    	BufferedOutputStream dest = null;
    	String downloadFilePath = null;
    	final int BUFFER_SIZE = 2048;

    	try {
    		url = new URL(uri);
    		connection = (HttpURLConnection) url.openConnection();
    		connection.setRequestMethod("GET");
    		connection.setRequestProperty("Accept", "application/zip");
    		connection.setUseCaches(false);

    		int statusCode = connection.getResponseCode();

    		StringBuffer response = new StringBuffer();

    		if (statusCode >= HttpURLConnection.HTTP_BAD_REQUEST) {
    			istream = connection.getErrorStream();
        		reader = new BufferedReader(new InputStreamReader(istream));
        		char[] buffer = new char[2048];
        		int len = 0;
        		
        		while ((len = reader.read(buffer)) != -1) {
        			response.append(new String(buffer, 0, len));
        		}

				throw new CapiException(response.toString());
			}
    		
   			istream = connection.getInputStream();
    		zipIStream = new ZipInputStream(new BufferedInputStream(istream));
    		
    		// Build the download path.
    		
    		String filename = zipIStream.getNextEntry().getName();
    		String filenameParts[] = filename.split(Pattern.quote("."));
    		DateTimeFormatter formatter = DateTimeFormatter.ofPattern("yyyyMMddhhmmss");
    		String timestamp = LocalDateTime.now().format(formatter);
    		downloadFilePath = path + filenameParts[0] + "_" + timestamp + "." + filenameParts[1];

    		// The download file is ZIP compressed. Uncompress the 
    		// file and write it to the download path.
    		
			System.out.println("\nExtracting: " + filename);
			int len;
			byte buffer[] = new byte[BUFFER_SIZE];
			FileOutputStream ostream = new FileOutputStream(downloadFilePath);
			dest = new BufferedOutputStream(ostream, BUFFER_SIZE);
			
			while ((len = zipIStream.read(buffer,  0, BUFFER_SIZE)) != -1) {
				dest.write(buffer, 0, len);
			}
			dest.flush();
    	}
    	finally {
			if (connection != null) {
				connection.disconnect();
			}
	
			if (reader != null) {
				reader.close();
			}
			
			if (istream != null) {
				istream.close();
			}
			
			if (zipIStream != null) {
				zipIStream.close();
			}
			
			if (dest != null) {
				dest.close();
			}
		}
    	
    	return downloadFilePath;
    }
    
    
    // Print errors.
    
    private static void printErrors(List<Error> errors)
    {
        for (Error error : errors)
        {
            System.out.printf("reason: %s\nmessage: %s\ndomain: %s\n\n",
                error.getReason(), error.getMessage(), error.getDomain());
        }
    }

}


@SuppressWarnings("serial")
class CapiException extends Exception {

	private List<Error> errors = null;
	
	public CapiException(String message) {
		super(message);
	}

	public CapiException(String message, List<Error> errors) {
		super(message);
		this.errors = errors;
	}

	public CapiException(Throwable cause) {
		super(cause);
	}

	public CapiException(String message, Throwable cause) {
		super(message, cause);
	}
	
	public List<Error> getErrors() { return this.errors; }
	public void setErrors(List<Error> value) { this.errors = value; }
}


// Reporting classes.

class CatalogStatus
{
	private long catalogId;
	private long publishedCount;
	private long rejectedCount;
	private String rejectionReportUrl;
	
    public long getCatalogId() { return this.catalogId; }
    public void setCatalogId(long value) { this.catalogId = value; }

    public long getPublishedCount() { return this.publishedCount; }
    public void setPublishedCount(long value) { this.publishedCount = value; }

    public long getRejectedCount() { return this.rejectedCount; }
    public void setRejectedCount(long value) { this.rejectedCount = value; }

    public String getRejectionReportUrl() { return this.rejectionReportUrl; }
    public void setRejectionReportUrl(String value) { this.rejectionReportUrl = value; }
}


//Classes used to handle errors.

class Error
{
	private String location;
	private String locationType;
	private String domain;
	private String message;
	private String reason;
	
public String getLocation() { return this.location; }

public String getLocationType() { return this.locationType; }

public String getDomain() { return this.domain; }

public String getMessage() { return this.message; }

public String getReason() { return this.reason; }
}

class ErrorCollection
{
	private List<Error> errors;
	
public List<Error> getErrors() { return this.errors; }
}


class ContentError
{
	private ErrorCollection error;
	
public ErrorCollection getError() { return this.error; }
}
```

```python
"""Content API Catalog Status Example"""
import json
import zipfile
import os
import requests

BASE_URI = 'https://content.api.bingads.microsoft.com/shopping/v9.1'
BMC_URI = BASE_URI + '/bmc/{0}'

CLIENT_ID = '<CLIENTIDGOESHERE>'
DEV_TOKEN = '<DEVELOPERTOKENGOESHERE>'
MERCHANT_ID = '<STOREIDGOESHERE>'

AUTHENTICATION_TOKEN = '<AUTHENTICATIONTOKENGOESHERE>'

AUTHENTICATION_HEADERS = {'DeveloperToken': DEV_TOKEN, 'AuthenticationToken': AUTHENTICATION_TOKEN}

DOWNLOAD_PATH = "MerchantCatalogReport.zip"

def main():
    """The main entry point of this example"""
    catalog_status = get_catalog_status_report(retrieve_default_catalog()['id'])
    print_json(catalog_status)
    if catalog_status['rejectedCount'] > 0:
        report_path = get_rejection_report(catalog_status['rejectionReportUrl'])
        zipped_report = zipfile.ZipFile(report_path, 'r') # read the zipfile
        zipped_report.extractall('.')
        print('Report was written to ' + os.path.join(os.getcwd(), 'MerchantCatalogReport.csv'))    

def get_rejection_report(rejection_report_url, download_path=DOWNLOAD_PATH):
    """Download rejection report"""
    headers = dict(AUTHENTICATION_HEADERS)
    headers['Accept'] = 'application/x-zip-compressed'
    report_response = requests.get(rejection_report_url, headers)
    report_response.raise_for_status()
    content = report_response.content
    print(content)
    report_file = open(DOWNLOAD_PATH, 'wb')
    report_file.write(content)
    report_file.close()
    return download_path

def retrieve_default_catalog():
    """Retrieve the default catalog"""
    catalogs = list_catalogs()
    for catalog in catalogs:
        if catalog['isDefault']:
            return catalog
    return None

CATALOGS_URI = BMC_URI + "/catalogs"
def list_catalogs():
    """list catalogs for the current merchant"""
    url = CATALOGS_URI.format(MERCHANT_ID)
    response = requests.get(url, headers=AUTHENTICATION_HEADERS)
    response.raise_for_status()
    return json.loads(response.text)['catalogs']

def print_json(obj):
    """Print the object as json"""
    print(json.dumps(obj, sort_keys=True, indent=4, separators=(',', ': ')))

# Main execution
if __name__ == '__main__':
    main()
```
