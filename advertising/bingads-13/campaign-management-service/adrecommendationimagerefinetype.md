---
title: AdRecommendationImageRefineType Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: The ad recommendation image refine type value set.
---
# AdRecommendationImageRefineType Value Set - Campaign Management
The ad recommendation image refine type value set.

## Syntax
```xml
<xs:simpleType name="AdRecommendationImageRefineType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="BackgroundChange">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RefineDisplay">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AdRecommendationImageRefineType](adrecommendationimagerefinetype.md) value set has the following values: [BackgroundChange](#backgroundchange), [RefineDisplay](#refinedisplay).

|Value|Description|
|-----------|---------------|
|<a name="backgroundchange"></a>BackgroundChange|The refine type is a background change.|
|<a name="refinedisplay"></a>RefineDisplay|THe refine type is display.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AdRecommendationImageRefineOperation](adrecommendationimagerefineoperation.md)  
