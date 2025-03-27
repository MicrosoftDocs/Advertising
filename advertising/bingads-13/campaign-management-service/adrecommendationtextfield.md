---
title: AdRecommendationTextField Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Reserved.
---
# AdRecommendationTextField Value Set - Campaign Management
Reserved.

## Syntax
```xml
<xs:simpleType name="AdRecommendationTextField" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Headline">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="LongHeadline">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Description">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">3</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="CallToAction">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">4</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AdRecommendationTextField](adrecommendationtextfield.md) value set has the following values: [CallToAction](#calltoaction), [Description](#description), [Headline](#headline), [LongHeadline](#longheadline).

|Value|Description|
|-----------|---------------|
|<a name="calltoaction"></a>CallToAction|Reserved.|
|<a name="description"></a>Description|Reserved.|
|<a name="headline"></a>Headline|Reserved.|
|<a name="longheadline"></a>LongHeadline|Reserved.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AdRecommendationTextAssetProperty](adrecommendationtextassetproperty.md)  
[AdRecommendationTextRefineOperation](adrecommendationtextrefineoperation.md)  
