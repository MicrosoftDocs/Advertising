---
title: AuctionSegment Value Set - Ad Insight
ms.service: bing-ads-ad-insight-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the possible auction segment values.
---
# AuctionSegment Value Set - Ad Insight
Defines the possible auction segment values.

## Syntax
```xml
<xs:simpleType name="AuctionSegment" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Day">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">10</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Week">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">20</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Month">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">30</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Quarter">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">40</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="DayOfWeek">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">60</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Device">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">70</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AuctionSegment](auctionsegment.md) value set has the following values: [Day](#day), [DayOfWeek](#dayofweek), [Device](#device), [Month](#month), [Quarter](#quarter), [Week](#week).

|Value|Description|
|-----------|---------------|
|<a name="day"></a>Day|The auction insight data is segmented by day.|
|<a name="dayofweek"></a>DayOfWeek|The auction insight data is segmented by day of week.|
|<a name="device"></a>Device|The auction insight data is segmented by device.|
|<a name="month"></a>Month|The auction insight data is segmented by month.|
|<a name="quarter"></a>Quarter|The auction insight data is segmented by quarter.|
|<a name="week"></a>Week|The auction insight data is segmented by week.|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[AuctionInsightResult](auctioninsightresult.md)  
[AuctionSegmentSearchParameter](auctionsegmentsearchparameter.md)  
