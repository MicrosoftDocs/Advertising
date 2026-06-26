---
title: Can I use custom parameters?
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Find out how to create custom parameters and add to a tracking template.
---

# Can I use custom parameters?

With Upgraded URLs, you can now add custom parameters to your tracking templates so that you can track what you want instead of being limited to using just the URL parameters that Microsoft Advertising provides. To learn more, see [What are Upgraded URLs and how do I upgrade?](hlp_BA_CONC_UpgradeURL_MigrateFAQ.md)

Custom parameters work exactly the same as URL parameters with respect to dynamic substitutions, except that you will define the parameter names and variables (also known as key and value pairs). To learn more, see [What tracking or URL parameters can I use?](hlp_BA_CONC_UpgradeURL_URLParameters.md)

You can define custom parameters for one or more campaigns, ad groups, ads, keywords, or sitelink extension and then add them to the corresponding tracking template. We recommend that you create custom parameters at the campaign level and then add them to your account level tracking template. To learn more, see [Create an account tracking template](hlp_BA_CONC_UpgradeURL_TrackTemplateGlobalParam.md)

## Let's look at an example:

Let's say you have customers in 3 different locations and you want to report on the number of searches from each location.

First you define a custom parameter for each market:

| Targeting market | Custom parameters |
| --- | --- |
| **New York, USA** | {_market}=ny-usa |
| **Seattle, USA** | {_market}=sea-usa |
| **Miami, USA** | {_market}=mia-usa |

| Targeting market | Sample landing page URL |
| --- | --- |
| **New York, USA** | http://contoso.com/?mkt=ny-usa&keyword={Keyword} |
| **Seattle, USA** | http://contoso.com?mkt=sea-usa&keyword={Keyword} |
| **Miami, USA** | http://contoso.com?mkt=mia-usa&keyword={Keyword} |

## Add or override custom parameters

> [!NOTE]
> If you change the parameter of your ad, it will go through a Microsoft Advertising editorial review before it can run. This review process can take up to 24 hours. If you have problems after the review of your ad, please [contact support](https://go.microsoft.com/fwlink/?linkid=398371).

- **Add custom parameters to a new ad or sitelink extension**

  1. From the navigation menu on the left, hover over **Campaigns** and select **Ads & extensions** > **Ads**.
  1. Select **Create ad** or **Create ad extension**.
  1. Under **Landing page URL**, select **Final URL** and enter the URL of your website.
  1. Select **Ad URL options** or **sitelink extension URL options**.
  1. Under **Custom parameters** first box, enter the name of the parameter.
  1. Under **Custom parameters** second box, enter the variable of the parameter.
  1. Under **Tracking template**, add the name and variable to the tracking template.
  1. Select **Save**.

- **Add custom parameters to an existing campaign or ad group**

  1. From the navigation menu on the left, hover over **Campaigns**, and then select either **Campaigns** or **Ad groups**.
  1. Select the name of the item you want to add a custom parameters to and then select **Settings**.
  1. Under **Advanced settings**, select **Campaign URL options** or **Ad group URL options**.
  1. Under **Custom parameters** first box, enter the name of the parameter.
  1. Under **Custom parameters** second box, enter the variable of the parameter.
  1. Under **Tracking template**, add the name and variable to the tracking template.
  1. Select **Save**.

- **Add custom parameters to an existing ad or sitelink extensions**

  1. From the navigation menu on the left, hover over **Campaigns** and select **Ads & extensions** > **Ads**.
  1. Select the **Edit** icon next to the ad or select the sitelink extension, select **Edit**, and then **Edit an extension**.
  1. Under **Landing page URL**, select **Final URL** and enter the URL of your website.
  1. Select **Ad URL options** or **Sitelink Extension URL options**.
  1. Under **Custom parameters** first box, enter the name of the parameter.
  1. Under **Custom parameters** second box, enter the variable of the parameter.
  1. Under **Tracking template**, add the name and variable to the tracking template.
  1. Select **Save**.

- **Add custom parameters to keywords**

  1. From the navigation menu on the left, hover over **Campaigns** and select **Keywords** > **Keywords**.
  1. Select the keywords you want and then select **Edit** and **Change landing page URLs**.
  1. Make sure the **Action** is set to Final URL and then enter the URL of your website in the **Final URL** box.
  1. Select **Save**.
  1. Make sure the keywords are still selected and then select **Edit** and **Change URL options**.
  1. Under **Custom parameters** first box, enter the name of the parameter.
  1. Under **Custom parameters** second box, enter the variable of the parameter.
  1. Under **Tracking template**, add the name and variable to the tracking template.
  1. Select **Save**.

- **Override a custom parameter**

  Custom parameters can be set at the campaign, ad group, text ad, keyword and sitelink extension level. When applying the tracking template, Microsoft Advertising will use the tracking template defined at the lowest level.

  To learn how set up custom parameters at each level, see [Can I use custom parameters?](hlp_BA_CONC_UpgradeURL_TrackTemplateCustomParam.md).

  **Example:**

  Overriding a campaign-level custom parameter at the keyword level

  Campaign: Sales has the following custom parameters:

  - {_promo} = april-sales
  - {_coupon} = 15OFF
  - {_market} = en-us

  If you want to change the coupon amount from 15% off to 25% off for specific keywords, you should define a keyword-level customer parameter {_coupon}=25OFF so that it will be substituted at the time of impression instead of 15OFF.
