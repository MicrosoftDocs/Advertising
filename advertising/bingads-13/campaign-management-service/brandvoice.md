---
title: BrandVoice Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the brand voice data object.
---
# BrandVoice Data Object - Campaign Management
Defines the brand voice data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="BrandVoice" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Personality" nillable="true" type="xs:string" />
    <xs:element xmlns:q170="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="Tones" nillable="true" type="q170:ArrayOfstring" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Personality": "ValueHere",
  "Tones": [
    "ValueHere"
  ]
}
```

-----

## <a name="elements"></a>Elements

The [BrandVoice](brandvoice.md) object has the following elements: [Personality](#personality), [Tones](#tones).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="personality"></a>Personality|The brand personality.|**string**|
|<a name="tones"></a>Tones|The brand tone.|**string** array|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[BrandKit](brandkit.md)  
