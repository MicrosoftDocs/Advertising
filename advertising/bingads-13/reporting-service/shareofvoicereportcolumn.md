---
title: ShareOfVoiceReportColumn Value Set - Reporting
ms.service: bing-ads-reporting-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines the attributes and performance statistics columns that you can include in the ShareOfVoiceReportRequest.
---
# ShareOfVoiceReportColumn Value Set - Reporting
Defines the attributes and performance statistics columns that you can include in the [ShareOfVoiceReportRequest](shareofvoicereportrequest.md).

The attribute columns that you include in a report can affect how the statistics are aggregated. In other words the number of rows increase by a factor of the unique attributes. For more information, see [Columns that Group the Data](../guides/reports.md#columnsdata).

For a list of columns that you must include, please see the [Required Columns](#requiredcolumns) section below.

To see how far back daily, weekly, monthly, yearly and summary aggregated data can be retrieved for a report, see [Report Data Retention Time Periods](../guides/report-data-retention-time-periods.md).  

> [!NOTE]
> The ImpressionSharePercent, ImpressionLostToBudgetPercent, and ImpressionLostToRankAggPercent columns are the only applicable Share of Voice data available for Microsoft Advertising Shopping Campaigns. 

## Syntax
```xml
<xs:simpleType name="ShareOfVoiceReportColumn" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="AccountName" />
    <xs:enumeration value="TimePeriod" />
    <xs:enumeration value="CampaignName" />
    <xs:enumeration value="AdGroupName" />
    <xs:enumeration value="Keyword" />
    <xs:enumeration value="DeliveredMatchType" />
    <xs:enumeration value="BidMatchType" />
    <xs:enumeration value="Language" />
    <xs:enumeration value="AccountNumber" />
    <xs:enumeration value="AccountId" />
    <xs:enumeration value="KeywordId" />
    <xs:enumeration value="AdGroupId" />
    <xs:enumeration value="CampaignId" />
    <xs:enumeration value="Impressions" />
    <xs:enumeration value="Clicks" />
    <xs:enumeration value="Ctr" />
    <xs:enumeration value="AverageCpc" />
    <xs:enumeration value="Spend" />
    <xs:enumeration value="AveragePosition" />
    <xs:enumeration value="ImpressionSharePercent" />
    <xs:enumeration value="ImpressionLostToBudgetPercent" />
    <xs:enumeration value="ImpressionLostToRankAggPercent" />
    <xs:enumeration value="CurrentMaxCpc" />
    <xs:enumeration value="QualityScore" />
    <xs:enumeration value="ExpectedCtr" />
    <xs:enumeration value="AdRelevance" />
    <xs:enumeration value="LandingPageExperience" />
    <xs:enumeration value="Conversions" />
    <xs:enumeration value="ConversionRate" />
    <xs:enumeration value="CostPerConversion" />
    <xs:enumeration value="AdDistribution" />
    <xs:enumeration value="ClickSharePercent" />
    <xs:enumeration value="DeviceType" />
    <xs:enumeration value="Network" />
    <xs:enumeration value="AccountStatus" />
    <xs:enumeration value="CampaignStatus" />
    <xs:enumeration value="AdGroupStatus" />
    <xs:enumeration value="KeywordStatus" />
    <xs:enumeration value="BidStrategyType" />
    <xs:enumeration value="KeywordLabels" />
    <xs:enumeration value="ExactMatchImpressionSharePercent" />
    <xs:enumeration value="TopImpressionShareLostToRankPercent" />
    <xs:enumeration value="TopImpressionShareLostToBudgetPercent" />
    <xs:enumeration value="AbsoluteTopImpressionShareLostToRankPercent" />
    <xs:enumeration value="AbsoluteTopImpressionShareLostToBudgetPercent" />
    <xs:enumeration value="AbsoluteTopImpressionSharePercent" />
    <xs:enumeration value="TopImpressionSharePercent" />
    <xs:enumeration value="AbsoluteTopImpressionRatePercent" />
    <xs:enumeration value="TopImpressionRatePercent" />
    <xs:enumeration value="BaseCampaignId" />
    <xs:enumeration value="AllConversions" />
    <xs:enumeration value="AllConversionRate" />
    <xs:enumeration value="AllCostPerConversion" />
    <xs:enumeration value="ViewThroughConversions" />
    <xs:enumeration value="Goal" />
    <xs:enumeration value="GoalType" />
    <xs:enumeration value="AverageCpm" />
    <xs:enumeration value="ConversionsQualified" />
    <xs:enumeration value="AllConversionsQualified" />
    <xs:enumeration value="ViewThroughConversionsQualified" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [ShareOfVoiceReportColumn](shareofvoicereportcolumn.md) value set has the following values: [AbsoluteTopImpressionRatePercent](#absolutetopimpressionratepercent), [AbsoluteTopImpressionShareLostToBudgetPercent](#absolutetopimpressionsharelosttobudgetpercent), [AbsoluteTopImpressionShareLostToRankPercent](#absolutetopimpressionsharelosttorankpercent), [AbsoluteTopImpressionSharePercent](#absolutetopimpressionsharepercent), [AccountId](#accountid), [AccountName](#accountname), [AccountNumber](#accountnumber), [AccountStatus](#accountstatus), [AdDistribution](#addistribution), [AdGroupId](#adgroupid), [AdGroupName](#adgroupname), [AdGroupStatus](#adgroupstatus), [AdRelevance](#adrelevance), [AllConversionRate](#allconversionrate), [AllConversions](#allconversions), [AllConversionsQualified](#allconversionsqualified), [AllCostPerConversion](#allcostperconversion), [AverageCpc](#averagecpc), [AverageCpm](#averagecpm), [AveragePosition](#averageposition), [BaseCampaignId](#basecampaignid), [BidMatchType](#bidmatchtype), [BidStrategyType](#bidstrategytype), [CampaignId](#campaignid), [CampaignName](#campaignname), [CampaignStatus](#campaignstatus), [Clicks](#clicks), [ClickSharePercent](#clicksharepercent), [ConversionRate](#conversionrate), [Conversions](#conversions), [ConversionsQualified](#conversionsqualified), [CostPerConversion](#costperconversion), [Ctr](#ctr), [CurrentMaxCpc](#currentmaxcpc), [DeliveredMatchType](#deliveredmatchtype), [DeviceType](#devicetype), [ExactMatchImpressionSharePercent](#exactmatchimpressionsharepercent), [ExpectedCtr](#expectedctr), [Goal](#goal), [GoalType](#goaltype), [ImpressionLostToBudgetPercent](#impressionlosttobudgetpercent), [ImpressionLostToRankAggPercent](#impressionlosttorankaggpercent), [Impressions](#impressions), [ImpressionSharePercent](#impressionsharepercent), [Keyword](#keyword), [KeywordId](#keywordid), [KeywordLabels](#keywordlabels), [KeywordStatus](#keywordstatus), [LandingPageExperience](#landingpageexperience), [Language](#language), [Network](#network), [QualityScore](#qualityscore), [Spend](#spend), [TimePeriod](#timeperiod), [TopImpressionRatePercent](#topimpressionratepercent), [TopImpressionShareLostToBudgetPercent](#topimpressionsharelosttobudgetpercent), [TopImpressionShareLostToRankPercent](#topimpressionsharelosttorankpercent), [TopImpressionSharePercent](#topimpressionsharepercent), [ViewThroughConversions](#viewthroughconversions), [ViewThroughConversionsQualified](#viewthroughconversionsqualified).

|Value|Description|
|-----------|---------------|
|<a name="absolutetopimpressionratepercent"></a>AbsoluteTopImpressionRatePercent|How often your ad was in the first position of all results, as a percentage of your total impressions.<br/><br/>A higher number indicates your ad is frequently showing in the best ad position.|
|<a name="absolutetopimpressionsharelosttobudgetpercent"></a>AbsoluteTopImpressionShareLostToBudgetPercent|The estimated percentage of how often your ad missed showing in the very top ad position, above search results, due to insufficient budget.<br/><br/>This indicates where increasing your budget might improve your chances at the top ad position, which is more likely to win clicks and conversions.|
|<a name="absolutetopimpressionsharelosttorankpercent"></a>AbsoluteTopImpressionShareLostToRankPercent|The estimated percentage of how often poor ad rank kept your ad from showing in the first ad position at the top of search results.<br/><br/>Use this data to help you assess reasons your ads are missing out on the top ad position, which is more likely to win clicks and conversions. Ad rank determines where your ad shows relative to other ads, based on factors including your bid amount, ad performance, ad relevance, ad extensions, other competing ads, and more.|
|<a name="absolutetopimpressionsharepercent"></a>AbsoluteTopImpressionSharePercent|The estimated percentage of times your ad was in the first position of all results, out of the estimated number of first position impressions you were eligible to receive.<br/><br/>A low number means your ads are less likely to win clicks and conversions, because they rarely appear in the first position. This might indicate you need to increase your bid or budget.<br/><br/>Prior to April 20, 2019 this performance statistic was only calculated for Microsoft Shopping campaigns.|
|<a name="accountid"></a>AccountId|The Microsoft Advertising assigned identifier of an account.|
|<a name="accountname"></a>AccountName|The account name.|
|<a name="accountnumber"></a>AccountNumber|The Microsoft Advertising assigned number of an account.|
|<a name="accountstatus"></a>AccountStatus|The account status.|
|<a name="addistribution"></a>AdDistribution|The network where you want your ads to show.|
|<a name="adgroupid"></a>AdGroupId|The Microsoft Advertising assigned identifier of an ad group.|
|<a name="adgroupname"></a>AdGroupName|The ad group name.|
|<a name="adgroupstatus"></a>AdGroupStatus|The ad group status.|
|<a name="adrelevance"></a>AdRelevance|How closely related your ads is to the customer's search query or other input. It tells you how relevant your ad and landing page are to potential customers. A score of 3 is Above Average; a score of 2 is Average; and a score of 1 is considered Below Average. The score is calculated only based on Search Traffic. The value in the report will be "--" (double dash) if the score was not computed. If you specify a time period that spans multiple days, the score will be the same for each day in the time period, and the value is the most recent calculated score. Data for this column is typically updated 14-18 hours after the UTC day ends.|
|<a name="allconversionrate"></a>AllConversionRate|The conversion rate as a percentage.<br/><br/>The number of conversions, divided by the total number of clicks. For example, if the ads in your campaign got 300 clicks and four conversions, the conversion rate is 1.33 (%).<br/><br/>The formula for calculating the conversion rate is (Conversions / Clicks) x 100.<br/><br/>Data will be excluded from the [ConversionRate](#conversionrate) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllConversionRate](#allconversionrate) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="allconversions"></a>AllConversions|The number of conversions.<br/><br/>A conversion is the completion of an action by a customer after viewing your ad. The action could be purchasing your product, registering for your webinar, joining an organization, or whatever you consider your goal and best measure of the ad's success.<br/><br/>Conversions are measured by adding a small bit of code to your website pages so that a visitor's progress through your site can be tracked.<br/><br/>Data will be excluded from the [Conversions](#conversions) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllConversions](#allconversions) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.<br/><br/>This column is deprecated as of March 31st, 2022, so you should use the [AllConversionsQualified](#allconversionsqualified) column instead. Going forward, performance reports will return "0" (zero) in this column. Historical data for time periods prior to the deprecation date will still be available according to the published [data retention period](../guides/report-data-retention-time-periods.md).|
|<a name="allconversionsqualified"></a>AllConversionsQualified|The number of conversions.<br/><br/>A conversion is the completion of an action by a customer after viewing your ad. The action could be purchasing your product, registering for your webinar, joining an organization, or whatever you consider your goal and best measure of the ad's success.<br/><br/>Conversions are measured by adding a small bit of code to your website pages so that a visitor's progress through your site can be tracked.<br/><br/>Data will be excluded from the [Conversions](#conversions) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllConversions](#allconversions) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.<br/><br/>You should expect the data type as **double** whether or not there are partial externally attributed offline conversions.<br/><br/>Not everyone has this feature yet. If you don't, don't worry - it's coming soon!|
|<a name="allcostperconversion"></a>AllCostPerConversion|The cost per conversion.<br/><br/>The formula for calculating the cost per conversion is (Spend / Conversions). Only ads in campaigns that enable conversion tracking contribute to the conversion number, so unless all campaigns in the account enable conversion tracking, the number will not be accurate.<br/><br/>Data will be excluded from the [CostPerConversion](#costperconversion) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllCostPerConversion](#allcostperconversion) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="averagecpc"></a>AverageCpc|The average cost per click (CPC). The total cost of all clicks on an ad divided by the number of clicks. This is the average amount you're actually charged each time your ad is clicked. For example, if you paid a total of 48.35 for 300 clicks, your average CPC is 0.16. The formula for calculating the average CPC is *(Spend /Clicks)*.|
|<a name="averagecpm"></a>AverageCpm|The total advertising cost divided by the number of impressions (in thousands).<br/<br/>In Latin, mille means a thousand. Also, sometimes called average cost per thousand (CPT).<br/><br/>This is a standard advertising industry performance metric that we calculate based on your spend and number of impressions.<br/><br/>The goal of CPM-based ad budgeting is to build awareness of your brand to large audiences. CPM tells you how much it costs to get an ad to the type of users you're targeting.|
|<a name="averageposition"></a>AveragePosition|The average position of the ad on a webpage.<br/><br/>This column is deprecated as of March 31st, 2021. Going forward, performance reports will return average position of "0" (zero). Historical average position data for time periods prior to the deprecation date will still be available according to the published [data retention period](../guides/report-data-retention-time-periods.md) per report type.|
|<a name="basecampaignid"></a>BaseCampaignId|The Microsoft Advertising assigned identifier of an experiment campaign.<br/><br/>This will be the same value as the [CampaignId](#campaignid) if the campaign is not an experiment.|
|<a name="bidmatchtype"></a>BidMatchType|The keyword bid match type. This can be different from the *DeliveredMatchType* column, for example if you bid on a broad match and the search term was an exact match. For more information, see [Budget and Bid Strategies](../guides/budget-bid-strategies.md). The possible values are *Broad*, *Exact*, *Phrase*, and *Unknown*.|
|<a name="bidstrategytype"></a>BidStrategyType|The bid strategy type. Possible values include *EnhancedCpc*, *ManualCpc*, *MaxClicks*, *MaxConversions*, and *TargetCpa*. If the *InheritFromParent* strategy type is used, the report will include the inherited bid strategy type e.g. one of the supported values listed above.|
|<a name="campaignid"></a>CampaignId|The Microsoft Advertising assigned identifier of a campaign.|
|<a name="campaignname"></a>CampaignName|The campaign name.|
|<a name="campaignstatus"></a>CampaignStatus|The campaign status.|
|<a name="clicks"></a>Clicks|Clicks are what you pay for. Clicks typically include a customer clicking an ad on a search results page or on a website on the search network. Clicks can also come from other sources (for example, spiders, robots, and test servers). For more information, see [Microsoft Advertising click measurement: description of methodology](https://about.ads.microsoft.com/en-us/resources/policies/microsoft-advertising-click-measurement-description-of-methodology).|
|<a name="clicksharepercent"></a>ClickSharePercent|The percentage of clicks that went to your ads. It is the share of the prospective customer's mindshare and buying intent you captured. You can use this performance metric to see where your growth opportunites are.<br/><br/>For example, your click share percent is 30% if 10 ads were clicked, and three of the 10 ads were yours.|
|<a name="conversionrate"></a>ConversionRate|The conversion rate as a percentage.<br/><br/>The number of conversions, divided by the total number of clicks. For example, if the ads in your campaign got 300 clicks and four conversions, the conversion rate is 1.33 (%).<br/><br/>The formula for calculating the conversion rate is (Conversions / Clicks) x 100.<br/><br/>Data will be excluded from the [ConversionRate](#conversionrate) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllConversionRate](#allconversionrate) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="conversions"></a>Conversions|The number of conversions.<br/><br/>A conversion is the completion of an action by a customer after viewing your ad. The action could be purchasing your product, registering for your webinar, joining an organization, or whatever you consider your goal and best measure of the ad's success.<br/><br/>Conversions are measured by adding a small bit of code to your website pages so that a visitor's progress through your site can be tracked.<br/><br/>Data will be excluded from the [Conversions](#conversions) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllConversions](#allconversions) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.<br/><br/>This column is deprecated as of March 31st, 2022, so you should use the [ConversionsQualified](#conversionsqualified) column instead. Going forward, performance reports will return "0" (zero) in this column. Historical data for time periods prior to the deprecation date will still be available according to the published [data retention period](../guides/report-data-retention-time-periods.md).|
|<a name="conversionsqualified"></a>ConversionsQualified|The number of conversions.<br/><br/>A conversion is the completion of an action by a customer after viewing your ad. The action could be purchasing your product, registering for your webinar, joining an organization, or whatever you consider your goal and best measure of the ad's success.<br/><br/>Conversions are measured by adding a small bit of code to your website pages so that a visitor's progress through your site can be tracked.<br/><br/>Data will be excluded from the [Conversions](#conversions) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllConversions](#allconversions) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.<br/><br/>You should expect the data type as **double** whether or not there are partial externally attributed offline conversions.<br/><br/>Not everyone has this feature yet. If you don't, don't worry - it's coming soon!|
|<a name="costperconversion"></a>CostPerConversion|The cost per conversion.<br/><br/>The formula for calculating the cost per conversion is (Spend / Conversions). Only ads in campaigns that enable conversion tracking contribute to the conversion number, so unless all campaigns in the account enable conversion tracking, the number will not be accurate.<br/><br/>Data will be excluded from the [CostPerConversion](#costperconversion) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true. The [AllCostPerConversion](#allcostperconversion) column will include data for all conversion goals regardless of their [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="ctr"></a>Ctr|The click-through rate (CTR) is the number of times an ad was clicked, divided by the number of times the ad was shown (impressions). For example, if your ads got 50 clicks given 2,348 impressions, your CTR is 2.13 (%). The formula for calculating CTR is *(Clicks / Impressions) x 100*.|
|<a name="currentmaxcpc"></a>CurrentMaxCpc|The maximum cost per click bid that was in effect at the time the report was generated. It is not a moving historical bid throughout the report time period.|
|<a name="deliveredmatchtype"></a>DeliveredMatchType|The match type used to deliver an ad. This can be different from the *BidMatchType* column, for example if you bid on a broad match and the search term was an exact match. For more information, see [Budget and Bid Strategies](../guides/budget-bid-strategies.md). The possible values are *Broad*, *Exact*, *Phrase*, and *Unknown*.|
|<a name="devicetype"></a>DeviceType|The device name attribute of a device OS target bid. The type of device which showed ads. The possible values include *Computer*, *Smartphone*, *Tablet*, and *Unknown*.|
|<a name="exactmatchimpressionsharepercent"></a>ExactMatchImpressionSharePercent|The estimated percentage of impressions that your account received for searches that exactly matched your keyword, out of the total available exact match impressions you were eligible to receive.<br/><br/>Reports on exact match impression share highlight how your keywords perform only on those searches that exactly match your keywords. Use this data together with impression share to diagnose your non-exact match keywords, and make changes to be more competitive and gain more impressions.|
|<a name="expectedctr"></a>ExpectedCtr|How well your keyword competes against other keywords targeting the same traffic. Ads that are relevant to searchers' queries or other input are more likely to have a higher click-through rate. This metric tells you if a keyword is underperforming and causing a loss in impression share, so you can make keyword changes or remove ads altogether. A score of 3 is Above Average; a score of 2 is Average; and a score of 1 is considered Below Average. If you specify a time period that spans multiple days, the score will be the same for each day in the time period, and the value is the most recent calculated score. Data for this column is typically updated 14-18 hours after the UTC day ends.|
|<a name="goal"></a>Goal|The name of the goal you set for the conversions you want, meaning actions customers take after clicking your ad.|
|<a name="goaltype"></a>GoalType|The type of conversion goal.<br/>Possible values include *AppInstall*, *Duration*, *Event*, *InStoreTransaction*, *OfflineConversion*, *PagesViewedPerVisit*, and *Url*.|
|<a name="impressionlosttobudgetpercent"></a>ImpressionLostToBudgetPercent|The estimated percentage of impressions your ad did not receive due to issues with your daily or monthly budget.<br/><br/>Data for this column is typically updated 14-18 hours after the UTC day ends. For Microsoft Shopping Campaigns, this data is only available with the campaign and ad group performance reports.|
|<a name="impressionlosttorankaggpercent"></a>ImpressionLostToRankAggPercent|The estimated percentage of impressions your ad did not receive due to issues with your ad ranking.<br/><br/>Data for this column is typically updated 14-18 hours after the UTC day ends. For Microsoft Shopping Campaigns, this data is not available.|
|<a name="impressions"></a>Impressions|The number of times an ad has been displayed on search results pages. Without impressions there are no clicks or conversions.|
|<a name="impressionsharepercent"></a>ImpressionSharePercent|The estimated percentage of impressions, out of the total available impressions in the market you were targeting.<br/><br/>For example, out of estimated 59,000 impressions that occurred on this day in your targeted market, you got only about 2,300, or 3%.<br/><br/>Data for this column is typically updated 14-18 hours after the UTC day ends. For Microsoft Shopping Campaigns, this data is only available with the campaign and ad group performance reports.|
|<a name="keyword"></a>Keyword|The keyword text.|
|<a name="keywordid"></a>KeywordId|The Microsoft Advertising assigned identifier of a keyword.<br/><br/>**IMPORTANT**: If *KeywordId* is not specified the report will not fail, but impression share data will be inaccurate unless *KeywordId* is specified.|
|<a name="keywordlabels"></a>KeywordLabels|The labels applied to the keyword.<br/><br/>Labels are delimited by a semicolon (;) in the report download.|
|<a name="keywordstatus"></a>KeywordStatus|The keyword status.|
|<a name="landingpageexperience"></a>LandingPageExperience|An aggregate quality assessment of all landing pages on your site. The landing page experience score measures whether your landing page is likely to provide a good experience to customers who click your ad and land on your website. A score of 3 is Above Average; a score of 2 is Average; and a score of 1 is considered Below Average. If you specify a time period that spans multiple days, the score will be the same for each day in the time period, and the value is the most recent calculated score. Data for this column is typically updated 14-18 hours after the UTC day ends.|
|<a name="language"></a>Language|The language of the publisher where the ad was shown.<br/><br/>For possible values, see the Language column of [Ad Languages](../guides/ad-languages.md#adlanguage). The language display name will be provided in the report e.g. *English*.|
|<a name="network"></a>Network|The combined search advertising marketplace made up of Bing, AOL, Yahoo, and partner sites. Use this data to make the best decision on network selection for your ad groups. The possible values include AOL search, Audience, Bing and Yahoo! search, Content, and Syndicated search partners.|
|<a name="qualityscore"></a>QualityScore|The numeric score shows you how competitive your ads are in the marketplace by measuring how relevant your keywords and landing pages are to customers' search terms. The quality score is calculated by Microsoft Advertising using the *ExpectedCtr*, *AdRelevance*, and *LandingPageExperience* sub scores. If available, the quality score can range from a low of 1 to a high of 10. Quality score is based on the last rolling 30 days for the owned and operated search traffic. A quality score can be assigned without any impressions, in the case where a keyword bid did not win any auctions. The score is calculated only based on Search Traffic. The value in the report will be "--" (double dash) if the score was not computed. This can occur if there have been no impressions for the keyword for 30 days or more. Quality score is typically updated 14-18 hours after the UTC day ends. Keywords in all time zones will be assigned a quality score for the corresponding UTC day. If you run the report multiple times in a day, the quality score values could change from report to report based on when you run the report relative to when the scores are calculated. If you specify a time period that spans multiple days, the quality score is the current and most recently calculated score and will be reported as the same for each day in the time period. Use the historic quality score to find out how quality score may have changed over time. Historical quality score is a daily snapshot of the rolling quality score. For more information on historic quality score, see the *HistoricalQualityScore* column.|
|<a name="spend"></a>Spend|The cost per click (CPC) summed for each click.|
|<a name="timeperiod"></a>TimePeriod|The time period of each report row. You may not include this column if the *Aggregation* element of the request object is set to Summary. For more information, see [Time Period Column](../guides/reports.md#timeperiod).|
|<a name="topimpressionratepercent"></a>TopImpressionRatePercent|The percentage of times your ad showed in the mainline, the top placement where ads appear above the search results, out of your total impressions.<br/><br/>This indicates how changes in ad position can impact performance.|
|<a name="topimpressionsharelosttobudgetpercent"></a>TopImpressionShareLostToBudgetPercent|The estimated percentage of mainline impressions, where ads appear above the search results, that were lost due to insufficient budget.<br/><br/>This indicates where increasing your budget might help improve ad position.|
|<a name="topimpressionsharelosttorankpercent"></a>TopImpressionShareLostToRankPercent|A percentage estimate of how often poor ad rank kept your ad from showing in the mainline, the top ad placements above the search results.<br/><br/>Use this metric to help you assess why your ads are missing out on the best ad positions. Ad rank determines where your ad shows relative to other ads, based on factors including your bid amount, ad performance, ad relevance, ad extensions, other competing ads, and more.|
|<a name="topimpressionsharepercent"></a>TopImpressionSharePercent|The percentage of impressions for your ad in the mainline, the top ad placements above the search results, out of the estimated number of mainline impressions you were eligible to receive.<br/><br/>A lower number indicates there might be something about your ad's eligibility that affects its position. Eligibility for top impression is based on your ad's approval status, quality score, targeting settings, and bids.|
|<a name="viewthroughconversions"></a>ViewThroughConversions|View-through conversions are conversions that people make after they have seen your ad, even though they did not click the ad.<br/><br/>View-through conversions don't have a click associated but do have an impression associated within the advertiser defined conversion window. If the user also clicked on an ad that was delivered via the Microsoft Audience or Search network, there won't be any view-through conversion counted. Only the click-based conversion would be counted.<br/><br/>View-through conversions are only counted for ads in the Microsoft Audience network.|
|<a name="viewthroughconversionsqualified"></a>ViewThroughConversionsQualified|Reserved for future use.|

## <a name="remarks"></a>Remarks
### <a name="requiredcolumns"></a>Required Columns
The report must include the following columns at a minimum. As a general rule, each report must include at least one attribute column and at least one non-impression share performance statistics column. For more information, see [Report Attributes and Performance Statistics](../guides/report-attributes-performance-statistics.md).

> [!IMPORTANT]
> If KeywordId is not specified the report will not fail, but impression share data will be inaccurate unless KeywordId is specified.  

> [!NOTE]
> The TimePeriod column is expected for all aggregation types except Summary. It is important to note that if you do not include TimePeriod, the aggregation you chose will be ignored and Summary aggregation will be used regardless.  

|Column|
|----------|
|ImpressionSharePercent|
|KeywordId|
|TimePeriod|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[ShareOfVoiceReportRequest](shareofvoicereportrequest.md)  
