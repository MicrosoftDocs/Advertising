---
title: AdGroupStatus Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the possible status values of an ad group.
---
# AdGroupStatus Value Set - Campaign Management
Defines the possible status values of an ad group.

## Syntax
```xml
<xs:simpleType name="AdGroupStatus" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Active" />
    <xs:enumeration value="Paused" />
    <xs:enumeration value="Expired" />
    <xs:enumeration value="Deleted" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AdGroupStatus](adgroupstatus.md) value set has the following values: [Active](#active), [Deleted](#deleted), [Expired](#expired), [Paused](#paused).

|Value|Description|
|-----------|---------------|
|<a name="active"></a>Active|The ad group is active, which indicates that the ad group's ads can be served.|
|<a name="deleted"></a>Deleted|This status is for internal use only. Because all Get operations do not return deleted objects, you will not see an object with this status.|
|<a name="expired"></a>Expired|The ad group expired. This status is set if you specify an end date for the ad group and the end date passes.|
|<a name="paused"></a>Paused|The ad group is paused, which indicates that the ad group's ads will not serve. Ads and keywords that you add in this state are subject to editorial review.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AdGroup](adgroup.md)  
