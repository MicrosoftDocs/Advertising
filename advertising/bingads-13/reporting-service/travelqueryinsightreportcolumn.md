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
    <xs:enumeration value="BingImpressions" />
    <xs:enumeration value="BingClicks" />
    <xs:enumeration value="BingSpend" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [TravelQueryInsightReportColumn](travelqueryinsightreportcolumn.md) value set has the following values: [BingClicks](#bingclicks), [BingImpressions](#bingimpressions), [BingSpend](#bingspend), [BrandClicks](#brandclicks), [BrandImpressions](#brandimpressions), [BrandSpend](#brandspend), [City](#city), [Country](#country), [L1Vertical](#l1vertical), [L2Vertical](#l2vertical), [L3Vertical](#l3vertical), [MetroArea](#metroarea), [POSCity](#poscity), [POSCountry](#poscountry), [POSRegion](#posregion), [PostalCode](#postalcode), [Region](#region), [SearchQuery](#searchquery).

|Value|Description|
|-----------|---------------|
|<a name="bingclicks"></a>BingClicks|The number of ad clicks originating from ads displayed Bing search results.|
|<a name="bingimpressions"></a>BingImpressions|The number of impressions of ads displayed in Bing search results.|
|<a name="bingspend"></a>BingSpend|The total amount of spend on ads displayed in Bing search results.|
|<a name="brandclicks"></a>BrandClicks|The number of ad clicks originating from ads displayed for a specific brand.|
|<a name="brandimpressions"></a>BrandImpressions|The number of impressions of ads displayed for a specific brand.|
|<a name="brandspend"></a>BrandSpend|The total amount of spend on ad impressions for a specific brand.|
|<a name="city"></a>City|The name of the city.|
|<a name="country"></a>Country|The name of the country.|
|<a name="l1vertical"></a>L1Vertical|The primary vertical category.|
|<a name="l2vertical"></a>L2Vertical|The secondary vertical category.|
|<a name="l3vertical"></a>L3Vertical|The tertiary vertical category.|
|<a name="metroarea"></a>MetroArea|The name of the metroplitan area.|
|<a name="poscity"></a>POSCity|The point of sale city.|
|<a name="poscountry"></a>POSCountry|The point of sale country.|
|<a name="posregion"></a>POSRegion|The point of sale region.|
|<a name="postalcode"></a>PostalCode|The point of sale postal/ZIP code.|
|<a name="region"></a>Region|The name of the region.|
|<a name="searchquery"></a>SearchQuery|The search query text.|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[TravelQueryInsightReportRequest](travelqueryinsightreportrequest.md)  
