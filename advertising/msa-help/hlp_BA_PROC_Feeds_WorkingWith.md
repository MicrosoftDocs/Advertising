---
title: Business Data Feeds
description: Learn how to upload, update, and manage your Business data feeds.
ms.date: 05-30-2026
ms.service: msa-help
ms.subservice: msa-shopping-merchant-center
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
---

# Business data feeds

There are three main types of Business data feeds: Ad customizer feeds, dynamic data feeds, and page feeds. All three can be accessed and managed by selecting **Tools** > **Business data**.

- **Ad customizer feeds**

  produce ads that dynamically update themselves into hundreds of variations that are targeted towards customers' searches. Learn more about [ad customizer feeds](hlp_BA_CONC_Feeds_AdCustomizers.md).

  > [!IMPORTANT]
  > - **After February 1, 2023, you will no longer be able to create new or edit existing expanded text ads.** For more information, see [About Responsive Search ads](hlp_BA_CONC_ResponsiveSearchAds.md).
  > - For more information about ad customizers for Responsive Search ads, see [About ad customizer for Responsive Search ads](hlp_BA_CONC_AdCustomizer_RSA.md).
  > - Your scheduled feeds will continue to run and existing expanded text ads using ad customizer feeds will continue to serve. You'll be able to view reports on their performance.
  > - You'll still be able to pause, run, or remove your existing ad customizer feeds.
  > - > [!NOTE]
  >   > Starting on August 31, 2023, we'll remove all unused ad customizer feeds that haven't been referenced in expanded text ads for more than three months. This will not impact any ads that are currently serving.
  > - [Learn more about this change](https://go.microsoft.com/fwlink/?linkid=2208402)

- **Dynamic data feeds**

  generate [Vertical ads](hlp_BA_CONC_AboutVerticalAds.md). Available options are: [Automotive](hlp_BA_CONC_Feeds_Autos.md), [Credit cards](hlp_BA_CONC_Feeds_CreditCards.md), [Cruises](hlp_BA_CONC_Feeds_Cruises.md), [Job listing](hlp_BA_CONC_Feeds_JobListing.md), [Professional services](hlp_BA_CONC_Feeds_ProfessionalServices.md), and [Tours and activities](hlp_BA_CONC_Feeds_ToursActivities.md).

- **Page feeds**

  allow you to easily upload and apply custom labels to all the relevant URLs for your Dynamic Search ads, ensuring maximum website coverage. Learn more about [page feeds](hlp_BA_CONC_DynamicSearchAds_PageFeeds.md).

## Manage feeds after uploading

You can add to, update, remove, or review items from your feeds by selecting **Tools** > **Business data** and selecting the feed you want to review. You can then make changes to your feed by re-uploading an edited version of it.

> [!NOTE]
> All feed files must be saved as any of the following file types: CSV, TSV, XLSX, or ZIP.

If you don't have your feed file on hand, you can always download it from Microsoft Advertising:

1. Select the name of the feed.
1. Select **Download**.
1. Choose the **Format** from the dropdown menu.
1. Select **Download**.
1. Edit as necessary.
1. Upload it back into Microsoft Advertising by selecting **Upload spreadsheet**.

> [!IMPORTANT]
> Your edited feed file must not contain any columns that aren't present in your previous feed. If you need to add new columns, you must delete the current feed and create a new feed file.

- **To add, update, remove, or replace some of your feed items:**

  1. From the navigation menu on the left, select **Tools** > **Business data**.
  1. Choose a business data feed type from the left menu.
  1. Select the feed whose items you'd like to add, update, remove, or replace.
  1. Select **Upload spreadsheet**.
  1. Select **Update** to add, update, or remove some of your feed's items *or* select **Replace** to replace your feed's items.
  1. Select **Browse** to find the edited feed file.
  1. Select either **Upload and preview** (which allows you to review and fix any errors before applying) or **Upload and apply**.

- **View upload history**

  > [!NOTE]
  > Uploaded feed history is retained for 30 days.

  1. From the navigation menu on the left, select **Tools** > **Business data**.
  1. Choose a business data feed type from the left menu.
  1. Select the feed whose upload history you'd like to view.
  1. Select the **Upload history** tab.
  1. Under **Actions** in the table, select either **Download all results** or **Download errors only** to view upload details.

## Schedule feed updates

You can schedule feed uploads to keep your feed data up to date. You can set only one schedule per feed. Updates can be made every 6 hours, every 12 hours, daily, weekly, or monthly.

- **Schedule your feed**

  1. From the navigation menu on the left, select **Tools** > **Business data**.
  1. Choose a business data feed type from the left menu.
  1. Choose the feed you want to create a schedule for.
  1. Select the **Schedules** tab.
  1. Select **Schedule feed uploads** and enter the scheduling information and URL for your feed.
  1. Select **Save**.

- **Edit a feed schedule**

  1. From the navigation menu on the left, select **Tools** > **Business data**.
  1. Choose a business data feed type from the left menu.
  1. Choose the feed whose schedule you want to update.
  1. Select the **Schedules** tab.
  1. Select one of the following options:
      - **Edit** to change schedule fields.
      - **Pause** to turn off scheduling.
      - **Update now** to manually update the feed.
      - **Remove** to remove the current schedule entirely.
