---
title: "Transaction Message Reference"
description: Describes the schema that defines a transaction message. 
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
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
|Nights|Required.<br />Data type is unsigned integer.<br /><br />The number of nights stay for this itinerary. The maximum number of `Nights` is 14. |None
|RoomID|Optional.<br />Data type is string.<br /><br />The ID that identifies the [room type](#roomdata-type) that applies to this itinerary. This ID and the \<RoomBundle> element are mutually exclusive.|None
|Baserate|Required.<br />Data type is decimal.<br /><br />The base rate is the cost of the room for the entire stay&mdash;not the per night rate. For example, if the per night rate is 100.00 and the itinerary is for three nights, the base rate is 300.00. Use the room rate of the least expensive, private, double-occupancy room that's available. If all double-occupancy rooms are booked, specify the lowest price of the next level of occupancy.<br /><br />Attributes:<ul><!--<li>all_inclusive&mdash;Optional. If the base rate includes taxes and fees, set to **true**; otherwise, **false**. The default is **false**.<br /><br />If **true**, `Tax` and `OtherFees` must be set to 0.00.<br /><br />If the hotel is located in the US or Canada, you should not set this attribute to **true**. For information, see ???.</li>--><li>currency&mdash;Required. The three-character currency code that the rate is specified in. For example, USD for US Dollar. For a list of codes, see [ISO 4217](http://www.xe.com/iso4217.php).</li></ul>Notes:<ul><li>To remove the itinerary from inventory, set this element, `Tax`, and `OtherFees` to -1.00. You should remove the itinerary from inventory whenever there are no rooms available to satisfy the stay.</li><li>All currencies must use a decimal point (.) to separate the integer portion of the rate from the fractional portion (for example, 150.00).</li><li>Do not use a thousands separator in the integer portion of the rate. Instead of 1,150.00, use 1150.00</li></ul>|None
|Tax|Required.<br />Data type is decimal.<br /><br />The tax amount is based on `Baserate`.<br /><br />Attributes:<ul><li>currency&mdash;Required. The three-character currency code that the tax is specified in. For example, USD for US Dollar. For a list of codes, see [ISO 4217](http://www.xe.com/iso4217.php).</li></ul>Notes:<ul><li>All currencies must use a decimal point (.) to separate the integer portion of the tax from the fractional portion (for example, 50.00).</li><li>Do not use a thousands separator in the integer portion of the tax. Instead of 1,000.00, use 1000.00</li><!--<li>If the base rate's `all_inclusive` attribute is **true**, set this field to 0.00.</li>--><li>If `Baserate` is set to -1.00, this element must also be set to -1.00. </li></ul>|None
|OtherFees|Required.<br />Data type is decimal.<br /><br />Any fee not covered by base rate and taxes (for example, a parking fee or portable bed fee).<br /><br />Attributes:<ul><li>currency&mdash;Required. The three-character currency code that the fee is specified in. For example, USD for US Dollar. For a list of codes, see [ISO 4217](http://www.xe.com/iso4217.php).</li></ul>Notes:<ul><li>All currencies must use a decimal point (.) to separate the integer portion of the fee from the fractional portion (for example, 50.00).</li><li>Do not use a thousands separator in the integer portion of the fee. Instead of 1,000.00, use 1000.00</li><!--<li>If the base rate's `all_inclusive` attribute is **true**, set this element to 0.00.</li>--><li>If `Baserate` is set to -1.00, this element must also be set to -1.00.</ul>|None
|ExpirationTimestamp|Optional.<br />The UTC date and time when the price is considered expired. If the price is expired, the itinerary will not serve.<br /><br />The time stamp is in the form: YYYY-MM-DDThh:mm:ss[+/-hh:mm]. The UTC offset is optional. For example, 2017-06-14T08:00:34Z (no offset) or 2017-06-14T01:00:34+07:00.
|ExpirationTime|Optional.<br />The UTC date and time when the price is considered expired. If the price is expired, the itinerary will not serve.<br /><br />The time stamp is in the form: YYYY-MM-DDThh:mm:ss[+/-hh:mm]. The UTC offset is optional. For example, 2017-06-14T08:00:34Z (no offset) or 2017-06-14T01:00:34+07:00.
|ChargeCurrency|Optional.<br />Data type is string.<br /><br />Defines when the user pays for a booking. The following are the possible case-insensitive values.<br /><br /><ul><li>Deposit&mdash;The user is charged a portion at booking and the remainder at a later point in time, typically when the user checks out of the hotel.</li><li>Hotel&mdash;The user is charged at check-in. If the payment must be made in the hotel's currency, use this option.</li><li>Installment&mdash;The user is charged a fixed amount at specific intervals over fixed period of time.</li><li>Web&mdash;The user is charged online at the time of booking.</li></ul>The default is Web.|None
|<a name="custom1"></a>Custom1|Optional.<br />Data type is string.<br /><br />A user-defined string that Bing uses as a substitution value of a simarly named dynamic query parameter in a point of sale (POS) URL. For example, if the POS URL is https:\/\/www.partnerdomain.com?promo=(CUSTOM1) and `Custom1` is set to summer2017, the resulting POS URL is https:\/\/www.partnerdomain.com?promo=summer2017. For more information, see [Using Dynamic Query Parameters](../pos-feed/create-pos-feed.md#using-dynamic-query-parameters).<br/><br/>The sum of all Custom[1-5] values is limited to a maximum of 1,000 characters. But keep in mind that the practical limit may be less given the maximum length of a URL.|None
|Custom2|Optional.<br />Data type is string.<br /><br />A user-defined string that Bing uses as a substitution value of a simarly named dynamic query parameter in a point of sale (POS) URL. For example, if the POS URL is https:\/\/www.partnerdomain.com?promo=(CUSTOM2) and `Custom2` is set to summer2017, the resulting POS URL is https:\/\/www.partnerdomain.com?promo=summer2017. For more information, see [Using Dynamic Query Parameters](../pos-feed/create-pos-feed.md#using-dynamic-query-parameters).|None
|Custom3|Optional.<br />Data type is string.<br /><br />A user-defined string that Bing uses as a substitution value of a simarly named dynamic query parameter in a point of sale (POS) URL. For example, if the POS URL is https:\/\/www.partnerdomain.com?promo=(CUSTOM3) and `Custom3` is set to summer2017, the resulting POS URL is https:\/\/www.partnerdomain.com?promo=summer2017. For more information, see [Using Dynamic Query Parameters](../pos-feed/create-pos-feed.md#using-dynamic-query-parameters).|None
|Custom4|Optional.<br />Data type is string.<br /><br />A user-defined string that Bing uses as a substitution value of a simarly named dynamic query parameter in a point of sale (POS) URL. For example, if the POS URL is https:\/\/www.partnerdomain.com?promo=(CUSTOM4) and `Custom4` is set to summer2017, the resulting POS URL is https:\/\/www.partnerdomain.com?promo=summer2017. For more information, see [Using Dynamic Query Parameters](../pos-feed/create-pos-feed.md#using-dynamic-query-parameters).|None
|Custom5|Optional.<br />Data type is string.<br /><br />A user-defined string that Bing uses as a substitution value of a simarly named dynamic query parameter in a point of sale (POS) URL. For example, if the POS URL is https:\/\/www.partnerdomain.com?promo=(CUSTOM5) and `Custom5` is set to summer2017, the resulting POS URL is https:\/\/www.partnerdomain.com?promo=summer2017. For more information, see [Using Dynamic Query Parameters](../pos-feed/create-pos-feed.md#using-dynamic-query-parameters).|None
|AllowablePointsOfSale|Optional.<br /><br />A list of points of sale (POS) that identify websites where users can book the room. By default, the user can use any POS defined in your points of sale feed file. Specify this element only if you want to limit the points of sale for this specific itinerary. |Array of [allowablePointsOfSale Type](#allowablepointsofsale-type)
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
|Refundable|Required.<br /><br />An element that determines whether the room charge is refundable.<br /><br />**Attributes**<ul><li>available &mdash; Required. Set to true (or 1) if the room charge is refundable; otherwise, false (or 0).</li><li>refundable_percentage &mdash; Optional. The percentage of refund allowed to the user. Not setting this attribute will set refundable percent to 100% </li><li>refundable_until_days &mdash; Optional. The date by which the guest must request a refund. Specify the date as the number of days in advance of check-in. If not specified, the room charge is refundable up to and including the check-in date. Valid values are 0 through 180.</li><li>refundable_until_time &mdash; Optional. The guest may request a refund up until this time on the date referenced in the *refundable_until_days* attribute. Specify the time in the hotel's local time. Specify the time in the form, hh:mm:ss. For example, if the refund is available until 4 PM, use 16:00:00.</li></ul>|None
|CancellationDetails|Optional.<br /><br />A description of the details for cancellation. For example, You may cancel free of charge until 5 days before arrival. You will be charged the cost of the first night if you cancel in the 5 days before arrival. |[Text Type](#text-type)
|BreakfastIncluded|Optional.<br />Data type is Boolean.<br /><br />A value that determines whether the room bundle includes complimentary breakfast. Valid values are:<ul><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li></ul> The default is false. You can use \<BreakfastIncluded/> as a shortcut for true.<br /><br />Don't include in a room bundle if the hotel provides free breakfast for all guests.|None
|LunchIncluded|Optional.<br />Data type is Boolean.<br /><br />A value that determines whether the room bundle includes complimentary Lunch. Valid values are:<ul><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li></ul> The default is false. You can use \<LunchIncluded/> as a shortcut for true.<br /><br />Don't include in a room bundle if the hotel provides free lunch for all guests.|None
|DinnerIncluded|Optional.<br />Data type is Boolean.<br /><br />A value that determines whether the room bundle includes complimentary Dinner. Valid values are:<ul><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li></ul> The default is false. You can use \<DinnerIncluded/> as a shortcut for true.<br /><br />Don't include in a room bundle if the hotel provides free dinner for all guests.|None
|SnacksIncluded|Optional.<br />Data type is Boolean.<br /><br />A value that determines whether the room bundle includes complimentary snacks. Valid values are:<ul><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li></ul> The default is false. You can use \<DinnerIncluded/> as a shortcut for true.<br /><br />Don't include in a room bundle if the hotel provides free snacks for all guests.|None
|BeveragesIncluded|Optional.<br />Data type is Boolean.<br /><br />A value that determines whether the room bundle includes complimentary drinks. Valid values are:<ul><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li></ul> The default is false. You can use \<DrinksIncluded/> as a shortcut for true.<br /><br />Don't include in a room bundle if the hotel provides free drinks for all guests.|None
|ParkingIncluded|Optional.<br />Data type is Boolean.<br /><br />A value that determines whether the room bundle includes complimentary parking. Valid values are:<ul><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li></ul>The default is false. You can use \<ParkingIncluded/> as a shortcut for true.<br /><br />Don't include in a room bundle if the hotel provides free parking for all guests.|None
|InternetIncluded|Optional.<br />Data type is Boolean.<br /><br />A value that determines whether the room bundle includes complimentary Internet service. Valid values are:<ul><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li></ul>The default is false. You can use \<InternetIncluded/> as a shortcut for true.<br /><br />Don't include in a room bundle if the hotel provides free internet service for all guests.|None
|MembershipBenefitsIncluded|Optional.<br /><br />Defines membership benefits that apply for the length of the guest's stay.|[MembershipBenefits Type](#membershipbenefits-type)
|CarRentalIncluded|Optional.<br />Data type is Boolean.<br /><br />A value that determines whether the room bundle includes a complimentary car rental for the length of the guest's stay. If the stay includes a complimentary car rental, include the \<CarRentalIncluded/> element, otherwise, don't include it.|None
|MilesIncluded|Optional.<br />Include if the stay provides frequent flyer miles.|[Miles Type](#miles-type)
|FacilitatedBookingToken |Optional.<br />Data type is string.<br /> A string containing a token for facilitated booking.|None
|OnPropertyCredit|Optional.<br />Include if the guest receives a one-time credit for using on-site services during their stay.|[OnPropertyCredit Type](#onpropertycredit-type)


## RoomData Type

Defines a type of room.

|Element|Description|Children
|-|-|-
|RoomID|Required.<br />Data type is string.<br /><br />An ID that uniquely identifies the room. If your \<Result> element contains \<RoomBundle>, set the bundles' \<RoomID> element to this ID, as appropriate. You may also use this ID to set the `Result` object's \<RoomID> element, if you don't use room bundles but want to identify a type of room.|None
|Room Size| Optional. Size of the room in square meter or square feet.<br/><br/>Example: ```<RoomSize> <Text text="500 square feet" language="en"/> </RoomSize>``` or ```<RoomSize> <Text text="500 square meter" language="en"/> </RoomSize>``` | [Text Type](#text-type)
|BedArrangement| A container for bed arrangements in this room. You may specify one or more BedArrangement. | [BedArrangement Type](#bedarrangement-type)
|Name|Required.<br /><br />A name that identifies the type of room (for example, non-smoking, single queen room). This should be the same name that you use to identify the room on your website. Specify a `Text` element for each language you support.|[Text Type](#text-type)
|Description|Optional.<br /><br />A description of the room. Specify a `Text` element for each language you support.|[Text Type](#text-type)
|PhotoURL|Optional.<br /><br />A container object that contains the URL of an image of the room type. You may specify one or more photos. |[PhotoURL Type](#photourl-type)
|Capacity|Optional.<br />Data type is integer.<br /><br />The maximum number of guests that the room is capable of accommodating.<br /><br />**NOTES:**<ul><li>The value must be in the range 1 through 20.</li><li>The value must not be less than `Occupancy`, if specified.</li></ul> |None
|Occupancy|Optional.<br />Data type is integer.<br /><br />The maximum number of guests that the room is intended to accommodate. For example, although the room is physically capable of hosting 4 guests, it's intended for only 2 guests.<br /><br />**NOTES:**<ul><li>Although optional, you're strongly encouraged to always specify this element.</li><li>The value must be in the range 1 through 20.</li><li>The value must not be greater than `Capacity`.</li></ul>Typically, if you define room bundles, you set occupancy as part of [PackageData](#packagedata-type).|None
|OccupancySettings|Optional.<br /><br />A container object that contains settings about occupancy. |[OccupancySettings](#occupancysettings-type)
|OccupancyDetails|Optional.<br /><br />A container object that contains details about occupancy. If you include `Occupancy`, you may also specify this element. |[OccupancyDetails](#occupancydetails-type)
|RoomAmenity|Optional. A container object that contains room amenities.| [RoomAmenity](#roomamenity-type)

## allowablePointsOfSale Type

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

## OccupancySettings Type

Defines the settings which can restrict or modify the occupancy requirements of a room.

|Element|Description|Children
|-|-|-
|MinOccupancy|Data type is integer.<br /><br />The minimum number of guests that can stay in a room. For example, if set to 2, this room cannot be booked for a single guest. <br /><br /> The value of `MinOccupancy` must be a positive integer between 1 and 99, inclusive. |None
|MinAge| Data type is integer.<br /><br /> The minimum age for all guests staying in a room. For example, if this is set to 18, this room can only be booked for groups where all guests are of age 18 or above. The value of MinAge must be a positive integer between 0 and 99, inclusive. | None

## BedArrangement Type

Defines a container object that contains details about the bed arrangement of the room.

|Element|Description|Children
|-|-|-
|BedType|Required.<br />Data type is [Text Type](#text-type)<br /><br />The type of bed in this room (for example: Extra-large double bed)|None
|BedCount|Required.<br />Data type is integer.<br /><br />The number of bed(s) for this bed type.|None

## Children Type

Defines a container object that identifies the ages of children the room is intended to accommodate.

|Element|Description|Children
|-|-|-
|Child|Attributes:<ul><li>age&mdash;The maximum age of each child the room is intended to accommodate.</li></ul> |None


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


|Element|Description|Children
|-|-|-
|ProgramName|The benefit's name.|[Text Type](#text-type)
|ProgramLevel|The benefit's level. For example, Platinum or Gold.|[Text Type](#text-type)
|NightlyValue|Optional.<br />Data type is decimal.<br /><br />The benefit's nightly value.<br /><br />**Attributes:**<ul><li>currency &mdash; The currency that the value is specified in. To specify the currency, use the ISO-4217 three-letter currency code. For example, use USD for United States Dollar.</li></ul>|None

## RoomBundle

Defines room and price information for a room bundle.

|Element|Description|Children
|-|-|-
|RoomData|We no longer support inline RoomData definitions in RoomBundle. All RoomData definitions should be added under [PropertyDataSet](#propertydataset-type). |[RoomData Type](#roomdata-type)
|PackageData|We no longer support inline PackageData definitions in RoomBundle. All PackageData definitions should be added under [PropertyDataSet](#propertydataset-type). |[PackageData Type](#packagedata-type)
|RoomId|Required.<br />Data type is string.<br /><br />An ID that uniquely identifies a \<RoomData> element that you defined in the [PropertyDataSet](#propertydataset-type) section of this transaction message or a separate transaction message.<br /><br />If you include an inline room type definition (see the \<RoomData> element above), you may specify the ID here or in \<RoomData>. Using inline room type definitions is not recommended.|None
|PackageId|Required. *Note:* If you want to run only Hotel Price Ads and Property Promotion Ads campaigns, *PackageID* is optional.<br />Data type is string.<br /><br />An ID that uniquely identifies a \<PackageData> element that you defined in the [PropertyDataSet](#propertydataset-type) section of this transaction message or a separate transaction message.<br /><br />If you include an inline package definition (see the \<PackageData> element above), you may specify the ID here or in \<PackageData>. Using inline package definitions is not recommended.|None
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

## RoomAmenity Type

Defines the room amenities type.

| Element                       | Description                                                                                                                                                                          | Children |
| ----------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | -------- |
| RoomTeaCoffeMaker             | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomMinibar                  | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomShowerAvailable          | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomBathAvailable            | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomSafetyDepositBox         | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  Television                   | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomTelephone                | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomFax                      | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  AirConditioning              | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomHairDryer                | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomHotTub                   | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomIron                     | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  KitchenOrKitchenette         | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  Balcony                      | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomBathRobes                | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomRadio                    | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomFridge                   | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  DeskInRoom                   | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  SharedBathRoom               | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomSeatingArea              | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomFreeToiletries           | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomDVDPlayer                | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomCDPlayer                 | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  Toilets                      | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  Microwave                    | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  DishWasher                   | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomWashingMachine           | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  Patio                        | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  ExtraLongBeds                | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  Heating                      | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  DressingRoom                 | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  SharedToilet                 | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomSlippers                 | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  WiFi                         | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomBathOrShower             | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomCarpeted                 | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  Fireplace                    | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomAdditionalToilet         | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  InterConnectedRoomsAvailable | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  SafeForLaptop                | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  FlatTV                       | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomPrivateEntrance          | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomSofa                     | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  SoundproofedRooms            | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  ScenicViews                  | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  WakeupService                | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomAlarmClock               | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomDiningArea               | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomElectricKettle           | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomExecutiveLoungAccess     | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomMosquitoNet              | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomSauna                    | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  SwimmingPool                 | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomWardrobeOrCloset         | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  Oven                         | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomToaster                  | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomBarbecue                 | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomComputer                 | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomGameConsole              | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomElectricBlankets         | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomAdditionalBathRoom       | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomBluRayPlayer             | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomTerace                   | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomDiningTable              | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomChildHighChair           | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomEntirelyGroundFloor      | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  WheelChairAccess             | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomDetached                 | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomSemiDetached             | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomClothesRack              | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomFoldUpBed                | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomChildSafetySocketCovers  | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomBoardGamesOrPuzzles      | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomChildSafetyGates         | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomSofaBed                  | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomLoweredSink              | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  EmergencyCordInBathRoom      | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomShowerChair              | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoofTopPool                  | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  PoolCover                    | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomBottledWater             | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomTrashCans                | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomSocketNearBed            | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomMobileHotSpotDevice      | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomOpenAirBath              | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomAirPurifiers             | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  FreeSpaAccess                | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  FreeFitnessCenterAccess      | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  PrivateBeachAccess           | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  ConciergeDesk                | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  FreeLaundryService           | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
|  RoomHandSanitizer            | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
| SmokingAllowed                | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
| PetAllowed                    | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br><li>1 (true)</li><li>0 (false)</li><li>true</li><li>false</li>| None     |
| AirportTransportation      | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| ArcadeGameRoom             | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| AtmBanking                 | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| CeilingFan                 | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Childcare                  | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Ballrooms                  | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| BanquetFacilities          | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| BarLounge                  | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Dryer                      | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| BusinessCenter             | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| CasinoGambling             | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| CoffeeShopOrCafe           | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| ComplimentaryNewspapers    | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| GarbageDisposable          | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| ConferenceRooms            | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| CurrencyExchange           | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| DryCleaningLaundry         | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| ElevatorLift               | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| EventCatering              | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| ExpressCheckInCheckOut     | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| FireplaceInLobby           | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| FitnessCenter              | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| GiftShopOrNewsstand        | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| GolfCourse                 | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Grocery                    | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| HairSalon                  | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| KitchenRange               | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| KidsActivities             | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Refrigerator               | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| LiveEntertainment          | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| SmokeFreeZone              | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| MeetingRoomsSmallGroups    | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| PetsAllowed                | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| PorterBellhop              | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| RestaurantOnSite           | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| RoomService                | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| SafeDeposit                | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Stove                      | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Security                   | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| ShoeShine                  | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| ShoppingNearby             | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Spa                        | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Washer                     | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| ControlledAccess           | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| PetPark                    | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| TennisCourts               | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| TranslationServices        | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| VideoLibrary               | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| WeddingServices            | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Whirlpool                  | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Beachfront                 | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Bicycles                   | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| BilliardsAndDarts          | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| CarRental                  | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| CoffeeMakerHairDryerIron   | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Dancing                    | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| DisabledAccess             | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| ExecutiveSuite             | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| FamilyFriendly             | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Karaoke                    | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| MinibarFridge              | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| NoAirConditioning          | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| NoElevator                 | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| NoKids                     | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| NoPhone                    | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| NoTelevision               | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| NonSmokingRooms            | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| PhoneVoicemail             | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| PicnicTablesBarbecueGrills | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| PrivatePartyRooms          | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| TriviaGame                 | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| PowerAdapters              | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| ConnectedRoomsSuites       | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| OutdoorRecreation          | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| ThemeRooms                 | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| ExtendedStay               | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| HoneymoonSuite             | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Skiing                     | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| ClubHouse                  | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| ActivityRoom               | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| SprinklerSystem            | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Courtyard                  | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| DiningRoom                 | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Open24Hours                | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| EmergencyRoadService       | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| ServiceRepair              | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| CarWash                    | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| OilChange                  | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| ConvenienceStore           | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| SupermarketWarehouseStore  | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Deli                       | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| LoyaltyProgram             | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| InterstateAccess           | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| CashOrClubDiscount         | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| SafetyEmissionsInspection  | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| SnacksSodaCoffeeCandy      | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| RideSharing                | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| ElectricCharger            | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| ShuttleService             | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| ReEntryService             | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Validation                 | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| UnobstructedParking        | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| RV                         | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Bathhouse                  | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Dumpstation                | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Hotshowers                 | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Gas                        | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Laundry                    | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Noshowers                  | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Propane                    | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Waterspigots               | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Restroom                   | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Water                      | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Firewood                   | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| FoodStorageLocker          | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| PicnicArea                 | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| PicnicShelters             | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| RiverAccess                | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| LanternPosts               | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| IceMachine                 | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| NoWater                    | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| NoToilet                   | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| PrivateRooms               | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| MobilePhonesPermitted      | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| FamilyAccomodation         | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Pharmacy                   | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| PublicTelephone            | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| PlayArea                   | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| SingleSexAccomodationOnly  | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Tailgating                 | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| OfficialVenue              | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| CoveredParking             | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| ListeningDevice            | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Disabled                   | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| StadiumSeating             | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| CreditCardsAccepted        | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| BathTubs                   | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| CarParking                 | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| CycleParking               | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Shop                       | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| StepFreeAccess             | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Camping                    | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Fishing                    | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Boating                    | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Swimming                   | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Hunting                    | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Bicycling                  | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Kayaking                   | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Canoeing                   | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Paddling                   | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Surfing                    | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Snorkeling                 | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| ScubaDiving                | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| IceSkating                 | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Sledding                   | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Snowmobiling               | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| HorseRiding                | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Geocaching                 | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Crabing                    | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Birding                    | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Climbing                   | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Rappelling                 | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| HikingTrails               | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| HorseTrails                | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Beaches                    | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Marinas                    | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Wildlife                   | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| BasketballCourts           | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Vollyball                  | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Playground                 | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| VisitorCenter              | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| ParkStore                  | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Lodging                    | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| ElectricSites              | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Museums                    | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| HistoricalSite             | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| FamilyPrograms             | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Tours                      | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| OverheadClearance          | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Handicap                   | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Garage                     | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Handrails                  | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| DesignatedSmokingArea      | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| AllergyFreeRooms           | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| SacredPlaces               | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| EnglishSpoken              | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| FrontDesk24Hour            | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| StorageForBelongings       | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| PackedFood                 | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Garden                     | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Library                    | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| GayFriendly                | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Squash                     | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| TableTennis                | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| DesignHotel                | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| PetsNotAllowed             | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| ValetParking               | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| BabyChangingFacility       | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| BereavementSupport         | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| BrailleTranslationService  | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| DisabledParking            | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| DisabledWC                 | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| InductionLoop              | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| OnsiteChapel               | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| ParentAndBabyRoom          | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| ParentAndChildParking      | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| MoneyOrder                 | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Notary                     | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| PassportPhoto              | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| PassportAcceptance         | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| FreightService             | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| DangerousGood              | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| CopyAndPrint               | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| OfficeSuppliesAndServices  | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Jacuzzi                    | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| MovieRoom                  | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| IndoorCommonArea           | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| OutdoorCommonArea          | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| HomeworkHelp               | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| StudyRooms                 | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| PublicComputers            | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| Storytimes                 | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| MeetingRooms               | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| PramPark                   | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| PrayerArea                 | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| RnidTypeTalk               | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
| SigningService             | Optional. Data type is boolean.<br><br>A value that determines whether the amenity is available in the room. Valid values are:<br>\- 1 (true)<br>\- 0 (false)<br>\- true<br>\- false | None |
