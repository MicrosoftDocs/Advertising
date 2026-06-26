---
title: What are the benefits of Shopping campaigns?
ms.service: msa-help
ms.subservice: msa-shopping-merchant-center
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn more about Shopping campaigns and the benefits of using them.
---

# What are the benefits of Shopping campaigns?

> [!NOTE]
> Learn more about where [Microsoft Shopping campaigns are available](hlp_BA_CONC_Countries.md).

## Background

To fully understand Shopping campaigns, first make sure you understand [Product ads](hlp_BA_CONC_AboutProductAds.md) and [Microsoft Merchant Center](hlp_BA_CONC_AboutBingMerchantCenter.md) catalog feeds. Products ads are created from products in your [catalog feed file](hlp_BA_CONC_BMCWhatIsCatalog.md) and include custom images, [Merchant Promotions](hlp_BA_CONC_BMC_MerchantPromo.md), pricing, and seller details.

## Shopping campaign benefits

Using Shopping campaigns, you can create Product ads that better promote your product over traditional text ads. Product ads use more space on the search results page, include eye-catching images, and have a better chance of enticing customers to visit your website.

As the new place for Product ads, Shopping campaigns offers several advantages over the older product ad campaigns.

- **Enhanced control over your campaign:** Using the *Campaign Priority* setting available in Shopping campaigns, you can give specify that certain campaigns should take precedence over others. Microsoft Advertising will Display ads from these higher priority campaigns instead of ads from other campaigns, regardless of bid. If there are multiple campaigns with different priorities targeting the same product, the campaign priority still holds true—High takes precedence over Medium, which takes precedence over Low. However, if the product gets filtered out by any business rules, like location targeting, minimum bids, etc., the campaign priority is applied to the non-filtered product. For example, let’s say you have a High and Medium campaign targeting the same product, and this product is selected to serve. But after applying location targeting, the product from the High campaign is filtered, which means the non-filtered product from the Medium campaign will serve.
- **Custom labels:** Custom labels are new fields associated with each product that you can use in any way you want. For example, custom labels can be used to identify each product as a best seller, seasonal item, special offer or high-margin item. Custom labels can be particularly useful when creating product groups described below.
- **Product groups:** Product groups replace product targets and offer a highly flexible way to organize your products based on a variety of characteristics. For example, you can create product groups based on brand, condition, or custom labels. Each ad group within a Shopping campaign will be associated with a single product group. This allows you to create highly relevant ads for the items within that ad group. [This article](hlp_BA_CONC_BSC_AboutProductGroups.md) provides additional information about product groups.
- **Show your products in multiple countries:** At the campaign level, you can create multiple Shopping campaigns, one per country you wish to target. Your campaign's **Country/region of sale** must match your feed's **Country of sale**. Another option is to create a single Shopping campaign to target multiple countries. By default, a Shopping campaign will target all of your product feeds, regardless of their target location. You can also specify a **Feed label** for your campaign that matches the feed label on your product feeds. This feed label can be used across multiple feeds, regardless of their target region. Learn more at [Creating and organizing Microsoft Shopping campaigns feed files](hlp_BA_CONC_BMCWhatIsCatalog.md). If you wish to target multiple countries within a single Shopping campaign, then as you work with the campaign wizard, under **Location** you either have to indicate **All available countries/regions** or pinpoint specific countries with the **Let me choose specific locations** option.

When you're ready to start, [this article](hlp_BA_PROC_CreateProductTargetAndAd.md) explains how to begin using Shopping campaigns.
