---
title: What are product categories?
ms.service: msa-help
ms.subservice: msa-general
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 6/18/2026
description: Products offers are categorized using a number of attributes in your catalog feed files. These categories are used to ensure your ads appear with high relevance.
---

# What are product categories?

Products offers are categorized using a number of attributes in your catalog feed files. These categories are used to ensure your ads appear with high relevance. To ensure your products are accurately categorized, use the following optional offer attributes:

## Bing categories

Here are some rules for using the BingCategory attribute.

- This attribute accepts only one value, which must come from the predefined Bing product taxonomy.
- It is recommended that you use the most relevant category for your product.
- You must use the value exactly as specified in the taxonomy list.
- You must use the category’s full path. <br> “Baby and Nursery > Baby Activities > Swings” is valid <br> “Swings” or “Baby and Nursery” alone is invalid
- IDs, instead of string values, are supported.

### Full list of taxonomy values

- [All languages](https://advertiseonbingstatic-gadkdmcyhjcqgbbg.b02.azurefd.net/blob/bingads/media/library/docs/o/taxonomyfiles.zip)
- [Example feed file](https://advertiseonbing.z22.web.core.windows.net/blob/bingads/media/library/docs/bingmerchantcenter_example_feed.txt)

## Product Type

The Product_type attribute can use either a value from the Bing product taxonomy or from your custom product taxonomy. What’s important is that it accurately classifies your product.
