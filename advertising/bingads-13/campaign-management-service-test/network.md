---
title: Network Value Set Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the possible search networks on which an ad can display.(test)
---
# Network Value Set Test - Campaign Management
Defines the possible search networks on which an ad can display.

> [!NOTE]
> As of July 2024, you can no longer set the search network where you want your ads to display to *SyndicatedSearchOnly*. If you attempt to set it to *SyndicatedSearchOnly*, the *CampaignServiceInvalidNetwork* error will be returned.

For more information about networks and ad distribution, see the [Ad distribution settings](https://help.ads.microsoft.com/#apex/ads/en/60146/0) help article.

> [!NOTE]
> The syntax section below mentions *SyndicatedSearchOnly* in the schema of the Network type even though this setting is deprecated.

## Syntax
```xml
<xs:simpleType name="Network" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="OwnedAndOperatedAndSyndicatedSearch" />
    <xs:enumeration value="OwnedAndOperatedOnly" />
    <xs:enumeration value="SyndicatedSearchOnly" />
    <xs:enumeration value="InHousePromotion" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [Network](network.md) value set has the following values: [InHousePromotion](#inhousepromotion), [OwnedAndOperatedAndSyndicatedSearch](#ownedandoperatedandsyndicatedsearch), [OwnedAndOperatedOnly](#ownedandoperatedonly), [SyndicatedSearchOnly](#syndicatedsearchonly).

|Value|Description|
|-----------|---------------|
|<a name="inhousepromotion"></a>InHousePromotion|Display ads on the Retailer Network only.<br/><br/>This network value is only supported for ad groups in [shopping campaigns for brands](../guides/product-ads.md#setup-cooperative).|
|<a name="ownedandoperatedandsyndicatedsearch"></a>OwnedAndOperatedAndSyndicatedSearch|Display ads on owned and operated networks, as well as syndicated search networks.<br/><br/>Owned and operated and syndicated search refers to the entire Microsoft Advertising Network (recommended).|
|<a name="ownedandoperatedonly"></a>OwnedAndOperatedOnly|Display ads on only owned and operated networks.<br/><br/>Owned and operated networks refer to Microsoft sites and select traffic.|
|<a name="syndicatedsearchonly"></a>SyndicatedSearchOnly|*Note*: *SyndicatedSearchOnly* is deprecated as of July 2024.<br/><br/>Display ads on only syndicated search networks.<br/><br/>Syndicated search refers to only partner traffic.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AdGroup](adgroup.md)  
