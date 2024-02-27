---
title: "Account Shared Negative Keyword Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: Describes the Account Shared Negative Keyword fields in a Bulk file.
dev_langs:
  - csharp
---
# Account Shared Negative Keyword Record - Bulk
Defines a negative keyword that is shared in an account negative keyword list and can be downloaded and uploaded in a Bulk file.

You can download all *Account Shared Negative Keyword* records in the account by including the [DownloadEntity](downloadentity.md) value of *AccountSharedNegativeKeyword* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would add a new negative keyword to a negative keyword list given a valid account negative keyword list [Id](#id) ([Parent Id](#parentid)).

```csv
Type,Status,Id,Parent Id,Campaign,Ad Group,Client Id,Modified Time,Keyword,Match Type,Name
Format Version,,,,,,,,,,6.0
Account Shared Negative Keyword,Active,,-19,,,ClientIdGoesHere,,shoes,Exact,
```

For an *Account Shared Negative Keyword* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md).

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
**Update:** Not applicable. A negative keyword can be added and deleted, but not updated.  
**Delete:** Read-only  

## <a name="id"></a>Id
The system-generated identifier of the negative keyword.  

**Add:** Read-only  
**Update:** Not applicable. A negative keyword can be added and deleted, but cannot be updated.  
**Delete:** Read-only and Required  

## <a name="keyword"></a>Status
The negative keyword text.  

The text can contain a maximum of 100 characters.

**Add:** Required
**Update:** Not applicable. A negative keyword can be added and deleted, but not updated.
**Delete:** Read-only

## <a name="matchtype"></a>Status
The type of match to compare the negative keyword and the user's search term.

The supported match type values for a negative keyword are *Phrase* and *Exact*.

**Add:** Required
**Update:** Not applicable. A negative keyword can be added and deleted, but not updated.
**Delete:** Read-only

## <a name="modifiedtime"></a>Modified Time
The date and time that the entity was last updated. The value is in Coordinated Universal Time (UTC).

> [!NOTE]
> The date and time value reflects the date and time at the server, not the client. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).

**Add:** Read-only  
**Update:** Not applicable. A negative keyword can be added and deleted, but cannot be updated.
**Delete:** Read-only  

## <a name="parentid"></a>Parent Id
The system-generated identifier of the account negative keyword list that contains the negative keyword.

This bulk field maps to the *Id* field of the [Account Negative Keyword List](account-negative-keyword-list.md) record.

**Add:** Read-only and Required. You must either specify an existing negative keyword list identifier, or specify a negative identifier that is equal to the *Id* field of the parent [Account Negative Keyword List](account-negative-keyword-list.md) record. This is recommended if you are adding new negative keywords to a new account negative keyword list in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Update:** Not applicable. A negative keyword can be added and deleted, but cannot be updated.
**Delete:** Read-only  

> [!NOTE]
> For add and delete, you must specify either the [Parent Id](#parentid) or [Account](account.md) field.  

## <a name="status"></a>Status
Represents the association status between the account negative keyword list and the negative keyword.  

If the negative keyword is associated with the account negative keyword list, this field's value is *Active*.  

Possible values are *Active* or *Deleted*.


**Add:** Optional. The default value is *Active*.
**Update:** Not applicable. A negative keyword can be added and deleted, but cannot be updated.
**Delete:** Required. The Status must be set to *Deleted*.
