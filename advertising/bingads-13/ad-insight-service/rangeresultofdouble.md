---
title: RangeResultOfdouble Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a RangeResultOfDouble data object.
---
# RangeResultOfdouble Data Object - Ad Insight
Defines a RangeResultOfDouble data object.

# [XML](#tab/xml)

```xml
<xs:complexType name="RangeResultOfdouble" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:annotation>
    <xs:appinfo>
      <GenericType Name="RangeResultOf{0}" Namespace="https://bingads.microsoft.com/AdInsight/v13" xmlns="http://schemas.microsoft.com/2003/10/Serialization/">
        <GenericParameter Name="double" Namespace="http://www.w3.org/2001/XMLSchema" />
      </GenericType>
    </xs:appinfo>
  </xs:annotation>
  <xs:sequence>
    <xs:element minOccurs="0" name="High" type="xs:double" />
    <xs:element minOccurs="0" name="Low" type="xs:double" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "High": DoubleValueHere,
  "Low": DoubleValueHere
}
```

-----

## <a name="elements"></a>Elements

The [RangeResultOfdouble](rangeresultofdouble.md) object has the following elements: [High](#high), [Low](#low).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="high"></a>High|Indicates the upper bound of range result.|**double**|
|<a name="low"></a>Low|Indicates the lower bound of range result.|**double**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetAudienceFullEstimation](getaudiencefullestimation.md)  
