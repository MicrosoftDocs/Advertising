---
title: AudioFilter Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the audio filter data object.
---
# AudioFilter Data Object - Campaign Management
Defines the audio filter data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="AudioFilter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element xmlns:q183="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="AudioNames" nillable="true" type="q183:ArrayOfstring" />
    <xs:element xmlns:q184="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="Categories" nillable="true" type="q184:ArrayOfstring" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AudioNames": [
    "ValueHere"
  ],
  "Categories": [
    "ValueHere"
  ]
}
```

-----

## <a name="elements"></a>Elements

The [AudioFilter](audiofilter.md) object has the following elements: [AudioNames](#audionames), [Categories](#categories).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="audionames"></a>AudioNames|Reserved.|**string** array|
|<a name="categories"></a>Categories|Reserved.|**string** array|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetSupportedClipchampAudio](getsupportedclipchampaudio.md)  
