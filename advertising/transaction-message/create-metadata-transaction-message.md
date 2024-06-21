---
title: "Creating a metadata Price feed (formerly Transaction message)"
description: Shows how to create a metadata Price feed that describes room and package data used to create room bundles.
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
---

# Create a metadata Price feed (formerly Transaction message)

If you use room bundles, typically you create a Price feed that contains only room and package data. Using a separate message for the metadata is better than including it in the same message with itinerary data since it doesn't change as often as the itinerary data, and it frees up space for the itinerary data.

Price feeds are limited to 100 MB of uncompressed data or 10 MB of compressed data (using GZip compression). To reduce network traffic, you should send compressed data.

The Price feed should contain only the metadata that you're adding or updating &mdash; do not include metadata that has not changed since the last time you sent a message. 

The document must use UTF-8 encoding and must conform to the [Transaction XSD](https://bhacstatic.blob.core.windows.net/schemas/transaction.xsd). 

> [!IMPORTANT]
> You must read and follow all Hotel Price Ads policies. For the list of policies, see [Pilot programs policies](https://advertise.bingads.microsoft.com/en-us/resources/policies/pilot-programs#Hotel%20Ads).

> [!NOTE]
> Bing does not support all Transaction XSD elements. Bing ignores any element or attribute in the message that it does not support. The [Price feed Reference](../transaction-message/reference.md) includes only those elements and attributes that Bing supports. 

> [!NOTE]
> The message must specify the elements in the order defined in the Transaction XSD (or as shown in the reference).

> [!IMPORTANT]
> Although you may specify room and package inline with an itinerary, it is not recommended because it's inefficient, likely redundant, and decreases the amount of space available for itineraries. 


## The top-level Transaction element

To provide Bing your room and package data, create an XML document that contains a Price feed. The message contains a single, top-level [Transaction](reference.md#transaction) element. 

```xml
<Transaction timestamp="2017-05-25T20:44:56-04:00" id="de0be689-d094-406e-
8027-724309deb373">
```

You must specify the `timestamp` and `id` attributes.

The `timestamp` attribute should identify the time that you submit the message. Bing uses the time stamp to ensure that it processes only the latest metadata. For example, if Bing processes a message with a time stamp of 14:10 and then processes a message with a time stamp of 14:09, Bing only processes the metadata in the 14:09 message that were not included in the 14:10 message.

The `id` attribute is a user-defined ID that uniquely identifies the message to the advertiser. The advertiser uses the ID to identify the message in the list of property feed status reports.

## Specifying the metadata

The `Transaction` element contains a list of [PropertyDataSet](reference.md#propertydataset-type) elements, one for each property you're defining metadata for. The message should include only new metadata or those that have changed.

The following shows a `PropertyDataSet` element for property 12345. The `Property` ID must match the ID of a property in your property feed file. You may specify any number of `RoomData` and `PackageData` element.

```xml
  <PropertyDataSet>
    <Property>88888</Property>
    <RoomData>. . .</RoomData>
    <RoomData>. . .</RoomData>
    <RoomData>. . .</RoomData>
    <PackageData>. . .</PackageData>
    <PackageData>. . .</PackageData>
  </PropertyDataSet>
```

Specify a `RoomData` object for each type of room and capacity that's available at the property. The following example shows all the elements that you can specify. The more information you can provide the better, but the only required elements are `RoomID` and `Name`. Although optional, you should always include `Capacity`, too. In most cases, you also include `Occupancy` unless the package specifies it (for example, a honeymoon package that's for two). 

```xml
  <RoomData>
    <RoomID>12345</RoomID>
    <Name>
      <Text text="Double queen room - Non-smoking" language="en" />
    </Name>
    <Description>
      <Text text="A spacious, non-smoking room with two queen beds" language="en" />
    </Description>
    <PhotoURL>
      <URL>https://mydomain.com/pic1.jpg</URL>
      <Caption>
        <Text text="Desk with USB outlets for charging your devices" language="en" />
      </Caption>
    </PhotoURL>
    <Capacity>4</Capacity>
    <Occupancy>4</Occupancy>
    <OccupancyDetails>
      <NumAdults>4</NumAdults>
    </OccupancyDetails>
  </RoomData>
```

Specify a `PackageData` object for each package of amenities you define. Although you can specify `Capacity` and `Occupancy` in the package, you typically include them in `RoomData`. However, you would include `Occupancy` in `PackageData` if the package is based on occupancy, such as a honeymoon package that's for two. The only amenity that's required is Refundable. This example shows the multiple ways that you may specify Boolean values.


```xml
  <PackageData>
    <PackageID>67890</PackageID>
    <Name>
      <Text text="Standard" language="en" />
    </Name>
    <Description>
      <Text text="Standard room package that applies to most rooms" language="en" />
    </Description>
    <Capacity>4</Capacity>
    <Occupancy>2</Occupancy>
    <OccupancyDetails>
      <NumAdults>2</NumAdults>
    </OccupancyDetails>
    <ChargeCurrency>Web</ChargeCurrency>
    <Refundable available="true" refundable_until_days="2" refundable_until_time="17:00:00" />
    <BreakfastIncluded/>
    <ParkingIncluded>true</ParkingIncluded>
    <InternetIncluded>1</InternetIncluded>
    <MembershipBenefitsIncluded>
      <ProgramName>
        <Text text="Holiday" language="en" />
      </ProgramName>
      <ProgramLevel>
        <Text text="Platinum" language="en" />
      </ProgramLevel>
      <NightlyValue currency="USD">50.00</NightlyValue>
    </MembershipBenefitsIncluded>
    <CarRentalIncluded/>
    <MilesIncluded>
      <NumberOfMiles>1500</NumberOfMiles>
      <Provider>
        <Text text="Contoso" language="en" />
      </Provider>
    </MilesIncluded>
    <OnPropertyCredit currency="USD">25.00</OnPropertyCredit>
  </PackageData>
```


## Next steps

Before sending Price feeds, make sure your property feed file is up to date. To update the feed files, contact your TAM. After the TAM imports the data into Bing, you may begin sending Price feeds. Price feeds sent before the data is imported will fail.

Validate the Price feed before sending it to Bing. For information, see [Validating your Price feed](../transaction-message/validate-transaction-message.md).

For information about sending Bing your Price feed, see [Pushing Price feeds to Bing](../transaction-message/push-transaction-message.md) or [Having Bing Pull Price feeds](pull-transaction-message.md).

For information about using the metadata in your itineraries, see [Using Room Bundles](using-room-bundles.md).
