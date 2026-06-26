---
title: See how you compete with the auction insights report
ms.service: msa-help
ms.subservice: msa-campaigns-bidding
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: The auction insights report shows you how your ads compete with other advertisers' ads. The report is based on the number of impressions that have auction insights available divided by total impressions for all the keywords in your selected scope.
---

# See how you compete with the auction insights report

The auction insights report shows you how your ads compete with other advertisers' ads. The report is based on the number of impressions that have auction insights available divided by total impressions for all the keywords in your selected scope.

Every time someone performs a search on the Microsoft Advertising Network, Microsoft Advertising runs an ad auction to determine which ads are shown and where they are placed on the search results page. Auction insights provide performance data per display URL domain on key statistics, including impression share and average position.

## Manager account level auction insights report vs. Account level auction insights report

If you want to look at an aggregation of auction insights across your accounts, you can run an auction insights report at the manager account level. You can also run reports at campaign, ad group and keyword levels within any of these accounts.

Anyone who has access to a manager account (even via hierarchy/manager account link) can run an auction insights report for that account. If an agency links to a single ad account, they can't run a report at the manager account level above that account.

> [!IMPORTANT]
> - A report run at the manager account level only looks at auction insights for expert accounts.
> - You can’t run the auction insights report on more than 300 accounts. Use **Add filter** to show less than 300 accounts and run the report again.
> - > [!NOTE]
>   > Auction insights reports are unavailable for Performance Max campaigns.

- **Run the report**

  1. From the navigation menu on the left, hover over **Campaigns** and select **Campaigns**.
  1. From the page menu, select either **Campaigns**, **Ad groups**, or **Keywords**.
  1. Select **Auction Insights**.
  1. Select **Download** and then select the **Format** and **Segment** of the report.
  1. Select **Download**.
  
- **Manager account level auction insights report:**
  1. From the top menu, select your account number and then select a manager account (not an ad account).
  1. From the page menu, select **Auction insights**.

     > [!IMPORTANT]
     > If you do not have any expert accounts, you will not see **Auction insights** on the page menu.
  1. Select **Download** and then select the **Format** and **Segment** of the report.
  1. Select **Download**.

## Read the report

The auction insights report reveals data on key performance statistics for you and your competitors.

**Display URL domain** lists the display URLs of other advertisers who are participating in the same auctions as you.

The statistics shown are impression share, overlap rate, position above rate, top of page (mainline) rate, outranking share, and account prioritization. Click each column in the report to learn more. Here’s what each of the key metrics means:

- **Impression share**: The number of times an ad is shown on the Microsoft Advertising Network divided by the total available impressions. Use this to compare your share of impressions to the impression share of advertisers competing against you.
- **Overlap rate**: The percentage of time competitors’ ads showed up on the search results page when your ad was shown. If the rate is high, then this advertiser is a competitor since their ads shows up on the same search results page as yours.
- **Position above rate**: The percentage of time competitors’ ads showed up higher than your ads on the search results page. If the rate is high, then the other advertiser is getting more desirable ad positions than you. A high rate is likely due to a poor-quality score or a low bid.
- **Top of page (mainline) rate**: The number of times an ad is shown at the top of the page on the Microsoft Advertising Network, divided by the total number of impressions it actually received. Ads at the top of the page tend to receive more clicks.
- **Outranking share**: The percentage of time your ad showed up higher on the search results pages than your competitors or your ad showed when theirs did not. If the rate is high, you are getting a more desirable ad position than other advertisers.
- **Account prioritization**: When you are underperforming a competitor domain in your auction insights, an insights card is created. Accounts are prioritized based on whether one outperforming competitor domain is ranked higher in that account’s auction insights.

By showing you where you are succeeding and where you might be missing opportunities for improved performance, the auction insights report can help you make strategic optimization decisions.

> [!NOTE]
> - The auction insights report will only run if you have enough impressions. If this is a new campaign or if you have too few impressions, the report will not be generated.
> - The competing websites listed in your auction insights report are those who enter the same auctions as you and are eligible for the same impressions that you are. Competitors aren't necessarily determined on how similar their keywords, match types, or other targeting settings are to your own, and auction insights doesn't provide a full report on these metrics for other advertisers.
> - The data retention period for the auction insights report is 180 days.
