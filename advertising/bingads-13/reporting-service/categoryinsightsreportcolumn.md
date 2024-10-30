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
    <xs:enumeration value="SearchesPeakWeek" />
    <xs:enumeration value="WoWClicks" />
    <xs:enumeration value="MoMClicks" />
    <xs:enumeration value="YoYLast1WeekClicks" />
    <xs:enumeration value="ClicksIndexed" />
    <xs:enumeration value="ClicksPeakWeek" />
    <xs:enumeration value="YoYLast4WeeksClicks" />
    <xs:enumeration value="Country" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [CategoryInsightsReportColumn](categoryinsightsreportcolumn.md) value set has the following values: [ClicksIndexed](#clicksindexed), [ClicksPeakWeek](#clickspeakweek), [Country](#country), [L1Vertical](#l1vertical), [L2Vertical](#l2vertical), [L3Vertical](#l3vertical), [MoMClicks](#momclicks), [MoMSearches](#momsearches), [SearchesIndexed](#searchesindexed), [SearchesPeakWeek](#searchespeakweek), [WeekStartingMonday](#weekstartingmonday), [WoWClicks](#wowclicks), [WoWSearches](#wowsearches), [YoYLast1WeekClicks](#yoylast1weekclicks), [YoYLast1WeekSearches](#yoylast1weeksearches), [YoYLast4WeeksClicks](#yoylast4weeksclicks), [YoYLast4WeeksSearches](#yoylast4weekssearches).

|Value|Description|
|-----------|---------------|
|<a name="clicksindexed"></a>ClicksIndexed|The number of indexed clicks.|
|<a name="clickspeakweek"></a>ClicksPeakWeek|Peak week represents the week with the highest click volume within your selected date range. We display the percentage by which this week's click volume exceeds the average volume across the entire date range.|
|<a name="country"></a>Country|The country-specific Bing marketplace, such as Bing France or Bing India.|
|<a name="l1vertical"></a>L1Vertical|A particular supply sector, such as Travel and Tourism or Apparel.<br/><br/>[View a list of L1 verticals](../guides/reporting-verticals.md#l1verticals).|
|<a name="l2vertical"></a>L2Vertical|A more detailed segment of an L1 vertical. For instance, within the L1 vertical travel and tourism, L2 verticals might include Accommodations or Air travel.<br/><br/>[View a list of L2 verticals](../guides/reporting-verticals.md#l2verticals).|
|<a name="l3vertical"></a>L3Vertical|The most specific segment within a larger L1 vertical. For example, if the L1 vertical is travel and tourism and the L2 vertical is Accommodations, an L3 vertical might be Bed and Breakfasts or Camping and RV.<br/><br/>[View a list of L3 verticals](../guides/reporting-verticals.md#l3verticals).|
|<a name="momclicks"></a>MoMClicks|The change in click volume from the last four-week period to the current four-week period.|
|<a name="momsearches"></a>MoMSearches|The change in search volume from the last four-week period to the current four-week period.|
|<a name="searchesindexed"></a>SearchesIndexed|The number of indexed searches.|
|<a name="searchespeakweek"></a>SearchesPeakWeek|Peak week represents the week with the highest search volume within your selected date range. We display the percentage by which this week's search volume exceeds the average volume across the entire date range.|
|<a name="weekstartingmonday"></a>WeekStartingMonday|The date range for the week that your data is from starting with Monday.|
|<a name="wowclicks"></a>WoWClicks|The change in click volume from last week to this week.|
|<a name="wowsearches"></a>WoWSearches|The change in search volume from last week to this week.|
|<a name="yoylast1weekclicks"></a>YoYLast1WeekClicks|The change in click volume between this week and the same week last year.|
|<a name="yoylast1weeksearches"></a>YoYLast1WeekSearches|The change in search volume between this week and the same week last year.|
|<a name="yoylast4weeksclicks"></a>YoYLast4WeeksClicks|The change in click volume between the current four weeks and the same four-week period last year.|
|<a name="yoylast4weekssearches"></a>YoYLast4WeeksSearches|The change in search volume between the current four weeks and the same four-week period last year.|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[CategoryInsightsReportRequest](categoryinsightsreportrequest.md)  
