---
title: Upgrade to the latest Bing Ads .NET SDK
ms.service: bing-ads
ms.subservice: guides-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 3/23/2026
description: Starting from version 13.0.22 Bing Ads .NET SDK has switched from the existing XML-based SOAP API to a new JSON-based REST API for reducing service call latency and network traffic.
---

# Upgrade to the latest Bing Ads .NET SDK

Starting from version 13.0.22 Bing Ads .NET SDK has switched from the existing XML-based SOAP API to a new JSON-based REST API for reducing service call latency and network traffic.

Please note that the new behavior includes a few implementation changes that might affect your application if it depends on any of these details:

- HTTP client implementation

Unlike previous SDK versions that used `System.ServiceModel` API for calling SOAP services, the new SDK version uses `HttpClient` directly to make API calls. By default, `System.Extensions.Http` is used to create an `HttpClient` from `IHttpClientFactory`.  

For more details on customizing the HTTP client behavior, changing how it gets created or setting additional client parameters, please see [Customizing HTTP client](get-started-csharp.md#customizing-http-client).  

For troubleshooting issues and logging request and response messages, please see [Logging service calls](get-started-csharp.md#logging-service-calls).
