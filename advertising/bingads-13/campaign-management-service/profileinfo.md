---
title: ProfileInfo Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the profile info data object.
---
# ProfileInfo Data Object - Campaign Management
Defines the profile info data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="ProfileInfo" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="Type" type="tns:ProfileType" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Id": "LongValueHere",
  "Type": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [ProfileInfo](profileinfo.md) object has the following elements: [Id](#id), [Type](#type).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="id"></a>Id|Reserved.|**long**|
|<a name="type"></a>Type|Reserved.|[ProfileType](profiletype.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[ProfileDimension](profiledimension.md)  
