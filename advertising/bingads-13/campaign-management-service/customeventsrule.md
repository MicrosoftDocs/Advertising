---
title: CustomEventsRule Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a custom events remarketing rule.
---
# CustomEventsRule Data Object - Campaign Management
Defines a custom events remarketing rule. 

Remarketing rules are conditions used to determine who to add to your remarketing list. For the custom events rule, you must include one or more of the following conditional event operator pairs: (*ActionOperator* and *Action*), (*CategoryOperator* and *Category*), (*LabelOperator* and *Label*), (*ValueOperator* and *Value*). If more than one condition is specified, the conditions are joined using the logical *AND* operator. In other words the visitor will only be added to your remarketing list if all of the specified rule conditions are met.

For a detailed example, see the [Remarks](#remarks) section below.

## Syntax
```xml
<xs:complexType name="CustomEventsRule" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:RemarketingRule">
      <xs:sequence>
        <xs:element minOccurs="0" name="Action" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="ActionOperator" type="tns:StringOperator" />
        <xs:element minOccurs="0" name="Category" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="CategoryOperator" type="tns:StringOperator" />
        <xs:element minOccurs="0" name="Label" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="LabelOperator" type="tns:StringOperator" />
        <xs:element minOccurs="0" name="Value" nillable="true" type="xs:decimal" />
        <xs:element minOccurs="0" name="ValueOperator" type="tns:NumberOperator" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [CustomEventsRule](customeventsrule.md) object has the following elements: [Action](#action), [ActionOperator](#actionoperator), [Category](#category), [CategoryOperator](#categoryoperator), [Label](#label), [LabelOperator](#labeloperator), [Value](#value), [ValueOperator](#valueoperator).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="action"></a>Action|The type of user interaction you want to track. For example 'play' or 'pause'.<br/><br/>If this element is specified during an add or update operation, then the *ActionOperator* element is also required.<br/><br/>**Add:** Optional if you include one or more of the other events; You must include one or more of the following event operator pairs: (*ActionOperator* and *Action*), (*CategoryOperator* and *Category*), (*LabelOperator* and *Label*), (*ValueOperator* and *Value*).<br/>**Update:** Optional if you include one or more of the other events; If you do not include *ActionOperator* and *Action* during update, any existing *ActionOperator* and *Action* settings will be deleted.|**string**|
|<a name="actionoperator"></a>ActionOperator|The operator that can be applied to the value of the *Action* element.<br/><br/>If this element is specified during an add or update operation, then the *Action* element is also required.<br/><br/>**Add:** Optional if you include one or more of the other events; You must include one or more of the following event operator pairs: (*ActionOperator* and *Action*), (*CategoryOperator* and *Category*), (*LabelOperator* and *Label*), (*ValueOperator* and *Value*).<br/>**Update:** Optional if you include one or more of the other events; If you do not include *ActionOperator* and *Action* during update, any existing *ActionOperator* and *Action* settings will be deleted.|[StringOperator](stringoperator.md)|
|<a name="category"></a>Category|The category of event you want to track. For example, 'video'.<br/><br/>If this element is specified during an add or update operation, then the *CategoryOperator* element is also required.<br/><br/>**Add:** Optional if you include one or more of the other events; You must include one or more of the following event operator pairs: (*ActionOperator* and *Action*), (*CategoryOperator* and *Category*), (*LabelOperator* and *Label*), (*ValueOperator* and *Value*).<br/>**Update:** Optional if you include one or more of the other events; If you do not include *CategoryOperator* and *Category* during update, any existing *CategoryOperator* and *Category* settings will be deleted.|**string**|
|<a name="categoryoperator"></a>CategoryOperator|The operator that can be applied to the value of the *Category* element.<br/><br/>**Add:** Optional if you include one or more of the other events; You must include one or more of the following event operator pairs: (*ActionOperator* and *Action*), (*CategoryOperator* and *Category*), (*LabelOperator* and *Label*), (*ValueOperator* and *Value*).<br/>**Update:** Optional if you include one or more of the other events; If you do not include *CategoryOperator* and *Category* during update, any existing *CategoryOperator* and *Category* settings will be deleted.|[StringOperator](stringoperator.md)|
|<a name="label"></a>Label|The name of the element that caused the action. For example 'trailer' or 'behindthescenes'.<br/><br/>If this element is specified during an add or update operation, then the *LabelOperator* element is also required.<br/><br/>**Add:** Optional if you include one or more of the other events; You must include one or more of the following event operator pairs: (*ActionOperator* and *Action*), (*CategoryOperator* and *Category*), (*LabelOperator* and *Label*), (*ValueOperator* and *Value*).<br/>**Update:** Optional if you include one or more of the other events; If you do not include *LabelOperator* and *Label* during update, any existing *LabelOperator* and *Label* settings will be deleted.|**string**|
|<a name="labeloperator"></a>LabelOperator|The operator that can be applied to the value of the *Label* element.<br/><br/>**Add:** Optional if you include one or more of the other events; You must include one or more of the following event operator pairs: (*ActionOperator* and *Action*), (*CategoryOperator* and *Category*), (*LabelOperator* and *Label*), (*ValueOperator* and *Value*).<br/>**Update:** Optional if you include one or more of the other events; If you do not include *LabelOperator* and *Label* during update, any existing *LabelOperator* and *Label* settings will be deleted.|[StringOperator](stringoperator.md)|
|<a name="value"></a>Value|A positive integer value associated with that event. For example the value could be the duration of time that the video played.<br/><br/>If this element is specified during an add or update operation, then the *ValueOperator* element is also required.<br/><br/>**Add:** Optional if you include one or more of the other events; You must include one or more of the following event operator pairs: (*ActionOperator* and *Action*), (*CategoryOperator* and *Category*), (*LabelOperator* and *Label*), (*ValueOperator* and *Value*).<br/>**Update:** Optional if you include one or more of the other events; If you do not include *ValueOperator* and *Value* during update, any existing *ValueOperator* and *Value* settings will be deleted|**decimal**|
|<a name="valueoperator"></a>ValueOperator|The operator that can be applied to the value of the *Value* element.<br/><br/>**Add:** Optional if you include one or more of the other events; You must include one or more of the following event operator pairs: (*ActionOperator* and *Action*), (*CategoryOperator* and *Category*), (*LabelOperator* and *Label*), (*ValueOperator* and *Value*).<br/>**Update:** Optional if you include one or more of the other events; If you do not include *ValueOperator* and *Value* during update, any existing *ValueOperator* and *Value* settings will be deleted.|[NumberOperator](numberoperator.md)|

The [CustomEventsRule](customeventsrule.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsremarketingrule"></a>Inherited Elements from RemarketingRule
The [CustomEventsRule](customeventsrule.md) object derives from the [RemarketingRule](remarketingrule.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [CustomEventsRule](customeventsrule.md), and might not apply to other objects that inherit the same elements from the [RemarketingRule](remarketingrule.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the remarketing rule. For more information about remarketing rule types, see the [RemarketingRule Data Object Remarks](remarketingrule.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## <a name="remarks"></a>Remarks
For the *CustomEvents* rule, you must include one or more of the following conditional event operator pairs: (*ActionOperator* and *Action*), (*CategoryOperator* and *Category*), (*LabelOperator* and *Label*), (*ValueOperator* and *Value*). If more than one condition is specified, the conditions are joined using the logical *AND* operator. In other words the visitor will only be added to your remarketing list if all of the specified rule conditions are met.

For example let's say that the following custom events are set.

```xml
<Rule i:type="CustomEventsRule">
  <Type i:nil="true" />
  <Action>play</Action>
  <ActionOperator>Equals</ActionOperator>
  <Category>video</Category>
  <CategoryOperator>Equals</CategoryOperator>
  <Label>trailer</Label>
  <LabelOperator>Equals</LabelOperator>
  <Value>5.00</Value>
  <ValueOperator>Equals</ValueOperator>
</Rule>
```

The above definition is translated to the following logical expression:

*(Category Equals video) and (Action Equals play) and (Label Equals trailer) and (Value Equals 5)*

Evaluation of the logical expression determines who will be added to the remarketing list.

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

