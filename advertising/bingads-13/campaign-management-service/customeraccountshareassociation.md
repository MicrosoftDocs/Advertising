---
title: CustomerAccountShareAssociation Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Contains the association count for the corresponding usage type.
---
# CustomerAccountShareAssociation Data Object - Campaign Management
Contains the association count for the corresponding usage type. 

> [!TIP]
> For an overview of sharing audiences and UET tags in an [account hierarchy](../guides/account-hierarchy-permissions.md#account-hierarchy), see the [Share Audiences and UET Tags](../guides/universal-event-tracking.md#hierarchy-share) technical guide. 

# [XML](#tab/xml)

```xml
<xs:complexType name="CustomerAccountShareAssociation" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AssociationCount" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="UsageType" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AssociationCount": "LongValueHere",
  "UsageType": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [CustomerAccountShareAssociation](customeraccountshareassociation.md) object has the following elements: [AssociationCount](#associationcount), [UsageType](#usagetype).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="associationcount"></a>AssociationCount|The association count for the corresponding usage type.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**long**|
|<a name="usagetype"></a>UsageType|Indicates how the customer account share is used e.g., via audience association.<br/><br/>The possible values include RemarketingListAssociateToAdGroup, RemarketingListAssociateToCampaign, and UETTagAssociateToRemarketingList. New values be added in the future, so you should not take any dependency on a fixed set of strings.<br/>- RemarketingListAssociateToAdGroup - The remarketing list is associated with or excluded by one or more ad groups.<br/>- RemarketingListAssociateToCampaign - The remarketing list is associated with or excluded by one or more campaigns.<br/>- UETTagAssociateToConversionGoal - The UET tag is used by one or more conversion goals.<br/>- UETTagAssociateToProductAudience - The UET tag is used by one or more product audiences.<br/>- UETTagAssociateToRemarketingList - The UET tag is used by one or more remarketing lists.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[CustomerAccountShare](customeraccountshare.md)  
