---
title: Why are my Shopping and Performance Max campaigns showing the “Product offers not found” error?
ms.service: msa-help
ms.subservice: msa-shopping-merchant-center
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn how you can troubleshoot the “product offers not found” error.
---

# Why are my Shopping and Performance Max campaigns showing the “Product offers not found” error?

When there is an issue associating products from your Microsoft Merchant Center feed to your shopping and Performance Max campaigns, you may see the “product offers not found” error. You can troubleshoot this error by checking the [store status](#store-status), [feed status](#feed-status), [product status](#product-status), and by setting [product filters](#product-filters).

<a id="store-status"></a>

## Store status

Your store must be active and ready to deliver in order for products to be eligible to match shopping and Performance Max campaigns.

Below are common scenarios that can cause a store to be inactive:

- **You haven't completed draft store setup**

  If your shopping or Performance Max campaign was imported and you selected to import the store in draft mode, you must [complete the draft store setup](https://go.microsoft.com/fwlink/?linkid=2215687).

  You can check if your store is in draft mode by navigating to Merchant Center or selecting **All campaigns** > **Settings** > **Shopping settings**.

- **Your store has been rejected**

  Make sure your store follows the Microsoft Merchant Center [policies](https://go.microsoft.com/fwlink/?linkid=2215845) and [request a review](https://go.microsoft.com/fwlink/?linkid=2215841) from the Microsoft Merchant Center.

  <a id="feed-status"></a>

## Feed status

Your feed must be enabled for publishing and must support the campaign's country/region of sale.

- **To make sure your feed is enabled for publishing:**

  1. From the navigation menu on the left, select **Tools** > **Merchant Center** > **Feeds**.
  1. Select the feed whose settings you'd like to check.
  1. Select **Update feed**.
  1. In the Update feed pane, make sure the **Enable publishing** checkbox is selected.
  1. Select **Update feed**.

- **To make sure your feed supports the campaign's country/region of sale:**

  1. From the navigation menu on the left, hover over **Campaigns** and select **Settings** > **Settings**.
  1. Select the campaign whose settings you'd like to check.
  1. Move through the campaign settings to find **Country/region of sale**.
  1. From the navigation menu on the left, select **Tools** > **Merchant Center** > **Feeds**.
  1. Make sure the grid's **Location** and **Language** match the **Country/region of sale**. If they don't match, update the feed's settings.

     > [!NOTE]
     > For multi-market feeds, make sure one of the feed's countries matches the **Country/region of sale**.

  > [!NOTE]
  > Newly uploaded or recently updated feeds can take up to ~72 hours to fully ingest and surface as eligible offers. During this processing window, the campaign may temporarily show "Product offers not found" even if the feed upload itself succeeded.

  <a id="product-status"></a>

## Product status

Your products must be approved and active for them to match shopping and Performance Max campaigns.

Review your product feed to make sure products are in stock and aren't manually set to an expiration date in the past.

To troubleshoot product issues, navigate to the **Product issues** tab in the Merchant Center's **Summary**. Select **Download report** to view the rejections. For more information on the different rejections, see [Troubleshoot Microsoft Merchant Center errors](hlp_BA_CONC_BMCErrorMessages.md).

<a id="product-filters"></a>

## Product filters

If there are no issues with your store, feed, or products, there may be an issue with the product filters set at the campaign or product group level.

- **Campaign level**

  1. From the navigation menu on the left, hover over **Campaigns** and select **Settings** > **Settings**.
  1. Under **Products**, select **Filtered products**.
  1. Filter down the products that are eligible to serve. You can select one value per column, and you can select multiple filters.

     > [!NOTE]
     > The filters you set will impact what products can match to product groups.
  1. Select **Apply**.

- **Product group level**

  After you've applied campaign-level filtration, you can add further filtration at the product group level.

  1. From the navigation menu on the left, hover over **Campaigns** and select **Product groups**.
  1. Select **Add filter**.
  1. Add your **Attributes**, **Performance**, and/or **Conversions** filters.
  1. Select **Apply**.
