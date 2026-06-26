---
title: About lodging campaigns
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn all about lodging campaigns.
---

# About lodging campaigns

Lodging campaigns is a campaign type that manages your [Hotel Price ads (HPA)](hlp_BA_CONC_HotelAds_Intro.md) and [Property Promotion ads (PPA)](hlp_BA_CONC_HotelAds_PPA.md). You can showcase your HPA on Bing across devices and PPA on Bing across devices.

Before you create a lodging campaign, you need to make sure you have the following prerequisites ready:

- [Property feed](https://go.microsoft.com/fwlink/?linkid=2212324), [Landing page](https://go.microsoft.com/fwlink/?linkid=2212526) feed, and logo(s)
- [Price feed](https://go.microsoft.com/fwlink/?linkid=2212327) configuration

## The lodging campaign structure

HPA has six levels of organization: Customer, accounts, property groups, and properties.

- A **customer** contains one or more accounts. A customer has a customer ID, which is associated with a business name and your address. At the customer level, at least one person is designated as the Super admin, who have administrative access to all accounts.
- **Accounts** contain one or more campaigns and include information about currency, time zone, whether you want to pay in advance (prepay) or pay later (postpay), your form of payment (primary payment method), and the people who have access to each account (users).
- **Campaigns** contain ad groups, property groups, and properties, and they specify the daily budget, default bid, location, and and bid multipliers.
- At least one **ad group** will be created by default for each campaign. An ad group can override campaign settings and contains additional bid modifiers.
- **Property groups** belong within a single ad group containing one or more properties. A property group can override or inherit its ad group bid. After creating a campaign, all your properties will belong to the "All properties" property group. Please note that property groups aren't automatically updated if properties are added or removed from the Property feed.
- **Property** is the lowest level and can inherit bids and multipliers from its property group, ad group, or campaign.

## Create a lodging campaign

1. From the navigation menu on the left, select **Create**.
1. Choose **Drive conversions** as your campaign goal.
1. Under **Campaign settings**:

   1. Give your campaign a unique name that reflects the campaign's goal.

      > [!NOTE]
      > A campaign name cannot include scripts, HTML, or other markup language.
   1. Under **Hotel ad format**, make sure to select your desired ad type, which will determine placements for your ads.

      We'll apply this setting to Ad group #1, which we'll create by default when you save this campaign. This ad group will contain the details you provide in your property feed.

      > [!NOTE]
      > **Hotel price ad (HPA)** is a prerequisite for **Property promotion ad (PPA)**. Learn more about [HPA](hlp_BA_CONC_HotelAds_Intro.md) and [PPA](https://go.microsoft.com/fwlink/?linkid=2212525).
1. Under **Budget**, enter the amount you want to spend per day. Learn more about your [budget options](hlp_BA_CONC_AboutBudgetType.md).
1. Under **Bid strategy**,

   1. Choose which bid strategy is optimal for your campaign:

      - **Fixed big per night (per click)**: The fixed amount charged when someone clicks on your ad.
      - **Percentage of room price (per click)**: The fixed percentage of the room price when someone clicks on your ad.
   1. Provide the **Default ad group bid**, which will be applied to Ad group #1.
1. Under **Ad schedule**, provide the date and time range.

   > [!NOTE]
   > The **Ad schedule** cannot be adjusted for the **Percentage of room price (per stay)** bid strategy.
1. Under **Audience ads**, adjust your bids for [Audience ads](hlp_BA_CONC_NativeAds.md).
1. Under **Ad distribution**, choose where you want your ads to show: **The entire Microsoft Advertising Network (recommended)** or **Microsoft sites and select partner traffic**.
1. Under **Campaign targets**, choose which countries/regions you'd like to target and/or exclude. Learn more about location targeting.

   > [!NOTE]
   > You can only exclude targets if you choose **Percentage of room price (per stay)** under **Bid strategy**.
1. Under **Device**, choose the type of device you'd like your ads to appear on: **Computer**, **Tablet**, and/or **Smartphone**.
1. Select **Save**.
