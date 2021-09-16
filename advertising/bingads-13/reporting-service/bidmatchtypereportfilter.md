---
title: BidMatchTypeReportFilter Value Set - Reporting
ms.service: bing-ads-reporting-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines the bid match type values that you can use to filter the report data.
---
# BidMatchTypeReportFilter Value Set - Reporting
Defines the bid match type values that you can use to filter the report data. These values are also used as column values in reports that include bid match type, such as the keyword performance report.

## Syntax
```xml
<xs:simpleType name="BidMatchTypeReportFilter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="Exact" />
        <xs:enumeration value="Phrase" />
        <xs:enumeration value="Broad" />
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [BidMatchTypeReportFilter](bidmatchtypereportfilter.md) value set has the following values: [Broad](#broad), [Exact](#exact), [Phrase](#phrase).

|Value|Description|
|-----------|---------------|
|<a name="broad"></a>Broad|The report will contain keywords that set a bid value for the broad match type.|
|<a name="exact"></a>Exact|The report will contain keywords that set a bid value for the exact match type.|
|<a name="phrase"></a>Phrase|The report will contain keywords that set a bid value for the phrase match type.|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[KeywordPerformanceReportFilter](keywordperformancereportfilter.md)  
[ShareOfVoiceReportFilter](shareofvoicereportfilter.md)  
