---
title: "Campaign Negative Store Criterion Record - Bulk"
ms.service: bing-ads
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
description: Describes the Campaign Negative Store Criterion fields in a Bulk file.
dev_langs:
  - csharp
ms.subservice: bulk-api
---
# Campaign Negative Store Criterion Record - Bulk
Defines a Campaign Negative Store Criterion that can be uploaded and downloaded in a bulk file. 

Each *Campaign Negative Store Criterion* excludes one Microsoft Merchant Center store from your [shopping campaign for brands](../guides/product-ads.md#setup-cooperative). Each campaign can have a maximum of 10 excluded stores. 

You can download all *Campaign Negative Store Criterion* records in the account by including the [DownloadEntity](downloadentity.md) value of *CampaignNegativeStoreCriterions* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new campaign negative store criterion if a valid [Parent Id](#parentid) value is provided. 

```csv
Type,Status,Id,Parent Id,Campaign,Ad Group,Client Id,Modified Time,Store Id,Name
Format Version,,,,,,,,,6.0
Campaign Negative Store Criterion,Active,,-114,,,ClientIdGoesHere,,StoreIdGoesHere,
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkCampaignNegativeStoreCriterion* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkCampaignNegativeStoreCriterion
var bulkCampaignNegativeStoreCriterion = new BulkCampaignNegativeStoreCriterion
{
    // Map properties in the Bulk file to the 
    // NegativeCampaignCriterion object of the Campaign Management service.
    NegativeCampaignCriterion = new NegativeCampaignCriterion
    {
        // 'Parent Id' column header in the Bulk file
        CampaignId = campaignIdKey,
        Criterion = new StoreCriterion
        {
            // 'Store Id' column header in the Bulk file
            StoreId = StoreIdGoesHere,
        },
        // 'Id' column header in the Bulk file
        Id = null,
    },
    // 'Campaign' column header in the Bulk file
    CampaignName = null,
    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",
    // 'Status' column header in the Bulk file
    Status = Status.Active
};

uploadEntities.Add(bulkCampaignNegativeStoreCriterion);

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

For a *Campaign Negative Store Criterion* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Campaign](#campaign)
- [Client Id](#clientid)
- [Id](#id)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Status](#status)
- [Store Id](#storeid)

## <a name="campaign"></a>Campaign
The name of the campaign that contains the store criterion.

**Add:** Read-only and Required  
**Update:** Not applicable. A negative store can be added and deleted, but cannot be updated.  
**Delete:** Read-only and Required  

> [!NOTE]
> For add, update, and delete, you must specify either the [Parent Id](#parentid) or [Campaign](#campaign) field.

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Update:** Not applicable. A negative store can be added and deleted, but cannot be updated.  
**Delete:** Read-only  

## <a name="id"></a>Id
The system-generated identifier of the store criterion.

**Add:** Read-only  
**Update:** Not applicable. A negative store can be added and deleted, but cannot be updated.  
**Delete:** Read-only and Required  

## <a name="modifiedtime"></a>Modified Time
The date and time that the entity was last updated. The value is in Coordinated Universal Time (UTC).

> [!NOTE]
> The date and time value reflects the date and time at the server, not the client. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).

**Add:** Read-only  
**Update:** Not applicable. A negative store can be added and deleted, but cannot be updated.  
**Delete:** Read-only  

## <a name="parentid"></a>Parent Id
The system-generated identifier of the campaign that contains the store criterion.

This bulk field maps to the *Id* field of the [Campaign](campaign.md) record.

**Add:** Read-only and Required. You must either specify an existing campaign identifier, or specify a negative identifier that is equal to the *Id* field of the parent [Campaign](campaign.md) record. This is recommended if you are adding new dynamic ad targets to a new campaign in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Not applicable. A negative store can be added and deleted, but cannot be updated.  
**Delete:** Read-only  

> [!NOTE]
> For add, update, and delete, you must specify either the [Parent Id](#parentid) or [Campaign](#campaign) field.

## <a name="status"></a>Status
The status of the store criterion.

Possible values are *Active* or *Deleted*. 

**Add:** Optional. The default value is *Active*.  
**Update:** Not applicable. A negative store can be added and deleted, but cannot be updated.  
**Delete:** Required. The Status must be set to *Deleted*.

## <a name="storeid"></a>Store Id
The system-generated identifier of the Microsoft Merchant Center store to exclude. 

**Add:** Required  
**Update:** Not applicable. A negative store can be added and deleted, but cannot be updated.  
**Delete:** Read-only  
