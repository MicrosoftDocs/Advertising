---
title: MMMPerformanceReportColumn Value Set - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the attributes and performance statistics columns that you can include in the MMMPerformanceReportRequest.
---
# MMMPerformanceReportColumn Value Set - Reporting
Defines the attributes and performance statistics columns that you can include in the [MMMPerformanceReportRequest](mmmperformancereportrequest.md).

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
    <xs:enumeration value="MetroArea" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [MMMPerformanceReportColumn](mmmperformancereportcolumn.md) value set has the following values: [AccountId](#accountid), [AccountName](#accountname), [AccountNumber](#accountnumber), [AdGroupId](#adgroupid), [AdGroupName](#adgroupname), [AssetGroupId](#assetgroupid), [AssetGroupName](#assetgroupname), [CampaignId](#campaignid), [CampaignName](#campaignname), [Clicks](#clicks), [ConversionsQualified](#conversionsqualified), [Country](#country), [Impressions](#impressions), [MetroArea](#metroarea), [Spend](#spend), [State](#state), [TimePeriod](#timeperiod).

|Value|Description|
|-----------|---------------|
|<a name="accountid"></a>AccountId|The Microsoft Advertising assigned identifier of an account.|
|<a name="accountname"></a>AccountName|The account name.|
|<a name="accountnumber"></a>AccountNumber|The Microsoft Advertising assigned number of an account.|
|<a name="adgroupid"></a>AdGroupId|The Microsoft Advertising assigned identifier of an ad group.|
|<a name="adgroupname"></a>AdGroupName|The ad group name.|
|<a name="assetgroupid"></a>AssetGroupId|The Microsoft Advertising assigned identifier of an asset group.|
|<a name="assetgroupname"></a>AssetGroupName|The asset group name|
|<a name="campaignid"></a>CampaignId|The Microsoft Advertising assigned identifier of a campaign.|
|<a name="campaignname"></a>CampaignName|The campaign name.|
|<a name="clicks"></a>Clicks|Clicks are what you pay for. Clicks typically include a customer clicking an ad on a search results page or on a website on the search network. Clicks can also come from other sources (for example, spiders, robots, and test servers). For more information, see [Microsoft Advertising click measurement: description of methodology](https://about.ads.microsoft.com/en-us/resources/policies/microsoft-advertising-click-measurement-description-of-methodology).|
|<a name="conversionsqualified"></a>ConversionsQualified|The number of conversions.<br/><br/>A conversion is the completion of an action by a customer after viewing your ad. The action could be purchasing your product, registering for your webinar, joining an organization, or whatever you consider your goal and best measure of the ad's success.<br/><br/>Conversions are measured by adding a small bit of code to your website pages so that a visitor's progress through your site can be tracked.<br/><br/>You should expect the data type as **double** whether or not there are partial externally attributed offline conversions.<br/><br/>Not everyone has this feature yet. If you don't, don't worry - it's coming soon!|
|<a name="country"></a>Country|The country or region where the user was physically located when they clicked the ad.<br/><br/>The *LocationType* column identifies whether the user was located in, searching for, or viewing pages about the location.|
|<a name="impressions"></a>Impressions|The number of times an ad has been displayed on search results pages. Without impressions there are no clicks or conversions.|
|<a name="metroarea"></a>MetroArea|The metro area (Microsoft Market Area in the United States) where the user was physically located when they clicked the ad.|
|<a name="spend"></a>Spend|The cost per click (CPC) summed for each click.|
|<a name="state"></a>State|The state where the user was physically located when they clicked the ad.<br/><br/>The *LocationType* column identifies whether the user was located in, searching for, or viewing pages about the location.|
|<a name="timeperiod"></a>TimePeriod|The time period of each report row. You may not include this column if the *Aggregation* element of the request object is set to Summary. For more information, see [Time Period Column](../guides/reports.md#timeperiod).|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[MMMPerformanceReportRequest](mmmperformancereportrequest.md)  
