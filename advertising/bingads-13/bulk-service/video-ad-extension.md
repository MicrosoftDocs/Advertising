---
title: "Video Ad Extension Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
description: Describes the Video Ad Extension fields in a Bulk file.
dev_langs:
  - csharp
---
# Video Ad Extension Record - Bulk
Defines a video ad extension that can be downloaded and uploaded in a bulk file.

You can associate a video ad extension with the account or with campaigns and ad groups in the account. Each entity (account, campaign, or ad group) can be associated with up to 20 video ad extensions. Use the [Account Video Ad Extension](account-video-ad-extension.md), [Ad Group Video Ad Extension](ad-group-video-ad-extension.md), and [Campaign Video Ad Extension](campaign-video-ad-extension.md) records to manage video ad extension associations. 

You can download all *Video Ad Extension* records in the account by including the [DownloadEntity](downloadentity.md) value of *VideoAdExtensions* in the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. Additionally the download request must include the [EntityData](datascope.md#entitydata) scope. For more details about the Bulk service including best practices, see [Bulk Download and Upload](../guides/bulk-download-upload.md).

