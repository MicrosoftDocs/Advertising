---
title: Monitor and optimize your bid strategies
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn how to use the Microsoft Advertising bid strategy report to evaluate automated bid strategy performance, access actionable insights, and optimize your campaigns and portfolios.
---

# Monitor and optimize your bid strategies

The Microsoft Advertising bid strategy report can help you evaluate how well your automated bid strategies are performing. Whether you're managing a single campaign or a portfolio, the report provides actionable insights to help you adjust targets and improve results. Advertisers often use additional features in the bid strategy report to refine their strategy.

The conversion delay metric shows when your conversion data is fully attributed, helping you decide when to check your performance again. Conversion delay is the time between when someone clicks your ad and when they complete a conversion, like making a purchase, installing an app, or signing up. The bid landscape insights panel lets you explore how different target settings could impact campaign performance. Here are a few examples of how advertisers can use the bid strategy report:

- Reviewing impressions, clicks, conversions, CPA, and ROAS to monitor performance.
- Identifying gaps by comparing actual results to average target values.
- Spotting opportunities to improve efficiency and outcomes.
- Tracking performance changes after switching to a new bid strategy.
- Exploring bid landscape insights to estimate how different settings might affect results.

## How to access the report

You can open the bid strategy report in three ways:

- *Campaign level:* From the campaign grid, select the **Bid strategy type** column to view campaign performance.
- *Portfolio level:* From the portfolio bid strategies grid, select the **Bid strategy name** column to view performance across all campaigns using that strategy.
- *Account level:* From the Bids and budgets tool, select the **Account strategies** tab to view aggregated performance across all bid strategies in your account.

## Understanding scorecard metrics

Each bid strategy type includes scorecard metrics that compare your targets to actual performance.

> [!NOTE]
> Average target values represent the weighted average of the targets the auto-bidding strategy used to manage spend during the selected time range. They do not reflect the average of the target values manually entered by advertisers.

| Bid strategy | Metrics |
| --- | --- |
| **Max. conversions with optional target CPA** | Avg. target CPA, CPA, spend, clicks, and conversions |
| **Max. conversion value with optional target ROAS** | Avg. target ROAS, ROAS, spend, conversions, and revenue |
| **Target impression share** | Avg. target impression share, impression share, top impression share, abs. top impression share, spend, and clicks |
| **Max. clicks** | Spend, impressions, clicks, and avg. CPC |
| **Enhanced CPC** | Spend, impressions, clicks, avg. CPC, and conversions |

## Bid strategy statuses

The following statuses can help you understand whether your strategy is performing optimally or facing limitations.

| Status | Description |
| --- | --- |
| **Active** | Strategy is running and optimized for your goals. |
| **Inactive** | No active campaigns, or strategy is paused. |
| **Limited by budget** | Campaign performance is constrained by budget. |
| **Limited by target** | Target CPA or ROAS is too aggressive to achieve. |
| **Limited by inventory** | Ad inventory is insufficient for your settings. |
| **Limited by max CPC** | Max. CPC is too low to compete effectively. |
| **Limited: low data volume** | Not enough conversions or revenue to optimize bidding. |
