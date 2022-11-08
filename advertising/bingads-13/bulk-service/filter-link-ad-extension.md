---
title: "Filter Link Ad Extension Record - Bulk"
ms.service: bing-ads
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
description: Describes the Filter Link Ad Extension fields in a Bulk file.
dev_langs:
  - csharp
ms.subservice: bulk-api
---
# Filter Link Ad Extension Record - Bulk
Defines a filter link ad extension that can be downloaded and uploaded in a bulk file.

A filter link ad extension pairs one header with between 3 and 10 clickable text values that tell customers more about your business. 

You can associate a filter link ad extension with the account or with campaigns and ad groups in the account. Each entity (account, campaign, or ad group) can be associated with up to 20 filter link ad extensions. An expanded text ad will only include one filter link (one headline with 3 - 10 values) per impression. Use the [Account Filter Link Ad Extension](account-filter-link-ad-extension.md), [Ad Group Filter Link Ad Extension](ad-group-filter-link-ad-extension.md), and [Campaign Filter Link Ad Extension](campaign-filter-link-ad-extension.md) records to manage filter link ad extension associations.

You can download all *Filter Link Ad Extension* records in the account by including the [DownloadEntity](downloadentity.md) value of *FilterLinkAdExtensions* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new Filter Link Ad Extension to the account's shared library. 

```csv
Type,Status,Id,Parent Id,Campaign,Ad Group,Client Id,Modified Time,Start Date,End Date,Language,Name,Ad Schedule,Use Searcher Time Zone,AdExtension Header Type,Texts,Final Url,Mobile Final Url
Format Version,,,,,,,,,,,6.0,,,,,,
Filter Link Ad Extension,Active,-18,0,,,ClientIdGoesHere,,,12/31/2020,English,,(Monday[09:00-21:00]),FALSE,Amenities,ValueOne;ValueTwo;ValueThree,https://www.contoso.com/one; https://www.contoso.com/two; https://www.contoso.com/three,https://mobile.contoso.com/one; https://mobile.contoso.com/two; https://mobile.contoso.com/three
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkFilterLinkAdExtension* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkFilterLinkAdExtension
var bulkFilterLinkAdExtension = new BulkFilterLinkAdExtension
{
    // 'Parent Id' column header in the Bulk file
    AccountId = 0,
    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",

    // Map properties in the Bulk file to the 
    // FilterLinkAdExtension object of the Campaign Management service.
    FilterLinkAdExtension = new FilterLinkAdExtension
    {
        // 'AdExtension Header Type' column header in the Bulk file
        AdExtensionHeaderType = AdExtensionHeaderType.Amenities,
        // 'Language' column header in the Bulk file
        Language = "English",
        // 'Id' column header in the Bulk file
        Id = filterLinkAdExtensionIdKey,
        // 'Texts' column header in the Bulk file
        Texts = new[] {
            // Each string value is delimited by a semicolon (;) in the Bulk file
            "ValueOne",
            "ValueTwo",
            "ValueThreee"
        },
        // 'Final Url' column header in the Bulk file
        FinalUrls = new[] {
            // Each Url is delimited by a semicolon (;) in the Bulk file
            "https://www.contoso.com/one",
            "https://www.contoso.com/two",
            "https://www.contoso.com/three"
        },
        // 'Mobile Final Url' column header in the Bulk file
        FinalMobileUrls = new[] {
            // Each Url is delimited by a semicolon (;) in the Bulk file
            "https://mobile.contoso.com/one",
            "https://mobile.contoso.com/two",
            "https://mobile.contoso.com/three"
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
    },
};

uploadEntities.Add(bulkFilterLinkAdExtension);

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

For a *Filter Link Ad Extension* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [AdExtension Header Type](#adextensionheadertype)
- [Ad Schedule](#adschedule)
- [Client Id](#clientid)
- [Editorial Location](#editoriallocation)
- [Editorial Reason Code](#editorialreasoncode)
- [Editorial Status](#editorialstatus)
- [Editorial Term](#editorialterm)
- [End Date](#enddate)
- [Final Url](#finalurl)
- [Id](#id)
- [Language](#language)
- [Mobile Final Url](#mobilefinalurl)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Publisher Countries](#publishercountries)
- [Start Date](#startdate)
- [Status](#status)
- [Texts](#texts)
- [Use Searcher Time Zone](#usesearchertimezone)
- [Version](#version)

## <a name="adextensionheadertype"></a>AdExtension Header Type
The header that is appended with a colon (:) and precedes the filter link values in the ad that is shown.

Filter link headers will be shown in the language that you specify. For example, if you want header Amenities in English you must set the [Language](#language) to English and the [AdExtension Header Type](#adextensionheadertype) to "Amenities". If you want header Ausstattung (Amenities in German) you must set the [Language](#language) to German and the [AdExtension Header Type](#adextensionheadertype) to "Amenities". 

The following filter link header types are supported: Amenities, Brands, Classes, Courses, DailyRates, DegreePrograms, Departments, Destinations, FeaturedHotels, Goods, Grades, Highlights, InsuranceCoverage, Items, Languages, Locations, Models, Neighborhoods, Prices, Rates, Ratings, SchoolDistricts, Services, ServiceCatalog, Shows, Sizes, Styles, Tools, Topics, Types, Vacations, Vehicles, What, Who, Why. 

**Add:** Required  
**Update:** Required    
**Delete:** Read-only  

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

## <a name="finalurl"></a>Final Url
The landing page URL.

The following validation rules apply to Final URLs and Final Mobile URLs.  
- The length of the URL is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.
- You may specify up to 10 list items for both [Final Url](#finalurl) and [Mobile Final Url](#mobilefinalurl); however, only the first item in each list is used for delivery. The service allows up to 10 list items for potential forward compatibility.  
- Each URL is delimited by a semicolon and space ("; ").  
- Usage of '{' and '}' is only allowed to delineate tags, for example *{lpurl}*.  
- Final URLs must each be a well-formed URL starting with either http:// or https://.  
- If you specify [Mobile Final Url](#mobilefinalurl), you must also specify [Final Url](#finalurl).  

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed.   
**Delete:** Read-only  

## <a name="id"></a>Id
The system-generated identifier of the ad extension.

**Add:** Optional. You must either leave this field empty, or specify a negative identifier. A negative identifier set for the ad extension can then be referenced in the *Id* field of dependent record types such as [Ad Group Filter Link Ad Extension](ad-group-filter-link-ad-extension.md) and [Campaign Filter Link Ad Extension](campaign-filter-link-ad-extension.md). This is recommended if you are adding new ad extensions and new dependent records in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

## <a name="language"></a>Language
The language you want to use for the filter link headers.

Filter link headers will be shown in the language that you specify. For example, if you want header Amenities in English you must set the [Language](#language) to English and the [AdExtension Header Type](#adextensionheadertype) to "Amenities". If you want header Ausstattung (Amenities in German) you must set the [Language](#language) to German and the [AdExtension Header Type](#adextensionheadertype) to "Amenities". 

**Add:** Required  
**Update:** Required    
**Delete:** Read-only  

## <a name="mobilefinalurl"></a>Mobile Final Url
The landing page URL for mobile devices.

The following validation rules apply to Final URLs and Final Mobile URLs.  
- The length of the URL is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.  
- You may specify up to 10 list items for both [Final Url](#finalurl) and [Mobile Final Url](#mobilefinalurl); however, only the first item in each list is used for delivery. The service allows up to 10 list items for potential forward compatibility.  
- Each URL is delimited by a semicolon and space ("; ").  
- Usage of '{' and '}' is only allowed to delineate tags, for example *{lpurl}*.  
- Final URLs must each be a well-formed URL starting with either http:// or https://.  
- If you specify [Mobile Final Url](#mobilefinalurl), you must also specify [Final Url](#finalurl).  

**Add:** Optional  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed.    
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
  
## <a name="publishercountries"></a>Publisher Countries
The list of publisher countries whose editorial guidelines do not allow the specified [term](#editorialterm).

In a bulk file, the list of publisher countries are delimited with a semicolon (;).

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

## <a name="texts"></a>Texts
The text values that follow after the [AdExtension Header Type](#adextensionheadertype) component of the ad that is shown. 

Each text value that you choose can have a maximum length of 25 characters. Note that for Traditional Chinese characters, each value can have a maximum length of 12 characters.  

In a bulk file, the list of values are delimited with a semicolon (;).

**Add:** Required  
**Update:** Required    
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

