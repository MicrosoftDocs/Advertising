---
title: MMMPerformanceReportFilter Data Object - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Reserved.
---
# MMMPerformanceReportFilter Data Object - Reporting
Reserved.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="MMMPerformanceReportFilter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AccountStatus" nillable="true" type="tns:AccountStatusReportFilter" />
    <xs:element minOccurs="0" name="AdDistribution" nillable="true" type="tns:AdDistributionReportFilter" />
    <xs:element minOccurs="0" name="AdGroupStatus" nillable="true" type="tns:AdGroupStatusReportFilter" />
    <xs:element minOccurs="0" name="AssetGroupStatus" nillable="true" type="tns:AssetGroupStatusReportFilter" />
    <xs:element minOccurs="0" name="CampaignStatus" nillable="true" type="tns:CampaignStatusReportFilter" />
    <xs:element minOccurs="0" name="CountryCode" nillable="true" type="q28:ArrayOfstring" xmlns:q28="http://schemas.microsoft.com/2003/10/Serialization/Arrays" />
    <xs:element minOccurs="0" name="Language" nillable="true" type="tns:LanguageReportFilter" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AccountStatus": "ValueHere",
  "AdDistribution": "ValueHere",
  "AdGroupStatus": "ValueHere",
  "AssetGroupStatus": "ValueHere",
  "CampaignStatus": "ValueHere",
  "CountryCode": [
    "ValueHere"
  ],
  "Language": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [MMMPerformanceReportFilter](mmmperformancereportfilter.md) object has the following elements: [AccountStatus](#accountstatus), [AdDistribution](#addistribution), [AdGroupStatus](#adgroupstatus), [AssetGroupStatus](#assetgroupstatus), [CampaignStatus](#campaignstatus), [CountryCode](#countrycode), [Language](#language).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountstatus"></a>AccountStatus|Reserved.|[AccountStatusReportFilter](accountstatusreportfilter.md)|
|<a name="addistribution"></a>AdDistribution|Reserved.|[AdDistributionReportFilter](addistributionreportfilter.md)|
|<a name="adgroupstatus"></a>AdGroupStatus|Reserved.|[AdGroupStatusReportFilter](adgroupstatusreportfilter.md)|
|<a name="assetgroupstatus"></a>AssetGroupStatus|Reserved.|[AssetGroupStatusReportFilter](assetgroupstatusreportfilter.md)|
|<a name="campaignstatus"></a>CampaignStatus|Reserved.|[CampaignStatusReportFilter](campaignstatusreportfilter.md)|
|<a name="countrycode"></a>CountryCode|Reserved.|**string** array|
|<a name="language"></a>Language|Reserved.|[LanguageReportFilter](languagereportfilter.md)|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[MMMPerformanceReportRequest](mmmperformancereportrequest.md)  
