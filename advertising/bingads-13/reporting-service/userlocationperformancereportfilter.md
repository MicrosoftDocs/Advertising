---
title: UserLocationPerformanceReportFilter Data Object - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the criteria to use to filter the user location performance report data.
---
# UserLocationPerformanceReportFilter Data Object - Reporting
Defines the criteria to use to filter the user location performance report data.

## Syntax
```xml
<xs:complexType name="UserLocationPerformanceReportFilter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AdDistribution" nillable="true" type="tns:AdDistributionReportFilter" />
    <xs:element xmlns:q9="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="CountryCode" nillable="true" type="q9:ArrayOfstring" />
    <xs:element minOccurs="0" name="Language" nillable="true" type="tns:LanguageReportFilter" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [UserLocationPerformanceReportFilter](userlocationperformancereportfilter.md) object has the following elements: [AdDistribution](#addistribution), [CountryCode](#countrycode), [Language](#language).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="addistribution"></a>AdDistribution|The report will include data for only the specified distribution medium. For example, you can use the filter to include data for only search ads.<br/><br/>You can specify one or more distribution mediums.|[AdDistributionReportFilter](addistributionreportfilter.md)|
|<a name="countrycode"></a>CountryCode|The report will include data for only the specified countries/regions where the user that clicked the ad is located.<br/><br/>For a list of possible values, see [Geographical Location Codes](../guides/geographical-location-codes.md).|**string** array|
|<a name="language"></a>Language|The report will include data for only websites that used the specified languages.<br/><br/>You can specify one or more languages.|[LanguageReportFilter](languagereportfilter.md)|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[UserLocationPerformanceReportRequest](userlocationperformancereportrequest.md)  
