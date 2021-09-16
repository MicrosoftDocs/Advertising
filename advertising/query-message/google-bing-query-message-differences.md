---
title: Differences between Google's and Microsoft Advertising's Query messages
description: Lists the differences between Google's and Microsoft Advertising's Query messages
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: eric-urban
ms.author: eur
---

# Differences between Google's and Microsoft Advertising's Query messages

The following are the differences between Google's Query Message implementation and Microsoft's.

- Microsoft does not support Live Queries. Microsoft will not include the following elements and attributes related to Live Queries.  
  - The `latencySensitive` attribute of the `Query` element. 
  - The `DeadlineMs` element.  
  
- Microsoft will not include the `HotelInfoProperties` element, which is used to request room and room bundle updates.
