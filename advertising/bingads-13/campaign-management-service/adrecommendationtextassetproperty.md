---
title: AdRecommendationTextAssetProperty Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: The ad recommendation text asset property data object.
---
# AdRecommendationTextAssetProperty Data Object - Campaign Management
The ad recommendation text asset property data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="AdRecommendationTextAssetProperty" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Text" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="TextField" type="tns:AdRecommendationTextField" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Text": "ValueHere",
  "TextField": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [AdRecommendationTextAssetProperty](adrecommendationtextassetproperty.md) object has the following elements: [Text](#text), [TextField](#textfield).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="text"></a>Text|The text.|**string**|
|<a name="textfield"></a>TextField|The type of text.|[AdRecommendationTextField](adrecommendationtextfield.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AdRecommendationImageSuggestionMetadata](adrecommendationimagesuggestionmetadata.md)  
