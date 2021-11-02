---
title: RuleItem Data Object - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the base class of a remarketing list rule item.
---
# RuleItem Data Object - Campaign Management
Defines the base class of a remarketing list rule item.

Do not try to instantiate a *RuleItem*. You can create one or more of the following objects that derive from it.
- [StringRuleItem](stringruleitem.md)

## Syntax
```xml
<xs:complexType name="RuleItem" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Type" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [RuleItem](ruleitem.md) object has the following elements: [Type](#type).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of rule item. For more information, see [Remarks](#remarks).|**string**|

## <a name="remarks"></a>Remarks
For Java and the .NET languages, do not set the *Type* element because the value is determined by the type of rule item that you instantiate.

If you generate the SOAP manually, use the *type* attribute of the `<RuleItem>` node as shown in the following example, to specify that the rule item is a string rule item.

```xml
<e145:Items p4:nil="false">
  <e145:RuleItem p4:type="StringRuleItem">
    <e145:Operand p4:nil="false">Url</e145:Operand>
    <e145:Operator>Contains</e145:Operator>
    <e145:Value p4:nil="false">xyz</e145:Value>
  </e145:RuleItem>
</e145:Items>
```

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[RuleItemGroup](ruleitemgroup.md)  
