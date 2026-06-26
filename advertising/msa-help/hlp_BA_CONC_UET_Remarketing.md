---
title: Remarketing lists based on UET parameters
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Remarketing lists based on UET parameters allow you to define your remarketing lists in a more tailored way.
---

# Remarketing lists based on UET parameters

> [!NOTE]
> Not everyone has this feature yet. If you don't, don't worry—it's coming soon!

Remarketing lists based on UET parameters allow you to define your remarketing lists in a more tailored way. With the information you collect from your UET tag parameters, you can re-engage the customers who are more likely to convert.

There are five custom parameters available to use with your remarketing lists:

| Parameter name | Definition |
| --- | --- |
| **Ecomm product ID** | A list of product IDs that the user has viewed. Multiple product IDs are supported when the page has more than one product. The product IDs must match either the ID or item_group_id attribute in the MMC feed. Note: Ecomm product ID is a comma-separated list. |
| **Ecomm page type** | One of the following page types: <br> - Cart<br>- Category<br>- Home<br>- Other<br>- Product<br>- Purchase<br>- Search Results. <br>Cart refers to the shopping cart page and purchase refers to the confirmation page. |
| **Event action** | The name of the event, defined by you. For example, the event action will be “purchase” for an event that captured a transaction. |
| **Ecomm category** | The category ID for the category browse page. |
| **Ecomm total value** | The total value of all the items in a transaction. |

> [!NOTE]
> - A Universal Event Tracking (UET) tag is required to use any remarketing list. [Learn more about setting up a UET tag](hlp_BA_CONC_UET_Setup_Master_2.md).
> - You need to customize your UET tag with the five additional UET parameters to define your remarketing lists. For the greatest flexibility, we recommend adding all five parameters.

## Create remarketing lists based on UET parameters

1. From the navigation menu on the left, hover over **Campaigns** and select **Audiences**.
1. Select **Create association**.
1. Enter a remarketing list name.

   > [!NOTE]
   > you cannot use the same name for two different remarketing lists.
1. For **Type**, select **Remarketing list**.
1. Select the UET parameter you would like to use from the URL dropdown menu.
1. Select the qualifier contains, equals, greater than, or less than to define the rule.
1. Enter a value.
1. Select **Save**.

> [!NOTE]
> To learn more about creating remarketing lists, see [Remarketing: Target people who have visited your site before](hlp_BA_CONC_Audiences_Remarketing.md).

## Create associations for targeting

1. From the navigation menu on the left, hover over **Campaigns** and select **Audiences**.
1. Select **Create association**.
1. Select the ad group or campaign you want to associate with one or more audiences.
1. Under **Ad group targeting** or **Campaign targeting**, select the **Remarketing lists**.
1. Under **Remarketing lists**, select the auto-generated list that you would like to associate to your ad group or campaign.
1. Select your **Targeting setting**:

   - **Bid only**: Ads in this ad group or campaign can show to everyone but the bid adjustment will apply to people included in the audience.
   - **Target and bid**: This setting limits your ads to people in your selected audiences. You may choose to make bid adjustments for those audiences.
1. Adjust the **Default bid adjustment**. By default, new targeting associations are set to 15%, however, the bid adjustment can range from -90% to +900%.
1. Select **Save**.

> [!NOTE]
> To learn more about creating associations for targeting, see [Custom audiences: Create richer user segments with your own data](hlp_BA_CONC_Audiences_CustomAudience.md).
