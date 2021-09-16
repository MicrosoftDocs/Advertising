---
title: BroadMatchSearchQueryKPI Data Object - Ad Insight
ms.service: bing-ads-ad-insight-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines an object that contains search query statistics of including broad match type keyword bids.
---
# BroadMatchSearchQueryKPI Data Object - Ad Insight
Defines an object that contains search query statistics of including broad match type keyword bids.

## Syntax
```xml
<xs:complexType name="BroadMatchSearchQueryKPI" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AverageCTR" type="xs:double" />
    <xs:element minOccurs="0" name="Clicks" type="xs:double" />
    <xs:element minOccurs="0" name="Impressions" type="xs:long" />
    <xs:element minOccurs="0" name="SRPV" type="xs:long" />
    <xs:element minOccurs="0" name="SearchQuery" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [BroadMatchSearchQueryKPI](broadmatchsearchquerykpi.md) object has the following elements: [AverageCTR](#averagectr), [Clicks](#clicks), [Impressions](#impressions), [SearchQuery](#searchquery), [SRPV](#srpv).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="averagectr"></a>AverageCTR|The average CTR for the search query.|**double**|
|<a name="clicks"></a>Clicks|The clicks for the search query.|**double**|
|<a name="impressions"></a>Impressions|The impressions for the search query.|**long**|
|<a name="searchquery"></a>SearchQuery|The search query corresponding to the keyword.|**string**|
|<a name="srpv"></a>SRPV|The SRPV for the search query.|**long**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[BroadMatchKeywordOpportunity](broadmatchkeywordopportunity.md)  
