---
title: "Subaccount Code Example"
description: Shows hot to list, get, and update hotel subaccounts.
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers

dev_langs:
  - csharp
  - java
  - python
---
# Subaccount code example

The following example shows the requests you use to list, get, and update subaccounts. 

For details about the elements used in this example, see the [reference](../hotel-service/reference.md) section. 

For additional information, see [Working with subaccounts](../hotel-service/manage-hotel-campaigns.md#workingwithsubaccounts). 

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
using Newtonsoft.Json;       // NuGet Json.NET
using Newtonsoft.Json.Linq;

namespace ListSubAccounts
{
    class Program
    {
        // The client ID and secret that you were given when you
        // registered your application.

        private static string clientId = "<clientidgoeshere>";
        private static string clientSecret = null;  // Desktop app, so there's no secret
        private static string storedRefreshToken = "<refreshtokengoeshere>"; 

        private static string customerId = "<customeridgoeshere>";
        private static string accountId = "<accountidgoeshere>";


        private static string BaseUri = "https://partner.api.sandbox.bingads.microsoft.com/Travel/V1";
        private static string SubaccountsTemplate = "/Customers({0})/Accounts({1})/SubAccounts";
        private static string SubaccountTemplate = "/Customers({0})/Accounts({1})/SubAccounts('{2}')";


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

                    Console.WriteLine("**** Getting the list of subaccounts ****\n");

                    var uri = string.Format(BaseUri + SubaccountsTemplate, customerId, accountId);
                    var collection = GetResource(uri, headers, typeof(CollectionResponse)) as CollectionResponse;
                    PrintSubAccounts(collection.value);

                    // Creates a list of bid multipliers.

                    //var multipliers = new List<object>();
                    //multipliers.Add(new UserCountryMultiplier() {
                    //    Factor = 1.1,
                    //    Countries = new[] { "US" }.ToList<string>(),
                    //    type = "#Model.UserCountryMultiplier"
                    //});
                    //multipliers.Add(new SiteMultiplier() {
                    //    Factor = .85,
                    //    Sites = new[] { "LocalUniversal", "MapResults" }.ToList<string>(),
                    //    type = "#Model.SiteMultiplier"
                    //});
                    //multipliers.Add(new DeviceTypeMultiplier() {
                    //    Factor = .65,
                    //    DeviceTypes = new[] { "Desktop" }.ToList<string>(),
                    //    type = "#Model.DeviceMultiplier"
                    //});
                    //multipliers.Add(new LengthOfStayMultiplier() {
                    //    Factor = 1.3,
                    //    MinimumNumberOfNights = 5,
                    //    type = "#Model.LengthOfStayMultiplier"
                    //});
                    ////multipliers.Add(new DateTypeMultiplier() {
                    ////    Factor = .35,
                    ////    DateType = "Selected",
                    ////    type = "#Model.DateTypeMultiplier"
                    ////});
                    //multipliers.Add(new CheckinDayOfWeekMultiplier() {
                    //    Factor = 1.2,
                    //    DaysOfWeek = new[] { "Thursday", "Friday", "Saturday" }.ToList<string>(),
                    //    type = "#Model.CheckinDayOfWeekMultiplier"
                    //});
                    //multipliers.Add(new CheckinDayOfWeekMultiplier()
                    //{
                    //    Factor = .9,
                    //    DaysOfWeek = new[] { "Sunday", "Monday" }.ToList<string>(),
                    //    type = "#Model.CheckinDayOfWeekMultiplier"
                    //});
                    //multipliers.Add(new AdvanceWindowBookingMultiplier() {
                    //    Factor = 1.3,
                    //    MinimumNumberOfDays = 3,
                    //    type = "#Model.AdvanceBookingWindowMultiplier"
                    //});

                    //SubAccount subaccount = new SubAccount()
                    //{
                    //    Name = "scottwhi-test",
                    //    DailyBudget = new Budget()
                    //    {
                    //        Amount = 125.25
                    //    },
                    //    MaximumBid = new FixedBid()
                    //    {
                    //        Amount = 5.0,
                    //        type = "#Model.FixedBid"
                    //    },
                    //    Bid = new FixedBid()
                    //    {
                    //        Amount = 2.75,
                    //        type = "#Model.FixedBid"
                    //    },
                    //    BidMultipliers = multipliers
                    //};

                    //// NOTE: Adding the subaccount will fail because Bing currently allows only one subaccount.

                    //Console.WriteLine("**** Adding a subaccounts ****\n");

                    //var subaccountId = AddUpdateResource(uri, headers, subaccount, typeof(SubAccount)) as string;
                    //Console.WriteLine("Added subaccount {0}.\n", subaccountId); // ID of new subaccount

                    //Console.WriteLine("**** Getting the list of subaccounts after adding a subaccount ****\n");

                    //collection = GetResource(uri, headers, typeof(CollectionResponse)) as CollectionResponse;
                    //PrintSubAccounts(collection.value);


                    var subaccountId = ((JObject)collection.value[0]).ToObject<SubAccount>().Id;


                    // Specify only the fields of the subaccount that you want to update.

                    SubAccount subaccountToUpdate = new SubAccount()
                    {
                        Id = subaccountId,
                        //DailyBudget = new Budget()
                        //{
                        //    Amount = 125.25
                        //},
                        //MaximumBid = new FixedBid()
                        //{
                        //    Amount = 10.0,
                        //    type = "#Model.FixedBid"
                        //},
                        Bid = new FixedBid()
                        {
                            Amount = 3.48,
                            type = "#Model.FixedBid"
                        },
                        //BidMultipliers = multipliers
                    };

                    Console.WriteLine("**** Updating subaccount {0} ****\n", subaccountId);

                    uri = string.Format(BaseUri + SubaccountTemplate, customerId, accountId, subaccountId);
                    AddUpdateResource(uri, headers, subaccountToUpdate, typeof(SubAccount), "PATCH");

                    Console.WriteLine("**** Getting subaccount {0} after update ****\n", subaccountId);

                    var updatedSubaccount = GetResource(uri, headers, typeof(SubAccount)) as SubAccount;
                    PrintSubAccount(updatedSubaccount);
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


        // Gets the requested resource.

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


        // Adds or updates the resource.

        private static string AddUpdateResource(string uri, WebHeaderCollection headers, object resource, Type type, string verb = "POST")
        {
            var request = (HttpWebRequest)WebRequest.Create(uri);
            request.Method = verb;
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

            if (verb == "POST")
            {
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
            else
            {
                return null;
            }
        }



        private static void PrintSubAccounts(List<object> subaccounts)
        {
            foreach (var subaccount in subaccounts)
            {
                var s = ((JObject)subaccount).ToObject<SubAccount>();

                PrintSubAccount(s);
            }
        }


        private static void PrintSubAccount(SubAccount subaccount)
        {
            Console.WriteLine("Campaign name: " + subaccount.Name);
            Console.WriteLine("Campaign ID: " + subaccount.Id);
            Console.WriteLine("Campaign status: " + subaccount.Status);
            Console.WriteLine("Daily budget: " + subaccount.DailyBudget.Amount);

            if (subaccount.MaximumBid != null)
            {
                Console.WriteLine("Maximum bid: " + subaccount.MaximumBid.Amount);
            }

            var b = ((JObject)subaccount.Bid).ToObject<Bid>();
            Console.WriteLine("{0}: {1}", (b.GetBidType() == "FixedBid") ? "Fixed bid" : "Percentage bid", b.Amount);

            if (subaccount.BidMultipliers != null && subaccount.BidMultipliers.Count > 0)
            {
                foreach (var multiplier in subaccount.BidMultipliers)
                {
                    var m = ((JObject)multiplier).ToObject<Multiplier>();
                    Console.WriteLine("{0}: {1}", m.GetMultiplierType(), m.Factor);

                    switch (m.GetMultiplierType())
                    {
                        case "UserCountryMultiplier":
                            {
                                var userCountryMultiplier = ((JObject)multiplier).ToObject<UserCountryMultiplier>();

                                foreach (var country in userCountryMultiplier.Countries)
                                {
                                    Console.WriteLine("\t" + country);
                                }
                                break;
                            }
                        case "SiteMultiplier":
                            {
                                var siteMultiplier = ((JObject)multiplier).ToObject<SiteMultiplier>();

                                foreach (var site in siteMultiplier.Sites)
                                {
                                    Console.WriteLine("\t" + site);
                                }
                                break;
                            }
                        case "DeviceMultiplier":
                            {
                                var deviceMultiplier = ((JObject)multiplier).ToObject<DeviceTypeMultiplier>();

                                foreach (var device in deviceMultiplier.DeviceTypes)
                                {
                                    Console.WriteLine("\t" + device);
                                }
                                break;
                            }
                        case "CheckinDayOfWeekMultiplier":
                            {
                                var dayOfWeekMultiplier = ((JObject)multiplier).ToObject<CheckinDayOfWeekMultiplier>();

                                foreach (var device in dayOfWeekMultiplier.DaysOfWeek)
                                {
                                    Console.WriteLine("\t" + device);
                                }
                                break;
                            }
                        case "DateTypeMultiplier":
                            {
                                var dateTypeMultiplier = ((JObject)multiplier).ToObject<DateTypeMultiplier>();

                                Console.WriteLine("\t" + dateTypeMultiplier.DateType);
                                break;
                            }
                        case "LengthOfStayMultiplier":
                            {
                                var lengthOfStayMultiplier = ((JObject)multiplier).ToObject<LengthOfStayMultiplier>();

                                Console.WriteLine("\tMinimumNumberOfNights: " + lengthOfStayMultiplier.MinimumNumberOfNights);
                                break;
                            }
                        case "AdvanceWindowBookingMultiplier":
                            {
                                var advancedBookingMultiplier = ((JObject)multiplier).ToObject<AdvanceWindowBookingMultiplier>();

                                Console.WriteLine("\tMinimumNumberOfDays: " + advancedBookingMultiplier.MinimumNumberOfDays);
                                break;
                            }
                        default: break;
                    }
                }

            }
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
    }
}


// Defines a subaccount (or hotel campaign).

class SubAccount
{
    public string Id { get; set; }
    public string Name { get; set; }
    public string Status { get; set; }
    public Budget DailyBudget { get; set; }
    public FixedBid MaximumBid { get; set; }
    public object Bid { get; set; }
    public List<object> BidMultipliers { get; set; }
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

// Defines the multiplier to use if the user is located in the specified country or region.

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

class CheckinDayOfWeekMultiplier : Multiplier
{
    public List<string> DaysOfWeek { get; set; }
}

// Defines the multiplier to use if the user specified check-in
// and check-out dates as part of the search.

class DateTypeMultiplier : Multiplier
{
    public string DateType { get; set; }
}


// Defines the response object that POSTs return when
// you add a resource.

class AddResponse
{
    // Contains the ID of the newly added resource.
    public string value { get; set; }
}


// Defines the response object for GETs that return
// lists of resources (i.e., /Subaccounts).

class CollectionResponse
{
    // Contains the list of requested resources.

    public List<object> value { get; set; }

    // The number of resources in the value list. The object
    // include this field only if the request specifies the $count query parameter.

    [JsonProperty("@odata.count")]
    public UInt32 count { get; set; }

}


// Defines the error object that an HTTP status code 400 includes in the
// response body. A 200 /Associate response may also include this object 
// as part of the HotelAssociation object if the association fails
// (see the Errors) field. 

class AdsApiError
{
    public string Code { get; set; }
    public string Message { get; set; }
    public string Property { get; set; }
}
```

```java
// This example uses the Jackson json library as well as the Apache http components.
// https://mvnrepository.com/artifact/com.fasterxml.jackson.core/jackson-core
// https://mvnrepository.com/artifact/com.fasterxml.jackson.core/jackson-annotations
// http://www-us.apache.org/dist//httpcomponents/httpclient/binary/httpcomponents-client-4.5.3-bin.tar.gz
import com.fasterxml.jackson.annotation.JsonInclude;
import com.fasterxml.jackson.core.type.TypeReference;
import com.fasterxml.jackson.databind.ObjectMapper;
import com.microsoft.bing.hotels.datatransferobjects.CollectionResponse;
import com.microsoft.bing.hotels.datatransferobjects.ContentError;
import com.microsoft.bing.hotels.datatransferobjects.FixedBid;
import com.microsoft.bing.hotels.datatransferobjects.SubAccount;
import com.sun.org.apache.regexp.internal.RE;
import javafx.application.Application;
import javafx.stage.Stage;

import java.io.*;
import java.lang.reflect.*;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.ProtocolException;
import java.net.URL;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import org.apache.http.*;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpPatch;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.entity.StringEntity;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.impl.client.HttpClientBuilder;
import org.apache.http.message.BasicHeader;
import org.apache.http.params.HttpParams;
import org.apache.http.protocol.HTTP;

import javax.swing.text.html.parser.Entity;

public class SubAccountsExample {
    private static String clientId = "<CLIENTIDGOESHERE>";
    private static String customerId = "<CUSTOMERIDGOESHERE>";
    private static String accountId = "<ACCOUNTIDGOESHERE>";

    private static String authorizationToken = "<AUTHORIZATIONTOKENGOESHERE>";

    public static void main(String[] args) throws IOException {

        try {
            List<SubAccount> subAccounts = getSubAccounts(customerId, accountId);
            for (SubAccount subAccount: subAccounts) {
                Print(subAccount);
            }
            String subAccountId = subAccounts.get(0).getId();
            SubAccount toUpdate = new SubAccount();
            toUpdate.setId(subAccountId);
            FixedBid fixedBid = new FixedBid();
            fixedBid.setAmount(3.47);
            fixedBid.setType("#Model.FixedBid");
            toUpdate.setBid(fixedBid);
            updateSubAccount(customerId, accountId, toUpdate);

            SubAccount updatedSubAccount = getSubAccount(customerId, accountId, subAccountId);
            Print(updatedSubAccount);
        } catch(Exception ex) {
            System.out.println(ex.getMessage());
        }
    }
    private static final String BASE_URI = "https://partner.api.sandbox.bingads.microsoft.com/Travel/V1";
    private static final String SUB_ACCOUNTS_URI = BASE_URI + "/Customers(%s)/Accounts(%s)/SubAccounts";
    private static final String SUB_ACCOUNT_URI = BASE_URI + "/Customers(%s)/Accounts(%s)/SubAccounts('%s')";
    public static List<SubAccount> getSubAccounts(String customerId, String accountId) throws IOException {
        String url = String.format(SUB_ACCOUNTS_URI, customerId, accountId);
        CollectionResponse response = Request("GET", url, null, CollectionResponse.class);
        ObjectMapper mapper = new ObjectMapper();

        return mapper.convertValue(response.getValue(), new TypeReference<List<SubAccount>>(){});
    }

    public static void updateSubAccount(String customerId, String accountId, SubAccount subAccount) throws IOException {
        String url = String.format(SUB_ACCOUNT_URI, customerId, accountId, subAccount.getId());
        Patch(url, subAccount);
    }

    public static SubAccount getSubAccount(String customerId, String accountId, String subAccountId) throws IOException {
        String url = String.format(SUB_ACCOUNT_URI, customerId, accountId, subAccountId);
        SubAccount subAccount = Request("GET", url, null, SubAccount.class);
        return subAccount;
    }
    /***
     * Use reflection to output the properties of the
     * specified value
     * @param value
     * @throws InvocationTargetException
     * @throws IllegalAccessException
     */
    protected static void Print(Object value) throws InvocationTargetException, IllegalAccessException {
        Class<?> clazz = value.getClass();
        Method[] methods = clazz.getDeclaredMethods();
        for (Method method : methods) {
            try {

                String methodName = method.getName();
                if (methodName.startsWith("get")) {
                    Object propertyValue = method.invoke(value);
                    if (propertyValue != null) {
                        System.out.println(methodName.substring(3, methodName.length()) + ": " + propertyValue.toString());
                    }
                }
            } catch(Exception ex) {
                System.out.println(ex.getStackTrace());
            }
        }
    }

    protected static <T> void Patch(String uri, T instance){
        try {
            HttpClient client = new DefaultHttpClient();
            ObjectMapper mapper = new ObjectMapper();
            mapper.setSerializationInclusion(JsonInclude.Include.NON_NULL);
            String json = mapper.writeValueAsString(instance);
            StringEntity entity = new StringEntity(json);
            entity.setContentType(new BasicHeader(HTTP.CONTENT_TYPE, "application/json"));

            HttpPatch patch = new HttpPatch(uri);
            patch.setEntity(entity);
            patch.addHeader("Authorization", "Bearer " + authorizationToken);
            HttpResponse response = client.execute(patch);
            System.out.println("Update Response Code : " + response.getStatusLine().getStatusCode());
            HttpEntity responseEntity = response.getEntity();
            if (responseEntity != null) {
                BufferedReader rd = new BufferedReader(new InputStreamReader(responseEntity.getContent()));
                String line = "";
                while ((line = rd.readLine()) != null) {
                    System.out.println(line);
                }
            }
            Print(response);
        } catch(Exception ex) {
            ex.printStackTrace();
        }
    }

    protected static <T> T Request(String method, String uri, T instance, Class<T> clazz) throws IOException {
        T result = null;
        ObjectMapper jsonSerializer = new ObjectMapper();
        HttpURLConnection connection = null;
        InputStream inputStream = null;
        BufferedReader reader = null;

        try {
            URL url = new URL(uri);
            connection = (HttpURLConnection)url.openConnection();
            connection.setRequestMethod(method);
            connection.setRequestProperty("Authorization", "Bearer " + authorizationToken);
            connection.setRequestProperty("Content-Type", "application/json");

            connection.setDoOutput(true);
            connection.setDoInput(true);
            connection.setUseCaches(false);

            if (instance != null) {
                String json = jsonSerializer.writeValueAsString(instance);
                OutputStreamWriter outputStream = new OutputStreamWriter(connection.getOutputStream());
                outputStream.write(json);
                outputStream.close();
            }

            int statusCode = connection.getResponseCode();
            if (statusCode >= HttpURLConnection.HTTP_BAD_REQUEST) {
                inputStream = connection.getErrorStream();
            } else {
                inputStream = connection.getInputStream();
            }

            StringBuffer response = new StringBuffer();
            reader = new BufferedReader(new InputStreamReader(inputStream));
            char[] buffer = new char[1024];
            int length = 0;
            while ((length = reader.read(buffer)) != -1) {
                response.append(new String(buffer, 0, length));
            }
            if (statusCode >= HttpURLConnection.HTTP_BAD_REQUEST) {
                if (statusCode < HttpURLConnection.HTTP_INTERNAL_ERROR) {
                    CollectionResponse errors = jsonSerializer.readValue(response.toString(), CollectionResponse.class);
                    throw new Exception(errors.getValue().toString());
                } else {
                    throw new Exception(response.toString());
                }
            }
            String responseJson = response.toString();
            if (responseJson.length() > 0) {
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

    public void start(Stage stage) throws Exception {
        main(null);
    }
}

// CollectionResponse.java
package com.microsoft.bing.hotels.datatransferobjects;
import com.fasterxml.jackson.annotation.JsonIgnoreProperties;
import java.util.List;

@JsonIgnoreProperties(ignoreUnknown = true)
public class CollectionResponse {
    private List<Object> value;
    public List<Object> getValue() { return this.value; }
    public void setValue(List<Object> value){this.value = value;}
}

// Bid.java
package com.microsoft.bing.hotels.datatransferobjects;

import com.fasterxml.jackson.annotation.JsonIgnoreProperties;
import com.fasterxml.jackson.annotation.JsonProperty;

@JsonIgnoreProperties(ignoreUnknown = true)
public class Bid {
    double amount;
    @JsonProperty("Amount")
    public double getAmount(){
        return this.amount;
    }
    public void setAmount(double amount){
        this.amount = amount;
    }

    String type;
    @JsonProperty("@odata.type")
    public String getType(){return this.type;}
    public void setType(String type){
        this.type = type;
    }
}

// FixedBid.java
package com.microsoft.bing.hotels.datatransferobjects;

public class FixedBid extends Bid{
}

// SubAccount.java
package com.microsoft.bing.hotels.datatransferobjects;

import com.fasterxml.jackson.annotation.JsonIgnoreProperties;
import com.fasterxml.jackson.annotation.JsonProperty;

import java.util.List;

@JsonIgnoreProperties(ignoreUnknown = true)
public class SubAccount {
    private String id;
    private String name;
    private String status;
    private Budget dailyBudget;
    private FixedBid maximumBid;
    private Object bid;
    private List<Object> bidMultipliers;

    @JsonProperty("Id")
    public String getId(){
        return this.id;
    }
    public void setId(String id){
        this.id = id;
    }

    @JsonProperty("Name")
    public String getName(){
        return this.name;
    }
    public void setName(String name){
        this.name = name;
    }

    @JsonProperty("Status")
    public String getStatus() {
        return status;
    }
    public void setStatus(String status) {
        this.status = status;
    }

    @JsonProperty("DailyBudget")
    public Budget getDailyBudget() {
        return dailyBudget;
    }
    public void setDailyBudget(Budget dailyBudget) {
        this.dailyBudget = dailyBudget;
    }

    @JsonProperty("MaximumBid")
    public FixedBid getMaximumBid() {
        return maximumBid;
    }
    public void setMaximumBid(FixedBid maximumBid) {
        this.maximumBid = maximumBid;
    }

    @JsonProperty("Bid")
    public Object getBid() {
        return bid;
    }
    public void setBid(Object bid) {
        this.bid = bid;
    }

    @JsonProperty("BidMultipliers")
    public List<Object> getBidMultipliers() {
        return bidMultipliers;
    }
    public void setBidMultipliers(List<Object> bidMultipliers) {
        this.bidMultipliers = bidMultipliers;
    }
}
```

```python
"""Hotel API Sub accounts example"""
import json
import requests

BASE_URI = 'https://partner.api.sandbox.bingads.microsoft.com/Travel/V1'

CLIENT_ID = '<CLIENTIDGOESHERE'

CUSTOMER_ID = "<CUSTOMERIDGOESHERE>"
ACCOUNT_ID = "<ACCOUNTIDGOESHERE>"

AUTHENTICATION_TOKEN = '<AUTHENTICATIONTOKENGOESHERE>'

AUTHENTICATION_HEADER = {'Authorization': "Bearer " + AUTHENTICATION_TOKEN}

def main():
    """The main entry point of this example"""
    print('Subaccounts example')

    try:
        subaccounts = get_subaccounts(CUSTOMER_ID, ACCOUNT_ID)
        print_json(subaccounts)
        subaccount_id = subaccounts['value'][0]['Id']

        subaccount_to_update = {
            "Id": subaccount_id,
            "Bid": {
                "Amount": 3.48,
                "@odata.type": "#Model.FixedBid"
            }
        }

        update_subaccount(CUSTOMER_ID, ACCOUNT_ID, subaccount_to_update)
        updated_subaccount = get_subaccount(CUSTOMER_ID, ACCOUNT_ID, subaccount_id)
        print_json(updated_subaccount)
    except Exception as ex:
        raise ex

SUB_ACCOUNTS_URI = BASE_URI + "/Customers({0})/Accounts({1})/SubAccounts"
SUB_ACCOUNT_URI = BASE_URI + "/Customers({0})/Accounts({1})/SubAccounts('{2}')"
def get_subaccounts(customer_id, account_id):
    """Get an existing product"""
    url = (SUB_ACCOUNTS_URI).format(customer_id, account_id)
    response = requests.get(url, headers=AUTHENTICATION_HEADER)
    response.raise_for_status()
    return json.loads(response.text)

def update_subaccount(customer_id, account_id, sub_account):
    """Update a sub account"""
    url = (SUB_ACCOUNT_URI).format(customer_id, account_id, sub_account['Id'])
    headers = {'Content-Type': 'application/json'}
    for header in AUTHENTICATION_HEADER:
        headers[header] = AUTHENTICATION_HEADER[header]
    response = requests.patch(url, headers=headers, data=json.dumps(sub_account))
    response.raise_for_status()

def get_subaccount(customer_id, account_id, subaccount_id):
    """Get a sub account"""
    url = (SUB_ACCOUNT_URI).format(customer_id, account_id, subaccount_id)
    response = requests.get(url, headers=AUTHENTICATION_HEADER)
    response.raise_for_status()
    return json.loads(response.text)

def print_json(obj):
    """Print the object as json"""
    print(json.dumps(obj, sort_keys=True, indent=4, separators=(',', ': ')))

# Main execution
if __name__ == '__main__':
    main()
```
