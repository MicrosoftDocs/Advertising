---
title: AssetGroupPerformanceReportFilter Data Object Test - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a data object for AssetGroupPerformanceReportFilter.(test)
---
# AssetGroupPerformanceReportFilter Data Object Test - Reporting
Defines a data object for AssetGroupPerformanceReportFilter.

# [XML](#tab/xml)

```xml
<xs:complexType name="AssetGroupPerformanceReportFilter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
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

The [AssetGroupPerformanceReportFilter](assetgroupperformancereportfilter.md) object has the following elements: [AccountStatus](#accountstatus), [AssetGroupStatus](#assetgroupstatus), [CampaignStatus](#campaignstatus).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountstatus"></a>AccountStatus|The account status.|[AccountStatusReportFilter](accountstatusreportfilter.md)|
|<a name="assetgroupstatus"></a>AssetGroupStatus|The asset group status.|[AssetGroupStatusReportFilter](assetgroupstatusreportfilter.md)|
|<a name="campaignstatus"></a>CampaignStatus|The campaign status.|[CampaignStatusReportFilter](campaignstatusreportfilter.md)|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[AssetGroupPerformanceReportRequest](assetgroupperformancereportrequest.md)  
