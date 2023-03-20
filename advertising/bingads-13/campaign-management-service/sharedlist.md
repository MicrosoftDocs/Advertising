---
title: SharedList Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the base class of a shared list.
---
# SharedList Data Object - Campaign Management
Defines the base class of a shared list.

Do not try to instantiate a *SharedList*. You can create one or more of the following objects that derive from it.
- [NegativeKeywordList](negativekeywordlist.md)  
- [PlacementExclusionList](placementexclusionlist.md)  

## Syntax
```xml
<xs:complexType name="SharedList" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:SharedEntity">
      <xs:sequence>
        <xs:element minOccurs="0" name="ItemCount" nillable="true" type="xs:int" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [SharedList](sharedlist.md) object has the following elements: [ItemCount](#itemcount).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="itemcount"></a>ItemCount|The number of [SharedListItem](sharedlistitem.md) objects that are added to this shared list.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**int**|

The [SharedList](sharedlist.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementssharedentity"></a>Inherited Elements from SharedEntity
The [SharedList](sharedlist.md) object derives from the [SharedEntity](sharedentity.md) object, and inherits the following elements: [AssociationCount](#associationcount), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Id](#id), [Name](#name), [Type](#type). The descriptions below are specific to [SharedList](sharedlist.md), and might not apply to other objects that inherit the same elements from the [SharedEntity](sharedentity.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="associationcount"></a>AssociationCount|The number of active associations between this shared entity and another entity such as campaign or ad account.<br/><br/>For a [NegativeKeywordList](negativekeywordlist.md), the maximum number of active associations between the negative keyword list and campaign is 20. For a [PlacementExclusionList](placementexclusionlist.md), the maximum number of active associations between the website exclusion list and ad account is undefined.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**int**|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>Forward compatibility changes will be noted here in future releases. There are currently no forward compatibility changes for this object.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="id"></a>Id|The unique Microsoft Advertising identifier of the shared entity.<br/><br/>**Add:** Read-only<br/>**Update:** Required|**long**|
|<a name="name"></a>Name|The name of the shared entity.<br/><br/>The maximum string length is 255.<br/><br/>**Add:** Optional<br/>**Update:** Optional|**string**|
|<a name="type"></a>Type|The type of the shared entity.<br/><br/>This value is *NegativeKeywordList* when you retrieve a [NegativeKeywordList](negativekeywordlist.md). This value is *PlacementExclusionList* when you retrieve a [PlacementExclusionList](placementexclusionlist.md).<br/><br/>For more information about shared entity types, see [SharedEntity Data Object Remarks](sharedentity.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AddListItemsToSharedList](addlistitemstosharedlist.md)  
[DeleteListItemsFromSharedList](deletelistitemsfromsharedlist.md)  
[GetListItemsBySharedList](getlistitemsbysharedlist.md)  
