---
title: ValueOperator Value Set - Campaign Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the operators that can be applied to values within a conversion event goal.
ms.subservice: campaign-management-api
---
# ValueOperator Value Set - Campaign Management
Defines the operators that can be applied to values within a conversion event goal. 

## Syntax
```xml
<xs:simpleType name="ValueOperator" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Equals" />
    <xs:enumeration value="LessThan" />
    <xs:enumeration value="GreaterThan" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [ValueOperator](valueoperator.md) value set has the following values: [Equals](#equals), [GreaterThan](#greaterthan), [LessThan](#lessthan).

|Value|Description|
|-----------|---------------|
|<a name="equals"></a>Equals|The property should be equal to the corresponding value.|
|<a name="greaterthan"></a>GreaterThan|The property should be greater than the corresponding value.|
|<a name="lessthan"></a>LessThan|The property should be less than the corresponding value.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[EventGoal](eventgoal.md)  
