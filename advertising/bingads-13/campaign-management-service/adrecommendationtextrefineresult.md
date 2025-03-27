---
title: AdRecommendationTextRefineResult Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: The ad recommendation text refine result data object.
---
# AdRecommendationTextRefineResult Data Object - Campaign Management
The ad recommendation text refine result data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="AdRecommendationTextRefineResult" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Errors" nillable="true" type="tns:ArrayOfOperationError" />
    <xs:element minOccurs="0" name="TextAssetLinks" nillable="true" type="tns:ArrayOfAssetLink" />
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
  "TextAssetLinks": [
    {
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
    }
  ]
}
```

-----

## <a name="elements"></a>Elements

The [AdRecommendationTextRefineResult](adrecommendationtextrefineresult.md) object has the following elements: [Errors](#errors), [TextAssetLinks](#textassetlinks).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="errors"></a>Errors|An array of *OperationError* objects that contains the details that explain why the service operation failed.|[OperationError](operationerror.md) array|
|<a name="textassetlinks"></a>TextAssetLinks|List of text asset links.|[AssetLink](assetlink.md) array|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[RefineAssetGroupRecommendation](refineassetgrouprecommendation.md)  
[RefineResponsiveAdRecommendation](refineresponsiveadrecommendation.md)  
[RefineResponsiveSearchAdRecommendation](refineresponsivesearchadrecommendation.md)  
