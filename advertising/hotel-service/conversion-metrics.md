---
title: "Lodging Campaign Conversion Metrics"
description: Describes how to utilize conversion metrics for Hotel Price Ads.
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
---

# <a name="conversionmetrics"></a> Conversion metrics

> [!NOTE]
> Conversion tracking is available to select participants only. For information about participating in the conversion tracking pilot, please contact your account manager.

You can track bookings at the hotel, hotel group, or subaccount level. But before you can track bookings, you must add a hotel conversion tracking UET tag to each POS website. For general information about UET tags, see [Everything you need to know about setting up UET](https://help.ads.microsoft.com/#apex/3/en/56913/2-500).

## Steps to get started

- Ensure each POS website has a JavaScript [UET](https://help.bingads.microsoft.com/#apex/3/en/56682/0) tag for the customer ID (CID) you're using for hotel price ads.
- The supported [goal types](https://help.bingads.microsoft.com/#apex/3/en/56709/2) that you can use are Custom Event and Destination URL. You can reuse an existing goal or create a new one, but it must use variable revenue tracking.
- Verify you tag is working properly by using the [UET Tag Helper](https://chrome.google.com/webstore/detail/uet-tag-helper-by-bing-ad/naijndjklgmffmpembnkfbcjbognokbf?utm_source=chrome-app-launcher-info-dialog).

## UET tag variables

|Variable|Required|Description
|-|-|-
|hct_total_price|Yes|The total price of the booking, including taxes and fees.
|hct_base_price|Yes|The price of the booking, not including taxes and fees.
|currency|Yes|The currency of your conversion goal.
|hct_checkin_date|Yes|The booking's checkin date in the form, YYYY-MM-DD.
|hct_checkout_date|Yes|TThe booking's checkout date in the form, YYYY-MM-DD. Not required if you specify hct_length_of_stay.
|hct_length_of_stay|Yes|The number of nights the booking is for. Not required if you specify hct_checkout_date.
|hct_partner_hotel_id|Yes|The ID that you used to identify the hotel in your hotel feed.
|hct_booking_xref|Yes|The encrypted or obfuscated booking reference number.

## Example UET tag

The following example shows a [custom event](https://help.bingads.microsoft.com/#apex/3/en/56684/2) UET tag. The example hard codes the values for simplicity.

```javascript
window.uetq.push('event', 'my_hotel_event_action', {​
    'hct_total_price': 188,​
    'hct_base_price': 165,​
    'currency': 'USD',​
    'hct_checkin_date': '2018-10-27',​
    'hct_length_of_stay': 4,​
    'hct_partner_hotel_id': 'example_hotel',​
    'hct_booking_xref': 'X2N5531APZ'​
});​
```

To preview example events being fired in real-time, see [Reporting hotel conversion events](https://bingadsuet.azurewebsites.net/HotelConversions.html)

After adding a UET tag to your websites, you can start including the following list of conversion tracking metrics in your report request.

- [Conversions](#conversions)
- [ConversionRate](#conversionrate)
- [CPA](#cpa)
- [GrossRevenue](#grossrevenue)
- [GrossRevenuePerClick](#grossrevenueperclick)
- [GrossRevenuePerConv](#grossrevenueperconv)
- [GrossROAS](#grossroas)
- [NetRevenue](#netrevenue)
- [NetRevenuePerClick](#netrevenueperclick)
- [NetRevenueConv](#netrevenueconv)
- [NetROAS](#netroas)
- [TotalBookedNights](#totalbookednights)
- [AvgBookedNights](#avgbookednights)
- [BookedABW](#bookedabw)
- [AvgBookedABW](#avgbookedabw)

The following guidelines apply to hotel conversion tracking.

- Microsoft Advertising supports a conversion window of up to 90 days. You specify the conversion window in the Microsoft Advertising web app.
- Bookings are counted as conversions. The number of conversions does not account for cancellations (they're not tracked).
- To specifying whether to track all conversions or only unique conversions, see the Microsoft Advertising web app.