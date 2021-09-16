---
title: "Sending Microsoft Transaction Messages"
description: Provides the details for sending transaction messages to Microsoft Advertising.
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: eric-urban
ms.author: eur
---

# Pushing Transaction Messages to Microsoft Advertising

Before sending a transaction message:

- Validate the message to ensure that it's compliant with the [Transaction XSD](https://bhacstatic.blob.core.windows.net/schemas/transaction.xsd). This will save you round trips and time having to fix errors.
  
- Ensure that the message contains less than 100 MB of uncompressed data or 10 MB of compressed data (using GZip compression). To reduce network traffic, you should always send compressed data.
  
- Ensure that you have less than five requests queued or being processed. Your application should include the logic necessary to stay within the limit. If you exceed the limit, the request fails with HTTP status code 429. 


After validating the message, send it to Microsoft in the body of an HTTPS POST request. The URL that you send the request to is:

`https://hotels.api.bingads.microsoft.com/api/customers/<customerId>/transactions`

Set \<customerId\> to the advertiser's customer ID.
  
The request must include the following headers:

- Content-Type: application/xml; charset=utf-8
- Authorization: Bearer \<accesstokengoeshere> 

For details about getting an OAuth access token, see [Getting Started](../hotel-service/get-started.md) in Hotel API.
  
You may also specify the following optional headers:

- Content-Encoding: gzip  
  Specify this header if you compress the transaction message (recommended).
  
- X-Transaction-ID: \<user-defined ID\>  
  An opaque, user-defined ID that advertisers use to uniquely identifies the message. If you include this header, the ID must match the ID in the [Transaction](../transaction-message/reference.md) element's `id` attribute. 


The following shows an example POST request.

```
POST https://hotels.api.bingads.microsoft.com/api/customers/abc123/transactions HTTP/1.1
Content-Type: application/xml; charset=utf-8
Host: hotels.api.bingads.microsoft.com

<?xml version="1.0" encoding="UTF-8"?>
<Transaction timestamp="2017-05-25T20:44:56-04:00" id="de0be689-d094-406e-
8027-724309deb373">
  <Result>
    <Property>13579</Property>
    <Checkin>2017-06-10</Checkin>
    <Nights>2</Nights>
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

The POST request places the message in a queue to be processed and then returns. You may have a maximum of five requests queued or being processed at the same time. If you exceed the limit, the request fails with 429. 

To determine whether Microsoft successfully processed the message, see Hotel Ads Feed Status in the Microsoft Hotel Center of Microsoft Advertising web application.


If the request succeeds (the message is successfully placed in the queue), the response's body includes an XML document that specifies the number of bytes read (`BytesReceived`) from the request's body (the transaction message). 

```xml
<TxnResponse xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://schemas.datacontract.org/2004/07/Microsoft.BingAds.BHAC.HotelAdsAPIs.Models">
  <BytesReceived>184381</BytesReceived>
  <FeedId>6165579</FeedId>
</TxnResponse>
```

The `FeedId` element contains a Microsoft-generated ID that uniquely identifies the feed. The transaction status report includes this ID.


If the request fails, the response body will include an XML document that contains a list of error codes and messages that identify why the request failed. For a list of error codes and messages, see [Error Codes and Messages](../transaction-message/error-codes-messages.md).

The response includes the WebRequestActivityId response header. The header contains the ID associated with the request in the log files. Whenever a request fails, capture the ID. If you're unable to resolve the issue, provide this ID when you contact Support.



## How often do I need to send messages

Send transaction messages whenever pricing and availability changes.
