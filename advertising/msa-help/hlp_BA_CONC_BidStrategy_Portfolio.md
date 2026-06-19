---
title: "Portfolio Bid Strategies: Auto-bidding for Performance Goals"
ms.service: msa-help
ms.subservice: msa-campaigns-bidding
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Portfolio bid strategies manage bids across campaigns and adjust bids on your behalf.
---

# Portfolio bid strategies: Auto-bidding for performance goals

> [!NOTE]
> Not everyone has cross-account portfolio bid strategies yet. If you don't, don't worry—it's coming soon!

Portfolio bid strategy is an automated bidding feature that manages bidding across multiple accounts or campaigns that are all working toward the same goal.

We automatically adjust your bids to balance under- and over-performing campaigns that share the same strategy, whether to maximize conversions, clicks, target impression share, or other performance goals. Portfolio bid strategies could be a great option for advertisers who want to make sure their entire budgets are spent efficiently.

All you have to do is choose a bid strategy type and include campaigns with complementary budgets, and Microsoft Advertising will adjust your bids based on the performance of the entire portfolio.

## Bid strategies and supported campaign types

Portfolio bid strategies work best with one goal in mind, using complementary campaign and bid strategy types. You cannot change a portfolio's bid strategy type. If you want a campaign in the portfolio to use a different bid strategy you can move it to another portfolio. Your portfolio can include Search and Shopping campaigns if the selected bid strategy is supported for both.

> [!NOTE]
> Smart Shopping campaigns are not supported.

| Bid strategy type | Campaign type supported |
| --- | --- |
| **Maximize clicks** | Search, shopping |
| **Maximize conversions** | Search |
| **Max. conversion value** | Search, Shopping search |
| **Target CPA** | Search |
| **Target impression share** | Search |
| **Target ROAS** | Search, shopping |

Learn more: [Let Microsoft Advertising manage your bids with bid strategies](hlp_BA_CONC_BidStrategy.md).

## Create a portfolio bid strategy for campaigns within an individual account

1. From the navigation menu on the left, select **Tools** > **Bids & budgets**.
1. Select **Portfolio bid strategies**.
1. Select **Create**, and then choose a **Bid strategy**.
1. Enter the details of your strategy.
1. Select **Save**.

## Create a cross-account portfolio bid strategy

> [!NOTE]
> Not everyone has this feature yet. If you don't, don't worry—it's coming soon!

1. From the navigation menu on the left, select **Tools** > **Bids & budgets**.
1. Select **Portfolio bid strategies**.
1. Select **Create**, and then choose a **Bid strategy**.
1. Enter the **Name** for your bid strategy.
1. Below **Choose the account owner for your bid strategy**, choose your manager account.

   > [!NOTE]
   > If you'd rather create a portfolio bid strategy for campaigns within an individual account, choose the account you're currently using instead of your manager account.
1. Below **Reporting time zone**, choose the time zone you want to use for bid strategy performance reporting. By default, this is set to the time zone of the account you're currently using.

   > [!NOTE]
   > If you edit your **Reporting time zone**, your bid strategy performance report may reflect data in the new time zone and old time zone. Keep this in mind when using date filters as you review performance data.
1. **Currency** defaults to that of the account you're using and cannot be edited.

   > [!NOTE]
   > A cross-account portfolio can only be applied to accounts using the same currency.
1. Below **Which campaigns will use this bid strategy?**, select the campaigns you want to include in your cross-account portfolio bid strategy.
1. Select **Save**.

## Associate an existing portfolio bid strategy

Once you've created a portfolio bid strategy, you can associate this to other campaigns in your account using these steps:

1. From the navigation menu on the left, hover over **Campaigns** and select **Campaigns**.
1. Select the campaign that you want to link with the portfolio bid strategy.
1. Select **Settings**.
1. In the **Bid strategy** section, select the portfolio bid strategy you want to associate.
1. Select **Save**.

> [!NOTE]
> - Please ensure campaigns included in the portfolio bid strategy have individual budgets, or shared budgets that are all included in the same portfolio bid strategy, for optimal performance.

## Optimize your portfolio bid strategy

We highly recommend you either create separate budgets for each campaign you include in a portfolio bid strategy or ensure none of them share a budget with a campaign that's not included.

For example, portfolio bid strategies work best with campaigns that have individual budgets or shared budgets that are all included in the same portfolio bid strategy. This way, they are all working toward the same goal. However, shared budgets with campaigns that are partially included in the portfolio bid strategy, might not perform their best—and neither will the portfolio bid strategies to which they are associated.

If you decide to include a campaign within a portfolio bid strategy that [shares a budget](hlp_BA_CONC_SharedBudgets.md) that's outside of the strategy, we'll let you know it's misconfigured. You can fix this by removing a budget from a campaign and creating a [new individual budget](hlp_BA_CONC_AboutBudgetType.md) for that campaign. You can also add the outside campaign to the portfolio bid strategy.

## Check your portfolio bid strategy status or change settings

1. From the navigation menu on the left, select **Tools** > **Bids & budgets**.
1. Select **Portfolio bid strategies**.
1. Select the name of your portfolio bid strategy.
1. From here you can view the status of your portfolio bid strategy. If we see opportunity for improvement, this is where we'll let you know.
1. Select **Settings** if you'd like to change the name or other settings.

## Your portfolio bid strategy status can change over time

It will take a few weeks for a portfolio bid strategy to learn how your ads and bids are performing. It's important to understand that the more data becomes available, the more we can fine tune your bids and make the most impact. Here's how we will let you know how your portfolio bid strategy is performing:

- **Active**: The bid strategy is active and optimized for your goals.
- **Learning**: If you've recently added one or more campaigns to this strategy, we need a few weeks to gather performance data and learn how to make the most effective bids.
- **Limited**: At least one of your campaigns is constrained by a low budget.
- **Inactive**: The portfolio bid strategy has no active campaigns.
- **Misconfigured**: At least one campaign using this bid strategy has a shared budget that could be limiting the performance.

## Deleting portfolio bid strategies

Before deleting a portfolio bid strategy, make sure it's not associated to an active campaign. Otherwise, you won't be able to delete it. To delete a portfolio bid strategy:

1. From the navigation menu on the left, select **Tools** > **Bids & budgets**.
1. Select **Portfolio bid strategies**.
1. Locate the portfolio bid strategy you want to delete.
1. Select the name of the portfolio bid strategy.
1. Select **Edit** > **Delete**.
