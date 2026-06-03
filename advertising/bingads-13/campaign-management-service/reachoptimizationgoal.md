---
title: ReachOptimizationGoal Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the reach optimization goal value set.
---
# ReachOptimizationGoal Value Set - Campaign Management
Defines the reach optimization goal value set.

## Syntax
```xml
<xs:simpleType name="ReachOptimizationGoal" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Unspecified" />
    <xs:enumeration value="MaxImpressions" />
    <xs:enumeration value="MaxUniqueReach" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [ReachOptimizationGoal](reachoptimizationgoal.md) value set has the following values: [MaxImpressions](#maximpressions), [MaxUniqueReach](#maxuniquereach), [Unspecified](#unspecified).

|Value|Description|
|-----------|---------------|
|<a name="maximpressions"></a>MaxImpressions|Reserved.|
|<a name="maxuniquereach"></a>MaxUniqueReach|Reserved.|
|<a name="unspecified"></a>Unspecified|Reserved.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[ReachOptimizationGoalSetting](reachoptimizationgoalsetting.md)  
