---
title: ConversionPerformanceReportFilter Data Object - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the criteria to use to filter the conversion performance report data.
---
# ConversionPerformanceReportFilter Data Object - Reporting
Defines the criteria to use to filter the conversion performance report data.

## Syntax
```xml
<xs:complexType name="ConversionPerformanceReportFilter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AccountStatus" nillable="true" type="tns:AccountStatusReportFilter" />
    <xs:element minOccurs="0" name="AdDistribution" nillable="true" type="tns:AdDistributionReportFilter" />
    <xs:element minOccurs="0" name="AdGroupStatus" nillable="true" type="tns:AdGroupStatusReportFilter" />
    <xs:element minOccurs="0" name="CampaignStatus" nillable="true" type="tns:CampaignStatusReportFilter" />
    <xs:element minOccurs="0" name="DeviceType" nillable="true" type="tns:DeviceTypeReportFilter" />
    <xs:element minOccurs="0" name="KeywordStatus" nillable="true" type="tns:KeywordStatusReportFilter" />
    <xs:element xmlns:q11="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="Keywords" nillable="true" type="q11:ArrayOfstring" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [ConversionPerformanceReportFilter](conversionperformancereportfilter.md) object has the following elements: [AccountStatus](#accountstatus), [AdDistribution](#addistribution), [AdGroupStatus](#adgroupstatus), [CampaignStatus](#campaignstatus), [DeviceType](#devicetype), [Keywords](#keywords), [KeywordStatus](#keywordstatus).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountstatus"></a>AccountStatus|The report will include data for only the account status. For example, you can use the filter to include data for only active accounts.<br/><br/>You can specify one or more account statuses.|[AccountStatusReportFilter](accountstatusreportfilter.md)|
|<a name="addistribution"></a>AdDistribution|The report will include data for only the specified distribution medium. For example, you can use the filter to include data for only search ads.<br/><br/>You can specify one or more distribution mediums.|[AdDistributionReportFilter](addistributionreportfilter.md)|
|<a name="adgroupstatus"></a>AdGroupStatus|The report will include data for only the ad group status. For example, you can use the filter to include data for only active ad groups.<br/><br/>You can specify one or more ad group statuses.|[AdGroupStatusReportFilter](adgroupstatusreportfilter.md)|
|<a name="campaignstatus"></a>CampaignStatus|The report will include data for only the campaign status. For example, you can use the filter to include data for only active campaigns.<br/><br/>You can specify one or more campaign statuses.|[CampaignStatusReportFilter](campaignstatusreportfilter.md)|
|<a name="devicetype"></a>DeviceType|The report will include data for only the specified types of devices on which the ad is displayed. For example, you can use the filter to include data only for expanded text ads displayed on smartphones.<br/><br/>You can specify one or more device types.|[DeviceTypeReportFilter](devicetypereportfilter.md)|
|<a name="keywords"></a>Keywords|The report will include data for only the specified keywords. You can specify a maximum of 75 keywords. Each keyword can contain a maximum of 100 characters.|**string** array|
|<a name="keywordstatus"></a>KeywordStatus|The report will include data for only the keyword status. For example, you can use the filter to include data for only active keywords.<br/><br/>You can specify one or more keyword statuses.|[KeywordStatusReportFilter](keywordstatusreportfilter.md)|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[ConversionPerformanceReportRequest](conversionperformancereportrequest.md)  
