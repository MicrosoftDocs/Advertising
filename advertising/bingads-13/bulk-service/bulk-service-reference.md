---
title: "Bulk API"
ms.service: bing-ads-bulk-service
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
description: Reference documentation for the Bulk API.
---
# Bulk API
The Bulk [service](../guides/web-service-addresses.md) defines an Application Programming Interface (API) that you can use to download and upload campaign entity data in the background.

> [!NOTE]
> AutoApplyRecommendations in Bulk API will be deprecated by November 11th, 2022. We will be removing [*AutoApplyRecommendations*](account.md#autoapplyrecommendations) from [*Account*](account.md) in [Bulk File Schema](bulk-file-schema.md).<br/><br/>
We strongly encourage you to use the new [Auto-apply Management interface](../guides/ad-insights-auto-apply-management.md) in Ad Insight API.

|Interface|Description|
|---------|---------|
|[Guides](../guides/bulk-guides.md)|Lists guides for the Bulk API.|
|[Bulk Service Operations](bulk-service-operations.md)|Service operations such as [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) and [GetBulkUploadUrl](getbulkuploadurl.md) can be used to download and upload campaign entity data in the background.|
|[Bulk Data Objects](bulk-data-objects.md)|If want to download specific campaigns, you can use the [CampaignScope](campaignscope.md) object.|
|[Bulk Value Sets](bulk-value-sets.md)|Choose which data is downloaded with the [DataScope ](datascope.md) and [DownloadEntity](downloadentity.md) value sets.|
|[Bulk File Schema](bulk-file-schema.md)|The bulk schema defines the contents of the file for download or upload with the Bulk API. For both download and upload, the Bulk service supports the file types and corresponding schemas in the [DownloadEntity](downloadentity.md) value set. For more information about using the Bulk service to manage your campaigns, see [Bulk Download and Upload](../guides/bulk-download-upload.md). |

## See Also

[Bing Ads API Concepts](../guides/concepts.md)  
[Bing Ads API Web Service Addresses](../guides/web-service-addresses.md)  
[Get Started With the Bing Ads API](../guides/get-started.md)
