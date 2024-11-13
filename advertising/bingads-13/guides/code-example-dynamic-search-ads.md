---
title: "Dynamic Search Ads Code Example"
ms.service: "bing-ads"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Setup Dynamic Search Ads in C#, Java, PHP, or Python.
dev_langs:
  - csharp
  - java
  - php
  - python
---
# Dynamic Search Ads Code Example
This example uses the Campaign Management API to setup a Dynamic Search Ads (DSA) campaign.

> [!NOTE]
> You can no longer add, update, or retrieve campaigns that only support dynamic search ads. The campaign type of your existing campaigns has been updated from "DynamicSearchAds" to "Search". The ad groups are now considered "dynamic" ad groups, but there are no structural changes i.e., they contain the same auto targets and dynamic search ads as before.  

[!INCLUDE[request-header](./includes/code-tips.md)]

[!code-csharp[Main](../../../BingAds-dotNet-SDK/examples/BingAdsExamples/BingAdsExamplesLibrary/v13/DynamicSearchAds.cs)]

[!code-java[Main](../../../BingAds-Java-SDK/examples/BingAdsDesktopApp/src/main/java/com/microsoft/bingads/examples/v13/DynamicSearchAds.java)]

[!code-php[Main](../../../BingAds-PHP-SDK/samples/V13/DynamicSearchAds.php)]

[!code-python[Main](../../../BingAds-Python-SDK/examples/v13/dynamic_search_ads.py)]

## See Also
[Get Started with the Bing Ads API](get-started.md)  
