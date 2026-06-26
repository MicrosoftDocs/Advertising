---
title: Get started with Microsoft Shopping campaigns
ms.service: msa-help
ms.subservice: msa-shopping-merchant-center
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn about what you need to do to get started with Shopping campaigns.
---

# Get started with Microsoft Shopping campaigns

> [!NOTE]
> Learn more about where [Microsoft Shopping campaigns are available](hlp_BA_CONC_Countries.md).

## Background

To fully understand Shopping campaigns, first make sure you understand [Product ads](hlp_BA_CONC_AboutProductAds.md) and [Microsoft Merchant Center](hlp_BA_CONC_AboutBingMerchantCenter.md) catalogs. Products ads are created from products in your catalog and include custom images, pricing, and seller details.

## Get started

If you've never used Microsoft Advertising Product ads or Google Shopping campaigns, you'll need to create a Shopping campaign from scratch. [Here are instructions to get started.](hlp_BA_PROC_CreateProductTargetAndAd.md)

However, if you've already used Product ads, either in Microsoft Advertising or Google Ads, you have two other options for getting started with Microsoft Shopping campaigns:

## Import your Shopping campaign from Google Ads

Import your Google Ads Shopping campaigns just as you would a standard Search campaign. [Here's more information on the import process.](hlp_BA_PROC_ImportCampaign.md)

> [!IMPORTANT]
> Prior to importing, make sure your feed file is compatible with Microsoft Shopping campaigns. Note that not all of Google's feed attributes are supported by Microsoft Advertising. [Here's a list of differences.](hlp_BA_CONC_BMCGoogleAttributes.md)

## Create a new Microsoft Shopping campaign to run in parallel with your existing Product ad campaign

If you already have Product ads set up in Microsoft Advertising, you can create a new Microsoft Shopping campaign that uses your existing catalog feed file. The new Shopping campaign will not replace your existing Product ad campaigns, but will instead be a new campaign that runs alongside the others. Here are the steps you need to follow:

1. First, update your catalog feed as necessary. <br> <br>
   - Consider adding custom labels. For more information on custom labels, see [How is the catalog feed organized](hlp_BA_CONC_AboutBingMerchantCenterCatalogFile.md). If you are using Microsoft Advertising labels and Microsoft Advertising groups for your Product ad campaigns, you will need to switch these to custom labels in your Shopping campaign.
   - Consider using the improved Bing and product categories. [Here's the full list of categories](https://go.microsoft.com/fwlink/?linkid=620783).
1. Next, follow the [steps for creating a Shopping campaign](hlp_BA_PROC_CreateProductTargetAndAd.md). Because you are already using Product ads, you have probably already completed the first three steps and will only need to complete step four. <br>

   Pay particular attention to the following settings in your new campaign:

   - **Campaign priority:** Campaign priority helps when you're advertising the same product with similar targeting settings across multiple Shopping campaigns. The ad from the campaign with the highest priority will take precedence over the same ads from other campaigns, regardless of bids. [See more below](#campaign-priority).
   - **Store ID:** As you set up your Shopping campaign, you will be asked to link your campaign to an existing store. Make sure to link your campaign to the correct store because you will not be able to change the store once you save your campaign. After that, the only way to link to a new store is to delete the campaign and start over.
   - **Product filters:** By default, all products in your Microsoft Merchant Center store will be included in the campaign. Use product filters if you want to include only a subset of your products in the campaign.
1. Once your Shopping campaign is created, your final step is to [create one or more product groups](hlp_BA_CONC_BSC_AboutProductGroups.md).

## Bid strategies for Shopping campaigns

You can choose either [Cost per sale (CPS), Enhanced cost per click (CPC), maximize clicks, Portfolio bid strategy, or Target return on ad spend (ROAS)](hlp_BA_CONC_BidStrategy.md) during the campaign creation process.

<a id="campaign-priority"></a>

## Campaign priority

> [!IMPORTANT]
> Campaign priority is supported on Standard Shopping campaigns at the account level.

When you have the same product is in multiple Shopping campaigns, you can use campaign priority to delegate which campaign should participate in the auction for the product. Your campaigns are automatically set to a **Low** priority, but you can change the setting to **Medium** or **High** to prioritize the bid for products shared across campaigns.

> [!NOTE]
> Performance Max campaigns are automatically set to the highest priority. However, when the Performance Max campaign budget is exhausted, other campaigns with lower priority will participate in the auction.

- **Examples**

  *Example 1*

  You may have a Shopping campaign for winter clothing and one for women's clothing, both of which share sweaters. However, you may have a special budget for the winter clothing campaign, so whenever sweaters are displayed, you'd want the product bid to come from your winter clothing campaign, rather than the women's clothing campaign. You would set the winter clothing campaign to a **High** campaign priority and the women's clothing campaign **Low** priority. However, once the winter clothing campaign runs out of budget, the women's clothing campaign would participate in the auction and bid.

  *Example 2*

  You may have two different Shopping campaigns with some overlapping products and overlapping targets—perhaps one is set to target all locations and the other is set to target the United States (U.S.) only. If you're in the U.S. and your goal is to advertise there first, then you'd have to set the U.S.-only campaign to a **High** campaign priority and the campaign set to target all locations to a lower priority. This way, you use campaign priority as a tie breaker for the overlapping products. In other words, the U.S.-only campaign will bid with all the overlapping products. Then, once its budget is exhausted, the campaign set to all locations would surface, including those overlapping products.

- **Campaign priority's rules to determine bids**

  - **The campaign with the higher priority will bid.** Even if a campaign set to **Medium** priority is set to a larger bid amount, a campaign set to **High** will be used. If two campaigns share a product and one campaign is set to **High** priority while the other is set to **Medium** priority, the bid from the **High** priority will be used (even if the bid from the **Medium** priority is a larger amount).
  - **If the campaign with the higher priority runs out of budget, the next highest priority campaign will place the bid.** For instance, if there's a **High** priority campaign that runs out of budget, then the following, a **Medium** priority campaign, will be used.
  - **When multiple campaigns are set to the same priority, then the highest bid is used.** For instance, if four campaigns are set to **Low** priority, we'll use the campaign with the highest bid.
