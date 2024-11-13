---
title: KeywordEstimate Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: A suggested keyword with minimum and maximum traffic estimates.
---
# KeywordEstimate Data Object - Ad Insight
A suggested keyword with minimum and maximum traffic estimates. Traffic estimates include average CPC, average position, clicks, CTR, impressions, and total cost.

> [!NOTE]
> The estimates are not a prediction or guarantee of future performance. The estimates can vary depending on the filter criteria you provide in the [GetKeywordTrafficEstimates](getkeywordtrafficestimates.md) service request.

# [XML](#tab/xml)

```xml
<xs:complexType name="KeywordEstimate" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Keyword" nillable="true" type="tns:Keyword" />
    <xs:element minOccurs="0" name="Maximum" nillable="true" type="tns:TrafficEstimate" />
    <xs:element minOccurs="0" name="Minimum" nillable="true" type="tns:TrafficEstimate" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Keyword": {
    "Id": "LongValueHere",
    "MatchType": "ValueHere",
    "Text": "ValueHere"
  },
  "Maximum": {
    "AverageCpc": DoubleValueHere,
    "AveragePosition": DoubleValueHere,
    "Clicks": DoubleValueHere,
    "Ctr": DoubleValueHere,
    "Impressions": DoubleValueHere,
    "TotalCost": DoubleValueHere
  },
  "Minimum": {
    "AverageCpc": DoubleValueHere,
    "AveragePosition": DoubleValueHere,
    "Clicks": DoubleValueHere,
    "Ctr": DoubleValueHere,
    "Impressions": DoubleValueHere,
    "TotalCost": DoubleValueHere
  }
}
```

-----

## <a name="elements"></a>Elements

The [KeywordEstimate](keywordestimate.md) object has the following elements: [Keyword](#keyword), [Maximum](#maximum), [Minimum](#minimum).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="keyword"></a>Keyword|The suggested keyword.|[Keyword](keyword.md)|
|<a name="maximum"></a>Maximum|The maximum traffic estimate.<br/><br/>Traffic estimates include average CPC, average position, clicks, CTR, impressions, and total cost.|[TrafficEstimate](trafficestimate.md)|
|<a name="minimum"></a>Minimum|The minimum traffic estimate.<br/><br/>Traffic estimates include average CPC, average position, clicks, CTR, impressions, and total cost.|[TrafficEstimate](trafficestimate.md)|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[AdGroupEstimate](adgroupestimate.md)  
