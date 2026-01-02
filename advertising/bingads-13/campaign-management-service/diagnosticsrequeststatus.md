---
title: DiagnosticsRequestStatus Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the DiagnosticsRequestStatus data object.
---
# DiagnosticsRequestStatus Data Object - Campaign Management
Defines the DiagnosticsRequestStatus data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="DiagnosticsRequestStatus" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Errors" nillable="true" type="tns:ArrayOfOperationError" />
    <xs:element minOccurs="0" name="Status" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Errors": [
    {
      "Code": IntValueHere,
      "Details": "ValueHere",
      "ErrorCode": "ValueHere",
      "Message": "ValueHere"
    }
  ],
  "Status": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [DiagnosticsRequestStatus](diagnosticsrequeststatus.md) object has the following elements: [Errors](#errors), [Status](#status).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="errors"></a>Errors|An array of *OperationError* objects corresponding to errors encountered during the system processing of the bulk file after your download request was submitted.|[OperationError](operationerror.md) array|
|<a name="status"></a>Status|The diagnostic request status.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetDiagnostics](getdiagnostics.md)  
