---
title: "Upgrade to Bing Ads Java SDK 13.0.20"
ms.service: "bing-ads"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Upgrade the Bing Ads Java SDK and discover code examples.
---

# Upgrade to Bing Ads Java SDK 13.0.20

Bing Ads Java SDK 13.0.20 includes changes to switch from the existing XML-based SOAP API to a new JSON-based REST API for reducing service call latency and network traffic.

This release covers Campaign Management, Bulk, and Reporting services. Support for other services will be added in future versions.

If you run into any issue due to the new implementation, you can switch back to the old implementation by setting a corresponding system property for the affected service.

```java
// For CampaignManagement service
System.setProperty("com.microsoft.bingads.ICampaignManagementService.DisableRestApi", "true"); 

// For Bulk service
System.setProperty("com.microsoft.bingads.IBulkService.DisableRestApi", "true"); 

// For Reporting service
System.setProperty("com.microsoft.bingads.IReportingService.DisableRestApi", "true");
```

Please note that the new behavior includes a few implementation changes that might affect your application if it depends on any of these details:

- HTTP client implementation

Unlike previous SDK versions that used JAX-WS API for calling SOAP services, the new SDK version uses JAX-RS API. By default, Apache CXF JAX-RS Client is included as a dependency, but you can substitute it with any other JAX-RS implementation. For example, if you are using Java 8, you can exclude Apache CXF and instead include a version of Jersey JAX-RS Client that supports Java 8. Please see [pom_for_java1.8.xml](https://github.com/BingAds/BingAds-Java-SDK/blob/main/examples/BingAdsDesktopApp/pom_for_java1.8.xml) as an example of how to do that.  

For more details on customizing the HTTP client behavior, using a different JAX-RS implementation or setting additional client parameters, please see [Customizing HTTP client](get-started-java.md#customizing-http-client).  

- Service objects

`ServiceClient.getService()` no longer returns a JAX-WS provider-specific object. Instead, it returns an internal Bing Ads Java SDK object that implements the same service interface (for example, `ICampaignManagementService`).  

- Response objects

Async method calls (for example `serviceClient.getService().getCampaignsByIdsAsync(request)`) no longer return JAX-WS provider-specific objects. Instead, the result is an internal Bing Ads Java SDK object that implements the same `javax.xml.ws.Response` interface. The `getContext()` method of the returned object no longer returns JAX-WS provider-specific properties, but returns a single property, `TrackingId`.  

For troubleshooting issues and logging request and response messages, please see [Logging service calls](get-started-java.md#logging-service-calls).
