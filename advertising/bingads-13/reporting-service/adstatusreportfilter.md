---
title: AdStatusReportFilter Value Set - Reporting
ms.service: bing-ads-reporting-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines the ad status values that you can use to filter the report data.
---
# AdStatusReportFilter Value Set - Reporting
Defines the ad status values that you can use to filter the report data. These values are also used as column values in reports that include ad status, such as the search query performance report.

## Syntax
```xml
<xs:simpleType name="AdStatusReportFilter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="Active" />
        <xs:enumeration value="Rejected" />
        <xs:enumeration value="Deleted" />
        <xs:enumeration value="Pending" />
        <xs:enumeration value="Paused" />
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AdStatusReportFilter](adstatusreportfilter.md) value set has the following values: [Active](#active), [Deleted](#deleted), [Paused](#paused), [Pending](#pending), [Rejected](#rejected).

|Value|Description|
|-----------|---------------|
|<a name="active"></a>Active|The report will contain ads that are active.|
|<a name="deleted"></a>Deleted|The report will contain ads that have been deleted.|
|<a name="paused"></a>Paused|The report will contain ads that are paused.|
|<a name="pending"></a>Pending|The report will contain ads that are pending editorial review.|
|<a name="rejected"></a>Rejected|The report will contain ads that have failed editorial review.|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[AdDynamicTextPerformanceReportFilter](addynamictextperformancereportfilter.md)  
[AdExtensionByAdReportFilter](adextensionbyadreportfilter.md)  
[AdExtensionDetailReportFilter](adextensiondetailreportfilter.md)  
[AdPerformanceReportFilter](adperformancereportfilter.md)  
[DestinationUrlPerformanceReportFilter](destinationurlperformancereportfilter.md)  
[DSACategoryPerformanceReportFilter](dsacategoryperformancereportfilter.md)  
[DSASearchQueryPerformanceReportFilter](dsasearchqueryperformancereportfilter.md)  
[ProductDimensionPerformanceReportFilter](productdimensionperformancereportfilter.md)  
[ProductPartitionPerformanceReportFilter](productpartitionperformancereportfilter.md)  
[ProductPartitionUnitPerformanceReportFilter](productpartitionunitperformancereportfilter.md)  
[ProductSearchQueryPerformanceReportFilter](productsearchqueryperformancereportfilter.md)  
[SearchQueryPerformanceReportFilter](searchqueryperformancereportfilter.md)  
