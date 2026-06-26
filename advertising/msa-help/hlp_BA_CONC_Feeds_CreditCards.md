---
title: Use credit Card ads to showcase your products and promotions
ms.service: msa-help
ms.subservice: msa-shopping-merchant-center
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Get details about Credit Card ads.
---

# Use credit Card ads to showcase your products and promotions

> [!IMPORTANT]
> - **After February 1, 2023, you will no longer be able to create new or edit existing expanded text ads.**
> - Existing expanded text ads will continue to serve, and you'll still be able to pause, enable, and remove your expanded text ads.
> - **This change won't affect the credit Card ads you previously created**, because your expanded text ads are placeholders we use to dynamically generate your ads. Please create Responsive Search ads for credit Card ads from now on.
> - For more information about this change, see [About Responsive Search ads](hlp_BA_CONC_ResponsiveSearchAds.md).

> [!NOTE]
> - These ads are currently available globally in English. If you'd like to serve them in another language, don't worry—more languages are coming soon!
> - While credit Card ads are globally available, please see the [market-level restrictions](https://go.microsoft.com/fwlink/?linkid=2213800).

Showcase your credit card products and promotions, such as rewards and cash back percent. We don’t crawl your website to generate content. Instead, Credit Card ads are dynamically generated based on the data you specify in your feed file, which contains your business data, such as the card issuer, annual fee, and any sign-up bonus. The more details you provide in the feed file, the more information we’ll include in your ads.

## The benefits of using Credit Card ads

- **Customized ads.** Submit and schedule your feed, and based on the attributes you provide, we'll create relevant, personalized ads.
- **Improved return on ad spend.** See more volume, increased click-through rates (CTR), and lower cost per click (CPC) rates.
- **Save time with automation.** With no keywords required, the ads are created by feed files that use Microsoft AI automation and are fully equipped for bulk upload.

## Get started

> [!NOTE]
> Credit Card ads are not available in Audience campaigns or Shopping campaigns.

To get started with Credit Card ads, you'll need to create a Search campaign with a Responsive Search ad that functions as a placeholder. Then, you'll create a [dynamic data feed file](hlp_BA_CONC_FeedsAttributes_CreditCards.md) where you'll reference the campaign. We create your Credit Card ads by pulling information from your feed file to generate ad copy and we use the Responsive Search ad's settings for targeting and optimization.

> [!NOTE]
> The campaign you create will always be a Credit Card ads campaign. You cannot use this campaign for any other purpose now or at a later time—it'll always be used as a Credit Card ads campaign.

1. From the navigation menu on the left, select **Create**.
1. Choose **Drive conversions** or **Generate leads** as your campaign goal.
1. Select **Search** as your campaign type.
1. Select **Search ads** below **Which ad type would you like to serve?**
1. Select **Continue**.
1. Follow the steps provided by the campaign creation wizard. Learn more about [the different steps of the Search campaign creation wizard](hlp_BA_PROC_Create1stAd.md).
1. In **Campaign settings**:

   1. Include "CreditCardAds" in the **Campaign name** (for example, CreditCardAds_Campaign1).
   1.

      Select the checkbox next to **Disclaimer** if you want to add a disclaimer. [Disclaimer in ads](hlp_BA_CONC_Feeds_DisclaimerInAds.md) is optional for Credit Card ads.

      Only **Popup layout** is available for Credit Card ads.
   1.

      Provide the **Disclaimer name**, **Disclaimer title**, **Disclaimer information**, **Final URL**, and, if applicable, **Mobile URL**. The more information you provide, the better we can improve your ad experience.
   1. Select **Save & go to the next step**.
1. In **Ad groups**:

   1. Create *at least* one ad group. You can create multiple ad groups with different bids for future performance optimization.
   1. Create *only* one keyword for each ad group. You must choose an obscure placeholder keyword that a customer is unlikely to enter. We recommend using a combination of letters, numbers, and special characters to ensure obscurity.

      You must surround your keyword with brackets ([ ]) to indicate an exact match.

      > [!NOTE]
      > Avoid keywords such as “credit cards” to ensure the campaign only serves as Credit Card ads.
   1. Select **Save & go to the next step**.
1. In **Ads & ad extensions**, below **Standard ad groups**, select **Create ad**.

   1. From the **Ad type** dropdown menu, select **Responsive Search ad**.
   1. Enter the **Final URL**, which will feature as the Display URL in your Credit Card ads. You can leave out other details, since this ad will be dynamically populated by the attributes in your [dynamic data feed file](hlp_BA_CONC_FeedsAttributes_CreditCards.md).
   1. Select **Save** to continue.

      > [!NOTE]
      > If you created more than one ad group, you'll need to create one Responsive Search ad for each. Do not create more than one Responsive Search ad for each ad group.
   1. Select **Save & go to the next step**.
1. In **Budget & bids**, select **Enhanced CPC** from the **Bid strategy** dropdown menu.
1. Select **Save**.

> [!NOTE]
> The disclaimer you create will always be present in your ad, but it may evolve based on more data you provide as Microsoft Advertising enhances this feature. See [Disclaimer in ads](hlp_BA_CONC_Feeds_DisclaimerInAds.md) for more information.
