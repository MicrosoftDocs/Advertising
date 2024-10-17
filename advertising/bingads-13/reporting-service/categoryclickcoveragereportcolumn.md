---
title: CategoryClickCoverageReportColumn Value Set - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the attributes and performance statistics columns that you can include in the CategoryClickCoverageReportColumn.
---
# CategoryClickCoverageReportColumn Value Set - Reporting
Defines the attributes and performance statistics columns that you can include in the CategoryClickCoverageReportColumn.

## Syntax
```xml
<xs:simpleType name="CategoryClickCoverageReportColumn" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="AccountName" />
    <xs:enumeration value="CustomerName" />
    <xs:enumeration value="L1Vertical" />
    <xs:enumeration value="L2Vertical" />
    <xs:enumeration value="L3Vertical" />
    <xs:enumeration value="WeekStartingMonday" />
    <xs:enumeration value="MarketplaceClickCoverage" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [CategoryClickCoverageReportColumn](categoryclickcoveragereportcolumn.md) value set has the following values: [AccountName](#accountname), [CustomerName](#customername), [L1Vertical](#l1vertical), [L2Vertical](#l2vertical), [L3Vertical](#l3vertical), [MarketplaceClickCoverage](#marketplaceclickcoverage), [WeekStartingMonday](#weekstartingmonday).

|Value|Description|
|-----------|---------------|
|<a name="accountname"></a>AccountName|The account name.|
|<a name="customername"></a>CustomerName|The customer name.|
|<a name="l1vertical"></a>L1Vertical|Reserved.|
|<a name="l2vertical"></a>L2Vertical|Reserved.|
|<a name="l3vertical"></a>L3Vertical|Reserved.|
|<a name="marketplaceclickcoverage"></a>MarketplaceClickCoverage|Reserved.|
|<a name="weekstartingmonday"></a>WeekStartingMonday|Reserved.|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[CategoryClickCoverageReportRequest](categoryclickcoveragereportrequest.md)  
