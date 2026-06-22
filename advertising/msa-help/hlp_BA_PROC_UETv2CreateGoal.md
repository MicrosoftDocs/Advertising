---
title: How Do I Create a Conversion Goal?
description: Learn how to create a conversion goals that allows you to track how many times a certain action, called conversion, happens after someone clicks on your ad.
ms.date: 5/30/2026
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
---

# How do I create a conversion goal?

> [!IMPORTANT]
> Ensure proper consent transmission for users visiting from the European Economic Area (EEA), the United Kingdom, and Switzerland by implementing [Consent Mode](hlp_BA_CONC_UET_Consent.md) or the [Transparency and Consent Framework (TCF)](hlp_BA_CONC_UET_TCF.md) with your UET tags to avoid any negative impact on conversion attribution and remarketing segments. This policy reflects the requirements of the EU ePrivacy Directive and the General Data Protection Regulation (GDPR). [Learn more](hlp_BA_CONC_UET_ConsentFAQ.md)

> [!IMPORTANT]
> For conversion goals to work, Microsoft Advertising needs to be able to collect data from your website. This requires [Universal Event Tracking (UET)](hlp_BA_CONC_UETv2WhatIsTag.md).

You create a conversion goal to track actions people take on your website after they click on your ad. When the action matches your conversion goal, it is counted as a conversion.

> [!NOTE]
> There are two ways to create a conversion goal: Simplified conversion goal setup and manual conversion goal setup.


- **Simplified conversion goal setup**

  > [!NOTE]
  > - Not everyone has this feature yet. If you don't, don't worry—it's coming soon!
  > - Ensure your UET tag is functioning properly before simplified conversion goal setup. [Learn more about testing your UET tag with UET Tag Helper](hlp_BA_CONC_UET_TagHelper.md).
  > - You need to set your UET tag up across all your pages (e.g., your purchase confirmation page).
  > - Automated bid strategies require “Optimize campaign performance” to be enabled in the conversion goals setting. Your campaign performance is dependent on accurate conversion tracking. [Learn more about auto-bidding](hlp_BA_CONC_BidStrategy_Portfolio.md).

  With simplified conversion goal setup, you can select events of interest, automatically detect those events on your website, and suggest which ones to track as conversions. This eliminates the need for selecting events manually and simplifies your workflow since you will not need to use code for any configuration. Button clicks, purchases, checkouts, and subscriptions can all be detected.

  To use simplified conversion goal setup, you only need to set up a UET tag on your website, and review and accept the automatically detected events that you'd like to track as conversions. [Learn more about setting up a UET tag](hlp_BA_CONC_UET_Setup_Master_2.md).

  > [!IMPORTANT]
  > - Simplified conversion goal setup doesn't currently support variable revenue tracking. To enable that functionality, manual conversion setup is still required.
  > - Simplified conversion goal setup doesn't apply to App stores or Offline conversions. If you want to set up App store or Offline conversion goals, please use manual conversion goal setup.

  ## Simplified conversion goal setup for a new goal

  1. Select **Conversions** > **Create goals**.
  1. Select **Business website** to track conversions on your website.
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
  > Once you complete simplified conversion goal setup, you can continue with the campaign creation workflow. [Learn more](hlp_BA_CONC_Redesign.md).

  **Not all website langauges are currently supported**

  You can only use simplified conversion goal setup with websites in the following languages: Arabic, Bulgarian, Chinese, Croatian, Czech, Danish, Dutch, English., Finnish, French, Georgian, German, Greek, Hebrew, Hindi, Hungarian, Indonesian, Italian, Japanese, Korean, Latvian, Lithuanian, Norwegian, Norwegian Bokmål, Persian, Polish, Portuguese, Romanian, Russian, Serbian, Slovak, Slovenian, Spanish, Swedish, Thai, Turkish, Ukrainian, Vietnamese. For all other languages, you should [setup your conversion goals manually](hlp_BA_PROC_UETv2CreateGoal.md).

- **Manual conversion goal setup**

  1. From the navigation menu on the left, hover over **Conversions** and select **Conversion goals**.
  1. Select **Create**.
  1. Select **Business website** to track conversions on your website.
  1. Select **Next**.
  1. Choose a [goal category](hlp_BA_CONC_UET_GoalCategory.md) from the dropdown menu and then choose a [goal type](hlp_BA_CONC_UETv2CTGoalType.md).
  1. Enter a name for your goal in the **Goal name** box. When naming your goal, use a descriptive name that makes sense to you. (For example, "Checkout page".) Please note that after you choose a name for your conversion goal, the same name may not be used again in the future.
  1. Fill in the appropriate values for your selected goal type.
  1. If you want to add a monetary value for each conversion, select one of the following from the **Revenue**, dropdown menu:

     - **Each conversion action has the same value**, and then enter the amount and select the currency (if available). This is a static revenue value that doesn't change.
     - **Conversion action value may vary (for instance, by purchase price)**, and then enter the default amount and select the default currency (if available) to be used when no value is received for a conversion. The revenue value will change based on the customization you make to the UET tag tracking code that you add to your website. To learn more, see [How to report variable revenue with UET](hlp_BA_CONC_UETv2RevenueVariables.md). This option is only available for destination URL and event conversion goals.
  1. Fine-tune your conversion goal with **Advanced settings**:

     - Set the **Scope** of this goal to all accounts or a specific account.
     - Change how you **Count** your conversions. [Learn more](hlp_BA_CONC_UETv2Count.md).
     - Enter a **Conversion window** to track up to 90 days in the past.
     - Set a **View-through conversion window** to track conversions that occur in this period of time after a customer views (but doesn't click) your ad. [Learn more about view-through conversions](hlp_BA_CONC_ViewThroughConv.md).
     - Check or clear the **Include in "Conversions"** checkbox depending on whether or not you want the tracked conversions to optimize your campaigns under the current account. Learn more about ["Conversions" versus "All conversions"](hlp_BA_CONC_ConvsVsAllConvs.md).
  1. Select **Next**.
  1. Select the UET tag that you want to associate with this conversion goal (not applicable to offline conversions).
  1. Choose an answer for **Do you have this UET tag installed on your website?**

     > [!NOTE]
     > If you choose either **No, this UET tag is not installed on all your website pages** or **I’m not sure. I need instructions to install the tag**, select **Install the tag yourself** or **Send the tag to a developer**. Select **Next** and follow the onscreen instructions. Select **Next** to finish setting up the conversion goal. [Learn more about adding a UET tag to your website](hlp_BA_PROC_UETv2AddTag.md).
  1. Select **Save and next**.
  1. For **Custom Event** goals, specify when you want to track this event (choose **Track event on inline action** or **Track event on page load**). Follow the provided instructions to set up the event tag on your website.
  1. (Optional) In the resulting **Conversion goal created!** message, select **test the goal now** to use the UET Tag Helper browser extension to verify that your goal is working correctly. [Learn more about UET Tag Helper](hlp_BA_CONC_UET_TagHelper.md).

  > [!NOTE]
  > - When you create a conversion goal, Microsoft Advertising automatically enables auto-tagging of Microsoft Click ID, as this is required for UET conversion goals and improves the accuracy of conversion tracking. When a customer clicks your ad, Microsoft Advertising automatically appends a unique click ID to the landing page URL. (For example, your final URL becomes www.contoso.com/?msclkid=123abc.) UET uses the cookie on your website’s domain to capture the click ID that brought the customer to your website, thereby allowing you to track the conversion. Each ad click is tied to a unique click ID. To disable auto-tagging of Microsoft Click ID, from the navigation menu on the left, hover over **Campaigns** and select **Settings** > **Account level options** and clear the **Add Microsoft Click ID (MSCLKID) to URLs to allow conversion tracking** checkbox. Doing so will make it impossible to import offline conversions and hinder accurate conversion tracking data.
  > - To see the complete list of currencies available for conversion goals, see [Conversion Goal Revenue Currencies](https://go.microsoft.com/fwlink/?linkid=2212012).
  > - Microsoft Advertising matches UET logs with strings defined in destination URL and custom event goals in a case insensitive way. For example, you can create a Destination URL goal type to track visits to your Thankyou.html page as conversions using the condition URL contains tHANKYOU.HTML
  > - You can also create a conversional goal by applying our **Create conversion goal** recommendation in the **Recommendations** tab. Based on data from your UET tag, Microsoft Advertising will recommend relevant conversion goals to track valuable customer actions on your website. In the default setting, the recommended goal is included in "Conversions" and will affect any enabled automated bidding strategies.

### How to edit a manually created conversion goal

1. From the navigation menu on the left, hover over **Conversions**, then select **Conversion goals**.
1. Select the goal name of the manually created conversion goal you want to edit.
1. From the goal details menu, update the **goal category** and **goal type** as needed.
1. Select **Next** to continue through the remaining menus.
1. When you reach the **All done!** page, select **Done** to save your changes.

> [!NOTE]
> > [!NOTE]
> > You can’t edit the conversion goal type or conversion goal details for auto-created goals using the simplified setup. A goal category can’t be deleted—only changed. To delete a specific goal category, you must delete the entire conversion goal. This will permanently remove all historical data associated with that goal.

## Conversion value rules

Conversion value rules allow you to adjust your conversion values if the conversion meets certain conditions that may be relevant to your business goals. You can set conditions for locations, devices, and audiences. [Learn more about conversion value rules.](hlp_BA_CONC_UET_ConversionValueRules.md)

1. From the navigation menu on the left, hover over **Conversions** and select **Conversion goals**.
1. Select the **Conversion value rules** tab.
1. Select the **Create conversion value rule** button.
1. Enter a name for the conversion value rule.
1. Select the primary condition of the rule.

   1. Select the type of condition.

      - For a location condition, select **All available countries/regions** or **Let me choose specific locations**.

         - If you select **Let me choose specific locations**, enter a location name in the **Search for location** text box.
         - Select whether you want to target the location or exclude the location.

            > [!NOTE]
            > Select **Remove all** to remove any selected locations and start over.
         - Under **For locations you want to include, adjust values for**, select **People in your targeted locations** or **People searching for or viewing pages about your targeted locations**.
         - Under **For locations you want to exclude, select values for**, select **People in your targeted locations** or **People searching for or viewing pages about your targeted locations**.
         - Choose a **Value adjustment** by selecting **Add** or **Multiply** and entering the adjustment and selecting the currency.
      - For a device condition, select **Desktop**, **Tablet**, **Mobile**, or some combination of those to target those devices.
      - For an audience condition, select **All available audiences** or **Let me choose specific audiences**.

         - If you select **Let me choose specific audiences**, select at least one audience from the dropdown menu.

            > [!NOTE]
            > Select **Remove all** to remove any selected audiences and start over.
1. *Optional*: Select a secondary condition and repeat the process outlined in step 5 above.
1. Select **Save**.

> [!NOTE]
> Conversion value rules will impact all conversion-related bid strategies.

## Next steps

- [Set up UET if you haven't already](hlp_BA_CONC_UET_Setup_Master.md)
- [Make sure your conversion goal is working](hlp_BA_CONC_UET_TroubleshootCT.md)
