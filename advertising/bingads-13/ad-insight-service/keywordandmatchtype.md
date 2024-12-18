---
title: KeywordAndMatchType Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines an object that contains a keyword and corresponding match types.
---
# KeywordAndMatchType Data Object - Ad Insight
Defines an object that contains a keyword and corresponding match types.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="KeywordAndMatchType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="KeywordText" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="MatchTypes" nillable="true" type="tns:ArrayOfMatchType" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "KeywordText": "ValueHere",
  "MatchTypes": [
    "ValueHere"
  ]
}
```

-----

## <a name="elements"></a>Elements

The [KeywordAndMatchType](keywordandmatchtype.md) object has the following elements: [KeywordText](#keywordtext), [MatchTypes](#matchtypes).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="keywordtext"></a>KeywordText|The keyword text.|**string**|
|<a name="matchtypes"></a>MatchTypes|The corresponding match types for the keyword.|[MatchType](matchtype.md) array|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetEstimatedBidByKeywords](getestimatedbidbykeywords.md)  
