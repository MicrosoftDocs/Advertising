---
title: "Account Negative Keyword List Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: Describes the Account Negative Keyword List fields in a Bulk file.
dev_langs:
  - csharp
---
# Account Negative Keyword List Record - Bulk
Defines an account negative keyword list that can be downloaded and uploaded in a bulk file.

You can download all *Account Negative Keyword List* records in the account by including the [DownloadEntity](downloadentity.md) value of *AccountNegativeKeywordList* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new account negative keyword list.

```csv
Type,Status,Id,Parent Id,Campaign,Ad Group,Client Id,Modified Time,Keyword,Match Type,Name
Format Version,,,,,,,,,,6.0
Account Negative Keyword List,Active,-19,,,,ClientIdGoesHere,,,,My Account Negative Keyword List
```

For an *Account Negative Keyword List* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md).

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

**Add:** Optional. You must either leave this field empty, or specify a negative identifier. A negative identifier set for the account negative keyword list can then be referenced in the *Id* field of dependent record types such as [Account Negative Keyword List Association](account-negative-keyword-list-association.md). This is recommended if you are adding a new account negative keyword list and associating it with account in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
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
The name of the account negative keyword list.

The maximum length of the name is 255.

**Add:** Required  
**Update:** Required  
**Delete:** Read-only  

## <a name="status"></a>Status
The status of the account negative keyword list.

Possible values are *Active* or *Deleted*.  

**Add:** Optional. The default value is *Active*.  
**Update:** Read-only  
**Delete:** Not applicable. Account negative keyword list can't be deleted.
