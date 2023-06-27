---
title: "Hotel Code Example"
description: Shows you how to list, get, and update hotels.
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
dev_langs:
  - csharp
  - curl
  - java
  - python
  - php
---

# Hotel code example

The following example shows the requests you use to list, get, and update hotels. The example also shows how to associate a hotel with a hotel group. 

For details about the elements used in this example, see the [reference](../hotel-service/reference.md) section. 

For additional information, see [Working with hotels](../hotel-service/manage-hotel-campaigns.md#workingwithhotels). 

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

namespace ListHotels
{
    class Program
    {
        // The client ID and secret that you were given when you
        // registered your application.

        private static string clientId = "<clientidgoeshere>";
        private static string clientSecret = null;  // Desktop app, so no secret
        private static string storedRefreshToken = "<refreshtokengoeshere";


        private static string customerId = "<customeridgoeshere>";
        private static string accountId = "<accountidgoeshere>";
        private static string subaccountId = "<subaccountidgoeshere>";
        private static string hotelGroupId = "<hotelgroupidgoeshere>";
        private static string hotelId = "<hotelidgoeshere>";
        private static string ungroupedHotelGroupId = "<hotelgroupidgoeshere>";


        private static string BaseUri = "https://partner.api.sandbox.bingads.microsoft.com/Travel/V1";
        private static string HotelsTemplate = "/Customers({0})/Accounts({1})/SubAccounts('{2}')/HotelGroups('{3}')/Hotels";
        private static string HotelTemplate = "/Customers({0})/Accounts({1})/SubAccounts('{2}')/HotelGroups('{3}')/Hotels('{4}')";
        private static string AssociateTemplate = "/Customers({0})/Accounts({1})/SubAccounts('{2}')/Associate";


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

                    Console.WriteLine("**** Listing hotels for hotel group {0} ****\n", hotelGroupId);

                    var uri = string.Format(BaseUri + HotelsTemplate, customerId, accountId, subaccountId, hotelGroupId);
                    var collection = GetResource(uri, headers, typeof(CollectionResponse)) as CollectionResponse;
                    PrintHotels(collection.value);


                    var multipliers = new List<object>();
                    multipliers.Add(new CheckInDayOfWeekMultiplier()
                    {
                        Factor = 1.2,
                        DaysOfWeek = new[] { "Thursday", "Friday", "Saturday" }.ToList<string>(),
                        type = "#Model.CheckinDayOfWeekMultiplier"
                    });
                    multipliers.Add(new CheckInDayOfWeekMultiplier()
                    {
                        Factor = .9,
                        DaysOfWeek = new[] { "Sunday", "Monday" }.ToList<string>(),
                        type = "#Model.CheckinDayOfWeekMultiplier"
                    });
                    multipliers.Add(new AdvanceWindowBookingMultiplier()
                    {
                        Factor = 1.3,
                        MinimumNumberOfDays = 3,
                        type = "#Model.AdvanceBookingWindowMultiplier"
                    });


                    Console.WriteLine("**** Getting hotel {0} from Ungrouped before update ****\n", hotelId);

                    uri = string.Format(BaseUri + HotelTemplate, customerId, accountId, subaccountId, ungroupedHotelGroupId, hotelId);
                    var hotel = GetResource(uri, headers, typeof(Hotel)) as Hotel;
                    PrintHotel(hotel);


                    hotel = new Hotel()
                    {
                        BidMultipliers = multipliers
                    };

                    Console.WriteLine("**** Updating multipliers for hotel {0} ****\n", hotelId);

                    AddUpdateResource(uri, headers, hotel, typeof(Hotel), typeof(AddResponse), "PATCH");

                    Console.WriteLine("**** Getting hotel {0} after update ****\n", hotelId);
                    hotel = GetResource(uri, headers, typeof(Hotel)) as Hotel;
                    PrintHotel(hotel);


                    Console.WriteLine("**** Associating hotel {0} with hotel group {1} ****\n", hotelId, hotelGroupId);

                    var associations = new List<HotelAssociation>();
                    associations.Add(new HotelAssociation()
                    {

                        HotelGroupId = hotelGroupId,
                        HotelId = hotelId
                    });

                    AssociationCollection associationCollection = new AssociationCollection()
                    {
                        HotelAssociations = associations
                    };

                    Console.WriteLine("**** Adding hotel association****\n");

                    uri = string.Format(BaseUri + AssociateTemplate, customerId, accountId, subaccountId);
                    collection = AddUpdateResource(uri, headers, associationCollection, typeof(AssociationCollection), typeof(CollectionResponse)) as CollectionResponse;

                    // The /Associate method will try to apply all associations in the
                    // request. It returns any associations that failed and the reason
                    // for the failure.

                    if (collection.value != null && collection.value.Count > 0)
                    {
                        PrintAssociationErrors(collection.value);
                    }

                    Console.WriteLine("**** Listing hotels for hotel group {0} ****\n", hotelGroupId);

                    uri = string.Format(BaseUri + HotelsTemplate, customerId, accountId, subaccountId, hotelGroupId);
                    collection = GetResource(uri, headers, typeof(CollectionResponse)) as CollectionResponse;
                    PrintHotels(collection.value);

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
            catch (OAuthTokenRequestException e)
            {
                Console.WriteLine("\n" + e.Message);
                Console.WriteLine("\n" + e.Details);
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

        private static object AddUpdateResource(string uri, WebHeaderCollection headers, object resource, Type requestType, Type responseType, string verb = "POST")
        {
            var request = (HttpWebRequest)WebRequest.Create(uri);
            request.Method = verb;
            request.Headers = headers;
            request.ContentType = "application/json";

            var serializerSettings = new JsonSerializerSettings();
            serializerSettings.NullValueHandling = NullValueHandling.Ignore;

            var json = JsonConvert.SerializeObject(resource, requestType, serializerSettings);
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
                object responseObject = null;

                using (Stream responseStream = response.GetResponseStream())
                {
                    var reader = new StreamReader(responseStream);
                    var jsonOut = reader.ReadToEnd();
                    reader.Close();
                    responseObject = JsonConvert.DeserializeObject(jsonOut, responseType);
                }

                return responseObject;
            }
            else
            {
                return null;
            }
        }


        private static void PrintHotels(List<object> hotels)
        {
            foreach (var hotel in hotels)
            {
                var h = ((JObject)hotel).ToObject<Hotel>();

                PrintHotel(h);
            }

        }


        private static void PrintHotel(Hotel hotel)
        {
            Console.WriteLine("Hotel name: " + hotel.Name);
            Console.WriteLine("Hotel ID: " + hotel.Id);
            Console.WriteLine("Partner hotel ID: " + hotel.PartnerHotelId);
            Console.WriteLine("Hotel status: " + hotel.Status);
            Console.WriteLine("Country code: " + hotel.CountryCode);
            Console.WriteLine("Bid source: " + ((hotel.BidSource != null) ? hotel.BidSource : string.Empty));

            if (hotel.Bid != null)
            {
                var b = ((JObject)hotel.Bid).ToObject<Bid>();
                Console.WriteLine("{0}: {1}", (b.GetBidType() == "FixedBid") ? "Fixed bid" : "Percentage bid", b.Amount);
            }
            else
            {
                Console.WriteLine("Bid:");
            }
            
            
            Console.WriteLine("Bid multiplier source: " + ((hotel.BidMultiplierSource != null) ? hotel.BidMultiplierSource : string.Empty));


            if (hotel.BidMultipliers != null && hotel.BidMultipliers.Count > 0)
            {
                foreach (var multiplier in hotel.BidMultipliers)
                {
                    var m = ((JObject)multiplier).ToObject<Multiplier>();
                    Console.WriteLine("{0}: {1}", m.GetMultiplierType(), m.Factor);

                    switch (m.GetMultiplierType()) { 
                        case "UserCountryMultiplier" :
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
                                var dayOfWeekMultiplier = ((JObject)multiplier).ToObject<CheckInDayOfWeekMultiplier>();

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



        private static void PrintAssociationErrors(List<object> associations)
        {
            foreach (var association in associations)
            {
                var a = ((JObject)association).ToObject<HotelAssociation>();

                PrintAssociationError(a);
            }
        }

        private static void PrintAssociationError(HotelAssociation association)
        {
            Console.WriteLine("Hotel group ID: " + association.HotelGroupId);
            Console.WriteLine("Hotel group name: " + association.HotelGroupName);
            Console.WriteLine("Hotel ID: " + association.HotelId);
            Console.WriteLine("Hotel group name: " + association.HotelName);

            foreach (var error in association.Errors)
            {
                Console.WriteLine("Error code: " + error.Code);
                Console.WriteLine("Error message: " + error.Message);
                Console.WriteLine("Error parameter: " + error.Property);
            }

            Console.WriteLine();
        }


        private static void PrintErrors(List<object> errors)
        {
            foreach (var error in errors)
            {
                var e = ((JObject)error).ToObject<AdsApiError>();

                PrintError(e);
            }
        }
        private static void PrintError(AdsApiError error)
        {
                Console.WriteLine("\nError code: " + error.Code);
                Console.WriteLine("Error message: " + error.Message);
                Console.WriteLine("Error parameter: " + error.Property);
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

class CheckInDayOfWeekMultiplier : Multiplier
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
// lists of resources (i.e., /SubAccounts('12345')/HotelGroups('45678')/Hotels).

class CollectionResponse
{
    // Contains the list of requested resources.

    public List<object> value { get; set; }

    // The number of resources in the value list. The object
    // include this field only if the request specifies the $count query parameter.

    [JsonProperty("@odata.count")]
    public UInt32 count { get; set; }
}



// Defines a hotel association, which defines the relationship
// between a hotel and a hotel group. A hotel may belong
// to only one group.

class HotelAssociation
{
    public string HotelGroupId { get; set; }

    public string HotelGroupName { get; set; }

    public string HotelId { get; set; }

    public string HotelName { get; set; }

    public string PartnerHotelId { get; set; }

    public List<AdsApiError> Errors { get; set; }
}


// Defines a collection of hotel associations.

class AssociationCollection
{
    // Contains the list of requested resources.
    public List<HotelAssociation> HotelAssociations { get; set; }
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
import sun.reflect.generics.reflectiveObjects.NotImplementedException;

import java.io.*;
import java.lang.reflect.InvocationTargetException;
import java.lang.reflect.Method;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.ProtocolException;
import java.net.URL;
import java.util.*;

public class HotelsExample {
    private static String clientId = "<CLIENTIDGOESHERE>";
    private static String customerId = "<CUSTOMERIDGOESHERE>";
    private static String accountId = "<ACCOUNTIDGOESHERE>";
    private static String subAccountId = "<SUBACCOUNTIDGOESHERE>";

    private static String authorizationToken = "<AUTHORIZATIONTOKENGOESHERE>";

    public static void main(String[] args) throws IOException {

        try {
            System.out.println("Hotel example");

            System.out.println("*** Listing ungrouped hotels ***");
            List<Hotel> ungroupedHotels = listUngroupedHotels(customerId, accountId, subAccountId);
            for (Hotel hotel : ungroupedHotels) {
                Print(hotel);
            }
            Hotel testHotel = ungroupedHotels.get(0);

            System.out.println(String.format("*** Getting one test hotel %s", testHotel.getName()));
            Hotel hotelToUpdate = getHotel(customerId, accountId, subAccountId, testHotel.getId());
            Print(hotelToUpdate);
            CheckinDayOfWeekMultiplier endOfWeek = new CheckinDayOfWeekMultiplier("Thursday", "Friday", "Saturday");
            endOfWeek.setFactor(1.2);
            CheckinDayOfWeekMultiplier startOfWeek = new CheckinDayOfWeekMultiplier("Sunday", "Monday");
            AdvanceBookingWindowMultiplier advanceBookingWindowMultiplier = new AdvanceBookingWindowMultiplier(3);
            List<Object> bidMultipliers = new ArrayList<Object>();
            bidMultipliers.add(endOfWeek);
            bidMultipliers.add(startOfWeek);
            bidMultipliers.add(advanceBookingWindowMultiplier);
            hotelToUpdate.setBidMultipliers(bidMultipliers);

            System.out.println(String.format("*** Updating hotel %s", hotelToUpdate.getName()));
            updateHotel(customerId, accountId, subAccountId, hotelToUpdate);

            System.out.println("*** Retrieving hotel after update ***");
            Hotel retrievedHotel = getHotel(customerId, accountId, subAccountId, hotelToUpdate.getId());
            Print(retrievedHotel);

            System.out.println("*** Listing hotel groups ***");
            List<HotelGroup> hotelGroups = getHotelGroups(customerId, accountId, subAccountId);
            for (HotelGroup hotelGroup : hotelGroups) {
                Print(hotelGroup);
            }

            System.out.println("*** Add a hotel group ***");
            HotelGroup hotelGroupToAdd = new HotelGroup();
            // The hotel group name must be unique. This example appends a random string to
            // ensure that the hotel group name is unique in case you run the example multiple
            // times; appending the random string is not required.
            hotelGroupToAdd.setName(String.format("Test Hotel Group %s", UUID.randomUUID()));
            String addedHotelGroupId = addHotelGroup(customerId, accountId, subAccountId, hotelGroupToAdd);
            System.out.println(String.format("*** Added hotel group %s: %s ***", addedHotelGroupId, hotelGroupToAdd.getName()));

            System.out.println(String.format("*** Associating hotel %s to hotel group %s", hotelToUpdate.getName(), addedHotelGroupId));
            List<HotelAssociation> associations = associateHotelToGroup(customerId, accountId, subAccountId, hotelToUpdate.getId(), addedHotelGroupId);
            for (HotelAssociation association : associations) {
                Print(association);
            }

            System.out.println(String.format("*** Ungrouping hotel %s ***", (hotelGroupToAdd.getName())));
            ungroupHotel(customerId, accountId, subAccountId, hotelToUpdate.getId());

            System.out.println(String.format("*** Deleting hotel group %s ***", (hotelGroupToAdd.getName())));
        } catch (Exception ex) {
            System.out.println(ex.toString());
        }
    }

    private static final String BASE_URI = "https://partner.api.sandbox.bingads.microsoft.com/Travel/V1";
    private static final String UNGROUPED_URI = BASE_URI + "/Customers(%s)/Accounts(%s)/SubAccounts('%s')/Ungrouped";
    private static final String HOTEL_URI = BASE_URI + "/Customers(%s)/Accounts(%s)/SubAccounts('%s')/HotelGroups('%s')/Hotels('%s')";
    private static final String HOTEL_GROUPS_URI = BASE_URI + "/Customers(%s)/Accounts(%s)/SubAccounts('%s')/HotelGroups";
    private static final String HOTEL_GROUP_URI = BASE_URI + "/Customers(%s)/Accounts(%s)/SubAccounts('%s')/HotelGroups('%s')";

    public static List<Hotel> listUngroupedHotels(String customerId, String accountId, String subAccountId) throws AdsApiError, IOException {
        String url = String.format(UNGROUPED_URI, customerId, accountId, subAccountId);
        CollectionResponse response = Request("GET", url, null, CollectionResponse.class);
        ObjectMapper mapper = new ObjectMapper();

        return mapper.convertValue(response.getValue(), new TypeReference<List<Hotel>>() {
        });
    }

    public static Hotel getHotel(String customerId, String accountId, String subAccountId, String hotelId) throws IOException, AdsApiError {
        return getHotel(customerId, accountId, subAccountId, hotelId, null);
    }

    public static Hotel getHotel(String customerId, String accountId, String subAccountId, String hotelId, String hotelGroupId) throws IOException, AdsApiError {
        if (hotelGroupId == null || hotelGroupId.isEmpty()) {
            // If the hotelGroupId is not specified then use the id of the default hotel group which is the "Ungrouped" group.
            hotelGroupId = getDefaultHotelGroup(customerId, accountId, subAccountId).getId();
        }
        String url = String.format(HOTEL_URI, customerId, accountId, subAccountId, hotelGroupId, hotelId);
        return Request("GET", url, null, Hotel.class);
    }

    public static void updateHotel(String customerId, String accountId, String subAccountId, Hotel hotelToUpdate) throws IOException, AdsApiError {
        updateHotel(customerId, accountId, subAccountId, hotelToUpdate, null);
    }

    public static void updateHotel(String customerId, String accountId, String subAccountId, Hotel hotelToUpdate, String hotelGroupId) throws IOException, AdsApiError {
        if (hotelGroupId == null || hotelGroupId.isEmpty()) {
            // If the hotelGroupId is not specified then use the id of the default hotel group which is the "Ungrouped" group.
            hotelGroupId = getDefaultHotelGroup(customerId, accountId, subAccountId).getId();
        }
        String url = String.format(HOTEL_URI, customerId, accountId, subAccountId, hotelGroupId, hotelToUpdate.getId());
        Patch(url, hotelToUpdate);
    }

    public static void ungroupHotel(String customerId, String accountId, String subAccountId, String hotelId) throws IOException, AdsApiError {
        // To ungroup a hotel, associate it to the default hotel group which is the "Ungrouped" group.
        associateHotelToGroup(customerId, accountId, subAccountId, hotelId, getDefaultHotelGroup(customerId, accountId, subAccountId).getId());
    }

    public static List<HotelGroup> getHotelGroups(String customerId, String accountId, String subAccountId) throws IOException, AdsApiError {
        String url = String.format(HOTEL_GROUPS_URI, customerId, accountId, subAccountId);
        CollectionResponse response = Request("GET", url, null, CollectionResponse.class);
        ObjectMapper mapper = new ObjectMapper();

        return mapper.convertValue(response.getValue(), new TypeReference<List<HotelGroup>>() {
        });
    }

    static HotelGroup defaultHotelGroup;

    public static HotelGroup getDefaultHotelGroup(String customerId, String accountId, String subAccountId) throws IOException, AdsApiError {
        if (defaultHotelGroup == null) {
            for (HotelGroup hotelGroup : getHotelGroups(customerId, accountId, subAccountId)) {
                if (hotelGroup.getName().equals("Ungrouped")) {
                    defaultHotelGroup = hotelGroup;
                    break;
                }
            }
        }
        return defaultHotelGroup;
    }

    public static String addHotelGroup(String customerId, String accountId, String subAccountId, HotelGroup hotelGroup) throws IOException, AdsApiError {
        String url = String.format(HOTEL_GROUPS_URI, customerId, accountId, subAccountId);
        AddResponse response = Request("POST", url, hotelGroup, AddResponse.class);
        return response.getValue();
    }

    private static String ASSOCIATE_URI = BASE_URI + "/Customers(%s)/Accounts(%s)/SubAccounts('%s')/Associate";

    public static List<HotelAssociation> associateHotelToGroup(String customerId, String accountId, String subAccountId, String hotelId, String hotelGroupId) throws IOException, AdsApiError {
        if (hotelGroupId == null || hotelGroupId.isEmpty()) {
            // If the hotelGroupId is not specified then use the id of the default hotel group which is the "Ungrouped" group.
            hotelGroupId = getDefaultHotelGroup(customerId, accountId, subAccountId).getId();
        }
        String url = String.format(ASSOCIATE_URI, customerId, accountId, subAccountId);
        AssociationCollection associationCollection = new AssociationCollection();
        associationCollection.addHotelAssociation(hotelId, hotelGroupId);
        AssociationCollection response = Request("POST", url, associationCollection, AssociationCollection.class);

        return response.getHotelAssociations();
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

    protected static void Patch(String uri, Object instance) {
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
        } catch (Exception ex) {
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
            connection = (HttpURLConnection) url.openConnection();
            connection.setRequestMethod(method);
            connection.setRequestProperty("Authorization", "Bearer " + authorizationToken);
            connection.setRequestProperty("Content-Type", "application/json");

            connection.setDoOutput(true);
            connection.setDoInput(true);
            connection.setUseCaches(false);

            if (instance != null) {
                String json = jsonSerializer.writeValueAsString(instance);
                connection.setRequestProperty("Content-Length", Integer.toString(json.getBytes("UTF-8").length));
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

                    AdsApiError error = mapper.convertValue(collectionResponse.getValue().get(0), new TypeReference<AdsApiError>() {
                    });
                    throw error;
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
}

// Hotel.java
package com.microsoft.bing.hotels.datatransferobjects;

import com.fasterxml.jackson.annotation.JsonIgnoreProperties;
import com.fasterxml.jackson.annotation.JsonInclude;
import com.fasterxml.jackson.annotation.JsonProperty;

import java.util.List;

@JsonInclude(JsonInclude.Include.NON_NULL)
@JsonIgnoreProperties(ignoreUnknown = true)
public class Hotel {
    private String id;
    private String name;
    private String status;
    private Bid bid;
    private List<Object> bidMultipliers;
    private String bidSource;
    private String bidMultiplierSource;
    private String countryCode;
    private String partnerHotelId;

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
    public Bid getBid() {
        return bid;
    }

    public void setBid(Bid bid) {
        this.bid = bid;
    }

    @JsonProperty("BidMultipliers")
    public List<Object> getBidMultipliers() {
        return bidMultipliers;
    }

    public void setBidMultipliers(List<Object> bidMultipliers) {
        this.bidMultipliers = bidMultipliers;
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

    @JsonProperty("CountryCode")
    public String getCountryCode() {
        return countryCode;
    }

    public void setCountryCode(String countryCode) {
        this.countryCode = countryCode;
    }

    @JsonProperty("PartnerHotelId")
    public String getPartnerHotelId() {
        return partnerHotelId;
    }

    public void setPartnerHotelId(String partnerHotelId) {
        this.partnerHotelId = partnerHotelId;
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

// CheckinDayOfWeekMultiplier.java
package com.microsoft.bing.hotels.datatransferobjects;

import com.fasterxml.jackson.annotation.JsonProperty;

public class CheckinDayOfWeekMultiplier extends Multiplier {
    private String[] daysOfWeek;

    public CheckinDayOfWeekMultiplier(String... daysOfWeek) {
        this.daysOfWeek = daysOfWeek;
        this.setType("#Model.CheckinDayOfWeekMultiplier");
    }

    @JsonProperty("DaysOfWeek")
    public String[] getDaysOfWeek() {
        return daysOfWeek;
    }

    public void setDaysOfWeek(String[] daysOfWeek) {
        this.daysOfWeek = daysOfWeek;
    }
}

// AdvanceBookingWindowMultiplier.java
package com.microsoft.bing.hotels.datatransferobjects;

import com.fasterxml.jackson.annotation.JsonProperty;

public class AdvanceBookingWindowMultiplier extends Multiplier {
    private int minimumNumberOfDays;

    public AdvanceBookingWindowMultiplier(int minimumNumberOfDays) {
        this.minimumNumberOfDays = minimumNumberOfDays;
        this.setType("#Model.AdvanceBookingWindowMultiplier");
    }

    @JsonProperty("MinimumNumberOfDays")
    public int getMinimumNumberOfDays() {
        return minimumNumberOfDays;
    }

    public void setMinimumNumberOfDays(int minimumNumberOfDays) {
        this.minimumNumberOfDays = minimumNumberOfDays;
    }
}


// CollectionRespones.java
package com.microsoft.bing.hotels.datatransferobjects;
import com.fasterxml.jackson.annotation.JsonIgnoreProperties;
import java.util.List;

@JsonIgnoreProperties(ignoreUnknown = true)
public class CollectionResponse {
    private List<Object> value;
    public List<Object> getValue() { return this.value; }
    public void setValue(List<Object> value){this.value = value;}
}

// HotelGroup.java
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
        if(bidMultipliers != null && bidMultipliers.size() > 0){
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

// AddResponse.java
package com.microsoft.bing.hotels.datatransferobjects;

import com.fasterxml.jackson.annotation.JsonIgnoreProperties;

@JsonIgnoreProperties(ignoreUnknown = true)
public class AddResponse {
    public String getValue() {
        return value;
    }

    public void setValue(String value) {
        this.value = value;
    }

    private String value;
}

// AssociationCollection.java
package com.microsoft.bing.hotels.datatransferobjects;

import com.fasterxml.jackson.annotation.JsonIgnoreProperties;
import com.fasterxml.jackson.annotation.JsonInclude;
import com.fasterxml.jackson.annotation.JsonProperty;

import java.util.ArrayList;
import java.util.List;

@JsonInclude(JsonInclude.Include.NON_NULL)
@JsonIgnoreProperties(ignoreUnknown = true)
public class AssociationCollection {
    private List<HotelAssociation> hotelAssociations;
    public AssociationCollection(){
        this.hotelAssociations = new ArrayList<HotelAssociation>();
    }

    @JsonProperty("HotelAssociations")
    public List<HotelAssociation> getHotelAssociations(){
        return hotelAssociations;
    }
    public void setHotelAssociations(List<HotelAssociation> associations){
        this.hotelAssociations = associations;
    }

    public void addHotelAssociation(String hotelId, String hotelGroupId){
        HotelAssociation association = new HotelAssociation();
        association.setHotelId(hotelId);
        association.setHotelGroupId(hotelGroupId);
        this.hotelAssociations.add(association);
    }
}

// HotelAssociation.java
package com.microsoft.bing.hotels.datatransferobjects;

import com.fasterxml.jackson.annotation.JsonProperty;

import java.util.List;

/***
 * Defines a hotel association, which defines the relationship
 * between a hotel and a hotel group. A hotel may belong
 * to only one group.
 */
public class HotelAssociation {
    private String hotelGroupId;
    private String hotelGroupName;
    private String hotelId;
    private String hotelName;
    private String partnerHotelId;
    private List<AdsApiError> errors;

    @JsonProperty("HotelGroupId")
    public String getHotelGroupId() {
        return hotelGroupId;
    }

    public void setHotelGroupId(String hotelGroupId) {
        this.hotelGroupId = hotelGroupId;
    }

    @JsonProperty("HotelGroupName")
    public String getHotelGroupName() {
        return hotelGroupName;
    }

    public void setHotelGroupName(String hotelGroupName) {
        this.hotelGroupName = hotelGroupName;
    }

    @JsonProperty("HotelId")
    public String getHotelId() {
        return hotelId;
    }

    public void setHotelId(String hotelId) {
        this.hotelId = hotelId;
    }

    @JsonProperty("HotelName")
    public String getHotelName() {
        return hotelName;
    }

    public void setHotelName(String hotelName) {
        this.hotelName = hotelName;
    }

    @JsonProperty("PartnerHotelId")
    public String getPartnerHotelId() {
        return partnerHotelId;
    }

    public void setPartnerHotelId(String partnerHotelId) {
        this.partnerHotelId = partnerHotelId;
    }

    @JsonProperty("Errors")
    public List<AdsApiError> getErrors() {
        return errors;
    }

    public void setErrors(List<AdsApiError> errors) {
        this.errors = errors;
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

    public String getMessage() {
        return String.format("Code: %s, Message: %s, Property: %s", getCode(), getApiMessage(), getProperty());
    }
}

```

```python
"""Hotel API hotel example"""
import json
import random
import string
import requests

BASE_URI = 'https://partner.api.sandbox.bingads.microsoft.com/Travel/V1'

CLIENT_ID = '<CLIENTIDGOESHERE>'

CUSTOMER_ID = "<CUSTOMERIDGOESHERE>"
ACCOUNT_ID = "<ACCOUNTIDGOESHERE>"
SUBACCOUNT_ID = "<SUBACCOUNTGOESHERE>"

AUTHORIZATIONBEARER_TOKEN = '<AUTHENTICATIONTOKENGOESHERE>'
AUTHORIZATION_HEADER = {'Authorization': "Bearer " + AUTHORIZATIONBEARER_TOKEN, 'Content-Type': 'application/json'}

def main():
    """The main entry point of this example"""
    try:
        print('Hotel example')

        print('*** Listing ungrouped hotels ***')
        ungrouped_hotels = list_ungrouped_hotels(CUSTOMER_ID, ACCOUNT_ID, SUBACCOUNT_ID)
        print_json(ungrouped_hotels)

        one_test_hotel = ungrouped_hotels[0]
        print('*** Getting one test hotel {0} ***'.format(one_test_hotel['Name']))
        hotel_to_update = get_hotel(CUSTOMER_ID, ACCOUNT_ID, SUBACCOUNT_ID, one_test_hotel['Id'])
        print_json(hotel_to_update)

        hotel_to_update['BidMultipliers'] = [
            {
                "Factor": 1.2,
                "DaysOfWeek": ["Thursday", "Friday", "Saturday"],
                "@odata.type": "#Model.CheckinDayOfWeekMultiplier"
            },
            {
                "Factor": .9,
                "DaysOfWeek": ["Sunday", "Monday"],
                "@odata.type": "#Model.CheckinDayOfWeekMultiplier"
            },
            {
                "Factor": 1.3,
                "MinimumNumberOfDays": 3,
                "@odata.type": "#Model.AdvanceBookingWindowMultiplier"
            }
        ]

        print("*** Updating hotel {0} ***".format(hotel_to_update['Name']))
        update_hotel(CUSTOMER_ID, ACCOUNT_ID, SUBACCOUNT_ID, hotel_to_update)

        print("*** Retrieving hotel after update ***")
        retrieved_hotel = get_hotel(CUSTOMER_ID, ACCOUNT_ID, SUBACCOUNT_ID, hotel_to_update['Id'])
        print_json(retrieved_hotel)

        print('*** Listing hotel groups ***')
        hotel_groups = list_hotel_groups(CUSTOMER_ID, ACCOUNT_ID, SUBACCOUNT_ID)
        print_json(hotel_groups)

        print("*** Add a hotel group ***")
        hotel_group_to_add = {"Name": "Test Hotel Group {0}".format(random_string())}
        added_hotel_group_id = add_hotel_group(CUSTOMER_ID, ACCOUNT_ID, SUBACCOUNT_ID, hotel_group_to_add)
        print("*** Added hotel group {0}: {1} ***".format(added_hotel_group_id, hotel_group_to_add['Name']))

        print("*** Associating hotel {0} to hotel group {1}".format(hotel_to_update['Name'], added_hotel_group_id))
        associations = associate_hotel_to_group(CUSTOMER_ID, ACCOUNT_ID, SUBACCOUNT_ID, hotel_to_update['Id'], added_hotel_group_id)
        print_json(associations)

        print("*** Ungrouping hotel {0} ***".format(hotel_to_update['Name']))
        ungroup_hotel(CUSTOMER_ID, ACCOUNT_ID, SUBACCOUNT_ID, hotel_to_update['Id'])

        print("*** Deleting hotel group {0} ***".format(added_hotel_group_id))
        delete_hotel_group(CUSTOMER_ID, ACCOUNT_ID, SUBACCOUNT_ID, added_hotel_group_id)
    except Exception as ex:
        raise ex

UNGROUPED_URI = BASE_URI + "/Customers({0})/Accounts({1})/SubAccounts('{2}')/Ungrouped"
def list_ungrouped_hotels(customer_id, account_id, subaccount_id):
    """Get an existing product"""
    url = UNGROUPED_URI.format(customer_id, account_id, subaccount_id)
    response = requests.get(url, headers=AUTHORIZATION_HEADER)
    response.raise_for_status()
    return json.loads(response.text)['value']

HOTEL_GROUPS_URI = BASE_URI + "/Customers({0})/Accounts({1})/SubAccounts('{2}')/HotelGroups"
def list_hotel_groups(customer_id, account_id, subaccount_id):
    """List hotel groups"""
    url = HOTEL_GROUPS_URI.format(customer_id, account_id, subaccount_id)
    response = requests.get(url, headers=AUTHORIZATION_HEADER)
    response.raise_for_status()
    return json.loads(response.text)['value']

def add_hotel_group(customer_id, account_id, subaccount_id, hotel_group):
    """Add a hotel group"""
    url = HOTEL_GROUPS_URI.format(customer_id, account_id, subaccount_id)
    response = requests.post(url, headers=AUTHORIZATION_HEADER, data=json.dumps(hotel_group))
    response.raise_for_status()
    return json.loads(response.text)['value']

HOTEL_URI = BASE_URI + "/Customers({0})/Accounts({1})/SubAccounts('{2}')/HotelGroups('{3}')/Hotels('{4}')"
def get_hotel(customer_id, account_id, subaccount_id, hotel_id, hotel_group_id=None):
    """Get a hotel by Id"""
    if hotel_group_id is None:
        hotel_group_id = get_default_hotel_group(customer_id, account_id, subaccount_id)['Id']
    url = HOTEL_URI.format(customer_id, account_id, subaccount_id, hotel_group_id, hotel_id)
    response = requests.get(url, headers=AUTHORIZATION_HEADER)
    response.raise_for_status()
    return json.loads(response.text)

def update_hotel(customer_id, account_id, subaccount_id, hotel, hotel_group_id=None):
    """Update a hotel"""
    if hotel_group_id is None:
        hotel_group_id = get_default_hotel_group(customer_id, account_id, subaccount_id)['Id']
    url = HOTEL_URI.format(customer_id, account_id, subaccount_id, hotel_group_id, hotel['Id'])
    response = requests.patch(url, headers=AUTHORIZATION_HEADER, data=json.dumps(hotel))
    response.raise_for_status()

def get_default_hotel_group(customer_id, account_id, subaccount_id):
    """Get the hotel group named 'Ungrouped'"""
    hotel_groups = list_hotel_groups(customer_id, account_id, subaccount_id)
    return [x for x in hotel_groups if x['Name'] == 'Ungrouped'][0]

ASSOCIATE_URI = BASE_URI + "/Customers({0})/Accounts({1})/SubAccounts('{2}')/Associate"
def associate_hotel_to_group(customer_id, account_id, subaccount_id, hotel_id, hotel_group_id=None):
    """Associate a hotel to a hotel group"""
    if hotel_group_id is None:
        hotel_group_id = get_default_hotel_group(customer_id, account_id, subaccount_id)['Id']
    url = ASSOCIATE_URI.format(customer_id, account_id, subaccount_id)
    response = requests.post(url, headers=AUTHORIZATION_HEADER, data=json.dumps({
        "HotelAssociations": [
            {"HotelGroupId": hotel_group_id, "HotelId": hotel_id}
        ]
    }))
    response.raise_for_status()
    return json.loads(response.text)['value']

def ungroup_hotel(customer_id, account_id, subaccount_id, hotel_id):
    """Associate a hotel to the 'Ungrouped' hotel group"""
    return associate_hotel_to_group(customer_id, account_id, subaccount_id, hotel_id, hotel_group_id=None)

HOTEL_GROUP_URI = BASE_URI + "/Customers({0})/Accounts({1})/SubAccounts('{2}')/HotelGroups('{3}')"
def delete_hotel_group(customer_id, account_id, subaccount_id, hotel_group_id):
    """Delete a hotel group"""
    url = HOTEL_GROUP_URI.format(customer_id, account_id, subaccount_id, hotel_group_id)
    response = requests.delete(url, headers=AUTHORIZATION_HEADER)
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
HOTELGROUPID=<HOTELGROUPIDGOESHERE>
HOTELID=<HOTELIDGOESHERE>

echo "*** Getting ungrouped hotels ***"
curl -X GET "https://partner.api.sandbox.bingads.microsoft.com/Travel/V1/Customers($CUSTOMERID)/Accounts($ACCOUNTID)/SubAccounts('$SUBACCOUNTID')/Ungrouped" -H "accept: application/json" -H "content-type: application/json" -H "Authorization: Bearer $AUTHORIZATIONTOKEN"

echo "*** Updating hotel $HOTELID ***"
curl -X PATCH "https://partner.api.sandbox.bingads.microsoft.com/Travel/V1/Customers($CUSTOMERID)/Accounts($ACCOUNTID)/SubAccounts('$SUBACCOUNTID')/HotelGroups('$HOTELGROUPID')/Hotels('$HOTELID')" -H "accept: application/json" -H "content-type: application/json" -H "Authorization: Bearer $AUTHORIZATIONTOKEN" -d "{\"BidMultipliers\":[{\"DaysOfWeek\":[\"Thursday\",\"Friday\",\"Saturday\"],\"Factor\":1.2,\"@odata.type\":\"#Model.CheckinDayOfWeekMultiplier\"},{\"DaysOfWeek\":[\"Sunday\",\"Monday\"],\"Factor\":0.9,\"@odata.type\":\"#Model.CheckinDayOfWeekMultiplier\"},{\"MinimumNumberOfDays\":3,\"Factor\":1.3,\"@odata.type\":\"#Model.AdvanceBookingWindowMultiplier\"}]}"

echo "*** Getting hotel $HOTELID ***"
curl -X GET "https://partner.api.sandbox.bingads.microsoft.com/Travel/V1/Customers($CUSTOMERID)/Accounts($ACCOUNTID)/SubAccounts('$SUBACCOUNTID')/HotelGroups('$HOTELGROUPID')/Hotels('$HOTELID')" -H "accept: application/json" -H "content-type: application/json" -H "Authorization: Bearer $AUTHORIZATIONTOKEN" 

echo "*** Associating hotel $HOTELID with hotel group $HOTELGROUPID ***"
curl -X POST "https://partner.api.sandbox.bingads.microsoft.com/Travel/V1/Customers($CUSTOMERID)/Accounts($ACCOUNTID)/SubAccounts('$ACCOUNTID')/Associate" -d "{\"HotelAssociations\":[{\"HotelGroupId\":\"$HOTELGROUPID\",\"HotelId\":\"$HOTELID\"}]}"
```

```php
<?php
$customerId = '<CUSTOMERIDGOESHERE>';
$accountId = '<ACCOUNTIDGOESHERE>';
$subaccountId = '<SUBACCOUNTIDGOESHERE>';
$authenticationToken = '<AUTHENTICATIONTOKENGOESHERE>';

$baseUri = "https://partner.api.sandbox.bingads.microsoft.com/Travel/V1";
$ungroupedUri = $baseUri . "/Customers(%s)/Accounts(%s)/SubAccounts('%s')/Ungrouped";
$hotelGroupsUri = $baseUri . "/Customers(%s)/Accounts(%s)/SubAccounts('%s')/HotelGroups";
$hotelGroupUri = $baseUri . "/Customers(%s)/Accounts(%s)/SubAccounts('%s')/HotelGroups('%s')";
$hotelUri = $baseUri . "/Customers(%s)/Accounts(%s)/SubAccounts('%s')/HotelGroups('%s')/Hotels('%s')";
$associateUri = $baseUri . "/Customers(%s)/Accounts(%s)/SubAccounts('%s')/Associate";

echo("*** Listing ungrouped hotels ***\r\n");
$ungroupedHotels = list_ungrouped_hotels();
printObject($ungroupedHotels);

$oneTestHotel = $ungroupedHotels[0];
echo(sprintf("*** Getting one test hotel %s ***\r\n", $oneTestHotel['Name']));
$hotelToUpdate = get_hotel($oneTestHotel['Id']);
printObject($hotelToUpdate);

$hotelToUpdate['BidMultipliers'] = array(
    array(
        "Factor" => 1.2,
        "DaysOfWeek" => array("Thursday", "Friday", "Saturday"),
        "@odata.type" => "#Model.CheckinDayOfWeekMultiplier"
    ),
    array(
        "Factor" => .9,
        "DaysOfWeek" => array("Sunday", "Monday"),
        "@odata.type" => "#Model.CheckinDayOfWeekMultiplier"
    ),
    array(
        "Factor" => 1.3,
        "MinimumNumberOfDays" => 3,
        "@odata.type" => "#Model.AdvanceBookingWindowMultiplier"
    )
);

echo(sprintf("*** Updating hotel %s ***\r\n", $hotelToUpdate['Name']));
update_hotel($hotelToUpdate);

echo("*** Retrieving hotel after update ***");
$retrievedHotel = get_hotel($hotelToUpdate['Id']);
printObject($retrievedHotel);

echo("*** Listing hotel groups ***\r\n");
$hotelGroups = list_hotel_groups();
printObject($hotelGroups);

echo("*** Adding a hotel group ***\r\n");
$hotelGroupToAdd = array('Name' => 'Test Hotel Group (' . uniqid() . ')');
$addedHotelGroupId = add_hotel_group($hotelGroupToAdd);
echo(sprintf("*** Added hotel group %s: %s ***\r\n", $addedHotelGroupId, $hotelGroupToAdd['Name']));

echo(sprintf("*** Associating hotel %s to hotel group %s ***\r\n", $hotelGroupToAdd['Name'], $addedHotelGroupId));
$associations = associate_hotel_to_group($retrievedHotel['Id'], $addedHotelGroupId);
printObject($associations);

echo(sprintf("*** Ungrouping hotel %s ***\r\n", $retrievedHotel['Name']));
ungroup_hotel($retrievedHotel['Id']);

echo("*** Deleting hotel group $addedHotelGroupId ***\r\n");
delete_hotel_group($addedHotelGroupId);

function list_ungrouped_hotels(){
    global $customerId, $accountId, $subaccountId, $ungroupedUri;
    
    $url = sprintf($ungroupedUri, $customerId, $accountId, $subaccountId);
    $result = request('GET', $url);
    if ($result === FALSE) {
        throw new Exception(var_dump($result));
    } else {
        return json_decode($result, true)['value'];
    }
}

function get_hotel($hotelId, $hotelGroupId = null){
    global $customerId, $accountId, $subaccountId, $hotelUri;

    # If $hotelGroupId is not specified then use the Id of the hotel group named "Ungrouped"
    if($hotelGroupId === null){
        $hotelGroupId = get_default_hotel_group()['Id'];
    }
    $url = sprintf($hotelUri, $customerId, $accountId, $subaccountId, $hotelGroupId, $hotelId);
    $result = request('GET', $url);
    if ($result === FALSE) {
        throw new Exception(var_dump($result));
    } else {
        return json_decode($result, true);
    }
}

function update_hotel($hotel, $hotelGroupId = null){
    global $customerId, $accountId, $subaccountId, $hotelUri;

    # If $hotelGroupId is not specified then use the Id of the hotel group named "Ungrouped"
    if($hotelGroupId === null){
        $hotelGroupId = get_default_hotel_group()['Id'];
    }
    $url = sprintf($hotelUri, $customerId, $accountId, $subaccountId, $hotelGroupId, $hotel['Id']);
    $result = request('PATCH', $url, $hotel);
    if ($result === FALSE) {
        throw new Exception(var_dump($result));
    }
}

function list_hotel_groups(){
    global $customerId, $accountId, $subaccountId, $hotelGroupsUri;

    $url = sprintf($hotelGroupsUri, $customerId, $accountId, $subaccountId);
    $result = request('GET', $url);
    if ($result === FALSE) {
        throw new Exception(var_dump($result));
    } else {
        return json_decode($result, true)['value'];
    }
}

function ungrouped_hotel_filter($hotel){
    return $hotel['Name'] == 'Ungrouped';
}

function get_default_hotel_group(){
    return array_filter(list_hotel_groups(), "ungrouped_hotel_filter")[0];
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

function delete_hotel_group($hotelGroupId){
    global $customerId, $accountId, $subaccountId, $hotelGroupUri;
    
    $url = sprintf($hotelGroupUri, $customerId, $accountId, $subaccountId, $hotelGroupId);
    $result = request('DELETE', $url);
    if ($result === FALSE) {
        throw new Exception(var_dump($result));
    }
}

function associate_hotel_to_group($hotelId, $hotelGroupId = null){
    global $customerId, $accountId, $subaccountId, $associateUri;

    # If $hotelGroupId is not specified then use the Id of the hotel group named "Ungrouped"
    if($hotelGroupId === null){
        $hotelGroupId = get_default_hotel_group()['Id'];
    }
    $url = sprintf($associateUri, $customerId, $accountId, $subaccountId);
    $result = request('POST', $url, array(
        "HotelAssociations" => array(
            array(
                "HotelGroupId" => $hotelGroupId,
                "HotelId" => $hotelId
            )
        )
    ));
    if ($result === FALSE) {
        throw new Exception(var_dump($result));
    } else {
        return json_decode($result, true)['value'];
    }
}

function ungroup_hotel($hotelId){
    # Associate the specified $hotelId to the 'Ungrouped' hotel group by specifying null for the $hotelGroupId
    return associate_hotel_to_group($hotelId, null);
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
