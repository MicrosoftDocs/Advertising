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

# [XML](#tab/xml)

```xml
<xs:complexType name="AdRecommendationImageSuggestion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Image" nillable="true" type="tns:Image" />
    <xs:element minOccurs="0" name="ImageUrl" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Image": {
    "Data": "ValueHere"
  },
  "ImageUrl": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [AdRecommendationImageSuggestion](adrecommendationimagesuggestion.md) object has the following elements: [Image](#image), [ImageUrl](#imageurl).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="image"></a>Image|Reserved.|[Image](image.md)|
|<a name="imageurl"></a>ImageUrl|Reserved.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[CreateAssetGroupRecommendation](createassetgrouprecommendation.md)  
[CreateResponsiveAdRecommendation](createresponsiveadrecommendation.md)  
