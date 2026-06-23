---
title: How to Add Keywords That Won't Trigger My Ads (Negative Keywords)
description: Negative keywords are specific words or phrases that help prevent your ad from showing to customers who are unlikely to click your ad. They help filter out irrelevant traffic and, in turn, help increase click-through rate (CTR), ad position, and cost per click (CPC).
ms.date: 5/30/2026
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
---

# How to add keywords that won't trigger my ads (negative keywords)

Use negative keywords to help prevent your ad from appearing in response to certain search queries or other input. You can add negative keywords at the account, campaign, and ad group levels, or create a shared negative keyword list to use across campaigns. Each negative keyword can contain up to 100 characters. Each shared negative keyword list can contain up to 5,000 negative keywords. You can create one negative keyword list at the account level that contains up to 1,000 negative keywords. [Learn more about negative keywords](hlp_BA_CONC_AboutNegativeKeywords.md).

> [!NOTE]
> There's no way to apply negative keyword lists across all accounts and sub-accounts at once.

You can also turn your dynamic ad targets search terms into negative keywords by following these steps: From the navigation menu on the left, hover over **Campaigns** and select **Dynamic ad targets** > **Search terms**. Then, select the checkbox next to the appropriate search terms and select **Add as negative keyword**.

## Add negative keywords at the account level

An account-level negative keyword list is applied to Search, Shopping, and Performance Max campaigns associated with your account and supplements the keywords you add to individual campaigns and ad groups. This means that negative keywords added at the account level will be used in addition to any negative keywords you set at the campaign and ad group level. You can create one list at the account level that contains up to 1,000 negative keywords.

1. From the navigation menu on the left, hover over **Campaigns** and select **Settings** > **Account level options**.
1. Below **Negative keywords**, select **Add negative keywords**.
1. Add your negative keywords as phrase match or exact match.
1. Select **Save**.

## Add negative keywords at the campaign or ad group level

For instructions on adding negative keywords to Performance Max campaigns, see [below](#add-negative-keywords-to-performance-max-campaigns).

1. From the navigation menu on the left, hover over **Campaigns** and select **Keywords** > **Negative keywords**.
1. Select **Campaign** or **Ad group**.
1. Select **Add**.
1. Select the appropriate campaign or ad group, then add your negative keywords as appropriate.
1. Select **Save**.

## Add negative keywords to Performance Max campaigns

> [!NOTE]
> Not everyone has this feature yet. If you don't, don't worry—it's coming soon!

You can add negative keywords to your Performance Max campaign during or after campaign creation:

- **During campaign creation**

  1. Follow the steps to [create your campaign](hlp_BA_PROC_CreatePmax.md).
  1. Below **Negative keywords** in your targeting settings, enter your negative keywords.

  > [!NOTE]
  > [Negative phrase match](hlp_BA_CONC_AboutNegativeKeywords.md) is the default negative keyword match type, which you can edit after creating your campaign in **Campaigns** > **Negative keywords**.

- **After campaign creation**

  You can add negative keywords and negative keyword lists after campaign creation:

  - *Add negative keywords*

  1. From the navigation menu on the left, select **Campaigns**.
  1. Select the appropriate Performance Max campaign.
  1. Select **Negative keywords**.
  1. Select **Add**.
  1. Enter your negative keywords.
  1. Select **Save**.

  - *Add negative keyword lists*

  See the instructions [below](#add-negative-keyword-lists-at-the-campaign-level).

## Add negative keyword lists at the campaign level

1. From the navigation menu on the left, hover over **Campaigns** and select **Keywords** > **Negative keyword lists**.
1. Select **Add**.
1. Choose the appropriate campaign.
1. Select the negative keyword lists you want to apply to your campaign.
1. Select **Save**.

> [!NOTE]
> - When adding negative keywords, do not use a hyphen ( - ) to indicate that the keyword is negative. You can use brackets ( [] ) to indicate exact match negative keywords and quotation marks ( "" ) to indicate phrase match negative keywords.
> - If a campaign has multiple ad groups with different language settings, Microsoft Advertising adds the negative keywords only to ad groups that have the same language setting as the account.

## Add search terms as negative keywords

You can research search terms, and then add them to your keyword list. You can also use this feature to identify search queries that you want to avoid by creating negative keywords.

[Learn about search terms and how to add them as negative keywords](hlp_BA_PROC_SearchTerm.md).

## Edit or delete negative keywords at the campaign or ad group level

1. From the navigation menu on the left, hover over **Campaigns** and select **Keywords** > **Negative keywords**.
1. Select **Campaign** or **Ad group**.
1. Select the checkbox next to one or more negative keywords that you want to edit or delete.
1. Select **Delete** or **Edit**. If editing, make your changes > **Save**.

> [!NOTE]
> When you edit negative keywords in bulk, Microsoft Advertising uses the account language setting.

## Download a negative keyword list

1. From the navigation menu on the left, select **Campaigns**.
1. Select the appropriate campaign.
1. Select **Keywords**.
1. Select **Negative keywords**.
1. Select **Export**.
1. A CSV file containing your negative keywords will automatically download.

## Use/view a shared negative keyword list

First you must create a negative keyword list and add your negative keywords. After this, you can add the list to one or more campaigns.

Step 1: Create a negative keyword list

If you simply want to view your negative keyword lists, you can select each list to view the campaigns associated with it.

1. From the navigation menu on the left, select **Tools** > **Negative keyword lists**.
1. Select **Create negative keyword list**.
1. Enter a list name, and then enter one negative keyword per line. You can enter up to 5,000 negative keywords at a time.
1. Select **Save**.

Step 2: Add a negative keyword list to one or more campaigns

1. From the navigation menu on the left, select **Tools** > **Negative keyword lists**.
1. Select the name of the list you want to add to one or more campaigns.
1. Select **Campaigns in this list**.
1. Select **Add campaigns**.
1. Select the plus button next to the campaigns that you want to associate with this negative keyword list.
1. Select **Save**.

## Edit or delete a shared negative keyword list

1. From the navigation menu on the left, select **Tools** > **Negative keyword lists**.
1. To delete the list, select the checkbox next to the list > **Delete**.
1. To edit the list, select the list name, and then **Add negative keywords** or select the checkbox next to one or more negative keywords to **Delete** them.
1. To edit keywords, select the keyword, enter your changes > **Save**.

## Add a shared negative keyword list to a campaign

1. From the navigation menu on the left, select **Tools** > **Negative keyword lists**.
1. Select the list name.
1. Select **Campaigns in this list**.
1. Select **Add campaigns**.
1. From the available campaigns list, select the plus button next to the campaign you want to associate with this list.
1. Select **Done**.

## Remove a shared negative keyword list from a campaign

1. From the navigation menu on the left, select **Tools** > **Negative keyword lists**.
1. Select the list name.
1. Select **Campaigns in this list**.
1. Select checkbox next to the campaign you would like to delete from the list > **Delete**.
