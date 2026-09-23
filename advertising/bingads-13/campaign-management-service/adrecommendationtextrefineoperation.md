---
title: AdRecommendationTextRefineOperation Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the ad recommendation text refine operation data object.
---
# AdRecommendationTextRefineOperation Data Object - Campaign Management
Defines the ad recommendation text refine operation data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="AdRecommendationTextRefineOperation" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="TextField" type="tns:AdRecommendationTextField" />
    <xs:element minOccurs="0" name="TextFieldIndex" type="xs:int" />
    <xs:element minOccurs="0" name="TextTone" nillable="true" type="tns:AdRecommendationTextTone" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "TextField": "ValueHere",
  "TextFieldIndex": IntValueHere,
  "TextTone": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [AdRecommendationTextRefineOperation](adrecommendationtextrefineoperation.md) object has the following elements: [TextField](#textfield), [TextFieldIndex](#textfieldindex), [TextTone](#texttone).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="textfield"></a>TextField|The type of text field to refine.|[AdRecommendationTextField](adrecommendationtextfield.md)|
|<a name="textfieldindex"></a>TextFieldIndex|The zero-based index of the text field to refine.|**int**|
|<a name="texttone"></a>TextTone|The tone to use when refining the text.|[AdRecommendationTextTone](adrecommendationtexttone.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[RefineAssetGroupRecommendation](refineassetgrouprecommendation.md)  
[RefineResponsiveAdRecommendation](refineresponsiveadrecommendation.md)  
[RefineResponsiveSearchAdRecommendation](refineresponsivesearchadrecommendation.md)  
