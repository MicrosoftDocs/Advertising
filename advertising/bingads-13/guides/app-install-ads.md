---
title: "App Install Ads"
ms.service: "bing-ads"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Setup App Install ads with the Bing Ads API.
---
# App Install Ads
App Install Ads are similar to expanded text ads but provide direct links to your apps with a button, sending customers directly to the applicable store to download the application. This is an ideal solution for advertisers wanting to manage and drive downloads of their apps, rather than website traffic.

App Install Ads automatically detect the customer's mobile device and operating system, sending them to the corresponding Apple App Store or Google Play. You can also track conversions with the same conversion tracking partners as [App Extensions](ad-extensions.md): AppsFlyer, Kochava, Tune, Singular, Adjust, and Branch. To learn more, see the Microsoft Advertising help article [What is an App Install Ad?](https://help.ads.microsoft.com/#apex/3/en/56836/0)

> [!NOTE]
> App Install Ads are available in Australia, Brazil, Canada, France, Germany, India, the United Kingdom, and the United States on iOS and Android only. Only apps available in the United States in the Apple App Store and Google Play Store are currently supported. There is no support for Windows.
>
> Not everyone has this feature yet. If you don't, don't worry. It's coming soon.  

> [!NOTE]
> App install ads can only be created in Search campaigns where the [AdGroupType](../campaign-management-service/adgroup.md#adgrouptype) is set to "SearchStandard". If the [AdGroupType](../campaign-management-service/adgroup.md#adgrouptype) is set to "SearchDynamic", then the ad group does not support app install ads.  

## <a name="bulk"></a>Bulk API for App Install Ads
The [App Install Ad](../bulk-service/app-install-ad.md) Bulk record is available for managing app install ads.

## <a name="campaign"></a>Campaign Management API for App Install Ads
The [AppInstallAd](../campaign-management-service/appinstallad.md) object is derived from the [Ad](../campaign-management-service/ad.md) base class and can be managed with any of the ad operations e.g. [AddAds](../campaign-management-service/addads.md), [DeleteAds](../campaign-management-service/deleteads.md), [GetAdsByAdGroupId](../campaign-management-service/getadsbyadgroupid.md), and [UpdateAds](../campaign-management-service/updateads.md). 
