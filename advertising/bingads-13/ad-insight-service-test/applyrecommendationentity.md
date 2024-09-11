---
title: ApplyRecommendationEntity Data Object Test - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Apply a recommendation.(test)
---
# ApplyRecommendationEntity Data Object Test - Ad Insight
Apply a recommendation.

# [XML](#tab/xml)

```xml
<xs:complexType name="ApplyRecommendationEntity" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="RecommendationId" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="RecommendationType" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "RecommendationId": "ValueHere",
  "RecommendationType": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [ApplyRecommendationEntity](applyrecommendationentity.md) object has the following elements: [RecommendationId](#recommendationid), [RecommendationType](#recommendationtype).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="recommendationid"></a>RecommendationId|The identifier of the recommendation. Required.|**string**|
|<a name="recommendationtype"></a>RecommendationType|The type of recommendation: CAMPAIGN_BUDGET, KEYWORD or RESPONSIVE_SEARCH_AD. Required. |**string**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[ApplyRecommendations](applyrecommendations.md)  
