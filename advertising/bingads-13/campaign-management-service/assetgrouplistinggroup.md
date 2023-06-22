---
title: AssetGroupListingGroup Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Reserved.
---
# AssetGroupListingGroup Data Object - Campaign Management
Reserved.

## Syntax
```xml
<xs:complexType name="AssetGroupListingGroup" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AssetGroupId" type="xs:long" />
    <xs:element minOccurs="0" name="AssetGroupListingType" type="tns:AssetGroupListingType" />
    <xs:element minOccurs="0" name="Dimension" nillable="true" type="tns:ProductCondition" />
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="IsExcluded" type="xs:boolean" />
    <xs:element minOccurs="0" name="ParentListingGroupId" nillable="true" type="xs:long" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [AssetGroupListingGroup](assetgrouplistinggroup.md) object has the following elements: [AssetGroupId](#assetgroupid), [AssetGroupListingType](#assetgrouplistingtype), [Dimension](#dimension), [Id](#id), [IsExcluded](#isexcluded), [ParentListingGroupId](#parentlistinggroupid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="assetgroupid"></a>AssetGroupId|Reserved.|**long**|
|<a name="assetgrouplistingtype"></a>AssetGroupListingType|Reserved.|[AssetGroupListingType](assetgrouplistingtype.md)|
|<a name="dimension"></a>Dimension|Reserved.|[ProductCondition](productcondition.md)|
|<a name="id"></a>Id|Reserved.|**long**|
|<a name="isexcluded"></a>IsExcluded|Reserved.|**boolean**|
|<a name="parentlistinggroupid"></a>ParentListingGroupId|Reserved.|**long**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AssetGroupListingGroupAction](assetgrouplistinggroupaction.md)  
[GetAssetGroupListingGroupsByIds](getassetgrouplistinggroupsbyids.md)  
