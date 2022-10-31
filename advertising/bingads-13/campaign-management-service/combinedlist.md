---
title: CombinedList Data Object - Campaign Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: A combined list is an audience created from a combination of multiple existing audiences.
ms.subservice: campaign-management-api
---
# CombinedList Data Object - Campaign Management
A combined list is an audience created from a combination of multiple existing audiences. 

You can combine custom audiences, customer lists, product audiences, similar audiences, and remarketing lists. You cannot include other combined lists or in-market audiences in a combined list. 

You can create a maximum of 1,000 combined lists per ad account, and up to 5,000 per customer. Each list can include up to 100 combination rules or sets of logical conditions, and each [CombinationRule](combinationrule.md) can contain up to 100 audience IDs. 

> [!TIP]
> For an overview and more information about audiences, see the [Audience APIs](../guides/universal-event-tracking.md#audience) technical guide. 

## Syntax
```xml
<xs:complexType name="CombinedList" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Audience">
      <xs:sequence>
        <xs:element minOccurs="0" name="CombinationRules" nillable="true" type="tns:ArrayOfCombinationRule" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [CombinedList](combinedlist.md) object has the following elements: [CombinationRules](#combinationrules).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="combinationrules"></a>CombinationRules|Logical conditions used to determine who to add to your combined list.<br/><br/>Each list can include up to 100 combination rules or sets of logical conditions, and each [CombinationRule](combinationrule.md) can contain up to 100 audience IDs.<br/><br/>For details, please see the [CombinationRule Remarks](combinationrule.md#remarks).<br/><br/>**Add:** Required<br/>**Update:** Required. If you want to keep any of the previous rules, then you must explicitly set them again during update.|[CombinationRule](combinationrule.md) array|

The [CombinedList](combinedlist.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsaudience"></a>Inherited Elements from Audience
The [CombinedList](combinedlist.md) object derives from the [Audience](audience.md) object, and inherits the following elements: [AudienceNetworkSize](#audiencenetworksize), [CustomerShare](#customershare), [Description](#description), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Id](#id), [MembershipDuration](#membershipduration), [Name](#name), [ParentId](#parentid), [Scope](#scope), [SearchSize](#searchsize), [SupportedCampaignTypes](#supportedcampaigntypes), [Type](#type). The descriptions below are specific to [CombinedList](combinedlist.md), and might not apply to other objects that inherit the same elements from the [Audience](audience.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="audiencenetworksize"></a>AudienceNetworkSize|The total number of people who are active members of this audience in the Audience network. This gives you an idea of how many Audience network users you can target.<br/><br/>The audience needs to have at least 300 people before Microsoft Advertising will use it for optimizations.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**long**|
|<a name="customershare"></a>CustomerShare|This element is not supported for combined list audiences.<br/><br/>**Add:** Not supported<br/>**Update:** Not supported|[CustomerShare](customershare.md)|
|<a name="description"></a>Description|The description of the audience. Use a description to help you remember what audience you are targeting.<br/><br/>The description can contain a maximum of 1,024 characters.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string**|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>Forward compatibility changes will be noted here in future releases. There are currently no forward compatibility changes for the *Audience* object.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="id"></a>Id|The Microsoft Advertising identifier of the audience.<br/><br/>**Add:** Read-only<br/>**Update:** Required and read-only|**long**|
|<a name="membershipduration"></a>MembershipDuration|This element is not supported for combined list audiences.<br/><br/>**Add:** Not supported<br/>**Update:** Not supported|**int**|
|<a name="name"></a>Name|The name of the audience. The name can contain a maximum of 128 characters.<br/><br/>**Add:** Required<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string**|
|<a name="parentid"></a>ParentId|The Microsoft Advertising identifier of the account or customer.<br/><br/>If the *Scope* is set to *Account*, this is the account ID, and otherwise it is the customer ID.<br/><br/>**Add:** Required<br/>**Update:** Read-only. You cannot change the parent ID.|**long**|
|<a name="scope"></a>Scope|Scope defines what accounts can use this audience.<br/><br/>If scope is set to *Account*, the audience can only be associated with campaigns and ad groups in one account i.e., via the [ParentId](#parentid). If scope is set to *Customer*, the audience can be associated with campaigns and ad groups in all of the customer's accounts.<br/><br/>**Add:** Required<br/>**Update:** Optional. You can change the scope from Account to Customer, but you cannot change the scope from Customer to Account.|[EntityScope](entityscope.md)|
|<a name="searchsize"></a>SearchSize|The total number of people who are active members of this audience in the Search network. This gives you an idea of how many search users you can target.<br/><br/>The audience needs to have at least 300 people before Microsoft Advertising will use it for optimizations.<br/><br/>This property will be nil or empty for up to 24 hours while the audience is being built, for example if you add or update the combined list membership duration, rule, or tag identifier.<br/><br/>This property will be nil or empty if the UET tag associated with the combined list has a status of Unverified or Inactive, because the combined list can't receive the customer information from your website that it needs to build the list.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**long**|
|<a name="supportedcampaigntypes"></a>SupportedCampaignTypes|The list of campaign types that support this audience.<br/><br/>Supported values are Audience, DynamicSearchAds, Search, and Shopping. New campaign types might be added in the future, so you should not take any dependency on a fixed set of values.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string** array|
|<a name="type"></a>Type|The type of the audience. This value is *CombinedList* when you retrieve a combined list audience. For more information about audience types, see the [Audience Data Object Remarks](audience.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[AudienceType](audiencetype.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

