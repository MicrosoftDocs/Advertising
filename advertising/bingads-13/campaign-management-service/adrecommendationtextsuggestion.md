---
title: AdRecommendationTextSuggestion Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Reserved.
---
# AdRecommendationTextSuggestion Data Object - Campaign Management
Reserved.

# [XML](#tab/xml)

```xml
<xs:complexType name="AdRecommendationTextSuggestion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Text" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Text": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [AdRecommendationTextSuggestion](adrecommendationtextsuggestion.md) object has the following elements: [Text](#text).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="text"></a>Text|Reserved.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[RefineAssetGroupRecommendation](refineassetgrouprecommendation.md)  
[RefineResponsiveAdRecommendation](refineresponsiveadrecommendation.md)  
[RefineResponsiveSearchAdRecommendation](refineresponsivesearchadrecommendation.md)  
