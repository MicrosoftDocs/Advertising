---
title: HealthCheckMetadata Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the health check metadata data object.
---
# HealthCheckMetadata Data Object - Campaign Management
Defines the health check metadata data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="HealthCheckMetadata" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="HealthCheckCategory" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="HealthCheckCategoryDisplayName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="HealthCheckColumnsMetadata" nillable="true" type="tns:ArrayOfHealthCheckColumnMetadata" />
    <xs:element minOccurs="0" name="HealthCheckDescription" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="HealthCheckDisplayName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="HealthCheckName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="HealthCheckSeverity" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="HealthCheckSubType" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "HealthCheckCategory": "ValueHere",
  "HealthCheckCategoryDisplayName": "ValueHere",
  "HealthCheckColumnsMetadata": [
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
  ],
  "HealthCheckDescription": "ValueHere",
  "HealthCheckDisplayName": "ValueHere",
  "HealthCheckName": "ValueHere",
  "HealthCheckSeverity": "ValueHere",
  "HealthCheckSubType": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [HealthCheckMetadata](healthcheckmetadata.md) object has the following elements: [HealthCheckCategory](#healthcheckcategory), [HealthCheckCategoryDisplayName](#healthcheckcategorydisplayname), [HealthCheckColumnsMetadata](#healthcheckcolumnsmetadata), [HealthCheckDescription](#healthcheckdescription), [HealthCheckDisplayName](#healthcheckdisplayname), [HealthCheckName](#healthcheckname), [HealthCheckSeverity](#healthcheckseverity), [HealthCheckSubType](#healthchecksubtype).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="healthcheckcategory"></a>HealthCheckCategory|Reserved.|**string**|
|<a name="healthcheckcategorydisplayname"></a>HealthCheckCategoryDisplayName|Reserved.|**string**|
|<a name="healthcheckcolumnsmetadata"></a>HealthCheckColumnsMetadata|Reserved.|[HealthCheckColumnMetadata](healthcheckcolumnmetadata.md) array|
|<a name="healthcheckdescription"></a>HealthCheckDescription|Reserved.|**string**|
|<a name="healthcheckdisplayname"></a>HealthCheckDisplayName|Reserved.|**string**|
|<a name="healthcheckname"></a>HealthCheckName|Reserved.|**string**|
|<a name="healthcheckseverity"></a>HealthCheckSeverity|Reserved.|**string**|
|<a name="healthchecksubtype"></a>HealthCheckSubType|Reserved.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetHealthCheck](gethealthcheck.md)  
