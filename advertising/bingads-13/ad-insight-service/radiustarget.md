---
title: RadiusTarget Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a RadiusTarget data object.
---
# RadiusTarget Data Object - Ad Insight
Defines a RadiusTarget data object.

## Syntax
```xml
<xs:complexType name="RadiusTarget" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Radius" type="xs:int" />
    <xs:element minOccurs="0" name="RadiusUnit" type="tns:RadiusUnit" />
    <xs:element minOccurs="0" name="CenterLatitude" type="xs:double" />
    <xs:element minOccurs="0" name="CenterLongitude" type="xs:double" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [RadiusTarget](radiustarget.md) object has the following elements: [CenterLatitude](#centerlatitude), [CenterLongitude](#centerlongitude), [Radius](#radius), [RadiusUnit](#radiusunit).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="centerlatitude"></a>CenterLatitude|Defines the center latitude.|**double**|
|<a name="centerlongitude"></a>CenterLongitude|DEfines the center longitude.|**double**|
|<a name="radius"></a>Radius|Indicates the desired amount of radius units. |**int**|
|<a name="radiusunit"></a>RadiusUnit|Indicates the radius unit. Supports *Kilometers* or *Miles*.|[RadiusUnit](radiusunit.md)|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetAudienceFullEstimation](getaudiencefullestimation.md)  
