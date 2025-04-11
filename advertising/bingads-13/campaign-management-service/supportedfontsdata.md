---
title: SupportedFontsData Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the supported fonts data data object.
---
# SupportedFontsData Data Object - Campaign Management
Defines the supported fonts data data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="SupportedFontsData" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="SupportedFonts" nillable="true" type="tns:ArrayOfSupportedFont" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "SupportedFonts": [
    {
      "FontFamily": "ValueHere",
      "FontWeights": [
        "ValueHere"
      ]
    }
  ]
}
```

-----

## <a name="elements"></a>Elements

The [SupportedFontsData](supportedfontsdata.md) object has the following elements: [SupportedFonts](#supportedfonts).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="supportedfonts"></a>SupportedFonts|Reserved.|[SupportedFont](supportedfont.md) array|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetSupportedFonts](getsupportedfonts.md)  
