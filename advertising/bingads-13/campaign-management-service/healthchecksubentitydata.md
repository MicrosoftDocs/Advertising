---
title: HealthCheckSubEntityData Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the health check sub entity data object.
---
# HealthCheckSubEntityData Data Object - Campaign Management
Defines the health check sub entity data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="HealthCheckSubEntityData" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="SubEntityHealthIssueCount" type="xs:int" />
    <xs:element minOccurs="0" name="SubEntityIds" nillable="true" type="q194:ArrayOflong" xmlns:q194="http://schemas.microsoft.com/2003/10/Serialization/Arrays" />
    <xs:element minOccurs="0" name="SubEntityLevel" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "SubEntityHealthIssueCount": IntValueHere,
  "SubEntityIds": [
    "LongValueHere"
  ],
  "SubEntityLevel": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [HealthCheckSubEntityData](healthchecksubentitydata.md) object has the following elements: [SubEntityHealthIssueCount](#subentityhealthissuecount), [SubEntityIds](#subentityids), [SubEntityLevel](#subentitylevel).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="subentityhealthissuecount"></a>SubEntityHealthIssueCount|The number of health issues found for the subordinate entities.|**int**|
|<a name="subentityids"></a>SubEntityIds|The Microsoft Advertising identifiers of the subordinate entities with health issues.|**long** array|
|<a name="subentitylevel"></a>SubEntityLevel|The entity level of the subordinate entities.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[HealthCheckData](healthcheckdata.md)  
