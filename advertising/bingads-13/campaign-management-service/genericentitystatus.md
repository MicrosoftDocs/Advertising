---
title: GenericEntityStatus Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the generic entity status value set.
---
# GenericEntityStatus Value Set - Campaign Management
Defines the generic entity status value set.

## Syntax
```xml
<xs:simpleType name="GenericEntityStatus" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Active" />
    <xs:enumeration value="Paused" />
    <xs:enumeration value="Disapproved" />
    <xs:enumeration value="Inactive" />
    <xs:enumeration value="Deleted" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [GenericEntityStatus](genericentitystatus.md) value set has the following values: [Active](#active), [Deleted](#deleted), [Disapproved](#disapproved), [Inactive](#inactive), [Paused](#paused).

|Value|Description|
|-----------|---------------|
|<a name="active"></a>Active|Reserved.|
|<a name="deleted"></a>Deleted|Reserved.|
|<a name="disapproved"></a>Disapproved|Reserved.|
|<a name="inactive"></a>Inactive|Reserved.|
|<a name="paused"></a>Paused|Reserved.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AssetGroupSearchTheme](assetgroupsearchtheme.md)  
[AssetGroupUrlTarget](assetgroupurltarget.md)  
