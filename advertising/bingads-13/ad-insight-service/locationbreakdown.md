---
title: LocationBreakdown Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the location breakdown data object.
---
# LocationBreakdown Data Object - Ad Insight
Defines the location breakdown data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="LocationBreakdown" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Breakdown">
      <xs:sequence>
        <xs:element minOccurs="0" name="Info" nillable="true" type="tns:ArrayOfLocationInfo" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "GlobalValues": [
    IntValueHere
  ],
  "Keys": [
    "ValueHere"
  ],
  "Values": [
    IntValueHere
  ],
  "Type": "LocationBreakdown",
  "Info": [
    {
      "Name": "ValueHere"
    }
  ]
}
```

-----

## <a name="elements"></a>Elements

The [LocationBreakdown](locationbreakdown.md) object has the following elements: [Info](#info).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="info"></a>Info|The location information about a location breakdown.|[LocationInfo](locationinfo.md) array|

The [LocationBreakdown](locationbreakdown.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsbreakdown"></a>Inherited Elements from Breakdown
The [LocationBreakdown](locationbreakdown.md) object derives from the [Breakdown](breakdown.md) object, and inherits the following elements: [GlobalValues](#globalvalues), [Keys](#keys), [Values](#values). The descriptions below are specific to [LocationBreakdown](locationbreakdown.md), and might not apply to other objects that inherit the same elements from the [Breakdown](breakdown.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="globalvalues"></a>GlobalValues|A list of location breakdown global values.|**int** array|
|<a name="keys"></a>Keys|A list of location breakdown keys.|**string** array|
|<a name="values"></a>Values|A list of location breakdown values.|**int** array|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[Breakdowns](breakdowns.md)  
