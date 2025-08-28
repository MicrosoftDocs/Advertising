---
title: BidStrategyReportColumn Value Set - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the attributes and performance statistics columns that you can include in the BidStrategyReportRequest.
---
# BidStrategyReportColumn Value Set - Reporting
Defines the attributes and performance statistics columns that you can include in the BidStrategyReportRequest.

## Syntax
```xml
<xs:simpleType name="BidStrategyReportColumn" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="TimePeriod" />
    <xs:enumeration value="AccountId" />
    <xs:enumeration value="AccountName" />
    <xs:enumeration value="AccountStatus" />
    <xs:enumeration value="CampaignId" />
    <xs:enumeration value="CampaignName" />
    <xs:enumeration value="CampaignStatus" />
    <xs:enumeration value="PortfolioBidStrategyName" />
    <xs:enumeration value="PortfolioBidStrategyStatus" />
    <xs:enumeration value="BidStrategyType" />
    <xs:enumeration value="TargetCPA" />
    <xs:enumeration value="TargetRoas" />
    <xs:enumeration value="TargetImpressionShare" />
    <xs:enumeration value="NumOfCampaigns" />
    <xs:enumeration value="CurrentMaxCpc" />
    <xs:enumeration value="TargetAdPositionType" />
    <xs:enumeration value="Impressions" />
    <xs:enumeration value="Clicks" />
    <xs:enumeration value="Ctr" />
    <xs:enumeration value="Spend" />
    <xs:enumeration value="Conversions" />
    <xs:enumeration value="ConversionRate" />
    <xs:enumeration value="AverageCpc" />
    <xs:enumeration value="ConversionDelay" />
    <xs:enumeration value="CPA" />
    <xs:enumeration value="ROAS" />
    <xs:enumeration value="AvgTargetCPA" />
    <xs:enumeration value="AvgTargetRoas" />
    <xs:enumeration value="AvgTargetImpressionShare" />
    <xs:enumeration value="ImpressionSharePercent" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [BidStrategyReportColumn](bidstrategyreportcolumn.md) value set has the following values: [AccountId](#accountid), [AccountName](#accountname), [AccountStatus](#accountstatus), [AverageCpc](#averagecpc), [AvgTargetCPA](#avgtargetcpa), [AvgTargetImpressionShare](#avgtargetimpressionshare), [AvgTargetRoas](#avgtargetroas), [BidStrategyType](#bidstrategytype), [CampaignId](#campaignid), [CampaignName](#campaignname), [CampaignStatus](#campaignstatus), [Clicks](#clicks), [ConversionDelay](#conversiondelay), [ConversionRate](#conversionrate), [Conversions](#conversions), [CPA](#cpa), [Ctr](#ctr), [CurrentMaxCpc](#currentmaxcpc), [Impressions](#impressions), [ImpressionSharePercent](#impressionsharepercent), [NumOfCampaigns](#numofcampaigns), [PortfolioBidStrategyName](#portfoliobidstrategyname), [PortfolioBidStrategyStatus](#portfoliobidstrategystatus), [ROAS](#roas), [Spend](#spend), [TargetAdPositionType](#targetadpositiontype), [TargetCPA](#targetcpa), [TargetImpressionShare](#targetimpressionshare), [TargetRoas](#targetroas), [TimePeriod](#timeperiod).

|Value|Description|
|-----------|---------------|
|<a name="accountid"></a>AccountId|The Microsoft Advertising assigned identifier of an account.|
|<a name="accountname"></a>AccountName|The account name.|
|<a name="accountstatus"></a>AccountStatus|The current account status|
|<a name="averagecpc"></a>AverageCpc|The average cost per click (CPC). The total cost of all clicks on an ad divided by the number of clicks. This is the average amount you're actually charged each time your ad is clicked. For example, if you paid a total of 48.35 for 300 clicks, your average CPC is 0.16. The formula for calculating the average CPC is *(Spend / Clicks)*.|
|<a name="avgtargetcpa"></a>AvgTargetCPA|In the campaign/portfolio scope, calculate the historical daily target CPA as result. In the account scope, use each campaign's daily spend as weight to calculate the weighted-average of the historical daily target CPA, then average the daily values as result.|
|<a name="avgtargetimpressionshare"></a>AvgTargetImpressionShare|In the campaign/portfolio scope, calculate the historical daily target impression share as result. In the account scope, use each campaign's daily spend as weight to calculate the weighted-average of the historical daily target impression share, then average the daily values as result.|
|<a name="avgtargetroas"></a>AvgTargetRoas|In the campaign/portfolio scope, calculate the historical daily target ROAS as result. In the account scope, use each campaign's daily spend as weight to calculate the weighted-average of the historical daily target ROAS, then average the daily values as result.|
|<a name="bidstrategytype"></a>BidStrategyType|In the account/campaign scope, the bid strategy type the campaign is using.|
|<a name="campaignid"></a>CampaignId|The Microsoft Advertising assigned identifier of a campaign.|
|<a name="campaignname"></a>CampaignName|The campaign name.|
|<a name="campaignstatus"></a>CampaignStatus|The current campaign status.|
|<a name="clicks"></a>Clicks|Clicks are what you pay for. Clicks typically include a customer clicking an ad on a search results page or on a website on the search network. Clicks can also come from other sources (for example, spiders, robots, and test servers). For more information, see [Microsoft Advertising click measurement: description of methodology](https://help.ads.microsoft.com/#apex/ads/en/60220/0).|
|<a name="conversiondelay"></a>ConversionDelay|The time gap between when a user clicks on an ad and when they complete a desired action, such as making a purchase, signing up, or downloading an app.|
|<a name="conversionrate"></a>ConversionRate|The conversion rate as a percentage.<br/><br/>The number of conversions, divided by the total number of clicks. For example, if the ads in your campaign got 300 clicks and four conversions, the conversion rate is 1.33 (%).<br/><br/>The formula for calculating the conversion rate is (Conversions / Clicks) x 100.<br/><br/>Data will be excluded from the [ConversionRate](#conversionrate) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="conversions"></a>Conversions|The number of conversions.<br/><br/>A conversion is the completion of an action by a customer after viewing your ad. The action could be purchasing your product, registering for your webinar, joining an organization, or whatever you consider your goal and best measure of the ad's success.<br/><br/>Conversions are measured by adding a small bit of code to your website pages so that a visitor's progress through your site can be tracked.|
|<a name="cpa"></a>CPA|The actual cost per acquisition (CPA).|
|<a name="ctr"></a>Ctr|The click-through rate (CTR) is the number of times an ad was clicked, divided by the number of times the ad was shown (impressions). For example, if your ads got 50 clicks given 2,348 impressions, your CTR is 2.13 (%). The formula for calculating CTR is (*Clicks* / *Impressions*) x 100.|
|<a name="currentmaxcpc"></a>CurrentMaxCpc|In the account/portfolio scope, the maximum cost per click bid that was in effect at the time the report was generated. It's not a moving historical bid throughout the report time period.|
|<a name="impressions"></a>Impressions|The number of times an ad has been displayed on search results pages. Without impressions, there are no clicks or conversions.|
|<a name="impressionsharepercent"></a>ImpressionSharePercent|The estimated percentage of impressions, out of the total available impressions in the market you were targeting.<br/><br/>The value of this column is empty if the data is not available. For example, out of estimated 59,000 impressions that occurred on this day in your targeted market, you got only about 2,300, or 3%. If you try to include this column with *Hourly* or *HourOfDay* aggregation the service will return code *2053*.<br/><br/>If you include this column, then you may not include restricted attributes in the same report request. Likewise if you include any of the restricted attribute columns, then you must exclude this column. For more information, see [Column Restrictions](../guides/reports.md#columnrestrictions). Data for this column is typically updated 14-18 hours after the UTC day ends. For Microsoft Shopping Campaigns, this data is only available with the campaign and ad group performance reports.|
|<a name="numofcampaigns"></a>NumOfCampaigns|In the account/portfolio scope, the number of campaigns belonging to the account/portfolio.|
|<a name="portfoliobidstrategyname"></a>PortfolioBidStrategyName|The bid strategy name.|
|<a name="portfoliobidstrategystatus"></a>PortfolioBidStrategyStatus|The current bid strategy status.|
|<a name="roas"></a>ROAS|The return on ad spend (ROAS).<br/><br/>The formula for calculating the ROAS is (*Revenue* / *Spend*).<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="spend"></a>Spend|The cost per click (CPC) summed for each click.|
|<a name="targetadpositiontype"></a>TargetAdPositionType|In the account/campaign scope,the target ad position type the campaign is using. In the portfolio scope, the target ad position type the portfolio is using.|
|<a name="targetcpa"></a>TargetCPA|In the account/portfolio scope, the current target CPA belonging to the account/portfolio.|
|<a name="targetimpressionshare"></a>TargetImpressionShare|In the account/portfolio scope, the current target impression share belonging to the account/portfolio.|
|<a name="targetroas"></a>TargetRoas|In the account/portfolio scope, the current target ROAS belonging to the account/portfolio.|
|<a name="timeperiod"></a>TimePeriod|The time period of each report row. You may not include this column if the *Aggregation* element of the request object is set to *Summary*. For more information, see [Time Period Column](../guides/reports.md#timeperiod).|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[BidStrategyReportRequest](bidstrategyreportrequest.md)  
