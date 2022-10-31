---
title: CustomerShare Data Object - Campaign Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines a shareable audience or UET tag that a customer owns.
ms.subservice: campaign-management-api
---
# CustomerShare Data Object - Campaign Management
Defines a shareable audience or UET tag that a customer owns.

> [!TIP]
> For an overview of sharing audiences and UET tags in an [account hierarchy](../guides/account-hierarchy-permissions.md#account-hierarchy), see the [Share Audiences and UET Tags](../guides/universal-event-tracking.md#hierarchy-share) technical guide. 

## Syntax
```xml
<xs:complexType name="CustomerShare" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="CustomerAccountShares" nillable="true" type="tns:ArrayOfCustomerAccountShare" />
    <xs:element minOccurs="0" name="OwnerCustomerId" nillable="true" type="xs:long" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [CustomerShare](customershare.md) object has the following elements: [CustomerAccountShares](#customeraccountshares), [OwnerCustomerId](#ownercustomerid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="customeraccountshares"></a>CustomerAccountShares|Determines the list of customers and accounts that share the audience or UET tag. Details include audience association counts.<br/><br/>When the audience or UET tag has not yet been shared, this element will be nil or empty. Once an audience or UET tag is shared, a [CustomerAccountShare](customeraccountshare.md) object is returned for each customer that can use the share, including one list item for the owner.<br/><br/>**Add:** Required<br/>**Update:** Optional. Once you create this CustomerShare object, the existing [CustomerAccountShare](customeraccountshare.md) list will be removed or replaced. To remove all existing customer account shares create this CustomerShare object and set the CustomerAccountShares element to nil. To replace or append to the list of customer account shares, create this CustomerShare object and assign to the CustomerAccountShares element a new list of [CustomerAccountShare](customeraccountshare.md) objects, including any previous customer account shares that you want to retain. To retain all of the existing customer account shares, set the element that uses this CustomerShare object to nil. For example set the [CustomerShare](remarketinglist.md#customershare) element of a [RemarketingList](remarketinglist.md) to nil if you do not want to update any of the customer account shares.|[CustomerAccountShare](customeraccountshare.md) array|
|<a name="ownercustomerid"></a>OwnerCustomerId|The customer who owns the share.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**long**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[Audience](audience.md)  
[UetTag](uettag.md)  
