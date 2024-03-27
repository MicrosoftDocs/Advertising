---
title: "Creating a Hotel Feed"
description: Shows how to create an XML hotel feed file that lists the hotel properties you want to advertise.
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
---

# Create an XML Hotel Feed file

[!INCLUDE[coming-soon](../hotel-ads/includes/property-center-coming-soon.md)]

> [!NOTE]
> This beta release of Hotel Price Ads is available to select participants only. For information about participating in the beta release program, please contact your account manager or [enroll here](https://go.microsoft.com/fwlink/?linkid=2201950).
>
> The Hotel feed and documentation are subject to change. 

To provide Microsoft your hotel listings, create an XML document that contains a listing of each hotel you want to advertise. A listing describes the hotel's name, address, telephone number, geographical coordinates, amenities, and more.

The document must use UTF-8 encoding and must conform to the [Hotel XSD](https://bhacstatic.blob.core.windows.net/schemas/hotelv2.xsd). 

For information about creating a feed file using CSV or TSV file format, see [Creating a CSV Hotel Feed file](create-csv-hotel-feed.md).

> [!NOTE]
> Microsoft does not support all XSD elements. Microsoft ignores any element or attribute in the document that it does not support. The [Hotel Feed Reference](../hotel-feed/reference.md) includes only those elements and attributes that Microsoft supports. 

> [!NOTE]
> The document must specify the elements in the order defined in the Hotel XSD (and as shown in the reference).



## Getting the data right

Because Microsoft attempts to match properties in your hotel feed to businesses in Bing Maps, it is important that the data you provide about the hotel is accurate and complete.

If a hotel has missing or incorrect information, Microsoft may not be able to match it. If Microsoft cannot match the hotel, Microsoft will not advertise it. You will be able to view a matching report in the hotel center that indicates which hotels Microsoft matched or didn't match. If Microsoft didn't match the hotel, the report includes the message, *Unable to match this hotel to a property in Bing*. For help improving your match rate, please ensure they are available in Bing places for business.


## The top-level element in your feed

The hotel feed contains a single, top-level [listings](../hotel-feed/reference.md#listings) element. The `listings` element contains two required child elements: `language` and `listing`. 

```xml
<?xml version="1.0" encoding="UTF-8"?>
<listings  xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
  <language>en</language>
  <listing>
    . . .
  </listing>
  ...
</listings>
```


> [!NOTE]
> We currently support feed data only in English.

The `language` element specifies the language that the data in the feed is written in. To specify the language, use the two-letter ISO 639 language code. For example, use **en** for English.

The [listing](../hotel-feed/reference.md#listingstype) element contains information about the hotel, such as it's name, address, and phone number. For information about defining a listing, see [Defining a hotel listing](#defining-a-hotel-listing).


## Defining a hotel listing

The `listing` element defines a hotel. You must specify a `listing` element for each hotel that you advertise. The following example shows the minimum elements that you must specify for a listing. The exception is that you may specify either the geographical coordinates or a telephone number. Although you may specify either the coordinates or telephone number, you should specify both to ensure a better chance of matching properties in Bing Maps.

```xml
  <listing>
    <id>abc123</id>
    <name>Great Ambers Getaway</name>
    <address>
      <component name="addr1">1234 Porter Road</component>
      <component name="city">Goldendale</component>
      <component name="province">WA</component>
      <component name="postal_code">98234</component>
    </address>
    <country>US</country>
    <latitude>47.694351</latitude>
    <longitude>-122.451782</longitude>
    <phone type="main">123-456-7890</phone>
  </listing>
```

The ID in the `id` element is user-defined and must be unique within the feed.

The address in the `address` element is the hotel's street address. The address must be a street address and not a post office box. You can specify the hotel's address using the `component` element seen in the above example or by using a free-form string seen in the below example. The preference is to use `component` elements.

`    <address>1234 Porter Road, Goldendale, WA, 98234</address>`

The `latitude` and `longitude` element specify the hotel's geographical coordinates. Use a geocoding API such as [Location API](https://msdn.microsoft.com/library/ff701715.aspx) to generate the coordinates from a street address.

The listing must specify at least the hotel's main telephone number. The main number should be the front desk's phone number and not a central reservations phone number. The more contact phone numbers that you provide the better. The following example shows the other phone options.

```xml
    <phone type="main">123-456-7890</phone>
    <phone type="tollfree">800-456-7890</phone>
    <phone type="fax">123-456-7890</phone>
    <phone type="tdd">123-456-7890</phone>
    <phone type="mobile">123-456-7890</phone>
```

For more information about specifying telephone numbers, see the [phone](../hotel-feed/reference.md#phone) element.

## Specifying optional hotel listing fields

The following example shows the optional elements that you may include in the listing. Although optional, you should include as much information as possible to support current and future usage scenarios.

```xml
  <listing>
    . . .
    <category>hotel | inn</category>
    <content>
      <text type="description">
        <body>This element contains the hotel's description.</body>
      </text>
      <review type="user">
        <body>This element contains a review of the hotel.</body>
        <date month="2" day="24" year="2018" />
        <link>https://contoso.com/reviews/hotels?id=sd87s90</link>
        <rating>8.5</rating>
      </review>
      <attributes>
        <website>https://contoso.com</website>
        <attr name="air_conditioned">Yes</attr>
        <attr name="has_airport_shuttle">Yes</attr>
        <attr name="parking_type">No payment required</attr>
      </attributes>
      <image type="photo" url="https://contoso.com/photos?id=345k43llj" width=800 height=600>
        <date month="3" day="3" year="2018" />
        <link>https://contoso.com/...</link>
        <title>Hotel entrance</title>
      </image>
      <neighborhoods>
        <neighborhood>Sodo District</neighborhood>
      </neighborhoods>
      <brand>Contoso</brand>
    </content>
  </listing>
```

The `category` element expected format is *vacation_rental* or *hotel* followed by the pipe character and a custom value. For example, *vacation_rental \| 'custom value'* or *hotel \| 'custom value'*<br/><br/>For a list of custom values, see [Lodging property categories](https://help.ads.microsoft.com/#apex/ads/en/60192/-1).

The `text` element contains a description of the hotel. You must specify the `body` element, which contains the actual description. Depending on the description's length, it may be truncated when displayed. If you include the `link` and `title` elements, the link URL points to the description online.

The `review` element contains either a user review or an editorial review. An editorial review is a professional review done by a reviewing authority such as a travel blogger. You may include any number of reviews but depending on the number of reviews sent, they may not all be shown. You must specify the `body` element, which contains the review. Depending on the review's length, it may be truncated when displayed. If you include the `link` element, it points to the full list of reviews online.

The `attributes` element contains a list of amenities the hotel provides such as air conditioning, a swimming pool, and free breakfast. For a list of possible amenities, see [Attribute](reference.md#attributetype). If you don't specify an amenity, it's assumed that the hotel doesn't provide it. 

The `image` element contains an image of the hotel. You may include any number of images but depending on the number of images sent, they may not all be shown. The recommended aspect ration is 4:3 and the minimum width is 720 pixels. Images must be original photographs and may not be screenshots. Note that the `link` URL must be accessible by the AdIdxBot crawler. If your site includes the robots.txt file, it must include either:
- User-Agent: AdIdxBot
- Allow: /

The `neighborhood` element identifies the neighborhood where the hotel is located. You can specify multiple neighborhoods if the hotel is centrally located among several neighborhoods.

The `brand` element identifies the hotel's brand. For example, Fabrikam Residences by Contoso, where Contoso is the brand.


## What happens if the hotel's content changes?

If you change any of the hotel's property values between feed runs (for example, its name, address, phone, etc.), Microsoft Advertising may treat it as a new hotel property and create a new listing for it. If Microsoft creates a new listing, prior performance history for the old hotel remains available for up to 36 months. Note that the old hotel's bids and multipliers will not transfer to the new hotel entity. 

If you remove a hotel and add it back in a later feed with the same property values as before, Microsoft treats it as a new listing. Also, the performance report will show it as two separate listings.




## General rules

- Use the Hotel XSD to validate your hotel feed file before sending it to Microsoft.
  
- The hotel feed document must use UTF-8 encoding.
  
- The feed must include listings for all your hotels&mdash; the feed process does not support partial updates.
  
- Microsoft ignores any element or attribute that it does not support.
  
- Elements must be in the order specified in the Hotel XSD.
  
- If your data includes special characters such as apostrophes or quotes, escape them or use CDATA sections. If you escape them, you may use entity codes or character codes. For example, you can escape Paul's as Paul\&apos;s or Paul\&#39;s.
  
- Do not include elements that do not contain data. For example, if you do not provide the geographical coordinates for a hotel, do not include empty \<latitude\> and \<longitude\> elements.
    
- Do not use HTML in your XML elements.
  


## Next steps

After creating your feed file, use the [Hotel XSD](https://bhacstatic.blob.core.windows.net/schemas/hotelv2.xsd) to validate it.

Ask your account manager to import the feed file.

Be sure to also import your points of sale data. For information about creating your points of sale feed file, see [Points of Sale Feed](../pos-feed/pos-feed.md).

After Microsoft successfully imports your data and is able to match your hotels with properties in Bing Maps, you may begin sending your hotel pricing and availability data. For information, see [Transaction Messages](../transaction-message/transaction-message.md). 
