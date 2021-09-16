---
title: "Shared Negative Keyword Record - Bulk"
ms.service: bing-ads-bulk-service
ms.topic: "article"
author: eric-urban
ms.author: eur
description: Describes the Shared Negative Keyword fields in a Bulk file.
dev_langs:
  - csharp
---
# Shared Negative Keyword Record - Bulk
Defines a negative keyword that is shared in a negative keyword list and can be downloaded and uploaded in a bulk file.

You can download all *Shared Negative Keyword* records in the account by including the [DownloadEntity](downloadentity.md) value of *SharedNegativeKeywords* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new negative keyword to a negative keyword list given a valid negative keyword list ID ([Parent Id](#parentid)). 

```csv
Type,Status,Id,Parent Id,Campaign,Ad Group,Client Id,Modified Time,Keyword,Match Type,Name
Format Version,,,,,,,,,,6.0
Shared Negative Keyword,Active,,-19,,,ClientIdGoesHere,,shoes,Exact,
```

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to upload and download the *BulkSharedNegativeKeyword* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file. 

```csharp
var uploadEntities = new List<BulkEntity>();

// Map properties in the Bulk file to the BulkSharedNegativeKeyword
var bulkSharedNegativeKeyword = new BulkSharedNegativeKeyword
{
    // 'Client Id' column header in the Bulk file
    ClientId = "ClientIdGoesHere",

    // Map properties in the Bulk file to the 
    // NegativeKeyword object of the Campaign Management service.
    NegativeKeyword = new NegativeKeyword
    {
        // 'Id' column header in the Bulk file
        Id = null,
        // 'Match Type' column header in the Bulk file
        MatchType = MatchType.Exact,
        // 'Text' column header in the Bulk file
        Text = "shoes"
    },

    // 'Parent Id' column header in the Bulk file
    NegativeKeywordListId = negativeKeywordListIdKey,

    // 'Status' column header in the Bulk file
    Status = Status.Active
};

uploadEntities.Add(bulkSharedNegativeKeyword);

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

For a *Shared Negative Keyword* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Client Id](#clientid)
- [Id](#id)
- [Keyword](#keyword)
- [Match Type](#matchtype)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Status](#status)

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Update:** Not applicable. A negative keyword can be added and deleted, but cannot be updated.    
**Delete:** Read-only  

## <a name="id"></a>Id
The system-generated identifier of the negative keyword.

**Add:** Read-only  
**Update:** Not applicable. A negative keyword can be added and deleted, but cannot be updated.  
**Delete:** Read-only and Required  

## <a name="keyword"></a>Keyword
The negative keyword text. 

The text can contain a maximum of 100 characters.

**Add:** Required  
**Update:** Not applicable. A negative keyword can be added and deleted, but cannot be updated.    
**Delete:** Read-only

## <a name="matchtype"></a>Match Type
The type of match to compare the negative keyword and the user's search term.

The supported match type values for a negative keyword are *Phrase* and *Exact*.

**Add:** Required  
**Update:** Not applicable. A negative keyword can be added and deleted, but cannot be updated.    
**Delete:** Read-only

## <a name="modifiedtime"></a>Modified Time
The date and time that the entity was last updated. The value is in Coordinated Universal Time (UTC).

> [!NOTE]
> The date and time value reflects the date and time at the server, not the client. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).

**Add:** Read-only  
**Update:** Not applicable. A negative keyword can be added and deleted, but cannot be updated.  
**Delete:** Read-only  

## <a name="parentid"></a>Parent Id
The system-generated identifier of the negative keyword list that contains the negative keyword.

This bulk field maps to the *Id* field of the [Negative Keyword List](negative-keyword-list.md) record.

**Add:** Read-only and Required. You must either specify an existing negative keyword list identifier, or specify a negative identifier that is equal to the *Id* field of the parent [Negative Keyword List](negative-keyword-list.md) record. This is recommended if you are adding new negative keywords to a new negative keyword list in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Not applicable. A negative keyword can be added and deleted, but cannot be updated.  
**Delete:** Read-only  

## <a name="status"></a>Status
Represents the association status between the negative keyword list and the negative keyword.

If the negative keyword is associated with the negative keyword list, this  field's value is *Active*.

Possible values are *Active* or *Deleted*. 

**Add:** Optional. The default value is *Active*.  
**Update:** Not applicable. A negative keyword can be added and deleted, but cannot be updated.    
**Delete:** Required. The Status must be set to *Deleted*.

