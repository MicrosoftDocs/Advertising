---
title: AssetGroupStatusReportFilter Value Set - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the asset group status values that you can use to filter the report data.
---
# AssetGroupStatusReportFilter Value Set - Reporting
Defines the asset group status values that you can use to filter the report data. These values are also used as column values in reports that include asset group status, such as the asset group performance report.

## Syntax
```xml
<xs:simpleType name="AssetGroupStatusReportFilter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
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

The [AssetGroupStatusReportFilter](assetgroupstatusreportfilter.md) value set has the following values: [Active](#active), [Deleted](#deleted), [Paused](#paused).

|Value|Description|
|-----------|---------------|
|<a name="active"></a>Active|The report will contain asset groups that are active.|
|<a name="deleted"></a>Deleted|The report will contain asset groups that are deleted.|
|<a name="paused"></a>Paused|The report will contain asset groups that are paused.|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[GeographicPerformanceReportFilter](geographicperformancereportfilter.md)  
[ProductDimensionPerformanceReportFilter](productdimensionperformancereportfilter.md)  
[ProductNegativeKeywordConflictReportFilter](productnegativekeywordconflictreportfilter.md)  
[ProductPartitionPerformanceReportFilter](productpartitionperformancereportfilter.md)  
[ProductPartitionUnitPerformanceReportFilter](productpartitionunitperformancereportfilter.md)  
[ProductSearchQueryPerformanceReportFilter](productsearchqueryperformancereportfilter.md)  
[PublisherUsagePerformanceReportFilter](publisherusageperformancereportfilter.md)  
