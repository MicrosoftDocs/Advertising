---
title: AdRecommendationMediaRefineResult Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: The ad recommendation media refine result data object.
---
# AdRecommendationMediaRefineResult Data Object - Campaign Management
The ad recommendation media refine result data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="AdRecommendationMediaRefineResult" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Errors" nillable="true" type="tns:ArrayOfOperationError" />
    <xs:element minOccurs="0" name="MediaList" nillable="true" type="tns:ArrayOfAdRecommendationRefinedMedia" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Errors": [
    {
      "Code": IntValueHere,
      "Details": "ValueHere",
      "ErrorCode": "ValueHere",
      "Message": "ValueHere"
    }
  ],
  "MediaList": [
    {
      "MediaUrl": "ValueHere"
    }
  ]
}
```

-----

## <a name="elements"></a>Elements

The [AdRecommendationMediaRefineResult](adrecommendationmediarefineresult.md) object has the following elements: [Errors](#errors), [MediaList](#medialist).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="errors"></a>Errors|An array of *OperationError* objects that contains the details that explain why the service operation failed.|[OperationError](operationerror.md) array|
|<a name="medialist"></a>MediaList|List of ad recommendation refined media.|[AdRecommendationRefinedMedia](adrecommendationrefinedmedia.md) array|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[RefineAssetGroupRecommendation](refineassetgrouprecommendation.md)  
[RefineResponsiveAdRecommendation](refineresponsiveadrecommendation.md)  
