---
title: AudienceIdName Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the audience ID name data object.
---
# AudienceIdName Data Object - Campaign Management
Defines the audience ID name data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="AudienceIdName" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Id" type="xs:long" />
    <xs:element minOccurs="0" name="Name" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Id": "LongValueHere",
  "Name": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [AudienceIdName](audienceidname.md) object has the following elements: [Id](#id), [Name](#name).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="id"></a>Id|Reserved.|**long**|
|<a name="name"></a>Name|Reserved.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[NewCustomerAcquisitionGoal](newcustomeracquisitiongoal.md)  
