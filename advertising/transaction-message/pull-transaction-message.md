---
title: "Having Microsoft Advertising pull Price feeds (formerly Transaction messages)"
description: Provides the details for having Microsoft Advertising pull price feeds.
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
---

# Having Microsoft Advertising pull Price feeds (formerly Transaction messages)

Microsoft offers two pull modes:

1. [Pull](#pull-mode) 
2. [Pull with hints](#pull-with-hints-mode)

For both modes, specify:

- The endpoint that Microsoft sends requests to
- The frequency that Microsoft sends requests
- Default values for maximum advanced booking and night stays.

Once a day Microsoft sends a request to the endpoint you specified asking for updates to your maximum advanced booking and night stays default values. 


> [!NOTE]
> Before sending messages to Microsoft:
>
>- Validate the message to ensure that it's compliant with the message's XSD. This will save you round trips and time having to fix errors.
>  
>- Ensure that the message contains less than 100 MB of uncompressed data or 10 MB of compressed data (using GZip compression). To reduce network traffic, you should always send compressed data.


## Pull mode

With **pull mode**, Microsoft sends you a [Query](../query-message/query-message.md) message that identifies the itineraries you send back in the response using a [Price feed (formerly Transaction message)](../transaction-message/create-transaction-message.md). The request identifies all itineraries. Microsoft may send multiple requests depending on the values that you specified for maximum advanced booking and nights stay, and the number of properties in your property feed. For information about processing the query message, see [Processing a Query Message](../query-message/process-query-message.md).


## Pull with hints mode

With **pull with hints**, Microsoft first sends you a hint request, which contains a time stamp of the last time you sent Microsoft updates. You respond to the hint request with a [Hint](../hint-message/hint-message.md) message that identifies the itineraries that have changed since the last successful update. You can identify individual itineraries or a range of itineraries using a range of check-in dates. For more information, see [Creating a Hint Message](../hint-message/create-hint-message.md).

Microsoft uses the hints to generate and send one or more [Query](../query-message/query-message.md) messages that specify only the itineraries that you said changed. Your response should be a [Price feed (formerly Transaction message)](../transaction-message/create-transaction-message.md) that contains the requested data. For information about processing the query message, see [Processing a Query Message](../query-message/process-query-message.md).

