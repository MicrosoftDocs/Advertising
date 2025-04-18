---
title: AdExtensionIdToEntityIdAssociation Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines an object that associates an ad extension to a supported entity, for example ad group or campaign.
---
# AdExtensionIdToEntityIdAssociation Data Object - Campaign Management
Defines an object that associates an ad extension to a supported entity, for example ad group or campaign.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="AdExtensionIdToEntityIdAssociation" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element name="AdExtensionId" type="xs:long" />
    <xs:element name="EntityId" type="xs:long" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AdExtensionId": "LongValueHere",
  "EntityId": "LongValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [AdExtensionIdToEntityIdAssociation](adextensionidtoentityidassociation.md) object has the following elements: [AdExtensionId](#adextensionid), [EntityId](#entityid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="adextensionid"></a>AdExtensionId|The system-generated identifier of the ad extension.|**long**|
|<a name="entityid"></a>EntityId|The identifier of an entity associated with the ad extension.|**long**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[DeleteAdExtensionsAssociations](deleteadextensionsassociations.md)  
[GetAdExtensionsEditorialReasons](getadextensionseditorialreasons.md)  
[SetAdExtensionsAssociations](setadextensionsassociations.md)  
