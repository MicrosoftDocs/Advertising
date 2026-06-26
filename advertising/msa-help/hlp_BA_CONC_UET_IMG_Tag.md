---
title: Universal event tracking (UET) using an IMG tag
ms.service: msa-help
ms.subservice: msa-conversions-uet
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: If you can't use JavasScript-based UET tagging, you can use a non-JavaScript-based version. One option is using an IMG tag.
---

# Universal event tracking (UET) using an IMG tag

> [!IMPORTANT]
> We recommend that you use the JavaScript version of the UET tag if you are able to. [Learn more](hlp_BA_CONC_UETv2NonJS.md) about the JavaScript UET tag.

## Universal event tracking (UET)

Universal event tracking (UET) is a Microsoft framework which captures user engagement data on your website and enables features such as conversion tracking (e.g., purchases or leads), audience targeting (e.g., remarketing), auto bidding and Microsoft Advertising for commerce. [Learn more](hlp_BA_CONC_UET_Setup_Master_2.md) about UET and why it is important for conversion tracking and remarketing in Microsoft Advertising.

We recommend that you use the JavaScript version of the UET tag and install it across all pages of your website. JavaScript UET tags capture richer data for conversion tracking and remarketing. However, if JavaScript-based tagging is not feasible, you may use a non-JavaScript-based version. One way to do this is via an *<img>* tag.

## UET event framework

The UET framework defines multiple events:

- Page load: Fired on all page visits.
- Custom event: Fired on specific events and page types and captures richer data.

Multiple UET events can fire on the same page visit. Microosft uses the *mid* param to connect different events fired on the same page.

Implementation of UET with no script looks like this:

- Capture and save *msclkid* in a first-party cookie on your website. This will be shared with all *pageLoad* and custom events.
- Understand *pageLoad* event definition and fire it on all page views.
- Understand custom event definition and fire it on specific pages with the required parameters. Each page view will only have one *pageLoad* event but may have multiple custom events.
- Some custom events need to be fired when the user takes an action instead of when the page loads. For example, when the user adds a product to a cart, the page may not refresh, and the event details need to be captured after they select the "Add to cart" button. Use an appropriate mechanism to fire this UET event.

## API Endpoint

UET fires this endpoint when an event is fired: https://bat.bing.com/action/0? <> The expected response is: 204

## Parameters to be captured

- **MSCLKID**

  *MSCLKID* is used in conversion attribution and is generated at ad click time. This ID is appended to the landing page URL when [auto-tagging of the Microsoft click ID](hlp_BA_PROC_MicrosoftClickID.md) is enabled. It should be stored in a first-party cookie on your website and sent with the UET call.

  *MSCLKID* is a GUID, like "cdd4afcccb1c9a4cad9544dd7e5006d5".

  Suggested cookie name: *_uetmsclkid*

  Cookie expiration: 90 days

  Here is an example: 

  ```
  <script>
    function setCookie(name, value, days) {
      var date = new Date();
      date.setTime(date.getTime() + days * 864e5);
      var expires = "; expires=" + date.toGMTString();
      document.cookie = name + "=" + value + expires;
    }

    function getParam(p) {
      var match = RegExp("[?&]" + p + "=([^&]*)").exec(window.location.search);
      return match && decodeURIComponent(match[1].replace(/\+/g, " "));
    }

    var msclkid = getParam("_uetmsclkid ");
    if (msclkid) {
      setCookie("_uetmsclkid", msclkid, 90);
    }
  </script>
  ```
- **MID**

  Mid allows joining different events from the same page, such as *pageLoad* and custom events. Here is an example of code used to generate the MID: 
  ```
  <script>
    this._S4 = function () {
      return Math.floor((1 + Math.random()) * 0x10000)
        .toString(16)
        .substring(1);
    };

    this.getGuid = function () {
      var guid =
        this._S4() +
        this._S4() +
        "-" +
        this._S4() +
        "-" +
        this._S4() +
        "-" +
        this._S4() +
        "-" + this._S4() +
        "-" + this._S4() +
        "-" +
        this._S4() +
        this._S4() +
        this._S4();
      return guid;
    };
  </script>
  ```

  For a full list of parameters you can capture with *pageLoad* or custom events, [take a look at this table](hlp_BA_CONC_UET_Parameters_Table.md).

## Items

Items capture details of products such as product ID, quantity, and price. They are captured on page views and events involving multiple products, such as the "add to cart" event or visiting the cart page.

1. Create a comma-separated list for different items to be captured. For example, product IDs 12345 and 23456: id=prod12345&quantity=2&price=25.1,id=prod23456&quantity=1&price=121.1
1. URL encode the entire string: id%3Dprod12345%26quantity%3D2%26price%3D25.1%2Cid%3Dprod23456%26quantity%3D1%26price%3D121.1
1. Add it as a value for the 'items' parameter: items=id%3Dprod12345%26quantity%3D2%26price%3D25.1%2Cid%3Dprod23456%2 6quantity%3D1%26price%3D121.1

## Examples of API calls for different events/pages

- **Page load event**
  
  ```
  https://bat.bing.com/action/0? 
  ti=1234567&<>
  ver=2.3&<>
  evt=pageLoad&
  mid=d34f6979-ecfc-ecac-745d-e40447afd9b2&
  uid=3966616149922&
  vid=a5ia770-97ac68-cd211&msclkid=292049a17e2413e3a4081719e839afe6-0&
  rn=692799&
  p=https%3A%2F%2Fwww.contoso.com%2Fsearch%3Fq%3Dwall%2Bclock&
  r=https%3A%2F%2Fwww.bing.com%2F&
  tl=Wall%20Clocks&
  kw=clocks,homedecor
  ```

- **Custom events for retail specific scenarios**
  **Home page**

  ```
  https://bat.bing.com/action/0? 
  ti=1234567&
  ver=2.3&
  mid=d34f6979-ecfc-ecac-745d-e40447afd9b2&uid=3966616149922&
  vid=a5ia770-97ac68-cd211&
  msclkid=292049a17e2413e3a4081719e839afe6-0&rn=692799&
  evt=custom&
  pagetype=home
  ```

- **Category browse page**

  ```
  https://bat.bing.com/action/0? 
  ti=1234567&
  ver=2.3&
  mid=d34f6979-ecfc-ecac-745d-e40447afd9b2&uid=3966616149922&
  vid=a5ia770-97ac68-cd211&
  msclkid=292049a17e2413e3a4081719e839afe6-0&rn=692799&
  evt=custom&
  pagetype=category&
  ecomm_category=cat123&
  prodid=pid1,pid2,pid3,pid4,pid5,pid6,pid7,pid8,pid9,pid10
  ```
  
- **Search results page**

  ```
  https://bat.bing.com/action/0? 
  ti=1234567&<>ver=2.3&
  mid=d34f6979-ecfc-ecac-745d-e40447afd9b2&
  uid=3966616149922&<>vid=a5ia770-97ac68-cd211&
  msclkid=292049a17e2413e3a4081719e839afe6-0&
  rn=692799&
  evt=custom&
  pagetype=searchresults&
  search_term=wall%20clocks&
  prodid=pid1,pid2,pid3,pid4,pid5,pid6,pid7,pid8,pid9,pid10
  ```

- **Product display page**

  ```
  https://bat.bing.com/action/0? 
  ti=1234567&<>ver=2.3&
  mid=d34f6979-ecfc-ecac-745d-e40447afd9b2&
  uid=3966616149922&
  vid=a5ia770-97ac68-cd211&
  msclkid=292049a17e2413e3a4081719e839afe6-0&
  rn=692799&
  evt=custom&
  pagetype=product&
  prodid=pid1
  ```
  
- **Add to cart event**
  The example below captures the details for an add to cart event happening on the product display page. If the add to cart happens on another page type, use that pagetype.

  ```
  https://bat.bing.com/action/0? 
  ti=1234567&<>ver=2.3&
  mid=d34f6979-ecfc-ecac-745d-e40447afd9b2&
  uid=3966616149922&
  vid=a5ia770-97ac68-cd211&
  msclkid=292049a17e2413e3a4081719e839afe6-0&
  rn=692799&
  evt=custom&
  ea=add_to_cart&
  pagetype=product&
  prodid=pid12345&
  items=id%3Dprod12345%26quantity%3D2%26price%3D25.1&
  gv=50.2&
  gc=usd
  ```

- **Cart page**

  ```
  https://bat.bing.com/action/0? 
  ti=1234567&<>ver=2.3&
  mid=d34f6979-ecfc-ecac-745d-e40447afd9b2&
  uid=3966616149922&
  vid=a5ia770-97ac68-cd211&
  msclkid=292049a17e2413e3a4081719e839afe6-0&
  rn=692799&
  evt=custom&
  pagetype=cart&
  prodid=prod12345,prod2345&
  items=id%3Dprod12345%26quantity%3D2%26price%3D25.1%2Cid%3Dprod2345%26quantity%3D1%26price%3D121.1&
  gv=171.3&
  gc=usd
  ```

- **Purchase confirmation page**

  ```
  https://bat.bing.com/action/0? 
  ti=1234567&<>ver=2.3&
  mid=d34f6979-ecfc-ecac-745d-e40447afd9b2&
  uid=3966616149922&
  vid=a5ia770-97ac68-cd211&
  msclkid=292049a17e2413e3a4081719e839afe6-0&
  rn=692799&
  evt=custom&
  ea=purchase&
  pagetype=purchase&
  prodid=prod12345,prod2345&
  items=id%3Dprod12345%26quantity%3D2%26price%3D25.1%2Cid%3Dprod2345%26quantity%3D1%26price%3D121.1&
  gv=171.3&
  gc=usd
  ```

- **Custom event with advertiser defined labels** <>
Custom labels like ea, ec, ev and el can be used to define custom remarketing lists and conversion events.

  ```
  https://bat.bing.com/action/0? 
  ti=1234567&<>ver=2.3&
  mid=d34f6979-ecfc-ecac-745d-e40447afd9b2&
  uid=3966616149922&
  vid=a5ia770-97ac68-cd211&
  msclkid=292049a17e2413e3a4081719e839afe6-0&
  rn=692799&
  evt=custom&
  ea=add_to_cart&
  ec=shoes&
  el=recommendations&
  ev=23.99
  ```

## Implementation details for IMG tag

1. You can fire a Microsoft Advertising UET tag as a 0-size image pixel.
1. A UET tag can be added anywhere on the page. An example implementation within the head tag is shown below:

   ```
   <head>
   <title>UET IMG based example</title> 
   <meta charset="utf-8" />
   <!--BEGIN: Microsoft Advertising UET tag.-->
   <img src="//bat.bing.com/action/0?ti=1234567&
   ver=2.3&
   evt=pageLoad&
   mid=d34f6979-ecfc-ecac745d-e40447afd9b2&
   uid=3966616149922&
   vid= a5ia770-97ac68-cd211&
   msclkid=292049a17e2413e3a4081719e839afe6-0&
   rn=692799&
   p= ttps%3A%2F%2Fwww.contoso.com%2Fsearch%3Fq%3Dwall%2Bclock&
   r=https%3A%2F%2Fwww.bing.com%2F&
   tl= Wall%20Clocks&
   kw=clocks,homedecor" height="0" width="0" style="display:none; visibility: hidden;" />
   <!--END: Microsoft Advertising UET tag-->
   <link href="StyleSheet/styles.css" rel="stylesheet">
   </head>
   ```
1. As the page loads, it triggers the UET tag, which results in an HTTPS request. This request is to the domain "bat.bing.com" and the URL contains the required parameters for Microsoft Advertising.
