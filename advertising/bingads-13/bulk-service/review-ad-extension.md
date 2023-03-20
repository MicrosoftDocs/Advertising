---
title: "Review Ad Extension Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
description: Describes the Review Ad Extension fields in a Bulk file.
dev_langs:
  - csharp
---
# Review Ad Extension Record - Bulk
Defines a review ad extension that can be downloaded and uploaded in a bulk file.

You can associate a review ad extension with the account or with campaigns and ad groups in the account. Each entity (account, campaign, or ad group) can be associated with up to 20 review ad extensions. An expanded text ad will only include one review per impression. Use the [Account Review Ad Extension](account-review-ad-extension.md), [Ad Group Review Ad Extension](ad-group-review-ad-extension.md), and [Campaign Review Ad Extension](campaign-review-ad-extension.md) records to manage review ad extension associations.

You can download all *Review Ad Extension* records in the account by including the [DownloadEntity](downloadentity.md) value of *ReviewAdExtensions* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new Review Ad Extension to the account's shared library. 

```csv
Type,Status,Id,Parent Id,Campaign,Ad Group,Client Id,Modified Time,Start Date,End Date,Text,Device Preference,Name,Ad Schedule,Use Searcher Time Zone,Is Exact,Source,Url
Format Version,,,,,,,,,,,,6.0,,,,,
Review Ad Extension,Active,-16,0,,,ClientIdGoesHere,,,12/31/2020,Review Text,,,(Monday[09:00-21:00]),FALSE,TRUE,Review Source Name,http://review.contoso.com
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkReviewAdExtension* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkReviewAdExtension
var bulkReviewAdExtension = new BulkReviewAdExtension
{
    // 'Parent Id' column header in the Bulk file
    AccountId = 0,
    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",
                
    // Map properties in the Bulk file to the 
    // ReviewAdExtension object of the Campaign Management service.
    ReviewAdExtension = new ReviewAdExtension
    {
        // 'Id' column header in the Bulk file
        Id = reviewAdExtensionIdKey,
        // 'Is Exact' column header in the Bulk file
        IsExact = true,
        // 'Source' column header in the Bulk file
        Source = "Review Source Name",
        // 'Text' column header in the Bulk file
        Text = "Review Text",
        // 'Url' column header in the Bulk file
        Url = "http://review.contoso.com", 
                    
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

uploadEntities.Add(bulkReviewAdExtension);

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

For a *Review Ad Extension* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Ad Schedule](#adschedule)
- [Client Id](#clientid)
- [Editorial Location](#editoriallocation)
- [Editorial Reason Code](#editorialreasoncode)
- [Editorial Status](#editorialstatus)
- [Editorial Term](#editorialterm)
- [End Date](#enddate)
- [Id](#id)
- [Is Exact](#isexact)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Publisher Countries](#publishercountries)
- [Source](#source)
- [Start Date](#startdate)
- [Status](#status)
- [Text](#text)
- [Url](#url)
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

## <a name="id"></a>Id
The system-generated identifier of the ad extension.

**Add:** Optional. You must either leave this field empty, or specify a negative identifier. A negative identifier set for the ad extension can then be referenced in the *Id* field of dependent record types such as [Ad Group Review Ad Extension](ad-group-review-ad-extension.md) and [Campaign Review Ad Extension](campaign-review-ad-extension.md). This is recommended if you are adding new ad extensions and new dependent records in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

## <a name="isexact"></a>Is Exact
Determines whether the review text is an exact quote or paraphrased. If not specified, the default value of *FALSE* indicates that the review text is paraphrased from the source. If set to *TRUE*, the review text will be surrounded automatically with quotation marks when displayed with the ad.

**Add:** Optional  
**Update:** Optional. If no value is set for the update, the prior setting is removed.    
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

## <a name="source"></a>Source
The review source name.

The combined length of the *Source* and *Text* strings must not exceed 67 characters.

**Add:** Required  
**Update:** Required    
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

## <a name="text"></a>Text
The text that is either a paraphrase or an exact quote from the review source.

The combined length of the *Source* and *Text* strings must not exceed 67 characters.

> [!NOTE]
> Do not surround the text with quotation marks. If the *Is Exact* field is set to *TRUE*, the review text will be surrounded automatically with quotation marks when displayed with the ad.

**Add:** Required  
**Update:** Required    
**Delete:** Read-only  

## <a name="url"></a>Url
The review source Url.

The Url must begin with either the *http://* or *https://* prefix.

The length of this string is limited to 2,048 characters.

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


  

