---
title: About Property Center
ms.service: msa-help
ms.subservice: msa-audience-display-video
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn all about Property Center.
---

# About Property Center

Property Center is the environment in Microsoft Advertising where you can directly upload and manage all of your assets for [Lodging campaigns](hlp_BA_CONC_HotelCampaigns.md), a campaign type that creates [Hotel Price ads](hlp_BA_CONC_HotelAds_Intro.md) and [Property Promotion ads](hlp_BA_CONC_HotelAds_PPA.md). Within Property Center, you can assign bids and access both share of voice and booking reports.

We've enhanced Property Center to include vacation rentals, so anyone from hoteliers, rental property owners, integration partners, and online travel agencies can advertise their properties.

## Assets

The assets you populate within Property Center are what Microsoft Advertising uses to get your campaign up and running.

There are four types of assets that you upload and manage within Property Center:

1. **Property feed:** A CSV or XML file that lists your properties. You can either manually upload the Property feed or upload using a URL, which Microsoft Advertising will crawl weekly on Sundays. [Learn more about the Property feed.](https://go.microsoft.com/fwlink/?linkid=2212324)

   > [!NOTE]
   > Uploads aren't incremental. In other words, each feed that is uploaded will replace the previous one.
1. **Price feed:** A feed comprised of the property itinerary data, such as price, length of stay, property ID, point of sale ID, and other attributes that Microsoft Advertising requires. When uploading your Price feed, you'll also indicate the delivery mode (push, pull, pull with hint, push and pull, or push and pull with hint). [Learn more about the Price feed.](https://go.microsoft.com/fwlink/?linkid=2212327)

   > [!NOTE]
   > Your Price feed should appear within 24 hours.
1. **Landing page feed:** An XML file that defines the ads' landing page URLs, to ensure all clicks are directed to the correct website page. [Learn more about the Landing page feed.](https://go.microsoft.com/fwlink/?linkid=2275878)
1. **Logo(s):** Any logos you want your ads to feature. At least one logo is required to start running Lodging campaigns. You can always add additional logos for other brands on your Property feed. [Learn more about logos.](#logo-management)

## Get started

You can independently set up Property Center in a few easy steps:

1. From the navigation menu on the left, select **Tools**.
1. Search for “Property Center”.
1. Select **Property Center**.

   Optionally, you can pin **Property Center** to ensure it always shows up in the navigation menu on the left.
1. Choose which option best describes your business (**Hotelier or rental property owner**, **Integration partner**, or **Online travel agency**).

   > [!NOTE]
   > Once you've chosen a business type, the only way to change it is by contacting [Support](https://go.microsoft.com/fwlink/?linkid=398371).
1. Upload your assets. This must be done sequentially:

   1. Upload your Property feed by selecting either **Manual upload** or **Download from URL**.

      Make sure to set the **Frequency** for which you'd like Microsoft Advertising to refresh your Property feed.

      > [!NOTE]
      > You may see a Pending status for 24-48 hours, but you can still proceed to uploading the other assets.
   1. Upload your Price feed by selecting **Get started**.

      > [!NOTE]
      > You can always select **Send email to my developer** for help in getting a Price feed.
   1. Upload your Landing page feed by selecting **Manual upload**.
   1. Upload at least one Logo by selecting **Get started**.

      Here, you'll need to upload three items: **Logo image**, **Brand association**, and **Brand logo**.

> [!NOTE]
> You'll see your progress in the **Progress towards advertising your properties** on the top right. Once all of your assets are successfully uploaded, you'll be ready to start creating [Lodging campaigns](hlp_BA_CONC_HotelCampaigns.md).

<a id="logo-management"></a>

## Logo management

The logo management experience simplifies common logo‑related tasks by letting advertisers manage both account‑level and brand‑level logos directly in Microsoft Advertising. It provides clear visibility into the account‑level logo and shows which brands have logos, with options to add, update, or remove logos at both the account and brand levels.

### Manage logos

To manage logos for lodging campaigns, go to **Tools** > **Property Center** > **Logos**.

From the Logos view, you can go to each of the following sections:

Account logo

- See the current account logo.
- Add, replace, or remove account logo.

  > [!NOTE]
  > When no account logo is provided, we’ll use a default Microsoft Advertising logo.

Brand logo

- See all brands from your property feed in a tabular view.
- Add, replace, or remove logos for individual brands.

> [!NOTE]
> If you remove a logo, Microsoft Advertising stops using that logo in ads.

## Health check

Health check in Property Center helps advertisers quickly identify and resolve issues that prevent their Hotel ads (Property Promotion Ads (PPA) and Hotel Price Ads (HPA)) from serving correctly.

It highlights common blocking and coverage issues across:

- **Unmatched properties**, which prevents properties from participating in HPA auctions.
- **Campaign optimization opportunities**, such as for campaigns or ad groups without PPAs enabled.
- **Missing images or prices for PPA default date**, which directly affect eligibility.
- **Price coverage gaps** across itinerary combinations (e.g., check in date, length of stay combinations), impacting overall Hotel ad serving (PPA and HPA).

In addition to high-level summaries, advertisers can download detailed reports to view granular information and take targeted action.

### Using Health check

To view the Health check's diagnostics, go to **Tools** > **Property Center** > **Health Check Summary**.
