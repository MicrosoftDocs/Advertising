---
title: What are conversion goals and goal types?
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn about the types of conversion goals that you can create to track different types of conversions.
---

# What are conversion goals and goal types?

> [!IMPORTANT]
> Ensure proper consent transmission for users visiting from the European Economic Area (EEA), the United Kingdom, and Switzerland by implementing [Consent Mode](hlp_BA_CONC_UET_Consent.md) or the [Transparency and Consent Framework (TCF)](hlp_BA_CONC_UET_TCF.md) with your UET tags to avoid any negative impact on conversion attribution and remarketing segments. This policy reflects the requirements of the EU ePrivacy Directive and the General Data Protection Regulation (GDPR). [Learn more](hlp_BA_CONC_UET_ConsentFAQ.md)

Conversion goals allow you to specify which actions to count as conversions, as recorded by UET. However, not all actions are created equal. You probably have a subset of actions that you consider more important to a successful advertising campaign. These may include making purchases, filling out a lead form, or watching a video. This is where conversion goals can help.

One of the biggest value propositions of [conversion tracking](hlp_BA_CONC_UETv2WhatIsCT.md) with UET is that the UET tag on your website can track multiple types of conversions. Once the UET tag tracking code is added to your website, Microsoft Advertising can log page visits and any custom events (such as document downloads, signups for a newsletter, etc.).

> [!NOTE]
> - Different conversion goal types are available for each type of conversion.
> - Not all goal types are available for all goal categories.

The types of conversion goals are:

- **Website conversions**

  - **Destination URL**

    Count user visits to specific webpages as conversions.

    Examples: Confirmation page after purchase, Thank you page after lead generation.

    Values to fill in for this goal: Input string and the condition to use when matching the webpage URL with the string. The conditions are:

    - **Equals To**: In this case the input string must exactly match with the URL on which the UET event fired. However, http(s) and www are ignored (rest of the string must match). For example, if you provide an input string of contoso.com, and the URL is http://www.contoso.com or https://www.contoso.com, Microsoft Advertising will consider it as a match and vice versa will also be true.
    - **Begins With**: This matches identical characters starting from the beginning of the string up to and including the last character in the input string. However, http(s) and www are ignored (rest of the string must match). Use this option when your page URLs are generally unvarying but when they include additional parameters at the end that you want to exclude. For example, if you provide an input string of contoso, and the URL is http://www.contoso.com or https://www.contoso.com, Microsoft Advertising will consider it as a match and vice versa will also be true.
    - **Contains**: When this operator is used, Microsoft Advertising verifies if the input string is present anywhere in the URL reported by the UET tag.
    - **Regular Expression**: A regular expression uses special characters to enable wildcard and flexible matching. This is useful when the stem, trailing parameters, or both, can vary in the URLs for the same webpage. However, this option works best when you know how to construct regular expressions that match your URLs. [This advanced topic](hlp_BA_PROC_UETv2RegExpression.md) provides some examples of how to use regular expressions when building destination URL type goals.

  - **Event**

    Count every time someone completes a specific action--such as signing up for a newsletter or downloading a document--as a conversion.

    Examples: Downloading a document, watching a video, signing up for a newsletter.

    Values to fill in for this goal: Microsoft Advertising requires that you report values for one or more of the following custom parameters when custom events happen and create custom event type goals specifying which values for these custom parameters would qualify the custom event as a conversion:

    - **Event action**: The type of user interaction you want to track. For example, *play* or *pause*.
    - **Event category**: The category of event you want to track. For example, 'video.’
    - **Event label**: The name of the element that caused the action. For example, 'trailer' or 'behindthescenes.’
    - **Event value**: A numerical value associated with that event. For example, the length of the video played.

    > [!NOTE]
    > To set this up, you must customize your UET tag tracking code to report the values for one or more of the custom event parameters in addition to creating conversion goals in Microsoft Advertising to track those events. To learn more, see [How to track custom events with UET](hlp_BA_CONC_UETv2CustomEvent.md).

  - **Duration**

    Count every time someone stays on a website for longer than a certain amount of time as a conversion.

    Example: 10 minutes or longer spent on a blog or playing a game on the webpage.

    Value to fill in for this goal: The minimum duration of time they expect a user to spend on their website to count a conversion by providing a value (range - 1 second to 23 hours, 59 minutes, and 59 seconds).

  - **Pages viewed per visit**

    Count every time someone visits more than a specified number of pages on your website as a conversion.

    Example: 5 pages viewed on a support site or product catalog.

    Value to fill in for this goal: The minimum number of pages that a user must visit in a single session for the action to count as a conversion. This can be any number from 0 to 9999999.

  - **Product**

    > [!NOTE]
    > Not everyone has this feature yet. If you don't, don't worry—it's coming soon!

    Count every time a product is purchased via an ad click.

    Example: An ad click leads to an online purchase of a specific product.

    This conversion goal type does not require custom values.

- **Mobile app install conversions**

  - **Mobile app install**

    Count every time someone installs your app as a conversion. To learn more, see [Track mobile app installs as conversions](hlp_BA_PROC_UETv2MobileApp.md).

    Example: Installation of your app on Android devices.

    To track, select the **App platform** and enter the **App ID/Package name**.

    - Windows Store

      Where to find app ID/package name: http://apps.microsoft.com/windows/en-us/app/example-app-name/**12345678-9abc-1234-1234-1234567890ab**
    - Google Play

      Where to find app ID/package name: http://play.google.com/store/apps/details?id=**com.example.appname**
    - Apple App Store

      Where to find app ID/package name: http://itunes.apple.com/us/app/example-app-name/**id#########**

- **Offline conversions**

  - **Offline conversions**

    Track when your ad leads to a conversion outside of your website. To learn more, see [Tracking offline conversions](hlp_BA_CONC_UETv2OfflineConversion.md).

    Example: A search ad leads to an over-the-phone purchase.

    This conversion goal type does not require custom values.

  - **Store visits**

    > [!NOTE]
    > Not everyone has this feature yet. If you don't, don't worry—it's coming soon!

    Count every time a user visits a store as a conversion.

    Example: A search ad leads to a store visit.

    This conversion goal type does not require custom values.

  - **In-store transactions**

    > [!NOTE]
    > Not everyone has this feature yet. If you don't, don't worry—it's coming soon!

    Count every time a transaction occurs in your store.

    Example: A search ad leads to an in-store purchase.

    This conversion goal type does not require custom values.

## Next steps

- [Create a conversion goal](hlp_BA_PROC_UETv2CreateGoal.md)
- [Set up UET](hlp_BA_CONC_UET_Setup_Master.md)
