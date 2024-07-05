---
title: "Best practices for Hotel Service API"
description: Identifies best practices with using the Hotel Service API.
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
---

# Best practices for Hotel Service API

[!INCLUDE[coming-soon](../hotel-ads/includes/property-center-coming-soon.md)]

This section lists best practices that you should consider when building your application.

## Retrieving hotels

Do not use the following calls to download all of your hotels. Instead, to retrieve all hotels, use the reporting feature (see [Reporting](reporting.md)). These calls are meant only for users paging through hotels in a user interface.

- [SubAccounts('{subAccountId}')/Hotels](reference.md#listallhotels)
- [SubAccounts('{subAccountId}')/HotelGroups('{hotelGroup}')/Hotels](reference.md#listhotels)
- [SubAccounts('{subAccountId}')/Ungrouped](reference.md#ungrouped)
