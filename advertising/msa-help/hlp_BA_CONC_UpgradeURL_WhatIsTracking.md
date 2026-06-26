---
title: What is URL tracking in Microsoft Advertising?
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Find out how visitors got to your website using tracking parameters and a third-party tracking tool. There are four different ways to set up tracking in Microsoft Advertising.
---

# What is URL tracking in Microsoft Advertising?

URL tracking allows you to find out how people got to your website by adding tracking parameters in Microsoft Advertising and then using a third-party tracking tool or service to analyze the data. When an ad is served, the tracking parameters are dynamically appended to your landing page URL. This landing page URL is recorded on your web server and then a third-party tracking tool, like Adobe or Google Analytics, can interpret the data.

There are 5 ways to set up URL tracking in Microsoft Advertising:

1. **Auto-tagging of UTM tags:** When you select the auto-tagging checkbox, five UTM tags will be added to the landing page URLs of your text ads, keywords, Microsoft Shopping campaigns, image extensions, and sitelink extensions. Learn more: [How to set up auto-tagging?](hlp_BA_CONC_AutoTag.md)
1. **Auto-tagging of Microsoft Click ID:** You can also enable auto-tagging of the Microsoft Click ID separately for conversion tracking. Learn more: [How do I create a conversion goal?](hlp_BA_PROC_UETv2CreateGoal.md)
1. **Final URL tracking:** You manually add URL parameters to your final URLs. With this option, your ad needs to go through editorial review each time you update a parameter. Learn more: [How do I set up final URL tracking?](hlp_BA_CONC_GoogleAnalytics.md)
1. **Tracking template:** You select final URL as your landing page and then add URL parameters to the tracking template. We recommend that you add the tracking template at the account level and then it will be applied to all URLs (ads, keywords, sitelink extensions). Learn more: [Create an account tracking template](hlp_BA_CONC_UpgradeURL_TrackTemplateGlobalParam.md).
1. **Custom parameters:** You select Final URL as your landing page, define custom parameters to track a specific data point, and then add the custom parameter to the tracking template. Learn more: [Can I use custom parameters?](hlp_BA_CONC_UpgradeURL_TrackTemplateCustomParam.md)

> [!NOTE]
> Auto-tagging of UTM tags and Microsoft Click ID are two separate features. In order to use these features together, both must be enabled at the same time.

In your account, you can mix and match which tracking parameters you want to use. Here is how URL tracking options work together when an ad is served:

- Microsoft Advertising passes parameters from the lowest level tracking template or final URL.
- Auto-tagging appends the UTM tags or Microsoft Click IDs at the end of the URL, after any URL parameters.
