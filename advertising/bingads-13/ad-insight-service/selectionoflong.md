---
title: SelectionOflong Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a data object for the selection segment IDs.
---
# SelectionOflong Data Object - Ad Insight
Defines a data object for the selection segment IDs.

## Syntax
```xml
<xs:complexType name="SelectionOflong" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:annotation>
    <xs:appinfo>
      <GenericType Name="SelectionOf{0}" Namespace="https://bingads.microsoft.com/AdInsight/v13" xmlns="http://schemas.microsoft.com/2003/10/Serialization/">
        <GenericParameter Name="long" Namespace="http://www.w3.org/2001/XMLSchema" />
      </GenericType>
    </xs:appinfo>
  </xs:annotation>
  <xs:sequence>
    <xs:element xmlns:q32="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="Includes" nillable="true" type="q32:ArrayOflong" />
    <xs:element xmlns:q33="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="Excludes" nillable="true" type="q33:ArrayOflong" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [SelectionOflong](selectionoflong.md) object has the following elements: [Excludes](#excludes), [Includes](#includes).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="excludes"></a>Excludes|The traffic matching any value of *Excludes* array is excluded as an estimation.|**long** array|
|<a name="includes"></a>Includes|The traffic matching any value of *Includes* array is included as an estimation.|**long** array|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetAudienceFullEstimation](getaudiencefullestimation.md)  
