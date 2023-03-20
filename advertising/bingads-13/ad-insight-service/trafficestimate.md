---
title: TrafficEstimate Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines an object that contains traffic estimates based on the campaign, ad group, and keyword criteria you specified when calling GetKeywordTrafficEstimates.
---
# TrafficEstimate Data Object - Ad Insight
Defines an object that contains traffic estimates based on the campaign, ad group, and keyword criteria you specified when calling [GetKeywordTrafficEstimates](getkeywordtrafficestimates.md).

## Syntax
```xml
<xs:complexType name="TrafficEstimate" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AverageCpc" type="xs:double" />
    <xs:element minOccurs="0" name="AveragePosition" type="xs:double" />
    <xs:element minOccurs="0" name="Clicks" type="xs:double" />
    <xs:element minOccurs="0" name="Ctr" type="xs:double" />
    <xs:element minOccurs="0" name="Impressions" type="xs:double" />
    <xs:element minOccurs="0" name="TotalCost" type="xs:double" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [TrafficEstimate](trafficestimate.md) object has the following elements: [AverageCpc](#averagecpc), [AveragePosition](#averageposition), [Clicks](#clicks), [Ctr](#ctr), [Impressions](#impressions), [TotalCost](#totalcost).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="averagecpc"></a>AverageCpc|The estimated average CPC.<br/><br/>The formula used to calculate the average CPC is (total cost / clicks).|**double**|
|<a name="averageposition"></a>AveragePosition|The estimated average position on the web page for ads that were delivered.<br/><br/>Average position is deprecated and from March 31st, 2021 onwards this value is "0" (zero).|**double**|
|<a name="clicks"></a>Clicks|The estimated number of clicks per week.|**double**|
|<a name="ctr"></a>Ctr|The estimated CTR.<br/><br/>The formula used to calculate the CTR is (clicks / impressions) &#42; 100.|**double**|
|<a name="impressions"></a>Impressions|The estimated number of impressions per week.|**double**|
|<a name="totalcost"></a>TotalCost|The estimated total cost per week.|**double**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[KeywordEstimate](keywordestimate.md)  
