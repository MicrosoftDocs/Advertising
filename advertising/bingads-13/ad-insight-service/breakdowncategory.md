---
title: BreakdownCategory Value Set - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the type of audience breakdown category.
---
# BreakdownCategory Value Set - Ad Insight
Defines the type of audience breakdown category.

## Syntax
```xml
<xs:simpleType name="BreakdownCategory" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="All" />
    <xs:enumeration value="Demographics" />
    <xs:enumeration value="Location" />
    <xs:enumeration value="Interest" />
    <xs:enumeration value="Device" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [BreakdownCategory](breakdowncategory.md) value set has the following values: [All](#all), [Demographics](#demographics), [Device](#device), [Interest](#interest), [Location](#location).

|Value|Description|
|-----------|---------------|
|<a name="all"></a>All|The audience breakdown category type is *All*.|
|<a name="demographics"></a>Demographics|The audience breakdown category type is *Demographics*.|
|<a name="device"></a>Device|The audience breakdown category type is *Device*.|
|<a name="interest"></a>Interest|The audience breakdown category type is *Interest*.|
|<a name="location"></a>Location|The audience breakdown category type is *Location*.|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetAudienceBreakdown](getaudiencebreakdown.md)  
