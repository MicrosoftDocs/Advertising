---
title: UET dashboard
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: The UET Dashboard is available for each of your tags and enables you to see an Overview of the UET tag and UET Insights to give you deeper insights into your website visitors and their actions.
---

# UET Dashboard

Universal Event Tracking (UET) is a mechanism for advertisers to report user activity on their websites to Microsoft Advertising by installing one site-wide tag. UET is a prerequisite for advertisers to track conversions and/or do remarketing. The UET Dashboard is available for each of your tags and enables you to see an **Overview** of the UET tag, a place to **Test** your tag, and **UET Insights** to give you deeper insights into your website visitors and their actions.

## Overview

The overview tab lets you view useful reporting on your UET tag(s) across relevant dimensions such as events, parameters, event types, activity and data. You can also view your performance trends over time displayed in an inline chart.

## Test

You can troubleshoot your UET tag by monitoring the data that is received in real time in the **Test** tab.

1. From the navigation menu on the left, hover over **Conversions** and select **UET tag**.
1. Select the **Test** tab.
1. Enter the URL for your website.
1. Review the status of your UET event.

   - **Tag not found**: Verify there is a UET tag installed on that URL and that the tag isn't being blocked by a browser or consent dialog.
   - **No traffic received**: No event data was received. Go to the website tab to test the events.
   - **Time out**: Your session has timed out. Select **Resume** to continue testing.
   - **Receiving traffic**: You can review the events received by this UET tag below.

> [!IMPORTANT]
> Make sure that the website you want to open doesn't have a consent dialog or browser extension, such as an ad blocker. It might take 10 to 20 seconds for events to show up.

> [!NOTE]
> Learn more about Validating Consent Mode implementation with UET Dashboard here: [Setting up UET for Consent Mode](https://help.ads.microsoft.com/#apex/ads/en/60119/1/#ValidationUetDashboard).

## UET Insights

With Universal Event Tag (UET) Insights, you can stay informed on what actions visitors to your website take so that you may better optimize your campaigns and website. In turn, this can help you improve your ROI with additional data signals from your website. Your UET tag is automatically enabled to receive these insights and display them in the UET Dashboard—no coding action is needed from you.

You can find the following metrics on the Insights tab in the UET Dashboard:

- **Session count**: The number of visits to your site during the selected time period.
- **Popular pages**: This gives you an understanding of your highest-viewed webpages that are tracked by your UET tag.
- **Device breakdown**: A breakdown of your website traffic based on the device type used to access it.
- **Country breakdown**: A breakdown your website traffic based on the country from where it is accessed.
- **Quick backs**: The number of sessions where a visitor navigated to a page, then quickly returned to the previous page during the selected time period.
- **Average active time**: The average amount of time where a visitor's attention was on your site.

You can also sort these metrics by **Date**, **Device**, **Country**, **Page**, and **URL**.

> [!NOTE]
> UET Insights aggregates all website traffic, not just traffic from ad clicks.

## How to enable or disable UET Insights

To enable or disable Insights for a single UET tag:

1. From the navigation menu on the left, hover over **Conversions** and select **UET tag**.
1. From the left menu, select the name of your UET tag.
1. Select the **Insights** tab.
1. Select the pencil icon.
1. From the popup window, turn on or off the **Insights** toggle.
1. Select **Save**.

To enable or disable Insights for multiple tags:

1. From the navigation menu on the left, hover over **Conversions** and select **UET tag**.
1. From the left menu, select **All tags**.
1. Select the checkbox next to the tags you'd like to disable Insights for.
1. Select **Enable UET Insights** or **Disable UET Insights**.

## UET Insights FAQ

## FAQ

- **When can I enable UET Insights?**
  UET Insights can be enabled from your UI starting July 25 by following the instructions above.

  > [!NOTE]
  > It can take a few weeks for you to receive the capability to enable UET Insights.

- **Will my UET tag still work if I don't enable UET Insights?**
  Yes. You can use your UET tag without enabling UET Insights. You will continue to track actions on your website as is, but you will not be able to see any additional valuable website data in the dashboard.

- **Will UET Insights impact the performance of my website?**
  No. The updated UET will not have any impact on the performance of your website.

- **What kind of data does UET Insights collect from my website?**
  UET Insights collects traffic data such as devices, countries, time spent on website, number of visits, and quick backs to generate your website analytics. Beyond these, UET Insights collects data signals such as page latencies (speed, load time), browser-based signals, and click and scroll interactions to detect fraud activity to optimize advertiser spend. JavaScript errors, purchase cart, cart abandonment details, and are also collected to minimize conversion loss and improve audience targeting for your ad campaigns. We also occasionally collect masked-markup to ensure reliability of these cart details.

- **Will the UET Insights be available via API?**
  No. UET Insights is only available through the Microsoft Advertising UI.

- **What does UET Insights mean for dynamic remarketing lists? Will these auto-generate as we receive insights on page types?**
  This is a key feature on the UET Insights roadmap after release.

- **How long will the new data signals be retained by Microsoft Advertising?**
  Microsoft Advertising will retain this data for 390 days--the same period as all other UET data we collect.

- **Do I need to update my privacy policy in order to be eligible for the UET Insights upgrade?**
  While Microsoft does not require any specific action to participate in the UET Insights upgrade, you should regularly review your privacy disclosures and consent practices with your legal counsel to ensure compliance with your obligations under Section 9 of the [Microsoft Advertising Agreement](https://help.ads.microsoft.com/#apex/ads/en/60226/0) and applicable data privacy laws.

- **How is this data used?**
  Microsoft Advertising collects this data to generate website analytics, detect fraud activity, and improve campaign targeting for your ads.    

- **How is this data shared?**
  Microsoft Advertising may share this data with other Microsoft services to provide and improve our products, personalize our products, and improve targeting. Microsoft Advertising does not sell data to third parties, but we do share data with Microsoft-controlled affiliates and subsidiaries, with vendors working on our behalf, when required by law or to respond to legal process, to maintain the security of our products, and to protect the rights and property of Microsoft and its customers as outlined in our [Microsoft Privacy Statement](https://go.microsoft.com/fwlink?LinkId=2182947).    

- **Does enabling UET Insights add any new cookies?**
  No, UET Insights uses the same cookies as the [existing UET tag](https://help.ads.microsoft.com/#apex/ads/en/53056/2).


