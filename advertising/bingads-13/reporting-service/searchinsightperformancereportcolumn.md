---
title: SearchInsightPerformanceReportColumn Value Set - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the attributes and performance statistics columns that you can include in the SearcyhInsightPerformanceReportRequest.
---
# SearchInsightPerformanceReportColumn Value Set - Reporting
Defines the attributes and performance statistics columns that you can include in the [SearcyhInsightPerformanceReportRequest](searchinsightperformancereportrequest.md).

## Syntax
```xml
<xs:simpleType name="SearchInsightPerformanceReportColumn" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="AccountName" />
    <xs:enumeration value="AccountNumber" />
    <xs:enumeration value="AccountId" />
    <xs:enumeration value="TimePeriod" />
    <xs:enumeration value="CampaignName" />
    <xs:enumeration value="CampaignId" />
    <xs:enumeration value="AdGroupName" />
    <xs:enumeration value="AdGroupId" />
    <xs:enumeration value="CampaignStatus" />
    <xs:enumeration value="Impressions" />
    <xs:enumeration value="Clicks" />
    <xs:enumeration value="Ctr" />
    <xs:enumeration value="Spend" />
    <xs:enumeration value="SearchQuery" />
    <xs:enumeration value="Conversions" />
    <xs:enumeration value="ConversionRate" />
    <xs:enumeration value="Revenue" />
    <xs:enumeration value="ReturnOnAdSpend" />
    <xs:enumeration value="RevenuePerConversion" />
    <xs:enumeration value="AccountStatus" />
    <xs:enumeration value="AdGroupStatus" />
    <xs:enumeration value="CustomerId" />
    <xs:enumeration value="CustomerName" />
    <xs:enumeration value="AssetGroupId" />
    <xs:enumeration value="AssetGroupName" />
    <xs:enumeration value="AssetGroupStatus" />
    <xs:enumeration value="SearchCategory" />
    <xs:enumeration value="SearchVolume" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [SearchInsightPerformanceReportColumn](searchinsightperformancereportcolumn.md) value set has the following values: [AccountId](#accountid), [AccountName](#accountname), [AccountNumber](#accountnumber), [AccountStatus](#accountstatus), [AdGroupId](#adgroupid), [AdGroupName](#adgroupname), [AdGroupStatus](#adgroupstatus), [AssetGroupId](#assetgroupid), [AssetGroupName](#assetgroupname), [AssetGroupStatus](#assetgroupstatus), [CampaignId](#campaignid), [CampaignName](#campaignname), [CampaignStatus](#campaignstatus), [Clicks](#clicks), [ConversionRate](#conversionrate), [Conversions](#conversions), [Ctr](#ctr), [CustomerId](#customerid), [CustomerName](#customername), [Impressions](#impressions), [ReturnOnAdSpend](#returnonadspend), [Revenue](#revenue), [RevenuePerConversion](#revenueperconversion), [SearchCategory](#searchcategory), [SearchQuery](#searchquery), [SearchVolume](#searchvolume), [Spend](#spend), [TimePeriod](#timeperiod).

|Value|Description|
|-----------|---------------|
|<a name="accountid"></a>AccountId|Reserved.|
|<a name="accountname"></a>AccountName|Reserved.|
|<a name="accountnumber"></a>AccountNumber|Reserved.|
|<a name="accountstatus"></a>AccountStatus|Reserved.|
|<a name="adgroupid"></a>AdGroupId|Reserved.|
|<a name="adgroupname"></a>AdGroupName|Reserved.|
|<a name="adgroupstatus"></a>AdGroupStatus|Reserved.|
|<a name="assetgroupid"></a>AssetGroupId|Reserved.|
|<a name="assetgroupname"></a>AssetGroupName|Reserved.|
|<a name="assetgroupstatus"></a>AssetGroupStatus|Reserved.|
|<a name="campaignid"></a>CampaignId|Reserved.|
|<a name="campaignname"></a>CampaignName|Reserved.|
|<a name="campaignstatus"></a>CampaignStatus|Reserved.|
|<a name="clicks"></a>Clicks|Reserved.|
|<a name="conversionrate"></a>ConversionRate|Reserved.|
|<a name="conversions"></a>Conversions|Reserved.|
|<a name="ctr"></a>Ctr|Reserved.|
|<a name="customerid"></a>CustomerId|Reserved.|
|<a name="customername"></a>CustomerName|Reserved.|
|<a name="impressions"></a>Impressions|Reserved.|
|<a name="returnonadspend"></a>ReturnOnAdSpend|Reserved.|
|<a name="revenue"></a>Revenue|Reserved.|
|<a name="revenueperconversion"></a>RevenuePerConversion|Reserved.|
|<a name="searchcategory"></a>SearchCategory|Reserved.|
|<a name="searchquery"></a>SearchQuery|Reserved.|
|<a name="searchvolume"></a>SearchVolume|Reserved.|
|<a name="spend"></a>Spend|Reserved.|
|<a name="timeperiod"></a>TimePeriod|Reserved.|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[SearchInsightPerformanceReportRequest](searchinsightperformancereportrequest.md)  
