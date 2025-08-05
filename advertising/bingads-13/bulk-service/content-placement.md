---
title: "Content Placement Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a content placement that can be downloaded in a bulk file.
dev_langs:
  - csharp
---
# Content Placement Record - Bulk
Defines a content placement that can be downloaded in a bulk file.

You can download all *Content Placement* records in the account by including the [DownloadEntity](downloadentity.md) value of *ContentPlacement* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

The following Bulk CSV example is for content placement download.

```csv
Type,Status,Id,Parent Id,Name
Format Version,,,,6.0
Content Placement,Active,14,AccountId,Gaming
```

For a *Content Placement* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md).  

- [Id](#id)
- [Name](#name)
- [Parent Id](#parentid)
- [Status](#status)

## <a name="id"></a>Id
The Microsoft Advertising unique identifier of the content placement.  

## <a name="name"></a>Name
The content placement name.  

## <a name="parentid"></a>Parent Id
The system-generated identifier of the account.  

## <a name="status"></a>Status
The status of the content placement. Possible values are *Active* and *Deleted*.  
