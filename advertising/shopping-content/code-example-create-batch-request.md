---
title: "Creating a Batch Request Code Example"
description: "Code samples showing how to create a batch request with the Content API."
author: eric-urban
ms.service: "bing-ads-shopping-content"
ms.topic: "article"
ms.author: eur

dev_langs: 
  - csharp
  - java
  - python
---

# Creating a Batch Request Code Example
This example shows how to create a batch request that can contain thousands of insert, get, and delete operations. 

For information about the batch-related classes used by this example, see [Batch](../shopping-content/products-resource.md#batch), [Item](../shopping-content/products-resource.md#item), and [BatchItemError](../shopping-content/products-resource.md#batchitemerror). For information about using the batch feature, see [Using batch processing](../shopping-content/manage-products.md#batch).

```csharp
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.IO;
using System.IO.Compression;
using System.Threading.Tasks;
using System.Net;
using Content.OAuth;
using Newtonsoft.Json;           // NuGet Json.NET

namespace Batch
{
    class Program
    {
        // The client ID and secret that you were given when you
        // registered your application.

        private static string clientId = "<CLIENTIDGOESHERE>";
        private static string clientSecret = "<CLIENTSECRETGOESHERE>";
        private static string storedRefreshToken = "<REFRESHTOKENGOESHERE OR NULL";
        private static CodeGrantOauth tokens = null;
        private static DateTime tokenExpiration;

        private static string devToken = "<DEVELOPERTOKENGOESHERE>";

        // URI templates used to get resources.

        public const string BaseUri = "https://content.api.bingads.microsoft.com/shopping/v9.1";
        public static string BmcUri = BaseUri + "/bmc/{0}";
        public static string BatchUri = BmcUri + "/products/batch";

        // Query strings

        public static string queryString = "?bmc-catalog-id={1}&alt=json";

        // Replace with your store ID and catalog ID.

        public static long merchantId = <STOREIDGOESHERE>;
        public static long catalogId = <CATALOGIDGOESHERE>;

        // Used in example to store operation ids.
        
        public static List<string> ProductList = new List<string>();
        public static int batchOperationId = 0;

        // The maximum number of objects that you can specify depends upon
        // the number of product attributes that you specify and whether you 
        // compress the data. If you do not compress the data, 
        // you can specify about 2,000 objects; otherwise, you can specify 
        // about 12,000 objects.
 
        // For this example, limit the list to 5 products.

        public const int MAX_ENTRIES = 5;


        static void Main(string[] args)
        {
            try
            {
                var headers = GetCredentialHeaders();

                // Build URL with query string and store id.

                var url = string.Format(BatchUri + queryString, merchantId, catalogId);

                // A batch operation may include any operation (insert, get, delete);
                // however, because the operations may not act on the same product,
                // this example performs the batch operations separately.

                BatchInsert(url, headers);
                BatchGet(url, headers);
                BatchDelete(url, headers);
            }
            catch (WebException e)
            {
                Console.WriteLine("\n" + e.Message);

                HttpWebResponse response = (HttpWebResponse)e.Response;

                // If the request is bad, the API returns the errors in the 
                // body of the request. For cases where the path may be valid, but
                // the resource does not belong to the user, the API returns not found.

                if (response != null &&
                    (HttpStatusCode.BadRequest == response.StatusCode ||
                     HttpStatusCode.NotFound == response.StatusCode ||
                     HttpStatusCode.InternalServerError == response.StatusCode))
                {
                    using (Stream stream = response.GetResponseStream())
                    {
                        StreamReader reader = new StreamReader(stream);
                        string json = reader.ReadToEnd();
                        reader.Close();

                        try
                        {
                            var errors = JsonConvert.DeserializeObject<ContentError>(json);

                            PrintErrors(errors.Error.Errors);
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

        // Use the BatchCollection object and POST operation to create multiple Content API operations.
        // This example uses compression.
        
        private static BatchCollection BatchRequest(string uri, WebHeaderCollection headers, BatchCollection batchCollection)
        {
            var request = (HttpWebRequest)WebRequest.Create(uri);
            request.Method = "POST";
            request.Headers = headers;
            request.Headers.Add("Content-Encoding", "gzip");
            request.AutomaticDecompression = DecompressionMethods.GZip;
            request.ContentType = "application/json";

            var serializerSettings = new JsonSerializerSettings();
            serializerSettings.NullValueHandling = NullValueHandling.Ignore;

            var json = JsonConvert.SerializeObject(batchCollection, serializerSettings);

            using (Stream requestStream = request.GetRequestStream())
            {
                var buffer = Encoding.UTF8.GetBytes(json);

                using (GZipStream compressionStream = new GZipStream(requestStream, CompressionMode.Compress, true))
                {
                    compressionStream.Write(buffer, 0, buffer.Length);
                }
            }

            var response = (HttpWebResponse)request.GetResponse();
            BatchCollection batchOut = null;

            using (Stream responseStream = response.GetResponseStream())
            {
                var reader = new StreamReader(responseStream);
                var jsonOut = reader.ReadToEnd();
                reader.Close();
                batchOut = JsonConvert.DeserializeObject<BatchCollection>(jsonOut);
            }

            return batchOut;
        }

        // Add 5 products to the catalog. Write the IDs to a list that's used in BatchGet
        // and BatchDelete.

        private static void BatchInsert(string url, WebHeaderCollection headers)
        {
            var batchCollection = new BatchCollection();
            batchCollection.Entries = new List<BatchEntry>();

            for (var i = 0; i < MAX_ENTRIES; i++)
            {
                var product = GetProduct();
                product.OfferId = i.ToString();
                var batchEntry = new BatchEntry(i, merchantId, "insert", null, product);
                batchCollection.Entries.Add(batchEntry);
            }

            // If you try to insert too many products, the call fails with status code 413.

            var batchOut = BatchRequest(url, headers, batchCollection);

            for (var i = 0; i < batchOut.Entries.Count; i++)
            {
                if (batchOut.Entries[i].Error != null)
                {
                    Console.WriteLine("Failed to insert product {0}.", 
                        batchCollection.Entries[(int)(batchOut.Entries[i].BatchId)].Product.OfferId);
                    PrintErrors(batchOut.Entries[i].Error.Errors);
                }
                else
                {
                    Console.WriteLine("Inserted product " + batchOut.Entries[i].Product.Id);
                    ProductList.Add(batchOut.Entries[i].Product.Id);
                }
            }
        }

        // Use GET operation on the products inserted by BatchInsert.

        private static void BatchGet(string url, WebHeaderCollection headers)
        {
            var batchCollection = new BatchCollection();
            batchCollection.Entries = new List<BatchEntry>();
            batchOperationId = 0;

            foreach (string productId in ProductList)
            {
                var batchEntry = new BatchEntry(batchOperationId++, merchantId, "get", productId, null);
                batchCollection.Entries.Add(batchEntry);
            }

            var batchOut = BatchRequest(url, headers, batchCollection);

            for (var i = 0; i < batchOut.Entries.Count; i++)
            {
                if (batchOut.Entries[i].Error != null)
                {
                    Console.WriteLine("Failed to get product {0}.", 
                        batchCollection.Entries[(int)(batchOut.Entries[i].BatchId)].ProductId);
                    PrintErrors(batchOut.Entries[i].Error.Errors);
                }
                else
                {
                    if (batchOut.Entries[i].Product == null)
                    {
                        Console.WriteLine("Product {0} was not found.",
                            batchCollection.Entries[(int)(batchOut.Entries[i].BatchId)].ProductId);
                    }
                    else
                    {
                        PrintProduct(batchOut.Entries[i].Product);
                        Console.WriteLine();
                    }
                }
            }
        }

        // Use DELETE operation on the products inserted in BatchInsert.

        private static void BatchDelete(string url, WebHeaderCollection headers)
        {
            var batchCollection = new BatchCollection();
            batchCollection.Entries = new List<BatchEntry>();
            batchOperationId = 0;

            foreach (string productId in ProductList)
            {
                var batchEntry = new BatchEntry(batchOperationId++, merchantId, "delete", productId, null);
                batchCollection.Entries.Add(batchEntry);
            }

            var batchOut = BatchRequest(url, headers, batchCollection);

            for (var i = 0; i < batchOut.Entries.Count; i++)
            {
                if (batchOut.Entries[i].Error != null)
                {
                    Console.WriteLine("Failed to delete product {0}.", 
                        batchCollection.Entries[(int)(batchOut.Entries[i].BatchId)].ProductId);
                    PrintErrors(batchOut.Entries[i].Error.Errors);
                }
                else
                {
                    Console.WriteLine("Deleted product " + batchCollection.Entries[i].ProductId);
                }
            }
        }


        // This example creates a single product that it adds to the store.
        // The calling code overwrites offerId to ensure a new product is added.

        private static Product GetProduct()
        {
            var product = new Product()
            {
                // The following properties are required.

                Availability = "in stock",
                Channel = Channel.Online.ToString(),
                Condition = Condition.New.ToString(),
                ContentLanguage = "en",
                Link = "http://www.contoso.com/apparel/men/tshirts.htm",
                ImageLink = "http://www.contoso.com/pics/tees.jpg",
                OfferId = "1",
                Price = new Price()
                {
                    Currency = "USD",
                    Value = (decimal)12.00
                },
                TargetCountry = "US",
                Title = "Mens T-Shirt",

                // If the manufacturer provides identifiers for brand, gtin
                // or mpn, you must set those fields, and set identifierExists
                // to true.
                
                IdentifierExists = false;
                
                // The following properties are optional.

                ExpirationDate = DateTime.UtcNow.AddDays(45).ToString("O")  // "2016-06-03T20:47:27.0437485Z"

                //SalePriceEffectiveDate = string.Format("{0:O}/{1:O}", 
                //    DateTime.UtcNow, DateTime.UtcNow.AddDays(10)),
                //ProductType = "Sporting Goods > Mens Shirts > Mens T-Shirts",
            };

            return product;
        }


        // Print out some field of the product offer.
        
        private static void PrintProduct(Product product)
        {
            Console.WriteLine("qualifiedProductId: " + product.Id);
            Console.WriteLine("channel : " + product.Channel);
            Console.WriteLine("language: " + product.ContentLanguage);
            Console.WriteLine("country: " + product.TargetCountry);
            Console.WriteLine("productId: " + product.OfferId);
            Console.WriteLine("expiry date: " + product.ExpirationDate);

            Console.WriteLine("title: " + product.Title);

            if (product.Price != null)
            {
                Console.WriteLine("price: {0} {1}", product.Price.Value, product.Price.Currency);
            }
        }

        // Print errors.
        
        private static void PrintErrors(List<Error> errors)
        {
            foreach (Error error in errors)
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

    // Defines the BMC classes.

    class BatchCollection
    {
        [JsonProperty("entries")]
        public List<BatchEntry> Entries { get; set; }
    }

    class BatchEntry
    {
        public BatchEntry() { }

        public BatchEntry(int batchId, long merchantId, string method, string productId, Product product)
        {
            this.BatchId = batchId;
            this.MerchantId = merchantId;
            this.Method = method;
            this.ProductId = productId;
            this.Product = product;
        }

        [JsonProperty("batchId")]
        public long BatchId { get; set; }

        [JsonProperty("merchantId")]
        public long MerchantId { get; set; }

        [JsonProperty("method")]
        public string Method { get; set; }

        [JsonProperty("productId")]
        public string ProductId { get; set; }

        [JsonProperty("product")]
        public Product Product { get; set; }

        [JsonProperty("errors")]
        public BatchItemError Error { get; set; }
    }


    // Defines a product resource.
    
    public class Product
    {
        public Product() { }

        [JsonProperty("additionalImageLinks")]
        public List<string> AdditionalImageLinks { get; set; }

        [JsonProperty("adult")]
        public bool? IsAdult { get; set; }

        [JsonProperty("adwordsGrouping")]
        public string AdwordsGrouping { get; set; }

        [JsonProperty("adwordsLabels")]
        public List<string> AdwordsLabels { get; set; }

        [JsonProperty("adwordsRedirect")]
        public string AdwordsRedirect { get; set; }

        [JsonProperty("ageGroup")]
        public string AgeGroup { get; set; }

        [JsonProperty("availability")]
        public string Availability { get; set; }

        [JsonProperty("availabilityDate")]
        public string AvailabilityDate { get; set; }

        [JsonProperty("brand")]
        public string Brand { get; set; }

        [JsonProperty("channel")]
        public string Channel { get; set; }

        [JsonProperty("color")]
        public string Color { get; set; }

        [JsonProperty("condition")]
        public string Condition { get; set; }


        [JsonProperty("contentLanguage")]
        public string ContentLanguage { get; set; }

        [JsonProperty("customAttributes")]
        public List<ProductCustomAttribute> CustomAttributes { get; set; }

        [JsonProperty("customGroups")]
        public List<ProductCustomGroup> CustomGroups { get; set; }

        [JsonProperty("customLabel0")]
        public string CustomLabel0 { get; set; }

        [JsonProperty("customLabel1")]
        public string CustomLabel1 { get; set; }

        [JsonProperty("customLabel2")]
        public string CustomLabel2 { get; set; }

        [JsonProperty("customLabel3")]
        public string CustomLabel3 { get; set; }

        [JsonProperty("customLabel4")]
        public string CustomLabel4 { get; set; }

        [JsonProperty("description")]
        public string Description { get; set; }

        [JsonProperty("destinations")]
        public List<ProductDestination> Destinations { get; set; }

        [JsonProperty("energyEfficiencyClass")]
        public string EnergyEfficiencyClass { get; set; }

        [JsonProperty("expirationDate")]
        public string ExpirationDate { get; set; }

        [JsonProperty("gender")]
        public string Gender { get; set; }

        [JsonProperty("googleProductCategory")]
        public string GoogleProductCategory { get; set; }

        [JsonProperty("gtin")]
        public string Gtin { get; set; }

        [JsonProperty("id")]
        public string Id { get; set; }

        [JsonProperty("identifierExists")]
        public bool? IdentifierExists { get; set; }

        [JsonProperty("imageLink")]
        public string ImageLink { get; set; }

        [JsonProperty("isBundle")]
        public bool? IsBundle { get; set; }

        [JsonProperty("itemGroupId")]
        public string ItemGroupId { get; set; }

        [JsonProperty("kind")] ////For example: "kind":"content#product"
        public string Kind { get; set; }

        [JsonProperty("link")]
        public string Link { get; set; }

        [JsonProperty("material")]
        public string Material { get; set; }

        [JsonProperty("multipack")]
        public ulong? MerchantMultipackQuantity { get; set; }

        [JsonProperty("mobileLink")]
        public string MobileLink { get; set; }

        [JsonProperty("mpn")]
        public string Mpn { get; set; }

        [JsonProperty("offerId")]
        public string OfferId { get; set; }

        [JsonProperty("onlineOnly")]
        public bool? OnlineOnly { get; set; }

        [JsonProperty("pattern")]
        public string Pattern { get; set; }

        [JsonProperty("price")]
        public Price Price { get; set; }

        [JsonProperty("productType")]
        public string ProductType { get; set; }

        [JsonProperty("salePrice")]
        public Price SalePrice { get; set; }

        [JsonProperty("salePriceEffectiveDate")]
        public string SalePriceEffectiveDate { get; set; }

        [JsonProperty("shipping")]
        public List<ProductShipping> Shipping { get; set; }

        [JsonProperty("shippingWeight")]
        public ProductShippingWeight ShippingWeight { get; set; }

        [JsonProperty("shippingLabel")]
        public string ShippingLabel { get; set; }

        [JsonProperty("sizes")]
        public List<string> Sizes { get; set; }

        [JsonProperty("sizeSystem")]
        public string SizeSystem { get; set; }

        [JsonProperty("sizeType")]
        public string SizeType { get; set; }

        [JsonProperty("targetCountry")]
        public string TargetCountry { get; set; }

        [JsonProperty("taxes")]
        public List<ProductTax> Taxes { get; set; }

        [JsonProperty("title")]
        public string Title { get; set; }

        [JsonProperty("unitPricingBaseMeasure")]
        public UnitPricing UnitPricingBaseMeasure { get; set; }

        [JsonProperty("unitPricingMeasure")]
        public UnitPricing UnitPricingMeasure { get; set; }

        [JsonProperty("validatedDestinations")]
        public List<string> ValidatedDestinations { get; set; }
    }

    // Defines a product's price.
    
    public class Price
    {
        [JsonProperty("currency")]
        public string Currency { get; set; }

        [JsonProperty("value")]
        public decimal? Value { get; set; }
    }

    // Defines a product's tax.
    
    public class ProductTax
    {
        [JsonProperty("country")]
        public string Country { get; set; }

        [JsonProperty("locationId")]
        public long? LocationId { get; set; }

        [JsonProperty("postalCode")]
        public string PostalCode { get; set; }

        [JsonProperty("rate")]
        public double? Rate { get; set; }

        [JsonProperty("region")]
        public string Region { get; set; }

        [JsonProperty("taxShip")]
        public bool? TaxShip { get; set; }
    }

    // Defines a product's shipping weight.
    
    public class ProductShippingWeight
    {
        [JsonProperty("unit")]
        public string Unit { get; set; }

        [JsonProperty("value")]
        public double? Value { get; set; }
    }

    // Defines a product's shipping cost.
    
    public class ProductShipping
    {
        [JsonProperty("country")]
        public string Country { get; set; }

        [JsonProperty("locationGroupName")]
        public string LocationGroupName { get; set; }

        [JsonProperty("locationId")]
        public long? LocationId { get; set; }

        [JsonProperty("postalCode")]
        public string PostalCode { get; set; }

        [JsonProperty("price")]
        public Price Price { get; set; }

        [JsonProperty("region")]
        public string Region { get; set; }

        [JsonProperty("service")]
        public string Service { get; set; }
    }

    // Defines per unit pricing.
    
    public class UnitPricing
    {
        [JsonProperty("unit")]
        public string Unit { get; set; }

        [JsonProperty("value")]
        public double Value{ get; set; }
    }

    // Defines a destination.
    
    public class ProductDestination
    {
        [JsonProperty("destinationName")]
        public string DestinationName { get; set; }

        [JsonProperty("intention")]
        public string Intention { get; set; }
    }

    // Defines a product's custom attribute.
    
    public class ProductCustomAttribute
    {
        [JsonProperty("name")]
        public string Name { get; set; }

        [JsonProperty("type")]
        public string Type { get; set; }

        [JsonProperty("unit")]
        public string Unit { get; set; }

        [JsonProperty("value")]
        public string Value { get; set; }
    }

    // Defines a custom group of attributes.
    
    public class ProductCustomGroup
    {
        [JsonProperty("customGroups")]
        public List<ProductCustomAttribute> Attributes { get; set; }

        [JsonProperty("name")]
        public string Name { get; set; }
    }

    // Defines the BMC enumerations.

    public enum Channel
    {
        Online,
        Local
    }

    public enum AgeGroup
    {
        Adult,
        Kids,
        Toddler,
        Infant,
        Newborn
    }

    public enum Condition
    {
        New,
        Refurbished,
        Used
    }

    public enum Gender
    {
        Female,
        Male,
        Unisex
    }

    public enum ApparelCut
    {
        Regular,
        Maternity,
        Petite,
        Oversize
    }

    public enum Intention
    {
        Default,
        Excluded,
        Optional,
        Required
    }

    public enum AttributeType
    {
        Boolean,
        DateTimeRange,
        Float,
        Group,
        Int,
        Price,
        Text,
        Time,
        URL
    }

    public enum AttributeUnit
    {
        Int,
        Float
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

    public class BatchItemError
    {
        [JsonProperty("errors")]
        public List<Error> Errors { get; set; }
    }

}
```

```java
package products.capi.microsoft.com;

import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.nio.charset.StandardCharsets;
import java.util.ArrayList;
import java.util.List;
import java.util.Map;
import java.util.HashMap;
import java.util.Map.Entry;
import java.util.zip.*;
import java.time.OffsetDateTime;
import java.time.format.DateTimeFormatter;

// Uses Jackson to serialize and deserialize JSON.

import com.fasterxml.jackson.core.JsonParseException;
import com.fasterxml.jackson.core.JsonParser;
import com.fasterxml.jackson.core.JsonProcessingException;
import com.fasterxml.jackson.databind.DeserializationContext;
import com.fasterxml.jackson.databind.JsonDeserializer;
import com.fasterxml.jackson.databind.JsonMappingException;
import com.fasterxml.jackson.databind.ObjectMapper;
import com.fasterxml.jackson.databind.annotation.*;
import com.fasterxml.jackson.annotation.*;
import com.fasterxml.jackson.annotation.JsonInclude.Include;


class ProductsEx {

    // Maps the product's availability strings to enum values.
    
	public static Map<ProductAvailability, String> Availability = new HashMap<ProductAvailability, String>();
	static {
		Availability.put(ProductAvailability.InStock, "in stock");
		Availability.put(ProductAvailability.OutOfStock, "out of stock");
		Availability.put(ProductAvailability.PreOrder, "preorder");
	}
	
	// Jackson object used to serialize and deserialize JSON.

	private static ObjectMapper jsonMapper = new ObjectMapper();

	private static String accessToken = "<accesstokengoeshere>";
	
    public static String devToken = "<devtokengoeshere>"; 

    // URI templates used to get resources.
    
    public static final String BaseUri = "https://content.api.bingads.microsoft.com/shopping/v9.1";
    public static final String BmcUri = BaseUri + "/bmc/%d";
    public static final String BatchUri = BmcUri + "/products/batch";

    // Query strings. 
    
    public static final String queryString = "?alt=json";

    // Replace with your IDs.
    
    public static long merchantId = <merchantidgoeshere>; 
    public static long catalogId = <catalogidgoeshere>;

    // Will contain the list of IDs of products that we added, so we can 
    // remove them when we're done.
    
    public static List<String> ProductList = new ArrayList<String>();
    public static int batchOperationId = 0;

    // The maximum number of products that you can specify in a request
    // depends upon the number of product attributes that you specify, and
    // whether you compress the data. If you do not compress the data, 
    // you can specify about 2,000 products, and if you compress the 
    // data, you can specify about 12,000 products.

    // This example limits the list to 5 products.

    public final static int MAX_ENTRIES = 5;

	// This example shows how to use the batch feature to perform 
    // multiple operations (insert/update, get, and delete) in one
    // request.
    
	public static void main(String[] args) throws JsonParseException, JsonMappingException, IOException {

		try {
			Map<String, String> headers = getCredentialHeaders();

            String url = String.format(BatchUri + queryString, merchantId);
            
            // A batch operation may include any operation (insert, get, delete);
            // however, the operations may not act on the same product. This
            // example performs the batch operations separately.

            batchInsert(url, headers);
            batchGet(url, headers);
            batchDelete(url, headers);
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
        // TODO: Add logic to get the user's access token.

        Map<String, String> headers = new HashMap<String, String>();
        headers.put("AuthenticationToken", accessToken);
        headers.put("DeveloperToken", devToken);

        return headers;
    }

    // POSTs the collection of batch operations to the specified URL.
    // This example compresses the data sent in the request. You must
    // use GZIP compression.
    
    private static BatchCollection batchRequest(String uri, Map<String, String> headers, BatchCollection batch) throws IOException, CapiException 
    {
    	HttpURLConnection connection = null;
    	URL url;
    	InputStream istream = null;
    	OutputStream ostream = null;
    	GZIPOutputStream zipOStream = null;
    	GZIPInputStream zipIStream = null;
    	BufferedReader reader = null;
    	BatchCollection batchOut = null;

    	try {
        	String json = jsonMapper.writeValueAsString(batch);

    		url = new URL(uri);
    		connection = (HttpURLConnection) url.openConnection();

    		connection.setRequestMethod("POST");
    		connection.setRequestProperty("Content-Type", "application/json");
    		connection.setRequestProperty("Content-Encoding", "gzip");
    		connection.setRequestProperty("Accept-Encoding", "gzip");

    		for (Entry\<String, String> header : headers.entrySet())
    		{
    			connection.setRequestProperty(header.getKey(), header.getValue());
    		}

    		connection.setDoInput(true);
    		connection.setDoOutput(true);
    		connection.setUseCaches(false);

    		ostream = connection.getOutputStream();
    		zipOStream = new GZIPOutputStream(ostream);
    		zipOStream.write(json.getBytes(StandardCharsets.UTF_8));
    		zipOStream.finish();
    		
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
        		
    			if (statusCode == HttpURLConnection.HTTP_BAD_REQUEST) {
    	    		ContentError errors = jsonMapper.readValue(response.toString(), ContentError.class);
    				throw new CapiException("Batch request failed.\n", errors.getError().getErrors());
    			}
    			else {
    				throw new CapiException(response.toString());
    			}
    		}

    		istream = connection.getInputStream();
        		
    		response = new StringBuffer();
    		zipIStream = new GZIPInputStream(istream);
    		byte[] buffer = new byte[2048];
    		int len = 0;
    		
    		while ((len = zipIStream.read(buffer)) != -1) {
    			response.append(new String(buffer, 0, len));
    		}

    		zipIStream.close();
    		
    		System.out.println(response);

    		batchOut = jsonMapper.readValue(response.toString(), BatchCollection.class);
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
    		if (zipOStream != null) {
    			zipOStream.close();
    		}
    		
    		if (zipIStream != null) {
    			zipIStream.close();
    		}
    	}

    	return batchOut;
    }


    // Add 5 products to the catalog. Save the IDs to use in BatchGet
    // and BatchDelete.

    private static void batchInsert(String url, Map<String, String> headers) throws IOException, CapiException
    {
    	BatchCollection batchCollection = new BatchCollection();
    	batchCollection.setEntries(new ArrayList<BatchEntry>());

        for (int i = 1; i < MAX_ENTRIES; i++)
        {
            Product product = getProduct();
            product.setOfferId(String.valueOf(i));
            BatchEntry batchEntry = new BatchEntry(i, merchantId, "insert", null, product);
            batchCollection.getEntries().add(batchEntry);
        }

        // If you try to insert too many products, the call fails with status code 413.

        BatchCollection batchOut = batchRequest(url, headers, batchCollection);

        for (int i = 0; i < batchOut.getEntries().size(); i++)
        {
            if (((BatchEntry) batchOut.getEntries().toArray()[i]).getErrors() != null)
            {
                System.out.printf("Failed to insert product %s.\n", 
                    ((BatchEntry) batchCollection.getEntries().toArray()[(int)(((BatchEntry) batchOut.getEntries().toArray()[i]).getBatchId())]).getProduct().getOfferId());
                printErrors(((BatchEntry) batchOut.getEntries().toArray()[i]).getErrors().getErrors());
            }
            else
            {
                String id = ((BatchEntry) batchOut.getEntries().toArray()[i]).getProduct().getId();
                ProductList.add(id);
                System.out.println("Inserted product " + id);
            }
        }
    }


    // Use GET operation on the products inserted by BatchInsert.

    private static void batchGet(String url, Map<String, String> headers) throws IOException, CapiException
    {
    	BatchCollection batchCollection = new BatchCollection();
    	batchCollection.setEntries(new ArrayList<BatchEntry>());
        batchOperationId = 1;

        for (String productId : ProductList)
        {
        	BatchEntry batchEntry = new BatchEntry(batchOperationId++, merchantId, "get", productId, null);
            batchCollection.getEntries().add(batchEntry);
        }

        BatchCollection batchOut = batchRequest(url, headers, batchCollection);

        for (int i = 0; i < batchOut.getEntries().size(); i++)
        {
            if (((BatchEntry) batchOut.getEntries().toArray()[i]).getErrors() != null)
            {
                System.out.printf("Failed to get product {0}.", 
                    ((BatchEntry) batchCollection.getEntries().toArray()[(int)(((BatchEntry) batchOut.getEntries().toArray()[i]).getBatchId())]).getProductId());
                printErrors(((BatchEntry) batchOut.getEntries().toArray()[i]).getErrors().getErrors());
            }
            else
            {
                if (((BatchEntry) batchOut.getEntries().toArray()[i]).getProduct() == null)
                {
                    System.out.printf("Product {0} was not found.",
                        ((BatchEntry) batchCollection.getEntries().toArray()[(int)(((BatchEntry) batchOut.getEntries().toArray()[i]).getBatchId())]).getProductId());
                }
                else
                {
                    printProduct(((BatchEntry) batchOut.getEntries().toArray()[i]).getProduct());
                    System.out.println();
                }
            }
        }
    }


    // Use DELETE operation on the products inserted by BatchInsert.

    private static void batchDelete(String url, Map<String, String> headers) throws IOException, CapiException
    {
    	BatchCollection batchCollection = new BatchCollection();
    	batchCollection.setEntries(new ArrayList<BatchEntry>());
        batchOperationId = 1;

        for (String productId : ProductList)
        {
        	BatchEntry batchEntry = new BatchEntry(batchOperationId++, merchantId, "delete", productId, null);
            batchCollection.getEntries().add(batchEntry);
        }

        BatchCollection batchOut = batchRequest(url, headers, batchCollection);

        for (int i = 0; i < batchOut.getEntries().size(); i++)
        {
            if (((BatchEntry) batchOut.getEntries().toArray()[i]).getErrors() != null)
            {
                System.out.printf("Failed to delete product %s.\n", 
                    ((BatchEntry) batchCollection.getEntries().toArray()[(int)(((BatchEntry) batchOut.getEntries().toArray()[i]).getBatchId())]).getProductId());
                printErrors(((BatchEntry) batchOut.getEntries().toArray()[i]).getErrors().getErrors());
            }
            else
            {
                System.out.println("Deleted product " + ((BatchEntry) batchCollection.getEntries().toArray()[i]).getProductId());
            }
        }
    }



    // This example creates a single product that it adds to the store.
    // The calling code overwrites offerId to ensure a new product is added.

    private static Product getProduct()
    {
        Product product = new Product();

        // The following properties are required.

        product.setAvailability(Availability.get(ProductAvailability.InStock));
        product.setChannel(ProductChannel.Online.toString());
        product.setCondition(ProductCondition.New.toString());
        product.setContentLanguage(ContentLanguage.EN.toString());
        product.setLink("http://www.contoso.com");
        product.setImageLink("https://tse3.mm.bing.net/th?id=Ma8674a23cc755995efecf822b3836f07o0&pid=Api");
        product.setOfferId("1");
        product.setPrice(new Price());
        product.getPrice().setCurrency("USD");
        product.getPrice().setValue((Double)1205.00);
        product.setTargetCountry(TargetCountry.US.toString());
        product.setTitle("Mens T-shirt");

        // If the manufacturer provides identifiers for brand, gtin
        // or mpn, you must set those fields, and set identifierExists
        // to true.
                
        product.setIdentifierExists(false);

        // The following properties are optional.

        OffsetDateTime time = OffsetDateTime.now().plusDays(45);
        product.setExpirationDate(time.format(DateTimeFormatter.ISO_INSTANT)); // "2017-06-03T20:47:27.0437485Z"

        return product;
    }


    // Print some of the product's fields.
    
    private static void printProduct(Product product)
    {
        System.out.println("product ID: " + product.getId());
        System.out.println("channel : " + product.getChannel());
        System.out.println("language: " + product.getContentLanguage());
        System.out.println("country: " + product.getTargetCountry());
        System.out.println("offer ID: " + product.getOfferId());
        System.out.println("expiry date: " + product.getExpirationDate());

        System.out.println("title: " + product.getTitle());

        if (product.getPrice() != null)
        {
        	System.out.printf("price: %4.2f %s\n", product.getPrice().getValue(), product.getPrice().getCurrency());
        }
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

// Converting True/False to Boolean because the serializer can't.

class StringBooleanDeserializer extends JsonDeserializer<Boolean> {
	
	public Boolean deserialize(JsonParser parser, DeserializationContext context) throws IOException, JsonProcessingException {
		return !"False".equals(parser.getText());
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

// Defines the batch classes.

@JsonInclude(Include.NON_DEFAULT)
class BatchCollection
{
	private List<BatchEntry> entries;
	private String kind;

	public String getKind() { return this.kind; }  // content#productsCustomBatchResponse
	public void setKind(String value) { this.kind = value; }  
	
    public List<BatchEntry> getEntries() { return this.entries; }
    public void setEntries(List<BatchEntry> value) { this.entries = value; }
}

@JsonInclude(Include.NON_DEFAULT)
class BatchEntry
{
	private long batchId;
	private long merchantId;
	private String method;
	private String productId;
	private Product product;
	private BatchItemError errors;
	
    public BatchEntry() { }

    public BatchEntry(int batchId, long merchantId, String method, String productId, Product product)
    {
        this.batchId = batchId;
        this.merchantId = merchantId;
        this.method = method;
        this.productId = productId;
        this.product = product;
    }

    public long getBatchId() { return this.batchId; }
    public void setBatchId(long value) { this.batchId = value; }

    public long getMerchantId() { return this.merchantId; }
    public void setMerchantId(long value) { this.merchantId = value; }

    public String getMethod() { return this.method; }
    public void setMethod(String value) { this.method = value; }

    public String getProductId() { return this.productId; }
    public void setProductId(String value) { this.productId = value; }

    public Product getProduct() { return this.product; }
    public void setProduct(Product value) { this.product = value; }

    public BatchItemError getErrors() { return this.errors; }
}


class BatchItemError
{
	private List<Error> errors;
	
    public List<Error> getErrors() { return this.errors; }
}


// Defines a product resource.

@JsonInclude(Include.NON_DEFAULT)
class Product
{
	private List<String> additionalImageLinks;
	
    @JsonProperty("adult")
    @JsonDeserialize(using=StringBooleanDeserializer.class)
	private Boolean isAdult;
    private String adwordsGrouping;
    private List<String> adwordsLabels;
    private String adwordsRedirect;
    private String ageGroup;
    private String availability;
    private String availabilityDate;
    private String brand;
    private String channel;
    private String color;
    private String condition;
    private String contentLanguage;
    private List<ProductCustomAttribute> customAttributes;
    private List<ProductCustomGroup> customGroups;
    private String customLabel0;
    private String customLabel1;
    private String customLabel2;
    private String customLabel3;
    private String customLabel4;
    private String description;
    private List<ProductDestination> destinations;
    private String energyEfficiencyClass;
    private String expirationDate;
    private String gender;
    private String googleProductCategory;
    private String gtin;
    private String id;

    @JsonDeserialize(using=StringBooleanDeserializer.class)
    private Boolean identifierExists;
    private String imageLink;

    @JsonDeserialize(using=StringBooleanDeserializer.class)
    private Boolean isBundle;
    private String itemGroupId;
    private String kind;  //For example: "kind":"content#product"
    private String link;
    private String material;
    
    @JsonProperty("multipack")
    private Long multipackQuantity;
    private String mobileLink;
    private String mpn;
    private String offerId;

    @JsonDeserialize(using=StringBooleanDeserializer.class)
    private Boolean onlineOnly;
    private String pattern;
    private Price price;
    private String productType;
    private Price salePrice;
    private String salePriceEffectiveDate;
    private List<ProductShipping> shipping;
    private ProductShippingWeight shippingWeight;
    private String shippingLabel;
    private List<String> sizes;
    private String sizeSystem;
    private String sizeType;
    private String targetCountry;
    private List<ProductTax> taxes;
    private String title;
    private UnitPricing unitPricingBaseMeasure;
    private UnitPricing unitPricingMeasure;
    private List<String> validatedDestinations;
    
    

	public List<String> getAdditionalImageLinks() { return this.additionalImageLinks; }
	public void setAdditionalImageLinks(List<String> value) { this.additionalImageLinks = value; }

    public Boolean getIsAdult() { return this.isAdult; }
    public void setIsAdult(Boolean value) { this.isAdult = value; }

    public String getAdwordsGrouping() { return this.adwordsGrouping; }
    public void setAdwordsGrouping(String value) { this.adwordsGrouping = value; }

    public List<String> getAdwordsLabels() { return this.adwordsLabels; }
    public void setAdwordsLabels(List<String> value) { this.adwordsLabels = value; }

    public String getAdwordsRedirect() { return this.adwordsRedirect; }
    public void setAdwordsRedirect(String value) { this.adwordsRedirect = value; }

    public String getAgeGroup() { return this.ageGroup; }
    public void setAgeGroup(String value) { this.ageGroup = value; }

    public String getAvailability() { return this.availability; }
    public void setAvailability(String value) { this.availability = value; }

    public String getAvailabilityDate() { return this.availabilityDate; }
    public void setAvailabilityDate(String value) { this.availabilityDate = value; }

    public String getBrand() { return this.brand; }
    public void setBrand(String value) { this.brand = value; }

    public String getChannel() { return this.channel; }
    public void setChannel(String value) { this.channel = value; }

    public String getColor() { return this.color; }
    public void setColor(String value) { this.color = value; }

    public String getCondition() { return this.condition; }
    public void setCondition(String value) { this.condition = value; }

    public String getContentLanguage() { return this.contentLanguage; }
    public void setContentLanguage(String value) { this.contentLanguage = value; }

    public List<ProductCustomAttribute> getCustomAttributes() { return this.customAttributes; }
    public void setCustomAttributes(List<ProductCustomAttribute> value) { this.customAttributes = value; }

    public List<ProductCustomGroup> getCustomGroups() { return this.customGroups; }
    public void setCustomGroups(List<ProductCustomGroup> value) { this.customGroups = value; }

    public String getCustomLabel0() { return this.customLabel0; }
    public void setCustomLabel0(String value) { this.customLabel0 = value; }

    public String getCustomLabel1() { return this.customLabel1; }
    public void setCustomLabel1(String value) { this.customLabel1 = value; }

    public String getCustomLabel2() { return this.customLabel2; }
    public void setCustomLabel2(String value) { this.customLabel2 = value; }

    public String getCustomLabel3() { return this.customLabel3; }
    public void setCustomLabel3(String value) { this.customLabel3 = value; }

    public String getCustomLabel4() { return this.customLabel4; }
    public void setCustomLabel4(String value) { this.customLabel4 = value; }

    public String getDescription() { return this.description; }
    public void setDescription(String value) { this.description = value; }

    public List<ProductDestination> getDestinations() { return this.destinations; }
    public void setDestinations(List<ProductDestination> value) { this.destinations = value; }

    public String getEnergyEfficiencyClass() { return this.energyEfficiencyClass; }
    public void setEnergyEfficiencyClass(String value) { this.energyEfficiencyClass = value; }

    public String getExpirationDate() { return this.expirationDate; }
    public void setExpirationDate(String value) { this.expirationDate = value; }

    public String getGender() { return this.gender; }
    public void setGender(String value) { this.gender = value; }

    public String getGoogleProductCategory() { return this.googleProductCategory; }
    public void setGoogleProductCategory(String value) { this.googleProductCategory = value; }

    public String getGtin() { return this.gtin; }
    public void setGtin(String value) { this.gtin = value; }

    public String getId() { return this.id; }
    public void setId(String value) { this.id = value; }

    public Boolean getIdentifierExists() { return this.identifierExists; }
    public void setIdentifierExists(Boolean value) { this.identifierExists = value; }

    public String getImageLink() { return this.imageLink; }
    public void setImageLink(String value) { this.imageLink = value; }

    public Boolean getIsBundle() { return this.isBundle; }
    public void setIsBundle(Boolean value) { this.isBundle = value; }

    public String getItemGroupId() { return this.itemGroupId; }
    public void setItemGroupId(String value) { this.itemGroupId = value; }

    public String getKind() { return this.kind; } 
    public void setKind(String value) { this.kind = value; } 

    public String getLink() { return this.link; }
    public void setLink(String value) { this.link = value; }

    public String getMaterial() { return this.material; }
    public void setMaterial(String value) { this.material = value; }

    public Long getMultipackQuantity() { return this.multipackQuantity; }
    public void setMultipackQuantity(Long value) { this.multipackQuantity = value; }

    public String getMobileLink() { return this.mobileLink; }
    public void setMobileLink(String value) { this.mobileLink = value; }

    public String getMpn() { return this.mpn; }
    public void setMpn(String value) { this.mpn = value; }

    public String getOfferId() { return this.offerId; }
    public void setOfferId(String value) { this.offerId = value; }

    public Boolean getOnlineOnly() { return this.onlineOnly; }
    public void setOnlineOnly(Boolean value) { this.onlineOnly = value; }

    public String getPattern() { return this.pattern; }
    public void setPattern(String value) { this.pattern = value; }

    public Price getPrice() { return this.price; }
    public void setPrice(Price value) { this.price = value; }

    public String getProductType() { return this.productType; }
    public void setProductType(String value) { this.productType = value; }

    public Price getSalePrice() { return this.salePrice; }
    public void setSalePrice(Price value) { this.salePrice = value; }

    public String getSalePriceEffectiveDate() { return this.salePriceEffectiveDate; }
    public void setSalePriceEffectiveDate(String value) { this.salePriceEffectiveDate = value; }

    public List<ProductShipping> getShipping() { return this.shipping; }
    public void setShipping(List<ProductShipping> value) { this.shipping = value; }

    public ProductShippingWeight getShippingWeight() { return this.shippingWeight; }
    public void setShippingWeight(ProductShippingWeight value) { this.shippingWeight = value; }

    public String getShippingLabel() { return this.shippingLabel; }
    public void setShippingLabel(String value) { this.shippingLabel = value; }

    public List<String> getSizes() { return this.sizes; }
    public void setSizes(List<String> value) { this.sizes = value; }

    public String getSizeSystem() { return this.sizeSystem; }
    public void setSizeSystem(String value) { this.sizeSystem = value; }

    public String getSizeType() { return this.sizeType; }
    public void setSizeType(String value) { this.sizeType = value; }

    public String getTargetCountry() { return this.targetCountry; }
    public void setTargetCountry(String value) { this.targetCountry = value; }

    public List<ProductTax> getTaxes() { return this.taxes; }
    public void setTaxes(List<ProductTax> value) { this.taxes = value; }

    public String getTitle() { return this.title; }
    public void setTitle(String value) { this.title = value; }

    public UnitPricing getUnitPricingBaseMeasure() { return this.unitPricingBaseMeasure; }
    public void setUnitPricingBaseMeasure(UnitPricing value) { this.unitPricingBaseMeasure = value; }

    public UnitPricing getUnitPricingMeasure() { return this.unitPricingMeasure; }
    public void setUnitPricingMeasure(UnitPricing value) { this.unitPricingMeasure = value; }

    public List<String> getValidatedDestinations() { return this.validatedDestinations; }
    public void setValidatedDestinations(List<String> value) { this.validatedDestinations = value; }
}


// Defines a product's price.

class Price
{
	private String currency;
	private Double value;
	
    public String getCurrency() { return this.currency; }
    public void setCurrency(String value) { this.currency = value; }

    public Double getValue() { return this.value; }
    public void setValue(Double value) { this.value = value; }
}


// Defines a product's tax.

@JsonInclude(Include.NON_DEFAULT)
class ProductTax
{
	private String country;
	private Long locationId;
	private String postalCode;
	private Double rate;
	private String region;

	@JsonDeserialize(using=StringBooleanDeserializer.class)
	private Boolean taxShip;

    public String getCountry() { return this.country; }
    public void setCountry(String value) { this.country = value; }

    public Long getLocationId() { return this.locationId; }
    public void setLocationId(Long value) { this.locationId = value; }

    public String getPostalCode() { return this.postalCode; }
    public void setPostalCode(String value) { this.postalCode = value; }

    public Double getRate() { return this.rate; }
    public void setRate(Double value) { this.rate = value; }

    public String getRegion() { return this.region; }
    public void setRegion(String value) { this.region = value; }

    public Boolean getTaxShip() { return this.taxShip; }
    public void setTaxShip(Boolean value) { this.taxShip = value; }
}



// Defines a product's shipping weight.

class ProductShippingWeight
{
	private String unit;
	private Double value;
	
    public String getUnit() { return this.unit; }
    public void setUnit(String value) { this.unit = value; }

    public Double getValue() { return this.value; }
    public void setValue(Double value) { this.value = value; }
}


// Defines a product's shipping cost.

@JsonInclude(Include.NON_DEFAULT)
class ProductShipping
{
	private String country;
	private String locationGroupName;
	private Long locationId;
	private String postalCode;
	private Price price;
	private String region;
	private String service;
	
    public String getCountry() { return this.country; }
    public void setCountry(String value) { this.country = value; }

    public String getLocationGroupName() { return this.locationGroupName; }
    public void setLocationGroupName(String value) { this.locationGroupName = value; }

    public Long getLocationId() { return this.locationId; }
    public void setLocationId(Long value) { this.locationId = value; }

    public String getPostalCode() { return this.postalCode; }
    public void setPostalCode(String value) { this.postalCode = value; }

    public Price getPrice() { return this.price; }
    public void setPrice(Price value) { this.price = value; }

    public String getRegion() { return this.region; }
    public void setRegion(String value) { this.region = value; }

    public String getService() { return this.service; }
    public void setService(String value) { this.service = value; }
}


// Defines per unit pricing.

class UnitPricing
{
	private String unit;
	private Double value;
	
    public String getUnit() { return this.unit; }
    public void setUnit(String value) { this.unit = value; }

    public Double getValue() { return this.value; }
    public void setValue(Double value) { this.value = value; }
}


// Defines a destination.

@JsonInclude(Include.NON_DEFAULT)
class ProductDestination
{
	private String destinationName;
	private String intention;
	
    public String getDestinationName() { return this.destinationName; }
    public void setDestinationName(String value) { this.destinationName = value; }

    public String getIntention() { return this.intention; }
    public void setIntention(String value) { this.intention = value; }
}


// Defines a product's custom attribute.

class ProductCustomAttribute
{
	private String name;
	private String type;
	private String unit;
	private String value;
	
    public String getName() { return this.name; }
    public void setName(String value) { this.name = value; }

    public String getType() { return this.type; }
    public void setType(String value) { this.type = value; }

    public String getUnit() { return this.unit; }
    public void setUnit(String value) { this.unit = value; }

    public String getValue() { return this.value; }
    public void setValue(String value) { this.value = value; }
}


// Defines a custom group of attributes.

class ProductCustomGroup
{
    @JsonProperty("customGroups")
	private List<ProductCustomAttribute> attributes;
    private String name;
	
    public List<ProductCustomAttribute> getAttributes() { return this.attributes; }
    public void setAttributes(List<ProductCustomAttribute> value) { this.attributes = value; }

    public String getName() { return this.name; }
    public void setName(String value) { this.name = value; }
}


// Defines the possible distribution channels.

enum ProductChannel
{
    Online,
    Local
}

//Defines the possible product conditions.

enum ProductCondition
{
	New,
	Refurbished,
	Used
}

//Defines the possible product availability.

enum ProductAvailability
{
	InStock,
	OutOfStock,
	PreOrder
}

//Defines the possible content languages.

enum ContentLanguage
{
	EN,
	DE,
	FR
}

//Defines the possible target countries.

enum TargetCountry
{
	AU,
	DE,
	FR,
	GB,
	US
}

//Defines the possible genders.

enum Gender
{
	Female,
	Male,
	Unisex
}


// Classes used to handle errors.

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
# A simple example that shows how to batch multiple inserts/updates 
# in a single request. This example adds products to the default
# catalog.

import string
import json
import requests
from datetime import datetime, timedelta

# Creates the endpoint to send the batch request to. If you want to
# add products to a specific catalog, include the following line:
# BATCH_URI_WITH_CATALOG = BATCH_URI + '?bmc-catalog-id={1}

BASE_URI = 'https://content.api.bingads.microsoft.com/shopping/v9.1'
BMC_URI = BASE_URI + '/bmc/{0}'  # {0} will contain the merchant ID 
BATCH_URI = BMC_URI + '/products/batch'

DEV_TOKEN = '<developer token goes here>'
MERCHANT_ID = '<merchant store id goes here>'

# This example does not show how to get the access token. Copy
# it here from another source.

AUTHENTICATION_TOKEN = "<oauth access token goes here>"

AUTHENTICATION_HEADERS = {'DeveloperToken': DEV_TOKEN, 'AuthenticationToken': AUTHENTICATION_TOKEN}


# Prints the batch error.

def print_error(errors):
    print('HTTP status code: ' + errors['code'])
    print('The following issues were found:\n')

    for error in errors['errors']:
        print('Reason: {0}'.format(error['reason']))
        print('Message: {0}'.format(error['message']))
        print()


# Prints warning messages if there's an issue with a product.
# For example, the API returns a warning if you don't specify the 
# brand, gtin, and mpn identifiers and forgot to set the 
# identifierExists field to false.

def print_warnings(warnings):
    print('The following issues were found:\n')

    for warning in warnings:
        print('Reason: {0}'.format(warning['reason']))
        print('Message: {0}'.format(warning['message']))
        print()


# Check batch response for errors and warnings.
# Either the 'product' or 'errors' field will exist, not both.
# If the 'product' field exists, print the product's ID.
# Otherwise, print the errors that occurred.

def check_for_errors(batch):
    for item in batch['entries']:
        print('Batch ID:' + item['batchId'])

        try:
            print('Successfully added product: ' + item['product']['id'])

            if 'warnings' in item['product']:
                print_warnings(item['product']['warnings']) 

        except KeyError as ex:
            print_error(item['errors'])


# Runs the batch request.

def run_batch_request(batch):
    url = BATCH_URI.format(MERCHANT_ID)
    response = requests.post(url, headers=AUTHENTICATION_HEADERS, data=json.dumps(batch))
    response.raise_for_status()
    print('Request activity ID: {0}'.format(response.headers['WebRequestActivityId']))
    return json.loads(response.text)


# For simplicity, this example hard-codes a couple of records.

def get_batch_data():
    batch = {}
    batch['entries'] = []

    # Add the first batch record.

    product = {}
    product['offerId'] = 'xyz-abc-123'
    product['channel'] = 'Online'
    product['contentLanguage'] = 'en'
    product['targetCountry'] = 'US'
    product['title'] = 'product title 1'
    product['availability'] = 'in stock'
    product['condition'] = 'new'
    product['price'] = {}
    product['price']['currency'] = 'USD'
    product['price']['value'] = 50.50
    product['link'] = 'http://www.contoso.com/apperal/men/tshirts.htm'
    product['imageLink'] = 'http://www.contoso.com/pics/tees.jpg'
    product['promotionId'] = 'promo1!,promo2,promo3'
    # product['identifierExists'] = False  # Un-comment to remove warning case

    batchitem = {
        'batchId': 1, 
        'merchantId': MERCHANT_ID, 
        'method': 'Insert', 
        'product': product 
    }

    batch['entries'].append(batchitem)
    
    # Add the second batch record.

    product = {}
    product['offerId'] = 'xyz-def-456'
    product['channel'] = 'Online'
    product['contentLanguage'] = 'en'
    product['targetCountry'] = 'US'
    product['title'] = 'product title 2'
    product['availability'] = 'in stock'
    product['condition'] = 'new'
    product['price'] = {}
    product['price']['currency'] = 'USD'
    product['price']['value'] = 750.33
    product['link'] = 'http://www.contoso.com/apperal/men/shorts.htm'
    product['imageLink'] = 'http://www.contoso.com/pics/shorts.jpg'
    product['promotionId'] = 'promo1'
    product['identifierExists'] = False
    product['expirationDate'] = (datetime.utcnow()+timedelta(days=14)).strftime("%Y-%m-%dT%H:%M:%S")

    batchitem = {
        'batchId': 2, 
        'merchantId': MERCHANT_ID, 
        'method': 'Insert', 
        'product': product
    }

    batch['entries'].append(batchitem)

    return batch


def main():
    # The main entry point of this example

    try:

        batch = get_batch_data()
        batchResponse = run_batch_request(batch)
        check_for_errors(batchResponse)

    except Exception as ex:
        raise ex

# Main execution
if __name__ == '__main__':
    main()
```
