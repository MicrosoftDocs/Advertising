---
title: Hint message reference
description: Describes the schema that defines the elements for creating a hint message.
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
---

# Hint Message reference

> [!NOTE]
> This beta release of Hotel Price Ads is available to select participants only. For information about participating in the beta release program, please contact your account manager or [enroll here](https://go.microsoft.com/fwlink/?linkid=2201950).

If you update your hotels' itinerary data using the Pull with Hints method, you use the Hint response message to specify the itinerary data that Bing should ask for in its pull requests. This topic describes the elements of the Hint response message defined by the [Hint XSD](https://bhacstatic.blob.core.windows.net/schemas/hint.xsd). 

For information about creating a Hint response message, see [Creating a Hint Message](../hint-message/create-hint-message.md).


> [!NOTE]
> Bing does not support all Hint XSD elements. This topic includes only those elements and attributes that Bing supports. Bing ignores all other elements and attributes. 


> [!NOTE]
> The elements must be specified in the order defined by the Hint XSD (and as listed in this topic).

----

 
## Hint

Defines the root element of a Hint response message.

|Element|Description|Children
|-|-|-
|Hint|The root element in a Hint response message.|[Hint Type](#hint-type)


## Hint Type

Defines a Hint response message. 

|Element|Description|Children
|-|-|-
|Item|A list of one or more hints. |[Item Type](#item-type)


## Item Type

Defines a hint. 

|Element|Description|Children
|-|-|-
|Property|The hotel ID. This ID must match an ID of a hotel in your Hotel Feeds file. Specify a \<Property\> element for each hotel that the hint applies to. |String
| |The group that defines the options for specifying the exact date or date range that Bing should request data for. The option that you choose determines the elements that you include in the hint. |[itemmodechoicegroup](#itemmodechoicegroup)


## itemmodechoicegroup

Defines the options for specifying the dates that Bing should request data for. 

|Element|Description|Children
|-|-|-
| |The first and last date of a date range. Bing will request itinerary data for stays that fall within the dates, including the specified dates. |[checkindategroup](#checkindategroup)
|StaysIncludingRange|The first and last date of a date range. Bing will request itinerary data for stays that fall within the dates, including the specified dates, and stays that intersect the dates.<br /><br />The difference between this date range option and the check-in date range option is that you must include all stays that intersect the date range. The effect of this is that the data you send will likely include data prior to `FirstDate`. For example, if `FirstDate` is 10/12/2017 and `AffectedNights` is 2, the data that you send should include data for the 10th and the 11th.  |[staysincludingrangetype](#staysincludingrangetype)
|Stay|The check-in date and length of stay. |[staytype](#staytype)


## checkindategroup

Defines the first and last date of a date range. 

|Element|Description|Children
|-|-|-
|FirstDate|The first date of the date range. |Date
|LastDate|The last date of the date range. |Date


## staysincludingrangetype

Defines the first and last date of an affected date range. 

|Element|Description|Children
|-|-|-
|FirstDate|The first date of the date range. |Date
|LastDate|The last date of the date range. |Date


## staytype

Defines a stay. 

|Element|Description|Children
|-|-|-
|CheckInDate|The check-in date. |Date
|LengthOfStay|The length of stay. |Integer


