---
title: "Company Item Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 9/7/2026
description: Describes the Company Item fields in a Bulk file.
---
# Company Item Record - Bulk
Defines a member company in a LinkedIn company list segment that can be downloaded and uploaded in a bulk file. The Company Item Bulk record corresponds to the [CompanyName](../campaign-management-service/companyname.md) data object in the Campaign Management API.

> [!IMPORTANT]
> A Company Item record can't be uploaded independently. Include its parent [Company List](company-list.md) record in the same Bulk upload file and set the Company Item [Parent Id](#parentid) to the parent's identifier.
>
> Updating a Company List replaces its complete member set with the non-deleted Company Item records supplied for that parent. Include every existing member that should remain in the list. Any existing member that you omit is removed.

To add a new company list and its members in the same file, set the Company List [Id](company-list.md#id) to a negative temporary identifier and use the same value for the Parent Id of each Company Item record. For an example, see [Company List Record - Bulk](company-list.md).

You can download all *Company Item* records in an account by including the [DownloadEntity](downloadentity.md) value of *CompanyItem* in a [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) service request. Include *CompanyList* to also download the parent list records. The download request must include the [EntityData](datascope.md#entitydata) scope. For more information about the Bulk service, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

For a *Company Item* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md).

- [Company Name](#companyname)
- [Id](#id)
- [Parent Id](#parentid)
- [Status](#status)
- [Type](#type)

## <a name="companyname"></a>Company Name
The name of the member company.

**Add:** Required  
**Update:** Required for each member that should remain in the company list  
**Delete:** Read-only

## <a name="id"></a>Id
The system-generated identifier of the company item.

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only

## <a name="parentid"></a>Parent Id
The identifier of the parent [Company List](company-list.md).

The parent Company List record must be present in the same Bulk upload file. For a new list, specify the negative identifier that is equal to the [Id](company-list.md#id) of the parent record. For an existing list, specify its positive identifier. For more information, see [Bulk File Schema Reference Keys](bulk-file-schema.md#referencekeys).

**Add:** Required  
**Update:** Required  
**Delete:** Required

## <a name="status"></a>Status
The status of the company item.

Possible values are *Active* and *Deleted*. Set this field to *Deleted* to exclude the row when replacing the parent Company List member set.

**Add:** Optional. The default value is *Active*.  
**Update:** Optional. The default value is *Active*.  
**Delete:** Required

## <a name="type"></a>Type
The type of the Bulk record.

Set this field to *Company Item*.

**Add:** Required  
**Update:** Required  
**Delete:** Required
