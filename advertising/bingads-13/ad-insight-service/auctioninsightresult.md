---
title: AuctionInsightResult Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the auction insight results from calling the GetAuctionInsightData operation.
---
# AuctionInsightResult Data Object - Ad Insight
Defines the auction insight results from calling the [GetAuctionInsightData](getauctioninsightdata.md) operation.

# [XML](#tab/xml)

```xml
<xs:complexType name="AuctionInsightResult" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Segments" nillable="true" type="tns:ArrayOfAuctionSegment" />
    <xs:element minOccurs="0" name="Entries" nillable="true" type="tns:ArrayOfAuctionInsightEntry" />
    <xs:element minOccurs="0" name="UsedImpressions" type="xs:double" />
    <xs:element minOccurs="0" name="UsedKeywords" type="xs:double" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Entries": [
    {
      "AggregatedKpi": {
        "AboveRate": DoubleValueHere,
        "AbsoluteTopOfPageRate": DoubleValueHere,
        "AveragePosition": DoubleValueHere,
        "ImpressionShare": DoubleValueHere,
        "OutrankingShare": DoubleValueHere,
        "OverlapRate": DoubleValueHere,
        "Segments": [
          "ValueHere"
        ],
        "TopOfPageRate": DoubleValueHere
      },
      "DisplayDomain": "ValueHere",
      "SegmentedKpis": [
        {
          "AboveRate": DoubleValueHere,
          "AbsoluteTopOfPageRate": DoubleValueHere,
          "AveragePosition": DoubleValueHere,
          "ImpressionShare": DoubleValueHere,
          "OutrankingShare": DoubleValueHere,
          "OverlapRate": DoubleValueHere,
          "Segments": [
            "ValueHere"
          ],
          "TopOfPageRate": DoubleValueHere
        }
      ]
    }
  ],
  "Segments": [
    "ValueHere"
  ],
  "UsedImpressions": DoubleValueHere,
  "UsedKeywords": DoubleValueHere
}
```

-----

## <a name="elements"></a>Elements

The [AuctionInsightResult](auctioninsightresult.md) object has the following elements: [Entries](#entries), [Segments](#segments), [UsedImpressions](#usedimpressions), [UsedKeywords](#usedkeywords).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="entries"></a>Entries|One or more auction insight entries i.e., one result per domain that you competed with in the auction.|[AuctionInsightEntry](auctioninsightentry.md) array|
|<a name="segments"></a>Segments|The segments if any were specified via one or more [AuctionSegmentSearchParameter](auctionsegmentsearchparameter.md) in the [GetAuctionInsightData](getauctioninsightdata.md) request.<br/><br/>The list of auction segments is in the same order as the [AuctionSegment](auctionsegment.md) value set i.e., Day, Week, Month, Quarter, DayOfWeek, and then Device. For example if you requested the Day, Device, and Quarter segments for May 1, 2018, this element will contain a list of three auction segments in the following order: Day, Quarter, and Device.|[AuctionSegment](auctionsegment.md) array|
|<a name="usedimpressions"></a>UsedImpressions|The percent of impressions that were used to generate the auction insight entries.<br/><br/>The value can range from 0 to 1.0, for example 0.8 indicates that 80 percent of impressions were used.|**double**|
|<a name="usedkeywords"></a>UsedKeywords|The number of keywords that were used to generate the auction insight entries.|**double**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetAuctionInsightData](getauctioninsightdata.md)  
