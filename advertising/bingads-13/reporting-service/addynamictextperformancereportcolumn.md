---
title: AdDynamicTextPerformanceReportColumn Value Set - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the attributes and performance statistics columns that you can include in the AdDynamicTextPerformanceReportRequest Data Object.
---
# AdDynamicTextPerformanceReportColumn Value Set - Reporting
Defines the attributes and performance statistics columns that you can include in the [AdDynamicTextPerformanceReportRequest Data Object](addynamictextperformancereportrequest.md).

The attribute columns that you include in a report can affect how the statistics are aggregated. In other words the number of rows increase by a factor of the unique attributes. For more information, see [Columns that Group the Data](../guides/reports.md#columnsdata).

For a list of columns that you must include, please see the [Required Columns](#requiredcolumns) section below.

To see how far back hourly, daily, weekly, monthly, yearly and summary aggregated data can be retrieved for a report, see [Report Data Retention Time Periods](../guides/report-data-retention-time-periods.md).

## Syntax
```xml
<xs:simpleType name="AdDynamicTextPerformanceReportColumn" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="AccountName" />
    <xs:enumeration value="AccountId" />
    <xs:enumeration value="AccountNumber" />
    <xs:enumeration value="TimePeriod" />
    <xs:enumeration value="AdGroupName" />
    <xs:enumeration value="AdGroupId" />
    <xs:enumeration value="Keyword" />
    <xs:enumeration value="AdId" />
    <xs:enumeration value="AdTitle" />
    <xs:enumeration value="AdType" />
    <xs:enumeration value="DestinationUrl" />
    <xs:enumeration value="Param1" />
    <xs:enumeration value="Param2" />
    <xs:enumeration value="Param3" />
    <xs:enumeration value="CurrencyCode" />
    <xs:enumeration value="AdDistribution" />
    <xs:enumeration value="Impressions" />
    <xs:enumeration value="Clicks" />
    <xs:enumeration value="Ctr" />
    <xs:enumeration value="AverageCpc" />
    <xs:enumeration value="Spend" />
    <xs:enumeration value="AveragePosition" />
    <xs:enumeration value="Conversions" />
    <xs:enumeration value="ConversionRate" />
    <xs:enumeration value="CostPerConversion" />
    <xs:enumeration value="DeviceType" />
    <xs:enumeration value="Language" />
    <xs:enumeration value="AccountStatus" />
    <xs:enumeration value="AdGroupStatus" />
    <xs:enumeration value="AdStatus" />
    <xs:enumeration value="KeywordStatus" />
    <xs:enumeration value="TitlePart1" />
    <xs:enumeration value="TitlePart2" />
    <xs:enumeration value="TitlePart3" />
    <xs:enumeration value="Path1" />
    <xs:enumeration value="Path2" />
    <xs:enumeration value="FinalUrl" />
    <xs:enumeration value="FinalMobileUrl" />
    <xs:enumeration value="FinalAppUrl" />
    <xs:enumeration value="AdDescription" />
    <xs:enumeration value="AdDescription2" />
    <xs:enumeration value="AdLabels" />
    <xs:enumeration value="AllConversions" />
    <xs:enumeration value="AllConversionRate" />
    <xs:enumeration value="AllCostPerConversion" />
    <xs:enumeration value="ViewThroughConversions" />
    <xs:enumeration value="Goal" />
    <xs:enumeration value="GoalType" />
    <xs:enumeration value="AbsoluteTopImpressionRatePercent" />
    <xs:enumeration value="TopImpressionRatePercent" />
    <xs:enumeration value="AverageCpm" />
    <xs:enumeration value="ConversionsQualified" />
    <xs:enumeration value="AllConversionsQualified" />
    <xs:enumeration value="ViewThroughConversionsQualified" />
    <xs:enumeration value="ViewThroughRevenue" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AdDynamicTextPerformanceReportColumn](addynamictextperformancereportcolumn.md) value set has the following values: [AbsoluteTopImpressionRatePercent](#absolutetopimpressionratepercent), [AccountId](#accountid), [AccountName](#accountname), [AccountNumber](#accountnumber), [AccountStatus](#accountstatus), [AdDescription](#addescription), [AdDescription2](#addescription2), [AdDistribution](#addistribution), [AdGroupId](#adgroupid), [AdGroupName](#adgroupname), [AdGroupStatus](#adgroupstatus), [AdId](#adid), [AdLabels](#adlabels), [AdStatus](#adstatus), [AdTitle](#adtitle), [AdType](#adtype), [AllConversionRate](#allconversionrate), [AllConversions](#allconversions), [AllConversionsQualified](#allconversionsqualified), [AllCostPerConversion](#allcostperconversion), [AverageCpc](#averagecpc), [AverageCpm](#averagecpm), [AveragePosition](#averageposition), [Clicks](#clicks), [ConversionRate](#conversionrate), [Conversions](#conversions), [ConversionsQualified](#conversionsqualified), [CostPerConversion](#costperconversion), [Ctr](#ctr), [CurrencyCode](#currencycode), [DestinationUrl](#destinationurl), [DeviceType](#devicetype), [FinalAppUrl](#finalappurl), [FinalMobileUrl](#finalmobileurl), [FinalUrl](#finalurl), [Goal](#goal), [GoalType](#goaltype), [Impressions](#impressions), [Keyword](#keyword), [KeywordStatus](#keywordstatus), [Language](#language), [Param1](#param1), [Param2](#param2), [Param3](#param3), [Path1](#path1), [Path2](#path2), [Spend](#spend), [TimePeriod](#timeperiod), [TitlePart1](#titlepart1), [TitlePart2](#titlepart2), [TitlePart3](#titlepart3), [TopImpressionRatePercent](#topimpressionratepercent), [ViewThroughConversions](#viewthroughconversions), [ViewThroughConversionsQualified](#viewthroughconversionsqualified), [ViewThroughRevenue](#viewthroughrevenue).

|Value|Description|
|-----------|---------------|
|<a name="absolutetopimpressionratepercent"></a>AbsoluteTopImpressionRatePercent|How often your ad was in the first position of all results, as a percentage of your total impressions.<br/><br/>A higher number indicates your ad is frequently showing in the best ad position.<br/><br/>The value of this column is empty if the data is not available. Neither *Hourly* or *HourOfDay* aggregation are supported. If you include this column with *Hourly* or *HourOfDay* aggregation the service will not return an error and you should ignore any performance data returned for this column.|
|<a name="accountid"></a>AccountId|The Microsoft Advertising assigned identifier of an account.|
|<a name="accountname"></a>AccountName|The account name.|
|<a name="accountnumber"></a>AccountNumber|The Microsoft Advertising assigned number of an account.|
|<a name="accountstatus"></a>AccountStatus|The account status.|
|<a name="addescription"></a>AdDescription|The first ad description that appears below the path in your ad.|
|<a name="addescription2"></a>AdDescription2|The second ad description that appears below the path in your ad. Ad description 2 might not appear in your ad.|
|<a name="addistribution"></a>AdDistribution|The network where you want your ads to show. This can be the entire Microsoft Advertising Network, Microsoft sites and select traffic, or only partner traffic.|
|<a name="adgroupid"></a>AdGroupId|The Microsoft Advertising assigned identifier of an ad group.|
|<a name="adgroupname"></a>AdGroupName|The ad group name.|
|<a name="adgroupstatus"></a>AdGroupStatus|The ad group status.|
|<a name="adid"></a>AdId|The Microsoft Advertising assigned identifier of an ad.|
|<a name="adlabels"></a>AdLabels|The labels applied to the ad.<br/><br/>Labels are delimited by a semicolon (;) in the report download.|
|<a name="adstatus"></a>AdStatus|The ad status.|
|<a name="adtitle"></a>AdTitle|The ad title.|
|<a name="adtype"></a>AdType|The ad type.|
|<a name="allconversionrate"></a>AllConversionRate|The conversion rate as a percentage.<br/><br/>The number of conversions, divided by the total number of clicks. For example, if the ads in your campaign got 300 clicks and four conversions, the conversion rate is 1.33 (%).<br/><br/>The formula for calculating the conversion rate is (Conversions / Clicks) x 100.<br/><br/>Data will be excluded from the [ConversionRate](#conversionrate) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllConversionRate](#allconversionrate) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="allconversions"></a>AllConversions|The number of conversions.<br/><br/>A conversion is the completion of an action by a customer after viewing your ad. The action could be purchasing your product, registering for your webinar, joining an organization, or whatever you consider your goal and best measure of the ad's success.<br/><br/>Conversions are measured by adding a small bit of code to your website pages so that a visitor's progress through your site can be tracked.<br/><br/>Data will be excluded from the [Conversions](#conversions) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllConversions](#allconversions) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.<br/><br/>This column will be deprecated in 2022, so you should use the [AllConversionsQualified](#allconversionsqualified) column instead. Going forward, performance reports will return "0" (zero) in this column. Historical data for time periods prior to the deprecation date will still be available according to the published [data retention period](../guides/report-data-retention-time-periods.md).|
|<a name="allconversionsqualified"></a>AllConversionsQualified|The number of conversions.<br/><br/>A conversion is the completion of an action by a customer after viewing your ad. The action could be purchasing your product, registering for your webinar, joining an organization, or whatever you consider your goal and best measure of the ad's success.<br/><br/>Conversions are measured by adding a small bit of code to your website pages so that a visitor's progress through your site can be tracked.<br/><br/>Data will be excluded from the [Conversions](#conversions) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllConversions](#allconversions) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.<br/><br/>You should expect the data type as **double** whether or not there are partial externally attributed offline conversions.<br/><br/>Not everyone has this feature yet. If you don't, don't worry - it's coming soon!|
|<a name="allcostperconversion"></a>AllCostPerConversion|The cost per conversion.<br/><br/>The formula for calculating the cost per conversion is (Spend / Conversions). Only ads in campaigns that enable conversion tracking contribute to the conversion number, so unless all campaigns in the account enable conversion tracking, the number will not be accurate.<br/><br/>Data will be excluded from the [CostPerConversion](#costperconversion) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllCostPerConversion](#allcostperconversion) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="averagecpc"></a>AverageCpc|The average cost per click (CPC). The total cost of all clicks on an ad divided by the number of clicks. This is the average amount you're actually charged each time your ad is clicked. For example, if you paid a total of 48.35 for 300 clicks, your average CPC is 0.16. The formula for calculating the average CPC is *(Spend /Clicks)*.|
|<a name="averagecpm"></a>AverageCpm|The total advertising cost divided by the number of impressions (in thousands).<br/<br/>In Latin, mille means a thousand. Also, sometimes called average cost per thousand (CPT).<br/><br/>This is a standard advertising industry performance metric that we calculate based on your spend and number of impressions.<br/><br/>The goal of CPM-based ad budgeting is to build awareness of your brand to large audiences. CPM tells you how much it costs to get an ad to the type of users you're targeting.|
|<a name="averageposition"></a>AveragePosition|The average position of the ad on a webpage.<br/><br/>This column is deprecated as of March 31st, 2021. Going forward, performance reports will return average position of "0" (zero). Historical average position data for time periods prior to the deprecation date will still be available according to the published [data retention period](../guides/report-data-retention-time-periods.md) per report type.|
|<a name="clicks"></a>Clicks|Clicks are what you pay for. Clicks typically include a customer clicking an ad on a search results page or on a website on the search network. Clicks can also come from other sources (for example, spiders, robots, and test servers). For more information, see [Microsoft Advertising click measurement: description of methodology](https://about.ads.microsoft.com/en-us/resources/policies/microsoft-advertising-click-measurement-description-of-methodology).|
|<a name="conversionrate"></a>ConversionRate|The conversion rate as a percentage.<br/><br/>The number of conversions, divided by the total number of clicks. For example, if the ads in your campaign got 300 clicks and four conversions, the conversion rate is 1.33 (%).<br/><br/>The formula for calculating the conversion rate is (Conversions / Clicks) x 100.<br/><br/>Data will be excluded from the [ConversionRate](#conversionrate) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllConversionRate](#allconversionrate) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="conversions"></a>Conversions|The number of conversions.<br/><br/>A conversion is the completion of an action by a customer after viewing your ad. The action could be purchasing your product, registering for your webinar, joining an organization, or whatever you consider your goal and best measure of the ad's success.<br/><br/>Conversions are measured by adding a small bit of code to your website pages so that a visitor's progress through your site can be tracked.<br/><br/>Data will be excluded from the [Conversions](#conversions) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllConversions](#allconversions) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.<br/><br/>This column will be deprecated in 2022, so you should use the [ConversionsQualified](#conversionsqualified) column instead. Going forward, performance reports will return "0" (zero) in this column. Historical data for time periods prior to the deprecation date will still be available according to the published [data retention period](../guides/report-data-retention-time-periods.md).|
|<a name="conversionsqualified"></a>ConversionsQualified|The number of conversions.<br/><br/>A conversion is the completion of an action by a customer after viewing your ad. The action could be purchasing your product, registering for your webinar, joining an organization, or whatever you consider your goal and best measure of the ad's success.<br/><br/>Conversions are measured by adding a small bit of code to your website pages so that a visitor's progress through your site can be tracked.<br/><br/>Data will be excluded from the [Conversions](#conversions) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllConversions](#allconversions) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.<br/><br/>You should expect the data type as **double** whether or not there are partial externally attributed offline conversions.<br/><br/>Not everyone has this feature yet. If you don't, don't worry - it's coming soon!|
|<a name="costperconversion"></a>CostPerConversion|The cost per conversion.<br/><br/>The formula for calculating the cost per conversion is (Spend / Conversions). Only ads in campaigns that enable conversion tracking contribute to the conversion number, so unless all campaigns in the account enable conversion tracking, the number will not be accurate.<br/><br/>Data will be excluded from the [CostPerConversion](#costperconversion) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllCostPerConversion](#allcostperconversion) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="ctr"></a>Ctr|The click-through rate (CTR) is the number of times an ad was clicked, divided by the number of times the ad was shown (impressions). For example, if your ads got 50 clicks given 2,348 impressions, your CTR is 2.13 (%). The formula for calculating CTR is *(Clicks / Impressions) x 100*.|
|<a name="currencycode"></a>CurrencyCode|The account currency type. For possible values, see [Currencies](../guides/currencies.md).|
|<a name="destinationurl"></a>DestinationUrl|The destination URL attribute of the ad, keyword, or ad group criterion. If the destination URL contains dynamic text substitution parameters (for example, {param1}), the report will contain the URL after substitution occurs.|
|<a name="devicetype"></a>DeviceType|The device name attribute of a device OS target bid. The type of device which showed ads. The possible values include *Computer*, *Smartphone*, *Tablet*, and *Unknown*.|
|<a name="finalappurl"></a>FinalAppUrl|Reserved for future use.|
|<a name="finalmobileurl"></a>FinalMobileUrl|The Final Mobile URL of the ad, keyword, or criterion.<br/><br/>Only the first URL in the list is reported. If the URL contains dynamic text substitution parameters (for example, {param1}), the report will contain the URL before substitution.|
|<a name="finalurl"></a>FinalUrl|The Final URL of the ad, keyword, or criterion.<br/><br/>Only the first URL in the list is reported. If the URL contains dynamic text substitution parameters (for example, {param1}), the report will contain the URL before substitution.|
|<a name="goal"></a>Goal|The name of the goal you set for the conversions you want, meaning actions customers take after clicking your ad.|
|<a name="goaltype"></a>GoalType|The type of conversion goal.<br/>Possible values include *AppInstall*, *Duration*, *Event*, *InStoreTransaction*, *OfflineConversion*, *PagesViewedPerVisit*, and *Url*.|
|<a name="impressions"></a>Impressions|The number of times an ad has been displayed on search results pages. Without impressions there are no clicks or conversions.|
|<a name="keyword"></a>Keyword|The keyword text.|
|<a name="keywordstatus"></a>KeywordStatus|The keyword status.|
|<a name="language"></a>Language|The language of the publisher where the ad was shown.<br/><br/>For possible values, see the Language column of [Ad Languages](../guides/ad-languages.md#adlanguage). The language display name will be provided in the report e.g. *English*.|
|<a name="param1"></a>Param1|The first dynamic substitution parameter (Param1) of a keyword or biddable ad group criterion.|
|<a name="param2"></a>Param2|The second dynamic substitution parameter (Param2) of a keyword or biddable ad group criterion.|
|<a name="param3"></a>Param3|The third dynamic substitution parameter (Param3) of a keyword or biddable ad group criterion.|
|<a name="path1"></a>Path1|The path 1 attribute of an ad.|
|<a name="path2"></a>Path2|The path 2 attribute of an ad.|
|<a name="spend"></a>Spend|The cost per click (CPC) summed for each click.|
|<a name="timeperiod"></a>TimePeriod|The time period of each report row. You may not include this column if the *Aggregation* element of the request object is set to Summary. For more information, see [Time Period Column](../guides/reports.md#timeperiod).|
|<a name="titlepart1"></a>TitlePart1|The title part 1 attribute of an ad.|
|<a name="titlepart2"></a>TitlePart2|The title part 2 attribute of an ad.|
|<a name="titlepart3"></a>TitlePart3|The title part 3 attribute of an ad.|
|<a name="topimpressionratepercent"></a>TopImpressionRatePercent|The percentage of times your ad showed in the mainline, the top placement where ads appear above the search results, out of your total impressions.<br/><br/>This indicates how changes in ad position can impact performance.<br/><br/>The value of this column is empty if the data is not available. Neither *Hourly* or *HourOfDay* aggregation are supported. If you include this column with *Hourly* or *HourOfDay* aggregation the service will not return an error and you should ignore any performance data returned for this column.|
|<a name="viewthroughconversions"></a>ViewThroughConversions|View-through conversions are conversions that people make after they have seen your ad, even though they did not click the ad.<br/><br/>View-through conversions don't have a click associated but do have an impression associated within the advertiser defined conversion window. If the user also clicked on an ad that was delivered via the Microsoft Audience or Search network, there won't be any view-through conversion counted. Only the click-based conversion would be counted.<br/><br/>View-through conversions are only counted for ads in the Microsoft Audience network.<br/><br/>This column will be deprecated in 2022, so you should use the [ViewThroughConversionsQualified](#viewthroughconversionsqualified) column instead. Going forward, performance reports will return "0" (zero) in this column. Historical data for time periods prior to the deprecation date will still be available according to the published [data retention period](../guides/report-data-retention-time-periods.md).|
|<a name="viewthroughconversionsqualified"></a>ViewThroughConversionsQualified|View-through conversions are conversions that people make after they have seen your ad, even though they did not click the ad.<br/><br/>View-through conversions don't have a click associated but do have an impression associated within the advertiser defined conversion window. If the user also clicked on an ad that was delivered via the Microsoft Audience or Search network, there won't be any view-through conversion counted. Only the click-based conversion would be counted.<br/><br/>View-through conversions are only counted for ads in the Microsoft Audience network.<br/><br/>You should expect the data type as **double** whether or not there are partial externally attributed offline conversions.<br/><br/>Not everyone has this feature yet. If you don't, don't worry - it's coming soon!|
|<a name="viewthroughrevenue"></a>ViewThroughRevenue|The revenue optionally reported by the advertiser as a result of view-through conversions.|

## <a name="remarks"></a>Remarks
### <a name="requiredcolumns"></a>Required Columns
The report must include the following columns at a minimum. As a general rule, each report must include at least one attribute column and at least one non-impression share performance statistics column. For more information, see [Report Attributes and Performance Statistics](../guides/report-attributes-performance-statistics.md).

> [!NOTE]
> The TimePeriod column is expected for all aggregation types except Summary. It is important to note that if you do not include TimePeriod, the aggregation you chose will be ignored and Summary aggregation will be used regardless.

|Column|
|----------|
|AdTitle|
|DestinationUrl|
|Param1|
|Param2|
|Param3|
|TimePeriod|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[AdDynamicTextPerformanceReportRequest](addynamictextperformancereportrequest.md)  
