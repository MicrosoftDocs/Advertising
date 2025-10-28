---
title: "Updating pricing and availability for a single product"
description: "Code example that shows how to update price and availability for a single product."
author: jonmeyers
ms.service: "bing-ads"
ms.subservice: "shopping-content"
ms.topic: "article"
ms.author: jonmeyers
ms.date: 11/13/2024
dev_langs: 
  - csharp
---

# Update pricing and availability for a single product

This desktop console example shows how to use the [Inventory](inventory-resource.md) resource to update pricing and availability for a single product. For information about working with the Inventory resource, see [Manage product pricing](manage-product-pricing.md).

```csharp
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.IO;
using System.Threading.Tasks;
using System.Net;
using Content.OAuth;             // Reference to CodeGrantFlow DLL simple OAuth example
using Newtonsoft.Json;           // NuGet Json.NET
using System.Globalization;

namespace Catalogs
{
    class Program
    {
        // The application ID that you were given when you
        // registered your application.

        private static string clientId = "<APPLICATIONIDGOESHERE>";
        private static string storedRefreshToken = "<REFRESHTOKENGOESHERE>";
        private static CodeGrantOauth tokens = null;
        private static DateTime tokenExpiration;

        private static string devToken = "<DEVELOPERTOKENGOESHERE>";

        private static string storeCode = "online";
        private static string productId = "<PRODUCTIDGOESHERE>";

        // URI templates used to update product pricing.

        public const string BaseUri = "https://content.api.bingads.microsoft.com/shopping/v9.1";
        public static string BmcUri = BaseUri + "/bmc/{0}";
        public static string InventorySetUri = BmcUri + "/inventory/{1}/products/{2}";

        // Your store ID.

        public static ulong merchantId = <STOREIDGOESHERE>;

        // Suppress NULL when serializing objects.

        public static JsonSerializerSettings jsonSettings = new JsonSerializerSettings()
        { NullValueHandling = NullValueHandling.Ignore };


        static void Main(string[] args)
        {
            try
            {
                var headers = GetCredentialHeaders();

                // Build the inventory endpoint.

                var url = string.Format(InventorySetUri, merchantId, storeCode, productId);

                // Create a product. Must specify both price and availability.
                // May also set sale price and effective date. If missing,
                // sale price and effective data are removed.

                var product = new Product()
                {
                    Price = new Price()
                    {
                        Value = 1234,
                        Currency = "USD"
                    },
                    Availability = "out of stock"
                };

                // Update the product's price and availability. The response
                // body is empty. The Location response header contains the URL
                // of the product that was updated. 

                var response = AddResource(url, headers, product);
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

                        // Deserialize error string into errors object.

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


        // Update a product's pricing and availability.

        private static Product AddResource(string uri, WebHeaderCollection headers, Product product)
        {
            var request = (HttpWebRequest)WebRequest.Create(uri);
            request.Method = "POST";
            request.Headers = headers;
            request.ContentType = "application/json";

            var json = JsonConvert.SerializeObject(product, jsonSettings);
            request.ContentLength = json.Length;
            using (Stream requestStream = request.GetRequestStream())
            {
                StreamWriter writer = new StreamWriter(requestStream);
                writer.Write(json);
                writer.Close();
            }

            var response = (HttpWebResponse)request.GetResponse();

            Product productOut = null;

            using (Stream responseStream = response.GetResponseStream())
            {
                var reader = new StreamReader(responseStream);
                var jsonOut = reader.ReadToEnd();
                reader.Close();
                productOut = JsonConvert.DeserializeObject<Product>(jsonOut);
            }

            return productOut;
        }


        // Print errors.

        private static void PrintErrors(ContentError contentError)
        {
            Console.WriteLine("HTTP status code: " + contentError.Error.Code);

            foreach (Error error in contentError.Error.Errors)
            {
                Console.WriteLine("reason: {0}\nmessage: {1}\n",
                    error.Reason, error.Message);
            }
        }


        // Gets the AuthenticationToken and DeveloperToken headers 
        // that are required to call the API. 

        private static WebHeaderCollection GetCredentialHeaders()
        {
            // TODO: Add logic to get the logged on user's refresh token 
            // from secured storage. 

            tokens = GetOauthTokens(storedRefreshToken, clientId);

            var headers = new WebHeaderCollection();
            headers.Add("AuthenticationToken", tokens.AccessToken);
            headers.Add("DeveloperToken", devToken);

            return headers;
        }

        // Gets the OAuth tokens. If the refresh token doesn't exist, get 
        // the user's consent and a new access and refresh token.

        private static CodeGrantOauth GetOauthTokens(string refreshToken, string clientId)
        {
            CodeGrantOauth auth = new CodeGrantOauth(clientId);

            if (string.IsNullOrEmpty(refreshToken))
            {
                auth.GetAccessToken();
            }
            else
            {
                auth.RefreshAccessToken(refreshToken);

                // Refresh tokens can become invalid for several reasons
                // such as the user's password changed.

                if (!string.IsNullOrEmpty(auth.Error))
                {
                    auth = GetOauthTokens(null, clientId);
                }
            }

            // TODO: Store the new refresh token in secured storage
            // for the logged on user.

            if (!string.IsNullOrEmpty(auth.Error))
            {
                throw new Exception(auth.Error);
            }
            else
            {
                storedRefreshToken = auth.RefreshToken;
                tokenExpiration = DateTime.Now.AddSeconds(auth.Expiration);
            }

            return auth;
        }
    }
}


// Classes used to update a product's price and availability.

public class Price
{
    [JsonProperty("currency")]
    public string Currency { get; set; }

    [JsonProperty("value")]
    public decimal? Value { get; set; }
}

// The product fields you may update. Price and
// availability are required and sale price and
// effective date are optional.

public class Product
{
    public Product() { }

    [JsonProperty("availability")]
    public string Availability { get; set; }

    [JsonProperty("price")]
    public Price Price { get; set; }


    [JsonProperty("salePrice")]
    public Price SalePrice { get; set; }

    [JsonProperty("salePriceEffectiveDate")]
    public string SalePriceEffectiveDate { get; set; }
}


// Classes used to handle errors.

public class Error
{
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
```
