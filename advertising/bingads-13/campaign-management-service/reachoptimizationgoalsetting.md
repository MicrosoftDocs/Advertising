---
title: ReachOptimizationGoalSetting Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the reach optimization goal setting data object.
---
# ReachOptimizationGoalSetting Data Object - Campaign Management
Defines the reach optimization goal setting data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="ReachOptimizationGoalSetting" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Setting">
      <xs:sequence>
        <xs:element minOccurs="0" name="OptimizationGoal" nillable="true" type="tns:ReachOptimizationGoal">
          <xs:annotation>
            <xs:appinfo>
              <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
            </xs:appinfo>
          </xs:annotation>
        </xs:element>
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "ReachOptimizationGoalSetting",
  "OptimizationGoal": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [ReachOptimizationGoalSetting](reachoptimizationgoalsetting.md) object has the following elements: [OptimizationGoal](#optimizationgoal).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="optimizationgoal"></a>OptimizationGoal|Reserved.|[ReachOptimizationGoal](reachoptimizationgoal.md)|

The [ReachOptimizationGoalSetting](reachoptimizationgoalsetting.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementssetting"></a>Inherited Elements from Setting
The [ReachOptimizationGoalSetting](reachoptimizationgoalsetting.md) object derives from the [Setting](setting.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [ReachOptimizationGoalSetting](reachoptimizationgoalsetting.md), and might not apply to other objects that inherit the same elements from the [Setting](setting.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|Reserved.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

