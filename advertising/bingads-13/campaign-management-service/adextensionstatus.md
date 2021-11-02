---
title: AdExtensionStatus Value Set - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the possible status values of an ad extension.
---
# AdExtensionStatus Value Set - Campaign Management
Defines the possible status values of an ad extension.

## Syntax
```xml
<xs:simpleType name="AdExtensionStatus" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Active" />
    <xs:enumeration value="Deleted" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AdExtensionStatus](adextensionstatus.md) value set has the following values: [Active](#active), [Deleted](#deleted).

|Value|Description|
|-----------|---------------|
|<a name="active"></a>Active|The ad extension is active. You can associate an active ad extension with a campaign or ad group.|
|<a name="deleted"></a>Deleted|The ad extension is deleted. This status is for internal use only. The Get operations will not include deleted extensions.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AdExtension](adextension.md)  
