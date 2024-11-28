---
title: AuctionSegmentSearchParameter Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines an auction segment search parameter.
---
# AuctionSegmentSearchParameter Data Object - Ad Insight
Defines an auction segment search parameter.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="AuctionSegmentSearchParameter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:SearchParameter">
      <xs:sequence>
        <xs:element minOccurs="0" name="Segment" type="tns:AuctionSegment" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "AuctionSegmentSearchParameter",
  "Segment": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [AuctionSegmentSearchParameter](auctionsegmentsearchparameter.md) object has the following elements: [Segment](#segment).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="segment"></a>Segment|Determines how you want the [SegmentedKpis](auctioninsightentry.md#segmentedkpis) data segmented in the result from the [GetAuctionInsightData](getauctioninsightdata.md) operation.<br/><br/>You can request auction insight data segmented by Day, DayOfWeek, Device, Month, Quarter, and Week.|[AuctionSegment](auctionsegment.md)|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

