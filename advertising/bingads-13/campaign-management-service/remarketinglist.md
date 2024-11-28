---
title: RemarketingList Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a remarketing list.
---
# RemarketingList Data Object - Campaign Management
Defines a remarketing list.

> [!TIP]
> For an implementation overview, see the [Universal Event Tracking](../guides/universal-event-tracking.md) technical guide.

> [!NOTE]
> Microsoft Advertising will automatically generate similar audiences for remarketing lists if you are a pilot participant. You cannot create or edit the similar audience for a remarketing list. Having said that, you can add and delete similar remarketing list associations and exclusions. If you delete the source remarketing list, then the similar audience will also be deleted. If a similar audience is associated with a campaign or ad group, then you cannot delete the source remarketing list. See [SimilarRemarketingList](similarremarketinglist.md) for more details. 

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="RemarketingList" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Audience">
      <xs:sequence>
        <xs:element minOccurs="0" name="Rule" nillable="true" type="tns:RemarketingRule" />
        <xs:element minOccurs="0" name="TagId" nillable="true" type="xs:long" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AudienceNetworkSize": "LongValueHere",
  "CustomerShare": {
    "CustomerAccountShares": [
      {
        "AccountId": "LongValueHere",
        "Associations": [
          {
            "AssociationCount": "LongValueHere",
            "UsageType": "ValueHere"
          }
        ],
        "CustomerId": "LongValueHere"
      }
    ],
    "OwnerCustomerId": "LongValueHere"
  },
  "Description": "ValueHere",
  "ForwardCompatibilityMap": [
    {
      "key": "ValueHere",
      "value": "ValueHere"
    }
  ],
  "Id": "LongValueHere",
  "MembershipDuration": IntValueHere,
  "Name": "ValueHere",
  "ParentId": "LongValueHere",
  "Scope": "ValueHere",
  "SearchSize": "LongValueHere",
  "SupportedCampaignTypes": [
    "ValueHere"
  ],
  "Type": "RemarketingList",
  "Rule": {
    "Type": "CustomEvents",
    "Action": "ValueHere",
    "ActionOperator": "ValueHere",
    "Category": "ValueHere",
    "CategoryOperator": "ValueHere",
    "Label": "ValueHere",
    "LabelOperator": "ValueHere",
    "Value": DecimalValueHere,
    "ValueOperator": "ValueHere"
  },
  "TagId": "LongValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [RemarketingList](remarketinglist.md) object has the following elements: [Rule](#rule), [TagId](#tagid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="rule"></a>Rule|A rule includes conditions used to determine who to add to your remarketing list.<br/><br/>You can choose one of the four types of rules to target different audiences: [CustomEventsRule](customeventsrule.md), [PageVisitorsRule](pagevisitorsrule.md), [PageVisitorsWhoDidNotVisitAnotherPageRule](pagevisitorswhodidnotvisitanotherpagerule.md), and [PageVisitorsWhoVisitedAnotherPageRule](pagevisitorswhovisitedanotherpagerule.md).<br/><br/>**Add:** Required<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. If you want to keep any of the previous rule items, then you must explicitly set them again during update. You can choose to change the type of rule during update.|[RemarketingRule](remarketingrule.md)|
|<a name="tagid"></a>TagId|The Microsoft Advertising identifier of the Universal Event Tracking (UET) tag that is used with the remarketing list.<br/><br/>Before you take a dependency on the tag ID, please note that the UET tag can be shared with or from another customer. Shared UET tags and audiences are only available for pilot customers. For an overview of sharing audiences and UET tags in a customer hierarchy, see the [Share Audiences and UET Tags](../guides/universal-event-tracking.md#hierarchy-share) technical guide.<br/><br/>**Add:** Required<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**long**|

The [RemarketingList](remarketinglist.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsaudience"></a>Inherited Elements from Audience
The [RemarketingList](remarketinglist.md) object derives from the [Audience](audience.md) object, and inherits the following elements: [AudienceNetworkSize](#audiencenetworksize), [CustomerShare](#customershare), [Description](#description), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Id](#id), [MembershipDuration](#membershipduration), [Name](#name), [ParentId](#parentid), [Scope](#scope), [SearchSize](#searchsize), [SupportedCampaignTypes](#supportedcampaigntypes), [Type](#type). The descriptions below are specific to [RemarketingList](remarketinglist.md), and might not apply to other objects that inherit the same elements from the [Audience](audience.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="audiencenetworksize"></a>AudienceNetworkSize|The total number of people who are active members of this audience in the Audience network. This gives you an idea of how many Audience network users you can target.<br/><br/>The audience needs to have at least 300 people before Microsoft Advertising will use it for optimizations.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**long**|
|<a name="customershare"></a>CustomerShare|Determines the list of customers and accounts that share the audience. Details include audience association counts.<br/><br/>Shared UET tags and audiences are only available for pilot customers. For an overview of sharing audiences and UET tags in a customer hierarchy, see the [Share Audiences and UET Tags](../guides/universal-event-tracking.md#hierarchy-share) technical guide.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. Set this element to null or empty to retain any existing customer account shares. To remove all customer account shares, set the [CustomerAccountShares](customershare.md#customeraccountshares) element of the [CustomerShare](customershare.md) object to null or empty. To remove a subset of customer account shares, specify the customer account shares that you want to keep in the [CustomerAccountShares](customershare.md#customeraccountshares) element of the [CustomerShare](customershare.md) object.|[CustomerShare](customershare.md)|
|<a name="description"></a>Description|The description of the audience. Use a description to help you remember what audience you are targeting.<br/><br/>The description can contain a maximum of 1,024 characters.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string**|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>Forward compatibility changes will be noted here in future releases. There are currently no forward compatibility changes for the *Audience* object.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="id"></a>Id|The Microsoft Advertising identifier of the audience.<br/><br/>**Add:** Read-only<br/>**Update:** Required and read-only|**long**|
|<a name="membershipduration"></a>MembershipDuration|When you create an audience, you can specify how far back in time Microsoft Advertising should look for actions that match your audience definition.<br/><br/>The minimum duration is 1 day and the maximum duration allowed is 180 days.<br/><br/>**Add:** Optional. If not specified, the membership duration will be set to 30 by default.<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**int**|
|<a name="name"></a>Name|The name of the audience. The name can contain a maximum of 128 characters.<br/><br/>**Add:** Required<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string**|
|<a name="parentid"></a>ParentId|The Microsoft Advertising identifier of the account or customer. <br/><br/>If the *Scope* is set to *Account*, this is the account ID, and otherwise it is the customer ID.<br/><br/>**Add:** Required<br/>**Update:** Read-only. You cannot change the parent ID.|**long**|
|<a name="scope"></a>Scope|Scope defines what accounts can use this audience.<br/><br/>If scope is set to *Account*, the audience can only be associated with campaigns and ad groups in one account i.e., via the [ParentId](#parentid). If scope is set to *Customer*, the audience can be associated with campaigns and ad groups in all of the customer's accounts.<br/><br/>**Add:** Required<br/>**Update:** Optional. You can change the scope from Account to Customer, but you cannot change the scope from Customer to Account.|[EntityScope](entityscope.md)|
|<a name="searchsize"></a>SearchSize|The total number of people who are active members of this audience in the Search network. This gives you an idea of how many search users you can target.<br/><br/>The audience needs to have at least 300 people before Microsoft Advertising will use it for optimizations.<br/><br/>This property will be nil or empty for up to 24 hours while the audience is being built, for example if you add or update the remarketing list membership duration, rule, or tag identifier.<br/><br/>This property will be nil or empty if the UET tag associated with the remarketing list has a status of Unverified or Inactive, because the remarketing list can't receive the customer information from your website that it needs to build the list.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**long**|
|<a name="supportedcampaigntypes"></a>SupportedCampaignTypes|The list of campaign types that support this audience.<br/><br/>Supported values are Audience, DynamicSearchAds, Search, and Shopping. New campaign types might be added in the future, so you should not take any dependency on a fixed set of values.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string** array|
|<a name="type"></a>Type|The type of the audience. This value is *RemarketingList* when you retrieve a remarketing list audience. For more information about audience types, see the [Audience Data Object Remarks](audience.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[AudienceType](audiencetype.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

