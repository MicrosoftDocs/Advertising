---
title: Automatic Item Update
ms.service: msa-help
ms.subservice: msa-shopping-merchant-center
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/11/2026
description: Enable Automatic item update to reduce mismatches between your Microsoft Merchant Center offers and your site.
---

# Automatic item update

Keep your offers up and serving with Automatic item update. This feature automatically syncs your Microsoft Merchant Center feeds to your site's [price and availability microdata](hlp_BA_CONC_BMC_StructuredDataMarkup.md).

## What's in it for you

The products in your Microsoft Merchant Center feed have several attributes, including title, description, availability, and price. The last two attributes can fluctuate based on demand.

You may often run out of inventory on your site, but your Microsoft Merchant Center feed still incorrectly shows product availability. This mismatch can lead to a poor experience where a customer clicks on your product ad, only to find the product sold out on your site. Traditionally, Microsoft Merchant Center rejects an offer when a mismatch occurs.

Automatic item update allows you to keep serving offers because the feature will automatically update price and inventory data during the normal course of a business day.

## How it works

When you enable Automatic item update for your feed, you are sourcing price and availability info directly from your site microdata. If your site is out of inventory or if prices change, you can choose to automatically update an item in your Microsoft Merchant Center with:

- Price only
- Availability only
- Both price and availability

You can also opt to update these attributes automatically if you encounter the opposite scenario: Your site microdata shows product availability, but your feed shows the product as out of stock. You can override your feed with an optional setting in Automatic item update. Also, don't forget that for items being sold in bulk, the price must be for the minimum quantity sold. For example, if you sell paper cups in quantities of 100, the price should be for the 100 paper cups, and not as a single paper cup in both the feed and landing page.

Keep in mind that Automatic item update only pulls in new data, not for impressions. As such, Automatic item update is not a substitute for updating your data feed. You should continue to [update your feed file daily](hlp_BA_CONC_BMCWhatIsCatalog.md), whether manually, automatically, or via FTP.

## Enable Automatic item update

1. From the navigation menu on the left, select **Tools** > **Merchant Center** > **Settings**.
1. Select **Automatic item updates**.
1. Toggle the switch next to **Automatic item update** to **On**. <br>You'll need to select an option from the dropdown menu: **Price only**, **Availability only**, or **Price and availability**. <br>Also, you can opt to update an item's price and availability if it's out of stock in the feed, but it's in stock on the site. You can do this by checking the **If an offer is out of stock in the feed, override it and update availability directly from the site** box.
1. Select **Submit**.

## Disabling Automatic item update

1. From the navigation menu on the left, select **Tools** > **Merchant Center** > **Settings**.
1. Select **Automatic item updates**.
1. Toggle the switch next to **Automatic item update** to **Off**.
1. Select **Submit**.

## Restarting Automatic item update after a system pause

Mismatches can still occur with Automatic item update, which is why it's important to keep your data feed up to date. Microsoft Merchant Center will monitor the number of mismatches on offers with Automatic item update. If there is a high rate of mismatches, Automatic item update will be disabled and all offers will be rejected.

If this happens, you will need to review your offers and clean up the data mismatches. Microsoft Merchant Center will automatically resume Automatic item update once the mismatch rate drops.

> [!IMPORTANT]
> > [!NOTE]
> > If you enable Automatic item update for your feed, Microsoft Advertising is not responsible for incorrect data updates. For example, be sure that any marked-up data on your website's landing page is accurate.
