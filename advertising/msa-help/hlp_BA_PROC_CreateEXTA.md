---
title: How to Create or Edit Expanded Text Ads
description: Expanded text ads are displayed on the Microsoft Search Network on computers, tablets, and smartphones. To help make editing text ads easier, you can make changes to multiple text ads at the same time.
ms.date: 5/30/2026
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
---

# How to create or edit expanded text ads

> [!IMPORTANT]
> - **Advertisers can no longer create new or edit existing Expanded Text ads or Standard Text ads.**
> - Existing Expanded Text ads continue to serve, and you can still view reports on their performance. You can still pause, enable, or remove your expanded text ads.
> - Standard Text ads stopped serving in February 2025.
> - We recommend upgrading your Expanded Text ads and Standard Text ads to Responsive Search ads. [Learn more](hlp_BA_CONC_ResponsiveSearchAds.md)

Expanded text ads contain three fundamental visual elements: the ad title (which can have up to three segments), the , and the ad text.

:::image type="content" source="media/BA_Misc_ExpandedTextAd.jpg" alt-text="An example of an expanded text ad.":::

You can further enhance your expanded text ad with [ad extensions](hlp_BA_CONC_AboutAdExtensions.md) and [Automated Extensions](hlp_BA_CONC_AutomatedExtensions.md).

## FAQ

- **Create a new expanded text ad**

  > [!NOTE]
  > Before you submit an ad, make sure it meets Microsoft Advertising policies, so it can be active and made available online as quickly as possible. To learn more, see [Microsoft Advertising policies](hlp_BA_CONC_EditorialGuidelines.md).

  1. From the navigation menu on the left, hover over **Campaigns** and select **Ads & extensions** > **Ads**.
  1. Select **Create ad**.
  1. Choose an **Ad group** from the dropdown list.
  1. For **Ad type**, select **Expanded text ad**.
  1. Enter your landing page URL in the **Final URL** box. **Note**: Your final URL — including prefix (e.g., "www."), suffix (e.g., ".com"), and any [tracking templates](hlp_BA_CONC_GoogleAnalytics.md) — must be no longer than 2,048 characters. However, your final URL *domain* (everything in your final URL before the first slash or tracking template) must be no longer than 67 characters.
  1. Enter three parts of your ad title, each up to 30 characters long. The third title is optional.
  1. Similarly, you can also enter two parts of the URL path customers will see in your ad, each up to 15 characters long.
  1. Enter the ad text to appear below the path, up to 180 characters long (up to two 90-character descriptions). The second description is optional.
  1. Select **Save**.

  > [!NOTE]
  > - The combined ad title and ad text must be at least three words long.
  > - These character limits include spaces and any default . [Learn more about dynamic text](hlp_BA_CONC_AboutParameters.md)
  > - If your final URL includes "http://", these characters do not count against the character limit. However, if it includes "https://", these characters *do* count against the character limit.
  > - Keep in mind that double-width characters — such as Chinese characters — count as two characters each.
  > - Ad titles, paths, and ad text cannot contain scripts, HTML, or other markup language.

- **Change an existing expanded text ad**

  1. From the navigation menu on the left, hover over **Campaigns** and select **Ads & extensions** > **Ads**.
  1. In the table, select the pencil icon ![pencil icon](media/BA_icon_edit.png) next to the ad you would like to change.
  1. Enter your changes.
  1. Select **Save**.

- **Edit multiple expanded text ads at once**

  1. From the navigation menu on the left, hover over **Campaigns** and select **Ads & extensions** > **Ads**.
  1. In the table, select the checkbox next to the ads you want to edit and select **Edit** > **Change ads**.
  1. To replace text in multiple ads:

     1. In the **Action** list, select **Find and replace text**, and then select the field in which you would like to replace the text.
     1. In the **Find** box, enter the text you want to replace.
     1. In the **Replace with** box, enter the new text you want to use.
     1. Select **Save**.
  1. To append text:

     1. In the **Action** list, choose **Append text**.
     1. Choose the field in which you want to append the text.
     1. In the **Append text** box, enter the text you want to add.
     1. Choose whether to add the text before or after existing text.
     1. Select **Save**.
  1. To change the case:

     1. In the **Action** list, choose **Change case**.
     1. Choose the field in which you want to change the case of the text.
     1. Choose whether you want the text to be title case, sentence case, or lowercase.
     1. Select **Save**.
  1. To change current ad text to entirely new ad text:

     1. In the **Action** list, choose **Set text**.
     1. Enter the new text you want to use for your ads.
     1. Select **Save**.

- **Create expanded text ads using Microsoft Advertising recommendations**

  If you have one or more ad groups that don't contain any active ads, you may receive an email or a notification letting you know we have recommendations for automatically created expanded text ads. The automatically created ads can be based on high-performing ads elsewhere in the campaign, paused ads in the ad group, or other factors. [See if you have any recommendations.](hlp_BA_CONC_Recommendations.md)

  > [!NOTE]
  > - By using recommendations, you will create basic expanded text ads and have the chance to customize their ad copy. If you want to set up [tracking or URL parameters](hlp_BA_PROC_UETv2MobileApp.md) for these ads, you will need to edit them in your **Ads** tab.
  > - Newly-created ads in this ad group will not start running immediately, as they will go through our standard review process. Most reviews are completed within a day.

To get more tips to make your ads more relevant to what users are looking for, see [About improving ad relevance](hlp_BA_CONC_AboutIncreasingAdRelevance.md). Improving your ads' relevance not only can increase your customer traffic (that all-important ), but can also improve their position on the Bing, AOL, and Yahoo search results pages and even improve your quality score.

> [!NOTE]
> You can also [copy expanded text ads from one ad group or campaign to another](hlp_BA_PROC_CopyPaste.md).

For more information on expanded text ads, see our [expanded text ads FAQ](hlp_BA_CONC_EXTA_FAQ.md).
