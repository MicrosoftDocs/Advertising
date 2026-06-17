---
title: How to Prevent your Ads from Showing to Certain People
description: Learn how to use exclusions to prevent your ads from showing to certain people based on specific locations, websites, IP addresses, and more.
ms.date: 05-30-2026
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
ms.author: jonmeyers
author: jonmeyers
---

# How to prevent your ads from showing to certain people

If you want to prevent your ad from appearing in specific locations, on specific web sites within the Microsoft Advertising Network, or prevent your ads from displaying to certain IP addresses, you can configure exclusions.

## To prevent your ads from showing in specific locations

**To exclude specific locations at the campaign level**

  1. From the navigation menu on the left, select **Campaigns**.
  1. Select the name of the campaign that you want to edit (in the **Campaign** column).
  1. Select **Settings**.
  1. Select **Edit location targets** below **Location** and then select **Let me choose specific locations**.
  1. Select locations you want to exclude—cities and metro areas within the United States, Canada, United Kingdom, France, and Australia; states/provinces; countries/regions; or postal codes—by searching for your specific location and selecting **Exclude** from the search results. (Note: You cannot exclude using radius targeting.)
  1. Select **Done**.

**To exclude specific locations at the ad group level**

  1. From the navigation menu on the left, hover over **Campaigns** and select **Ad groups** > **Ad groups**.
  1. Select the ad group that you want to edit (in the **Ad group** column).
  1. Select **Settings**.
  1. Select **Edit location targets** below **Location** and then select **Let me choose specific locations**.
  1. Select locations you want to exclude—cities and metro areas within the United States, Canada, United Kingdom, France, and Australia; states/provinces; countries/regions; or postal codes—by searching for your specific location and selecting **Exclude** from the search results. (Note: You cannot exclude using radius targeting.)
  1. Select **Done**.

## To prevent specific websites from showing your ads

For information and instructions about how to prevent specific websites from showing your ads, see [About website control lists](hlp_BA_CONC_WebExclusionsTargetedWebsites.md).

> [!NOTE]
> - You can specify a maximum of 2,500 URLs to exclude.
> - Each URL must specify the domain name, and can specify one subdomain name and a maximum of two directories.
> - Duplicate URLs are not added.
> - Ad-group-level website exclusions override campaign-level website exclusions.
> - Website exclusions function differently for Search campaigns and Audience campaigns. For Search campaigns, you cannot block your ads from serving on Yahoo search and Microsoft search traffic (including Bing and AOL), but you can block your ads from serving on audience traffic (including MSN, Microsoft Edge, and Outlook.com). For Audience campaigns, you cannot block your ads from serving on Microsoft sites (including Bing, Microsoft Casual Games, MSN, and Outlook.com).

## To block specific IP addresses from seeing your ads

1. From the navigation menu on the left, select **Campaigns**.
1. Select the checkbox next to the name of the campaign that you want to edit.
1. Select **Edit** **Other changes**.
1. From the **Campaign settings** dropdown menu, select **IP address exclusions**.
1. Enter the IP addresses that you want to be blocked from seeing your ads in the box. Enter one IP address per line. You can also add a range of addresses using a wildcard character (*).
1. Select **Apply**.

> [!NOTE]
> - IP exclusions must be added at the campaign level, not the ad group level.
> - You can exclude a maximum of 100 IP addresses (or IP address ranges) per campaign.
> - You can only exclude IPv4 addresses. These addresses must include all four octets, each with an integer that ranges from 0 - 255. Only the last octet can be a wildcard character (*). For example,127.0.0.*. This would include all IP addresses from 127.0.0.0 to 127.0.0.255.

## To prevent specific apps from displaying your ads

1. Run a **Website URL (Publisher)** report for the campaign(s) you want to optimize.
1. Add the **Mobile Bundle** column if it's not already visible. This will help identify the unique app identifiers associated with ad placements.
1. Retrieve the **App ID**: Locate and copy the relevant mobile bundle ID from the report. This ID corresponds to the specific app you want to exclude.
1. Update Your **Website Exclusion List**: Navigate to your [account's website exclusion settings](hlp_BA_CONC_WebExclusionsTargetedWebsites.md) and add the retrieved ID to your website exclusion list.

This will prevent your ads from being served in the specified apps.

## To include and exclude search partners

The Website URL (publisher) report is a useful tool for determining how well your ad does on search sites. From this report, you'll see how often your ad displays on different sites, which can help you determine the sites that are beneficial and those that aren't. [Learn more about the Website URL (publisher) report](hlp_BA_PROC_CreateReport.md). You can then use the exclusions feature to exclude specific sites from Search ad distribution. To learn more, see [How to prevent your ads from showing to certain people](hlp_BA_PROC_AddExclusions.md).

## To prevent delivering to specific ad placements or distributions

For information and instructions about how to prevent delivering to specific ad placements or distributions, see [Ad distribution settings](hlp_BA_CONC_AboutAdDistributionHidden.md).
