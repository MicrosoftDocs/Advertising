---
title: "Dynamic Search Ad Label Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: Describes the Dynamic Search Ad Label fields in a Bulk file.
dev_langs:
  - csharp
---
# Dynamic Search Ad Label Record - Bulk
Defines an association record between a [Dynamic Search Ad](dynamic-search-ad.md) and a [Label](label.md) that can be uploaded and downloaded in a bulk file. To upload or download the dynamic search ad or label, use the [Dynamic Search Ad](dynamic-search-ad.md) or [Label](label.md) record.

The Dynamic Search Ad Label record can only be created within search campaigns that have valid dynamic search ads settings (comprised of the [Domain Language](campaign.md#domainlanguage), [Dynamic Description Enabled](campaign.md#dynamicdescriptionenabled), [Page Feed Ids](campaign.md#pagefeedids), [Source](campaign.md#source), and [Website](campaign.md#website) fields). The campaign's [Experiment Id](campaign.md#experimentid) must be set and the [Ad Group Type](ad-group.md#adgrouptype) must be set to "SearchDynamic".  

You can download all *Dynamic Search Ad Label* records in the account by including the [DownloadEntity](downloadentity.md) value of *DynamicSearchAdLabels* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would apply a label to a dynamic search ad if valid [Id](#id) and [Parent Id](#parentid) values are provided. 

```csv
Type,Status,Id,Parent Id,Campaign,Ad Group,Client Id,Modified Time,Name,Description,Label,Color
Format Version,,,,,,,,6.0,,,
Dynamic Search Ad Label,,-22,-11112,,,ClientIdGoesHere,,,,,
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkDynamicSearchAdLabel* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkDynamicSearchAdLabel
var bulkDynamicSearchAdLabel = new BulkDynamicSearchAdLabel
{
    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",

    // Map properties in the Bulk file to the 
    // LabelAssociation object of the Campaign Management service.
    LabelAssociation = new LabelAssociation
    {
        // 'Parent Id' column header in the Bulk file
        EntityId = dynamicSearchAdIdKey,
        // 'Id' column header in the Bulk file
        LabelId = labelIdKey
    },

    // 'Status' column header in the Bulk file
    Status = Status.Active
};

uploadEntities.Add(bulkDynamicSearchAdLabel);

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

For a *Dynamic Search Ad Label* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Client Id](#clientid)
- [Id](#id)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Status](#status)

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Delete:** Read-only  

## <a name="id"></a>Id
The identifier of the label that is applied or removed from the dynamic search ad.

This bulk field maps to the *Id* field of the [Label](label.md) record. 

**Add:** Read-only and Required. You must either specify an existing label identifier, or specify a negative identifier that is equal to the *Id* field of the parent [Label](label.md) record. This is recommended if you are applying new labels to dynamic search ads in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Delete:** Read-only and Required  

## <a name="modifiedtime"></a>Modified Time
The date and time that the entity was last updated. The value is in Coordinated Universal Time (UTC).

> [!NOTE]
> The date and time value reflects the date and time at the server, not the client. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).

**Add:** Read-only  
**Delete:** Read-only  

## <a name="parentid"></a>Parent Id
The identifier of the dynamic search ad where this label is applied or removed.
	
This bulk field maps to the *Id* field of the [Dynamic Search Ad](dynamic-search-ad.md) record. 

**Add:** Read-only and Required. You must either specify an existing dynamic search ad identifier, or specify a negative identifier that is equal to the *Id* field of the parent [Dynamic Search Ad](dynamic-search-ad.md) record. This is recommended if you are applying labels to a new dynamic search ad in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Delete:** Read-only and Required  

## <a name="status"></a>Status
Represents the applied status between the dynamic search ad and the label. 

Possible values are *Active* and *Deleted*. If the label is applied to the dynamic search ad, this field's value is *Active*.

**Add:** Read-only  
**Delete:** Required. The Status must be set to *Deleted*. 
