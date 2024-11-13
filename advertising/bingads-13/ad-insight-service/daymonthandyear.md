---
title: DayMonthAndYear Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines an object that you use to specify the start and end dates of a date range.
---
# DayMonthAndYear Data Object - Ad Insight
Defines an object that you use to specify the start and end dates of a date range.

# [XML](#tab/xml)

```xml
<xs:complexType name="DayMonthAndYear" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Day" type="xs:int" />
    <xs:element minOccurs="0" name="Month" type="xs:int" />
    <xs:element minOccurs="0" name="Year" type="xs:int" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Day": IntValueHere,
  "Month": IntValueHere,
  "Year": IntValueHere
}
```

-----

## <a name="elements"></a>Elements

The [DayMonthAndYear](daymonthandyear.md) object has the following elements: [Day](#day), [Month](#month), [Year](#year).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="day"></a>Day|The day of the month.|**int**|
|<a name="month"></a>Month|The month specified as an integer value in the range of 1 through 12, where 1 is January and 12 is December.|**int**|
|<a name="year"></a>Year|The year specified as a four-digit integer value.|**int**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[AdGroupBidLandscape](adgroupbidlandscape.md)  
[DateRangeSearchParameter](daterangesearchparameter.md)  
[GetHistoricalSearchCount](gethistoricalsearchcount.md)  
[GetPerformanceInsightsDetailDataByAccountId](getperformanceinsightsdetaildatabyaccountid.md)  
[HistoricalSearchCountPeriodic](historicalsearchcountperiodic.md)  
[KeywordBidLandscape](keywordbidlandscape.md)  
[PerformanceInsightsDetail](performanceinsightsdetail.md)  
