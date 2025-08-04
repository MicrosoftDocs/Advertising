---
title: Exposure feed - Clean Room
ms.service: bing-ads
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: This dataset provides granular, pseudonymized event-level data to support ad measurement and analysis in a privacy-compliant clean room environment.
---
# Exposure feed

This dataset provides granular, pseudonymized event-level data to support ad measurement and analysis in a privacy-compliant clean room environment. This feed helps advertisers and partners evaluate campaign performance, user engagement, and media delivery, all while maintaining data security standards required in clean room infrastructures.

| Column Index | Column Name           | Type              | Description                                                   |
|--------------|------------------------|-------------------|---------------------------------------------------------------|
| 01           | rguid                  | STRING            | A 128-bit unique identifier for an ad request.                |
| 03           | date_time              | LONG/unix timestamp | The date and time of the event.                             |
| 04           | event_type             | INTEGER           | An identifier for the event type, i.e. impression, click.     |
| 05           | hashed_email           | STRING            | A hashed email address representing a unique user.            |
| 06           | hashed_ip_address      | STRING            | The hashed IP address from the ad request.                    |
| 07           | country                | STRING            | The geographic country of the event.                          |
| 08           | region                 | STRING            | The geographic region of the event.                           |
| 09           | operating_system       | STRING            | The name of the operating system.                             |
| 10           | browser                | STRING            | The name of the browser.                                      |
| 11           | publisher_id           | INTEGER           | A unique identifier for the publisher of the placement.       |
| 12           | publisher_name         | STRING            | The name of the publisher.                                      |
| 13           | site_domain            | STRING            | The most granular identifier of the site available.           |
| 14           | advertiser_account_id  | LONG              | A unique identifier for an advertiser.                        |
| 16           | campaign_id            | LONG              | A unique identifier for a campaign.                           |
| 18           | ad_group_id            | LONG              | A unique identifer for the ad group within a campaign.        |
| 20           | ad_id                  | LONG              | An identifier for an ad from a specific campaign.             |
| 22           | device_unique_id       | STRING            | A unique identifier representing the mobile device.           |
| 23           | device_type_id         | INTEGER           | A unique identifier for the device type.                      |
| 24           | device_type_name       | STRING            | The name of the device type.                                    |
| 25           | postal_code            | INTEGER           | The postal code of the user's location.                       |
| 26           | bidded_keyword         | STRING            | The keyword targeted by the winning campaign.                 |
| 27           | query_id               | STRING            | An identifier for a unique query string.                      |

*Note*: Columns 26 and 27 are specific to Search campaigns within the Microsoft Advertising platform.
