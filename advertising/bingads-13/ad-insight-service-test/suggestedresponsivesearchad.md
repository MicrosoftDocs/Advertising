---
title: SuggestedResponsiveSearchAd Data Object Test - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an object that describes the suggested responsive search ads.(test)
---
# SuggestedResponsiveSearchAd Data Object Test - Ad Insight
Defines an object that describes the suggested responsive search ads.

# [XML](#tab/xml)

```xml
<xs:complexType name="SuggestedResponsiveSearchAd" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element xmlns:q27="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="Descriptions" nillable="true" type="q27:ArrayOfstring" />
    <xs:element minOccurs="0" name="FinalUrl" nillable="true" type="xs:string" />
    <xs:element xmlns:q28="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="Headlines" nillable="true" type="q28:ArrayOfstring" />
    <xs:element minOccurs="0" name="Path1" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Path2" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Descriptions": [
    "ValueHere"
  ],
  "FinalUrl": "ValueHere",
  "Headlines": [
    "ValueHere"
  ],
  "Path1": "ValueHere",
  "Path2": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [SuggestedResponsiveSearchAd](suggestedresponsivesearchad.md) object has the following elements: [Descriptions](#descriptions), [FinalUrl](#finalurl), [Headlines](#headlines), [Path1](#path1), [Path2](#path2).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="descriptions"></a>Descriptions|The list of descriptions of suggested ad with 2-4 descriptions. |**string** array|
|<a name="finalurl"></a>FinalUrl|The landing page URL. |**string**|
|<a name="headlines"></a>Headlines|The list of titles of suggested ads with 3-15 headlines. |**string** array|
|<a name="path1"></a>Path1|The first part of the optional path that will be appended to the domain portion of your display URL.   |**string**|
|<a name="path2"></a>Path2|The second part of the optional path that will be appended to the domain portion of your display URL.   |**string**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[ResponsiveSearchAdAssetRecommendation](responsivesearchadassetrecommendation.md)  
[ResponsiveSearchAdRecommendation](responsivesearchadrecommendation.md)  
[ResponsiveSearchAdsRecommendation](responsivesearchadsrecommendation.md)  
