---
title: AppsPerformanceReportFilter Data Object - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the criteria to use to filter the apps performance report data.
---
# AppsPerformanceReportFilter Data Object - Reporting
Defines the criteria to use to filter the apps performance report data.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="AppsPerformanceReportFilter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AccountStatus" nillable="true" type="tns:AccountStatusReportFilter" />
    <xs:element minOccurs="0" name="AssetGroupStatus" nillable="true" type="tns:AssetGroupStatusReportFilter" />
    <xs:element minOccurs="0" name="CampaignStatus" nillable="true" type="tns:CampaignStatusReportFilter" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AccountStatus": "ValueHere",
  "AssetGroupStatus": "ValueHere",
  "CampaignStatus": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [AppsPerformanceReportFilter](appsperformancereportfilter.md) object has the following elements: [AccountStatus](#accountstatus), [AssetGroupStatus](#assetgroupstatus), [CampaignStatus](#campaignstatus).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountstatus"></a>AccountStatus|The report will include data for only the account status. For example, you can use the filter to include data for only active accounts.<br/><br/>You can specify one or more account statuses. |[AccountStatusReportFilter](accountstatusreportfilter.md)|
|<a name="assetgroupstatus"></a>AssetGroupStatus|The report will include data for only the asset group status. For example, you can use the filter to include data for only active asset groups.<br/><br/>You can specify one or more asset group statuses. |[AssetGroupStatusReportFilter](assetgroupstatusreportfilter.md)|
|<a name="campaignstatus"></a>CampaignStatus|The report will include data for only the campaign status. For example, you can use the filter to include data for only active campaigns.<br/><br/>You can specify one or more campaign statuses. |[CampaignStatusReportFilter](campaignstatusreportfilter.md)|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[AppsPerformanceReportRequest](appsperformancereportrequest.md)  
