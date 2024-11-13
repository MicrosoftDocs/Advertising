---
title: EntityType Value Set - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the entity types for retrieving auction insights.
---
# EntityType Value Set - Ad Insight
Defines the entity types for retrieving auction insights.

## Syntax
```xml
<xs:simpleType name="EntityType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Account">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Campaign">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="AdGroup">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">3</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Keyword">
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

The [EntityType](entitytype.md) value set has the following values: [Account](#account), [AdGroup](#adgroup), [Campaign](#campaign), [Keyword](#keyword).

|Value|Description|
|-----------|---------------|
|<a name="account"></a>Account|Request account level auction insight data.|
|<a name="adgroup"></a>AdGroup|Request ad group level auction insight data.|
|<a name="campaign"></a>Campaign|Request campaign level auction insight data.|
|<a name="keyword"></a>Keyword|Request keyword level auction insight data.|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetAuctionInsightData](getauctioninsightdata.md)  
[GetPerformanceInsightsDetailDataByAccountId](getperformanceinsightsdetaildatabyaccountid.md)  
[PerformanceInsightsDetail](performanceinsightsdetail.md)  
