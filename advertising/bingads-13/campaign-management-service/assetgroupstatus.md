---
title: AssetGroupStatus Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: The status of the AssetGroup.
---
# AssetGroupStatus Value Set - Campaign Management
The status of the AssetGroup.

## Syntax
```xml
<xs:simpleType name="AssetGroupStatus" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Active" />
    <xs:enumeration value="Paused" />
    <xs:enumeration value="Deleted" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AssetGroupStatus](assetgroupstatus.md) value set has the following values: [Active](#active), [Deleted](#deleted), [Paused](#paused).

|Value|Description|
|-----------|---------------|
|<a name="active"></a>Active|The status of the AssetGroup is *Active*.|
|<a name="deleted"></a>Deleted|The status of the AssetGroup is *Deleted*.|
|<a name="paused"></a>Paused|The status of the AssetGroup is *Paused*.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AssetGroup](assetgroup.md)  
