---
title: MMMPerformanceReportColumn Value Set - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Reserved.
---
# MMMPerformanceReportColumn Value Set - Reporting
Reserved.

## Syntax
```xml
<xs:simpleType name="MMMPerformanceReportColumn" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="TimePeriod" />
    <xs:enumeration value="CampaignId" />
    <xs:enumeration value="CampaignName" />
    <xs:enumeration value="AdGroupId" />
    <xs:enumeration value="AdGroupName" />
    <xs:enumeration value="AssetGroupId" />
    <xs:enumeration value="AssetGroupName" />
    <xs:enumeration value="AccountId" />
    <xs:enumeration value="AccountName" />
    <xs:enumeration value="AccountNumber" />
    <xs:enumeration value="Country" />
    <xs:enumeration value="State" />
    <xs:enumeration value="Impressions" />
    <xs:enumeration value="Clicks" />
    <xs:enumeration value="Spend" />
    <xs:enumeration value="ConversionsQualified" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [MMMPerformanceReportColumn](mmmperformancereportcolumn.md) value set has the following values: [AccountId](#accountid), [AccountName](#accountname), [AccountNumber](#accountnumber), [AdGroupId](#adgroupid), [AdGroupName](#adgroupname), [AssetGroupId](#assetgroupid), [AssetGroupName](#assetgroupname), [CampaignId](#campaignid), [CampaignName](#campaignname), [Clicks](#clicks), [ConversionsQualified](#conversionsqualified), [Country](#country), [Impressions](#impressions), [Spend](#spend), [State](#state), [TimePeriod](#timeperiod).

|Value|Description|
|-----------|---------------|
|<a name="accountid"></a>AccountId|Reserved.|
|<a name="accountname"></a>AccountName|Reserved.|
|<a name="accountnumber"></a>AccountNumber|Reserved.|
|<a name="adgroupid"></a>AdGroupId|Reserved.|
|<a name="adgroupname"></a>AdGroupName|Reserved.|
|<a name="assetgroupid"></a>AssetGroupId|Reserved.|
|<a name="assetgroupname"></a>AssetGroupName|Reserved.|
|<a name="campaignid"></a>CampaignId|Reserved.|
|<a name="campaignname"></a>CampaignName|Reserved.|
|<a name="clicks"></a>Clicks|Reserved.|
|<a name="conversionsqualified"></a>ConversionsQualified|Reserved.|
|<a name="country"></a>Country|Reserved.|
|<a name="impressions"></a>Impressions|Reserved.|
|<a name="spend"></a>Spend|Reserved.|
|<a name="state"></a>State|Reserved.|
|<a name="timeperiod"></a>TimePeriod|Reserved.|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[MMMPerformanceReportRequest](mmmperformancereportrequest.md)  
