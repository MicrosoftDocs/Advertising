---
title: How does ad language and location targeting affect who can see my ads?
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: When determining if your ads are eligible to be displayed, Microsoft Advertising uses both your ad language and location target settings. Both criteria must be met in order for an ad to display.
---

# How does ad language and location targeting affect who can see my ads?

> [!NOTE]
> Ad language and location targeting can only be set at the campaign level for App Ads campaigns and Performance Max campaigns.

> [!NOTE]
> Microsoft Advertising [Support](https://go.microsoft.com/fwlink/?linkid=2189081) may not be available for all languages.

Microsoft Advertising's language targeting allows you to target your ads to customers based on your specified ad language. Simply select your customers' language. Microsoft Advertising uses several signals to determine whether your ad will display to a potential customer based on the ad language you set, including search query language, publisher country language, and the customer's language setting. For a list of languages your ads can serve in, see [About language options in Microsoft Advertising](hlp_BA_CONC_AboutLanguageOptions.md). For a list of countries/regions where your ads can display, see [Market availability for Microsoft Advertising and its features](hlp_BA_CONC_Countries.md)

Here are the steps you take to determine where your ads are shown:

1. **Set ad language**. Select your customers' language. Your ads will be eligible to display on search queries with keyword matching if the search query language or user language settings match your ad language (unless otherwise prohibited by market).
1. **Select location target settings**. When selecting your location targets, you can choose from: <br> <br>

   - All available countries/regions
   - Selected countries/regions and states/provinces
   - Selected counties within the United States
   - Selected cities, metro areas, and postal codes*

     > [!NOTE]
     > - *Not all postal codes are supported for targeting exactly within their boundaries. If you target an unsupported postal code, it will be converted into a radius target (see below).*
     > - *For Canadian and UK postal codes, only the first segment (for Canada, the first 3 characters; for UK, the first 2-to-4-character segment) is recognized. If you enter the second segment, you will only be able to use radius targeting.*
     > - *The boundaries of some postal codes in Australia, Canada, France, Germany, and United Kingdom do not appear accurately on the map you see in Microsoft Advertising, but targeting within them will still function accurately.*
   - A specified radius around a postal code, coordinates*, landmark, or area

     **Coordinates can be searched for in the format "[latitude], [longitude]" with the degrees in decimal form — for example, "44.590,-104.716".*
   - You can also target multiple locations in bulk by selecting **Add bulk locations** below the option for **Let me choose specific locations**. Then, you can: (1) Optionally choose the country/region for the locations you want to add, (2) enter your locations to target or exclude, and (3) select **Find locations**. You can always add more locations later by selecting **Add locations**.

     > [!NOTE]
     > You can target by country/region, state/province, city, or ZIP/postal code.

     > [!NOTE]
     > Bulk locations are currently available for Search campaigns. Not everyone can add bulk locations yet. If you can't, don't worry—it's coming soon!

     > [!NOTE]
     > If you're using this feature in Smart mode, it's only available in United States and Canada. For more information, see [Get to know your Microsoft Advertising account modes](hlp_BA_CONC_SmartVsExpert.md).

     > [!IMPORTANT]
     > Microsoft Advertising will honor your location targeting settings and exclude locations you don't want to target. However, location targeting and exclusions may not always work because of factors beyond the control of Microsoft Advertising, such as a customer's device settings or the inherent limits of geolocation via GPS, IP addresses, Wi-Fi networks, and Bluetooth.

1. **Select advanced location targeting options**. In addition to selecting your location target settings, you can: <br> <br>

   - Show ads to people in your targeted location.
   - Show ads to people in, searching for, or viewing webpages about your targeted location.
1. **Multiple language targeting**. If you are targeting countries/regions that speak different languages, you can also target different languages. During campaign creation, in your Campaign settings you will see the option to target multiple languages. This allows you to have different ad groups in the same campaign show ads on websites in different languages. Remember that Microsoft Advertising doesn't translate your ads. It's a good idea to write your ads in the language you are targeting.

   > [!NOTE]
   > When the feature is enabled, your campaign languages will match the languages of all the ad groups in that campaign by default. For example, if a campaign has three ad groups with language set to English, German, and French, then the campaign languages will be set to English, German, and French. You can subsequently change this setting. If you want the campaign to target multiple languages, you can update the ad groups using the **Use my campaign settings** option. (Note: If all of the ad groups in a campaign are set to the same language, then enabling this feature will not affect the campaign's language setting.) You can still have an ad group level language setting if you want the ad group to target one specific language. The ad group language, if set, will override the campaign settings. If there is no ad group language, then all the campaign languages will apply to the ad groups.

Both the location targeting criteria and the language setting criteria must be met in order for an ad to be eligible for display. Of course your other targeting settings, beyond location, will also have an impact on the determining if the ad should be shown to the searcher.

For example, let's say you set your ad language to German. Because your ads are specific to a market, you decide to select your location target to Berlin, and even more specifically, show your ads only to people in your targeted location. Now, your ads will only show to searchers physically located in Berlin. For more information about targeting, see [How can I get my ads in front of my customers?](hlp_BA_CONC_Targeting.md)
