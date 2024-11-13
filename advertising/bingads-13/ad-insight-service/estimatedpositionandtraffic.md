---
title: EstimatedPositionAndTraffic Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines an object that contains the estimated search results position and estimated keyword statistics such as clicks, average cost per click (CPC), impressions, click-through rate (CTR), and total cost for the specified keyword given the specified bid.
---
# EstimatedPositionAndTraffic Data Object - Ad Insight
Defines an object that contains the estimated search results position and estimated keyword statistics such as clicks, average cost per click (CPC), impressions, click-through rate (CTR), and total cost for the specified keyword given the specified bid.

> [!NOTE]
> The estimates are not a prediction or guarantee of future performance.

# [XML](#tab/xml)

```xml
<xs:complexType name="EstimatedPositionAndTraffic" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="MatchType" type="tns:MatchType" />
    <xs:element minOccurs="0" name="MinClicksPerWeek" type="xs:double" />
    <xs:element minOccurs="0" name="MaxClicksPerWeek" type="xs:double" />
    <xs:element minOccurs="0" name="AverageCPC" type="xs:double" />
    <xs:element minOccurs="0" name="MinImpressionsPerWeek" type="xs:long" />
    <xs:element minOccurs="0" name="MaxImpressionsPerWeek" type="xs:long" />
    <xs:element minOccurs="0" name="CTR" type="xs:double" />
    <xs:element minOccurs="0" name="MinTotalCostPerWeek" type="xs:double" />
    <xs:element minOccurs="0" name="MaxTotalCostPerWeek" type="xs:double" />
    <xs:element minOccurs="0" name="CurrencyCode" type="tns:CurrencyCode" />
    <xs:element minOccurs="0" name="EstimatedAdPosition" type="xs:double" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AverageCPC": DoubleValueHere,
  "CTR": DoubleValueHere,
  "CurrencyCode": "ValueHere",
  "EstimatedAdPosition": DoubleValueHere,
  "MatchType": "ValueHere",
  "MaxClicksPerWeek": DoubleValueHere,
  "MaxImpressionsPerWeek": "LongValueHere",
  "MaxTotalCostPerWeek": DoubleValueHere,
  "MinClicksPerWeek": DoubleValueHere,
  "MinImpressionsPerWeek": "LongValueHere",
  "MinTotalCostPerWeek": DoubleValueHere
}
```

-----

## <a name="elements"></a>Elements

The [EstimatedPositionAndTraffic](estimatedpositionandtraffic.md) object has the following elements: [AverageCPC](#averagecpc), [CTR](#ctr), [CurrencyCode](#currencycode), [EstimatedAdPosition](#estimatedadposition), [MatchType](#matchtype), [MaxClicksPerWeek](#maxclicksperweek), [MaxImpressionsPerWeek](#maximpressionsperweek), [MaxTotalCostPerWeek](#maxtotalcostperweek), [MinClicksPerWeek](#minclicksperweek), [MinImpressionsPerWeek](#minimpressionsperweek), [MinTotalCostPerWeek](#mintotalcostperweek).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="averagecpc"></a>AverageCPC|The estimated average CPC.<br/><br/>The formula used to calculate the average CPC is (maximum total cost / maximum number of clicks).|**double**|
|<a name="ctr"></a>CTR|The estimated CTR.<br/><br/>The formula used to calculate the CTR is (maximum number of clicks / maximum number of impressions) &#42; 100.|**double**|
|<a name="currencycode"></a>CurrencyCode|The ISO code for the monetary unit of the cost values such as AverageCPC.|[CurrencyCode](currencycode.md)|
|<a name="estimatedadposition"></a>EstimatedAdPosition|The position in the search results given the specified bid.<br/><br/>This element is deprecated as of March 31st, 2021 and '0' (zero) is returned going forward.|**double**|
|<a name="matchtype"></a>MatchType|The keyword match type used to determine the estimates.|[MatchType](matchtype.md)|
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
[KeywordEstimatedPosition](keywordestimatedposition.md)  
