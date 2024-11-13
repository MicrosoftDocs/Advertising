---
title: AdStatus Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the possible status values of an ad.
---
# AdStatus Value Set - Campaign Management
Defines the possible status values of an ad.

## Syntax
```xml
<xs:simpleType name="AdStatus" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Inactive" />
    <xs:enumeration value="Active" />
    <xs:enumeration value="Paused" />
    <xs:enumeration value="Deleted" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AdStatus](adstatus.md) value set has the following values: [Active](#active), [Deleted](#deleted), [Inactive](#inactive), [Paused](#paused).

|Value|Description|
|-----------|---------------|
|<a name="active"></a>Active|The ad can be served.|
|<a name="deleted"></a>Deleted|This status is for internal use only. Because all Get operations do not return deleted objects, you will not see an object with this status.|
|<a name="inactive"></a>Inactive|This status is read-only. The ad is undergoing editorial review or has failed editorial review. To determine the  ad editorial status, see [AdEditorialStatus](adeditorialstatus.md).|
|<a name="paused"></a>Paused|The ad will not serve until the owner resumes it.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[Ad](ad.md)  
