---
title: AssetGroupListingGroupAction Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Reserved.
---
# AssetGroupListingGroupAction Data Object - Campaign Management
Reserved.

## Syntax
```xml
<xs:complexType name="AssetGroupListingGroupAction" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element name="Action" type="tns:ItemAction" />
    <xs:element minOccurs="0" name="ListingGroup" nillable="true" type="tns:AssetGroupListingGroup" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [AssetGroupListingGroupAction](assetgrouplistinggroupaction.md) object has the following elements: [Action](#action), [ListingGroup](#listinggroup).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="action"></a>Action|Reserved.|[ItemAction](itemaction.md)|
|<a name="listinggroup"></a>ListingGroup|Reserved.|[AssetGroupListingGroup](assetgrouplistinggroup.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[ApplyAssetGroupListingGroupActions](applyassetgrouplistinggroupactions.md)  
