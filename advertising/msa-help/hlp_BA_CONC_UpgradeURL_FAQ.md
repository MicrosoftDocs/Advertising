---
title: FAQ - Upgraded URLs
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Upgraded URLs separate your tracking information from the landing page URL making it easy to update and manage URL tracking. Here, find the answers to top questions people are asking.
---

# FAQ: Upgraded URLs

Upgraded URLs separate your tracking information from the landing page URL, making it easy to update and manage URL tracking. Here, find the answers to top questions people are asking.

## FAQ

- **What are the new terms with Upgraded URLs?**

  With upgraded URLs, we have several new terms that are important:

  | Name | Description |
  | --- | --- |
  | **Landing page URL** | The webpage where people end up after they click your ad. You have two choices: final URL or destination URL. The URL of this page is usually the same as your ad's final URL. |
  | **Final URL** | The upgraded version of the URL address of the page on your website that people reach when they click your ad from a computer or laptop. |
  | **Destination URL** | The URL address of the page in your website that people reach when they click your ad. |
  | **Mobile URL** | The upgraded version of the URL address of the page in your website that people reach when they click your ad from a mobile device. |
  | **Tracking template** | The field where you will put tracking information. When an ad is clicked, this information will be added to your final URL to create your landing page URL. <br> When you define this at the account, campaign or ad group level, it is called a shared tracking template because all ads, keywords and sitelink extensions will inherit the tracking parameters |
  | **URL parameters** | URL parameters that are defined by Microsoft Advertising that you can add to your tracking templates. To learn how add to tracking template, see [Create an account tracking template](hlp_BA_CONC_UpgradeURL_TrackTemplateGlobalParam.md) |
  | **Custom parameters** | URL parameters that you can create yourself and add to your tracking templates. To learn how add to tracking template, see [Can I use custom parameters?](hlp_BA_CONC_UpgradeURL_TrackTemplateCustomParam.md) |

- **What Microsoft Advertising entities use tracking templates and custom parameters?**

  While we recommend creating a shared tracking template at the account level, you can define tracking templates at the account, campaign, ad group, ad, keyword and sitelink extension levels.

  When applying the tracking template or custom parameters, Microsoft Advertising will use the tracking template defined at the lowest level. Here is the hierarchy from highest to lowest: **Account** > **Campaign** > **Ad group** > **Ad** > **Keyword** > **Sitelink Extension**. For example, if you have a tracking template defined at the Campaign and Ad level, the tracking template at the Ad level will be applied.

  The following table summarizes the support for individual fields of Upgraded URLs in various Microsoft Advertising entities.

  | Microsoft Advertising entity | Tracking template | Custom parameters | Final URL | Mobile URL |
  | --- | --- | --- | --- | --- |
  | **Account** | ![Included](media/Global_Icon_CheckMark.png) | ![Not included](media/Global_Icon_Xmark.png) | ![Not included](media/Global_Icon_Xmark.png) | ![Not included](media/Global_Icon_Xmark.png) |
  | **Campaign** | ![Included](media/Global_Icon_CheckMark.png) | ![Included](media/Global_Icon_CheckMark.png) | ![Not included](media/Global_Icon_Xmark.png) | ![Not included](media/Global_Icon_Xmark.png) |
  | **Ad group** | ![Included](media/Global_Icon_CheckMark.png) | ![Included](media/Global_Icon_CheckMark.png) | ![Not included](media/Global_Icon_Xmark.png) | ![Not included](media/Global_Icon_Xmark.png) |
  | **Ad** | ![Included](media/Global_Icon_CheckMark.png) | ![Included](media/Global_Icon_CheckMark.png) | ![Included](media/Global_Icon_CheckMark.png) | ![Included](media/Global_Icon_CheckMark.png) |
  | **Keyword** | ![Included](media/Global_Icon_CheckMark.png) | ![Included](media/Global_Icon_CheckMark.png) | ![Included](media/Global_Icon_CheckMark.png) | ![Included](media/Global_Icon_CheckMark.png) |
  | **Sitelink extension** | ![Included](media/Global_Icon_CheckMark.png) | ![Included](media/Global_Icon_CheckMark.png) | ![Included](media/Global_Icon_CheckMark.png) | ![Included](media/Global_Icon_CheckMark.png) |

- **Will my ad statistics be reset if I upgrade my URLs?**

  When you make updates to Microsoft Advertising campaigns, we do not reset any performance stats. Microsoft Advertising reuses the existing identifier ID for all entities.

- **Do I have to upgrade all my ads at the same time?**

  No you do not. With Upgraded URLs, you will have the flexibility to use the different types of tracking based on your preference. To learn more see, [What is URL tracking in Microsoft Advertising?](hlp_BA_CONC_UpgradeURL_WhatIsTracking.md) Our recommendation is to upgrade at the campaign level so that you can quickly make progress across your account. To learn how to upgrade, see [What are Upgraded URLs and how do I upgrade?](hlp_BA_CONC_UpgradeURL_MigrateFAQ.md)

- **Have the URL character limits changed?**

  Destination URLs today have a character limit of 1024. By upgrading your URLs, you will be able to take advantage of increased URL limits.

  Below are the following limits for URLs, custom parameters, tracking templates:

  | Field | Character limit |
  | --- | --- |
  | **Destination URL** | 1024 |
  | **Final URL** | 2048 |
  | **Mobile URL** | 2048 |
  | **Tracking template** | 2048 |
  | **Custom parameter name** | 16, for example: {_coupon} is 6 chars long "coupon" |
  | **Custom parameter value** | 200 |

- **What happens if I do not upgrade?**

  Microsoft Advertising does not currently have a requirement to move to upgraded URLs. If this were to change, we will notify our customers and partners.

- **How is a Microsoft Advertising account structured?**

  To learn about Microsoft Advertising account structure, see [How should I organize my accounts and campaigns?](hlp_BA_CONC_AboutAccts.md)

- **How do custom parameters work?**

  To learn how custom parameters work with upgraded URLs, see [Can I use custom parameters?](hlp_BA_CONC_UpgradeURL_TrackTemplateCustomParam.md)

- **How do I use a tracking template?**

  To learn how use tracking parameters, see [Create an account tracking template](hlp_BA_CONC_UpgradeURL_TrackTemplateGlobalParam.md) and [Add additional tracking templates to my campaigns](hlp_BA_CONC_UpgradeURL_TrackTemplateCampaignLevel.md)

- **How do I use a landing page URL?**

  Landing page URL is the webpage a user goes to when they click your ad. With Upgraded URLs, you now have two options for landing page URL:

  - **Destination URL:** The older way to define URLs where you can add the URL and URL parameters.
  - **Final URL:** The new way to define URLs, which allows you the define a separate mobile URL, tracking template and custom parameters.

- **How do I upgrade if I use a tool provider or agency?**

  If you are using a third party tool provider or agency to aid in your campaign and URL management, check with them first to find out their plans for upgrading before planning your URL upgrades.

- **How are auto-tags applied to my Upgraded URLs?**

  Auto-tagging appends the UTM tags at the end of the URL, after any URL parameters

  If there is no ? in the tracking template, then Microsoft Advertising will add ? and append UTM tags. In cases where the Final URL has a ? or if the customer’s website wants to force Microsoft Advertising to add an &, then:

  - You can add an & at the end of the tracking template. Microsoft Advertising will not add ? or & in this case and just append the UTM tags.
  - When the tracking template has an ?, Microsoft Advertising will add & and append the UTM tags.

- **How do I override my shared (account) tracking template?**

  Tracking templates can be set at the account, campaign, ad group, ad, keyword, and sitelink extension levels. When applying the tracking template, Microsoft Advertising will use the tracking template defined at the lowest level.

- **How do I override a custom parameter?**

  Custom parameters can be set at the campaign, ad group, text ad, keyword, and sitelink Eetension levels. When applying the tracking template, Microsoft Advertising will use the tracking template defined at the lowest level.

  To learn how set up custom parameters at each level, see [Can I use custom parameters?](hlp_BA_CONC_UpgradeURL_TrackTemplateCustomParam.md).

  **Example:**

  Overriding a campaign-level custom parameter at the keyword level

  Campaign: Sales has the following custom parameters:

  - {_promo} = april-sales
  - {_coupon} = 15OFF
  - {_market} = en-us

  If you want to change the coupon amount from 15% off to 25% off for specific keywords, you should define a keyword-level customer parameter {_coupon}=25OFF so that it will be substituted at the time of impression instead of 15OFF.

- **Does Upgraded URLs impact quality score?**

  If the landing page URL stays the same when you change from using destination URL to final URL, there will be no impact to quality score.

- **Can I use a tracking template with destination URL?**

  No. You need to make sure that you select **Final URL** as your landing page if you want to use a tracking template. Tracking templates don't work with destination URL.

- **How does Upgraded URLs impact standard text ads and Expanded Text Ads?**

  > [!IMPORTANT]
  > **Advertisers can no longer create new or edit existing Expanded Text ads or Standard Text ads. Standard Text ads stopped serving in February 2025.**[Learn more](hlp_BA_CONC_ResponsiveSearchAds.md)

  You can use Upgraded URLs (final URL + tracking template) with both standard text ads and Expanded Text Ads.

  | Type | Destination URL tracking | Upgraded URLs (final URL + tracking template) |
  | --- | --- | --- |
  | **Standard text ad** | ![Included](media/Global_Icon_CheckMark.png) | ![Included](media/Global_Icon_CheckMark.png) |
  | **Expanded Text Ad** | ![Not included](media/Global_Icon_Xmark.png) | ![Included](media/Global_Icon_CheckMark.png) |

  To learn more, see [FAQ: Expanded text ads](hlp_BA_CONC_EXTA_FAQ.md).

  You have the flexibility to use the different types of ads and tracking in the same campaign. Here is the order of precedence (from highest to lowest) regardless of ad type (standard or Expanded Text Ad) or URL type (destination or final URL):

  - Keyword Final URL
  - Keyword Destination URL
  - Ad Final URL
  - Ad Destination URL

- **How do {param1}, {param2}, and {param3} work with Upgraded URLs?**

  You can add {param1}, {param2}, and {param3} to both destination URLs and final URLs (Upgraded URLs).

  Here is the order of which URL + {param} will display when your ad is served (from highest to lowest):

  - Keyword Final URL
  - Keyword Destination URL
  - Ad Final URL<br> You can't use http://{param1}. In other words, in the Final URL box, “contoso.com/{param1}” is allowed, but just “{param1}” is not. {param1}, {param2}, and {param3} are also still allowed in ad titles and descriptions.
  - Ad Destination URL<br> If this is set as {param1}, Microsoft Advertising looks at the Keyword {param1} value when the ad is served.

- **Is there a difference between {Param 2} and {param2}?**

  Yes. You can't have a space. {Param 2} with a space is invalid. Capitalization doesn’t impact the tags. It only matters when using a variation of {Keyword} or {KeyWord}. To learn more, see [Dynamic text: Capitalization of the keyword placeholder](hlp_BA_CONC_AboutParametersKeyWord.md).

- **Is there a difference between {BidMatchType} and {MatchType}?**

  Yes these are two different URL parameters in Microsoft Advertising, which is different than Google Ads.

  - {MatchType} is the match type used to deliver an ad.
  - {BidMatchType} is the keyword bid match type.

  To learn more, see [What tracking or URL parameters can I use?](hlp_BA_CONC_UpgradeURL_URLParameters.md)

- **Can I have both destination URL and a final URL in my ad?**

  No. You can't have both a destination URL and a final URL associated with your ad. If you are using Microsoft Advertising Editor to upgrade your URLs, make sure you delete the URL in the destination URL column before you save the file. To learn more, see [What are Upgraded URLs and how do I upgrade?](hlp_BA_CONC_UpgradeURL_MigrateFAQ.md)
