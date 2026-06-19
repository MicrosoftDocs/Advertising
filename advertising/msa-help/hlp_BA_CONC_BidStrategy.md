---
title: Let Microsoft Advertising Manage Your Bids with Bid Strategies
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn how Microsoft Advertising can handle bidding for you using bid strategies such as enhanced CPC, maximize clicks, maximize conversions, and target CPA.
---

# Let Microsoft Advertising manage your bids with bid strategies

> [!IMPORTANT]
> - Starting on August 4, 2025, to set up Target CPA (cost per acquisition) and Target ROAS (return on ad spend), use [Maximize conversions](#maximize-conversions) with the Target CPA value and [Maximize conversion value](#maximize-conversion-value) with the Target ROAS value. Stand-alone Target CPA and Target ROAS bid strategies can't be set up for newly created campaigns or for campaigns that aren't currently using them.
> - Existing campaigns that use these bid strategies won't be impacted and will run as usual. Portfolio bid strategies won't be impacted, either.
> - Bid strategy consolidation won't impact SA360.
> - See [Changes to bid strategies options](#changes-to-bid-strategies-options) to learn more about this change.

The bid strategy you choose tells us how you want to manage the [bids](hlp_BA_CONC_NewAd_RefineBids.md) for your campaign. With manual bid strategies, you manually set your bids. With auto-bidding strategies, Microsoft Advertising automatically adjusts your bids in real time to meet your performance goals using our deep analysis of patterns in searches, clicks, and conversions. Whichever bid strategy you use, Microsoft Advertising will always respect your budget limit. Note that manual bid strategies are only available in Shopping, App, and Audience campaigns, depending on which strategy you choose. Please review the below list of bid strategies to see the specific campaign types where you can use them.

See [Auto-bidding strategy delivery statuses](#auto-bidding-strategy-delivery-statuses) for information about auto-bidding strategy statuses and a list of [frequently asked questions](#frequently-asked-questions-about-auto-bidding-strategy-statuses) about them.

- [Watch the video](https://www.youtube.com/watch?v=TESIk_WU0cc)

## How would you like Microsoft Advertising to manage your bids?

Review our [auto-bidding](#auto-bidding-strategies) and [manual bid](#manual-bid-strategies) strategies to see how they can help meet your advertising goals:

<a id="auto-bidding-strategies"></a>

- **Auto-bidding strategies**

  Generate conversions

  - [Maximize conversions](#maximize-conversions)
  - [Maximize conversion value](#maximize-conversion-value)
  - [Target CPA](#target-cpa)
  - [Target ROAS](#target-roas)

  Generate leads

  - [Enhanced CPC](#enhanced-cpc)
  - [Maximize clicks](#maximize-clicks)

  Drive awareness

  - [Cost per completed view (CPCV)](#cost-per-completed-view-cpcv)
  - [Target impression share](#target-impression-share)

  <a id="manual-bid-strategies"></a>

- **Manual bid strategies**

  - [Cost per sale (CPS)](#cost-per-sale-cps)
  - [Manual CPI](#manual-cpi)
  - [Manual CPM](#manual-cpm)

  <a id="cost-per-sale-cps"></a>

- **Cost per sale (CPS)**

  > [!NOTE]
  > CPS is supported on Microsoft Advertising and Bing Ads API, in [all available markets](hlp_BA_CONC_Countries.md).

  Cost per sale (CPS) bid strategy is an incremental opportunity for Shopping campaigns, where you only pay for a sale that happens within 24 hours of a click on your [product ad](hlp_BA_CONC_AboutProductAds.md). You set the target cost per sale that you want used to maximize conversions.

  It takes up to 72 hours for a CPS Shopping campaign to start delivering. Until the campaign is live, the delivery status will show as "In review".

  Sales for CPS Shopping campaigns are recorded in sales count column, rather than the conversion column. To view the sales count, simply add the **Sales** column in the Campaigns grid.

  To ensure the best possible performance, we recommend that this bid strategy should only be applied after 30-50 successful conversions have been recorded.

  > [!NOTE]
  > Due to how we track sales over a 24-hour period, we're unable to determine how many sales will take place within that timeframe. Therefore, there's a possibility we'll exceed your daily budget cap beyond the normal limit of 200%. However, we'll always honor monthly budgets for CPS Shopping campaigns.

  <a id="maximize-conversions"></a>

- **Maximize conversions**

  > [!NOTE]
  > Maximize conversions is available for:
  >
  > - Audience campaigns.
  > - Search campaigns.

  > [!NOTE]
  > > [!NOTE]
  > > This bid strategy doesn't count conversion goals that aren't included in your conversion goal settings. [If you clear the checkbox](hlp_BA_CONC_ConvsVsAllConvs.md) next to **Include in "Conversions"** for a particular conversion goal, it will no longer factor into auto-bidding calculations.

  With maximize conversions, Microsoft Advertising automatically sets your bids in real time to get as many conversions as possible within your budget.

  Microsoft Advertising will always respect your overall budget limit, but if you want greater control over your bids while using maximize conversions, you can also set a maximum cost per click (CPC). This is an optional limit you can set to make sure that Microsoft Advertising never charges more than a certain amount for each individual click.

  You need to have [conversion tracking](hlp_BA_CONC_UETv2WhatIsCT.md) (either a UET tag + an active conversion goal, or offline conversions) set up in order to use the maximize conversions bid strategy. We recommend giving the bid strategy enough time to accumulate at least 30 conversions before evaluating its performance.

  You cannot change bids for keywords that are using maximize conversions. This means that automated rules and third-party bid management tools will *not* affect these keywords. With maximize conversions, Microsoft Advertising will have full and final control over optimizing your bids. That said, any bid adjustments you have set (or that you set in the future) can be used to inform your maximize conversions automated bids.

  [See Best practices for maximize conversions below.](#best-practices-for-maximize-conversions-and-target-cpa)

  <a id="maximize-conversion-value"></a>

- **Maximize conversion value**

  > [!NOTE]
  > Maximize conversion value is available for:
  >
  > - Search campaigns.
  > - [Shopping search](TODO-FWLINK-2263702) campaigns, [where available](hlp_BA_CONC_Countries.md).

  > [!IMPORTANT]
  > Maximize conversion value is not supported for Microsoft Store ads.

  Maximize conversion value focuses on optimizing high-value conversions and the total sales value of your campaign. We'll automatically set your bids in real time to maximize total conversion value within your budget. If you have specific return on investment (ROI) goals, you can choose to add a **Target ROAS (return on ad spend)**. To learn more about **Target ROAS**, please see [below](#target-roas).

  <a id="target-cpa"></a>

- **Target CPA**

  > [!IMPORTANT]
  > - Starting on August 4, 2025, to set up Target CPA (cost per acquisition), use [Maximize conversions](#maximize-conversions) with the Target CPA value. Stand-alone Target CPA bid strategies can't be set up for newly created campaigns or for campaigns that aren't currently using them.
  > - Existing campaigns that use this bid strategy won't be impacted and will run as usual. Portfolio bid strategies won't be impacted, either.
  > - Bid strategy consolidation won't impact SA360.
  > - See [Changes to bid strategies options](#changes-to-bid-strategies-options) to learn more about this change.

  > [!NOTE]
  > Target CPA is available for:
  >
  > - Audience campaigns.
  >
  >   > [!NOTE]
  >   > To set a target CPA for Audience campaigns, you must select the [maximize conversions](#maximize-conversions) bid strategy. Then, you'll be prompted to optionally set a target CPA.
  > - Search campaigns.

  With Target cost per acquisition (CPA), you set your budget and your target 30-day average CPA, and Microsoft Advertising automatically sets your bids in real time to get you to this average. Some conversions may cost more than your target and some may cost less, but Microsoft Advertising will try to make sure your average cost per conversion is in line with your target.

  Microsoft Advertising will always respect your overall budget limit, but if you want greater control over your bids while using target CPA, you can also set a maximum CPC (cost per click). This is an optional limit you can set to make sure that Microsoft Advertising never charges more than a certain amount for each individual click.

  You need to have [conversion tracking](hlp_BA_CONC_UETv2WhatIsCT.md) (either a UET tag + an active conversion goal, or offline conversions) set up in order to use the target CPA bid strategy. We recommend giving the bid strategy enough time to accumulate at least 30 conversions before evaluating its performance.

  You cannot change bids for keywords that are using target CPA. This means that automated rules and third-party bid management tools will *not* affect these keywords. With target CPA, Microsoft Advertising will have full and final control over optimizing your bids. That said, any bid adjustments you have set (or that you set in the future) can be used to inform your target CPA automated bids (while still striving to achieve your target CPA).

  > [!NOTE]
  > - Target CPA is a campaign-level target. Individual ad groups may have different CPAs that may vary over time while the campaign target CPA is met. Different devices may see different CPAs as well.
  > - When using the auto bidding function, you can only set the bid on the campaign level. The auction bid for every keyword is calculated by the backend model in real-time.

  [See Best practices for Target CPA below.](#best-practices-for-maximize-conversions-and-target-cpa)

  <a id="target-roas"></a>

- **Target ROAS**

  > [!IMPORTANT]
  > - Starting on August 4, 2025, to set up Target ROAS (return on ad spend), use [Maximize conversion value](#maximize-conversion-value) with the Target ROAS value. Stand-alone Target ROAS bid strategies can't be set up for newly created campaigns or for campaigns that aren't currently using them.
  > - Existing campaigns that use this bid strategy won't be impacted and will run as usual. Portfolio bid strategies won't be impacted, either.
  > - Bid strategy consolidation won't impact SA360.
  > - See [Changes to bid strategies options](#changes-to-bid-strategies-options) to learn more about this change.

  With Target return on ad spend (ROAS), you set your budget and your target 30-day average ROAS, and Microsoft Advertising automatically sets your bids in real time to get you to this average.

  Microsoft Advertising will always respect your overall budget limit; but if you want greater control over your bids while using target ROAS, you can also set a maximum CPC (cost per click). This is an optional limit you can set to make sure that Microsoft Advertising never charges more than a certain amount for each individual click.

  You need to have [conversion tracking](hlp_BA_CONC_UETv2WhatIsCT.md) (either a UET tag + an active conversion goal, or offline conversions) set up and have positive revenue tracked in order to use the target ROAS bid strategy. We recommend giving the bid strategy enough time to accumulate at least 30 conversions before evaluating its performance.

  You cannot change bids for keywords that are using target ROAS. This means that automated rules and third-party bid management tools will *not* affect these keywords. With target ROAS, Microsoft Advertising will have full and final control over optimizing your bids. That said, any bid adjustments you have set (or that you set in the future) can be used to inform your target ROAS automated bids (while still striving to achieve your target ROAS).

  > [!NOTE]
  > - Target ROAS is a campaign-level target. Individual ad groups may have different ROAS values, and those ROAS values may vary over time, while the campaign target ROAS is met. Different devices may see different ROAS values as well.
  > - This bid strategy type cannot be used by campaigns that use [shared budgets](hlp_BA_CONC_SharedBudgets.md), except with a [portfolio bid strategy](hlp_BA_CONC_BidStrategy_Portfolio.md).
  > - When using the auto bidding function, you can only set the bid on the campaign level. The auction bid for every keyword is calculated by the backend model in real-time.

  <a id="enhanced-cpc"></a>

- **Enhanced CPC**

  > [!NOTE]
  > Enhanced CPC is available for:
  >
  > - Audience campaigns.
  >
  >   > [!NOTE]
  >   > When using Enhanced CPC in Audience campaigns, you may see a suggested bid range based on advertisers with similar targeting. If your bid falls outside that range, a message appears below the bid field indicating that it may be uncompetitive and showing the typical successful range.
  > - Search campaigns.
  > - Shopping campaigns, [where available](hlp_BA_CONC_AboutProductAds.md).

  This is the best bid strategy to generate leads. With enhanced CPC for Search campaigns, you set your ad group and keyword bids, and Microsoft Advertising automatically adjusts your bids in real time to increase your chances for a conversion. Your bid will go higher on searches that are more likely to convert and lower on searches less likely to convert (up or down, this change will be made after we apply any bid adjustments you have set). Over the long haul, though, we will try to make sure that your average CPC is not higher than your bid. With enhanced CPC for Audience campaigns, you choose audiences to target and define your bid (i.e., **Target and bid** or **Bid only**).

  If you haven't optimized your campaign yet, enhanced CPC should reduce your cost per conversion and increase your total conversion count while respecting your current budget.

  > [!NOTE]
  > - For the best results, we strongly recommend using Enhanced CPC in conjunction with [conversion tracking](hlp_BA_CONC_UETv2WhatIsCT.md) (a UET tag and a conversion goal).
  > - Enhanced CPC will not break third-party bid management tools. Enhanced CPC will always use the bids set by your bid management tool as a starting point before applying any adjustment.

  <a id="maximize-clicks"></a>

- **Maximize clicks**

  > [!NOTE]
  > Maximize clicks is available only for Search ad and Microsoft Shopping campaigns.

  With maximize clicks, Microsoft Advertising automatically sets your bids in real time to get as many clicks as possible within your budget.

  Microsoft Advertising will always respect your overall budget limit; but if you want greater control over your bids while using maximize clicks, you can also set a maximum CPC (cost per click). This is an optional limit you can set to make sure that Microsoft Advertising never charges more than a certain amount for each individual click. Maximum CPC campaigns do not support [bid landscape](hlp_ba_conc_bidlandscape.md) functionality.

  You cannot change bids for keywords that are using maximize clicks. This means that automated rules and third-party bid management tools will *not* affect these keywords. With maximize clicks, Microsoft Advertising will have full and final control over optimizing your bids. That said, any bid adjustments you have set (or that you set in the future) can be used to inform your maximize clicks automated bids.When using the auto bidding function, you can only set the bid on the campaign level. The auction bid for every keyword is calculated by the backend model in real-time.

  Tips for using maximize clicks with Microsoft Shopping campaigns

  - Shopping campaigns that use maximize clicks should be kept at the highest priority.
  - Avoid creating overlapping product offers in multiple Shopping campaigns that use maximize clicks.

  <a id="cost-per-completed-view-cpcv"></a>

- **Cost per completed view (CPCV)**

  > [!NOTE]
  > CPCV is only available for [Premium Streaming](hlp_BA_CONC_AboutVideoAds.md).

  With CPCV, we optimize your bids based on the cost you want to pay per completed view of a ad. You set the amount you want to pay per completed view of your ad. Then, Microsoft Advertising automatically finds traffic based on your targeting to show ads to potential customers who are likely to view your ad to completion. Please note that CPCV is the only bid strategy available for Premium Streaming.

  <a id="target-impression-share"></a>

- **Target impression share**

  > [!NOTE]
  > Target impression share is only available for Search campaigns.

  With Target impression share, you set your budget, where you want ads to appear, and your target impression share. Then, Microsoft Advertising automatically sets your bids.

  Microsoft Advertising will always respect your overall budget limit, but if you want greater control over your bids while using target impression share, you can also set a maximum cost per click (CPC). This is an optional limit you can set to make sure that Microsoft Advertising never charges more than a certain amount for each individual click.

  <a id="manual-cpi"></a>

- **Manual CPI**

  > [!NOTE]
  > Manual CPI is only available for App Ads campaigns.

  With the Manual CPI bid strategy, you set the maximum value of installs for your App Ads campaign. Microsoft Advertising will set your bids that are lower than your defined CPI value.

  <a id="manual-cpm"></a>

- **Manual CPM**

  > [!NOTE]
  > Manual CPM is only available for Audience campaigns.
  >
  > > [!NOTE]
  > > When using Manual CPM in Audience campaigns, you may see a suggested bid range based on advertisers with similar targeting. If your bid falls outside that range, a message appears below the bid field indicating that it may be uncompetitive and showing the typical successful range.

  This is the recommended bid strategy for advertisers who want to drive awareness and reach. With manual cost-per-thousand impressions (CPM), you set the actual cost you want to pay per 1,000 viewed impressions. A viewed impression for Display and Native ads is counted when more than 50% of the ad pixels are in the user's view and the ad is viewed for at least one second. A viewed impression for Online Video ads is counted when more than 50% of pixels are in the user's view and the video plays for at least two seconds.

  This bid strategy allows advertisers to control their frequency limit. This limits how often a potential customer sees your ad. You can choose to limit how many times a customer sees your ad per hour, day, and week.

  <a id="changes-to-bid-strategies-options"></a>

## Changes to bid strategies options

Starting on August 4, 2025, to set up Target CPA (cost per acquisition) and Target ROAS (return on ad spend), use [Maximize conversions](#maximize-conversions) with the Target CPA value and [Maximize conversion value](#maximize-conversion-value) with the Target ROAS value. Stand-alone Target CPA and Target ROAS bid strategies can't be set up for newly created campaigns or for campaigns that aren't currently using them.

Existing campaigns that use these bid strategies won't be impacted and will run as usual. Portfolio bid strategies won't be impacted, either.

Bid strategy consolidation won't impact SA360.

For API, Microsoft Advertising Editor, and bulk actions: If you update your existing campaigns to the Target CPA or Target ROAS bid strategies, we'll automatically convert Target CPA to Maximize conversions and Target ROAS to Maximize conversion value.

If you want to set a target ROAS value for your Performance Max, Search, or Shopping campaigns in Microsoft Advertising, you can always choose to use the Maximize conversion value bid strategy and optionally enter a target ROAS for it.

Additionally, if you want to set a target CPA value for your Audience, Performance Max, and Shopping campaigns, you can always choose the Maximize conversions bid strategy and optionally enter a target CPA value for it. After August 4, 2025, you'll also have the option to set a target CPA value using the Maximize conversions bid strategy for Search campaigns.

## Comparing bid strategies

| Bid strategy | Do I set bids myself? | Can I use a third-party bid management tool? | Do I need conversion tracking? | Campaign type supported |
| --- | --- | --- | --- | --- |
| **Enhanced CPC** | ![Yes](media/Global_Icon_CheckMark.png) | ![Yes](media/Global_Icon_CheckMark.png) | ![No](media/Global_Icon_Xmark.png) | Audience, Search (including Vertical ads), Shopping |
| **Manual CPM** | ![Yes](media/Global_Icon_CheckMark.png) | ![Yes](media/Global_Icon_CheckMark.png) | ![No](media/Global_Icon_Xmark.png) | Audience |
| **Maximize Clicks** | ![No](media/Global_Icon_Xmark.png) | ![No](media/Global_Icon_Xmark.png) | ![No](media/Global_Icon_Xmark.png) | Search, Shopping |
| **Maximize Conversions** | ![No](media/Global_Icon_Xmark.png) | ![No](media/Global_Icon_Xmark.png) | ![Yes](media/Global_Icon_CheckMark.png) | Search, Audience |
| **Maximize Conversion Value** | ![No](media/Global_Icon_Xmark.png) | ![No](media/Global_Icon_Xmark.png) | ![Yes](media/Global_Icon_CheckMark.png) | Search, Shopping Search |
| **Target CPA** | ![No](media/Global_Icon_Xmark.png) | ![No](media/Global_Icon_Xmark.png) | ![Yes](media/Global_Icon_CheckMark.png) | Search, Audience |
| **Target impression share** | ![No](media/Global_Icon_Xmark.png) | ![No](media/Global_Icon_Xmark.png) | ![No](media/Global_Icon_Xmark.png) | Search |
| **Target ROAS** | ![No](media/Global_Icon_Xmark.png) | ![No](media/Global_Icon_Xmark.png) | ![Yes](media/Global_Icon_CheckMark.png) | Search, Shopping |

## Share a portfolio bid strategy with other campaigns

Portfolio bid strategy manages bidding across multiple campaigns that are all working toward the same goal. A campaign can either have its own bid strategy or it can share a portfolio bid strategy with other campaigns.

In a portfolio bid strategy, we automatically adjust your bids to balance under- and over-performing campaigns that share the same strategy, whether to maximize conversions, clicks, target impression share, or other performance goals. Portfolio bid strategies could be a great option for advertisers who want to make sure their entire budgets are spent efficiently.

Learn more: [Portfolio bid strategies: Auto-bidding for performance goals](hlp_BA_CONC_BidStrategy_Portfolio.md)

## Set a campaign's bid strategy

You can set the bid strategy at the campaign level. To change a campaign's bid strategy:

1. From the navigation menu on the left, hover over **Campaigns** and select **Overview**.
1. In the table, select the name of the campaign you want to edit.
1. From the menu on the left, select **Settings**.
1. Under **Bid strategy**, select the strategy you want to use.
1. Select **Save**.

> [!NOTE]
> - Your bids will start changing automatically within two hours of turning on a bid strategy. However, a bid strategy needs to run for up to two weeks to build up enough data to bid optimally. During the initial two weeks, changing your bid strategy setting, campaign budget, or conversion settings—or adding or removing ad groups or keywords—may cause this period to take longer.
> - At the ad group level you cannot change the bid strategy; you can either use the bid strategy that is at the campaign level or set a manual bid.

## Set a maximum CPC (cost per click)

> [!IMPORTANT]
> You can only set the maximum CPC on the campaign level.

To set a maximum CPC, your campaign must use one of the follow bid strategy types: [Maximize conversions](#maximize-conversions), [Target CPA](#target-cpa), or [Target ROAS](#target-roas). If your campaign uses one of these bid strategies, follow these steps:

1. From the navigation menu on the left, hover over **Campaigns** and select **Settings** > **Settings**.
1. In the table, select the name of the campaign you want to edit.
1. In your campaign settings, under **Bid strategy**, select the checkbox next to **I want to set a maximum CPC**.
1. Set the maximum CPC amount you want to apply.
1. Select **Save**.

<a id="best-practices-for-maximize-conversions-and-target-cpa"></a>

## Best practices for maximize conversions and Target CPA

- **Requirements**: In order to turn on maximize conversions or Target CPA, your campaign:

  - Must have [conversion tracking](hlp_BA_CONC_UETv2WhatIsCT.md) (either a UET tag + an active conversion goal, or offline conversions) set up. We recommend giving the bid strategy enough time to accumulate at least 30 conversions before evaluating its performance.
- **How to make sure maximize conversions and Target CPA work optimally:** Maximize conversions and Target CPA need time to work. For best results, keep this timeline in mind:

  1. **Getting set up: 30 days** — We recommend having at least 30 conversions in the previous 30 days. When setting up Target CPA, we suggest basing your target on your actual CPA from the previous 30 days. For new campaigns, we suggest basing your target on your account's performance.
  1. **Learning period: 1-2 weeks** — Our platform usually needs two weeks to acquaint itself with your campaign. Avoid changing budgets or conversion goals during this period, as this may cause the learning period to start over. We recommend *not* evaluating the bid strategy's performance based on these two weeks.  YT::https://www.youtube.com/embed/FpBrb0soCFk?si=1dETwPz88eIour6H::END 
  1. **Run campaign: 2-4 weeks** — Let your campaign run for two to four weeks after the learning period (avoiding changing budgets or conversion goals, as this may cause the learning period to start over) and then start evaluating the bid strategy's performance. Keep your conversion goal window in mind while evaluating performance.
  1. **Evaluate and adjust: Going forward** — Review the campaign's performance since the learning period is aggregate and make adjustments as needed. For Target CPA, we recommend keeping adjustments within 10-15%, up or down.
- **Timing of conversions**: When conversions occur more than seven days after the associated clicks, it's harder for maximize conversions and Target CPA to make effective bids. If most of your conversions occur more than seven days after the associated clicks, we recommend not using maximize conversions or Target CPA.
- **Offline conversions**: If you don't or can't upload offline conversions on a daily basis, we recommend not using maximize conversions or Target CPA. For best results, upload offline conversions within two days of the conversion.

> [!NOTE]
> Want expert advice on your ads? [Schedule a no-cost session with a personal Microsoft Advertising consultant](https://go.microsoft.com/fwlink/?linkid=837456)

<a id="auto-bidding-strategy-delivery-statuses"></a>

## Auto-bidding strategy delivery statuses

There are two auto-bidding strategy statuses that may appear in the **Delivery** column of the campaigns grid:

- **Limited by auto-bidding target**

  This status means that your campaign could gain additional opportunities by adjusting the target for [Target ROAS](#target-roas) and [Target CPA](#target-cpa) bid strategies. For Target ROAS, this status means that we recommend you lower the target. For Target CPA, this status means that we recommend you increase the target. This will adjust your acceptable target range so that we can find new opportunities that align with your performance goals.
- **Performance limited by budget**

  This status means that your campaign's performance is limited by the budget you've set and so it isn't performing as well as it could if you increased the budget. We suggest that you apply our recommended campaign budget by following these steps: From the navigation menu on the left, select **Campaigns**. In the **Delivery** column of the campaigns grid, hover over your auto-bidding status for the appropriate campaign and select **Apply the recommended Campaign budget**.

<a id="frequently-asked-questions-about-auto-bidding-strategy-statuses"></a>

## Frequently asked questions about auto-bidding strategy statuses

- **If my campaign's auto-bidding status says “Limited by auto-bidding target," does this indicate that there's something wrong with my campaign's optimization?**

  No, this status does not indicate that anything is wrong with your campaign's optimization. The purpose of this status is simply to inform advertisers that we have high confidence in the campaign's ability to gain additional opportunities by adjusting the target for [Target ROAS](#target-roas) and [Target CPA](#target-cpa) bid strategies. For Target ROAS, this status means that we recommend you lower the target. For Target CPA, this status means that we recommend you increase the target. It does not indicate any issues with the campaign optimization.

- **My campaign is meeting/exceeding the Target CPA or Target ROAS. Why do I still see the “Limited by auto-bidding target” status?**

  Even if your campaign is meeting or exceeding its target, it can still benefit by adjusting the target to gain additional opportunities. For Target ROAS, we recommend you lower the target. For Target CPA, we recommend you increase the target. This will adjust your acceptable target range so that we can find new opportunities that align with your performance goals for cost per acquisition and return on ad spend.

- **I have adjusted my campaign's target based on Microsoft Advertising's recommendation for the “Limited by auto-bidding target” status (i.e., increasing the target for Target CPA and lowering the target for Target ROAS). Why do I still see the “Limited by auto-bidding target” status?**

  You may still see this status for two reasons:

  - Not enough time has passed since changing the target. In which case, the status will be updated the next day.
  - If more than a day has passed and you see the same status, it's because we still see additional opportunities that can be gained by further adjusting the target (i.e., increasing the target for Target CPA and lowering the target for Target ROAS).

- **Is it required/highly recommended to adjust the target (i.e., increasing the target for Target CPA and lowering the target for Target ROAS) every time I see the “Limited by auto-bidding target” status for my campaign?**

  Changing or updating the target is based on your discretion and specific business goals. With this status, we recommend that you adjust the target based on our high confidence in the campaign's ability to gain additional opportunities. However, we don't recommend frequent target changes unless they are aligned with the advertiser's business goals.

## Related videos

- [Embrace the power of Microsoft Advertising AI](https://www.youtube.com/watch?v=KGwXlSMyrGk)
