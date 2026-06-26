---
title: Segment your performance data
ms.service: msa-help
ms.subservice: msa-reporting-analytics
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Find out how to use segmentation to split your performance data into rows based on Time, Network, Device, and Top vs. Other on the Account Summary or Campaigns page.
---

# Segment your performance data

Segmentation allows you to split your Account summary or Campaign page performance data into rows based on Time, Audience Conversions, Device Type, Network, Top vs. Other, and Vertical Ad Type. For example, you can segment your impression, click, and CTR data by device to see what devices your audience is seeing your ad on. This gives you greater insights into how your campaigns are doing and you no longer have to go to the Reports page to get this level of detail.

> [!IMPORTANT]
> *GoalId* will show as *GoalName* for some goals that aren't found under the current account, and in some rare scenarios where that goal has been migrated.

## Add segments to the table

1. From the navigation menu on the left, select **Tools** > **All accounts** > **Accounts summary**. Or, from the collapsible menu on the left, select **All campaigns** > **Campaigns** > **Campaigns**.
1. Select the **Segment** icon on the table toolbar and then select the one you want to apply. <br>

   | Segment | What it shows |
   | --- | --- |
   | **Time** | View your data by time (day, week, month, quarter, year, day of week). |
   | **Audience** | View your data by audience name or catagory (For example: Remarketing list, In-Market audience) |
   | **Conversions** | View your data by goal name or goal type (For example: Destination URL, offline conversion). Please note that this segment shows data related to conversions only. |
   | **Device Type** | View your data by device type (smartphone, tablet, or PC). |
   | **Network** | The combined Search advertising marketplace of the Microsoft Advertising Network. |
   | **Top vs. Other** | The position (mainline vs. bottom or sidebar) of your ad on the Microsoft Advertising Network search results page. |
   | **Vertical Ad Type** | View your data by different vertical ad types in your Search campaigns (e.g. Automotive inventory ads and Credit Card ads). |
1. Review your data split out by segment.

## Download segmented data in a report

Once you have your data the way you want it, you can [download it into a CSV or Excel report](hlp_BA_CONC_DownloadTableAsReport.md) to conveniently share the information with your clients or use for further analysis.

## Remove segments from the table

1. From the navigation menu on the left, select **Tools** > **All accounts** > **Accounts summary**. Or, from the collapsible menu on the left, select **All campaigns** > **Campaigns** > **Campaigns**.
1. On the table toolbar, select **Segment** > **None**.

## Segmentation data

Some segmentation types only have data for a specific period of time. Here is a summary of what is available and what date ranges you should avoid if using that segment.

| If you select | The minimum amount of data | The maximum amount of data | Date ranges to avoid |
| --- | --- | --- | --- |
| **Day** | 1 day | 16 days | Last 30 days and anything longer than this |
| **Week** | 1 week | 17 weeks | Today, Yesterday, This week (all versions), Last 7 days, Last week (all versions), Last 6 months and anything longer than this |
| **Month** | 1 month | 17 months | Today, Yesterday, This week (all versions), Last 7 days, Last week (all versions), Last 14 days, This month, Last 30 days, Last month, Entire time. If you select "This week" before the week is over or "This month" before the month is over, we won't be able to segment the data. |
| **Quarter** | 1 quarter | 13 quarters | Today, Yesterday, This week (all versions), Last 7 days, Last week (all versions), Last 14 days, This month, Last 30 days, Last month, Last 3 months, Entire time |
| **Year** | 1 year | 3 years | Today, Yesterday, This week (all versions), Last 7 days, Last week (all versions), Last 14 days, This month, Last 30 days, Last month, Last 3 months, Last 6 months, This year, Last year |
| **Day of the week** | No limit | No limit | None |
| **Goal name** | No limit | No limit | Data prior to October 26, 2017 |
| **Goal type** | No limit | No limit | Data prior to October 26, 2017 |
| **Audience name** | No limit | No limit | Data prior to January 5, 2018 |
| **Audience category** | No limit | No limit | Data prior to January 5, 2018 |
| **Device type** | No limit | No limit | None |
| **Network** | No limit | No limit | None |
| **Top vs. Other** | No limit | No limit | None |
| **Vertical Ad Type** | No limit | No limit | None |
