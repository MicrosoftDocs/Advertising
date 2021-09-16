---
title: HistoricalSearchCountPeriodic Data Object - Ad Insight
ms.service: bing-ads-ad-insight-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines an object that contains the number of times that the keyword was used in a search query during the specified time period.
---
# HistoricalSearchCountPeriodic Data Object - Ad Insight
Defines an object that contains the number of times that the keyword was used in a search query during the specified time period.

## Syntax
```xml
<xs:complexType name="HistoricalSearchCountPeriodic" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="SearchCount" type="xs:long" />
    <xs:element minOccurs="0" name="DayMonthAndYear" nillable="true" type="tns:DayMonthAndYear" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [HistoricalSearchCountPeriodic](historicalsearchcountperiodic.md) object has the following elements: [DayMonthAndYear](#daymonthandyear), [SearchCount](#searchcount).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="daymonthandyear"></a>DayMonthAndYear|The time period in which the count was captured. The type of aggregation (daily, weekly, or monthly) that you specify in the request determines the length of the time period. For example, if you specified weekly aggregation, the time period is a week and the date is the Sunday of the week when the count was captured.|[DayMonthAndYear](daymonthandyear.md)|
|<a name="searchcount"></a>SearchCount|The number of times that the keyword was used in a search query on the specified device type during the time period. The count aggregates data from all specified countries.|**long**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[SearchCountsByAttributes](searchcountsbyattributes.md)  
