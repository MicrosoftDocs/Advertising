---
title: EstimatedBidAndTraffic Data Object - Ad Insight
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines an object that contains estimates of clicks, average cost per click (CPC), impressions, click-through rate (CTR), and total cost for the corresponding keyword or ad group given the suggested bid.
ms.subservice: ad-insight-api
---
# EstimatedBidAndTraffic Data Object - Ad Insight
Defines an object that contains estimates of clicks, average cost per click (CPC), impressions, click-through rate (CTR), and total cost for the corresponding keyword or ad group given the suggested bid.

> [!NOTE]
> The estimates are not a prediction or guarantee of future performance.

## Syntax
```xml
<xs:complexType name="EstimatedBidAndTraffic" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="MinClicksPerWeek" nillable="true" type="xs:double" />
    <xs:element minOccurs="0" name="MaxClicksPerWeek" nillable="true" type="xs:double" />
    <xs:element minOccurs="0" name="AverageCPC" nillable="true" type="xs:double" />
    <xs:element minOccurs="0" name="MinImpressionsPerWeek" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="MaxImpressionsPerWeek" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="CTR" nillable="true" type="xs:double" />
    <xs:element minOccurs="0" name="MinTotalCostPerWeek" nillable="true" type="xs:double" />
    <xs:element minOccurs="0" name="MaxTotalCostPerWeek" nillable="true" type="xs:double" />
    <xs:element minOccurs="0" name="CurrencyCode" type="tns:CurrencyCode" />
    <xs:element minOccurs="0" name="MatchType" type="tns:MatchType" />
    <xs:element minOccurs="0" name="EstimatedMinBid" type="xs:double" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [EstimatedBidAndTraffic](estimatedbidandtraffic.md) object has the following elements: [AverageCPC](#averagecpc), [CTR](#ctr), [CurrencyCode](#currencycode), [EstimatedMinBid](#estimatedminbid), [MatchType](#matchtype), [MaxClicksPerWeek](#maxclicksperweek), [MaxImpressionsPerWeek](#maximpressionsperweek), [MaxTotalCostPerWeek](#maxtotalcostperweek), [MinClicksPerWeek](#minclicksperweek), [MinImpressionsPerWeek](#minimpressionsperweek), [MinTotalCostPerWeek](#mintotalcostperweek).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="averagecpc"></a>AverageCPC|The estimated average CPC.<br/><br/>The formula used to calculate the average CPC is (maximum total cost / maximum number of clicks).|**double**|
|<a name="ctr"></a>CTR|The estimated CTR.<br/><br/>The formula used to calculate the CTR is (maximum number of clicks / maximum number of impressions) &#42; 100.|**double**|
|<a name="currencycode"></a>CurrencyCode|The ISO code for the monetary unit of the cost estimates and suggested bid value.|[CurrencyCode](currencycode.md)|
|<a name="estimatedminbid"></a>EstimatedMinBid|The suggested bid value.|**double**|
|<a name="matchtype"></a>MatchType|The match type used to determine the estimates.|[MatchType](matchtype.md)|
|<a name="maxclicksperweek"></a>MaxClicksPerWeek|The estimated maximum number of clicks per week.|**double**|
|<a name="maximpressionsperweek"></a>MaxImpressionsPerWeek|The estimated maximum number of impressions per week.|**long**|
|<a name="maxtotalcostperweek"></a>MaxTotalCostPerWeek|The estimated maximum cost per week.|**double**|
|<a name="minclicksperweek"></a>MinClicksPerWeek|The estimated minimum number of clicks per week.|**double**|
|<a name="minimpressionsperweek"></a>MinImpressionsPerWeek|The estimated minimum number of impressions per week.|**long**|
|<a name="mintotalcostperweek"></a>MinTotalCostPerWeek|The estimated minimum cost per week.|**double**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetEstimatedBidByKeywords](getestimatedbidbykeywords.md)  
[KeywordEstimatedBid](keywordestimatedbid.md)  
