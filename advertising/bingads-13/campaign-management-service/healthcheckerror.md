---
title: HealthCheckError Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the health check error data object.
---
# HealthCheckError Data Object - Campaign Management
Defines the health check error data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="HealthCheckError" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Errors" nillable="true" type="tns:ArrayOfOperationError" />
    <xs:element minOccurs="0" name="HealthCheckEntity" nillable="true" type="tns:HealthCheckEntity" />
    <xs:element minOccurs="0" name="HealthCheckName" nillable="true" type="xs:string" />
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
  "HealthCheckEntity": {
    "HealthCheckEntityId": "LongValueHere",
    "HealthCheckEntityLevel": "ValueHere"
  },
  "HealthCheckName": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [HealthCheckError](healthcheckerror.md) object has the following elements: [Errors](#errors), [HealthCheckEntity](#healthcheckentity), [HealthCheckName](#healthcheckname).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="errors"></a>Errors|An array of *OperationError* objects corresponding to errors encountered during the system processing of the bulk file after your download request was submitted.|[OperationError](operationerror.md) array|
|<a name="healthcheckentity"></a>HealthCheckEntity|The health check entity.|[HealthCheckEntity](healthcheckentity.md)|
|<a name="healthcheckname"></a>HealthCheckName|The health check name.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetHealthCheck](gethealthcheck.md)  
