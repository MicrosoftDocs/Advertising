---
title: About Performance Max Page Feeds
description: Learn all about page feeds for Performance Max.
ms.date: 5/30/2026
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
---

# About Performance Max page feeds

> [!NOTE]
> You can set up and manage your page feeds with our API. [Learn more](https://go.microsoft.com/fwlink/?linkid=2271908)

Page feeds let you specify which URLs your Performance Max campaigns should use with a spreadsheet. This helps ensure that we're indexing the URLs provided to enhance ad relevancy and drive performance.

After you [upload your page feed](#UploadFeed) and [associate it with your campaign](#associate-a-page-feed-with-your-campaign), we determine where your ads will direct customers. **Final URL expansion** and **URL rules and custom labels** control how URLs are selected:

- **Final URL expansion enabled:** This campaign setting expands the number of available URLs to use in ads to maximize performance and relevance. Ads may use any relevant URLs from your website, including those specified in your page feed. <br>

  > [!NOTE]
  > When enabled, this setting may replace your Final URL with other relevant URLs on your website.
- **Final URL expansion disabled:** This campaign setting limits the number of available URLs to use in ads. Ads only use URLs from your page feed and your asset group's Final URL.
- **URL rules and custom labels:** This asset group setting allows you to target certain webpages on your website. URL rules send traffic to the most relevant pages of your website when it's likely to result in better performance. Custom labels are associated with your page feeds and allow you to focus on specific categories of pages to help generate relevant ads. See [Associate a page feed with your campaign](#associate-a-page-feed-with-your-campaign) to learn more about how to add URL rules and custom labels.

See [Associate a page feed with your campaign](#associate-a-page-feed-with-your-campaign) for instructions on how to enable or disable **Final URL expansion**.

Review this table to learn more about how we select URLs used in ads:

| Page feed associated | Final URL expansion enabled | URLs used in ads |
| --- | --- | --- |
| **No** | No | The asset group's Final URL only |
| **Yes** | No | Page feed URLs and the asset group's Final URL |
| **Yes** | Yes | Page feed URLs and other relevant pages from your website |

## Get started

- **Create a page feed file**

  You can download the page feed template or create a CSV, TSV, XLS, or XLSX file that contains the following two columns:

  | Column | What it is | What you need to know |
  | --- | --- | --- |
  | **Page URL** | Contains the URLs of your website to include in the feed. | Enter one URL per row. URLs must start with *https://* or *http://*. |
  | **Custom label** | Labels that allow you to group the URLs within the feed. | - Enter one or more labels per row, separated by a semicolon.<br>- A maximum of 10 custom labels can be added per feed item (row).<br>- This column is required in the upload but does not need to be populated. |

  > [!NOTE]
  > You can have 100 feeds per account (this maximum number includes all feed types) and the maximum number of feed items (rows) per account is five million.

<a id="UploadFeed"></a>

- **Upload a page feed file**

  1. From the navigation menu on the left, select **Tools** > **Business data** > **Page feeds**.
  1. Select **Upload**.
  1. Enter the **Name** of your feed file and choose the file to upload.
  1. Select **Upload and apply**.

<a id="AssociateFeed"></a>

## Associate a page feed with your campaign

You can associate a page feed during campaign creation or in your campaign settings:

## FAQ

- **Campaign creation**

  1. From the navigation menu on the left, select **Create**.
  1. Choose **Drive conversions** or **Sell products** as your campaign goal.
  1. Select **Performance Max**.
  1. Below **Political advertising declaration**, you need to declare whether your campaign is intended for political advertising. If your campaign isn't intended for political advertising, select the checkbox next to **By selecting Continue, I confirm that this campaign is not intended for political advertising**. Otherwise, you must remove any political advertising from your campaign and then proceed. [Learn more about how we define political advertising.](hlp_BA_CONC_Policy_RestrictedPolitical.md)
  1. Select **Continue**.
  1. (Optional) Select a Merchant Center store and add your product settings.
  1. Add your asset group settings.
  1. Under **URL rules and custom labels**, you can add URL rules and custom labels to target certain webpages on your website. URL rules send traffic to the most relevant pages of your website when it's likely to result in better performance. Custom labels are associated with your page feeds and allow you to focus on specific categories of pages to help generate relevant ads.

     > [!NOTE]
     > When a page feed is associated with your campaign and no URL rules are added, your ads will only use the URLs provided in your page feed which contain your asset group's **Final URL**. For example, if your asset group's **Final URL** is *contoso.co.dk/teahouse* and your page feed is formatted as *contoso.co.dk/tea/herbal*, we won't be able to match them and won't deliver any ads. [Learn more about adding URL rules and custom labels](#adding-url-rules-and-custom-labels-to-your-asset-group).
  1. Choose your **Start and end dates**.
  1. Select **Save & go to next step**.
  1. Choose your targeting settings.
  1. Add your campaign details.
  1. Under **Autogenerated assets** in your **Advanced campaign settings**, enable or disable **Final URL expansion** by selecting or clearing the checkbox.
  1. Under **Page feeds**, choose the page feed you want to associate with your campaign from the dropdown menu.
  1. Choose other campaign settings.
  1. Select **Save & go to next step**.
  1. Choose your budget settings.
  1. Select **Save & go to next step**.
  1. Review your campaign summary.
  1. Select **Go live** or **Don't go live**.

- **Campaign settings**

  1. From the navigation menu on the left, hover over **Campaigns** and select **Campaign settings**.
  1. Select the appropriate Performance Max campaign.
  1. Under **Autogenerated assets** in your **Advanced campaign settings**, enable or disable **Final URL expansion** by selecting or clearing the checkbox.
  1. Under **Page feeds**, choose the page feed you want to associate with your campaign from the dropdown menu.
  1. Select **Save**.

<a id="AddingRulesLabels"></a>

## Adding URL rules and custom labels to your asset group

- **URL rules**: Use the “contains” operator to target URLs, categories, page titles, or page content that contains specific words or a specific sequence of characters. If you use the "and" condition (for example, URL contains "food" and URL contains "delivery"), make sure that you have webpages that meet all the specified conditions on your website.
- A "page title" is the text that appears at the top of a webpage in your website's code. It's the text in this area:

  ```
  <head>
    <title>This is the page title</title>
  </head>
  ```
- "Page content" is the visible text on a webpage in your website's code. It's the text between these tags:

  `<body></body>`
- **Custom labels**: Use custom labels from your page feeds to specify which categories of pages you want to target to help generate ads. Add custom labels from your page feed if you want your asset group to locate URLs from your page feed. To use custom labels, you must associate a page feed with your campaign.
