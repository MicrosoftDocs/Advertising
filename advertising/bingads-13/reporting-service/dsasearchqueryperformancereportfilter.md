---
title: DSASearchQueryPerformanceReportFilter Data Object - Reporting
ms.service: bing-ads-reporting-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines the criteria to use to filter the DSA search query performance report data.
---
# DSASearchQueryPerformanceReportFilter Data Object - Reporting
Defines the criteria to use to filter the DSA search query performance report data.

## Syntax
```xml
<xs:complexType name="DSASearchQueryPerformanceReportFilter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AccountStatus" nillable="true" type="tns:AccountStatusReportFilter" />
    <xs:element minOccurs="0" name="AdGroupStatus" nillable="true" type="tns:AdGroupStatusReportFilter" />
    <xs:element minOccurs="0" name="AdStatus" nillable="true" type="tns:AdStatusReportFilter" />
    <xs:element minOccurs="0" name="CampaignStatus" nillable="true" type="tns:CampaignStatusReportFilter" />
    <xs:element minOccurs="0" name="ExcludeZeroClicks" type="xs:boolean" />
    <xs:element minOccurs="0" name="FeedUrl" nillable="true" type="xs:boolean" />
    <xs:element minOccurs="0" name="Language" nillable="true" type="tns:LanguageReportFilter" />
    <xs:element minOccurs="0" name="SearchQueries" nillable="true" type="q16:ArrayOfstring" xmlns:q16="http://schemas.microsoft.com/2003/10/Serialization/Arrays" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [DSASearchQueryPerformanceReportFilter](dsasearchqueryperformancereportfilter.md) object has the following elements: [AccountStatus](#accountstatus), [AdGroupStatus](#adgroupstatus), [AdStatus](#adstatus), [CampaignStatus](#campaignstatus), [ExcludeZeroClicks](#excludezeroclicks), [FeedUrl](#feedurl), [Language](#language), [SearchQueries](#searchqueries).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountstatus"></a>AccountStatus|The report will include data for only the account status. For example, you can use the filter to include data for only active accounts.<br/><br/>You can specify one or more account statuses.|[AccountStatusReportFilter](accountstatusreportfilter.md)|
|<a name="adgroupstatus"></a>AdGroupStatus|The report will include data for only the ad group status. For example, you can use the filter to include data for only active ad groups.<br/><br/>You can specify one or more ad group statuses.|[AdGroupStatusReportFilter](adgroupstatusreportfilter.md)|
|<a name="adstatus"></a>AdStatus|The report will include data for ads that have the specified status value. You can specify one or more status values.|[AdStatusReportFilter](adstatusreportfilter.md)|
|<a name="campaignstatus"></a>CampaignStatus|The report will include data for campaigns that have the specified status value. You can specify one or more status values.|[CampaignStatusReportFilter](campaignstatusreportfilter.md)|
|<a name="excludezeroclicks"></a>ExcludeZeroClicks|If the value of this element is set to *true*, search terms that had one or more ad impressions but resulted in zero clicks in the specified time duration will be excluded from the report.<br/><br/>The default value is *false*, in which case the report will include zero click search term data.<br/><br/>Regardless of the value of this filter, search terms with zero clicks in the last 30 days will always be excluded.|**boolean**|
|<a name="feedurl"></a>FeedUrl|The feed URL will appear either as "True" or "False". If it's "True", the final URL came from a page feed associated to the campaign. If it's "False", the final URL did not come from a page feed.|**boolean**|
|<a name="language"></a>Language|The report will include data for only websites that used the specified languages.<br/><br/>You can specify one or more languages.|[LanguageReportFilter](languagereportfilter.md)|
|<a name="searchqueries"></a>SearchQueries|The report will include data for only the specified search query strings.<br/><br/>The list can contain a maximum of 30 strings, and each string can contain a maximum of 256 characters.|**string** array|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[DSASearchQueryPerformanceReportRequest](dsasearchqueryperformancereportrequest.md)  
