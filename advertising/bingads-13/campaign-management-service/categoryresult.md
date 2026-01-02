---
title: CategoryResult Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the CategoryResult data object.
---
# CategoryResult Data Object - Campaign Management
Defines the CategoryResult data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="CategoryResult" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AuditPoints" nillable="true" type="tns:ArrayOfAuditPointResult" />
    <xs:element minOccurs="0" name="Key" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AuditPoints": [
    {
      "Description": "ValueHere",
      "Details": "ValueHere",
      "Key": "ValueHere",
      "Severity": "ValueHere"
    }
  ],
  "Key": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [CategoryResult](categoryresult.md) object has the following elements: [AuditPoints](#auditpoints), [Key](#key).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="auditpoints"></a>AuditPoints|Reserved.|[AuditPointResult](auditpointresult.md) array|
|<a name="key"></a>Key|Reserved.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[EntityResult](entityresult.md)  
