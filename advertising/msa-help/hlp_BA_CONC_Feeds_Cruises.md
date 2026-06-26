---
title: Use cruise ads to showcase your cruise vacations
ms.service: msa-help
ms.subservice: msa-shopping-merchant-center
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Get details about Cruise ads.
---

# Use Cruise ads to showcase your cruise vacations

> [!NOTE]
> These ads are currently available globally in English. If you'd like to serve them in another language, don't worry—more languages are coming soon!

Showcase eye-catching cruise vacations to inspire bookings. We don’t crawl your website to generate content. Instead, Cruise ads are dynamically generated based on the data you specify in your feed file, which contains your business data, such as the destination and departure ports, cruise length, and any itinerary links. The more details you provide in the feed file, the more information we’ll include in your ads.

## The benefits of using Cruise ads

- **Customized ads.** Submit and schedule your feed, and based on the attributes you provide, we'll create relevant, personalized ads.
- **Improved return on ad spend.** See more volume, increased click-through rates (CTR), and lower cost per click (CPC) rates.
- **Save time with automation.** With no keywords required, the ads are created by feed files that use Microsoft AI automation and are fully equipped for bulk upload.

## Get started

> [!NOTE]
> Cruise ads are not available in Audience campaigns or Shopping campaigns.

To get started with Cruise ads, you'll need to create a Search campaign with a Responsive Search ad that functions as a placeholder. Then, you'll create a [dynamic data feed file](hlp_BA_CONC_FeedsAttributes_Cruises.md) where you'll reference the campaign. We create your Cruise ads by pulling information from your feed file to generate ad copy and we use the Responsive Search ad's settings for targeting and optimization.

> [!NOTE]
> The campaign you create will always be a Cruise ads campaign. You cannot use this campaign for any other purpose now or at a later time—it'll always be used as a Cruise ads campaign.

1. From the navigation menu on the left, select **Create**.
1. Choose **Drive conversions** or **Generate leads** as your campaign goal.
1. Select **Search** as your campaign type.
1. Select **Search ads** below **Which ad type would you like to serve?**
1. Select **Continue**.
1. Follow the steps provided by the campaign creation wizard. Learn more about [the different steps of the Search campaign creation wizard](hlp_BA_PROC_Create1stAd.md).
1. In **Campaign settings**:

   1. Include "EMBD_" in the **Campaign name** (for example, EMBD_Cruises1).
   1. Select **Save & go to the next step**.
1. In **Ad groups**:

   1. Create *at least* one ad group. You can create multiple ad groups with different bids for future performance optimization.
   1. Create *only* one keyword for each ad group. You can choose a placeholder keyword that a customer is unlikely to enter (for example, "EMBD_Cruises_Dest:ALL_Category_ALL")

      You must surround your keyword with brackets ([ ]) to indicate an exact match (for example, [EMBD_Cruises_Dest:ALL_Category_ALL]).

      > [!NOTE]
      > Avoid keywords such as “cruises” to ensure the campaign only serves as Cruise ads.
   1. Select **Save & go to the next step**.
1. In **Ads & ad extensions**, below **Standard ad groups**, select **Create ad**.

   1. From the **Ad type** dropdown menu, select **Responsive Search ad**.
   1. Enter the **Final URL**, which will feature as the Display URL in your Cruise ads.
   1. Enter placeholder values for each field. Since this ad will be dynamically populated by the attributes in your [dynamic data feed file](hlp_BA_CONC_FeedsAttributes_Cruises.md), your placeholder values can simply be “test”.
   1.

      Select **Save** to continue.

      > [!NOTE]
      > If you created more than one ad group, you'll need to create one Responsive Search ad for each. Do not create more than one Responsive Search ad for each ad group.
   1. Select **Save & go to the next step**.
1. In **Budget & bids**, select **Enhanced CPC** from the **Bid strategy** dropdown menu.
1. Select **Save**.
