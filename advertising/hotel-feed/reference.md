---
title: "Property feed reference"
description: Describes the schema used to create a property feed file.
ms.service: "bing-ads"
ms.subservice: "lodging-campaigns"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
---

# Property feed reference

If you create hotel price ads in Bing, you must use a Property feed to provide Bing information about the hotels that you advertise. You must define and import your property feed prior to sending Bing [Price feeds](../transaction-message/transaction-message.md). 

For information about creating a property feed, see [Creating a Property feed](../hotel-feed/create-hotel-feed.md).

> [!NOTE]
> The elements must be specified in the order defined by the [Hotel XSD](https://bhacstatic.z22.web.core.windows.net/schemas/hotelv2.xsd) (and as listed in this topic).

----

 
<a name="listings"></a> 

## Listings

Defines the top-level element of a property feed.

|Element|Description|Children
|-|-|-
|listings|The top-level element in a property feed.|[Listings Type](#listingstype)

 
<a name="listingstype"></a> 

## Listings Type

Defines a list of hotels in the feed.

|Element|Description|Children
|-|-|-
|language|Required.<br />Data type is string.<br /><br />The language that the hotel data in the feed is written in. Specify the language using the two-letter ISO 639 language code. For example, use **en** for English.<br /><br />|None
|listing|Defines a hotel listing. Include a `listing` element for each hotel in the feed.|[Listing Type](#listingtype)


 
<a name="listingtype"></a> 

## Listing Type

Defines a hotel.

|Element|Description|Children
|-|-|-
|id|Required.<br />Data type is string.<br /><br />An opaque, user-defined ID that uniquely identifies the hotel in the feed. <br /><br />When you create your Price feed, use this ID in the `Property` element of your Price feed to identify the hotel. |None
|name|Required.<br />Data type is string.<br /><br />The hotel's name. The name may contain a maximum of 200 characters. |None
|address|Required.<br />Data type is string or [Component Type](#componenttype).<br /><br />The street address of the hotel.<br /><br />Notes:<ul><li>You may specify the address using free-form text in the body of the `address` element or using `component` child elements to specify the components of the address (see [Component Type](#componenttype)).</li><li>You're encouraged to use `component` elements to specify the address' components.</li><li>If you use free-form text, separate each component of the address with a comma. For example, 1234 Billings Way, Redmond, WA, 98030.</li></ul>|[Component Type](#componenttype)
|country|Required.<br />Data type is string.<br /><br/>The country where the hotel is located. Specify the country using the two-letter ISO 3116 country code. For example, use **US** for United States.|None
|latitude|Required.<br /> Data type is decimal.<br /><br />The latitude of the hotel's geographical coordinates.<br /><br />Notes:<ul><li>The latitude and longitude are required only if you don't specify `phone`. It's preferred that you specify both the phone and geographical coordinates.</li><li>The latitude must be in the range -90.0 through 90.0.</li><li>Use [Location API](https://msdn.microsoft.com/library/ff701715.aspx) or another GeoCoding tool to generate the coordinates.</li></ul>|None
|longitude|Required.<br /> Data type is decimal.<br /><br />The longitude of the hotel's geographical coordinates.<br /><br />Notes:<ul><li>The latitude and longitude are required only if you don't specify `phone`. It's preferred that you specify both the phone and geographical coordinates.</li><li>The longitude must be in the range -180.0 through 180.0.</li><li>Use [Location API](https://msdn.microsoft.com/library/ff701715.aspx) or another GeoCoding tool to generate the coordinates.</li></ul>|None
|<a name="phone"></a>phone|Required.<br />Data type is string.<br /><br />A list of telephone numbers that customers use to contact the hotel.<br /><br />Attributes:<ul><li>type&mdash;Required. The type of telephone number specified. The following are the possible values.<br /><ul><li>main&mdash;Required. The hotel's main voice telephone number.</li><li>tollfree&mdash;Optional. The hotel's toll-free voice telephone number.</li><li>fax&mdash;Optional. The hotel's fax telephone number.</li><li>tdd&mdash;Optional. The hotel's telecommunications device for the deaf telephone number.</li><li>mobile&mdash;Optional. The hotel's mobile telephone number.</li></ul></ul>Notes:<ul><li>A phone number is required only if you don't specify `latitude` and `longitude`. It's preferred that you specify both the phone and geographical coordinates.</li><li>Provide unique telephone numbers for the listing.</li><li>Use dashes, spaces, or parentheses in the phone number to make it easier to read. For example, use “610-222-3333” or “(610) 222-3333” rather than “6102223333”.</li><li>Specify only one telephone number in each `phone` element. Do not specify multiple numbers, such as 650-123-2222/33.</li><li>The telephone number may contain an extension of up to 7 digits. Precede extensions with one of the following abbreviations: "ext", "extn", and "x". For example, "408-555-1111x12345" or "408-555-1111 x12345".</li><li>The telephone number may not include alphabetical characters.</li><li>Each listing should specify one of each type of phone number: "main", "mobile", "tollfree", "fax", or "tdd", if applicable.</li><li>If the telephone number includes the country code, precede it with a "+". For example, “+65 6722-2323” for a number in Singapore where the country code is 65, or “+001 (408) 555-1111” for a number in the United States where the country code is 001.</li></ul>|None
|category|Optional.<br />Data type is string.<br /><br/>A category that identifies the type of hotel. The expected format is *vacation_rental* or *hotel* followed by the pipe character and a custom value. For example, *vacation_rental \| 'custom value'* or *hotel \| 'custom value'*<br/><br/>For a list of custom values, see [Lodging property categories](https://help.ads.microsoft.com/#apex/ads/en/60192/-1).|None
|content|Optional.<br />Data type is [Content Type](#contenttype).<br /><br/>Provides additional information about the hotel such as a description, reviews, and amenities.|[Content Type](#contenttype)


<a name="componenttype"></a> 

## Component Type

Defines a component of a street address.

|Element|Description|Children
|-|-|-
|component|Optional.<br />Data type is string.<br /><br />Specify a `component` element for each component of the address. <br /><br />Attributes:<ul><li>name&mdash;Required. The name of the address component. The following are the possible values.<br /><ul><li>addr1&mdash;Required. The hotel's street address.</li><li>addr2&mdash;Optional. Second street address line.</li><li>addr3&mdash;Optional. Third street address line. </li><li>city&mdash;Required. The name of the city where the hotel is located.</li><li>province&mdash;Required. The name of the state, region, or province where the hotel is located.</li><li>postal_code&mdash;Required. The address' postal code.</li></ul></li></ul> |None


<a name="contenttype"></a> 

## Content Type

Defines additional information about the hotel. (These elements may appear in any order.)

|Element|Description|Children
|-|-|-
|text|Optional.<br />Data type is [Description type](#descriptiontype).<br /><br />A description of the hotel. <br /><br />Attributes:<ul><li>type&mdash;Required. Set to *description*.</li></ul>|[Description type](#descriptiontype)
|review|Optional.<br />Data type is [Review type](#reviewtype).<br /><br />A hotel review. You may specify one or more \<review> elements.<br /><br />Attributes:<ul><li>type&mdash;Required. Set to either of the following types:<ul><li>editorial&mdash;The review is written by a blogger or other professional authority.</li><li>user&mdash;The review is written by a user.</li></ul></li></ul>|[Review type](#reviewtype)
|attributes|Optional.<br />Data type is [Attribute type](#attributetype).<br /><br />The list of hotel amenities. Specify an \<attr> child element for each amenity you want to include.|[Attribute type](#attributetype)
|image|Optional.<br />Data type is [Image type](#imagetype).<br /><br />An image of the hotel. You may specify one or more \<image> elements. Best image aspect ratio is 4:3.<br /><br />Attributes:<ul><li>type&mdash;Required. Set to either of the following types:<ul><li>ad&mdash;The image is an ad.</li><li>menu&mdash;The image shows the menu for the hotel's restaurant.</li><li>photo&mdash;The image is of the hotel.</li></ul><li>url&mdash;Required. The URL to the image.</li><li>width&mdash;Optional. The image's width, in pixels. Should be greater than 720 pixels.</li><li>height&mdash;Optional. The image's height, in pixels. Should be greater than 720 pixels.</li></ul>|[Image type](#imagetype)
|neighborhoods|Optional.<br />Data type is [Neighborhood type](#neighborhoodtype).<br /><br />A list of neighborhoods where the hotel is located.|[Neighborhood type](#neighborhoodtype)
|brandCode|Optional.<br />Data type is string.<br /><br />The brand code associated to the logo. This is used when you have multiple logos for the properties you are advertising.|None


<a name="descriptiontype"></a> 

## Description Type

Defines a description of the hotel.

|Element|Description|Children
|-|-|-
|link|Optional.<br />Data type is string.<br /><br />A URL to an online description of the hotel.|None
|title|Optional.<br />Data type is string.<br /><br />A title to use for the description.|None
|body|Required.<br />Data type is string.<br /><br />A description of the hotel.|None


<a name="imagetype"></a> 

## Image Type

Defines an image of the hotel.

|Element|Description|Children
|-|-|-
|date|Required.<br /><br />The date the image was taken.<br /><br />Attributes:<ul><li>month&mdash;Required. The month the image was taken. Valid values are 1 (January) through 12 (December)</li><li>day&mdash;Required. The day of the month the image was taken.</li><li>year&mdash;Required. The four-digit year the image was taken.</li></ul>|None
|link|Optional.<br />Data type is string.<br /><br />A URL to the hotel's webpage that contains the image.|None
|title|Optional.<br />Data type is string.<br /><br />A title to use for the image.|None
|author|Optional.<br />Data type is string.<br /><br />The name of the person that took the image.|None


<a name="neighborhoodtype"></a> 

## Neighborhood Type

Defines a neighborhood where the hotel is located.

|Element|Description|Children
|-|-|-
|neighborhood|Optional.<br />Data type is string.<br /><br />The name of the neighborhood where the hotel is located.|None


<a name="reviewtype"></a> 

## Review Type

Defines a hotel review.

|Element|Description|Children
|-|-|-
|author|Optional.<br />Data type is string.<br /><br />The name of the person who wrote the review.|None
|body|Optional.<br />Data type is string.<br /><br />The review's text. The text should not include HTML but if it does, it must be escaped.|None
|date|Optional.<br /><br />The date the review was written. Specify the date only if the review's type is *user*.<br /><br />Attributes:<ul><li>month&mdash;Required. The month the review was written. Valid values are 1 (January) through 12 (December).</li><li>day&mdash;Required. The day of the month the review was written.</li><li>year&mdash;Required. The four-digit year the review was written.</li></ul>|None
|link|Optional.<br />Data type is string.<br /><br />A URL to the review online.|None
|rating|Optional.<br />Data type is string.<br /><br />The rating that the reviewer gave the hotel. The rating is a string decimal in the range 0.0 through 10.0.|None
|title|Optional.<br />Data type is string.<br /><br />The review's title. Specify the title only if the review's type is *editorial*.|None


<a name="attributetype"></a> 

## Attribute Type

Defines a hotel amenity.

|Element|Description|Children
|-|-|-
|website|Optional.<br />Data type is string.<br /><br />The URL to the hotel's website.|None
|attr|Optional.<br />Data type is string.<br /><br />A hotel amenity.<br /><br />Attributes:<ul><li>name&mdash;Required. Set to one of the following values:<ul><li>air_conditioned&mdash;Indicates whether all guest rooms have air conditioning. Set the element's value to Yes or No as appropriate.</li><li>all_inclusive_available&mdash;Indicates whether the room rate includes food and drinks. Set the element's value to Yes or No as appropriate.</li><li>child_friendly&mdash;Indicates whether the hotel includes special features for families traveling with kids such as reduced room rates, play area, or kid's club. Set the element's value to Yes or No as appropriate.</li><li>has_affiliated_golf_course&mdash;Indicates whether the hotel has a golf course onsite or nearby for guests to enjoy. Set the element's value to Yes or No as appropriate.</li><li>has_airport_shuttle&mdash;Indicates whether the hotel offers an airport shuttle for free or a fee. Set the element's value to Yes or No as appropriate.</li><li>has_bar_or_lounge&mdash;Indicates whether the hotel has a bar or lounge that serves alcoholic beverages. Set the element's value to Yes or No as appropriate.</li><li>has_beach_access&mdash;Indicates whether the hotel has beach access without having to cross a road. Set the element's value to Yes or No as appropriate.</li><li>has_business_center&mdash;Indicates whether the hotel includes a business center where guests can use a computer and printer for free or a fee. Set the element's value to Yes or No as appropriate.</li><li>has_fitness_center&mdash;The hotel has an onsite fitness center. Set the element's value to Yes or No as appropriate.</li><li>has_free_breakfast&mdash;Indicates whether the hotel provides a free breakfast to all guest each day. Set the element's value to Yes or No as appropriate.</li><li>has_hot_tub&mdash;Indicates whether the hotel has a hot tub onsite or some or all guest rooms include a whirlpool or jacuzzi tub. Set the element's value to Yes or No as appropriate.</li><li>has_laundry_service&mdash;Indicates whether the hotel offers laundry service where the hotel launders the guest's clothes. An onsite, self-serve, coin-operated facility doesn't count. Set the element's value to Yes or No as appropriate.</li><li>has_restaurant&mdash;Indicates whether the hotel has an onsite restaurant for guests. Set the element's value to Yes or No as appropriate.</li><li>has_room_service&mdash;Indicates whether the hotel offers room service where food is prepared onsite and delivered to the guest's room. Set the element's value to Yes or No as appropriate.</li><li>has_spa&mdash;Indicates whether the hotel has an onsite spa that provides services such as a massage, facial, or sauna. Set the element's value to Yes or No as appropriate.</li><li>kitchen_availability&mdash;Indicates whether guest rooms include kitchens with a refrigerator and stove. Set the element's value to *Available in all rooms*, *Available in some rooms*, or *Not available*.</li><li>num_reviews&mdash;The number of times the hotel was reviewed. Set the element's value the number of reviews.</li><li>number_of_rooms&mdash;The number of units associated with the listing. Set the element's value the number of reviews.</li><li>parking_type&mdash;Indicates whether parking is available and whether it's free. Set the element's value to *No payment required*, *Paid*, or *Not available*.</li><li>pets_allowed&mdash;Indicates whether the hotel allows guests to bring pets. Set the element's value to Yes or No.</li><li>smoke_free_property&mdash;Indicates whether the hotel allows smoking. Set the element's value to Yes or No.</li><li>star_rating&mdash;The hotel's star rating. Possible values are 1 through 5.</li><li>swimming_pool_type&mdash;Indicates whether the hotel has a swimming pool for guests. Set the element's value to *Indoors*, *Outdoors*, *Indoors and outdoors*, or *Not available*.</li><li>wheelchair_accessible&mdash;Indicates whether the hotel is wheelchair accessible. Set the element's value to Yes or No.</li><li>wifi_type&mdash;Indicates whether the hotel offers WiFi service. Set the element's value to *No payment required*, *Paid*, or *Not available*.</li><li>custom_0&mdash;Custom parameter for extra information not applicable to other attributes</li><li>custom_1&mdash;Custom parameter for extra information not applicable to other attributes</li><li>custom_2&mdash;Custom parameter for extra information not applicable to other attributes</li><li>custom_3&mdash;Custom parameter for extra information not applicable to other attributes</li><li>custom_4&mdash;Custom parameter for extra information not applicable to other attributes</li></ul>|None


