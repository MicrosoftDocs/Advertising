---
title: TimeInterval Value Set - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the possible time periods that determine the pool of data that the service uses to get the performance statistics of a keyword.
---
# TimeInterval Value Set - Ad Insight
Defines the possible time periods that determine the pool of data that the service uses to get the performance statistics of a keyword.

## Syntax
```xml
<xs:simpleType name="TimeInterval" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="LastMonth" />
    <xs:enumeration value="LastWeek" />
    <xs:enumeration value="LastDay" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [TimeInterval](timeinterval.md) value set has the following values: [LastDay](#lastday), [LastMonth](#lastmonth), [LastWeek](#lastweek).

|Value|Description|
|-----------|---------------|
|<a name="lastday"></a>LastDay|Use data from yesterday. If data from yesterday is not yet available, data from the most recently completed day is provided. Note that it can take up to 72 hours for the most recent day's data to be available.|
|<a name="lastmonth"></a>LastMonth|Use data from the previous calendar month. Note that it can take up to 72 hours for the previous calendar month's data to be available. For example, if you request data on August 1st, 2nd or 3rd, and July's data is not ready, the response will be based on June's data.|
|<a name="lastweek"></a>LastWeek|Use data from last week, Sunday through Saturday. The data is refreshed every Sunday. Note that it can take up to 72 hours for the previous week's data to be available. For example, if you request data on the 4th Monday of the month, and data for the 3rd Sunday through 3rd Saturday is not ready, the response will be based on data for the 2nd Sunday through 2nd Saturday.|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetHistoricalKeywordPerformance](gethistoricalkeywordperformance.md)  
