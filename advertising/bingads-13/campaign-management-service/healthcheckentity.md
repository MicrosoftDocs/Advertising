---
title: HealthCheckEntity Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the health check entity data object.
---
# HealthCheckEntity Data Object - Campaign Management
Defines the health check entity data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="HealthCheckEntity" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="HealthCheckEntityId" type="xs:long" />
    <xs:element minOccurs="0" name="HealthCheckEntityLevel" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "HealthCheckEntityId": "LongValueHere",
  "HealthCheckEntityLevel": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [HealthCheckEntity](healthcheckentity.md) object has the following elements: [HealthCheckEntityId](#healthcheckentityid), [HealthCheckEntityLevel](#healthcheckentitylevel).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="healthcheckentityid"></a>HealthCheckEntityId|Reserved.|**long**|
|<a name="healthcheckentitylevel"></a>HealthCheckEntityLevel|Reserved.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetHealthCheck](gethealthcheck.md)  
[HealthCheckData](healthcheckdata.md)  
[HealthCheckError](healthcheckerror.md)  
