---
title: "Audience Group Asset Group Association Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: Describes the Audience Group Asset Group Association fields in a Bulk file.
dev_langs:
  - csharp
---
# Audience Group Asset Group Association Record - Bulk
Defines an audience group asset group association that can be uploaded and downloaded in a bulk file.

You can download all *Audience Group Asset Group Association* records in the account by including the [DownloadEntity](downloadentity.md) value of *AudienceGroupAssetGroupAssociations* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

<!--The following Bulk CSV example would add a new audience group asset group association if the correct campaign Id would be provided. 

```csv
Type,Status,Id,Parent Id,Campaign,Audience Group Asset Group Association,Client Id,Modified Time,Start Date,End Date,Network Distribution,Ad Rotation,Cpc Bid,Language,Bid Adjustment,Name,Tracking Template,Final Url Suffix,Custom Parameter,Bid Strategy Type,Target Setting
Format Version,,,,,,,,,,,,,,,6.0,,,,,
Audience Group Asset Group Association,Active,,-111,ParentCampaignNameGoesHere,Women's Red Shoe Sale,ClientIdGoesHere,,11/12/2020,12/31/2021,OwnedAndOperatedAndSyndicatedSearch,RotateAdsEvenly,0.1,English,10,,https://tracker.example.com/?season={_season}&promocode={_promocode}&u={lpurl},,{_promoCode}=PROMO1; {_season}=summer,ManualCpc,Audience
```-->

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkAudienceGroupAssetGroupAssociation* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

<!--```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkAudienceGroupAssetGroupAssociation
var bulkAudienceGroupAssetGroupAssociation = new BulkAudienceGroupAssetGroupAssociation
{
    // 'Campaign' column header in the Bulk file
    CampaignName = "ParentCampaignNameGoesHere",
    // 'Parent Id' column header in the Bulk file
    CampaignId = campaignIdKey,
    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",
                  
    // Map properties in the Bulk file to the 
    // AudienceGroupAssetGroupAssociation object of the Campaign Management service.
    AudienceGroupAssetGroupAssociation = new AudienceGroupAssetGroupAssociation
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
        // 'Audience Group Asset Group Association' column header in the Bulk file
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
        Status = AudienceGroupAssetGroupAssociationStatus.Paused,
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

uploadEntities.Add(bulkAudienceGroupAssetGroupAssociation);

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

For an *Audience Group Asset Group Association* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Asset Group](#assetgroup)
- [Client Id](#clientid)
- [Campaign](#campaign)
- [Id](#id)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Status](#status)
- [Type](#type)

## <a name="assetgroup"></a>Asset Group
The name of the asset group where the audience signal is associated or removed.

For add and delete, you must specify with *Parent Id*, or *Asset Group* and *Campaign* field.

**Add:** Read-only and Required  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Update:** Optional  
**Delete:** Read-only  

## <a name="campaign"></a>Campaign
The name of the campaign that contains the association.

For add and delete, you must specify with *Parent Id*, or *Asset Group* and *Campaign* field.

**Add:** Read-only and Required  
**Delete:** Read-only and Required  

## <a name="id"></a>Id
The ID of the audience group.

**Add:** Optional. You must either leave this field empty, or specify a negative identifier. A negative identifier set for the audience group asset group association can then be referenced in the *Parent Id* field of dependent record types such as ads, keywords, or criterion. This is recommended if you are adding new audience group asset group associations and new dependent records in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Read-only and Required  
**Delete:** Read-only and Required  

## <a name="modifiedtime"></a>Modified Time
The date and time that the entity was last updated. The value is in Coordinated Universal Time (UTC).

> [!NOTE]
> The date and time value reflects the date and time at the server, not the client. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  

## <a name="parentid"></a>Parent Id
The id of the asset group where the audience group is associated or removed.

For add and delete, you must specify with *Asset Group* or *Parent Id* field.

**Add:** Read-only and Required.  
**Delete:** Read-only and Required  

## <a name="status"></a>Status
The status of the audience group asset group association.

Possible values are *Active*, *Deleted*.

**Add:** Optional.  
**Update:** Optional. If no value is set for the update, this setting is not changed.  
**Delete:** Required. The Status must be set to Deleted.  

## <a name="type"></a>Type
The entity type, *Audience Group Asset Group Association*.
