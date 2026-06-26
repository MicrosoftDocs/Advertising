---
title: Free shipping settings
ms.service: msa-help
ms.subservice: msa-shopping-merchant-center
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Display free shipping and other shipping settings in your Microsoft Merchant Center stores.
---

# Free shipping settings

> [!NOTE]
> Not everyone has this feature yet. If you don't, don't worry—it's coming soon!

In Microsoft Merchant Center, you can set up shipping settings for an entire store as well as individual products.

The process is straightforward: All you need to do is to specify the minimum purchase required if you offer free shipping for your store. And with shipping labels, you can specify shipping settings for individual products in your Microsoft Merchant Center feeds.

When you set up shipping settings, keep in mind that there is a hierarchy that determines which shipping setting to display:

- The shipping settings in your feed supersede the shipping settings entered in Microsoft Merchant Center's shipping section.
- Shipping labels supersede the store-level free shipping setting (for example, you offer free shipping on eligible items, but oversized items are shipped for an extra fee).
- If there are no shipping settings dictated in a feed or in a shipping label, the store-level free shipping applies to the product so long as the minimum purchase price is met.

## FAQ

- **Quick edit mode**

  If you want to copy shipping settings from an existing store with shipping settings, you can do so in the Quick edit mode. This shortcut allows you to copy settings from one store, and then modify them as needed for other stores.

  To copy shipping settings from one store to another:

  1. From the navigation menu on the left, select **Tools** > **Merchant Center**.
  1. Select the Bing Merchant Center super store you want to edit.
  1. Select **Settings** and then select **Shipping**.
  1. Under **Quick edit**, select the checkbox.
  1. From the **Store name** list, select a store you want to copy from that contains shipping settings.

     > [!NOTE]
     > We'll warn you if you have no other stores to copy from or if you select a store that has no shipping settings.
  1. You'll see the **Free shipping** and **Add shipping labels** sections fill with shipping settings. You can edit both sections as needed to fit the shipping settings for your current store.
  1. Select **Save**.

- **To enable or disable free shipping**

  The Free shipping section applies to all items in the store, unless it's a product that has a shipping label (to cover special shipping rates for expedited delivery, fragile, or oversized items). See the following Add a shipping label section for more information.

  If you have a minimum purchase requirement to unlock free shipping, you'll specify it here once you enable free shipping.

  To enable free shipping

  1. From the navigation menu on the left, select **Tools** > **Merchant Center**.
  1. Select the Microsoft Merchant Center store you want to edit.
  1. Select **Settings** and then select **Shipping**.
  1. Slide the **Free shipping** switch to the right.
  1. When enabled, you'll see the **Minimum purchase** box. Enter the purchase amount that unlocks free shipping.
  1. Select **Save**.

  To disable free shipping:

  1. From the navigation menu on the left, select **Tools** > **Merchant Center**.
  1. Select the Microsoft Merchant Center store you want to edit.
  1. Select **Settings** and then select **Shipping**.
  1. Slide the **Free shipping** switch to the left.
  1. Select **Save**.

- **Add or edit shipping labels**

  Shipping labels allow you to further customize the shipping settings for the products in your Microsoft Merchant Center feed.

  Let's say that you offer free shipping on eligible items with 25 USD minimum purchase. However, you charge a premium for shipping to Alaska or Hawaii, shipping fragile or oversized items, and shipping overnight. A shipping label allows you to customize settings for different types of shipping.

  What you need:

  - Add the shipping attribute and related details for each product in your Microsoft Merchant Center feed.
  - Add a shipping label that matches the shipping name detailed in your Microsoft Merchant Center feed. For example, if you add a shipping attribute called Expedited for a product in your feed, you need to add a corresponding shipping label called Expedited. That one-to-one match helps display the correct shipping rates.
  - Any minimum purchase amounts required to qualify for the stated shipping rate. For example, you may offer discounted overnight shipping for orders above 200 USD.

  To add a new shipping label:

  1. From the navigation menu on the left, select **Tools** > **Merchant Center**.
  1. Select the Microsoft Merchant Center store you want to edit.
  1. Select **Settings** and then select **Shipping**.
  1. Slide the **Add shipping labels** switch to the right.
  1. Select **Create new label**.
  1. You'll be prompted in a window to add a **Shipping label**, the **Shipping rate**, and the **Minimum purchase amount** required in order to qualify for the stated shipping rate. Enter a name and the amounts. <br>Note: Be sure to match the Shipping label name to the shipping attribute in your Microsoft Merchant Center feed.
  1. Select **Create**.

  To edit an existing shipping label:

  1. From the navigation menu on the left, select **Tools** > **Merchant Center**.
  1. Select the Microsoft Merchant Center store you want to edit.
  1. Select **Settings** and then select **Shipping**.
  1. Go to the table in the **Add shipping labels** section, find the label you want to edit, and select on the pencil icon under **Actions**.
  1. You'll see in a window the existing information for the shipping label.
  1. Make necessary edits and select **Update**.
