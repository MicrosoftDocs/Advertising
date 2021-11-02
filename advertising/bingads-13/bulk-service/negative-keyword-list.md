---
title: "Negative Keyword List Record - Bulk"
ms.service: bing-ads-bulk-service
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
description: Describes the Negative Keyword List fields in a Bulk file.
dev_langs:
  - csharp
---
# Negative Keyword List Record - Bulk
Defines a negative keyword list that can be downloaded and uploaded in a bulk file.

You can download all *Negative Keyword List* records in the account by including the [DownloadEntity](downloadentity.md) value of *NegativeKeywordLists* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new negative keyword list. 

```csv
Type,Status,Id,Parent Id,Campaign,Ad Group,Client Id,Modified Time,Keyword,Match Type,Name
Format Version,,,,,,,,,,6.0
Negative Keyword List,Active,-19,,,,ClientIdGoesHere,,,,My Negative Keyword List
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkNegativeKeywordList* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkNegativeKeywordList
var bulkNegativeKeywordList = new BulkNegativeKeywordList
{
    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",

    // Map properties in the Bulk file to the 
    // NegativeKeywordList object of the Campaign Management service.
    NegativeKeywordList = new NegativeKeywordList
    {
        // 'Id' column header in the Bulk file
        Id = negativeKeywordListIdKey,
        // 'Name' column header in the Bulk file
        Name = "My Negative Keyword List",
    },

    // 'Status' column header in the Bulk file
    Status = Status.Active
};

uploadEntities.Add(bulkNegativeKeywordList);

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

For a *Negative Keyword List* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Client Id](#clientid)
- [Id](#id)
- [Modified Time](#modifiedtime)
- [Name](#name)
- [Status](#status)

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Update:** Optional    
**Delete:** Read-only  

## <a name="id"></a>Id
The system-generated identifier of the negative keyword list.

**Add:** Optional. You must either leave this field empty, or specify a negative identifier. A negative identifier set for the negative keyword list can then be referenced in the *Id* field of dependent record types such as [Campaign Negative Keyword List Association](campaign-negative-keyword-list-association.md). This is recommended if you are adding new negative keyword list and associating it with campaigns in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
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
The name of the negative keyword list.

The maximum length of the name is 255.

**Add:** Required  
**Update:** Required    
**Delete:** Read-only  

## <a name="status"></a>Status
The status of the negative keyword list.

Possible values are *Active* or *Deleted*. 

**Add:** Optional. The default value is *Active*.  
**Update:** Read-only    
**Delete:** Required. The Status must be set to *Deleted*.


