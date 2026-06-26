---
title: Smart campaigns - Track what customers do after they click your ad
ms.service: msa-help
ms.subservice: msa-ads-extensions
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: We can tell you what pages potential customers visit on your website, how long they spend there, and more!
---

# Smart campaigns - Track what customers do after they click your ad

> [!NOTE]
> Not everyone has this feature yet. If you don't, don't worry—it's coming soon!

> [!NOTE]
> For customer action tracking to work, you (or a web developer) will need to add a tracking tag to each page of your website's code.

Once your Smart campaign is up and running, your click data shows how many potential customers visit your website. By showing you what customers do when they get to your website, customer action tracking gives you a clearer picture of your return on investment (ROI) with (ROI) with Microsoft Advertising.

Customer action tracking can show you precisely:

- How many people visit your website.
- How long they spend there.
- If they visit the pages that are most important to your business.

The last point is critical, because your website is designed around your business goals. When you send potential customers to a specific landing page, you're hoping they take specific actions that are valuable to your business. Is your goal to sell products, to raise brand awareness, to generate leads, to drive foot traffic to your physical location, or something else? Customer action tracking helps you make sure that your advertising budget is driving effective results.

## Set up customer action tracking

1. **Get started**:

   1. From the navigation menu on the left, hover over **Campaigns** and select **Campaigns** > **Campaign details** for the campaign you want to edit.
   1. In the **Customer action tracking** pane, select the **Start tracking** button from the lower-left part of the pane.
   1. On the **Manage Goals** page, select **Add new goal**.
1. **Select what type of conversion you want to track**: [Learn more about conversion goal categories](hlp_BA_CONC_UET_GoalCategory.md).

   1. Select **Sales**, **Leads**, or **Others**.
   1. Choose a specific interaction/event you want to use for tracking that conversion type.
   1. Select **Next**.
1. **Select how you would like to track**: [Learn more about conversion goal types](hlp_BA_CONC_UETv2CTGoalType.md).

   1. Select **By destination URL** or **By custom event**.
   1. Select **Next**.
1. **Set up your conversion goal**:

   1. Enter a name for your goal and set the custom event parameters.
   1. Select **Next**.
1. **Measure the value for each conversion**:

   1. Select **Each conversion action has the same value** or **Conversion action value may vary** and enter the value of the conversion.

      > [!NOTE]
      > If you select **Conversion action value may vary**, the revenue value will change based on the customization you make to the UET tag tracking code. [Learn more about reporting variable revenue with UET](hlp_BA_CONC_UETv2RevenueVariables.md).

      > [!IMPORTANT]
      > If you select **No value**, you do not have the option to enter a conversion value. We don't recommend this.
   1. Select **Next**.
1. **Edit your website**: For customer action tracking to work, someone will need to add a tracking tag to each page of your website's code. You have three options here:

   1. If you built your website using WordPress.com, Wix, Shopify, or BigCommerce (and want to use it to edit your website's code), select **Let me add the tracking tag through a website editing platform** and then select **Next**.
   1. If you're comfortable making updates directly to your website's code, select **Let me edit my website's code myself** and then select **Next**.
   1. If someone else usually updates your website's code for you, select **Let me send the tracking tag to someone else** and then select **Next**. In the next step, enter the appropriate email address or addresses, select **Send**, and then **Next**.

## Monitor customer action tracking

After setup, the **Customer action tracking** pane on your Smart campaign's home page will show you how many visits your ad is driving to your website and special pages.

Select the ![ellipsis icon](media/BA_ScreenCap_DeliveryDetails.png) to:

- **View tracking tag** if you need to copy the tracking tag again.
- **Test my tag** to make sure we're receiving data from your tracking tag.
- **Manage special pages** to add more pages or pause tracking for certain pages.
