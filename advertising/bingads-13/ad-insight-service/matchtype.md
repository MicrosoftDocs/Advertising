---
title: MatchType Value Set - Ad Insight
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the possible keyword match type values.
ms.subservice: ad-insight-api
---
# MatchType Value Set - Ad Insight
Defines the possible keyword match type values.

## Syntax
```xml
<xs:simpleType name="MatchType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Exact" />
    <xs:enumeration value="Phrase" />
    <xs:enumeration value="Broad" />
    <xs:enumeration value="Aggregate" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [MatchType](matchtype.md) value set has the following values: [Aggregate](#aggregate), [Broad](#broad), [Exact](#exact), [Phrase](#phrase).

|Value|Description|
|-----------|---------------|
|<a name="aggregate"></a>Aggregate|Aggregates the data across all match types.|
|<a name="broad"></a>Broad|A broad match results when words in the keyword are present in the user's search query; however, the word order can vary.|
|<a name="exact"></a>Exact|An exact match results when all of the words in the keyword exactly match the user's search query.|
|<a name="phrase"></a>Phrase|A phrase match results when all of the words in the keyword are present in the user's search query and are in the same order.|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[EstimatedBidAndTraffic](estimatedbidandtraffic.md)  
[EstimatedPositionAndTraffic](estimatedpositionandtraffic.md)  
[GetEstimatedPositionByKeywords](getestimatedpositionbykeywords.md)  
[GetHistoricalKeywordPerformance](gethistoricalkeywordperformance.md)  
[Keyword](keyword.md)  
[KeywordAndMatchType](keywordandmatchtype.md)  
[KeywordKPI](keywordkpi.md)  
[NegativeKeyword](negativekeyword.md)  
