---
title: KeywordKPI Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a key performance index object for a keyword.
---
# KeywordKPI Data Object - Ad Insight
Defines a key performance index object for a keyword. The object contains the historical performance statistics of the keyword for the corresponding match type, ad position, device, and network.

## Syntax
```xml
<xs:complexType name="KeywordKPI" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Device" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="MatchType" type="tns:MatchType" />
    <xs:element minOccurs="0" name="AdPosition" type="tns:AdPosition" />
    <xs:element minOccurs="0" name="Clicks" type="xs:int" />
    <xs:element minOccurs="0" name="Impressions" type="xs:long" />
    <xs:element minOccurs="0" name="AverageCPC" type="xs:double" />
    <xs:element minOccurs="0" name="CTR" type="xs:double" />
    <xs:element minOccurs="0" name="TotalCost" type="xs:double" />
    <xs:element minOccurs="0" name="AverageBid" type="xs:double" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [KeywordKPI](keywordkpi.md) object has the following elements: [AdPosition](#adposition), [AverageBid](#averagebid), [AverageCPC](#averagecpc), [Clicks](#clicks), [CTR](#ctr), [Device](#device), [Impressions](#impressions), [MatchType](#matchtype), [TotalCost](#totalcost).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="adposition"></a>AdPosition|The position in the search results in which the ad appeared.|[AdPosition](adposition.md)|
|<a name="averagebid"></a>AverageBid|The average bid of the keyword.|**double**|
|<a name="averagecpc"></a>AverageCPC|The average cost per click (CPC). The average CPC is calculated by dividing the cost of all clicks by the number of clicks.|**double**|
|<a name="clicks"></a>Clicks|The number of clicks that the keyword and match type generated during the specified time interval.|**int**|
|<a name="ctr"></a>CTR|The click-through rate (CTR) as a percentage. The CTR is calculated by dividing the number of clicks by the number of impressions and multiplying the result by 100.|**double**|
|<a name="device"></a>Device|The device where the ad appeared.|**string**|
|<a name="impressions"></a>Impressions|The number of impressions that the keyword and match type generated during the specified time interval.|**long**|
|<a name="matchtype"></a>MatchType|The match type that you specified in the request.|[MatchType](matchtype.md)|
|<a name="totalcost"></a>TotalCost|The cost of using the specified keyword and match type during the specified time interval.<br/><br/>The service determines the currency from the account specified in the *CustomerAccountId* header element. If *CustomerAccountId* is not set, the service uses *USDollar*.|**double**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[KeywordHistoricalPerformance](keywordhistoricalperformance.md)  
