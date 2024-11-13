---
title: RecommendationInfo Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the base object of RecommendationInfo.
---
# RecommendationInfo Data Object - Ad Insight
Defines the base object of RecommendationInfo. The [RSARecommendationInfo](rsarecommendationinfo.md) object derives from it.  

## Syntax
```xml
<xs:complexType name="RecommendationInfo" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="RecommendationHash" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="RecommendationId" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [RecommendationInfo](recommendationinfo.md) object has the following elements: [RecommendationHash](#recommendationhash), [RecommendationId](#recommendationid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="recommendationhash"></a>RecommendationHash|The hash of the recommendation. It is required.|**string**|
|<a name="recommendationid"></a>RecommendationId|The identifier of the recommendation. It is required. |**string**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[TagRecommendations](tagrecommendations.md)  
