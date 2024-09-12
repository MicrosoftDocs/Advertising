---
title: Keyword Data Object Test - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a keyword with match type.(test)
---
# Keyword Data Object Test - Ad Insight
Defines a keyword with match type.

# [XML](#tab/xml)

```xml
<xs:complexType name="Keyword" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="MatchType" type="tns:MatchType" />
    <xs:element minOccurs="0" name="Text" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Id": "LongValueHere",
  "MatchType": "ValueHere",
  "Text": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [Keyword](keyword.md) object has the following elements: [Id](#id), [MatchType](#matchtype), [Text](#text).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="id"></a>Id|The Microsoft Advertising identifier of the keyword.|**long**|
|<a name="matchtype"></a>MatchType|The match type of the keyword.|[MatchType](matchtype.md)|
|<a name="text"></a>Text|The keyword text.|**string**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[IdeaTextSearchParameter](ideatextsearchparameter.md)  
[KeywordEstimate](keywordestimate.md)  
[KeywordEstimator](keywordestimator.md)  
