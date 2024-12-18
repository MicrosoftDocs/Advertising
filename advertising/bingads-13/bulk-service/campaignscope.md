---
title: CampaignScope Data Object - Bulk
ms.service: bing-ads
ms.subservice: bulk-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines an object that identifies a campaign to download.
---
# CampaignScope Data Object - Bulk
Defines an object that identifies a campaign to download.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="CampaignScope" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="CampaignId" type="xs:long" />
    <xs:element minOccurs="0" name="ParentAccountId" type="xs:long" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "CampaignId": "LongValueHere",
  "ParentAccountId": "LongValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [CampaignScope](campaignscope.md) object has the following elements: [CampaignId](#campaignid), [ParentAccountId](#parentaccountid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="campaignid"></a>CampaignId|The identifier of the campaign to download.|**long**|
|<a name="parentaccountid"></a>ParentAccountId|	The identifier of the account that owns the campaign to download.|**long**|

## Requirements
Service: [BulkService.svc v13](https://bulk.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/BulkService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[DownloadCampaignsByCampaignIds](downloadcampaignsbycampaignids.md)  
