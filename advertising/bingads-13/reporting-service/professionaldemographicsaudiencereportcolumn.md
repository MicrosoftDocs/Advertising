---
title: ProfessionalDemographicsAudienceReportColumn Value Set - Reporting
ms.service: bing-ads-reporting-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the attributes and performance statistics columns that you can include in the ProfessionalDemographicsAudienceReportRequest.
---
# ProfessionalDemographicsAudienceReportColumn Value Set - Reporting
Defines the attributes and performance statistics columns that you can include in the [ProfessionalDemographicsAudienceReportRequest](professionaldemographicsaudiencereportrequest.md).

The attribute columns that you include in a report can affect how the statistics are aggregated. In other words the number of rows increase by a factor of the unique attributes. For more information, see [Columns that Group the Data](../guides/reports.md#columnsdata).

For a list of columns that you must include, please see the [Required Columns](#requiredcolumns) section below.

To see how far back hourly, daily, weekly, monthly, yearly and summary aggregated data can be retrieved for a report, see [Report Data Retention Time Periods](../guides/report-data-retention-time-periods.md).

## Syntax
```xml
<xs:simpleType name="ProfessionalDemographicsAudienceReportColumn" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="AccountName" />
    <xs:enumeration value="AccountNumber" />
    <xs:enumeration value="AccountId" />
    <xs:enumeration value="TimePeriod" />
    <xs:enumeration value="CampaignName" />
    <xs:enumeration value="CampaignId" />
    <xs:enumeration value="AdGroupName" />
    <xs:enumeration value="AdGroupId" />
    <xs:enumeration value="CompanyName" />
    <xs:enumeration value="IndustryName" />
    <xs:enumeration value="JobFunctionName" />
    <xs:enumeration value="AdDistribution" />
    <xs:enumeration value="Impressions" />
    <xs:enumeration value="Clicks" />
    <xs:enumeration value="Spend" />
    <xs:enumeration value="Conversions" />
    <xs:enumeration value="Language" />
    <xs:enumeration value="Assists" />
    <xs:enumeration value="Revenue" />
    <xs:enumeration value="AccountStatus" />
    <xs:enumeration value="CampaignStatus" />
    <xs:enumeration value="AdGroupStatus" />
    <xs:enumeration value="AveragePosition" />
    <xs:enumeration value="AllConversions" />
    <xs:enumeration value="AllRevenue" />
    <xs:enumeration value="ViewThroughConversions" />
    <xs:enumeration value="Goal" />
    <xs:enumeration value="GoalType" />
    <xs:enumeration value="AbsoluteTopImpressionRatePercent" />
    <xs:enumeration value="TopImpressionRatePercent" />
    <xs:enumeration value="ConversionsQualified" />
    <xs:enumeration value="AllConversionsQualified" />
    <xs:enumeration value="ViewThroughConversionsQualified" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [ProfessionalDemographicsAudienceReportColumn](professionaldemographicsaudiencereportcolumn.md) value set has the following values: [AbsoluteTopImpressionRatePercent](#absolutetopimpressionratepercent), [AccountId](#accountid), [AccountName](#accountname), [AccountNumber](#accountnumber), [AccountStatus](#accountstatus), [AdDistribution](#addistribution), [AdGroupId](#adgroupid), [AdGroupName](#adgroupname), [AdGroupStatus](#adgroupstatus), [AllConversions](#allconversions), [AllConversionsQualified](#allconversionsqualified), [AllRevenue](#allrevenue), [Assists](#assists), [AveragePosition](#averageposition), [CampaignId](#campaignid), [CampaignName](#campaignname), [CampaignStatus](#campaignstatus), [Clicks](#clicks), [CompanyName](#companyname), [Conversions](#conversions), [ConversionsQualified](#conversionsqualified), [Goal](#goal), [GoalType](#goaltype), [Impressions](#impressions), [IndustryName](#industryname), [JobFunctionName](#jobfunctionname), [Language](#language), [Revenue](#revenue), [Spend](#spend), [TimePeriod](#timeperiod), [TopImpressionRatePercent](#topimpressionratepercent), [ViewThroughConversions](#viewthroughconversions), [ViewThroughConversionsQualified](#viewthroughconversionsqualified).

|Value|Description|
|-----------|---------------|
|<a name="absolutetopimpressionratepercent"></a>AbsoluteTopImpressionRatePercent|How often your ad was in the first position of all results, as a percentage of your total impressions.<br/><br/>A higher number indicates your ad is frequently showing in the best ad position.<br/><br/>The value of this column is empty if the data is not available. Neither *Hourly* or *HourOfDay* aggregation are supported. If you include this column with *Hourly* or *HourOfDay* aggregation the service will not return an error and you should ignore any performance data returned for this column.|
|<a name="accountid"></a>AccountId|The Microsoft Advertising assigned identifier of an account.|
|<a name="accountname"></a>AccountName|The account name.|
|<a name="accountnumber"></a>AccountNumber|The Microsoft Advertising assigned number of an account.|
|<a name="accountstatus"></a>AccountStatus|The account status.|
|<a name="addistribution"></a>AdDistribution|The network where you want your ads to show. This can be the entire Microsoft Advertising Network, Microsoft sites and select traffic, or only partner traffic.|
|<a name="adgroupid"></a>AdGroupId|The Microsoft Advertising assigned identifier of an ad group.|
|<a name="adgroupname"></a>AdGroupName|The ad group name.|
|<a name="adgroupstatus"></a>AdGroupStatus|The ad group status.|
|<a name="allconversions"></a>AllConversions|The number of conversions.<br/><br/>A conversion is the completion of an action by a customer after viewing your ad. The action could be purchasing your product, registering for your webinar, joining an organization, or whatever you consider your goal and best measure of the ad's success.<br/><br/>Conversions are measured by adding a small bit of code to your website pages so that a visitor's progress through your site can be tracked.<br/><br/>Data will be excluded from the [Conversions](#conversions) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllConversions](#allconversions) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.<br/><br/>This column will be deprecated in 2022, so you should use the [AllConversionsQualified](#allconversionsqualified) column instead. Going forward, performance reports will return "0" (zero) in this column. Historical data for time periods prior to the deprecation date will still be available according to the published [data retention period](../guides/report-data-retention-time-periods.md).|
|<a name="allconversionsqualified"></a>AllConversionsQualified|The number of conversions.<br/><br/>A conversion is the completion of an action by a customer after viewing your ad. The action could be purchasing your product, registering for your webinar, joining an organization, or whatever you consider your goal and best measure of the ad's success.<br/><br/>Conversions are measured by adding a small bit of code to your website pages so that a visitor's progress through your site can be tracked.<br/><br/>Data will be excluded from the [Conversions](#conversions) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllConversions](#allconversions) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.<br/><br/>You should expect the data type as **double** whether or not there are partial externally attributed offline conversions.<br/><br/>Not everyone has this feature yet. If you don't, don't worry - it's coming soon!|
|<a name="allrevenue"></a>AllRevenue|The revenue optionally reported by the advertiser as a result of conversions.<br/><br/>Data will be excluded from the [Revenue](#revenue) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllRevenue](#allrevenue) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="assists"></a>Assists|The number of times an entity (an account, campaign, ad group, or keyword, for example) contributed to a conversion that is associated with a different entity.<br/>A report on this data shows you how often one keyword assists a conversion on another keyword. This helps you identify which campaigns are dependent on assists for their conversion value.|
|<a name="averageposition"></a>AveragePosition|The average position of the ad on a webpage.<br/><br/>This column is deprecated as of March 31st, 2021. Going forward, performance reports will return average position of "0" (zero). Historical average position data for time periods prior to the deprecation date will still be available according to the published [data retention period](../guides/report-data-retention-time-periods.md) per report type.|
|<a name="campaignid"></a>CampaignId|The Microsoft Advertising assigned identifier of a campaign.|
|<a name="campaignname"></a>CampaignName|The campaign name.|
|<a name="campaignstatus"></a>CampaignStatus|The campaign status.|
|<a name="clicks"></a>Clicks|Clicks are what you pay for.<br/>Clicks typically include a customer clicking an ad on a search results page or on a website on the search network. Clicks can also come from other sources (for example, spiders, robots, and test servers).<br/>You pay for clicks on standard-quality clicks, not on low-quality or invalid clicks.|
|<a name="companyname"></a>CompanyName|The name of the company (according to LinkedIn) of the person who viewed the ad.|
|<a name="conversions"></a>Conversions|The number of conversions.<br/><br/>A conversion is the completion of an action by a customer after viewing your ad. The action could be purchasing your product, registering for your webinar, joining an organization, or whatever you consider your goal and best measure of the ad's success.<br/><br/>Conversions are measured by adding a small bit of code to your website pages so that a visitor's progress through your site can be tracked.<br/><br/>Data will be excluded from the [Conversions](#conversions) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllConversions](#allconversions) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.<br/><br/>This column will be deprecated in 2022, so you should use the [ConversionsQualified](#conversionsqualified) column instead. Going forward, performance reports will return "0" (zero) in this column. Historical data for time periods prior to the deprecation date will still be available according to the published [data retention period](../guides/report-data-retention-time-periods.md).|
|<a name="conversionsqualified"></a>ConversionsQualified|The number of conversions.<br/><br/>A conversion is the completion of an action by a customer after viewing your ad. The action could be purchasing your product, registering for your webinar, joining an organization, or whatever you consider your goal and best measure of the ad's success.<br/><br/>Conversions are measured by adding a small bit of code to your website pages so that a visitor's progress through your site can be tracked.<br/><br/>Data will be excluded from the [Conversions](#conversions) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllConversions](#allconversions) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.<br/><br/>You should expect the data type as **double** whether or not there are partial externally attributed offline conversions.<br/><br/>Not everyone has this feature yet. If you don't, don't worry - it's coming soon!|
|<a name="goal"></a>Goal|The name of the goal you set for the conversions you want, meaning actions customers take after clicking your ad.|
|<a name="goaltype"></a>GoalType|The type of conversion goal.<br/>Possible values include *AppInstall*, *Duration*, *Event*, *InStoreTransaction*, *OfflineConversion*, *PagesViewedPerVisit*, and *Url*.|
|<a name="impressions"></a>Impressions|The number of times an ad has been displayed on search results pages or other sites on the Audience Network.<br/>Regardless of whether you are driving customers to your website, tracking conversions, or just trying to get your message out, you want to track the number of times your ad is shown.<br/>Run the share of voice report to get an estimate of how many more impressions you could be getting.|
|<a name="industryname"></a>IndustryName|The name of the industry (according to LinkedIn) of the person who viewed the ad.|
|<a name="jobfunctionname"></a>JobFunctionName|The name of the job function (according to LinkedIn) of the person who viewed the ad.|
|<a name="language"></a>Language|This is The language of the publisher where the ad was shown.|
|<a name="revenue"></a>Revenue|The revenue optionally reported by the advertiser as a result of conversions.<br/><br/>Data will be excluded from the [Revenue](#revenue) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllRevenue](#allrevenue) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="spend"></a>Spend|The sum of your cost-per-click (CPC) charges for your ads and keywords.<br/>Spend helps you keep track of your budget.|
|<a name="timeperiod"></a>TimePeriod|The time period of each report row. You may not include this column if the *Aggregation* element of the request object is set to Summary. If you include the *TimePeriod* column, the column label in the downloaded report depends on the aggregation level that you specify in the report request. For more information, see [Time Period Column](../guides/reports.md#timeperiod).|
|<a name="topimpressionratepercent"></a>TopImpressionRatePercent|The percentage of times your ad showed in the mainline, the top placement where ads appear above the search results, out of your total impressions.<br/><br/>This indicates how changes in ad position can impact performance.<br/><br/>The value of this column is empty if the data is not available. Neither *Hourly* or *HourOfDay* aggregation are supported. If you include this column with *Hourly* or *HourOfDay* aggregation the service will not return an error and you should ignore any performance data returned for this column.|
|<a name="viewthroughconversions"></a>ViewThroughConversions|View-through conversions are conversions that people make after they have seen your ad, even though they did not click the ad.<br/><br/>View-through conversions don't have a click associated but do have an impression associated within the advertiser defined conversion window. If the user also clicked on an ad that was delivered via the Microsoft Audience or Search network, there won't be any view-through conversion counted. Only the click-based conversion would be counted.<br/><br/>View-through conversions are only counted for ads in the Microsoft Audience network.<br/><br/>This column will be deprecated in 2022, so you should use the [ViewThroughConversionsQualified](#viewthroughconversionsqualified) column instead. Going forward, performance reports will return "0" (zero) in this column. Historical data for time periods prior to the deprecation date will still be available according to the published [data retention period](../guides/report-data-retention-time-periods.md).|
|<a name="viewthroughconversionsqualified"></a>ViewThroughConversionsQualified|View-through conversions are conversions that people make after they have seen your ad, even though they did not click the ad.<br/><br/>View-through conversions don't have a click associated but do have an impression associated within the advertiser defined conversion window. If the user also clicked on an ad that was delivered via the Microsoft Audience or Search network, there won't be any view-through conversion counted. Only the click-based conversion would be counted.<br/><br/>View-through conversions are only counted for ads in the Microsoft Audience network.<br/><br/>You should expect the data type as **double** whether or not there are partial externally attributed offline conversions.<br/><br/>Not everyone has this feature yet. If you don't, don't worry - it's coming soon!|

## <a name="remarks"></a>Remarks
### <a name="requiredcolumns"></a>Required Columns
The report must include the following columns at a minimum. As a general rule, each report must include at least one attribute column and at least one non-impression share performance statistics column. For more information, see [Report Attributes and Performance Statistics](../guides/report-attributes-performance-statistics.md).

> [!NOTE]
> The TimePeriod column is expected for all aggregation types except Summary. It is important to note that if you do not include TimePeriod, the aggregation you chose will be ignored and Summary aggregation will be used regardless.

|Column|
|----------|
|AccountName|
|AdGroupName|
|CompanyName|
|IndustryName|
|JobFunctionName|
|TimePeriod|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[ProfessionalDemographicsAudienceReportRequest](professionaldemographicsaudiencereportrequest.md)  
