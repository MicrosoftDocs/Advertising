---
title: AdRecommendationJobInfo Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the ad recommendation job info data object.
---
# AdRecommendationJobInfo Data Object - Campaign Management
Defines the ad recommendation job info data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="AdRecommendationJobInfo" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="ErrorCode" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="ErrorMessage" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="JobId" type="xs:long" />
    <xs:element minOccurs="0" name="JobStatus" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "ErrorCode": "ValueHere",
  "ErrorMessage": "ValueHere",
  "JobId": "LongValueHere",
  "JobStatus": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [AdRecommendationJobInfo](adrecommendationjobinfo.md) object has the following elements: [ErrorCode](#errorcode), [ErrorMessage](#errormessage), [JobId](#jobid), [JobStatus](#jobstatus).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="errorcode"></a>ErrorCode|The error code when the JobStatus is *Failed*.|**string**|
|<a name="errormessage"></a>ErrorMessage|The error message when the JobStatus is *Failed*.|**string**|
|<a name="jobid"></a>JobId|The unique identifier of the job.|**long**|
|<a name="jobstatus"></a>JobStatus|The status of the current job. Possible values are: *Completed*, *InProgress*, *Failed*.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[CreateResponsiveAdRecommendation](createresponsiveadrecommendation.md)  
[GetResponsiveAdRecommendationJob](getresponsiveadrecommendationjob.md)  
