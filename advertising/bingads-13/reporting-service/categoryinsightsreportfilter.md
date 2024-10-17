---
title: CategoryInsightsReportFilter Data Object - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the criteria to use to filter the category insights report data.
---
# CategoryInsightsReportFilter Data Object - Reporting
Defines the criteria to use to filter the category insights report data.

## Syntax
```xml
<xs:complexType name="CategoryInsightsReportFilter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element xmlns:q20="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="CountryCode" nillable="true" type="q20:ArrayOfstring" />
    <xs:element xmlns:q21="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="L1Vertical" nillable="true" type="q21:ArrayOfstring" />
    <xs:element xmlns:q22="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="L2Vertical" nillable="true" type="q22:ArrayOfstring" />
    <xs:element xmlns:q23="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="L3Vertical" nillable="true" type="q23:ArrayOfstring" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [CategoryInsightsReportFilter](categoryinsightsreportfilter.md) object has the following elements: [CountryCode](#countrycode), [L1Vertical](#l1vertical), [L2Vertical](#l2vertical), [L3Vertical](#l3vertical).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="countrycode"></a>CountryCode|The report will include data for only the specified countries/regions where the user that clicked the ad is located.<br/><br/>For a list of possible values, see [Geographical Location Codes](../guides/geographical-location-codes.md).|**string** array|
|<a name="l1vertical"></a>L1Vertical|Reserved.|**string** array|
|<a name="l2vertical"></a>L2Vertical|Reserved.|**string** array|
|<a name="l3vertical"></a>L3Vertical|Reserved.|**string** array|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[CategoryInsightsReportRequest](categoryinsightsreportrequest.md)  
