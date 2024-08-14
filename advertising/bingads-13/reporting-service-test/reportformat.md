---
title: ReportFormat Value Set Test - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the file formats that you can use for a report.(test)
---
# ReportFormat Value Set Test - Reporting
Defines the file formats that you can use for a report.

## Syntax
```xml
<xs:simpleType name="ReportFormat" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Csv" />
    <xs:enumeration value="Tsv" />
    <xs:enumeration value="Xml" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [ReportFormat](reportformat.md) value set has the following values: [Csv](#csv), [Tsv](#tsv), [Xml](#xml).

|Value|Description|
|-----------|---------------|
|<a name="csv"></a>Csv|The report format will be comma-separated values (.csv).|
|<a name="tsv"></a>Tsv|The report format will be tab-separated values (.tsv).|
|<a name="xml"></a>Xml|The report format will be XML (.xml).|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[ReportRequest](reportrequest.md)  
