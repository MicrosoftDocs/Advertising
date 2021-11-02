---
title: "Differences Between Google&#39;s and Bing&#39;s Transaction Message Usage"
description: Lists the difference in usage between Bing's and Google's transaction message.
ms.service: "bing-ads-hotel-service"
ms.topic: "article"
author: rgaritta
ms.author: v-rgaritta
---

# Differences between Google's and Bing's Transaction Message

The following are the differences between Google's Transaction Message implementation and Bing's.

- Bing does not support (and will ignore) the following [Transaction](reference.md#transaction-type) elements:  
  
  - `PartnerData`
  
- Bing does not support (and will ignore) the following [Transaction](reference.md#transaction) attributes:  
  
  - `partner`
  
- Bing does not support (and will ignore) the following [Result](reference.md#result-type) elements:
  
  - `Rates`
  
- Bing does not support (and will ignore) the `all_inclusive` attribute of the `Baserate` element (see [Result](reference.md#result-type)).
