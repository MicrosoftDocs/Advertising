---
title: AdRecommendationImageSuggestionMetadata Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: The ad recommendation image suggestion metadata data object.
---
# AdRecommendationImageSuggestionMetadata Data Object - Campaign Management
The ad recommendation image suggestion metadata data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="AdRecommendationImageSuggestionMetadata" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="CustomizedProperties" nillable="true" type="tns:ArrayOfAdRecommendationCustomizedProperty" />
    <xs:element minOccurs="0" name="ImageAssetProperties" nillable="true" type="tns:ArrayOfAdRecommendationImageAssetProperty" />
    <xs:element minOccurs="0" name="TemplateId" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="TemplateVersion" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="TextAssetProperties" nillable="true" type="tns:ArrayOfAdRecommendationTextAssetProperty" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
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
}
```

-----

## <a name="elements"></a>Elements

The [AdRecommendationImageSuggestionMetadata](adrecommendationimagesuggestionmetadata.md) object has the following elements: [CustomizedProperties](#customizedproperties), [ImageAssetProperties](#imageassetproperties), [TemplateId](#templateid), [TemplateVersion](#templateversion), [TextAssetProperties](#textassetproperties).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="customizedproperties"></a>CustomizedProperties|The customized properties for the ad recommendation.|[AdRecommendationCustomizedProperty](adrecommendationcustomizedproperty.md) array|
|<a name="imageassetproperties"></a>ImageAssetProperties|The image asset properties for the ad recommendation.|[AdRecommendationImageAssetProperty](adrecommendationimageassetproperty.md) array|
|<a name="templateid"></a>TemplateId|The identifier of the template.|**string**|
|<a name="templateversion"></a>TemplateVersion|The version of the template.|**string**|
|<a name="textassetproperties"></a>TextAssetProperties|The text asset properties for the ad recommendation.|[AdRecommendationTextAssetProperty](adrecommendationtextassetproperty.md) array|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AdRecommendationImageSuggestion](adrecommendationimagesuggestion.md)  
