---
title: "Reports"
ms.service: "bing-ads"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: Describes the contents and restraints for files downloaded with the Reporting API.
---
# Reporting Service Model

The Reporting service contains the operations that you use to submit report requests and poll for their status. The reports provide detailed statistics about Microsoft Advertising accounts, campaigns, and ad groups. The information can help you track finances, measure ad performance, and adjust settings to optimize your budget or campaign. For example, you can use the keyword performance report to see which keywords are performing well and those that are not.

## Reporting Service Overview
When submitting a report request, you choose the [Report Attributes and Performance Statistics](report-attributes-performance-statistics.md) to determine the contents of the report. For example, you may want to include impressions, clicks, and click-through rate. The report uses the column names as the column headers. The report includes the columns in the same order that you include them in the *Columns* element of the report request. For information about how columns affect data output, see [Columns that Group the Data](#columnsdata) below. For information about restrictions on column combinations in the same report request, see [Column Restrictions](#columnrestrictions) below.

You will also specify the report parameters that restrict or limit the returned data set. For example, you can set the aggregation level to group the data by day or month; specify the time period of the data to include in the report by using specific dates or predefined date ranges, such as today or the last seven days; specify the scope of the data by identifying the accounts, campaigns, and ad groups to include in the report; and set filter criteria to filter the report data. For information about time periods that you can specify for each aggregation value, see [Aggregation and Time](#aggregation-time) below.

For a list of reports that you can request, see [Report Types](report-types.md). For a complete list of report parameters that you can set, see each report request object and the [ReportRequest](../reporting-service/reportrequest.md) base object.

For information about how to request and download a report, see [Request and Download a Report](request-download-report.md)When the report completes successfully, you can download the report from the URL that the service returns. The report file is compressed, so you must unzip the file to read the report. There is no limit to the number of reports that the system can store; however, the length of time that the reports are stored is undefined. The service does not check for duplicate report requests.

For information about how the time zone affects report availability, see [Time Zones in Reporting](#reptimezones) below.

## <a name="reportschema"></a>Report File Schema
You can request Csv, Tsv, or Xml report data. By default if you do not choose another [Format](../reporting-service/reportrequest.md#format) the downloaded data is comma separated (Csv). 

```csv
"Report Name: My Keyword Performance Report"
"Report Time: 2/7/2020"
"Time Zone: (GMT-08:00) Pacific Time (US & Canada); Tijuana"
"Last Completed Available Day: 2/8/2020 10:15:00 PM (GMT)"
"Last Completed Available Hour: 2/8/2020 10:15:00 PM (GMT)"
"Report Aggregation: Summary"
"Report Filter: "
"Potential Incomplete Data: true"
"Rows: 5"

"AccountId","CampaignId","Keyword","KeywordId","DeviceType","Clicks"
"YourAccountId","YourCampaignId","red shoes","123","Computer","35"
"YourAccountId","YourCampaignId","red shoes","123","Smartphone","50"
"YourAccountId","YourCampaignId","shoes delivered","234","Computer","1"
"YourAccountId","YourCampaignId","shoe sale","345","Computer","80"
"YourAccountId","YourCampaignId","shoe sale","345","Smartphone","5"

"@2020 Microsoft Corporation. All rights reserved. "
```

The following report header metadata is included by default. If you don't want the header metadata set [ExcludeReportHeader](../reporting-service/reportrequest.md#excludereportheader) to *true*.

|Header Metadata|Description|
|-----|-----|
|Report Name|The [ReportName](../reporting-service/reportrequest.md#reportname) that you chose when the report was submitted.|
|Report Time|The report time that you chose when the report was submitted. If multiple days were requested, the start and end date will be separated by a comma e.g., "Report Time: 2/1/2020, 2/7/2020".|
|Time Zone|Indicates which time zone was used to determine the end of the last day of the requested report time. For information about how the time zone affects report availability, see [Time Zones in Reporting](#reptimezones) below.|
|Last Completed Available Day|The most recent date and time when Microsoft Advertising finished processing data for this report type. The time is always reported relative to UTC, so please ignore the *(GMT)* suffix that is written in the report.|
|Last Completed Available Hour|The most recent date and time when Microsoft Advertising finished processing data for this report type. The time is always reported relative to UTC, so please ignore the *(GMT)* suffix that is written in the report.|
|Report Aggregation|Reflects the aggregation type that was set in the report request. For information see [Aggregation and Time](#aggregation-time) below.|
|Report Filter|Reserved for future use.|
|Potential Incomplete Data|If set to *true* then the report data might not be completely processed for the last day of the requested report time.<br/><br/>The [ReturnOnlyCompleteData](../reporting-service/reportrequest.md#returnonlycompletedata) request element determines whether or not the service must ensure that all the data has been processed and is available. For information about how the time zone affects report availability, see [Time Zones in Reporting](#reptimezones) below.|
|Rows|The count of report record data excluding blank lines header, column names, and footer metadata. This metadata is not available in Xml reports.|

The report column names e.g., *"AccountId","CampaignId","Keyword","KeywordId","DeviceType","Clicks"* are included by default. If you don't want the report columns set [ExcludeColumnHeaders](../reporting-service/reportrequest.md#excludecolumnheaders) to *true*. 

The report footer metadata e.g., *@2020 Microsoft Corporation. All rights reserved.* is included by default. If you don't want the footer metadata set [ExcludeReportFooter](../reporting-service/reportrequest.md#excludereportfooter) to *true*.

## <a name="formatversion"></a>Report Format Version
The data format for certain fields can be updated within the current API version without breaking existing client applications. You can get the latest data format by setting the optional [FormatVersion](../reporting-service/reportrequest.md#formatversion) request field. The table below summarizes the difference between format version 1.0 and 2.0. 

|Description|Report Columns|FormatVersion 1.0 Example|FormatVersion 2.0 Example|
|-----|-----|-----|-----|
|The thousands group delimiter (comma) is removed.|AllRevenue<br/><br/>Assists<br/><br/>ExtendedCost<br/><br/>Revenue|1,000.00|1000.00|
|Precision is updated from 4 digits to 2 digits.|LowQualityClicksPercent<br/><br/>LowQualityImpressionsPercent<br/><br/>Ptr|12.3400|12.34|
|Precision is updated from 0 digits to 2 digits.|AbsoluteTopImpressionShareLostToBudgetPercent<br/><br/>AbsoluteTopImpressionShareLostToRankPercent<br/><br/>ExactMatchImpressionSharePercent<br/><br/>ImpressionLostToBudgetPercent<br/><br/>ImpressionLostToRankAggPercent<br/><br/>ImpressionSharePercent<br/><br/>TopImpressionShareLostToBudgetPercent<br/><br/>TopImpressionShareLostToRankPercent|12|12.34|
|Hourly report format updated from "mm/dd/yyyy 12:00:00 AM&#124;hour" to "yyyy-mm-dd&#124;hour". This format is only applicable for the [TimePeriod](#timeperiod) column if report aggregation is set to [Hourly](../reporting-service/reportaggregation.md#hourly).|TimePeriod|"3/15/2020 12:00:00 AM&#124;7"|"2020-03-15&#124;7"|

## <a name="columnsdata"></a>Columns that Group the Data
The attribute columns that you include in a report affects the values within the statistics columns as well as the number or rows. For example, if you request a summary report that includes only *AccountId*, *CampaignId*, *Keyword*, *KeywordId*, and *Clicks*, the clicks column will contain the number of clicks for the keyword regardless of excluded attributes such as device, match type, and network. 

```csv
"Report Name: My Keyword Performance Report"
"Report Time: 2/7/2020"
"Time Zone: (GMT-08:00) Pacific Time (US & Canada); Tijuana"
"Last Completed Available Day: 2/8/2020 2:55:00 PM (GMT)"
"Last Completed Available Hour: 2/8/2020 2:55:00 PM (GMT)"
"Report Aggregation: Summary"
"Report Filter: "
"Potential Incomplete Data: true"
"Rows: 3"

"AccountId","CampaignId","Keyword","KeywordId","Clicks"
"YourAccountId","YourCampaignId","red shoes","123","95"
"YourAccountId","YourCampaignId","shoes delivered","234","1"
"YourAccountId","YourCampaignId","shoe sale","345","98"

"@2020 Microsoft Corporation. All rights reserved. "
```

If you then include the *DeviceType* column, the report will contain a row for each unique combination of keyword and device type values, and the value in the clicks column for each row is broken down accordingly. 

```csv
"Report Name: My Keyword Performance Report"
"Report Time: 2/7/2020"
"Time Zone: (GMT-08:00) Pacific Time (US & Canada); Tijuana"
"Last Completed Available Day: 2/8/2020 2:55:00 PM (GMT)"
"Last Completed Available Hour: 2/8/2020 2:55:00 PM (GMT)"
"Report Aggregation: Summary"
"Report Filter: "
"Potential Incomplete Data: true"
"Rows: 7"

"AccountId","CampaignId","Keyword","KeywordId","DeviceType","Clicks"
"YourAccountId","YourCampaignId","red shoes","123","Computer","35"
"YourAccountId","YourCampaignId","red shoes","123","Smartphone","50"
"YourAccountId","YourCampaignId","red shoes","123","Tablet","10"
"YourAccountId","YourCampaignId","shoes delivered","234","Computer","1"
"YourAccountId","YourCampaignId","shoe sale","345","Computer","80"
"YourAccountId","YourCampaignId","shoe sale","345","Smartphone","5"
"YourAccountId","YourCampaignId","shoe sale","345","Tablet","13"

"@2020 Microsoft Corporation. All rights reserved. "
```

For more information about each type of available columns, see [Report Attributes and Performance Statistics](report-attributes-performance-statistics.md).

The *TimePeriod* attribute is required for most reports, so you should also consider that specifying a more granular aggregation period, for example monthly in the report request's *Aggregation* element, would further break down the click data by month. For example, the report would then contain a row for each unique combination of keyword, device, and month. The row is included only for months that contain clicks.

## <a name="columnrestrictions"></a>Column Restrictions
For reports that include impression share performance statistics columns you cannot include constrained attributes in the same report request. If you include any of the impression share performance statistics columns, then you must exclude all of the below attribute columns. Likewise, if you include any of the below attribute columns, then you must exclude all of the impression share performance statistics columns.

The following attribute and impression share performance statistics columns are mutually exclusive when submitting the [AccountPerformanceReportRequest](../reporting-service/accountperformancereportrequest.md) and [AdGroupPerformanceReportRequest](../reporting-service/adgroupperformancereportrequest.md). 

> [!NOTE]
> In addition, if you include any of the AudienceImpressionLostToBudgetPercent, AudienceImpressionLostToRankPercent, AudienceImpressionSharePercent, or RelativeCtr columns, then you must exclude the CustomerId, CustomerName, and DeliveredMatchType attribute columns, and vice versa. 

|Attributes|Impression Share Performance Statistics|
|--------------|-------------------------------------------|
|BidMatchType<br/><br/>DeviceOS<br/><br/>Goal<br/><br/>GoalType<br/><br/>TopVsOther|AbsoluteTopImpressionRatePercent<br/><br/>AbsoluteTopImpressionShareLostToBudgetPercent<br/><br/>AbsoluteTopImpressionShareLostToRankPercent<br/><br/>AbsoluteTopImpressionSharePercent<br/><br/>AudienceImpressionLostToBudgetPercent<br/><br/>AudienceImpressionLostToRankPercent<br/><br/>AudienceImpressionSharePercent<br/><br/>ClickSharePercent<br/><br/>ExactMatchImpressionSharePercent<br/><br/>ImpressionLostToBudgetPercent<br/><br/>ImpressionLostToRankAggPercent<br/><br/>ImpressionSharePercent<br/><br/>RelativeCtr|

The following attribute and impression share performance statistics columns are mutually exclusive when submitting the [CampaignPerformanceReportRequest](../reporting-service/campaignperformancereportrequest.md).

> [!NOTE]
> In addition, if you include any of the AudienceImpressionLostToBudgetPercent, AudienceImpressionLostToRankPercent, AudienceImpressionSharePercent, or RelativeCtr columns, then you must exclude the CustomerId, CustomerName, and DeliveredMatchType attribute columns, and vice versa. 

|Attributes|Impression Share Performance Statistics|
|--------------|-------------------------------------------|
|BidMatchType<br/><br/>BudgetAssociationStatus<br/><br/>BudgetName<br/><br/>BudgetStatus<br/><br/>DeviceOS<br/><br/>Goal<br/><br/>GoalType<br/><br/>TopVsOther|AbsoluteTopImpressionRatePercent<br/><br/>AbsoluteTopImpressionShareLostToBudgetPercent<br/><br/>AbsoluteTopImpressionShareLostToRankPercent<br/><br/>AbsoluteTopImpressionSharePercent<br/><br/>AudienceImpressionLostToBudgetPercent<br/><br/>AudienceImpressionLostToRankPercent<br/><br/>AudienceImpressionSharePercent<br/><br/>ClickSharePercent<br/><br/>ExactMatchImpressionSharePercent<br/><br/>ImpressionLostToBudgetPercent<br/><br/>ImpressionLostToRankAggPercent<br/><br/>ImpressionSharePercent<br/><br/>RelativeCtr<br/><br/>TopImpressionRatePercent<br/><br/>TopImpressionShareLostToBudgetPercent<br/><br/>TopImpressionShareLostToRankPercent<br/><br/>TopImpressionSharePercent|

The following attribute and impression share performance statistics columns are mutually exclusive when submitting the [ProductDimensionPerformanceReportRequest](../reporting-service/productdimensionperformancereportrequest.md).

|Attributes|Impression Share Performance Statistics|
|--------------|-------------------------------------------|
|AdDistribution<br/><br/>AdId<br/><br/>AdStatus<br/><br/>ClickType<br/><br/>ClickTypeId<br/><br/>Goal<br/><br/>GoalType<br/><br/>Language<br/><br/>LocalStoreCode<br/><br/>Network<br/><br/>TopVsOther|AbsoluteTopImpressionShareLostToBudgetPercent<br/><br/>AbsoluteTopImpressionShareLostToRankPercent<br/><br/>AbsoluteTopImpressionSharePercent<br/><br/>BenchmarkBid<br/><br/>BenchmarkCtr<br/><br/>ClickSharePercent<br/><br/>ImpressionLostToBudgetPercent<br/><br/>ImpressionLostToRankPercent<br/><br/>ImpressionSharePercent<br/><br/>TopImpressionShareLostToBudgetPercent<br/><br/>TopImpressionShareLostToRankPercent<br/><br/>TopImpressionSharePercent|
	
The following attribute and impression share performance statistics columns are mutually exclusive when submitting the [ProductPartitionPerformanceReportRequest](../reporting-service/productpartitionperformancereportrequest.md).

|Attributes|Impression Share Performance Statistics|
|--------------|-------------------------------------------|
|AdDistribution<br/><br/>AdId<br/><br/>AdStatus<br/><br/>BidMatchType<br/><br/>ClickType<br/><br/>ClickTypeId<br/><br/>DeliveredMatchType<br/><br/>Goal<br/><br/>GoalType<br/><br/>Language<br/><br/>LocalStoreCode<br/><br/>Network<br/><br/>TopVsOther|AbsoluteTopImpressionSharePercent<br/><br/>BenchmarkBid<br/><br/>BenchmarkCtr<br/><br/>ClickSharePercent<br/><br/>ImpressionLostToBudgetPercent<br/><br/>ImpressionLostToRankPercent<br/><br/>ImpressionSharePercent|

## <a name="timeperiod"></a>Time Period Column
If you include the *TimePeriod* column, then the format of the values in the downloaded report will vary depending on the [report aggregation](../reporting-service/reportaggregation.md) level that you specify in the report request. For example, if the aggregation level is Daily, each field in TimePeriod column will contain the day formatted as *yyyy-mm-dd*.

> [!NOTE]
> We don't support partial data aggregation for weekly, monthly, and yearly time period columns. If the selected dates are not full weeks/months/years and the corresponding weekly/monthly/yearly time period column is requested, the selected dates will be converted to full weeks/months/years.

|Aggregation|Description|
|---------------|---------------|
|Daily|Each row of the report identifies the month, day, and year when the transaction occurred. The report data will be aggregated by each day. The time period will be formatted as *yyyy-mm-dd*.|
|DayOfWeek|Each row of the report identifies the day of the week when the transaction occurred. The report data will be aggregated by each of the seven days in a week. The possible data values are *1* - *7* where *1* represents Sunday and *7* represents Saturday. If the report time spans multiple weeks, then the performance data across all weeks for a given day of the week will be aggregated in one row. For example if *Campaign A* has 5 impressions every Monday (day 2) throughout each of the 3 weeks included in the report time range, then the report will include one row with a *2* in the TimePeriod column and the impressions in that row totaling 15.|
|Hourly|Each row of the report identifies the hour when the transaction occurred. The report data will be aggregated by each hour of the day.<br/><br/>By default the time period will be formatted with the date and hour (int value) delimited by a single pipe i.e., "mm/dd/yyyy 12:00:00 AM&#124;hour" where 12:00:00 AM can be ignored. For example, if the click occurred March 15, 2020 between 07:00 and 08:00, then the field in the downloaded report would be "3/15/2020 12:00:00 AM&#124;7". If you set the report [FormatVersion](../reporting-service/reportrequest.md#formatversion) to "2.0", the time period will be formatted as "yyyy-mm-dd&#124;hour". For example, if the click occurred March 15, 2020 between 07:00 and 08:00, then the field in the downloaded report would be "2020-03-15&#124;7".<br/><br/>The possible values for the hour component are *0* - *23*. If the report time spans multiple days, then the performance data for a given hour will be provided separately across multiple rows i.e. the report will include one row for each unique day and hour. For example if *Campaign A* has 5 impressions during *Hour* 7 on each of the 3 days included in the report time range, then the report will include three rows each with 5 impressions for *Hour* 7.|
|HourOfDay|Each row of the report identifies the hour of the day when the transaction occurred. The report data will be aggregated by each of the 24 hours across all days. The possible values are *0* - *23*. If the report time spans multiple days, then the performance data across all days for a given hour will be aggregated in one row. For example if *Campaign A* has 5 impressions during hour *7* on each of the 3 days included in the report time range, then the report will include one row with impressions for *HourOfDay* totaling 15.|
|Monthly|Each row of the report identifies the month when the transaction occurred. The report data will be aggregated by each month. The time period that contains the first day of the month will be formatted as *yyyy-mm-dd*.|
|Weekly|Each row of the report identifies the week when the transaction occurred. The report data will be aggregated by each week. The time period that contains the date of the Sunday for each week will be formatted as *yyyy-mm-dd*.|
|Yearly|Each row of the report identifies the year when the transaction occurred. The report data will be aggregated by each year. The time period that contains the year will be formatted as *yyyy*.|

## <a name="aggregation-time"></a>Aggregation and Time
For most report requests you must set the *Aggregation* and *Time* elements. The following are the time periods that you can specify for each aggregation value.

|Aggregation Value|Time Periods|
|---------------------|----------------|
|Daily|Today<br/><br/>Yesterday<br/><br/>LastSevenDays<br/><br/>ThisMonth<br/><br/>LastMonth<br/><br/>Custom date range|
|DayOfWeek|Today<br/><br/>Yesterday<br/><br/>LastSevenDays<br/><br/>ThisMonth<br/><br/>LastMonth<br/><br/>LastThreeMonths<br/><br/>LastSixMonths|
|Hourly|Today<br/><br/>Yesterday<br/><br/>Custom date range|
|HourOfDay|Today<br/><br/>Yesterday<br/><br/>LastSevenDays<br/><br/>ThisMonth<br/><br/>LastMonth<br/><br/>LastThreeMonths<br/><br/>LastSixMonths|
|Monthly|ThisMonth<br/><br/>LastMonth<br/><br/>LastThreeMonths<br/><br/>LastSixMonths<br/><br/>ThisYear<br/><br/>LastYear<br/><br/>Custom date range|
|Summary|Today<br/><br/>Yesterday<br/><br/>LastSevenDays<br/><br/>ThisMonth<br/><br/>LastMonth<br/><br/>Custom date range|
|Weekly|ThisWeek<br/><br/>LastWeek<br/><br/>LastFourWeeks<br/><br/>ThisMonth<br/><br/>LastMonth<br/><br/>ThisYear<br/><br/>LastYear<br/><br/>Custom date range|
|Yearly|ThisYear<br/><br/>LastYear<br/><br/>Custom date range|

## <a name="zeroimpressions"></a>Zero Impressions
The report data can include rows with zero impressions if the impression occurred before the requested time period and then a subsequent action such as click, conversion, or phone call occurs during the requested time period. Likewise even within the requested time period if you download a daily report for performance last week, it is possible that all of the impressions occurred on Sunday and then clicks or other performance occurred e.g. Monday or Tuesday. The report data for Monday or Tuesday might have clicks with zero impressions. You can use the [Bulk Service](../bulk-service/bulk-service-reference.md) or [Campaign Management Service](../campaign-management-service/campaign-management-service-reference.md) to get all entities in your account, regardless of whether or not they have any associated performance data.

## <a name="reptimezones"></a>Time Zones in Reporting
The downloaded report data is always relative to UTC time. For example an hourly report might attribute 5 clicks to hour 7. In that case the 5 clicks occurred between 07:00 and 08:00 UTC. 

The [ReportTimeZone](../reporting-service/reporttime.md#reporttimezone) request element determines the time zone that is used to establish today's date. When you submit the report request today's date can vary around the world depending on the time zone. The report time period that you choose e.g., 'Yesterday' is then relative to today's date. If you do not choose a time zone, the Reporting service uses PacificTimeUSCanadaTijuana by default. For example, a report requested without a time zone specified at 2 AM EasternTimeUSCanada on 2/2/2020 for 'Yesterday' will be interpreted as a request for 1/31/2020. A report requested at the same time for 'Yesterday' with time zone set as EasternTimeUSCanada will be interpreted as a request for 2/1/2020. 

The [ReturnOnlyCompleteData](../reporting-service/reportrequest.md#returnonlycompletedata) request element determines whether or not the service must ensure that all the data has been processed and is available. If set to *true* and if the system has not finished processing all the data based on the requested aggregation, scope, and time, the service returns error code NoCompleteDataAvaliable (2004). Otherwise by default the request can succeed, there is no indication as to whether the data is complete, and the report will contain only the data that the system has finished processing at the time of the request. While today is still in progress you can get the most current data by not requesting completed data. Then after the books close for the day, you might want to set this flag true and look back to what is now 'Yesterday' and get the final report data. 

> [!NOTE]
> If you request a report for campaigns that have different time zones, the data is considered complete only after the day has ended and the click data has been processed in all of the campaign time zones. For example, say you request a report that includes Campaign A (which specifies the PST time zone), and Campaign B (which specifies the EST time zone), the data is not complete until all of the click data for Campaign A has been processed for the specified time period.

When a user clicks an ad, it can take up to two hours for the system to process the click (3 hours for conversions) and make it available for reporting. Data is generally considered complete with books closed after 3 hours. In some exception cases due to invalid traffic, there could be unexpected adjustments that might take a week or more to resolve. For example, if an advertiser complaint identifies invalid click activity that escaped the automated filtration system, the Traffic Quality and support teams will process a credit to the advertiser's account, and will partner with internal teams to determine whether they can update automated systems in order to improve detection in the future. For more information, please see [Traffic Quality Center](https://about.ads.microsoft.com/en-us/resources/policies/traffic-quality).

## <a name="mrcaccreditedmetrics"></a>MRC Accredited Metrics
The search ads clicks metric is accredited by the Media Rating Council (MRC); this accreditation does not apply to any other metric. See the [click measurement description of methodology](https://about.ads.microsoft.com/en-us/resources/policies/microsoft-advertising-click-measurement-description-of-methodology) for more information.

## See Also
[Report Attributes and Performance Statistics](report-attributes-performance-statistics.md)  
[Report Types](report-types.md)  
[Request and Download a Report](request-download-report.md)  
[Bing Ads API Web Service Addresses](web-service-addresses.md)  

