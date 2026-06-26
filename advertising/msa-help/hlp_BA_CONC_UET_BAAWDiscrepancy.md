---
title: Why do I see a discrepancy between Microsoft Advertising conversion counts and those from Google Analytics and Google Ads (or my own logs)?
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Find out why you may see discrepancies between Microsoft Advertising and Google Ads/Google Analytics conversion counts.
---

# Why do I see a discrepancy between Microsoft Advertising conversion counts and those from Google Analytics and Google Ads (or my own logs)?

There could be several reasons why conversions may not match. Keep in mind that Microsoft Advertising doesn't expose conversion data to any third-party platform, and each system uses its own logic and goal setup to track conversions. Microsoft Advertising reports conversions on the date of the *ad click*, whereas some other reporting tools attribute them to the date of the *conversion*. As such, some level of discrepancies are expected.

## Why Microsoft Advertising may not be counting conversions

Here are some things to consider:

- Did you install the UET tag across your website (or at least on the conversion pages)?
- Did you verify that the criteria you used in the conversion goal definition matches the conversion pages? Spelling mistakes, incorrect page URL values etc. in the goal definitions cause the UET events on those conversion pages to not match the conversion goal definition. When there is no match, conversions will not be counted.
- Do you have a reasonably sized conversion window? Small conversion windows should be used wisely since users generally spend a few days before making a purchase.
- If you are using Custom Event type goals or tracking Variable Revenue, are you actually customizing the UET tag to send in the custom events/variable revenues and are you using the correct values in the goal definition?
- Are you sure users are actually going to the conversion pages? If testing, note that Microsoft Advertising does not count a conversion unless a user clicks on an advertiser ad before converting on the advertiser's website.
- Validate conversion tracking is set up properly:

  1. Create and add the UET tag to all pages of your website. [Learn more](hlp_BA_CONC_UET_Setup_Master.md).
  1. On the **UET tags** page, make sure the tag is **Tag active**.
  1. On the **Conversion goals** page, create a conversion goal.
  1. Trigger an ad on Bing, click the ad, and then convert on the site.
  1. In three hours, revisit the **Conversion Goals** page to see that the goal is counting conversions.

## Why Microsoft Advertising may be over-counting

- Did you verify that there is no duplication of the UET tag installation on the site (especially on the conversion pages)? If you have installed the same UET tag twice on the conversion pages, conversions will be double counted.
- Did you verify that there are no duplicate goals? It's also possible that multiple goals match with the one user event thus increasing the number of conversions.
- Did you verify that the goal definitions are the same across all the platforms being compared? Are the conversion windows similar?
- Do you have test/fraudulent/duplicate conversions being generated on your site? Microsoft Advertising currently does not filter those out.
- Are you using the same counting method (Unique vs. All) in your comparisons?
- Note that Microsoft Advertising includes any cross-device conversions that it can identify as part of the conversion count. Google Ads reports those via estimated conversion columns. Google Analytics has a custom solution for cross-device that most advertisers may not be using.
- When comparing, note that Google Analytics does cross-channel attribution which means that some of the conversions that Microsoft Advertising (or Google Ads) take credit for may be attributed to other channels by Google Analytics.

## Why Microsoft Advertising may be under-counting

- Did you verify that the UET tag is present across the site (or at least on the relevant conversion pages)?
- Did you verify that the goal definitions are not too restrictive such that they don't count all conversions?
- Is your conversion window too small?
- Are you counting Unique conversions (and comparing to All conversion counts in Google Ads, etc.)?
- Note that if your users are converting directly or via other channels, Microsoft Advertising will not count conversions. They are reported in Google Analytics and Google Ads (if Google Ads determines the conversion was caused by their ad click).

> [!IMPORTANT]
> Google recently moved to a new default attribution model known as data-driven attribution as part of the migration to [Google Analytics 4 (GA4)](https://go.microsoft.com/fwlink/?linkid=2245916), which may be causing large differences in conversion attribution reporting between Google's tools and Microsoft Advertising. Reach out to your Microsoft Advertising representative or contact [Microsoft Advertising support](https://go.microsoft.com/fwlink/?linkid=2189081) to better understand the impact of the changes when it comes to your conversions and revenue reporting within Microsoft Advertising.

> [!NOTE]
> If you still have questions about the discrepancy, here's a checklist of things you need to verify:
>
> - [UTM auto-tagging](hlp_BA_CONC_AutoTag.md) for [URL tracking](hlp_BA_CONC_UpgradeURL_WhatIsTracking.md) is working properly.
> - The same number of conversion goals are created and the goal criteria are the exact same in both Microsoft Advertising and Google Ads/Google Analytics.
> - Microsoft Advertising and Google Ads/Google Analytics tag associated with the conversion goal is added to the same pages of your website.
> - The conversion window and counting (Unique vs. All) settings are exactly the same.
> - The time zone for reporting is the same.
>
> If you still want to contact support, you need to have the following information:
>
> - The tag name and the website pages you put the tags on for the conversion goals you are comparing.
> - The goal name and criteria for the conversions goals you are comparing.
> - The column names for the data you are comparing and where this information is located in the product.
> - The report name for the reports you are comparing.
> - A screenshot of the goal setting from Google Ads/Google Analytics.
