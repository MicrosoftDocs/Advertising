---
title: TravelQueryInsightReportColumn Value Set - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the attributes and performance statistics columns that you can include in the travel query insight report.
---
# TravelQueryInsightReportColumn Value Set - Reporting
Defines the attributes and performance statistics columns that you can include in the travel query insight report.

## Syntax
```xml
<xs:simpleType name="TravelQueryInsightReportColumn" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="SearchQuery" />
    <xs:enumeration value="Country" />
    <xs:enumeration value="Region" />
    <xs:enumeration value="MetroArea" />
    <xs:enumeration value="City" />
    <xs:enumeration value="PostalCode" />
    <xs:enumeration value="L1Vertical" />
    <xs:enumeration value="L2Vertical" />
    <xs:enumeration value="L3Vertical" />
    <xs:enumeration value="POSCountry" />
    <xs:enumeration value="POSRegion" />
    <xs:enumeration value="POSCity" />
    <xs:enumeration value="BrandImpressions" />
    <xs:enumeration value="BrandClicks" />
    <xs:enumeration value="BrandSpend" />
    <xs:enumeration value="MSAImpressions" />
    <xs:enumeration value="MSAClicks" />
    <xs:enumeration value="MSASpend" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [TravelQueryInsightReportColumn](travelqueryinsightreportcolumn.md) value set has the following values: [BrandClicks](#brandclicks), [BrandImpressions](#brandimpressions), [BrandSpend](#brandspend), [City](#city), [Country](#country), [L1Vertical](#l1vertical), [L2Vertical](#l2vertical), [L3Vertical](#l3vertical), [MetroArea](#metroarea), [MSAClicks](#msaclicks), [MSAImpressions](#msaimpressions), [MSASpend](#msaspend), [POSCity](#poscity), [POSCountry](#poscountry), [POSRegion](#posregion), [PostalCode](#postalcode), [Region](#region), [SearchQuery](#searchquery).

|Value|Description|
|-----------|---------------|
|<a name="brandclicks"></a>BrandClicks|Your brand's ad clicks.|
|<a name="brandimpressions"></a>BrandImpressions|Your brand's ad impressions.|
|<a name="brandspend"></a>BrandSpend|Your brand's ad spend.|
|<a name="city"></a>City|The city of interest.|
|<a name="country"></a>Country|The country of interest.|
|<a name="l1vertical"></a>L1Vertical|The primary supply vertical.|
|<a name="l2vertical"></a>L2Vertical|The secondary supply vertical.|
|<a name="l3vertical"></a>L3Vertical|The tertiary supply vertical.|
|<a name="metroarea"></a>MetroArea|The metro area of interest.|
|<a name="msaclicks"></a>MSAClicks|The number of Microsoft Advertising clicks for this query.|
|<a name="msaimpressions"></a>MSAImpressions|The number of Microsoft Advertising impressions for this query.|
|<a name="msaspend"></a>MSASpend|The Microsoft Advertising spend on this query.|
|<a name="poscity"></a>POSCity|The searcher's location at the city level.|
|<a name="poscountry"></a>POSCountry|The searcher's location at the country level.|
|<a name="posregion"></a>POSRegion|The searcher's location at the region level.|
|<a name="postalcode"></a>PostalCode|The searcher's location at the postal code level.|
|<a name="region"></a>Region|The region of interest.|
|<a name="searchquery"></a>SearchQuery|The search query entered by the user.|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[TravelQueryInsightReportRequest](travelqueryinsightreportrequest.md)  
