---
title: ReportRequest Data Object - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the base object for all report requests.
---
# ReportRequest Data Object - Reporting
Defines the base object for all report requests.

Do not instantiate this object. Instead, you may instantiate one of the report request objects which derives from this object, for example the [CampaignPerformanceReportRequest](campaignperformancereportrequest.md). For a list of reports, see the [Report Types](../guides/report-types.md) guide.

## Syntax
```xml
<xs:complexType name="ReportRequest" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="ExcludeColumnHeaders" nillable="true" type="xs:boolean" />
    <xs:element minOccurs="0" name="ExcludeReportFooter" nillable="true" type="xs:boolean" />
    <xs:element minOccurs="0" name="ExcludeReportHeader" nillable="true" type="xs:boolean" />
    <xs:element minOccurs="0" name="Format" nillable="true" type="tns:ReportFormat" />
    <xs:element minOccurs="0" name="FormatVersion" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="ReportName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="ReturnOnlyCompleteData" nillable="true" type="xs:boolean" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [ReportRequest](reportrequest.md) object has the following elements: [ExcludeColumnHeaders](#excludecolumnheaders), [ExcludeReportFooter](#excludereportfooter), [ExcludeReportHeader](#excludereportheader), [Format](#format), [FormatVersion](#formatversion), [ReportName](#reportname), [ReturnOnlyCompleteData](#returnonlycompletedata).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="excludecolumnheaders"></a>ExcludeColumnHeaders|Determines whether or not the downloaded report should contain header descriptions for each column. The report column header matches the requested column name e.g. *Impressions* and *Clicks*.<br/><br/>Set this property *true* if you want the report column headers excluded from the downloaded report. The default value is *false*.|**boolean**|
|<a name="excludereportfooter"></a>ExcludeReportFooter|Determines whether or not the downloaded report should contain footer metadata such as Microsoft copyright (*@2020 Microsoft Corporation. All rights reserved.*). <br/><br/>Set this property *true* if you want the report footer metadata excluded from the downloaded report. The default value is *false*.|**boolean**|
|<a name="excludereportheader"></a>ExcludeReportHeader|Determines whether or not the downloaded report should contain header metadata such as report name, date range, and aggregation.<br/><br/>Set this property *true* if you want the report header metadata excluded from the downloaded report. The default value is *false*.|**boolean**|
|<a name="format"></a>Format|The format of the report data. For example, you can request the data in comma-separated values (Csv) format or tab-separated values (Tsv) format.<br/><br/>The default value is Csv.<br/><br/>All downloaded files are ZIP compressed.|[ReportFormat](reportformat.md)|
|<a name="formatversion"></a>FormatVersion|Determines the format for certain fields in the downloaded report file.<br/><br/>The data format for certain fields can be updated within the current API version without breaking existing client applications. You can get the latest data format by setting this optional request field to 2.0. If you do not set this field, the service defaults to version 1.0.<br/><br/>For details about changes between format versions, see [Report Format Version](../guides/reports.md#formatversion).|**string**|
|<a name="reportname"></a>ReportName|The name of the report. The name is included in the report header. If you do not specify a report name, the system generates a name in the form, ReportType-ReportDateTime.<br/><br/>The maximum length of the report name is 200.|**string**|
|<a name="returnonlycompletedata"></a>ReturnOnlyCompleteData|Determines whether or not the service must ensure that all the data has been processed and is available.<br/><br/>If set to *true* and if the system has not finished processing all the data based on the requested aggregation, scope, and time, the service returns error code NoCompleteDataAvaliable (2004). Otherwise by default the request can succeed, there is no indication as to whether the data is complete, and the report will contain only the data that the system has finished processing at the time of the request.<br/><br/>Please note that because today is still in progress and data is not complete, you cannot set this element to *true* if the time period (whether custom or predefined date) includes today's date. For more information, see [Time Zones in Reporting](../guides/reports.md#reptimezones).|**boolean**|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[SubmitGenerateReport](submitgeneratereport.md)  
