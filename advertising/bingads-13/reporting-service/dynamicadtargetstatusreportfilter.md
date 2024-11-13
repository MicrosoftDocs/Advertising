---
title: DynamicAdTargetStatusReportFilter Value Set - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the dynamic ad target status values that you can use to filter the report data.
---
# DynamicAdTargetStatusReportFilter Value Set - Reporting
Defines the dynamic ad target status values that you can use to filter the report data. These values are also used as column values in reports that include dynamic ad targets status, such as the DSA auto target performance report.

## Syntax
```xml
<xs:simpleType name="DynamicAdTargetStatusReportFilter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
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

The [DynamicAdTargetStatusReportFilter](dynamicadtargetstatusreportfilter.md) value set has the following values: [Active](#active), [Deleted](#deleted), [Paused](#paused).

|Value|Description|
|-----------|---------------|
|<a name="active"></a>Active|The report will contain dynamic ad targets that are active.|
|<a name="deleted"></a>Deleted|The report will contain dynamic ad targets that have been deleted.|
|<a name="paused"></a>Paused|The report will contain dynamic ad targets that are paused.|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[DSAAutoTargetPerformanceReportFilter](dsaautotargetperformancereportfilter.md)  
