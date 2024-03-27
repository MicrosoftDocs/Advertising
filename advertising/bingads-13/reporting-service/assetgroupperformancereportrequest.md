---
title: AssetGroupPerformanceReportRequest Data Object - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a data object for AssetGroupPerformanceReportRequest.
---
# AssetGroupPerformanceReportRequest Data Object - Reporting
Defines a data object for AssetGroupPerformanceReportRequest.
---

## Syntax
```xml
<xs:complexType name="AssetGroupPerformanceReportRequest" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:ReportRequest">
      <xs:sequence>
        <xs:element name="Aggregation" type="tns:ReportAggregation" />
        <xs:element name="Columns" nillable="true" type="tns:ArrayOfAssetGroupPerformanceReportColumn" />
        <xs:element minOccurs="0" name="Filter" nillable="true" type="tns:AssetGroupPerformanceReportFilter" />
        <xs:element name="Scope" nillable="true" type="tns:AccountThroughAssetGroupReportScope" />
        <xs:element name="Time" nillable="true" type="tns:ReportTime" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [AssetGroupPerformanceReportRequest](assetgroupperformancereportrequest.md) object has the following elements: [Aggregation](#aggregation), [Columns](#columns), [Filter](#filter), [Scope](#scope), [Time](#time).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="aggregation"></a>Aggregation|Reserved.|[ReportAggregation](reportaggregation.md)|
|<a name="columns"></a>Columns|Reserved.|[AssetGroupPerformanceReportColumn](assetgroupperformancereportcolumn.md) array|
|<a name="filter"></a>Filter|Reserved.|[AssetGroupPerformanceReportFilter](assetgroupperformancereportfilter.md)|
|<a name="scope"></a>Scope|Reserved.|[AccountThroughAssetGroupReportScope](accountthroughassetgroupreportscope.md)|
|<a name="time"></a>Time|Reserved.|[ReportTime](reporttime.md)|

The [AssetGroupPerformanceReportRequest](assetgroupperformancereportrequest.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsreportrequest"></a>Inherited Elements from ReportRequest
The [AssetGroupPerformanceReportRequest](assetgroupperformancereportrequest.md) object derives from the [ReportRequest](reportrequest.md) object, and inherits the following elements: [ExcludeColumnHeaders](#excludecolumnheaders), [ExcludeReportFooter](#excludereportfooter), [ExcludeReportHeader](#excludereportheader), [Format](#format), [FormatVersion](#formatversion), [ReportName](#reportname), [ReturnOnlyCompleteData](#returnonlycompletedata). The descriptions below are specific to [AssetGroupPerformanceReportRequest](assetgroupperformancereportrequest.md), and might not apply to other objects that inherit the same elements from the [ReportRequest](reportrequest.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="excludecolumnheaders"></a>ExcludeColumnHeaders|Reserved.|**boolean**|
|<a name="excludereportfooter"></a>ExcludeReportFooter|Reserved.|**boolean**|
|<a name="excludereportheader"></a>ExcludeReportHeader|Reserved.|**boolean**|
|<a name="format"></a>Format|Reserved.|[ReportFormat](reportformat.md)|
|<a name="formatversion"></a>FormatVersion|Reserved.|**string**|
|<a name="reportname"></a>ReportName|Reserved.|**string**|
|<a name="returnonlycompletedata"></a>ReturnOnlyCompleteData|Reserved.|**boolean**|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

