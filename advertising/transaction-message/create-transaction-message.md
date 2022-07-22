---
title: "Creating a Transaction Message"
description: Shows how to create a transaction message that describes your hotels' itineraries.
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
---

# Create a Transaction Message

To provide Bing your hotel pricing and availability data, create an XML document that contains a transaction message. The transaction message contains a list of check-in dates, lengths of stay, and pricing. 

Transaction messages may contain up to 180 days of advanced booking, and each booking may specify up to a 14 nights stay. A check-in date and length of stay is referred to as an itinerary. If you specify the maximum number of itineraries, the message would contain 2,520 itineraries.

Transaction messages are limited to 100 MB of uncompressed data or 10 MB of compressed data (using GZip compression). To reduce network traffic, you should send compressed data.

A transaction message should contain only itineraries that you're adding or updating&mdash;do not include itineraries that have not changed since the last time you sent a message. 

The document must use UTF-8 encoding and must conform to the [Transaction XSD](https://bhacstatic.blob.core.windows.net/schemas/transaction.xsd). 

> [!IMPORTANT]
> You must read and follow all Hotel Price Ads policies. For the list of policies, see [Pilot programs policies](https://advertise.bingads.microsoft.com/en-us/resources/policies/pilot-programs#Hotel%20Ads).

> [!NOTE]
> Bing does not support all Transaction XSD elements. Bing ignores any element or attribute in the message that it does not support. The [Transaction Message Reference](../transaction-message/reference.md) includes only those elements and attributes that Bing supports. 

> [!NOTE]
> The message must specify the elements in the order defined in the Transaction XSD (or as shown in the reference).


## The top-level Transaction element

Transaction messages contain a single, top-level [Transaction](../transaction-message/reference.md#transaction) element. 

```xml
<Transaction timestamp="2017-05-25T20:44:56-04:00" id="de0be689-d094-406e-
8027-724309deb373">
```

You must specify the `timestamp` and `id` attributes.

The `timestamp` attribute should identify the time that you submit the message. Bing uses the time stamp to ensure that it processes only the latest itineraries. For example, if Bing processes a message with a time stamp of 14:10 and then processes a message with a time stamp of 14:09, Bing only processes the itineraries in the 14:09 message that were not included in the 14:10 message.

The `id` attribute is a user-defined ID that uniquely identifies the message to the advertiser. The advertiser uses the ID to identify the message in the list of hotel feed status reports. 

## Specifying the list of itineraries

The `Transaction` element contains a list of [Result](../transaction-message/reference.md#result-type) elements, one for each itinerary it defines. The message should include only new itineraries or those that have changed.

The following shows a `Result` element that specifies the required child elements.

```xml
  <Result>
    <Property>13579</Property>
    <Checkin>2017-06-10</Checkin>
    <Nights>2</Nights>
    <Baserate currency="USD">159.99</Baserate>
    <Tax currency="USD">20.00</Tax>
    <OtherFees currency="USD">4.00</OtherFees>
  </Result>
```

The `Property` ID must match the ID of a property in your hotel feed file. The `Checkin` date must be within the 90-day advanced booking window, and `Nights` must be in the range 1 through 14.

The `Baserate` specifies the cost of the entire length of stay and not the nightly room rate. <!--Some markets support including taxes and other fees in the base rate. If you include taxes and fees in the base rat, set the base rate's `all_inclusive` attribute to true. For restrictions, see ???. -->

If you allow five days advanced booking and stays of up to three-nights, your message would contain 15 `Result` elements. The following example shows one day's worth of itineraries.

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
  <Result>
    <Property>13579</Property>
    <Checkin>2017-05-26</Checkin>
    <Nights>2</Nights>
    <Baserate currency="USD">159.99</Baserate>
    <Tax currency="USD">20.00</Tax>
    <OtherFees currency="USD">4.00</OtherFees>
    <AllowablePointsOfSale>
      <PointOfSale id="mobile"/>
      <PointOfSale id="desktop"/>
    </AllowablePointsOfSale>
  </Result>
  <Result>
    <Property>13579</Property>
    <Checkin>2017-05-26</Checkin>
    <Nights>3</Nights>
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

After defining the 15 itineraries, each subsequent message would include only those itineraries that changed. For example, pricing or availability changes.

## Removing itineraries

To remove an itinerary, set its `Baserate`, `Tax`, and `OtherFees` elements to -1.00. Bing automatically removes itineraries with check in dates that have past. 

## Using the optional Result elements

The following shows a `Result` element that includes the optional child elements.

```xml
  <Result>
    <Property>13579</Property>
    <Checkin>2017-05-26</Checkin>
    <Nights>2</Nights>
    <Baserate currency="USD">159.99</Baserate>
    <Tax currency="USD">20.00</Tax>
    <OtherFees currency="USD">4.00</OtherFees>
    <ExpirationTimestamp>2017-05-28T09:00:34Z</ExpirationTimestamp>
    <ChargeCurrency>deposit</ChargeCurrency>
    <Custom1>summer2017</Custom1>
    <AllowablePointsOfSale>
      <PointOfSale id="mobile"/>
      <PointOfSale id="desktop"/>
    </AllowablePointsOfSale>
  </Result>
```

Use `ExpirationTimestamp` to specify an expiry date for the itinerary. For example, in Case 1, the itinerary is served.

Case 1:

Today = 3/16/2018<br />
CheckInDate =  4/1/2018<br />
ExpirationTimestamp = 3/20/2018

But in Case 2, the itinerary is not served.

Case 2:

Today = 3/21/2018<br />
CheckInDate =  4/1/2018<br />
ExpirationTime = 3/20/2018


Use the `ChargeCurrency` element to specify when the user is charged for the booking. By default, the user pays when they book (this is the Web option). This example uses Deposit, which asks the user to pay a portion at booking and the remainder later (for example, when they check out).

Use one or more of the five `Custom` elements to provide substitution values for dynamic parameters in a point of sale (POS) URL. For example, if the POS URL is https:\/\/www.partnerdomain.com?promo=(CUSTOM1) and `Custom1` is set to summer2017, the POS URL that Bing uses is https:\/\/www.partnerdomain.com?promo=summer2017. For more information, see [Using Dynamic Query Parameters](../pos-feed/create-pos-feed.md#using-dynamic-query-parameters).

The sum of all Custom[1-5] values is limited to a maximum of 1,000 characters, but keep in mind that the practical limit may be less given the maximum length of a URL.

Use the `AllowablePointsOfSale` element to specify specific POS URLs that user's can use for booking. By default, the user may use any POS in the partner's points of sale feed file. The `id` attribute must match a POS in the feed file.

## Next steps

Before sending transaction messages, make sure your hotel feed file and points of sale file are up to date. To update these files, contact your TAM. After the TAM imports the data into Bing, you may begin sending transaction messages. Transaction messages sent before the data is imported will fail.

Validate the transaction message before sending it to Bing. For information, see [Validating your Transaction Message](../transaction-message/validate-transaction-message.md).

For information about sending Bing your transaction message, see [Pushing Transaction Messages to Bing](../transaction-message/push-transaction-message.md) or [Having Bing Pull Transaction Messages](pull-transaction-message.md).

For information about adding room bundles to your itineraries, see [Creating a metadata Transaction message](create-metadata-transaction-message.md) and [Using Room Bundles](using-room-bundles.md).
