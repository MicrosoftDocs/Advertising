---
title: "Creating a Points of Sale Feed"
description: Shows how to create a points of sale feed file that contains a list of booking sites.
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
---

# Create a Points of Sale Feed

> [!NOTE]
> This beta release of Hotel Price Ads is available to select participants only. For information about participating in the beta release program, please contact your account manager or [enroll here](https://go.microsoft.com/fwlink/?linkid=2201950).

To provide Bing your points of sale data, create an XML document that contains a point of sale (POS) for each booking site you support. A POS describes the POS's display name, URL, and criteria for matching the user to a POS.


The document must use UTF-8 encoding and must conform to the [PointsOfSale XSD](https://bhacstatic.blob.core.windows.net/schemas/point_of_sale.xsd). 

> [!NOTE]
> Bing does not support all XSD elements. Bing ignores any element or attribute in the document that it does not support. The [Points of Sale Reference](../pos-feed/reference.md) includes only those elements and attributes that Bing supports. 

> [!NOTE]
> The document must specify the elements in the order defined in the PointsOfSale XSD (or as shown in the reference).

## The top-level element in your feed

The points of sale feed contains a single, top-level [PointsOfSale](../pos-feed/reference.md#pointsofsale) element. The `PointsOfSale` element requires a [PointOfSale](../pos-feed/reference.md#pointofsaletype) child element for each site that users can use to book a room. 

```xml
<?xml version="1.0" encoding="UTF-8"?>
<PointsOfSale xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance>
  <PointOfSale>
    . . .
  </PointOfSale>
  ...
</PointsOfSale>
```


The `PointOfSale` element describes the POS's display name, URL, and criteria for matching the user to a POS. For information about defining a POS, see [Defining a point of sale](#defining-a-point-of-sale).

## Defining a point of sale

The `PointsOfSale` element contains a list of [PointOfSale](../pos-feed/reference.md#pointofsaletype) elements, one for each POS site that users can use to book rooms. The list must contain points of sale for a single partner.

The following shows `PointOfSale` elements that define points of sale for English speaking users. The first `PointOfSale` element defines a POS for English speaking end users on any device, and the second `PointOfSale` element defines a POS for English speaking end users on mobile devices. The POS URL includes details about the transaction, such as the check-in and check-out dates, hotel ID, and user language. Bing uses the display name and POS URL to create a hyperlink that's added to the ad. When the user clicks the link, they're taken to the booking site.

```xml
  <PointOfSale id="English">
    <DisplayNames display_text="ContosoTravel.com" display_language="en" />
    <Match status="yes" language="en" />
    <URL>http://contoso.com/landing?hid=(PARTNER-HOTEL-ID)&amp;checkin=(CHECKINYEAR)-(CHECKINMONTH)-(CHECKINDAY)&amp;checkout=(CHECKOUTYEAR)-(CHECKOUTMONTH)-(CHECKOUTDAY)&amp;language=(USER-LANGUAGE)</URL>
  </PointOfSale>
  <PointOfSale id="English-Mobile">
    <DisplayNames display_text="ContosoTravel.com" display_language="en" />
    <Match status="yes" language="en" device="mobile" />
    <URL>http://mobile.contoso.com/landing?hid=(PARTNER-HOTEL-ID)&amp;checkin=(CHECKINYEAR)-(CHECKINMONTH)-(CHECKINDAY)&amp;checkout=(CHECKOUTYEAR)-(CHECKOUTMONTH)-(CHECKOUTDAY)&amp;language=(USER-LANGUAGE)</URL>
  </PointOfSale>
```

Include the `DisplayNames` element only for online travel agencies. Don't include `DisplayNames` for central reservations system (CRS) suppliers (also known as integration partners) and direct suppliers (such as hotel owners or chains). For CRS suppliers and direct suppliers, Bing uses the hotel's name from the hotel feed.

If you include `DisplayNames`, you must include a `Match` element that has the language criterion set to the same language.

Bing uses the POS that best matches the user based on the POS's matching criteria. Based on the above matching criteria, users on mobile devices will use the English-Mobile POS and everyone else will use the English POS. For information about how Bing matches users to a POS, see [Matching points of sale](#matching-points-of-sale). For a list of criterion that you can match on, see the [Match](../pos-feed/reference.md#match) element.

The `URL` element specifies the link to the site where the user can book the room. The example shows using dynamic query parameters. Bing substitutes values for the dynamic variables at runtime. For information about using dynamic query parameters, see [Using dynamic query parameters](#using-dynamic-query-parameters).


> [!NOTE]
> If you specify the language and country matching criterion, they must be set to **en** and **US** only.


The following shows a complete points of sale XML document.

```xml
<?xml version="1.0" encoding="UTF-8"?>
<PointsOfSale xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:noNamespaceSchemaLocation="http://www.gstatic.com/localfeed/local_feed.xsd">
  <PointOfSale id="English">
    <DisplayNames display_text="ContosoTravel.com" display_language="en" />
    <Match status="yes" language="en" />
    <URL>http://contoso.com/landing?hid=(PARTNER-HOTEL-ID)&amp;checkin=(CHECKINYEAR)-(CHECKINMONTH)-(CHECKINDAY)&amp;checkout=(CHECKOUTYEAR)-(CHECKOUTMONTH)-(CHECKOUTDAY)&amp;language=(USER-LANGUAGE)</URL>
  </PointOfSale>
  <PointOfSale id="English-Mobile">
    <DisplayNames display_text="ContosoTravel.com" display_language="en" />
    <Match status="yes" language="en" device="mobile" />
    <URL>http://mobile.contoso.com/landing?hid=(PARTNER-HOTEL-ID)&amp;checkin=(CHECKINYEAR)-(CHECKINMONTH)-(CHECKINDAY)&amp;checkout=(CHECKOUTYEAR)-(CHECKOUTMONTH)-(CHECKOUTDAY)&amp;language=(USER-LANGUAGE)</URL>
  </PointOfSale>
</PointsOfSale>
```


## Matching points of sale

Points of sale include a `Match` element that contains the criteria that Bing uses to match a user to a POS. The following are the criterion that Bing uses to match users to points of sale. The list is in order of preference.

- country
- currency
- language
- device

Bing uses the following rules to find the best POS match.

  
- Bing gives the highest preference to country matches and the least preference to device matches. 

- If `Match` does not specify one of the criterion, Bing implicitly matches all values for the criterion. For example, if `Match` specifies language and currency, Bing implicitly matches any country and device. 
  
- If `Match` specifies one or more criterion, Bing uses the POS with the most explicit matches.  
   
- If the user matches multiple points of sale, Bing uses the POS with the best match quality. If multiple points of sale have the same match quality, Bing uses the first POS that it found with that match quality. Match quality is based on:  
  - Matches with the highest preference. For example, if one POS matches only on the user's currency and another matches only on the user's device, Bing uses the POS that matches the user's currency because it's higher in the preferred order.  
  - Explicit matches are preferred over implicit matches. For example, if one POS matches explicitly to the user's country and another matches implicitly to the user's country, Bing uses the POS that explicitly matches.


The `Match` element's status attribute determines whether to include or exclude the POS based on matching. If status is *never* and Bing matches all criterion, Bing will not use the POS. To exclude a POS, all criterion must match. In the following example, Bing explicitly excludes the POS if the user is from the United States or France, and implicitly includes it if the user is from any other country.

```
<PointOfSale id='exclude-example'>
  . . .
  <Match status='never' country='US' />
  <Match status='never' country='FR' />
  . . .
</PointOfSale>
``` 

If status is *yes*, Bing will not eliminate any points of sale from consideration that do not explicitly match all criterion, but preference is given to the POS that matches the most criterion. In the following example, Bing explicitly matches the user to the POS if the user's country is France. If the user's country is not France, the POS will still be considered until a better match is found. If a better match is not found, Bing will use the POS.


```
<PointOfSale id='exclude-example'>
  . . .
  <Match status='yes' country='FR' />
  . . .
</PointOfSale>
``` 

Bing recommends using the same matching criteria for each POS. This minimizes the complexity in determining why one POS matched over another.


## Using dynamic query parameters

A point of sale (POS) contains a `URL` element that identifies the site where users can book rooms. The URL may contain dynamic query parameters, which are user-defined parameters that contain a predefined token for its value. Bing then substitutes the token with a value before adding the URL to the ad. By using dynamic query parameters, you can include the hotel's ID, check-in date, length of stay, and more in the URL.

The following shows the syntax that you use to specify dynamic query parameters in your POS URL. Because dynamic query parameters are query parameters, they must follow the question mark symbol (?) in the URL.

`http://domain.com/path?param-name=(dynamic-variable-name)`

The following are the possible case-sensitive dynamic variable names that you may specify in the URL.

|Name|Description
|-|-
|ADVANCE-BOOKING-WINDOW|The number of days in advance of the check-in date that the booking took place. For example, 36.
|BING-SITE|The Bing property that originated the ad request. The following are the possible values.<ul><li>localuniversal&mdash;The ad originated from a search results page.</li><li>mapresults&mdash;The ad originated from a maps site.</li><li>PropertyPromotionAd&mdash;The ad originated from the first results page shown in a maps search.</li><li>unknown&mdash;The ad originated from an undetermined source.</li><li>verification&mdash;Bing uses this value when performing data quality tests on your site. You are not billed for these queries. Bing Analytics uses this parameter and its value for identifying Hotel Price Ads verification traffic.</li></ul>
|CHECKINDAY|The two-digit day specified in the `Checkin` element of the [Transaction Message](../transaction-message/reference.md#transaction). For example, 20.
|CHECKINDAY-OF-WEEK|The day of the week that the check-in takes place. Bing uses digits 0 through 6 to represent Monday through Sunday. For example, 1 is Tuesday.
|CHECKINMONTH|The two-digit month specified in the `Checkin` element of the Transaction message. Bing uses digits 00 through 11 to represent January through December. For example, 05 is June.
|CHECKINYEAR|The four-digit year specified in the `Checkin` element of the Transaction message. For example, 2021.
|CHECKOUTDAY|The two-digit day that the user checks out. Bing uses the `Nights` and `Checkin` elements of the TransactionMessage to calculate the day. For example, 23.
|CHECKOUTMONTH|The two-digit month that the user checks out. Bing uses the `Nights` and `Checkin` elements of the Transaction Message to calculate the month. For example, 07.
|CHECKOUTYEAR|The four-digit year that the user checks out. Bing uses the `Nights` and `Checkin` elements of the Transaction message to calculate the year. For example, 2021.
|CLICK-TYPE|Indicates whether the user clicked on a hotel ad or a room bundle ad. The following are the possible values.<ul><li>hotel&mdash;The user clicked on a hotel ad.</li><li>room&mdash;The user clicked on a room bundle ad.</li></ul> **NOTE:** Bing does not support the room option.
|CUSTOM[1-5]|The values of the custom fields (for example, Custom1) specified in the [Result](../transaction-message/reference.md#result-type) element of the Transaction message.
|DATE-TYPE|Indicates whether the user specified check-in and check-out dates. The following are the possible values.<ul><li>default&mdash;The user clicked on a hotel ad that used default dates.</li><li>selected&mdash;The user clicked on a hotel ad with specific check-in and check-out dates.</li></ul>
|HOTELGROUP_ID|The ID of the hotel group that the hotel ad belongs to.
|LENGTH|The length of stay specified in the `Nights` element of the Transaction Message. For example, 3.
|NUM-ADULTS|The number of adults occupying the room. The default value is 2.
|PARTNER-CURRENCY|The three-letter currency code specified in the currency attribute of the `Baserate` element in the Transaction Message. For example, USD.
|PARTNER-HOTEL-ID|The hotel's ID specified in the `id` element of the Hotel Feed.
|PARTNER-ROOM-ID|The ID that uniquely identifies the room. This is the ID specified in \<RoomID> element of the \<Result>, \<RoomBundle>, or \<RoomData> block, depending on usage.
|PRICE-DISPLAYED-TAX|The amount of tax in the user's local currency. The tax amount is based on the `Tax` element specified in the Transaction Message. For example, 3.14. 
|PRICE-DISPLAYED-TOTAL|The total cost of the room in the user's local currency. The amount is based on the sum of the `Baserate`, `Tax`, and `OtherFees` elements specified in the Transaction Message. For example, 152.13.
|SLOT_TYPE|The placement of the ad on the results page. The parameter may contain the following possible values:<ul><li>A&mdash;The priority slot where ads are shown on the results page when it loads.</li><li>B&mdash;The secondary slot where ads are shown only after the user clicks **More rates**.</li></ul>
|SUBACCOUNT_ID|The ID of the subaccount that the hotel price ads campaign belongs to. If your Google implementation uses CAMPAIGN-ID, substitute SUBACCOUNT_ID FOR CAMPAIGN-ID. 
|USER-COUNTRY|Two-letter country code of the country where the user is located. The value is extracted from the end-user's client settings. For example, US.
|USER-CURRENCY|Three-letter currency code of the local currency used by the user. The value is inferred from the end-user's client settings. For example, USD.
|USER-DEVICE|The end-user's device type. The following are the possible values.<ul><li>mobile</li><li>tablet</li><li>desktop</li><li>unknown</li></ul>The value is inferred from the end-user's client settings.
|USER-LANGUAGE|The two-letter language code that specifies the display language of the ad. The value is inferred from the end-user's client settings. For example, en.
|VERIFICATION|A Boolean that indicates whether the Bing generated the link. If Bing generated the link, the value is **true**. Otherwise, **false**.


All dates, such as CHECKINDAY, are in the hotel's timezone.

The following shows an example URL that contains dynamic query parameters and encoded entities.

```xml
<URL>http://www.partnerdomain.com?hotelID=(PARTNER-HOTEL-ID)
  &amp;checkinDay=(CHECKINDAY)&amp;checkinMonth=(CHECKINMONTH)
  &amp;checkinYear=(CHECKINYEAR)&amp;nights=(LENGTH)</URL>
```

Before Bing uses the URL in the ad, it substitutes values for the dynamic variable names. For example, if the user books a room for 6 nights starting on 6/7/2021 for hotel #42, Bing renders the URL as:

`http://www.partnerdomain.com?hotelID=42&checkinDay=07&checkinMonth=05&checkinYear=2021&nights=6`

Bing gets values for the dynamic parameters from your Transaction Message and Hotel Feed, as well as user-specific settings. For example, the value of the LENGTH variable comes from the `Nights` element in the Transaction Message, and the value of the PARTNER-HOTEL-ID variable comes from the `id` element in the Hotel Feed.

Some variables are subsets of Transaction Message elements. For example, the CHECKINDAY, CHECKINMONTH, and CHECKINYEAR variables are extracted from the `Checkin` element. Other variables are calculated based on the user's locale and other client settings.


### General URL rules

The following are general rules to follow when using dynamic variables.

- All dynamic parameters are optional. You are not required to insert any dynamic parameters in your POS URL. However, using variables to pass itinerary- and user-specific information generally creates a better experience for the end-user.
  
- Surround dynamic variable names with open and close parentheses.

- Use encoded entities for special characters. For example, replace ampersands (&amp;) with \&amp;, space with %20, and forward slash (/) with %2F.

- Values for a single parameter may be constructed from multiple variables. For example, you may construct the value of a checkinDate query parameter from the CHECKINDAY, CHECKINMONTH, and CHECKINYEAR variables.  
  
  ```xml  
  <URL>http://www.partnerdomain.com?checkinDate=(CHECKINDAY)%2F;(CHECKINMONTH)%2F;(CHECKINYEAR)</URL>  
  ```
  
- For dynamic variables that Bing recognized but does not support, Bing replaces the variable string with an empty string.   
- Because dynamic query parameters are query parameters, they must follow the question mark symbol (?) in the URL.
  
  
### Using conditional directives

In addition to the variables listed above, you can also use the following directives to create conditional logic.

- IF-DEFAULT-DATE&mdash;Resolves to **true** if the user clicked on a hotel ad that used default dates (the user did not pick the dates). If **true**, Bing inserts the values that follow this directive into the URL. Otherwise, Bing inserts the values following the ELSE directive.  
  
- ELSE&mdash;If the previous condition is not met, Bing inserts the values that follow this directive.  
  
- ENDIF&mdash;Ends the conditional block.

For example, the following URL sets the popup_datepicker query parameter to **true** if the user used default dates instead of specifying dates.

```xml
<URL>http://partner.com?hotelID=(PARTNER-HOTEL-ID)
&amp;checkinDay=(CHECKINDAY)&amp;checkinMonth=(CHECKINMONTH)&amp;checkinYear=(CHECKINYEAR)
&amp;nights=(LENGTH)(IF-DEFAULT-DATE)&amp;popup_datepicker=true(ELSE)
&amp;popup_datepicker=false(ENDIF)</URL>
```

If **true**, Bing renders the URL as:

```
http://partner.com?hotelID=123&checkinDay=01&checkinMonth=05&checkinYear=2021&nights=1&popup_datepicker=true
```

Otherwise, Bing renders the URL as:

```
http://partner.com?hotelID=123&checkinDay=23&checkinMonth=05&checkinYear=2021&nights=2&popup_datepicker=false
```

## General rules

- Use the PointsOfSale XSD to validate your Points of Sale feed file before sending it to Bing.
  
- The points of sale feed document must use UTF-8 encoding.
  
- The feed must include points of sale for all sites that users use to book rooms&mdash; the feed process does not support partial updates.
  
- Bing ignores any element or attribute that it does not support.
  
- Elements must be in the order specified in the PointsOfSale XSD.
  
- If your data includes special characters such as apostrophes or quotes, escape them or use CDATA sections. If you escape them, you may use entity codes or character codes. For example, you can escape Paul's as Paul\&apos;s or Paul\&#39;s.
  
- Do not include elements that do not contain data. For example, if you do not provide a display name for a hotel, do not include an empty \<DisplayNames\> element.
    
- Do not use HTML in your XML elements.
  


## Next steps

After creating your feed file, use the [PointsOfSale XSD](https://bhacstatic.blob.core.windows.net/schemas/point_of_sale.xsd) to validate it.

Ask your account manager to import the feed file.

Be sure to also import your hotel data. For information about creating your hotel feed file, see [Hotel Feed](../hotel-feed/hotel-feed.md).

After successfully importing your points of sale feed and hotel feed, you may begin sending your hotel pricing and availability data. For information, see [Transaction Messages](../transaction-message/transaction-message.md). 
