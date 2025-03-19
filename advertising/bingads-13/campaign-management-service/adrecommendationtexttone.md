---
title: AdRecommendationTextTone Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: A value set for the optional tone for recommended text assets.
---
# AdRecommendationTextTone Value Set - Campaign Management
A value set for the optional tone for recommended text assets.

## Syntax
```xml
<xs:simpleType name="AdRecommendationTextTone" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Friendly">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Persuasive">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Cute">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">3</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Inspiring">
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

The [AdRecommendationTextTone](adrecommendationtexttone.md) value set has the following values: [Cute](#cute), [Friendly](#friendly), [Inspiring](#inspiring), [Persuasive](#persuasive).

|Value|Description|
|-----------|---------------|
|<a name="cute"></a>Cute|The text tone is *cute*.|
|<a name="friendly"></a>Friendly|The text tone is *friendly*.|
|<a name="inspiring"></a>Inspiring|The text tone is *inspiring*.|
|<a name="persuasive"></a>Persuasive|The text tone is *persuasive*.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AdRecommendationTextRefineOperation](adrecommendationtextrefineoperation.md)  
[CreateAssetGroupRecommendation](createassetgrouprecommendation.md)  
[CreateResponsiveAdRecommendation](createresponsiveadrecommendation.md)  
[CreateResponsiveSearchAdRecommendation](createresponsivesearchadrecommendation.md)  
