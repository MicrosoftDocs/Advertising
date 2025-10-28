---
title: Query message reference
description: Describes the schema elements of a Query message.
ms.service: "bing-ads"
ms.subservice: "hotel-service"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
---

# Query message reference

If you update your hotels' itinerary data using the Pull or Pull with Hints method, you use the Query message to specify the amount of data that Bing should ask for in its pull requests. This topic describes the elements of the Query message defined by the [Query XSD](https://bhacstatic.z22.web.core.windows.net/schemas/query.xsd). 

For information about processing Query messages, see [Processing a Query Message](../query-message/process-query-message.md).


> [!NOTE]
> Bing does not support all Query XSD elements. This topic includes only those elements and attributes that Bing supports.  


----


## Query

Defines the root element of a Query message.

|Element|Description|Children
|-|-|-
|Query|The root element in a Query message.|[Query Type](#query-type)


## Query Type

Defines a Query message. 

|Element|Description|Children
|-|-|-  
| |The group defines the list of properties that Bing wants data for, and the options for the way Bing specifies the dates in the request. |[combinedQueryGroup](#combinedquerygroup)

<!--  
|HotelInfoProperties|A list of one or more hotel IDs that you must return room and room bundle metadata for. |[propertyListType](#propertylisttype)  
 -->  


## combinedQueryGroup

Defines the list of properties that Bing wants data for, and the options for the way it specifies the dates in the request. 

|Element|Description|Children
|-|-|-
||Bing uses this option if you signed up for pull requests, or you signed up for pull with hints requests and your [Hint](../hint-message/reference.md) message specifies exact itineraries (includes the \<Stay\> element).|[pointQueryGroup](#pointquerygroup)
||Bing uses this option if you signed up for pull with hints requests and your hint specifies a check-in date range.|[rangeQueryGroup](#rangequerygroup)
|PropertyList|A list of one or more hotel IDs that you must return itinerary data for. |[propertyListType](#propertylisttype)


## pointQueryGroup

Defines a check-in date query. 

|Element|Description|Children
|-|-|-
|Checkin|The itinerary's check-in date in the form, YYYY-mm-dd. |Date
|Nights|The number of nights stay. |PositiveInteger


## rangeQueryGroup

Defines a date range query. 

|Element|Description|Children
|-|-|-
|FirstDate|The first check-in date of the date range. The date is in the form, YYYY-mm-dd. |Date
|LastDate|The last check-in date of the date range. The date is in the form, YYYY-mm-dd. |Date
|Nights|The number of nights stay. The Query message contains this element if your [Hint](../hint-message/reference.md) message does not include the \<StaysIncludingRange\> element.<br /><br />Return data only for itineraries that fall within the check-in date range, including of the first and last dates.  |PositiveInteger
|AffectedNights|The affected number of nights stay. The Query message contains this element if your [Hint](../hint-message/reference.md) message includes the \<StaysIncludingRange\> element.<br /><br />Return data for all itineraries whose check-out date intersects the date range.  |PositiveInteger


## PropertyListType

Defines a list of hotels. 

|Element|Description|Children
|-|-|-
|Property|A hotel's ID. |String
