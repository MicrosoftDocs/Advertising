---
title: Upgrade to latest Bing Ads Java SDK
ms.service: bing-ads
ms.subservice: guides-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 3/23/2026
description: Starting from version 13.0.22 Bing Ads Java SDK has switched from the existing XML-based SOAP API to a new JSON-based REST API for reducing service call latency and network traffic.
---

# Upgrade to latest Bing Ads Java SDK

Starting from version 13.0.22 Bing Ads Java SDK has switched from the existing XML-based SOAP API to a new JSON-based REST API for reducing service call latency and network traffic.

Please note that the new behavior includes a few implementation changes that might affect your application if it depends on any of these details:

- HTTP client implementation

Unlike previous SDK versions that used JAX-WS API for calling SOAP services, the new SDK version uses JAX-RS API. By default, Apache CXF JAX-RS Client is included as a dependency, but you can substitute it with any other JAX-RS implementation. For example, if you are using Java 8, you can exclude Apache CXF and instead include a version of Jersey JAX-RS Client that supports Java 8. Please see [pom_for_java1.8.xml](https://github.com/BingAds/BingAds-Java-SDK/blob/main/examples/BingAdsDesktopApp/pom_for_java1.8.xml) as an example of how to do that.  

For more details on customizing the HTTP client behavior, using a different JAX-RS implementation or setting additional client parameters, please see [Customizing HTTP client](get-started-java.md#customizing-http-client).  

- Service objects

`ServiceClient.getService()` no longer returns a JAX-WS provider-specific object. Instead, it returns an internal Bing Ads Java SDK object that implements the same service interface (for example, `ICampaignManagementService`).  

- Response objects

Async method calls (for example `serviceClient.getService().getCampaignsByIdsAsync(request)`) no longer return JAX-WS provider-specific objects. Instead, the result is an internal Bing Ads Java SDK object that implements the same `javax.xml.ws.Response` interface. The `getContext()` method of the returned object no longer returns JAX-WS provider-specific properties, but returns a single property, `TrackingId`.  

For troubleshooting issues and logging request and response messages, please see [Logging service calls](get-started-java.md#logging-service-calls).
