---
title: "Points of Sale Reference"
description: Describes the schema used to create a points of sale feed file.
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
---

# Points of Sale reference

> [!NOTE]
> This beta release of Hotel Price Ads is available to select participants only. For information about participating in the beta release program, please contact your account manager or [enroll here](https://go.microsoft.com/fwlink/?linkid=2201950).

If you create hotel price ads in Bing, you must use a Points of Sale feed to provide Bing the point of sale URLs to include in ads. You must define and import your points of sale feed prior to sending Bing [Transaction Messages](../transaction-message/transaction-message.md). 

For information about creating a points of sale feed, see [Creating a Points of Sale Feed](../pos-feed/create-pos-feed.md).

> [!NOTE]
> The elements must be specified in the order defined by the [PointsOfSale XSD](https://bhacstatic.blob.core.windows.net/schemas/point_of_sale.xsd) (and as listed in this topic).

> [!NOTE]
> Bing ignores any element or attribute not included below.

----

 
<a name="pointsofsale"></a> 

## PointsOfSale

Defines the top-level element of a points of sale feed.

|Element|Description|Children
|-|-|-
|PointsOfSale|The top-level element in a points of sale feed.|[PointsOfSale Type](#pointsofsaletype)

 
<a name="pointsofsaletype"></a> 

## PointsOfSale Type

Defines a list of points of sale.

|Element|Description|Children
|-|-|-
|PointOfSale|Defines a point of sale (POS) where users book rooms. Include a `PointOfSale` element for each POS you offer. You must define at least one POS, and all points of sale must be for a single partner.<br /><br />Attributes:<ul><li>id&mdash;Required. An opaque, user-defined ID that uniquely identifies the POS in the feed. <br /><br />If you want to limit booking to a specific POS for specific itineraries in your transaction message, use this ID in the `PointOfSale` element of your transaction message.</li></ul>|[PointOfSale Type](#pointofsaletype)


 
<a name="pointofsaletype"></a> 

## PointOfSale Type

Defines a point of sale.

|Element|Description|Children
|-|-|-
|DisplayNames|Optional.<br /><br />The online travel agency's name or domain to display in the ad. Specify a `DisplayNames` element for each language you support.<br /><br />Attributes:<ul><li>display_text&mdash;Required. The name of the online travel agency to display in the ad.</li><li>display_language&mdash;Required. The language used by the ad. Specify the language using the two-letter ISO 639 language code. For example, use **en** for English.</li></ul><br />Notes:<ul><li>Include `DisplayNames` for online travel agencies only. Do not use for partners such as central reservations systems (CSR), hotel owners, or chains. For these partners, Bing uses the hotel's name from the hotel feed.</li><li>The POS must specify a `Match` element with the same language that you specify for the display name.</li><li>Bing uses the display name and the URL in the `URL` element to create a hyperlink that Bing includes in the ad.</li></ul>|None
|<a name="match"></a>Match|Required.<br /><br />The criteria used to determine if the POS is used in the ad.<br /><br />Attributes:<ul><li>country&mdash;Optional. The publishing country of the Bing site used by the user. Specify the country using a two-letter ISO 3166 country code. For example, if the user uses Bing.com, set country to **US** for United States.</li><li>language&mdash;Optional. The language used by the user. Specify the language using a two-letter ISO 639 language code. For example, use **en** for English.</li><li>currency&mdash;Optional. The currency used by the user or hotel. Specify the currency using a three-character ISO 4217 currency code. For example, USD for US Dollar.</li><li>device&mdash;Optional. The type of device used by the user. The following are the possible case-insensitive values.<ul><li>Desktop</li><li>Mobile</li><li>Tablet</li></ul></li><li>sitetype&mdash;Optional. The type of site where the ad request originated. The following are the possible case-insensitive values.<ul><li>LocalUniversal&mdash;The ad request originated from a web search results page. </li><li>MapResults&mdash;The ad request originated from a map site. </li></ul></li><li>status&mdash;Optional. The condition used to match the criterion. The following are the possible case-insensitive values.<ul><li>Yes&mdash;Use the POS if the criteria matches.</li><li>Never&mdash;Don't use the POS if the criteria matches.</li></ul></li></ul>Notes:<ul><li>The language attribute must be set to **en**.</li><li>The country attribute must be set to **US**. </li><li>The currency attribute must be set to **USD**.</li><li>You cannot set the status attribute to Never if the device attribute is set to Tablet.</li></ul>For more information, see [POS Matching Rules](../pos-feed/create-pos-feed.md#matching-points-of-sale).|None
|<a name="postype_url"></a>URL|Optional.<br />Data type is string.<br /><br/>The URL of the site where the user books the room.<br /><br /> Notes:<ul><li>The POS may specify only one URL.</li><li>The URL may include one or more dynamic query parameter. For information about dynamic query parameters, see [Using Dynamic Query Parameters](../pos-feed/create-pos-feed.md#using-dynamic-query-parameters).</li><li>If the URL includes special characters, you must replace the special characters with encoded entities. For example, if the URL includes query parameters, you must encode ampersands (&amp;) as \&amp;. </li></ul>|None

 
