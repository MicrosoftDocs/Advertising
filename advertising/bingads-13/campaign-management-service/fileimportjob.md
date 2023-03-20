---
title: FileImportJob Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: FileImportJob is reserved for future use.
---
# FileImportJob Data Object - Campaign Management
FileImportJob is reserved for future use. 

## Syntax
```xml
<xs:complexType name="FileImportJob" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:ImportJob">
      <xs:sequence>
        <xs:element name="FileSource" nillable="true" type="xs:string" />
        <xs:element name="FileUrl" nillable="true" type="xs:string" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [FileImportJob](fileimportjob.md) object has the following elements: [FileSource](#filesource), [FileUrl](#fileurl).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="filesource"></a>FileSource|Reserved for future use.|**string**|
|<a name="fileurl"></a>FileUrl|Reserved for future use.|**string**|

The [FileImportJob](fileimportjob.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsimportjob"></a>Inherited Elements from ImportJob
The [FileImportJob](fileimportjob.md) object derives from the [ImportJob](importjob.md) object, and inherits the following elements: [CreatedByUserId](#createdbyuserid), [CreatedByUserName](#createdbyusername), [CreatedDateTimeInUTC](#createddatetimeinutc), [Frequency](#frequency), [Id](#id), [ImportOption](#importoption), [LastRunTimeInUTC](#lastruntimeinutc), [Name](#name), [NotificationEmail](#notificationemail), [NotificationType](#notificationtype), [Status](#status), [Type](#type). The descriptions below are specific to [FileImportJob](fileimportjob.md), and might not apply to other objects that inherit the same elements from the [ImportJob](importjob.md) object.  

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
|<a name="type"></a>Type|The type of the import job.<br/><br/>This value is *FileImportJob* when you retrieve a File import job.<br/><br/>For more information about import job types, see the [ImportJob Data Object Remarks](importjob.md#remarks).|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

