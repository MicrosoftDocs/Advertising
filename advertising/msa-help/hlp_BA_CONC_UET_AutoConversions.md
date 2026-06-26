---
title: Simplified conversion goal setup
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Simplified conversion goal setup makes use of Clarity/Insights data (if you are opted-in) and Edge/Shopping data (if you have enabled the extension in Edge).
---

# Simplified conversion goal setup

> [!NOTE]
> Not everyone has this feature yet. If you don't, don't worry—it's coming soon!

> [!IMPORTANT]
> Ensure proper consent transmission for users visiting from the European Economic Area (EEA), the United Kingdom, and Switzerland by implementing [Consent Mode](hlp_BA_CONC_UET_Consent.md) or the [Transparency and Consent Framework (TCF)](hlp_BA_CONC_UET_TCF.md) with your UET tags to avoid any negative impact on conversion attribution and remarketing segments. This policy reflects the requirements of the EU ePrivacy Directive and the General Data Protection Regulation (GDPR). [Learn more](hlp_BA_CONC_UET_ConsentFAQ.md)

With simplified conversion goal setup, you can select events of interest, automatically detect those events on your website, and suggest which ones to track as conversions. This eliminates the need for selecting events manually and simplifies your workflow since you will not need to use code for any configuration. Button clicks, purchases, checkouts, and subscriptions can all be detected.

To use simplified conversion goal setup, you only need to set up a UET tag on your website, and review and accept the automatically detected events that you'd like to track as conversions. [Learn more about setting up a UET tag](hlp_BA_CONC_UET_Setup_Master_2.md).

> [!IMPORTANT]
> - Ensure your UET tag is functioning properly before simplified conversion goal setup. [Learn more about testing your UET tag with UET Tag Helper](hlp_BA_CONC_UET_TagHelper.md).
> - You need to set your UET tag up across all your pages (e.g., your purchase confirmation page).

## Simplified conversion goal setup for a new goal

1. Select **Conversions** > **Create goals**.
1. Select **Business website** to track conversions on your website.

   > [!NOTE]
   > Simplified conversion goal setup doesn't apply to App stores or Offline conversions.
   
1. Select **Simplified setup**.
1. Either enter your website URL or select your website from the dropdown menu.
1. Select **Continue**.
1. Select the checkbox next to the goal or goals you would like to track.
1. Select **Next**.
1. If you have a working UET tag, you are done with simplified conversion goal setup. If not, you need to create one. [Learn more](hlp_BA_CONC_UET_Setup_Master_2.md)

## Enable simplified conversion goal setup for the existing UET tags in your account
1. Select **All campaigns** > **Campaign settings**.
1. Select the **Account level** options tab.
1. Under **Simplified conversion goal setup**, select the checkbox for **Enable simplified conversion goal setup for all my conversion goals on this account. (Permission to upgrade UET tag associated with that goal to track events)**.

> [!NOTE]
> - Once you complete simplified conversion goal setup, you can continue with the campaign creation workflow. [Learn more](hlp_BA_CONC_Redesign.md).
> - Automated bid strategies require “Optimize campaign performance” to be enabled in the conversion goals setting. Your campaign performance is dependent on accurate conversion tracking. [Learn more about auto-bidding](hlp_BA_CONC_BidStrategy_Portfolio.md).

<a id="not-all-website-langauges-are-currently-supported"></a>

## Not all website languages are currently supported

You can only use simplified conversion goal setup with websites in the following languages: Arabic, Bulgarian, Chinese, Croatian, Czech, Danish, Dutch, English., Finnish, French, Georgian, German, Greek, Hebrew, Hindi, Hungarian, Indonesian, Italian, Japanese, Korean, Latvian, Lithuanian, Norwegian, Norwegian Bokmål, Persian, Polish, Portuguese, Romanian, Russian, Serbian, Slovak, Slovenian, Spanish, Swedish, Thai, Turkish, Ukrainian, Vietnamese. For all other languages, you should [setup your conversion goals manually](hlp_BA_PROC_UETv2CreateGoal.md).
