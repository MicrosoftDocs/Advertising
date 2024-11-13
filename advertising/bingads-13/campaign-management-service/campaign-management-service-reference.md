---
title: "Campaign Management API"
ms.service: "bing-ads"
ms.topic: "article"
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Reference documentation for the Campaign Management API.
---
# Campaign Management API
The Campaign Management [service](../guides/web-service-addresses.md) defines an Application Programming Interface (API) that you can use to manage your advertising campaigns.

> [!NOTE]
> AutoApplyRecommendations in Campaign Management API is deprecated as of November 30, 2022. We will be removing [*AutoApplyRecommendations*](accountproperty.md#autoapplyrecommendations) from [*AccountPropertyName*](accountpropertyname.md) in [Campaign Management Value Sets](campaign-management-value-sets.md).<br/><br/>
We strongly encourage you to use the new [Auto-apply Management interface](../guides/ad-insights-auto-apply-management.md) in Ad Insight API.

|Interface|Description|
|---------|---------|
|[Guides](../guides/campaign-management-guides.md)|Lists guides for the Campaign Management API.|
|[Campaign Management Service Operations](campaign-management-service-operations.md)|Service operations such as [AddCampaigns](addcampaigns.md), [AddAds](addads.md) and [AddAdExtensions](addadextensions.md) can be used to add, get, update, and delete campaign data.|
|[Campaign Management Data Objects](campaign-management-data-objects.md)|You'll find most of the same entity settings that you are used to managing in the Microsoft Advertising web application, for example [Campaign](campaign.md), [ExpandedTextAd](expandedtextad.md), and [LocationAdExtension](locationadextension.md).|
|[Campaign Management Value Sets](campaign-management-value-sets.md)|Value sets include [CampaignType](campaigntype.md), [AdType](adtype.md), and [AdExtensionsTypeFilter](adextensionstypefilter.md). You'll also find value sets for supported budget type, editorial status, and more.|

## See Also

[Bing Ads API Concepts](../guides/concepts.md)  
[Bing Ads API Web Service Addresses](../guides/web-service-addresses.md)  
[Get Started With the Bing Ads API](../guides/get-started.md)
