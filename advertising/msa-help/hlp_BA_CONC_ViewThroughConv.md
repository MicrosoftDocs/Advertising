---
title: What are view-through conversions?
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn about how to track Audience ad impressions as conversions even if the customer doesn't click the ad.
---

# What are view-through conversions?

> [!NOTE]
> To use this feature, you will need to have Universal Event Tracking (UET) set up. [Learn more about UET](hlp_BA_CONC_UETv2WhatIsTag.md).

With view-through conversions, when an Audience ad plants the idea of your product or service in a customer's mind, that ad gets credit for the eventual conversion, even if the customer never clicked the ad. An Audience ad impression counts as a conversion when this happens:

1. Your Audience ad appears on a webpage that a potential customer visits.
1. Within a time period that you have defined, the same customer makes a purchase or other conversion on your website, without clicking your ad in the interim.

## Key things to keep in mind

- If customers click on any of your ads across Microsoft Advertising, they'll automatically be excluded from your view-through conversion metric so they won't be counted twice.
- View-through conversions are tracked for both [Audience campaign](hlp_BA_CONC_NativeAds.md) ads and Search ads extended to [audience](hlp_BA_CONC_NativeAds.md).
- This performance metric appears in the **View-through conversions** column of your tables and reports. View-through conversions are attributed to the last impression and are reported at the time of the impression.

## Including view-through conversions in the All conv. column

By default, view-through conversions are counted the same as other conversions, and are therefore included in the figure you see in the **All conv.** column of your tables and reports. To change this setting:

1. From the navigation menu on the left, hover over **Campaigns** and select **Settings** > **Account level options**.
1. For **View-through conversions**, select or unselect the checkbox next to **Include view-through conversion from Audience in your "All conv." columns**.
1. Select **Save**.

> [!NOTE]
> View-through conversions aren't included in the **All conv. CPA** column—even when they are included in the **All conv.** column.

## Setting your view-through conversion window

The view-through conversion window is the time between an impression and the last moment you want this impression to count towards a view-through conversion.

By default, all UET-based conversion goals are set with a view-through conversion window of 1 day. For new conversion goals, you can change this setting on the **Goal details** page when you create the goal. To change this setting for existing conversion goals:

1. From the navigation menu on the left, hover over **Conversions** and select **Conversion goals**.
1. Select the conversion goal you want to edit.
1. Select **Next** to get to the **Conversion goal details** page.
1. For **View-through conversion window**, enter a new time period.
1. Select **Save**.
