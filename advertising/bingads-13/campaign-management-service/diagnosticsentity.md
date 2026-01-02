---
title: DiagnosticsEntity Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the DiagnosticsEntity data object.
---
# DiagnosticsEntity Data Object - Campaign Management
Defines the DiagnosticsEntity data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="DiagnosticsEntity" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Id" type="xs:long" />
    <xs:element minOccurs="0" name="SubType" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Type" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Id": "LongValueHere",
  "SubType": "ValueHere",
  "Type": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [DiagnosticsEntity](diagnosticsentity.md) object has the following elements: [Id](#id), [SubType](#subtype), [Type](#type).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="id"></a>Id|The diagnostic entity ID.|**long**|
|<a name="subtype"></a>SubType|The diagnostic entity sub type.|**string**|
|<a name="type"></a>Type|The diagnostic entity type.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetDiagnostics](getdiagnostics.md)  
