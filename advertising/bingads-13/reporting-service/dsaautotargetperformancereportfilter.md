---
title: DSAAutoTargetPerformanceReportFilter Data Object - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the criteria to use to filter the DSA auto target performance report data.
---
# DSAAutoTargetPerformanceReportFilter Data Object - Reporting
Defines the criteria to use to filter the DSA auto target performance report data.

## Syntax
```xml
<xs:complexType name="DSAAutoTargetPerformanceReportFilter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AccountStatus" nillable="true" type="tns:AccountStatusReportFilter" />
    <xs:element minOccurs="0" name="AdGroupStatus" nillable="true" type="tns:AdGroupStatusReportFilter" />
    <xs:element minOccurs="0" name="BidStrategyType" nillable="true" type="tns:BidStrategyTypeReportFilter" />
    <xs:element minOccurs="0" name="CampaignStatus" nillable="true" type="tns:CampaignStatusReportFilter" />
    <xs:element minOccurs="0" name="DynamicAdTargetStatus" nillable="true" type="tns:DynamicAdTargetStatusReportFilter" />
    <xs:element minOccurs="0" name="Language" nillable="true" type="tns:LanguageReportFilter" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [DSAAutoTargetPerformanceReportFilter](dsaautotargetperformancereportfilter.md) object has the following elements: [AccountStatus](#accountstatus), [AdGroupStatus](#adgroupstatus), [BidStrategyType](#bidstrategytype), [CampaignStatus](#campaignstatus), [DynamicAdTargetStatus](#dynamicadtargetstatus), [Language](#language).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountstatus"></a>AccountStatus|The report will include data for only the account status. For example, you can use the filter to include data for only active accounts.<br/><br/>You can specify one or more account statuses.|[AccountStatusReportFilter](accountstatusreportfilter.md)|
|<a name="adgroupstatus"></a>AdGroupStatus|The report will include data for only the ad group status. For example, you can use the filter to include data for only active ad groups.<br/><br/>You can specify one or more ad group statuses.|[AdGroupStatusReportFilter](adgroupstatusreportfilter.md)|
|<a name="bidstrategytype"></a>BidStrategyType|The report will include data for only the specified bid strategy types.|[BidStrategyTypeReportFilter](bidstrategytypereportfilter.md)|
|<a name="campaignstatus"></a>CampaignStatus|The report will include data for campaigns that have the specified status value. You can specify one or more status values.|[CampaignStatusReportFilter](campaignstatusreportfilter.md)|
|<a name="dynamicadtargetstatus"></a>DynamicAdTargetStatus|The report will include data for only the dynamic ad targets that have the specified status.|[DynamicAdTargetStatusReportFilter](dynamicadtargetstatusreportfilter.md)|
|<a name="language"></a>Language|The report will include data for only websites that used the specified languages.<br/><br/>You can specify one or more languages.|[LanguageReportFilter](languagereportfilter.md)|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[DSAAutoTargetPerformanceReportRequest](dsaautotargetperformancereportrequest.md)  
