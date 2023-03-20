---
title: PublisherUsagePerformanceReportFilter Data Object - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the criteria to use to filter the publisher usage performance report data.
---
# PublisherUsagePerformanceReportFilter Data Object - Reporting
Defines the criteria to use to filter the publisher usage performance report data.

## Syntax
```xml
<xs:complexType name="PublisherUsagePerformanceReportFilter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AccountStatus" nillable="true" type="tns:AccountStatusReportFilter" />
    <xs:element minOccurs="0" name="AdDistribution" nillable="true" type="tns:AdDistributionReportFilter" />
    <xs:element minOccurs="0" name="AdGroupStatus" nillable="true" type="tns:AdGroupStatusReportFilter" />
    <xs:element minOccurs="0" name="CampaignStatus" nillable="true" type="tns:CampaignStatusReportFilter" />
    <xs:element minOccurs="0" name="Language" nillable="true" type="tns:LanguageReportFilter" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [PublisherUsagePerformanceReportFilter](publisherusageperformancereportfilter.md) object has the following elements: [AccountStatus](#accountstatus), [AdDistribution](#addistribution), [AdGroupStatus](#adgroupstatus), [CampaignStatus](#campaignstatus), [Language](#language).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountstatus"></a>AccountStatus|The report will include data for only the account status. For example, you can use the filter to include data for only active accounts.<br/><br/>You can specify one or more account statuses.|[AccountStatusReportFilter](accountstatusreportfilter.md)|
|<a name="addistribution"></a>AdDistribution|The report will include data for only the specified distribution medium. For example, you may use the filter to include data for only search ads.<br/><br/>You may specify one or more distribution mediums.|[AdDistributionReportFilter](addistributionreportfilter.md)|
|<a name="adgroupstatus"></a>AdGroupStatus|The report will include data for only the ad group status. For example, you can use the filter to include data for only active ad groups.<br/><br/>You can specify one or more ad group statuses.|[AdGroupStatusReportFilter](adgroupstatusreportfilter.md)|
|<a name="campaignstatus"></a>CampaignStatus|The report will include data for only the campaign status. For example, you can use the filter to include data for only active campaigns.<br/><br/>You can specify one or more campaign statuses.|[CampaignStatusReportFilter](campaignstatusreportfilter.md)|
|<a name="language"></a>Language|The report will include data for only websites that used the specified languages.<br/><br/>You can specify one or more languages.|[LanguageReportFilter](languagereportfilter.md)|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[PublisherUsagePerformanceReportRequest](publisherusageperformancereportrequest.md)  
