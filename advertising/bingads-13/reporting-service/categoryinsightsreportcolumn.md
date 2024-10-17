---
title: CategoryInsightsReportColumn Value Set - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the attributes and performance statistics columns that you can include in the CategoryInsightsReportColumn.
---
# CategoryInsightsReportColumn Value Set - Reporting
Defines the attributes and performance statistics columns that you can include in the CategoryInsightsReportColumn.

## Syntax
```xml
<xs:simpleType name="CategoryInsightsReportColumn" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="L1Vertical" />
    <xs:enumeration value="L2Vertical" />
    <xs:enumeration value="L3Vertical" />
    <xs:enumeration value="WeekStartingMonday" />
    <xs:enumeration value="WoWSearches" />
    <xs:enumeration value="MoMSearches" />
    <xs:enumeration value="YoYLast1WeekSearches" />
    <xs:enumeration value="YoYLast4WeeksSearches" />
    <xs:enumeration value="SearchesIndexed" />
    <xs:enumeration value="SearchesPeekWeek" />
    <xs:enumeration value="WoWClicks" />
    <xs:enumeration value="MoMClicks" />
    <xs:enumeration value="YoYLast1WeekClicks" />
    <xs:enumeration value="ClicksIndexed" />
    <xs:enumeration value="ClicksPeekWeek" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [CategoryInsightsReportColumn](categoryinsightsreportcolumn.md) value set has the following values: [ClicksIndexed](#clicksindexed), [ClicksPeekWeek](#clickspeekweek), [L1Vertical](#l1vertical), [L2Vertical](#l2vertical), [L3Vertical](#l3vertical), [MoMClicks](#momclicks), [MoMSearches](#momsearches), [SearchesIndexed](#searchesindexed), [SearchesPeekWeek](#searchespeekweek), [WeekStartingMonday](#weekstartingmonday), [WoWClicks](#wowclicks), [WoWSearches](#wowsearches), [YoYLast1WeekClicks](#yoylast1weekclicks), [YoYLast1WeekSearches](#yoylast1weeksearches), [YoYLast4WeeksSearches](#yoylast4weekssearches).

|Value|Description|
|-----------|---------------|
|<a name="clicksindexed"></a>ClicksIndexed|Reserved.|
|<a name="clickspeekweek"></a>ClicksPeekWeek|Reserved.|
|<a name="l1vertical"></a>L1Vertical|Reserved.|
|<a name="l2vertical"></a>L2Vertical|Reserved.|
|<a name="l3vertical"></a>L3Vertical|Reserved.|
|<a name="momclicks"></a>MoMClicks|Reserved.|
|<a name="momsearches"></a>MoMSearches|Reserved.|
|<a name="searchesindexed"></a>SearchesIndexed|Reserved.|
|<a name="searchespeekweek"></a>SearchesPeekWeek|Reserved.|
|<a name="weekstartingmonday"></a>WeekStartingMonday|Reserved.|
|<a name="wowclicks"></a>WoWClicks|Reserved.|
|<a name="wowsearches"></a>WoWSearches|Reserved.|
|<a name="yoylast1weekclicks"></a>YoYLast1WeekClicks|Reserved.|
|<a name="yoylast1weeksearches"></a>YoYLast1WeekSearches|Reserved.|
|<a name="yoylast4weekssearches"></a>YoYLast4WeeksSearches|Reserved.|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[CategoryInsightsReportRequest](categoryinsightsreportrequest.md)  
