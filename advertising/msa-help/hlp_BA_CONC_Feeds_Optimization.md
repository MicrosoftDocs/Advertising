---
title: About tracking templates and conversion goals for Vertical ads
ms.service: msa-help
ms.subservice: msa-shopping-merchant-center
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Learn more about tracking templates and conversion goals for Vertical ads.
---

# About tracking templates and conversion goals for Vertical ads

The following information is pertinent for all [Vertical ad types](hlp_BA_CONC_AboutVerticalAds.md), except for Lodging.

## Add tracking templates

URL tracking allows you to find out how visitors got to your website and gives you more information about the source of an ad click. All you need to do is add URL parameters to your tracking template. When your ad is served, the parameters are dynamically appended to your landing page URL.

URL tracking is available at a more granular level than normal for Vertical ads. The setup process is still within Microsoft Advertising, but with a few additional steps.

For Vertical ads, you can add tracking templates at the following levels:

- Account
- Campaign
- Ad group
- Ad
- Keyword
- Feed item

### Feed item tracking

Feed item tracking overrides any other URL tracking for the previous levels. (This is similar to how keyword-level tracking overrides campaign-level tracking for text ads.) For example, a tracking template set at the campaign level will apply to all items in the dynamic data feed that target that campaign. However, if a different tracking template is added at the feed item level, then the latter applies for all feed items with this setup.

## Set up feed item-level tracking

You cannot set up or edit feed item tracking directly within Microsoft Advertising. Instead, you need to add additional information to the dynamic data feed file itself:

1. Before you upload your dynamic data feed file, make sure you include two columns: One for a tracking template and one for custom parameters.

   1. For the tracking template column, include the appropriate landing page URL (lpurl) parameter, as you would for text ads. The following is an example of a tracking template: http://contoso.com/tracking?dest_url={lpurl}&pcategory={_pcategory}&city={_city}
   1. For the custom parameters column, add your custom parameters in the following recommended format: {_pcategory}="plumbing";{_city}="newyork"

      > [!NOTE]
      > We also support the following legacy format, but as of January 2024, we don't recommend it: {"pcategory":"plumbing","city":"newyork"}

## What you need to know

- Final URL suffix is supported for Vertical ads at all levels, except the feed item level. You cannot combine the final URL suffix with feed item tracking, but we would append the final URL suffix if tracking is set at a higher level.
- Because we support URL tracking at all levels—including the keyword level—there is full compatibility with tool providers such as SA360.
- Conversion goal settings for Vertical ads works in the same way as for regular text ads.
- Automotive listings don't support URL tracking.
