---
title: "Keyword Label Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
description: Describes the Keyword Label fields in a Bulk file.
dev_langs:
  - csharp
---
# Keyword Label Record - Bulk
Defines an association record between a [Keyword](keyword.md) and a [Label](label.md) that can be uploaded and downloaded in a bulk file. To upload or download the keyword or label, use the [Keyword](keyword.md) or [Label](label.md) record.

You can download all *Keyword Label* records in the account by including the [DownloadEntity](downloadentity.md) value of *KeywordLabels* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would apply a label to a keyword if valid [Id](#id) and [Parent Id](#parentid) values are provided. 

```csv
Type,Status,Id,Parent Id,Campaign,Ad Group,Client Id,Modified Time,Name,Description,Label,Color
Format Version,,,,,,,,6.0,,,
Keyword Label,,-22,-11113,,,ClientIdGoesHere,,,,,
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkKeywordLabel* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkKeywordLabel
var bulkKeywordLabel = new BulkKeywordLabel
{
    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",

    // Map properties in the Bulk file to the 
    // LabelAssociation object of the Campaign Management service.
    LabelAssociation = new LabelAssociation
    {
        // 'Parent Id' column header in the Bulk file
        EntityId = keywordIdKey,
        // 'Id' column header in the Bulk file
        LabelId = labelIdKey
    },

    // 'Status' column header in the Bulk file
    Status = Status.Active
};

uploadEntities.Add(bulkKeywordLabel);

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

For a *Keyword Label* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

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
The identifier of the label that is applied or removed from the keyword.

This bulk field maps to the *Id* field of the [Label](label.md) record. 

**Add:** Read-only and Required. You must either specify an existing label identifier, or specify a negative identifier that is equal to the *Id* field of the parent [Label](label.md) record. This is recommended if you are applying new labels to keywords in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Delete:** Read-only and Required  

## <a name="modifiedtime"></a>Modified Time
The date and time that the entity was last updated. The value is in Coordinated Universal Time (UTC).

> [!NOTE]
> The date and time value reflects the date and time at the server, not the client. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).

**Add:** Read-only  
**Delete:** Read-only  

## <a name="parentid"></a>Parent Id
The identifier of the keyword where this label is applied or removed.
	
This bulk field maps to the *Id* field of the [Keyword](keyword.md) record. 

**Add:** Read-only and Required. You must either specify an existing keyword identifier, or specify a negative identifier that is equal to the *Id* field of the parent [Keyword](keyword.md) record. This is recommended if you are applying labels to a new keyword in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Delete:** Read-only and Required  

## <a name="status"></a>Status
Represents the applied status between the keyword and the label. 

Possible values are *Active* and *Deleted*. If the label is applied to the keyword, this field's value is *Active*.

**Add:** Read-only  
**Delete:** Required. The Status must be set to *Deleted*. 
