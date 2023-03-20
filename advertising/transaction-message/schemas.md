---
title: "Transaction Message Schemas"
description: Lists the schemas that define a transaction message.
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
---

# Transaction Message schemas

The Transaction XSD (transaction.xsd) defines the schema for Bing Hotel's transaction message. The schema defines the objects that you use to specify itineraries. For information about the objects and elements that Bing uses, see [Transaction Message Reference](../transaction-message/reference.md).

The following are the XSDs that define the Transaction Message schema.

- [transaction.xsd](https://bhacstatic.blob.core.windows.net/schemas/transaction.xsd)
- [rate_types.xsd](https://bhacstatic.blob.core.windows.net/schemas/rate_types.xsd)&mdash;The transaction.xsd file includes rate_types.xsd
- [common_types.xsd](https://bhacstatic.blob.core.windows.net/schemas/common_types.xsd)&mdash;The rate_types.xsd file includes common_types.xsd

Use this XSD to validate your transaction message document before sending it to Bing. For information, see [Validating your Transaction Message](../transaction-message/validate-transaction-message.md).

For information about creating a transaction message document, see [Creating a Transaction Message](../transaction-message/create-transaction-message.md).

 
