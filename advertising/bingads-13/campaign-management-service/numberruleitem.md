---
title: NumberRuleItem Data Object - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Reserved.
---
# NumberRuleItem Data Object - Campaign Management
Reserved.

## Syntax
```xml
<xs:complexType name="NumberRuleItem" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:RuleItem">
      <xs:sequence>
        <xs:element minOccurs="0" name="Operand" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="Operator" type="tns:NumberOperator" />
        <xs:element minOccurs="0" name="Value" nillable="true" type="xs:string" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [NumberRuleItem](numberruleitem.md) object has the following elements: [Operand](#operand), [Operator](#operator), [Value](#value).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="operand"></a>Operand|Reserved.|**string**|
|<a name="operator"></a>Operator|Reserved.|[NumberOperator](numberoperator.md)|
|<a name="value"></a>Value|Reserved.|**string**|

The [NumberRuleItem](numberruleitem.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsruleitem"></a>Inherited Elements from RuleItem
The [NumberRuleItem](numberruleitem.md) object derives from the [RuleItem](ruleitem.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [NumberRuleItem](numberruleitem.md), and might not apply to other objects that inherit the same elements from the [RuleItem](ruleitem.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|Reserved.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

