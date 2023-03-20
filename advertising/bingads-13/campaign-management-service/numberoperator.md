---
title: NumberOperator Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the operators that can be applied to remarketing list rule item number values.
---
# NumberOperator Value Set - Campaign Management
Defines the operators that can be applied to remarketing list rule item number values.

## Syntax
```xml
<xs:simpleType name="NumberOperator" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="None" />
    <xs:enumeration value="Equals" />
    <xs:enumeration value="GreaterThan" />
    <xs:enumeration value="LessThan" />
    <xs:enumeration value="GreaterThanEqualTo" />
    <xs:enumeration value="LessThanEqualTo" />
    <xs:enumeration value="NotEquals" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [NumberOperator](numberoperator.md) value set has the following values: [Equals](#equals), [GreaterThan](#greaterthan), [GreaterThanEqualTo](#greaterthanequalto), [LessThan](#lessthan), [LessThanEqualTo](#lessthanequalto), [None](#none), [NotEquals](#notequals).

|Value|Description|
|-----------|---------------|
|<a name="equals"></a>Equals|Equals the corresponding number value.|
|<a name="greaterthan"></a>GreaterThan|Greater than the corresponding number value.|
|<a name="greaterthanequalto"></a>GreaterThanEqualTo|Greater than or equal to the corresponding number value.|
|<a name="lessthan"></a>LessThan|Less than the corresponding number value.|
|<a name="lessthanequalto"></a>LessThanEqualTo|Less than or equal to the corresponding number value.|
|<a name="none"></a>None|Reserved for future use.|
|<a name="notequals"></a>NotEquals|Reserved.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[CustomEventsRule](customeventsrule.md)  
[NumberRuleItem](numberruleitem.md)  
