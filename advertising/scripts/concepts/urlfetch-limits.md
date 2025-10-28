---
title: "UrlFetch limits"
description: "Identifies the limits for fetching resources from the web."
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
ms.service: "bing-ads"
ms.subservice: "scripts"
ms.topic: "article"
---

# UrlFetch limits

If you use [UrlFetchApp](../reference/UrlFetchApp.md) to fetch resources from the web, keep these limits in mind:

- The maximum request size is 10 MB.
- The maximum response size is 10 MB.
- The maximum size of all headers (header names and content) is 8 KB.
- The maximum number of headers you can include in the request or response is 100.
- The maximum number of `fetch()` calls that a user may make per day is 20,000.
- The maximum amount of time the request may take is 30 seconds. 
