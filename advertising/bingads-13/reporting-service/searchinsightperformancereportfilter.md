---
title: SearchInsightPerformanceReportFilter Data Object - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a data object for SearchInsightPerformanceReportFilter.
---
# SearchInsightPerformanceReportFilter Data Object - Reporting
Defines a data object for SearchInsightPerformanceReportFilter.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="SearchInsightPerformanceReportFilter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AccountStatus" nillable="true" type="tns:AccountStatusReportFilter" />
    <xs:element minOccurs="0" name="AdGroupStatus" nillable="true" type="tns:AdGroupStatusReportFilter" />
    <xs:element minOccurs="0" name="AssetGroupStatus" nillable="true" type="tns:AssetGroupStatusReportFilter" />
    <xs:element minOccurs="0" name="CampaignStatus" nillable="true" type="tns:CampaignStatusReportFilter" />
    <xs:element xmlns:q18="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="SearchCategory" nillable="true" type="q18:ArrayOfstring" />
    <xs:element xmlns:q19="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="SearchQueries" nillable="true" type="q19:ArrayOfstring" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AccountStatus": "ValueHere",
  "AdGroupStatus": "ValueHere",
  "AssetGroupStatus": "ValueHere",
  "CampaignStatus": "ValueHere",
  "SearchCategory": [
    "ValueHere"
  ],
  "SearchQueries": [
    "ValueHere"
  ]
}
```

-----

## <a name="elements"></a>Elements

The [SearchInsightPerformanceReportFilter](searchinsightperformancereportfilter.md) object has the following elements: [AccountStatus](#accountstatus), [AdGroupStatus](#adgroupstatus), [AssetGroupStatus](#assetgroupstatus), [CampaignStatus](#campaignstatus), [SearchCategory](#searchcategory), [SearchQueries](#searchqueries).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountstatus"></a>AccountStatus|The report will only include data for accounts with the specified status. For example, you can use the filter to include data for only active accounts.<br/><br/>You can specify one or more account statuses.|[AccountStatusReportFilter](accountstatusreportfilter.md)|
|<a name="adgroupstatus"></a>AdGroupStatus|The report will only include data for ad groups with the specified status. For example, you can use the filter to include data for only active ad groups.<br/><br/>You can specify one or more ad group statuses.|[AdGroupStatusReportFilter](adgroupstatusreportfilter.md)|
|<a name="assetgroupstatus"></a>AssetGroupStatus|The report will include data for only the asset group status. For example, you can use the filter to include data for only active asset groups.<br/><br/>You can specify one or more asset group statuses.|[AssetGroupStatusReportFilter](assetgroupstatusreportfilter.md)|
|<a name="campaignstatus"></a>CampaignStatus|The report will only include data for campaigns with the specified status. For example, you can use the filter to include data for only active campaigns.<br/><br/>You can specify one or more campaign statuses.|[CampaignStatusReportFilter](campaignstatusreportfilter.md)|
|<a name="searchcategory"></a>SearchCategory|The report will only include data for campaigns with the specified search category.|[SearchInsightPerformanceReportFilter](searchinisghtperformancereportfilter.md)|
|<a name="searchqueries"></a>SearchQueries|The report will only include data for campaigns with the specified search queries.|[SearchQueryPerformanceReportFilter](searchqueryperformancereportfilter.md)|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[SearchInsightPerformanceReportRequest](searchinsightperformancereportrequest.md)  
