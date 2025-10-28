---
title: Exposure feed - Data Clean Room
ms.service: bing-ads
ms.subservice: data-clean-room
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: This dataset provides granular, pseudonymized event-level data to support ad measurement and analysis in a privacy-compliant data clean room environment.
---
# Exposure feed

This dataset provides granular, pseudonymized event-level data to support ad measurement and analysis in a privacy-compliant data clean room environment. This feed helps advertisers and partners evaluate campaign performance, user engagement, and media delivery, all while maintaining data security standards required in data clean room infrastructures.

> [!NOTE]
> Columns 2, 15, 17, 19, 21 are specific to Microsoft Monetize.
>
> Columns 26 and 27 are specific to Search campaigns within Microsoft Advertising.

| Column Index | Column Name           | Type              | Description                                                   |
|--------------|------------------------|-------------------|---------------------------------------------------------------|
| 01           | rguid                  | STRING            | A 128-bit unique identifier for an ad request.                |
| 02           | auction_id_64          | LONG              | A 64-bit unique identifier for an auction.                    |
| 03           | date_time              | LONG/unix timestamp | The date and time of the event.                             |
| 04           | event_type             | INTEGER           | An identifier for the event type, i.e. impression, click.     |
| 05           | hashed_email           | STRING            | A hashed email address representing a unique user.            |
| 06           | hashed_ip_address      | STRING            | The hashed IP address from the ad request.                    |
| 07           | country                | STRING            | The geographic country of the event.                          |
| 08           | region                 | STRING            | The geographic region of the event.                           |
| 09           | operating_system       | STRING            | The name of the operating system.                             |
| 10           | browser                | STRING            | The name of the browser.                                      |
| 11           | publisher_id           | INTEGER           | A unique identifier for the publisher of the placement.       |
| 12           | publisher_name         | STRING            | The name of the publisher.                                    |
| 13           | site_domain            | STRING            | The most granular identifier of the site available.           |
| 14           | advertiser_account_id  | LONG              | A unique identifier for an advertiser within Microsoft Advertising.|
| 15           | advertiser_id          | INTEGER           | A unique identifier for an advertiser within Microsoft Monetize.|
| 16           | campaign_id            | LONG              | A unique identifier for a campaign.                           |
| 17           | insertion_order_id     | INTEGER           | A unique identifier for an insertion order.                   |
| 18           | ad_group_id            | LONG              | A unique identifer for the ad group within a campaign.        |
| 19           | line_item_id           | INTEGER           | A unique identifier for a line item.                          |
| 20           | ad_id                  | LONG              | An identifier for an ad from a specific campaign.             |
| 21           | creative_id            | INTEGER           | A unique identifier for a creative.                           |
| 22           | device_unique_id       | STRING            | A unique identifier representing the mobile device.           |
| 23           | device_type_id         | INTEGER           | A unique identifier for the device type.                      |
| 24           | device_type_name       | STRING            | The name of the device type.                                  |
| 25           | postal_code            | INTEGER           | The postal code of the user's location.                       |
| 26           | bidded_keyword         | STRING            | The keyword targeted by the winning campaign.                 |
| 27           | query_id               | STRING            | An identifier for a unique query string.                      |
