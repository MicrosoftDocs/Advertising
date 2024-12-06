---
title: "Validating your Property feed"
description: Shows how to validate your property feed file before sending it to Bing.
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
---

# Validate your Property feed

Bing provides the [Hotel XSD](https://bhacstatic.blob.core.windows.net/schemas/hotelv2_1.xsd) that you use to validate your hotels feed before sending it to Bing. This saves time and round trips by catching document syntax errors. You should always validate your feed file before sending it to Bing.

The following example shows using xmllint to validate the SampleHotelsFeed.xml feed file.

```
xmllint.exe --schema hotel.xsd SampleHotelsFeed.xml
```
