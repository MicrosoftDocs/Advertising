---
title: EntityIdToParentIdAssociation Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines an object that contains the unique system identifier of an entity such as ad or keyword, and the identifier of its parent.
---
# EntityIdToParentIdAssociation Data Object - Campaign Management
Defines an object that contains the unique system identifier of an entity such as ad or keyword, and the identifier of its parent. An ad group is the parent of an ad or keyword.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="EntityIdToParentIdAssociation" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="EntityId" type="xs:long" />
    <xs:element minOccurs="0" name="ParentId" type="xs:long" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "EntityId": "LongValueHere",
  "ParentId": "LongValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [EntityIdToParentIdAssociation](entityidtoparentidassociation.md) object has the following elements: [EntityId](#entityid), [ParentId](#parentid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="entityid"></a>EntityId|The system-generated unique identifier of an entity such as ad or keyword.|**long**|
|<a name="parentid"></a>ParentId|The identifier of the entity's parent. An ad group is the parent of an ad or keyword.|**long**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AppealEditorialRejections](appealeditorialrejections.md)  
[GetAssetGroupsEditorialReasons](getassetgroupseditorialreasons.md)  
[GetEditorialReasonsByIds](geteditorialreasonsbyids.md)  
