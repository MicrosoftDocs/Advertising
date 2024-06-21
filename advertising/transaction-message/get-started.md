---
title: "Get Started with Price feeds (formerly Transaction messages)"
description: Quick start guide to getting started with Price feeds.
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
---

# Get started with Price feeds (formerly Transaction messages)

> [!NOTE]
> This beta release of Hotel Price Ads is available to select participants only. For information about participating in the beta release program, please contact your account manager or [enroll here](https://go.microsoft.com/fwlink/?linkid=2201950).

If you create hotel ad campaigns in Microsoft Advertising, use Price feeds to update your itinerary data (pricing and availability). 

Before you can send Microsoft Price feeds, you must contact your account manager to sign up.

## Different modes for sending Microsoft your itinerary data

 Microsoft supports the following modes that you can use to provide your itinerary data.

- Push mode
- Pull mode
- Pull mode with hints

With the **push mode**, you send Microsoft your unsolicited updates at the intervals you choose. To use this mode, you must provide the IPv4 addresses (or address ranges in CIDR format) of all servers that you will use to send Price feeds. For information, see [Pushing Price feeds to Microsoft](../transaction-message/push-transaction-message.md).

With the **pull mode** options, Microsoft sends you [Query messages](../query-message/query-message.md) that specifies the hotel itinerary data you should return. The difference between the two pull modes is the amount of data that you send to Microsoft. With **pull mode**, you return data for all itineraries and all hotels. But with **pull with hints**, you tell Microsoft what data changed and it requests only that data. For information, see [Having Microsoft Pull Price feeds](../transaction-message/pull-transaction-message.md).


## What's a Price feed

A Price feed is an XML document that contains pricing and availability data for one or more hotel properties. For each hotel property, specify one `Result` element for each `Checkin` and `Nights` combination (also know as an itinerary) in your advanced booking window. If you allow five days advanced booking and stays of up to three-nights, your message would contain 15 `Result` elements. The following example shows one day's worth of itineraries.

```xml
<?xml version="1.0" encoding="UTF-8"?>
<Transaction timestamp="2017-05-25T20:44:56-04:00" id="de0be689-d094-406e-
8027-724309deb373">
  <Result>
    <Property>13579</Property>
    <Checkin>2017-05-26</Checkin>
    <Nights>1</Nights>
    <Baserate currency="USD">100.00</Baserate>
    <Tax currency="USD">10.00</Tax>
    <OtherFees currency="USD">4.00</OtherFees>
  </Result>
  <Result>
    <Property>13579</Property>
    <Checkin>2017-05-26</Checkin>
    <Nights>2</Nights>
    <Baserate currency="USD">200.00</Baserate>
    <Tax currency="USD">20.00</Tax>
    <OtherFees currency="USD">8.00</OtherFees>
  </Result>
  <Result>
    <Property>13579</Property>
    <Checkin>2017-05-26</Checkin>
    <Nights>3</Nights>
    <Baserate currency="USD">300.00</Baserate>
    <Tax currency="USD">30.00</Tax>
    <OtherFees currency="USD">12.00</OtherFees>
  </Result>
</Transaction>
```

You may specify up to 180 days advanced booking with stays of up to 14 nights. For example, if the message's `timestamp` is 2017-06-10, the last `Checkin` date that the message may specify is 2017-09-08.

The document must use UTF-8 encoding.

[Read more](../transaction-message/create-transaction-message.md)


## Validate the message before sending it

Before sending Microsoft the Price feed, use the [Transaction XSD](https://bhacstatic.blob.core.windows.net/schemas/transaction.xsd) to validate the message. This saves time and round trips by catching document syntax errors and constraints imposed by the XSD. 

The following example shows using xmllint to validate the message contained in SampleTransaction.xml.

```
xmllint.exe --schema transaction.xsd SampleTransaction.xml
```

> [!NOTE]
> There are constraints not defined by the XSD that may generate errors at the time Microsoft processes the message. Be sure that your message complies with all constraints defined in this document.

