---
title: "Using room bundles"
description: Shows how to include room bundles in your itinerary data.
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
---

# Using room bundles

By default, your itinerary data represents your least expensive, double-occupancy rooms. But if you define room and package data (see [Creating a metadata Price feed (formerly Transaction message)](create-metadata-transaction-message.md)), you can include other rooms in you itinerary data using room bundles.

Here's what a default, base room itinerary looks like:


```xml
<?xml version="1.0" encoding="UTF-8"?>
<Transaction timestamp="2017-05-25T20:44:56-04:00" id="de0be689-d094-406e-
8027-724309deb373">
  <Result>
    <Property>13579</Property>
    <Checkin>2017-05-26</Checkin>
    <Nights>1</Nights>
    <Baserate currency="USD">159.99</Baserate>
    <Tax currency="USD">20.00</Tax>
    <OtherFees currency="USD">4.00</OtherFees>
    <AllowablePointsOfSale>
      <PointOfSale id="mobile"/>
      <PointOfSale id="desktop"/>
    </AllowablePointsOfSale>
  </Result>
</Transaction>
```

To add room types and packages to the itinerary, add a [\<RoomBundle>](reference.md#roombundle) element as a child of `Result`. You may add one or more room bundles but one of the room bundles' rate must match the itinerary's rate. You must base the room's rate on its occupancy; 2 and 4 occupancy rooms cannot have the same rate.

> [!NOTE]
> You must specify the occupancy within a room bundle element.

```xml
<?xml version="1.0" encoding="UTF-8"?>
<Transaction timestamp="2017-05-25T20:44:56-04:00" id="de0be689-d094-406e-
8027-724309deb373">
  <Result>
    <Property>13579</Property>
    <Checkin>2017-05-26</Checkin>
    <Nights>1</Nights>
    <Baserate currency="USD">159.99</Baserate>
    <Tax currency="USD">20.00</Tax>
    <OtherFees currency="USD">4.00</OtherFees>
    <AllowablePointsOfSale>
      <PointOfSale id="mobile"/>
      <PointOfSale id="desktop"/>
    </AllowablePointsOfSale>

    <!-- This is the double-occupancy room that matches the itinerary's rate -->
    <RoomBundle>  
      <RoomID>12345</RoomID>
      <PackageID>67890</PackageID>
      <Baserate currency="USD">159.99</Baserate>
      <Tax currency="USD">20.00</Tax>
      <OtherFees currency="USD">4.00</OtherFees>
      <Occupancy>2</Occupancy>
    </RoomBundle>

    <RoomBundle>
      <RoomID>11111</RoomID>
      <PackageID>22222</PackageID>
      <Baserate currency="USD">236.00</Baserate>
      <Tax currency="USD">42.00</Tax>
      <OtherFees currency="USD">4.00</OtherFees>
      <Occupancy>4</Occupancy>
    </RoomBundle>

  </Result>
</Transaction>
```

<!--
If you run out of double-occupancy rooms, the itinerary represents your next least expensive room
-->


## Removing room bundles

Each itinerary must contain the complete list of rooms that are available. If a room or package is no longer available, simply remove that bundle from the itinerary.


## Precedence for itinerary, room, and package data

Itinerary, room, and package data include some of the same fields. The following is the order of precedence that the Hotel service uses for deciding which objects' fields it uses.

- RoomBundle (highest)
- PackageData
- RoomData (lowest)

If a room bundle references the following room and package, the room is a double-occupancy room based on the precedence rules (the package has higher precedence than a room and the package's `Occupancy` element is set to 2).

```xml
  <RoomData>
    <RoomID>12345</RoomID>
    <Name>
      <Text text="Double queen room - Non-smoking" language="en" />
    </Name>
    <Capacity>4</Capacity>
    <Occupancy>4</Occupancy>
  </RoomData>

  <PackageData>
    <PackageID>67890</PackageID>
    <Name>
      <Text text="Business" language="en" />
    </Name>
    <Occupancy>2</Occupancy>
    <ChargeCurrency>Web</ChargeCurrency>
    <Refundable available="true" refundable_until_days="2" refundable_until_time="17:00:00" />
    <BreakfastIncluded/>
    <ParkingIncluded>true</ParkingIncluded>
    <InternetIncluded>1</InternetIncluded>
  </PackageData>
```

