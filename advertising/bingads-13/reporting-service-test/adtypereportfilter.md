---
title: AdTypeReportFilter Value Set Test - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the ad type values that you can use to filter the report data.(test)
---
# AdTypeReportFilter Value Set Test - Reporting
Defines the ad type values that you can use to filter the report data. These values are also used as column values in reports that include the ad type, such as the ad performance report.

## Syntax
```xml
<xs:simpleType name="AdTypeReportFilter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="Text" />
        <xs:enumeration value="Local">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">8</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="Product">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">128</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="AppInstall">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">256</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="DynamicSearchAd">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">512</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="ExpandedText">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1024</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="ResponsiveAd">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">4096</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="ResponsiveSearchAd">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">8192</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AdTypeReportFilter](adtypereportfilter.md) value set has the following values: [AppInstall](#appinstall), [DynamicSearchAd](#dynamicsearchad), [ExpandedText](#expandedtext), [Local](#local), [Product](#product), [ResponsiveAd](#responsivead), [ResponsiveSearchAd](#responsivesearchad), [Text](#text).

|Value|Description|
|-----------|---------------|
|<a name="appinstall"></a>AppInstall|The report will include app install ads.|
|<a name="dynamicsearchad"></a>DynamicSearchAd|The report will include dynamic search ads.|
|<a name="expandedtext"></a>ExpandedText|The report will include expanded text ads.|
|<a name="local"></a>Local|Not supported.|
|<a name="product"></a>Product|The report will include product ads.|
|<a name="responsivead"></a>ResponsiveAd|The report will include responsive ads.|
|<a name="responsivesearchad"></a>ResponsiveSearchAd|The report will include responsive search ads.|
|<a name="text"></a>Text|The report will include text ads.|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[AdDynamicTextPerformanceReportFilter](addynamictextperformancereportfilter.md)  
[AdPerformanceReportFilter](adperformancereportfilter.md)  
[KeywordPerformanceReportFilter](keywordperformancereportfilter.md)  
[ProductSearchQueryPerformanceReportFilter](productsearchqueryperformancereportfilter.md)  
[SearchQueryPerformanceReportFilter](searchqueryperformancereportfilter.md)  
