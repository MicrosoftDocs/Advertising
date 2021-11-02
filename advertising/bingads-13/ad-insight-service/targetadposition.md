---
title: TargetAdPosition Value Set - Ad Insight
ms.service: bing-ads-ad-insight-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the possible positions where you can target an ad to appear in the search results.
---
# TargetAdPosition Value Set - Ad Insight
Defines the possible positions where you can target an ad to appear in the search results.

## Syntax
```xml
<xs:simpleType name="TargetAdPosition" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="MainLine1" />
    <xs:enumeration value="MainLine" />
    <xs:enumeration value="FirstPage" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [TargetAdPosition](targetadposition.md) value set has the following values: [FirstPage](#firstpage), [MainLine](#mainline), [MainLine1](#mainline1).

|Value|Description|
|-----------|---------------|
|<a name="firstpage"></a>FirstPage|Target any position on the right side of the search results page.|
|<a name="mainline"></a>MainLine|Target the second, third, and fourth positions at the top of the search results page.|
|<a name="mainline1"></a>MainLine1|Target the first position at the top of the search results page.|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetEstimatedBidByKeywordIds](getestimatedbidbykeywordids.md)  
[GetEstimatedBidByKeywords](getestimatedbidbykeywords.md)  
