---
title: SharedEntity Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the base class of a shared entity.
---
# SharedEntity Data Object - Campaign Management
Defines the base class of a shared entity.

Do not try to instantiate a *SharedEntity*. You can create one or more of the following objects that derive from it.
- [NegativeKeywordList](negativekeywordlist.md)  
- [PlacementExclusionList](placementexclusionlist.md)  

The [NegativeKeywordList](negativekeywordlist.md) and [PlacementExclusionList](placementexclusionlist.md) are each derived from the [SharedList](sharedlist.md), which derives from the [SharedEntity](sharedentity.md) object.

## Syntax
```xml
<xs:complexType name="SharedEntity" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AssociationCount" nillable="true" type="xs:int" />
    <xs:element xmlns:q88="http://schemas.datacontract.org/2004/07/System.Collections.Generic" minOccurs="0" name="ForwardCompatibilityMap" nillable="true" type="q88:ArrayOfKeyValuePairOfstringstring" />
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="Name" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Type" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [SharedEntity](sharedentity.md) object has the following elements: [AssociationCount](#associationcount), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Id](#id), [Name](#name), [Type](#type).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="associationcount"></a>AssociationCount|The number of active associations between this shared entity and another entity such as campaign or ad account.<br/><br/>For a [NegativeKeywordList](negativekeywordlist.md), the maximum number of active associations between the negative keyword list and campaign is 20. For a [PlacementExclusionList](placementexclusionlist.md), the maximum number of active associations between the website exclusion list and ad account is undefined.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**int**|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>Forward compatibility changes will be noted here in future releases. There are currently no forward compatibility changes for this object.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="id"></a>Id|The unique Microsoft Advertising identifier of the shared entity.<br/><br/>**Add:** Read-only<br/>**Update:** Required|**long**|
|<a name="name"></a>Name|The name of the shared entity.<br/><br/>The maximum string length is 255.<br/><br/>**Add:** Optional<br/>**Update:** Optional|**string**|
|<a name="type"></a>Type|The type of the shared entity.<br/><br/>This value is *NegativeKeywordList* when you retrieve a [NegativeKeywordList](negativekeywordlist.md). This value is *PlacementExclusionList* when you retrieve a [PlacementExclusionList](placementexclusionlist.md).<br/><br/>For more information about shared entity types, see [SharedEntity Data Object Remarks](sharedentity.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## <a name="remarks"></a>Remarks
For Java and the .NET languages, do not set the *Type* element because the value is determined by the object instance.

If you generate the SOAP manually, use the *type* attribute of the `<SharedEntity>` node as shown in the following example, to specify whether the shared entity is a negative keyword list or a website exclusion list.

```xml
<SharedEntity i:type="NegativeKeywordList" xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
  <AssociationCount i:nil="true" />
  <ForwardCompatibilityMap i:nil="true" xmlns:a="http://schemas.datacontract.org/2004/07/System.Collections.Generic" />
  <Id i:nil="true" />
  <Name>My Negative Keyword List</Name>
  <ItemCount i:nil="true" />
</SharedEntity>
```

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AddSharedEntity](addsharedentity.md)  
[DeleteSharedEntities](deletesharedentities.md)  
[GetSharedEntities](getsharedentities.md)  
[GetSharedEntitiesByAccountId](getsharedentitiesbyaccountid.md)  
[UpdateSharedEntities](updatesharedentities.md)  
