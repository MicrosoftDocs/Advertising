---
title: ImportJob Data Object - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the base object of an import job.
---
# ImportJob Data Object - Campaign Management
Defines the base object of an import job.

[!INCLUDE[exta-to-rsa-migration](../../scripts/includes/exta-rsa-migration-import.md)]

Do not try to instantiate an *ImportJob*. You can create one or more of the following objects that derive from it. 
- [FileImportJob](fileimportjob.md)
- [GoogleImportJob](googleimportjob.md)

## Syntax
```xml
<xs:complexType name="ImportJob" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="CreatedByUserId" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="CreatedByUserName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="CreatedDateTimeInUTC" nillable="true" type="xs:dateTime" />
    <xs:element minOccurs="0" name="Frequency" nillable="true" type="tns:Frequency" />
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="ImportOption" nillable="true" type="tns:ImportOption" />
    <xs:element minOccurs="0" name="LastRunTimeInUTC" nillable="true" type="xs:dateTime" />
    <xs:element minOccurs="0" name="Name" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="NotificationEmail" nillable="true" type="xs:string">
      <xs:annotation>
        <xs:appinfo>
          <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
        </xs:appinfo>
      </xs:annotation>
    </xs:element>
    <xs:element minOccurs="0" name="NotificationType" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Status" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Type" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [ImportJob](importjob.md) object has the following elements: [CreatedByUserId](#createdbyuserid), [CreatedByUserName](#createdbyusername), [CreatedDateTimeInUTC](#createddatetimeinutc), [Frequency](#frequency), [Id](#id), [ImportOption](#importoption), [LastRunTimeInUTC](#lastruntimeinutc), [Name](#name), [NotificationEmail](#notificationemail), [NotificationType](#notificationtype), [Status](#status), [Type](#type).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="createdbyuserid"></a>CreatedByUserId|The unique identifier of the Microsoft Advertising user who created the import job.|**long**|
|<a name="createdbyusername"></a>CreatedByUserName|The login user name of the Microsoft Advertising user who created the import job.|**string**|
|<a name="createddatetimeinutc"></a>CreatedDateTimeInUTC|The date and time when the import job was created.<br/><br/>The date and time is expressed in Coordinated Universal Time (UTC).|**dateTime**|
|<a name="frequency"></a>Frequency|Determines whether the import job should be run once or scheduled on a recurring basis.<br/><br/>To run the import job now, this element should be nil or empty.|[Frequency](frequency.md)|
|<a name="id"></a>Id|The unique Microsoft Advertising identifier of the import job.|**long**|
|<a name="importoption"></a>ImportOption|The import options that are available via API.|[ImportOption](importoption.md)|
|<a name="lastruntimeinutc"></a>LastRunTimeInUTC|The most recent import date and time for this job.<br/><br/>The date and time is expressed in Coordinated Universal Time (UTC).|**dateTime**|
|<a name="name"></a>Name|The name of the import job|**string**|
|<a name="notificationemail"></a>NotificationEmail|The email address where import results should be sent.<br/><br/>This element is not returned by default. To get this element, include the NotificationEmail value in the ReturnAdditionalFields element when you call the [GetImportJobsByIds](getimportjobsbyids.md#returnadditionalfields) and [GetImportResults](getimportresults.md#returnadditionalfields) service operations.|**string**|
|<a name="notificationtype"></a>NotificationType|Determines whether and how often you want to receive email notifications about the import job results.|**string**|
|<a name="status"></a>Status|The status of the import job.|**string**|
|<a name="type"></a>Type|The type of the import job.<br/><br/>For more information about import job types, see the [Remarks](importjob.md#remarks).|**string**|

## <a name="remarks"></a>Remarks
If you generate the SOAP manually, use the *type* attribute of the `<ImportJob>` node as shown in the following example to specify the type of import schedule.

```xml
<ImportJob i:type="GoogleImportJob" xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
    <Id i:nil="true" />
    <Status i:nil="true" />
      . . .
</ImportJob>
```

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AddImportJobs](addimportjobs.md)  
[GetImportJobsByIds](getimportjobsbyids.md)  
[ImportResult](importresult.md)  
[UpdateImportJobs](updateimportjobs.md)  
