---
title: "App Install Ads: Drive App Downloads"
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: App Install ads provide direct links to your apps with a single button.
---

# App Install ads: Drive app downloads

> [!NOTE]
> - Learn more about where [App Install ads are available](hlp_BA_CONC_Countries.md).
> - Microsoft Advertising only supports iOS and Android apps in the Apple App Store and the Google Play Store in certain markets. There is no support for apps on Windows.

App Install ads are an ideal solution if you want to manage and drive downloads of your apps, rather than website traffic. Because these ads automaticall detect a customer's mobile device and operating system, they provide direct links to your app, sending customers directly to the applicable store to download the application.

You can track conversions when you set up a measurement URL with a conversion tracking partner such as AppsFlyer, Kochava, Tune, Singular, Adjust, or Branch.

## Compare App Install ads and app extensions

An App Install ad is similar to an ad with an associated [app extension](hlp_BA_CONC_AdExtensionAppExtension.md). They both use third-party measurement URLs to track conversion goals. Both include app icons and send users to the app store as appropriate for the device they are using. Here are some key differences:

| Feature | App Install ads | App extensions |
| --- | --- | --- |
| **Final URL** | No display URL: All clicks head to the appropriate app store. | Pairs with Search ads; serves based on [ad extension settings](hlp_BA_CONC_AboutAdExtensions.md). |
| **Tracking** | Uses measurement URL and optional, third-party tracking template. You can add URL suffixes and custom parameters for expanded tracking. | Uses measurement URL and optional, third-party tracking template |
| **Extensions** | Will not appear with any ad extensions | Up to one app extension can be associated with an account, campaign, or ad group that uses other ad extension types |
| **Call to action** | **Install** button included by default for all devices | Customizable action button on computer |
| **Position** | Anywhere in the search results | Mainline and sidebar |
| **Devices supported** | iOS and Android mobile phones | Most smartphones and tablets |
| **What you pay for** | When someone clicks on the ad | When someone clicks on the ad |

## What you'll need before you create an App Install ad

When you create an App Install ad, you'll want basic information on hand: **mobile operating system**, **app ID/package name**, **link text**, and **link URL**.

Consider if you'd like to report app installs as a conversion goal. If you do, you'll want to sign up with a Microsoft Advertising-certified partner to view app installs as conversions within the Microsoft Advertising report. Check out [tracking conversions](hlp_BA_PROC_UETv2MobileApp.md) for help setting up those goals.

Whether or not your ad shows on mobile devices only depends on several things, including your ad group device preferences and if you have other ads in your ad group. App Install ads will serve on mobile and tablet devices, but if you prefer that your ads appear on mobile devices, be sure to select **Prefer mobile devices**. Selecting this preference doesn't mean that your ads will be excluded from tablets.

Your App ID can be found in the URL of the app from the respective app store.

- Windows Store <br> https://apps.microsoft.com/windows/en-us/app/example-app-name/**12345678-9abc-1234-1234-1234567890ab**
- Google Play <br> https://play.google.com/store/apps/details?id=**com.example.appname**
- Apple App Store <br> https://itunes.apple.com/us/app/example-app-name/id**#########**

## Create a new App Install ad

1. From the navigation menu on the left, hover over **Campaigns** and select **Ads & extensions** > **Ads**.
1. Select **Create ad** and then choose an ad group.
1. From the **Ad type** dropdown box, select **App Install ad**.
1. Follow the instructions to complete this form. You can search for the app under the **Mobile app** dropdown list. If you can't find it, select **Manual** and enter the **App ID**. The **Final URL** field is automatically set to the location of your app install package.
1. Consider if you want to set up a **Device preference**. App Install ads will serve on mobile and tablet devices, but if you prefer your ads appear on mobile devices, be sure to check the **Prefer mobile devices** box. Whether your ad only shows on mobile devices depends on several things, including your ad group device preferences and if you have other ads in your ad group. Selecting this preference doesn't mean that your ads will be excluded from tablets.
1. Select **Ad URL options** to set up the **Tracking template** and redirect information for your ads. [Learn how to get a measurement URL and a tracking template](hlp_BA_PROC_UETv2MobileApp.md).
1. Select **Save**.

## It takes time to see new and changing apps

- **App store data**: App stores may take up to 30 days to get data on new apps. Changing an existing app? It could take three to four days for Microsoft Advertising to receive updated data. If your mobile app is brand new, it can take up to 96 hours for the data to populate. For existing apps, it can take up to 24 hours.
- **App icons**: After new thumbnails for app icons are created, it can take up 10 days for them to go live.
- **App URL details**: It can take up to three to four days for the updated details to refresh.
