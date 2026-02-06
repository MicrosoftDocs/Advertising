---
title: ImportResult Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Contains the status, run time, and statistical results for an import job that has run.
---
# ImportResult Data Object - Campaign Management
Contains the status, run time, and statistical results for an import job that has run.

[!INCLUDE[exta-to-rsa-migration](../../scripts/includes/exta-rsa-migration-import.md)]

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="ImportResult" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="EntityStatistics" nillable="true" type="tns:ArrayOfImportEntityStatistics" />
    <xs:element minOccurs="0" name="ErrorLogUrl" nillable="true" type="xs:string" />
    <xs:element xmlns:q151="http://schemas.datacontract.org/2004/07/System.Collections.Generic" minOccurs="0" name="ForwardCompatibilityMap" nillable="true" type="q151:ArrayOfKeyValuePairOfstringstring" />
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="ImportJob" nillable="true" type="tns:ImportJob" />
    <xs:element minOccurs="0" name="StartTimeInUTC" type="xs:dateTime" />
    <xs:element minOccurs="0" name="Status" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "EntityStatistics": [
    {
      "Additions": IntValueHere,
      "Changes": IntValueHere,
      "Deletions": IntValueHere,
      "EntityType": "ValueHere",
      "Errors": IntValueHere,
      "Total": IntValueHere
    }
  ],
  "ErrorLogUrl": "ValueHere",
  "ForwardCompatibilityMap": [
    {
      "key": "ValueHere",
      "value": "ValueHere"
    }
  ],
  "Id": "ValueHere",
  "ImportJob": {
    "CreatedByUserId": "LongValueHere",
    "CreatedByUserName": "ValueHere",
    "CreatedDateTimeInUTC": "ValueHere",
    "Frequency": {
      "Cron": "ValueHere",
      "TimeZone": "ValueHere",
      "Type": "ValueHere"
    },
    "Id": "LongValueHere",
    "ImportOption": {
      "ForwardCompatibilityMap": [
        {
          "key": "ValueHere",
          "value": "ValueHere"
        }
      ],
      "Type": "FileImportOption"
    },
    "LastRunTimeInUTC": "ValueHere",
    "Name": "ValueHere",
    "NotificationEmail": "ValueHere",
    "NotificationType": "ValueHere",
    "Status": "ValueHere",
    "Type": "FileImportJob",
    "FileSource": "ValueHere",
    "FileUrl": "ValueHere"
  },
  "StartTimeInUTC": "ValueHere",
  "Status": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [ImportResult](importresult.md) object has the following elements: [EntityStatistics](#entitystatistics), [ErrorLogUrl](#errorlogurl), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Id](#id), [ImportJob](#importjob), [StartTimeInUTC](#starttimeinutc), [Status](#status).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="entitystatistics"></a>EntityStatistics|The statistical import results for each supported entity type.<br/><br/>For more information, see the [ImportEntityStatistics Remarks](importentitystatistics.md#remarks).|[ImportEntityStatistics](importentitystatistics.md) array|
|<a name="errorlogurl"></a>ErrorLogUrl|The URL where you can download the error logs.<br/><br/>This element will be null or empty if there were no errors.|**string**|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>Forward compatibility changes will be noted here in future releases. There are currently no forward compatibility changes for this object.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="id"></a>Id|The unique Microsoft Advertising identifier of the import result.|**string**|
|<a name="importjob"></a>ImportJob|The settings in effect at the time the import job was run.<br/><br/>If the [ImportType](getimportresults.md#importtype) of the [GetImportResults](getimportresults.md) operation was set to "GoogleImportJob", this element will include a [GoogleImportJob](googleimportjob.md) object.|[ImportJob](importjob.md)|
|<a name="starttimeinutc"></a>StartTimeInUTC|The date and time the import job was run.|**dateTime**|
|<a name="status"></a>Status|The import job status.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetImportResults](getimportresults.md)  
