---
title: HotelListing Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a hotel listing.
---
# HotelListing Data Object - Campaign Management
Defines a hotel listing.

# [XML](#tab/xml)

```xml
<xs:complexType name="HotelListing" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Attribute" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Operand" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Attribute": "ValueHere",
  "Operand": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [HotelListing](hotellisting.md) object has the following elements: [Attribute](#attribute), [Operand](#operand).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="attribute"></a>Attribute|The attribute for the hotel listing.|**string**|
|<a name="operand"></a>Operand|The operand for the hotel listing.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[HotelGroup](hotelgroup.md)  
