---
title: Breakdown Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines an object for a specific audience breakdown category.
---
# Breakdown Data Object - Ad Insight
Defines an object for a specific audience breakdown category.

## Syntax
```xml
<xs:complexType name="Breakdown" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element xmlns:q34="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="Keys" nillable="true" type="q34:ArrayOfstring" />
    <xs:element xmlns:q35="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="Values" nillable="true" type="q35:ArrayOfint" />
    <xs:element xmlns:q36="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="GlobalValues" nillable="true" type="q36:ArrayOfint" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [Breakdown](breakdown.md) object has the following elements: [GlobalValues](#globalvalues), [Keys](#keys), [Values](#values).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="globalvalues"></a>GlobalValues|The audiance breakdown global values.|**int** array|
|<a name="keys"></a>Keys|The audience breakdown keys.|**string** array|
|<a name="values"></a>Values|The audience breakdown values.|**int** array|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[Breakdowns](breakdowns.md)  
