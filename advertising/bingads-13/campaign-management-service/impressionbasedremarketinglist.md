---
title: ImpressionBasedRemarketingList Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a data object for ImpressionBasedRemarketingList.
---
# ImpressionBasedRemarketingList Data Object - Campaign Management
Defines a data object for ImpressionBasedRemarketingList.

## Syntax
```xml
<xs:complexType name="ImpressionBasedRemarketingList" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Audience">
      <xs:sequence>
        <xs:element minOccurs="0" name="AdGroupId" nillable="true" type="xs:long" />
        <xs:element minOccurs="0" name="CampaignId" nillable="true" type="xs:long" />
        <xs:element minOccurs="0" name="EntityType" type="tns:ImpressionBasedEntityType" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [ImpressionBasedRemarketingList](impressionbasedremarketinglist.md) object has the following elements: [AdGroupId](#adgroupid), [CampaignId](#campaignid), [EntityType](#entitytype).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="adgroupid"></a>AdGroupId|The ad group identifier to associate with the impression-based remarketing list.<br/><br/>*Note*: The *AdGroupId* is null for an impression-based remarketing list with users who have viewed an ad under campaign.|**long**|
|<a name="campaignid"></a>CampaignId|The campaign identifier to associate with the impression-based remarketing list.|**long**|
|<a name="entitytype"></a>EntityType|The entity type of an impression-based remarketing list.|[ImpressionBasedEntityType](impressionbasedentitytype.md)|

The [ImpressionBasedRemarketingList](impressionbasedremarketinglist.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsaudience"></a>Inherited Elements from Audience
The [ImpressionBasedRemarketingList](impressionbasedremarketinglist.md) object derives from the [Audience](audience.md) object, and inherits the following elements: [AudienceNetworkSize](#audiencenetworksize), [CustomerShare](#customershare), [Description](#description), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Id](#id), [MembershipDuration](#membershipduration), [Name](#name), [ParentId](#parentid), [Scope](#scope), [SearchSize](#searchsize), [SupportedCampaignTypes](#supportedcampaigntypes), [Type](#type). The descriptions below are specific to [ImpressionBasedRemarketingList](impressionbasedremarketinglist.md), and might not apply to other objects that inherit the same elements from the [Audience](audience.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="audiencenetworksize"></a>AudienceNetworkSize|The total number of people who are active members of this audience in the Audience network. This gives you an idea of how many Audience network users you can target.<br/><br/>The audience needs to have at least 300 people before Microsoft Advertising will use it for optimizations.<br/><br/>**Add:** Not supported<br/>**Update:** Read-only|**long**|
|<a name="customershare"></a>CustomerShare|This element is not supported for custom audiences.<br/><br/>**Add:** Not supported<br/>**Update:** Not supported|[CustomerShare](customershare.md)|
|<a name="description"></a>Description|The description of the audience. Use a description to help you remember what audience you are targeting.<br/><br/>The description can contain a maximum of 1,024 characters.<br/><br/>**Add:** Not supported<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. To remove the previous setting, set this elemment to an empty string value ("").|**string**|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>Forward compatibility changes will be noted here in future releases. There are currently no forward compatibility changes for the *Audience* object.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="id"></a>Id|The Microsoft Advertising identifier of the audience.<br/><br/>**Add:** Not supported<br/>**Update:** Required and read-only|**long**|
|<a name="membershipduration"></a>MembershipDuration|The membership duration determines how far back in time Microsoft Advertising should look for actions that match your custom audience definition in order to add people to your list.<br/><br/>For a custom audience the membership duration is not set in the Microsoft Advertising web application, and Microsoft Advertising defers to your custom audience provider settings.<br/><br/>When you request the custom audience via Bing Ads API, the returned membership duration will be null.<br/><br/>**Add:** Not supported<br/>**Update:** Not supported|**int**|
|<a name="name"></a>Name|The name of the audience. The name can contain a maximum of 128 characters.<br/><br/>**Add:** Not supported<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string**|
|<a name="parentid"></a>ParentId|The Microsoft Advertising identifier of the customer that contains the custom audience.<br/><br/>**Add:** Not supported<br/>**Update:** Not supported|**long**|
|<a name="scope"></a>Scope|Scope defines what accounts can use this audience.<br/><br/>For a custom audience the only supported scope is *Customer*, and the audience can be associated with campaigns and ad groups in all of the customer's accounts.<br/><br/>**Add:** Not supported<br/>**Update:** Not supported|[EntityScope](entityscope.md)|
|<a name="searchsize"></a>SearchSize|The total number of people who are active members of this audience in the Search network. This gives you an idea of how many search users you can target.<br/><br/>The audience needs to have at least 300 people before Microsoft Advertising will use it for optimizations.<br/><br/>This property will be nil or empty for up to 24 hours while the audience is being built, for example if you have imported new custom audiences from DMP, it takes 24 hours to build the audience, and in the meantime this property will be nil or empty.<br/><br/>**Add:** Not supported<br/>**Update:** Read-only|**long**|
|<a name="supportedcampaigntypes"></a>SupportedCampaignTypes|The list of campaign types that support this audience.<br/><br/>Supported values are Audience, DynamicSearchAds, Search, and Shopping. New campaign types might be added in the future, so you should not take any dependency on a fixed set of values.<br/><br/>**Add:** Not supported<br/>**Update:** Read-only|**string** array|
|<a name="type"></a>Type|The type of the audience. This value is *Custom* when you retrieve a custom audience. For more information about audience types, see the [Audience Data Object Remarks](audience.md#remarks).<br/><br/>**Add:** Not supported<br/>**Update:** Read-only|[AudienceType](audiencetype.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

