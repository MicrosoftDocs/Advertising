---
title: "Release notes for Hotel Price Ads Service"
description: Identifies the changes made to Hotel Price Ads for each release.
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
---

# Release notes for Hotel Price Ads Service

For information about changes that were included with each release, see the following sections.

## March 16, 2021

- Removed support for the QueryControl message.


## June 26, 2020

- Added PropertyPromotionAd as a possible site value to:
  - [SiteMultiplier](..\hotel-service\reference.md#sitemultiplier)
  - [SiteType](..\hotel-service\reporting.md#dimensioncolumns) dimension column
  - [BING-SITE](..\pos-feed\create-pos-feed.md#using-dynamic-query-parameters) dynamic query parameter


## February 14, 2020

- Updated the [Transaction message](../transaction-message/reference.md) doc to reflect that the sum of all [Custom[1-5]](../transaction-message/reference.md#custom1) values is limited to a maximum of 1,000 characters.
- Updated the [PercentageBid](../hotel-service/reference.md#percentagebid) object to reflect that the bid is based on the per night total room rate, which includes taxes and other fees. Previously, the bid was based only on the room rate and did not include taxes and other fees.


## October 9, 2019

- Added PARTNER-ROOM-ID as a possible dynamic query parameter for point of sale URLs. See [Using dynamic query parameters](../pos-feed/create-pos-feed.md#using-dynamic-query-parameters).
- Updated the authentication and app registration details in [Getting started](../hotel-service/get-started.md) and [Getting started with a service](../hotel-service/get-started-service.md).  
  - Bing Advertising continues to support Live Connect but they're encouraging everyone to begin using Microsoft Identity Platform instead.
  - Microsoft changed the portal used to register apps. Instead of using https:\//apps.dev.microsoft.com, you now use [Microsoft Azure App Registration](https://go.microsoft.com/fwlink/?linkid=2083908).

## September 10, 2019

- Added support for room bundles to [Transaction Message](../transaction-message/reference.md). [Read more](../transaction-message/using-room-bundles.md).  
  - Updates include:  
    - Added the [PropertyDataSet](../transaction-message/reference.md#propertydataset-type) element as a child element of the [Transaction](../transaction-message/reference.md#transaction) element. Used to specify the room and package metadata for a property.
    - Added the [PackageData](../transaction-message/reference.md#packagedata-type) object as a child of \<PropertyDataSet>.
    - Added the [RoomData](../transaction-message/reference.md#roomdata-type) object as a child of \<PropertyDataSet>.
    - Added the [RoomBundle](../transaction-message/reference.md#roombundle) element as a child element of the [Result](../transaction-message/reference.md#result-type) element. Used to specify room types and packages for itineraries.
    - Added the following types used by `RoomData` and `PackageData`:  
      - [OnPropertyCredit](../transaction-message/reference.md#onpropertycredit-type)   
      - [Miles](../transaction-message/reference.md#miles-type)   
      - [MembershipBenefits](../transaction-message/reference.md#membershipbenefits-type)   
      - [PhotoUrl](../transaction-message/reference.md#photourl-type)   
      - [OccupancyDetails](../transaction-message/reference.md#occupancydetails-type)   
      - [Children](../transaction-message/reference.md#children-type)   
      - [Text](../transaction-message/reference.md#text-type)   



## June 13, 2019

- Added conversion tracking metrics to hotel reporting. [Read more](../hotel-service/conversion-metrics.md).


## April 30, 2019

The following is a documentation-only change.

- Bing Ads is now Microsoft Advertising. Our new name reflects how we're growing our advertising solutions to help you reach more customers. All references to the Bing Ads platform in the documentation were changed to Microsoft Advertising. The brand change does not affect the API at this time. For example, all endpoints remain unchanged.  


## March 8, 2019
- Removed the share of voice ([SOV](../hotel-service/reporting.md#sov)) warning about including the following dimension columns if your request also includes SOV columns. Previously, if you included these dimension columns, the report's data would include duplicate SOV data. This is no longer an issue and you may include these columns with SOV columns.  
  - AdvancedBookingWindow
  - CheckinDay
  - DateType
  - LengthOfStay
  - SiteType
  - SlotType
  - UserCountry 


## December 17, 2018

- Updated the [hotel feed schema](../hotel-feed/reference.md) to include the following [\<listing>](../hotel-feed/reference.md#listingtype) elements:  
  - \<category>
  - \<content>
  

## October 28, 2018

- Added the following [dimension columns](../hotel-service/reporting.md#dimensioncolumns) to reporting. You must not specify these dimensions if your report request includes share of voice (SOV) columns. See [Share of voice](../hotel-service/reporting.md#sov).
  - AdvancedBookingWindow
  - DateType 
  - SiteType


## August 20, 2018

<!-- - Updated [Getting sandbox credentials](../hotel-service/get-started.md#getsicredentials) to reflect the current process. Previously, when you signed up for a sandbox account, the process created legacy credentials (username and password). However, the Hotel Price Ads API requires using a Microsoft account (MSA) for OAuth authentication. This meant you needed to invite a user to work on your account, so you could create an MSA account to use with the Hotel Price Ads API. This process is no longer required since sandbox now supports only MSA&mdash;you may create a sandbox account using only an MSA and you must sign in using only an MSA. -->

- Updated information about how to pause hotels. Previously, the documentation said that to pause all hotels in a subaccount, you'd set the subaccount's budget or bid amount to zero (0). Or, to pause all hotels in a hotel group, you'd set the group's bid amount to zero. Same for pausing individual hotels. Instead, to pause hotels, at any level, you must specify a percentage bid and set the percentage bid amount to 0. If you currently specify a fixed bid and you want to pause hotels, you must change the bid to a percentage bid and set its bid amount to zero.

## August 7, 2018

### Nonbreaking change

- Added the following columns to the Performance report. For more information, see [Performance report columns](../hotel-service/reporting.md#performance-report-columns).  
  
  - [Dimension columns](../hotel-service/reporting.md#dimensioncolumns)  
    
    - AdvancedBookingWindow  
    - CheckinDay
    - DateType  
    - SiteType  

- Changed the UserCountry dimension to reflect the country or region where the user is located instead of the publisher's country or region. Prior to August 2, 2018, UserCountry contains the publisher's country or region. After August 2, 2018, UserCountry contains the user's country or region.

## May 3, 2018

### Nonbreaking change

- Added the following columns to the Performance report. For more information, see [Performance report columns](../hotel-service/reporting.md#performance-report-columns).  
  
  - [Measure columns](../hotel-service/reporting.md#measurecolumns)  
    
    - ClickShare
    - EligibleImpressions
    - ImpressionShare
    - MissedImpressions
    - MissedImpressionsInsufficientBid
    - MissedImpressionsNoTax
    - MissedImpressionsOther
    - MissedImpressionsSpendingCapReached
  
- Added the [Best practices](../hotel-service/best-practices.md) topic to reinforce guidance for specific usage scenarios. 


### Breaking change

- In the near future, the API will impose throttling of some API calls used to retrieve hotels. More to come as details emerge. For information about the best way to retrieve hotels, see [Best practices](../hotel-service/best-practices.md).


## March 28, 2018

### Nonbreaking change

- Added the /$batch template, which you use to send multiple requests in a single batch request. Currently, batch processing supports only hotel updates such as bid changes. [Read more](../hotel-service/manage-hotel-campaigns.md#batch-processing).


## March 21, 2018

### Nonbreaking change

- Added [SiteMultiplier](../hotel-service/reference.md#sitemultiplier), which you use to adjust the base bid if the user is searching for hotels on one of the specified Bing sites.


## March 16, 2018

- Added the \<ExpirationTimestamp\> element to the [Transaction](../transaction-message/reference.md#result-type) message. You use this element to specify an expiry date for the itinerary. When the expiry date passes, Bing stops serving the itinerary. 



## March 5, 2018

### Nonbreaking change

- Added the [IncludeNonPerformingHotels](../hotel-service/reference.md#includenonperforminghotels) field to the [ReportJob](../hotel-service/reference.md#reportjob) object. By default, performance reports don't include hotels that have no impressions during the reporting period. To include non-performing hotels in the report, set `IncludeNonPerformingHotels` to **true**. For limitations, see [Including non-performing hotels in the report](../hotel-service/reporting.md#including-non-performing-hotels-in-the-report).



## February 22, 2018

### Nonbreaking change

<!-- - Changed the sandbox URL that you use to get your initial sandbox account from si.bingads.microsoft.com to sandbox.bingads.microsoft.com (see [Getting sandbox credentials](../hotel-service/get-started.md#getsicredentials)). -->


## February 1, 2018

### Nonbreaking changes

- Added the following dynamic query parameters to the [URL](../pos-feed/reference.md#postype_url) element of the Points of Sale (POS) feed. [Read more](../pos-feed/create-pos-feed.md#using-dynamic-query-parameters).  
  
  - SUBACCOUNT_ID  
  - HOTELGROUP_ID  
  - SLOT_TYPE



## January 23, 2018

### Breaking changes

- Changed the Performance Report's file name from dimensionrow-\<request ID\> to performance-\<request ID\>. 


## January 18, 2018

### Nonbreaking changes

- Added support for sending [Hotel feeds](../hotel-feed/hotel-feed.md) in TSV and CSV file format. For details, see [Creating a CSV Hotel Feed](../hotel-feed/create-csv-hotel-feed.md).




## January 17, 2018

### Breaking changes coming

- If you download performance reports, be aware that the file name will soon change from dimensionrow-\<request ID\> to performance-\<request ID\>. 



## January 15, 2018

### Nonbreaking changes

- Added support for compressing the report data. Use this feature to improve download performance. For information about requesting compression, see the report job's [Compression](../hotel-service/reference.md#compression) field.


## January 8, 2018

### Nonbreaking changes

- Added support for using the OData $filter query parameter with the [/Associations](../hotel-service/reference.md#associations) resource. For information about using $filter to return associations by hotel ID, see [Filtering hotel associations](../hotel-service/manage-hotel-campaigns.md#filterassociations).


## December 15, 2017

### Nonbreaking changes

- Added [SpendUSD](../hotel-service/reporting.md#measurecolumns) Performance Report column.

- Added [AverageCPCUSD](../hotel-service/reporting.md#measurecolumns) Performance Report column.

## December 1, 2017

### Breaking changes

- Renamed the SpendUSD Performance Report column to [Spend](../hotel-service/reporting.md#measurecolumns).  
  
- Changed the length of time that the download URL is valid. The URL now expires in seven days instead of five minutes.
  
- Changed the length of time that the report job is available. The job now expires in about seven days instead of two days.

### Documentation changes  

- Added reporting example code (see [Reporting code example](../hotel-service/code-example-reporting.md)).



## November 21, 2017

### Nonbreaking changes

- Added the Reporting API  
  
  - Added the following new URI templates:  
    - POST [/ReportJobs](../hotel-service/reference.md#addreportjob) used to add a report request to the report queue
    - GET [/ReportJobs('{jobId}')](../hotel-service/reference.md#getreportjob) used to check the status of the report job  

  - Added the [ReportJob](../hotel-service/reference.md#reportjob) object that you use to specify your report request  

  - Added the [Hotel Price Ads Reporting API](../hotel-service/reporting.md) overview, which details the reporting workflow.



## November 17, 2017

### Nonbreaking changes

- Added the Delete URI template for hotel groups (see [SubAccounts('{subAccountId}')/HotelGroups('{hotelGroupId}')](../hotel-service/reference.md#deletehotelgroup)).  



## November 8, 2017

### Nonbreaking changes

- Added the production endpoint (see [Endpoints](../hotel-service/reference.md#endpoints)).  
  
- Fixed documentation error: Removed Paused as a possible value from the `Status` field of [Hotel](../hotel-service/reference.md#hotel), [HotelGroup](../hotel-service/reference.md#hotelgroup), and [Subaccount](../hotel-service/reference.md#subaccount). 



## October 15, 2017

Released the Beta version of Hotel Price Ads.

### Nonbreaking changes

- Added the following ways to send Bing your transaction messages.  
  - Pull requests  
  If you sign up for pull requests, Bing sends the endpoint that you specify a [Query](../query-message/query-message.md) message that specifies the itinerary data that you should send back in a [Transaction](../transaction-message/transaction-message.md) message. With this option, you provide Bing all of your itinerary data.  
  - Pull with hints requests  
  If you sign up for pull with hints requests, Bing sends the endpoint that you specify a Query message that specifies the itinerary data that you should send back in a Transaction message. However, the query message specifies only the itinerary data that you said changed in your [Hint](../hint-message/hint-message.md) message. 
  
- Added the following messages to support the two types of pull requests.  
  - QueryControl message  
  - [Hint](../hint-message/hint-message.md) message
  - [Query](../query-message/query-message.md) message  
  
- Increased the number of days prior to check in that users can book (advanced booking window) from 90 days to 180 days. 

## September 28, 2017

### Hotel API

#### Breaking changes

- Set default and maximum limits for the [$top](../hotel-service/reference.md#top-param) query parameter. The default value is 1,000 and the maximum value that you may specify is 5,000.  


## September 27, 2017

### Hotel API

#### Nonbreaking changes

- Added the `BidMultiplierSource` field to the [Hotel](../hotel-service/reference.md#hotel) and  [HotelGroup](../hotel-service/reference.md#hotelgroup) objects. The source field indicates whether the object inherits or defines the bid multipliers. For example, if hotel object inherits the multipliers from the subaccount, `BidMultiplierSource` is SubAccount.  
  
- Added support for the [$select](../hotel-service/reference.md#select-param) OData query parameter. You can use the parameter to select the fields that you want the response to include.  
  
<!-- - Added the steps for getting a Microsoft account to use in the sandbox environment. See [Getting SI (sandbox) credentials](../hotel-service/get-started.md#getsicredentials). -->



## September 8, 2017

### Hotel API

#### Breaking changes

- Limited the list of hotel associations that you may specify in a single request to 500. For information, see the [/Associate](../hotel-service/reference.md#associate) template.  
  
- Removed the `@odata.context` field from response objects. For example, the [AddResponse](../hotel-service/reference.md#addresponse) and [CollectionResponse](../hotel-service/reference.md#collectionresponse) objects no longer include the `@odata.context` field.

## August 16, 2017

Released the Alpha version of Hotel Price Ads. 
