---
title: AdRecommendationImageSuggestion Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a data object for ad recommendation image suggestion.
---
# AdRecommendationImageSuggestion Data Object - Campaign Management
Defines a data object for ad recommendation image suggestion.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="AdRecommendationImageSuggestion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AssetLink" nillable="true" type="tns:AssetLink" />
    <xs:element minOccurs="0" name="Image" nillable="true" type="tns:Image" />
    <xs:element minOccurs="0" name="ImageMetadata" nillable="true" type="tns:AdRecommendationImageSuggestionMetadata">
      <xs:annotation>
        <xs:appinfo>
          <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
        </xs:appinfo>
      </xs:annotation>
    </xs:element>
    <xs:element minOccurs="0" name="ImageUrl" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AssetLink": {
    "Asset": {
      "Id": "LongValueHere",
      "Name": "ValueHere",
      "Type": "ImageAsset",
      "CropHeight": IntValueHere,
      "CropWidth": IntValueHere,
      "CropX": IntValueHere,
      "CropY": IntValueHere,
      "SubType": "ValueHere",
      "TargetHeight": IntValueHere,
      "TargetWidth": IntValueHere
    },
    "AssetPerformanceLabel": "ValueHere",
    "EditorialStatus": "ValueHere",
    "PinnedField": "ValueHere"
  },
  "Image": {
    "Data": "ValueHere"
  },
  "ImageMetadata": {
    "CustomizedProperties": [
      {
        "AssetTypeName": "ValueHere",
        "PropertyName": "ValueHere",
        "PropertyValue": "ValueHere"
      }
    ],
    "ImageAssetProperties": [
      {
        "CropHeight": IntValueHere,
        "CropWidth": IntValueHere,
        "CropX": IntValueHere,
        "CropY": IntValueHere,
        "ImageField": "ValueHere",
        "ImageUrl": "ValueHere"
      }
    ],
    "TemplateId": "ValueHere",
    "TemplateVersion": "ValueHere",
    "TextAssetProperties": [
      {
        "Text": "ValueHere",
        "TextField": "ValueHere"
      }
    ]
  },
  "ImageUrl": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [AdRecommendationImageSuggestion](adrecommendationimagesuggestion.md) object has the following elements: [AssetLink](#assetlink), [Image](#image), [ImageMetadata](#imagemetadata), [ImageUrl](#imageurl).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="assetlink"></a>AssetLink|Defines the relationship of an asset to an ad.|[AssetLink](assetlink.md)|
|<a name="image"></a>Image|The suggsted image.|[Image](image.md)|
|<a name="imagemetadata"></a>ImageMetadata|Reserved.|[AdRecommendationImageSuggestionMetadata](adrecommendationimagesuggestionmetadata.md)|
|<a name="imageurl"></a>ImageUrl|The URL of the suggested image.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[CreateAssetGroupRecommendation](createassetgrouprecommendation.md)  
[CreateResponsiveAdRecommendation](createresponsiveadrecommendation.md)  
[RefineAssetGroupRecommendation](refineassetgrouprecommendation.md)  
[RefineResponsiveAdRecommendation](refineresponsiveadrecommendation.md)  
