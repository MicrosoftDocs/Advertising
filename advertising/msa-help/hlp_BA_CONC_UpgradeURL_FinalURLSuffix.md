---
title: Using a final URL suffix
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn about the final URL suffix and how to set one up.
---

# Using a final URL suffix

A final URL suffix is a set of [tracking parameters](hlp_BA_CONC_UpgradeURL_URLParameters.md) to be added to the end of your landing page URL. Having these parameters in a final URL suffix means that these parameters are always sent to the landing page.

## What parameters can I use in a final URL suffix?

Each suffix can contain one of the following types of values: a static URL parameter, a value that references a Microsoft Advertising URL parameter, or any parameter listed in [What tracking or URL parameters can I use?](hlp_BA_CONC_UpgradeURL_URLParameters.md)

Keep in mind:

- Suffix values can't begin with ?, &, or # (though & can be used to separate parameters).
- Suffix values can't contain {lpurl}, {ignore}, {escapeurl}, or other variations of a final URL placeholder. For more information, see [What tracking or URL parameters can I use?](hlp_BA_CONC_UpgradeURL_URLParameters.md)
- A final URL suffix needs to appear after the final URL but before any # (URL fragment symbol).

## How do I set a final URL suffix?

- **Set a final URL suffix at the account level**

  1. From the navigation menu on the left, hover over **Campaigns** and select **Settings** > **Account level options**.
  1. For **Final URL suffix**, enter your parameter or parameters.
  1. Select **Save**.

- **Set a final URL suffix at the campaign level**

  1. From the navigation menu on the left, select **Campaigns**.
  1. Select the appropriate campaign.
  1. Select **Settings**.
  1. Under **Campaign URL options**, select **Final URL suffix** and enter your parameter or parameters.
  1. Select **Save**.

- **Set a final URL suffix at the ad group, keyword level, or dynamic ad target level**

  1. From the navigation menu on the left, hover over **Campaigns**, and then select either **Ad groups**, **Keywords**, or **Dynamic ad targets**.
  1. Make sure that the **Final URL suffix** column is visible. If it isn't:

     1. Select **Columns** > **Modify columns**.
     1. Select **Attributes**.
     1. Next to **Final URL suffix**, select **Add**.
     1. Select **Apply**.
  1. For the appropriate ad group, keyword, or target, hover over the **Final URL suffix** column and select the pencil icon.
  1. Enter your parameter or parameters.
  1. Select **Save**.

- **Set a final URL suffix at the ad level**

  1. From the navigation menu on the left, hover over **Campaigns** and select **Ads & extensions** > **Ads**.
  1. Hover over the appropriate ad and click the pencil icon when it appears.
  1. Select **Ad URL options**.
  1. Enter your parameter or parameters in the **Final URL suffix** box.
  1. Select **Save**.

- **Set a final URL suffix at the ad level**

  1. From the navigation menu on the left, hover over **Campaigns** and select **Ads & extensions** > **Extensions**.
  1. Select an ad extension.
  1. Select **Edit** > **Edit an extension**.
  1. Select **Sitelink Extension URL options**.
  1. Enter your parameter or parameters in the **Final URL suffix** box.
  1. Select **Save**.

- **Set a final URL suffix at the product group level (Product ads only)**

  1. From the navigation menu on the left, hover over **Campaigns** and select **Product groups**.
  1. Select the name of the appropriate ad group.
  1. Make sure that the **Final URL suffix** column is visible. If it isn't:

     1. Select **Columns** > **Modify columns**.
     1. Select **Attributes**.
     1. Next to **Final URL suffix**, select **Add**.
     1. Select **Apply**.
  1. For the appropriate product group, hover over the **Final URL suffix** column and select the pencil icon.
  1. Enter your parameter or parameters.
  1. Select **Save**.

> [!NOTE]
> You can set a final URL suffix at any level, but if you've set different ones at multiple levels, we'll default to the lowest level available. We don't combine values from different levels.
