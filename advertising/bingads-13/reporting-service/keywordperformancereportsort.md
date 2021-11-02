---
title: KeywordPerformanceReportSort Data Object - Reporting
ms.service: bing-ads-reporting-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines a keyword performance report column and corresponding sort order.
---
# KeywordPerformanceReportSort Data Object - Reporting
Defines a keyword performance report column and corresponding sort order.

## Syntax
```xml
<xs:complexType name="KeywordPerformanceReportSort" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element name="SortColumn" type="tns:KeywordPerformanceReportColumn" />
    <xs:element name="SortOrder" type="tns:SortOrder" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [KeywordPerformanceReportSort](keywordperformancereportsort.md) object has the following elements: [SortColumn](#sortcolumn), [SortOrder](#sortorder).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="sortcolumn"></a>SortColumn|The keyword performance report column by which to sort.|[KeywordPerformanceReportColumn](keywordperformancereportcolumn.md)|
|<a name="sortorder"></a>SortOrder|Defines the ascending or descending sort order of values within the specified report column.|[SortOrder](sortorder.md)|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[KeywordPerformanceReportRequest](keywordperformancereportrequest.md)  
