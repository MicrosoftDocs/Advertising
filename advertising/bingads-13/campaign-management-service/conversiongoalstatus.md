---
title: ConversionGoalStatus Value Set - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines the possible user-determined status values of a conversion goal.
---
# ConversionGoalStatus Value Set - Campaign Management
Defines the possible user-determined status values of a conversion goal. 

These are the status values that a user can decide to set, for example a goal can be set to [Paused](#paused) to stop tracking conversions for that goal. You can activate a paused conversion goal, and vice versa. For status values that can be set by the system, for example whether or not the UET tag is verified, see [ConversionGoalTrackingStatus](conversiongoaltrackingstatus.md).   

## Syntax
```xml
<xs:simpleType name="ConversionGoalStatus" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Active" />
    <xs:enumeration value="Paused" />
    <xs:enumeration value="Deleted" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [ConversionGoalStatus](conversiongoalstatus.md) value set has the following values: [Active](#active), [Deleted](#deleted), [Paused](#paused).

|Value|Description|
|-----------|---------------|
|<a name="active"></a>Active|The conversion goal is active.<br/><br/>The status is shown as "Enabled" in the Microsoft Advertising UI.|
|<a name="deleted"></a>Deleted|This status is for internal use only.<br/><br/>Because all Get operations do not return deleted objects, you will not see an object with this status.|
|<a name="paused"></a>Paused|The conversion goal is paused.<br/><br/>While a conversion goal is paused, conversions will not be tracked for the corresponding goal.<br/><br/>The status is shown as "Removed" in the Microsoft Advertising UI.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[ConversionGoal](conversiongoal.md)  
