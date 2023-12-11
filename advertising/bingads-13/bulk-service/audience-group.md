---
title: "Audience Group Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: Describes the Audience Group fields in a Bulk file.
dev_langs:
  - csharp
---
# Audience Group Record - Bulk
Defines an audience group that can be uploaded and downloaded in a bulk file.

You can download all *Audience Group* records in the account by including the [DownloadEntity](downloadentity.md) value of *AudienceGroups* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

<!--The following Bulk CSV example would add a new audience group if the correct campaign Id would be provided. 

```csv
Type,Status,Id,Parent Id,Campaign,Audience Group,Client Id,Modified Time,Start Date,End Date,Network Distribution,Ad Rotation,Cpc Bid,Language,Bid Adjustment,Name,Tracking Template,Final Url Suffix,Custom Parameter,Bid Strategy Type,Target Setting
Format Version,,,,,,,,,,,,,,,6.0,,,,,
Audience Group,Active,,-111,ParentCampaignNameGoesHere,Women's Red Shoe Sale,ClientIdGoesHere,,11/12/2020,12/31/2021,OwnedAndOperatedAndSyndicatedSearch,RotateAdsEvenly,0.1,English,10,,https://tracker.example.com/?season={_season}&promocode={_promocode}&u={lpurl},,{_promoCode}=PROMO1; {_season}=summer,ManualCpc,Audience
```-->

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkAudienceGroup* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

<!--```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkAudienceGroup
var bulkAudienceGroup = new BulkAudienceGroup
{
    // 'Campaign' column header in the Bulk file
    CampaignName = "ParentCampaignNameGoesHere",
    // 'Parent Id' column header in the Bulk file
    CampaignId = campaignIdKey,
    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",
                  
    // Map properties in the Bulk file to the 
    // AudienceGroup object of the Campaign Management service.
    AudienceGroup = new AudienceGroup
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
        // 'Audience Group' column header in the Bulk file
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
        Status = AudienceGroupStatus.Paused,
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

uploadEntities.Add(bulkAudienceGroup);

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

For an *Audience Group* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Age Ranges](#ageranges)
- [Audience Group Name](#audiencegroupname)
- [Audiences](#audiences)
- [Client Id](#clientid)
- [Description](#description)
- [Gender Types](#gendertypes)
- [Id](#id)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Status](#status)
- [Type](#type)

## <a name="ageranges"></a>Age Ranges
The list of age ranges, delimited by semicolon.

**Add:** Optional  
**Update:** Optional. See update behavior for audiences.  

## <a name="audiencegroupname"></a>Audience Group Name
The name of the audience group.

The name must be unique among all active audience groups within the campaign. The name can contain a maximum of 256 characters.

**Add:** Required  
**Update:** Optional. If no value is set for the update, this setting is not changed.  
**Delete:** Read-only  

## <a name="audiences"></a>Audiences
The list of Audience IDs, delimited by semicolon.  

**Add:** Optional  
**Update:** Optional.  
- If no value is set for the update, this setting is not changed.
- To remove all audiences, set this field to *delete_value*. The *delete_value* keyword removes all existing audiences.  
- To remove a subset of audiences, specify the audiences that you want to keep and omit any that you do not want to keep. The new set of audiences will replace any existing ones.

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Update:** Optional  
**Delete:** Read-only  

## <a name="description"></a>Description
The description of the audience signal.

The description can contain a maximum of 1,024 characters.

**Update:** Optional.  

## <a name="gendertypes"></a>Gender Types
The list of gender types, delimited by semicolon.  

**Add:** Optional  
**Update:** Optional. See update behavior for audiences.  

## <a name="id"></a>Id
The system-generated identifier of the audience group.

**Add:** Optional. You must either leave this field empty, or specify a negative identifier. A negative identifier set for the audience group can then be referenced in the *Parent Id* field of dependent record types such as ads, keywords, or criterion. This is recommended if you are adding new audience groups and new dependent records in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
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
The account ID.

**Add:** Optional  
**Update:** Optional  
**Delete:** Optional  

## <a name="status"></a>Status
The status of the audience group.

Possible values are *Active*, *Deleted*.

**Add:** Optional.  
**Update:** Optional. If no value is set for the update, this setting is not changed.  
**Delete:** Required. The Status must be set to Deleted.

## <a name="type"></a>Type
The entity type, *Audience Group*.  
