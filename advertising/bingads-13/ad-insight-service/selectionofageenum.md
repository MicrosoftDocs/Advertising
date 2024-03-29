---
title: SelectionOfAgeEnum Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Reserved.
---
# SelectionOfAgeEnum Data Object - Ad Insight
Reserved.

## Syntax
```xml
<xs:complexType name="SelectionOfAgeEnum" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:annotation>
    <xs:appinfo>
      <GenericType Name="SelectionOf{0}" Namespace="https://bingads.microsoft.com/AdInsight/v13" xmlns="http://schemas.microsoft.com/2003/10/Serialization/">
        <GenericParameter Name="AgeEnum" Namespace="https://bingads.microsoft.com/AdInsight/v13" />
      </GenericType>
    </xs:appinfo>
  </xs:annotation>
  <xs:sequence>
    <xs:element minOccurs="0" name="Includes" nillable="true" type="tns:ArrayOfAgeEnum" />
    <xs:element minOccurs="0" name="Excludes" nillable="true" type="tns:ArrayOfAgeEnum" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [SelectionOfAgeEnum](selectionofageenum.md) object has the following elements: [Excludes](#excludes), [Includes](#includes).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="excludes"></a>Excludes|Reserved.|[AgeEnum](ageenum.md) array|
|<a name="includes"></a>Includes|Reserved.|[AgeEnum](ageenum.md) array|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetAudienceFullEstimation](getaudiencefullestimation.md)  