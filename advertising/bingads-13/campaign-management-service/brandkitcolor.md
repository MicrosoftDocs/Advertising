---
title: BrandKitColor Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: A data object for the brand kit color.
---
# BrandKitColor Data Object - Campaign Management
A data object for the brand kit color.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="BrandKitColor" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="HexCode" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Name" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "HexCode": "ValueHere",
  "Name": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [BrandKitColor](brandkitcolor.md) object has the following elements: [HexCode](#hexcode), [Name](#name).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="hexcode"></a>HexCode|The hex code for the brand kit color.|**string**|
|<a name="name"></a>Name|The name of the brand kit color.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[BrandKitPalette](brandkitpalette.md)  
