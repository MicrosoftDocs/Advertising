---
title: ParameterType Value Set Test - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the type of parameter such as string, URL, or a list of demand entities.(test)
---
# ParameterType Value Set Test - Ad Insight
Defines the type of parameter such as string, URL, or a list of demand entities.

## Syntax
```xml
<xs:simpleType name="ParameterType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Text">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Url">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Entities">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">3</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [ParameterType](parametertype.md) value set has the following values: [Entities](#entities), [Text](#text), [Url](#url).

|Value|Description|
|-----------|---------------|
|<a name="entities"></a>Entities|Indicates the parameter is a list of demand entities.|
|<a name="text"></a>Text|Indicates the parameter is a string.|
|<a name="url"></a>Url|Indicate the parameter is a URL.|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[PerformanceInsightsMessageParameter](performanceinsightsmessageparameter.md)  
