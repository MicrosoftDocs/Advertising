---
title: Network Value Set - Campaign Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the possible search networks on which an ad can display.
ms.subservice: campaign-management-api
---
# Network Value Set - Campaign Management
Defines the possible search networks on which an ad can display.

For more information about networks and ad distribution, see the [About Ad Distribution](https://help.ads.microsoft.com/#apex/3/en/50871/0) help article.

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
|<a name="syndicatedsearchonly"></a>SyndicatedSearchOnly|Display ads on only syndicated search networks.<br/><br/>Syndicated search refers to only partner traffic.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AdGroup](adgroup.md)  
