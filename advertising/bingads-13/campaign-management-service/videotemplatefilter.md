---
title: VideoTemplateFilter Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the video template filter data object.
---
# VideoTemplateFilter Data Object - Campaign Management
Defines the video template filter data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="VideoTemplateFilter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element xmlns:q173="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="AspectRatios" nillable="true" type="q173:ArrayOfstring" />
    <xs:element xmlns:q174="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="Durations" nillable="true" type="q174:ArrayOfint" />
    <xs:element minOccurs="0" name="MaxMediaAssetCount" type="xs:int" />
    <xs:element minOccurs="0" name="MaxTextAssetCount" type="xs:int" />
    <xs:element xmlns:q175="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="TemplateIds" nillable="true" type="q175:ArrayOfstring" />
    <xs:element xmlns:q176="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="Themes" nillable="true" type="q176:ArrayOfstring" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AspectRatios": [
    "ValueHere"
  ],
  "Durations": [
    IntValueHere
  ],
  "MaxMediaAssetCount": IntValueHere,
  "MaxTextAssetCount": IntValueHere,
  "TemplateIds": [
    "ValueHere"
  ],
  "Themes": [
    "ValueHere"
  ]
}
```

-----

## <a name="elements"></a>Elements

The [VideoTemplateFilter](videotemplatefilter.md) object has the following elements: [AspectRatios](#aspectratios), [Durations](#durations), [MaxMediaAssetCount](#maxmediaassetcount), [MaxTextAssetCount](#maxtextassetcount), [TemplateIds](#templateids), [Themes](#themes).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="aspectratios"></a>AspectRatios|Reserved.|**string** array|
|<a name="durations"></a>Durations|Reserved.|**int** array|
|<a name="maxmediaassetcount"></a>MaxMediaAssetCount|Reserved.|**int**|
|<a name="maxtextassetcount"></a>MaxTextAssetCount|Reserved.|**int**|
|<a name="templateids"></a>TemplateIds|Reserved.|**string** array|
|<a name="themes"></a>Themes|Reserved.|**string** array|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetClipchampTemplates](getclipchamptemplates.md)  
