---
title: CustomSegmentCatalog Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the CustomSegmentCatalog data object.
---
# CustomSegmentCatalog Data Object - Campaign Management
Defines the CustomSegmentCatalog data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="CustomSegmentCatalog" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="CatalogId" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="CatalogName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="EffectiveEditorialStatus" nillable="true" type="tns:EffectiveEditorialStatus" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "CatalogId": "LongValueHere",
  "CatalogName": "ValueHere",
  "EffectiveEditorialStatus": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [CustomSegmentCatalog](customsegmentcatalog.md) object has the following elements: [CatalogId](#catalogid), [CatalogName](#catalogname), [EffectiveEditorialStatus](#effectiveeditorialstatus).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="catalogid"></a>CatalogId|The catalog ID.|**long**|
|<a name="catalogname"></a>CatalogName|The catalog name.|**string**|
|<a name="effectiveeditorialstatus"></a>EffectiveEditorialStatus|The effective editorial status.|[EffectiveEditorialStatus](effectiveeditorialstatus.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[CustomSegment](customsegment.md)  
