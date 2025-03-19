---
title: CampaignTypeReportFilter Value Set - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the campaign types by which you can filter the report data.
---
# CampaignTypeReportFilter Value Set - Reporting
Defines the campaign types by which you can filter the report data.  

## Syntax
```xml
<xs:simpleType name="CampaignTypeReportFilter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="SearchAndContent" />
        <xs:enumeration value="Shopping">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">3</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="DynamicSearch" />
        <xs:enumeration value="Audience">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">6</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="Smart">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">7</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="Hotel">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">8</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="PerformanceMax">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">9</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="App">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">10</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [CampaignTypeReportFilter](campaigntypereportfilter.md) value set has the following values: [App](#app), [Audience](#audience), [DynamicSearch](#dynamicsearch), [Hotel](#hotel), [PerformanceMax](#performancemax), [SearchAndContent](#searchandcontent), [Shopping](#shopping), [Smart](#smart).

|Value|Description|
|-----------|---------------|
|<a name="app"></a>App|The report will contain App campaigns.|
|<a name="audience"></a>Audience|The report will contain Audience campaigns.|
|<a name="dynamicsearch"></a>DynamicSearch|The report will contain Dynamic search campaigns.|
|<a name="hotel"></a>Hotel|The report will contain Hotel campaigns.|
|<a name="performancemax"></a>PerformanceMax|The report will contain Performance max campaigns.|
|<a name="searchandcontent"></a>SearchAndContent|The report will contain Search and content campaigns.|
|<a name="shopping"></a>Shopping|The report will contain Shopping campaigns.|
|<a name="smart"></a>Smart|The report will contain Smart campaigns.|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[ProductPartitionPerformanceReportFilter](productpartitionperformancereportfilter.md)  
