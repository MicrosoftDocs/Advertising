---
title: Why am I not recording conversions or tracked revenue?
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Not seeing conversions after setting up conversion tracking? Troubleshoot issues here.
---

# Why am I not recording conversions or tracked revenue?

> [!IMPORTANT]
> Ensure proper consent transmission for users visiting from the European Economic Area (EEA), the United Kingdom, and Switzerland by implementing [Consent Mode](hlp_BA_CONC_UET_Consent.md) or the [Transparency and Consent Framework (TCF)](hlp_BA_CONC_UET_TCF.md) with your UET tags to avoid any negative impact on conversion attribution and remarketing segments. This policy reflects the requirements of the EU ePrivacy Directive and the General Data Protection Regulation (GDPR). [Learn more](hlp_BA_CONC_UET_ConsentFAQ.md)

If you have [conversion tracking](hlp_BA_CONC_UETv2WhatIsCT.md) set up, but you aren't finding conversions or tracked revenue in Microsoft Advertising, follow this troubleshooter.

## Before anything else, check these two things

- **Has it been more than 24 hours since you set up this UET tag or this conversion goal?** <br> It can take up to 24 hours for Microsoft Advertising to receive data from a new UET tag or conversion goal. Wait until 24 hours have passed and check again.
- **What is your conversion goal's tracking status?** <br> From the navigation menu on the left, hover over **Conversions** and select **Conversion goals**. and check the **Tracking status** column for this conversion goal.

  - Tracking status is **"Unverified"** or **"Tag inactive"**: Follow the steps in next section of this article.
  - Tracking status is **"No recent conversions"**: Follow the steps in [Tracking status is "No recent conversions"](#tracking-status-is-no-recent-conversions) of the article.

## Tracking status is "Unverified" or "Tag inactive"

### Have you added the UET tag to your website's code?

| Column 1 | Column 2 |
| --- | --- |
| ****No**** | Your UET tag must be inserted into the code of each page of your website for conversion tracking to work. For instructions, refer to the "Add the tag to your website" section of [this article](hlp_BA_CONC_UET_Setup_Master.md). |
| ****Yes**** | There are three likely scenarios: <br> - You didn't add the UET tag to every page of your website.<br>- You didn't add the UET tag correctly.<br>- You added the wrong UET tag. <br> To investigate, use the UET Tag Helper browser extension: UET Tag Helper doesn't capture custom events for code-free conversions. Install the browser extension following the instructions in [this article](hlp_BA_CONC_UET_TagHelper.md). In Microsoft Edge or Google Chrome, go to a webpage that features a conversion event for your goal, and then select the UET Tag Helper icon. In UET Tag Helper, flip the switch to **On**, refresh the browser page, and then select the UET Tag Helper icon again. Review the UET Tag Helper icon status. The number shows how many times there was a UET tag request from the webpage and the number's surrounding color shows the status. <br> - ![UET Tag Helper icon showing no tags on webpage](media/BA_ScreenCap_UEtTagManagerNoTags.png) : If no number appears, either there is no UET tag in the webpage's code or there is an incorrectly installed UET tag. Review your webpage's code and make sure your UET tag is installed properly.<br> - ![UET Tag Helper icon showing number of valid tags](media/BA_ScreenCap_UETTagManagerGoodTags.png) : If you see a green number, there is a functioning UET tag on the page, but it may be the wrong UET tag. Select the browser extension and check the **Tag ID**. If it doesn't match the UET tag ID you're expecting, update the ID in either your conversion goal or the UET tag in your website's code. <br> - ![UET Tag Helper icon showing number of tags with issues](media/BA_ScreenCap_UETTagHelperYellowTag.png) ![UET Tag Helper icon showing number of tags that are not valid](media/BA_ScreenCap_UETTagHelperRedTag.png) : If you see a yellow or red number, there are issues with the UET tag. Select the browser extension, verify that the **Tag ID** matches the UET tag ID you're expecting to be used, and then follow the instructions in the helper. |

<a id="tracking-status-is-no-recent-conversions"></a>

## Tracking status is "No recent conversions"

- **First, check your conversion goal settings**

  - **Where to find conversion goal settings**

    1. From the navigation menu on the left, hover over **Conversions** and select **Conversion goals**.
    1. Select the conversion goal you want to check.
    1. Select **Edit** > **Edit goal**.
    1. Select **Next** to get to the **Goal details** page.

  - **Is the goal scoped to the correct account?**<br> For **Scope**, verify that this conversion goal is scoped to the account in which you're expecting to see conversions.
  - **Is the goal's conversion window constraining you?**<br> For **Conversion window**, verify that your window is wide enough to reasonably expect conversions. (Keep your conversion window setting in mind as you go on to the next step.)
  - **Is your conversion goal enabled?** <br> From the navigation menu on the left, hover over **Conversions** and select **Conversion goals**. and check the **Status** column for this conversion goal. If its status is **Paused**, change it to **Enabled**.

- **Second, verify you're getting enough clicks**

  1. From the navigation menu on the left, hover over **Campaigns** and select **Overview**.
  1. In the **Performance** tile, check how many clicks you've received in your goal's conversion window.
  1. Consider: Are you getting enough clicks to reasonably expect conversions?

     1. If you're not, try improving your ads, building up your keyword lists, or widening your targeting. Learn more about [creating effective ads](hlp_BA_CONC_AboutWritingEffectiveAds.md) and [improving keyword lists](hlp_BA_CONC_NewAd_BuildCampaign_Keywords.md).
     1. If you are, continue to the next step.

- **Third, test your conversion goal with UET Tag Helper**

  > [!IMPORTANT]
  > UET Tag Helper doesn't capture custom events for code-free conversions.

  UET Tag Helper can now test your conversion goals. Show it which conversion you want to test and then navigate your website, and it will tell you what conversion events it records and what problems it encounters.

  1. Make sure you have UET Tag Helper installed. If not, follow the instructions in [this article](hlp_BA_CONC_UET_TagHelper.md).
  1. From the navigation menu on the left, hover over **Conversions** and select **Conversion goals**.
  1. Hover over the **Tracking status** for this conversion goal and select **Test this conversion goal**.
  1. Select the UET Tag Helper icon in your browser's extension menu.
  1. Enter your landing page URL in the helper and select **Start test**.
  1. Navigate through your website and attempt to trigger your conversion goal event.
  1. When you see either **Conversion found** or **Problem encountered**, select **View report** for a summary of what was passed back to Microsoft Advertising.
  1. For the **Problems encountered**, follow the instructions in the report to fix the issues.
  1. Wait at least 24 hours and then check to see if you're recording conversions and variable revenue accurately.
