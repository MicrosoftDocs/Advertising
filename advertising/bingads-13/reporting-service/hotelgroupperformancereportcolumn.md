---
title: HotelGroupPerformanceReportColumn Value Set - Reporting
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the attributes and performance statistics columns that you can include in the HotelGroupPerformanceReportRequest.
ms.subservice: reporting-api
---
# HotelGroupPerformanceReportColumn Value Set - Reporting
Defines the attributes and performance statistics columns that you can include in the [HotelGroupPerformanceReportRequest](hotelgroupperformancereportrequest.md).

The attribute columns that you include in a report can affect how the statistics are aggregated. In other words the number of rows increase by a factor of the unique attributes. For more information, see [Columns that Group the Data](../guides/reports.md#columnsdata).

To see how far back hourly, daily, weekly, monthly, yearly and summary aggregated data can be retrieved for a report, see [Report Data Retention Time Periods](../guides/report-data-retention-time-periods.md).

## Syntax
```xml
<xs:simpleType name="HotelGroupPerformanceReportColumn" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="TimePeriod" />
    <xs:enumeration value="CustomerId" />
    <xs:enumeration value="CustomerName" />
    <xs:enumeration value="AccountName" />
    <xs:enumeration value="AccountId" />
    <xs:enumeration value="CampaignName" />
    <xs:enumeration value="CampaignId" />
    <xs:enumeration value="AdGroupId" />
    <xs:enumeration value="AdGroupName" />
    <xs:enumeration value="AdId" />
    <xs:enumeration value="AccountStatus" />
    <xs:enumeration value="CampaignStatus" />
    <xs:enumeration value="AdGroupStatus" />
    <xs:enumeration value="HotelGroup" />
    <xs:enumeration value="HotelGroupNodeId" />
    <xs:enumeration value="PartitionType" />
    <xs:enumeration value="BidStrategyType" />
    <xs:enumeration value="DeviceType" />
    <xs:enumeration value="CurrencyCode" />
    <xs:enumeration value="CustomParameters" />
    <xs:enumeration value="FinalUrlSuffix" />
    <xs:enumeration value="Impressions" />
    <xs:enumeration value="Clicks" />
    <xs:enumeration value="Ctr" />
    <xs:enumeration value="Spend" />
    <xs:enumeration value="AverageCpc" />
    <xs:enumeration value="AverageCpm" />
    <xs:enumeration value="Conversions" />
    <xs:enumeration value="Revenue" />
    <xs:enumeration value="NetRevenue" />
    <xs:enumeration value="GrossReturnOnAdSpend" />
    <xs:enumeration value="NetReturnOnAdSpend" />
    <xs:enumeration value="CostPerAssist" />
    <xs:enumeration value="BookedLengthOfStay" />
    <xs:enumeration value="AvgBookedABW" />
    <xs:enumeration value="AvgBookedNights" />
    <xs:enumeration value="BookedABW" />
    <xs:enumeration value="CheckInDate" />
    <xs:enumeration value="DateType" />
    <xs:enumeration value="PartnerImpressions" />
    <xs:enumeration value="EligibleImpressions" />
    <xs:enumeration value="MissedImpressions" />
    <xs:enumeration value="ImpressionShare" />
    <xs:enumeration value="MissedImpressionsNoBid" />
    <xs:enumeration value="MissedImpressionsSpendingCapReached" />
    <xs:enumeration value="MissedImpressionsNoTax" />
    <xs:enumeration value="MissedImpressionsOther" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [HotelGroupPerformanceReportColumn](hotelgroupperformancereportcolumn.md) value set has the following values: [AccountId](#accountid), [AccountName](#accountname), [AccountStatus](#accountstatus), [AdGroupId](#adgroupid), [AdGroupName](#adgroupname), [AdGroupStatus](#adgroupstatus), [AdId](#adid), [AverageCpc](#averagecpc), [AverageCpm](#averagecpm), [AvgBookedABW](#avgbookedabw), [AvgBookedNights](#avgbookednights), [BidStrategyType](#bidstrategytype), [BookedABW](#bookedabw), [BookedLengthOfStay](#bookedlengthofstay), [CampaignId](#campaignid), [CampaignName](#campaignname), [CampaignStatus](#campaignstatus), [CheckInDate](#checkindate), [Clicks](#clicks), [Conversions](#conversions), [CostPerAssist](#costperassist), [Ctr](#ctr), [CurrencyCode](#currencycode), [CustomerId](#customerid), [CustomerName](#customername), [CustomParameters](#customparameters), [DateType](#datetype), [DeviceType](#devicetype), [EligibleImpressions](#eligibleimpressions), [FinalUrlSuffix](#finalurlsuffix), [GrossReturnOnAdSpend](#grossreturnonadspend), [HotelGroup](#hotelgroup), [HotelGroupNodeId](#hotelgroupnodeid), [Impressions](#impressions), [ImpressionShare](#impressionshare), [MissedImpressions](#missedimpressions), [MissedImpressionsNoBid](#missedimpressionsnobid), [MissedImpressionsNoTax](#missedimpressionsnotax), [MissedImpressionsOther](#missedimpressionsother), [MissedImpressionsSpendingCapReached](#missedimpressionsspendingcapreached), [NetReturnOnAdSpend](#netreturnonadspend), [NetRevenue](#netrevenue), [PartitionType](#partitiontype), [PartnerImpressions](#partnerimpressions), [Revenue](#revenue), [Spend](#spend), [TimePeriod](#timeperiod).

|Value|Description|
|-----------|---------------|
|<a name="accountid"></a>AccountId|The Microsoft Advertising assigned identifier of an account.|
|<a name="accountname"></a>AccountName|The account name.|
|<a name="accountstatus"></a>AccountStatus|The account status.|
|<a name="adgroupid"></a>AdGroupId|The Microsoft Advertising assigned identifier of an ad group.|
|<a name="adgroupname"></a>AdGroupName|The ad group name.|
|<a name="adgroupstatus"></a>AdGroupStatus|The ad group status.|
|<a name="adid"></a>AdId|The Microsoft Advertising assigned identifier of an ad.|
|<a name="averagecpc"></a>AverageCpc|The average cost per click (CPC). The total cost of all clicks on an ad divided by the number of clicks. This is the average amount you're actually charged each time your ad is clicked. For example, if you paid a total of 48.35 for 300 clicks, your average CPC is 0.16. The formula for calculating the average CPC is *(Spend /Clicks)*.|
|<a name="averagecpm"></a>AverageCpm|The total advertising cost divided by the number of impressions (in thousands).<br/<br/>In Latin, mille means a thousand. Also, sometimes called average cost per thousand (CPT).<br/><br/>This is a standard advertising industry performance metric that we calculate based on your spend and number of impressions.<br/><br/>The goal of CPM-based ad budgeting is to build awareness of your brand to large audiences. CPM tells you how much it costs to get an ad to the type of users you're targeting.|
|<a name="avgbookedabw"></a>AvgBookedABW|The average advanced booking window for the hotel. The average is calculated as (booked ABW/conversions).|
|<a name="avgbookednights"></a>AvgBookedNights|The average nights booked for the hotel. The average is calculated as (total booked nights/conversions).|
|<a name="bidstrategytype"></a>BidStrategyType|The bid strategy type. Possible values include *EnhancedCpc*, *ManualCpc*, *MaxClicks*, *MaxConversions*, and *TargetCpa*. If the *InheritFromParent* strategy type is used, the report will include the inherited bid strategy type e.g. one of the supported values listed above.|
|<a name="bookedabw"></a>BookedABW|The total advanced booking window days for the hotel.|
|<a name="bookedlengthofstay"></a>BookedLengthOfStay|The booked length of stay in number of nights.|
|<a name="campaignid"></a>CampaignId|The Microsoft Advertising assigned identifier of a campaign.|
|<a name="campaignname"></a>CampaignName|The campaign name.|
|<a name="campaignstatus"></a>CampaignStatus|The campaign status.|
|<a name="checkindate"></a>CheckInDate|The check-in date.|
|<a name="clicks"></a>Clicks|Clicks are what you pay for. Clicks typically include a customer clicking an ad on a search results page or on a website on the search network. Clicks can also come from other sources (for example, spiders, robots, and test servers). For more information, see [Microsoft Advertising click measurement: description of methodology](https://about.ads.microsoft.com/en-us/resources/policies/microsoft-advertising-click-measurement-description-of-methodology).|
|<a name="conversions"></a>Conversions|The number of conversions.<br/><br/>A conversion is the completion of an action by a customer after viewing your ad. The action could be purchasing your product, registering for your webinar, joining an organization, or whatever you consider your goal and best measure of the ad's success.<br/><br/>Conversions are measured by adding a small bit of code to your website pages so that a visitor's progress through your site can be tracked.<br/><br/>Data will be excluded from the [Conversions](#conversions) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="costperassist"></a>CostPerAssist|The cost per assist. The formula for calculating the cost per assist is *(Spend / Assists)*.|
|<a name="ctr"></a>Ctr|The click-through rate (CTR) is the number of times an ad was clicked, divided by the number of times the ad was shown (impressions). For example, if your ads got 50 clicks given 2,348 impressions, your CTR is 2.13 (%). The formula for calculating CTR is *(Clicks / Impressions) x 100*.|
|<a name="currencycode"></a>CurrencyCode|The account currency type. For possible values, see [Currencies](../guides/currencies.md).|
|<a name="customerid"></a>CustomerId|The Microsoft Advertising assigned identifier of a customer.|
|<a name="customername"></a>CustomerName|The name of the customer.|
|<a name="customparameters"></a>CustomParameters|The current custom parameter set of the criterion.<br/><br/>Each custom parameter is a key and value pair. The list of custom parameters is semicolon-delimited and each key is enclosed by braces and a leading underscore, for example *{_key1}=value1;{_key2}=value2*.|
|<a name="datetype"></a>DateType|Indicates whether the user searched for hotels using specific dates. The following are the possible values.<ul><li>DefaultDate&mdash;The user didn't search for hotels using specific dates</li><li>SelectedDate&mdash;The user searched for hotels using specific dates</li>|
|<a name="devicetype"></a>DeviceType|The device name attribute of a device OS target bid. The type of device which showed ads. The possible values include *Computer*, *Smartphone*, *Tablet*, and *Unknown*.|
|<a name="eligibleimpressions"></a>EligibleImpressions|The total number of realized and unrealized impressions (impressions plus missed impressions).|
|<a name="finalurlsuffix"></a>FinalUrlSuffix|The final URL suffix can include tracking parameters that will be appended to the end of your landing page URL. We recommend placing tracking parameters that your landing page requires in a final URL suffix so that your customers are always sent to your landing page. For more details and validation rules see [Final URL Suffix](../guides/url-tracking-upgraded-urls.md#finalurlsuffixvalidation) in the technical guides.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this element to an empty string (*""*), the previous setting will be deleted.|
|<a name="grossreturnonadspend"></a>GrossReturnOnAdSpend|The gross return on ad spend.|
|<a name="hotelgroup"></a>HotelGroup|A group of hotel ads.|
|<a name="hotelgroupnodeid"></a>HotelGroupNodeId|The identifier for a hotel group.|
|<a name="impressions"></a>Impressions|The number of times an ad has been displayed on search results pages. Without impressions there are no clicks or conversions.|
|<a name="impressionshare"></a>ImpressionShare|The percentage of impressions, out of the total available impressions in the market you were targeting. For example, out of an estimated 59,000 impressions that occurred on this day in your targeted market, you received 2,300, or 3%. The value is in the range 0.0 through 1.0.|
|<a name="missedimpressions"></a>MissedImpressions|The total number of impressions lost. This is the sum of the following columns:<ul><li>MissedImpressionsInsufficientBid</li><li>MissedImpressionsNoTax</li><li>MissedImpressionsOther</li><li>MissedImpressionsSpendingCapReached</li></ul>|
|<a name="missedimpressionsnobid"></a>MissedImpressionsNoBid|The number of impressions lost because there were no bids.|
|<a name="missedimpressionsnotax"></a>MissedImpressionsNoTax|The number of impressions lost because the hotel didn't specify taxes.|
|<a name="missedimpressionsother"></a>MissedImpressionsOther|The number of impressions lost for all other reasons. Typically, low ranking or your rate was available in the **More rates** section, but the user did not expand the section to view your rate.|
|<a name="missedimpressionsspendingcapreached"></a>MissedImpressionsSpendingCapReached|The number of impressions lost because you reached your daily spending limit.|
|<a name="netreturnonadspend"></a>NetReturnOnAdSpend|The net return on ad spend.|
|<a name="netrevenue"></a>NetRevenue|The net revenue.|
|<a name="partitiontype"></a>PartitionType|The type of hotel partition, for example *Subdivision* or *Unit*.<br/><br/>**Add:** Required<br/>**Update:** Update is not supported for this object|
|<a name="partnerimpressions"></a>PartnerImpressions|The number of times an ad has been displayed on search results pages on our partner networks. Without impressions there are no clicks or conversions.|
|<a name="revenue"></a>Revenue|The revenue optionally reported by the advertiser as a result of conversions.<br/><br/>Data will be excluded from the [Revenue](#revenue) report column for any conversion goal with the [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) property set to true.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="spend"></a>Spend|The cost per click (CPC) summed for each click.|
|<a name="timeperiod"></a>TimePeriod|The time period of each report row.<br/><br/>You may not include this column if the *Aggregation* element of the request object is set to Summary. If you include the *TimePeriod* column, the column label in the downloaded report depends on the aggregation level that you specify in the report request. For more information, see [Time Period Column](../guides/reports.md#timeperiod).<br/><br/>This attribute is available in multiple reports, for example see [KeywordPerformanceReportColumn Value Set](../reporting-service/keywordperformancereportcolumn.md).|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[HotelGroupPerformanceReportRequest](hotelgroupperformancereportrequest.md)  
