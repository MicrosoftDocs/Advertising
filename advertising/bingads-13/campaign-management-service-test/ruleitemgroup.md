---
title: RuleItemGroup Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an object that contains a list of remarketing list rule items that apply to the same visited page.(test)
---
# RuleItemGroup Data Object Test - Campaign Management
Defines an object that contains a list of remarketing list rule items that apply to the same visited page. 

# [XML](#tab/xml)

```xml
<xs:complexType name="RuleItemGroup" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Items" nillable="true" type="tns:ArrayOfRuleItem" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Items": [
    {
      "Type": "Number",
      "Operand": "ValueHere",
      "Operator": "ValueHere",
      "Value": "ValueHere"
    }
  ]
}
```

-----

## <a name="elements"></a>Elements

The [RuleItemGroup](ruleitemgroup.md) object has the following elements: [Items](#items).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="items"></a>Items|The list of rule items.<br/><br/>The maximum number of rule items in a rule item group is 100. The rule items must all be of the same concrete type derived from the [RuleItem](ruleitem.md) base class. Currently only a list of [StringRuleItem](stringruleitem.md) objects are supported.<br/><br/>The list of [StringRuleItem](stringruleitem.md) objects apply to same visited page, and the rule conditions are joined using the logical *AND* operator. In other words to add a visitor to the remarketing list, one page must meet all of the conditions in this rule item list. To create a list of rules for another page, you must add a separate *RuleItemGroup*.<br/><br/>**Add:** Required<br/>**Update:** Optional. If you want to keep any of the previous rule items, then you must explicitly set them again during update.|[RuleItem](ruleitem.md) array|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[PageVisitorsRule](pagevisitorsrule.md)  
[PageVisitorsWhoDidNotVisitAnotherPageRule](pagevisitorswhodidnotvisitanotherpagerule.md)  
[PageVisitorsWhoVisitedAnotherPageRule](pagevisitorswhovisitedanotherpagerule.md)  
