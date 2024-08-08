---
title: AssetGroupStatus Value Set Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: The status of the AssetGroup.(test)
---
# AssetGroupStatus Value Set Test - Campaign Management
The status of the AssetGroup.

## Syntax
```xml
<xs:simpleType name="AssetGroupStatus" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Active" />
    <xs:enumeration value="Paused" />
    <xs:enumeration value="Deleted" />
    <xs:enumeration value="Expired" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AssetGroupStatus](assetgroupstatus.md) value set has the following values: [Active](#active), [Deleted](#deleted), [Expired](#expired), [Paused](#paused).

|Value|Description|
|-----------|---------------|
|<a name="active"></a>Active|The asset group is active, which indicates that the asset group can be served.|
|<a name="deleted"></a>Deleted|This status is for internal use only. Because all *Get* operations do not return deleted objects, you will not see an object with this status.|
|<a name="expired"></a>Expired|The asset group is expired. This status is set if you specify an end date for the asset group and the end date passes. You can update the end date to start serving the asset group again.|
|<a name="paused"></a>Paused|The asset group is paused, which indicates that the asset group will not serve.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AssetGroup](assetgroup.md)  
