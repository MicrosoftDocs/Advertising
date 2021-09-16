---
title: AuctionInsightKpiAdditionalField Value Set - Ad Insight
ms.service: bing-ads-ad-insight-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines a list of optional auction insight KPI properties that you can request when calling GetAuctionInsightData.
---
# AuctionInsightKpiAdditionalField Value Set - Ad Insight
Defines a list of optional auction insight KPI properties that you can request when calling [GetAuctionInsightData](getauctioninsightdata.md). The additional field values enable you to get the latest features using the current version of Ad Insight API, and in the next version the corresponding properties will be included in the auction insight KPI object by default. 

## Syntax
```xml
<xs:simpleType name="AuctionInsightKpiAdditionalField" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="AbsoluteTopOfPageRate" />
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AuctionInsightKpiAdditionalField](auctioninsightkpiadditionalfield.md) value set has the following values: [AbsoluteTopOfPageRate](#absolutetopofpagerate).

|Value|Description|
|-----------|---------------|
|<a name="absolutetopofpagerate"></a>AbsoluteTopOfPageRate|Request that the [AbsoluteTopOfPageRate](auctioninsightkpi.md#absolutetopofpagerate) element be included within each returned [AuctionInsightKpi](auctioninsightkpi.md) object.|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetAuctionInsightData](getauctioninsightdata.md)  
