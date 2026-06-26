---
title: What gets imported from Pinterest ads
ms.service: msa-help
ms.subservice: msa-bulk-import
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Most of the information in your campaigns is included when you import it from Pinterest Ads. Here's a list of what gets imported, as well as some exceptions.
---

# What gets imported from Pinterest Ads

> [!NOTE]
> - During the Import process, you may be asked to confirm whether any of them are intended for political advertising.
> - > [!NOTE]
>   > The list below is not a comprehensive list of imported items. Microsoft Advertising imports all the data needed to manage your campaigns and aims to provide the best experience for you.

After you've imported your campaigns from Pinterest Ads, you can check the status of your import, review error logs, and edit, pause, or delete your import schedule. To learn more, see [Edit your scheduled imports and review import history and results](hlp_BA_CONC_ImportScheduleHistory.md)

Not all information will be imported from Pinterest Ads, but that doesn't mean it's not supported within Microsoft Advertising. You should make sure the campaigns were imported as expected, and then make updates as necessary. Some specific situations require special attention during import. Before proceeding to [Import campaigns directly from Pinterest Ads](hlp_BA_PROC_Import_PI_Campaign.md), be sure to review the details below.

## Campaigns

> [!NOTE]
> While Pinterest Ads import is available globally, we'll only import Audience campaigns where they're available. [Learn more](hlp_BA_PROC_CreateAudienceCampaign.md)

Pinterest Ads campaigns will be imported to Microsoft Advertising as Audience campaigns.

We'll import Active, Paused, and Archived Pinterest Ads campaigns.

### Campaign name

Each Pinterest Ads campaign name will be imported as “{Pinterest Ads campaign name} + delimiter (hyphen) + PI + {Pinterest Ads campaign ID}”.

For example, if the original campaign name is “Subscribe and Save. Buy X, Get Y at 20% discount” and the campaign ID is 2345678910, then Microsoft Advertising would import the campaign name as “Subscribe and Save. Buy X, Get Y - PI2345678910”.

## Ad group name

We'll modify your Pinterest Ads ad group name to “{Pinterest Ads ad group name} + delimiter (hyphen) + PI + {Pinterest Ads ad group ID}”.

For example, if the original ad group name is “Subscribe and Save. Buy X, Get Y at 20% discount” and ad group ID is 2345678910, then the imported ad group name would be saved in Microsoft Advertising as “Subscribe and Save. Buy X, Get Y - PI2345678910”.

## Ads

We'll import single image ads as Audience ads.

Microsoft Advertising doesn't support import of video and multi-image formats.

## Audiences

We'll import Pinterest Ads audience types and map to the Microsoft Advertising equivalent.

| Pinterest Ads audience type | Microsoft Advertising audience type |
| --- | --- |
| **Actalike customers** | Similar audiences <br> *Note:* UET is required. |
| **Demographics<br>Device<br>Location** | Demographic targeting<br>Device targeting<br>Location targeting |
| **Detailed targeting** | In-market audiences |
| **Site visitors** | Remarketing list. <br> *Note:* UET is required. |

## Budgets

If available, daily budgets will transfer as is at the campaign level.

If your Pinterest Ads lifetime budget uses start and stop dates, we'll calculate the daily budget with a proration to the number of days. Campaigns won't be imported if the remaining budget is zero.

## Schedule

If the Pinterest Ads campaigns have a start time and end time, Microsoft Advertising will import them. If the end time is in the past, the campaigns will be imported as paused. If the start time is in the past, the start date will be set to the import date.

## Bids and bid strategy

We'll import Pinterest Ads campaigns with enhanced CPC bid strategy.

Bid amounts are imported when available. If a bid isn't available, a default bid of $1 will be set.

## Location targeting

We'll import locations from Pinterest Ads that are also supported in Microsoft Advertising. If none of the imported location targets are supported by Microsoft Advertising, the campaign or ad group will be paused.

## Age targeting

Import will use the Pinterest Ads age range and map to the Microsoft Advertising ranges. Pinterest Ads uses similar age ranges as Microsoft Advertising, with a few variants:

| Pinterest Ads age groups | Microsoft Advertising age groups |
| --- | --- |
| **18-24** | 18-24 |
| **25-34** | 25-34 |
| **35-44** | 35-49 |
| **45-49** | 35-49 |
| **50-54** | 50-64 |
| **55-64** | 50-64 |
| **65+** | 65+ |
| **21+ (21-24)** | 18-24 |

## Gender targeting

Gender will be mapped correspondingly as male, female, and unknown. If **All** is selected in Pinterest Ads, the import will map to both male and female in Microsoft Advertising.
