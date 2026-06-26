---
title: Use Job Listing ads to connect your customers to the right job offerings
ms.service: msa-help
ms.subservice: msa-shopping-merchant-center
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Showcase your job offerings to the right job seekers on the Bing Jobs page.
---

# Use Job Listing ads to connect your customers to the right job offerings

> [!NOTE]
> Not everyone has Job Listing ads yet. If you don't, don't worry—it's coming soon!

Showcase your job offerings to the right job seekers on the Bing Jobs page. We don’t crawl your website to generate content. Instead, Job Listing ads are dynamically generated based on the data you specify in your feed file, which contains business data such as employment type, hiring organization, and other relevant details. The more details you provide in the feed file, the more information we’ll include in your ads.

> [!NOTE]
> You only pay for the second click, when your customer applies for the job. You don't pay when they click to view the ad.

## The benefits of using Job Listing ads

- **Customized ads.** Submit and schedule your feed, and based on the attributes you provide, we'll create relevant, personalized ads.
- **Improved return on ad spend.** See more volume, increased click-through rates (CTR), and lower cost per click (CPC) rates.
- **Save time with automation.** With no keywords required, the ads are created by feed files that use Microsoft AI automation and are fully equipped for bulk upload.

## Get started

> [!NOTE]
> Job Listing ads are not available in audience or Shopping campaigns.

To get started with Job Listing ads, you'll need to create a Search campaign with a Responsive Search ad that functions as a placeholder. Then, you'll create a [dynamic data feed file](hlp_BA_CONC_FeedsAttributes_JobListing.md) where you'll reference the campaign. We create your Job Listing ads by pulling information from your feed file to generate ad copy and we use the ad's settings for targeting and optimization.

> [!NOTE]
> The campaign you create will always be a Job Listing ads campaign. You cannot use this campaign for any other purpose now or at a later time—it'll always be used as a Job Listing ads campaign.

1. From the navigation menu on the left, select **Create**.
1. Choose **Drive conversions** or **Generate leads** as your campaign goal.
1. Select **Search** as your campaign type.
1. Select **Search ads** below **Which ad type would you like to serve?**
1. Select **Continue**.
1. Follow the steps provided by the campaign creation wizard. Learn more about [the different steps of the Search campaign creation wizard](hlp_BA_PROC_Create1stAd.md).
1. In **Campaign settings**:

   1. Include your ad type name in the **Campaign name** (for example, JobListingAds_Campaign1).
   1.

      Select the checkbox next to **Disclaimer** if you want to add a disclaimer. [Disclaimer in ads](hlp_BA_CONC_Feeds_DisclaimerInAds.md) is optional for Job Listing ads.

      Only **Popup layout** is available for Job Listing ads.
   1.

      Provide the **Disclaimer name**, **Disclaimer title**, **Disclaimer information**, **Final URL**, and, if applicable, **Mobile URL**. The more information you provide, the better we can improve your ad experience.
   1. Select **Save & go to the next step**.
1. In **Ad groups**:

   1. Create *at least* one ad group. You can create multiple ad groups with different bids for future performance optimization.
   1. Create *only* one keyword for each ad group. The keyword you input must be: [e3f21e4f-e0cf-46e5-a9c3-811353b68e1c] ([] denotes exact match).
   1. Select **Save & go to the next step**.
1. In **Ads & ad extensions**, below **Standard ad groups**, select **Create ad**.

   1. From the **Ad type** dropdown menu, select **Responsive Search ad**.
   1. Enter the **Final URL**.
   1. Enter placeholder values for each field. Since this ad will be dynamically populated by the attributes in your [dynamic data feed file](hlp_BA_CONC_FeedsAttributes_JobListing.md), your placeholder values can simply be “test”.
   1. Select **Save** to continue.

      > [!NOTE]
      > If you created more than one ad group, you'll need to create one Responsive Search ad for each. Do not create more than one Responsive Search ad for each ad group.
   1. Select **Save & go to the next step**.
1. In **Budget & bids**, select **Enhanced CPC** from the **Bid strategy** dropdown menu.
1. Select **Save**.

> [!NOTE]
> The disclaimer you create will always be present in your ad, but it may evolve based on more data you provide as Microsoft Advertising enhances this feature. See [Disclaimer in ads](hlp_BA_CONC_feeds_DisclaimerInAds.md) for more information.
