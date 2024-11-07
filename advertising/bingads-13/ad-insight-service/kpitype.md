---
title: KPIType Value Set - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the type of key performance indicator.
---
# KPIType Value Set - Ad Insight
Defines the type of key performance indicator. At the account level, we support *impression*, *click*, *spend*, and *conversion*. At the campaign level, we support *impression*, *click*, and *spend*.

## Syntax
```xml
<xs:simpleType name="KPIType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Impression">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Click">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Spend">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">3</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Conversion">
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

The [KPIType](kpitype.md) value set has the following values: [Click](#click), [Conversion](#conversion), [Impression](#impression), [Spend](#spend).

|Value|Description|
|-----------|---------------|
|<a name="click"></a>Click|Click metrics.|
|<a name="conversion"></a>Conversion|Conversion metrics.|
|<a name="impression"></a>Impression|Impression metrics.|
|<a name="spend"></a>Spend|Spend metrics.|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[PerformanceInsightsDetail](performanceinsightsdetail.md)  
