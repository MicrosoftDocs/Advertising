---
title: "Validating your Price feed"
description: Shows how to validate a price feed.
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
---

# Validate your Price feed

Bing provides the [Transaction XSD](https://bhacstatic.z22.web.core.windows.net/schemas/transaction.xsd) and [Rate_Types.XSD](https://bhacstatic.z22.web.core.windows.net/schemas/rate_types.xsd) that you use to validate your price feed before sending it to Bing. This saves time and round trips by catching document syntax errors. You should always validate your price feeds before sending them to Bing.

The following example shows using xmllint to validate the message contained in SampleTransaction.xml.

```
xmllint.exe --schema transaction.xsd SampleTransaction.xml
```
