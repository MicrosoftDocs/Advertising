---
title: AssetGroupListingGroupAdditionalField Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Reserved.
---
# AssetGroupListingGroupAdditionalField Value Set - Campaign Management
Reserved.

## Syntax
```xml
<xs:simpleType name="AssetGroupListingGroupAdditionalField" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="ListingGroupPath" />
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AssetGroupListingGroupAdditionalField](assetgrouplistinggroupadditionalfield.md) value set has the following values: [ListingGroupPath](#listinggrouppath).

|Value|Description|
|-----------|---------------|
|<a name="listinggrouppath"></a>ListingGroupPath|The path of a listing group node.<br /><br />**Add**: Read-only <br />**Update**: Read-only <br />**Delete**: Read-only|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetAssetGroupListingGroupsByIds](getassetgrouplistinggroupsbyids.md)  
