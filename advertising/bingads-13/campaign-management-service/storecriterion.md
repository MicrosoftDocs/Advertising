---
title: StoreCriterion Data Object - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines a criterion to exclude one Microsoft Merchant Center store from your shopping campaign for brands.
---
# StoreCriterion Data Object - Campaign Management
Defines a criterion to exclude one Microsoft Merchant Center store from your [shopping campaign for brands](../guides/product-ads.md#setup-cooperative). 

Each campaign can have a maximum of 10 excluded stores. 

## Syntax
```xml
<xs:complexType name="StoreCriterion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Criterion">
      <xs:sequence>
        <xs:element minOccurs="0" name="StoreId" nillable="true" type="xs:long" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [StoreCriterion](storecriterion.md) object has the following elements: [StoreId](#storeid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="storeid"></a>StoreId|The system-generated identifier of the Microsoft Merchant Center store to exclude.<br/><br/>You cannot exclude the global store (store [SubType](bmcstore.md#subtype) set to [GlobalStore](bmcstoresubtype.md#globalstore)).|**long**|

The [StoreCriterion](storecriterion.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementscriterion"></a>Inherited Elements from Criterion
The [StoreCriterion](storecriterion.md) object derives from the [Criterion](criterion.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [StoreCriterion](storecriterion.md), and might not apply to other objects that inherit the same elements from the [Criterion](criterion.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of the criterion. This value is *Store* when you retrieve a store criterion. For more information about criterion types, see the [Criterion Data Object Remarks](criterion.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

