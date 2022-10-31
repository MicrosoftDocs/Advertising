---
title: Bulk Service Operations
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Service operations reference for the Bulk service.
ms.subservice: bulk-api
---
# Bulk Service Operations
The Bulk service defines the following service operations.

|Service Operation|Description|Request Limits|
|---|---|---|
|[DownloadCampaignsByAccountIds](downloadcampaignsbyaccountids.md)|Downloads settings and performance data for all of the account's campaigns.|1 *Account*|
|[DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md)|Downloads settings and performance data for the specified campaigns.|1,000 *Campaigns*|
|[GetBulkDownloadStatus](getbulkdownloadstatus.md)|Gets the status of a bulk download request.|1 *DownloadRequestId*|
|[GetBulkUploadStatus](getbulkuploadstatus.md)|Gets the status and completion progress of a bulk upload request.|1 *RequestId*|
|[GetBulkUploadUrl](getbulkuploadurl.md)|Submits a request for a URL where a bulk upload file may be posted.|1 *AccountId*|
