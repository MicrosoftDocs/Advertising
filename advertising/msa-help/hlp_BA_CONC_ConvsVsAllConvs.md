---
title: Conversion goals - Conversions versus all conversions
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn about the differences between the Conversions columns and the All conversions columns in the data table.
---

# Conversion goals - Conversions versus all conversions

Different [conversion goals](hlp_BA_CONC_UETv2CTGoalType.md) can have different values for your business. That's why, when creating or editing a conversion goal, you can choose whether or not to include each time the goal is achieved in your "Conversions" columns. This makes sure that the "Conversion" columns on your Conversion goal data table and in your reports reflect only the conversion goals that matter most to you.

> [!IMPORTANT]
> - If you use an automated bidding [bid strategy](hlp_BA_CONC_BidStrategy.md), clearing the **Include in "Conversions"** checkbox will result in these conversions no longer factoring into automated bidding calculations.
> - The **Include in "Conversions"** setting does not affect view-through conversions (not everyone has this feature yet). View-through conversions appear in both columns by default. [Learn more about view-through conversions](hlp_BA_CONC_ViewThroughConv.md).
> - Conversions that won't optimize campaign performance will only show up in the “All conversions” column.

## How to change the Include in "Conversions" setting for a conversion goal

- **When creating a conversion goal**

  1. From the navigation menu on the left, hover over **Conversions** and select **Conversion goals**.
  1. Select **Create conversion goal**.
  1. Select what kind of conversions you want to track and then select **Next**.
  1. Choose your conversion goal type and then select **Next**.
  1. Under Goal settings, name your goal, provide the **Destination URL**, and assign the **Revenue**.
  1. Under Advanced settings, clear the **Include in "Conversions"** checkbox.

- **When editing a conversion goal**

  1. From the navigation menu on the left, hover over **Conversions** and select **Conversion goals**.
  1. Select the conversion goal you want to edit.
  1. Under **Goal details**, clear (or select) the **Include in "Conversions"** checkbox.

  > [!IMPORTANT]
  > - If you use an automated bidding [bid strategy](hlp_BA_CONC_BidStrategy.md), clearing the **Include in "Conversions"** checkbox will result in these conversions no longer factoring into automated bidding calculations.
  > - The **Include in "Conversions"** setting does not affect view-through conversions (not everyone has this feature yet). View-through conversions appear in both columns by default. [Learn more about view-through conversions](hlp_BA_CONC_ViewThroughConv.md).

## Example of when to clear the checbox for **Include in "Conversions"**

Let's say you sell sunglasses online, and you have a conversion goal named "SALES" to track each time a sale is made. But you're also curious about how many times customers add a pair of sunglasses to their shopping carts, so you create a conversion goal named "CART" to track that as well.

Sales matter the most to you, and that means two things:

- You want to optimize your bidding around the SALES conversion goal.
- You don't want the CART conversion goal cluttering your Conversion goal data table and your reports.

All you need to do is clear the checkbox for **Include in "Conversions"** for the CART conversion goal. Now shopping-cart customer actions aren't factored into your bidding optimization and don't appear in your data table and reports under "Conversions". However, you can still track the CART conversion goal using the "All conversions" columns (see below).

## The "Conversions" and "All conversions" columns

If you clear the **Include in "Conversions"** checkbox for a conversion goal, you can still track it using the "All conversions" columns of your Conversion goal data table and your reports (for example, "All conversions", "All conversions rate", and "All conversions revenue"). Using the above example, these columns work like this:

| Example conversion goal | Include in "Conversions" | Conversions columns | All conversions" columns |
| --- | --- | --- | --- |
| **SALES** | Checked | ![Yes](media/Global_Icon_CheckMark.png) | ![Yes](media/Global_Icon_CheckMark.png) |
| **CART** | Unchecked | ![No](media/Global_Icon_Xmark.png) | ![Yes](media/Global_Icon_CheckMark.png) |
> [!NOTE]
> Conversion goal data will appear in either in the "Conversions column"s" or "All conversions columns" column table as shown above.