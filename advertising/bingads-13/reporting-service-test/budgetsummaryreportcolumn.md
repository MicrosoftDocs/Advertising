---
title: BudgetSummaryReportColumn Value Set Test - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the attributes and performance statistics columns that you can include in the BudgetSummaryReportRequest.(test)
---
# BudgetSummaryReportColumn Value Set Test - Reporting
Defines the attributes and performance statistics columns that you can include in the [BudgetSummaryReportRequest](budgetsummaryreportrequest.md).

The attribute columns that you include in a report can affect how the statistics are aggregated. In other words the number of rows increase by a factor of the unique attributes. For more information, see [Columns that Group the Data](../guides/reports.md#columnsdata).

For a list of columns that you must include, please see the [Required Columns](#requiredcolumns) section below.

To see how far back hourly, daily, weekly, monthly, yearly and summary aggregated data can be retrieved for a report, see [Report Data Retention Time Periods](../guides/report-data-retention-time-periods.md).

## Syntax
```xml
<xs:simpleType name="BudgetSummaryReportColumn" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="AccountName" />
    <xs:enumeration value="AccountNumber" />
    <xs:enumeration value="AccountId" />
    <xs:enumeration value="CampaignName" />
    <xs:enumeration value="CampaignId" />
    <xs:enumeration value="Date" />
    <xs:enumeration value="CurrencyCode" />
    <xs:enumeration value="MonthlyBudget" />
    <xs:enumeration value="DailySpend" />
    <xs:enumeration value="MonthToDateSpend" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [BudgetSummaryReportColumn](budgetsummaryreportcolumn.md) value set has the following values: [AccountId](#accountid), [AccountName](#accountname), [AccountNumber](#accountnumber), [CampaignId](#campaignid), [CampaignName](#campaignname), [CurrencyCode](#currencycode), [DailySpend](#dailyspend), [Date](#date), [MonthlyBudget](#monthlybudget), [MonthToDateSpend](#monthtodatespend).

|Value|Description|
|-----------|---------------|
|<a name="accountid"></a>AccountId|The Microsoft Advertising assigned identifier of an account.|
|<a name="accountname"></a>AccountName|The account name.|
|<a name="accountnumber"></a>AccountNumber|The Microsoft Advertising assigned number of an account.|
|<a name="campaignid"></a>CampaignId|The Microsoft Advertising assigned identifier of a campaign.|
|<a name="campaignname"></a>CampaignName|The campaign name.|
|<a name="currencycode"></a>CurrencyCode|The account currency type. For possible values, see [Currencies](../guides/currencies.md).|
|<a name="dailyspend"></a>DailySpend|The average amount of campaign budget spent per day.|
|<a name="date"></a>Date|The date for the downloaded report records. The date will be in the time zone of the campaign|
|<a name="monthlybudget"></a>MonthlyBudget|The anticipated maximum monthly budget amount that was calculated on the date of the most recent budget change.<br/><br/>The formula used to forecast the maximum budget for each calendar month is Spend-to-date + (daily budget x days remaining). For example, let's say your daily campaign budget was 100.00 at the beginning of July and then was updated to 200.00 right at the start of July 22nd. Let's also assume a [month to date spend](#monthtodatespend) through July 21st of 500.00. In August when you run a report for the month of July, the monthly budget value for each day from July 1 through July 21 will be 3,100. The monthly budget value in the report for each day from July 22nd through July 31st will be 2,500.00. For more information see the [What are my budget options?](https://help.ads.microsoft.com/apex/index/3/en-us/51006) help page.|
|<a name="monthtodatespend"></a>MonthToDateSpend|The amount of money spent to date for the month.|

## <a name="remarks"></a>Remarks
### <a name="requiredcolumns"></a>Required Columns
The report must include the following columns at a minimum. As a general rule, each report must include at least one attribute column and at least one non-impression share performance statistics column. For more information, see [Report Attributes and Performance Statistics](../guides/report-attributes-performance-statistics.md).

|Column|
|----------|
|AccountName|
|AccountNumber|
|CampaignName|
|CurrencyCode|
|Date|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[BudgetSummaryReportRequest](budgetsummaryreportrequest.md)  
