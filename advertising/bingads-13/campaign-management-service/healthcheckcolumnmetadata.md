---
title: HealthCheckColumnMetadata Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the health check column metadata data object.
---
# HealthCheckColumnMetadata Data Object - Campaign Management
Defines the health check column metadata data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="HealthCheckColumnMetadata" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="HealthCheckActionLinksMetadata" nillable="true" type="tns:ArrayOfHealthCheckActionLinkMetadata" />
    <xs:element minOccurs="0" name="Key" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Title" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Type" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "HealthCheckActionLinksMetadata": [
    {
      "LinkName": "ValueHere",
      "LinkTemplate": "ValueHere",
      "LinkType": "ValueHere"
    }
  ],
  "Key": "ValueHere",
  "Title": "ValueHere",
  "Type": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [HealthCheckColumnMetadata](healthcheckcolumnmetadata.md) object has the following elements: [HealthCheckActionLinksMetadata](#healthcheckactionlinksmetadata), [Key](#key), [Title](#title), [Type](#type).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="healthcheckactionlinksmetadata"></a>HealthCheckActionLinksMetadata|Reserved.|[HealthCheckActionLinkMetadata](healthcheckactionlinkmetadata.md) array|
|<a name="key"></a>Key|Reserved.|**string**|
|<a name="title"></a>Title|Reserved.|**string**|
|<a name="type"></a>Type|Reserved.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[HealthCheckMetadata](healthcheckmetadata.md)  
