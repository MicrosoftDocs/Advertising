---
title: LocationConditionItem Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a location condition item data object.
---
# LocationConditionItem Data Object - Campaign Management
Defines a location condition item data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="LocationConditionItem" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Id" type="xs:int" />
    <xs:element minOccurs="0" name="Name" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Type" nillable="true" type="tns:LocationType" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Id": IntValueHere,
  "Name": "ValueHere",
  "Type": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [LocationConditionItem](locationconditionitem.md) object has the following elements: [Id](#id), [Name](#name), [Type](#type).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="id"></a>Id|The unique identifier of the location condition item. Required.|**int**|
|<a name="name"></a>Name|The name of the location condition item.|**string**|
|<a name="type"></a>Type|The type of the location condition item.|[LocationType](locationtype.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[LocationCondition](locationcondition.md)  
