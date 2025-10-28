---
title: "Managing Products Code Example"
description: "Code sample showing how to manage products with the Content API."
author: jonmeyers
ms.service: "bing-ads"
ms.subservice: "shopping-content"
ms.topic: "article"
ms.author: jonmeyers
ms.date: 11/13/2024
dev_langs: 
  - csharp
  - java
  - python
  - php
---

# Managing Products Code Example

This example shows how to get, add, update, and delete products in the specified store.  

For information about the product-related classes used by this example, see [Products](../shopping-content/products-resource.md#products) and [Product](../shopping-content/products-resource.md#product).

This example uses the Bing Ads SDK for user authentication.

```csharp
using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Reflection;
using System.Security.Cryptography;
using System.ServiceModel;
using System.Text;
using System.Threading.Tasks;
using Microsoft.BingAds;
using Newtonsoft.Json;

namespace Products
{
    public class ManageProductExample
    {
        private const string BaseUri = "https://content.api.bingads.microsoft.com/shopping/v9.1";
        private const string BmcUri = BaseUri + "/bmc/{0}";
        private const string ClientState = "ClientStateGoesHere";
        
        private static string ClientId = "<CLIENTIDGOESHERE>";
        private static string DeveloperToken = "<DEVELOPERTOKENGOESHERE>";
        private static string RefreshToken = "<REFRESHTOKENGOESHERE>";
        private static string MerchantId = "<STOREIDGOESHERE>";

        private static OAuthDesktopMobileAuthCodeGrant OAuth;

        public static void Main()
        {
            try
            {
                OAuth = AuthenticateWithOAuth();

                // Get the default catalog.
                // Note that getting catalog information is an expensive call and should be limited. The example
                // includes this call simply to demonstrate using the call. If you don't specify a catalog, the
                // product is automatically written to the default catalog, so getting the catalog ID is only useful
                // if you're adding the product to a non-default catalog. 

                Catalog defaultCatalog = ListCatalogs().FirstOrDefault(cat => cat.IsDefault == true);

                // Add a product to the catalog
                Product testProduct = GetTestProduct("My Test Product ({0})");
                // If catalog id is not specified, the product is added to the default catalog.
                Product addedProduct = AddProduct(defaultCatalog.Id, testProduct);
                Console.WriteLine("*** Added product to catalog (catalog.Id=" + defaultCatalog.Id + ", product.Id=" + addedProduct.Id + ")***");
                Print(addedProduct);
                Console.WriteLine("*** / End of added product (catalog.Id=" + defaultCatalog.Id + ", product.Id=" + addedProduct.Id + ")***");
                Console.WriteLine();

                // Retrieve a product by id
                Product retrievedProduct = GetProduct(addedProduct.Id);
                Console.WriteLine("*** Retrieved product (product.Id=" + retrievedProduct.Id + ")***");
                Print(retrievedProduct);
                Console.WriteLine("*** / End retrieved product (product.Id=" + retrievedProduct.Id + ")***");
                Console.WriteLine();

                // List products
                Console.WriteLine("*** Listing products ***");
                foreach (Product product in ListProducts())
                {
                    Print(product);
                }
                Console.WriteLine("*** / End of listing products ***");
                Console.WriteLine();

                // Delete product
                Console.WriteLine("*** Deleting Product (" + addedProduct.Id + ") ***");
                DeleteProduct(addedProduct.Id);
                Console.WriteLine("*** / Deleting Product Done (" + addedProduct.Id + ") ***");
            }
            // Catch authentication exceptions
            catch (OAuthTokenRequestException ex)
            {
                OutputStatusMessage(string.Format("OAuthTokenRequestException Message:\n{0}", ex.Message));
                if (ex.Details != null)
                {
                    OutputStatusMessage(string.Format("OAuthTokenRequestException Details:\nError: {0}\nDescription: {1}",
                    ex.Details.Error, ex.Details.Description));
                }
            }
            catch (HttpRequestException ex)
            {
                OutputStatusMessage(ex.Message);
            }

            Console.Write("Press enter to exit");
            Console.ReadLine();
        }

        // List catalogs
        public static string CatalogsUri = BmcUri + "/catalogs";
        public static string CatalogUri = CatalogsUri + "/{1}";        
        public static IEnumerable<Catalog> ListCatalogs()
        {
            string url = string.Format(CatalogsUri, MerchantId);
            CatalogCollection catalogs = Request<CatalogCollection>("GET", url);
            return catalogs?.Catalogs ?? new List<Catalog>();
        }

        // List products
        public static string ListUri = BmcUri + "/products";
        public static string ListQueryString = "?max-results=2&alt=json"; // max-results set to 2 to test paging, this would be set to a higher value in a real world scenario based on your needs
        public static string ListQueryStringWithStartToken = "?max-results=2&alt=json&start-token={1}";
        public static IEnumerable<Product> ListProducts()
        {
            string url = string.Format(ListUri + ListQueryString, MerchantId);
            while (!string.IsNullOrEmpty(url))
            {
                ProductCollection productCollection = Request<ProductCollection>("GET", url);
                foreach (Product product in productCollection.Resources)
                {
                    yield return product;
                }

                if (!string.IsNullOrEmpty(productCollection.nextPageToken))
                {
                    url = string.Format(ListUri + ListQueryStringWithStartToken, MerchantId, productCollection.nextPageToken);
                }
                else
                {
                    url = null;
                }
            }
        }

        // Add
        public static string AddProductUri = BmcUri + "/products";
        public static string AddProductQueryString = "?bmc-catalog-id={1}&alt=json";
        public static Product AddProduct(ulong catalogId, Product product)
        {
            string url = string.Format(AddProductUri + AddProductQueryString, MerchantId, catalogId);
            return Request<Product>("POST", url, product);
        }

        // Get
        public static string GetUri = BmcUri + "/products/{1}";
        public static string GetQueryString = "?alt=json";
        public static Product GetProduct(string productId)
        {
            string url = string.Format(GetUri + GetQueryString, MerchantId, productId);
            return Request<Product>("GET", url);
        }

        // Delete
        public static string DeletetUri = BmcUri + "/products/{1}";
        public static string DeleteQueryString = "?alt=json";
        public static void DeleteProduct(string productId)
        {
            string url = string.Format(DeletetUri + DeleteQueryString, MerchantId, productId);
            ContentError conentError = Request<ContentError>("DELETE", url);
            if (conentError != null)
            {
                throw new Exception(conentError.Error.ToString());
            }
        }

        private static Product GetTestProduct(string titleFormat)
        {
            string id = Guid.NewGuid().ToString();
            return new Product()
            {
                Availability = "in stock",
                Channel = ProductChannel.Online.ToString(),
                Condition = ProductCondition.New.ToString(),
                ContentLanguage = "en",
                Link = "http://www.contoso.com/apperal/men/tshirts.htm",
                ImageLink = "http://www.contoso.com/pics/tees.jpg",
                OfferId = id,
                Price = new Price()
                {
                    Currency = "USD",
                    Value = (decimal)1205.00
                },
                TargetCountry = "US",
                Title = string.Format(titleFormat, id),
                IdentifierExists = false,
                ExpirationDate = DateTime.UtcNow.AddDays(45).ToString("O")
            };
        }

        /// <summary>
        /// Use reflection to output the properties of the specified
        /// value to the console
        /// </summary>
        /// <param name="value"></param>
        private static void Print(object value)
        {
            Type type = value.GetType();
            PropertyInfo[] properties = type.GetProperties();
            foreach (PropertyInfo property in properties)
            {
                Console.WriteLine("\t{0}: {1}", property.Name, property.GetValue(value));
            }
        }

        protected static T Request<T>(string method, string url, T instance = default(T))
        {
            try
            {
                HttpWebRequest request = (HttpWebRequest)WebRequest.Create(url);
                request.Method = method;
                request.Headers = new WebHeaderCollection
                {
                    { "AuthenticationToken", OAuth.OAuthTokens.AccessToken },
                    { "DeveloperToken", DeveloperToken }
                };
                request.ContentType = "application/json";

                if(instance != null)
                {
                    string json = JsonConvert.SerializeObject(instance);
                    request.ContentLength = json.Length;
                    using (Stream requestStream = request.GetRequestStream())
                    {
                        StreamWriter writer = new StreamWriter(requestStream);
                        writer.Write(json);
                        writer.Close();
                    }
                }

                HttpWebResponse response = (HttpWebResponse)request.GetResponse();
                T result = default(T);
                using (Stream responseStream = response.GetResponseStream())
                {
                    var reader = new StreamReader(responseStream);
                    var jsonOut = reader.ReadToEnd();
                    reader.Close();
                    result = JsonConvert.DeserializeObject<T>(jsonOut);
                }

                return result;
            }
            catch (WebException e)
            {
                HandleWebException(e);
                return default(T);
            }
        }

        private static void HandleWebException(WebException webException)
        {
            Console.WriteLine("\n" + webException.Message);

            HttpWebResponse response = (HttpWebResponse)webException.Response;

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
                        ContentError contentError = JsonConvert.DeserializeObject<ContentError>(json);

                        Console.WriteLine("HTTP status code: " + contentError.Error.Code);

                        foreach (Error error in contentError.Error.Errors)
                        {
                            Console.WriteLine("reason: {0}\nmessage: {1}\nlocation type: {2}\nlocation: {3}\n",
                                error.Reason, error.Message, error.LocationType, error.Location);
                        }
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

        /// <summary>
        /// Write to the console by default.
        /// </summary>
        /// <param name="msg">The message sent to console output.</param>
        private static void OutputStatusMessage(String msg)
        {
            Console.WriteLine(msg);
        }

        private static OAuthDesktopMobileAuthCodeGrant AuthenticateWithOAuth()
        {
            var oAuthDesktopMobileAuthCodeGrant = new OAuthDesktopMobileAuthCodeGrant(ClientId);

            // It is recommended that you specify a non guessable 'state' request parameter to help prevent
            // cross site request forgery (CSRF). 
            oAuthDesktopMobileAuthCodeGrant.State = ClientState;

            string refreshToken;

            // If you have previously securely stored a refresh token, try to use it.
            if (GetRefreshToken(out refreshToken))
            {
                AuthorizeWithRefreshTokenAsync(oAuthDesktopMobileAuthCodeGrant, refreshToken).Wait();
            }
            else
            {
                // You must request user consent at least once through a web browser control. 
                // Call the GetAuthorizationEndpoint method of the OAuthDesktopMobileAuthCodeGrant instance that you created above.
                Console.WriteLine(string.Format(
                    "The Microsoft Advertising user must provide consent for your application to access their accounts.\n" +
                    "Open a new web browser and navigate to {0}.\n\n" +
                    "After the user has granted consent in the web browser for the application to access their accounts, " +
                    "please enter the response URI that includes the authorization 'code' parameter: \n", oAuthDesktopMobileAuthCodeGrant.GetAuthorizationEndpoint()));

                // Request access and refresh tokens using the URI that you provided manually during program execution.
                var responseUri = new Uri(Console.ReadLine());

                if (oAuthDesktopMobileAuthCodeGrant.State != ClientState)
                    throw new HttpRequestException("The OAuth response state does not match the client request state.");

                oAuthDesktopMobileAuthCodeGrant.RequestAccessAndRefreshTokensAsync(responseUri).Wait();
            }

            // It is important to save the most recent refresh token whenever new OAuth tokens are received. 
            // You will want to subscribe to the NewOAuthTokensReceived event handler. 
            // When calling Microsoft Advertising services with ServiceClient<TService>, BulkServiceManager, or ReportingServiceManager, 
            // each instance will refresh your access token automatically if they detect the AuthenticationTokenExpired (109) error code. 
            oAuthDesktopMobileAuthCodeGrant.NewOAuthTokensReceived +=
                    (sender, tokens) => SaveRefreshToken(tokens.NewRefreshToken);

            return oAuthDesktopMobileAuthCodeGrant;
        }

        private static bool GetRefreshToken(out string refreshToken)
        {
            var protectedToken = RefreshToken;

            if (string.IsNullOrEmpty(protectedToken))
            {
                refreshToken = null;
                return false;
            }

            try
            {
                refreshToken = protectedToken.Unprotect();
                return true;
            }
            catch (CryptographicException)
            {
                refreshToken = null;
                return false;
            }
            catch (FormatException)
            {
                refreshToken = null;
                return false;
            }
        }

        private static Task<OAuthTokens> AuthorizeWithRefreshTokenAsync(OAuthDesktopMobileAuthCodeGrant authentication, string refreshToken)
        {
            return authentication.RequestAccessAndRefreshTokensAsync(refreshToken);
        }

        private static void SaveRefreshToken(string newRefreshtoken)
        {
            if (newRefreshtoken != null)
            {
                Settings.Default["RefreshToken"] = newRefreshtoken.Protect();
                Settings.Default.Save();
            }
        }
    }

    /// <summary>
    /// This static class can be used to access and protect a string.
    /// </summary>
    public static class StringProtection
    {
        public static string Protect(this string sourceString)
        {
            var sourceBytes = Encoding.Unicode.GetBytes(sourceString);

            var encryptedBytes = ProtectedData.Protect(sourceBytes, null, DataProtectionScope.CurrentUser);

            return Convert.ToBase64String(encryptedBytes);
        }

        public static string Unprotect(this string protectedString)
        {
            var protectedBytes = Convert.FromBase64String(protectedString);

            var unprotectedBytes = ProtectedData.Unprotect(protectedBytes, null, DataProtectionScope.CurrentUser);

            return Encoding.Unicode.GetString(unprotectedBytes);
        }
    }

    // Data transfer objects
    public class Catalog
    {
        [JsonProperty("id", DefaultValueHandling = DefaultValueHandling.Ignore)]
        public ulong Id { get; set; }

        [JsonProperty("name")]
        public string Name { get; set; }

        [JsonProperty("market", DefaultValueHandling = DefaultValueHandling.Ignore)]
        public string Market { get; set; }

        [JsonProperty("isPublishingEnabled")]
        public Boolean IsPublishingEnabled { get; set; }

        [JsonProperty("isDefault", DefaultValueHandling = DefaultValueHandling.IgnoreAndPopulate)]
        public Boolean IsDefault { get; set; }
    }

    public class CatalogCollection
    {
        [JsonProperty("catalogs")]
        public List<Catalog> Catalogs { get; set; }
    }

    public class ContentError
    {
        [JsonProperty("error")]
        public ErrorCollection Error { get; set; }
    }

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

        public override string ToString()
        {
            return $"Location: {Location}, LocationType: {LocationType}, Domain: {Domain}, Message: {Message}, Reason: {Reason}";
        }
    }

    public class ErrorCollection
    {
        [JsonProperty("code")]
        public string Code { get; set; }

        [JsonProperty("errors")]
        public List<Error> Errors { get; set; }

        [JsonProperty("message")]
        public string Message { get; set; }

        public override string ToString()
        {
            return string.Format("{0}: {1}\r\n{2}", Code, Message, string.Join("\r\n\t", (Errors ?? new List<Error>()).Select(e => e.ToString())));
        }
    }

    public class Price
    {
        [JsonProperty("currency")]
        public string Currency { get; set; }

        [JsonProperty("value")]
        public decimal? Value { get; set; }
    }

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

    public enum ProductChannel
    {
        Online,
        Local
    }

    public class ProductCollection
    {
        [JsonProperty("kind")]  // Set to content#productsListResponse
        public string Kind { get; set; }

        [JsonProperty("nextPageToken")]
        public string nextPageToken { get; set; }

        [JsonProperty("resources")]
        public List<Product> Resources { get; set; }
    }

    public enum ProductCondition
    {
        New,
        Refurbished,
        Used
    }

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

    public class ProductCustomGroup
    {
        [JsonProperty("customGroups")]
        public List<ProductCustomAttribute> Attributes { get; set; }

        [JsonProperty("name")]
        public string Name { get; set; }
    }

    public class ProductDestination
    {
        [JsonProperty("destinationName")]
        public string DestinationName { get; set; }

        [JsonProperty("intention")]
        public string Intention { get; set; }
    }

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

    public class ProductShippingWeight
    {
        [JsonProperty("unit")]
        public string Unit { get; set; }

        [JsonProperty("value")]
        public double? Value { get; set; }
    }

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

    public class UnitPricing
    {
        [JsonProperty("unit")]
        public string Unit { get; set; }

        [JsonProperty("value")]
        public double Value { get; set; }
    }
// -/ end Data transfer objects
}

```

```java
package com.microsoft.contentapi.examples;

import com.fasterxml.jackson.databind.ObjectMapper;

import java.io.*;
import java.lang.reflect.InvocationTargetException;
import java.lang.reflect.Method;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.ProtocolException;
import java.net.URL;
import java.text.SimpleDateFormat;
import java.util.*;

import com.microsoft.contentapi.examples.datatransferobjects.*;

public class ManageProductsExample {
    private static String BaseUri = "https://content.api.bingads.microsoft.com/shopping/v9.1";
    private static String BmcUri = BaseUri + "/bmc/%s";
    private static String ClientState = "ClientStateGoesHere";

    private static String ClientId = "<CLIENTIDGOESHERE>";
    private static String DeveloperToken = "<DEVELOPERTOKENGOESHERE>";
    private static String MerchantId = "<STOREIDGOESHERE>";

    private static String authenticationToken = "<AUTHENTICATIONTOKENGOESHERE>";

    public static void main(String args[]) throws Exception {
        try{
            // Get the default catalog
            Catalog defaultCatalog = retrieveDefaultCatalog();

            // Add a product to catalog
            Product testProduct = createTestProduct("My Test Product %s");
            // if catalog id is not specified the product will be added to the default catalog, here we are specifying the default explicitly
            Product addedProduct = AddProduct(defaultCatalog.getId(), testProduct);
            System.out.println("*** Added product to catalog (catalog.Id=" + defaultCatalog.getId() + ", product.Id=" + addedProduct.getId() + ")***");
            Print(addedProduct);
            System.out.println("*** / End of added product (catalog.Id=" + defaultCatalog.getId() + ", product.Id=" + addedProduct.getId() + ")***");
            System.out.println();

            // Retrieve a product by id
            Product retrievedProduct = GetProduct(addedProduct.getId());
            System.out.println("*** Retrieved product (product.Id=" + retrievedProduct.getId() + ")***");
            Print(retrievedProduct);
            System.out.println("*** / End retreived product (product.Id=" + retrievedProduct.getId() + ")***");
            System.out.println();

            // List products
            System.out.println("*** Listing products ***");
            for (Product product : ListProducts())
            {
                Print(product);
            }
            System.out.println("*** / End of listing products ***");
            System.out.println();

            // Delete product
            System.out.println("*** Deleting Product (" + addedProduct.getId() + ") ***");
            DeleteProduct(addedProduct.getId());
            System.out.println("*** / Deleting Product Done (" + addedProduct.getId() + ") ***");
        }catch(Exception ex) {
            System.out.println(ex.getMessage());
        }
    }

    public static Catalog retrieveDefaultCatalog() throws IOException {
        List<Catalog> catalogs = ListCatalogs();
        for(Catalog catalog : catalogs){
            if(catalog.getIsDefault() == true){
                return catalog;
            }
        }
        return null;
    }

    // List catalogs
    public static String CatalogsUri = BmcUri + "/catalogs";
    public static String CatalogUri = CatalogsUri + "/%s";
    public static List<Catalog> ListCatalogs() throws IOException {
        String url = String.format(CatalogsUri, MerchantId);
        CatalogCollection catalogs = Request("GET", url, null, CatalogCollection.class);
        return catalogs == null ? new LinkedList<Catalog>() : catalogs.getCatalogs();
    }

    // List products
    public static String ListUri = BmcUri + "/products";
    public static String ListQueryString = "?max-results=2&alt=json"; // max-results set to 2 to test paging, this would be set to a higher value in a real world scenario based on your needs
    public static String ListQueryStringWithStartToken = "?max-results=2&alt=json&start-token=%s";
    public static List<Product> ListProducts() throws IOException {
        String url = String.format(ListUri + ListQueryString, MerchantId);
        LinkedList results = new LinkedList();
        while(url != null){
            ProductCollection productCollection = Request("GET", url, null, ProductCollection.class);
            results.addAll(productCollection.getResources());

            if(productCollection.nextPageToken != null){
                url = String.format(ListUri + ListQueryStringWithStartToken, MerchantId, productCollection.nextPageToken);
            }else{
                url = null;
            }
        }
        return results;
    }

    // Add
    public static String AddProductUri = BmcUri + "/products";
    public static String AddProductQueryString = "?bmc-catalog-id=%s&alt=json";
    public static Product AddProduct(long catalogId, Product product) throws IOException {
        String url = String.format(AddProductUri + AddProductQueryString, MerchantId, catalogId);
        return Request("POST", url, product, Product.class);
    }

    // Get
    public static String GetUri = BmcUri + "/products/%s";
    public static String GetQueryString = "?alt=json";
    public static Product GetProduct(String productId) throws IOException {
        String url = String.format(GetUri + GetQueryString, MerchantId, productId);
        return Request("GET", url, null, Product.class);
    }

    // Delete
    public static String DeletetUri = BmcUri + "/products/%s";
    public static String DeleteQueryString = "?alt=json";
    public static void DeleteProduct(String productId) throws Exception {
        String url = String.format(DeletetUri + DeleteQueryString, MerchantId, productId);
        ContentError contentError = Request("DELETE", url, null, ContentError.class);
        if (contentError != null)
        {
            ErrorCollection error = contentError.getError();
            throw new Exception(error.toString());
        }
    }

    protected static Product createTestProduct(String titleFormat){
        String id = UUID.randomUUID().toString();
        Product product = new Product();
        product.setAvailability("in stock");
        product.setChannel("Online");
        product.setCondition("New");
        product.setContentLanguage("en");
        product.setLink("http://www.contoso.com/apperal/men/tshirts.htm");
        product.setImageLink("http://www.contoso.com/pics/tees.jpg");
        product.setOfferId(id);
        Price price = new Price();
        price.setCurrency("USD");
        price.setValue(1205.00);
        product.setPrice(price);
        product.setTargetCountry("US");
        product.setTitle(String.format(titleFormat, id));
        product.setIdentifierExists(false);

        Calendar c = Calendar.getInstance();
        c.setTime(new Date());
        c.add(Calendar.DATE, 45);
        SimpleDateFormat dateFormat = new SimpleDateFormat("yyyy-MM-dd");
        String expiry = dateFormat.format(c.getTime()) + "T17:00:00.0000000Z";
        product.setExpirationDate(expiry);

        return product;
    }

    /***
     * Use reflection to output the gettable properties of the
     * specified value
     * @param value
     * @throws InvocationTargetException
     * @throws IllegalAccessException
     */
    protected static void Print(Object value) throws InvocationTargetException, IllegalAccessException {
        Class<?> clazz = value.getClass();
        Method[] methods = clazz.getDeclaredMethods();
        for(Method method : methods){
            String methodName = method.getName();
            if(methodName.startsWith("get")){
                Object propertyValue = method.invoke(value);
                if(propertyValue != null){
                    System.out.println(methodName.substring(3, methodName.length()) + ": " + propertyValue.toString());
                }
            }
        }
    }

    protected static <T> T Request(String method, String uri, T instance, Class<T> clazz) throws IOException {
        T result = null;
        ObjectMapper jsonSerializer = new ObjectMapper();
        HttpURLConnection connection = null;
        InputStream inputStream = null;
        BufferedReader reader = null;

        try{
            URL url = new URL(uri);
            connection = (HttpURLConnection)url.openConnection();
            connection.setRequestMethod(method);
            connection.setRequestProperty("AuthenticationToken", authenticationToken);
            connection.setRequestProperty("DeveloperToken", DeveloperToken);
            connection.setRequestProperty("Content-Type", "application/json");

            connection.setDoOutput(true);
            connection.setDoInput(true);
            connection.setUseCaches(false);

            if(instance != null){
                String json = jsonSerializer.writeValueAsString(instance);
                OutputStreamWriter outputStream = new OutputStreamWriter(connection.getOutputStream());
                outputStream.write(json);
                outputStream.close();
            }

            int statusCode = connection.getResponseCode();
            if(statusCode >= HttpURLConnection.HTTP_BAD_REQUEST){
                inputStream = connection.getErrorStream();
            }else{
                inputStream = connection.getInputStream();
            }

            StringBuffer response = new StringBuffer();
            reader = new BufferedReader(new InputStreamReader(inputStream));
            char[] buffer = new char[1024];
            int length = 0;
            while((length = reader.read(buffer)) != -1){
                response.append(new String(buffer, 0, length));
            }
            if (statusCode >= HttpURLConnection.HTTP_BAD_REQUEST) {
                if (statusCode < HttpURLConnection.HTTP_INTERNAL_ERROR) {
                    ContentError errors = jsonSerializer.readValue(response.toString(), ContentError.class);
                    throw new Exception(errors.getError().toString());
                }
                else {
                    throw new Exception(response.toString());
                }
            }
            String responseJson = response.toString();
            if(responseJson.length() > 0){
                result = jsonSerializer.readValue(responseJson, clazz);
            }
        } catch (ProtocolException e) {
            e.printStackTrace();
        } catch (MalformedURLException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        } catch (Exception e) {
            e.printStackTrace();
        } finally {
            if (connection != null) {
                connection.disconnect();
            }

            if (reader != null) {
                reader.close();
            }

            if (inputStream != null) {
                inputStream.close();
            }
        }

        return result;
    }
}

// Catalog.java
package com.microsoft.contentapi.examples.datatransferobjects;

import com.fasterxml.jackson.annotation.JsonInclude;
import com.fasterxml.jackson.databind.annotation.JsonDeserialize;

@JsonInclude(JsonInclude.Include.NON_DEFAULT)
public class Catalog
{
    private long id;
    private String name;
    private String market;
    @JsonDeserialize(using=StringBooleanDeserializer.class)
    private Boolean isPublishingEnabled;
    @JsonDeserialize(using=StringBooleanDeserializer.class)
    private Boolean isDefault;

    public long getId() { return this.id; }
    public void setId(long value) { this.id = value; }

    public String getName() { return this.name; }
    public void setName(String value) { this.name = value; }

    public String getMarket() { return this.market; }
    public void setMarket(String value) { this.market = value; }

    public Boolean getIsPublishingEnabled() { return this.isPublishingEnabled; }
    public void setIsPublishingEnabled(Boolean value) { this.isPublishingEnabled = value; }

    public Boolean getIsDefault() { return this.isDefault; }
    public void setIsDefault(Boolean value) { this.isDefault = value; }
}

// CatalogCollection.java
package com.microsoft.contentapi.examples.datatransferobjects;

import java.util.List;

public class CatalogCollection
{
    private List<Catalog> catalogs;

    public List<Catalog> getCatalogs() { return this.catalogs; }
    public void setCatalogs(List<Catalog> value) { this.catalogs = value; }
}

// ContentError.java
package com.microsoft.contentapi.examples.datatransferobjects;

public class ContentError
{
    private ErrorCollection error;

    public ErrorCollection getError() { return this.error; }
}

// Error.java
package com.microsoft.contentapi.examples.datatransferobjects;

public class Error
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

// ErrorCollection.java
package com.microsoft.contentapi.examples.datatransferobjects;

import java.util.List;

public class ErrorCollection
{
    private List<Error> errors;

    public List<Error> getErrors() { return this.errors; }

    public String toString(){
        String result = "";
        for(int i = 0; i < errors.size(); i++){
            if(i != 0){
                result += ", ";
            }
            result += errors.get(i).getMessage();
        }
        return result;
    }
}

// Price.java
package com.microsoft.contentapi.examples.datatransferobjects;

public class Price
{
    private String currency;
    private Double value;

    public String getCurrency() { return this.currency; }
    public void setCurrency(String value) { this.currency = value; }

    public Double getValue() { return this.value; }
    public void setValue(Double value) { this.value = value; }
}

// Product.java
package com.microsoft.contentapi.examples.datatransferobjects;

import com.fasterxml.jackson.annotation.JsonProperty;
import com.fasterxml.jackson.databind.annotation.JsonDeserialize;

import java.util.List;

public class Product
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

// ProductCollection.java
package com.microsoft.contentapi.examples.datatransferobjects;

import java.util.List;

public class ProductCollection {
    public String kind;
    public String nextPageToken;
    public List<Product> resources;

    public List<Product> getResources(){
        return resources;
    }
    public void setResources(List<Product> value){
        resources = value;
    }
}

// ProductCustomAttribute.java
package com.microsoft.contentapi.examples.datatransferobjects;

public class ProductCustomAttribute
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

// ProductCustomGroup.java
package com.microsoft.contentapi.examples.datatransferobjects;

import com.fasterxml.jackson.annotation.JsonProperty;
import java.util.List;

public class ProductCustomGroup
{
    @JsonProperty("customGroups")
    private List<ProductCustomAttribute> attributes;
    private String name;

    public List<ProductCustomAttribute> getAttributes() { return this.attributes; }
    public void setAttributes(List<ProductCustomAttribute> value) { this.attributes = value; }

    public String getName() { return this.name; }
    public void setName(String value) { this.name = value; }
}

// ProductDestination.java
package com.microsoft.contentapi.examples.datatransferobjects;

public class ProductDestination
{
    private String destinationName;
    private String intention;

    public String getDestinationName() { return this.destinationName; }
    public void setDestinationName(String value) { this.destinationName = value; }

    public String getIntention() { return this.intention; }
    public void setIntention(String value) { this.intention = value; }
}

// ProductShippingWeight.java
package com.microsoft.contentapi.examples.datatransferobjects;

public class ProductShippingWeight
{
    private String unit;
    private Double value;

    public String getUnit() { return this.unit; }
    public void setUnit(String value) { this.unit = value; }

    public Double getValue() { return this.value; }
    public void setValue(Double value) { this.value = value; }
}

// ProductTax.java
package com.microsoft.contentapi.examples.datatransferobjects;

import com.fasterxml.jackson.databind.annotation.JsonDeserialize;

public class ProductTax
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

// StringBooleanDeserializer.java
package com.microsoft.contentapi.examples.datatransferobjects;

import com.fasterxml.jackson.core.JsonParser;
import com.fasterxml.jackson.core.JsonProcessingException;
import com.fasterxml.jackson.databind.DeserializationContext;
import com.fasterxml.jackson.databind.JsonDeserializer;

import java.io.IOException;

public class StringBooleanDeserializer extends JsonDeserializer<Boolean> {

    public Boolean deserialize(JsonParser parser, DeserializationContext context) throws IOException, JsonProcessingException {
        return !"False".equals(parser.getText());
    }
}

// UnitPricing.java
package com.microsoft.contentapi.examples.datatransferobjects;

public class UnitPricing
{
    private String unit;
    private Double value;

    public String getUnit() { return this.unit; }
    public void setUnit(String value) { this.unit = value; }

    public Double getValue() { return this.value; }
    public void setValue(Double value) { this.value = value; }
}

```

```python
"""Content API Manage Products Example"""
import string
import random
from datetime import datetime, timedelta
import json
import requests

BASE_URI = 'https://content.api.bingads.microsoft.com/shopping/v9.1'
BMC_URI = BASE_URI + '/bmc/{0}'

CLIENT_ID = '<CLIENTIDGOESHERE>'
DEV_TOKEN = '<DEVELOPERTOKENGOESHERE>'
MERCHANT_ID = '<STOREIDGOESHERE>'

AUTHENTICATION_TOKEN = '<AUTHENTICATIONTOKENGOESHERE>'

AUTHENTICATION_HEADERS = {'DeveloperToken': DEV_TOKEN, 'AuthenticationToken': AUTHENTICATION_TOKEN}

def main():
    """The main entry point of this example"""

    try:
        # Get the default catalog
        default_catalog = retrieve_default_catalog()

        # Add a product to catalog
        test_product = create_test_product("My Test Product")
        # if catalog id is not specified the product will be added to the default catalog, here we are specifying the default explicitly
        added_product = add_product(default_catalog['id'], test_product)
        print("*** Added product to catalog (catalog.Id=" + str(default_catalog['id']) + ", product.Id=" + str(added_product['id']) + ")***")
        print_json(added_product)
        print("*** / End of added product (catalog.Id=" + str(default_catalog['id']) + ", product.Id=" + str(added_product['id']) + ")***")
        print()
        
        # Retrieve a product by id
        retrieved_product = get_product(added_product['id'])
        print("*** Retrieved product (product.Id=" + str(retrieved_product['id']) + ")***")
        print_json(retrieved_product)
        print("*** / End retrieved product (product.Id=" + str(retrieved_product['id']) + ")***")
        print()

        # List products
        print("*** Listing products ***")
        for product in list_products():
            print_json(product)
        print("*** / End listing producst ***")
        print()

        # Delete product
        print("*** Deleting product (" + str(added_product['id']) + ")***")
        delete_product(added_product['id'])
        print("*** / Deleting product Done (" + str(added_product['id']) + ")***")
    except Exception as ex:
        raise ex

def retrieve_default_catalog():
    """Retrieve the default catalog"""
    catalogs = list_catalogs()
    for catalog in catalogs:
        if catalog['isDefault']:
            return catalog
    return None

# List catalogs
CATALOGS_URI = BMC_URI + "/catalogs"
def list_catalogs():
    """list catalogs for the current merchant"""
    url = CATALOGS_URI.format(MERCHANT_ID)
    response = requests.get(url, headers=AUTHENTICATION_HEADERS)
    response.raise_for_status()
    return json.loads(response.text)['catalogs']

# List products
LIST_PRODUCTS_URI = BMC_URI + "/products"
# max-results set to 2 to test paging, this would be set to a
# higher value in a real world scenario based on your needs
LIST_PRODUCTS_QUERYSTRING = "?max-results=2&alt=json"
LIST_PRODUCST_START_TOKEN_QUERYSTRING = "?max-results=2&alt=json&start-token={1}"
def list_products(next_page_token=None):
    """List products"""    
    url = (LIST_PRODUCTS_URI + LIST_PRODUCTS_QUERYSTRING).format(MERCHANT_ID)
    results = []

    while url is not None:
        response = requests.get(url, headers=AUTHENTICATION_HEADERS)
        response.raise_for_status()
        products_response = json.loads(response.text)
        for product in products_response['resources']:
            results.append(product)
        if 'nextPageToken' in products_response:
            url = (LIST_PRODUCTS_URI + LIST_PRODUCST_START_TOKEN_QUERYSTRING).format(MERCHANT_ID, products_response['nextPageToken'])
        else:
            url = None
    return results   

ADD_PRODUCT_URI = BMC_URI + "/products"
ADD_PRODUCT_QUERY_STRING = "?bmc-catalog-id={1}&alt=json"
def add_product(catalog_id, product):
    """Add a product"""
    url = (ADD_PRODUCT_URI + ADD_PRODUCT_QUERY_STRING).format(MERCHANT_ID, catalog_id)
    response = requests.post(url, headers=AUTHENTICATION_HEADERS, data=json.dumps(product))
    response.raise_for_status()
    return json.loads(response.text)

GET_PRODUCT_URI = BMC_URI + "/products/{1}"
GET_PRODUCT_QUERY_STRING = "?alt=json"
def get_product(product_id):
    """Get an existing product"""
    url = (GET_PRODUCT_URI + GET_PRODUCT_QUERY_STRING).format(MERCHANT_ID, product_id)
    response = requests.get(url, headers=AUTHENTICATION_HEADERS)
    response.raise_for_status()
    return json.loads(response.text)

DELETE_PRODUCT_URI = BMC_URI + "/products/{1}"
DELETE_PRODUCT_QUERY_STRING = "?alt=json"
def delete_product(product_id):
    """Delete a product"""
    url = (DELETE_PRODUCT_URI + DELETE_PRODUCT_QUERY_STRING).format(MERCHANT_ID, product_id)
    response = requests.delete(url, headers=AUTHENTICATION_HEADERS)
    response.raise_for_status()

def print_json(obj):
    """Print the object as json"""
    print(json.dumps(obj, sort_keys=True, indent=4, separators=(',', ': ')))

def create_test_product(title_prefix):
    """
    Create and return an in memory product for testing.
    You will want to set the values as appropriate for your purposes.
    """
    return {
        'offerId': 'YourUniqueId(' + random_string(16) + ')',
        'title': title_prefix + '(' + random_string(4) + ')',
        'availability': 'in stock',
        'channel': 'Online',
        'condition': 'New',
        'contentLanguage': 'en',
        'link': 'http://www.contoso.com/apperal/men/tshirts.htm',
        'imageLink': 'http://www.contoso.com/pics/tees.jpg',
        'price': {
            'currency': 'USD',
            'value': 1205.00
        },
        'targetCountry': 'US',
        'identifierExists': False,
        'expirationDate': (datetime.utcnow()+timedelta(days=45)).strftime("%Y-%m-%dT%H:%M:%SZ")
    }

def random_string(length=6):
    """Get a random string of characters of the specified length"""
    return ''.join(random.choices(string.ascii_uppercase + string.digits, k=length))

# Main execution
if __name__ == '__main__':
    main()

```

```php
<?php
$clientId = '<CLIENTIDGOESHERE>';
$devToken = '<DEVELOPERTOKENGOESHERE>';
$merchantId = '<STOREIDGOESHERE>';
$authenticationToken = '<AUTHENTICATIONTOKENGOESHERE>';

$baseUri = 'https://content.api.bingads.microsoft.com/shopping/v9.1';
$bmcUri = $baseUri . '/bmc/%s';
$catalogsUri = $bmcUri . "/catalogs";
$catalogUri = $catalogsUri . "/%s";

$productsUri = $bmcUri . '/products';
$productUri = $productsUri . '/%s';

$defaultCatalog = retrieve_default_catalog();

# Add a product to a catalog
$testProduct = create_test_product('My Test Product');
$addedProduct = add_product($defaultCatalog['id'], $testProduct);
echo("*** Added product to catalog (catalog id = " . $defaultCatalog['id'] . ", product id = " . $addedProduct['id'] . ")***\r\n");
printObject($addedProduct);
echo("*** / End of added product to catalog (catalog id = " . $defaultCatalog['id'] . ", product id = " . $addedProduct['id'] . ")***\r\n");

# Retrieve a product
$retrievedProduct = get_product($addedProduct['id']);
echo("*** Retrieved product (product id = " . $retrievedProduct['id'] . ")***\r\n");
printObject($retrievedProduct);
echo("*** / End of retrieved product (product id = " . $retrievedProduct['id'] . ")***\r\n");

# List products
$products = list_products();
echo("*** Listing products ***\r\n");
foreach ($products as $index => $value) {
    printObject($value);
}
echo("*** / End of listing products ***\r\n");

echo("*** Deleting product (" . $addedProduct['id'] . ")***\r\n");
delete_product($addedProduct['id']);
echo("*** / Deleting product done (" . $addedProduct['id'] . ")***\r\n");

function retrieve_default_catalog(){
    $catalogs = list_catalogs();
    $count = count($catalogs);
    for ($i = 0; $i < $count; ++$i){
        $catalog = $catalogs[$i];
        if ($catalog['isDefault']) {
            return $catalog;
        }
    }
}

function list_catalogs(){
    global $merchantId, $catalogsUri;

    $url = sprintf($catalogsUri, $merchantId);
    $result = request('GET', $url);
    if ($result === FALSE) {  
        throw new Exception(var_dump($result));
    } else {
        $catalogs = json_decode($result, TRUE)["catalogs"];
        return $catalogs;
    }    
}

function list_products($nextPageToken = null){
    global $merchantId, $productsUri;
    # max-results set to 2 to test paging, this would be set to a
    # higher value in a real world scenario based on your needs.
    $productsQueryString = '?max-results=2&alt=json';
    $productsStartTokenQueryString = $productsQueryString . '&start-token=%s';

    $url = sprintf($productsUri . $productsQueryString, $merchantId);
    $results = array();
    while ($url !== null) {
        $result = request('GET', $url);
        if ($result === FALSE) {  
            throw new Exception(var_dump($result));
        }
        $productsResponse = json_decode($result, TRUE);
        
        foreach ($productsResponse['resources'] as $key => $value) {
            array_push($results, $value);
        }
        if ($productsResponse !== null && array_key_exists('nextPageToken', $productsResponse)) {
            $url = sprintf($productsUri . $productsStartTokenQueryString, $merchantId, $productsResponse['nextPageToken']);
        } else {
            $url = null;
        }
    }
    return $results;
}

function add_product($catalogId, $product){
    global $merchantId, $productsUri;
    
    $url = sprintf($productsUri . '?bmc-catalog-id=%s&alt=json', $merchantId, $catalogId);
    $result = request('POST', $url, $product);
    if ($result === FALSE) {  
        throw new Exception(var_dump($result));
    } 
    return json_decode($result, TRUE);    
}

function get_product($productId){    
    global $merchantId, $productUri;
    $url = sprintf($productUri . "?alt=json", $merchantId, $productId);
    $result = request('GET', $url);
    if ($result === FALSE) {  
        throw new Exception(var_dump($result));
    } 
    return json_decode($result, TRUE); 
}

function delete_product($productId){
    global $merchantId, $productUri;
    $url = sprintf($productUri . "?alt=json", $merchantId, $productId);
    $result = request('DELETE', $url);
    if ($result === FALSE) {  
        throw new Exception(var_dump($result));
    } 
}

function request($method, $url, $data = null){
    global $devToken, $authenticationToken;
    $options = array(
        'http' => array(
            'method'  => $method,
            'header'  => "AuthenticationToken: $authenticationToken\r\n" .
                        "DeveloperToken: $devToken\r\n" .
                        "Content-type: application/json\r\n"
        )
    );
    $json = null;
    if($data !== null){
        $json = json_encode($data);
        $options['http']['content'] = $json;
    }
    $context  = stream_context_create($options);
    echo("requesting ($method): $url\r\n");
    if($json !== null){
        echo("json data: $json\r\n");
    }
    return file_get_contents($url, FALSE, $context);
}

function create_test_product($titlePrefix){
    $expDate = date_add(new DateTime(), date_interval_create_from_date_string("45 days"));
    return array(
        'offerId' => "YourUniqueId(" . uniqid() . ")",
        'title' => "$titlePrefix (" . uniqid() . ")",
        'availability' => "in stock",
        'channel' => "Online",
        'condition' => "New",
        'contentLanguage' => "en",
        'link' => "http://www.contoso.com/apperal/men/tshirts.htm",
        'imageLink' => "http://www.contoso.com/pics/tees.jpg",
        'price' => array(
            'currency' => 'USD',
            'value' => 5.00,
        ),
        'targetCountry' => 'US',
        'identifierExists' => FALSE,
        'expirationDate' => $expDate->format("Y-m-d\TH:i:s\Z")
    );
}

function printObject($object){
    foreach($object as $prop => $value){
        echo("$prop: $value\r\n");
    }
}

```
