---
title: HealthCheckData Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the health check data data object.
---
# HealthCheckData Data Object - Campaign Management
Defines the health check data data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="HealthCheckData" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="HealthCheckDataVersion" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="HealthCheckEntity" nillable="true" type="tns:HealthCheckEntity" />
    <xs:element minOccurs="0" name="HealthCheckJsonData" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="HealthCheckName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="HealthCheckSubEntityResults" nillable="true" type="tns:HealthCheckSubEntityData" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "HealthCheckDataVersion": "ValueHere",
  "HealthCheckEntity": {
    "HealthCheckEntityId": "LongValueHere",
    "HealthCheckEntityLevel": "ValueHere"
  },
  "HealthCheckJsonData": "ValueHere",
  "HealthCheckName": "ValueHere",
  "HealthCheckSubEntityResults": {
    "SubEntityHealthIssueCount": IntValueHere,
    "SubEntityIds": [
      "LongValueHere"
    ],
    "SubEntityLevel": "ValueHere"
  }
}
```

-----

## <a name="elements"></a>Elements

The [HealthCheckData](healthcheckdata.md) object has the following elements: [HealthCheckDataVersion](#healthcheckdataversion), [HealthCheckEntity](#healthcheckentity), [HealthCheckJsonData](#healthcheckjsondata), [HealthCheckName](#healthcheckname), [HealthCheckSubEntityResults](#healthchecksubentityresults).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="healthcheckdataversion"></a>HealthCheckDataVersion|Reserved.|**string**|
|<a name="healthcheckentity"></a>HealthCheckEntity|Reserved.|[HealthCheckEntity](healthcheckentity.md)|
|<a name="healthcheckjsondata"></a>HealthCheckJsonData|Reserved.|**string**|
|<a name="healthcheckname"></a>HealthCheckName|Reserved.|**string**|
|<a name="healthchecksubentityresults"></a>HealthCheckSubEntityResults|Reserved.|[HealthCheckSubEntityData](healthchecksubentitydata.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetHealthCheck](gethealthcheck.md)  
