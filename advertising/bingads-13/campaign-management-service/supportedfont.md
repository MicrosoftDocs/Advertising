---
title: SupportedFont Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the supported font data object.
---
# SupportedFont Data Object - Campaign Management
Defines the supported font data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="SupportedFont" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="FontFamily" nillable="true" type="xs:string" />
    <xs:element xmlns:q187="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="FontWeights" nillable="true" type="q187:ArrayOfstring" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "FontFamily": "ValueHere",
  "FontWeights": [
    "ValueHere"
  ]
}
```

-----

## <a name="elements"></a>Elements

The [SupportedFont](supportedfont.md) object has the following elements: [FontFamily](#fontfamily), [FontWeights](#fontweights).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="fontfamily"></a>FontFamily|Reserved.|**string**|
|<a name="fontweights"></a>FontWeights|Reserved.|**string** array|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[SupportedFontsData](supportedfontsdata.md)  
