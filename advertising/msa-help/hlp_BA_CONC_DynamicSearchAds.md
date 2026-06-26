---
title: About Dynamic Search ads
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn how Microsoft Advertising can generate keywords and ads for you automatically.
---

# About Dynamic Search ads

> [!NOTE]
> This feature is available in [all Microsoft Advertising markets](hlp_BA_CONC_Countries.md).

Dynamic Search ads (DSA) provide a streamlined, low-touch way to make sure customers searching on the [Microsoft Advertising Network](hlp_BA_CONC_AboutAdvertisingNetwork.md) find your products or services.

## Benefits of using Dynamic Search ads

Dynamic Search ads automatically target relevant search queries based on the content of your website, and are dynamically created to respond to these search queries. Using them will:

- **Create targeted and relevant ads automatically**: New, dynamically-created ads for every search query based on your website content, or specific pages or categories of your website.
- **Save time and reduce your workload**: No need to maintain keyword lists, manage bids, or update and customize ad titles.
- **Find missed opportunities**: Automatically adapt to new queries to drive additional conversions.

Dynamic Search ads are most appropriate for two types of advertisers:

- Advertisers who have a large catalog of webpages and a changing mix of products, making it difficult to manage Search ads for each product.
- Advertisers who are not familiar with Search advertising, but who want to quickly and easily try it out.

## How to set up Dynamic Search ads

Follow the steps below to enable Dynamic Search ads within existing Search campaigns.

### Existing Search campaigns

1. From the navigation menu on the left, hover over **Campaigns** and select **Settings** > **Settings**.
1. Select the appropriate campaign.
1. Under **Dynamic Search ads**, select the checkbox next to **Enable Dynamic Search ads**.

   > [!NOTE]
   > It's not possible to disable this setting once enabled or edit the website that's been entered. Advertisers need to create a new campaign or delete their old one if they no longer wish to run Dynamic Search ad assets to target that specfic website.
1. Select **Save**.

Next, you need to create a Dynamic ad group to start serving Dynamic Search ads. For more information about creating Dynamic ad groups, see [How do I create a Search campaign?](hlp_BA_PROC_Create1stAd.md)

> [!IMPORTANT]
> Once you create your Search campaign with Dynamic Search ads, it usually takes less than one week before your ads start to serve, but in some cases it can take up to ten days.

<a id="what-you-need-to-know-about-dynamic-ad-targets"></a>

## What you need to know about dynamic ad targets

> [!NOTE]
> We recommend that your dynamic ad targets and campaign website have the same domain.

> [!NOTE]
> For more information about the delivery status for dynamic ad targets, see [Delivery status](hlp_BA_CONC_EditorialStatus.md).

> [!NOTE]
> We recommend using IndexNow to boost the performance of ads using dynamic ad targets. IndexNow helps maintain relevancy and accuracy for your ads by expediting indexing. To learn more about IndexNow, see [Using IndexNow to enhance ad performance](hlp_BA_CONC_IndexNow.md).

- **Target recommended categories**: Microsoft Advertising will analyze your website and then categorize its content. You can then select which categories you want to target and we will automatically generate keywords and ads from them. This is a good idea if you want to keep the Dynamic Search ads focused on a particular theme or you want to set different bids for different parts of your website.
- **Target all webpages**: Microsoft Advertising will look at content from all pages of your website in order to generate keywords and ads.
- **Target specific webpages**: You choose specific pages of your website to target based on their URL, category, page title, or page content. This is a good idea if you want to set different bids for different parts of your website or to make sure you're not targeting parts of your website that are not relevant to your campaign goal.

  - **Exact URLs**: Enter or paste your webpages' exact URLs, one URL per line.
  - **Rules**: Use the “contains” operator to target URLs, categories, page titles, or page content that contains specific words or a specific sequence of characters. If you use the "and" condition (for example, URL contains "food" and URL contains "delivery"), make sure that you have webpages that meet all the specified conditions on your website.
  - A "page title" is the text that appears at the top of a webpage—in your website's code, it's the text in this area:

    ```
    <head>
      <title>This is the page title</title>
    </head>
    ```
  - "Page content" is the visible text on a webpage—in your website's code, it's the text between these tags:

    `<body></body>`
- **Negative dynamic ad targets**: In the **Dynamic ad targets** tab, you have the option to select **Negative dynamic ad targets**. Negative dynamic ad targets allow you to target specific webpages to exclude at campaign or ad group level. <br> <br> To select your **Negative dynamic ad targets**, follow these steps: From the navigation menu on the left, hover over **Campaigns** and select **Dynamic ad targets** > **Negative dynamic ad targets**. Then, you can choose to target specific pages of your website to exclude based on their URL, category, page title, or page content.

  - **Exact URLs**: Enter or paste your webpages' exact URLs that you want to exclude, one URL per line.
  - **Rules**: Use the “contains” operator to exclude URLs, categories, page titles, or page content that contains specific words or a specific sequence of characters. If you use the "and" condition (for example, URL contains "food" and URL contains "delivery"), make sure that you have webpages that meet all the specified conditions on your website.

> [!IMPORTANT]
> Once an auto target has been created, its conditions cannot be changed.

## What you need to know about ad content

- When you create your ad, you do not need to write your ad title. Microsoft Advertising will dynamically generate this for you based on the appropriate keyword and your website content. Optionally, you can supply an ad title using [page feeds](hlp_BA_CONC_DynamicSearchAds_PageFeeds.md).
- Because Dynamic Search ads generate ad content based on your website, we recommend that you use IndexNow to expedite your website’s indexing and help maintain accuracy and relevancy for your ads. To learn more, see [Using IndexNow to enhance ad performance](hlp_BA_CONC_IndexNow.md).
- You have the option to include one or two paths to appear after your website's domain. The path is distinct from the final URL. The final URL is the actual webpage URL that customers are taken to after they select your ad. The path can be a shorter or "friendlier" version of your URL showing one or two subdirectories. For example, if you sell men's clothes, and you're advertising shirts that are on sale for spring, your final URL might be http://www.contoso.com/content/en/clothesaccessories/spr2017/shirts, but your path could simply be contoso.com/SpringSale/Shirts.

## Tips for effective Dynamic Search ads

- **Setup**

  - Set bids close to your non-exact match bids for similar keyword categories.
  - Create different ad groups for different dynamic ad targets.
  - Create a **Target all webpages** ad group in addition to narrower targets to capture as many relevant searches as possible.
  - Ensure that the tag NoIndex is not present in the domain or in any URL that the auto targets are referencing.
  - Ensure that the campaign, ad group, and ad are all set in the same language. Also, the language set for the campaign, ad group, and ad should match the language of the domain.

- **Auto targets**

  - Exclude parts of your site that don't drive conversions.
  - Have a variety of auto targets—using **Target categories of webpages** is a good way to find appropriate ones.
  - Use more generic ad descriptions and URL paths for ads in ad groups using **All webpages** auto targets.
  - Create auto targets from your main domain URL. Do not set up auto targets using URLs that redirect to other pages.
  - The domain address you specify during campaign creation should be the same domain address you used to create auto targets for that campaign.
  - We recommend *not* including "http://www" or "https://www" in auto targets.
  - With **Target specific webpages**, if you use the "and" condition (for example, page title contains "food" and URL contains "delivery"), make sure that you have webpages that meet all the specified conditions on your website.
  - When targeting Exact URLs in your site, please ensure that you use your webpage's canonical URL. Otherwise, the auto target won't build website coverage. Website coverage is the percentage of your website represented by pages that are targeted by the rule (e.g., Exact URLs). If you don't know the canonical URL, contact your webmaster. If you haven't specified one, Bing will decide how to index that particular website. To learn more about Bing indexing, see [Common questions about Dynamic Search ads](#common-questions-about-dynamic-search-ads).

- **Optimization**

  - Add paused keywords and current negative keywords in your other campaigns as negative keywords in your Dynamic Search ads ad groups.
  - Use [ad extensions](hlp_BA_CONC_AboutAdExtensions.md) to make your ads more eye-catching.
  - Use [remarketing lists](hlp_BA_CONC_Audiences_CreateAudience.md) to target people who have visited your website before.
  - Add [exclusions](hlp_BA_PROC_AddExclusions.md) to prevent your ads from appearing in specific locations, on specific web sites within the [Microsoft Advertising Network](hlp_BA_CONC_AboutAdvertisingNetwork.md), or prevent your ads from displaying to certain IP addresses.
  - Dynamic Search ads could lead to higher traffic, so keep an eye on your budget and don't let it run out.

- **Reports**

  - To understand how your auto targets are performing and where bid adjustments may be useful, run a **Dynamic Search ad auto target** report.
  - To check the performance of your existing category or to find new categories worth targeting, run a **Dynamic Search ad category** report.
  - To see how your ads perform against search terms, run a **Dynamic Search ad search term** report. The data can help you find negative keywords that create conversions.

- **Delivery**

  To ensure that your Dynamic Search ads are delivering properly, follow these guidelines:

  - Verify that your Dynamic ad groups and ad group entities (i.e., dynamic ad targets) are enabled, active, and eligible to serve by reviewing the [Delivery column](hlp_BA_CONC_EditorialStatus.md).
  - Make sure your campaign budget is high enough and isn't placed on [budget pause](hlp_BA_DEFN_BudgetPaused.md). You can review your [change history](hlp_BA_CONC_ChangeHistoryGraph.md) to see how often the campaign's budget is paused. To learn more about fixing a budget pause, see [Fix the Campaign out of budget/Budget pause status](hlp_BA_PROC_AlertBudgetDepleted.md).
  - Ensure that your dynamic ad targets are receiving impressions by reviewing the **Impr.** column in the dynamic ad targets grid: From the navigation menu on the left, hover over **Campaigns** and select **Dynamic ad targets** > **Dynamic ad targets**. Then, review the **Impr.** column.
  - Check that your dynamic ad target bids are comparable to your bids for Standard ad groups that use [broad match or phrase match](hlp_BA_CONC_MatchOptions.md). You can verify your dynamic ad target bids by reviewing the **Bid** column in the dynamic ad targets grid: From the navigation menu on the left, hover over **Campaigns** and select **Dynamic ad targets** > **Dynamic ad targets**. Then, review the **Bid** column.
  - Check for negative dynamic ad targets that might be blocking your Dynamic Search ads from serving: From the navigation menu on the left, hover over **Campaigns** and select **Dynamic ad targets** > **Negative dynamic ad targets**. Then, look for negative dynamic ad targets that might block your targeted content.
  - Verify that your ad text is relevant for your dynamic ad targets. This helps drive clicks and conversions.

<a id="common-questions-about-dynamic-search-ads"></a>

## Common questions about Dynamic Search ads

- **How do you determine what content is on my website? And what if you're not finding certain parts of my website?**

  Your website's content is analyzed by Bing's web-crawling technology. We crawl any webpage that is in Bing's index. It's important that Bing finds and indexes your site to have the opportunity to generate ads. You can help Bing find all of your pages by automatically notifying Bing about all your added, updated, and deleted web pages via the [IndexNow](https://go.microsoft.com/fwlink/?linkid=2251313) protocol. Make sure to update your sitemaps with [lastmod](https://go.microsoft.com/fwlink/?linkid=2250898) once per day and submit them in the [Bing Webmaster Tools Sitemap tool](https://go.microsoft.com/fwlink/?linkid=2251314).

  If you suspect that some parts of your website are not being found by our web crawler, take a look at [this Bing Webmaster article](https://www.bing.com/webmaster/help/why-is-my-site-not-in-the-index-2141dfab) for information on why this might be the case and what you can do to fix it.

  You can review more best practices guidelines at [Bing Webmaster Guidelines](https://go.microsoft.com/fwlink/?linkid=2251054).

- **Will Dynamic Search ads work with existing ad extensions and Automated Extensions?**

  Yes, Dynamic Search ads will work with all existing [ad extensions](hlp_BA_CONC_AboutAdExtensions.md) and [Automated Extensions](hlp_BA_CONC_AutomatedExtensions.md).

- **Will remarketing lists work with Dynamic Search ads?**

  Yes, remarketing lists can be associated to ad groups containing Dynamic Search ads. [Learn more about remarketing lists](hlp_BA_CONC_Audiences_CreateAudience.md)

- **Can I add tracking templates and custom parameters to Dynamic Search ads?**

  Yes, tracking templates and custom parameters are supported at the campaign, ad group, ad, and auto target levels. [Learn more about tracking templates](hlp_BA_CONC_UpgradeURL_TrackTemplateGlobalParam.md)

- **Can I use auto-tagging with Dynamic Search ads?**

  Yes, auto-tagging is supported for Dynamic Search ads. [Learn more about auto-tagging](hlp_BA_CONC_AutoTag.md)

- **Where can I find information about the delivery status for my dynamic ad targets, so I can ensure that they're operating correctly and are available to be displayed?**

  To learn more about the delivery status for your dynamic ad targets, see [Delivery status](hlp_BA_CONC_EditorialStatus.md).

## Related videos

- [Which ad type is right for me?](https://www.youtube.com/watch?v=Egn71qDLEeQ)
- [Which campaign type is right for me?](https://www.youtube.com/watch?v=cCM5BUpSJ38)
