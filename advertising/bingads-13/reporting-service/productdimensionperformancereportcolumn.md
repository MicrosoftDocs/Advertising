---
title: ProductDimensionPerformanceReportColumn Value Set - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the attributes and performance statistics columns that you can include in the ProductDimensionPerformanceReportRequest.
---
# ProductDimensionPerformanceReportColumn Value Set - Reporting
Defines the attributes and performance statistics columns that you can include in the [ProductDimensionPerformanceReportRequest](productdimensionperformancereportrequest.md).

The attribute columns that you include in a report can affect how the statistics are aggregated. In other words the number of rows increase by a factor of the unique attributes. For more information, see [Columns that Group the Data](../guides/reports.md#columnsdata).

For a list of columns that you must include, please see the [Required Columns](#requiredcolumns) section below.

To see how far back hourly, daily, weekly, monthly, yearly and summary aggregated data can be retrieved for a report, see [Report Data Retention Time Periods](../guides/report-data-retention-time-periods.md).

## Syntax
```xml
<xs:simpleType name="ProductDimensionPerformanceReportColumn" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="TimePeriod" />
    <xs:enumeration value="AccountName" />
    <xs:enumeration value="AccountNumber" />
    <xs:enumeration value="AdGroupName" />
    <xs:enumeration value="AdGroupId" />
    <xs:enumeration value="CampaignStatus" />
    <xs:enumeration value="AccountStatus" />
    <xs:enumeration value="AdGroupStatus" />
    <xs:enumeration value="Network" />
    <xs:enumeration value="AdId" />
    <xs:enumeration value="CampaignId" />
    <xs:enumeration value="CampaignName" />
    <xs:enumeration value="CurrencyCode" />
    <xs:enumeration value="DeviceType" />
    <xs:enumeration value="Language" />
    <xs:enumeration value="MerchantProductId" />
    <xs:enumeration value="Title" />
    <xs:enumeration value="Condition" />
    <xs:enumeration value="Brand" />
    <xs:enumeration value="Price" />
    <xs:enumeration value="CustomLabel0" />
    <xs:enumeration value="CustomLabel1" />
    <xs:enumeration value="CustomLabel2" />
    <xs:enumeration value="CustomLabel3" />
    <xs:enumeration value="CustomLabel4" />
    <xs:enumeration value="ProductType1" />
    <xs:enumeration value="ProductType2" />
    <xs:enumeration value="ProductType3" />
    <xs:enumeration value="ProductType4" />
    <xs:enumeration value="ProductType5" />
    <xs:enumeration value="ProductCategory1" />
    <xs:enumeration value="ProductCategory2" />
    <xs:enumeration value="ProductCategory3" />
    <xs:enumeration value="ProductCategory4" />
    <xs:enumeration value="ProductCategory5" />
    <xs:enumeration value="Impressions" />
    <xs:enumeration value="Clicks" />
    <xs:enumeration value="Ctr" />
    <xs:enumeration value="AverageCpc" />
    <xs:enumeration value="Spend" />
    <xs:enumeration value="Conversions" />
    <xs:enumeration value="ConversionRate" />
    <xs:enumeration value="Revenue" />
    <xs:enumeration value="RevenuePerConversion" />
    <xs:enumeration value="SellerName" />
    <xs:enumeration value="OfferLanguage" />
    <xs:enumeration value="CountryOfSale" />
    <xs:enumeration value="AdStatus" />
    <xs:enumeration value="ImpressionSharePercent" />
    <xs:enumeration value="ImpressionLostToBudgetPercent" />
    <xs:enumeration value="ImpressionLostToRankPercent" />
    <xs:enumeration value="BenchmarkBid" />
    <xs:enumeration value="BenchmarkCtr" />
    <xs:enumeration value="TopVsOther" />
    <xs:enumeration value="AdDistribution" />
    <xs:enumeration value="ClickTypeId" />
    <xs:enumeration value="TotalClicksOnAdElements" />
    <xs:enumeration value="ClickType" />
    <xs:enumeration value="ReturnOnAdSpend" />
    <xs:enumeration value="BidStrategyType" />
    <xs:enumeration value="LocalStoreCode" />
    <xs:enumeration value="StoreId" />
    <xs:enumeration value="AssistedImpressions" />
    <xs:enumeration value="AssistedClicks" />
    <xs:enumeration value="ClickSharePercent" />
    <xs:enumeration value="AbsoluteTopImpressionSharePercent" />
    <xs:enumeration value="AssistedConversions" />
    <xs:enumeration value="AllConversions" />
    <xs:enumeration value="AllRevenue" />
    <xs:enumeration value="AllConversionRate" />
    <xs:enumeration value="AllCostPerConversion" />
    <xs:enumeration value="AllReturnOnAdSpend" />
    <xs:enumeration value="AllRevenuePerConversion" />
    <xs:enumeration value="CostPerConversion" />
    <xs:enumeration value="ViewThroughConversions" />
    <xs:enumeration value="Goal" />
    <xs:enumeration value="GoalType" />
    <xs:enumeration value="ProductBought" />
    <xs:enumeration value="QuantityBought" />
    <xs:enumeration value="AbsoluteTopImpressionRatePercent" />
    <xs:enumeration value="AverageCpm" />
    <xs:enumeration value="ConversionsQualified" />
    <xs:enumeration value="AssistedConversionsQualified" />
    <xs:enumeration value="AllConversionsQualified" />
    <xs:enumeration value="ViewThroughConversionsQualified" />
    <xs:enumeration value="ProductBoughtTitle" />
    <xs:enumeration value="GTIN" />
    <xs:enumeration value="MPN" />
    <xs:enumeration value="ViewThroughRevenue" />
    <xs:enumeration value="GoalId" />
    <xs:enumeration value="Sales" />
    <xs:enumeration value="CostPerSale" />
    <xs:enumeration value="RevenuePerSale" />
    <xs:enumeration value="Installs" />
    <xs:enumeration value="CostPerInstall" />
    <xs:enumeration value="RevenuePerInstall" />
    <xs:enumeration value="CampaignType" />
    <xs:enumeration value="AssetGroupId" />
    <xs:enumeration value="AssetGroupName" />
    <xs:enumeration value="AssetGroupStatus" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [ProductDimensionPerformanceReportColumn](productdimensionperformancereportcolumn.md) value set has the following values: [AbsoluteTopImpressionRatePercent](#absolutetopimpressionratepercent), [AbsoluteTopImpressionSharePercent](#absolutetopimpressionsharepercent), [AccountName](#accountname), [AccountNumber](#accountnumber), [AccountStatus](#accountstatus), [AdDistribution](#addistribution), [AdGroupId](#adgroupid), [AdGroupName](#adgroupname), [AdGroupStatus](#adgroupstatus), [AdId](#adid), [AdStatus](#adstatus), [AllConversionRate](#allconversionrate), [AllConversions](#allconversions), [AllConversionsQualified](#allconversionsqualified), [AllCostPerConversion](#allcostperconversion), [AllReturnOnAdSpend](#allreturnonadspend), [AllRevenue](#allrevenue), [AllRevenuePerConversion](#allrevenueperconversion), [AssetGroupId](#assetgroupid), [AssetGroupName](#assetgroupname), [AssetGroupStatus](#assetgroupstatus), [AssistedClicks](#assistedclicks), [AssistedConversions](#assistedconversions), [AssistedConversionsQualified](#assistedconversionsqualified), [AssistedImpressions](#assistedimpressions), [AverageCpc](#averagecpc), [AverageCpm](#averagecpm), [BenchmarkBid](#benchmarkbid), [BenchmarkCtr](#benchmarkctr), [BidStrategyType](#bidstrategytype), [Brand](#brand), [CampaignId](#campaignid), [CampaignName](#campaignname), [CampaignStatus](#campaignstatus), [CampaignType](#campaigntype), [Clicks](#clicks), [ClickSharePercent](#clicksharepercent), [ClickType](#clicktype), [ClickTypeId](#clicktypeid), [Condition](#condition), [ConversionRate](#conversionrate), [Conversions](#conversions), [ConversionsQualified](#conversionsqualified), [CostPerConversion](#costperconversion), [CostPerInstall](#costperinstall), [CostPerSale](#costpersale), [CountryOfSale](#countryofsale), [Ctr](#ctr), [CurrencyCode](#currencycode), [CustomLabel0](#customlabel0), [CustomLabel1](#customlabel1), [CustomLabel2](#customlabel2), [CustomLabel3](#customlabel3), [CustomLabel4](#customlabel4), [DeviceType](#devicetype), [Goal](#goal), [GoalId](#goalid), [GoalType](#goaltype), [GTIN](#gtin), [ImpressionLostToBudgetPercent](#impressionlosttobudgetpercent), [ImpressionLostToRankPercent](#impressionlosttorankpercent), [Impressions](#impressions), [ImpressionSharePercent](#impressionsharepercent), [Installs](#installs), [Language](#language), [LocalStoreCode](#localstorecode), [MerchantProductId](#merchantproductid), [MPN](#mpn), [Network](#network), [OfferLanguage](#offerlanguage), [Price](#price), [ProductBought](#productbought), [ProductBoughtTitle](#productboughttitle), [ProductCategory1](#productcategory1), [ProductCategory2](#productcategory2), [ProductCategory3](#productcategory3), [ProductCategory4](#productcategory4), [ProductCategory5](#productcategory5), [ProductType1](#producttype1), [ProductType2](#producttype2), [ProductType3](#producttype3), [ProductType4](#producttype4), [ProductType5](#producttype5), [QuantityBought](#quantitybought), [ReturnOnAdSpend](#returnonadspend), [Revenue](#revenue), [RevenuePerConversion](#revenueperconversion), [RevenuePerInstall](#revenueperinstall), [RevenuePerSale](#revenuepersale), [Sales](#sales), [SellerName](#sellername), [Spend](#spend), [StoreId](#storeid), [TimePeriod](#timeperiod), [Title](#title), [TopVsOther](#topvsother), [TotalClicksOnAdElements](#totalclicksonadelements), [ViewThroughConversions](#viewthroughconversions), [ViewThroughConversionsQualified](#viewthroughconversionsqualified), [ViewThroughRevenue](#viewthroughrevenue).

|Value|Description|
|-----------|---------------|
|<a name="absolutetopimpressionratepercent"></a>AbsoluteTopImpressionRatePercent|How often your ad was in the first position of all results, as a percentage of your total impressions.<br/><br/>A higher number indicates your ad is frequently showing in the best ad position.<br/><br/>The value of this column is empty if the data is not available. Neither *Hourly* or *HourOfDay* aggregation are supported. If you include this column with *Hourly* or *HourOfDay* aggregation the service will not return an error and you should ignore any performance data returned for this column.|
|<a name="absolutetopimpressionsharepercent"></a>AbsoluteTopImpressionSharePercent|The number of times your ad is shown in the top position as a percentage of the total available impressions in the market you were targeting.<br/><br/>Reports on impression highlight information about how many impressions you're missing in the top slot and why. You can use this data to inform you about making changes to get more impressions, increase the likelihood of more clicks on those ads, and as a result, increase the likelihood of more sales.<br/><br/>If you include this column, then you may not include restricted attributes such as [TopVsOther](#topvsother) in the same report request. Likewise if you include any of the restricted attribute columns, then you must exclude this column. For more information, see [Column Restrictions](../guides/reports.md#columnrestrictions).|
|<a name="accountname"></a>AccountName|The account name.|
|<a name="accountnumber"></a>AccountNumber|The Microsoft Advertising assigned number of an account.|
|<a name="accountstatus"></a>AccountStatus|The account status.|
|<a name="addistribution"></a>AdDistribution|The network where you want your ads to show. This can be the entire Microsoft Advertising Network, Microsoft sites and select traffic, or only partner traffic.|
|<a name="adgroupid"></a>AdGroupId|The Microsoft Advertising assigned identifier of an ad group.|
|<a name="adgroupname"></a>AdGroupName|The ad group name.|
|<a name="adgroupstatus"></a>AdGroupStatus|The ad group status.|
|<a name="adid"></a>AdId|The Microsoft Advertising assigned identifier of an ad.|
|<a name="adstatus"></a>AdStatus|The ad status.|
|<a name="allconversionrate"></a>AllConversionRate|The conversion rate as a percentage.<br/><br/>The number of conversions, divided by the total number of clicks. For example, if the ads in your campaign got 300 clicks and four conversions, the conversion rate is 1.33 (%).<br/><br/>The formula for calculating the conversion rate is (Conversions / Clicks) x 100.<br/><br/>Data will be excluded from the [ConversionRate](#conversionrate) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllConversionRate](#allconversionrate) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="allconversions"></a>AllConversions|The number of conversions.<br/><br/>A conversion is the completion of an action by a customer after viewing your ad. The action could be purchasing your product, registering for your webinar, joining an organization, or whatever you consider your goal and best measure of the ad's success.<br/><br/>Conversions are measured by adding a small bit of code to your website pages so that a visitor's progress through your site can be tracked.<br/><br/>Data will be excluded from the [Conversions](#conversions) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllConversions](#allconversions) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.<br/><br/>This column will be deprecated in 2022, so you should use the [AllConversionsQualified](#allconversionsqualified) column instead. Going forward, performance reports will return "0" (zero) in this column. Historical data for time periods prior to the deprecation date will still be available according to the published [data retention period](../guides/report-data-retention-time-periods.md).|
|<a name="allconversionsqualified"></a>AllConversionsQualified|The number of conversions.<br/><br/>A conversion is the completion of an action by a customer after viewing your ad. The action could be purchasing your product, registering for your webinar, joining an organization, or whatever you consider your goal and best measure of the ad's success.<br/><br/>Conversions are measured by adding a small bit of code to your website pages so that a visitor's progress through your site can be tracked.<br/><br/>Data will be excluded from the [Conversions](#conversions) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllConversions](#allconversions) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.<br/><br/>You should expect the data type as **double** whether or not there are partial externally attributed offline conversions.<br/><br/>Not everyone has this feature yet. If you don't, don't worry - it's coming soon!|
|<a name="allcostperconversion"></a>AllCostPerConversion|The cost per conversion.<br/><br/>The formula for calculating the cost per conversion is (Spend / Conversions). Only ads in campaigns that enable conversion tracking contribute to the conversion number, so unless all campaigns in the account enable conversion tracking, the number will not be accurate.<br/><br/>Data will be excluded from the [CostPerConversion](#costperconversion) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllCostPerConversion](#allcostperconversion) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="allreturnonadspend"></a>AllReturnOnAdSpend|The return on ad spend (ROAS).<br/><br/>The formula for calculating the ROAS is (Revenue / Spend).<br/><br/>Data will be excluded from the [ReturnOnAdSpend](#returnonadspend) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllReturnOnAdSpend](#allreturnonadspend) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="allrevenue"></a>AllRevenue|The revenue optionally reported by the advertiser as a result of conversions.<br/><br/>Data will be excluded from the [Revenue](#revenue) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllRevenue](#allrevenue) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="allrevenueperconversion"></a>AllRevenuePerConversion|The revenue per conversion.<br/><br/>The formula for calculating the revenue per conversion is (Revenue / Conversions).<br/><br/>Data will be excluded from the [RevenuePerConversion](#revenueperconversion) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllRevenuePerConversion](#allrevenueperconversion) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="assetgroupid"></a>AssetGroupId|The Microsoft Advertising assigned identifier of an asset group.|
|<a name="assetgroupname"></a>AssetGroupName|The asset group name.|
|<a name="assetgroupstatus"></a>AssetGroupStatus|The asset group status.|
|<a name="assistedclicks"></a>AssistedClicks|Clicks on your ads that have received co-bids from your manufacturer partners. Clicks are what you pay for.<br/><br/>Clicks typically include a customer clicking an ad on a search results page or on a website on the search network. Clicks can also come from other sources (for example, spiders, robots, and test servers).<br/><br/>This performance statistic is only available for Sponsored Products in Microsoft Shopping Campaigns.|
|<a name="assistedconversions"></a>AssistedConversions|The number of conversions.<br/><br/>A conversion is the completion of an action by a customer after viewing your ad. The action could be purchasing your product, registering for your webinar, joining an organization, or whatever you consider your goal and best measure of the ad's success.<br/><br/>Conversions are measured by adding a small bit of code to your website pages so that a visitor's progress through your site can be tracked.<br/><br/>Data will be excluded from the [Conversions](#conversions) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllConversions](#allconversions) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="assistedconversionsqualified"></a>AssistedConversionsQualified|Reserved for future use.|
|<a name="assistedimpressions"></a>AssistedImpressions|The number of times an ad that is being co-bid by your manufacturer partners has been displayed on search results pages or other sites on the Microsoft Advertising Network.<br/><br/>This performance statistic is only available for Sponsored Products in Microsoft Shopping Campaigns.|
|<a name="averagecpc"></a>AverageCpc|The average cost per click (CPC). The total cost of all clicks on an ad divided by the number of clicks. This is the average amount you're actually charged each time your ad is clicked. For example, if you paid a total of 48.35 for 300 clicks, your average CPC is 0.16. The formula for calculating the average CPC is *(Spend /Clicks)*.|
|<a name="averagecpm"></a>AverageCpm|The total advertising cost divided by the number of impressions (in thousands).<br/<br/>In Latin, mille means a thousand. Also, sometimes called average cost per thousand (CPT).<br/><br/>This is a standard advertising industry performance metric that we calculate based on your spend and number of impressions.<br/><br/>The goal of CPM-based ad budgeting is to build awareness of your brand to large audiences. CPM tells you how much it costs to get an ad to the type of users you're targeting.|
|<a name="benchmarkbid"></a>BenchmarkBid|Shows you how much other advertisers are bidding on average on similar products as your current target. Use this information as a benchmark to compare your bidding strategy for a product group against that of other advertisers advertising similar products. If the benchmark bid is significantly higher than your bid, you might consider raising your bid.|
|<a name="benchmarkctr"></a>BenchmarkCtr|Shows you how other product ads for similar products are performing on average based on how often people who see the ad end up clicking on it. If the benchmark CTR is significantly higher than the CTR for your product group, you might consider raising your bid for that product group, or improving the product information, particularly product images and titles.|
|<a name="bidstrategytype"></a>BidStrategyType|The bid strategy type. Possible values include *EnhancedCpc* and *ManualCpc*. If the InheritFromParent strategy type is used, the report will include the inherited bid strategy type e.g. one of the supported values listed above.|
|<a name="brand"></a>Brand|The product item's manufacturer, brand, or publisher.|
|<a name="campaignid"></a>CampaignId|The Microsoft Advertising assigned identifier of a campaign.|
|<a name="campaignname"></a>CampaignName|The campaign name.|
|<a name="campaignstatus"></a>CampaignStatus|The campaign status.|
|<a name="campaigntype"></a>CampaignType|The campaign type.<br/><br/>Possible values include *Audience*, *Dynamic search*, *Search & content*, and *Shopping*.|
|<a name="clicks"></a>Clicks|Clicks are what you pay for. Clicks typically include a customer clicking an ad on a search results page or on a website on the search network. Clicks can also come from other sources (for example, spiders, robots, and test servers). For more information, see [Microsoft Advertising click measurement: description of methodology](https://about.ads.microsoft.com/en-us/resources/policies/microsoft-advertising-click-measurement-description-of-methodology).|
|<a name="clicksharepercent"></a>ClickSharePercent|The percentage of clicks that went to your ads. It is the share of the prospective customer's mindshare and buying intent you captured. You can use this performance metric to see where your growth opportunites are.<br/><br/>For example, your click share percent is 30% if 10 ads were clicked, and three of the 10 ads were yours.<br/><br/>The value of this column is empty if the data is not available. If you try to include this column with *Hourly* or *HourOfDay* aggregation the service will return code *2053*.<br/><br/>If you include this column, then you may not include restricted attributes such as [TopVsOther](#topvsother) in the same report request. Likewise if you include any of the restricted attribute columns, then you must exclude this column. For more information, see [Column Restrictions](../guides/reports.md#columnrestrictions).|
|<a name="clicktype"></a>ClickType|Click type refers to each component of an ad that a customer can click. The possible click types are ad title, image, phone number, driving directions, sitelink, and review.|
|<a name="clicktypeid"></a>ClickTypeId|The click type ID.|
|<a name="condition"></a>Condition|The condition of a product item. Possible values include:NewUsedRefurbishedRemanufacturedCollectableOpen Box|
|<a name="conversionrate"></a>ConversionRate|The conversion rate as a percentage.<br/><br/>The number of conversions, divided by the total number of clicks. For example, if the ads in your campaign got 300 clicks and four conversions, the conversion rate is 1.33 (%).<br/><br/>The formula for calculating the conversion rate is (Conversions / Clicks) x 100.<br/><br/>Data will be excluded from the [ConversionRate](#conversionrate) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllConversionRate](#allconversionrate) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="conversions"></a>Conversions|The number of conversions.<br/><br/>A conversion is the completion of an action by a customer after viewing your ad. The action could be purchasing your product, registering for your webinar, joining an organization, or whatever you consider your goal and best measure of the ad's success.<br/><br/>Conversions are measured by adding a small bit of code to your website pages so that a visitor's progress through your site can be tracked.<br/><br/>Data will be excluded from the [Conversions](#conversions) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllConversions](#allconversions) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.<br/><br/>This column will be deprecated in 2022, so you should use the [ConversionsQualified](#conversionsqualified) column instead. Going forward, performance reports will return "0" (zero) in this column. Historical data for time periods prior to the deprecation date will still be available according to the published [data retention period](../guides/report-data-retention-time-periods.md).|
|<a name="conversionsqualified"></a>ConversionsQualified|The number of conversions.<br/><br/>A conversion is the completion of an action by a customer after viewing your ad. The action could be purchasing your product, registering for your webinar, joining an organization, or whatever you consider your goal and best measure of the ad's success.<br/><br/>Conversions are measured by adding a small bit of code to your website pages so that a visitor's progress through your site can be tracked.<br/><br/>Data will be excluded from the [Conversions](#conversions) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllConversions](#allconversions) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.<br/><br/>You should expect the data type as **double** whether or not there are partial externally attributed offline conversions.<br/><br/>Not everyone has this feature yet. If you don't, don't worry - it's coming soon!|
|<a name="costperconversion"></a>CostPerConversion|The cost per conversion.<br/><br/>The formula for calculating the cost per conversion is (Spend / Conversions). Only ads in campaigns that enable conversion tracking contribute to the conversion number, so unless all campaigns in the account enable conversion tracking, the number will not be accurate.<br/><br/>Data will be excluded from the [CostPerConversion](#costperconversion) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllCostPerConversion](#allcostperconversion) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="costperinstall"></a>CostPerInstall|Reserved.|
|<a name="costpersale"></a>CostPerSale|Reserved.|
|<a name="countryofsale"></a>CountryOfSale|The country/region of sale for the product catalog.|
|<a name="ctr"></a>Ctr|The click-through rate (CTR) is the number of times an ad was clicked, divided by the number of times the ad was shown (impressions). For example, if your ads got 50 clicks given 2,348 impressions, your CTR is 2.13 (%). The formula for calculating CTR is *(Clicks / Impressions) x 100*.|
|<a name="currencycode"></a>CurrencyCode|The account currency type. For possible values, see [Currencies](../guides/currencies.md).|
|<a name="customlabel0"></a>CustomLabel0|The value of the Custom_label_0 field in your Microsoft Merchant Center catalog.|
|<a name="customlabel1"></a>CustomLabel1|The value of the Custom_label_1 field in your Microsoft Merchant Center catalog.|
|<a name="customlabel2"></a>CustomLabel2|The value of the Custom_label_2 field in your Microsoft Merchant Center catalog.|
|<a name="customlabel3"></a>CustomLabel3|The value of the Custom_label_3 field in your Microsoft Merchant Center catalog.|
|<a name="customlabel4"></a>CustomLabel4|The value of the Custom_label_4 field in your Microsoft Merchant Center catalog.|
|<a name="devicetype"></a>DeviceType|The device name attribute of a device OS target bid. The type of device which showed ads. The possible values include *Computer*, *Smartphone*, *Tablet*, and *Unknown*.|
|<a name="goal"></a>Goal|The name of the goal you set for the conversions you want, meaning actions customers take after clicking your ad.|
|<a name="goalid"></a>GoalId|Reserved.|
|<a name="goaltype"></a>GoalType|The type of conversion goal.<br/>Possible values include *AppInstall*, *Duration*, *Event*, *InStoreTransaction*, *OfflineConversion*, *PagesViewedPerVisit*, and *Url*.|
|<a name="gtin"></a>GTIN|Global Trade Item Number (GTIN) is a unique numerical value for commercial products that usually appears printed under the barcode on retail products.|
|<a name="impressionlosttobudgetpercent"></a>ImpressionLostToBudgetPercent|The estimated percentage of impressions your ad did not receive due to issues with your daily or monthly budget.<br/><br/>The value of this column is empty if the data is not available. If you try to include this column with *Hourly* or *HourOfDay* aggregation the service will return code *2053*.<br/><br/>If you include this column, then you may not include restricted attributes such as [TopVsOther](#topvsother) in the same report request. Likewise if you include any of the restricted attribute columns, then you must exclude this column. For more information, see [Column Restrictions](../guides/reports.md#columnrestrictions). Data for this column is typically updated 14-18 hours after the UTC day ends. For Microsoft Shopping Campaigns, this data is only available with the campaign and ad group performance reports.|
|<a name="impressionlosttorankpercent"></a>ImpressionLostToRankPercent|The estimated percentage of impressions your ad did not receive due to issues with your ad ranking.<br/><br/>The value of this column is empty if the data is not available. If you try to include this column with *Hourly* or *HourOfDay* aggregation the service will return code *2053*.<br/><br/>If you include this column, then you may not include restricted attributes such as [TopVsOther](#topvsother) in the same report request. Likewise if you include any of the restricted attribute columns, then you must exclude this column. For more information, see [Column Restrictions](../guides/reports.md#columnrestrictions). Data for this column is typically updated 14-18 hours after the UTC day ends. For Microsoft Shopping Campaigns, this data is not available.|
|<a name="impressions"></a>Impressions|The number of times an ad has been displayed on search results pages. Without impressions there are no clicks or conversions.|
|<a name="impressionsharepercent"></a>ImpressionSharePercent|The estimated percentage of impressions, out of the total available impressions in the market you were targeting.<br/><br/>The value of this column is empty if the data is not available. For example, out of estimated 59,000 impressions that occurred on this day in your targeted market, you got only about 2,300, or 3%. If you try to include this column with *Hourly* or *HourOfDay* aggregation the service will return code *2053*.<br/><br/>If you include this column, then you may not include restricted attributes such as [TopVsOther](#topvsother) in the same report request. Likewise if you include any of the restricted attribute columns, then you must exclude this column. For more information, see [Column Restrictions](../guides/reports.md#columnrestrictions). Data for this column is typically updated 14-18 hours after the UTC day ends. For Microsoft Shopping Campaigns, this data is only available with the campaign and ad group performance reports.|
|<a name="installs"></a>Installs|Reserved.|
|<a name="language"></a>Language|The language of the publisher where the ad was shown.<br/><br/>For possible values, see the Language column of [Ad Languages](../guides/ad-languages.md#adlanguage). The language display name will be provided in the report e.g. *English*.|
|<a name="localstorecode"></a>LocalStoreCode|An alphanumeric identifier defined by the merchant to uniquely identify each local store. |
|<a name="merchantproductid"></a>MerchantProductId|The unique identifier provided by a merchant for each product offer.|
|<a name="mpn"></a>MPN|Manufacturer Part Number (MPN) is a unique number that identifies the product to its manufacturer.|
|<a name="network"></a>Network|The entire Microsoft Advertising Network made up of Microsoft sites and select traffic, and only partner traffic. Use this data to make the best decision on network selection for your ad groups. The possible values include AOL search, Audience, Microsoft sites and select traffic, Content, and Syndicated search partners.<br/><br/>*Note*: Not everyone can use the value *Microsoft sites and select traffic* yet. If you can't, don't worry - it's coming soon!|
|<a name="offerlanguage"></a>OfferLanguage|The language for the product offer. For possible values see [Ad Languages](../guides/ad-languages.md). The language display name will be provided in the report e.g. *English*.|
|<a name="price"></a>Price|The different price for products in your catalog.|
|<a name="productbought"></a>ProductBought|The product purchased from your catalog or via your retail partner.<br/><br/>The purchased product will always match the same brand, but can differ from the specific product ad that was clicked on. If different products were purchased as a result of one click, the report will include multiple rows with the same ad ID and Merchant product ID, and each will contain a unique ProductBought value. You can also include the QuantityBought column to get data on quantity purchased per product.|
|<a name="productboughttitle"></a>ProductBoughtTitle|The title associated with the purchased product.|
|<a name="productcategory1"></a>ProductCategory1|The first level value of the Product_category field in your Microsoft Merchant Center catalog. For more information, see  [How is the catalog feed organized?](https://help.ads.microsoft.com/#apex/3/en/51084/1)|
|<a name="productcategory2"></a>ProductCategory2|The second level value of the Product_category field in your Microsoft Merchant Center catalog. For more information, see  [How is the catalog feed organized?](https://help.ads.microsoft.com/#apex/3/en/51084/1)|
|<a name="productcategory3"></a>ProductCategory3|The third level value of the Product_category field in your Microsoft Merchant Center catalog. For more information, see  [How is the catalog feed organized?](https://help.ads.microsoft.com/#apex/3/en/51084/1)|
|<a name="productcategory4"></a>ProductCategory4|The fourth level value of the Product_category field in your Microsoft Merchant Center catalog. For more information, see  [How is the catalog feed organized?](https://help.ads.microsoft.com/#apex/3/en/51084/1)|
|<a name="productcategory5"></a>ProductCategory5|The fifth level value of the Product_category field in your Microsoft Merchant Center catalog. For more information, see  [How is the catalog feed organized?](https://help.ads.microsoft.com/#apex/3/en/51084/1)|
|<a name="producttype1"></a>ProductType1|The first level value of the Product_type field in your Microsoft Merchant Center catalog. For more information, see  [How is the catalog feed organized?](https://help.ads.microsoft.com/#apex/3/en/51084/1)|
|<a name="producttype2"></a>ProductType2|The second level value of the Product_type field in your Microsoft Merchant Center catalog. For more information, see  [How is the catalog feed organized?](https://help.ads.microsoft.com/#apex/3/en/51084/1)|
|<a name="producttype3"></a>ProductType3|The third level value of the Product_type field in your Microsoft Merchant Center catalog. For more information, see  [How is the catalog feed organized?](https://help.ads.microsoft.com/#apex/3/en/51084/1)|
|<a name="producttype4"></a>ProductType4|The fourth level value of the Product_type field in your Microsoft Merchant Center catalog. For more information, see  [How is the catalog feed organized?](https://help.ads.microsoft.com/#apex/3/en/51084/1)|
|<a name="producttype5"></a>ProductType5|The fifth level value of the Product_type field in your Microsoft Merchant Center catalog. For more information, see  [How is the catalog feed organized?](https://help.ads.microsoft.com/#apex/3/en/51084/1)|
|<a name="quantitybought"></a>QuantityBought|The quantity of the product purchased ([ProductBought](#productbought)) from your catalog or via your retail partner.|
|<a name="returnonadspend"></a>ReturnOnAdSpend|The return on ad spend (ROAS).<br/><br/>The formula for calculating the ROAS is (Revenue / Spend).<br/><br/>Data will be excluded from the [ReturnOnAdSpend](#returnonadspend) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllReturnOnAdSpend](#allreturnonadspend) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="revenue"></a>Revenue|The revenue optionally reported by the advertiser as a result of conversions.<br/><br/>Data will be excluded from the [Revenue](#revenue) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllRevenue](#allrevenue) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="revenueperconversion"></a>RevenuePerConversion|The revenue per conversion.<br/><br/>The formula for calculating the revenue per conversion is (Revenue / Conversions).<br/><br/>Data will be excluded from the [RevenuePerConversion](#revenueperconversion) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllRevenuePerConversion](#allrevenueperconversion) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="revenueperinstall"></a>RevenuePerInstall|Reserved.|
|<a name="revenuepersale"></a>RevenuePerSale|Reserved.|
|<a name="sales"></a>Sales|Reserved.|
|<a name="sellername"></a>SellerName|The merchant or store name that offers the product.|
|<a name="spend"></a>Spend|The cost per click (CPC) summed for each click.|
|<a name="storeid"></a>StoreId|The unique identifier for the Microsoft Merchant Center store.|
|<a name="timeperiod"></a>TimePeriod|The time period of each report row. You may not include this column if the *Aggregation* element of the request object is set to Summary. For more information, see [Time Period Column](../guides/reports.md#timeperiod).|
|<a name="title"></a>Title|The product item name. For example the title of a book, DVD, or game.|
|<a name="topvsother"></a>TopVsOther|Indicates whether the ad impression appeared in a top position or elsewhere. The possible values include AOL search - Top, AOL search - Other, Audience network, Bing and Yahoo! search - Top, Bing and Yahoo! search - Other, Syndicated search partners - Top, Syndicated search partners - Other, Content network, and Unknown.|
|<a name="totalclicksonadelements"></a>TotalClicksOnAdElements|The number of clicks when this ad element was present in the ad copy, whether this or another ad element was clicked on.|
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
|TimePeriod|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[ProductDimensionPerformanceReportRequest](productdimensionperformancereportrequest.md)  
