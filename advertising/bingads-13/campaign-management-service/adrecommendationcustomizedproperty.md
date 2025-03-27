---
title: AdRecommendationCustomizedProperty Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: The ad recommendation customized property data object.
---
# AdRecommendationCustomizedProperty Data Object - Campaign Management
The ad recommendation customized property data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="AdRecommendationCustomizedProperty" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AssetTypeName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="PropertyName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="PropertyValue" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AssetTypeName": "ValueHere",
  "PropertyName": "ValueHere",
  "PropertyValue": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [AdRecommendationCustomizedProperty](adrecommendationcustomizedproperty.md) object has the following elements: [AssetTypeName](#assettypename), [PropertyName](#propertyname), [PropertyValue](#propertyvalue).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="assettypename"></a>AssetTypeName|The asset type name.|**string**|
|<a name="propertyname"></a>PropertyName|The property name.|**string**|
|<a name="propertyvalue"></a>PropertyValue|The property value.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AdRecommendationImageSuggestionMetadata](adrecommendationimagesuggestionmetadata.md)  
