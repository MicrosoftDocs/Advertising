---
title: PlacementCriterion Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a data object for PlacementCriterion.
---
# PlacementCriterion Data Object - Campaign Management
Defines a data object for PlacementCriterion.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="PlacementCriterion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Criterion">
      <xs:sequence>
        <xs:element minOccurs="0" name="PlacementId" type="xs:long" />
        <xs:element minOccurs="0" name="PlacementName" nillable="true" type="xs:string" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "PlacementCriterion",
  "PlacementId": "LongValueHere",
  "PlacementName": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [PlacementCriterion](placementcriterion.md) object has the following elements: [PlacementId](#placementid), [PlacementName](#placementname).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="placementid"></a>PlacementId|The ID of the placement.|**long**|
|<a name="placementname"></a>PlacementName|The name of the placement.|**string**|

The [PlacementCriterion](placementcriterion.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementscriterion"></a>Inherited Elements from Criterion
The [PlacementCriterion](placementcriterion.md) object derives from the [Criterion](criterion.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [PlacementCriterion](placementcriterion.md), and might not apply to other objects that inherit the same elements from the [Criterion](criterion.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the criterion. This value is *Placement* when you retrieve a placement criterion. For more information about criterion types, see the [Criterion Data Object Remarks](criterion.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

