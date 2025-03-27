---
title: BrandKitFont Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: A data object for the brand kit font.
---
# BrandKitFont Data Object - Campaign Management
A data object for the brand kit font.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="BrandKitFont" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="TextAssetType" type="tns:FontTextAssetType" />
    <xs:element minOccurs="0" name="Typeface" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Weight" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "TextAssetType": "ValueHere",
  "Typeface": "ValueHere",
  "Weight": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [BrandKitFont](brandkitfont.md) object has the following elements: [TextAssetType](#textassettype), [Typeface](#typeface), [Weight](#weight).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="textassettype"></a>TextAssetType|The font text assset type.|[FontTextAssetType](fonttextassettype.md)|
|<a name="typeface"></a>Typeface|The font typeface.|**string**|
|<a name="weight"></a>Weight|The font weight.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[BrandKit](brandkit.md)  
