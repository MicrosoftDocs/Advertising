---
title: "Batch Processing Code Example"
description: Shows how to use batch processing to send multiple requests in a single HTTP request.
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
dev_langs:
  - csharp
---

# Batch processing code example

The following example shows how to create a batch request to update multiple hotels. 

For details about the elements used in this example, see the [reference](../hotel-service/reference.md) section. 

For additional information, see [Batch processing](manage-hotel-campaigns.md#batch-processing). 

The example does not include calls to get the OAuth access and refresh tokens. For options in getting the tokens, see [Getting Started](../hotel-service/get-started.md). For a simple example that shows how to get an OAuth access and refresh token in C#, see [Call CodeGrantflow example](../hotel-service/code-example-call-code-grant-flow.md).


```csharp
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.IO;
using System.Net;
using System.Net.Http;
using System.Web;
using System.Windows.Forms;  // Add reference; required for Content.OAuth
using Content.OAuth;
using Newtonsoft.Json;       // NuGet Json.NET
using Newtonsoft.Json.Linq;

namespace BatchHotelUpdate
{
    class Program
    {
        // The client ID and secret that you were given when you
        // registered your application.

        private static string clientId = "<clientidgoeshere>";
        private static string storedRefreshToken = "<refreshtokengoeshere>"; // or set to null to force credential refresh;
        private static CodeGrantOauth tokens = null;
        private static DateTime tokenExpiration;

        private static string customerId = "<customeridgoeshere>";
        private static string accountId = "<accountidgoeshere>";
        private static string subaccountId = "<subaccountidgoeshere>";
        private static string hotelGroupId = "<hotelgroupidgoeshere>";

        private static string Host = "partner.api.sandbox.bingads.microsoft.com";
        private static string BaseUri = "https://" + Host + "/Travel/V1/";
        private static string BatchTemplate = "$batch";
        private static string HotelTemplate = "Customers({0})/Accounts({1})/SubAccounts('{2}')/HotelGroups('{3}')/Hotels('{4}')";

        private const string CRLF = "\r\n";
        private static string BoundaryTemplate = "batch_{0}";
        private static string StartBoundaryTemplate = "--{0}";
        private static string EndBoundaryTemplate = "--{0}--";

        private const string BATCH_REQUEST_HEADERS = "Content-Type: application/http" + CRLF + "Content-Transfer-Encoding: binary" + CRLF + CRLF;
        private const string BATCH_CALL_PATCH_HEADERS = "Content-Type: application/json; odata.metadata=minimal" + CRLF;
        private static string BatchCallTemplate = "{0} {1} HTTP/1.1" + CRLF; // {0} = verb, {1} = uri template
        private static string BatchCallHost = "Host: " + Host + CRLF + CRLF;

        const string OK = "200";
        const string NO_CONTENT = "204";
        const string BAD_REQUEST = "400";
        const string SERVER_ERROR = "500";


        static void Main(string[] args)
        {
            try
            {
                // TODO: Add the calls to the OAuth code that you use to get the access and 
                // refresh tokens. Consider using the Bing Ads SDK to get the tokens.

                tokens = GetOauthTokens(storedRefreshToken);

                if (tokens.AccessToken != null)
                {
                    var headers = new WebHeaderCollection();
                    headers.Add(HttpRequestHeader.Authorization, "Bearer " + tokens.AccessToken);

                    // Build batch request. The request may contain a maximum of 500 items.
                    // Batch processing does not support change sets.

                    // This example updates the price of the specified hotels.

                    var hotelIds = new[] { "<hotelidgoeshere>", "<hotelidgoeshere>", "<hotelidgoeshere>" };
                    var boundary = string.Format(BoundaryTemplate, Guid.NewGuid());
                    var requestBody = BuildBatchRequest(hotelIds, 1.75, boundary);

                    // Send batch request

                    var uri = string.Format(BaseUri + BatchTemplate);
                    var responseBody = PostBatchRequest(uri, headers, requestBody, boundary); 

                    var batchResponse = ParseBatchResponse(responseBody);

                    // Check the status of each item in the batch response.
                    // Items in batch response correspond directly to items in request.

                    foreach (var item in batchResponse.BatchItems)
                    {
                        if (item.Status == NO_CONTENT)
                        {
                            Console.WriteLine("The hotel was successfully updated.\n");
                        }
                        else if (item.Status == BAD_REQUEST)
                        {
                            Console.WriteLine("The request is malformed or the resource does not exist.\n");
                            PrintErrors(((ErrorResponse)item.Content).value);
                            Console.WriteLine();
                        }
                        else
                        {
                            Console.WriteLine("Request failed with status code: " + item.Status);
                            Console.WriteLine("Tracking ID: " + batchResponse.TrackingId);
                            Console.WriteLine("Request ID: " + batchResponse.RequestId + "\n");
                        }
                    }
                }

            }
            catch (WebException e)
            {
                HttpWebResponse response = (HttpWebResponse)e.Response;

                Console.WriteLine("\nHTTP status: " + response.StatusCode);
                Console.WriteLine("\n" + e.Message);

                // If the request is bad, the API returns the errors in the 
                // body of the request. 

                if (response != null &&
                    (HttpStatusCode.BadRequest == response.StatusCode))
                {
                    using (Stream stream = response.GetResponseStream())
                    {
                        StreamReader reader = new StreamReader(stream);
                        string json = reader.ReadToEnd();
                        reader.Close();

                        var collection = JsonConvert.DeserializeObject<ErrorResponse>(json);

                        PrintErrors(collection.value);
                    }
                }
            }
            catch (Exception e)
            {
                Console.WriteLine("\n" + e.Message);
            }
        }


        // Sends the batch request

        private static HttpWebResponse PostBatchRequest(string uri, WebHeaderCollection headers, string requestBody, string boundary)
        {
            var request = (HttpWebRequest)WebRequest.Create(uri);
            request.Method = "POST";
            request.Headers = headers;
            request.ContentType = "multipart/mixed; boundary=" + boundary;

            request.ContentLength = requestBody.Length;
            using (Stream requestStream = request.GetRequestStream())
            {
                StreamWriter writer = new StreamWriter(requestStream);
                writer.Write(requestBody);
                writer.Close();
            }

            return (HttpWebResponse)request.GetResponse();
        }


        // Builds each item in the batch request.

        private static string BuildBatchRequest(string[] hotelIds, double newPrice, string boundary)
        {
            var requestBody = "";
            var startBoundary = string.Format(StartBoundaryTemplate, boundary);
            var endBoundary = string.Format(EndBoundaryTemplate, boundary);
            var serializerSettings = new JsonSerializerSettings();
            serializerSettings.NullValueHandling = NullValueHandling.Ignore;


            // Update the fixed bids of all hotels to the newPrice value

            for (var i = 0; i < hotelIds.Length; i++)
            {

                // Start of batch item for UPDATE SINGLE HOTEL GROUP
                // Specify only the fields of the hotel group that you want to update.

                var hotel = new Hotel()
                {
                    Id = hotelIds[i],
                    Bid = new FixedBid()
                    {
                        Amount = newPrice,
                        type = "#Model.FixedBid"
                    },
                };

                requestBody += startBoundary + CRLF;
                requestBody += BATCH_REQUEST_HEADERS;

                requestBody += string.Format(BatchCallTemplate,
                    "PATCH",
                    string.Format(HotelTemplate, customerId, accountId, subaccountId, hotelGroupId, hotelIds[i]));

                requestBody += BATCH_CALL_PATCH_HEADERS;
                requestBody += BatchCallHost;
                requestBody += JsonConvert.SerializeObject(hotel, typeof(Hotel), serializerSettings);
                requestBody += CRLF + CRLF;

                // End of batch item
            }

            requestBody += endBoundary + CRLF;

            return requestBody;
        }


        // Get each item in the batch response.
        // Also get the tracking and request ID for the request in case something goes wrong.

        private static BatchResponse ParseBatchResponse(HttpWebResponse response)
        {
            var batchResponse = new BatchResponse();
            batchResponse.BatchItems = new List<BatchItem>();

            var responseBody = GetResponseBody(response);
            var responseHeaders = GetResponseHeaderValues(response);  

            batchResponse.RequestId = responseHeaders["requestId"];
            batchResponse.TrackingId = responseHeaders["trackingId"];

            var extractredItems = ParseBoundaryItems(responseBody, responseHeaders["boundary"]);

            foreach (var item in extractredItems)
            {
                var batchItem = ParseBatchItem(item);
                batchResponse.BatchItems.Add(batchItem);
            }

            return batchResponse;
        }

        // Get the body of the response, which contains the batch items.

        private static string GetResponseBody(HttpWebResponse response)
        {
            string responseBody = null;

            using (Stream responseStream = response.GetResponseStream())
            {
                var reader = new StreamReader(responseStream);
                responseBody = reader.ReadToEnd();
                reader.Close();
            }

            return responseBody;
        }

        // Get the response's tracking and request IDs
        // And get the boundary ID used to parse the batch items.

        private static Dictionary<string, string> GetResponseHeaderValues(HttpWebResponse response)
        {
            Dictionary<string, string> headerValues = new Dictionary<string, string>();

            headerValues.Add("boundary", ParseContentType(response.ContentType));
            headerValues.Add("requestId", response.GetResponseHeader("x-ms-requestid"));
            headerValues.Add("trackingId", response.GetResponseHeader("x-ms-trackingid"));

            return headerValues;
        }

        // Get the boundary ID from the response's Content-Type header.

        private static string ParseContentType(string value)
        {
            const string BOUNDARY_LITERAL = "boundary=";
            var idx = value.IndexOf(BOUNDARY_LITERAL);
            return value.Substring(idx + BOUNDARY_LITERAL.Length);
        }


        // Get each batch item from the response using the boundary ID.

        private static List<string> ParseBoundaryItems(string body, string boundary)
        {
            List<string> items = new List<string>();
            int idx = 0, startIdx = 0, endIdx = 0;
            var startBoundary = "--" + boundary;
            var endBoundary = "--" + boundary + "--";
            var reachedEnd = false;

            while ((idx = body.IndexOf(startBoundary, startIdx)) >= 0 && !reachedEnd)
            {
                endIdx = body.IndexOf(startBoundary, idx + startBoundary.Length); 
                items.Add(body.Substring(idx, endIdx - idx));
                startIdx = endIdx;

                if (endBoundary.Equals(body.Substring(endIdx, endBoundary.Length)))
                {
                    reachedEnd = true;
                }
            }

            return items;
        }


        // Get the results of a batch item. This includes the HTTP status,
        // tracking and request IDs, and any response object. For this example,
        // an item contains JSON only if there was an error updating the hotel.

        private static BatchItem ParseBatchItem(string item)
        {
            var batchItem = new BatchItem();


            batchItem.Status = ParseStatusCode(item);

            if (batchItem.Status == OK || batchItem.Status == BAD_REQUEST)
            {
                batchItem.TrackingId = ParseHeader(item, "x-ms-trackingid: ");
                batchItem.RequestId = ParseHeader(item, "x-ms-requestid: ");
                batchItem.Content = ParseJson(item, batchItem.Status);
            }

            return batchItem;
        }


        // Get the batch item's HTTP status code.

        private static string ParseStatusCode(string item)
        {
            const string HTTP = "HTTP/1.1 ";
            var idx = item.IndexOf(HTTP);
            return item.Substring(idx + HTTP.Length, 3);
        }


        // Get the specified header value from the batch item.

        private static string ParseHeader(string item, string headerName)
        {
            var idx = item.IndexOf(headerName);
            var endIdx = item.IndexOf(CRLF, idx + headerName.Length);
            return item.Substring(idx + headerName.Length, endIdx - (idx + headerName.Length));
        }


        // Get the contents of the batch item's body. For this example, the only
        // time the item would contain content is if an error occurred.

        private static object ParseJson(string item, string status)
        {
            object resource = null;

            if (status == BAD_REQUEST)
            {
                var idx = item.IndexOf("{");
                var endIdx = item.LastIndexOf("}");
                var json = item.Substring(idx, endIdx + 1 - idx);

                resource = JsonConvert.DeserializeObject(json, typeof(ErrorResponse));
            }

            return resource;
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


        private static void PrintErrors(List<AdsApiError> errors)
        {
            foreach (var error in errors)
            {
                Console.WriteLine("\tError code: " + error.Code);
                Console.WriteLine("\tError message: " + error.Message);
                Console.WriteLine("\tError parameter: " + error.Property);
            }
        }
    }
}



// Defines a hotel.

class Hotel
{
    public string Id { get; set; }

    public string Name { get; set; }

    public string Status { get; set; }

    public object Bid { get; set; }

    public List<object> BidMultipliers { get; set; }

    public string BidSource { get; set; }

    public string BidMultiplierSource { get; set; }

    public string CountryCode { get; set; }

    public string PartnerHotelId { get; set; }
}

// Defines a daily budget that spread throughout the day.

class Budget
{
    public double Amount { get; set; }
}

// Defines the base bid class. Do not create this object. Instead
// create either the FixedBid or PercentageBid object.

class Bid
{
    public double Amount { get; set; }

    [JsonProperty("@odata.type")]
    public string type { get; set; }

    public string GetBidType()
    {
        return type.Substring(type.LastIndexOf('.') + 1);
    }
}

// Defines a fixed bid.

class FixedBid : Bid
{
}

// Defines a bid that's a percentage of the hotel's room rate.

class PercentageBid : Bid
{
}

// Defines the base multiplier class. Do not create this object. Instead
// create one of the derived multiplier classes (for example, the 
// UserCountryMultiplier class).

class Multiplier
{
    public double Factor { get; set; }

    [JsonProperty("@odata.type")]
    public string type { get; set; }

    public string GetMultiplierType()
    {
        return type.Substring(type.LastIndexOf('.') + 1);
    }
}

// Defines the multiplier to use if the user is located in the specified country.

class UserCountryMultiplier : Multiplier
{
    public List<string> Countries { get; set; }
}

// Defines the multiplier to use if the user is searching on the specified Bing site.

class SiteMultiplier : Multiplier
{
    public List<string> Sites { get; set; }
}

// Defines the multiplier to use if the user is using the specified device.

class DeviceTypeMultiplier : Multiplier
{
    public List<string> DeviceTypes { get; set; }
}

// Defines the multiplier to use if the user is staying the specified 
// minimum number of nights.

class LengthOfStayMultiplier : Multiplier
{
    public int MinimumNumberOfNights { get; set; }
}

// Defines the multiplier to use if the user is booking the specified 
// number of days in advance.

class AdvanceWindowBookingMultiplier : Multiplier
{
    public int MinimumNumberOfDays { get; set; }
}

// Defines the multiplier to use if the user is checking in on
// the specified week day.

class CheckInDayOfWeekMultiplier : Multiplier
{
    public List<string> DaysOfWeek { get; set; }
}

// Defines the multiplier to use if the user specified check-in
// and check-out dates as part of the search.

class DateTypeMultiplier : Multiplier
{
    public string DateType { get; set; }
}




class ErrorResponse
{
    // Contains the list of error objects.

    public List<AdsApiError> value { get; set; }


    [JsonProperty("@odata.count")]
    public UInt32 count { get; set; }
}

// Defines the error object that an HTTP status code 400 includes in the
// response body. A 200 /Associate response may also include this object 
// as part of the HotelAssociation object if the association fails
// (see the Errors field). 

class AdsApiError
{
    public string Code { get; set; }
    public string Message { get; set; }
    public string Property { get; set; }
}


class BatchResponse
{
    public string RequestId { get; set; }

    public string TrackingId { get; set; }

    public List<BatchItem> BatchItems { get; set; }
}


class BatchItem
{
    public string Status { get; set; }

    public string RequestId { get; set; }

    public string TrackingId { get; set; }

    public Type Type { get; set; }

    public object Content { get; set; }
}

```


