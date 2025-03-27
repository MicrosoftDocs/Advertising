---
title: AdRecommendationImageRefineOperation Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: The ad recommendation image refine operation data object.
---
# AdRecommendationImageRefineOperation Data Object - Campaign Management
The ad recommendation image refine operation data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="AdRecommendationImageRefineOperation" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="ImageRefineType" type="tns:AdRecommendationImageRefineType" />
    <xs:element minOccurs="0" name="ImageIndex" type="xs:int" />
    <xs:element minOccurs="0" name="Prompt" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "ImageIndex": IntValueHere,
  "ImageRefineType": "ValueHere",
  "Prompt": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [AdRecommendationImageRefineOperation](adrecommendationimagerefineoperation.md) object has the following elements: [ImageIndex](#imageindex), [ImageRefineType](#imagerefinetype), [Prompt](#prompt).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="imageindex"></a>ImageIndex|Index of the image to be refined.|**int**|
|<a name="imagerefinetype"></a>ImageRefineType|The image refine type.|[AdRecommendationImageRefineType](adrecommendationimagerefinetype.md)|
|<a name="prompt"></a>Prompt|Description of image background change.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[RefineAssetGroupRecommendation](refineassetgrouprecommendation.md)  
[RefineResponsiveAdRecommendation](refineresponsiveadrecommendation.md)  
