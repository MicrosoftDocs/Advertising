---
title: KeywordLocation Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an object that contains the location, network, device, and the percentage of time that a user entered a search query.
---
# KeywordLocation Data Object - Ad Insight
Defines an object that contains the location, network, device, and the percentage of time that a user entered a search query.

## Syntax
```xml
<xs:complexType name="KeywordLocation" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Device" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Location" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Percentage" type="xs:double" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [KeywordLocation](keywordlocation.md) object has the following elements: [Device](#device), [Location](#location), [Percentage](#percentage).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="device"></a>Device|The device of the user who entered the search query.|**string**|
|<a name="location"></a>Location|The country, state, metropolitan area, or city where users entered the search query.|**string**|
|<a name="percentage"></a>Percentage|The percentage of time that users searched for the keyword from the location. The value is specified in the range 0.0 through 100.0.|**double**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[KeywordLocationResult](keywordlocationresult.md)  
