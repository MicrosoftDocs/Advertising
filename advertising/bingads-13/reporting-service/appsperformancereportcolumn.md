---
title: AppsPerformanceReportColumn Value Set - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the attributes and performance statistics columns that you can include in the AppsPerformanceReportRequest.
---
# AppsPerformanceReportColumn Value Set - Reporting
Defines the attributes and performance statistics columns that you can include in the AppsPerformanceReportRequest.

## Syntax
```xml
<xs:simpleType name="AppsPerformanceReportColumn" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="TimePeriod" />
    <xs:enumeration value="AccountId" />
    <xs:enumeration value="AccountName" />
    <xs:enumeration value="AccountNumber" />
    <xs:enumeration value="AccountStatus" />
    <xs:enumeration value="CampaignId" />
    <xs:enumeration value="CampaignName" />
    <xs:enumeration value="CampaignStatus" />
    <xs:enumeration value="AssetGroupId" />
    <xs:enumeration value="AssetGroupName" />
    <xs:enumeration value="AssetGroupStatus" />
    <xs:enumeration value="CurrencyCode" />
    <xs:enumeration value="Language" />
    <xs:enumeration value="BidStrategyType" />
    <xs:enumeration value="Goal" />
    <xs:enumeration value="GoalType" />
    <xs:enumeration value="Impressions" />
    <xs:enumeration value="Clicks" />
    <xs:enumeration value="Ctr" />
    <xs:enumeration value="AverageCpc" />
    <xs:enumeration value="Spend" />
    <xs:enumeration value="AverageCpm" />
    <xs:enumeration value="AllConversions" />
    <xs:enumeration value="AllCostPerConversion" />
    <xs:enumeration value="AllConversionRate" />
    <xs:enumeration value="Conversions" />
    <xs:enumeration value="ConversionRate" />
    <xs:enumeration value="CostPerConversion" />
    <xs:enumeration value="ViewThroughConversions" />
    <xs:enumeration value="ViewThroughConversionRate" />
    <xs:enumeration value="ViewThroughCostPerConversion" />
    <xs:enumeration value="Downloads" />
    <xs:enumeration value="PostClickDownloadRate" />
    <xs:enumeration value="CostPerDownload" />
    <xs:enumeration value="AppInstalls" />
    <xs:enumeration value="PostClickInstallRate" />
    <xs:enumeration value="CPI" />
    <xs:enumeration value="Purchases" />
    <xs:enumeration value="PostInstallPurchaseRate" />
    <xs:enumeration value="CPP" />
    <xs:enumeration value="Subscriptions" />
    <xs:enumeration value="PostInstallSubscriptionRate" />
    <xs:enumeration value="CPS" />
    <xs:enumeration value="Revenue" />
    <xs:enumeration value="ReturnOnAdSpend" />
    <xs:enumeration value="RevenuePerDownload" />
    <xs:enumeration value="RevenuePerAppInstall" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AppsPerformanceReportColumn](appsperformancereportcolumn.md) value set has the following values: [AccountId](#accountid), [AccountName](#accountname), [AccountNumber](#accountnumber), [AccountStatus](#accountstatus), [AllConversionRate](#allconversionrate), [AllConversions](#allconversions), [AllCostPerConversion](#allcostperconversion), [AppInstalls](#appinstalls), [AssetGroupId](#assetgroupid), [AssetGroupName](#assetgroupname), [AssetGroupStatus](#assetgroupstatus), [AverageCpc](#averagecpc), [AverageCpm](#averagecpm), [BidStrategyType](#bidstrategytype), [CampaignId](#campaignid), [CampaignName](#campaignname), [CampaignStatus](#campaignstatus), [Clicks](#clicks), [ConversionRate](#conversionrate), [Conversions](#conversions), [CostPerConversion](#costperconversion), [CostPerDownload](#costperdownload), [CPI](#cpi), [CPP](#cpp), [CPS](#cps), [Ctr](#ctr), [CurrencyCode](#currencycode), [Downloads](#downloads), [Goal](#goal), [GoalType](#goaltype), [Impressions](#impressions), [Language](#language), [PostClickDownloadRate](#postclickdownloadrate), [PostClickInstallRate](#postclickinstallrate), [PostInstallPurchaseRate](#postinstallpurchaserate), [PostInstallSubscriptionRate](#postinstallsubscriptionrate), [Purchases](#purchases), [ReturnOnAdSpend](#returnonadspend), [Revenue](#revenue), [RevenuePerAppInstall](#revenueperappinstall), [RevenuePerDownload](#revenueperdownload), [Spend](#spend), [Subscriptions](#subscriptions), [TimePeriod](#timeperiod), [ViewThroughConversionRate](#viewthroughconversionrate), [ViewThroughConversions](#viewthroughconversions), [ViewThroughCostPerConversion](#viewthroughcostperconversion).

|Value|Description|
|-----------|---------------|
|<a name="accountid"></a>AccountId|The Microsoft Advertising assigned identifier of an account.|
|<a name="accountname"></a>AccountName|The account name.|
|<a name="accountnumber"></a>AccountNumber|The Microsoft Advertising assigned number of an account.|
|<a name="accountstatus"></a>AccountStatus|The account status.|
|<a name="allconversionrate"></a>AllConversionRate|The conversion rate as a percentage.<br/><br/>The number of conversions, divided by the total number of clicks. For example, if the ads in your campaign got 300 clicks and four conversions, the conversion rate is 1.33 (%).<br/><br/>The formula for calculating the conversion rate is (Conversions / Clicks) x 100.<br/><br/>Data will be excluded from the [ConversionRate](#conversionrate) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllConversionRate](#allconversionrate) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="allconversions"></a>AllConversions|The number of conversions.<br/><br/>A conversion is the completion of an action by a customer after viewing your ad. The action could be purchasing your product, registering for your webinar, joining an organization, or whatever you consider your goal and best measure of the ad's success.<br/><br/>Conversions are measured by adding a small bit of code to your website pages so that a visitor's progress through your site can be tracked.<br/><br/>Data will be excluded from the [Conversions](#conversions) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllConversions](#allconversions) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.<br/><br/>This column is deprecated as of 2022, so you should use the [AllConversionsQualified](#allconversionsqualified) column instead. Going forward, performance reports will return "0" (zero) in this column. Historical data for time periods prior to the deprecation date will still be available according to the published [data retention period](../guides/report-data-retention-time-periods.md).|
|<a name="allcostperconversion"></a>AllCostPerConversion|The cost per conversion.<br/><br/>The formula for calculating the cost per conversion is (Spend / Conversions). Only ads in campaigns that enable conversion tracking contribute to the conversion number, so unless all campaigns in the account enable conversion tracking, the number will not be accurate.<br/><br/>Data will be excluded from the [CostPerConversion](#costperconversion) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllCostPerConversion](#allcostperconversion) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="appinstalls"></a>AppInstalls|The number of times customers install apps through your ads.|
|<a name="assetgroupid"></a>AssetGroupId|The Microsoft Advertising assigned identifier of an asset group.|
|<a name="assetgroupname"></a>AssetGroupName|The asset group name.|
|<a name="assetgroupstatus"></a>AssetGroupStatus|The asset group status.|
|<a name="averagecpc"></a>AverageCpc|The average cost per click (CPC). The total cost of all clicks on an ad divided by the number of clicks. This is the average amount you're actually charged each time your ad is clicked. For example, if you paid a total of 48.35 for 300 clicks, your average CPC is 0.16. The formula for calculating the average CPC is *(Spend / Clicks)*.|
|<a name="averagecpm"></a>AverageCpm|The total advertising cost divided by the number of impressions (in thousands).<br/<br/>In Latin, mille means a thousand. Also, sometimes called average cost per thousand (CPT).<br/><br/>This is a standard advertising industry performance metric that we calculate based on your spend and number of impressions.<br/><br/>The goal of CPM-based ad budgeting is to build awareness of your brand to large audiences. CPM tells you how much it costs to get an ad to the type of users you're targeting.|
|<a name="bidstrategytype"></a>BidStrategyType|The bid strategy type. Possible values include *EnhancedCpc*, *ManualCpc*, *MaxClicks*, *MaxConversions*, and *TargetCpa*. If the *InheritFromParent* strategy type is used, the report will include the inherited bid strategy type e.g., one of the supported values listed above.|
|<a name="campaignid"></a>CampaignId|The Microsoft Advertising assigned identifier of a campaign.|
|<a name="campaignname"></a>CampaignName|The campaign name.|
|<a name="campaignstatus"></a>CampaignStatus|The campaign status.|
|<a name="clicks"></a>Clicks|Clicks are what you pay for.<br/>Clicks typically include a customer clicking an ad on a search results page or on a website on the search network. Clicks can also come from other sources (for example, spiders, robots, and test servers).<br/>You pay for clicks on standard-quality clicks, not on low-quality or invalid clicks.|
|<a name="conversionrate"></a>ConversionRate|The conversion rate as a percentage.<br/><br/>The number of conversions, divided by the total number of clicks. For example, if the ads in your campaign got 300 clicks and four conversions, the conversion rate is 1.33 (%).<br/><br/>The formula for calculating the conversion rate is (Conversions / Clicks) x 100.|
|<a name="conversions"></a>Conversions|The number of conversions.<br/><br/>A conversion is the completion of an action by a customer after viewing your ad. The action could be purchasing your product, registering for your webinar, joining an organization, or whatever you consider your goal and best measure of the ad's success.<br/><br/>Conversions are measured by adding a small bit of code to your website pages so that a visitor's progress through your site can be tracked.|
|<a name="costperconversion"></a>CostPerConversion|The cost per conversion.<br/><br/>The formula for calculating the cost per conversion is (Spend / Conversions). Only ads in campaigns that enable conversion tracking contribute to the conversion number, so unless all campaigns in the account enable conversion tracking, the number will not be accurate.|
|<a name="costperdownload"></a>CostPerDownload|The average amount you're charged each time your ad is downloaded.<br /><br/>The total cost of all downloads on an ad, divided by the number of downloads during a specific period.|
|<a name="cpi"></a>CPI|Cost per install.<br/><br/>The average amount of money you're charged for each app install.|
|<a name="cpp"></a>CPP|Cost per in-app purchase.<br/><br/>The average amount of money you're charged for each in-app purchase.|
|<a name="cps"></a>CPS|Cost per in-app subscription.<br/><br/>The average amount of money you're charged for each app subscription.|
|<a name="ctr"></a>Ctr|The click-through rate (CTR) is the number of times an ad was clicked, divided by the number of times the ad was shown (*Impressions*). For example, if your ads got 50 clicks given 2,348 impressions, your CTR is 2.13 (%). The formula for calculating CTR is (*Clicks / Impressions*) x 100.|
|<a name="currencycode"></a>CurrencyCode|The account currency type. For possible values, see [Currencies](../guides/currencies.md).|
|<a name="downloads"></a>Downloads|The number of times customers download apps through your ads.|
|<a name="goal"></a>Goal|The name of the goal you set for the conversions you want, meaning actions customers take after clicking your ad.|
|<a name="goaltype"></a>GoalType|The type of conversion goal.<br/><br/>Possible values include *AppInstall*, *Duration*, *Event*, *InStoreTransaction*, *OfflineConversion*, *PagesViewedPerVisit*, and *Url*.|
|<a name="impressions"></a>Impressions|The number of times an ad has been displayed on search results pages. Without impressions there are no clicks or conversions. |
|<a name="language"></a>Language|The language of the publisher where the ad was shown.<br/><br/>For possible values, see the Language column of [Ad Languages](../guides/ad-languages.md#language). The language display name will be provided in the report e.g., English.|
|<a name="postclickdownloadrate"></a>PostClickDownloadRate|The post-click download rate as a percentage.<br/><br/>The number of downloads, divided by the total number of ad clicks. For example, if the ads in your campaign received 300 clicks and four downloads, the download rate would be 1.33%.|
|<a name="postclickinstallrate"></a>PostClickInstallRate|The post-click install rate as a percentage.<br/><br/>The number of installs, divided by the total number of clicks. For example, if the ads in your campaign received 300 clicks and four installs, the rate would be 1.33%.|
|<a name="postinstallpurchaserate"></a>PostInstallPurchaseRate|The post-install purchase rate as a percentage.<br/><br/>The number of in-app purchases, divided by the total number of installs. For example, if the ads in your campaign received 300 installs and four in-app purchases, the install rate would be 1.33%.|
|<a name="postinstallsubscriptionrate"></a>PostInstallSubscriptionRate|The post-install subscription rate as a percentage.<br/><br/>The number of subscriptions, divided by the total number of installs. For example, if the ads in your campaign receive 300 installs and four subscriptions, the install rate would be 1.33%.|
|<a name="purchases"></a>Purchases|The number of times customers use your ads to make a purchase in your app.|
|<a name="returnonadspend"></a>ReturnOnAdSpend|The return on ad spend (ROAS).<br/><br/>The formula for calculating the ROAS is *(Revenue / Spend)*.<br/><br/>Data will be excluded from the ReturnOnAdSpend report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The AllReturnOnAdSpend column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="revenue"></a>Revenue|The revenue optionally reported by the advertiser as a result of conversions.<br/><br/>Data will be excluded from the Revenue report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The AllRevenue column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="revenueperappinstall"></a>RevenuePerAppInstall|The average amount of revenue made for each install.<br/><br/>The formula for calculating *RevenuePerAppInstall* is (total revenue generated by the ads / number of installs).|
|<a name="revenueperdownload"></a>RevenuePerDownload|The average amount of revenue made for each download.<br/><br/>The formula for calculating *RevenuePerDownload* is (total revenue generated by the ads / number of downloads).|
|<a name="spend"></a>Spend|The cost per click (CPC) summed for each click.|
|<a name="subscriptions"></a>Subscriptions|The number of times customers use your ads to purchase a subscription in your game.|
|<a name="timeperiod"></a>TimePeriod|The time period of each report row.<br/><br/>You may not include this column if the *Aggregation* element of the request object is set to Summary. If you include the *TimePeriod* column, the column label in the downloaded report depends on the aggregation level that you specify in the report request. For more information, see [Time Period Column](reports.md#timeperiod).|
|<a name="viewthroughconversionrate"></a>ViewThroughConversionRate|The number of ad views, divided by the number of impressions.|
|<a name="viewthroughconversions"></a>ViewThroughConversions|View-through conversions are conversions that people make after they have seen your ad, even though they did not click the ad.<br/><br/>View-through conversions don't have a click associated but do have an impression associated within the advertiser defined conversion window. If the user also clicked on an ad that was delivered via the Microsoft Audience or Search network, there won't be any view-through conversion counted. Only the click-based conversion would be counted.<br/><br/>View-through conversions are only counted for ads in the Microsoft Audience network.<br/><br/>This column is deprecated as of 2022, so you should use the [ViewThroughConversionsQualified](#viewthroughconversionsqualified) column instead. Going forward, performance reports will return "0" (zero) in this column. Historical data for time periods prior to the deprecation date will still be available according to the published [data retention period](../guides/report-data-retention-time-periods.md).|
|<a name="viewthroughcostperconversion"></a>ViewThroughCostPerConversion|The cost per conversion that people make after they have seen your ad, even though they did not click the ad.|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[AppsPerformanceReportRequest](appsperformancereportrequest.md)  
