---
title: What gets imported from Google Ads for smart campaigns
ms.service: msa-help
ms.subservice: msa-bulk-import
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Most of the information in your Smart campaigns is included when you import from Google Ads. Here's a list of what gets imported and some exceptions.
---

# What gets imported from Google Ads for smart campaigns

If you're already using Google Ads, you can save time by importing your Google Ads campaigns directly into Microsoft Advertising. While some items might not get imported from Google Ads, they may still be supported by Microsoft Advertising. This is why we recommend reviewing your campaigns after import and putting any final touches where necessary.

In this article, you'll find information about: [Items you should check after import](#items-you-should-check-after-import) and [Detailed list of imported and updated items](#detailed-list-of-imported-and-updated-items).

<a id="items-you-should-check-after-import"></a>

## Items you should check after import

Some items require special attention after they're imported, such as the following:

- **Bids and budgets**

  Both Microsoft Advertising and Google Ads offer you the ability to limit your campaign spend on a daily basis. However, Microsoft Advertising has different minimum bid and budget requirements than Google Ads. To help you quickly import all your data, any bids or budgets that are too low will be raised to meet our minimums. These minimums can be found in the table below.

  Minimum bids and budgets

  | Currency | Minimum bid | Minimum daily budget |
  | --- | --- | --- |
  | **Australian Dollar (AUD)** | 0.01 | 0.05 |
  | **Canadian Dollar (CAD)** | 0.05 | 0.05 |
  | **Euro (EUR)** | 0.05 | 0.05 |
  | **Pound Sterling (GBP)** | 0.05 | 0.05 |
  | **U.S. Dollar (USD)** | 0.05 | 0.05 |

  Currency mismatch

  If the currencies you set for your Google Ads and Microsoft Advertising account don't match, we'll automatically convert them.

- **Bid strategies**

  The import process converts whichever bid strategies you have set in Google Ads to maximize clicks. Learn more about the [maximize clicks bid strategy](hlp_BA_CONC_BidStrategy.md).

- **Location targeting**

  When you import your Google Ads campaigns, we take the imported location targets and automatically match them to the same location targets in Microsoft Advertising. However, there may be location targets (such as smaller cities) in Google Ads that we don't support. When this happens, we automatically expand the target so that it can be mapped to a nearby location—state, region, or province—per Google Ads' geographic data. If both the focused and expanded location targets are unsupported by Microsoft Advertising, neither will be imported.

  For example, let's say you have a campaign in Google Ads whose location target is set to an unsupported City A in State B. In this scenario, we'll automatically map it to the supported parent location: State B. If both City A and State B are unsupported by Microsoft Advertising, neither location targets will be imported.

  Review your imported location targets

  You can review all your imported location targets in the **Import Summary**, including which unsupported location targets were mapped to a supported parent location. If you have any import items with issues, you can download a spreadsheet of your import errors. Each unsupported location target that gets mapped to a parent location target will be indicated with a warning in the downloaded spreadsheet. You can then decide to keep the supported location target, update the location target, or delete it all together.

  <a id="detailed-list-of-imported-and-updated-items"></a>

## Detailed list of imported and updated items

Whether this is your first time or you're re-importing an existing campaign, it's important to keep track of all the items that are either transferred, updated, or skipped. To make it easier for you, please refer to the list below to see which items get brought over during your initial import as well as which items Microsoft Advertising updates when you repeat the process.

> [!NOTE]
> > [!NOTE]
> > The list below is not a comprehensive list of imported items. Microsoft Advertising imports all the data needed to manage your campaigns and aims to provide the best experience for you.

### Main imported and updated items for Smart campaigns

Choosing the appropriate import options can determine which items get imported to Microsoft Advertising for the first time, updated from a previous import, or left untouched. Below, you can review both your import goals and the options you must choose to achieve them.

- Ads
- Ad groups
- Bid adjustments
- Campaigns
- Campaign location targets
- Keyword themes

> [!NOTE]
> Import schedule: If you have scheduled imports to run, please note that any updates you make to the campaigns including status, bid, and budget may be overwritten the next time the import is run. You may pause the scheduled import if you don't want your updates to be overwritten by the import process.
