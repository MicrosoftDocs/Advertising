---
title: "Price feed Schemas"
description: Lists the schemas that define a price feed.
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
---

# Price feed schemas

The Transaction XSD (transaction.xsd) defines the schema for Bing Hotel's price feed. The schema defines the objects that you use to specify itineraries. For information about the objects and elements that Bing uses, see [Price feed reference](../transaction-message/reference.md).

The following are the XSDs that define the Price feed schema.

- [transaction.xsd](https://bhacstatic.blob.core.windows.net/schemas/transaction.xsd)
- [rate_types.xsd](https://bhacstatic.blob.core.windows.net/schemas/rate_types.xsd)&mdash;The transaction.xsd file includes rate_types.xsd
- [common_types.xsd](https://bhacstatic.blob.core.windows.net/schemas/common_types.xsd)&mdash;The rate_types.xsd file includes common_types.xsd

Use this XSD to validate your price feed document before sending it to Bing. For information, see [Validating your Price feed](../transaction-message/validate-transaction-message.md).

For information about creating a price feed document, see [Creating a Price feed](../transaction-message/create-transaction-message.md).

 
