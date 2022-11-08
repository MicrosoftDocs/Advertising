---
title: AdDistributionReportFilter Value Set - Reporting
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the ad distribution medium values that you can use to filter the report data.
ms.subservice: reporting-api
---
# AdDistributionReportFilter Value Set - Reporting
Defines the ad distribution medium values that you can use to filter the report data. These values are also used as column values in reports that include ad distribution, such as the account performance report.

## Syntax
```xml
<xs:simpleType name="AdDistributionReportFilter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="Search" />
        <xs:enumeration value="Audience">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">16</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AdDistributionReportFilter](addistributionreportfilter.md) value set has the following values: [Audience](#audience), [Search](#search).

|Value|Description|
|-----------|---------------|
|<a name="audience"></a>Audience|The report will contain audience ads.|
|<a name="search"></a>Search|The report will contain search ads.|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[AccountPerformanceReportFilter](accountperformancereportfilter.md)  
[AdDynamicTextPerformanceReportFilter](addynamictextperformancereportfilter.md)  
[AdGroupPerformanceReportFilter](adgroupperformancereportfilter.md)  
[AdPerformanceReportFilter](adperformancereportfilter.md)  
[AgeGenderAudienceReportFilter](agegenderaudiencereportfilter.md)  
[CampaignPerformanceReportFilter](campaignperformancereportfilter.md)  
[ConversionPerformanceReportFilter](conversionperformancereportfilter.md)  
[DestinationUrlPerformanceReportFilter](destinationurlperformancereportfilter.md)  
[GeographicPerformanceReportFilter](geographicperformancereportfilter.md)  
[GoalsAndFunnelsReportFilter](goalsandfunnelsreportfilter.md)  
[KeywordPerformanceReportFilter](keywordperformancereportfilter.md)  
[ProfessionalDemographicsAudienceReportFilter](professionaldemographicsaudiencereportfilter.md)  
[PublisherUsagePerformanceReportFilter](publisherusageperformancereportfilter.md)  
[SearchCampaignChangeHistoryReportFilter](searchcampaignchangehistoryreportfilter.md)  
[ShareOfVoiceReportFilter](shareofvoicereportfilter.md)  
[UserLocationPerformanceReportFilter](userlocationperformancereportfilter.md)  
