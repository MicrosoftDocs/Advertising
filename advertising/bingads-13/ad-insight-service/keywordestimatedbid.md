---
title: KeywordEstimatedBid Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines an object that contains the keyword and the estimated bid value for each match type.
---
# KeywordEstimatedBid Data Object - Ad Insight
Defines an object that contains the keyword and the estimated bid value for each match type.

> [!NOTE]
> The estimates are not a prediction or guarantee of future performance.

# [XML](#tab/xml)

```xml
<xs:complexType name="KeywordEstimatedBid" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Keyword" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="EstimatedBids" nillable="true" type="tns:ArrayOfEstimatedBidAndTraffic" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "EstimatedBids": [
    {
      "AverageCPC": DoubleValueHere,
      "CTR": DoubleValueHere,
      "CurrencyCode": "ValueHere",
      "EstimatedMinBid": DoubleValueHere,
      "MatchType": "ValueHere",
      "MaxClicksPerWeek": DoubleValueHere,
      "MaxImpressionsPerWeek": "LongValueHere",
      "MaxTotalCostPerWeek": DoubleValueHere,
      "MinClicksPerWeek": DoubleValueHere,
      "MinImpressionsPerWeek": "LongValueHere",
      "MinTotalCostPerWeek": DoubleValueHere
    }
  ],
  "Keyword": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [KeywordEstimatedBid](keywordestimatedbid.md) object has the following elements: [EstimatedBids](#estimatedbids), [Keyword](#keyword).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="estimatedbids"></a>EstimatedBids|A list of [EstimatedBidAndTraffic](estimatedbidandtraffic.md) data objects that contains the suggested bid value for the keyword and match type. If there is data available for the keyword, the [EstimatedBidAndTraffic](estimatedbidandtraffic.md) object will provide an estimated bid value. Otherwise, if no data is available the *EstimatedBids* element will be null.<br/><br/>Each object also contains estimates of clicks, average cost per click (CPC), impressions, click-through rate (CTR), and total cost given the suggested bid.<br/><br/>If there is no data available for a match type, the array will not include estimates for the match type.<br/><br/>Some returned elements of the [EstimatedBidAndTraffic](estimatedbidandtraffic.md) may be NULL.|[EstimatedBidAndTraffic](estimatedbidandtraffic.md) array|
|<a name="keyword"></a>Keyword|The keyword to which the estimates apply.|**string**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetEstimatedBidByKeywords](getestimatedbidbykeywords.md)  
[KeywordIdEstimatedBid](keywordidestimatedbid.md)  
