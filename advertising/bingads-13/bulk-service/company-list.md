---
title: "Company List Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 9/7/2026
description: Describes the Company List fields in a Bulk file.
---
# Company List Record - Bulk
Defines an account-level LinkedIn company list segment that can be downloaded and uploaded in a bulk file.

A company list contains one or more [Company Item](company-item.md) records. To add a new company list and its members in the same file, set the Company List [Id](#id) to a negative temporary identifier and use the same value for the [Parent Id](company-item.md#parentid) of each Company Item record.

> [!IMPORTANT]
> A [Company Item](company-item.md) record can't be uploaded independently. Its parent Company List record must be included in the same Bulk upload file.
>
> Updating a Company List replaces its complete member set with the non-deleted Company Item records supplied for that parent. Include every existing member that should remain in the list. Any existing member that you omit is removed.

You can download all *Company List* records in an account by including the [DownloadEntity](downloadentity.md) value of *CompanyList* in a [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) service request. Include *CompanyItem* to also download the list members. The download request must include the [EntityData](datascope.md#entitydata) scope. For more information about the Bulk service, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example adds a new company list and two members. The negative identifier `-10` links the child records to the new parent record.

```csv
Type,Status,Id,Parent Id,Name,Audience Size,Company Name
Format Version,,,,6.0,,
Company List,Active,-10,,Contoso decision makers,,
Company Item,Active,,-10,,,Contoso
Company Item,Active,,-10,,,Fabrikam
```

For a *Company List* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md).

- [Audience Size](#audiencesize)
- [Id](#id)
- [Name](#name)
- [Parent Id](#parentid)
- [Status](#status)
- [Type](#type)

## <a name="audiencesize"></a>Audience Size
The estimated number of people in the company list audience.

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only

## <a name="id"></a>Id
The system-generated identifier of the company list.

**Add:** Optional. Leave this field empty or specify a negative identifier. To add Company Item records with a new company list in the same Bulk file, specify a negative identifier and use the same value in the [Parent Id](company-item.md#parentid) field of each child record. For more information, see [Bulk File Schema Reference Keys](bulk-file-schema.md#referencekeys).  
**Update:** Read-only and required  
**Delete:** Read-only and required

## <a name="name"></a>Name
The name of the company list.

**Add:** Required  
**Update:** Required  
**Delete:** Read-only

## <a name="parentid"></a>Parent Id
The Microsoft Advertising identifier of the account that contains the company list.

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only

## <a name="status"></a>Status
The status of the company list.

Possible values are *Active* and *Deleted*.

**Add:** Optional. The default value is *Active*.  
**Update:** Read-only  
**Delete:** Required. Set this field to *Deleted* and provide the positive [Id](#id) of the company list.

## <a name="type"></a>Type
The type of the Bulk record.

Set this field to *Company List*.

**Add:** Required  
**Update:** Required  
**Delete:** Required
