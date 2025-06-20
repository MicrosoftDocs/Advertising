---
title: DiagnosticTileData Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the diagnostic tile data data object.
---
# DiagnosticTileData Data Object - Campaign Management
Defines the diagnostic tile data data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="DiagnosticTileData" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Description" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Headline" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="ProgressPercent" type="xs:int" />
    <xs:element minOccurs="0" name="Title" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Description": "ValueHere",
  "Headline": "ValueHere",
  "ProgressPercent": IntValueHere,
  "Title": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [DiagnosticTileData](diagnostictiledata.md) object has the following elements: [Description](#description), [Headline](#headline), [ProgressPercent](#progresspercent), [Title](#title).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="description"></a>Description|Reserved.|**string**|
|<a name="headline"></a>Headline|Reserved.|**string**|
|<a name="progresspercent"></a>ProgressPercent|Reserved.|**int**|
|<a name="title"></a>Title|Reserved.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetDiagnostics](getdiagnostics.md)  
