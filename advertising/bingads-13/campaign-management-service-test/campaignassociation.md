---
title: CampaignAssociation Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a data object for which campaigns to associate to data exclusions and seasonality adjustments.(test)
---
# CampaignAssociation Data Object Test - Campaign Management
Defines a data object for which campaigns to associate to data exclusions and seasonality adjustments.

# [XML](#tab/xml)

```xml
<xs:complexType name="CampaignAssociation" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="CampaignId" type="xs:long" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "CampaignId": "LongValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [CampaignAssociation](campaignassociation.md) object has the following elements: [CampaignId](#campaignid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="campaignid"></a>CampaignId|The campaign ID.|**long**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[DataExclusion](dataexclusion.md)  
[SeasonalityAdjustment](seasonalityadjustment.md)  
