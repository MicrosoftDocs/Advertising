---
title: ProductDimensionPerformanceReportFilter Data Object Test - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the criteria to use to filter the product dimension performance report data.(test)
---
# ProductDimensionPerformanceReportFilter Data Object Test - Reporting
Defines the criteria to use to filter the product dimension performance report data.

# [XML](#tab/xml)

```xml
<xs:complexType name="ProductDimensionPerformanceReportFilter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AccountStatus" nillable="true" type="tns:AccountStatusReportFilter" />
    <xs:element minOccurs="0" name="AdGroupStatus" nillable="true" type="tns:AdGroupStatusReportFilter" />
    <xs:element minOccurs="0" name="AdStatus" nillable="true" type="tns:AdStatusReportFilter" />
    <xs:element minOccurs="0" name="AssetGroupStatus" nillable="true" type="tns:AssetGroupStatusReportFilter" />
    <xs:element minOccurs="0" name="CampaignStatus" nillable="true" type="tns:CampaignStatusReportFilter" />
    <xs:element minOccurs="0" name="DeviceType" nillable="true" type="tns:DeviceTypeReportFilter" />
    <xs:element minOccurs="0" name="Language" nillable="true" type="tns:LanguageReportFilter" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AccountStatus": "ValueHere",
  "AdGroupStatus": "ValueHere",
  "AdStatus": "ValueHere",
  "AssetGroupStatus": "ValueHere",
  "CampaignStatus": "ValueHere",
  "DeviceType": "ValueHere",
  "Language": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [ProductDimensionPerformanceReportFilter](productdimensionperformancereportfilter.md) object has the following elements: [AccountStatus](#accountstatus), [AdGroupStatus](#adgroupstatus), [AdStatus](#adstatus), [AssetGroupStatus](#assetgroupstatus), [CampaignStatus](#campaignstatus), [DeviceType](#devicetype), [Language](#language).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountstatus"></a>AccountStatus|The report will include data for only the account status. For example, you can use the filter to include data for only active accounts.<br/><br/>You can specify one or more account statuses.|[AccountStatusReportFilter](accountstatusreportfilter.md)|
|<a name="adgroupstatus"></a>AdGroupStatus|The report will include data for only the ad group status. For example, you can use the filter to include data for only active ad groups.<br/><br/>You can specify one or more ad group statuses.|[AdGroupStatusReportFilter](adgroupstatusreportfilter.md)|
|<a name="adstatus"></a>AdStatus|The report will include data for only the ad status. For example, you can use the filter to include data for only active ads.<br/><br/>You can specify one or more ad statuses.|[AdStatusReportFilter](adstatusreportfilter.md)|
|<a name="assetgroupstatus"></a>AssetGroupStatus|The report will include data for only the asset group status. For example, you can use the filter to include data for only active asset groups.<br/><br/>You can specify one or more asset group statuses.|[AssetGroupStatusReportFilter](assetgroupstatusreportfilter.md)|
|<a name="campaignstatus"></a>CampaignStatus|The report will include data for only the campaign status. For example, you can use the filter to include data for only active campaigns.<br/><br/>You can specify one or more campaign statuses.|[CampaignStatusReportFilter](campaignstatusreportfilter.md)|
|<a name="devicetype"></a>DeviceType|The report will include data for only the specified types of devices on which the ad is displayed. For example, you can use the filter to include data for only ads displayed on computers.<br/><br/>You can specify one or more device types.|[DeviceTypeReportFilter](devicetypereportfilter.md)|
|<a name="language"></a>Language|The report will include data for only websites that used the specified languages.<br/><br/>You can specify one or more languages.|[LanguageReportFilter](languagereportfilter.md)|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[ProductDimensionPerformanceReportRequest](productdimensionperformancereportrequest.md)  
