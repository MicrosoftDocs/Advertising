---
title: "Seasonality Adjustment Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: Describes the Seasonality Adjustment fields in a Bulk file.
dev_langs:
  - csharp
---
# Seasonality Adjustment Record - Bulk

Defines the Seasonality Adjustment fields that can be uploaded and downloaded in a bulk file.

You can download all *Seasonality Adjustment* records in the account by including the [DownloadEntity](downloadentity.md) value of *SeasonalityAdjustments* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new Seasonality Adjustment.

```csv
Type,AccountId,Id,Campaign Type,Start Date,End Date,Name,Description,Adjustment Value,Seasonality Adjustment,Device Type,Campaign Associations
Format Version,,,,,,6.0,,,,,
Seasonality Adjustment,,,Search,3/15/2024 3:00,3/16/2024 3:00,,Description,100,TestSA,Tablets,
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkAdGroupSeasonalityAdjustment* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file.

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkSeasonalityAdjustment
var bulkSeasonalityAdjustment = new BulkSeasonalityAdjustment
{
    // Map properties in the Bulk file to the 
    // SeasonalityAdjustment object of the Campaign Management service.
    SeasonalityAdjustment = new SeasonalityAdjustment
    {
        // 'Adjustment Value' column header in the Bulk file
        AdjustmentPercentage = 100,
        // 'Campaign Associations' column header in the Bulk file
        CampaignAssociations = new List<CampaignAssociation>(),
        // 'Campaign Type' column header in the Bulk file
        CampaignTypeFilter = CampaignType.Search,
        // 'Description' column header in the Bulk file
        Description = "Description",
        // 'Device Type' column header in the Bulk file
        DeviceTypeFilter = DeviceType.Computers,
        // 'Id' column header in the Bulk file
        Id = null,
        // 'Start Date' column header in the Bulk file
        StartDate = DateTime.UtcNow,
        // 'End Date' column header in the Bulk file
        EndDate = DateTime.UtcNow.AddDays(7),
        // 'Seasonality Adjustment' column header in the Bulk file
        Name = "Seasonality Adjustment",
    },
};

uploadEntities.Add(bulkSeasonalityAdjustment);

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

For an *Seasonality Adjustment* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md).

- [Adjustment Value](#adjustmentvalue)
- [Campaign Associations](#campaignassociations)
- [Campaign Type](#campaigntype)
- [Description](#description)
- [Device Type](#devicetype)
- [End Date](#enddate)
- [Id](#id)
- [Seasonality Adjustment](#seasonalityadjustment)
- [Start Date](#startdate)

## <a name="adjustmentvalue"></a>Adjustment Value

The percentage of the conversion rate adjustment.

**Add:** Required  
**Update:** Optional  
**Delete:** Read-only  

## <a name="campaignassociations"></a>Campaign Associations

Make the seasonality adjustment to these campaigns.

**Add:** Optional  
**Update:** Optional  
**Delete:** Optional. Only one of "Campaign Associations" and "Campaign Type" can be specified. If you set "Campaign Type," this will be *null*.  

## <a name="campaigntype"></a>Campaign Type

Make the seasonality adjustment to these campaign types.

**Add:** Optional  
**Update:** Optional  
**Delete:** Optional. Only one of "Campaign Associations" and "Campaign Type" can be specified. If you set "Campaign Associations," this will be *null*.  

## <a name="description"></a>Description

A description for the seasonality adjustment.

**Add:** Required  
**Update:** Optional  
**Delete:** Read-only  

## <a name="devicetype"></a>Device Type

Make the seasonality adjustment to these device types.

**Add:** Required  
**Update:** Optional  
**Delete:** Read-only  

## <a name="enddate"></a>End Date

The end date.

**Important**: The value must be in Coordinated Universal Time (UTC). This differs from the time zone options when you upload offline conversions in the Microsoft Advertising web application. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).

**Add:** Required  
**Update:** Optional  
**Delete:** Read-only  

## <a name="id"></a>Id

The system-generated identifier for the seasonality adjustment.

**Add:** None  
**Update:** Required  
**Delete:** Read-only  

## <a name="seasonalityadjustment"></a>Seasonality Adjustment

The name of the seasonality adjustment.

**Add:** Required  
**Update:** Optional  
**Delete:** Read-only  

## <a name="startdate"></a>Start Date

The start date.

**Important**: The value must be in Coordinated Universal Time (UTC). This differs from the time zone options when you upload offline conversions in the Microsoft Advertising web application. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).

**Add:** Required  
**Update:** Optional  
**Delete:** Read-only  
