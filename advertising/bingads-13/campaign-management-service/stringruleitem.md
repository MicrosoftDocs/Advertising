---
title: StringRuleItem Data Object - Campaign Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines a rule expression that depends on the string values of the Url or Referrer Url.
ms.subservice: campaign-management-api
---
# StringRuleItem Data Object - Campaign Management
Defines a rule expression that depends on the string values of the Url or Referrer Url.

## Syntax
```xml
<xs:complexType name="StringRuleItem" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:RuleItem">
      <xs:sequence>
        <xs:element minOccurs="0" name="Operand" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="Operator" type="tns:StringOperator" />
        <xs:element minOccurs="0" name="Value" nillable="true" type="xs:string" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [StringRuleItem](stringruleitem.md) object has the following elements: [Operand](#operand), [Operator](#operator), [Value](#value).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="operand"></a>Operand|The rule operand or key on the left hand side of the operator. <br/><br/>Supported values are *Url* and *ReferrerUrl*.<br/><br/>For example to define a rule where the page Url must contain *page.html*, set the *Operand* to *Url*, *Operator* to *Contains*, and *Value* to *page.html*.<br/><br/>**Add:** Required<br/>**Update:** Required|**string**|
|<a name="operator"></a>Operator|The rule item operator.<br/><br/>**Add:** Required<br/>**Update:** Required|[StringOperator](stringoperator.md)|
|<a name="value"></a>Value|The rule value on the right hand side of the operator.<br/><br/>**Add:** Required<br/>**Update:** Required|**string**|

The [StringRuleItem](stringruleitem.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsruleitem"></a>Inherited Elements from RuleItem
The [StringRuleItem](stringruleitem.md) object derives from the [RuleItem](ruleitem.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [StringRuleItem](stringruleitem.md), and might not apply to other objects that inherit the same elements from the [RuleItem](ruleitem.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of rule item. For more information, see [RuleItem Data Object Remarks](ruleitem.md#remarks).|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

