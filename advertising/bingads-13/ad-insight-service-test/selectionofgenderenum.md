---
title: SelectionOfGenderEnum Data Object Test - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a data object for the selection of gender targeting.(test)
---
# SelectionOfGenderEnum Data Object Test - Ad Insight
Defines a data object for the selection of gender targeting.

# [XML](#tab/xml)

```xml
<xs:complexType name="SelectionOfGenderEnum" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:annotation>
    <xs:appinfo>
      <GenericType Name="SelectionOf{0}" Namespace="https://bingads.microsoft.com/AdInsight/v13" xmlns="http://schemas.microsoft.com/2003/10/Serialization/">
        <GenericParameter Name="GenderEnum" Namespace="https://bingads.microsoft.com/AdInsight/v13" />
      </GenericType>
    </xs:appinfo>
  </xs:annotation>
  <xs:sequence>
    <xs:element minOccurs="0" name="Includes" nillable="true" type="tns:ArrayOfGenderEnum" />
    <xs:element minOccurs="0" name="Excludes" nillable="true" type="tns:ArrayOfGenderEnum" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Excludes": [
    "ValueHere"
  ],
  "Includes": [
    "ValueHere"
  ]
}
```

-----

## <a name="elements"></a>Elements

The [SelectionOfGenderEnum](selectionofgenderenum.md) object has the following elements: [Excludes](#excludes), [Includes](#includes).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="excludes"></a>Excludes|The traffic matching any value of *Excludes* array is excluded as an estimation.|[GenderEnum](genderenum.md) array|
|<a name="includes"></a>Includes|The traffic matching any value of *Includes* array is included as an estimation.|[GenderEnum](genderenum.md) array|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetAudienceFullEstimation](getaudiencefullestimation.md)  
