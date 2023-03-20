---
title: ProductSearchQueryPerformanceReportColumn Value Set - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the attributes and performance statistics columns that you can include in the ProductSearchQueryPerformanceReportRequest.
---
# ProductSearchQueryPerformanceReportColumn Value Set - Reporting
Defines the attributes and performance statistics columns that you can include in the [ProductSearchQueryPerformanceReportRequest](productsearchqueryperformancereportrequest.md).

The report will include data only for search terms that resulted in a significant number of clicks in the last 30 days.

The attribute columns that you include in a report can affect how the statistics are aggregated. In other words the number of rows increase by a factor of the unique attributes. For more information, see [Columns that Group the Data](../guides/reports.md#columnsdata).

For a list of columns that you must include, please see the [Required Columns](#requiredcolumns) section below.

To see how far back hourly, daily, weekly, monthly, yearly and summary aggregated data can be retrieved for a report, see [Report Data Retention Time Periods](../guides/report-data-retention-time-periods.md).

## Syntax
```xml
<xs:simpleType name="ProductSearchQueryPerformanceReportColumn" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="TimePeriod" />
    <xs:enumeration value="AccountId" />
    <xs:enumeration value="AccountNumber" />
    <xs:enumeration value="AccountName" />
    <xs:enumeration value="AdId" />
    <xs:enumeration value="AdGroupId" />
    <xs:enumeration value="AdGroupName" />
    <xs:enumeration value="CampaignId" />
    <xs:enumeration value="CampaignName" />
    <xs:enumeration value="DestinationUrl" />
    <xs:enumeration value="DeviceType" />
    <xs:enumeration value="DeviceOS" />
    <xs:enumeration value="Language" />
    <xs:enumeration value="SearchQuery" />
    <xs:enumeration value="Network" />
    <xs:enumeration value="MerchantProductId" />
    <xs:enumeration value="Title" />
    <xs:enumeration value="ClickTypeId" />
    <xs:enumeration value="TotalClicksOnAdElements" />
    <xs:enumeration value="ClickType" />
    <xs:enumeration value="AdGroupCriterionId" />
    <xs:enumeration value="ProductGroup" />
    <xs:enumeration value="PartitionType" />
    <xs:enumeration value="Impressions" />
    <xs:enumeration value="Clicks" />
    <xs:enumeration value="Ctr" />
    <xs:enumeration value="AverageCpc" />
    <xs:enumeration value="Spend" />
    <xs:enumeration value="Conversions" />
    <xs:enumeration value="ConversionRate" />
    <xs:enumeration value="Assists" />
    <xs:enumeration value="CostPerAssist" />
    <xs:enumeration value="Revenue" />
    <xs:enumeration value="CostPerConversion" />
    <xs:enumeration value="RevenuePerConversion" />
    <xs:enumeration value="RevenuePerAssist" />
    <xs:enumeration value="CustomerId" />
    <xs:enumeration value="CustomerName" />
    <xs:enumeration value="AssistedImpressions" />
    <xs:enumeration value="AssistedClicks" />
    <xs:enumeration value="AssistedConversions" />
    <xs:enumeration value="AllConversions" />
    <xs:enumeration value="AllRevenue" />
    <xs:enumeration value="AllConversionRate" />
    <xs:enumeration value="AllCostPerConversion" />
    <xs:enumeration value="AllRevenuePerConversion" />
    <xs:enumeration value="Goal" />
    <xs:enumeration value="GoalType" />
    <xs:enumeration value="AbsoluteTopImpressionRatePercent" />
    <xs:enumeration value="AverageCpm" />
    <xs:enumeration value="ConversionsQualified" />
    <xs:enumeration value="AssistedConversionsQualified" />
    <xs:enumeration value="AllConversionsQualified" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [ProductSearchQueryPerformanceReportColumn](productsearchqueryperformancereportcolumn.md) value set has the following values: [AbsoluteTopImpressionRatePercent](#absolutetopimpressionratepercent), [AccountId](#accountid), [AccountName](#accountname), [AccountNumber](#accountnumber), [AdGroupCriterionId](#adgroupcriterionid), [AdGroupId](#adgroupid), [AdGroupName](#adgroupname), [AdId](#adid), [AllConversionRate](#allconversionrate), [AllConversions](#allconversions), [AllConversionsQualified](#allconversionsqualified), [AllCostPerConversion](#allcostperconversion), [AllRevenue](#allrevenue), [AllRevenuePerConversion](#allrevenueperconversion), [AssistedClicks](#assistedclicks), [AssistedConversions](#assistedconversions), [AssistedConversionsQualified](#assistedconversionsqualified), [AssistedImpressions](#assistedimpressions), [Assists](#assists), [AverageCpc](#averagecpc), [AverageCpm](#averagecpm), [CampaignId](#campaignid), [CampaignName](#campaignname), [Clicks](#clicks), [ClickType](#clicktype), [ClickTypeId](#clicktypeid), [ConversionRate](#conversionrate), [Conversions](#conversions), [ConversionsQualified](#conversionsqualified), [CostPerAssist](#costperassist), [CostPerConversion](#costperconversion), [Ctr](#ctr), [CustomerId](#customerid), [CustomerName](#customername), [DestinationUrl](#destinationurl), [DeviceOS](#deviceos), [DeviceType](#devicetype), [Goal](#goal), [GoalType](#goaltype), [Impressions](#impressions), [Language](#language), [MerchantProductId](#merchantproductid), [Network](#network), [PartitionType](#partitiontype), [ProductGroup](#productgroup), [Revenue](#revenue), [RevenuePerAssist](#revenueperassist), [RevenuePerConversion](#revenueperconversion), [SearchQuery](#searchquery), [Spend](#spend), [TimePeriod](#timeperiod), [Title](#title), [TotalClicksOnAdElements](#totalclicksonadelements).

|Value|Description|
|-----------|---------------|
|<a name="absolutetopimpressionratepercent"></a>AbsoluteTopImpressionRatePercent|How often your ad was in the first position of all results, as a percentage of your total impressions.<br/><br/>A higher number indicates your ad is frequently showing in the best ad position.<br/><br/>The value of this column is empty if the data is not available. Neither *Hourly* or *HourOfDay* aggregation are supported. If you include this column with *Hourly* or *HourOfDay* aggregation the service will not return an error and you should ignore any performance data returned for this column.|
|<a name="accountid"></a>AccountId|The Microsoft Advertising assigned identifier of an account.|
|<a name="accountname"></a>AccountName|The account name.|
|<a name="accountnumber"></a>AccountNumber|The Microsoft Advertising assigned number of an account.|
|<a name="adgroupcriterionid"></a>AdGroupCriterionId|The Microsoft Advertising assigned identifier of an ad group criterion.|
|<a name="adgroupid"></a>AdGroupId|The Microsoft Advertising assigned identifier of an ad group.|
|<a name="adgroupname"></a>AdGroupName|The ad group name.|
|<a name="adid"></a>AdId|The Microsoft Advertising assigned identifier of an ad.|
|<a name="allconversionrate"></a>AllConversionRate|The conversion rate as a percentage.<br/><br/>The number of conversions, divided by the total number of clicks. For example, if the ads in your campaign got 300 clicks and four conversions, the conversion rate is 1.33 (%).<br/><br/>The formula for calculating the conversion rate is (Conversions / Clicks) x 100.<br/><br/>Data will be excluded from the [ConversionRate](#conversionrate) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllConversionRate](#allconversionrate) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="allconversions"></a>AllConversions|The number of conversions.<br/><br/>A conversion is the completion of an action by a customer after viewing your ad. The action could be purchasing your product, registering for your webinar, joining an organization, or whatever you consider your goal and best measure of the ad's success.<br/><br/>Conversions are measured by adding a small bit of code to your website pages so that a visitor's progress through your site can be tracked.<br/><br/>Data will be excluded from the [Conversions](#conversions) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllConversions](#allconversions) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.<br/><br/>This column will be deprecated in 2022, so you should use the [AllConversionsQualified](#allconversionsqualified) column instead. Going forward, performance reports will return "0" (zero) in this column. Historical data for time periods prior to the deprecation date will still be available according to the published [data retention period](../guides/report-data-retention-time-periods.md).|
|<a name="allconversionsqualified"></a>AllConversionsQualified|The number of conversions.<br/><br/>A conversion is the completion of an action by a customer after viewing your ad. The action could be purchasing your product, registering for your webinar, joining an organization, or whatever you consider your goal and best measure of the ad's success.<br/><br/>Conversions are measured by adding a small bit of code to your website pages so that a visitor's progress through your site can be tracked.<br/><br/>Data will be excluded from the [Conversions](#conversions) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllConversions](#allconversions) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.<br/><br/>You should expect the data type as **double** whether or not there are partial externally attributed offline conversions.<br/><br/>Not everyone has this feature yet. If you don't, don't worry - it's coming soon!|
|<a name="allcostperconversion"></a>AllCostPerConversion|The cost per conversion.<br/><br/>The formula for calculating the cost per conversion is (Spend / Conversions). Only ads in campaigns that enable conversion tracking contribute to the conversion number, so unless all campaigns in the account enable conversion tracking, the number will not be accurate.<br/><br/>Data will be excluded from the [CostPerConversion](#costperconversion) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllCostPerConversion](#allcostperconversion) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="allrevenue"></a>AllRevenue|The revenue optionally reported by the advertiser as a result of conversions.<br/><br/>Data will be excluded from the [Revenue](#revenue) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllRevenue](#allrevenue) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="allrevenueperconversion"></a>AllRevenuePerConversion|The revenue per conversion.<br/><br/>The formula for calculating the revenue per conversion is (Revenue / Conversions).<br/><br/>Data will be excluded from the [RevenuePerConversion](#revenueperconversion) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllRevenuePerConversion](#allrevenueperconversion) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="assistedclicks"></a>AssistedClicks|Clicks on your ads that have received co-bids from your manufacturer partners. Clicks are what you pay for.<br/><br/>Clicks typically include a customer clicking an ad on a search results page or on a website on the search network. Clicks can also come from other sources (for example, spiders, robots, and test servers).<br/><br/>This performance statistic is only available for Sponsored Products in Microsoft Shopping Campaigns.|
|<a name="assistedconversions"></a>AssistedConversions|The number of conversions.<br/><br/>A conversion is the completion of an action by a customer after viewing your ad. The action could be purchasing your product, registering for your webinar, joining an organization, or whatever you consider your goal and best measure of the ad's success.<br/><br/>Conversions are measured by adding a small bit of code to your website pages so that a visitor's progress through your site can be tracked.<br/><br/>Data will be excluded from the [Conversions](#conversions) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllConversions](#allconversions) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="assistedconversionsqualified"></a>AssistedConversionsQualified|Reserved for future use.|
|<a name="assistedimpressions"></a>AssistedImpressions|The number of times an ad that is being co-bid by your manufacturer partners has been displayed on search results pages or other sites on the Microsoft Advertising Network.<br/><br/>This performance statistic is only available for Sponsored Products in Microsoft Shopping Campaigns.|
|<a name="assists"></a>Assists|The number of conversions from other ads within the same account that were preceded by one or more clicks from this ad. An ad is considered to have assisted the conversion if it was clicked before the most recently clicked ad that was credited with the conversion. Additionally, the click corresponding to the assist must occur  within the conversion period of the goal.|
|<a name="averagecpc"></a>AverageCpc|The average cost per click (CPC). The total cost of all clicks on an ad divided by the number of clicks. This is the average amount you're actually charged each time your ad is clicked. For example, if you paid a total of 48.35 for 300 clicks, your average CPC is 0.16. The formula for calculating the average CPC is *(Spend /Clicks)*.|
|<a name="averagecpm"></a>AverageCpm|The total advertising cost divided by the number of impressions (in thousands).<br/<br/>In Latin, mille means a thousand. Also, sometimes called average cost per thousand (CPT).<br/><br/>This is a standard advertising industry performance metric that we calculate based on your spend and number of impressions.<br/><br/>The goal of CPM-based ad budgeting is to build awareness of your brand to large audiences. CPM tells you how much it costs to get an ad to the type of users you're targeting.|
|<a name="campaignid"></a>CampaignId|The Microsoft Advertising assigned identifier of a campaign.|
|<a name="campaignname"></a>CampaignName|The campaign name.|
|<a name="clicks"></a>Clicks|Clicks are what you pay for. Clicks typically include a customer clicking an ad on a search results page or on a website on the search network. Clicks can also come from other sources (for example, spiders, robots, and test servers). For more information, see [Microsoft Advertising click measurement: description of methodology](https://about.ads.microsoft.com/en-us/resources/policies/microsoft-advertising-click-measurement-description-of-methodology).|
|<a name="clicktype"></a>ClickType|Click type refers to each component of an ad that a customer can click. The possible click types are ad title, image, phone number, driving directions, sitelink, and review.|
|<a name="clicktypeid"></a>ClickTypeId|The click type ID.|
|<a name="conversionrate"></a>ConversionRate|The conversion rate as a percentage.<br/><br/>The number of conversions, divided by the total number of clicks. For example, if the ads in your campaign got 300 clicks and four conversions, the conversion rate is 1.33 (%).<br/><br/>The formula for calculating the conversion rate is (Conversions / Clicks) x 100.<br/><br/>Data will be excluded from the [ConversionRate](#conversionrate) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllConversionRate](#allconversionrate) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="conversions"></a>Conversions|The number of conversions.<br/><br/>A conversion is the completion of an action by a customer after viewing your ad. The action could be purchasing your product, registering for your webinar, joining an organization, or whatever you consider your goal and best measure of the ad's success.<br/><br/>Conversions are measured by adding a small bit of code to your website pages so that a visitor's progress through your site can be tracked.<br/><br/>Data will be excluded from the [Conversions](#conversions) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllConversions](#allconversions) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.<br/><br/>This column will be deprecated in 2022, so you should use the [ConversionsQualified](#conversionsqualified) column instead. Going forward, performance reports will return "0" (zero) in this column. Historical data for time periods prior to the deprecation date will still be available according to the published [data retention period](../guides/report-data-retention-time-periods.md).|
|<a name="conversionsqualified"></a>ConversionsQualified|The number of conversions.<br/><br/>A conversion is the completion of an action by a customer after viewing your ad. The action could be purchasing your product, registering for your webinar, joining an organization, or whatever you consider your goal and best measure of the ad's success.<br/><br/>Conversions are measured by adding a small bit of code to your website pages so that a visitor's progress through your site can be tracked.<br/><br/>Data will be excluded from the [Conversions](#conversions) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllConversions](#allconversions) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.<br/><br/>You should expect the data type as **double** whether or not there are partial externally attributed offline conversions.<br/><br/>Not everyone has this feature yet. If you don't, don't worry - it's coming soon!|
|<a name="costperassist"></a>CostPerAssist|The cost per assist. The formula for calculating the cost per assist is *(Spend / Assists)*.|
|<a name="costperconversion"></a>CostPerConversion|The cost per conversion.<br/><br/>The formula for calculating the cost per conversion is (Spend / Conversions). Only ads in campaigns that enable conversion tracking contribute to the conversion number, so unless all campaigns in the account enable conversion tracking, the number will not be accurate.<br/><br/>Data will be excluded from the [CostPerConversion](#costperconversion) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllCostPerConversion](#allcostperconversion) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="ctr"></a>Ctr|The click-through rate (CTR) is the number of times an ad was clicked, divided by the number of times the ad was shown (impressions). For example, if your ads got 50 clicks given 2,348 impressions, your CTR is 2.13 (%). The formula for calculating CTR is *(Clicks / Impressions) x 100*.|
|<a name="customerid"></a>CustomerId|The Microsoft Advertising assigned identifier of a customer.|
|<a name="customername"></a>CustomerName|The customer name.|
|<a name="destinationurl"></a>DestinationUrl|The destination URL attribute of the ad, keyword, or ad group criterion. If the destination URL contains dynamic text substitution parameters (for example, {param1}), the report will contain the URL after substitution occurs.|
|<a name="deviceos"></a>DeviceOS|The operating system of the device reported in the *DeviceType* column. The possible values include *Android*, *Blackberry*, *iOS*, *Other*, *Unknown*, and *Windows*. If the operating system of the device cannot be determined or is not one of the operating systems that you can target, the value in this column will be *Unknown*.|
|<a name="devicetype"></a>DeviceType|The device name attribute of a device OS target bid. The type of device which showed ads. The possible values include *Computer*, *Smartphone*, *Tablet*, and *Unknown*.|
|<a name="goal"></a>Goal|The name of the goal you set for the conversions you want, meaning actions customers take after clicking your ad.|
|<a name="goaltype"></a>GoalType|The type of conversion goal.<br/>Possible values include *AppInstall*, *Duration*, *Event*, *InStoreTransaction*, *OfflineConversion*, *PagesViewedPerVisit*, and *Url*.|
|<a name="impressions"></a>Impressions|The number of times an ad has been displayed on search results pages. Without impressions there are no clicks or conversions.|
|<a name="language"></a>Language|The language of the publisher where the ad was shown.<br/><br/>For possible values, see the Language column of [Ad Languages](../guides/ad-languages.md#adlanguage). The language display name will be provided in the report e.g. *English*.|
|<a name="merchantproductid"></a>MerchantProductId|The unique identifier provided by a merchant for each product offer.|
|<a name="network"></a>Network|The entire Microsoft Advertising Network made up of Microsoft sites and select traffic, and only partner traffic. Use this data to make the best decision on network selection for your ad groups. The possible values include AOL search, Audience, Microsoft sites and select traffic, Content, and Syndicated search partners.<br/><br/>*Note*: Not everyone can use the value *Microsoft sites and select traffic* yet. If you can't, don't worry - it's coming soon!|
|<a name="partitiontype"></a>PartitionType|The product partition type.|
|<a name="productgroup"></a>ProductGroup|The backward slash delimited list of product conditions, reported as Operand = Attribute. The attribute values are surrounded by "" (double quotes). Here is an example: * / Category="Animals & Pet Supplies" / Category="Pet Supplies" / Category="Bird Supplies". The "*" (single asterisk) refers to a product group that matches everything else besides the other filters for the product group.|
|<a name="revenue"></a>Revenue|The revenue optionally reported by the advertiser as a result of conversions.<br/><br/>Data will be excluded from the [Revenue](#revenue) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllRevenue](#allrevenue) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="revenueperassist"></a>RevenuePerAssist|The revenue per assist. The formula for calculating the revenue per assist is *(Revenue / Assists)*.|
|<a name="revenueperconversion"></a>RevenuePerConversion|The revenue per conversion.<br/><br/>The formula for calculating the revenue per conversion is (Revenue / Conversions).<br/><br/>Data will be excluded from the [RevenuePerConversion](#revenueperconversion) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllRevenuePerConversion](#allrevenueperconversion) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="searchquery"></a>SearchQuery|The search term used by your potential audience.|
|<a name="spend"></a>Spend|The cost per click (CPC) summed for each click.|
|<a name="timeperiod"></a>TimePeriod|The time period of each report row. You may not include this column if the *Aggregation* element of the request object is set to Summary. For more information, see [Time Period Column](../guides/reports.md#timeperiod).|
|<a name="title"></a>Title|The product item name. For example the title of a book, DVD, or game.|
|<a name="totalclicksonadelements"></a>TotalClicksOnAdElements|The number of clicks when this ad element was present in the ad copy, whether this or another ad element was clicked on.|

## <a name="remarks"></a>Remarks
### <a name="requiredcolumns"></a>Required Columns
The report must include the following columns at a minimum. As a general rule, each report must include at least one attribute column and at least one non-impression share performance statistics column. For more information, see [Report Attributes and Performance Statistics](../guides/report-attributes-performance-statistics.md).

> [!NOTE]
> The TimePeriod column is expected for all aggregation types except Summary. It is important to note that if you do not include TimePeriod, the aggregation you chose will be ignored and Summary aggregation will be used regardless.

|Column|
|----------|
|AccountName|
|CampaignName|
|SearchQuery|
|TimePeriod|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[ProductSearchQueryPerformanceReportRequest](productsearchqueryperformancereportrequest.md)  
