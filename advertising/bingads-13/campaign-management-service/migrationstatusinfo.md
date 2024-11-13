---
title: MigrationStatusInfo Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines an object that contains the migration type and status for an account.
---
# MigrationStatusInfo Data Object - Campaign Management
Defines an object that contains the migration type and status for an account.

# [XML](#tab/xml)

```xml
<xs:complexType name="MigrationStatusInfo" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="MigrationType" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="StartTimeInUtc" nillable="true" type="xs:dateTime" />
    <xs:element name="Status" type="tns:MigrationStatus" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "MigrationType": "ValueHere",
  "StartTimeInUtc": "ValueHere",
  "Status": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [MigrationStatusInfo](migrationstatusinfo.md) object has the following elements: [MigrationType](#migrationtype), [StartTimeInUtc](#starttimeinutc), [Status](#status).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="migrationtype"></a>MigrationType|The migration type.|**string**|
|<a name="starttimeinutc"></a>StartTimeInUtc|The date and time when the migration began. The value is in Coordinated Universal Time (UTC).<br/><br/>The date and time value reflects the date and time at the server, not the client. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).|**dateTime**|
|<a name="status"></a>Status|The migration status.|[MigrationStatus](migrationstatus.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AccountMigrationStatusesInfo](accountmigrationstatusesinfo.md)  
