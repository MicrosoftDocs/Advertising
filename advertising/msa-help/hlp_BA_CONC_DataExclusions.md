---
title: Data exclusions for auto-bidding
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn how to set up data exclusions for auto-bidding
---

# Data exclusions for auto-bidding

You can exclude conversion data from your [auto-bidding](hlp_BA_CONC_BidStrategy_Portfolio.md) strategy's calculation for short periods of time with data exclusions. Auto-bidding uses your website's conversion data to calculate and optimize your bidding. Data exclusions for auto-bidding helps to ensure that your auto-bidding strategy maintains optimal performance during periods when your website's conversion data is inaccurate. For example, you may wish to create a data exclusion when you're experiencing website outages or conversion data tracking tag issues that cause major changes to conversion data. Data exclusions will automatically prevent inaccurate conversion data from impacting your bidding behavior, which helps you achieve your performance goals.

## What you need to know

- You can [create data exclusions](#create-a-data-exclusion) for short periods of time, up to 14 days. However, we recommend that you create data exclusions for 7 days or less.
- Data exclusions prevent both conversions and clicks associated with those conversions from impacting your auto-bidding strategy's calculation.
- You should only create data exclusions for campaigns using auto-bidding strategies that have stable performance. Additionally, your campaign's auto-bidding strategy should be active for at least 30 days before creating a data exclusion. <br> <br>

  > [!NOTE]
  > You shouldn't use data exclusions within your auto-bidding strategy's initial 30-day learning period.

- We don't recommend advertisers use data exclusions for boosting performance under normal conditions, as this will significantly impact your auto-bidding's optimization.
- To account for possible conversion data delays, we recommend that you include extra dates when selecting your data exclusion's **Start time** and **End time**. This will help ensure that you exclude all relevant conversion data.
- Data exclusions don't impact reporting. You can still view reports on conversions and clicks during the data exclusion period.
- You can create data exclusions for multiple campaigns and time periods.
- Data exclusions are only supported at the campaign level.

<a id="create-a-data-exclusion"></a>

## Create a data exclusion

1. From the navigation menu on the left, select **Tools** > **Bids & budgets**.
1. Select **Advanced controls** > **Data exclusions**.
1. Select **Create**.
1. Enter a **Name** for your data exclusion.
1. Optional: Enter a **Description** for your data exclusion.
1. Select your **Start time** and **End time**. <br> <br>

   > [!NOTE]
   > The date range for your data exclusion must be 14 days or less.
   
1. Select your data exclusion's **Scope**. For **Scope**, you can select the **Campaign type** or **Specific campaigns** for which the data exclusion will apply. <br> <br>

   > [!NOTE]
   > You can select or remove campaigns or change the data exclusion's scope at any time. To change the scope, select the data exclusion in the table, then select **Edit** > **Change settings**.

1. Choose the type of **Devices** that you would like to target during your data exclusion. You can choose from these options:

   - **Computers**: Desktop or laptop computers
   - **Smartphones**: Hand-held mobile devices
   - **Tablets**: Mobile devices that may not include a phone
1. Select **Save**.
