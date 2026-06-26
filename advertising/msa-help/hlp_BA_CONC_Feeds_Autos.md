---
title: Use aautomotive ads to showcase your models and inventory
ms.service: msa-help
ms.subservice: msa-shopping-merchant-center
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Showcase real-time inventory of new and used cars to nearby shoppers who are in the comparison and transcation stages.
---

# Use automotive ads to showcase your models and inventory

> [!IMPORTANT]
> - **Upgrade your expanded text ads to Responsive Search ads by February 1, 2023.** After this date, you will no longer be able to create new or edit existing expanded text ads.
> - Existing expanded text ads will continue to serve, and you'll still be able to pause, enable, and remove your expanded text ads.
> - **This change won't affect the automotive ads you previously created**, because your expanded text ads are placeholders we use to dynamically generate your ads. Please create Responsive Search ads for automotive ads from now on.
> - For more information about this change, see [About Responsive Search ads](hlp_BA_CONC_ResponsiveSearchAds.md).

> [!NOTE]
> These ads are currently available globally in English. If you'd like to serve them in another language, don't worry—more languages are coming soon!

Showcase real-time inventory of new and used cars to nearby shoppers who are in the comparison and transaction stages. We don’t crawl your website to generate content. Instead, automotive ads are dynamically generated based on the data you specify in your feed file, which contains business data such as vehicle photos, special prices, and other relevant details. From third-party sites and auto dealers displaying their new and used inventory to automotive manufacturers advertising their new models, automotive ads drive performance. The more details you provide in the feed file, the more information we’ll include in your ads.

:::image type="content" source="media/hlp_BA_CONC_AutomotiveAds.png" alt-text="Automotive inventory ad examples.":::

## The benefits of using Automotive ads

- **Customized ads.** Submit and schedule your feed, and based on the attributes you provide, we'll create relevant, personalized ads.
- **Improved return on ad spend.** See more volume, increased click-through rates (CTR), and lower cost per click (CPC) rates.
- **Save time with automation.** With no keywords required, the ads are created by feed files that use Microsoft AI automation and are fully equipped for bulk upload.

## Get started

> [!NOTE]
> Automotive ads are not available in Shopping campaigns.

To get started with Automotive inventory ads, you'll need to create a Search campaign with a Responsive Search ad that functions as a placeholder. Then, you'll create a [dynamic data feed file](hlp_BA_CONC_FeedsAttributes_Autos.md) where you'll reference the campaign. We create your Automotive ads by pulling information from your feed file to generate ad copy and we use the ad's settings for targeting and optimization.

> [!NOTE]
> The campaign you create will always be an Automotive ads campaign. You cannot use this campaign for any other purpose now or at a later time—it'll always be used as an Automotive ads campaign.

1. From the navigation menu on the left, select **Create**.
1. Choose **Drive conversions** or **Generate leads** as your campaign goal.
1. Select **Search** as your campaign type.
1. Select **Search ads** below **Which ad type would you like to serve?**
1. Select **Continue**.
1. Follow the steps provided by the campaign creation wizard. Learn more about [the different steps of the Search campaign creation wizard](hlp_BA_PROC_Create1stAd.md).
1. In **Campaign settings**:

   1. Include your ad type name in the **Campaign name** (for example, AutomotiveInventoryAds_Campaign1).
   1.

      Select the checkbox next to **Disclaimer** if you want to add a disclaimer. [Disclaimer in ads](hlp_BA_CONC_Feeds_DisclaimerInAds.md) is optional for Automotive ads.

      Only **Popup layout** is available for Automotive ads.
   1.

      Provide the **Disclaimer name**, **Disclaimer title**, **Disclaimer information**, **Final URL**, and, if applicable, **Mobile URL**. The more information you provide, the better we can improve your ad experience.
   1. Select **Save & go to the next step**.
1. In **Ad groups**:

   1. Create *at least* one ad group. You can create multiple ad groups with different bids for future performance optimization.
   1. Create *only* one keyword for each ad group. The keyword you input must be: [e3f21e4f-e0cf-46e5-a9c3-811353b68e1c] ([] denotes exact match).
   1. Select **Save & go to the next step**.
1. In **Ads & ad extensions**, below **Standard ad groups**, select **Create ad**.

   1. From the **Ad type** dropdown menu, select **Responsive Search ad**.
   1. Enter the **Final URL**, which will feature as the Display URL in your Automotive ads.
   1. Enter placeholder values for each field. Since this ad will be dynamically populated by the attributes in your [dynamic data feed file](hlp_BA_CONC_FeedsAttributes_Autos.md), your placeholder values can simply be “test”.
   1. Select **Save** to continue.

      > [!NOTE]
      > If you created more than one ad group, you'll need to create one Responsive Search ad for each. Do not create more than one Responsive Search ad for each ad group.
   1. Select **Save & go to the next step**.
1. In **Budget & bids**, select **Enhanced CPC** from the **Bid strategy** dropdown menu.
1. Select **Save**.

> [!NOTE]
> The disclaimer you create will always be present in your ad, but it may evolve based on more data you provide as Microsoft Advertising enhances this feature. See [Disclaimer in ads](hlp_BA_CONC_feeds_DisclaimerInAds.md) for more information.

Your Automotive ads will automatically serve in both Audience and Search placements.

> [!NOTE]
> You can leverage your Automotive ads feed for [dynamic remarketing](hlp_BA_CONC_Audiences_ProductAudience.md) by setting up an Audience campaign, where you associate the same feed.
