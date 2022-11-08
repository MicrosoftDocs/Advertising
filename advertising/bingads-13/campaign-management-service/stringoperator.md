---
title: StringOperator Value Set - Campaign Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the operators that can be applied to remarketing list rule item string values.
ms.subservice: campaign-management-api
---
# StringOperator Value Set - Campaign Management
Defines the operators that can be applied to remarketing list rule item string values.

## Syntax
```xml
<xs:simpleType name="StringOperator" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="None" />
    <xs:enumeration value="Equals" />
    <xs:enumeration value="Contains" />
    <xs:enumeration value="BeginsWith" />
    <xs:enumeration value="EndsWith" />
    <xs:enumeration value="NotEquals" />
    <xs:enumeration value="DoesNotContain" />
    <xs:enumeration value="DoesNotBeginWith" />
    <xs:enumeration value="DoesNotEndWith" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [StringOperator](stringoperator.md) value set has the following values: [BeginsWith](#beginswith), [Contains](#contains), [DoesNotBeginWith](#doesnotbeginwith), [DoesNotContain](#doesnotcontain), [DoesNotEndWith](#doesnotendwith), [EndsWith](#endswith), [Equals](#equals), [None](#none), [NotEquals](#notequals).

|Value|Description|
|-----------|---------------|
|<a name="beginswith"></a>BeginsWith|Begin with the corresponding string value.|
|<a name="contains"></a>Contains|Contain the corresponding string value.|
|<a name="doesnotbeginwith"></a>DoesNotBeginWith|Does not begin with the corresponding string value.|
|<a name="doesnotcontain"></a>DoesNotContain|Does not contain the corresponding string value.|
|<a name="doesnotendwith"></a>DoesNotEndWith|Does not end with the corresponding string value.|
|<a name="endswith"></a>EndsWith|Does not end with the corresponding string value.|
|<a name="equals"></a>Equals|Equals the corresponding string value.|
|<a name="none"></a>None|Reserved for future use.|
|<a name="notequals"></a>NotEquals|Does not equal the corresponding string value.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[CustomEventsRule](customeventsrule.md)  
[StringRuleItem](stringruleitem.md)  
