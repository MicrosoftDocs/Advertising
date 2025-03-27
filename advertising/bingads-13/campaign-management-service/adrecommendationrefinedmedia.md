---
title: AdRecommendationRefinedMedia Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: The ad recommendation refined media data object.
---
# AdRecommendationRefinedMedia Data Object - Campaign Management
The ad recommendation refined media data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="AdRecommendationRefinedMedia" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="MediaUrl" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "MediaUrl": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [AdRecommendationRefinedMedia](adrecommendationrefinedmedia.md) object has the following elements: [MediaUrl](#mediaurl).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="mediaurl"></a>MediaUrl|The media URL.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AdRecommendationMediaRefineResult](adrecommendationmediarefineresult.md)  
