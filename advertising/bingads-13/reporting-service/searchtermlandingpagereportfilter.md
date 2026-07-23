---
title: SearchTermLandingPageReportFilter Data Object - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the criteria to use to filter the data returned by the Search Term Landing Page report.
---
# SearchTermLandingPageReportFilter Data Object - Reporting
Defines the criteria to use to filter the data returned by the Search Term Landing Page report. Specify one or more filter elements to limit the report data. All filter elements are optional. If you don't specify a filter element, the report isn't filtered on that dimension.

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
|<a name="adtype"></a>AdType|Includes rows in the report where the ad type matches one of the specified ad types. You can include multiple ad type values as flags.<br/><br/>This element is optional. If not specified, all ad types are included.|[AdTypeReportFilter](adtypereportfilter.md)|
|<a name="deliveredmatchtype"></a>DeliveredMatchType|Includes rows in the report where the delivered match type matches one of the specified match types. You can include multiple match type values as flags. Supported values include *Exact*, *Phrase*, *Broad*, and *AIOptimized*.<br/><br/>This element is optional. If not specified, all delivered match types are included.|[DeliveredMatchTypeReportFilter](deliveredmatchtypereportfilter.md)|
|<a name="language"></a>Language|Includes rows in the report where the language matches one of the specified languages. You can include multiple language values as flags.<br/><br/>This element is optional. If not specified, all languages are included.|[LanguageReportFilter](languagereportfilter.md)|
|<a name="searchqueries"></a>SearchQueries|Includes rows in the report where the search term matches one of the specified search query strings.<br/><br/>You can specify up to 100 search query strings. Each search query string can contain a maximum of 100 characters.<br/><br/>This element is optional. If not specified, the report is not filtered on search term.|**string** array|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[SearchTermLandingPageReportRequest](searchtermlandingpagereportrequest.md)  
