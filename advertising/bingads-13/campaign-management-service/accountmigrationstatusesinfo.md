---
title: AccountMigrationStatusesInfo Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines an object that contains migration status for an account.
---
# AccountMigrationStatusesInfo Data Object - Campaign Management
Defines an object that contains migration status for an account.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="AccountMigrationStatusesInfo" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element name="AccountId" type="xs:long" />
    <xs:element minOccurs="0" name="MigrationStatusInfos" nillable="true" type="tns:ArrayOfMigrationStatusInfo" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AccountId": "LongValueHere",
  "MigrationStatusInfos": [
    {
      "MigrationType": "ValueHere",
      "StartTimeInUtc": "ValueHere",
      "Status": "ValueHere"
    }
  ]
}
```

-----

## <a name="elements"></a>Elements

The [AccountMigrationStatusesInfo](accountmigrationstatusesinfo.md) object has the following elements: [AccountId](#accountid), [MigrationStatusInfos](#migrationstatusinfos).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountid"></a>AccountId|The Microsoft Advertising identifier of the account.|**long**|
|<a name="migrationstatusinfos"></a>MigrationStatusInfos|The list of migration status info for the corresponding account.|[MigrationStatusInfo](migrationstatusinfo.md) array|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetAccountMigrationStatuses](getaccountmigrationstatuses.md)  
