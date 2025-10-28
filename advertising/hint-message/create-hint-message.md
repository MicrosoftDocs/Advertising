---
title: "Create a hint message"
description: Shows how to create a hint message that describes the itineraries that Microsoft Advertising should request in a pull request.
ms.service: "bing-ads"
ms.subservice: "hotel-service"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
---

# Create a Hint message

If you sign up for pull with hint requests, Microsoft sends a message with the following form to the endpoint that you specify asking you to identify any itinerary changes since the last pull request. You decide the frequency of the requests at the time you onboard.

```xml
<?xml version="1.0" encoding="UTF-8"?>
<HintRequest id="123-abc" timestamp="2017-10-21T08:45:09Z">
  <LastFetchTime>2017-10-21T08:30:16Z</LastFetchTime>
</HintRequest>
```

The `LastFetchTime` element identifies the UTC date and time of the last successful response that you sent Microsoft that identified itinerary changes. If there has been no changes since that time, your response should contain an empty body. If there has been changes, the body contains a [Hint](../hint-message/reference.md) message, which identifies itineraries that have changed. You can identify the itineraries using one of the following methods:

- [Exact itineraries](#exact-itineraries)
- [Check-in date ranges](#check-in-date-ranges)
- [Expanded check-in date ranges](#expanded-check-in-date-ranges)


## Exact itineraries

Your hint message can identify the individual itineraries using the check-in date and length of stay. The following example shows a hint message that specifies a single itinerary for a single hotel.

```xml
<Hint>
  <Item>
    <Property>789</Property>
    <Stay>
      <CheckInDate>2017-10-20</CheckInDate>
      <LengthOfStay>2</LengthOfStay>
    </Stay>
  </Item>
</Hint>
```

Each \<Item\> represents an individual itinerary. You may specify an \<Item\> objects for each itinerary that you want to update, and each itinerary may specify one or more properties. 

When Microsoft receives the above hint, it sends the following [Query](../query-message/query-message.md) message to you:

```xml
<Query>
  <Checkin>2017-10-20</Checkin>
  <Nights>2</Nights>
  <PropertyList>
    <Property>789</Property>
  </PropertyList>
</Query>
```

When you get the Query message, your response should contain a [Price feed](../transaction-message/transaction-message.md) with the following \<Result\>.

```xml
  <Result>
    <Property>789</Property>
    <Checkin>2017-10-20</Checkin>
    <Nights>2</Nights>
    <!-- Pricing and other elements that changed -->
  </Result>
```

If the above hint specified two properties, the Price feed would contain two \<Result\> elements (one for each property).


## Check-in date ranges

Your hint message can identify a range of itineraries. To specify the range, set the `FirstDate` element to the starting check-in date and the `LastDate` to the last check-in date. The following example shows a hint message that uses a date range to specify six check-in dates for a single property.

```xml
<?xml version="1.0" encoding="UTF-8"?>
<Hint>
  <Item>
    <Property>123</Property>
    <FirstDate>2017-10-20</FirstDate>
    <LastDate>2017-10-25</LastDate>
  </Item>
</Hint>
```

Each \<Item\> represents a single range of check-in dates. You may specify an \<Item\> object for each check-in date range that identifies the itineraries you want to update, and each one may specify one or more properties. 

When Microsoft receives the above hint, it sends the following [Query](../query-message/query-message.md) message to you. 

```xml
<Query>
  <FirstDate>2017-10-20</FirstDate>
  <LastDate>2017-10-25</LastDate>
  <Nights>3</Nights>
  <PropertyList>
    <Property>123</Property>
  </PropertyList>
</Query>
```

When you get the Query message, your response should contain a [Price feed](../transaction-message/transaction-message.md) with the following \<Result\> objects.

```xml
  <Result>
    <Property>789</Property>
    <Checkin>2017-10-20</Checkin>
    <Nights>1</Nights>
    <!-- Pricing and other elements that changed -->
  </Result>
  <Result>
    <Property>789</Property>
    <Checkin>2017-10-20</Checkin>
    <Nights>2</Nights>
    <!-- Pricing and other elements that changed -->
  </Result>
  <Result>
    <Property>789</Property>
    <Checkin>2017-10-20</Checkin>
    <Nights>3</Nights>
    <!-- Pricing and other elements that changed -->
  </Result>

  . . .
  
  <Result>
    <Property>789</Property>
    <Checkin>2017-10-25</Checkin>
    <Nights>1</Nights>
    <!-- Pricing and other elements that changed -->
  </Result>
  <Result>
    <Property>789</Property>
    <Checkin>2017-10-25</Checkin>
    <Nights>2</Nights>
    <!-- Pricing and other elements that changed -->
  </Result>
  <Result>
    <Property>789</Property>
    <Checkin>2017-10-25</Checkin>
    <Nights>3</Nights>
    <!-- Pricing and other elements that changed -->
  </Result>
```

For this example, the maximum number of results that the Price feed should contain is 18 (6 check-in dates * 3 nights). Your Price feed may contain less if some itineraries with the date range did not change.


## Expanded check-in date ranges

The expanded check-in date range hint is similar to the check-in date range hint except it asks that you include all itineraries that intersect the itineraries in the date range. So your Price feed should include any itinerary whose check-out date falls within the date range.

The \<StaysIncludingRange\> identifies the hint as an expanded check-in date range hint. To specify the range, set the `FirstDate` element to the starting check-in date and the `LastDate` to the last check-in date. The following example shows a hint message that uses a date range to specify six check-in dates for a single property.

```xml
<?xml version="1.0" encoding="UTF-8"?>
<Hint>
  <Item>
    <Property>123</Property>
    <StaysIncludingRange>
      <FirstDate>2017-10-20</FirstDate>
      <LastDate>2017-10-25</LastDate>
    </StaysIncludingRange>
  </Item>
</Hint>
```

Each \<Item\> represents a single range of itineraries. You may specify an \<Item\> object for each check-in date range that identifies the itineraries you want to update, and each one may specify one or more properties.   


When Microsoft receives the above hint, it sends the following [Query](../query-message/query-message.md) message to you. The `MaxLengthOfStay` setting in your [QueryControl](../query-control-message/query-control-message.md) message determines the value for \<AffectedNights\> (this example assumes it's set to 3).

```xml
<Query>
  <FirstDate>2017-10-20</FirstDate>
  <LastDate>2017-10-25</LastDate>
  <AffectedNights>3</AffectedNights>
  <PropertyList>
    <Property>123</Property>
  </PropertyList>
</Query>
```

When you get the Query message, your response should contain a [Price feed](../transaction-message/transaction-message.md) with the following \<Result\> objects. Notice that the check-in date for the first several objects fall before the `FirstDate` date in your hint. This is because the itineraries check-out date falls within the hint's date range. 

```xml
  <Result>
    <Property>789</Property>
    <Checkin>2017-10-17</Checkin>
    <Nights>3</Nights>
    <!-- Pricing and other elements that changed -->
  </Result>
  <Result>
    <Property>789</Property>
    <Checkin>2017-10-18</Checkin>
    <Nights>2</Nights>
    <!-- Pricing and other elements that changed -->
  </Result>
  <Result>
    <Property>789</Property>
    <Checkin>2017-10-18</Checkin>
    <Nights>3</Nights>
    <!-- Pricing and other elements that changed -->
  </Result>
  <Result>
    <Property>789</Property>
    <Checkin>2017-10-19</Checkin>
    <Nights>1</Nights>
    <!-- Pricing and other elements that changed -->
  </Result>
  <Result>
    <Property>789</Property>
    <Checkin>2017-10-19</Checkin>
    <Nights>2</Nights>
    <!-- Pricing and other elements that changed -->
  </Result>
  <Result>
    <Property>789</Property>
    <Checkin>2017-10-19</Checkin>
    <Nights>3</Nights>
    <!-- Pricing and other elements that changed -->
  </Result>
  <Result>
    <Property>789</Property>
    <Checkin>2017-10-20</Checkin>
    <Nights>1</Nights>
    <!-- Pricing and other elements that changed -->
  </Result>

  . . .
  
  <Result>
    <Property>789</Property>
    <Checkin>2017-10-25</Checkin>
    <Nights>1</Nights>
    <!-- Pricing and other elements that changed -->
  </Result>
  <Result>
    <Property>789</Property>
    <Checkin>2017-10-25</Checkin>
    <Nights>2</Nights>
    <!-- Pricing and other elements that changed -->
  </Result>
  <Result>
    <Property>789</Property>
    <Checkin>2017-10-25</Checkin>
    <Nights>3</Nights>
    <!-- Pricing and other elements that changed -->
  </Result>
```


## Batching queries

Depending on the number of properties and itineraries that you need to update, Microsoft sends you several smaller queries instead of one big query. For example, if you need to update itineraries for 1,000 properties, Microsoft may send you 100 query messages with 10 properties each.


