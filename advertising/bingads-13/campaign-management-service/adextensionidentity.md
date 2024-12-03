---
title: AdExtensionIdentity Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines an object that identifies an ad extension revision.
---
# AdExtensionIdentity Data Object - Campaign Management
Defines an object that identifies an ad extension revision.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="AdExtensionIdentity" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Id" type="xs:long" />
    <xs:element minOccurs="0" name="Version" nillable="true" type="xs:int" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Id": "LongValueHere",
  "Version": IntValueHere
}
```

-----

## <a name="elements"></a>Elements

The [AdExtensionIdentity](adextensionidentity.md) object has the following elements: [Id](#id), [Version](#version).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="id"></a>Id|The system-generated identifier of the ad extension.|**long**|
|<a name="version"></a>Version|The number of times the contents of the ad extension has been updated. The version is set to 1 when you add the extension and is incremented each time it's revised.|**int**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AddAdExtensions](addadextensions.md)  
