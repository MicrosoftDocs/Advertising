---
title: UET parameters table
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: This table contains all of the parameters you can capture with UET for pageLoad or custom events.
---

# UET Parameters Table

## Full list of parameters

The following table contains all of the parameters you can capture with UET for *pageLoad* or custom events:

| Field (Send with all events) | Required | Description |
| --- | --- | --- |
| **ti** | Yes | UET tag ID generated for you. |
| **ver** | Yes | Version of the UET tag. If doing a custom implementation, use version 2.3. |
| **mid** | Yes | A unique identifier (GUID) to uniquely identify events from a single page. If the page changes or refreshes, a new mid should be generated. |
| **uid** | No | Customer defined logged-in user ID. This ID remains the same across browsers and devices. |
| **vid** | No | Customer defined anonymous user ID. |
| **evt** | Yes | Can contain only 2 values – *pageLoad* or *custom*. |
| **rn** | Yes | Random 6-digit number which helps in handling browser cache restrictions. |
| **msclkid** | Yes | This field mitigates conversion attribution issues with Safari ITP. *msclkid* is generated at ad click time and appended to the landing page URL when auto-tagging of Microsoft Click ID is enabled. It should be stored in a first party cookie and sent along with other UET parameters. <br> Format: GUID followed by extra byte indicating whether the current value is a new one (unique to that session), as in "cdd4afcccb1c9a4cad9544dd7e5006d5-1".<br> Note: - Value will have "0" appended, i.e. [GUID]-0, if the MSCLK ID is not new (read from previously set cookies).<br>- Value will have "1" appended, i.e. [GUID]-1, if the MSCLK ID is new/read from query string on the landing page .<br>- Value will have "N" appended, for example [GUID]-1N, if cookies are blocked by the browser.<br>- Full value will be "N" if cookies are blocked by the browser or no ad click information exists in cookie, and the *msclkid* parameter isn't in the landing page URL. <br> Cookie name: *_uetmsclkid* <br> Cookie expiration date: 90 days |

### Additional parameters sent with *pageLoad* events

| Column 1 | Column 2 | Column 3 |
| --- | --- | --- |
| **p** | No | URL of the page. Recommended to be populated. Mandatory if using page URL to create remarketing lists. |
| **r** | No | Referrer page URL. Mandatory if using referral page URL to create remarketing lists. |
| **kl** | No | Page title. Recommended to be populated. Used for multiple purposes like user behavior modeling and fraud detection. |
| **tw** | No | Keyword. Captures the SEO meta keywords for the current page. |

### Additional parameters sent with custom events

| Column 1 | Column 2 | Column 3 |
| --- | --- | --- |
| **ec** | No | Event category defined by the advertiser. Needed if advertiser is using custom events for conversion tracking or remarketing. Cannot be used with a page load event. |
| **el** | No | Event label defined by the advertiser. Needed if advertiser is using custom events for conversion tracking or remarketing. Cannot be used with a page load event. |
| **ea** | No | Event action defined by the advertiser. Needed if advertiser is using custom events for conversion tracking or remarketing. Cannot be used with a page load event. |
| **ev** | No | Event value defined by the advertiser. Needed if advertiser is using custom events for conversion tracking or remarketing. Cannot be used with a page load event. |
| **pagetype** | No | One of the following page type: <br> - Cart<br>- Category<br>- Home<br>- Other<br>- Product<br>- Purchase<br>- Search results. <br> Cart refers to the shopping cart page and purchase refers to the confirmation page. |
| **prodid** | No | Captures a comma separated list of product IDs that the user has viewed. Multiple product IDs are supported when the page has more than one product. The parameter is the product ID of the product on the page, unique for each item, and must match either the ID or *item_group_id* attribute in the product feed submitted through MMC. |
| **search_term** | No | Search query used by the user before landing on the search results page. |
| **ecomm_category** | No | Category ID for the category browse page. |
| **transaction_id** | No | An ID that uniquely identifies each transaction. |
| **items** | No | Array containing details of products like product ID and price. To be captured on pages and events involving multiple products, eg., add to cart event, visiting the cart page, or visiting the purchase confirmation page. |
| **gv** | No | For use in conversion tracking to report variable revenue. |
| **gc** | No | Captures the currency in which revenue is reported. |

### Flight and travel parameters

| Column 1 | Column 2 | Column 3 |
| --- | --- | --- |
| **flight_destid** | No | Destination ID |
| **flight_originid** | No | Origin ID |
| **flight_pagetype** | No | Page type |
| **flight_startdate** | No | Start date |
| **flight_enddate** | No | End date |
| **flight_totalvalue** | No | Total value |

## Items

Items capture details of products such as product id, quantity, and price. They are captured on page views and events involving multiple products, such as the add to cart event or visiting the cart page.

| Property name | Description | Example |
| --- | --- | --- |
| **id** | Product ID | Prod123456 |
| **quantity** | Product quantity | 2 |
| **price** | Purchase price of the item after all discounts have been applied. | 25.1 |
