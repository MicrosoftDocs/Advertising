---
title: Forecast Campaign Results with the Audience Planner
ms.service: msa-help
ms.subservice: msa-audience-display-video
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Use Audience planner to see how many people you can reach on the Microsoft Audience Network.
---

# Forecast campaign results with the Audience planner

The Audience planner helps advertisers research and plan [Audience campaigns](hlp_BA_CONC_NativeAds.md) by estimating potential performance before launching a campaign. It provides two types of estimates:

- **Potential reach** shows the total estimated audience size and viewable impressions based on selected targeting criteria.
- **Predicted campaign performance** estimates impressions, clicks, costs, and spend based on the advertiser's bid and budget.

Estimates are shown as ranges rather than fixed numbers to reflect the natural variability of live auctions and current market conditions. As targeting, bids, or budgets change, the Audience planner recalculates estimates in real time, helping advertisers understand potential outcomes and make informed planning decisions before spending.

## What the Audience planner forecasts and how

The Audience planner produces forecasted estimates in seconds through a three-step process that combines precomputed marketplace summaries, current market conditions, and your specific selections.

- **Historical trends:** We look at past marketplace activity to understand how many people typically match your targeting criteria.
- **Marketplace and constraint modeling:** We factor in current competition, expected traffic levels, and your specific bid and budget settings to determine what you can realistically achieve.
- **Real-time updates:** As you adjust your settings, such as changing a city or increasing a bid, the Audience planner immediately re-calculates the ranges to reflect those changes.

Forecasting the future always involves some uncertainty. By providing a range, we give you a more realistic picture of potential outcomes. This helps you prepare for both conservative and optimistic scenarios, allowing you to make more confident decisions.

## What factors influence your estimates

Your forecast is dynamic and depends on two primary factors: Available inventory and campaign competitiveness (your ability to win). The table below shows additional factors that influence the final estimates.

| Factor | How it affects your forecast |
| --- | --- |
| **Ad placement** | Where your ads appear affect both the cost and the volume of traffic available. |
| **Bid & competitiveness** | A higher bid increases your probability of winning an auction. If your bid is too low, you may see fewer clicks even if the available audience is large. |
| **Budget limits** | If the total market opportunity is larger than your budget, your estimates are scaled to reflect what you can realistically afford to reach. |
| **Seasonality** | The forecast for the holiday season in December will look different than one for July, due to shifts in shopper behavior. |
| **Traffic quality** | We automatically filter out estimated invalid traffic or bot activity, so your forecast reflects genuine human reach. |

## Get started with Audience planner

To access the Audience planner in Microsoft Advertising, select **Tools** > **Audiences** > **Audience planner**.

1. In the **Targeting** tab in the left pane, select one or more audience segments.

   You can target—or exclude—the following:

   - **Location**
   - **Age**
   - **Gender**
   - **Audience**: For example, remarketing lists, in-market audiences, or dynamic remarketing lists. Take a look at [your options for audiences](hlp_BA_CONC_Audiences_Options.md).
   - **Company**: What companies people work for, according to their LinkedIn profiles.
   - **Industry**: What fields people work in, according to their LinkedIn profiles.
   - **Job function**: What types of jobs people have, according to their LinkedIn profiles.
1. To see the size of your audience, in the center of the tool, note:

   - Estimated overall figures: The **estimated monthly audience** (number of people, per month, in the audience you defined) and **estimated monthly impressions** (number of times people will see your ad per month).
   - The makeup of the audience you defined, broken down by **Demographics** (age and gender), **Location**, **Interest** (in-market audience), and **Device**.

> [!NOTE]
> - These figures update when you select **Get estimates** after adding, removing, or excluding audience segments in the left pane. This allows you see right away how adding, removing, or excluding segments affects the size and makeup of your audience.
> - Please try the following actions if no data is available:
>
>   - Broaden your targeting to increase your estimated audience size.
>   - Associate your audience selection (eg., similar audience) with a campaign and wait 24 to 48 hours for the data to process.
>   - Please wait 24 to 48 hours and try again if your audience segment is new.
> - These are estimated figures based on historical data and provide directional guidance; they *do not* guarantee future results.

## Check your estimated performance

In the **Estimated monthly performance** section at the top of the page, you'll see estimates for **Audience size**, **Impressions**, **Clicks**, **Avg. CPC** (cost per click), and **Spend**. These figures represent the performance you could get, based on the audience you defined.

You can experiment with different budgets and bids in the **Settings** tab to see how they affect your estimated performance.

1. Enter a value in the **Daily budget** box.
1. Select a **Bid Strategy** based on your business goal.
1. Enter a value in the **Bid** box.
1. Select **Get estimates** and see how the performance figures go up or down.

> [!NOTE]
> - The estimated performance will be restricted if you don't have a big enough budget. You might not see better performance even with a higher bid.
> - These are estimated figures and do not guarantee future results.

## Apply the results to a campaign

If you like the look of the audience you defined, turn it into an actual campaign.

1. Select **Apply to my account**.
1. Choose whether you want to **Create a new Audience campaign** with these targeting settings or **Create a new ad group in an existing Audience campaign**.

   - If it's a new campaign, enter a **Campaign name** and set its **Daily budget**.
   - If it's a new ad group in an existing campaign, **Select a campaign** and confirm its **Daily budget**.
1. Enter an **Ad group name**.
1. Enter a **Bid** value.
1. Select **Save and continue**.

## Build a persona for your audience

In the left pane, in the **Targeting** tab, you can create, edit, and save your audience targeting settings as a **Persona** to help you optimize your next campaign.

1. **Preview** your audience targeting settings and corresponding information for each persona.
1. Select **View details** to open the persona in the Audience planner and edit your settings.
1. **Save as a new persona** or **Replace existing persona** after updating your audience targeting.

## Export your generated plan

> [!NOTE]
> Not everyone has this feature yet. If you don't, don't worry—it's coming soon!

Download your generated plan from Audience planner as a single CSV file. This export includes your plan settings, targeting selections, performance estimates, and audience insights, making it easy to share your campaign proposal with clients and collaborate across teams.

Once Audience planner has generated estimates for your plan, select **Download** at the top right corner of Audience planner.

> [!NOTE]
> - These are estimated figures and do not guarantee future results.
> - Avoid using the ad group settings potential reach tool, as the Audience planner provides a more accurate representation of potential delivery.
