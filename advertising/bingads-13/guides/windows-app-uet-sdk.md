---
title: "Windows App UET SDK"
ms.service: "bing-ads"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
description: For the Microsoft Store app, we provide an SDK to fire UET events. However, this works slightly differently than web based UET.
---

# Windows App UET SDK

Users are spending an increasing amount of time on the Microsoft Store app now more than ever. Some of their activities on the store app include browsing, searching for products, research on product details, and even completing purchases. Customers who spend a lot of time on the store app are often the most valuable audience to the advertiser.  

Much like user activity signals from UET JavaScript tags on the web, user signals from the store app are critical to help Microsoft Advertising identify users across channels, to understand their behavior to optimize remarketing, campaign creatives and improve ad selection accuracy, relevance, and performance. Reporting on in-app signals and conversions in turn helps advertisers optimize ad targeting, accurately measure ad campaign outcomes, and see better yield for ad spend. 

## <a name="get-started"></a>Get Started - Windows App UET SDK

For the Microsoft Store app, we provide an SDK to fire UET events. However, this works slightly differently than web based UET. This guide shows you how to add app events to your new or existing app by integrating Windows App UET SDK to log user interaction events. For more information on web based Universal Event Tracking (UET) which is also a Microsoft framework, please refer to [Microsoft Ads web UET help documentation](https://help.ads.microsoft.com/#apex/ads/en/56681/2-500).

Before you can use Windows App UET SDK, you need to make sure you have the following prerequisites ready:  

- Publish your app or game on the Microsoft Store. If you haven’t published your app or game yet, start here.  
- Set up your Microsoft Advertising account. Learn more about signing up.  
- Associate a UET tag ID with your app. 
- Contact your account manager or Support.  

## <a name="installation"></a>Installation

To install Windows App UET SDK, [download the NuGet package](https://www.nuget.org/packages/Microsoft.BingAds.UETSdk).

### <a name="requirements"></a>Requirements

You’ll need to have a UET tagID associated with your app. To create a new UET tag, see the [Universal Event Tracking help documentation](./universal-event-tracking.md#uet). *Note:* Currently, Windows App UET SDK only supports tracking events in Universal Windows Platform apps installed from the Microsoft Store through an ad.

## <a name="tracking-app-initialization"></a>Tracking App Initialization

To create an instance of Windows App UET SDK, you’ll need to call the constructor *uetSdk = new UETSdk(number tagId);* where tagID is your UET tagID. *Note:* Once an instance of UET is created, the SDK will track launches of your app automatically. 

### <a name="custom-goals"></a>Custom Goals via the trackGoal API

The Windows App UET SDK provides the trackGoal API for tracking custom events and goals. You can pair this custom event tracking with conversion goals to measure the ROI (return on investment) of your advertising campaign. [Learn more about conversion goals and custom events](./universal-event-tracking.md#conversiongoals).

#### Optional Parameter

These parameters help to capture richer user interaction data. These events are used in creating remarketing and dynamic remarketing lists and defining conversion goals. Here are some of the pages where these events could be applicable:  

- Homepage
- Category browse page
- Search results page
- Product display page
- Cart page
- Purchase confirmation page and others

Call the following to set custom goals: *uetSdk.TrackGoal (string action, string label, string category, float revenue, string currencyCode)*

Use these parameters when constructing UET requests:

| Parameter | Description |
| --- | ----------- |
| action | The name of the action taken on a webpage. E.g., “click”, “purchase”.|
| label  | A custom tag for an event or multiple events.|
| category  | A custom tag for the category of an event or multiple events.|
| revenue  | The income from a specific user action, such as “purchase”.|
| currencyCode  | A three-letter alphabetic code that represents the various currencies used throughout the world. E.g., “USD”.|

*Note:* You can send *null* for these parameters if they are not available. 

## <a name="code-examples"></a>Code Examples

> [!NOTE]
> We currently support C# and C++.

Here is an example of Windows App UET SDK usage in C# for a Universal Windows Platform app: 

 
**Initialize Windows App UET SDK at application level on app launch by providing UET tagId.**

```C#
public sealed partial class App: Application 
    { 
        internal static UETSdk uetSdk; 

        public App() 
        { 
            this.InitializeComponent(); 
            this.Suspending =+ OnSuspending; 
        } 

        protected override void OnLaunched(LaunchActivatedEventArgs e) 
        { 
            uetSdk = new UETSdk(123456); // your UET tagId 
        } 
    } 
```

**In order to track goals make use of TrackGoal API of created SDK object.**

```C#
public sealed partial class MainPage : Page 
    { 
        private void Button_Click(object sender, RoutedEventArgs e) 
        { 
           App.uetSdk.TrackGoal("click", "Buy Coins", "Other", 5, "USD"); 
        } 
    } 
```

### <a name="cpluspluswinrt"></a>Consuming UET SDK from C++/WinRT app

Follow these steps to reference C# UWP UET SDK from your C++/WinRT Application.

- Add a reference to the Nuget package of Microsoft.BingAds.UETSdk.

- In Visual Studio, open the shortcut menu for the {YourCppProject}project and choose **Unload Project** to open {YourCppProject}.vcxproj in the text editor.

- Copy and paste the following XML to the first *PropertyGroup* in {YourCppProject}.vcxproj:

```XML
<!-- Start Custom .NET Native properties -->
   <DotNetNativeVersion>2.2.9-rel-29512-01</DotNetNativeVersion>
   <DotNetNativeSharedLibrary>2.2.8-rel-29512-01</DotNetNativeSharedLibrary>
   <UWPCoreRuntimeSdkVersion>2.2.11</UWPCoreRuntimeSdkVersion>
   <!--<NugetPath>$(USERPROFILE)\.nuget\packages</NugetPath>-->
   <NugetPath>$(ProgramFiles)\Microsoft SDKs\UWPNuGetPackages</NugetPath>
<!-- End Custom .NET Native properties -->
```

The values for *DotNetNativeVersion*, *DotNetNativeSharedLibrary*, and *UWPCoreRuntimeSdkVersion* may vary depending on the version of Visual Studio. To set them to the correct values, open the %ProgramFiles(x86)%\Microsoft SDKs\UWPNuGetPackages and look at the sub-directory for each value in the table below. The %ProgramFiles(x86)%\Microsoft SDKs\UWPNuGetPackages\Microsoft.Net.Native.Compiler directory will have a sub-directory that contains an installed version of .NET native that starts with 2.2. In the example below, it is 2.2.9-rel-29512-01.

| MSBuild Variable | Directory |
| --- | ----------- |
| DotNetNativeVersion | %ProgramFiles(x86)%\Microsoft SDKs\UWPNuGetPackages\Microsoft.Net.Native.Compiler|
| DotNetNativeSharedLibrary  | %ProgramFiles(x86)%\Microsoft SDKs\UWPNuGetPackages\runtime.win10-x64.microsoft.net.native.sharedlibrary|
| UWPCoreRuntimeSdkVersion  | %ProgramFiles(x86)%\Microsoft SDKs\UWPNuGetPackages\Microsoft.Net.UWPCoreRuntimeSdk|

There are multiple supported architectures for Microsoft.Net.Native.SharedLibrary. Replace x64 with the appropriate architecture. For example, the arm64 architecture would be in the %ProgramFiles(x86)%\Microsoft SDKs\UWPNuGetPackages\runtime.win10-arm64.microsoft.net.native.sharedlibrary directory.

- Next, immediately after the first *PropertyGroup*, add the following (unaltered):

```xml
<!-- Start Custom .NET Native targets -->
  <!-- Import all of the .NET Native / CoreCLR props at the beginning of the project -->
  <Import Condition="'$(WindowsTargetPlatformMinVersion)' &gt;= '10.0.16299.0'" Project="$(NugetPath)\Microsoft.Net.UWPCoreRuntimeSdk\$(UWPCoreRuntimeSdkVersion)\build\Microsoft.Net.UWPCoreRuntimeSdk.props" />
  <Import Condition="'$(WindowsTargetPlatformMinVersion)' &gt;= '10.0.16299.0'" Project="$(NugetPath)\runtime.win10-x86.Microsoft.Net.UWPCoreRuntimeSdk\$(UWPCoreRuntimeSdkVersion)\build\runtime.win10-x86.Microsoft.Net.UWPCoreRuntimeSdk.props" />
  <Import Condition="'$(WindowsTargetPlatformMinVersion)' &gt;= '10.0.16299.0'" Project="$(NugetPath)\runtime.win10-x64.Microsoft.Net.UWPCoreRuntimeSdk\$(UWPCoreRuntimeSdkVersion)\build\runtime.win10-x64.Microsoft.Net.UWPCoreRuntimeSdk.props" />
  <Import Condition="'$(WindowsTargetPlatformMinVersion)' &gt;= '10.0.16299.0'" Project="$(NugetPath)\runtime.win10-arm.Microsoft.Net.UWPCoreRuntimeSdk\$(UWPCoreRuntimeSdkVersion)\build\runtime.win10-arm.Microsoft.Net.UWPCoreRuntimeSdk.props" />
  <Import Condition="'$(WindowsTargetPlatformMinVersion)' &gt;= '10.0.16299.0'" Project="$(NugetPath)\Microsoft.Net.Native.Compiler\$(DotNetNativeVersion)\build\Microsoft.Net.Native.Compiler.props" />
  <Import Condition="'$(WindowsTargetPlatformMinVersion)' &gt;= '10.0.16299.0'" Project="$(NugetPath)\runtime.win10-x86.Microsoft.Net.Native.Compiler\$(DotNetNativeVersion)\build\runtime.win10-x86.Microsoft.Net.Native.Compiler.props" />
  <Import Condition="'$(WindowsTargetPlatformMinVersion)' &gt;= '10.0.16299.0'" Project="$(NugetPath)\runtime.win10-x64.Microsoft.Net.Native.Compiler\$(DotNetNativeVersion)\build\runtime.win10-x64.Microsoft.Net.Native.Compiler.props" />
  <Import Condition="'$(WindowsTargetPlatformMinVersion)' &gt;= '10.0.16299.0'" Project="$(NugetPath)\runtime.win10-arm.Microsoft.Net.Native.Compiler\$(DotNetNativeVersion)\build\runtime.win10-arm.Microsoft.Net.Native.Compiler.props" />
  <Import Condition="'$(WindowsTargetPlatformMinVersion)' &gt;= '10.0.16299.0'" Project="$(NugetPath)\runtime.win10-arm64.Microsoft.Net.Native.Compiler\$(DotNetNativeVersion)\build\runtime.win10-arm64.Microsoft.Net.Native.Compiler.props" />
  <Import Condition="'$(WindowsTargetPlatformMinVersion)' &gt;= '10.0.16299.0'" Project="$(NugetPath)\runtime.win10-x86.Microsoft.Net.Native.SharedLibrary\$(DotNetNativeSharedLibrary)\build\runtime.win10-x86.Microsoft.Net.Native.SharedLibrary.props" />
  <Import Condition="'$(WindowsTargetPlatformMinVersion)' &gt;= '10.0.16299.0'" Project="$(NugetPath)\runtime.win10-x64.Microsoft.Net.Native.SharedLibrary\$(DotNetNativeSharedLibrary)\build\runtime.win10-x64.Microsoft.Net.Native.SharedLibrary.props" />
  <Import Condition="'$(WindowsTargetPlatformMinVersion)' &gt;= '10.0.16299.0'" Project="$(NugetPath)\runtime.win10-arm.Microsoft.Net.Native.SharedLibrary\$(DotNetNativeSharedLibrary)\build\runtime.win10-arm.Microsoft.Net.Native.SharedLibrary.props" />
  <Import Condition="'$(WindowsTargetPlatformMinVersion)' &gt;= '10.0.16299.0'" Project="$(NugetPath)\runtime.win10-arm64.Microsoft.Net.Native.SharedLibrary\$(DotNetNativeSharedLibrary)\build\runtime.win10-arm64.Microsoft.Net.Native.SharedLibrary.props" />
<!-- End Custom .NET Native targets -->
```

- At the end of the project file, just before the closing *Project* tag, add the following (unaltered):

```xml
<!-- Import all of the .NET Native / CoreCLR targets at the end of the project -->
  <Import Condition="'$(WindowsTargetPlatformMinVersion)' &gt;= '10.0.16299.0'" Project="$(NugetPath)\runtime.win10-x86.Microsoft.Net.UWPCoreRuntimeSdk\$(UWPCoreRuntimeSdkVersion)\build\runtime.win10-x86.Microsoft.Net.UWPCoreRuntimeSdk.targets" />
  <Import Condition="'$(WindowsTargetPlatformMinVersion)' &gt;= '10.0.16299.0'" Project="$(NugetPath)\runtime.win10-x64.Microsoft.Net.UWPCoreRuntimeSdk\$(UWPCoreRuntimeSdkVersion)\build\runtime.win10-x64.Microsoft.Net.UWPCoreRuntimeSdk.targets" />
  <Import Condition="'$(WindowsTargetPlatformMinVersion)' &gt;= '10.0.16299.0'" Project="$(NugetPath)\runtime.win10-arm.Microsoft.Net.UWPCoreRuntimeSdk\$(UWPCoreRuntimeSdkVersion)\build\runtime.win10-arm.Microsoft.Net.UWPCoreRuntimeSdk.targets" />
  <Import Condition="'$(WindowsTargetPlatformMinVersion)' &gt;= '10.0.16299.0'" Project="$(NugetPath)\Microsoft.Net.Native.Compiler\$(DotNetNativeVersion)\build\Microsoft.Net.Native.Compiler.targets" />
  <Import Condition="'$(WindowsTargetPlatformMinVersion)' &gt;= '10.0.16299.0'" Project="$(NugetPath)\runtime.win10-x86.Microsoft.Net.Native.Compiler\$(DotNetNativeVersion)\build\runtime.win10-x86.Microsoft.Net.Native.Compiler.targets" />
  <Import Condition="'$(WindowsTargetPlatformMinVersion)' &gt;= '10.0.16299.0'" Project="$(NugetPath)\runtime.win10-x64.Microsoft.Net.Native.Compiler\$(DotNetNativeVersion)\build\runtime.win10-x64.Microsoft.Net.Native.Compiler.targets" />
  <Import Condition="'$(WindowsTargetPlatformMinVersion)' &gt;= '10.0.16299.0'" Project="$(NugetPath)\runtime.win10-arm.Microsoft.Net.Native.Compiler\$(DotNetNativeVersion)\build\runtime.win10-arm.Microsoft.Net.Native.Compiler.targets" />
  <Import Condition="'$(WindowsTargetPlatformMinVersion)' &gt;= '10.0.16299.0'" Project="$(NugetPath)\runtime.win10-arm64.Microsoft.Net.Native.Compiler\$(DotNetNativeVersion)\build\runtime.win10-arm64.Microsoft.Net.Native.Compiler.targets" />
  <Import Condition="'$(WindowsTargetPlatformMinVersion)' &gt;= '10.0.16299.0'" Project="$(NugetPath)\runtime.win10-x86.Microsoft.Net.Native.SharedLibrary\$(DotNetNativeSharedLibrary)\build\runtime.win10-x86.Microsoft.Net.Native.SharedLibrary.targets" />
  <Import Condition="'$(WindowsTargetPlatformMinVersion)' &gt;= '10.0.16299.0'" Project="$(NugetPath)\runtime.win10-x64.Microsoft.Net.Native.SharedLibrary\$(DotNetNativeSharedLibrary)\build\runtime.win10-x64.Microsoft.Net.Native.SharedLibrary.targets" />
  <Import Condition="'$(WindowsTargetPlatformMinVersion)' &gt;= '10.0.16299.0'" Project="$(NugetPath)\runtime.win10-arm.Microsoft.Net.Native.SharedLibrary\$(DotNetNativeSharedLibrary)\build\runtime.win10-arm.Microsoft.Net.Native.SharedLibrary.targets" />
  <Import Condition="'$(WindowsTargetPlatformMinVersion)' &gt;= '10.0.16299.0'" Project="$(NugetPath)\runtime.win10-arm64.Microsoft.Net.Native.SharedLibrary\$(DotNetNativeSharedLibrary)\build\runtime.win10-arm64.Microsoft.Net.Native.SharedLibrary.targets" />
<!-- End Custom .NET Native targets -->
```

- Reload the project file in Visual Studio. To do this, in the Visual Studio Solution Explorer, open the shortcut menu for the {YourCppProject} project and choose **Reload Project**.

## <a name="uet-setup"></a>UET Tag Step-by-step Setup Guide

You will need a UET tag ID to use the SDK. The following steps show how to create a UET tag and get its ID in the Microsoft Advertising UI.

1. Create your UET tag.
![Windows App UET SDK Step 1](media/uet-sdk-step-1.png "Step 1")  

2. Add the UET tag to your website.
![Windows App UET SDK Step 2a](media/uet-sdk-step-2-a.png "Step 2a")  
You can see the UET tag in the table.
![Windows App UET SDK Step 2b](media/uet-sdk-step-2-b.png "Step 2b")

3. Set up your custom goals.
    1. Choose what kind of conversions you want to track.
    ![Windows App UET SDK Step 3a](media/uet-sdk-step-3-a.png "Step 3a")
    2. Choose a goal category.
    ![Windows App UET SDK Step 3b](media/uet-sdk-step-3-b.png "Step 3b")
    3. Choose a goal type.
    ![Windows App UET SDK Step 3c](media/uet-sdk-step-3-c.png "Step 3c")
    4. Create an event goal.
    ![Windows App UET SDK Step 3d](media/uet-sdk-step-3-d.png "Step 3d")

4. Set up tagging.
![Windows App UET SDK Step 4](media/uet-sdk-step-4.png "Step 4")

5. Install your event tag on your website.
    1. Select "Manual installation."
    ![Windows App UET SDK 5a](media/uet-sdk-step-5-a.png "Step 5a")
    2. Copy that tag for installation.
    ![Windows App UET SDK 5b](media/uet-sdk-step-5-b.png "Step 5b")

## <a name="logging"></a>Logging

We encourage a period of testing to make sure we are accurately sending data. Our team will help with this process. Typically, we look for validation and alignment on the format of data we’re receiving. We may need help with examining your integration to ensure we’re receiving and reporting data as accurately as possible.  

## <a name="uet-dashboard"></a>UET Dashboard

The UET dashboard feature gives a live view of key metadata for any given tag. Customers can send this metadata to our data collection endpoint for simple taoubleshooting. Users will be able to get aggregate insights and detailed data on all events and specific parameters that were sent in the last 30 days.  

Metadata includes the following:  

- Tag ID and Name
- Tag Status: active/inactive/receiving traffic
- Counts on goals and audiences tied to the tag

Payload will include:  

- Custom events with event type  
- Total event count that we receive per day
- Parameters received.

Customers will have the option of exporting this data to an excel file.  

![Universal Event Tracking](media/uet-dashboard.png "UET Dashboard")

## <a name="compliance"></a>Compliance

When you use Windows App UET SDK for the Microsoft Store app, our business terms require that you have an appropriate legal basis to collect and process users' information. Under GDPR and other EU (European Union) and CCPA data protection regulations, you are required to obtain end user consent before sending data via our SDK. Thus, you need to ensure that your SDK implementation meets these consent requirements.

## See Also
 
[FAQ: Universal Event Tracking](https://help.ads.microsoft.com/#apex/3/en/53056/2)
