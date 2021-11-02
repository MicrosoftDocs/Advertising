---
title: ProductAudience Data Object - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines a product audience that you can use to remarket products from your Microsoft Merchant Center store.
---
# ProductAudience Data Object - Campaign Management
Defines a product audience that you can use to remarket products from your Microsoft Merchant Center store. 

> [!NOTE]
> Dynamic remarketing lists were formerly known as product audiences in Microsoft Advertising. You'll see "Dynamic remarketing list" in the Microsoft Advertising UI, but to avoid breaking changes the API objets are still named "product audience". 

Dynamic remarketing lists pair customers with specific products based on what they have looked at, considered, or already purchased on your website. You can use dynamic remarketing lists in both search campaigns and audience campaigns (not everyone has audience campaigns yet). 

Dynamic remarketing lists work best with both Shopping campaigns and feed-based Audience campaigns i.e., those campaigns that leverage a Microsoft Merchant Center [store ID](shoppingsetting.md#storeid). 

> [!IMPORTANT]
> Be sure to edit the script corresponding to the [UET Tag Id](#tagid) on your website to include the `ecomm_prodid` and `ecomm_pagetype` parameters.
> The ecomm_prodid parameter is the product ID of the product on the page. It is unique for each item and must match either the id or item_group_id attribute in your product feed. Numeric and alphanumeric (including hyphens) characters only, with a maximum of 50 characters. 
> The ecomm_pagetype parameter identifies the type of page the user has visited. Valid options: home, searchresults, category, product, cart, purchase, other.

```javascript
window.uetq = window.uetq || [];
window.uetq.push('event', '', {'ecomm_prodid': 'REPLACE_WITH_PRODUCT_ID', 'ecomm_pagetype': 'REPLACE_WITH_PAGE_TYPE'});
```

## Syntax
```xml
<xs:complexType name="ProductAudience" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Audience">
      <xs:sequence>
        <xs:element minOccurs="0" name="ProductAudienceType" nillable="true" type="tns:ProductAudienceType" />
        <xs:element minOccurs="0" name="TagId" nillable="true" type="xs:long" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [ProductAudience](productaudience.md) object has the following elements: [ProductAudienceType](#productaudiencetype), [TagId](#tagid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="productaudiencetype"></a>ProductAudienceType|Determines whether to remarket your products to general visitors, product searchers, product viewers, shopping cart abandoners, or past buyers.<br/><br/>**Add:** Required<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|[ProductAudienceType](productaudiencetype.md)|
|<a name="tagid"></a>TagId|The Microsoft Advertising identifier of the Universal Event Tracking (UET) tag that is used with the remarketing list.<br/><br/>Before you take a dependency on the tag ID, please note that the UET tag can be shared with or from another customer. Shared UET tags and audiences are only available for pilot customers. For an overview of sharing audiences and UET tags in a customer hierarchy, see the [Share Audiences and UET Tags](../guides/universal-event-tracking.md#hierarchy-share) technical guide.<br/><br/>**Add:** Required<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**long**|

The [ProductAudience](productaudience.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsaudience"></a>Inherited Elements from Audience
The [ProductAudience](productaudience.md) object derives from the [Audience](audience.md) object, and inherits the following elements: [AudienceNetworkSize](#audiencenetworksize), [CustomerShare](#customershare), [Description](#description), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Id](#id), [MembershipDuration](#membershipduration), [Name](#name), [ParentId](#parentid), [Scope](#scope), [SearchSize](#searchsize), [SupportedCampaignTypes](#supportedcampaigntypes), [Type](#type). The descriptions below are specific to [ProductAudience](productaudience.md), and might not apply to other objects that inherit the same elements from the [Audience](audience.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="audiencenetworksize"></a>AudienceNetworkSize|The total number of people who are active members of this audience in the Audience network. This gives you an idea of how many Audience network users you can target.<br/><br/>The audience needs to have at least 300 people before Microsoft Advertising will use it for optimizations.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**long**|
|<a name="customershare"></a>CustomerShare|This element is not supported for product audiences.<br/><br/>You can use a shared [TagId](#tagid) with product audiences, but a product audience itself cannot be shared.<br/><br/>**Add:** Not supported<br/>**Update:** Not supported|[CustomerShare](customershare.md)|
|<a name="description"></a>Description|The description of the audience. Use a description to help you remember what audience you are targeting.<br/><br/>The description can contain a maximum of 1,024 characters.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string**|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>Forward compatibility changes will be noted here in future releases. There are currently no forward compatibility changes for the *Audience* object.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="id"></a>Id|The Microsoft Advertising identifier of the audience.<br/><br/>**Add:** Read-only<br/>**Update:** Required and read-only|**long**|
|<a name="membershipduration"></a>MembershipDuration|When you create an audience, you can specify how far back in time Microsoft Advertising should look for actions that match your audience definition.<br/><br/>The mimimum duration is 1 day and the maximum duration allowed is 180 days.<br/><br/>**Add:** Optional. If not specified, the membership duration will be set to 30 by default.<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**int**|
|<a name="name"></a>Name|The name of the audience. The name can contain a maximum of 128 characters.<br/><br/>**Add:** Required<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string**|
|<a name="parentid"></a>ParentId|The Microsoft Advertising identifier of the account or customer.<br/><br/>If the *Scope* is set to *Account*, this is the account ID, and otherwise it is the customer ID.<br/><br/>**Add:** Required<br/>**Update:** Read-only. You cannot change the parent ID.|**long**|
|<a name="scope"></a>Scope|Scope defines what accounts can use this audience.<br/><br/>If scope is set to *Account*, the audience can only be associated with campaigns and ad groups in one account i.e., via the [ParentId](#parentid). If scope is set to *Customer*, the audience can be associated with campaigns and ad groups in all of the customer's accounts.<br/><br/>**Add:** Required<br/>**Update:** Optional. You can change the scope from Account to Customer, but you cannot change the scope from Customer to Account.|[EntityScope](entityscope.md)|
|<a name="searchsize"></a>SearchSize|The total number of people who are active members of this audience in the Search network. This gives you an idea of how many search users you can target.<br/><br/>The audience needs to have at least 300 people before Microsoft Advertising will use it for optimizations.<br/><br/>This property will be nil or empty for up to 24 hours while the audience is being built, for example if you add or update the membership duration or tag identifier.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**long**|
|<a name="supportedcampaigntypes"></a>SupportedCampaignTypes|The list of campaign types that support this audience.<br/><br/>Supported values are Audience, DynamicSearchAds, Search, and Shopping. New campaign types might be added in the future, so you should not take any dependency on a fixed set of values.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string** array|
|<a name="type"></a>Type|The type of the audience. This value is *ProductAudience* when you retrieve a product audience. For more information about audience types, see the [Audience Data Object Remarks](audience.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[AudienceType](audiencetype.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

