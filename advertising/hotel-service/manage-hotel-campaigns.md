---
title: "Manage Lodging Ad Campaigns"
description: Shows how to manage your lodging campaign's subaccounts, hotel groups, and hotels.
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
---

# Manage Hotel Ad campaigns

> [!NOTE]
> This beta release of Hotel Price Ads is available to select participants only. For information about participating in the beta release program, please contact your account manager or [enroll here](https://go.microsoft.com/fwlink/?linkid=2201950).
>
> The API and documentation are subject to change.

The Hotel API lets you manage your hotel ad campaigns and bidding. A subaccount provides the top-level logical organization of your hotel price ads. You can think of it as a lodging campaign (formerly hotel campaigns). You may have a maximum of 75 active subaccounts.

A subaccount specifies the campaign's daily budget, maximum bid allowed, and default bid and bid multipliers for ads that don't specify bids or multipliers.

> [!NOTE]
> Hotel ad campaigns referred to here have no relationship to campaigns in Microsoft Advertising.

If you haven't already done so, familiarize yourself with the following topics:

- [The basics](../hotel-service/hotel-api.md#thebasics)
- [Getting started](../hotel-service/get-started.md)
- [API reference](../hotel-service/reference.md)

For Hotel API endpoints, see [Endpoints](../hotel-service/reference.md#endpoints). 

For information about reporting, see [Hotel Price Ads Reporting API](reporting.md).

<a name="workingwithsubaccounts"></a>

## Working with subaccounts

Subaccounts are the top-level organization of Hotel Price Ads. The service creates the default subaccount for you when you sign up for Hotel Price Ads. The API lets you add subaccounts, list subaccounts, get a specific subaccount, and update a subaccount.

The following are the REST templates that you use to manage subaccounts.

- `/SubAccounts` &mdash; [GET](../hotel-service/reference.md#listsubaccounts) | [POST](../hotel-service/reference.md#addsubaccounts)
- `/SubAccounts('{subAccountId}')` &mdash; [GET](../hotel-service/reference.md#getsubaccount) | [PATCH](../hotel-service/reference.md#updatesubaccount)

For an example that gets and updates subaccounts, see [code examples](../hotel-service/code-example-subaccounts.md). (Use the Language selector in the right pane to see the example in different languages.)

<a name="listingsubaccounts"></a>

### Listing subaccounts

To get the list of subaccounts, send the following request.

```
GET https://<host>/Travel/V1/Customers(<customerid>)/Accounts(<accountid>)/SubAccounts HTTP/1.1
Authorization: Bearer <oauthaccesstoken>
Accept: application/json
Host: <host>
```

The response contains a [CollectionResponse](../hotel-service/reference.md#collectionresponse) object. The `value` array contains a list of [SubAccount](../hotel-service/reference.md#subaccount) objects.

```
HTTP/1.1 200 OK
x-ms-requestid: a21451ae-f86b-4a19-a00e-9265b59a99ec
x-ms-trackingid: 7cd2710c-821a-48e8-99af-efdc05aebe86

{
  "@odata.count":1,
  "value":[
    {
      "Id":"1902000002",
	  "Name":"DefaultSubAccount1",
	  "Status":"Active",
	  "Bid":{
        "@odata.type":"#Model.FixedBid",
		"Amount":2.75
      },
	  "BidMultipliers":[],
	  "DailyBudget":{
        "Amount":125.25
      },
	  "MaximumBid":{
        "Amount":10.0
      }
    }
  ]
}
```

<a name="updatingasubaccount"></a>

### Updating a subaccount

The subaccount specifies the default bid and bid multipliers to use for hotel groups and hotels that don't specify a bid or multipliers. The subaccount also specifies the budget that's spread throughout the day, and the maximum bid that you want all bids not to exceed.

For details about the valid bid range and budget for your market, see the Currency Value table in the [Currencies](/advertising/guides/currencies) topic.

To pause all hotels in the subaccount, set the subaccount's `Bid` property to a [PercentageBid](../hotel-service/reference.md#percentagebid) object and the percentage bid amount to zero (0.0). 

If the subaccount specifies bid multipliers and you want to remove them, set `BidMultipliers` to an empty array (for example, "BidMultipliers":[]).

To update a subaccount, send a PATCH request. The body of the request is a [SubAccount](../hotel-service/reference.md#subaccount) object. Include only the properties that you want to update. This example shows updating multipliers.

```
PATCH https://<host>/Travel/V1/Customers(<customerid>)/Accounts(<accountid>)/SubAccounts('<subaccountid>') HTTP/1.1
Authorization: Bearer <oauthaccesstoken>
Content-Type: application/json
Host: <host>
Content-Length: 682

{
  "Id":"1902000002",
  "BidMultipliers":[
    { 
	  "Countries":["US"],
	  "Factor":1.1,
	  "@odata.type":"#Model.UserCountryMultiplier"
	},
	{
	  "Sites":["LocalUniversal","MapResults"],
	  "Factor":0.85,
	  "@odata.type":"#Model.SiteMultiplier"
	},
	{
	  "DeviceTypes":["Desktop"],
	  "Factor":0.65,
	  "@odata.type":"#Model.DeviceMultiplier"
	},
	{
	  "MinimumNumberOfNights":5,
	  "Factor":1.3,
	  "@odata.type":"#Model.LengthOfStayMultiplier"
	},
	{
	  "DaysOfWeek":["Thursday","Friday","Saturday"],
	  "Factor":1.2,
	  "@odata.type":"#Model.CheckinDayOfWeekMultiplier"
	},
	{
	  "DaysOfWeek":["Sunday","Monday"],
	  "Factor":0.9,
	  "@odata.type":"#Model.CheckinDayOfWeekMultiplier"
	},
	{
	  "MinimumNumberOfDays":3,
	  "Factor":1.3,
	  "@odata.type":"#Model.AdvanceBookingWindowMultiplier"
	} 
  ]
}
```

<a name="gettingsubaccounts"></a>

### Getting a subaccount

To get a specific subaccount, send the following request. The subaccount ID must be wrapped in single quotes as shown.

```
GET https://<host>/Travel/V1/Customers(<customerid>)/Accounts(<accountid>)/SubAccounts('<subaccountid>') HTTP/1.1
Authorization: Bearer <oauthaccesstoken>
Accept: application/json
Host: <host>
```

The response contains a [SubAccount](../hotel-service/reference.md#subaccount) object.

```
HTTP/1.1 200 OK
x-ms-requestid: 58d37dd1-78ae-4ced-91e4-7f57e647ddee
x-ms-trackingid: 5345bf4f-e64a-47a6-8d1e-43cc0231dc1b

{
  "Id":"1902000002",
  "Name":"DefaultSubAccount1",
  "Status":"Active",
  "Bid":{
    "@odata.type":"#Model.FixedBid",
	"Amount":2.75
  },
  "BidMultipliers":[
    {
      "@odata.type":"#Model.DeviceMultiplier",
	  "Factor":0.65,
	  "DeviceTypes":["Desktop"]
    },
	{
      "@odata.type":"#Model.LengthOfStayMultiplier",
	  "Factor":1.3,
	  "MinimumNumberOfNights":5
    },
	{
      "@odata.type":"#Model.UserCountryMultiplier",
	  "Factor":1.1,
	  "Countries":["US"]
    },
	{
      "@odata.type":"#Model.AdvanceBookingWindowMultiplier",
	  "Factor":1.3,
	  "MinimumNumberOfDays":3
    },
	{
      "@odata.type":"#Model.CheckinDayOfWeekMultiplier",
	  "Factor":0.9,
	  "DaysOfWeek":["Monday","Sunday"]
    },
	{
      "@odata.type":"#Model.CheckinDayOfWeekMultiplier",
	  "Factor":1.2,
	  "DaysOfWeek":["Thursday","Friday","Saturday"]
    },
	{
      "@odata.type":"#Model.SiteMultiplier",
	  "Factor":0.85,
	  "Sites":["MapResults","LocalUniversal"]
    }
  ],
  "DailyBudget":{
    "Amount":125.25
  },
  "MaximumBid":{
    "Amount":10.0
  },
  "HotelAssociationCount":39540
}
```

<a name="workingwithhotelgroups"></a>

## Working with hotel groups

Hotel groups are the second level of organization that you use to group hotels. When you create a subaccount, the service creates a default hotel group under the subaccount named, Ungrouped. The API lets you list, get, update, and add hotel groups.

The following are the REST templates that you use to manage hotel groups.

- `/SubAccounts('{subAccountId}')/HotelGroups` &mdash; [GET](../hotel-service/reference.md#listhotelgroups) | [POST](../hotel-service/reference.md#addhotelgroup)
- `/SubAccounts('{subAccountId}')/HotelGroups('{hotelGroupId}')` &mdash; [GET](../hotel-service/reference.md#gethotelgroup) | [PATCH](../hotel-service/reference.md#updatehotelgroup) | [DELETE](../hotel-service/reference.md#deletehotelgroup)

For an example that gets, adds, and updates hotel groups, see [code examples](../hotel-service/code-example-hotel-groups.md). (Use the Language selector in the right pane to see the example in different languages.)

<a name="listinghotelgroups"></a>

### Listing hotel groups

By default, when you request a list of hotel groups under a subaccount, the API returns a maximum of 1,000 groups. To determine the total number of groups in the subaccount, use the [$count](./reference.md#count-param) query parameter. To specify the number of groups to return, use the [$top](./reference.md#top-param) query parameter. The maximum number of groups that you can request in single call is 5,000. If the subaccount contains more than 5,000 groups, use the $top and [$skip](./reference.md#skip-param) query parameters to page through all groups.

To get a list of the first 1,000 hotel groups under a subaccount, send the following request.

```
GET https://<host>/Travel/V1/Customers(<customerid>)/Accounts(<accountid>)/SubAccounts('<subaccountid>')/HotelGroups HTTP/1.1
Authorization: Bearer <oauthaccesstoken>
Accept: application/json
Host: <host>
```

The response contains a [CollectionResponse](../hotel-service/reference.md#collectionresponse) object. The `value` array contains a list of [HotelGroup](../hotel-service/reference.md#hotelgroup) objects. This example shows the default Ungrouped group.

```
HTTP/1.1 200 OK
Content-Type: application/json; odata.metadata=minimal
x-ms-requestid: f526c0e6-f7d8-48c7-9270-8fb0a0465153
x-ms-trackingid: 21fafae0-4053-46e0-8271-87bc5fce6312

{
  "@odata.count":6,
  "value":[
    {
      "Id":"55113020342274",
      "Name":"UnGrouped",
      "Status":"Active",
      "Bid":{
        "@odata.type":"#Model.FixedBid",
        "Amount":3.0
      },
      "BidSource":"SubAccount",
      "BidMultiplierSource":null,
      "BidMultipliers":[]
    },
	
	. . .
	
    {
      "Id":"55113020351605",
      "Name":"test-2",
      "Status":"Active",
      "Bid":{
        "@odata.type":"#Model.FixedBid",
        "Amount":1.5
      },
      "BidSource":"HotelGroup",
      "BidMultiplierSource":null,
      "BidMultipliers":[]
    }
  ]
}
```

<a name="addingahotelgroup"></a>

### Adding a hotel group

You would create a new hotel group if you want to create a new logical grouping of hotels. To specify the hotel group, use the [HotelGroup](../hotel-service/reference.md#hotelgroup) object. The only required field is `Name`. Use a descriptive name that indicates the grouping. The `Bid` and `BidMultipliers` fields are optional. If you don't specify them, the group uses the bid and bid multipliers from the subaccount. Specify them if you want to override the subaccount values. You can specify the bid, multipliers, or both.

For details about the valid bid range for your market, see the Currency Value table in the [Currencies](/advertising/guides/currencies) topic.

The following example creates a hotel group that inherits the bid and bid multipliers from the subaccount.

```
POST https://<host>/Travel/V1/Customers(<customerid>)/Accounts(<accountid>)/SubAccounts('<subaccountid>')/HotelGroups HTTP/1.1
Authorization: Bearer <oauthaccesstoken>
Accept: application/json
Host: <host>
Content-Length: 26

{"Name":"test-3"}
```

The response is an [AddResponse](../hotel-service/reference.md#addresponse) object that contains the ID of the added hotel group.

```
HTTP/1.1 200 OK
Content-Length: 140
Content-Type: application/json; odata.metadata=minimal
x-ms-requestid: 8a2e2026-e170-4607-b4fe-06954a67b80a
x-ms-trackingid: e86fcdbd-613e-44a9-b5fc-528cfa87297a

{
  "value":"55113020351606"
}
```

After adding a hotel group, use the [associate](../hotel-service/reference.md#associate) template to add hotels to the group. For information, see [Associating a hotel with a hotel group](#associatinghotels).

<a name="updatingahotelgroup"></a>

### Updating a hotel group

The hotel group specifies the default bid and bid multipliers to use for hotels in the group. The group either explicitly specifies them or inherits them from the subaccount it belongs to. You can use the API to update the bid and bid multipliers to use for hotels that do not specify a bid or multipliers.

For details about the valid bid range and budget for your market, see the Currency Value table in the [Currencies](/advertising/guides/currencies) topic.

If the subaccount specifies a maximum bid, the hotel group's bid must be less than the subaccount's maximum bid.

To pause all hotels in the hotel group, set the group's `Bid` property to a [PercentageBid](../hotel-service/reference.md#percentagebid) object and the percentage bid amount to zero (0.0). 

If the group specifies a bid greater than zero but the group's hotels are not serving, it may be because the subaccount's bid is zero. 

To remove the hotel group's bid, set `Bid` to null (for example, "Bid":null).

If the hotel group specifies bid multipliers and you want to remove them, set `BidMultipliers` to an empty array (for example, "BidMultipliers":[]).


To update a hotel group, send a PATCH request. The body of the request is a [HotelGroup](../hotel-service/reference.md#hotelgroup) object. Include only the properties that you want to update. This example shows updating the bid and multipliers.

```
PATCH https://<host>/Travel/V1/Customers(<customerid>)/Accounts(<accountid>)/SubAccounts('<subaccountid>')/HotelGroups('<hotelgroupid>') HTTP/1.1
Authorization: Bearer <oauthaccesstoken>
Content-Type: application/json
Content-Length: 474
Host: <host>

{
  "Id":"55113020351606",
  "Bid":{
    "Amount":4.75,
    "@odata.type":"#Model.FixedBid"
  },
  "BidMultipliers":[
    {
      "DeviceTypes":["Desktop"],
      "Factor":0.65,
      "@odata.type":"#Model.DeviceMultiplier"
    },
    {
      "MinimumNumberOfNights":7,
      "Factor":1.3,
      "@odata.type":"#Model.LengthOfStayMultiplier"
    },
    {
      "DaysOfWeek":["Thursday","Friday","Saturday"],
      "Factor":1.5,
      "@odata.type":"#Model.CheckinDayOfWeekMultiplier"
    },
    {
      "DaysOfWeek":["Sunday","Monday"],
      "Factor":2.5,
      "@odata.type":"#Model.CheckinDayOfWeekMultiplier"
    }
  ]
}
```

<a name="gettingahotelgroup"></a>

### Getting a hotel group

To get a specific hotel group, send the following request. The hotel group ID must be wrapped in single quotes as shown.

```
GET https://<host>/Travel/V1/Customers(<customerid>)/Accounts(<accountid>)/SubAccounts('<subaccountid>')/HotelGroups('<hotelgroupid>') HTTP/1.1
Authorization: Bearer <oauthaccesstoken>
Accept: application/json
Host: <host>
```

The response contains a [HotelGroup](../hotel-service/reference.md#hotelgroup) object.

```
HTTP/1.1 200 OK
Content-Length: 813
Content-Type: application/json; odata.metadata=minimal
x-ms-requestid: 3be2a39c-723c-41bd-9e74-0a9e44c4fa3c
x-ms-trackingid: e5eba818-2ef7-4fe6-9225-9e2325414e3b

{
  "Id":"55113020351606",
  "Name":"test-2",
  "Status":"Active",
  "Bid":{
    "@odata.type":"#Model.FixedBid",
    "Amount":4.75
  },
  "BidSource":"HotelGroup",
  "BidMultiplierSource":"HotelGroup",
  "BidMultipliers":[
    {
      "@odata.type":"#Model.DeviceMultiplier",
      "Factor":0.65,
      "DeviceTypes":["Desktop"]
    },
    {
      "@odata.type":"#Model.LengthOfStayMultiplier",
      "Factor":1.3,
      "MinimumNumberOfNights":7
    },
    {
      "@odata.type":"#Model.CheckinDayOfWeekMultiplier",
      "Factor":2.5,
      "DaysOfWeek":["Monday","Sunday"]
    },
    {
      "@odata.type":"#Model.CheckinDayOfWeekMultiplier",
      "Factor":1.5,
      "DaysOfWeek":["Thursday","Friday","Saturday"]
    }
  ],
  "HotelAssociationCount":0
}
```


<a name="workingwithhotels"></a>

## Working with hotels

Hotels represent the hotels in your hotel feed. The API lets you list, get, and update hotels. You cannot use the API to add hotels; to add hotels, use the [Hotel feed](../hotel-feed/hotel-feed.md). Hotels are unique per subaccount &mdash; more than one subaccount may not contain the same hotel.

The following are the REST templates that you use to manage hotels.

- `/SubAccounts('{subAccountId}')/Hotels` &mdash; [GET](../hotel-service/reference.md#listallhotels)
- `/SubAccounts('{subAccountId}')/HotelGroups('{hotelGroupId}')/Hotels` &mdash; [GET](../hotel-service/reference.md#listhotels)
- `/SubAccounts('{subAccountId}')/HotelGroups('{hotelGroupId}')/Hotels('{hotelId}')` &mdash; [GET](../hotel-service/reference.md#gethotel) | [PATCH](../hotel-service/reference.md#updatehotel)

For an example that gets and updates hotels, see [hotel examples](../hotel-service/code-example-hotels.md). (Use the Language selector in the right pane to see the example in different languages.)


<a name="listinghotels"></a>

### Listing hotels

By default, when you request a list of hotels in a hotel group, the API returns a maximum of 1,000 hotels. To determine the total number of hotels in the hotel group, use the [$count](./reference.md#count-param) query parameter. To specify the number of hotels to return, use the [$top](./reference.md#top-param) query parameter. The maximum number of hotels that you can request in single call is 5,000. If your hotel group contains more than 5,000 hotels, use the $top and [$skip](./reference.md#skip-param) query parameters to page through the hotels.

> [!NOTE] 
> You should use the $top and $skip query parameters to page through hotels in a UI experience only. To get all of your hotels, use the [Reporting](reporting.md) feature to download the hotels.
>
> - /SubAccounts('{subAccountId}')/Hotels  
> - /SubAccounts('{subaccountid}')/HotelGroups('{hotelgroupid}')/Hotels  
> - /SubAccounts('{subAccountId}')/Ungrouped

To get the first 1,000 hotels in a hotel group, send the following request.

```
GET https://<host>/Travel/V1/Customers(<customerid>)/Accounts(<accountid>)/SubAccounts('<subaccountid>')/HotelGroups('<hotelgroupid>')/Hotels HTTP/1.1
Authorization: Bearer <oauthaccesstoken>
Accept: application/json
Host: <host>
```

The response contains a [CollectionResponse](../hotel-service/reference.md#collectionresponse) object. The `value` array contains a list of [Hotel](../hotel-service/reference.md#hotel) objects.

```
HTTP/1.1 200 OK
Content-Length: 1611
Content-Type: application/json; odata.metadata=minimal
x-ms-requestid: d836f741-8083-4d54-b49e-e1f14287b944
x-ms-trackingid: 3787a393-eca3-4ad0-be3d-dd4c7ae08906

{
  "@odata.count":2,
  "value":[
    {
      "Id":"55113020344013",
      "Name":"Contoso Inn Singer",
      "PartnerHotelId":"942909",
      "Status":"Active",
      "CountryCode":"US",
      "Bid":{
        "@odata.type":"#Model.FixedBid",
        "Amount":2.75
      },
      "BidSource":"HotelGroup",
      "BidMultiplierSource":"HotelGroup",
      "BidMultipliers":[
        {
          "@odata.type":"#Model.DeviceMultiplier",
          "Factor":2.65,
          "DeviceTypes":["Desktop"]
        },
        {
          "@odata.type":"#Model.LengthOfStayMultiplier",
          "Factor":1.3,
          "MinimumNumberOfNights":8
        },
        {
          "@odata.type":"#Model.UserCountryMultiplier",
          "Factor":1.1,
          "Countries":["US"]
        },
        {
          "@odata.type":"#Model.AdvanceBookingWindowMultiplier",
          "Factor":1.3,
          "MinimumNumberOfDays":3
        },
        {
          "@odata.type":"#Model.CheckinDayOfWeekMultiplier",
          "Factor":0.9,
          "DaysOfWeek":["Monday","Sunday"]
        },
        {
          "@odata.type":"#Model.CheckinDayOfWeekMultiplier",
          "Factor":1.2,
          "DaysOfWeek":["Thursday","Friday","Saturday"]
        },
        {
          "@odata.type":"#Model.SiteMultiplier",
          "Factor":0.85,"Sites":["MapResults","LocalUniversal"]
        }
      ]
    },
    {
      "Id":"55113020351595",
      "Name":"Contoso Inn Casino Center",
      "PartnerHotelId":"60278",
      "Status":"Active",
      "CountryCode":"US",
      "Bid":{
        "@odata.type":"#Model.FixedBid",
        "Amount":2.75
      },
      "BidSource":"HotelGroup",
      "BidMultiplierSource":null,
      "BidMultipliers":[]
    }
  ]
}
```

<a name="updatingahotel"></a>

### Updating a hotel

The hotel specifies the bid and bid multipliers to use for hotel price ads. The hotel either explicitly specifies them or inherits them from the hotel group or subaccount, in that order. You can use the API to update the bid and bid multipliers to use for the hotel's ad.

For details about the valid bid range for your market, see the Currency Value table in the [Currencies](/advertising/guides/currencies) topic.

If the subaccount specifies a maximum bid, the hotel's bid must be less than the subaccount's maximum bid.

To pause a hotel, set its `Bid` property to a [PercentageBid](../hotel-service/reference.md#percentagebid) object and the percentage bid amount to zero (0.0). 

If the hotel specifies a bid greater than zero but it's not serving, it may be because the bid of the hotel group or subaccount it belongs to is zero. 

To remove a hotel's bid, set its `Bid` to null (for example, "Bid":null).

If the hotel specifies bid multipliers and you want to remove them, set `BidMultipliers` to an empty array (for example, "BidMultipliers":[]).


To update a hotel, send a [PATCH](reference.md#updatehotel) request. The request may specify the ID that Microsoft assigned to the hotel or ID that the advertiser assigned to the hotel. If you specify the advertiser-assigned ID, the request must set the *PartnerHotelId* query parameter to **true**. 

The body of the request is a [Hotel](../hotel-service/reference.md#hotel) object. Include only the properties that you want to update. This example shows updating the multipliers.

```
{
  "BidMultipliers":[
    {
      "Countries":["US"],
      "Factor":1.1,
      "@odata.type":"#Model.UserCountryMultiplier"
    },
    {
      "DeviceTypes":["Desktop"],
      "Factor":2.65,
      "@odata.type":"#Model.DeviceMultiplier"
    }
  ]
}
```

<a name="gettingahotel"></a>

### Getting a hotel

To get a specific hotel, send the following request. The hotel ID must be wrapped in single quotes as shown.

```
GET https://<host>/Travel/V1/Customers(<customerid>)/Accounts(<accountid>)/SubAccounts('<subaccountid>')/HotelGroups('<hotelgroupid>')/Hotels('<hotelid>') HTTP/1.1
Authorization: Bearer <oauthaccesstoken>
Accept: application/json
Host: <host>
```

The response contains a [Hotel](../hotel-service/reference.md#hotel) object.

```
HTTP/1.1 200 OK
Content-Length: 1122
Content-Type: application/json; odata.metadata=minimal
x-ms-requestid: a9a591c2-01c1-4e1c-8a6a-5cdece574460
x-ms-trackingid: ceb70eb3-36ca-4b99-a5f7-b1a04de1e4ae

{
  "Id":"55113020344013",
  "Name":"Contoso Inn Singer",
  "PartnerHotelId":"942909",
  "Status":"Active",
  "CountryCode":"US",
  "Bid":{
    "@odata.type":"#Model.FixedBid",
    "Amount":3.0
  },
  "BidSource":"SubAccount",
  "BidSource":"Hotel",
  "BidMultipliers":[
    {
      "@odata.type":"#Model.DeviceMultiplier",
      "Factor":2.65,
      "DeviceTypes":["Desktop"]
    },
    {
      "@odata.type":"#Model.UserCountryMultiplier",
      "Factor":1.1,
      "Countries":["US"]
    }
  ]
}
```

<a name="bidmultipliers"></a>

## Length of stay and Advanced booking window multipliers

The description for [LengthOfStayMultiplier](../hotel-service/reference.md#lengthofstaymultiplier) says that Bing applies the multiplier if the user is staying the specified number of nights **or longer**. And the description for [AdvanceBookingWindowMultiplier](../hotel-service/reference.md#advancebookingwindowmultiplier) also says that Bing applies the multiplier if the booking occurs in advance the specified number of days **or longer**. The key part of the description is the phrase, **or longer**. 

If you specify more than one of these multipliers, the combination of factor and days/nights must be unique; otherwise, the call fails with a DuplicateValues error. In the following LengthOfStayMultiplier example, the factor for each entry is 1. Because the entry for 6 nights applies to stays of 6 nights or longer, the second entry for 8 nights is a duplicate. To fix this error, simply remove the entry for 8 nights or provide a different factor value. 


```json
  {
      "MinimumNumberOfNights": 8,
      "Factor": "1",
      "@odata.type": "#Model.LengthOfStayMultiplier"
    },
    {
      "MinimumNumberOfNights": 6,
      "Factor": "1",
      "@odata.type": "#Model.LengthOfStayMultiplier"
  }
```




<a name="associatinghotels"></a>

## Associating a hotel with a hotel group

When you import your hotel feed file, the hotels are placed in the *Ungrouped* hotel group, which is the default hotel group. A hotel may be associated with only one hotel group. If you create a new hotel group to logically organize your hotels, you'll want to move hotels from the *Ungrouped* hotel group to the new group you created. To associate a hotel with a new hotel group, use the [Associate](reference.md#associate-template) template. When you associate a hotel with a new hotel group, the service removes the previous association.

The following POST example, shows how to specify the association. The body of the request is an [AssociationCollection](../hotel-service/reference.md#associationcollection) object. The collection may contain a maximum of 500 [HotelAssociation](../hotel-service/reference.md#hotelassociation) objects.

```
POST https://<host>/Travel/V1/Customers(<customerid>)/Accounts(<accountid>)/SubAccounts('<subaccountid>')/Associate HTTP/1.1
Authorization: Bearer <oauthaccesstoken>
Content-Type: application/json
Host: <host>
Content-Length: 169

{
  "HotelAssociations":[
    {
      "HotelGroupId":"55113020351226",
      "HotelId":"55113020351595"
    },
    {
      "HotelGroupId":"55113020351226",
      "HotelId":"55113020344013"
    }
  ]
}
``` 

The Associate method should always return success. If one or more of the associations fail, the response contains the input association of the failed associations, and the reason for the failure. 

The response contains a [CollectionResponse](../hotel-service/reference.md#collectionresponse) object. If all associations succeeded, the `value` array is empty. Otherwise, `value` contains a [HotelAssociation](../hotel-service/reference.md#hotelassociation) object for each association that failed. The association's `Errors` field contains the reasons for the failure.

```
HTTP/1.1 200 OK
Content-Length: 770
Content-Type: application/json; odata.metadata=minimal
x-ms-requestid: 574fe6c6-503d-427d-8921-a259f76de0ed
x-ms-trackingid: a5f2510e-709a-4370-876e-bfb05ef2b8df

{
  "value":[
    {
      "HotelId":"55113020351595",
      "HotelName":null,
      "PartnerHotelId":null,
      "HotelGroupId":"55113020351226",
      "HotelGroupName":null,
      "Errors@odata.type":"#Collection(Model.AdsApiError)",
      "Errors":[
        {
          "Code":"<code>","Property":"<propertyname>","Message":"<messagestring>"
        }
      ]
    }
  ]
}
```

### Getting hotel associations


By default, when you request a list of associations in a subaccount, the API returns a maximum of 1,000 associations. To determine the total number of associations, use the [$count](./reference.md#count-param) query parameter. To specify the number of associations to return, use the [$top](./reference.md#top-param) query parameter. The maximum number of associations that you can request in single call is 5,000. If your subaccount contains more than 5,000 associations, use the $top and [$skip](./reference.md#skip-param) query parameters to page through all associations.


To get  the first 1,000 hotel and hotel group associations for a subaccount, send the following request:

```
GET https://<host>/Travel/V1/Customers(<customerid>)/Accounts(<accountid>)/SubAccounts('<subaccountid>')/Associations HTTP/1.1
Authorization: Bearer <oauthaccesstoken>
Accept: application/json
Host: <host>
```

The response contains a [CollectionResponse](../hotel-service/reference.md#collectionresponse) object. The `value` array contains a list of [HotelAsssociation](../hotel-service/reference.md#hotelassociation) objects.

```
HTTP/1.1 200 OK
Content-Length: 6880
Content-Type: application/json; odata.metadata=minimal
x-ms-requestid: 50bb9a63-f324-4c28-84f9-733b24ab3d0f
x-ms-trackingid: 4fa56e03-7e86-4f44-b671-8e00a67c2eed

{
  "@odata.count":39540,
  "value":[
    {
      "HotelId":"55113020342273",
      "HotelName":"Contoso Inn Downtown DC/Convention Center",
      "PartnerHotelId":"99995",
      "HotelGroupId":"55113020342274",
      "HotelGroupName":"UnGrouped"
    },
    {
      "HotelId":"55113020342274",
      "HotelName":"The Contoso Hotel",
      "PartnerHotelId":"999896",
      "HotelGroupId":"55113020342274",
      "HotelGroupName":"UnGrouped"
    },
    
    . . .
    
  ]
}
```


<a name="filterassociations"></a>

### Filtering hotel associations

To return a subset of associations, use the OData $filter query parameter. You may filter associations by `HotelId` or `PartnerHotelId` only. The maximum URL length (2,048) determines the number of IDs that you can specify. If the URL exceeds 2,048 characters, the request returns 404.

The following shows an example that returns the specified hotel associations.

```
GET https://<host>/Travel/V1/Customers(<customerid>)/Accounts(<accountid>)/SubAccounts('<subaccountid>')/Associations?$filter=HotelId+eq+'55113020342282'+or+HotelId+eq+'55113020344943' HTTP/1.1
Authorization: Bearer <accesstokengoeshere>
Accept: application/json
Host: <host>
```



## Batch processing

To send multiple requests in a single HTTP request, use the [/$batch](reference.md#batch) template. You may send a maximum of 500 requests in a single batch request.

> [!NOTE]
> Batch processing is supported only for hotel updates such as bid changes.

### The request

The following shows an example request.

```
POST https://<host>/Travel/V1/$batch HTTP/1.1
Authorization: Bearer <accesstokengoeshere>
Content-Type: multipart/mixed; boundary=batch_086fe0de-9b26-4d4a-a206-6df2013a2816
Host: <host>
Content-Length: 1371
```

The Content-Type header must be set to multipart/mixed and include the boundary ID. The boundary ID is opaque and delimits each sub request in the batch request. The ID may be any unique string. This example uses, batch_\<unique string\>, where \<unique string\> is a GUID.

The body of the batch request contains multiple individual requests delimited by the boundary ID. The following shows an example of the body of a batch request. Be sure to terminate each line in the body of the batch request with CRLF (carriage return and line feed).


```
--batch_086fe0de-9b26-4d4a-a206-6df2013a2816
Content-Type: application/http
Content-Transfer-Encoding: binary

PATCH Customers(<customerid>)/Accounts(<accountid>)/SubAccounts('<subaccountid>')/HotelGroups('<groupid>')/Hotels('<hotelid>') HTTP/1.1
Content-Type: application/json; odata.metadata=minimal
Host: partner.api.sandbox.bingads.microsoft.com

{"Id":"<hotelid>","Bid":{"Amount":1.75,"@odata.type":"#Model.FixedBid"}}

--batch_086fe0de-9b26-4d4a-a206-6df2013a2816
Content-Type: application/http
Content-Transfer-Encoding: binary

PATCH Customers(<customerid>)/Accounts(<accountid>)/SubAccounts('<subaccountid>')/HotelGroups('groupid>')/Hotels('<hotelid>') HTTP/1.1
Content-Type: application/json; odata.metadata=minimal
Host: partner.api.sandbox.bingads.microsoft.com

{"Id":"<hotelid>","Bid":{"Amount":1.75,"@odata.type":"#Model.FixedBid"}}

--batch_086fe0de-9b26-4d4a-a206-6df2013a2816
Content-Type: application/http
Content-Transfer-Encoding: binary

PATCH Customers(<customerid>)/Accounts(<accountid>)/SubAccounts('<subaccountid>')/HotelGroups('groupid>')/Hotels('<hotelid>') HTTP/1.1
Content-Type: application/json; odata.metadata=minimal
Host: partner.api.sandbox.bingads.microsoft.com

{"Id":"<hotelid>","Bid":{"Amount":1.75,"@odata.type":"#Model.FixedBid"}}

--batch_086fe0de-9b26-4d4a-a206-6df2013a2816--
```

Note that each boundary ID is prepended with a double dash (for example, **--**batch_086fe0de-9b26-4d4a-a206-6df2013a2816).
And the terminating boundary ID that goes after the last request in the batch is enclosed with double dashes (for example, **--**batch_086fe0de-9b26-4d4a-a206-6df2013a2816**--**).

The boundary ID delimiter must be followed by the Content-Type and Content-Transfer-Encoding headers as shown. Because you may only update hotels, the request must use the HTTP PATCH verb and use the [hotel](reference.md#updatehotel) template to identify the hotel to update. The request must include the Content-Type header and it must be set to *application/json; odata.metadata=minimal*. The body of the request is a [Hotel](reference.md#hotel) object. The object must include the hotel's ID and should include only the fields you're updating.


### The response

The response is similarly delimited and each item in the response corresponds directly to each item in the request. The response's Content-Type header contains the boundary ID. Get the ID and use it to parse each response item.


The following shows the response to the above request.

```
HTTP/1.1 200 OK
Content-Type: multipart/mixed; boundary=batchresponse_d33d1715-3dd3-45aa-80a9-854493c8764e
x-ms-requestid: c0fb9b49-2af0-4b41-bf57-0e4a0f8b55b9
x-ms-trackingid: 8b652a73-1bef-488d-b7d5-f371a31867a4
Date: Tue, 27 Mar 2018 20:30:19 GMT
Content-Length: 512

--batchresponse_d33d1715-3dd3-45aa-80a9-854493c8764e
Content-Type: application/http
Content-Transfer-Encoding: binary

HTTP/1.1 204 No Content


--batchresponse_d33d1715-3dd3-45aa-80a9-854493c8764e
Content-Type: application/http
Content-Transfer-Encoding: binary

HTTP/1.1 204 No Content


--batchresponse_d33d1715-3dd3-45aa-80a9-854493c8764e
Content-Type: application/http
Content-Transfer-Encoding: binary

HTTP/1.1 204 No Content


--batchresponse_d33d1715-3dd3-45aa-80a9-854493c8764e--
```

Each response item contains an HTTP status. For updates, if the update succeeds, the status is 204. If the update fails (for example, the hotel was not found, a value is not valid, or the hotel object is malformed), the status is 400 and the body contains a list of errors. (A request may fail with other status codes.) 

The following shows a response item that contains an error. If an error occurs, the body contains a [CollectionResponse](reference.md#collectionresponse) object and each item in the `value` array is an [AdsApiError](reference.md#adsapierror) object.

```
--batchresponse_d0048f4c-8a3f-40aa-9392-718943ecc5f3
Content-Type: application/http
Content-Transfer-Encoding: binary

HTTP/1.1 400 Bad Request
x-ms-requestid: 00b551c2-b552-4cca-9e1b-04e0e5ffb4b7
x-ms-trackingid: ad383e45-4174-43d7-95bc-cca2ac6176e8
Content-Type: application/json; odata.metadata=minimal; odata.streaming=true
OData-Version: 4.0

{
  "@odata.count":1,
  "value":[
    {
      "Code":"EntityDoesNotExist","Property":null,"Message":null
    }
  ]
}
--batchresponse_d0048f4c-8a3f-40aa-9392-718943ecc5f3--
```

### Example code for processing batch requests

For example code that updates hotel pricing in a batch request, see [Batch processing example](code-example-batch.md).




