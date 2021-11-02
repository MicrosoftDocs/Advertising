---
title: KeywordStatusReportFilter Value Set - Reporting
ms.service: bing-ads-reporting-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the keyword status values that you can use to filter the report data.
---
# KeywordStatusReportFilter Value Set - Reporting
Defines the keyword status values that you can use to filter the report data. These values are also used as column values in reports that include keyword status, such as the keyword performance report.

## Syntax
```xml
<xs:simpleType name="KeywordStatusReportFilter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="Active" />
        <xs:enumeration value="Paused" />
        <xs:enumeration value="Deleted" />
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [KeywordStatusReportFilter](keywordstatusreportfilter.md) value set has the following values: [Active](#active), [Deleted](#deleted), [Paused](#paused).

|Value|Description|
|-----------|---------------|
|<a name="active"></a>Active|The report will contain keywords that are active.|
|<a name="deleted"></a>Deleted|The report will contain keywords that have been deleted.|
|<a name="paused"></a>Paused|The report will contain keywords that are paused.|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[AdDynamicTextPerformanceReportFilter](addynamictextperformancereportfilter.md)  
[AdExtensionByKeywordReportFilter](adextensionbykeywordreportfilter.md)  
[ConversionPerformanceReportFilter](conversionperformancereportfilter.md)  
[GoalsAndFunnelsReportFilter](goalsandfunnelsreportfilter.md)  
[KeywordPerformanceReportFilter](keywordperformancereportfilter.md)  
[NegativeKeywordConflictReportFilter](negativekeywordconflictreportfilter.md)  
[SearchQueryPerformanceReportFilter](searchqueryperformancereportfilter.md)  
[ShareOfVoiceReportFilter](shareofvoicereportfilter.md)  
