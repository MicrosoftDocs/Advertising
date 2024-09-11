---
title: RadiusUnit Value Set Test - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a value set for the RadiusUnit.(test)
---
# RadiusUnit Value Set Test - Ad Insight
Defines a value set for the RadiusUnit.
---

## Syntax
```xml
<xs:simpleType name="RadiusUnit" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Miles" />
    <xs:enumeration value="Kilometers" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [RadiusUnit](radiusunit.md) value set has the following values: [Kilometers](#kilometers), [Miles](#miles).

|Value|Description|
|-----------|---------------|
|<a name="kilometers"></a>Kilometers|Measure the radius in kilometers.|
|<a name="miles"></a>Miles|Measure the radius in miles.|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[RadiusTarget](radiustarget.md)  
