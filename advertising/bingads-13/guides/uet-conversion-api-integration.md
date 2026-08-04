---
title: Conversions API (CAPI)
ms.service: bing-ads
ms.subservice: guides-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 8/4/2026
description: Learn how to implement Microsoft Advertising's Conversions API (CAPI) for server-side conversion tracking, attribution, audience creation, and dynamic remarketing.
---

# What is Conversions API?

Conversions API (CAPI) is Microsoft Advertising's server-side solution for sending conversion and customer interaction data directly from an advertiser's systems to Microsoft Advertising. Advertisers can use CAPI to send website events, CRM events, offline sales transactions, and mobile events through one setup, making it easier to support multiple measurement scenarios with a single connection.

Key reasons advertisers use CAPI include:

- Improve conversion measurement accuracy.
- Send online, offline, CRM, and app events through a single setup.
- Increase attribution coverage.
- Support audience creation for dynamic remarketing.
- Reduce reliance on browser-only tracking solutions.
- Future-proof measurement investments as privacy requirements continue to evolve.

## Supported scenarios at a glance

CAPI supports website, CRM, offline, mobile, and dynamic remarketing scenarios. Review the implementation path and detailed use cases before moving into endpoint, authorization, payload, and troubleshooting details.

## Recommended implementation approach

Microsoft recommends using CAPI with Universal Event Tracking (UET) whenever possible. UET captures browser-based activity and page context, while CAPI provides a server-side path for sending additional events and details that occur after UET fires.

Plan for deduplication: When the same conversion can be sent by both UET and CAPI, use a shared `eventId` so Microsoft Advertising can avoid double-counting. For more information, see [Prevent duplicate conversions](#prevent-duplicate-conversions).

## Implementation overview

1. **[Confirm readiness](#before-you-begin-implementation-readiness-checklist).** Make sure the account, UET tag, authentication token, conversion goals, consent approach, identifiers, and validation owners are in place before implementation begins.
1. **[Select a data-sending path](#ways-to-use-capi).** Decide whether to send data through a direct API build, partner integration, or tag manager setup.
1. **[Define events, signal quality, and data schema](#troubleshooting-validation-and-launch).** Determine which website, CRM, offline, app, or audience events to send, how they align to conversion goals, which fields are required, and which matching, attribution, consent, ID Sync, and deduplication inputs each scenario needs.
1. **[Validate and monitor after launch](#troubleshooting-validation-and-launch).** Confirm events are accepted, resolve API or payload errors, verify conversion and audience behavior, and monitor integration health over time.

## Before you begin: Implementation readiness checklist

Before implementing Conversions API, confirm the following items are ready.

- **Account and access:** Microsoft Advertising account, UET tag ID, Conversions API authentication token, and defined conversion goals.
- **Client-side ID Sync planned:** Required for dynamic remarketing and strongly recommended for conversion measurement quality. See [ID Sync and why it matters](#id-sync-and-why-it-matters) for setup details.
- **Event and attribution data:** `msclkid`, stable `eventId` values, valid timestamps, user agent, and IP address where available and permitted.
- **Customer identifiers:** Hashed email, hashed phone, customer ID, anonymous ID, and external ID where available and permitted by policy, regulation, and customer consent.

## Ways to use CAPI

Advertisers can send data to CAPI through different implementation paths depending on where their conversion data lives and which systems they already use.

| Data-sending path | Best for | Example | Setup notes |
| --- | --- | --- | --- |
| Direct API | Advertisers with engineering support, custom data models, or event sources that need direct control. | A retailer sends purchase and checkout events from its backend order system directly to CAPI. | Build a server-side connection to the CAPI endpoint, map events to Microsoft parameters, send events in real time or batches, and validate delivery. |
| Partner integrations | Advertisers that already use a customer data platform (CDP), data platform, agency, tool provider, or managed connector to collect and route conversion data. | A B2B advertiser sends qualified lead, opportunity, and closed-won events from its CDP or partner connector to CAPI. | The partner or platform may handle setup, event mapping, formatting, and data streaming. The advertiser still needs the correct account, UET tag, token, conversion goals, consent approach, and identifiers. |
| Tag manager or server-side tag manager | Web-focused advertisers that want a faster setup path with less custom development. | An ecommerce advertiser uses server-side Google Tag Manager to capture checkout and purchase events, then route those events to CAPI. | Configure triggers, variables, event names, identifiers, payload fields, and validation checks in the tag manager or server-side tag manager environment. |

### Current partner integrations

| Partner | Documentation |
| --- | --- |
| Adobe Real-Time CDP | Coming soon |
| Commanders Act | [Microsoft Conversions API](https://doc.commandersact.com/features/destinations/destinations-catalog/microsoft/microsoft-conversions-api) |
| Freshpaint | Microsoft Ads Conversions API (Early Access) |
| Invoca | [Invoca integration with Microsoft Advertising](https://www.invoca.com/integrations/microsoft-advertising) |
| MetaRouter | [Microsoft Ads - CAPI](https://docs.metarouter.io/docs/microsoft-ads-capi) |
| Segment/Twilio | Microsoft Bing CAPI Destination, Segment Documentation |
| Stape.io | [Guide to Microsoft Conversions API integration](https://stape.io/blog/guide-microsoft-conversion-api-integration) |
| Switch Growth | Coming soon |
| Tealium | [Microsoft UET Conversions API connector](https://docs.tealium.com/server-side-connectors/microsoft-uet-conversion-api-connector/) |

## Technical implementation

### Define your server-side events

CAPI supports two main event types: custom events and page load events.

Custom events capture richer user actions such as checkout completion, form submission, cart activity, search results, product views, or purchase confirmation. When a custom event corresponds to a page load, include the same `pageLoadId` so Microsoft Advertising can associate the custom action with the page context.

Send one page load event for each page view or single-page application navigation. Page load events include page context such as the page URL, referrer URL, page title, and keywords.

| Event type | When to send | Important fields | Notes |
| --- | --- | --- | --- |
| Custom | Specific user actions or page types. | `eventType`, `eventId`, `eventName`, `customData` | Use for conversion goals, ecommerce, dynamic remarketing, and advanced measurement. |
| Page load | Each page view or SPA navigation. | `eventType`, `eventTime`, `eventSourceUrl`, `pageLoadId` | Supports destination-based goals and page-context matching. |

### Improve attribution and matching

#### Send MSCLKID whenever possible

MSCLKID is Microsoft's click identifier. When auto-tagging is enabled, Microsoft Advertising appends `msclkid` to the landing page after an ad click. If you are sending events through CAPI, capture this value, store it for the associated user, and include the most recent value in subsequent events whenever available.

- Store the most recent `msclkid` in a first-party cookie, local storage, or server-side store.
- Overwrite the stored value when a newer `msclkid` is captured.
- Use a suggested retention period of 90 days.
- Do not rely on visitor ID alone for attribution when `msclkid` is available.
- Format: UUID, for example, `dd4afccc-b1c9-4a4c-ad95-44dd7e5006ab`.

#### ID Sync and why it matters

ID Sync connects an advertiser's visitor identifier, such as an anonymous visitor ID, to Microsoft identifiers. It is required for dynamic remarketing, and is recommended for conversion measurement quality because CAPI events are sent server-side and may not include the same browser context that UET JavaScript can observe client-side.

Implement ID Sync as a client-side pixel, not a server-side call, so Microsoft can read the necessary browser context when the sync occurs. Fire the pixel on as many pages as practical and at least once per session, preferably on the first page view.

Include the following parameters:

- **Red3** (required): Microsoft-assigned customer ID in the format `BACID_<CID>`.
- **VID** (required): Guest user anonymous ID, preferably a GUID.
- **UID** (optional): Authenticated user ID (anonymized).

Send ID Sync events to `https://c.bing.com/c.gif` with the required parameters. The customer ID is different from the UET tag ID: a single customer account can contain multiple UET tags, and accounts with multiple CIDs should use the primary CID unless Microsoft Advertising support or the account manager confirms otherwise.

| Question | Guidance |
| --- | --- |
| When is ID Sync required? | Required for audience creation, remarketing, and dynamic remarketing use cases. |
| When is it highly recommended? | Recommended for conversion measurement quality, especially when `msclkid`, hashed identifiers, or browser context may be incomplete. |
| Where should it fire? | Client-side on the advertiser site, ideally sitewide and at least once per user session. |
| What must align? | The VID used in ID Sync should match the `anonymousId` sent in CAPI events. |
| What should not be sent? | Do not send raw email addresses, raw phone numbers, or real user IDs. Use anonymized or hashed identifiers where permitted. |

### Prevent duplicate conversions

#### Why Event ID matters

When UET JavaScript and CAPI send the same conversion event, pass the same stable deduplication value in `eventId` and keep `eventName` compatible across both systems. This helps Microsoft Advertising recognize the duplicate event and avoid counting the same conversion twice.

```text
Website Purchase
|-- UET Event
`-- CAPI Event

Shared Event ID: 1234567-54422
```

### Send requests

#### Authorization token and API endpoint

##### Authorization token

CAPI uses the UET `tagId` that corresponds to the conversion goals and event you want to measure. You can generate or retrieve an authorization token via [API](#generate-or-retrieve-an-authorization-token-by-api) or in the [Microsoft Advertising UI](#generate-or-retrieve-an-authorization-token-in-microsoft-advertising).

> [!NOTE]
> If you use UET JavaScript and CAPI for the same conversion event, use the same UET `tagId`, `eventId`, and `eventName` to support deduplication.

##### Generate or retrieve an authorization token by API

To get an authorization token for a UET tag, call the Campaign Management API endpoint:

```http
POST /CampaignManagement/v13/UetTagAuthKey/Query
```

Include the required authentication headers, including your OAuth bearer token, developer token, and customer account ID. In the request body, provide the UET tag ID:

```json
{
  "TagId": 123456789
}
```

The API returns the authorization token for that UET tag:

```json
{
  "TagAuthKey": {
    "AuthKey": "xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx"
  },
  "PartialErrors": []
}
```

If an authorization token already exists, the API returns the existing token. If no token exists, the API creates and returns a new token only when the caller owns the UET tag. Callers with access to a shared tag can retrieve an existing token, but they can't generate a new one. If the tag is invalid or not visible to the caller, the API returns an error.

##### Generate or retrieve an authorization token in Microsoft Advertising

1. Find your existing tag or provision a new UET tag ID in the **UET** section of your Microsoft Advertising account.
1. Select your existing UET tag by using the pencil icon.
1. Select **Save and next** in the **Edit UET tag** section.
1. In the **Set up tagging** section, select **Use Conversions API**.
1. In the **Conversions API** section, select **Copy Token**, select **Next**, and then select **Done**.

##### API endpoint

Send all server-to-server direct events to this endpoint:

```http
POST /v1/{tagId}/events HTTP/1.1
Host: capi.uet.microsoft.com
```

Include your specific UET tag ID in the URL format `/v1/{tagId}/events`. Include the token in the `Authorization` header of a POST request with a JSON body. Use the Bearer scheme:

```http
Authorization: Bearer <ApiToken>
```

Include the supported fields in the JSON request body according to the payload object map. The endpoint returns an HTTP 200 status code upon success, or an HTTP 400 or 401 status code with error details.

Events can be uploaded individually or in batches. Real-time event delivery is preferred. The maximum number of events per batch upload is 1,000.

## Parameters and payload reference

This reference section defines the payload fields used across CAPI implementations. Use it after you have selected an implementation path and confirmed which events, identifiers, consent values, and ecommerce or vertical-specific fields apply to your scenario.

### Payload object map

| Object or location | Purpose | Example fields |
| --- | --- | --- |
| Request level | Controls how the request is processed and identifies third-party senders when applicable. | `data`, `continueOnValidationError`, `dataProvider` |
| Event level | Defines the event being sent and the page or conversion context. | `eventType`, `eventTime`, `eventId`, `eventName`, `eventSourceUrl`, `pageLoadId`, `adStorageConsent` |
| `userData` | Contains matching and attribution identifiers. | `msclkid`, `em`, `ph`, `anonymousId`, `externalId`, `clientUserAgent`, `clientIpAddress`, `idfa`, `gaid` |
| `customData` | Contains business, ecommerce, vertical, and conversion-value attributes. | `value`, `currency`, `transactionId`, `eventCategory`, `eventLabel`, `items`, `itemIds`, `pageType`, `hotelData` |

### Core data schema requirements

| Field | Type | Required | Description | Example |
| --- | --- | --- | --- | --- |
| data | list of objects | Yes | Main object with list of events | |
| eventType | string | Yes | Event type, use "pageLoad" or "custom" | pageLoad OR custom |
| eventId | string | Required for deduplication | Event ID for deduplication | 1234567-54422 |
| eventName | string | Required for deduplication | Event action for custom conversion goals, if used | checkout_complete |
| eventTime | integer($int64) | Yes | Timestamp of the event (UNIX epoch time UTC) in seconds. *eventTime* must be within the last 7 days. | 1710438591 |
| eventSourceUrl | string | Required for pageLoad events | URL of the page, used for ex. "destination URL" goals | `https://www.bing.com/search?q=wal+clock` |
| pageLoadId | string | | Page load id that links to 0+ custom events from the same page. Format as a v4 UUID | bcf3000b-65fa-4cd2-808a-8a6cf2b1d0a5 |
| referrerUrl | string | | Referrer of the page, used for ex. "referral" remarketing lists | `https://www.bing.com/` |
| pageTitle | string | | Page title (ex. document.title) | Wall Clocks |
| keywords | string | | Page keywords (SEO meta keywords) | clocks,homedecor |
| adStorageConsent | string | | Use "G" for granted and "D" for denied | G |
| userData | object | Yes | User information. Include at least one supported identifier: `anonymousId`, `externalId`, `em`, `ph`, `msclkid`, `idfa`, or `gaid`. | |
| clientUserAgent | string | Preferred, not required | User agent header from the browser of the end user | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/57.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36 |
| anonymousId | string | Preferred, not required | Guest user anonymous ID, also used for ID Sync. Prefer (not required) a v1 UUID | b171a9b06ce011ecafcd1b209be8601b |
| externalId | string | Preferred, not required | Authenticated user ID (anonymized) if the user is signed in. Also used for ID Sync | 111222 |
| em | string | Preferred, not required | Hashed email (details in a later section) | ec81f3ac7b2b19675bab9d54cf416f9f18cff87c97da5cca82c0f0891bc40602 |
| ph | string | Preferred, not required | Hashed phone (details in a later section) | ec81f3ac7b2b19675bab9d54cf416f9f18cff87c97da5cca82c0f0891bc40602 |
| clientIpAddress | string | Preferred, not required | IP address of the user (v4 or v6) | 127.0.0.1 |
| msclkid | string | Strongly preferred, not required | Microsoft last click ID (details in a later section). Must be a valid UUID. | dd4afccc-b1c9-4a4c-ad95-44dd7e5006ab |
| idfa | string | Preferred, not required | For iOS devices, ID for advertising | 550e8400-e29b-41d4-a716-446655440000 |
| gaid | string | Preferred, not required | For Android devices, advertising ID | 550e8400-e29b-41d4-a716-446655440000 |
| customData | object | | Event data | |
| eventCategory | string | Preferred, not required | Event category for custom conversion goals, if used | my_category |
| eventLabel | string | Preferred, not required | Event label for custom conversion goals, if used | my_label |
| eventValue | number($double) | | Event value (float) for custom conversion goals, if used | 123.45 |
| searchTerm | string | | Search query used by the user for a search results page, optional | Wall clocks |
| transactionId | string | | Unique ID associated with this, optional but recommended for singular events like a purchase | txn12345 |
| value | number($decimal) | | Revenue value to report variable revenue for goals, if used | 123.45 |
| currency | string | | Revenue currency 3-digit ISO 4217, if used | USD or EUR |
| items | list of objects | | Array with 1+ product details | (See later section) |
| id | string | Preferred, not required | Item ID | prod123456 |
| quantity | int | | Item quantity | 2 |
| price | number($decimal) | | Item price (after discounts) | 25.1 |
| name | string | | Item name | T-Shirt |
| itemIds | list of strings | | JSON array of product IDs | `["prod1", "prod2"]` |
| pageType | string | Preferred, not required | One of: "cart", "category", "home", "other", "product", "purchase", "searchresults" | purchase |
| ecommTotalValue | number($decimal) | | Total value of the cart or purchase | 123.45 |
| ecommCategory | string | | Category ID | 1234 |
| hotelData | object | | Hotel data | |
| totalPrice | number($decimal) | | Total price of the booking, including taxes and fees | 188.23 |
| basePrice | number($decimal) | | Price of the booking, not including taxes and fees | 165.76 |
| checkinDate | string | | Checkin date in the form YYYY-MM-DD | 2018-10-27 |
| checkoutDate | string | | Checkout date in the form of YYYY-MM-DD. Not required if you specify hct_length_of_stay | 2018-10-31 |
| lengthOfStay | int | | Number of nights the booking is for. Not required if you specify hct_checkout_date | 4 |
| partnerHotelId | string | | ID that you used to identify the hotel in your property feed | example_hotel |
| bookingHref | string | | Encrypted or obfuscated booking reference number | X2N5531APZ |
| continueOnValidationError | boolean | | Use for batch uploads: true – if you want to skip invalid events, false (default) – entire request will not be processed | false |
| dataProvider | string | Required for third-party senders | Custom string to include in integrations to support analysis, debugging, and monitoring | example_data_provider |

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
        "msclkid": "dd4afccc-b1c9-4a4c-ad95-44dd7e5006ab",
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
          "totalPrice": 188.23,
          "basePrice": 165.76,
          "checkinDate": "2018-10-27",
          "checkoutDate": "2018-10-31",
          "lengthOfStay": 4,
          "partnerHotelId": "example_hotel",
          "bookingHref": "X2N5531APZ"
        }
      }
    }
  ],
  "continueOnValidationError": false,
  "dataProvider": "example_data_provider"
}
```

## Data schema details

### Page load events

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
  "keywords": "clocks,homedecor",
  "userData": {
    "anonymousId": "b171a9b06ce011ecafcd1b209be8601b"
  }
}
```

### Custom events

Fire zero or more custom events to send richer, event-level data to Microsoft.

**Example:**

```json
{
  "eventType": "custom",
  "eventId": "1234567-54422",
  "eventName": "checkout_complete",
  "eventTime": 1744430084,
  "userData": {
    "anonymousId": "b171a9b06ce011ecafcd1b209be8601b"
  },
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

### Variable revenue

The revenue value (the `gv` parameter) may apply to either the entire page or a specific custom event, depending on your needs. If it is associated with a custom event—such as one with `eventAction=purchase`, simply include the revenue value and revenue currency fields within that event.

However, page load events cannot be populated directly with revenue value. If you need to pass variable revenue for a page to support a destination URL goal, you must send an additional custom event containing only the revenue value—without any other custom parameters. The `pageLoadId` parameter must match the page load event to which the revenue is associated.

**Example:**

```json
{
  "value": 123.45,
  "currency": "USD"
}
```

### Items array

You can send a complete list of items associated with an event using the `items` parameter. This allows you to capture detailed information about multiple products or other entities. Currently, the `items` array is used only for specific advertising products and is not applicable to standard conversion tracking goals.

Format `items` as a JSON array of objects.

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

### Consent signals

The Conversions API supports consent signals. [Learn more](https://help.ads.microsoft.com/apex/index/3/en/60119)

By default, all events are processed with the consent state set to granted. If you need to use explicit consent signals, you can include the `adStorageConsent` parameter with one of the following values:

- **G** – Granted
- **D** – Denied (events with this value will not be used for any advertising purposes, including conversion attribution and retargeting)

```json
{
  "adStorageConsent": "G|D"
}
```

### User data

#### Click ID (MSCLKID)

The Microsoft Click ID is used to accurately attribute conversions to ad clicks. When auto-tagging is enabled for your account, the click ID is passed to your landing page as a query string parameter named `msclkid` after a user clicks on your ad. Since you are not using the UET JavaScript, it is your responsibility to capture and store this click ID for the associated user and include it in all subsequent UET events generated for that user.

We recommend storing the `msclkid` in a first-party cookie or local storage, though a server-side store is also acceptable if appropriate. You only need to retain the most recent value for each user and should always overwrite the existing click ID when a new one is captured.

- **Suggested retention/expiration**: 90 days

- **Format**: UUID, e.g., `dd4afccc-b1c9-4a4c-ad95-44dd7e5006ab`

#### Visitor ID and user ID

Every event must include a `userData` object with at least one supported identifier. Use `anonymousId` as the unique visitor ID whenever it's available, and optionally include `externalId` for a signed-in user. Other accepted identifiers include `msclkid`, hashed email (`em`), hashed phone (`ph`), `idfa` (Apple's Identifier for Advertisers), and `gaid` (Google Advertising ID). Microsoft uses these identifiers to associate events with a user over time.

The `anonymousId` value must match the vid provided in the client-side ID sync pixel. This enables Microsoft to identify the user across other contexts (outside your site) for purposes such as view-through conversion attribution and audience targeting.

Important: Never send real user IDs. We recommend generating new UUIDs or applying a hash.

- **Preferred `vid` format**: Version 1 UUID, e.g., `b171a9b06ce011ecafcd1b209be8601b`
- **`externalId` format**: Controlled by you, but ideally a 32-byte hex string (similar to a UUID)

#### Hashed identifiers

Some browsers are already blocking third-party cookies, and many more are expected to follow. To improve conversion measurement (enhanced conversions) and preserve certain targeting capabilities, we strongly recommend sending hashed email addresses and phone numbers for all users when available. These can be included in the `em` and `ph` parameters across all event types.

[Learn more](https://help.ads.microsoft.com/apex/index/3/en/60178) about enhanced conversions.

##### To hash an email address

1. Trim all whitespace from both ends of the email address.
2. Remove all dots (.) from the user portion of the email address.
3. Remove any alias (e.g., +alias) from the end of the user portion.
4. Convert the entire email address to lowercase.
5. Apply a SHA-256 hash and format the result as a lowercase hexadecimal string.

##### To hash a phone number

1. Normalize the phone number to E.164 format with country code (e.g., +14255551234).
2. Apply a SHA-256 hash and format the result as a lowercase hexadecimal string.

Example using the email `john@contoso.com` and phone number +14255551234:

```json
{
  "em": "ec81f3ac7b2b19675bab9d54cf416f9f18cff87c97da5cca82c0f0891bc40602",
  "ph": "c59475d96e9f01d7d18d06cfad84dd02333207f02c0c2c5663ef2782cda0390e"
}
```

#### Mobile device ID

You can send mobile device IDs:

- **IDFA** – Identifier for Apple devices
- **GAID** – Google Advertising ID for Android devices

#### User details

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
    "msclkid": "dd4afccc-b1c9-4a4c-ad95-44dd7e5006ab",
    "idfa": "550e8400-e29b-41d4-a716-446655440000",
    "gaid": "550e8400-e29b-41d4-a716-446655440000"
  }
}
```

### Vertical-specific parameters

UET supports an additional set of vertical-specific parameters. These are used for specialized advertising products, such as dynamic remarketing, and should be included as part of custom events. Please provide as much relevant data as possible to fully leverage our range of advertising solutions.

#### Retail (ecommerce)

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

#### Hotel conversions

For hotel conversions you can send the following additional fields. [Learn more](../../hotel-ads/index.md)

Include the `currency` and `revenue` values, as appropriate.

**Example:**

```json
{
  "hotelData": {
    "totalPrice": 188.23,
    "basePrice": 165.76,
    "checkinDate": "2018-10-27",
    "checkoutDate": "2018-10-31",
    "lengthOfStay": 4,
    "partnerHotelId": "example_hotel",
    "bookingHref": "X2N5531APZ"
  }
}
```

#### Other verticals

We may support additional verticals, such as flights. Please consult your account team to learn what is currently available or planned.

## Troubleshooting, validation, and launch

Use this section after implementation to confirm events are delivered, diagnose API response errors, resolve reporting or audience issues, complete launch readiness checks, and monitor the integration after launch.

### Batch uploads and validation behavior

Events can be uploaded individually or in batches. Real-time event delivery is preferred because it minimizes latency for conversion reporting, optimization, and troubleshooting. The maximum number of events per batch upload is 1,000.

CAPI reports two types of validation issues:

- **Validation errors** make an event invalid. Examples include a missing required field, an unsupported `eventType`, or an invalid `eventTime`.
- **Validation warnings** apply to optional fields whose values can't be accepted. Examples include an invalid `referrerUrl`, hashed identifier, currency, page type, or optional ecommerce or hotel field. The API removes each field that produced a warning and processes the event without that field.

By default, if any event in a batch has a validation error, the API returns HTTP 400 and doesn't process any events in the batch. To skip invalid events and process the remaining valid events in the batch, set `continueOnValidationError` to `true` in the request payload.

With `continueOnValidationError: true`, the API returns HTTP 200 when at least one event is valid. The response includes `ValidationError` details for skipped events and can include `ValidationWarning` details for fields that were removed. The `eventsReceived` value reports the number of events that were processed. If no events are valid, the API returns HTTP 400.

If a request has validation warnings but no validation errors, the API returns HTTP 200 regardless of the `continueOnValidationError` setting. The affected values are removed, and the events are processed without them.

- Keep batches below the 1,000-event maximum and split larger uploads into multiple requests.
- Log request IDs, response codes, failed record indexes, and validation details so issues can be investigated later.
- Use retry logic carefully: Retry temporary failures, but don't blindly retry validation errors without fixing the payload.
- Use stable `eventId` values so retries don't create duplicate conversions.
- Validate timestamps, URLs, consent values, hashed identifiers, and required fields before sending large batches.

### API error handling

The API returns success or error responses based on authentication, request format, and field-level validation. Use error details to identify whether the issue affects the entire request, a specific event index, or a specific property in the payload.

| Error type | Status | Likely cause | How to resolve |
| --- | --- | --- | --- |
| Unauthorized | 401 | The token is missing, incorrect, expired, or not authorized for the tag. | Confirm the token, UET tag ID, and Bearer authorization header. |
| Validation error | 400 | One or more payload properties failed validation. | Use the returned property name and event index to fix the invalid field. |
| Validation warning | 200 | An optional property failed validation and was removed before the event was processed. | Review the warning details and correct the field before the next request. |
| Invalid event type | 400 | `eventType` is missing or isn't one of the supported values. | Use `pageLoad` or `custom`. |
| Invalid timestamp | 400 | `eventTime` is missing, malformed, or outside the supported window. | Send a valid UNIX UTC timestamp in seconds and validate event recency before upload. |
| Invalid URL | 400 or 200 | A required `eventSourceUrl` is invalid, or an optional `referrerUrl` is invalid. | Validate URL format. An invalid `referrerUrl` is removed and returned as a warning. |
| Invalid hash | 200 | `em` or `ph` isn't a valid SHA-256 string. | Normalize identifiers first, then SHA-256 hash and output lowercase hexadecimal strings. The invalid field is removed and returned as a warning. |

### Detailed API error response examples

Use the response body to determine whether the request failed because of authentication, request-level validation, or one or more invalid records in the `data` array. When the response includes an index, that index points to the event position in the submitted batch.

#### Unauthorized response

A 401 response usually means the request is missing the authentication token, the token is incorrect, or the token isn't authorized for the UET tag ID used in the request path.

```http
HTTP/1.1 401 Unauthorized
```

```json
{
  "error": {
    "code": "Unauthorized",
    "message": "You are not authorized to access this resource."
  }
}
```

1. Confirm the request includes `Authorization: Bearer <ApiToken>`.
1. Confirm the token was copied from the Microsoft Advertising UI for the correct account and tag setup.
1. Confirm the UET tag ID in the endpoint path matches the tag the token is authorized to use.
1. Don't retry the same request until the token, header, and tag ID are corrected.

#### Validation error response

A 400 validation error means one or more payload fields failed validation. In batch requests, the response can identify the event index and field path so the implementer can fix the affected event without guessing.

```http
HTTP/1.1 400 Bad Request
```

```json
{
  "error": {
    "code": "ValidationError",
    "message": "One or multiple parameters did not pass validation checks, see details. Note that only the first 10 errors and warnings are shown.",
    "details": [
      {
        "index": 0,
        "propertyName": "data[0].eventType",
        "errorMessage": "'eventType' must be one of the following: pageLoad, custom.",
        "errorCode": "InvalidEnumValue",
        "isWarning": false
      },
      {
        "index": 0,
        "propertyName": "data[0].eventTime",
        "errorMessage": "'eventTime' must not be empty.",
        "errorCode": "Empty",
        "isWarning": false
      },
      {
        "index": 0,
        "propertyName": "data[0].referrerUrl",
        "errorMessage": "'referrerUrl' must be a valid URL.",
        "errorCode": "InvalidUrl",
        "isWarning": true
      },
      {
        "index": 0,
        "propertyName": "data[0].userData.em",
        "errorMessage": "'em' must be a valid SHA256 string.",
        "errorCode": "InvalidSha256",
        "isWarning": true
      },
      {
        "index": 0,
        "propertyName": "data[0].eventTime",
        "attemptedValue": 1767793837,
        "errorMessage": "'eventTime' must be a valid UNIX UTC timestamp in seconds within last 7 days.",
        "errorCode": "InvalidEventTime",
        "isWarning": false
      }
    ]
  }
}
```

| Response field | How to interpret it | What to do next |
| --- | --- | --- |
| `index` | Identifies the event position in the submitted batch. | Find the corresponding event in the `data` array and fix that record. |
| `propertyName` | Identifies the exact field path that failed validation. | Correct the field value, format, or missing required property. |
| `attemptedValue` | Shows the rejected value when available. | Use it to identify malformed timestamps, invalid URLs, or incorrectly hashed identifiers. |
| `errorMessage` | Explains the validation rule that failed. | Update pre-send validation so future payloads catch the issue before upload. |
| `errorCode` | Identifies the validation rule programmatically. | Use the code to group and monitor recurring integration errors. |
| `isWarning` | Indicates whether the field was removed while the event was still accepted. | Treat `true` as partial data loss even when the response status is HTTP 200. |

### Troubleshooting workflow

Use this workflow when events are missing, batches are failing, conversions aren't appearing, duplicate conversions are reported, or audience populations aren't growing as expected.

1. **Confirm request authentication.** Verify the UET tag ID, endpoint path, and `Authorization: Bearer <ApiToken>` header before investigating field-level issues.
1. **Check request acceptance.** Confirm whether the API response is success, unauthorized, or validation failure. Resolve a 401 before retrying event payloads.
1. **Inspect validation details.** For 400 responses, use `index` and `propertyName` to identify the exact event and field that failed.
1. **Validate event timestamps.** Confirm `eventTime` is a UNIX UTC timestamp in seconds and falls within the supported processing window.
1. **Validate event setup.** Confirm `eventType`, `eventName`, conversion goal configuration, and custom event parameters align.
1. **Check attribution data.** Confirm `msclkid`, `anonymousId`, user agent, IP address, hashed email, and hashed phone are populated when available and permitted.
1. **Review batch behavior.** If one bad record blocks the batch, either correct the failed record and resend the batch or use `continueOnValidationError: true` and monitor rejected records separately.
1. **Retry safely.** Retry transient failures only. For validation failures, fix the payload first and preserve stable `eventId` values to reduce duplicate-conversion risk.

| Symptom | Likely cause | First action |
| --- | --- | --- |
| 401 Unauthorized | Missing, invalid, or unauthorized token. | Confirm tag ID, token, and Bearer authorization header. |
| 400 ValidationError | Invalid event field, missing required field, malformed URL, invalid hash, or invalid timestamp. | Use `details`, `index`, and `propertyName` to fix the failed record. |
| Batch fails completely | Invalid data in one or more events and default all-or-nothing behavior. | Fix invalid events before resend, or enable `continueOnValidationError` if partial processing is acceptable. |
| Events accepted but no conversions appear | Goal mapping, event name, timestamp, or attribution identifier issue. | Check conversion goal configuration, event names, timestamps, and `msclkid`. |
| Duplicate conversions | Missing or inconsistent `eventId` between UET and CAPI. | Use the same stable `eventId` for the same conversion across systems. |
| Audiences aren't growing | ID Sync missing or identifiers not aligned. | Confirm client-side ID Sync and ensure `anonymousId` matches VID. |

When a validation error includes an event index, use that index to locate the failed record in the `data` array. For example, `data[0].eventType` means the first event in the batch has an invalid or missing event type.

- If the issue is authentication-related, fix the token or header before retrying.
- If the issue is field validation, correct the affected event before retrying the batch.
- If `continueOnValidationError` is enabled, monitor skipped or rejected records separately so data quality issues aren't hidden.
- If retrying failed batches, preserve the same `eventId` for the same conversion event to support deduplication.

## Legal Notice

This document is provided "as-is." The information and views expressed in this document, including URLs and other Internet website references, may change without notice.

This document does not grant you any legal rights to any intellectual property in any Microsoft product. You may copy and use this document for internal reference purposes only.

© 2025 Microsoft. All rights reserved.

Microsoft is a trademark of the Microsoft group of companies. All other trademarks are the property of their respective owners.
