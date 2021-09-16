---
title: AuctionInsightEntry Data Object - Ad Insight
ms.service: bing-ads-ad-insight-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines an auction insight entry for a domain.
---
# AuctionInsightEntry Data Object - Ad Insight
Defines an auction insight entry for a domain.

## Syntax
```xml
<xs:complexType name="AuctionInsightEntry" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="DisplayDomain" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="AggregatedKpi" nillable="true" type="tns:AuctionInsightKpi" />
    <xs:element minOccurs="0" name="SegmentedKpis" nillable="true" type="tns:ArrayOfAuctionInsightKpi" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [AuctionInsightEntry](auctioninsightentry.md) object has the following elements: [AggregatedKpi](#aggregatedkpi), [DisplayDomain](#displaydomain), [SegmentedKpis](#segmentedkpis).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="aggregatedkpi"></a>AggregatedKpi|The auction insight key performance indicators across all segments for the display domain.<br/><br/>The aggregated data is available whether or not you also requested [SegmentedKpis](#segmentedkpis).|[AuctionInsightKpi](auctioninsightkpi.md)|
|<a name="displaydomain"></a>DisplayDomain|The display URL of another advertiser who participates in the same auctions as you.<br/><br/>The competing websites listed in your auction insights data are those who enter the same auctions as you, and are eligible for the same impressions that you are. Competitors aren't necessarily determined on how similar their keywords, match types, or other targeting settings are to your own, and auction insights doesn't provide a full report on these metrics for other advertisers.|**string**|
|<a name="segmentedkpis"></a>SegmentedKpis|The list of auction insight key performance indicators for each unique combination of the requested segments.<br/><br/>The segmented data is only available when you include an [AuctionSegmentSearchParameter](auctionsegmentsearchparameter.md) object in the [GetAuctionInsightData](getauctioninsightdata.md) request.|[AuctionInsightKpi](auctioninsightkpi.md) array|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[AuctionInsightResult](auctioninsightresult.md)  
