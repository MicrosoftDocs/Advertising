---
title: The share of voice report shows how well you're competing
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn how the share of voice report can give you statistics about the percentage of ad impressions and clicks you may be losing.
---

# The share of voice report shows how well you're competing

> [!NOTE]
> As of November 10, 2025, share of voice metrics are available for Performance Max campaigns.

The Microsoft Advertising share of voice (SOV) report provides prominence metrics to help you better understand the percentage of ad impressions and clicks you might be *losing*. The report provides comprehensive impression and click share data, offering insights into the performance of accounts, ad groups, and keywords across search and Audience campaigns.

Any of the following impression share data can be included in your report.

> [!NOTE]
> For Performance Max campaigns, the only metrics included in the report are click share, impression share, impression share lost to budget, and impression share lost to rank. For Performance Max, these metrics are an aggregate of impressions from Search and Shopping placements. Audience placements aren't included or counted in this report for Performance Max.

| Performance statistic | What it is |
| --- | --- |
| **Click share (%)** | The estimated percentage of clicks, out of the total number of clicks available in auctions your ad showed in or was competitive in. <br> Example: Out of the estimated 1,000 clicks that occurred on this day in your target auctions, you had about 230, or 23%. |
| **Absolute top impression share (%)** | The estimated percentage of times your ad was in the first position of all results, out of the estimated number of first position impressions you were eligible to receive. A low number means your ads rarely appear in the topmost position of most search traffic, which is more likely to win click and conversion. To improve absolute top impression share, increase your bid or budget. |
| **Absolute top impression rate (%)** | How often your ad was in the first position of all results, as a percentage of your total impressions. |
| **Absolute top impression share lost to budget (%)** | The estimated percentage of how often your ad missed showing in the first ad position, above search results, due to insufficient budget. |
| **Absolute top impression share lost to rank (%)** | The estimated percentage of how often poor ad rank kept your ad from showing in the first ad position at the top of search results. Ad rank determines where your ad shows relative to other ads, based on factors including your bid amount, ad performance, ad relevance, ad extensions, other competing ads, and more. |
| **Audience impression share** | The impressions you got out of the total eligible impressions share you could have received for ads served in [Audience](hlp_BA_CONC_NativeAds.md) placements. Keywords displayed in these placements will not have the Share of Voice (SOV) and Auction Insights reports. To view the SOV and auction insights reports, select from the drop-down menu **Segment** > **Network**. Not everyone has this feature yet. If you don’t, don’t worry. It’s coming soon. |
| **Audience impression share lost to budget** | The percentage of impression share you lost due to insufficient budget for ads served in [Audience](hlp_BA_CONC_NativeAds.md) placements. This metric will remain empty until there are seven days of data collected. Not everyone has this feature yet. If you don’t, don’t worry. It’s coming soon. |
| **Audience impression share lost to rank** | The percentage of impression share you lost due to low rank for ads served in [Audience](hlp_BA_CONC_NativeAds.md) placements. Not everyone has this feature yet. If you don’t, don’t worry. It’s coming soon. |
| **Exact match impression share (%)** | The estimated percentage of impressions that your campaign received for searches that exactly matched your keyword, out of the total available exact match impressions you were eligible to receive. If this number is low, it might be because your bid is too low, or ad quality or relevance is low. For Dynamic Search ad campaigns, exact match impression share is not applicable data, so will show as 0% in these reports. |
| **Impression share (%)** | The estimated percentage of impressions, out of the total available impressions in the market you were targeting.Example: Out of estimated 59,000 impressions that occurred on this day in your targeted market, you got 2,300, or about 3%.<br>For Performance Max campaigns, impression share is calculated by adding impressions from your Search and Shopping placements divided by the total available impressions for those placements. (Audience placements aren't included or counted in this metric for Performance Max.) |
| **Relative CTR (click-through rate)** | Your click-through rate divided by the average click-through rate of all ads that appear in the same sections of websites that show your ads. Not everyone has this feature yet. If you don’t, don’t worry. It’s coming soon. |
| **Top impression rate (%)** | How often your ad showed in the mainline, the ad placements above the search results, as a percentage of your total impressions. |
| **Top impression share** | The percentage of impressions for your ad in the mainline, the ad placements above the search results, out of the estimated number of mainline impressions you were eligible to receive. Eligibility for top impression is based on your ads' approval status, quality score, targeting settings, and bids. |
| **Top impression share lost to budget** | The estimated percentage of mainline impressions, above the search results, that were lost due to insufficient budget. |

## Create a share of voice report

1. From the navigation menu on the left, select **Reporting** > **Templates** > **Competitive Visibility** > **Share of voice**.
1. Make any desired changes to the report's conditional formatting, date/time range, account scope, or columns.

## Add share of voice metrics to data tables

> [!NOTE]
> For Performance Max campaigns, you can only add share of voice metrics to the Campaigns grid.

1. From the collapsible menu on the left, select either **All campaigns** > **Campaigns**, **All campaigns** > **Ad groups**, or **All campaigns** > **Keywords**.
1. Select the ![ellipsis icon](media/BA_ScreenCap_EllipsisIcon.png) above the grid > **Columns** > **Modify columns**.
1. Select **Competitive (Share of Voice)**.
1. Choose any of the columns to add.
1. Select **Apply**.

> [!NOTE]
> - You might see some discrepancy between key performance indicators (KPIs) including impressions, clicks, and spend shown in the SOV report, when compared to the data in other reports. The SOV report provides only estimated impression and click share to help optimize your campaigns. It doesn't show exact delivery performance, but it records data if there is significant marketplace participation. Use other reports (Keyword, Ad group, and Campaign) to review performance history with harder data.
> - SOV reports are calculated based only on search traffic. You may find blank values in the following areas of your report: Impression share, Impression share lost to budget, Impression share lost to rank, Impression share lost to relevance, Impression share lost to expected CTR, Impression share lost to bid.
> - Blank values might appear in the impression share columns of a SOV report for keywords that have statistically insignificant performance data.
> - For Performance Max, the share of voice report is only available at the campaign and account level (not the keyword or ad group levels).
