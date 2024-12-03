---
title: RangeResultOfDecimalRoundedResult Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a RangeResultOfDecimalRoundedResult data object.
---
# RangeResultOfDecimalRoundedResult Data Object - Ad Insight
Defines a RangeResultOfDecimalRoundedResult data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="RangeResultOfDecimalRoundedResult" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:annotation>
    <xs:appinfo>
      <GenericType Name="RangeResultOf{0}" Namespace="https://bingads.microsoft.com/AdInsight/v13" xmlns="http://schemas.microsoft.com/2003/10/Serialization/">
        <GenericParameter Name="DecimalRoundedResult" Namespace="https://bingads.microsoft.com/AdInsight/v13" />
      </GenericType>
    </xs:appinfo>
  </xs:annotation>
  <xs:sequence>
    <xs:element minOccurs="0" name="High" nillable="true" type="tns:DecimalRoundedResult" />
    <xs:element minOccurs="0" name="Low" nillable="true" type="tns:DecimalRoundedResult" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "High": {
    "Unit": "ValueHere",
    "Value": DoubleValueHere
  },
  "Low": {
    "Unit": "ValueHere",
    "Value": DoubleValueHere
  }
}
```

-----

## <a name="elements"></a>Elements

The [RangeResultOfDecimalRoundedResult](rangeresultofdecimalroundedresult.md) object has the following elements: [High](#high), [Low](#low).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="high"></a>High|Indicates the upper bound of range result.|[DecimalRoundedResult](decimalroundedresult.md)|
|<a name="low"></a>Low|Indicates the lower bound of range result.|[DecimalRoundedResult](decimalroundedresult.md)|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetAudienceFullEstimation](getaudiencefullestimation.md)  
