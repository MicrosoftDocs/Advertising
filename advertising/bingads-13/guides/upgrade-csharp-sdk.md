---
title: "Upgrade to Bing Ads .NET SDK 13.0.20"
ms.service: "bing-ads"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Upgrade the Bing Ads .NET SDK and discover code examples.
---

# Upgrade to Bing Ads .NET SDK 13.0.20

Bing Ads .NET SDK 13.0.20 includes changes to switch from the existing XML-based SOAP API to a new JSON-based REST API for reducing service call latency and network traffic. 

This release covers Campaign Management, Bulk, and Reporting services. Support for other services will be added in future versions.

If you run into any issue due to the new implementation, you can switch back to the old implementation by setting a corresponding environment variable or `AppContext` switch for the affected service.

Using an environment variable:

```csharp
// For CampaignManagement service 
Environment.SetEnvironmentVariable($"BINGADS_ICampaignManagementService.DisableRestApi", "true"); 

// For Bulk service 
Environment.SetEnvironmentVariable($"BINGADS_IBulkService.DisableRestApi", "true"); 

// For Reporting service 
Environment.SetEnvironmentVariable($"BINGADS_IReportingService.DisableRestApi", "true"); 
```

Using AppContext switch:

```csharp
// For CampaignManagement service 
AppContext.SetSwitch("Switch.BingAds.ICampaignManagementService.DisableRestApi", true); 

// For Bulk service 
AppContext.SetSwitch("Switch.BingAds.IBulkService.DisableRestApi", true); 

// For Reporting service 
AppContext.SetSwitch("Switch.BingAds.IReportingService.DisableRestApi", true); 
```

Please note that the new behavior includes a few implementation changes that might affect your application if it depends on any of these details:

- HTTP client implementation

Unlike previous SDK versions that used `System.ServiceModel` API for calling SOAP services, the new SDK version uses `HttpClient` directly to make API calls. By default, `System.Extensions.Http` is used to create an `HttpClient` from `IHttpClientFactory`.  

For more details on customizing the HTTP client behavior, changing how it gets created or setting additional client parameters, please see [Customizing HTTP client](get-started-csharp.md#customizing-http-client).  

For troubleshooting issues and logging request and response messages, please see [Logging service calls](get-started-csharp.md#logging-service-calls).
