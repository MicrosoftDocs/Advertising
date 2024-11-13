---
title: CustomerAccountShare Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a customer or account that can use the shared audience or UET tag.
---
# CustomerAccountShare Data Object - Campaign Management
Defines a customer or account that can use the shared audience or UET tag.

> [!TIP]
> For an overview of sharing audiences and UET tags in an [account hierarchy](../guides/account-hierarchy-permissions.md#account-hierarchy), see the [Share Audiences and UET Tags](../guides/universal-event-tracking.md#hierarchy-share) technical guide. 

# [XML](#tab/xml)

```xml
<xs:complexType name="CustomerAccountShare" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AccountId" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="Associations" nillable="true" type="tns:ArrayOfCustomerAccountShareAssociation" />
    <xs:element minOccurs="0" name="CustomerId" nillable="true" type="xs:long" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
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
```

-----

## <a name="elements"></a>Elements

The [CustomerAccountShare](customeraccountshare.md) object has the following elements: [AccountId](#accountid), [Associations](#associations), [CustomerId](#customerid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountid"></a>AccountId|The identifier of an advertiser account that can use the shared audience.<br/><br/>This element is not applicable for UET tags since you cannot restrict UET tags to a subset of advertiser accounts. You can only create and share UET tags at the [CustomerId](#customerid) level.<br/><br/>If this element is not set, then all accounts under the [CustomerId](#customerid) can use the shared audience or UET tag. One CustomerAccountShare object per advertiser account must be present in the [CustomerShare](customershare.md#customeraccountshares) for an audience that is shared with a subset of advertiser accounts, whether or not the advertiser accounts are under the same customer.<br/><br/>**Add:** Optional. You must set the [AccountId](#accountid) or [CustomerId](#customerid), but you cannot set both.<br/>**Update:** Optional. You must set the [AccountId](#accountid) or [CustomerId](#customerid), but you cannot set both. If no value is set for the update, this setting is not changed.|**long**|
|<a name="associations"></a>Associations|Provides details about whether and how the shared audience or UET tag is being used.<br/><br/>Each list item contains the association count for the corresponding usage type.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[CustomerAccountShareAssociation](customeraccountshareassociation.md) array|
|<a name="customerid"></a>CustomerId|The identifier of a customer that can use the shared audience or UET tag.<br/><br/>If this element is not set, then the audience is only shared with a subset of advertiser accounts under this customer. Please see [AccountId](#accountid) for details about sharing audiences with advertiser accounts.<br/><br/>**Add:** Optional. You must set the [AccountId](#accountid) or [CustomerId](#customerid), but you cannot set both.<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**long**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[CustomerShare](customershare.md)  
