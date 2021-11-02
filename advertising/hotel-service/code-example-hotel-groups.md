---
title: "Hotel Group Code Example"
description: Shows how to add, list, and update hotel groups.
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
dev_langs:
  - csharp
  - curl
  - java
  - python
  - php
---

# Hotel Group code example

The following example shows the requests you use to list, get, add, and update hotel groups. 

For details about the elements used in this example, see the [reference](../hotel-service/reference.md) section. 

For additional information, see [Working with hotel groups](../hotel-service/manage-hotel-campaigns.md#workingwithhotelgroups). 

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

namespace ListHotelGroups
{
    class Program
    {
        // The client ID and secret that you were given when you
        // registered your application.

        private static string clientId = "<clientidgoeshere>";
        private static string clientSecret = null;  // Desktop app, so no secret.
        private static string storedRefreshToken = "<refreshtokengoeshere";

        private static string customerId = "<customeridgoeshere>";
        private static string accountId = "<accountidgoeshere>";
        private static string subaccountId = "<subaccountgoeshere>";


        private static string BaseUri = "https://partner.api.sandbox.bingads.microsoft.com/Travel/V1";
        private static string HotelGroupsTemplate = "/Customers({0})/Accounts({1})/SubAccounts('{2}')/HotelGroups";
        private static string HotelGroupTemplate = "/Customers({0})/Accounts({1})/SubAccounts('{2}')/HotelGroups('{3}')";


        static void Main(string[] args)
        {
            try
            {
                // TODO: Add the calls to the OAuth code that you use to get the access and 
                // refresh tokens. Consider using the Bing Ads SDK to get the tokens.


                if (tokens.AccessToken != null)
                {
                    var headers = new WebHeaderCollection();
                    headers.Add(HttpRequestHeader.Authorization, "Bearer " + tokens.AccessToken);

                    Console.WriteLine("**** Listing hotel groups ****");

                    var uri = string.Format(BaseUri + HotelGroupsTemplate, customerId, accountId, subaccountId);
                    var collection = GetResource(uri, headers, typeof(CollectionResponse)) as CollectionResponse;
                    PrintHotelGroups(collection.value);

                    // Creates a list of bid multipliers.

                    var multipliers = new List<object>();
                    //multipliers.Add(new UserCountryMultiplier()
                    //{
                    //    Factor = 1.1,
                    //    Countries = new[] { "US" }.ToList<string>(),
                    //    type = "#Model.UserCountryMultiplier"
                    //});
                    multipliers.Add(new DeviceTypeMultiplier()
                    {
                        Factor = .65,
                        DeviceTypes = new[] { "Desktop" }.ToList<string>(),
                        type = "#Model.DeviceMultiplier"
                    });
                    //multipliers.Add(new LengthOfStayMultiplier()
                    //{
                    //    Factor = 1.3,
                    //    MinimumNumberOfNights = 7,
                    //    type = "#Model.LengthOfStayMultiplier"
                    //});
                    ////multipliers.Add(new DateTypeMultiplier()
                    ////{
                    ////    Factor = .35,
                    ////    DateType = "Default",
                    ////    type = "#Model.DateTypeMultiplier"
                    ////});
                    //multipliers.Add(new CheckinDayOfWeekMultiplier()
                    //{
                    //    Factor = 1.5,
                    //    DaysOfWeek = new[] { "Thursday", "Friday", "Saturday" }.ToList<string>(),
                    //    type = "#Model.CheckinDayOfWeekMultiplier"
                    //});
                    //multipliers.Add(new CheckinDayOfWeekMultiplier()
                    //{
                    //    Factor = 2.5,
                    //    DaysOfWeek = new[] { "Sunday", "Monday" }.ToList<string>(),
                    //    type = "#Model.CheckinDayOfWeekMultiplier"
                    //});
                    //multipliers.Add(new AdvanceWindowBookingMultiplier()
                    //{
                    //    Factor = 1.3,
                    //    MinimumNumberOfDays = 3,
                    //    type = "#Model.AdvanceBookingWindowMultiplier"
                    //});

                    // Create the hotel group to add. Not specifying the bid
                    // and multipliers, so they inherit from the subaccount.

                    HotelGroup hotelGroup = new HotelGroup()
                    {
                        Name = "summer sale",
                        //Bid = new FixedBid()
                        //{
                        //    Amount = 2.75,
                        //    type = "#Model.FixedBid"
                        //},
                        //BidMultipliers = multipliers
                    };

                    Console.WriteLine("**** Adding hotel group ****");

                    var hotelGroupId = AddUpdateResource(uri, headers, hotelGroup, typeof(HotelGroup)) as string;
                    Console.WriteLine("Added hotel group {0}.\n", hotelGroupId); // ID of new hotel group

                    Console.WriteLine("**** Listing hotel groups after adding group ****");

                    collection = GetResource(uri, headers, typeof(CollectionResponse)) as CollectionResponse;
                    PrintHotelGroups(collection.value);


                    // Specify only the fields of the hotel group that you want to update.

                    var hotelGroupToUpdate = new HotelGroup()
                    {
                        Id = hotelGroupId,
                        //Bid = new FixedBid()
                        //{
                        //    Amount = 4.75,
                        //    type = "#Model.FixedBid"
                        //},
                        BidMultipliers = multipliers
                    };

                    Console.WriteLine("**** Updating hotel group {0} ****\n", hotelGroupId);

                    uri = string.Format(BaseUri + HotelGroupTemplate, customerId, accountId, subaccountId, hotelGroupId);
                    AddUpdateResource(uri, headers, hotelGroup, typeof(HotelGroup), "PATCH");

                    Console.WriteLine("**** Getting hotel group {0} after update ****\n", hotelGroupId);

                    var group = GetResource(uri, headers, typeof(HotelGroup)) as HotelGroup;
                    PrintHotelGroup(group);

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



        private static void PrintHotelGroups(List<object> groups)
        {
            foreach (var group in groups)
            {
                var g = ((JObject)group).ToObject<HotelGroup>();

                PrintHotelGroup(g);
            }

        }


        private static void PrintHotelGroup(HotelGroup group)
        {
            Console.WriteLine("Group name: " + group.Name);
            Console.WriteLine("Group ID: " + group.Id);
            Console.WriteLine("Group status: " + group.Status);
            Console.WriteLine("Bid source: " + ((group.BidSource != null) ? group.BidSource : string.Empty));

            if (group.Bid != null)
            {
                var b = ((JObject)group.Bid).ToObject<Bid>();
                Console.WriteLine("{0}: {1}", (b.GetBidType() == "FixedBid") ? "Fixed bid" : "Percentage bid", b.Amount);
            }
            else
            {
                Console.WriteLine("Bid:");
            }

            Console.WriteLine("Bid multiplier source: " + ((group.BidMultiplierSource != null) ? group.BidMultiplierSource : string.Empty));

            if (group.BidMultipliers != null && group.BidMultipliers.Count > 0)
            {
                foreach (var multiplier in group.BidMultipliers)
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
            else
            {
                Console.WriteLine("Multipliers:");
            }

            Console.WriteLine();
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


// Defines a hotel group.

class HotelGroup
{
    public string Id { get; set; }

    public string Name { get; set; }

    public string Status { get; set; }

    public object Bid { get; set; }

    public List<object> BidMultipliers { get; set; }

    public string BidSource { get; set; }

    public string BidMultiplierSource { get; set; }
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

class CheckinDayOfWeekMultiplier : Multiplier
{
    public List<string> DaysOfWeek { get; set; }
}

// Defines the multiplier to use if the user specified check-in
// and check-out dates as part of the search.

class DateTypeMultiplier : Multiplier
{
    //public List<string> DateType { get; set; }
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
// lists of resources (i.e., /SubAccounts('12345')/HotelGroups).

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
// This example uses the Jackson json library as well as the Apache HttpComponents™ client.
// https://mvnrepository.com/artifact/com.fasterxml.jackson.core/jackson-core
// https://mvnrepository.com/artifact/com.fasterxml.jackson.core/jackson-annotations
// http://www-us.apache.org/dist//httpcomponents/httpclient/binary/httpcomponents-client-4.5.3-bin.tar.gz
import com.fasterxml.jackson.annotation.JsonInclude;
import com.fasterxml.jackson.core.type.TypeReference;
import com.fasterxml.jackson.databind.ObjectMapper;
import com.microsoft.bing.hotels.datatransferobjects.*;
import javafx.application.Application;
import javafx.stage.Stage;
import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpPatch;
import org.apache.http.entity.StringEntity;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicHeader;
import org.apache.http.protocol.HTTP;

import java.io.*;
import java.lang.reflect.InvocationTargetException;
import java.lang.reflect.Method;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.ProtocolException;
import java.net.URL;
import java.util.*;

public class GroupsExample {
    private static String clientId = "<CLIENTIDGOESHERE>";
    private static String customerId = "<CUSTOMERIDGOESHERE>";
    private static String accountId = "<ACCOUNTIDGOESHERE>";
    private static String subAccountId = "<SUBACCOUNTIDGOESHERE>";

    private static String authorizationToken = "<AUTHORIZATIONTOKENGOESHERE>";

    public static void main(String[] args) throws IOException {

        try {
            // Get Hotel Groups
            System.out.println("*** Getting hotel groups ***");
            List<HotelGroup> hotelGroups = getHotelGroups(customerId, accountId, subAccountId);
            for (HotelGroup hotelGroup: hotelGroups) {
                Print(hotelGroup);
            }

            // Add Hotel Group
            System.out.println("*** Adding hotel group ***");
            HotelGroup hotelGroup = new HotelGroup();
            // The hotel group name must be unique. This example appends a random string to
            // ensure that the hotel group name is unique in case you run the example multiple
            // times; appending the random string is not required.
            hotelGroup.setName(String.format("Test Hotel Group %s", UUID.randomUUID()));
            String hotelGroupId = addHotelGroup(customerId, accountId, subAccountId, hotelGroup);

            // Update Hotel Group
            System.out.println("*** Updating hotel group ***");
            HotelGroup hotelGroupToUpdate = new HotelGroup();
            hotelGroupToUpdate.setId(hotelGroupId);
            DeviceMultiplier multiplier = new DeviceMultiplier("Desktop");
            multiplier.setFactor(.65);
            hotelGroupToUpdate.setBidMultipliers(multiplier);
            updateHotelGroup(customerId, accountId, subAccountId, hotelGroupToUpdate);

            // Get Hotel Group
            System.out.println("*** Getting hotel group ***");
            HotelGroup retrieved = getHotelGroup(customerId, accountId, subAccountId, hotelGroupId);
            Print(retrieved);

            // Delete Hotel Group
            System.out.println("*** Deleting hotel group ***");
            deleteHotelGroup(customerId, accountId, subAccountId, hotelGroupId);
            System.out.println("*** Done ***");
        } catch(Exception ex) {
            System.out.println(ex.getMessage());
        }
    }
    private static final String BASE_URI = "https://partner.api.sandbox.bingads.microsoft.com/Travel/V1";
    private static final String HOTEL_GROUPS_URI = BASE_URI + "/Customers(%s)/Accounts(%s)/SubAccounts('%s')/HotelGroups";
    private static final String HOTEL_GROUP_URI = BASE_URI + "/Customers(%s)/Accounts(%s)/SubAccounts('%s')/HotelGroups('%s')";
    public static List<HotelGroup> getHotelGroups(String customerId, String accountId, String subAccountId) throws IOException, AdsApiError {
        String url = String.format(HOTEL_GROUPS_URI, customerId, accountId, subAccountId);
        CollectionResponse response = Request("GET", url, null, CollectionResponse.class);
        ObjectMapper mapper = new ObjectMapper();

        return mapper.convertValue(response.getValue(), new TypeReference<List<HotelGroup>>(){});
    }

    public static String addHotelGroup(String customerId, String accountId, String subAccountId, HotelGroup hotelGroup) throws IOException, AdsApiError {
        String url = String.format(HOTEL_GROUPS_URI, customerId, accountId, subAccountId);
        AddResponse response = Request("POST", url, hotelGroup, AddResponse.class);
        return response.getValue();
    }

    public static void updateHotelGroup(String customerId, String accountId, String subAccountId, HotelGroup hotelGroup){
        String url = String.format(HOTEL_GROUP_URI, customerId, accountId, subAccountId, hotelGroup.getId());
        Patch(url, hotelGroup);
    }

    public static HotelGroup getHotelGroup(String customerId, String accountId, String subAccountId, String hotelGroupId) throws AdsApiError, IOException {
        String url = String.format(HOTEL_GROUP_URI, customerId, accountId, subAccountId, hotelGroupId);
        return Request("GET", url, null, HotelGroup.class);
    }

    public static void deleteHotelGroup(String customerId, String accountId, String subAccountId, String hotelGroupId) throws AdsApiError, IOException {
        String url = String.format(HOTEL_GROUP_URI, customerId, accountId, subAccountId, hotelGroupId);
        Request("DELETE", url, null, Object.class);
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
            String methodName = method.getName();
            if (methodName.startsWith("get")) {
                Object propertyValue = method.invoke(value);
                if (propertyValue != null) {
                    System.out.println(methodName.substring(3, methodName.length()) + ": " + propertyValue.toString());
                }
            }
        }
    }

    protected static void Patch(String uri, Object instance){
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
        } catch(Exception ex) {
            ex.printStackTrace();
        }
    }

    protected static <T> T Request(String method, String uri, Object instance, Class<T> clazz) throws AdsApiError, IOException {
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
                    CollectionResponse collectionResponse = jsonSerializer.readValue(response.toString(), CollectionResponse.class);
                    ObjectMapper mapper = new ObjectMapper();

                    AdsApiError error = mapper.convertValue(collectionResponse.getValue().get(0), new TypeReference<AdsApiError>(){});
                    throw error;
                } else {
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

// HotelGroups.java
package com.microsoft.bing.hotels.datatransferobjects;

import com.fasterxml.jackson.annotation.JsonIgnoreProperties;
import com.fasterxml.jackson.annotation.JsonInclude;
import com.fasterxml.jackson.annotation.JsonProperty;

import java.util.ArrayList;
import java.util.List;

@JsonInclude(JsonInclude.Include.NON_NULL)
@JsonIgnoreProperties(ignoreUnknown = true)
public class HotelGroup {
    private String id;
    private String name;
    private String status;
    private Object bid;
    private List<Object> bidMultipliers;
    private String bidSource;
    private String bidMultiplierSource;
    public HotelGroup(){
        this.bidMultipliers = new ArrayList();
    }
    @JsonProperty("Id")
    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    @JsonProperty("Name")
    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    @JsonProperty("Status")
    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
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
        if(this.bidMultipliers.size() > 0){
            return bidMultipliers;
        }
        return null;
    }

    public void setBidMultipliers(Object... bidMultipliers) {
        this.bidMultipliers.clear();
        for(Object multiplier : bidMultipliers){
            this.bidMultipliers.add(multiplier);
        }
    }

    @JsonProperty("BidSource")
    public String getBidSource() {
        return bidSource;
    }

    public void setBidSource(String bidSource) {
        this.bidSource = bidSource;
    }

    @JsonProperty("BidMultiplierSource")
    public String getBidMultiplierSource() {
        return bidMultiplierSource;
    }

    public void setBidMultiplierSource(String bidMultiplierSource) {
        this.bidMultiplierSource = bidMultiplierSource;
    }
}

// AdsApiError.java
package com.microsoft.bing.hotels.datatransferobjects;

import com.fasterxml.jackson.annotation.JsonIgnoreProperties;
import com.fasterxml.jackson.annotation.JsonProperty;

@JsonIgnoreProperties(ignoreUnknown = true)
public class AdsApiError extends Exception {
    String code;
    String apiMessage;
    String property;

    @JsonProperty("Code")
    public String getCode() {
        return code;
    }

    public void setCode(String code) {
        this.code = code;
    }

    @JsonProperty("Message")
    public String getApiMessage() {
        return apiMessage;
    }

    public void setApiMessage(String message) {
        this.apiMessage = message;
    }

    @JsonProperty("Property")
    public String getProperty() {
        return property;
    }

    public void setProperty(String property) {
        this.property = property;
    }

    public String getMessage(){
        return String.format("Code: %s, Message: %s, Property: %s", getCode(), getApiMessage(), getProperty());
    }
}

// DeviceMultiplier.java
package com.microsoft.bing.hotels.datatransferobjects;

import com.fasterxml.jackson.annotation.JsonProperty;

public class DeviceMultiplier extends Multiplier{
    private String[] deviceTypes;
    public DeviceMultiplier(String... deviceTypes){
        this.deviceTypes = deviceTypes;
        this.setType("#Model.DeviceMultiplier");
    }

    @JsonProperty("DeviceTypes")
    public String[] getDevicesTypes(){
        return deviceTypes;
    }

    public void setDevicesTypes(String[] deviceTypes){
        this.deviceTypes = deviceTypes;
    }
}

// Multiplier.java
package com.microsoft.bing.hotels.datatransferobjects;

import com.fasterxml.jackson.annotation.JsonIgnoreProperties;
import com.fasterxml.jackson.annotation.JsonProperty;

@JsonIgnoreProperties(ignoreUnknown = true)
public class Multiplier {
    private String type;
    private double factor;

    @JsonProperty("@odata.type")
    public String getType() {
        return type;
    }

    public void setType(String type) {
        this.type = type;
    }

    @JsonProperty("Factor")
    public double getFactor() {
        return factor;
    }

    public void setFactor(double factor) {
        this.factor = factor;
    }
}
```

```python
"""Hotel API hotel group example"""
import json
import random
import requests
import string

BASE_URI = 'https://partner.api.sandbox.bingads.microsoft.com/Travel/V1'

CLIENT_ID = '<CLIENTIDGOESHERE>'

CUSTOMER_ID = "<CUSTOMERIDGOESHERE>"
ACCOUNT_ID = "<ACCOUNTIDGOESHERE>"
SUBACCOUNT_ID = "<SUBACCOUNTIDGOESHERE>"

AUTHORIZATIONBEARER_TOKEN = '<AUTHENTICATIONTOKENGOESHERE>'

HEADERS = {
    'Authorization': "Bearer " + AUTHORIZATIONBEARER_TOKEN,
    'Content-Type': 'application/json'
}

def main():
    """The main entry point of this example"""
    print('Group example')

    try:
        print("*** Retrieving hotel groups ***")
        hotel_groups = get_hotel_groups(CUSTOMER_ID, ACCOUNT_ID, SUBACCOUNT_ID)
        print_json(hotel_groups)

        print("*** Adding a hotel group ***")
        # The hotel group name must be unique. This example appends a random string to
        # ensure that the hotel group name is unique in case you run the example multiple
        # times; appending the random string is not required.
        hotel_group_id = add_hotel_group(CUSTOMER_ID, ACCOUNT_ID, SUBACCOUNT_ID, {"Name": "summer sale " + random_string()})
        print("*** Added hotel group {0} ***".format(hotel_group_id))

        hotel_group_to_update = {
            "Id": hotel_group_id,
            "BidMultipliers": [
                {
                    "Factor": .65,
                    "DeviceTypes": ["Desktop"],
                    '@odata.type': '#Model.DeviceMultiplier'
                }
            ]
        }

        print("*** Updating hotel group ***")
        update_hotel_group(CUSTOMER_ID, ACCOUNT_ID, SUBACCOUNT_ID, hotel_group_to_update)

        print("*** Retrieving hotel group after update ***")
        hotel_group = get_hotel_group(CUSTOMER_ID, ACCOUNT_ID, SUBACCOUNT_ID, hotel_group_id)
        print_json(hotel_group)
        
        print("*** Deleting hotel group {0} ***".format(hotel_group_id))
        delete_hotel_group(CUSTOMER_ID, ACCOUNT_ID, SUBACCOUNT_ID, hotel_group_id)
    except Exception as ex:
        raise ex

HOTEL_GROUPS_URI = BASE_URI + "/Customers({0})/Accounts({1})/SubAccounts('{2}')/HotelGroups"
HOTEL_GROUP_URI = BASE_URI + "/Customers({0})/Accounts({1})/SubAccounts('{2}')/HotelGroups('{3}')"
def get_hotel_groups(customer_id, account_id, subaccount_id):
    """Get hotel groups"""
    url = HOTEL_GROUPS_URI.format(customer_id, account_id, subaccount_id)
    response = requests.get(url, headers=HEADERS)
    response.raise_for_status()
    return json.loads(response.text)

def add_hotel_group(customer_id, account_id, subaccount_id, hotel_group):
    """Add a hotel group"""
    url = HOTEL_GROUPS_URI.format(customer_id, account_id, subaccount_id)
    response = requests.post(url, headers=HEADERS, data=json.dumps(hotel_group))
    response.raise_for_status()
    return json.loads(response.text)['value']

def update_hotel_group(customer_id, account_id, subaccount_id, hotel_group):
    """Update a hotel group"""
    url = HOTEL_GROUP_URI.format(customer_id, account_id, subaccount_id, hotel_group['Id'])
    response = requests.patch(url, headers=HEADERS, data=json.dumps(hotel_group))
    response.raise_for_status()

def get_hotel_group(customer_id, account_id, subaccount_id, hotel_group_id):
    """Get a hotel group by id"""
    url = HOTEL_GROUP_URI.format(customer_id, account_id, subaccount_id, hotel_group_id)
    response = requests.get(url, headers=HEADERS)
    response.raise_for_status()
    return json.loads(response.text)

HOTEL_GROUP_URI = BASE_URI + "/Customers({0})/Accounts({1})/SubAccounts('{2}')/HotelGroups('{3}')"
def delete_hotel_group(customer_id, account_id, subaccount_id, hotel_group_id):
    """Delete a hotel group"""
    url = HOTEL_GROUP_URI.format(customer_id, account_id, subaccount_id, hotel_group_id)
    response = requests.delete(url, headers=HEADERS)
    response.raise_for_status()

def print_json(obj):
    """Print the object as json"""
    print(json.dumps(obj, sort_keys=True, indent=4, separators=(',', ': ')))

def random_string(length=6):
    """Get a random string of characters of the specified length"""
    return ''.join(random.choices(string.ascii_uppercase + string.digits, k=length))

# Main execution
if __name__ == '__main__':
    main()

```

```curl
#!/usr/bin/sh
CUSTOMERID=<CUSTOMERIDGOESHERE>
ACCOUNTID=<ACCOUNTIDGOESHERE>
SUBACCOUNTID=<SUBACCOUNTIDGOESHERE>
AUTHORIZATIONTOKEN=<AUTHENTICATIONTOKENGOESHERE>

echo "*** Listing Hotel Groups ***"
curl -X GET "https://partner.api.bingads.microsoft.com/Travel/V1/Customers($CUSTOMERID)/Accounts($ACCOUNTID)/SubAccounts('$SUBACCOUNTID')/HotelGroups" -H "accept: application/json" -H "content-type: application/json" -H "Authorization: Bearer $AUTHORIZATIONTOKEN"

echo "*** Adding a hotel group ***"
HOTELGROUPNAMETOADD=<HOTELGROUPNAMEGOESHERE>
curl -X POST "https://partner.api.bingads.microsoft.com/Travel/V1/Customers($CUSTOMERID)/Accounts($ACCOUNTID)/SubAccounts('$SUBACCOUNTID')/HotelGroups" -H "accept: application/json" -H "content-type: application/json" -H "Authorization: Bearer $AUTHORIZATIONTOKEN" -d "{\"Name\":\"$HOTELGROUPNAMETOADD\"}"

echo "*** Updating hotel group  ***"
HOTELGROUPID=<HOTELGROUPIDGOESHERE>
curl -X PATCH "https://partner.api.bingads.microsoft.com/Travel/V1/Customers($CUSTOMERID)/Accounts($ACCOUNTID)/SubAccounts('$SUBACCOUNTID')/HotelGroups('$HOTELGROUPID')" -H "accept: application/json" -H "content-type: application/json" -H "Authorization: Bearer $AUTHORIZATIONTOKEN" -d "{\"Id\":\"$HOTELGROUPID\",\"BidMultipliers\":[{\"DeviceTypes\":[\"Desktop\",\"Mobile\",\"Tablet\"],\"Factor\":5.5,\"@odata.type\":\"#Model.DeviceMultiplier\"}]}"

echo "*** Deleting hotel group ***"
curl -X DELETE "https://partner.api.bingads.microsoft.com/Travel/V1/Customers($CUSTOMERID)/Accounts($ACCOUNTID)/SubAccounts('$SUBACCOUNTID')/HotelGroups('$HOTELGROUPID')" -H "accept: application/json" -H "content-type: application/json" -H "Authorization: Bearer $AUTHORIZATIONTOKEN"
```

```php
<?php
$customerId = '<CUSTOMERIDGOESHERE>';
$accountId = '<ACCOUNTIDGOESHERE>';
$subaccountId = '<SUBACCOUNTIDGOESHERE>';
$authenticationToken = '<AUTHENTICATIONTOKENGOESHERE>';

$baseUri = "https://partner.api.bingads.microsoft.com/Travel/V1";
$hotelGroupsUri = $baseUri . "/Customers(%s)/Accounts(%s)/SubAccounts('%s')/HotelGroups";
$hotelGroupUri = $baseUri . "/Customers(%s)/Accounts(%s)/SubAccounts('%s')/HotelGroups('%s')";

echo("*** Retrieving hotel groups ***\r\n");
$hotelGroups = get_hotel_groups();
foreach ($hotelGroups as $index => $hotelGroup) {
    printObject($hotelGroup);
    echo("\r\n");
}

echo("*** Adding a hotel group ***\r\n");
# The hotel group name must be unique. This example appends a unique id to
# ensure that the hotel group name is unique in case you run the example multiple
# times; appending the unique id is not required.
$hotelGroupId = add_hotel_group(array('Name' => 'Test Hotel Group (' . uniqid() . ')' ));
echo("*** Added hotel group $hotelGroupId ***\r\n");

$hotelGroupToUpdate = array(
    'Id' => $hotelGroupId,
    'BidMultipliers' => array(
        array(
            'Factor' => .65,
            'DeviceTypes' => array('Desktop'),
            '@odata.type' => '#Model.DeviceMultiplier'
        )
    )
);

echo("*** Updating hotel group ***\r\n");
update_hotel_group($hotelGroupToUpdate);

echo("*** Retrieving hotel group after update ***\r\n");
$hotelGroup = get_hotel_group($hotelGroupId);
printObject($hotelGroup);

echo("*** Deleting hotel group $hotelGroupId ***\r\n");
delete_hotel_group($hotelGroupId);

function get_hotel_groups(){
    global $customerId, $accountId, $subaccountId, $hotelGroupsUri;

    $url = sprintf($hotelGroupsUri, $customerId, $accountId, $subaccountId);
    $result = request('GET', $url);
    if ($result === FALSE) {
        throw new Exception(var_dump($result));
    } else {
        return json_decode($result, true)['value'];
    }
}

function add_hotel_group($hotelGroup){
    global $customerId, $accountId, $subaccountId, $hotelGroupsUri;

    $url = sprintf($hotelGroupsUri, $customerId, $accountId, $subaccountId);
    $result = request('POST', $url, $hotelGroup);
    if ($result === FALSE) {
        throw new Exception(var_dump($result));
    } else {
        return json_decode($result, true)['value'];
    }
}

function update_hotel_group($hotelGroup){
    global $customerId, $accountId, $subaccountId, $hotelGroupUri;

    $url = sprintf($hotelGroupUri, $customerId, $accountId, $subaccountId, $hotelGroup['Id']);
    $result = request('PATCH', $url, $hotelGroup);
    if ($result === FALSE) {
        throw new Exception(var_dump($result));
    } else {
        return json_decode($result, true);
    }
}

function get_hotel_group($hotelGroupId){
    global $customerId, $accountId, $subaccountId, $hotelGroupUri;

    $url = sprintf($hotelGroupUri, $customerId, $accountId, $subaccountId, $hotelGroupId);
    $result = request('GET', $url);
    if ($result === FALSE) {
        throw new Exception(var_dump($result));
    } else {
        return json_decode($result, true);
    }
}

function delete_hotel_group($hotelGroupId){
    global $customerId, $accountId, $subaccountId, $hotelGroupUri;
    
    $url = sprintf($hotelGroupUri, $customerId, $accountId, $subaccountId, $hotelGroupId);
    $result = request('DELETE', $url);
    if ($result === FALSE) {
        throw new Exception(var_dump($result));
    }
}

function request($method, $url, $data = null){
    global $authenticationToken;
    $options = array(
        'http' => array(
            'method'  => $method,
            'header'  => "Authorization: Bearer $authenticationToken\r\n" .
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

function printObject($object, $tabCount = 0){
    $tabs = str_repeat("\t", $tabCount);
    foreach ($object as $prop => $value) {
        if (is_array($value)) {
            echo("$prop: ");
            printObject($value, $tabCount + 1);
        } else {            
            echo("$tabs$prop: $value\r\n");
        }
    } 
}

```
