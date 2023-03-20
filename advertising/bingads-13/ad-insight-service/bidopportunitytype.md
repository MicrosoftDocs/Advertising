---
title: BidOpportunityType Value Set - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the possible bid opportunity types you can request when calling GetBidOpportunities.
---
# BidOpportunityType Value Set - Ad Insight
Defines the possible bid opportunity types you can request when calling [GetBidOpportunities](getbidopportunities.md).

## Syntax
```xml
<xs:simpleType name="BidOpportunityType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="FirstPage" />
        <xs:enumeration value="MainLine" />
        <xs:enumeration value="MainLine1" />
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [BidOpportunityType](bidopportunitytype.md) value set has the following values: [FirstPage](#firstpage), [MainLine](#mainline), [MainLine1](#mainline1).

|Value|Description|
|-----------|---------------|
|<a name="firstpage"></a>FirstPage|The bid opportunity may lead to ads shown in one of the first page positions of search results.|
|<a name="mainline"></a>MainLine|The bid opportunity may lead to ads shown in one of the mainline positions of search results.|
|<a name="mainline1"></a>MainLine1|The bid opportunity may lead to ads shown in the first mainline position of search results.|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetBidOpportunities](getbidopportunities.md)  
