---
title: AdRecommendationTextField Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a value set for ad recommendation text field.
---
# AdRecommendationTextField Value Set - Campaign Management
Defines a value set for ad recommendation text field.

## Syntax
```xml
<xs:simpleType name="AdRecommendationTextField" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Headline" />
    <xs:enumeration value="LongHeadline" />
    <xs:enumeration value="Description" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AdRecommendationTextField](adrecommendationtextfield.md) value set has the following values: [Description](#description), [Headline](#headline), [LongHeadline](#longheadline).

|Value|Description|
|-----------|---------------|
|<a name="description"></a>Description|Reserved.|
|<a name="headline"></a>Headline|Reserved.|
|<a name="longheadline"></a>LongHeadline|Reserved.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AdRecommendationTextRefineOperation](adrecommendationtextrefineoperation.md)  
