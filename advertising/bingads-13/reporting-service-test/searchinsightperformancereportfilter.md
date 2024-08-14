---
title: SearchInsightPerformanceReportFilter Data Object Test - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a data object for SearchInsightPerformanceReportFilter.(test)
---
# SearchInsightPerformanceReportFilter Data Object Test - Reporting
Defines a data object for SearchInsightPerformanceReportFilter.

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
|<a name="accountstatus"></a>AccountStatus|Reserved.|[AccountStatusReportFilter](accountstatusreportfilter.md)|
|<a name="adgroupstatus"></a>AdGroupStatus|Reserved.|[AdGroupStatusReportFilter](adgroupstatusreportfilter.md)|
|<a name="assetgroupstatus"></a>AssetGroupStatus|Reserved.|[AssetGroupStatusReportFilter](assetgroupstatusreportfilter.md)|
|<a name="campaignstatus"></a>CampaignStatus|Reserved.|[CampaignStatusReportFilter](campaignstatusreportfilter.md)|
|<a name="searchcategory"></a>SearchCategory|Reserved.|**string** array|
|<a name="searchqueries"></a>SearchQueries|Reserved.|**string** array|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[SearchInsightPerformanceReportRequest](searchinsightperformancereportrequest.md)  
