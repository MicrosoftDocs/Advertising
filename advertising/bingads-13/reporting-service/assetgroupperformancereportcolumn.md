---
title: AssetGroupPerformanceReportColumn Value Set - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a value set for AssetGroupPerformanceReportColumn.
---
# AssetGroupPerformanceReportColumn Value Set - Reporting
Defines a value set for AssetGroupPerformanceReportColumn.

## Syntax
```xml
<xs:simpleType name="AssetGroupPerformanceReportColumn" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="TimePeriod" />
    <xs:enumeration value="AccountName" />
    <xs:enumeration value="AccountId" />
    <xs:enumeration value="CampaignName" />
    <xs:enumeration value="CampaignId" />
    <xs:enumeration value="AccountStatus" />
    <xs:enumeration value="CampaignStatus" />
    <xs:enumeration value="AssetGroupId" />
    <xs:enumeration value="AssetGroupName" />
    <xs:enumeration value="AssetGroupStatus" />
    <xs:enumeration value="Impressions" />
    <xs:enumeration value="Clicks" />
    <xs:enumeration value="Ctr" />
    <xs:enumeration value="Spend" />
    <xs:enumeration value="AverageCpc" />
    <xs:enumeration value="Conversions" />
    <xs:enumeration value="Revenue" />
    <xs:enumeration value="ReturnOnAdSpend" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AssetGroupPerformanceReportColumn](assetgroupperformancereportcolumn.md) value set has the following values: [AccountId](#accountid), [AccountName](#accountname), [AccountStatus](#accountstatus), [AssetGroupId](#assetgroupid), [AssetGroupName](#assetgroupname), [AssetGroupStatus](#assetgroupstatus), [AverageCpc](#averagecpc), [CampaignId](#campaignid), [CampaignName](#campaignname), [CampaignStatus](#campaignstatus), [Clicks](#clicks), [Conversions](#conversions), [Ctr](#ctr), [Impressions](#impressions), [ReturnOnAdSpend](#returnonadspend), [Revenue](#revenue), [Spend](#spend), [TimePeriod](#timeperiod).

|Value|Description|
|-----------|---------------|
|<a name="accountid"></a>AccountId|Reserved.|
|<a name="accountname"></a>AccountName|Reserved.|
|<a name="accountstatus"></a>AccountStatus|Reserved.|
|<a name="assetgroupid"></a>AssetGroupId|Reserved.|
|<a name="assetgroupname"></a>AssetGroupName|Reserved.|
|<a name="assetgroupstatus"></a>AssetGroupStatus|Reserved.|
|<a name="averagecpc"></a>AverageCpc|Reserved.|
|<a name="campaignid"></a>CampaignId|Reserved.|
|<a name="campaignname"></a>CampaignName|Reserved.|
|<a name="campaignstatus"></a>CampaignStatus|Reserved.|
|<a name="clicks"></a>Clicks|Reserved.|
|<a name="conversions"></a>Conversions|Reserved.|
|<a name="ctr"></a>Ctr|Reserved.|
|<a name="impressions"></a>Impressions|Reserved.|
|<a name="returnonadspend"></a>ReturnOnAdSpend|Reserved.|
|<a name="revenue"></a>Revenue|Reserved.|
|<a name="spend"></a>Spend|Reserved.|
|<a name="timeperiod"></a>TimePeriod|Reserved.|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[AssetGroupPerformanceReportRequest](assetgroupperformancereportrequest.md)  
