---
title: DiagnosticsSettings Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the DiagnosticsSettings data object.
---
# DiagnosticsSettings Data Object - Campaign Management
Defines the DiagnosticsSettings data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="DiagnosticsSettings" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="EnableCache" type="xs:boolean" />
    <xs:element minOccurs="0" name="LastCheckTimeUTC" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "EnableCache": "ValueHere",
  "LastCheckTimeUTC": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [DiagnosticsSettings](diagnosticssettings.md) object has the following elements: [EnableCache](#enablecache), [LastCheckTimeUTC](#lastchecktimeutc).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="enablecache"></a>EnableCache|The cache is enabled if *True*.|**boolean**|
|<a name="lastchecktimeutc"></a>LastCheckTimeUTC|The last-checked time in UTC.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetDiagnostics](getdiagnostics.md)  
