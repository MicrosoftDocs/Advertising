---
title: CombinationPerformanceReportColumn Value Set - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the attributes and performance statistics columns that you can include in the CombinationPerformanceReportRequest.
---
# CombinationPerformanceReportColumn Value Set - Reporting
Defines the attributes and performance statistics columns that you can include in the CombinationPerformanceReportRequest.

## Syntax
```xml
<xs:simpleType name="CombinationPerformanceReportColumn" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="TimePeriod" />
    <xs:enumeration value="AccountId" />
    <xs:enumeration value="AccountName" />
    <xs:enumeration value="CampaignId" />
    <xs:enumeration value="CampaignName" />
    <xs:enumeration value="CampaignType" />
    <xs:enumeration value="AdGroupId" />
    <xs:enumeration value="AdGroupName" />
    <xs:enumeration value="AssetGroupId" />
    <xs:enumeration value="AssetGroupName" />
    <xs:enumeration value="AdId" />
    <xs:enumeration value="AdType" />
    <xs:enumeration value="Headline1" />
    <xs:enumeration value="Headline2" />
    <xs:enumeration value="Headline3" />
    <xs:enumeration value="CombinationLongHeadline" />
    <xs:enumeration value="Description1" />
    <xs:enumeration value="Description2" />
    <xs:enumeration value="Image" />
    <xs:enumeration value="Logo" />
    <xs:enumeration value="Impressions" />
    <xs:enumeration value="Clicks" />
    <xs:enumeration value="Spend" />
    <xs:enumeration value="Ctr" />
    <xs:enumeration value="Conversions" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [CombinationPerformanceReportColumn](combinationperformancereportcolumn.md) value set has the following values: [AccountId](#accountid), [AccountName](#accountname), [AdGroupId](#adgroupid), [AdGroupName](#adgroupname), [AdId](#adid), [AdType](#adtype), [AssetGroupId](#assetgroupid), [AssetGroupName](#assetgroupname), [CampaignId](#campaignid), [CampaignName](#campaignname), [CampaignType](#campaigntype), [Clicks](#clicks), [CombinationLongHeadline](#combinationlongheadline), [Conversions](#conversions), [Ctr](#ctr), [Description1](#description1), [Description2](#description2), [Headline1](#headline1), [Headline2](#headline2), [Headline3](#headline3), [Image](#image), [Impressions](#impressions), [Logo](#logo), [Spend](#spend), [TimePeriod](#timeperiod).

|Value|Description|
|-----------|---------------|
|<a name="accountid"></a>AccountId|The Microsoft Advertising assigned identifier of an account.|
|<a name="accountname"></a>AccountName|The account name.|
|<a name="adgroupid"></a>AdGroupId|The Microsoft Advertising assigned identifier of an ad group.|
|<a name="adgroupname"></a>AdGroupName|The ad group name.|
|<a name="adid"></a>AdId|The Microsoft Advertising assigned identifier of an ad.|
|<a name="adtype"></a>AdType|The ad type.|
|<a name="assetgroupid"></a>AssetGroupId|The Microsoft Advertising assigned identifier of an asset group.|
|<a name="assetgroupname"></a>AssetGroupName|The asset group name.|
|<a name="campaignid"></a>CampaignId|The Microsoft Advertising assigned identifier of a campaign.|
|<a name="campaignname"></a>CampaignName|The campaign name.|
|<a name="campaigntype"></a>CampaignType|The campaign type.|
|<a name="clicks"></a>Clicks|Clicks are what you pay for. Clicks typically include a customer clicking an ad on a search results page or on a website on the search network. Clicks can also come from other sources (for example, spiders, robots, and test servers). For more information, see [Microsoft Advertising click measurement: description of methodology](https://about.ads.microsoft.com/resources/policies/microsoft-advertising-click-measurement-description-of-methodology).|
|<a name="combinationlongheadline"></a>CombinationLongHeadline|The content of the long headline asset in a combination record.|
|<a name="conversions"></a>Conversions|The number of conversions.<br/><br/>A conversion is the completion of an action by a customer after viewing your ad. The action could be purchasing your product, registering for your webinar, joining an organization, or whatever you consider your goal and best measure of the ad's success.<br/><br/>Conversions are measured by adding a small bit of code to your website pages so that a visitor's progress through your site can be tracked.|
|<a name="ctr"></a>Ctr|The click-through rate (CTR) is the number of times an ad was clicked, divided by the number of times the ad was shown (impressions). For example, if your ads got 50 clicks given 2,348 impressions, your CTR is 2.13 (%). The formula for calculating CTR is (Clicks / Impressions) x 100.|
|<a name="description1"></a>Description1|Reserved.|
|<a name="description2"></a>Description2|Reserved.|
|<a name="headline1"></a>Headline1|The content of the headline 1 asset in a combination record.|
|<a name="headline2"></a>Headline2|The content of the headline 2 asset in a combination record.|
|<a name="headline3"></a>Headline3|The content of the headline 3 asset in a combination record |
|<a name="image"></a>Image|The image URL of the image asset in a combination record.|
|<a name="impressions"></a>Impressions|The number of times an ad has been displayed on search results pages. Without impressions, there are no clicks or conversions.|
|<a name="logo"></a>Logo|The image URL of the logo asset in a combination record.|
|<a name="spend"></a>Spend|The cost per click (CPC) summed for each click.|
|<a name="timeperiod"></a>TimePeriod|The time period of each report row. You may not include this column if the Aggregation element of the request object is set to Summa*ry. For more information, see [Time Period Column.](../guides/reports.md#timeperiod)|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[CombinationPerformanceReportRequest](combinationperformancereportrequest.md)  
