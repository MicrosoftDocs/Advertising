---
title: Ad Distribution Settings
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Use ad distribution to select where you want your ads to show. You can choose to have your ads shown on the entire Microsoft Advertising Network or its subsets.
---

# Ad distribution settings

> [!IMPORTANT]
> - Starting July 2024, you will no longer be able to create [Shopping campaigns for brands](hlp_BA_PROC_BMC_CoopBid.md) that use the syndicated-only ad distribution setting (Bing, AOL, and Yahoo syndicated search partner sites).
> - [Review your ad distribution selections in your ad group settings](#how-to-set-ad-distribution) and update them as necessary. To help boost campaign performance, we recommend using the entire Microsoft Advertising Network as your ad distribution setting.
> - We also recommend that you leverage [auto-bidding](hlp_BA_CONC_BidStrategy.md) to help manage your budget for ad delivery across the Microsoft Advertising Network and maximize your return on investment.

Use the ad distribution settings to select where you want your ads to show. You can choose to show your ads on the entire Microsoft Advertising Network or its subsets. Based on the option you choose, Microsoft AI will optimize your campaign so that your ads get the best performance and conversions.

[Audience campaigns](hlp_BA_CONC_NativeAds.md) have specialized ad placements to choose from if you select **Microsoft sites** for your ad distribution. These placements include the following:

- **Microsoft Edge browsers:** Native ad placements on Microsoft Edge's new tab page
- **Productivity:** Outlook (Native and Display ad placements)
- **Gaming:** Native, Display, and Video ad placements on Microsoft Casual Games and King Games (e.g., Candy Crush)
- **MSN:** Native, Display, and Video ad placements on Microsoft Bing and MSN (serving with all available MSN content)
- **MSN - Health:** Native, Display, and Video ad placements serving exclusively with MSN health-related content
- **MSN - Money:** Native, Display, and Video ad placements serving exclusively with MSN money-related content

See [How to choose ad placements for Audience campaigns](#how-to-choose-ad-placements-for-audience-campaigns) to learn more about choosing the placements where you want your Audience ads to serve.

> [!NOTE]
> Not everyone has ad placements for Audience campaigns yet. If you don't, don't worry—it's coming soon!

## Ad distribution options

You can choose to show your ads on the following:

- **The entire Microsoft Advertising Network (recommended)**. This option includes:

  - Microsoft sites (Microsoft Bing, MSN, and Outlook.com).
  - Select partner traffic with ad performance and conversion rates similar to Microsoft Bing's. [Learn more about Microsoft Bing Network traffic](TODO-FWLINK-2201528). <br> <br>

    > [!NOTE]
    > Because these sites are reported in aggregate, you cannot see individual reports for each domain.
  - Additional partner traffic (including Microsoft Bing and Yahoo search partners, such as Ask.com, Forbes, and others) for extended reach and lower cost per click. [Learn more about Microsoft Bing Network traffic](TODO-FWLINK-2201528).

  > [!NOTE]
  > We recommend this option because it can extend your ad reach, drive conversions, and provide a lower cost per click. You can also see which syndicated partners extend your campaign's reach by running your Website URL (publisher) report (available on the **Reports** page). You can then use the Exclusions feature to exclude specific sites that you don't want your ads to run on. To learn more, see [How to prevent your ads from showing to certain people](hlp_BA_PROC_AddExclusions.md).
- **Microsoft sites and select traffic**. This option includes:

  - Microsoft sites (Bing, MSN, and Outlook.com).
  - Select partner traffic with ad performance and conversion rates similar to Microsoft Bing's. [Learn more about Microsoft Bing Network traffic](TODO-FWLINK-2201528). <br> <br>

    > [!NOTE]
    > Because these sites are reported in aggregate, you cannot see individual reports for each domain.

> [!NOTE]
> All options include search and Audience ads. Search ads may also be displayed in Bing Smart Search results.

> [!NOTE]
> When you run the publisher performance report, you'll see websites based on these ad distribution rules. To learn how ad language and location targeting affects who sees your ads, see [How does ad language and location targeting affect who can see my ads?](hlp_BA_CONC_LocTargetAndLang.md)

<a id="how-to-set-ad-distribution"></a>

## How to set ad distribution

Although you set ad distribution when you create a new campaign, it's an ad group-level setting. Here's how to adjust your ad distribution settings:

1. From the navigation menu on the left, hover over **Campaigns** and select **Ad groups** > **Ad groups**.
1. In the table, select the ad group you want to edit.
1. From the page menu, select **Settings**.
1. Under **Ad group settings**, in the **Advanced settings** section, select **Ad distribution**.
1. Choose whether to show your ads on **The entire Microsoft Advertising Network** or **Microsoft sites and select traffic**.
1. Select **Save**.

<a id="how-to-choose-ad-placements-for-audience-campaigns"></a>

## How to choose ad placements for Audience campaigns

> [!NOTE]
> Not everyone has ad placements for Audience campaigns yet. If you don't, don't worry—it's coming soon!

Although you can choose your ad placements when you create a new Audience campaign, it's an ad group-level setting that can be adjusted after campaign creation. Here's how to adjust your ad placement settings for Audience campaigns within your ad group settings:

1. From the navigation menu on the left, hover over **Campaigns** and select **Ad groups** > **Ad groups**.
1. In the table, select the ad group you want to edit.
1. From the page menu, select **Settings**.
1. In your ad group targets, below **Placements**, choose whether to show your ads on **The entire Microsoft Advertising Network** or **Microsoft sites**.
1. If you chose **Microsoft sites**, then you need to select the specific placements where you want to serve ads:

   - **Microsoft Edge browsers:** Native ad placements on Microsoft Edge's new tab page
   - **Productivity:** Outlook (Native and Display ad placements)
   - **Gaming:** Native, Display, and Video ad placements on Microsoft Casual Games and King Games (e.g., Candy Crush)
   - **MSN:** Native, Display, and Video ad placements on Microsoft Bing and MSN (serving with all available MSN content)
   - **MSN - Health:** Native, Display, and Video ad placements serving exclusively with MSN health-related content
   - **MSN - Money:** Native, Display, and Video ad placements serving exclusively with MSN money-related content
1. Select **Save**.

> [!NOTE]
> To see how to exclude websites that aren't giving you the results you want, see [How to prevent your ads from showing to certain people](hlp_BA_PROC_AddExclusions.md).
