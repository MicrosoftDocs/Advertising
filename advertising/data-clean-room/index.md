---
title: Data Clean Room
ms.service: bing-ads
ms.subservice: data-clean-room
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Data clean room integration is a cutting-edge initiative by Microsoft Advertising, designed to empower enterprise customers with secure, privacy-compliant data collaboration capabilities.
---
<!-- content-type: help-topic -->
<!-- product: Microsoft Advertising -->

<!-- content-type: reference -->
<!-- product: Microsoft Advertising -->

# LiveRamp MAP clean room

LiveRamp (formerly Habu) provides a secure data collaboration solution that enables advertisers to work with data wherever it resides. This solution supports a range of use cases across planning, targeting, and measurement.

This capability is built on the Azure Confidential Computing (ACC) platform. It allows Microsoft Advertising customers to:

- Run custom queries to analyze measurement scenarios  
- Generate actionable insights  
- Build custom audiences for campaign activation  

All data processing occurs within hardware-based trusted execution environments (TEEs). This ensures that data remains private and secure.

Advertiser signals uploaded to the clean room:

- Remain within the advertiser’s dedicated LiveRamp instance  
- Are not accessible to or exportable by Microsoft  

Analysis runs within the TEE across selected dimensions, such as campaigns or time ranges. Results are aggregated and anonymized to help meet strict privacy requirements.

---

## Data sources

Microsoft Advertising campaign event data is encrypted and stored on Microsoft-managed Azure infrastructure. This data can originate from Microsoft Advertising Platform (MAP) or Microsoft Monetize campaigns.

You can reference this data through the following tables:

- Microsoft Advertising Platform (MAP) traffic  
- Microsoft Monetize traffic  
- Conversion data tables  
- Audience segment membership  

All tables use a flat schema. Each column includes:

- Name  
- Data type  
- Description  

Data collaboration occurs within the clean room’s privacy-preserving boundaries and follows Microsoft Advertising input and output k-min constraints.

Encrypted event data is automatically made available in the LiveRamp clean room on a daily basis. Advertisers or their partners can also upload data and join it using SQL queries (referred to as *questions*).

Currently, only exact joins on hashed email (HEM) are supported. Additional identifiers may be supported in the future.

---

## Microsoft Advertising Platform (MAP) traffic tables

These tables include traffic events (impressions and clicks) from MAP campaigns added to the clean room instance.

Supported campaign types include:

- Search  
- Audience  
- Shopping  
- Hotel  
- Performance Max  

### map_ad_events table

| Column name              | Data type              | Description                                                                 | Supported campaign types  |
|--------------------------|------------------------|-----------------------------------------------------------------------------|---------------------------|
| rguid                    | STRING                 | A 128-bit unique identifier for an ad request.                              | All                       |
| date_time                | LONG (Unix timestamp)  | The date and time of the event in UTC.                                      | All                       |
| event_type_id            | INTEGER                | Identifier for the event type (for example, impression or click).           |                           |
| hashed_email             | STRING                 | SHA256-hashed email representing the user.                                  | All                       |
| hashed_ip_address        | STRING                 | SHA256-hashed IP address representing the user.                             | All                       |
| country                  | STRING                 | Country code for the event (for example, US, CA).                           | All                       |
| region                   | STRING                 | Geographic region of the event (for example, state in the US).              | All                       |
| operating_system         | STRING                 | Operating system of the device.                                             | All                       |
| browser                  | STRING                 | Browser used for the event.                                                 | All                       |
| publisher_id             | INTEGER                | Unique identifier for the publisher.                                        | All                       |
| publisher_name           | STRING                 | Human-readable name of the publisher.                                       | All                       |
| site_domain              | STRING                 | Most granular site identifier available.                                    | All                       |
| advertiser_account_id    | INTEGER                | MAP – unique identifier for the advertiser.                                 | All                       |
| campaign_id              | LONG                   | MAP – unique identifier for the campaign.                                   | All                       |
| ad_group_id              | LONG                   | MAP – unique identifier for the ad group.                                   |                           |
| ad_id                    | LONG                   | MAP – unique identifier for the ad (creative).                              |                           |
| device_type_id           | INTEGER                | Identifier for the device type.                                             | All                       |
| device_type_name         | STRING                 | Human-readable device type (for example, mobile, PC).                       | All                       |
| postal_code              | STRING                 | Postal code where the event occurred (if available).                        | All                       |
| bidded_keyword           | STRING                 | Keyword targeted by the winning campaign.                                   | Search                    |
| query_id                 | STRING                 | Identifier for a unique query string.                                       | Search                    |
| spend                    | DECIMAL                | Cost of the media (CPM).                                                    | All                       |
| advertiser_account_name  | STRING                 | MAP – human-readable advertiser name.                                       | All                       |
| campaign_name            | STRING                 | MAP – human-readable campaign name.                                         | All                       |
| ad_group_name            | STRING                 | MAP – human-readable ad group name.                                         |                           |
| start_date               | TIMESTAMP              | Start date of the campaign or ad group.                                     |                           |
| end_date                 | TIMESTAMP              | End date of the campaign or ad group.                                       |                           |
| record_date              | STRING                 | Date the record was collected.                                              | All                       |
| campaign_type            | STRING                 | Campaign type (for example, SWF, AWF).                                      | All                       |
| ad_group_type            | STRING                 | Ad group type (for example, Search Standard, Search Dynamic).               |                           |
| ad_group_price_type      | STRING                 | Ad group pricing type (for example, CPC, CPM, CPA).                         |                           |
| asset_group_id           | INTEGER                | Identifier for the asset group.                                             | PMax                      |
| asset_group_name         | STRING                 | Name of the asset group.                                                    | PMax                      |
| asset_group_start_date   | TIMESTAMP              | Start date of the asset group.                                              | PMax                      |
| asset_group_end_date     | TIMESTAMP              | End date of the asset group.                                                | PMax                      |
| event_type_name          | STRING                 | Human-readable event type name (for example, impression, click, view).      |                           |

---

## Microsoft Monetize traffic tables

These tables include impression and clicks data for onboarded XBox direct-sold line items.

### monetize_ad_events table

| Column name         | Data type            | Description                                                                 |
|---------------------|----------------------|-----------------------------------------------------------------------------|
| auction_id_64       | LONG                 | A 64-bit unique identifier for an auction.                                  |
| date_time           | LONG (Unix timestamp)| The date and time of the event in UTC.                                      |
| event_type          | INTEGER              | Identifier for the event type (e.g., impression, click).                    |
| hashed_email        | STRING               | SHA256-hashed email representing the user.                                  |
| hashed_ip_address   | STRING               | SHA256-hashed IP address representing the user.                             |
| country             | STRING               | Country code for the event (e.g., US, CA).                                  |
| region              | STRING               | Geographic region of the event (for example, state in the US).              |
| operating_system    | STRING               | Operating system of the device.                                             |
| browser             | STRING               | Browser used for the event.                                                 |
| publisher_id        | INTEGER              | Unique identifier for the publisher.                                        |
| publisher_name      | STRING               | Human-readable name of the publisher.                                       |
| site_domain         | STRING               | Most granular site identifier available.                                    |
| advertiser_id       | INTEGER              | Xandr – unique identifier for the advertiser.                               |
| insertion_order_id  | INTEGER              | Xandr – unique identifier for the insertion order.                          |
| line_item_id        | INTEGER              | Xandr – unique identifier for the line item.                                |
| creative_id         | INTEGER              | Xandr – unique identifier for the creative.                                 |
| device_unique_id    | STRING               | Unique identifier for the device.                                           |
| device_type_id      | INTEGER              | Identifier for the device type.                                             |
| device_type_name    | STRING               | Human-readable device type (e.g., mobile, PC).                              |
| postal_code         | STRING               | Postal code where the event occurred (if available).                        |
| media_cost          | DECIMAL              | Cost of the media (CPM).                                                    |
| advertiser_name     | STRING               | Xandr – name of the advertiser.                                             |
| insertion_order_name| STRING               | Xandr – name of the insertion order.                                        |
| line_item_name      | STRING               | Xandr – name of the line item.                                              |
| start_date          | LONG                 | Start date of the line item.                                                |
| end_date            | LONG                 | End date of the line item.                                                  |
| line_item_type      | STRING               | Type of the line item (e.g., banner, native).                               |
| line_item_price_type| STRING               | Pricing type used by the line item (e.g., CPM).                             |
| split_id            | INTEGER              | Identifier for the split targeted by the auction.                           |
| split_name          | STRING               | Name of the targeted split.                                                 |
| viewable            | INT32                | Indicates if the ad event was viewable.                                     |
| booked_revenue_usd  | DOUBLE               | Delivered budget for the ad event.                                          |
| creative_name       | STRING               | Advertiser-defined name of the creative.                                    |
| creative_type       | STRING               | Type of creative (e.g., banner, native, video, audio).                      |
| placement_id        | INTEGER              | Identifier of the placement where the ad was served.                        |
| placement_group     | STRING               | Publisher-defined placement group.                                          |
| placement_name      | STRING               | Publisher-defined name of the placement.                                    |

---

## MAP conversion data tables

These tables include both:

- Ad-exposed (attributed) conversions  
- Non-ad-exposed (unattributed) conversions  

Data sources include:

- Universal Event Tracking (UET)  
- UET server-to-server (S2S) events  
- Offline conversions  
- UET SDK events  
- Conversion API events  

A conversion is considered ad-attributed if a user received a traffic event within the campaign’s lookback window (default: 30 days) before the conversion.

### map_attributed_conversion_events table

| Column name            | Data type | Description                                                                 |
|------------------------|-----------|-----------------------------------------------------------------------------|
| RGUID                  | STRING    | RGUID of the attributed event; matches the related impression or click.     |
| event_timestamp        | LONG      | UTC timestamp of when the original event occurred.                          |
| conversion_timestamp   | LONG      | UTC timestamp of when the conversion occurred.                              |
| campaign_id            | LONG      | MAP campaign associated with the conversion.                                |
| ad_id                  | LONG      | MAP ad associated with the conversion.                                      |
| goal_id                | LONG      | Goal ID from MAP.                                                           |
| goal_name              | STRING    | Goal or tag name from MAP.                                                  |
| domain                 | STRING    | Domain where the event occurred.                                            |
| hashed_email           | STRING    | Hashed email associated with the event (via UMS lookup if not present).     |
| goal_value             | DOUBLE    | Monetary or non-monetary goal value set in MAP.                             |
| goal_currency_code     | STRING    | Currency of the goal value.                                                 |
| goal_value_microcents  | LONG      | Goal value in microcents.                                                   |
| iso_country_code       | STRING    | ISO country code of the user at the time of the event.                      |
| goal_lookback_days     | INT       | Lookback window configured for the goal.                                    |
| ms_click_id            | STRING    | Click ID associated with the event.                                         |

### map_raw_conversion_events table

| Column name         | Data type | Description                                                                     |
|----------------------|----------|---------------------------------------------------------------------------------|
| event_timestamp      | LONG     | Time the UET event occurred.                                                    |
| collected_timestamp  | LONG     | Time the UET event was collected for S2S and/or CAPI events.                    |
| tag_id               | LONG     | Tag ID for the event (shown in the MAP UI).                                     |
| tag_name             | STRING   | Tag name for the event (shown in the MAP UI).                                   |
| event_source         | STRING   | Source of the event (for example, UET, UETS2S, CAPI).                           |
| domain               | STRING   | Domain where the event occurred.                                                |
| hashed_email         | STRING   | Hashed email associated with the event (via UMS lookup if not already present). |
| iso_country_code     | STRING   | ISO country code of the user at the time of the event.                          |
| ms_click_id          | STRING   | Click ID associated with the event.                                             |

### map_goal_achieved_conversion_events table

| Column name           | Data type | Description                                                                     |
|-----------------------|-----------|---------------------------------------------------------------------------------|
| event_timestamp       | LONG      | Time the UET event occurred.                                                    |
| tag_id                | LONG      | UET tag ID associated with the goal.                                            |
| goal_id               | LONG      | Goal ID for the event (shown in the MAP UI).                                    |
| goal_name             | STRING    | Goal name for the event (shown in the MAP UI).                                  |
| goal_value            | DOUBLE    | Monetary or non-monetary goal value set in MAP.                                 |
| goal_currency_code    | STRING    | Currency of the goal set in MAP.                                                |
| goal_value_microcents | LONG      | Goal value in microcents.                                                       |
| goal_lookback_days    | INT       | Last-click lookback window configured for the goal.                             |
| event_source          | STRING    | Source of the event (for example, UET, UETS2S, CAPI).                           |
| domain                | STRING    | Domain where the event occurred.                                                |
| hashed_email          | STRING    | Hashed email associated with the event (via UMS lookup if not already present). |
| iso_country_code      | STRING    | ISO country code of the user at the time of the event.                          |
| ms_click_id           | STRING    | Click ID associated with the event.                                             |

---

## Monetize conversion data tables

This table contains Xbox Store purchase events associated with Monetize line items.

Both ad-exposed and non-ad-exposed conversions are included.

A conversion is considered ad-attributed if a user received a traffic event within the configured lookback window (1–14 days) before the conversion.

### xbox_conversions table

| Column name                    | Data type | PII? (k-min label required) | Description                                                                 |
|--------------------------------|-----------|-----------------------------|-----------------------------------------------------------------------------|
| date                           | INTEGER   | No                          | Conversion event date in YYYYMMDD format.                                   |
| purchase_time                  | LONG      | No                          | Unix timestamp when the item was purchased and fulfilled.                   |
| line_item_id                   | INTEGER   | No                          | Monetize line item ID associated with the product.                          |
| advertiser_id                  | INTEGER   | No                          | Monetize advertiser ID associated with the line item.                       |
| hashed_email                   | STRING    | Yes                         | SHA256 hash used as a join key to exposures.                                |
| product_id                     | STRING    | No                          | Unique identifier for the product.                                          |
| product_name                   | STRING    | No                          | Human-readable product name.                                                |
| product_category               | STRING    | No                          | Category or genre of the product (from categoryName).                       |
| is_paid_transaction            | BOOLEAN   | No                          | Indicates whether the purchase is paid or free.                             |
| purchase_price_usd             | DECIMAL   | No                          | Purchase price in USD before tax.                                           |
| purchase_price_usd_microcents  | LONG      | No                          | Purchase price in microcents.                                               |
| purchase_currency_code         | STRING    | No                          | Currency used for the purchase.                                             |
| device_family                  | STRING    | No                          | Device family (for example, PC, console, mobile).                           |
| device_model                   | STRING    | No                          | Device model (for example, Xbox One X, Xbox Series S).                      |
| in_game_purchase               | BOOLEAN   | No                          | Indicates whether the purchase occurred in-game.                            |
| has_xbox_live_subscription     | BOOLEAN   | No                          | Indicates whether the user has an Xbox Live subscription.                   |
| has_xbox_game_pass_for_console | BOOLEAN   | No                          | Indicates whether the user has Xbox Game Pass for console.                  |
| has_xbox_game_pass_for_pc      | BOOLEAN   | No                          | Indicates whether the user has Xbox Game Pass for PC.                       |
| has_xbox_game_pass_ultimate    | BOOLEAN   | No                          | Indicates whether the user has Xbox Game Pass Ultimate.                     |
| transaction_type               | STRING    | No                          | Transaction type (for example, pre-order, purchase).                        |
| iso_country_code               | STRING    | No                          | Country code where the event occurred.                                      |
| order_id                       | STRING    | No                          | Unique transaction ID associated with the purchase.                         |
| xbox_id                        | LONG      | Yes                         | XUID associated with the purchase.                                          |

---

## Audience segment membership

This table contains the latest user-to-segment associations for active users. An active user is defined as a user who has been served an impression. For more information, see [available in-market audiences](https://help.ads.microsoft.com/#apex/ads/en/56851/1).

### map_ima_segment_exposures table

| Column name   | Data type | Description                                                                |
|---------------|-----------|----------------------------------------------------------------------------|
| hashed_email  | STRING    | SHA256-hashed email representing the user associated with the record.      |
| segment_id    | INTEGER   | Unique segment ID that the user belongs to.                                |
| segment_name  | STRING    | Human-readable segment name associated with the user.                      |

---

## Advertiser data upload

Advertisers can upload first-party data to the LiveRamp clean room in two ways:

1. Connect data from supported public cloud sources without moving the data  
2. Upload user files directly  

Uploaded datasets can include a variety of data types, such as:

- Offline transaction data (for example, store visits or in-app purchases not tracked by UET or CAPI)  
- CRM audience segments or customer data  
- Customer profiles (for example, loyalty program members)  
- Web or app analytics events  

Datasets that include supported identifiers (such as hashed email) can be joined with Microsoft data to support custom attribution for impressions and clicks.

Any files that contain personally identifiable information (PII), such as email addresses, must be standardized and hashed before upload. SHA-256 is the supported hashing method.

---

## Format and hash data

To protect user privacy, format and hash personal data before uploading.

### Format data

Follow these guidelines:

- Format phone numbers using the E.164 standard  

For email addresses:

- Remove leading and trailing whitespace  
- Convert all characters to lowercase  
- Remove text between “+” and “@”  
  - Example: `name+alias@outlook.com` → `name@outlook.com`  
- Remove periods before “@”  
  - Example: `e.xample@outlook.com` → `example@outlook.com`  
- Ensure the address contains “@”  
- Remove all spaces  
- Ensure a domain suffix is present (for example, `.com`)  
- Remove accented characters (for example, `à`)  

### Hash data

- Use the SHA-256 hashing algorithm  
- Don't apply salting  

| Key Type | Example Value            | Hash (SHA-256; no salt; lowercase characters)                        |
|----------|--------------------------|----------------------------------------------------------------------|
| XUID     | 1234567890123456         | 7a51d064a1a216a692f753fcdab276e4ff201a01d8b66f56d50d4d719fd0dc87     |
| Email    | example@outlook.com      | 912ec7074338e900ecd85cd53cf0e7c3e4e00cb65120eb5a18463a30f0e3e208     |

---

## Query (question) approval process

Queries that include another party’s data must go through an approval process before execution.

This process helps protect PII and ensures compliance with privacy safeguards.

### Validation steps

1. **Syntax validation**  
   Confirms that SQL queries meet dataset constraints defined by the data owner  

2. **Privacy and quality checks**  
   Ensures all queries comply with clean room privacy controls, including input and output k-min thresholds  

3. **Query approval**  
   Requires manual approval from both Microsoft and the advertiser before execution  

---
