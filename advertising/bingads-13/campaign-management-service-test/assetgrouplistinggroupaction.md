---
title: AssetGroupListingGroupAction Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: An object that contains an Action element and a ListingGroup element.(test)
---
# AssetGroupListingGroupAction Data Object Test - Campaign Management
An object that contains an Action element and a ListingGroup element.

# [XML](#tab/xml)

```xml
<xs:complexType name="AssetGroupListingGroupAction" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element name="Action" type="tns:ItemAction" />
    <xs:element minOccurs="0" name="ListingGroup" nillable="true" type="tns:AssetGroupListingGroup" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Action": "ValueHere",
  "ListingGroup": {
    "AssetGroupId": "LongValueHere",
    "AssetGroupListingType": "ValueHere",
    "Dimension": {
      "Attribute": "ValueHere",
      "Operand": "ValueHere",
      "Operator": "ValueHere"
    },
    "Id": "LongValueHere",
    "IsExcluded": "ValueHere",
    "ParentListingGroupId": "LongValueHere"
  }
}
```

-----

## <a name="elements"></a>Elements

The [AssetGroupListingGroupAction](assetgrouplistinggroupaction.md) object has the following elements: [Action](#action), [ListingGroup](#listinggroup).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="action"></a>Action|The action to be applied for the AssetGroupListingGroup.|[ItemAction](itemaction.md)|
|<a name="listinggroup"></a>ListingGroup|The AssetGroupListingGroup to apply action to. <br /><br />Update is not supported for listing group, To update the order or structure of the listing group, you cannot use the update action. You must delete existing listing groups and then add new listing groups instead. |[AssetGroupListingGroup](assetgrouplistinggroup.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[ApplyAssetGroupListingGroupActions](applyassetgrouplistinggroupactions.md)  
