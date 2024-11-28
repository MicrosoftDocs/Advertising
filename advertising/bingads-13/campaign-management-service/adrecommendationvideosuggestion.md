---
title: AdRecommendationVideoSuggestion Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Reserved.
---
# AdRecommendationVideoSuggestion Data Object - Campaign Management
Reserved.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="AdRecommendationVideoSuggestion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Video" nillable="true" type="tns:Video" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Video": {
    "AspectRatio": "ValueHere",
    "CreatedDateTimeInUTC": "ValueHere",
    "Description": "ValueHere",
    "DurationInMilliseconds": IntValueHere,
    "FailureCode": "ValueHere",
    "Id": "LongValueHere",
    "ModifiedDateTimeInUTC": "ValueHere",
    "SourceUrl": "ValueHere",
    "Status": "ValueHere",
    "ThumbnailUrl": "ValueHere",
    "Url": "ValueHere"
  }
}
```

-----

## <a name="elements"></a>Elements

The [AdRecommendationVideoSuggestion](adrecommendationvideosuggestion.md) object has the following elements: [Video](#video).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="video"></a>Video|Reserved.|[Video](video.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[CreateResponsiveAdRecommendation](createresponsiveadrecommendation.md)  
