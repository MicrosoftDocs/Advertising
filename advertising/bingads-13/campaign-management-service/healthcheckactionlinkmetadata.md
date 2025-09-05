---
title: HealthCheckActionLinkMetadata Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the health check action link metadata data object.
---
# HealthCheckActionLinkMetadata Data Object - Campaign Management
Defines the health check action link metadata data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="HealthCheckActionLinkMetadata" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="LinkName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="LinkTemplate" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="LinkType" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "LinkName": "ValueHere",
  "LinkTemplate": "ValueHere",
  "LinkType": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [HealthCheckActionLinkMetadata](healthcheckactionlinkmetadata.md) object has the following elements: [LinkName](#linkname), [LinkTemplate](#linktemplate), [LinkType](#linktype).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="linkname"></a>LinkName|Reserved.|**string**|
|<a name="linktemplate"></a>LinkTemplate|Reserved.|**string**|
|<a name="linktype"></a>LinkType|Reserved.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[HealthCheckColumnMetadata](healthcheckcolumnmetadata.md)  
