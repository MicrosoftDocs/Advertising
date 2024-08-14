---
title: "Account Negative Keyword List Association Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: Describes the Account Negative Keyword List Association fields in a Bulk file.
dev_langs:
  - csharp
---
# Account Negative Keyword List Association Record - Bulk
Defines an association record between an [account](account.md) and account negative keyword list that can be uploaded and downloaded in a bulk file. To upload or download the account or account negative keyword list, use the account or account negative keyword list record.

You can download all *Account Negative Keyword List Association* records in the account by including the [DownloadEntity](downloadentity.md) value of *AccountNegativeKeywordListAssociation* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example would associate a negative keyword list to an account if valid [Id](#id) and [Parent Id](#parentid) values are provided.

```csv
Type,Status,Id,Parent Id,Campaign,Ad Group,Client Id,Modified Time,Keyword,Match Type,Name
Format Version,,,,,,,,,,6.0
Account Negative Keyword List Association,Active,-19,-112,,,ClientIdGoesHere,,,,
```

For an *Account Negative Keyword List Association* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Account](#account)
- [Client Id](#clientid)
- [Id](#id)
- [Modified Time](#modifiedtime)
- [Parent Id](#parentid)
- [Status](#status)

## <a name="account"></a>Account
The name of the account where the account negative keyword list is associated or removed.

**Add:** Read-only and Required  
**Delete:** Read-only and Required  

> [!NOTE]
> For add and delete, you must specify either the [Parent Id](#parentid) or [Account](account.md) field.  

## <a name="clientid"></a>Client Id
Used to associate records in the bulk upload file with records in the results file. The value of this field is not used or stored by the server; it is simply copied from the uploaded record to the corresponding result record. It may be any valid string to up 100 in length.

**Add:** Optional  
**Delete:** Read-only  

## <a name="id"></a>Id
The identifier of the account negative keyword list that is associated or removed from the account.

This bulk field maps to the *Id* field of the *Account Negative Keyword List* record.

**Add:** Read-only and Required. You must either specify an existing negative keyword list identifier, or specify a negative identifier that is equal to the *Id* field of the parent *Account Negative Keyword List* record. This is recommended if you are adding new account negative keyword list and associating it with a new account in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Delete:** Read-only and Required  

## <a name="modifiedtime"></a>Modified Time
The date and time that the entity was last updated. The value is in Coordinated Universal Time (UTC).

> [!NOTE]
> The date and time value reflects the date and time at the server, not the client. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).

**Add:** Read-only   
**Delete:** Read-only  

## <a name="parentid"></a>Parent Id
The identifier of the account where this account negative keyword list is associated or removed.

This bulk field maps to the *Id* field of the [Account](account.md) record.

**Add:** Read-only and Required. You must either specify an existing account identifier, or specify a negative identifier that is equal to the *Id* field of the parent [Account](account.md) record. This is recommended if you are adding a new account negative keyword list and associating it with a new account in the same Bulk file. For more information, see [Bulk File Schema Reference Keys](../bulk-service/bulk-file-schema.md#referencekeys).  
**Delete:** Read-only and Required  

> [!NOTE]
> For add and delete, you must specify either the [Parent Id](#parentid) or [Account](account.md) field.  

## <a name="status"></a>Status
Represents the association status between the account and the account negative keyword list. If the account negative keyword list is not associated with the account, this field's value is Active. To delete the criterion, set the status to Deleted.

**Add:** Read-only. The status will always be set to *Active* when you add criterions. If you upload another value (e.g., *Foo*) the result file will contain the same value even though the criterion is active.
**Delete:** Required. The Status must be set to *Deleted*.
