---
title: EntityIdToParentIdAssociation Data Object - Campaign Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines an object that contains the unique system identifier of an entity such as ad or keyword, and the identifier of its parent.
ms.subservice: campaign-management-api
---
# EntityIdToParentIdAssociation Data Object - Campaign Management
Defines an object that contains the unique system identifier of an entity such as ad or keyword, and the identifier of its parent. An ad group is the parent of an ad or keyword.

## Syntax
```xml
<xs:complexType name="EntityIdToParentIdAssociation" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="EntityId" type="xs:long" />
    <xs:element minOccurs="0" name="ParentId" type="xs:long" />
  </xs:sequence>
</xs:complexType>
```

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
[GetEditorialReasonsByIds](geteditorialreasonsbyids.md)  
