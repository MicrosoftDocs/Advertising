---
title: ReportTimePeriod Value Set - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the predefined time and date range values for a report request.
---
# ReportTimePeriod Value Set - Reporting
Defines the predefined time and date range values for a report request.

## Syntax
```xml
<xs:simpleType name="ReportTimePeriod" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Today" />
    <xs:enumeration value="Yesterday" />
    <xs:enumeration value="LastSevenDays" />
    <xs:enumeration value="ThisWeek" />
    <xs:enumeration value="LastWeek" />
    <xs:enumeration value="Last14Days" />
    <xs:enumeration value="Last30Days" />
    <xs:enumeration value="LastFourWeeks" />
    <xs:enumeration value="ThisMonth" />
    <xs:enumeration value="LastMonth" />
    <xs:enumeration value="LastThreeMonths" />
    <xs:enumeration value="LastSixMonths" />
    <xs:enumeration value="ThisYear" />
    <xs:enumeration value="LastYear" />
    <xs:enumeration value="ThisWeekStartingMonday" />
    <xs:enumeration value="LastWeekStartingMonday" />
    <xs:enumeration value="LastFourWeeksStartingMonday" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [ReportTimePeriod](reporttimeperiod.md) value set has the following values: [Last14Days](#last14days), [Last30Days](#last30days), [LastFourWeeks](#lastfourweeks), [LastFourWeeksStartingMonday](#lastfourweeksstartingmonday), [LastMonth](#lastmonth), [LastSevenDays](#lastsevendays), [LastSixMonths](#lastsixmonths), [LastThreeMonths](#lastthreemonths), [LastWeek](#lastweek), [LastWeekStartingMonday](#lastweekstartingmonday), [LastYear](#lastyear), [ThisMonth](#thismonth), [ThisWeek](#thisweek), [ThisWeekStartingMonday](#thisweekstartingmonday), [ThisYear](#thisyear), [Today](#today), [Yesterday](#yesterday).

|Value|Description|
|-----------|---------------|
|<a name="last14days"></a>Last14Days|A cumulative report for the previous 14 days.|
|<a name="last30days"></a>Last30Days|A cumulative report for the previous 30 days.|
|<a name="lastfourweeks"></a>LastFourWeeks|A cumulative report for the previous four weeks that run from Sunday through Saturday.|
|<a name="lastfourweeksstartingmonday"></a>LastFourWeeksStartingMonday|A cumulative report for the previous four weeks that run from Monday through Sunday.|
|<a name="lastmonth"></a>LastMonth|A cumulative report for the previous calendar month.|
|<a name="lastsevendays"></a>LastSevenDays|A cumulative report for the previous seven days.|
|<a name="lastsixmonths"></a>LastSixMonths|A cumulative report for the previous six calendar months.|
|<a name="lastthreemonths"></a>LastThreeMonths|A cumulative report for the previous three calendar months.|
|<a name="lastweek"></a>LastWeek|A cumulative report for the previous week that runs from Sunday through Saturday.|
|<a name="lastweekstartingmonday"></a>LastWeekStartingMonday|A cumulative report for the previous week that runs from Monday through Sunday.|
|<a name="lastyear"></a>LastYear|A cumulative report for the previous calendar year.|
|<a name="thismonth"></a>ThisMonth|A cumulative report for the current calendar month.|
|<a name="thisweek"></a>ThisWeek|A cumulative report for the current week that runs from Sunday through Saturday.|
|<a name="thisweekstartingmonday"></a>ThisWeekStartingMonday|A cumulative report for the current week that runs from Monday through Sunday.|
|<a name="thisyear"></a>ThisYear|A cumulative report for the current calendar year.|
|<a name="today"></a>Today|A cumulative report for the current day.|
|<a name="yesterday"></a>Yesterday|A cumulative report for the previous day.|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[ReportTime](reporttime.md)  
