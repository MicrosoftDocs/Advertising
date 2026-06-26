---
title: What is "Ad position"?
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: "*Ad position* is the position of your ad on a webpage. This article will explain how that position in determined."
---

# What is "ad position"?

*Ad position* is where your ads appear on Bing, AOL, Yahoo, or a partner site's search engine results page. Your ad's position is determined by how it ranks against competing ads. Ad rank is determined by multiple factors, including:

- The amount you bid for your . For more information, see [What are keyword bids](hlp_BA_CONC_NewAd_SetCampaignBudgetAndBidAmounts.md).
- Your ad's .
- Your ad's performance, based on various response signals—for example, (CTR).

Since webpages have a limited number of space to show ads, we auction those spaces. You're bidding against other advertisers to get your ads in those spaces. For example, if you sell shoes and bid on the keyword "shoe," you'll have to beat the ad rank of the other advertisers who are also bidding on "shoe." If your bid isn't high enough, you might not get the space you want (i.e., at the top of the search engine results page).

For your ad to appear at the top of Bing's search engine results page in position 1, 2, 3, or 4, (also called the *mainline*), it must meet the minimum level of performance. If the ad doesn't meet the minimum level, it can appear in other positions, including on the right side of the page (also called the *sidebar*), in the middle of the page, or at the bottom of the page. There's nothing wrong with appearing in these positions, though most advertisers strive to get one of the coveted mainline positions as these have the highest click-through rates. For suggestions on how to improve your ad rank and position, see [Get my ad to the top of the search results page](hlp_BA_CONC_ImproveAdPosition.md).

:::image type="content" source="media/BA_Conc_AdPosition.gif" alt-text="Ad position on a Bing search results page.":::

> [!NOTE]
> - Text ads no longer serve in the sidebar on Bing owned and operated sites.
> - While your ads won't compete with each other, in some cases an ad may be repeated in more than one position on the page. For example, a variation of your mainline Search ad may also appear at the bottom of the page. Or, the same product ad might appear in both the top and middle positions of the page. This creates additional opportunities for potential customers to select your ad.

You can run an account, campaign, ad group, ad, or keyword performance report and select the **Top vs. other** column to see performance differences (such as and ) between mainline ads and ads in other positions. This can help you optimize your keyword bids to improve performance and increase your ROI. For information on running a performance report, see [Understanding the Report Builder](hlp_BA_PROC_CreateReport.md). You can also segment your Accounts summary or Campaign performance data for **Top vs. other**. For information on how to do this, see [Segment your performance data](hlp_BA_CONC_Segmentation.md).

### How to obtain an R-Link

An R-link is the actual URL behind the title link that is showing in the ad from the search results page. To obtain it, right-click on the link in the ad.

:::image type="content" source="media/BA_CONC_WhatIsAdPosition.png" alt-text="Obtaining an R-Link.":::

Choose the option in your browser that copies the link's address or URL:

- **Copy shortcut** in IE
- **Copy Link Location** in Firefox
- **Copy Link** in Edge
- **Copy link address** in Chrome

You will have a valid **Microsoft Advertising** URL if it contains "www.bing.com/aclick" in it, like below.

```
http://10334.www.bing.com/aclick/?ld=dx3_CI0cjur9djdz1sFWfHhfER7DVUCUwoi3BqKtK2JOiMkgxznGbYKFMaLp8K-Z_T0jvW8tDbtzOJP7FXAh8_86EtETQg0eo9eYDhnHVmpduKjSv4kqpUrH1BS73UNtX50OPFil1H4iD4Avh-be3uutMUc3NgQOJTSqqutFUSyH2NliHpOErt&u=www.contoso.com%2fwnhclick%3flink%3dtime-clock-tool%26made%3deasy%2520and%2520solid%2520choice%26ad_id%3d3785318562%26matchtype%3ddx
```