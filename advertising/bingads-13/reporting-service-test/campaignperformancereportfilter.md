---
title: CampaignPerformanceReportFilter Data Object Test - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the criteria to use to filter the campaign performance report data.(test)
---
# CampaignPerformanceReportFilter Data Object Test - Reporting
Defines the criteria to use to filter the campaign performance report data.

# [XML](#tab/xml)

```xml
<xs:complexType name="CampaignPerformanceReportFilter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AccountStatus" nillable="true" type="tns:AccountStatusReportFilter" />
    <xs:element minOccurs="0" name="AdDistribution" nillable="true" type="tns:AdDistributionReportFilter" />
    <xs:element minOccurs="0" name="DeviceOS" nillable="true" type="tns:DeviceOSReportFilter" />
    <xs:element minOccurs="0" name="DeviceType" nillable="true" type="tns:DeviceTypeReportFilter" />
    <xs:element minOccurs="0" name="Status" nillable="true" type="tns:CampaignStatusReportFilter" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AccountStatus": "ValueHere",
  "AdDistribution": "ValueHere",
  "DeviceOS": "ValueHere",
  "DeviceType": "ValueHere",
  "Status": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [CampaignPerformanceReportFilter](campaignperformancereportfilter.md) object has the following elements: [AccountStatus](#accountstatus), [AdDistribution](#addistribution), [DeviceOS](#deviceos), [DeviceType](#devicetype), [Status](#status).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountstatus"></a>AccountStatus|The report will include data for only the account status. For example, you can use the filter to include data for only active accounts.<br/><br/>You can specify one or more account statuses.|[AccountStatusReportFilter](accountstatusreportfilter.md)|
|<a name="addistribution"></a>AdDistribution|The report will include data for only the specified distribution medium. For example, you can use the filter to include data for only search ads.<br/><br/>You can specify one or more distribution mediums.|[AdDistributionReportFilter](addistributionreportfilter.md)|
|<a name="deviceos"></a>DeviceOS|The report will include data where the ad is displayed on the specified device operating systems. For example, you may use the filter to include data for only ads displayed on Windows devices.|[DeviceOSReportFilter](deviceosreportfilter.md)|
|<a name="devicetype"></a>DeviceType|The report will include data where the ad is displayed on the specified device types. For example, you may use the filter to include data for only ads displayed on smartphones.<br/><br/>You may specify one or more device types.|[DeviceTypeReportFilter](devicetypereportfilter.md)|
|<a name="status"></a>Status|The report will include data for only the specified campaign status values. For example, you can use the filter to include data for only active campaigns.<br/><br/>You can specify one or more status values.|[CampaignStatusReportFilter](campaignstatusreportfilter.md)|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[CampaignPerformanceReportRequest](campaignperformancereportrequest.md)  
