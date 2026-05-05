---
title: MSClickIdPerformanceReportColumn Value Set - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a report that provides detailed insights into individual clicks and ad performance.
---
# MSClickIdPerformanceReportColumn Value Set - Reporting
Defines a report that provides detailed insights into individual clicks and ad performance.

## Syntax
```xml
<xs:simpleType name="MSClickIdPerformanceReportColumn" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="TimePeriod" />
    <xs:enumeration value="AccountId" />
    <xs:enumeration value="CampaignId" />
    <xs:enumeration value="AdGroupId" />
    <xs:enumeration value="AssetGroupId" />
    <xs:enumeration value="AdId" />
    <xs:enumeration value="MSClickId" />
    <xs:enumeration value="SearchQuery" />
    <xs:enumeration value="Keyword" />
    <xs:enumeration value="PageNumber" />
    <xs:enumeration value="TopVsOther" />
    <xs:enumeration value="BidMatchType" />
    <xs:enumeration value="Network" />
    <xs:enumeration value="DeviceType" />
    <xs:enumeration value="Country" />
    <xs:enumeration value="State" />
    <xs:enumeration value="MetroArea" />
    <xs:enumeration value="City" />
    <xs:enumeration value="Clicks" />
    <xs:enumeration value="AverageCpc" />
    <xs:enumeration value="ConversionsQualified" />
    <xs:enumeration value="Revenue" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [MSClickIdPerformanceReportColumn](msclickidperformancereportcolumn.md) value set has the following values: [AccountId](#accountid), [AdGroupId](#adgroupid), [AdId](#adid), [AssetGroupId](#assetgroupid), [AverageCpc](#averagecpc), [BidMatchType](#bidmatchtype), [CampaignId](#campaignid), [City](#city), [Clicks](#clicks), [ConversionsQualified](#conversionsqualified), [Country](#country), [DeviceType](#devicetype), [Keyword](#keyword), [MetroArea](#metroarea), [MSClickId](#msclickid), [Network](#network), [PageNumber](#pagenumber), [Revenue](#revenue), [SearchQuery](#searchquery), [State](#state), [TimePeriod](#timeperiod), [TopVsOther](#topvsother).

|Value|Description|
|-----------|---------------|
|<a name="accountid"></a>AccountId|The Microsoft Advertising assigned identifier of an account.|
|<a name="adgroupid"></a>AdGroupId|The Microsoft Advertising assigned identifier of an ad group.|
|<a name="adid"></a>AdId|The Microsoft Advertising assigned identifier of an ad.|
|<a name="assetgroupid"></a>AssetGroupId|The Microsoft Advertising assigned identifier of an asset group.|
|<a name="averagecpc"></a>AverageCpc|The average cost per click (CPC). The total cost of all clicks on an ad divided by the number of clicks. This is the average amount you're actually charged each time your ad is clicked. For example, if you paid a total of 48.35 for 300 clicks, your average CPC is 0.16. The formula for calculating the average CPC is *(Spend /Clicks)*.|
|<a name="bidmatchtype"></a>BidMatchType|The keyword bid match type. This can be different from the *DeliveredMatchType* column, for example if you bid on a broad match and the search term was an exact match. For more information, see [Budget and Bid Strategies](../guides/budget-bid-strategies.md). The possible values are *Broad*, *Exact*, *Phrase*, and *Unknown*.|
|<a name="campaignid"></a>CampaignId|The Microsoft Advertising assigned identifier of a campaign.|
|<a name="city"></a>City|The city where the user was physically located when they clicked the ad.</br></br>  The *LocationType* column identifies whether the user was located in, searching for, or viewing pages about the location.|
|<a name="clicks"></a>Clicks|Clicks are what you pay for. Clicks typically include a customer clicking an ad on a search results page or on a website on the search network. Clicks can also come from other sources (for example, spiders, robots, and test servers). For more information, see [Microsoft Advertising click measurement: description of methodology](https://about.ads.microsoft.com/en-us/resources/policies/microsoft-advertising-click-measurement-description-of-methodology).|
|<a name="conversionsqualified"></a>ConversionsQualified|The number of conversions.<br/><br/>A conversion is the completion of an action by a customer after viewing your ad. The action could be purchasing your product, registering for your webinar, joining an organization, or whatever you consider your goal and best measure of the ad's success.<br/><br/>Conversions are measured by adding a small bit of code to your website pages so that a visitor's progress through your site can be tracked<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.<br/><br/>You should expect the data type as **double** whether or not there are partial externally attributed offline conversions.<br/><br/>Not everyone has this feature yet. If you don't, don't worry - it's coming soon!|
|<a name="country"></a>Country|The country or region where the user was physically located when they clicked the ad.<br/><br/>The *LocationType* column identifies whether the user was located in, searching for, or viewing pages about the location.|
|<a name="devicetype"></a>DeviceType|The device name attribute of a device OS target bid. The type of device which showed ads. The possible values include *Computer*, *Smartphone*, *Tablet*, and *Unknown*.|
|<a name="keyword"></a>Keyword|The keyword text.|
|<a name="metroarea"></a>MetroArea|The metro area (Microsoft Market Area in the United States) where the user was physically located when they clicked the ad.<br/><br/>The *LocationType* column identifies whether the user was located in, searching for, or viewing pages about the location.|
|<a name="msclickid"></a>MSClickId|The MSClickID identifier for an ad click event.|
|<a name="network"></a>Network|The entire Microsoft Advertising Network made up of Microsoft sites and select traffic, cross-network traffic, and only partner traffic (this network type is deprecated as of July 2024). Use this data to make the best decision on network selection for your ad groups. The possible values include AOL search, Audience, Microsoft sites and select traffic, Content, and Syndicated search partners.<br/><br/>*Note*: Not everyone can use the value *Microsoft sites and select traffic* yet. If you can't, don't worry - it's coming soon!|
|<a name="pagenumber"></a>PageNumber|The page number in the search results where the ad appeared.|
|<a name="revenue"></a>Revenue|The revenue optionally reported by the advertiser as a result of conversions<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="searchquery"></a>SearchQuery|The search term used by your potential audience.|
|<a name="spend"></a>Spend|The cost per click (CPC) summed for each click.|
|<a name="state"></a>State|The state where the user was physically located when they clicked the ad.<br/><br/>The *LocationType* column identifies whether the user was located in, searching for, or viewing pages about the location.|
|<a name="timeperiod"></a>TimePeriod|The time period of each report row. You may not include this column if the *Aggregation* element of the request object is set to Summary. For more information, see [Time Period Column](../guides/reports.md#timeperiod).|
|<a name="topvsother"></a>TopVsOther|Indicates whether the ad impression appeared in a top position or elsewhere. The possible values include AOL search - Top, AOL search - Other, Audience network, Bing and Yahoo! search - Top, Bing and Yahoo! search - Other, Syndicated search partners - Top, Syndicated search partners - Other, Content network, and Unknown.|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[MSClickIdPerformanceReportRequest](msclickidperformancereportrequest.md)  
