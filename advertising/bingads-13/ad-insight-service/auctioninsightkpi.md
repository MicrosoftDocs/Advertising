---
title: AuctionInsightKpi Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an auction insight key performance indicator.
---
# AuctionInsightKpi Data Object - Ad Insight
Defines an auction insight key performance indicator.

## Syntax
```xml
<xs:complexType name="AuctionInsightKpi" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element xmlns:q23="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="Segments" nillable="true" type="q23:ArrayOfstring" />
    <xs:element minOccurs="0" name="ImpressionShare" type="xs:double" />
    <xs:element minOccurs="0" name="OverlapRate" type="xs:double" />
    <xs:element minOccurs="0" name="AveragePosition" type="xs:double" />
    <xs:element minOccurs="0" name="AboveRate" type="xs:double" />
    <xs:element minOccurs="0" name="TopOfPageRate" type="xs:double" />
    <xs:element minOccurs="0" name="OutrankingShare" type="xs:double" />
    <xs:element minOccurs="0" name="AbsoluteTopOfPageRate" type="xs:double">
      <xs:annotation>
        <xs:appinfo>
          <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
        </xs:appinfo>
      </xs:annotation>
    </xs:element>
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [AuctionInsightKpi](auctioninsightkpi.md) object has the following elements: [AboveRate](#aboverate), [AbsoluteTopOfPageRate](#absolutetopofpagerate), [AveragePosition](#averageposition), [ImpressionShare](#impressionshare), [OutrankingShare](#outrankingshare), [OverlapRate](#overlaprate), [Segments](#segments), [TopOfPageRate](#topofpagerate).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="aboverate"></a>AboveRate|The percentage of time competitors' ads showed up higher than your ads on the search results page. If the rate is high then the other advertiser is getting more desirable ad positions than you. A high rate is likely due to a poor quality score or a low bid.|**double**|
|<a name="absolutetopofpagerate"></a>AbsoluteTopOfPageRate|The number of times an ad is shown as the very first ad above the organic search results, divided by the total number of impressions it actually received.<br/><br/>Ads at the absolute top of the page tend to receive more clicks.<br/><br/>This element is not returned by default. To get this element, include the AbsoluteTopOfPageRate value in the ReturnAdditionalFields element when you call the [GetAuctionInsightData](getauctioninsightdata.md#returnadditionalfields) service operation.|**double**|
|<a name="averageposition"></a>AveragePosition|The average position on the web page for ads that were delivered. Although it varies, positions 1-4 appear at the top of the search results page and positions 5-10 appear in other locations (for example, the bottom or the sidebar). Use this to compare your ad position with the average rank of all ads in the auction.<br/><br/>Average position is deprecated and from March 31st, 2021 onwards this value is "0" (zero).|**double**|
|<a name="impressionshare"></a>ImpressionShare|The number of times an ad is shown on the Microsoft Advertising Network divided by the total available impressions. Use this to compare your share of impressions to the impression share of advertisers competing against you.|**double**|
|<a name="outrankingshare"></a>OutrankingShare|The percentage of time your ad showed up higher on the search results pages than your competitors or your ad showed when theirs did not. If the rate is high, you are getting a more desirable ad position than other advertisers.|**double**|
|<a name="overlaprate"></a>OverlapRate|The percentage of time competitors' ads showed up on the search results page when your ad was shown. If the rate is high then this advertiser is a competitor since their ads shows up on the same search results page as yours.|**double**|
|<a name="segments"></a>Segments|The list of strings identifies a distinct combination of requested segments.<br/><br/>The list of segment values is in the same order as the [AuctionSegment](auctionsegment.md) value set i.e., Day, Week, Month, Quarter, DayOfWeek, and then Device. For example if you requested the Day, Device, and Quarter segments for May 1, 2018, this element will contain a list of three strings in the following order: *5/1/2018* (Day), *4/1/2018* (Quarter), and *PC* (Device).<br/><br/>This element is only applicable for the [SegmentedKpis](auctioninsightentry.md#segmentedkpis) of an [AuctionInsightEntry](auctioninsightentry.md). This element is nil and not applicable for the [AggregatedKpi](auctioninsightentry.md#aggregatedkpi) of an [AuctionInsightEntry](auctioninsightentry.md).|**string** array|
|<a name="topofpagerate"></a>TopOfPageRate|The percentage of time your ad showed up in the mainline, the premium ad position above the organic search results. Ads at the top of the page tend to receive more clicks.|**double**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[AuctionInsightEntry](auctioninsightentry.md)  
