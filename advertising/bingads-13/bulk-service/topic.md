---
title: "Topic Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a topic that can be downloaded in a bulk file.
dev_langs:
  - csharp
---
# Topic Record - Bulk
Defines a topic that can be downloaded in a bulk file.

You can download all *Topic* records in the account by including the [DownloadEntity](downloadentity.md) value of *Topics* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

If you are using the [Bing Ads SDKs](../guides/client-libraries.md) for .NET, Java, or Python, you can save time using the [BulkServiceManager](../guides/sdk-bulk-service-manager.md) to download the *BulkTopic* object, instead of calling the service operations directly and writing custom code to parse each field in the bulk file.  

The following Bulk CSV example would add a topic.

```csv
Type,Status,Id,Parent Id,Name,Topic Parent Id
Format Version,,,,6.0,
Topic,Active,1,AccountId,Games,
```

For a *Topic* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md).  

- [Id](#id)
- [Name](#name)
- [Parent Id](#parentid)
- [Status](#status)
- [Topic Parent Id](#topicparentid)

## <a name="id"></a>Id
The Microsoft Advertising unique identifier of the topic.  

## <a name="name"></a>Name
The topic name.  

## <a name="parentid"></a>Parent Id
The system-generated identifier of the account.  

## <a name="status"></a>Status
The status of the topic. Possible values are *Active* and *Deleted*.  

## <a name="topicparentid"></a>Topic Parent Id
The parent ID for the topic. If this value is null, the topic is considered top-level.
