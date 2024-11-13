---
title: GenderEnum Value Set - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a value set for gender.
---
# GenderEnum Value Set - Ad Insight
Defines a value set for gender.

## Syntax
```xml
<xs:simpleType name="GenderEnum" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Unknown" />
    <xs:enumeration value="Male" />
    <xs:enumeration value="Female" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [GenderEnum](genderenum.md) value set has the following values: [Female](#female), [Male](#male), [Unknown](#unknown).

|Value|Description|
|-----------|---------------|
|<a name="female"></a>Female|The gender is female.|
|<a name="male"></a>Male|The gender is male.|
|<a name="unknown"></a>Unknown|The gender is unknown.|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[SelectionOfGenderEnum](selectionofgenderenum.md)  
