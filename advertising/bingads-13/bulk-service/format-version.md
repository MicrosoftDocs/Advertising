---
title: "Format Version Record - Bulk"
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
description: Describes the Format Version fields in a Bulk file.
---
# Format Version Record - Bulk
Defines the format version of records in a bulk file.

The *Format Version* record is included in the Bulk download file automatically everytime you call the [DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md) or [DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md) service request. 

For the *Format Version* record, the following attribute fields are available in the [Bulk File Schema](bulk-file-schema.md). 

- [Name](#name)

## <a name="name"></a>Name
This string represents the format version used for bulk download and upload. The format version differs from the Bing Ads API version. Currently the only supported format version is 6.0. For more information, see [Format Versions](bulk-file-schema.md#formatversions).

**Add:** Read-only  
**Update:** Read-only  
**Delete:** Read-only  
