---
title: AssetPerformanceReportColumn Value Set - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a value set for AssetPerformanceReportColumn.
---
# AssetPerformanceReportColumn Value Set - Reporting
Defines a value set for AssetPerformanceReportColumn.

## Syntax
```xml
<xs:simpleType name="AssetPerformanceReportColumn" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="TimePeriod" />
    <xs:enumeration value="AccountId" />
    <xs:enumeration value="AccountName" />
    <xs:enumeration value="CampaignId" />
    <xs:enumeration value="CampaignName" />
    <xs:enumeration value="AdGroupId" />
    <xs:enumeration value="AdGroupName" />
    <xs:enumeration value="AssetId" />
    <xs:enumeration value="AssetContent" />
    <xs:enumeration value="AssetType" />
    <xs:enumeration value="AssetSource" />
    <xs:enumeration value="Impressions" />
    <xs:enumeration value="Clicks" />
    <xs:enumeration value="Ctr" />
    <xs:enumeration value="Spend" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AssetPerformanceReportColumn](assetperformancereportcolumn.md) value set has the following values: [AccountId](#accountid), [AccountName](#accountname), [AdGroupId](#adgroupid), [AdGroupName](#adgroupname), [AssetContent](#assetcontent), [AssetId](#assetid), [AssetSource](#assetsource), [AssetType](#assettype), [CampaignId](#campaignid), [CampaignName](#campaignname), [Clicks](#clicks), [Ctr](#ctr), [Impressions](#impressions), [Spend](#spend), [TimePeriod](#timeperiod).

|Value|Description|
|-----------|---------------|
|<a name="accountid"></a>AccountId|Reserved.|
|<a name="accountname"></a>AccountName|Reserved.|
|<a name="adgroupid"></a>AdGroupId|Reserved.|
|<a name="adgroupname"></a>AdGroupName|Reserved.|
|<a name="assetcontent"></a>AssetContent|Reserved.|
|<a name="assetid"></a>AssetId|Reserved.|
|<a name="assetsource"></a>AssetSource|Reserved.|
|<a name="assettype"></a>AssetType|Reserved.|
|<a name="campaignid"></a>CampaignId|Reserved.|
|<a name="campaignname"></a>CampaignName|Reserved.|
|<a name="clicks"></a>Clicks|Reserved.|
|<a name="ctr"></a>Ctr|Reserved.|
|<a name="impressions"></a>Impressions|Reserved.|
|<a name="spend"></a>Spend|Reserved.|
|<a name="timeperiod"></a>TimePeriod|Reserved.|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[AssetPerformanceReportRequest](assetperformancereportrequest.md)  
