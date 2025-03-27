---
title: BrandKitImage Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: The brand kit image data object.
---
# BrandKitImage Data Object - Campaign Management
The brand kit image data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="BrandKitImage" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="CropHeight" nillable="true" type="xs:int" />
    <xs:element minOccurs="0" name="CropWidth" nillable="true" type="xs:int" />
    <xs:element minOccurs="0" name="CropX" nillable="true" type="xs:int" />
    <xs:element minOccurs="0" name="CropY" nillable="true" type="xs:int" />
    <xs:element minOccurs="0" name="Id" type="xs:long" />
    <xs:element minOccurs="0" name="ThumbnailUrl" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Url" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "CropHeight": IntValueHere,
  "CropWidth": IntValueHere,
  "CropX": IntValueHere,
  "CropY": IntValueHere,
  "Id": "LongValueHere",
  "ThumbnailUrl": "ValueHere",
  "Url": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [BrandKitImage](brandkitimage.md) object has the following elements: [CropHeight](#cropheight), [CropWidth](#cropwidth), [CropX](#cropx), [CropY](#cropy), [Id](#id), [ThumbnailUrl](#thumbnailurl), [Url](#url).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="cropheight"></a>CropHeight|The crop height in pixels.|**int**|
|<a name="cropwidth"></a>CropWidth|The crop wdith in pixels.|**int**|
|<a name="cropx"></a>CropX|Where to crop along the x-axis in pixels.|**int**|
|<a name="cropy"></a>CropY|Where to crop along the y-axis in pixels.|**int**|
|<a name="id"></a>Id|The identifier of the brand kit image.|**long**|
|<a name="thumbnailurl"></a>ThumbnailUrl|The URL for the image thumbnail.|**string**|
|<a name="url"></a>Url|The URL for the image.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[BrandKit](brandkit.md)  
