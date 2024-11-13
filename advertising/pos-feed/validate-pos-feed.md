---
title: "Validating your Landing pages feed (formerly Points of sale (POS) feed)"
description: Shows how to validate your landing pages feed file before sending it to Microsoft Advertising.
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
---

# Validate your Landing pages feed (formerly Points of sale (POS) feed)

Microsoft provides the [PointsOfSale XSD](https://bhacstatic.blob.core.windows.net/schemas/point_of_sale.xsd) that you use to validate your landing pages feed before sending it to Microsoft. This saves time and round trips by catching document syntax errors. You should always validate your feed file before sending it to Microsoft. Because the PointsOfSale XSD references the [PrivateRates XSD](https://bhacstatic.blob.core.windows.net/schemas/private_rates.xsd), you'll need to copy it locally, too.

The following example shows using xmllint to validate the SamplePointsOfSale.xml feed file.

```
xmllint.exe --schema point_of_sale.xsd SamplePointsOfSale.xml
```
