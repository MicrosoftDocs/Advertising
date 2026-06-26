---
title: Create an account tracking template
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Upgraded URLs separate your tracking information (tracking template) from the landing page URL making it easy to update and manage URL tracking. Under Account level options, you can create an account tracking template.
---

# Create an account tracking template

URL tracking allows you to find out how visitors got to your website and gives you more information about the source of an ad click. All you need to do is add URL parameters to your tracking template and then when your ad is served, the parameters are dynamically appended to your landing page URL. To learn more, see [What is URL tracking in Microsoft Advertising?](hlp_BA_CONC_UpgradeURL_WhatIsTracking.md)

For Performance Max campaigns, you can add tracking templates at the campaign and asset group level.

For Search campaigns, you can add tracking templates at these levels:

- Account
- Campaign
- Ad group
- Ad
- Keyword
- Sitelink extension

For Microsoft Shopping campaigns, you can now add tracking templates at the account, campaign, and ad group level along with the product group level.

We recommend adding the tracking template to your account. Then when you want to update a parameter or add a new one, you only need to make the change in one place and it applies to everything in that account.

1. From the navigation menu on the left, hover over **Campaigns** and select **Settings** > **Account level options**.
1. For **Tracking template**, enter one of these items:

   - {lpurl} followed by URL parameters and custom parameters which are separated by an ampersand (&). For example, {lpurl}?matchtype={matchtype}&device={device}. To learn more, see [What tracking or URL parameters can I use?](hlp_BA_CONC_UpgradeURL_URLParameters.md) and [Can I use custom parameters?](hlp_BA_CONC_UpgradeURL_TrackTemplateCustomParam.md)
   - The URL you received from a third-party tracking tool or service. For example, http://www.trackingc.com/?url={lpurl}&id=5

   > [!IMPORTANT]
   > Tracking templates must reference your landing page URL. You are required to add {lpurl} or another landing page parameter.
1. Select **Save**.

> [!NOTE]
> - You can't define custom parameters at the account level, but you can add custom parameters to the account tracking template that are defined at the campaign, ad group, asset group, ad, keyword, or sitelink extension level. To learn more, see [Can I use custom parameters?](hlp_BA_CONC_UpgradeURL_TrackTemplateCustomParam.md)
> - If you create a tracking template at the campaign, ad group, asset group, ad, or sitelink extension level, it will override the account tracking template. When your ad is served, the lowest level tracking template will be appended to your landing page URL.
> - The tracking template can be up to 2,048 characters. To learn more, see the section Have the URL character limits changed in the [FAQ: Upgraded URLs](hlp_BA_CONC_UpgradeURL_FAQ.md).
> - Make sure that you select final URL as your Landing page URL.
> - In a Search campaign, you need to select **Final URL** as your landing page.
