---
title: AdRecommendationVideoType Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: The ad recommendation video type data object.
---
# AdRecommendationVideoType Value Set - Campaign Management
The ad recommendation video type data object.

## Syntax
```xml
<xs:simpleType name="AdRecommendationVideoType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="OLV">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="CTV">
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

The [AdRecommendationVideoType](adrecommendationvideotype.md) value set has the following values: [CTV](#ctv), [OLV](#olv).

|Value|Description|
|-----------|---------------|
|<a name="ctv"></a>CTV|The video type is *CTV*.|
|<a name="olv"></a>OLV|The video type is *OLV*.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[CreateResponsiveAdRecommendation](createresponsiveadrecommendation.md)  
