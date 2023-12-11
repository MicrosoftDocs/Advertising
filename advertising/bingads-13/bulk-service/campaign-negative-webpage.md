---
title: "Campaign Negative Webpage - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: Describes the Campaign Negative Webpage fields in a Bulk file.
dev_langs:
  - csharp
---
# Campaign Negative Webpage - Bulk
Defines a campaign negative webpage that can be uploaded and downloaded in a bulk file.

You can download all *Campaign Negative Webpage* records in the account by including the [DownloadEntity](downloadentity.md) value of *CampaignNegativeWebpages* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

<!--The following Bulk CSV example would add a new campaign negative webpage if the correct campaign Id would be provided. 

```csv
Type,Status,Id,Parent Id,Campaign,Campaign Negative Webpage,Client Id,Modified Time,Start Date,End Date,Network Distribution,Ad Rotation,Cpc Bid,Language,Bid Adjustment,Name,Tracking Template,Final Url Suffix,Custom Parameter,Bid Strategy Type,Target Setting
Format Version,,,,,,,,,,,,,,,6.0,,,,,
Campaign Negative Webpage,Active,,-111,ParentCampaignNameGoesHere,Women's Red Shoe Sale,ClientIdGoesHere,,11/12/2020,12/31/2021,OwnedAndOperatedAndSyndicatedSearch,RotateAdsEvenly,0.1,English,10,,https://tracker.example.com/?season={_season}&promocode={_promocode}&u={lpurl},,{_promoCode}=PROMO1; {_season}=summer,ManualCpc,Audience
```-->

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkCampaignNegativeWebpage* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file.

<!--```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkCampaignNegativeWebpage
var bulkCampaignNegativeWebpage = new BulkCampaignNegativeWebpage
{
    // 'Campaign' column header in the Bulk file
    CampaignName = "ParentCampaignNameGoesHere",
    // 'Parent Id' column header in the Bulk file
    CampaignId = campaignIdKey,
    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",
                  
    // Map properties in the Bulk file to the 
    // CampaignNegativeWebpage object of the Campaign Management service.
    CampaignNegativeWebpage = new CampaignNegativeWebpage
    {
        // 'Ad Rotation' column header in the Bulk file
        AdRotation = new AdRotation
        {
            Type = AdRotationType.RotateAdsEvenly
        },
        // 'Ad Schedule Use Searcher Time Zone' column header in the Bulk file
        AdScheduleUseSearcherTimeZone = true,
        // 'Bid Adjustment' column header in the Bulk file
        AudienceAdsBidAdjustment = 10,
        // 'Bid Strategy Type' column header in the Bulk file
        BiddingScheme = new ManualCpcBiddingScheme { },
        // 'Cpc Bid' column header in the Bulk file
        CpcBid = new Bid
        {
            Amount = 0.10
        },
        // 'End Date' column header in the Bulk file
        EndDate = new Microsoft.BingAds.V13.CampaignManagement.Date
        {
            Month = 12,
            Day = 31,
            Year = DateTime.UtcNow.Year + 1
        },
        // 'Id' column header in the Bulk file
        Id = null,
        // 'Language' column header in the Bulk file
        Language = "English",
        // 'Campaign Negative Webpage' column header in the Bulk file
        Name = "Women's Red Shoe Sale",
        // 'Network Distribution' column header in the Bulk file
        Network = Network.OwnedAndOperatedAndSyndicatedSearch,
        // 'Privacy Status' column header in the Bulk file
        PrivacyStatus = null,
        // 'Target Setting' column header in the Bulk file
        Settings = new []
        {
            new TargetSetting
            {
                // Each target setting detail is delimited by a semicolon (;) in the Bulk file
                Details = new []
                {
                    new TargetSettingDetail
                    {
                        CriterionTypeGroup = CriterionTypeGroup.Audience,
                        TargetAndBid = true
                    }
                }
            }
        },
        // 'Start Date' column header in the Bulk file
        StartDate = new Microsoft.BingAds.V13.CampaignManagement.Date
        {
            Month = DateTime.UtcNow.Month,
            Day = DateTime.UtcNow.Day,
            Year = DateTime.UtcNow.Year
        },
        // 'Status' column header in the Bulk file
        Status = CampaignNegativeWebpageStatus.Paused,
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

uploadEntities.Add(bulkCampaignNegativeWebpage);

var entityUploadParameters = new EntityUploadParameters
{
    Entities = uploadEntities,
    ResponseMode = ResponseMode.ErrorsAndResults,
    ResultFileDirectory = FileDirectory,
    ResultFileName = DownloadFileName,
    OverwriteResultFile = true,
};

var uploadResultEntities = (await BulkServiceManager.UploadEntitiesAsync(entityUploadParameters)).ToList();
```-->

For an *Campaign Negative Webpage* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md).

> [!NOTE]
> You can't update the condition, value, or operator fields. To update the webpage conditions you must delete the campaign negative webpage and add a new one.

- [Campaign](#campaign)
- [Campaign Type](#campaigntype)
- [Condition 1](#condition1)
- [Condition 2](#condition2)
- [Condition 3](#condition3)
- [Condition Operator 1](#conditionoperator1)
- [Condition Operator 2](#conditionoperator2)
- [Condition Operator 3](#conditionoperator3)
- [Client Id](#clientid)
- [Id](#id)
- [Modified Time](#modifiedtime)
- [Name](#name)
- [Parent Id](#parentid)
- [Status](#status)
- [Type](#type)
- [Value 1](#value1)
- [Value 2](#value2)
- [Value 3](#value2)

## <a name="campaign"></a>Campaign
The name of campaign that the campaign negative webpage belongs to.

For add and delete, you must specify with *Parent Id* or *Campaign* field.

**Add:** Read-only and Required  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

## <a name="campaigntype"></a>Campaign Type
The type of the campaign, *Performance Max*.

**Add:** Read-only   
**Update:** Read-only  
**Delete:** Read-only  

## <a name="condition1"></a>Condition 1
The first of up to three webpage condition operands. The condition is met if the webpage property that is referenced by this field contains or equals the Value 1 value.

The only possible value is *URL*.

## <a name="condition2"></a>Condition 2
The second of up to three webpage condition operands. The condition is met if the webpage property that is referenced by this field contains or equals the Value 2 value.

The only possible value is *URL*.

## <a name="condition3"></a>Condition 3
The third of up to three webpage condition operands. The condition is met if the webpage property that is referenced by this field contains or equals the Value 3 value.

The only possible value is *URL*.

## <a name="conditionoperator1"></a>Condition Operator 1
The condition operator. Possible values are *equals* or *contains*.

## <a name="conditionoperator2"></a>Condition Operator 2
The condition operator. Possible values are *equals* or *contains*.

## <a name="conditionoperator3"></a>Condition Operator 3
The condition operator. Possible values are *equals* or *contains*.

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Update:** Optional  
**Delete:** Read-only  

## <a name="id"></a>Id
The system-generated identifier of the audience group.

**Add:** Optional. You must either leave this field empty, or specify a negative identifier. A negative identifier set for the campaign negative webpage can then be referenced in the *Parent Id* field of dependent record types such as ads, keywords, or criterion. This is recommended if you are adding new campaign negative webpages and new dependent records in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

## <a name="modifiedtime"></a>Modified Time
The date and time that the entity was last updated. The value is in Coordinated Universal Time (UTC).

> [!NOTE]
> The date and time value reflects the date and time at the server, not the client. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="name"></a>Name
The criterion name that you can use to identify the criteria, for example you can filter or sort alphabetically.

The criterion name length must be between 1 to 2048, inclusive.

**Add:** Optional. If you do not specify any name, by default the name will be set to a concatenated list of conditions. Each condition will be delimited by the *and* keyword. For example if the conditions are a) *Url contains flower* , b) *Url contains book* , and c) *PageContent contains seattle*, then the default criterion name will be *Url contains flower and Url contains book and PageContent contains seattle*. If all condition and value fields are empty, then you are effectively targeting all webpages and the name will be set to *All Webpages*.  
**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this field to the *delete_value* string, the prior setting is removed. If you specify the *delete_value* keyword, then effectively the criterion name will be updated to the default value i.e. either *All Webpages* or a concatenated list of criterions.  
**Delete:** Read-only  

## <a name="parentid"></a>Parent Id
The campaign id.

For add and delete, you must specify with *Parent Id* or *Campaign* field.

**Add:** Read-only and Required  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

## <a name="status"></a>Status
The status of the campaign negative webpage.

Possible values are *Active*, *Deleted*.

**Add:** Optional.  
**Update:** Optional. If no value is set for the update, this setting is not changed.
**Delete:** Required. The Status must be set to Deleted.

## <a name="type"></a>Type
The entity type, *Campaign Negative Webpage*.

## <a name="value1"></a>Value 1
The first of up to three webpage condition arguments.

## <a name="value2"></a>Value 2
The second of up to three webpage condition arguments.

## <a name="value3"></a>Value 3
The third of up to three webpage condition arguments.
