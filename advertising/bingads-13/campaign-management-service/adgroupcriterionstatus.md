---
title: AdGroupCriterionStatus Value Set - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the possible ad group criterion status values.
---
# AdGroupCriterionStatus Value Set - Campaign Management
Defines the possible ad group criterion status values.

## Syntax
```xml
<xs:simpleType name="AdGroupCriterionStatus" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Active" />
    <xs:enumeration value="Paused" />
    <xs:enumeration value="Deleted" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AdGroupCriterionStatus](adgroupcriterionstatus.md) value set has the following values: [Active](#active), [Deleted](#deleted), [Paused](#paused).

|Value|Description|
|-----------|---------------|
|<a name="active"></a>Active|The criterion is active.|
|<a name="deleted"></a>Deleted|The criterion was deleted. Note that the *Get* operations will not return deleted objects.|
|<a name="paused"></a>Paused|The criterion is paused.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AdGroupCriterion](adgroupcriterion.md)  
