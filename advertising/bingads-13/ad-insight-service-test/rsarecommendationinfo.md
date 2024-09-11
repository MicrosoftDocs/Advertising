---
title: RSARecommendationInfo Data Object Test - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an object that contains the info of responsive search ads recommendation.(test)
---
# RSARecommendationInfo Data Object Test - Ad Insight
Defines an object that contains the info of responsive search ads recommendation.  

# [XML](#tab/xml)

```xml
<xs:complexType name="RSARecommendationInfo" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:RecommendationInfo">
      <xs:sequence>
        <xs:element minOccurs="0" name="AdId" nillable="true" type="xs:long" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "RecommendationHash": "ValueHere",
  "RecommendationId": "ValueHere",
  "Type": "RSARecommendationInfo",
  "AdId": "LongValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [RSARecommendationInfo](rsarecommendationinfo.md) object has the following elements: [AdId](#adid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="adid"></a>AdId|Ad id of the responsive search ad that is created by adopting the recommendation. Optional.<br/><br/>It is required when you try to tag a recommendation as applied.  |**long**|

The [RSARecommendationInfo](rsarecommendationinfo.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsrecommendationinfo"></a>Inherited Elements from RecommendationInfo
The [RSARecommendationInfo](rsarecommendationinfo.md) object derives from the [RecommendationInfo](recommendationinfo.md) object, and inherits the following elements: [RecommendationHash](#recommendationhash), [RecommendationId](#recommendationid). The descriptions below are specific to [RSARecommendationInfo](rsarecommendationinfo.md), and might not apply to other objects that inherit the same elements from the [RecommendationInfo](recommendationinfo.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="recommendationhash"></a>RecommendationHash|The hash of the recommendation. It is required. |**string**|
|<a name="recommendationid"></a>RecommendationId|The identifier of the recommendation. It is required. |**string**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

