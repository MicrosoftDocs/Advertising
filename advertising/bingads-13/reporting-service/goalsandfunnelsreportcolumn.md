---
title: GoalsAndFunnelsReportColumn Value Set - Reporting
ms.service: bing-ads-reporting-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines the attributes and performance statistics columns that you can include in the GoalsAndFunnelsReportRequest.
---
# GoalsAndFunnelsReportColumn Value Set - Reporting
Defines the attributes and performance statistics columns that you can include in the [GoalsAndFunnelsReportRequest](goalsandfunnelsreportrequest.md).

The attribute columns that you include in a report can affect how the statistics are aggregated. In other words the number of rows increase by a factor of the unique attributes. For more information, see [Columns that Group the Data](../guides/reports.md#columnsdata).

For a list of columns that you must include, please see the [Required Columns](#requiredcolumns) section below.

To see how far back hourly, daily, weekly, monthly, yearly and summary aggregated data can be retrieved for a report, see [Report Data Retention Time Periods](../guides/report-data-retention-time-periods.md).

## Syntax
```xml
<xs:simpleType name="GoalsAndFunnelsReportColumn" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="AccountName" />
    <xs:enumeration value="AccountNumber" />
    <xs:enumeration value="AccountId" />
    <xs:enumeration value="TimePeriod" />
    <xs:enumeration value="CampaignName" />
    <xs:enumeration value="CampaignId" />
    <xs:enumeration value="AdGroupName" />
    <xs:enumeration value="AdGroupId" />
    <xs:enumeration value="Keyword" />
    <xs:enumeration value="KeywordId" />
    <xs:enumeration value="Goal" />
    <xs:enumeration value="AllConversions" />
    <xs:enumeration value="Assists" />
    <xs:enumeration value="AllRevenue" />
    <xs:enumeration value="GoalId" />
    <xs:enumeration value="DeviceType" />
    <xs:enumeration value="DeviceOS" />
    <xs:enumeration value="AccountStatus" />
    <xs:enumeration value="CampaignStatus" />
    <xs:enumeration value="AdGroupStatus" />
    <xs:enumeration value="KeywordStatus" />
    <xs:enumeration value="GoalType" />
    <xs:enumeration value="ViewThroughConversions" />
    <xs:enumeration value="AllConversionsQualified" />
    <xs:enumeration value="ViewThroughConversionsQualified" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [GoalsAndFunnelsReportColumn](goalsandfunnelsreportcolumn.md) value set has the following values: [AccountId](#accountid), [AccountName](#accountname), [AccountNumber](#accountnumber), [AccountStatus](#accountstatus), [AdGroupId](#adgroupid), [AdGroupName](#adgroupname), [AdGroupStatus](#adgroupstatus), [AllConversions](#allconversions), [AllConversionsQualified](#allconversionsqualified), [AllRevenue](#allrevenue), [Assists](#assists), [CampaignId](#campaignid), [CampaignName](#campaignname), [CampaignStatus](#campaignstatus), [DeviceOS](#deviceos), [DeviceType](#devicetype), [Goal](#goal), [GoalId](#goalid), [GoalType](#goaltype), [Keyword](#keyword), [KeywordId](#keywordid), [KeywordStatus](#keywordstatus), [TimePeriod](#timeperiod), [ViewThroughConversions](#viewthroughconversions), [ViewThroughConversionsQualified](#viewthroughconversionsqualified).

|Value|Description|
|-----------|---------------|
|<a name="accountid"></a>AccountId|The Microsoft Advertising assigned identifier of an account.|
|<a name="accountname"></a>AccountName|The account name.|
|<a name="accountnumber"></a>AccountNumber|The Microsoft Advertising assigned number of an account.|
|<a name="accountstatus"></a>AccountStatus|The account status.|
|<a name="adgroupid"></a>AdGroupId|The Microsoft Advertising assigned identifier of an ad group.|
|<a name="adgroupname"></a>AdGroupName|The ad group name.|
|<a name="adgroupstatus"></a>AdGroupStatus|The ad group status.|
|<a name="allconversions"></a>AllConversions|The number of conversions.<br/><br/>A conversion is the completion of an action by a customer after viewing your ad. The action could be purchasing your product, registering for your webinar, joining an organization, or whatever you consider your goal and best measure of the ad's success.<br/><br/>Conversions are measured by adding a small bit of code to your website pages so that a visitor's progress through your site can be tracked.<br/><br/>This column will include data for all conversion goals regardless of a conversion goal's [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.<br/><br/>This column is deprecated as of March 31st, 2022, so you should use the [AllConversionsQualified](#allconversionsqualified) column instead. Going forward, performance reports will return "0" (zero) in this column. Historical data for time periods prior to the deprecation date will still be available according to the published [data retention period](../guides/report-data-retention-time-periods.md).|
|<a name="allconversionsqualified"></a>AllConversionsQualified|The number of conversions.<br/><br/>A conversion is the completion of an action by a customer after viewing your ad. The action could be purchasing your product, registering for your webinar, joining an organization, or whatever you consider your goal and best measure of the ad's success.<br/><br/>Conversions are measured by adding a small bit of code to your website pages so that a visitor's progress through your site can be tracked.<br/><br/>This column will include data for all conversion goals regardless of a conversion goal's [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.<br/><br/>You should expect the data type as **double** whether or not there are partial externally attributed offline conversions.|
|<a name="allrevenue"></a>AllRevenue|The revenue optionally reported by the advertiser as a result of conversions.<br/><br/>This column will include data for all conversion goals regardless of a conversion goal's [ExcludeFromBidding](../campaign-management-service/conversiongoal.md#excludefrombidding) setting.<br/><br/>Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://help.ads.microsoft.com/#apex/3/en/n5012/2) help topic.|
|<a name="assists"></a>Assists|The number of conversions from other ads within the same account that were preceded by one or more clicks from this ad. An ad is considered to have assisted the conversion if it was clicked before the most recently clicked ad that was credited with the conversion. Additionally, the click corresponding to the assist must occur  within the conversion period of the goal. Available for accounts that are setup to use analytics with Microsoft Advertising Universal Event Tracking. For more information, see the [Track sales and other conversions](https://go.microsoft.com/fwlink/?LinkID=624771) help topic.|
|<a name="campaignid"></a>CampaignId|The Microsoft Advertising assigned identifier of a campaign.|
|<a name="campaignname"></a>CampaignName|The campaign name.|
|<a name="campaignstatus"></a>CampaignStatus|The campaign status.|
|<a name="deviceos"></a>DeviceOS|The operating system of the device reported in the *DeviceType* column. The possible values include *Android*, *Blackberry*, *iOS*, *Other*, *Unknown*, and *Windows*. If the operating system of the device cannot be determined or is not one of the operating systems that you can target, the value in this column will be *Unknown*.|
|<a name="devicetype"></a>DeviceType|The device name attribute of a device OS target bid. The type of device which showed ads. The possible values include *Computer*, *Smartphone*, *Tablet*, and *Unknown*.|
|<a name="goal"></a>Goal|The name of the goal you set for the conversions you want, meaning actions customers take after clicking your ad.|
|<a name="goalid"></a>GoalId|The Microsoft Advertising assigned identifier of a conversion goal.|
|<a name="goaltype"></a>GoalType|The type of conversion goal.<br/>Possible values include *AppInstall*, *Duration*, *Event*, *InStoreTransaction*, *OfflineConversion*, *PagesViewedPerVisit*, and *Url*.|
|<a name="keyword"></a>Keyword|The keyword text.|
|<a name="keywordid"></a>KeywordId|The Microsoft Advertising assigned identifier of a keyword.|
|<a name="keywordstatus"></a>KeywordStatus|The keyword status.|
|<a name="timeperiod"></a>TimePeriod|The time period of each report row. You may not include this column if the *Aggregation* element of the request object is set to Summary. For more information, see [Time Period Column](../guides/reports.md#timeperiod).|
|<a name="viewthroughconversions"></a>ViewThroughConversions|View-through conversions are conversions that people make after they have seen your ad, even though they did not click the ad.<br/><br/>View-through conversions don't have a click associated but do have an impression associated within the advertiser defined conversion window. If the user also clicked on an ad that was delivered via the Microsoft Audience or Search network, there won't be any view-through conversion counted. Only the click-based conversion would be counted.<br/><br/>View-through conversions are only counted for ads in the Microsoft Audience network.|
|<a name="viewthroughconversionsqualified"></a>ViewThroughConversionsQualified|Reserved for future use.|

## <a name="remarks"></a>Remarks
### <a name="requiredcolumns"></a>Required Columns
The report must include the following columns at a minimum. As a general rule, each report must include at least one attribute column and at least one non-impression share performance statistics column. For more information, see [Report Attributes and Performance Statistics](../guides/report-attributes-performance-statistics.md).

> [!NOTE]
> The TimePeriod column is expected for all aggregation types except Summary. It is important to note that if you do not include TimePeriod, the aggregation you chose will be ignored and Summary aggregation will be used regardless.

|Column|
|----------|
|Goal|
|TimePeriod|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[GoalsAndFunnelsReportRequest](goalsandfunnelsreportrequest.md)  
