---
title: AssetLinkEditorialStatus Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the editorial review status values of a linked asset.
---
# AssetLinkEditorialStatus Value Set - Campaign Management
Defines the editorial review status values of a linked asset.

## Syntax
```xml
<xs:simpleType name="AssetLinkEditorialStatus" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Unknown" />
    <xs:enumeration value="Active" />
    <xs:enumeration value="Disapproved" />
    <xs:enumeration value="Inactive" />
    <xs:enumeration value="ActiveLimited" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AssetLinkEditorialStatus](assetlinkeditorialstatus.md) value set has the following values: [Active](#active), [ActiveLimited](#activelimited), [Disapproved](#disapproved), [Inactive](#inactive), [Unknown](#unknown).

|Value|Description|
|-----------|---------------|
|<a name="active"></a>Active|The asset passed editorial review.|
|<a name="activelimited"></a>ActiveLimited|The asset passed editorial review in one or more markets, and one or more elements of the asset is undergoing editorial review in another market. For example the asset passed editorial review for Canada and is still pending review in the United States.|
|<a name="disapproved"></a>Disapproved|The asset failed editorial review.|
|<a name="inactive"></a>Inactive|One or more elements of the asset is undergoing editorial review.|
|<a name="unknown"></a>Unknown|Reserved for future use.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AssetLink](assetlink.md)  
