---
title: Live Query for Hotel ads
description: Enable and configure Live Query to return real-time hotel pricing when cached prices are unavailable.
ms.service: "bing-ads"
ms.subservice: "lodging-campaigns"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 5/27/2026
---

# Live Query for Hotel ads

Live Query is a real-time pricing mechanism in Microsoft Hotel ads. When a user searches for a hotel itinerary and current prices are unavailable or expired, Bing sends a request to the advertiser's endpoint to retrieve live pricing.

If the endpoint does not respond within the timeout, pricing is not returned and the ad is not displayed for that search.

## How Live Query works

1. A user searches for a hotel with a specific check-in date, length of stay, and number of guests.
2. If valid prices are unavailable, the system triggers a Live Query.
3. Bing sends an HTTP POST request with an XML payload to the configured endpoint.
4. The endpoint returns pricing data in the [Price feed](../transaction-message/transaction-message.md) format.
5. Bing renders the returned prices in the hotel ad.

## Performance requirements

| Requirement | Value |
| ------------ | ------- |
| Response timeout | < 4 seconds |
| Protocol | HTTPS |
| Request method | POST |
| Request content type | `application/xml; encoding=utf-8` |
| Response encoding | Plain, GZIP, or DEFLATE |

> [!IMPORTANT]
> Endpoints must respond within 4 seconds. Requests exceeding the timeout are dropped and prices are not displayed. Optimize for low-latency responses.

## Enabling Live Query

To enable Live Query:

1. Configure an HTTPS endpoint that accepts Live Query requests and returns a valid [Price feed](../transaction-message/transaction-message.md).
2. Provide the endpoint URL to your Microsoft Hotel ads account manager.
3. The endpoint is configured within your price feed settings.
4. Optionally configure authentication (Basic Auth or custom headers).

## Live Query request message

Bing sends an XML POST request with itinerary and property details. All requests use the `<Query>` root element.

Three formats are supported:

### Format 1: Standard query with occupancy

```xml
<Query>
  <Checkin>2026-04-15</Checkin>
  <Nights>3</Nights>
  <Context>
    <Occupancy>2</Occupancy>
  </Context>
  <PropertyList>
    <Property>HOTEL-12345</Property>
  </PropertyList>
</Query>
````

### Format 2: Latency-sensitive query

Includes `latencySensitive="true"` on the root element. Endpoints should prioritize response time and may return fewer results.

```xml
<Query latencySensitive="true">
  <Checkin>2026-04-15</Checkin>
  <Nights>3</Nights>
  <Context>
    <Occupancy>2</Occupancy>
  </Context>
  <PropertyList>
    <Property>HOTEL-12345</Property>
  </PropertyList>
</Query>
```

### Format 3: Query without occupancy

Used when occupancy-based pricing is not supported.

```xml
<Query>
  <Checkin>2026-04-15</Checkin>
  <Nights>3</Nights>
  <PropertyList>
    <Property>HOTEL-12345</Property>
  </PropertyList>
</Query>
```

### Query format comparison

| Element                | Standard   |       Latency-sensitive          |    Basic   |
| ---------------------- | :------:   |   :---------------------------:  |    :---:   |
| `<Query>`              |    ✅      | ✅ (`latencySensitive="true"`)   |    ✅      |
| `<Checkin>`            |    ✅      |               ✅                 |    ✅      |
| `<Nights>`             |    ✅      |               ✅                 |    ✅      |
| `<Context><Occupancy>` |    ✅      |               ✅                 |    ❌      |
| `<Property>`           |    ✅      |               ✅                 |    ✅      |

### Request element reference

| Element                   | Required | Description                                    |
| ------------------------- | -------- | ---------------------------------------------- |
| `Query`                   | Yes      | Root element. May include `latencySensitive`.  |
| `Query/@latencySensitive` | No       | When `"true"`, indicates low-latency handling. |
| `Checkin`                 | Yes      | Check-in date (`yyyy-MM-dd`).                  |
| `Nights`                  | Yes      | Length of stay (1–14).                         |
| `Context`                 | No       | Present when occupancy is supported.           |
| `Context/Occupancy`       | No       | Number of guests (1–4).                        |
| `PropertyList`            | Yes      | Properties to query.                           |
| `PropertyList/Property`   | Yes      | Advertiser hotel ID. Multiple allowed.         |

## Live Query response message

Responses must use the /advertising/hotel-ads/transaction-message format.

### Example with room bundles

```xml
<Transaction timestamp="2026-04-01T12:00:00Z" id="LQ-001">
  <Result>
    <Property>HOTEL-12345</Property>
    <Checkin>2026-04-15</Checkin>
    <Nights>3</Nights>
    <Baserate currency="USD">299.00</Baserate>
    <Tax currency="USD">45.00</Tax>
    <OtherFees currency="USD">15.00</OtherFees>
    <RoomBundle>
      <RoomID>STANDARD-KING</RoomID>
      <RoomName>Standard King Room</RoomName>
      <Baserate currency="USD">299.00</Baserate>
      <Tax currency="USD">45.00</Tax>
      <OtherFees currency="USD">15.00</OtherFees>
      <Occupancy>2</Occupancy>
      <Custom1>free-wifi</Custom1>
    </RoomBundle>
  </Result>
</Transaction>
```

### Example without room bundles

```xml
<Transaction timestamp="2026-04-01T12:00:00Z" id="LQ-002">
  <Result>
    <Property>HOTEL-12345</Property>
    <Checkin>2026-04-15</Checkin>
    <Nights>3</Nights>
    <Baserate currency="USD">299.00</Baserate>
    <Tax currency="USD">45.00</Tax>
    <OtherFees currency="USD">15.00</OtherFees>
  </Result>
</Transaction>
```

### Response requirements

| Requirement   | Detail                                                 |
| ------------- | ------------------------------------------------------ |
| Format        | Valid Transaction message XML                          |
| Currency      | Must be consistent within a response                   |
| Base rate     | Must be > 0 for display                                |
| Compression   | GZIP or DEFLATE supported                              |
| Room bundles  | Multiple allowed; lowest price per room type displayed |
| Custom fields | `Custom1`–`Custom5` optional                           |

## Authentication

Supported methods:

| Method               | Description                                             |
| -------------------- | ------------------------------------------------------- |
| Basic Authentication | Uses `Authorization: Basic <base64(username:password)>` |
| Custom headers       | User-defined key-value headers                          |
| None                 | Public endpoint (not recommended)                       |

Credentials are transmitted securely over HTTPS.

## Throttling and QPS limits

You can configure a maximum queries per second (QPS) limit. When exceeded:

* Requests may be delayed and retried
* Requests may be skipped if limits persist

Configure limits based on endpoint capacity.

## Best practices

1. Optimize for low latency.
2. Return all available room bundles.
3. Use a consistent currency.
4. Support response compression.
5. Handle multiple properties per request.
6. Monitor response time and error rates.
7. Maintain high availability.
8. Handle `latencySensitive="true"` requests with reduced payloads if needed.

## Error handling

| Scenario                        | Behavior                             |
| ------------------------------- | ------------------------------------ |
| HTTP 200 with valid XML         | Prices displayed                     |
| HTTP 200 with invalid/empty XML | No prices displayed                  |
| HTTP 4xx/5xx                    | Retry may occur; otherwise no prices |
| Timeout                         | Request dropped                      |
| Endpoint unreachable            | Retry may occur; otherwise no prices |

> [!NOTE]
> The 4-second latency requirement is enforced during ad serving. Lower response times improve coverage.

## See also

* [Price feed](../transaction-message/transaction-message.md)
* [Hotel ads overview](../hotel-ads/index.md)
* [Creae a price feed](../transaction-message/create-transaction-message.md)
