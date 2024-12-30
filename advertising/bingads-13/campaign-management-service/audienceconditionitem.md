---
title: AudienceConditionItem Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines an audience condition item data object.
---
# AudienceConditionItem Data Object - Campaign Management
Defines an audience condition item data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="AudienceConditionItem" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Id" type="xs:long" />
    <xs:element minOccurs="0" name="Name" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Type" nillable="true" type="tns:AudienceType" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Id": "LongValueHere",
  "Name": "ValueHere",
  "Type": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [AudienceConditionItem](audienceconditionitem.md) object has the following elements: [Id](#id), [Name](#name), [Type](#type).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="id"></a>Id|The unique identifier of the audience condition item. Required.|**long**|
|<a name="name"></a>Name|The name of the audience condition item.|**string**|
|<a name="type"></a>Type|The type of the audience condition item.|[AudienceType](audiencetype.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AudienceCondition](audiencecondition.md)  
