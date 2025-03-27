---
title: AdRecommendationImageAssetProperty Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: The ad recommendation image asset property data object.
---
# AdRecommendationImageAssetProperty Data Object - Campaign Management
The ad recommendation image asset property data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="AdRecommendationImageAssetProperty" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="CropHeight" nillable="true" type="xs:int" />
    <xs:element minOccurs="0" name="CropWidth" nillable="true" type="xs:int" />
    <xs:element minOccurs="0" name="CropX" nillable="true" type="xs:int" />
    <xs:element minOccurs="0" name="CropY" nillable="true" type="xs:int" />
    <xs:element minOccurs="0" name="ImageField" type="tns:AdRecommendationImageField" />
    <xs:element minOccurs="0" name="ImageUrl" nillable="true" type="xs:string" />
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
  "ImageField": "ValueHere",
  "ImageUrl": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [AdRecommendationImageAssetProperty](adrecommendationimageassetproperty.md) object has the following elements: [CropHeight](#cropheight), [CropWidth](#cropwidth), [CropX](#cropx), [CropY](#cropy), [ImageField](#imagefield), [ImageUrl](#imageurl).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="cropheight"></a>CropHeight|The crop height in pixels.|**int**|
|<a name="cropwidth"></a>CropWidth|The crop width in pixels.|**int**|
|<a name="cropx"></a>CropX|Where to crop along the x-axis in pixels.|**int**|
|<a name="cropy"></a>CropY|Where to crop along the y-axis in pixels.|**int**|
|<a name="imagefield"></a>ImageField|The image field for the ad recommendation.|[AdRecommendationImageField](adrecommendationimagefield.md)|
|<a name="imageurl"></a>ImageUrl|The URL of the image.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AdRecommendationImageSuggestionMetadata](adrecommendationimagesuggestionmetadata.md)  
