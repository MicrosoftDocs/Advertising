---
title: DailySummary Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a data object for a summary of the offline conversion reports for the day.(test)
---
# DailySummary Data Object Test - Campaign Management
Defines a data object for a summary of the offline conversion reports for the day.

# [XML](#tab/xml)

```xml
<xs:complexType name="DailySummary" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="FailureCount" type="xs:int" />
    <xs:element minOccurs="0" name="FileUrl" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="FileUrlExpiryTimeUtc" type="xs:dateTime" />
    <xs:element minOccurs="0" name="SuccessCount" type="xs:int" />
    <xs:element minOccurs="0" name="UploadDate" type="xs:dateTime" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "FailureCount": IntValueHere,
  "FileUrl": "ValueHere",
  "FileUrlExpiryTimeUtc": "ValueHere",
  "SuccessCount": IntValueHere,
  "UploadDate": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [DailySummary](dailysummary.md) object has the following elements: [FailureCount](#failurecount), [FileUrl](#fileurl), [FileUrlExpiryTimeUtc](#fileurlexpirytimeutc), [SuccessCount](#successcount), [UploadDate](#uploaddate).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="failurecount"></a>FailureCount|The number of failed conversions.|**int**|
|<a name="fileurl"></a>FileUrl|The URL of the report.|**string**|
|<a name="fileurlexpirytimeutc"></a>FileUrlExpiryTimeUtc|The expiry time of the report in UTC time.|**dateTime**|
|<a name="successcount"></a>SuccessCount|The number of successful conversions.|**int**|
|<a name="uploaddate"></a>UploadDate|The date of the report in local time.|**dateTime**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetOfflineConversionReports](getofflineconversionreports.md)  
