---
title: Can I use {param1}, {param2}, and {param3} for keyword level tracking with upgraded URLs and final URLs?
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn what you can to do with param1, param2, and param3 when you change to final URLs.
---

# Can I use {param1}, {param2}, and {param3} for keyword level tracking with upgraded URLs and final URLs?

With upgraded URLs, you can set up keyword level tracking by creating a tracking template and then you don't have to use {param1}, {param2}, and {param3} anymore. Few points about tracking templates:

- You can create a tracking template at the account, campaign, ad group, ad, keyword, and sitelink extension level (highest to lowest).
- When your ad is served, the lowest level tracking template will be appended to your landing page URL.
- We recommend setting the tracking template at the account level so that it is applied to all campaigns, ad groups, ads, and keywords. To learn more, see [Create an account tracking template](hlp_BA_CONC_UpgradeURL_TrackTemplateGlobalParam.md)

If you still want to use {param1}. {param2}, and {param3] for keyword level tracking, you can add a {param} to a domain in the Final URL box, but you cannot have your Final URL be only a {param}.

## Example

In the Final URL box, “contoso.com/{param1}” is allowed, but just “{param1}” is not.

{param1}, {param2}, and {param3} are also still allowed in ad titles and descriptions. To learn more, see [Automatically customize your ads with dynamic text parameters](hlp_BA_CONC_AboutParameters.md).

## FAQ

- **How do I move existing {param1}, {param2}, or {param3} to final URLs?**

  You can export your {param1} {param2} or {param3}, separate the tracking information from the final URLs, and then upload using [Microsoft Advertising Editor](hlp_BA_CONC_AboutDesktop.md). In the instructions below, we will use {param1} but the same instructions apply to {param2} and {param3}.

  1. Open your Microsoft Advertising account in the latest version of Microsoft Advertising Editor.
  1. Select **Export** and then **Export whole account**.
  1. In the file, make sure you can see the **param1**, **Final URL**, and **Tracking template** columns. If you don't see the columns, you can add the columns to the file.
  1. In the **param1** column, copy the tracking portion of your {param1} and paste it into the **Tracking template** column. Then insert {lpurl} where your original landing page URL once appeared.
  1. In the **param1** column, copy the landing page portion of your {param1} and paste it into the **Final URL** column.
  1. Make sure that the landing page URL is set to the domain name of the display URL. For example, the “contoso.com” in “www.contoso.com”
  1. Delete the contents of the param1 column. This column should be empty before you import the file.
  1. Save the file.
  1. In Microsoft Advertising Editor, select **Import** and then **Import from file**.
  1. Verify that the Upgraded URL columns are correctly mapped to the Microsoft Advertising fields.
  1. Select **Post** to save the changes to Microsoft Advertising.

- **What is the precedence for how the URL is chosen by Bing?**

  Here is the order of which URL + {param} will display when your ad is served (from highest to lowest):

  - Keyword Final URL
  - Keyword Destination URL
  - Ad Final URL<br> You can't use http://{param1}.
  - Ad Destination URL<br> If this is set as {param1}, Microsoft Advertising looks at the Keyword {param1} value when the ad is served.
