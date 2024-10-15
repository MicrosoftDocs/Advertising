---
title: PlacementCriterion Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a data object for PlacementCriterion.(test)
---
# PlacementCriterion Data Object Test - Campaign Management
Defines a data object for PlacementCriterion.

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
|<a name="placementid"></a>PlacementId|Reserved.|**long**|
|<a name="placementname"></a>PlacementName|Reserved.|**string**|

The [PlacementCriterion](placementcriterion.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementscriterion"></a>Inherited Elements from Criterion
The [PlacementCriterion](placementcriterion.md) object derives from the [Criterion](criterion.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [PlacementCriterion](placementcriterion.md), and might not apply to other objects that inherit the same elements from the [Criterion](criterion.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|Reserved.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

