---
title: SearchTermLandingPageReportFilter Data Object - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the criteria to use to filter the search term landing page report data.
---
# SearchTermLandingPageReportFilter Data Object - Reporting
Defines the criteria to use to filter the search term landing page report data.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="SearchTermLandingPageReportFilter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AdType" nillable="true" type="tns:AdTypeReportFilter" />
    <xs:element minOccurs="0" name="DeliveredMatchType" nillable="true" type="tns:DeliveredMatchTypeReportFilter" />
    <xs:element minOccurs="0" name="Language" nillable="true" type="tns:LanguageReportFilter" />
    <xs:element minOccurs="0" name="SearchQueries" nillable="true" type="q29:ArrayOfstring" xmlns:q29="http://schemas.microsoft.com/2003/10/Serialization/Arrays" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AdType": "ValueHere",
  "DeliveredMatchType": "ValueHere",
  "Language": "ValueHere",
  "SearchQueries": [
    "ValueHere"
  ]
}
```

-----

## <a name="elements"></a>Elements

The [SearchTermLandingPageReportFilter](searchtermlandingpagereportfilter.md) object has the following elements: [AdType](#adtype), [DeliveredMatchType](#deliveredmatchtype), [Language](#language), [SearchQueries](#searchqueries).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="adtype"></a>AdType|Reserved.|[AdTypeReportFilter](adtypereportfilter.md)|
|<a name="deliveredmatchtype"></a>DeliveredMatchType|Reserved.|[DeliveredMatchTypeReportFilter](deliveredmatchtypereportfilter.md)|
|<a name="language"></a>Language|Reserved.|[LanguageReportFilter](languagereportfilter.md)|
|<a name="searchqueries"></a>SearchQueries|Reserved.|**string** array|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[SearchTermLandingPageReportRequest](searchtermlandingpagereportrequest.md)  
