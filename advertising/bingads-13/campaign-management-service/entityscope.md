---
title: EntityScope Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines values that you can use to determine whether the remarketing list can only be associated with ad groups within one specified account, or can be associated with any ad groups across all of the customer's accounts.
---
# EntityScope Value Set - Campaign Management
Defines values that you can use to determine whether the remarketing list can only be associated with ad groups within one specified account, or can be associated with any ad groups across all of the customer's accounts.

## Syntax
```xml
<xs:simpleType name="EntityScope" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Account" />
    <xs:enumeration value="Customer" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [EntityScope](entityscope.md) value set has the following values: [Account](#account), [Customer](#customer).

|Value|Description|
|-----------|---------------|
|<a name="account"></a>Account|The remarketing list can only be associated with ad groups within one specified account.|
|<a name="customer"></a>Customer|The remarketing list can be associated with any ad groups across all of the customer's accounts.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AddListItemsToSharedList](addlistitemstosharedlist.md)  
[AddSharedEntity](addsharedentity.md)  
[Audience](audience.md)  
[ConversionGoal](conversiongoal.md)  
[DeleteListItemsFromSharedList](deletelistitemsfromsharedlist.md)  
[DeleteSharedEntities](deletesharedentities.md)  
[DeleteSharedEntityAssociations](deletesharedentityassociations.md)  
[GetListItemsBySharedList](getlistitemsbysharedlist.md)  
[GetSharedEntities](getsharedentities.md)  
[GetSharedEntityAssociationsByEntityIds](getsharedentityassociationsbyentityids.md)  
[GetSharedEntityAssociationsBySharedEntityIds](getsharedentityassociationsbysharedentityids.md)  
[SetSharedEntityAssociations](setsharedentityassociations.md)  
[UpdateSharedEntities](updatesharedentities.md)  
