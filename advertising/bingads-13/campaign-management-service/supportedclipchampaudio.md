---
title: SupportedClipchampAudio Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the supported clip champ audio data object.
---
# SupportedClipchampAudio Data Object - Campaign Management
Defines the supported clip champ audio data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="SupportedClipchampAudio" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AudioName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Category" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Url" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AudioName": "ValueHere",
  "Category": "ValueHere",
  "Url": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [SupportedClipchampAudio](supportedclipchampaudio.md) object has the following elements: [AudioName](#audioname), [Category](#category), [Url](#url).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="audioname"></a>AudioName|Reserved.|**string**|
|<a name="category"></a>Category|Reserved.|**string**|
|<a name="url"></a>Url|Reserved.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[SupportedClipchampAudioData](supportedclipchampaudiodata.md)  
