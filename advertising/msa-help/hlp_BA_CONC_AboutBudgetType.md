---
title: Discover your budget options
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Your budget is how much you want to spend per day on your ads. Making the right choice depends on your goals and how you want to monitor your spending. Do you want to choose your budget per campaign, or manage them all in one place?
---

# Discover your budget options

Before you can submit your ad campaign, you need to set a campaign budget amount and select a budget type. You can change your budget amount and budget types at any time. Changes to your budget generally take effect within an hour or so.

Let's say that you set a **Daily budget** and want the ads in your campaign to get 50 clicks a day. You decide that each is worth a maximum CPC (cost per click) of $.40. Multiply $.40 by 50, and a budget of $20 per day seems like a good idea. With Microsoft Advertising, many of your bid strategy options are click-based so you'll only pay when someone clicks one of your ads. A good starting point is to think about your campaign budget in terms of clicks and CPC. In other words, how many clicks are you hoping to get each day, and how much is each click worth to you? You could apply the same logic to impressions, conversions, and other goals.

> [!NOTE]
> - If you reach your daily budget limit, all ad groups in your campaign are paused.
> - Keep in mind that you cannot switch from a standard budget (**Daily budget** or **Shared budget**) to a **Lifetime budget** after you save your Audience campaign. Similarly, you cannot switch from a **Lifetime budget** to a standard budget after saving your Audience campaign.

Three budget types are available:

| Budget Type | Details | Benefits |
| --- | --- | --- |
| **Daily - Standard** | Microsoft Advertising will help you spend for optimized performance based on the products or services targeted by your campaign and availability of corresponding user searches during the day. | - Set the maximum amount that you want to spend each day and monitor your daily spend.<br>- Take advantage of changing market conditions, such as a holiday season or special promotion.<br>- Make frequent changes to budgets throughout the month.<br>- Have impressions distributed as evenly as appropriate throughout the day. |
| **Shared - Standard** | Multiple campaigns use a shared budget. Microsoft Advertising will help you spend for optimized performance based on the products or services targeted by your campaigns and availability of corresponding user searches during the day. Learn more at [Share a budget across multiple campaigns](hlp_BA_CONC_SharedBudgets.md) | - Shared budgets are flexible because we automatically adjust how your money is spent across multiple campaigns.<br>- Save time and help improve your ROI (return on investment) by letting us determine how to evenly spend your budget for multiple campaigns. |
| **Lifetime** | When you set a lifetime budget, you tell us the amount you want to spend on your entire campaign. The option to set a lifetime budget is only available for Audience campaigns. | - You have a certain amount of money you want to spend per campaign and want to set it up front without having to calculate a daily budget.<br>- Have your budget paced evenly throughout the campaign's duration.<br>- No need to make frequent changes to budgets throughout the month—you can set your total budget up front. |

- **How your budget is calculated and spent**

  - **Daily budgets**

    Your daily budget setting is only a target, so your actual spend might be higher or lower. This is because, for daily budgets, Microsoft Advertising always calculates a monthly budget and then the actual budget limit is calculated for an entire month. Daily budget types simply help you make sure that your budget is spread out over an entire month, and not used up in the first day.

    The calculation to convert your daily budget to a monthly budget is:

    *monthly budget = daily budget x 30.4 (the average number of days per month)*

    If you happen to change your daily budget mid-month, then your current monthly limit is calculated as your spend so far that month, plus the daily budget amount multiplied by the number of days remaining in the month. Like this:

    *monthly budget = Spend-to-date + (daily budget x days remaining)*

    In the unlikely event that your campaign's spend goes over your monthly limit, Microsoft Advertising will refund the overspend at the end of the month.

    > [!IMPORTANT]
    > Your daily limit is a *target*; your actual spend might be higher or lower. Variations are caused by several factors, such as different traffic volumes in different days of the week, or automatic detection and refunding of fraud clicks that can give money back to a campaign within a few hours of the click. Microsoft Advertising anticipates and automatically compensates for the fluctuations, and usually keeps overspend to less than 100% above your daily limit.

  - **Lifetime budget**

    For lifetime budgets, we try to pace evenly throughout the campaign's duration by setting an initial daily goal based on the lifetime budget amount divided by the number of days your campaign will run. This is refreshed daily based on the budget remaining divided by the days remaining. This helps account for any underspend or overspend.

    In the unlikely event that your campaign spend goes over your lifetime budget, Microsoft Advertising will refund the overspend.

- **Automatic budget adjustment**

  The automatic adjustment of your budget could be due to automated rules, shared budgets, or automated imports. Automated rules may adjust budgets based on performance criteria, while shared budgets distribute funds across multiple campaigns. Automated imports keep importing your Google Ads campaigns at the frequency you set, reactivating the campaigns and modifying the settings back to what they are on Google Ads (including the budget).

  To identify the cause, review the **Change history** tab in your account to see recent changes and their sources.


- **Understand performance estimates for Search campaigns**

  When you set your budget while creating a campaign, you'll see estimated performance metrics, based on your keywords and settings:

  - **Estimated monthly clicks**

    **What it is**: This is the number of times customers are expected to click your ads every month, given your keywords and your targeting and budget settings.

    **Why it's important**: Clicks are what you pay for. They typically include a customer clicking an ad on a search results page or on a website on the [Microsoft Advertising Network](hlp_BA_CONC_AboutAdvertisingNetwork.md). Clicks can also come from other sources, such as spiders, robots, and test servers.

    > [!TIP]
    > You pay for clicks on standard-quality clicks, not on low-quality or invalid clicks.

    **Get more info**: [Monitoring clicks: Telling the good from the bad](hlp_BA_CONC_AboutPreventingInvalidClicks.md)

  - **Estimated monthly impressions**

    **What it is**: This is the number of times customers are expected to see your ads every month, given your keywords and your targeting and budget settings.

    **Why it's important**: Regardless of whether you are driving customers to your website, tracking conversions, or just trying to get your message out, you'll want to track the number of times your ad is shown.

  - **Estimated monthly spend**

    **What it is**: This is the estimated total amount you will spend on this ad group every month, given your keywords and your targeting and budget settings.

    **Get more info**: [What if I reach my budget limit?](hlp_BA_CONC_BudgetLimit.md)

  - **Estimated average position**

    **What it is**: Estimated average position is the location that ads are likely to appear on the search results page. Although it varies, positions 1-4 appear at the top of the search results page and positions 5-10 appear in other locations (for example, the bottom or the sidebar).

    **Why it's important**: Ads that are on the first search results page tend to receive more clicks.

    **Get more info**: [Get my ad to the top of the search results page](hlp_BA_CONC_ImproveAdPosition.md)

- **What to do if your budget isn't being fully utilized**

  There can be a number of reasons for your budget not being fully utilized. Here are a few of the typical solutions we see:

  - Are your bids high enough to be competitive? Search campaigns that have assets with low bid values may not make the first page of results, resulting in low impressions.
  - Are you using **Targeting** to reach the right audience? You can use bid adjustments to improve your bids when we detect a customer is in your specified targeting.
  - Are your bids too high for the budget you've set? If so, this can force your campaign into **Limited by budget** status, where delivery is limited to prevent budget overspend.
  - Have you fully optimized your account? Check **Recommendations** to see if we've identified any optimization tactics that can benefit your performance.
  - Is your click through rate (CTR) low? If so, consider optimizing your ad copy and organizing your keywords into ad groups to boost your average position.

  If this problem persists, please contact [Support](https://go.microsoft.com/fwlink/?linkid=398371) for additional assistance.
