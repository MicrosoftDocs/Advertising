---
title: What gets imported from Meta ads
ms.service: msa-help
ms.subservice: msa-bulk-import
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Most of the information in your campaigns is included when you import it from Meta Ads. Here's a list of what gets imported, as well as some exceptions.
---

# What gets imported from Meta Ads

> [!NOTE]
> - During the Import process, you'll be asked to confirm if the declaration you made to Meta Ads is accurate regarding whether any of your campaigns are intended for political advertising. Please note that campaigns marked as political will be skipped during import. [Learn more](hlp_BA_CONC_Policy_RestrictedPolitical.md)
> - If you import a Video ad from Meta Ads containing multiple videos, we'll only import the first one.
> - > [!NOTE]
>   > The list below is not a comprehensive list of imported items. Microsoft Advertising imports all the data needed to manage your campaigns and aims to provide the best experience for you.

After you've imported your campaigns from Meta Ads, you can check the status of your import, review error logs, and edit, pause, or delete your import schedule. To learn more, see [Edit your scheduled imports and review import history and results](hlp_BA_CONC_ImportScheduleHistory.md).

When scheduled imports are enabled, campaign statuses may be changed based on your import settings. If **Updates to existing items** is turned on, a scheduled import can update a campaign status to match that in Meta Ads. For example, a campaign paused in Microsoft Advertising may be re-enabled if the corresponding Meta Ads campaign is active when the import runs (and vice versa).

Not all information will be imported from Meta Ads, but that doesn't mean it's not supported within Microsoft Advertising. You should also make sure the campaigns were imported as expected, and then make updates as necessary. Some specific situations require special attention during import. Before proceeding to [Import campaigns directly from Meta Ads](hlp_BA_PROC_Import_FB_Campaign.md), make sure to review the details below.

## Campaigns

> [!NOTE]
> While Meta Ads import is available globally, we'll only import Audience campaigns where they're available. [Learn more](hlp_BA_PROC_CreateAudienceCampaign.md)

Meta Ads campaigns will be imported to Microsoft Advertising as Audience campaigns.

We'll import Active, Paused, Deleted, and Archived Meta Ads campaigns. If the Meta Ads campaign status is Archived, we'll pause the imported campaign.

- **Campaign name**

  Each Microsoft Advertising campaign can contain up to 128 characters, while Meta Ads campaign names can be longer.

  If the campaign name is longer than 128 characters, we'll truncate the name and follow the following naming pattern. Each Meta Ads campaign name will be imported as “{Meta Ads campaign name} + delimiter (hyphen) + FB + {Meta Ads campaign ID}”.

  For example, if the original campaign name is “Subscribe and Save. Buy X, Get Y at 20% discount” and the campaign ID is 2345678910, then Microsoft Advertising would import the campaign name as “Subscribe and Save. Buy X, Get Y - FB2345678910”.

- **Updated and/or 'Missing' data in existing campaigns**

  When importing from Meta Ads, Microsoft Advertising may overwrite existing campaign data—this includes bids, budgets, and settings. If a campaign was previously imported, it may be:

  - Overwritten with new data
  - Paused or removed
  - Renamed or missing from its original status

  To ensure your campaigns remain intact and perform as expected:

  - *Check import settings:* After import, review the summary to see if any campaigns were overwritten or paused.
  - *Search across all statuses:* Look for the campaign under active, paused, and deleted to confirm whether it still exists.
  - *Manage scheduled imports:* If you use scheduled imports, consider editing or pausing them to prevent unintended changes to campaign status, budget, or bids.
  - *Use selective importing:* For future imports, choose the option **Items not previously imported** to avoid overwriting existing campaigns.

## Ad group name

Meta Ads ad-sets are imported as Microsoft Advertising ad groups.

After import, the Microsoft Advertising ad group name will use the same pattern of delimiters as the imported campaign name. Each Meta Ads ad-set name will be imported as “{Meta Ads ad-set name} + delimiter (hyphen) + FB + {Meta Ads ad-set ID}”.

For example, if the original ad-set name is “Subscribe and Save. Buy X, Get Y at 20% discount” and ad-set ID is 2345678910, then the imported ad-set name would be saved in Microsoft Advertising as “Subscribe and Save. Buy X, Get Y - FB2345678910”.

## Ads

Single Image ads and Video ads listed under Video Views objectives will be imported from Meta Ads to Microsoft Advertising as Audience ads.

We'll import the first card of your Meta Ads Carousel ads as a Native ad.

Ads that won't be imported from Meta Ads are:

- Ads with logo images
- Ads without website URLs
- Meta Ads ad names

## Budgets

Meta Ads supports campaign and ad-set (ad group) level budgets, but Microsoft Advertising doesn't support ad group level budgets.

If available, daily budgets will transfer as is at the campaign level.

If your Meta Ads lifetime budget uses start and stop dates, we'll calculate the daily budget with a proration to the number of days. Campaigns won't be imported if the budget remaining is zero.

Campaigns with shared budgets won't be imported.

> [!NOTE]
> Due to calculations Meta Ads makes in their platform, we recommend that you review budgets for newly imported campaigns and select the **Customize budgets for Microsoft Advertising** option if necessary.

## Schedule

If the Meta Ads campaigns have a start time and end time, Microsoft Advertising will import them. If the end time is in the past, the campaigns will be imported as paused. If the start time is in the past, the start date will be set to the import date.

## Bids and bid strategy

> [!NOTE]
> Starting April 30, 2024, you'll no longer have the option to select the manual CPC (cost per click) bid strategy for newly created Audience campaigns. All existing Audience campaigns using manual CPC will transition to the enhanced CPC bid strategy. Please note that this change doesn't impact Video ad campaigns or Audience campaigns using manual CPM and Manual CPV bid strategies. [Learn more about this change](https://go.microsoft.com/fwlink/?linkid=2269604).

Meta Ads supports automatic bidding strategies, such as lowest cost without cap, lowest cost with bid cap, target cost, cost cap, etc.

If the Meta Ads bid strategy is not supported in Microsoft Advertising, we'll set Audience campaigns to enhanced CPC and Video ad campaigns to manual CPC.

Bid amounts are imported when available. If a bid isn't available, a default bid of $1 will be set.

## Location targeting

We'll import locations from Meta Ads that are also supported in Microsoft Advertising. If none of the imported location targets are supported by Microsoft Advertising, the campaign or ad group will be paused.

## Age targeting

Meta Ads uses min and max age, while Microsoft Advertising has predefined ranges. Import will use the Meta Ads age range and map to the Microsoft Advertising ranges. For example, if the age range is 18-40 in Meta Ads, import will set the target age ranges to 18-24, 25-34, 35-49 in Microsoft Advertising.

## Gender targeting

Gender will be mapped correspondingly as male and female. If **All** is selected in Meta Ads, the import will map to both male and female in Microsoft Advertising.

## Other targeting

Meta Ads language and connections targets will not be imported.
