---
title: AuditPointResult Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the AuditPointResult data object.
---
# AuditPointResult Data Object - Campaign Management
Defines the AuditPointResult data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="AuditPointResult" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Description" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Details" nillable="true" type="q195:ArrayOfKeyValueOfstringstring" xmlns:q195="http://schemas.microsoft.com/2003/10/Serialization/Arrays" />
    <xs:element minOccurs="0" name="Key" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Severity" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Timestamp" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Description": "ValueHere",
  "Details": "ValueHere",
  "Key": "ValueHere",
  "Severity": "ValueHere",
  "Timestamp": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [AuditPointResult](auditpointresult.md) object has the following elements: [Description](#description), [Details](#details), [Key](#key), [Severity](#severity), [Timestamp](#timestamp).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="description"></a>Description|The audit point description.|**string**|
|<a name="details"></a>Details|Additional key and value details about the audit point.|**ArrayOfKeyValueOfstringstring**|
|<a name="key"></a>Key|The key that identifies the audit point.|**string**|
|<a name="severity"></a>Severity|The severity of the audit point result.|**string**|
|<a name="timestamp"></a>Timestamp|The timestamp of the audit point result.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[CategoryResult](categoryresult.md)  
