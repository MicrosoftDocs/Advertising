---
title: Conversions API (CAPI) Guide
ms.service: bing-ads
ms.subservice: guides-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: The Conversions API (CAPI) guide provides a comprehensive overview for advertisers on how to implement Microsoft's Universal Event Tracking (UET) server-to-server event tracking solution.
---

# Conversions API (CAPI) Guide

With the Conversions API, advertisers can implement server-side tracking for conversions using Microsoft Advertising’s Universal Event Tracking (UET). By leveraging the API, businesses can capture key user actions—such as purchases, subscriptions, and custom goals—even when client-side tracking is limited by browser restrictions or ad blockers. This guide outlines the setup process, payload formatting, and SDK usage for apps, enabling more accurate attribution and improved campaign optimization across platforms.

## Overview

### Universal Event Tracking (UET)

Universal Event Tracking (UET) is a Microsoft framework that captures user engagement data on your website, enabling features such as conversion tracking (e.g., purchases or leads), audience targeting (e.g., remarketing), automated bidding, and integration with Microsoft Bing for Commerce. This document outlines the integration process for the Conversions API.

For more information, see the [UET documentation](https://help.ads.microsoft.com/#apex/ads/en/56681/2) on the Microsoft Advertising help site: 

### Direct Integration

Most advertisers use a JavaScript tag provided by Microsoft called the UET tag. This is the default method for sending UET data to Microsoft. It automatically handles much of the auto-tagging complexity, enables advanced functionality such as UET Insights and Clarity, and will serve as the primary path for supporting Privacy Sandbox APIs in the future.

For advertisers who cannot or choose not to use the UET JavaScript, we offer an alternative solution. The Conversions API can be used independently or in conjunction with UET JavaScript tracking.

The Conversions API allows you to format and send event data from your backend without running any Microsoft JavaScript in the end user’s browser. While the data is captured server-side, a client-side user ID sync pixel can be used to connect Microsoft and customer-assigned user IDs.

Note that the integration effort required for this approach is significantly greater than that of using the UET JavaScript.

## Data Flows

There are two data flows you should implement for the Conversions API:

1. UET user events sent via the Conversions API (server-to-server)
2. ID sync pixels sent from client to server

### Client-side ID-Sync

> [!NOTE]
> ID Sync is recommended for conversion measurement. It’s required for remarketing and audience building because these features rely on user identity resolution, such as *MUID* or *StableId*.

ID sync allows your internal IDs to be mapped to Microsoft IDs. This is strongly recommended for any Microsoft Advertising products that need to identify users off-site, such as remarketing. You must fire the ID sync beacon client-side, as this enables Microsoft to capture our third-party cookie IDs for your users.

We recommend instrumenting the ID sync pixel on as many site pages as possible. Feel free to throttle where appropriate, but ensure it fires at least once per session (e.g., on the first page view). Microsoft maintains a durable mapping on our end.

Please include the following parameters:

- **Red3** – (required) Microsoft-assigned customer ID in the format `BACID_<CID>`
- **VID** – (required) Guest user anonymous ID, preferably a GUID
- **UID** – (optional) Authenticated user ID (anonymized)

*Note*: The customer ID is different from the UET tag ID. A single customer account (with one CID) may contain multiple UET tags. If your account has multiple CIDs, please use the primary CID. Feel free to contact Microsoft Advertising support or your account manager for confirmation or assistance.

#### Endpoint & Example

Send all ID sync events to this endpoint:

```html
https://c.bing.com/c.gif?uid=111222&vid=b171a9b06ce011ecafcd1b209be8601b&Red3=BACID_123456
```

The easiest way to do this is by dynamically inserting an `<img>` tag, either rendered server-side and returned to the client in the HTML response, or inserted via JavaScript.

```html
<img src="https://c.bing.com/c.gif?vid=...&Red3=BACID_123456">
```

## Server-side UET Events

There are two distinct types of UET events that can be sent:

- **Page load events** – Triggered on each page load or single-page application (SPA) navigation. The provided page URL is used to support destination-based conversion goals and remarketing segments.
- **Custom events** – Capture richer data by firing on specific user actions or page types. These events use specific parameters for custom conversion goals, dynamic remarketing, and other advanced features.

Each page view or SPA navigation must trigger one page load event and may optionally trigger one or more custom events. Every custom event should be linked to its corresponding page load event using a "page load ID" parameter named pageLoadId. This linkage is explained in greater detail in the next section.

Please URL-encode any parameters that may contain special characters.

### API Endpoint

Send all S2S Direct events to this endpoint:

```html
https://capi.uet.microsoft.com/v1/{tagID}/events
```

Include your specific UET tag ID in the URL format `/v1/{tagId}/events`. Contact your Account Manager to obtain the token. The token should be included in the header "Authorization". POST-requests with a JSON body are accepted.

Use the Bearer scheme for the authorization header as follows:

```html
Authorization: Bearer <ApiToken>
```

You can find your existing tag or provision a new UET tag ID in your Microsoft Advertising account. There are no special Conversions API settings or requirements at the tag level, but we recommend creating a dedicated Conversions API tag and avoiding event commingling—unless it aligns with your specific use case, such as using UET JavaScript for general site tracking while sending only conversion events via the Conversions API.

The supported event parameters (with examples) are described in the following sections. Please append them to the query string as key-value pairs. This endpoint will return an HTTP 200 status code upon success, or an HTTP 400/401 status code with error details.

Events can be uploaded individually or in batches. Real-time event delivery is preferred.

*Note*: The maximum number of events per batch upload is 1,000.

## UET Parameters

Parameter tables for page load and custom events are shown below. The following sections provide additional discussion and details on formatting and sending these events.

### Authorization

Use the UET `tagID` and token for authorization.  

> [!NOTE]
> You can now obtain your auth token from the Microsoft Advertising UI by selecting **Use Conversions API**. This program is in pilot. Contact your account manager to join.

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

Send one separate page load event for each page view or single-page application (SPA) navigation.

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

Fire zero or more custom events to send richer, event-level data to Microsoft.

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

**Deduplication example:**

In this scenario, deduplication refers to a client choosing to use the same UET tag ID for both UET JS and the Conversions API.

```javascript
<script>
  window.uetq = window.uetq || [];
  window.uetq.push(
    'event',
    'Replace_with_Event_Action',
    {
      event_category: 'Replace_with_Event_Category',
      event_label: 'Replace_with_Event_Label',
      event_value: 'Replace_with_Event_Value',
      event_id: '1234567-54422'
    }
  );
</script>
```

## Variable Revenue

The revenue value (the `gv` parameter) may apply to either the entire page or a specific custom event, depending on your needs. If it is associated with a custom event—such as one with `eventAction=purchase`, simply include the revenue value and revenue currency fields within that event.

However, page load events cannot be populated directly with revenue value. If you need to pass variable revenue for a page to support a destination URL goal, you must send an additional custom event containing only the revenue value—without any other custom parameters. The `pageLoadId` parameter must match the page load event to which the revenue is associated.

**Example:**

```json
{
  "value": 123.45,
  "currency": "USD"
}
```

## Items Array

You can send a complete list of items associated with an event using the `items` parameter. This allows you to capture detailed information about multiple products or other entities. Currently, the `items` array is used only for specific advertising products and is not applicable to standard conversion tracking goals.

Format the array as an array of nested query strings with proper URL encoding. URL encoding is not required when sending data in JSON format.

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

The Conversions API supports consent signals. [Learn more](https://help.ads.microsoft.com/apex/index/3/en/60119)

By default, all events are processed with the consent state set to granted. If you need to use explicit consent signals, you can include the `adStorageConsent` parameter with one of the following values:

- **G** – Granted
- **D** – Denied (events with this value will not be used for any advertising purposes, including conversion attribution and retargeting)

```json
{
  "adStorageConsent": "G|D"
}
```

## User Data

### Click ID (MSCLKID)

The Microsoft Click ID is used to accurately attribute conversions to ad clicks. When auto-tagging is enabled for your account, the click ID is passed to your landing page as a query string parameter named `msclkid` after a user clicks on your ad. Since you are not using the UET JavaScript, it is your responsibility to capture and store this click ID for the associated user and include it in all subsequent UET events generated for that user.

We recommend storing the `msclkid` in a first-party cookie or local storage, though a server-side store is also acceptable if appropriate. You only need to retain the most recent value for each user and should always overwrite the existing click ID when a new one is captured.

- **Suggested retention/expiration**: 90 days

- **Format**: UUID, e.g., `dd4afcccb1c9a4cad9544dd7e5006`

### Visitor ID and User ID

You must include a unique visitor ID (`anonymousId`) with all events, and may optionally include a unique user ID (`externalId`) if available. These correspond to an anonymous/tracking ID and a logged-in user ID, respectively. Microsoft uses these identifiers to aggregate events for a single user over time.

The `anonymousId` value must match the vid provided in the client-side ID sync pixel. This enables Microsoft to identify the user across other contexts (outside your site) for purposes such as view-through conversion attribution and audience targeting.

Important: Never send real user IDs. We recommend generating new UUIDs or applying a hash.

- **Preferred `vid` format**: Version 1 UUID, e.g., `b171a9b06ce011ecafcd1b209be8601b`
- **`externalId` format**: Controlled by you, but ideally a 32-byte hex string (similar to a UUID)

### Hashed Identifiers

Some browsers are already blocking third-party cookies, and many more are expected to follow. To improve conversion measurement (enhanced conversions) and preserve certain targeting capabilities, we strongly recommend sending hashed email addresses and phone numbers for all users when available. These can be included in the `em` and `ph` parameters across all event types.

[Learn more](https://help.ads.microsoft.com/apex/index/3/en/60178) about enhanced conversions.

#### To hash an email address

1. Trim all whitespace from both ends of the email address.
2. Remove all dots (.) from the user portion of the email address.
3. Remove any alias (e.g., +alias) from the end of the user portion.
4. Convert the entire email address to lowercase.
5. Apply a SHA-256 hash and format the result as a lowercase hexadecimal string.

#### To hash a phone number

1. Normalize the phone number to E.164 format with country code (e.g., +14255551234).
2. Apply a SHA-256 hash and format the result as a lowercase hexadecimal string.

Example using the email `john@contoso.com` and phone number +14255551234:

```json
{
  "em": "ec81f3ac7b2b19675bab9d54cf416f9f18cff87c97da5cca82c0f0891bc40602",
  "ph": "c59475d96e9f01d7d18d06cfad84dd02333207f02c0c2c5663ef2782cda0390e"
}
```

### Mobile Device ID

You can send mobile device IDs:

- **IDFA** – Identifier for Apple devices
- **GAID** – Google Advertising ID for Android devices

### User Details

We also ask that you include the event timestamp (`ts`), user agent (`ua` parameter), and IP address (`ip` parameter) of the end user as part of each event. These details help us associate the event with other user activities, such as ad clicks that may have led to a conversion on your site.

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

UET supports an additional set of vertical-specific parameters. These are used for specialized advertising products, such as dynamic remarketing, and should be included as part of custom events. Please provide as much relevant data as possible to fully leverage our range of advertising solutions.

### Retail (E-commerce)

For retail, you can send the following additional fields. [Learn more](https://help.ads.microsoft.com/#apex/ads/en/56910/1)

Please URL-encode each product ID if necessary, and then encode the entire parameter again. Product IDs must match either the `id` or `item_group_id` attribute in your product feed submitted through Microsoft Merchant Center (MMC). This allows us to link to your product details for use in dynamic remarketing.

In most cases, it makes sense to pass the same value for both `revenue` and `ecommTotalValue`. Also, include the `currency` if available, along with the `items` array (see above).

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

Include the `currency` and `revenue` values, as appropriate.

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

We may support additional verticals, such as flights. Please consult your account team to learn what is currently available or planned.

## Putting It Together

### Implementation Checklist

1. Optional step (highly recommended for remarketing): Implement the client-side ID sync pixel sitewide. If throttling is applied, ensure it fires at least once per user session (recommended: on the first page load of the session).
2. Capture the `msclkid` from your landing pages and store it per user. Send it with all UET events associated with that user.
3. Send page load events for every page or SPA navigation, including the URL and a newly generated `pageLoadId`.
4. Send custom events as appropriate for vertical-specific pages (e.g., cart, purchase) and conversion events.
5. Verify in your account under UET tags that events are being received.
6. Check that conversions are appearing.

### Dos and Don'ts

**DO**:

- Include hashed email and phone whenever possible, along with the user agent and IP address.
- Always include the most recent `msclkid` for each user.
- Ensure the `anonymousId` from CAPI events matches the `vid` from ID sync events.

**DON'T**:

- Fire the ID sync pixel from your server, as this prevents us from retrieving Microsoft IDs.
- Omit the `msclkid` from conversion events, `vid` alone is not sufficient.

## Examples

All of these examples are custom events and illustrate the incremental parameters added to the base set. As always, please include the `msclkid` if available.

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

"For general site visitors, this page typically doesn't include any `prodIds` or `value`.

```json
{
  "customData": {
    "pageType": "home"
  }
}
```

### Retail Search Results

From a search results page, including `prodIds` and the `searchTerm`.

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

From a category page, typically including the top X products (e.g., 10).

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

From a product detail page, indicating interest in a single product.

```json
{
  "customData": {
    "pageType": "product",
    "itemIds": ["prod1"]
  }
}
```

### Retail Cart Page

On the view cart page, include the total value and per-item details, if possible.

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

If the data is incorrect, the API will return an error and no data will be processed. For batch uploads, any errors will prevent all events from being processed.

If you prefer to skip invalid events and process the remaining ones, add the flag `continueOnValidationError`.

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

**Error**: Incorrect or missing token — response status 401.

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

This document is provided "as-is." The information and views expressed in this document, including URLs and other Internet website references, may change without notice.

This document does not grant you any legal rights to any intellectual property in any Microsoft product. You may copy and use this document for internal reference purposes only.

© 2025 Microsoft. All rights reserved.

Microsoft is a trademark of the Microsoft group of companies. All other trademarks are the property of their respective owners.
