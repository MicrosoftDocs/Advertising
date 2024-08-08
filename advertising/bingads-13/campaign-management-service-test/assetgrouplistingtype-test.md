---
title: AssetGroupListingType Value Set Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: The type of listing group, for example Subdivision or Unit.(test)
---
# AssetGroupListingType Value Set Test - Campaign Management
The type of listing group, for example Subdivision or Unit.

## Syntax
```xml
<xs:simpleType name="AssetGroupListingType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Subdivision">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Unit">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AssetGroupListingType](assetgrouplistingtype.md) value set has the following values: [Subdivision](#subdivision), [Unit](#unit).

|Value|Description|
|-----------|---------------|
|<a name="subdivision"></a>Subdivision|If you are partitioning the products based on more specific product conditions, then set the Sub Type field to Subdivision, the Parent Listing Group Id to null or empty, and the Id to a negative value.|
|<a name="unit"></a>Unit|If you are bidding on all products in the catalog equally, set the Sub Type field to Unit.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AssetGroupListingGroup](assetgrouplistinggroup.md)  
