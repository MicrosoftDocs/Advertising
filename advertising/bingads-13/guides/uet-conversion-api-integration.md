---
title: UET Conversion API (CAPI) Integration Guide
ms.service: bing-ads
ms.subservice: guides-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: The UET Conversion API integration (CAPI) guide provides a comprehensive overview for advertisers on how to implement Microsoft's Universal Event Tracking (UET) server-to-server event tracking solution.
---
# UET Conversion API Integration (CAPI) Guide 

UET Conversion API Integration outlines how advertisers can implement server-side tracking for conversions using Microsoft Advertising’s Universal Event Tracking (UET). By leveraging the Conversion API, businesses can capture key user actions—such as purchases, subscriptions, and custom goals—even when client-side tracking is limited by browser restrictions or ad blockers. The guide walks through setup steps, payload formatting, and SDK usage for apps, enabling more accurate attribution and campaign optimization across platforms.

## Overview

### Document Audience

This document is intended to be used by advertiser customers to implement UET Conversion API. It will also be referenced by the Microsoft support and technical account manager teams to assist advertisers in understanding, implementing, and validating their solutions. As the primary reader of this document, the advertiser (customer) will be referred to in the second person as "you". Microsoft will be referred to by name or occasionally "we".

### Universal Event Tracking (UET)

Universal Event Tracking (UET) is a Microsoft framework which captures user engagement data on your website, enabling features like conversion tracking (like purchases or leads), audience targeting (like Remarketing), auto bidding and Microsoft Bing for Commerce. This document outlines the integration process for the UET Conversion API.

For more information, see the UET docs on the Microsoft Advertising help site: https://help.ads.microsoft.com/#apex/ads/en/56681/2

### Direct Integration

Most advertisers leverage a JavaScript tag provided by Microsoft called the UET tag. This is the default way of sending UET data to Microsoft, automatically handles a lot of the auto tagging complexity, allows for more advanced functionality such as UET Insights or Clarity, and will be the primary path for supporting Privacy Sandbox APIs in the future. We offer a separate solution for advertisers who cannot or will not use UET JavaScript. The Conversion API can be used independently or alongside UET JS tracking.

Conversion API (this doc) will allow you to format and send event data from your backend, without running any Microsoft JavaScript on the end-user's browser. While the data is captured server-side, there is an optional client-side user id-sync pixel which connects Microsoft and customer assigned user ids.

The integration work required to use this approach is much heavier than the UET JavaScript.

## Data Flows

There are two data flows that you should implement for UET Conversion API:

1. UET user events sent via Conversion API (server-to-server)
2. ID sync pixels sent client-to-server

### Overview

*A diagram of a company's information*
*AI-generated content may be incorrect.*

### Client-side ID-Sync

ID sync allows your internal IDs to be mapped to Microsoft IDs. This is strongly recommended for any Microsoft Advertising products that must identify a user off-site, such as remarketing. You must fire the ID sync beacon client-side as this will allow Microsoft to capture our 3P cookie IDs for your user.

We recommend you instrument this ID sync pixel on as many site pages as possible, but feel free to throttle where appropriate but please send at least once per session (ex. on the first page view). We maintain a durable mapping on our end.

Please include the following parameters:

- **Red3** – (required) Microsoft assigned customer id in the format `BACID_<CID>`
- **VID** – (required) guest user anonymous id, preferably a GUID
- **UID** – (optional) authenticated user id (anonymized)

**Note:** the customer ID is different than the UET tag id. One customer account (with a single CID) may contain many UET tags. If your account has multiple CIDs, please use the primary CID. Feel free to reach out to Microsoft Advertising support your account manager for confirmation or if you have questions.

#### Endpoint & Example

Please send all ID sync events to this endpoint:

```
https://c.bing.com/c.gif?uid=111222&vid=b171a9b06ce011ecafcd1b209be8601b&Red3=BACID_123456
```

The easiest way to do this is by dynamically inserting an img tag, either rendered server side (and returned to the client) in the HTML response or in JavaScript:

```html
<img src="https://c.bing.com/c.gif?vid=...&Red3=BACID_123456">
```

## Server-side UET Events

There are two distinct types of UET events that can be sent:

1. **Page load events** – for each page load or SPA page navigation. The page URL provided is used to power destination-based conversion goals and remarketing segments.
2. **Custom events** – capture richer data by firing on specific events and page types. Certain parameters are used for custom conversion goals, dynamic remarketing, etc.

Every page view or SPA navigation must fire 1 page load event and may optionally fire 1 or more custom events. Each custom event is linked to a page load event via a "page load id" parameter named "pageLoadId". This is described in greater depth in the next section.

Please URL (percent) encode any parameters that may contain special characters.

### API Endpoint

Please send all S2S Direct events to this endpoint:

```
https://capi.uet.microsoft.com/v1/{tagID}/events
```

Please include your specific UET tag ID in the URL format `/v1/{tagId}/events`. Contact your Account Manager to obtain the token. The token should be included in the header "Authorization". POST-requests with a JSON body are accepted.

Use the Bearer scheme for the authorization header as follows:

```
Authorization: Bearer <ApiToken>
```

You can find your existing tag or provision a new UET tag ID in your Microsoft Advertising account. There is no special Conversion API setting or requirements at the tag level, but we recommend creating a new Conversion API tag and not comingling events unless it makes sense for your specific use case – such as using the UET JavaScript on your site generally but sending only conversions via Conversion API.

The various supported event parameters (and examples) are described in the following sections. Please append them on the query string as key value pairs. This endpoint will return an HTTP 200 status code upon success, or an HTTP 400/401 status code with error information.

Upload events individually or in batches. Sending events in real-time is best.

**Maximum events for batch upload: 1000**

## UET Parameters

Parameter tables are shown below for page load and custom events. The following sections include additional discussion and details for how to format and send.

### Authorization

Use UET tagID and token for authorization. Contact your Account Manager to get the token.

### Data Schema

| Field | Type | Required | Description | Example |
|-------|------|----------|-------------|---------|
| data | list of objects | Yes | Main object with list of events | |
| eventType | string | Yes | Event type, use "pageLoad" or "custom" | pageLoad OR custom |
| eventId | string | | EventID for deduplication | 1234567-54422 |
| eventName | string | | Event action for custom conversion goals, if used | checkout_complete |
| eventTime | integer($int64) | Yes | Timestamp of the event (UNIX epoch time UTC) in seconds | 1710438591 |
| eventSourceUrl | string | Required for pageLoad events | URL of the page, used for ex. "destination URL" goals | https://www.bing.com/search?q=wal+clock |
| pageLoadId | string | | Page load id that links to 0+ custom events from the same page. Format as a v4 UUID | bcf3000b-65fa-4cd2-808a-8a6cf2b1d0a5 |
| referrerUrl | string | | Referrer of the page, used for ex. "referral" remarketing lists | https://www.bing.com/ |
| pageTitle | string | | Page title (ex. document.title) | Wall Clocks |
| keywords | string | | Page keywords (SEO meta keywords) | clocks,homedecor |
| adStorageConsent | string | | Use "G" for granted and "D" for denied | G |
| userData | object | | User information | |
| clientUserAgent | string | | User agent header from the browser of the end user | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/57.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36 |
| anonymousId | string | | Guest user anonymous id, also used for ID sync. Prefer (not required) a v1 UUID | b171a9b06ce011ecafcd1b209be8601b |
| externalId | string | | Authenticated user id (anonymized) if user is logged in. Also used for ID sync | 111222 |
| em | string | | Hashed email (details in later section) | ec81f3ac7b2b19675bab9d54cf416f9f18cff87c97da5cca82c0f0891bc40602 |
| ph | string | | Hashed phone (details in later section) | ec81f3ac7b2b19675bab9d54cf416f9f18cff87c97da5cca82c0f0891bc40602 |
| clientIpAddress | string | | IP address of the user (v4 or v6) | 127.0.0.1 |
| msclkid | string | | Microsoft "last click ID" (details in later section) | dd4afcccb1c9a4cad9544dd7e5006 |
| idfa | string | | For iOS devices ID for advertising | 550e8400-e29b-41d4-a716-446655440000 |
| gaid | string | | For Android devices – advertising ID | 550e8400-e29b-41d4-a716-446655440000 |
| customData | object | | Event data | |
| eventCategory | string | | Event category for custom conversion goals, if used | my_category |
| eventLabel | string | | Event label for custom conversion goals, if used | my_label |
| eventValue | number($double) | | Event value (float) for custom conversion goals, if used | 123.45 |
| searchTerm | string | | Search query used by the user for a search results page, optional | Wall clocks |
| transactionId | string | | Unique ID associated with this, optional but recommended for singular events like a purchase | txn12345 |
| value | number($double) | | Revenue value (float) to report variable revenue for goals, if used | 123.45 |
| currency | string | | Revenue currency 3-digit ISO 4217, if used | USD or EUR |
| items | list of objects | | Array with 1+ product details | (See later section) |
| id | string | | Item id | prod123456 |
| quantity | int | | Item quantity | 2 |
| price | int | | Item price (after discounts) | 25.1 |
| name | string | | Item name | T-Shirt |
| itemIds | list of string | | Comma separated list of product ids | prod1,prod2 |
| pageType | string | | One of: "cart", "category", "home", "other", "product", "purchase", "searchresults" | purchase |
| ecommTotalValue | number($double) | | Total value of the cart or purchase | 123.45 |
| ecommCategory | string | | Category ID | 1234 |
| hotelData | object | | Hotel data | |
| totalPrice | int | | Total price of the booking, including taxes and fees | 188 |
| basePrice | number($double) | | Price of the booking, not including taxes and fees | 165 |
| checkinDate | string | | Checkin date in the form YYYY-MM-DD | 2018-10-27 |
| checkoutDate | string | | Checkout date in the form of YYYY-MM-DD. Not required if you specify hct_length_of_stay | 2018-10-31 |
| lengthOfStay | int | | Number of nights the booking is for. Not required if you specify hct_checkout_date | 4 |
| partnerHotelId | string | | ID that you used to identify the hotel in your property feed | example_hotel |
| bookingHref | string | | Encrypted or obfuscated booking reference number | X2N5531APZ |
| continueOnValidationError | boolean | | Use for batch uploads: true – if you want to skip invalid events, false (default) – entire request will not be processed | false |

### Example

```json
{
  "data": [
    {
      "eventType": "pageLoad",
      "eventId": "1234567-54422",
      "eventName": "checkout_complete",
      "eventTime": 1710438591,
      "eventSourceUrl": "https://www.bing.com/search?q=wal+clock",
      "pageLoadId": "bcf3000b-65fa-4cd2-808a-8a6cf2b1d0a5",
      "referrerUrl": "https://www.bing.com/",
      "pageTitle": "Wall Clocks",
      "keywords": "clocks,homedecor",
      "adStorageConsent": "G|D",
      "userData": {
        "clientUserAgent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/57.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36",
        "anonymousId": "b171a9b06ce011ecafcd1b209be8601b",
        "externalId": "111222",
        "em": "ec81f3ac7b2b19675bab9d54cf416f9f18cff87c97da5cca82c0f0891bc40602",
        "ph": "ec81f3ac7b2b19675bab9d54cf416f9f18cff87c97da5cca82c0f0891bc40602",
        "clientIpAddress": "127.0.0.1",
        "msclkid": "dd4afcccb1c9a4cad9544dd7e5006",
        "idfa": "550e8400-e29b-41d4-a716-446655440000",
        "gaid": "550e8400-e29b-41d4-a716-446655440000"
      },
      "customData": {
        "eventCategory": "my_category",
        "eventLabel": "my_label",
        "eventValue": 123.45,
        "searchTerm": "Wall clocks",
        "transactionId": "txn12345",
        "value": 123.45,
        "currency": "USD",
        "items": [
          {
            "id": "prod123456",
            "quantity": 2,
            "price": 25.1,
            "name": "T-Shirt"
          }
        ],
        "itemIds": [
          "prod1",
          "prod2"
        ],
        "pageType": "purchase",
        "ecommTotalValue": 123.45,
        "ecommCategory": "1234",
        "hotelData": {
          "totalPrice": 188,
          "basePrice": 165,
          "checkinDate": "2018-10-27",
          "checkoutDate": "2018-10-31",
          "lengthOfStay": 4,
          "partnerHotelId": "example_hotel",
          "bookingHref": "X2N5531APZ"
        }
      }
    }
  ],
  "continueOnValidationError": false
}
```

## Page Load Events

Send 1 separate page load event for each page view or SPA page navigation.

**Example:**

```json
{
  "eventType": "pageLoad",
  "eventTime": 1744430084,
  "eventSourceUrl": "https://www.bing.com/search?q=wal+clock",
  "pageLoadId": "bcf3000b-65fa-4cd2-808a-8a6cf2b1d0a5",
  "referrerUrl": "https://www.bing.com/",
  "pageTitle": "Wall Clocks",
  "keywords": "clocks,homedecor"
}
```

## Custom Events

Fire 0+ custom events to send richer event level data to Microsoft.

**Example:**

```json
{
  "eventType": "custom",
  "eventId": "1234567-54422",
  "eventName": "checkout_complete",
  "eventTime": 1744430084,
  "customData": {
    "eventCategory": "my_category",
    "eventLabel": "my_label"
  }
}
```

## Variable Revenue

Revenue value (the gv param) may apply to the whole page or a specific custom event, depending on your needs. If it is associated with a custom event (such as an event with event action =purchase), simply include the revenue value and revenue currency fields in the same event.

However, page load events cannot be populated with revenue value directly. If you need to pass variable revenue for the page to apply to a destination URL goal, you must send an additional custom event with only revenue value – and not any of the other custom parameters. The pageLoadId param must match the page load event that the revenue is associated with.

**Example:**

```json
{
  "value": 123.45,
  "currency": "USD"
}
```

## Items Array

You can send a complete list of "items" associated with an event in the "items" parameter. This can capture the specific details of multiple products etc. Currently the "items array" is only used for specific advertising products and is not used in typical conversion tracking goals.

Please format the array as an array of nested query strings, with proper URL encoding. URL-encoding is not required when sending JSON.

**For example:**

```json
{
  "items": [
    {
      "id": "prod123456",
      "quantity": 2,
      "price": 25.1,
      "name": "T-Shirt"
    },
    {
      "id": "prod234567",
      "quantity": 5,
      "price": 27.3,
      "name": "T-Shirt"
    }
  ]
}
```

## Consent Signals

Conversions API supports consent signals: https://help.ads.microsoft.com/apex/index/3/en/60119

By default, we process all events as consent state = granted. If you need to use explicit consent signals, you can use parameter adStorageConsent with 2 options:

- **G** = granted
- **D** = denied. Denied events will not be used for any ad purposes (inc. conversion attribution and retargeting)

```json
{
  "adStorageConsent": "G|D"
}
```

## User Data

### Click ID (MSCLKID)

The Microsoft Click ID is used to assist us in attributing conversions accurately to clicks. When you have auto-tagging turned on for your account, after a user clicks on your ad your landing page is passed the click ID as a query string param named "msclkid". Because you are not using the UET JavaScript, it is your responsibility to capture/store this click id associated with this user and include it on all subsequent UET events generated for that user.

We recommend storing the msclkid in a 1P cookie or local storage, but you can also keep this in a server-side store if appropriate. You only need to store the "last" value for a user and should always replace an existing click ID if you capture a new one.

- **Suggested retention/expiration:** 90 days
- **Format:** UUID like "dd4afcccb1c9a4cad9544dd7e5006"

### Visitor ID and User ID

You must send a unique "visitor ID" (anonymousId) on all events, and you may include a unique "user ID" (externalId) if available. These correspond to an "anonymous/tracking" ID and a "logged-in user" ID, respectively. Microsoft uses these IDs to aggregate events for a single user over time.

The anonymousId value for a user must match the vid provided in the client-side ID sync pixel. This allows us to locate a user elsewhere (not on your site), for purposes of view-through conversion attribution and audiences/targeting.

Never send your real user IDs. We recommend generating new UUIDs or applying a hash.

- **Preferred vid format:** v1 UUID like "b171a9b06ce011ecafcd1b209be8601b"
- **ExternalId format:** controlled by you, but we prefer a 32-byte hexstring (like UUID) if possible

### Hashed Identifiers

Some browsers are already blocking third-party cookies and it is expected that many more will follow. To improve conversion measurement (enhanced conversions) and allow some amount of targeting products to continue, we strongly recommend you send us the hashed email and phone number for all users where you have it available. These can be passed in the "em" and "ph" params on all event types.

For more information on enhanced conversions, see here: https://help.ads.microsoft.com/apex/index/3/en/60178

#### To hash email:

1. Trim all whitespace from either side of the email address
2. Remove all dots '.' from the user part of the email address
3. Remove any alias '+alias' from the end of the user part of the email address
4. Convert to lowercase
5. Apply a SHA-256 hash and format as a lowercase hex-string

#### To hash phone:

1. Normalize as an E.164 phone number with country code, ex. +14255551234
2. Apply a SHA-256 hash and format as a lowercase hex-string

**Example for email "john@contoso.com" and phone "+14255551234":**

```json
{
  "em": "ec81f3ac7b2b19675bab9d54cf416f9f18cff87c97da5cca82c0f0891bc40602",
  "ph": "c59475d96e9f01d7d18d06cfad84dd02333207f02c0c2c5663ef2782cda0390e"
}
```

### Mobile Device ID

You can send mobile device IDs:

- **IDFA** – for Apple device
- **GAID** – Google Advertising ID for Android devices

### User Details

We also ask that you forward to us the event timestamp (ts), user agent (ua param), and IP address (ip param) of the end-user as part of their events. These allow us to locate and join to other activities from the same user, such as clicks that may have led to a conversion on your site.

```json
{
  "userData": {
    "clientUserAgent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/57.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36",
    "anonymousId": "b171a9b06ce011ecafcd1b209be8601b",
    "externalId": "111222",
    "em": "ec81f3ac7b2b19675bab9d54cf416f9f18cff87c97da5cca82c0f0891bc40602",
    "ph": "ec81f3ac7b2b19675bab9d54cf416f9f18cff87c97da5cca82c0f0891bc40602",
    "clientIpAddress": "127.0.0.1",
    "msclkid": "dd4afcccb1c9a4cad9544dd7e5006",
    "idfa": "550e8400-e29b-41d4-a716-446655440000",
    "gaid": "550e8400-e29b-41d4-a716-446655440000"
  }
}
```

## Vertical Specific Parameters

UET supports an additional set of vertical specific parameters. These parameters are used for specific advertising products such as dynamic remarketing and should be sent as part of custom event(s). Please send as much data as possible so that you can leverage our different advertising solutions.

### Retail (E-commerce)

For retail you can send the following additional fields. See here for more information: https://help.ads.microsoft.com/#apex/ads/en/56910/1

Please URL encode each product id if necessary and encode again the whole parameter. Product IDs must match either the ID or item_group_id attribute in your product feed submitted through Microsoft Merchant Center (MMC). This allows us to join to your product details that are used for dynamic remarketing.

In most cases it will make sense to pass the same value for revenue and ecommTotalValue. Also send currency if available, and the items array (see above).

**Example:**

```json
{
  "itemIds": ["prod1", "prod2"],
  "pageType": "purchase",
  "ecommTotalValue": 123.45,
  "ecommCategory": "1234"
}
```

### Hotel Conversions

For hotel conversions you can send the following additional fields. [Learn more](../../hotel-ads/index.md)

Please also send currency and revenue value as appropriate.

**Example:**

```json
{
  "hotelData": {
    "totalPrice": 188,
    "basePrice": 165,
    "checkinDate": "2018-10-27",
    "checkoutDate": "2018-10-31",
    "lengthOfStay": 4,
    "partnerHotelId": "example_hotel",
    "bookingHref": "X2N5531APZ"
  }
}
```

### Other Verticals

We may support some other verticals such as flights. Please work with your account team to understand what else may be available now or is planned.

## Putting It Together

### Implementation Checklist

1. **Optional step (highly recommended for remarketing)** - Implement the client-side ID sync pixel sitewide, and if you throttle make sure to send at least once per user session (recommended: first page load in a session)
2. Capture msclkid from your landing pages and store per user – send it with all UET events for that user
3. Send page load events for every page or SPA page navigation, along with url and a newly generated pageLoadId
4. Send custom events as appropriate for vertical specific pages (ex. cart, purchase) and conversion events
5. Verify in your account under UET tags that events are being received
6. Check that conversions are appearing

### Dos and Don'ts

**DO:**
- Include hashed email & phone as often as possible, along with user agent & IP
- Always include the last msclkid for a user
- Ensure the anonymousId for a user from CAPI events matches the vid from ID sync events

**DON'T:**
- Fire the ID sync pixel from your server as we won't be able to get the Microsoft IDs
- Skip sending msclkid for conversion events as vid alone is not sufficient

## Examples

All these examples are custom events and show the incremental parameters on top of this base set. As always, please include msclkid if available.

```json
{
  "eventType": "custom",
  "eventId": "1234567-54422",
  "eventName": "checkout_complete",
  "eventTime": 1710438591,
  "userData": {
    "clientUserAgent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/57.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36",
    "anonymousId": "b171a9b06ce011ecafcd1b209be8601b",
    "externalId": "111222",
    "clientIpAddress": "127.0.0.1",
    "msclkid": "dd4afcccb1c9a4cad9544dd7e5006"
  }
}
```

### Retail Homepage

For general site visitors, this page would typically not have any prodids or value.

```json
{
  "customData": {
    "pageType": "home"
  }
}
```

### Retail Search Results

From a search results page, including prodids and a search term.

```json
{
  "customData": {
    "pageType": "searchresults",
    "itemIds": ["prod1", "prod2"],
    "searchTerm": "Wall clocks"
  }
}
```

### Retail Category Page

From a category page, usually including the top X (ex. 10) products.

```json
{
  "customData": {
    "pageType": "category",
    "ecommCategory": "1234",
    "itemIds": ["prod1", "prod2"]
  }
}
```

### Retail Product Page

From a product detail page, expressing interest in a single product.

```json
{
  "customData": {
    "pageType": "product",
    "itemIds": ["prod1"]
  }
}
```

### Retail Cart Page

View cart page, including total value and per-item details if possible.

```json
{
  "customData": {
    "pageType": "cart",
    "value": 83.3,
    "currency": "USD",
    "ecommTotalValue": 83.3,
    "items": [
      {
        "id": "prod123456",
        "quantity": 2,
        "price": 25.1,
        "name": "T-Shirt"
      },
      {
        "id": "prod234567",
        "quantity": 1,
        "price": 33.1,
        "name": "T-Shirt"
      }
    ]
  }
}
```

### Retail Purchase Confirmation

After a purchase occurs.

```json
{
  "customData": {
    "pageType": "purchase",
    "value": 50.2,
    "currency": "USD",
    "ecommTotalValue": 50.2,
    "items": [
      {
        "id": "prod123456",
        "quantity": 2,
        "price": 25.1,
        "name": "T-Shirt"
      }
    ]
  }
}
```

## Errors

If the data is incorrect, the API will return an error and no data will be processed. For batch uploads, errors will prevent all events from being processed.

If you prefer to skip invalid events and process rest of events, then add a flag "continueOnValidationError":

```json
{
  "data": [
    {
      ...
    }
  ],
  "continueOnValidationError": true
}
```

### Unauthorized

**Error:** Incorrect or Missing Token - Response Status 401

```json
{
  "error": {
    "code": "Unauthorized",
    "message": "You are not authorized to access this resource."
  }
}
```

### Validation Error

Invalid parameters.

**Error:** 400 Bad Request.

```json
{
  "error": {
    "code": "ValidationError",
    "message": "One or multiple parameters did not pass validation checks, see details.",
    "details": [
      {
        "index": 0,
        "propertyName": "data[0].eventType",
        "errorMessage": "'eventType' must be one of the following: pageLoad, custom."
      },
      {
        "index": 0,
        "propertyName": "data[0].eventTime",
        "errorMessage": "'eventTime' must not be empty."
      },
      {
        "index": 0,
        "propertyName": "data[0].referrerUrl",
        "errorMessage": "'referrerUrl' must be a valid URL."
      },
      {
        "index": 0,
        "propertyName": "data[0].userData.em",
        "errorMessage": "'em' must be a valid SHA256 string."
      },
      {
        "index": 0,
        "propertyName": "data[0].userData.ph",
        "errorMessage": "'ph' must be a valid SHA256 string."
      }
    ]
  }
}
```
## Legal Notice

This document is provided "as-is". Information and views expressed in this document, including URL and other Internet Web site references, may change without notice.

This document does not provide you with any legal rights to any intellectual property in any Microsoft product. You may copy and use this document for your internal, reference purposes.

© 2024 Microsoft. All rights reserved.

Microsoft is a trademark of the Microsoft group of companies. All other trademarks are property of their respective owners.
