---
title: DecimalRoundedResult Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a DecimalRoundedResult data object.
---
# DecimalRoundedResult Data Object - Ad Insight
Defines a DecimalRoundedResult data object.

## Syntax
```xml
<xs:complexType name="DecimalRoundedResult" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Value" nillable="true" type="xs:double" />
    <xs:element minOccurs="0" name="Unit" nillable="true" type="tns:ScaleUnit" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [DecimalRoundedResult](decimalroundedresult.md) object has the following elements: [Unit](#unit), [Value](#value).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="unit"></a>Unit|The scale unit: *Thousand*, *Million*,*Billion*, *None*. Output only.|[ScaleUnit](scaleunit.md)|
|<a name="value"></a>Value|The rounded value to the nearest scale unit. Output only.|**double**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetAudienceFullEstimation](getaudiencefullestimation.md)  
[RangeResultOfDecimalRoundedResult](rangeresultofdecimalroundedresult.md)  
