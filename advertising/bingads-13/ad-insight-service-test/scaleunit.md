---
title: ScaleUnit Value Set Test - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Reserved.(test)
---
# ScaleUnit Value Set Test - Ad Insight
Reserved.

## Syntax
```xml
<xs:simpleType name="ScaleUnit" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Billion" />
    <xs:enumeration value="Million" />
    <xs:enumeration value="Thousand" />
    <xs:enumeration value="None" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [ScaleUnit](scaleunit.md) value set has the following values: [Billion](#billion), [Million](#million), [None](#none), [Thousand](#thousand).

|Value|Description|
|-----------|---------------|
|<a name="billion"></a>Billion|Reserved.|
|<a name="million"></a>Million|Reserved.|
|<a name="none"></a>None|Reserved.|
|<a name="thousand"></a>Thousand|Reserved.|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[DecimalRoundedResult](decimalroundedresult.md)  
