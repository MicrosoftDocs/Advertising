---
title: LocationInfo Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the location info data object.
---
# LocationInfo Data Object - Ad Insight
Defines the location info data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="LocationInfo" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Name" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Name": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [LocationInfo](locationinfo.md) object has the following elements: [Name](#name).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="name"></a>Name|The name of the location breakdown.|**string**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[LocationBreakdown](locationbreakdown.md)  
