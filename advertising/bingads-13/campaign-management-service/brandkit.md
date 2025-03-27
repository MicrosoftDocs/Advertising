---
title: BrandKit Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: The brand kit data object.
---
# BrandKit Data Object - Campaign Management
The brand kit data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="BrandKit" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Fonts" nillable="true" type="tns:ArrayOfBrandKitFont" />
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="Images" nillable="true" type="tns:ArrayOfBrandKitImage" />
    <xs:element minOccurs="0" name="LandscapeLogos" nillable="true" type="tns:ArrayOfBrandKitImage" />
    <xs:element minOccurs="0" name="Name" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Palettes" nillable="true" type="tns:ArrayOfBrandKitPalette" />
    <xs:element minOccurs="0" name="SquareLogos" nillable="true" type="tns:ArrayOfBrandKitImage" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Fonts": [
    {
      "TextAssetType": "ValueHere",
      "Typeface": "ValueHere",
      "Weight": "ValueHere"
    }
  ],
  "Id": "LongValueHere",
  "Images": [
    {
      "CropHeight": IntValueHere,
      "CropWidth": IntValueHere,
      "CropX": IntValueHere,
      "CropY": IntValueHere,
      "Id": "LongValueHere",
      "ThumbnailUrl": "ValueHere",
      "Url": "ValueHere"
    }
  ],
  "LandscapeLogos": [
    {
      "CropHeight": IntValueHere,
      "CropWidth": IntValueHere,
      "CropX": IntValueHere,
      "CropY": IntValueHere,
      "Id": "LongValueHere",
      "ThumbnailUrl": "ValueHere",
      "Url": "ValueHere"
    }
  ],
  "Name": "ValueHere",
  "Palettes": [
    {
      "Colors": [
        {
          "HexCode": "ValueHere",
          "Name": "ValueHere"
        }
      ],
      "ColorType": "ValueHere"
    }
  ],
  "SquareLogos": [
    {
      "CropHeight": IntValueHere,
      "CropWidth": IntValueHere,
      "CropX": IntValueHere,
      "CropY": IntValueHere,
      "Id": "LongValueHere",
      "ThumbnailUrl": "ValueHere",
      "Url": "ValueHere"
    }
  ]
}
```

-----

## <a name="elements"></a>Elements

The [BrandKit](brandkit.md) object has the following elements: [Fonts](#fonts), [Id](#id), [Images](#images), [LandscapeLogos](#landscapelogos), [Name](#name), [Palettes](#palettes), [SquareLogos](#squarelogos).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="fonts"></a>Fonts|The brand kit's fonts.|[BrandKitFont](brandkitfont.md) array|
|<a name="id"></a>Id|The identifier of the brand kit.|**long**|
|<a name="images"></a>Images|The brand kit's images.|[BrandKitImage](brandkitimage.md) array|
|<a name="landscapelogos"></a>LandscapeLogos|The brand kit's landscape logos.|[BrandKitImage](brandkitimage.md) array|
|<a name="name"></a>Name|The brand kit's name.|**string**|
|<a name="palettes"></a>Palettes|The brand kit's palettes.|[BrandKitPalette](brandkitpalette.md) array|
|<a name="squarelogos"></a>SquareLogos|The brand kit's square logos.|[BrandKitImage](brandkitimage.md) array|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AddBrandKits](addbrandkits.md)  
[GetBrandKitsByAccountId](getbrandkitsbyaccountid.md)  
[GetBrandKitsByIds](getbrandkitsbyids.md)  
[UpdateBrandKits](updatebrandkits.md)  
