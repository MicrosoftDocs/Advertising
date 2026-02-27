---
title: DiagnosticsFilter Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the DiagnosticsFilter data object.
---
# DiagnosticsFilter Data Object - Campaign Management
Defines the DiagnosticsFilter data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="DiagnosticsFilter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Key" nillable="true" type="xs:string" />
    <xs:element xmlns:q192="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="Values" nillable="true" type="q192:ArrayOfstring" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Key": "ValueHere",
  "Values": [
    "ValueHere"
  ]
}
```

-----

## <a name="elements"></a>Elements

The [DiagnosticsFilter](diagnosticsfilter.md) object has the following elements: [Key](#key), [Values](#values).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="key"></a>Key|The name of the filter.|**string**|
|<a name="values"></a>Values|The values of the filter.|**string** array|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetDiagnostics](getdiagnostics.md)  
