---
title: "Transaction Message Reference"
description: Describes the schema that defines a transaction message. 
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
---

# Transaction Message reference

> [!NOTE]
> This beta release of Hotel Price Ads is available to select participants only. For information about participating in the beta release program, please contact your account manager or [enroll here](https://go.microsoft.com/fwlink/?linkid=2201950).

If you create hotel price ads in Bing, use transaction messages to provide Bing your itinerary data. This section describes the elements of a transaction message defined by the [Transaction XSD](https://bhacstatic.blob.core.windows.net/schemas/transaction.xsd). 

For information about creating a transaction message, see [Creating a Transaction Message](../transaction-message/create-transaction-message.md).

For information about sending a transaction message, see [Pushing a Transaction Message to Bing](../transaction-message/push-transaction-message.md) or [Having Bing Pull Transaction Messages](../transaction-message/pull-transaction-message.md).

> [!NOTE]
> Bing does not support all Transaction XSD elements. This topic includes only those elements and attributes that Bing supports. Bing ignores all other elements and attributes. 

> [!NOTE]
> The elements must be specified in the order defined by the Transaction XSD (and as listed in this topic).

----


## Transaction

Defines the top-level element of a transaction message.

|Element|Description|Children
|-|-|-
|Transaction|The top-level element in a transaction message.<br /><br />The message must include either the \<PropertyDataSet> element, \<Result> element, or both. But because the metadata (\<PropertyDataSet>) doesn't change often, you typically create a separate transaction message for it and another transaction message for itineraries (\<Result>), which are updated more frequently.<br /><br />Attributes:<ul><li>timestamp&mdash;Required. The UTC date and time that you sent the message. The time stamp format is: YYYY-MM-DDThh:mm:ss[+/-hh:mm]. The UTC offset is optional. For example, 2017-06-14T08:00:34 or 2017-06-14T01:00:34+07:00.<br /><br />The time stamp applies to each itinerary in the message. Bing processes an itinerary only if the time stamp is later than the time stamp of the same itinerary stored in Bing. For example, if Bing processes a message with time stamp 14:10 and then processes a message with time stamp 14:09, only those itineraries not included in the 14:10 message are processed.<br /><br />Messages with a time stamp older than 24 hours are not processed.<br /></li><li>id&mdash;Required. An opaque, user-defined ID that advertisers use to uniquely identify the message. The transaction status report includes this ID.</li></ul> |[Transaction Type](#transaction-type)


## Transaction Type

Defines the transaction message.

|Element|Description|Children
|-|-|-
|PropertyDataSet|Optional.<br /><br />A container object that contains the metadata for rooms and packages. Use `RoomData` to describe the physical description of a type of room (for example, non-smoking, single queen room). And use `PackageData` to describe different packages of amenities (for example, you can have one package that includes breakfast and another that doesn't). Specify a property data set for each property that you want to define metadata for.|Array of [PropertyDataSet Type](#propertydataset-type)
|Result|Optional.<br /><br />Defines an itinerary. An itinerary is a unique combination of the `Checkin` and `Nights` elements. Specify one `Result` element for each itinerary that you define for a property. The number of itineraries that you may specify is limited by the size of the `Transaction` element, which must be less than 100 MB (or 10 MB compressed). |Array of [Result Type](#result-type)


## PropertyDataSet Type

Defines a container object that contains the metadata for rooms and packages.


|Element|Description|Children
|-|-|-
|Property|Required.<br />Data type is string.<br /><br />The ID of the hotel property. This ID must match the ID of a hotel in your [hotel feed file](../hotel-feed/hotel-feed.md) that you submitted to Bing.|None
|RoomData|Describes a type of room. You may define one or more room types.|Array of [RoomData Type](#roomdata-type)
|PackageData|Describes a package of amenities. You may define one or more packages.|Array of [PackageData Type](#packagedata-type)
 

## Result Type

Defines the itinerary.

|Element|Description|Children
|-|-|-
|Property|Required.<br />Data type is string.<br /><br />The ID of the hotel property. This ID must match the ID of a hotel in your hotel feed file that you submitted to Bing. |None
|Checkin|Required.<br />Data type is date.<br /><br />The check-in date in the form: YYYY-MM-DD.<br /><br />Notes:<ul><li>The date cannot be earlier than the transaction message's `timestamp` date.</li><li>The check-in date must be less than 180 days (the maximum advanced booking that you may specify) out from the time stamp date.</li><li>The combination of `Checkin` and `Nights` defines an itinerary. The itinerary must be unique for a `Property`.</li></ul> |None
|Nights|Required.<br />Data type is unsigned integer.<br /><br />The number of nights stay for this itinerary.|None
|RoomID|Optional.<br />Data type is string.<br /><br />The ID that identifies the [room type](#roomdata-type) that applies to this itinerary. This ID and the \<RoomBundle> element are mutually exclusive.|None
|Baserate|Required.<br />Data type is decimal.<br /><br />The base rate is the cost of the room for the entire stay&mdash;not the per night rate. For example, if the per night rate is 100.00 and the itinerary is for three nights, the base rate is 300.00. Use the room rate of the least expensive, private, double-occupancy room that's available. If all double-occupancy rooms are booked, specify the lowest price of the next level of occupancy.<br /><br />Attributes:<ul><!--<li>all_inclusive&mdash;Optional. If the base rate includes taxes and fees, set to **true**; otherwise, **false**. The default is **false**.<br /><br />If **true**, `Tax` and `OtherFees` must be set to 0.00.<br /><br />If the hotel is located in the US or Canada, you should not set this attribute to **true**. For information, see ???.</li>--><li>currency&mdash;Required. The three-character currency code that the rate is specified in. For example, USD for US Dollar. For a list of codes, see [ISO 4217](http://www.xe.com/iso4217.php).</li></ul>Notes:<ul><li>To remove the itinerary from inventory, set this element, `Tax`, and `OtherFees` to -1.00. You should remove the itinerary from inventory whenever there are no rooms available to satisfy the stay.</li><li>All currencies must use a decimal point (.) to separate the integer portion of the rate from the fractional portion (for example, 150.00).</li><li>Do not use a thousands separator in the integer portion of the rate. Instead of 1,150.00, use 1150.00</li></ul>|None
|Tax|Required.<br />Data type is decimal.<br /><br />The tax amount is based on `Baserate`.<br /><br />Attributes:<ul><li>currency&mdash;Required. The three-character currency code that the tax is specified in. For example, USD for US Dollar. For a list of codes, see [ISO 4217](http://www.xe.com/iso4217.php).</li></ul>Notes:<ul><li>All currencies must use a decimal point (.) to separate the integer portion of the tax from the fractional portion (for example, 50.00).</li><li>Do not use a thousands separator in the integer portion of the tax. Instead of 1,000.00, use 1000.00</li><!--<li>If the base rate's `all_inclusive` attribute is **true**, set this field to 0.00.</li>--><li>If `Baserate` is set to -1.00, this element must also be set to -1.00. </li></ul>|None
|OtherFees|Required.<br />Data type is decimal.<br /><br />Any fee not covered by base rate and taxes (for example, a parking fee or portable bed fee).<br /><br />Attributes:<ul><li>currency&mdash;Required. The three-character currency code that the fee is specified in. For example, USD for US Dollar. For a list of codes, see [ISO 4217](http://www.xe.com/iso4217.php).</li></ul>Notes:<ul><li>All currencies must use a decimal point (.) to separate the integer portion of the fee from the fractional portion (for example, 50.00).</li><li>Do not use a thousands separator in the integer portion of the fee. Instead of 1,000.00, use 1000.00</li><!--<li>If the base rate's `all_inclusive` attribute is **true**, set this element to 0.00.</li>--><li>If `Baserate` is set to -1.00, this element must also be set to -1.00.</ul>|None
|ExpirationTimestamp|Optional.<br />The UTC date and time when the price is considered expired. If the price is expired, the itinerary will not serve.<br /><br />The time stamp is in the form: YYYY-MM-DDThh:mm:ss[+/-hh:mm]. The UTC offset is optional. For example, 2017-06-14T08:00:34Z (no offset) or 2017-06-14T01:00:34+07:00.
|ChargeCurrency|Optional.<br />Data type is string.<br /><br />Defines when the user pays for a booking. The following are the possible case-insensitive values.<br /><br /><ul><li>Deposit&mdash;The user is charged a portion at booking and the remainder at a later point in time, typically when the user checks out of the hotel.</li><li>Hotel&mdash;The user is charged at check-in. If the payment must be made in the hotel's currency, use this option.</li><li>Installment&mdash;The user is charged a fixed amount at specific intervals over fixed period of time.</li><li>Web&mdash;The user is charged online at the time of booking.</li></ul>The default is Web.|None
|<a name="custom1"></a>Custom1|Optional.<br />Data type is string.<br /><br />A user-defined string that Bing uses as a substitution value of a simarly named dynamic query parameter in a point of sale (POS) URL. For example, if the POS URL is https:\/\/www.partnerdomain.com?promo=(CUSTOM1) and `Custom1` is set to summer2017, the resulting POS URL is https:\/\/www.partnerdomain.com?promo=summer2017. For more information, see [Using Dynamic Query Parameters](../pos-feed/create-pos-feed.md#using-dynamic-query-parameters).<br/><br/>The sum of all Custom[1-5] values is limited to a maximum of 1,000 characters. But keep in mind that the practical limit may be less given the maximum length of a URL.|None
|Custom2|Optional.<br />Data type is string.<br /><br />A user-defined string that Bing uses as a substitution value of a simarly named dynamic query parameter in a point of sale (POS) URL. For example, if the POS URL is https:\/\/www.partnerdomain.com?promo=(CUSTOM2) and `Custom2` is set to summer2017, the resulting POS URL is https:\/\/www.partnerdomain.com?promo=summer2017. For more information, see [Using Dynamic Query Parameters](../pos-feed/create-pos-feed.md#using-dynamic-query-parameters).|None
|Custom3|Optional.<br />Data type is string.<br /><br />A user-defined string that Bing uses as a substitution value of a simarly named dynamic query parameter in a point of sale (POS) URL. For example, if the POS URL is https:\/\/www.partnerdomain.com?promo=(CUSTOM3) and `Custom3` is set to summer2017, the resulting POS URL is https:\/\/www.partnerdomain.com?promo=summer2017. For more information, see [Using Dynamic Query Parameters](../pos-feed/create-pos-feed.md#using-dynamic-query-parameters).|None
|Custom4|Optional.<br />Data type is string.<br /><br />A user-defined string that Bing uses as a substitution value of a simarly named dynamic query parameter in a point of sale (POS) URL. For example, if the POS URL is https:\/\/www.partnerdomain.com?promo=(CUSTOM4) and `Custom4` is set to summer2017, the resulting POS URL is https:\/\/www.partnerdomain.com?promo=summer2017. For more information, see [Using Dynamic Query Parameters](../pos-feed/create-pos-feed.md#using-dynamic-query-parameters).|None
|Custom5|Optional.<br />Data type is string.<br /><br />A user-defined string that Bing uses as a substitution value of a simarly named dynamic query parameter in a point of sale (POS) URL. For example, if the POS URL is https:\/\/www.partnerdomain.com?promo=(CUSTOM5) and `Custom5` is set to summer2017, the resulting POS URL is https:\/\/www.partnerdomain.com?promo=summer2017. For more information, see [Using Dynamic Query Parameters](../pos-feed/create-pos-feed.md#using-dynamic-query-parameters).|None
|AllowablePointsOfSale|Optional.<br /><br />A list of points of sale (POS) that identify websites where users can book the room. By default, the user can use any POS defined in your points of sale feed file. Specify this element only if you want to limit the points of sale for this specific itinerary. |Array of [allowablePointsOfSaleType](#allowablepointsofsaletype)
|RoomBundle|Optional.<br /><br />Defines a room bundle. A \<Result> element may contain one or more \<RoomBundle> elements. Use room bundles to specify different types of rooms that are available for this itinerary. The\<RoomID> and \<PackageID> elements should reference room and package data that you defined in the [PropertyDataSet](#propertydataset-type) section of the transaction message. Typically, you define the room and package metadata in a separate, metadata-only transaction message. You should avoid using the room bundle's \<RoomData> and \<PackageData> elements to define the room and package data inline.|Array of [RoomBundle](#roombundle)


## PackageData Type

Defines the amenities that are part of a package deal.

|Element|Description|Children
|-|-|-
|PackageID|Required.<br />Data type is string.<br /><br />An ID that uniquely identifies the package. If your \<Result> element contains \<RoomBundle>, set the bundles' \<PackageID> element to this ID, as appropriate.|None
|Name|Required.<br /><br />A name that identifies the package. This should be the same name that you use to identify the package on your website. Specify a `Text` element for each language you support.|[Text Type](#text-type)
|Description|Optional.<br /><br />A description of the package. Specify a `Text` element for each language you support.|[Text Type](#text-type)
|Capacity|Optional.<br />Data type is integer.<br /><br />The maximum number of guests that the room is capable of accommodating.<br /><br />**NOTES:**<ul><li>The value must be in the range 1 through 20.</li><li>The value must not be less than `Occupancy`, if specified.</li></ul>Typically, if you define room bundles, you set capacity as part of [RoomData](#roomdata-type).|None
|Occupancy|Optional.<br />Data type is integer.<br /><br />The maximum number of guests that the room is intended to accommodate. For example, although the room is physically capable of hosting 4 guests (capacity), it's intended for only 2 guests.<br /><br />**NOTES:**<ul><li>Although optional, you're strongly encouraged to always specify this element.</li><li>The value must be in the range 1 through 20.</li></ul>|None
|OccupancyDetails|Optional.<br /><br />A container object that contains details about occupancy. If you include `Occupancy`, you may also specify this element. |[OccupancyDetails Type](#occupancydetails-type)
|ChargeCurrency|Optional<br />Data type is string.<br /><br />Defines when the user pays for a booking. The following are the possible case-insensitive values.<ul><li>Deposit&mdash;The user is charged a portion at booking and the remainder at a later point in time, typically when the user checks out of the hotel.</li><li>Hotel&mdash;The user is charged at check-in. If the payment must be made in the hotel's currency, use this option.</li><li>Installment&mdash;The user is charged a fixed amount at specific intervals over fixed period of time.</li><li>Web&mdash;The user is charged online at the time of booking.</li></ul>The default is web.|None
|Refundable|Required.<br /><br />An element that determines whether the room charge is refundable.<br /><br />**Attributes**<ul><li>available &mdash; Required. Set to true (or 1) if the room charge is refundable; otherwise, false (or 0).</li><li>refundable_until_days &mdash; Optional. The date by which the guest must request a refund. Specify the date as the number of days in advance of check-in. If not specified, the room charge is refundable up to and including the check-in date. Valid values are 0 through 180.</li><li>refundable_until_time &mdash; Optional. The guest may request a refund up until this time on the date referenced in the *refundable_until_days* attribute. Specify the time in the hotel's local time. Specify the time in the form, hh:mm:ss. For example, if the refund is available until 4 PM, use 16:00:00.</li></ul>|None
|BreakfastIncluded|Optional.<br />Data type is Boolean.<br /><br />A value that determines whether the room bundle includes complimentary breakfast. Valid values are:<ul><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li></ul> The default is false. You can use \<BreakfastIncluded/> as a shortcut for true.<br /><br />Don't include in a room bundle if the hotel provides free breakfast for all guests.|None
|ParkingIncluded|Optional.<br />Data type is Boolean.<br /><br />A value that determines whether the room bundle includes complimentary parking. Valid values are:<ul><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li></ul>The default is false. You can use \<ParkingIncluded/> as a shortcut for true.<br /><br />Don't include in a room bundle if the hotel provides free parking for all guests.|None
|InternetIncluded|Optional.<br />Data type is Boolean.<br /><br />A value that determines whether the room bundle includes complimentary Internet service. Valid values are:<ul><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li></ul>The default is false. You can use \<InternetIncluded/> as a shortcut for true.<br /><br />Don't include in a room bundle if the hotel provides free internet service for all guests.|None
|MembershipBenefitsIncluded|Optional.<br /><br />Defines membership benefits that apply for the length of the guest's stay.|[MembershipBenefits Type](#membershipbenefits-type)
|CarRentalIncluded|Optional.<br />Data type is Boolean.<br /><br />A value that determines whether the room bundle includes a complimentary car rental for the length of the guest's stay. If the stay includes a complimentary car rental, include the \<CarRentalIncluded/> element, otherwise, don't include it.|None
|MilesIncluded|Optional.<br />Include if the stay provides frequent flyer miles.|[Miles Type](#miles-type)
|OnPropertyCredit|Optional.<br />Include if the guest receives a one-time credit for using on-site services during their stay.|[OnPropertyCredit Type](#onpropertycredit-type)


## RoomData Type

Defines a type of room.

|Element|Description|Children
|-|-|-
|RoomID|Required.<br />Data type is string.<br /><br />An ID that uniquely identifies the room. If your \<Result> element contains \<RoomBundle>, set the bundles' \<RoomID> element to this ID, as appropriate. You may also use this ID to set the `Result` object's \<RoomID> element, if you don't use room bundles but want to identify a type of room.|None
|Name|Required.<br /><br />A name that identifies the type of room (for example, non-smoking, single queen room). This should be the same name that you use to identify the room on your website. Specify a `Text` element for each language you support.|[Text Type](#text-type)
|Description|Optional.<br /><br />A description of the room. Specify a `Text` element for each language you support.|[Text Type](#text-type)
|PhotoURL|Optional.<br /><br />A container object that contains the URL of an image of the room type. You may specify one or more photos. |[PhotoURL Type](#photourl-type)
|Capacity|Optional.<br />Data type is integer.<br /><br />The maximum number of guests that the room is capable of accommodating.<br /><br />**NOTES:**<ul><li>The value must be in the range 1 through 20.</li><li>The value must not be less than `Occupancy`, if specified.</li></ul> |None
|Occupancy|Optional.<br />Data type is integer.<br /><br />The maximum number of guests that the room is intended to accommodate. For example, although the room is physically capable of hosting 4 guests, it's intended for only 2 guests.<br /><br />**NOTES:**<ul><li>Although optional, you're strongly encouraged to always specify this element.</li><li>The value must be in the range 1 through 20.</li><li>The value must not be greater than `Capacity`.</li></ul>Typically, if you define room bundles, you set occupancy as part of [PackageData](#packagedata-type).|None
|OccupancyDetails|Optional.<br /><br />A container object that contains details about occupancy. If you include `Occupancy`, you may also specify this element. |[OccupancyDetails](#occupancydetails-type)


## allowablePointsOfSaleType

Defines a point of sale (POS) where a user may book the room.

|Element|Description|Children
|-|-|-
|PointOfSale|<br /><br />Required.<br /><br />Attributes:<ul><li>id&mdash;Required. An opaque, user-defined ID that uniquely identifies a POS. This ID must match the ID of a POS defined in your pints of sale feed file.</li></ul> |None


## Text Type

Defines a text string.

|Element|Description|Children
|-|-|-
|Text|Attributes:<ul><li>text&mdash;The text string.</li><li>language&mdash;The two-letter ISO 639-1 language code that identifies the language used by the text string. For example, 'en' for English.</li></ul> |None


## OccupancyDetails Type

Defines a container object that contains details about occupancy.

|Element|Description|Children
|-|-|-
|NumAdults|Required.<br />Data type is integer.<br /><br />The maximum number of adults the room is intended to accommodate.|None
|Children|Optional.<br /><br />A container object the identifies the ages of children the room is intended to accommodate.|[Children Type](#children-type)


## Children Type

Defines a container object that identifies the ages of children the room is intended to accommodate.

|Element|Description|Children
|-|-|-
|Child|Attributes:<ul><li>age&mdash;The age of the child the room is intended to accommodate.</li></ul> |None


## PhotoUrl Type

Defines a container object that contains the URL of an image of the room type.

|Element|Description|Children
|-|-|-
|URL|Required.<br /><br />A URL to the image.|None
|Caption|Optional.<br /><br />A container object that contains the text that's displayed when the user hovers over the image.|[Text Type](#text-type)


## MembershipBenefits Type

Defines a membership's benefit.

|Element|Description|Children
|-|-|-
|ProgramName|The benefit's name.|[Text Type](#text-type)
|ProgramLevel|The benefit's level. For example, Platinum or Gold.|[Text Type](#text-type)
|NightlyValue|Optional.<br />Data type is decimal.<br /><br />The benefit's nightly value.<br /><br />**Attributes:**<ul><li>currency &mdash; The currency that the value is specified in. To specify the currency, use the ISO-4217 three-letter currency code. For example, use USD for United States Dollar.</li></ul>|None


## Miles Type

Defines the frequent flyer provider and the number of miles the stay is worth.

|Element|Description|Children
|-|-|-
|NumberOfMiles|The number of miles the stay is worth.|None
|Provider|The name of the frequent flyer provider.|[Text Type](#text-type)


## OnPropertyCredit Type

Defines the credit the guest receives for using one of the on-site services.

|Element|Description|Children
|-|-|-
|Amount|Data type is decimal.<br /><br />The amount of the credit given the guest if they use one of the services. <br /><br />**Attributes:**<ul><li>currency &mdash; The currency that the amount is specified in. To specify the currency, use the ISO-4217 three-letter currency code. For example, use USD for United States Dollar.|None


## RoomBundle

Defines room and price information for a room bundle.

|Element|Description|Children
|-|-|-
|RoomData|Optional. You can use this element to define a type of room inline. You should not use this option. Instead, you should define room types using the \<RoomData> element in the [PropertyDataSet](#propertydataset-type) section of the transaction message.<br /><br />NOTE: Don't include the \<RoomID> element as a child of \<RoomData>.|[RoomData Type](#roomdata-type) 
|PackageData|Optional. You can use this element to define a room package inline. You shouldn't use this option. Instead, you should define packages using the \<PackageData> element in the [PropertyDataSet](#propertydataset-type) section of the transaction message.<br /><br />NOTE: Don't include the \<PackageID> element as a child of \<PackageData>).|[PackageData Type](#packagedata-type) 
|RoomId|Required.<br />Data type is string.<br /><br />An ID that uniquely identifies a \<RoomData> element that you defined in the [PropertyDataSet](#propertydataset-type) section of this transaction message or a separate transaction message.<br /><br />If you include an inline room type definition (see the \<RoomData> element above), you may specify the ID here or in \<RoomData>. Using inline room type definitions is not recommended.|None
|PackageId|Optional.<br />Data type is string.<br /><br />An ID that uniquely identifies a \<PackageData> element that you defined in the [PropertyDataSet](#propertydataset-type) section of this transaction message or a separate transaction message.<br /><br />If you include an inline package definition (see the \<PackageData> element above), you may specify the ID here or in \<PackageData>. Using inline package definitions is not recommended.|None
|Capacity|Optional.<br />Data type is integer.<br /><br />The maximum number of guests that the room is capable of accommodating.<br /><br />**NOTES:**<ul><li>The value must be in the range 1 through 20.</li><li>The value must not be less than `Occupancy`, if specified.</li></ul> |None
|Occupancy|Required.<br />Data type is integer.<br /><br />The maximum number of guests that the room is intended to accommodate. For example, although the room is physically capable of hosting 4 guests, it's intended for only 2 guests.<br /><br />**NOTES:**<ul><li>Although optional, you're strongly encouraged to always specify this element.</li><li>The value must be in the range 1 through 20.</li><li>The value must not be greater than `Capacity`, if specified.</li></ul>|None
|OccupancyDetails|Optional.<br /><br />A container object that contains details about occupancy. If you include `Occupancy`, you may also specify this element. |[OccupancyDetails](#occupancydetails-type)
|Baserate|Required.<br />Data type is decimal.<br /><br />The room's rate, which is the cost of the room for the entire stay&mdash;not the per night rate. For example, if the per night rate is 100.00 and the itinerary is for three nights, the base rate is 300.00. <br /><br />Attributes:<ul><!--<li>all_inclusive&mdash;Optional. If the base rate includes taxes and fees, set to **true**; otherwise, **false**. The default is **false**.<br /><br />If **true**, `Tax` and `OtherFees` must be set to 0.00.<br /><br />If the hotel is located in the US or Canada, you should not set this attribute to **true**. For information, see ???.</li>--><li>currency&mdash;Required. The three-character currency code that the rate is specified in. For example, USD for US Dollar. For a list of codes, see [ISO 4217](http://www.xe.com/iso4217.php).</li></ul>Notes:<ul><li>Remove the bundle from inventory whenever there are no rooms available to satisfy the stay. Unlike with itineraries where you set rate to -1.00 to remove it, with bundles you simply remove the bundle from the list.</li><li>All currencies must use a decimal point (.) to separate the integer portion of the rate from the fractional portion (for example, 150.00).</li><li>Do not use a thousands separator in the integer portion of the rate. Instead of 1,150.00, use 1150.00</li></ul>|None
|Tax|Required.<br />Data type is decimal.<br /><br />The tax amount is based on `Baserate`.<br /><br />Attributes:<ul><li>currency&mdash;Required. The three-character currency code that the tax is specified in. For example, USD for US Dollar. For a list of codes, see [ISO 4217](http://www.xe.com/iso4217.php).</li></ul>Notes:<ul><li>All currencies must use a decimal point (.) to separate the integer portion of the tax from the fractional portion (for example, 50.00).</li><li>Do not use a thousands separator in the integer portion of the tax. Instead of 1,000.00, use 1000.00</li><!--<li>If the base rate's `all_inclusive` attribute is **true**, set this field to 0.00.</li>--></ul>|None
|OtherFees|Required.<br />Data type is decimal.<br /><br />Any fee not covered by base rate and taxes (for example, a parking fee or portable bed fee).<br /><br />Attributes:<ul><li>currency&mdash;Required. The three-character currency code that the fee is specified in. For example, USD for US Dollar. For a list of codes, see [ISO 4217](http://www.xe.com/iso4217.php).</li></ul>Notes:<ul><li>All currencies must use a decimal point (.) to separate the integer portion of the fee from the fractional portion (for example, 50.00).</li><li>Do not use a thousands separator in the integer portion of the fee. Instead of 1,000.00, use 1000.00</li><!--<li>If the base rate's `all_inclusive` attribute is **true**, set this element to 0.00.</li>--></ul>|None
|Custom1|Optional.<br />Data type is string.<br /><br />A user-defined string that Bing uses as a substitution value of a simarly named dynamic query parameter in a point of sale (POS) URL. For example, if the POS URL is https:\/\/www.partnerdomain.com?promo=(CUSTOM1) and `Custom1` is set to summer2017, the resulting POS URL is https:\/\/www.partnerdomain.com?promo=summer2017. For more information, see [Using Dynamic Query Parameters](../pos-feed/create-pos-feed.md#using-dynamic-query-parameters).|None
|Custom2|Optional.<br />Data type is string.<br /><br />A user-defined string that Bing uses as a substitution value of a simarly named dynamic query parameter in a point of sale (POS) URL. For example, if the POS URL is https:\/\/www.partnerdomain.com?promo=(CUSTOM2) and `Custom2` is set to summer2017, the resulting POS URL is https:\/\/www.partnerdomain.com?promo=summer2017. For more information, see [Using Dynamic Query Parameters](../pos-feed/create-pos-feed.md#using-dynamic-query-parameters).|None
|Custom3|Optional.<br />Data type is string.<br /><br />A user-defined string that Bing uses as a substitution value of a simarly named dynamic query parameter in a point of sale (POS) URL. For example, if the POS URL is https:\/\/www.partnerdomain.com?promo=(CUSTOM3) and `Custom3` is set to summer2017, the resulting POS URL is https:\/\/www.partnerdomain.com?promo=summer2017. For more information, see [Using Dynamic Query Parameters](../pos-feed/create-pos-feed.md#using-dynamic-query-parameters).|None
|Custom4|Optional.<br />Data type is string.<br /><br />A user-defined string that Bing uses as a substitution value of a simarly named dynamic query parameter in a point of sale (POS) URL. For example, if the POS URL is https:\/\/www.partnerdomain.com?promo=(CUSTOM4) and `Custom4` is set to summer2017, the resulting POS URL is https:\/\/www.partnerdomain.com?promo=summer2017. For more information, see [Using Dynamic Query Parameters](../pos-feed/create-pos-feed.md#using-dynamic-query-parameters).|None
|Custom5|Optional.<br />Data type is string.<br /><br />A user-defined string that Bing uses as a substitution value of a simarly named dynamic query parameter in a point of sale (POS) URL. For example, if the POS URL is https:\/\/www.partnerdomain.com?promo=(CUSTOM5) and `Custom5` is set to summer2017, the resulting POS URL is https:\/\/www.partnerdomain.com?promo=summer2017. For more information, see [Using Dynamic Query Parameters](../pos-feed/create-pos-feed.md#using-dynamic-query-parameters).|None
