---
title: CustomerList Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a CustomerList data object.
---
# CustomerList Data Object - Campaign Management
Defines a CustomerList data object.

## Syntax
```xml
<xs:complexType name="CustomerList" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Audience">
      <xs:sequence />
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [CustomerList](customerlist.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsaudience"></a>Inherited Elements from Audience
The [CustomerList](customerlist.md) object derives from the [Audience](audience.md) object, and inherits the following elements: [AudienceNetworkSize](#audiencenetworksize), [CustomerShare](#customershare), [Description](#description), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Id](#id), [MembershipDuration](#membershipduration), [Name](#name), [ParentId](#parentid), [Scope](#scope), [SearchSize](#searchsize), [SupportedCampaignTypes](#supportedcampaigntypes), [Type](#type). The descriptions below are specific to [CustomerList](customerlist.md), and might not apply to other objects that inherit the same elements from the [Audience](audience.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="audiencenetworksize"></a>AudienceNetworkSize|The total number of people who are active members of this audience in the Audience network. This gives you an idea of how many Audience network users you can target.<br/><br/>Please see more details in documentation for the objects that inherit this element e.g., [RemarketingList](remarketinglist.md#audiencenetworksize).|**long**|
|<a name="customershare"></a>CustomerShare|Defines a shareable audience or UET tag that a customer owns.|[CustomerShare](customershare.md)|
|<a name="description"></a>Description|The description of the audience. Use a description to help you remember what audience you are targeting.<br/><br/>The description can contain a maximum of 1,024 characters.|**string**|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>Forward compatibility changes will be noted here in future releases. There are currently no forward compatibility changes for this object.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="id"></a>Id|The Microsoft Advertising identifier of the audience.|**long**|
|<a name="membershipduration"></a>MembershipDuration|When you create an audience, you can specify how far back in time Microsoft Advertising should look for actions that match your audience definition.<br/><br/>The minimum duration is 1 day and the maximum duration allowed is 180 days.|**int**|
|<a name="name"></a>Name|The name of the audience. The name can contain a maximum of 128 characters.|**string**|
|<a name="parentid"></a>ParentId|The Microsoft Advertising identifier of the account or customer. <br/><br/>If the *Scope* is set to *Account*, this is the account ID, and otherwise it is the customer ID.|**long**|
|<a name="scope"></a>Scope|Scope defines what accounts can use this audience.<br/><br/>If scope is set to *Account*, the audience can only be associated with campaigns and ad groups in one account i.e., via the [ParentId](#parentid). If scope is set to *Customer*, the audience can be associated with campaigns and ad groups in all of the customer's accounts.|[EntityScope](entityscope.md)|
|<a name="searchsize"></a>SearchSize|The total number of people who are active members of this audience in the Search network. This gives you an idea of how many search users you can target.<br/><br/>Please see more details in documentation for the objects that inherit this element e.g., [RemarketingList](remarketinglist.md#searchsize).|**long**|
|<a name="supportedcampaigntypes"></a>SupportedCampaignTypes|The list of campaign types that support this audience.<br/><br/>Supported values are Audience, DynamicSearchAds, Search, and Shopping. New campaign types might be added in the future, so you should not take any dependency on a fixed set of values.|**string** array|
|<a name="type"></a>Type|The type of the audience.|[AudienceType](audiencetype.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[ApplyCustomerListItems](applycustomerlistitems.md)  
