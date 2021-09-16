---
title: "Managing Catalogs Code Example"
description: "Code sample showing how to manage catalogs with the Content API."
author: eric-urban
ms.service: "bing-ads-shopping-content"
ms.topic: "article"
ms.author: eur

dev_langs: 
  - csharp
  - java
  - python
  - php
---

# Managing Catalogs Code Example

This desktop console example shows how to get, add, update, and delete catalogs in the specified store.  

For information about the catalog-related classes used by this example, see [Catalogs](../shopping-content/catalogs-resource.md#catalogs) and [Catalog](../shopping-content/catalogs-resource.md#catalog). For information about working with catalogs, see [Managing your Catalogs](../shopping-content/manage-catalogs.md).

```csharp
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.IO;
using System.Threading.Tasks;
using System.Net;
using Content.OAuth;
using Newtonsoft.Json;           // NuGet Json.NET

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

        // URI templates used to get resources.

        public const string BaseUri = "https://content.api.bingads.microsoft.com/shopping/v9.1";
        public static string BmcUri = BaseUri + "/bmc/{0}";
        public static string CatalogsUri = BmcUri + "/catalogs";
        public static string CatalogUri = CatalogsUri + "/{1}";

        // Replace with your store id.

        public static ulong merchantId = <STOREIDGOESHERE>;

        static void Main(string[] args)
        {
            try
            {
                var headers = GetCredentialHeaders();

                // Build the catalogs endpoint URL.

                var url = string.Format(CatalogsUri, merchantId);

                // Get and print the current list of catalogs.

                var collection = GetResource(url, headers, typeof(CatalogCollection)) as CatalogCollection;
                PrintCatalogs(collection);

                // Add a couple of catalogs.

                var catalogs = AddCatalogs(url, headers);

                // Get and print the current list of catalogs.

                collection = GetResource(url, headers, typeof(CatalogCollection)) as CatalogCollection;
                PrintCatalogs(collection);

                // Update the first catalog that we added
                // to enable it for publishing. When you update the 
                // catalog, you must specify both Name and IsPublishingEnabled.

                Console.WriteLine("*** Updating Catalog ***\n");
                var catalogUrl = string.Format(CatalogUri, merchantId, catalogs[0].Id);
                var catalog = new Catalog()
                {
                    Name = catalogs[0].Name,
                    IsPublishingEnabled = true
                };
                UpdateResource(catalogUrl, headers, catalog);

                // Get and print the updated catalog.

                var updatedCatalog = GetResource(catalogUrl, headers, typeof(Catalog)) as Catalog;
                PrintCatalogDetails(updatedCatalog);

                // Delete the catalogs that we created.

                DeleteCatalogs(CatalogUri, headers, merchantId, catalogs);

                // Get and print the current list of catalogs.

                collection = GetResource(url, headers, typeof(CatalogCollection)) as CatalogCollection;
                PrintCatalogs(collection);
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

        // Gets catalog data from the store.
        
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

        // Adds a catalog to the store.
        
        private static Catalog AddResource(string uri, WebHeaderCollection headers, Catalog catalog)
        {
            var request = (HttpWebRequest)WebRequest.Create(uri);
            request.Method = "POST";
            request.Headers = headers;
            request.ContentType = "application/json";

            var json = JsonConvert.SerializeObject(catalog);
            request.ContentLength = json.Length;
            using (Stream requestStream = request.GetRequestStream())
            {
                StreamWriter writer = new StreamWriter(requestStream);
                writer.Write(json);
                writer.Close();
            }

            var response = (HttpWebResponse)request.GetResponse();

            Catalog catalogOut = null;

            using (Stream responseStream = response.GetResponseStream())
            {
                var reader = new StreamReader(responseStream);
                var jsonOut = reader.ReadToEnd();
                reader.Close();
                catalogOut = JsonConvert.DeserializeObject<Catalog>(jsonOut);
            }

            return catalogOut;
        }

        // Updates a catalog's attributes.
        
        private static ulong UpdateResource(string uri, WebHeaderCollection headers, Catalog catalog)
        {
            var request = (HttpWebRequest)WebRequest.Create(uri);
            request.Method = "PUT";
            request.Headers = headers;
            request.ContentType = "application/json";

            var json = JsonConvert.SerializeObject(catalog);
            request.ContentLength = json.Length;
            using (Stream requestStream = request.GetRequestStream())
            {
                StreamWriter writer = new StreamWriter(requestStream);
                writer.Write(json);
                writer.Close();
            }

            var response = (HttpWebResponse)request.GetResponse();

            Catalog catalogOut = null;

            using (Stream responseStream = response.GetResponseStream())
            {
                var reader = new StreamReader(responseStream);
                var jsonOut = reader.ReadToEnd();
                reader.Close();
                catalogOut = JsonConvert.DeserializeObject<Catalog>(jsonOut);
            }

            return catalogOut.Id;
        }

        // Deletes a catalog from the store.
        
        private static ContentError DeleteResource(string uri, WebHeaderCollection headers)
        {
            var request = (HttpWebRequest)WebRequest.Create(uri);
            request.Method = "DELETE";
            request.ContentType = "application/json";
            request.Headers = headers;

            var response = (HttpWebResponse)request.GetResponse();

            ContentError error = null;

            using (Stream responseStream = response.GetResponseStream())
            {
                var reader = new StreamReader(responseStream);
                var jsonOut = reader.ReadToEnd();
                reader.Close();
                error = JsonConvert.DeserializeObject<ContentError>(jsonOut);
            }

            return error;
        }

        private static List<Catalog> AddCatalogs(string url, WebHeaderCollection headers)
        {
            var catalogs = new List<Catalog>();

            Console.WriteLine("*** Adding Catalogs ***\n");

            // This catalog is not enabled for publishing.

            var catalog = new Catalog()
            {
                Name = "Mens Apparel",
                Market = "en-US",
                IsPublishingEnabled = false
            };

            catalogs.Add(AddResource(url, headers, catalog));

            // This catalog is enabled for publishing.

            catalog = new Catalog()
            {
                Name = "Womens Apparel",
                Market = "en-US",
                IsPublishingEnabled = true
            };

            catalogs.Add(AddResource(url, headers, catalog));

            return catalogs;
        }

        private static void DeleteCatalogs(string uri, WebHeaderCollection headers, ulong merchantId, List<Catalog> catalogs)
        {
            Console.WriteLine("*** Deleting Catalogs ***\n");

            foreach (var catalog in catalogs)
            {
                // Build the endpoint URL.

                var url = string.Format(uri, merchantId, catalog.Id);

                // Delete the catalog from the store.

                var errors = DeleteResource(url, headers);

                if (errors != null)
                {
                    Console.WriteLine("Error deleting catalog: " + catalog.Id);
                    PrintErrors(errors);
                }
                else
                {
                    Console.WriteLine("Deleted catalog: " + catalog.Id);
                }
            }

            Console.WriteLine();
        }

        private static void PrintCatalogs(CatalogCollection collection)
        {
            Console.WriteLine("There are " + collection.Catalogs.Count + " catalogs.\n");

            foreach (Catalog catalog in collection.Catalogs)
            {
                PrintCatalogDetails(catalog);
            }
        }

        // Print catalog details.

        private static void PrintCatalogDetails(Catalog catalog)
        {
            Console.WriteLine("Name: " + catalog.Name);
            Console.WriteLine("ID: " + catalog.Id);
            Console.WriteLine("Market: " + catalog.Market);
            Console.WriteLine("IsDefault: " + catalog.IsDefault);
            Console.WriteLine("IsPublishingEnabled: " + catalog.IsPublishingEnabled);
            Console.WriteLine();
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
}

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
```

```java
package catalogs.capi.microsoft.com;

import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStreamWriter;
import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.ArrayList;
import java.util.List;
import java.util.Map;
import java.util.HashMap;
import java.util.Map.Entry;

// Uses Jackson to serialize and deserialize JSON.

import com.fasterxml.jackson.core.JsonParseException;
import com.fasterxml.jackson.databind.JsonMappingException;
import com.fasterxml.jackson.databind.ObjectMapper;
import com.fasterxml.jackson.annotation.*;
import com.fasterxml.jackson.annotation.JsonInclude.Include;


class Catalogs {

	// Jackson object used to serialize and deserialize JSON.

	private static ObjectMapper jsonMapper = new ObjectMapper();

	private static String accessToken = "<accesstokengoeshere>"; 
    public static String devToken = "<devtokengoeshere>"; 

    // URI templates used to get resources.
    
    public static final String BaseUri = "https://content.api.bingads.microsoft.com/shopping/v9.1";
    public static final String BmcUri = BaseUri + "/bmc/%d";
    public static final String CatalogsUri = BmcUri + "/catalogs";
    public static final String CatalogUri = CatalogsUri + "/%d";


    // Replace with your store ID.
    
    public static long merchantId = <merchantidgoeshere>; 

	// This example shows how to list, add, update, and delete
    // catalogs in the store.
    
	public static void main(String[] args) throws JsonParseException, JsonMappingException, IOException {

		try {
			Map<String, String> headers = getCredentialHeaders();

            String url = String.format(CatalogsUri, merchantId);

            // Get and print the current list of catalogs.

            CatalogCollection collection = (CatalogCollection) getResource(url, headers, CatalogCollection.class);
            printCatalogs(collection);

            // Add a couple of catalogs.

            List<Catalog> addedCatalogs = addCatalogs(url, headers);

            // Get and print the current list of catalogs.

            collection = (CatalogCollection) getResource(url, headers, CatalogCollection.class);
            printCatalogs(collection);

            // Update the first catalog that we added
            // to enable it for publishing. When you update the 
            // catalog, you must specify both Name and IsPublishingEnabled.

            System.out.println("*** Updating Catalog ***\n");
            String catalogUrl = String.format(CatalogUri, merchantId, ((Catalog) addedCatalogs.toArray()[0]).getId());
            Catalog catalog = new Catalog();
            catalog.setName(((Catalog) addedCatalogs.toArray()[0]).getName());
            catalog.setIsPublishingEnabled(true);

            updateResource(catalogUrl, headers, catalog);

            // Get and print the updated catalog.

            Catalog updatedCatalog = (Catalog) getResource(catalogUrl, headers, Catalog.class);
            printCatalogDetails(updatedCatalog);

            // Delete the catalogs that we created.

            deleteCatalogs(CatalogUri, headers, merchantId, addedCatalogs);

            // Get and print the current list of catalogs.

            collection = (CatalogCollection) getResource(url, headers, CatalogCollection.class);
            printCatalogs(collection);
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
    		char[] buffer = new char[2048];
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


    // Adds a Catalog to the store.
    
    private static Catalog addResource(String uri, Map<String, String> headers, Catalog catalog) throws IOException, CapiException 
    {
    	HttpURLConnection connection = null;
    	URL url;
    	InputStream istream = null;
    	OutputStreamWriter ostream = null;
    	BufferedReader reader = null;
    	Catalog catalogOut = null;

    	try {
        	String json = jsonMapper.writeValueAsString(catalog);

    		url = new URL(uri);
    		connection = (HttpURLConnection) url.openConnection();

    		connection.setRequestMethod("POST");
    		connection.setRequestProperty("Content-Type", "application/json");
    		connection.setRequestProperty("Content-Length", String.valueOf(json.length()));

    		for (Entry\<String, String> header : headers.entrySet())
    		{
    			connection.setRequestProperty(header.getKey(), header.getValue());
    		}

    		connection.setDoInput(true);
    		connection.setDoOutput(true);
    		connection.setUseCaches(false);

    		ostream = new OutputStreamWriter(connection.getOutputStream());
    		ostream.write(json);
    		ostream.close();

    		int statusCode = connection.getResponseCode();
    		
    		if (statusCode >= HttpURLConnection.HTTP_BAD_REQUEST) {
        		istream = connection.getErrorStream();
    		}
    		else {
        		istream = connection.getInputStream();
    		}
 
    		StringBuffer response = new StringBuffer();
    		reader = new BufferedReader(new InputStreamReader(istream));
    		char[] buffer = new char[2048];
    		int len = 0;
    		
    		while ((len = reader.read(buffer)) != -1) {
    			response.append(new String(buffer, 0, len));
    		}

    		System.out.println(response);
    		
    		if (statusCode >= HttpURLConnection.HTTP_BAD_REQUEST) {
    			if (statusCode < HttpURLConnection.HTTP_INTERNAL_ERROR) {
    	    		ContentError errors = jsonMapper.readValue(response.toString(), ContentError.class);
    				throw new CapiException("Batch request failed.\n", errors.getError().getErrors());
    			}
    			else {
    				throw new CapiException(response.toString());
    			}
    		}

    		catalogOut = jsonMapper.readValue(response.toString(), Catalog.class);
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

    		if (ostream != null) {
    			ostream.close();
    		}
    	}

    	return catalogOut;
    }

    // Updates a Catalog in the store.
    
    private static Catalog updateResource(String uri, Map<String, String> headers, Catalog catalog) throws IOException, CapiException 
    {
    	HttpURLConnection connection = null;
    	URL url;
    	InputStream istream = null;
    	OutputStreamWriter ostream = null;
    	BufferedReader reader = null;
    	Catalog catalogOut = null;

    	try {
        	String json = jsonMapper.writeValueAsString(catalog);

    		url = new URL(uri);
    		connection = (HttpURLConnection) url.openConnection();

    		connection.setRequestMethod("PUT");
    		connection.setRequestProperty("Content-Type", "application/json");
    		connection.setRequestProperty("Content-Length", String.valueOf(json.length()));

    		for (Entry\<String, String> header : headers.entrySet())
    		{
    			connection.setRequestProperty(header.getKey(), header.getValue());
    		}

    		connection.setDoInput(true);
    		connection.setDoOutput(true);
    		connection.setUseCaches(false);

    		ostream = new OutputStreamWriter(connection.getOutputStream());
    		ostream.write(json);
    		ostream.close();

    		int statusCode = connection.getResponseCode();
    		
    		if (statusCode >= HttpURLConnection.HTTP_BAD_REQUEST) {
        		istream = connection.getErrorStream();
    		}
    		else {
        		istream = connection.getInputStream();
    		}
 
    		StringBuffer response = new StringBuffer();
    		reader = new BufferedReader(new InputStreamReader(istream));
    		char[] buffer = new char[2048];
    		int len = 0;
    		
    		while ((len = reader.read(buffer)) != -1) {
    			response.append(new String(buffer, 0, len));
    		}

    		System.out.println(response);
    		
    		if (statusCode >= HttpURLConnection.HTTP_BAD_REQUEST) {
    			if (statusCode < HttpURLConnection.HTTP_INTERNAL_ERROR) {
    	    		ContentError errors = jsonMapper.readValue(response.toString(), ContentError.class);
    				throw new CapiException("Batch request failed.\n", errors.getError().getErrors());
    			}
    			else {
    				throw new CapiException(response.toString());
    			}
    		}

    		catalogOut = jsonMapper.readValue(response.toString(), Catalog.class);
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

    		if (ostream != null) {
    			ostream.close();
    		}
    	}

    	return catalogOut;
    }

    // Deletes a Catalog from the store.
    
    private static void deleteResource(String uri, Map<String, String> headers) throws IOException, CapiException 
    {
    	HttpURLConnection connection = null;
    	URL url;
    	InputStream istream = null;
    	BufferedReader reader = null;


    	try {
    		url = new URL(uri);
    		connection = (HttpURLConnection) url.openConnection();

    		connection.setRequestMethod("DELETE");
    		connection.setRequestProperty("Accept", "application/json");

    		for (Entry\<String, String> header : headers.entrySet())
    		{
    			connection.setRequestProperty(header.getKey(), header.getValue());
    		}

    		connection.setUseCaches(false);

    		int statusCode = connection.getResponseCode();
    		
    		if (statusCode >= HttpURLConnection.HTTP_BAD_REQUEST) {
    			istream = connection.getErrorStream();

        		StringBuffer response = new StringBuffer();
        		reader = new BufferedReader(new InputStreamReader(istream));
        		char[] buffer = new char[2048];
        		int len = 0;
        		
        		while ((len = reader.read(buffer)) != -1) {
        			response.append(new String(buffer, 0, len));
        		}

        		System.out.println(response);
        		
    			if (statusCode < HttpURLConnection.HTTP_INTERNAL_ERROR) {
    	    		ContentError errors = jsonMapper.readValue(response.toString(), ContentError.class);
    				throw new CapiException("Batch request failed.\n", errors.getError().getErrors());
    			}
    			else {
    				throw new CapiException(response.toString());
    			}
    		}
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
    }

    // Creates a couple of catalogs and adds them 
    // to the store.
    
    private static List<Catalog> addCatalogs(String url, Map<String, String> headers) throws IOException, CapiException
    {
    	List<Catalog> catalogs = new ArrayList<Catalog>();

        System.out.println("*** Adding Catalogs ***\n");

        // This catalog is not enabled for publishing.

        Catalog catalog = new Catalog();
        catalog.setName("Mens Apparel");
        catalog.setMarket("en-US");
        catalog.setIsPublishingEnabled(false);

        catalogs.add(addResource(url, headers, catalog));

        // This catalog is enabled for publishing.

        catalog = new Catalog();
        catalog.setName("Womens Apparel");
        catalog.setMarket("en-US");
        catalog.setIsPublishingEnabled(true);

        catalogs.add(addResource(url, headers, catalog));

        return catalogs;
    }

    // Deletes the specified catalogs from the store.
    
    private static void deleteCatalogs(String uri, Map<String, String> headers, long merchantId, List<Catalog> catalogs) throws Exception
    {
        System.out.println("*** Deleting Catalogs ***\n");

        for (Catalog catalog : catalogs)
        {
            // Build the endpoint URL.

            String url = String.format(uri, merchantId, catalog.getId());

            // Delete the catalog from the store.

            deleteResource(url, headers);
            System.out.println("Deleted catalog: " + catalog.getId());
        }

        System.out.println();
    }

    
    
    // Prints the list of catalogs

    private static void printCatalogs(CatalogCollection collection)
    {
        System.out.println("There are " + collection.getCatalogs().size() + " catalogs.\n");

        for (Catalog catalog : collection.getCatalogs())
        {
            printCatalogDetails(catalog);
        }
    }

    // Print catalog details.

    private static void printCatalogDetails(Catalog catalog)
    {
    	System.out.println("Name: " + catalog.getName());
    	System.out.println("ID: " + catalog.getId());
    	System.out.println("Market: " + catalog.getMarket());
    	System.out.println("IsDefault: " + catalog.getIsDefault());
    	System.out.println("IsPublishingEnabled: " + catalog.getIsPublishingEnabled());
    	System.out.println();
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

// The following define the Catalog classes.

@JsonInclude(Include.NON_DEFAULT)
class Catalog
{
	private long id;
	private String name;
	private String market;
    //@JsonDeserialize(using=StringBooleanDeserializer.class)
	private Boolean isPublishingEnabled;
    //@JsonDeserialize(using=StringBooleanDeserializer.class)
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

class CatalogCollection
{
	private List<Catalog> catalogs;
	
    public List<Catalog> getCatalogs() { return this.catalogs; }
    public void setCatalogs(List<Catalog> value) { this.catalogs = value; }
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
# A simple example that shows how to get all catalogs in a store, 
# add a catalog, update the catalog, and then delete it.

import string
import json
import requests

# Concatenate together these strings to create the endpoint
# to send request to the Content API.

BASE_URI = 'https://content.api.bingads.microsoft.com/shopping/v9.1'
BMC_URI = BASE_URI + '/bmc/{0}'  # {0} will contain the merchant ID 

DEV_TOKEN = '<your dev token goes here>'
MERCHANT_ID = '<your store ID goes here>'

# This example does not show how to get the access token. Copy
# it here from another source.

AUTHENTICATION_TOKEN = "<your access token goes here>"

AUTHENTICATION_HEADERS = {'DeveloperToken': DEV_TOKEN, 'AuthenticationToken': AUTHENTICATION_TOKEN}


# Prints the error that was raised.

def print_error(errors):
    print('The following errors occurred:')
    for error in errors:
        print('Reason: {0}'.format(error['reason']))
        print('Message: {0}'.format(error['message']))
        print()


# Prints the catalog's values.

def print_catalog_values(catalog):
    print('Name: {0} ({1})'.format(catalog['name'], catalog['id']))
    print('Default catalog: {0}'.format(catalog['isDefault']))
    print('Publishing enabled: {0}'.format(catalog['isPublishingEnabled']))
    print('Market: {0}'.format(catalog['market']))
    print()


# Gets a list of catalogs in the merchant's store.

def get_catalogs():
    CATALOGS_URI = BMC_URI + "/catalogs"
    url = CATALOGS_URI.format(MERCHANT_ID)
    print(url)
    response = requests.get(url, headers=AUTHENTICATION_HEADERS)
    response.raise_for_status()
    return json.loads(response.text)['catalogs']


# Print all of the merchant's catalogs.

def print_catalogs():
    catalogs = get_catalogs()
    for catalog in catalogs:
        print_catalog_values(catalog)


# Gets a specific catalog in the merchant's store.

def get_catalog(catalogId):
    CATALOG_URI = BMC_URI + "/catalogs/{1}"
    url = CATALOG_URI.format(MERCHANT_ID, catalogId)
    print(url)
    response = requests.get(url, headers=AUTHENTICATION_HEADERS)
    response.raise_for_status()
    return json.loads(response.text)


# Adds an en-US catalog to the merchant's store.

def add_catalog(catalog_name, isEnabled=False):
    CATALOGS_URI = BMC_URI + "/catalogs"
    url = CATALOGS_URI.format(MERCHANT_ID)
    catalog = {'name': catalog_name, 'market': "en-US", 'isPublishingEnabled': isEnabled}
    response = requests.post(url, headers=AUTHENTICATION_HEADERS, data=json.dumps(catalog))
    response.raise_for_status()
    print('Request activity ID: {0}'.format(response.headers['WebRequestActivityId']))
    return json.loads(response.text)


# Update publishing flag

def update_catalog(catalogId, isEnabled):
    CATALOG_URI = BMC_URI + "/catalogs/{1}"
    url = CATALOG_URI.format(MERCHANT_ID, catalogId)
    catalog = get_catalog(catalogId)
    catalog = {'name': catalog['name'], 'isPublishingEnabled': isEnabled}
    response = requests.put(url, headers=AUTHENTICATION_HEADERS, data=json.dumps(catalog))
    response.raise_for_status()
    return json.loads(response.text)


# Delete catalog

def delete_catalog(catalogId):
    CATALOG_URI = BMC_URI + "/catalogs/{1}"
    url = CATALOG_URI.format(MERCHANT_ID, catalogId)
    response = requests.delete(url, headers=AUTHENTICATION_HEADERS)
    response.raise_for_status()


def main():
    # The main entry point of this example

    try:

        print("*** Catalogs ***")
        print_catalogs()

        # Adds a catalog with publishing disabled.

        print("*** Adding catalog ***")
        catalog = add_catalog('Everything Sale')
        print_catalog_values(catalog)

        # Gets the catalog that was just added.

        msg = "*** Getting catalog {0} ***".format(catalog['id'])
        print(msg)
        catalog = get_catalog(catalog['id'])
        print_catalog_values(catalog)

        # Enable the catalog for publishing.

        msg = "*** Updating catalog {0} ***".format(catalog['id'])
        print(msg)
        catalog = update_catalog(catalog['id'], True)
        print_catalog_values(catalog)

        # Delete the catalog that was added.

        msg = "*** Deleting catalog {0} ***\n".format(catalog['id'])
        print(msg)
        delete_catalog(catalog['id'])

        print("*** Catalogs ***")
        print_catalogs()

    except Exception as ex:
        print('Request activity ID: {0}'.format(ex.response.headers['WebRequestActivityId']))
        print_error(json.loads(ex.response.text)['error']['errors'])
        raise ex

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

# List catalogs
echo("*** List catalogs ***\r\n");
$catalogs = list_catalogs();
$count = count($catalogs);
for ($i = 0; $i < $count; $i++) {
    printObject($catalogs[$i]);
}
echo("*** / End of catalogs list ***\r\n");
echo("\r\n");

# Add catalog
$testCatalog = add_catalog("Test Catalog (" . uniqid() . ")");
echo("*** Added test catalog (catalog.Id=" . $testCatalog['id'] . ")***\r\n");
echo printObject($testCatalog);
echo("*** / End of added test catalog (catalog.Id=" . $testCatalog['id'] . ")***\r\n");
echo("\r\n");

# Update catalog
$testCatalog['name'] = "Updated  - " . $testCatalog['name'];
$updatedCatalog = update_catalog($testCatalog);
echo("*** Updated catalog " . $updatedCatalog['id'] . "***\r\n");
printObject($updatedCatalog);
echo("*** / End of updated catalog " . $updatedCatalog['id'] . "***\r\n");
echo("\r\n");

# Delete catalog
echo("*** Deleting catalog " . $updatedCatalog['id'] . "***\r\n");
delete_catalog($updatedCatalog['id']);
echo("\r\n");

echo("*** List catalogs after delete ***\r\n");
$catalogs = list_catalogs();
$count = count($catalogs);
for ($i = 0; $i < $count; $i++) {
    printObject($catalogs[$i]);
}
echo("*** / End of catalogs list ***");

function list_catalogs(){
    global $merchantId, $catalogsUri;

    $url = sprintf($catalogsUri, $merchantId);
    $result = request('GET', $url);
    if ($result === FALSE) {  
        throw new Exception(var_dump($result));
    } else {
        $catalogs = json_decode($result, true)["catalogs"];
        return $catalogs;
    }    
}

function add_catalog($catalogName){
    global $merchantId, $catalogsUri;

    $url = sprintf($catalogsUri, $merchantId);
    $result = request('POST', $url, array(
        'name' => $catalogName,
        'market' => 'en-US',
        'isPublishingEnabled' => true
    ));
    if ($result === FALSE) {  
        throw new Exception(var_dump($result));
    } else {
        echo("add catalog response: " . var_dump($result) . "\r\n");
        return json_decode($result, true);        
    } 
}

function update_catalog($catalog){
    global $merchantId, $catalogUri;

    $url = sprintf($catalogUri, $merchantId, $catalog['id']);
    $result = request('PUT', $url, $catalog);
    if ($result === FALSE) {  
        throw new Exception(var_dump($result));
    } else {
        echo("update catalog response: " . var_dump($result) . "\r\n");
        return json_decode($result, true);        
    } 
}

function delete_catalog($catalogId){
    global $merchantId, $catalogUri;

    $url = sprintf($catalogUri, $merchantId, $catalogId);
    $result = request('DELETE', $url);
    if ($result === FALSE) {  
        throw new Exception(var_dump($result));
    } else {
        return json_decode($result, true);        
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
    if ($data !== null) {
        $json = json_encode($data);
        $options['http']['content'] = $json;
    }
    $context  = stream_context_create($options);
    echo("requesting ($method): $url\r\n");
    if ($json !== null) {
        echo("json data: $json\r\n");
    }
    return file_get_contents($url, false, $context);
}

function printObject($object){
    foreach ($object as $prop => $value) {
        echo("$prop: $value\r\n");
    }
}

```
