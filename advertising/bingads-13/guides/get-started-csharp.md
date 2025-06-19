---
title: Get Started Using C# with Bing Ads API
ms.service: bing-ads
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Install the Bing Ads .NET SDK and discover code examples.
---
# Get Started Using C# with Bing Ads API
To get started developing Bing Ads API applications with a .NET language, you can start with the [provided examples](code-examples.md) or follow one of the application walkthroughs for a [Web](walkthrough-web-application-csharp.md) or [Desktop](walkthrough-desktop-application-csharp.md) application. The examples have been developed with the Bing Ads .NET [SDK](client-libraries.md) and [Visual Studio Community](https://www.visualstudio.com/vs/community/). Your custom configuration may vary.

You will need user credentials with access to Microsoft Advertising either in [production](https://ads.microsoft.com/) or [sandbox](https://secure.sandbox.bingads.microsoft.com/Auth?EnvContext=Sandbox). For the production environment you will need a [production developer token](get-started.md#get-developer-token). All sandbox clients can use the universal sandbox developer token i.e., **BBD37VB98**. For more information, please see [Get Started With the Bing Ads API](get-started.md) and [Sandbox](sandbox.md#access).  

To authenticate via OAuth, you must also register an application and get the corresponding client identifier. You also need to take note of the client secret and redirect URI if you are developing a web application. For more details about registering an application in production and the authorization code grant flow, see [Authentication with OAuth](authentication-oauth.md) and [Authentication With the SDKs](sdk-authentication.md#oauth). Although in production you must use your own application ID (a.k.a. client ID), all Microsoft Advertising customers can use the public "Tutorial Sample App" client ID in sandbox i.e., **00001111-aaaa-2222-bbbb-3333cccc4444**. For more information, please see [Sandbox](sandbox.md#access). 

## <a name="installation"></a>Install the SDK
Install the Bing Ads .NET SDK through [NuGet](https://www.nuget.org/packages/Microsoft.BingAds.SDK/), either through the Manage NuGet Packages user interface, or through the [Package Manager Console](#package-manager). For information about installing NuGet, see [https://docs.nuget.org](https://docs.nuget.org/docs/start-here/installing-nuget).

> [!NOTE]
> The Bing Ads .NET SDK supports .NET Standard 2.0. You can choose from a variety of platforms e.g., .NET Core or .NET Framework 4.6.1. The Bing Ads API examples are developed via [Visual Studio Community 2017](https://www.visualstudio.com/vs/community/) and target .NET Framework 4.7.1. The .NET Standard 2.0 and Bing Ads .NET SDK do not support .NET Framework versions lower than 4.6.1. For more information on .NET Standard and how it relates to other .NET frameworks, refer to this article on [.NET Standard](/dotnet/standard/net-standard). 

### <a name="package-manager"></a>NuGet Package Manager Console

1. Click on **Tools** -&gt; **NuGet Package Manager** -&gt; **Package Manager Console**.
2. Choose the default project where you want the SDK installed, and then within the console command line, type `Install-Package Microsoft.BingAds.SDK`. 
3. If you do not already have references to *System.ServiceModel.Primitives 4.4.1*, *System.ServiceModel.Http 4.4.1*, and *System.ServiceModel.ConfigurationManager 4.4.1*, type `Install-Package System.ServiceModel.Primitives -Version 4.4.1`, `Install-Package System.ServiceModel.Http -Version 4.4.1`, and `Install-Package System.Configuration.ConfigurationManager -Version 4.4.1`.

## <a name="walkthrough"></a>Walkthroughs
Once you have the Bing Ads .NET SDK installed, you can either browse the [Bing Ads API Code Examples](code-examples.md) in C# or follow one of the application walkthroughs for a [Web](walkthrough-web-application-csharp.md) or [Desktop](walkthrough-desktop-application-csharp.md) application.

## <a name="customizing-http-client"></a>Customizing HTTP client

You may want to customize the HTTP client used by Bing Ads .NET SDK to change some standard parameters such as HTTP timeout, proxy configuration, or other settings.

To do so, you can create a custom class inherited from `HttpClientProvider` and set `GlobalSettings.HttpClientProvider` to an instance of that class before making service calls. For example:

```csharp
class MyHttpClientProvider : HttpClientProvider 
{ 
    protected override void ConfigureHttpClient(HttpClient httpClient, Type serviceType, ApiEnvironment apiEnvironment) 
    { 
        // override default timeout 
        httpClient.Timeout = TimeSpan.FromMinutes(5); 
    } 
} 

GlobalSettings.HttpClientProvider = new MyHttpClientProvider(); 
```

## <a name="logging-service-calls"></a>Logging service calls

Starting from Bing Ads .NET SDK 13.0.20, to enable logging request and response messages, you can set the `BINGADS_ConsoleLoggerMinLevel` environment variable to `Verbose`:

```csharp
Environment.SetEnvironmentVariable("BINGADS_ConsoleLoggerMinLevel", "Verbose"); 
```

You can also enable the same logging using the `BingAdsEventListener` class:

```csharp
BingAdsEventListener.CreateConsoleLogger(EventLevel.Verbose).KeepActive();
```

You can also create a new `BingAdsEventListener` instance to provide a custom logger implementation. For example:

```csharp
new BingAdsEventListener(EventLevel.Verbose, bingAdsEvent => MyLogger.LogVerbose(bingAdsEvent.GetDescription())).KeepActive();
```

## See Also
[Bing Ads API Client Libraries](client-libraries.md)    
[Bing Ads API Code Examples](code-examples.md)    
[Bing Ads API Web Service Addresses](web-service-addresses.md)  
[Handling Service Errors and Exceptions](handle-service-errors-exceptions.md)  
[Sandbox](sandbox.md)  
