---
title: BrandKitPalette Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: The brand kit palette data object.
---
# BrandKitPalette Data Object - Campaign Management
The brand kit palette data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="BrandKitPalette" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="ColorType" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Colors" nillable="true" type="tns:ArrayOfBrandKitColor" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Colors": [
    {
      "HexCode": "ValueHere",
      "Name": "ValueHere"
    }
  ],
  "ColorType": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [BrandKitPalette](brandkitpalette.md) object has the following elements: [Colors](#colors), [ColorType](#colortype).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="colors"></a>Colors|The brand kit's color palettes.|[BrandKitColor](brandkitcolor.md) array|
|<a name="colortype"></a>ColorType|The color type.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[BrandKit](brandkit.md)  
