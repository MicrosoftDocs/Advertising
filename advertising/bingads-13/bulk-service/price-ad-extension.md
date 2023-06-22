---
title: "Price Ad Extension Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: Describes the Price Ad Extension fields in a Bulk file.
dev_langs:
  - csharp
---
# Price Ad Extension Record - Bulk
Defines an ad extension that includes between 3 and 8 price table rows.

You can associate a price ad extension with the account or with campaigns and ad groups in the account. Each entity (account, campaign, or ad group) can be associated with up to 20 price ad extensions. Use the [Account Price Ad Extension](account-price-ad-extension.md), [Ad Group Price Ad Extension](ad-group-price-ad-extension.md), and [Campaign Price Ad Extension](campaign-price-ad-extension.md) records to manage price ad extension associations.

You can download all *Price Ad Extension* records in the account by including the [DownloadEntity](downloadentity.md) value of *PriceAdExtensions* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new Price Ad Extension to the account's shared library. 

```csv
Type,Status,Id,Parent Id,Campaign,Ad Group,Client Id,Modified Time,Start Date,End Date,Device Preference,Name,Ad Schedule,Use Searcher Time Zone,Tracking Template,Final Url Suffix,Custom Parameter,Price Extension Type,Currency Code 1,Currency Code 2,Currency Code 3,Currency Code 4,Currency Code 5,Currency Code 6,Currency Code 7,Currency Code 8,Price Description 1,Price Description 2,Price Description 3,Price Description 4,Price Description 5,Price Description 6,Price Description 7,Price Description 8,Header 1,Header 2,Header 3,Header 4,Header 5,Header 6,Header 7,Header 8,Final Mobile Url 1,Final Mobile Url 2,Final Mobile Url 3,Final Mobile Url 4,Final Mobile Url 5,Final Mobile Url 6,Final Mobile Url 7,Final Mobile Url 8,Final Url 1,Final Url 2,Final Url 3,Final Url 4,Final Url 5,Final Url 6,Final Url 7,Final Url 8,Price 1,Price 2,Price 3,Price 4,Price 5,Price 6,Price 7,Price 8,Price Qualifier 1,Price Qualifier 2,Price Qualifier 3,Price Qualifier 4,Price Qualifier 5,Price Qualifier 6,Price Qualifier 7,Price Qualifier 8,Price Unit 1,Price Unit 2,Price Unit 3,Price Unit 4,Price Unit 5,Price Unit 6,Price Unit 7,Price Unit 8
Format Version,,,,,,,,,,,6.0,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
Price Ad Extension,,-24,,,,ClientIdGoesHere,,,,,,(Monday[09:00-21:00]),FALSE,,,{_promoCode}=PROMO1; {_season}=summer,Events,USD,USD,USD,,,,,,Come to the event,Come to the next event,Come to the final event,,,,,,New Event,Next Event,Final Event,,,,,,,,,,,,,,https://contoso.com,https://contoso.com,https://contoso.com,,,,,,9.99,9.99,9.99,,,,,,From,From,From,,,,,,PerDay,PerDay,PerDay,,,,,

```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkPriceAdExtension* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkPriceAdExtension
var bulkPriceAdExtension = new BulkPriceAdExtension
{
    // 'Parent Id' column header in the Bulk file
    AccountId = 0,
    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",

    // Map properties in the Bulk file to the 
    // PriceAdExtension object of the Campaign Management service.
    PriceAdExtension = new PriceAdExtension
    {
        // 'Language' column header in the Bulk file
        Language = "English",
        // 'Id' column header in the Bulk file
        Id = priceAdExtensionIdKey,
        // 'Price Extension Type' column header in the Bulk file
        PriceExtensionType = PriceExtensionType.Events,

        // 'Ad Schedule' column header in the Bulk file
        Scheduling = new Schedule
        {
            // Each day and time range is delimited by a semicolon (;) in the Bulk file
            DayTimeRanges = new[]
            {
                // Within each day and time range the format is Day[StartHour:StartMinue-EndHour:EndMinute].
                new DayTime
                {
                    Day = Day.Monday,
                    StartHour = 9,
                    StartMinute = Minute.Zero,
                    EndHour = 21,
                    EndMinute = Minute.Zero,
                },
            },
            // 'End Date' column header in the Bulk file
            EndDate = new Microsoft.BingAds.V13.CampaignManagement.Date
            {
                Month = 12,
                Day = 31,
                Year = DateTime.UtcNow.Year + 1
            },
            // 'Start Date' column header in the Bulk file
            StartDate = null,
            // 'Use Searcher Time Zone' column header in the Bulk file
            UseSearcherTimeZone = false,
        },

        // 'Status' column header in the Bulk file
        Status = AdExtensionStatus.Active,

        // TableRows must include between 3 and 8 PriceTableRow
        TableRows = new PriceTableRow[]
        {
            // Each PriceTableRow is mapped to columns with suffix 1..8. 
            // This example shows 3 price table rows i.e., with column suffix from 1..3
            new PriceTableRow
            {
                // 'Currency Code 1' column header in the Bulk file
                CurrencyCode = "USD",
                // 'Price Description 1' column header in the Bulk file
                Description = "Come to the new event",
                // 'Final Url 1' column header in the Bulk file
                FinalUrls = new[] {
                    // Each Url is delimited by a semicolon (;) in the Bulk file
                    "https://www.contoso.com/womenshoesale"
                },
                // 'Final Mobile Url 1' column header in the Bulk file
                FinalMobileUrls = new[] {
                    // Each Url is delimited by a semicolon (;) in the Bulk file
                    "https://mobile.contoso.com/womenshoesale"
                },
                // 'Header 1' column header in the Bulk file
                Header = "New Event",
                // 'Price 1' column header in the Bulk file
                Price = 9.99,
                // 'Price Qualifier 1' column header in the Bulk file
                PriceQualifier = PriceQualifier.From,
                // 'Price Unit 1' column header in the Bulk file
                PriceUnit = PriceUnit.PerDay,
            },
            new PriceTableRow
            {
                // 'Currency Code 2' column header in the Bulk file
                CurrencyCode = "USD",
                // 'Price Description 2' column header in the Bulk file
                Description = "Come to the next event",
                // 'Final Url 2' column header in the Bulk file
                FinalUrls = new[] {
                    // Each Url is delimited by a semicolon (;) in the Bulk file
                    "https://www.contoso.com/womenshoesale"
                },
                // 'Final Mobile Url 2' column header in the Bulk file
                FinalMobileUrls = new[] {
                    // Each Url is delimited by a semicolon (;) in the Bulk file
                    "https://mobile.contoso.com/womenshoesale"
                },
                // 'Header 2' column header in the Bulk file
                Header = "Next Event",
                // 'Price 2' column header in the Bulk file
                Price = 9.99,
                // 'Price Qualifier 2' column header in the Bulk file
                PriceQualifier = PriceQualifier.From,
                // 'Price Unit 2' column header in the Bulk file
                PriceUnit = PriceUnit.PerDay,
            },
            new PriceTableRow
            {
                // 'Currency Code 3' column header in the Bulk file
                CurrencyCode = "USD",
                // 'Price Description 3' column header in the Bulk file
                Description = "Come to the final event",
                // 'Final Url 3' column header in the Bulk file
                FinalUrls = new[] {
                    // Each Url is delimited by a semicolon (;) in the Bulk file
                    "https://www.contoso.com/womenshoesale"
                },
                // 'Final Mobile Url 3' column header in the Bulk file
                FinalMobileUrls = new[] {
                    // Each Url is delimited by a semicolon (;) in the Bulk file
                    "https://mobile.contoso.com/womenshoesale"
                },
                // 'Header 3' column header in the Bulk file
                Header = "Final Event",
                // 'Price 3' column header in the Bulk file
                Price = 9.99,
                // 'Price Qualifier 3' column header in the Bulk file
                PriceQualifier = PriceQualifier.From,
                // 'Price Unit 3' column header in the Bulk file
                PriceUnit = PriceUnit.PerDay,
            },
        },
        // 'Tracking Template' column header in the Bulk file
        TrackingUrlTemplate = null,
        // 'Custom Parameter' column header in the Bulk file
        UrlCustomParameters = new CustomParameters
        {
            // Each custom parameter is delimited by a semicolon (;) in the Bulk file
            Parameters = new[] {
                new CustomParameter(){
                    Key = "promoCode",
                    Value = "PROMO1"
                },
                new CustomParameter(){
                    Key = "season",
                    Value = "summer"
                },
            }
        },
    },
};

uploadEntities.Add(bulkPriceAdExtension);

var entityUploadParameters = new EntityUploadParameters
{
    Entities = uploadEntities,
    ResponseMode = ResponseMode.ErrorsAndResults,
    ResultFileDirectory = FileDirectory,
    ResultFileName = DownloadFileName,
    OverwriteResultFile = true,
};

var uploadResultEntities = (await BulkServiceManager.UploadEntitiesAsync(entityUploadParameters)).ToList();
```

For a *Price Ad Extension* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Ad Schedule](#adschedule)
- [Client Id](#clientid)
- [Currency Code (1-8)](#currencycode)
- [Custom Parameter](#customparameter)
- [Editorial Location](#editoriallocation)
- [Editorial Reason Code](#editorialreasoncode)
- [Editorial Status](#editorialstatus)
- [Editorial Term](#editorialterm)
- [End Date](#enddate)
- [Final Mobile Url (1-8)](#finalmobileurl)
- [Final Url (1-8)](#finalurl)
- [Header (1-8)](#header)
- [Final Url Suffix](#finalurlsuffix)
- [Id](#id)
- [Language](#language)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Price (1-8)](#price)
- [Price Description (1-8)](#pricedescription)
- [Price Extension Type](#priceextensiontype)
- [Price Qualifier (1-8)](#pricequalifier)
- [Price Unit (1-8)](#priceunit)
- [Publisher Countries](#publishercountries)
- [Start Date](#startdate)
- [Status](#status)
- [Tracking Template](#trackingtemplate)
- [Use Searcher Time Zone](#usesearchertimezone)
- [Version](#version)

## <a name="adschedule"></a>Ad Schedule
The list of day and time ranges that you want the ad extension to be displayed with your ads. Each day and time range includes the scheduled day of week, start/end hour, and start/end minute. Each day and time range is enclosed by left and right parentheses, and separated from other day and time ranges with a semicolon (;) delimiter. Within each day and time range the format is *Day[StartHour:StartMinue-EndHour:EndMinute]*.

The possible values of *StartHour* range from 00 to 23, where *00* is equivalent to 12:00AM and *12* is 12:00PM.

The possible values of *EndHour* range from 00 to 24, where *00* is equivalent to 12:00AM and *12* is 12:00PM.

The possible values of *StartMinute* and *EndMinute* range from 00 to 60.

The following example demonstrates day and time ranges during weekdays from 9:00AM through 9:00PM: *(Monday[09:00-21:00]);(Tuesday[09:00-21:00]);(Wednesday[09:00-21:00]);(Thursday[09:00-21:00]);(Friday[09:00-21:00])*

**Add:** Optional. If you do not set this field, the ad extension will be eligible for scheduling anytime during the calendar [start](#startdate) and [end](#enddate) dates.  
**Update:** Optional. The individual day and time ranges cannot be updated. You can effectively update the day and time ranges by sending a new set that should replace the prior set. The [Ad Schedule](#adschedule), [End Date](#enddate), [Start Date](#startdate), and [Use Searcher Time Zone](#usesearchertimezone) fields depend on each other and are updated together. If you leave all of these fields empty during update, then none of them are updated. If you include values for any of these fields, then the prior values for all of these fields are removed or replaced. To remove all prior schedule settings, set each of these fields to *delete_value*.    
**Delete:** Read-only  

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Update:** Optional    
**Delete:** Read-only  

## <a name="currencycode"></a>Currency Code (1-8)
The bulk file includes up to 8 currency code columns, i.e., one for each price table item in the ad extension. The bulk file column headers are *Currency Code 1*, *Currency Code 2*, *Currency Code 3*, *Currency Code 4*, *Currency Code 5*, *Currency Code 6*, *Currency Code 7*, and *Currency Code 8*. 

The supported currency codes are ARS, AUD, BRL, CAD, CHF, CLP, CNY, COP, DKK, EUR, GBP, HKD, INR, MXN, NZD, PEN, PHP, PLN, SEK, SGD, USD, TWD, and VEF.

You must have between 3 and 8 price table items per price ad extension. The order you create them in is the expected order in the ad but the order is not guaranteed. All price table items for a price ad extension must be in the same bulk file record. Each price table item is mapped to the same index of [Currency Code](#currencycode), [Final Mobile Url](#finalmobileurl), [Final Url](#finalurl), [Header](#header), [Price](#price), [Price Description](#pricedescription), [Price Unit](#priceunit), and [Price Qualifier](#pricequalifier) columns. For example the first price table item is mapped to the *Currency Code 1*, *Final Mobile Url 1*, *Final Url 1*, *Header 1*, *Price 1*, *Price Description 1*, *Price Unit 1*, and *Price Qualifier 1* columns.

**Add:** Required  
**Update:** Required    
**Delete:** Read-only  

## <a name="customparameter"></a>Custom Parameter
Your custom collection of key and value parameters for URL tracking.

In a bulk file, the list of custom parameters are formatted as follows.

- Format each custom parameter pair as Key=Value, for example {_promoCode}=PROMO1.

- Microsoft Advertising will accept the first 3 custom parameter key and value pairs that you include, and any additional custom parameters will be ignored. For customers in the Custom Parameters Limit Increase Phase 3 pilot ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 635), Microsoft Advertising will accept the first 8 custom parameter key and value pairs that you include, and if you include more than 8 custom parameters an error will be returned.  

- Each key and value pair are delimited by a semicolon and space ("; "), for example {_promoCode}=PROMO1; {_season}=summer.  

- A Key cannot contain a semicolon. If a Value contains a semicolon it must be escaped as '\\;'. Additionally if the Value contains a backslash it must also be escaped as '\\'.

- The Key cannot exceed 16 UTF-8 bytes, and the Value cannot exceed 200 UTF-8 bytes. For customers in the Custom Parameters Limit Increase Phase 3 pilot ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 635), the Value limit increases to 250 UTF-8 bytes. The Key is required and the Value is optional. The maximum size of the Key does not include the braces and underscore i.e., '{', '_', and '}'. 

    > [!NOTE] 
    > With the Bulk service the Key must be formatted with surrounding braces and a leading underscore, for example if the Key is promoCode, it must be formatted as {_promoCode}. With the Campaign Management service you cannot specify the surrounding braces and underscore.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, the prior setting is removed.    
**Delete:** Read-only  

## <a name="editoriallocation"></a>Editorial Location
The component or property of the ad extension that failed editorial review. 

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="editorialreasoncode"></a>Editorial Reason Code
A code that identifies the reason for the failure. For a list of possible reason codes, see [Editorial Reason Codes](../guides/editorial-failure-reason-codes.md). 

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="editorialstatus"></a>Editorial Status
The editorial status of the ad extension.

Possible values are described in the table below.

|Value|Description|
|-----------|---------------|
|<a name="editorialstatusactive"></a>Active|The ad extension passed editorial review.|
|<a name="editorialstatusactivelimited"></a>ActiveLimited|The ad extension passed editorial review in one or more markets, and one or more elements of the ad extension is undergoing editorial review in another market. For example the ad extension passed editorial review for Canada and is still pending review in the United States.|
|<a name="editorialstatusdisapproved"></a>Disapproved|The ad extension failed editorial review.|
|<a name="editorialstatusinactive"></a>Inactive|One or more elements of the ad extension is undergoing editorial review.|

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="editorialterm"></a>Editorial Term
The term that failed editorial review.

This field will not be set if a combination of terms caused the failure or if the failure was based on a policy violation.

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="enddate"></a>End Date
The ad extension scheduled end date string formatted as *MM/DD/YYYY*.

The end date is inclusive. For example, if you set this field to 12/31/2020, the ad extensions will stop being shown at 11:59 PM on 12/31/2020.

**Add:** Optional. If you do not specify an end date, the ad extension will continue to be delivered unless you pause the associated campaigns, ad groups, or ads.  
**Update:** Optional. The end date can be shortened or extended, as long as the start date is either null or occurs before the new end date. If you set this field to the *delete_value* string, then you are effectively removing the end date. The [Ad Schedule](#adschedule), [End Date](#enddate), [Start Date](#startdate), and [Use Searcher Time Zone](#usesearchertimezone) fields depend on each other and are updated together. If you leave all of these fields empty during update, then none of them are updated. If you include values for any of these fields, then the prior values for all of these fields are removed or replaced. To remove all prior schedule settings, set each of these fields to *delete_value*.      
**Delete:** Read-only  

## <a name="finalmobileurl"></a>Final Mobile Url (1-8)
The bulk file includes up to 8 final mobile url columns, i.e., one for each price table item in the ad extension. The bulk file column headers are *Final Mobile Url 1*, *Final Mobile Url 2*, *Final Mobile Url 3*, *Final Mobile Url 4*, *Final Mobile Url 5*, *Final Mobile Url 6*, *Final Mobile Url 7*, and *Final Mobile Url 8*. 

The following validation rules apply to Final URLs and Final Mobile URLs.

- The length of the URL is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.

- You may specify up to 10 items for both Final URLs and Final Mobile URLs; however, only the first item in each list is used for delivery. The service allows up to 10 for potential forward compatibility.

- Each URL is delimited by a semicolon and space ("; ").

- Usage of '{' and '}' is only allowed to delineate tags, for example "{lpurl}".

- Each URL must be a well-formed URL starting with either http:// or https://.

- If you specify Final Mobile URLs, you must also specify Final Url.

You must have between 3 and 8 price table items per price ad extension. The order you create them in is the expected order in the ad but the order is not guaranteed. All price table items for a price ad extension must be in the same bulk file record. Each price table item is mapped to the same index of [Currency Code](#currencycode), [Final Mobile Url](#finalmobileurl), [Final Url](#finalurl), [Header](#header), [Price](#price), [Price Description](#pricedescription), [Price Unit](#priceunit), and [Price Qualifier](#pricequalifier) columns. For example the first price table item is mapped to the *Currency Code 1*, *Final Mobile Url 1*, *Final Url 1*, *Header 1*, *Price 1*, *Price Description 1*, *Price Unit 1*, and *Price Qualifier 1* columns.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, the prior setting is removed.    
**Delete:** Read-only  

## <a name="finalurl"></a>Final Url (1-8)
The bulk file includes up to 8 final url columns, i.e., one for each price table item in the ad extension. The bulk file column headers are *Final Url 1*, *Final Url 2*, *Final Url 3*, *Final Url 4*, *Final Url 5*, *Final Url 6*, *Final Url 7*, and *Final Url 8*. 

The landing page URL to use with optional tracking template and custom parameters.

The following validation rules apply to Final URLs and Final Mobile URLs.

- The length of the URL is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.

- You may specify up to 10 items for both Final URLs and Final Mobile URLs; however, only the first item in each list is used for delivery. The service allows up to 10 for potential forward compatibility.

- Each URL is delimited by a semicolon and space ("; ").

- Usage of '{' and '}' is only allowed to delineate tags, for example "{lpurl}".

- Each URL must be a well-formed URL starting with either http:// or https://.

- If you specify Final Mobile URLs, you must also specify Final Url.

Also note that  if the *Tracking Template* or *Custom Parameter* fields are set, then the final URL is required for each price table item.

You must have between 3 and 8 price table items per price ad extension. The order you create them in is the expected order in the ad but the order is not guaranteed. All price table items for a price ad extension must be in the same bulk file record. Each price table item is mapped to the same index of [Currency Code](#currencycode), [Final Mobile Url](#finalmobileurl), [Final Url](#finalurl), [Header](#header), [Price](#price), [Price Description](#pricedescription), [Price Unit](#priceunit), and [Price Qualifier](#pricequalifier) columns. For example the first price table item is mapped to the *Currency Code 1*, *Final Mobile Url 1*, *Final Url 1*, *Header 1*, *Price 1*, *Price Description 1*, *Price Unit 1*, and *Price Qualifier 1* columns.

**Add:** Required  
**Update:** Required    
**Delete:** Read-only  

## <a name="header"></a>Header (1-8)
The header that precedes the pricing data in your price ad extension. Each header can contain a maximum of 25 characters. Each header must tie directly to the *Price Extension Type* field for the price ad extension.

The bulk file includes up to 8 header columns, i.e., one for each price table item in the ad extension. The bulk file column headers are *Header 1*, *Header 2*, *Header 3*, *Header 4*, *Header 5*, *Header 6*, *Header 7*, and *Header 8*. 

You must have between 3 and 8 price table items per price ad extension. The order you create them in is the expected order in the ad but the order is not guaranteed. All price table items for a price ad extension must be in the same bulk file record. Each price table item is mapped to the same index of [Currency Code](#currencycode), [Final Mobile Url](#finalmobileurl), [Final Url](#finalurl), [Header](#header), [Price](#price), [Price Description](#pricedescription), [Price Unit](#priceunit), and [Price Qualifier](#pricequalifier) columns. For example the first price table item is mapped to the *Currency Code 1*, *Final Mobile Url 1*, *Final Url 1*, *Header 1*, *Price 1*, *Price Description 1*, *Price Unit 1*, and *Price Qualifier 1* columns.

**Add:** Required  
**Update:** Required    
**Delete:** Read-only  

## <a name="finalurlsuffix"></a>Final Url Suffix
The final URL suffix can include tracking parameters that will be appended to the end of your landing page URL. We recommend placing tracking parameters that your landing page requires in a final URL suffix so that your customers are always sent to your landing page. For more details and validation rules see [Final URL Suffix](../guides/url-tracking-upgraded-urls.md#finalurlsuffixvalidation) in the technical guides. 

> [!NOTE]
> This feature is only available for customers in the Final URL Suffix Phase 3 pilot ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 636). If you are not in the pilot this property will be ignored and no error will be returned. 

**Add:** Optional  
**Update:** Optional. If no value is set for the update, the prior setting is removed.  
**Delete:** Read-only  

## <a name="id"></a>Id
The system-generated identifier of the ad extension.

**Add:** Optional. You must either leave this field empty, or specify a negative identifier. A negative identifier set for the ad extension can then be referenced in the *Id* field of dependent record types such as [Ad Group Price Ad Extension](ad-group-price-ad-extension.md) and [Campaign Price Ad Extension](campaign-price-ad-extension.md). This is recommended if you are adding new ad extensions and new dependent records in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

## <a name="language"></a>Language
The language for the ad copy of your price ad extension.

For possible values, see [Ad Languages](../guides/ad-languages.md).

**Add:** Required  
**Update:** Required   
**Delete:** Read-only  

## <a name="modifiedtime"></a>Modified Time
The date and time that the entity was last updated. The value is in Coordinated Universal Time (UTC).

> [!NOTE]
> The date and time value reflects the date and time at the server, not the client. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="parentid"></a>Parent Id
The system-generated identifier of the account that contains the ad extension.

This bulk field maps to the *Id* field of the [Account](account.md) record.

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="price"></a>Price (1-8)
The price that you are advertising. 

The bulk file includes up to 8 price columns, i.e., one for each price table item in the ad extension. The bulk file column headers are *Price 1*, *Price 2*, *Price 3*, *Price 4*, *Price 5*, *Price 6*, *Price 7*, and *Price 8*. 

You must have between 3 and 8 price table items per price ad extension. The order you create them in is the expected order in the ad but the order is not guaranteed. All price table items for a price ad extension must be in the same bulk file record. Each price table item is mapped to the same index of [Currency Code](#currencycode), [Final Mobile Url](#finalmobileurl), [Final Url](#finalurl), [Header](#header), [Price](#price), [Price Description](#pricedescription), [Price Unit](#priceunit), and [Price Qualifier](#pricequalifier) columns. For example the first price table item is mapped to the *Currency Code 1*, *Final Mobile Url 1*, *Final Url 1*, *Header 1*, *Price 1*, *Price Description 1*, *Price Unit 1*, and *Price Qualifier 1* columns.

**Add:** Required  
**Update:** Required    
**Delete:** Read-only  
  
## <a name="pricedescription"></a>Price Description (1-8)
The description must provide further information about the header that is also defined in this object. Each description can contain a maximum of 25 characters.

The bulk file includes up to 8 price description columns, i.e., one for each price table item in the ad extension. The bulk file column headers are *Price Description 1*, *Price Description 2*, *Price Description 3*, *Price Description 4*, *Price Description 5*, *Price Description 6*, *Price Description 7*, and *Price Description 8*. 

You must have between 3 and 8 price table items per price ad extension. The order you create them in is the expected order in the ad but the order is not guaranteed. All price table items for a price ad extension must be in the same bulk file record. Each price table item is mapped to the same index of [Currency Code](#currencycode), [Final Mobile Url](#finalmobileurl), [Final Url](#finalurl), [Header](#header), [Price](#price), [Price Description](#pricedescription), [Price Unit](#priceunit), and [Price Qualifier](#pricequalifier) columns. For example the first price table item is mapped to the *Currency Code 1*, *Final Mobile Url 1*, *Final Url 1*, *Header 1*, *Price 1*, *Price Description 1*, *Price Unit 1*, and *Price Qualifier 1* columns.

**Add:** Required  
**Update:** Required    
**Delete:** Read-only  

## <a name="priceextensiontype"></a>Price Extension Type
The type of the price ad extension.

Possible values include: *Brands*, *Events*, *Locations*, *Neighborhoods*, *ProductCategories*, *ProductTiers*, *ServiceCategories*, *Services*, *ServiceTiers*, and *Unknown*. (Unknown is reserved for future use and cannot be set.)

**Add:** Required  
**Update:** Required   
**Delete:** Read-only  

## <a name="pricequalifier"></a>Price Qualifier (1-8)
The price qualifier for a given product or service e.g., starting from a specific price and up to a maximum price.

Possible values include: *Average*, *From*, *UpTo*, *None*, and *Unknown*. (Unknown is reserved for future use and cannot be set.)

The bulk file includes up to 8 price qualifier columns, i.e., one for each price table item in the ad extension. The bulk file column headers are *Price Qualifier 1*, *Price Qualifier 2*, *Price Qualifier 3*, *Price Qualifier 4*, *Price Qualifier 5*, *Price Qualifier 6*, *Price Qualifier 7*, and *Price Qualifier 8*. 

You must have between 3 and 8 price table items per price ad extension. The order you create them in is the expected order in the ad but the order is not guaranteed. All price table items for a price ad extension must be in the same bulk file record. Each price table item is mapped to the same index of [Currency Code](#currencycode), [Final Mobile Url](#finalmobileurl), [Final Url](#finalurl), [Header](#header), [Price](#price), [Price Description](#pricedescription), [Price Unit](#priceunit), and [Price Qualifier](#pricequalifier) columns. For example the first price table item is mapped to the *Currency Code 1*, *Final Mobile Url 1*, *Final Url 1*, *Header 1*, *Price 1*, *Price Description 1*, *Price Unit 1*, and *Price Qualifier 1* columns.

**Add:** Required  
**Update:** Required    
**Delete:** Read-only  

## <a name="priceunit"></a>Price Unit (1-8)
The price unit allows you to specify the cost in terms of hour, day, week, etc.

Possible values include: *PerDay*, *PerHour*, *PerMonth*, *PerNight*, *PerWeek*, *PerYear*, *None*, and *Unknown*. (Unknown is reserved for future use and cannot be set.)

The bulk file includes up to 8 price unit columns, i.e., one for each price table item in the ad extension. The bulk file column headers are *Price Unit 1*, *Price Unit 2*, *Price Unit 3*, *Price Unit 4*, *Price Unit 5*, *Price Unit 6*, *Price Unit 7*, and *Price Unit 8*.

You must have between 3 and 8 price table items per price ad extension. The order you create them in is the expected order in the ad but the order is not guaranteed. All price table items for a price ad extension must be in the same bulk file record. Each price table item is mapped to the same index of [Currency Code](#currencycode), [Final Mobile Url](#finalmobileurl), [Final Url](#finalurl), [Header](#header), [Price](#price), [Price Description](#pricedescription), [Price Unit](#priceunit), and [Price Qualifier](#pricequalifier) columns. For example the first price table item is mapped to the *Currency Code 1*, *Final Mobile Url 1*, *Final Url 1*, *Header 1*, *Price 1*, *Price Description 1*, *Price Unit 1*, and *Price Qualifier 1* columns.

**Add:** Required  
**Update:** Required    
**Delete:** Read-only  

## <a name="publishercountries"></a>Publisher Countries
The list of publisher countries or regions whose editorial guidelines do not allow the specified [term](#editorialterm).

In a bulk file, the list of publisher countries or regions are delimited with a semicolon (;).

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="startdate"></a>Start Date
The ad extension scheduled start date string formatted as *MM/DD/YYYY*.

The start date is inclusive. For example, if you set *StartDate* to 5/5/2020, the ad extensions will start being shown at 12:00 AM on 5/5/2020.

**Add:** Optional. If you do not specify a start date, the ad extension is immediately eligible to be [scheduled](#adschedule).  
**Update:** Optional. The start date can be shortened or extended, as long as the end date is either null or occurs after the new start date. If you set this field to the *delete_value* string, then you are effectively removing the start date and the ad extension is immediately eligible to be [scheduled](#adschedule). The [Ad Schedule](#adschedule), [End Date](#enddate), [Start Date](#startdate), and [Use Searcher Time Zone](#usesearchertimezone) fields depend on each other and are updated together. If you leave all of these fields empty during update, then none of them are updated. If you include values for any of these fields, then the prior values for all of these fields are removed or replaced. To remove all prior schedule settings, set each of these fields to *delete_value*.  
**Delete:** Read-only  

## <a name="status"></a>Status
The status of the ad extension.

Possible values are *Active* or *Deleted*. 

**Add:** Optional. The default value is *Active*.  
**Update:** Optional. If no value is set for the update, this setting is not changed.    
**Delete:** Required. The Status must be set to *Deleted*.

## <a name="trackingtemplate"></a>Tracking Template
The tracking template to use for your price table item URLs.

The following validation rules apply to tracking templates. For more details about supported templates and parameters, see the Microsoft Advertising help article [What tracking or URL parameters can I use?](https://help.ads.microsoft.com/#apex/3/en/56799/2)

- Tracking templates defined for lower level entities e.g. ads override those set for higher level entities e.g. campaign. For more information, see [Entity Limits](../guides/entity-hierarchy-limits.md).

- The length of the tracking template is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.

- The tracking template must be a well-formed URL beginning with one of the following: *http://*, *https://*, *{lpurl}*, or *{unescapedlpurl}*. 

- Microsoft Advertising does not validate whether custom parameters exist. If you use custom parameters in your tracking template and they do not exist, then the landing page URL will include the key and value placeholders of your custom parameters without substitution. For example, if your tracking template is *`https://tracker.example.com/?season={_season}&promocode={_promocode}&u={lpurl}`*, and neither *{_season}* or *{_promocode}* are defined at the campaign, ad group, criterion, keyword, or ad level, then the landing page URL will be the same.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, the prior setting is removed.    
**Delete:** Read-only  

## <a name="usesearchertimezone"></a>Use Searcher Time Zone
Determines whether to use the account time zone or the time zone of the search user where the ads could be delivered.

Set this property to *TRUE* if you want the ad extensions to be shown in the search user's time zone, and otherwise set it to *FALSE*.

**Add:** Optional. If you do not specify this field or leave it empty, the default value of *FALSE* will be set and the account time zone will be used.  
**Update:** Optional. If you set this field to the *delete_value* string, then you are effectively resetting to the default value of *FALSE*. The [Ad Schedule](#adschedule), [End Date](#enddate), [Start Date](#startdate), and [Use Searcher Time Zone](#usesearchertimezone) fields depend on each other and are updated together. If you leave all of these fields empty during update, then none of them are updated. If you include values for any of these fields, then the prior values for all of these fields are removed or replaced. To remove all prior schedule settings, set each of these fields to *delete_value*.  
**Delete:** Read-only  

## <a name="version"></a>Version
The number of times the contents of the ad extension has been updated. The version is set to 1 when you add the extension and is incremented each time it's revised.

**Add:** Read-only  
**Update:** Read-only    
**Delete:** Read-only  

