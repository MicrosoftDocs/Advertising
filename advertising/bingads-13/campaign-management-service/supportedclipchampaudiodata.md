---
title: SupportedClipchampAudioData Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the supported clip champ audio data data object.
---
# SupportedClipchampAudioData Data Object - Campaign Management
Defines the supported clip champ audio data data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="SupportedClipchampAudioData" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Audio" nillable="true" type="tns:ArrayOfSupportedClipchampAudio" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Audio": [
    {
      "AudioName": "ValueHere",
      "Category": "ValueHere",
      "Url": "ValueHere"
    }
  ]
}
```

-----

## <a name="elements"></a>Elements

The [SupportedClipchampAudioData](supportedclipchampaudiodata.md) object has the following elements: [Audio](#audio).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="audio"></a>Audio|Reserved.|[SupportedClipchampAudio](supportedclipchampaudio.md) array|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetSupportedClipchampAudio](getsupportedclipchampaudio.md)  
