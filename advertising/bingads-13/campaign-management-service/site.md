---
title: Site Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a data object for adding a site to an inclusion list.
---
# Site Data Object - Campaign Management
Defines a data object for adding a site to an inclusion list.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="Site" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:SharedListItem">
      <xs:sequence>
        <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
        <xs:element minOccurs="0" name="Url" nillable="true" type="xs:string" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "ForwardCompatibilityMap": [
    {
      "key": "ValueHere",
      "value": "ValueHere"
    }
  ],
  "Type": "Site",
  "Id": "LongValueHere",
  "Url": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [Site](site.md) object has the following elements: [Id](#id), [Url](#url).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="id"></a>Id|The unique Microsoft Advertising identifier of the site.<br/><br/>**Add:** Read-only<br/>**Update:** Required|**long**|
|<a name="url"></a>Url|The URL of the site.|**string**|

The [Site](site.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementssharedlistitem"></a>Inherited Elements from SharedListItem
The [Site](site.md) object derives from the [SharedListItem](sharedlistitem.md) object, and inherits the following elements: [ForwardCompatibilityMap](#forwardcompatibilitymap), [Type](#type). The descriptions below are specific to [Site](site.md), and might not apply to other objects that inherit the same elements from the [SharedListItem](sharedlistitem.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>Forward compatibility changes will be noted here in future releases. There are currently no forward compatibility changes for this object.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="type"></a>Type|The type of the site.<br/><br/>This value is *NegativeKeywordList* when you retrieve an [Account Placement Inclusion List](accountplacementinclusionlist.md). This value is *AccountPlacementInclusionList* when you retrieve a [AccountPlacementInclusionList](placementinclusionlist.md).|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13
