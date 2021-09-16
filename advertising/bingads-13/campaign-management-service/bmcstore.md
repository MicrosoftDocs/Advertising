---
title: BMCStore Data Object - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines a Microsoft Merchant Center store.
---
# BMCStore Data Object - Campaign Management
Defines a Microsoft Merchant Center store.

Elements of this object are defined in the Microsoft Merchant Center store, and read-only in Microsoft Advertising.  Values of elements do not restrict Microsoft Advertising features. For example, a Microsoft Shopping campaign and product ad may be added whether the *IsActive* element is set to true or false.

## Syntax
```xml
<xs:complexType name="BMCStore" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="HasCatalog" type="xs:boolean" />
    <xs:element minOccurs="0" name="Id" type="xs:long" />
    <xs:element minOccurs="0" name="IsActive" type="xs:boolean" />
    <xs:element minOccurs="0" name="IsProductAdsEnabled" type="xs:boolean" />
    <xs:element minOccurs="0" name="Name" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="SubType" nillable="true" type="tns:BMCStoreSubType" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [BMCStore](bmcstore.md) object has the following elements: [HasCatalog](#hascatalog), [Id](#id), [IsActive](#isactive), [IsProductAdsEnabled](#isproductadsenabled), [Name](#name), [SubType](#subtype).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="hascatalog"></a>HasCatalog|Value will be true if the store has a catalog of items, and otherwise the value is false.|**boolean**|
|<a name="id"></a>Id|The unique identifier for the Microsoft Merchant Center store.|**long**|
|<a name="isactive"></a>IsActive|Value will be true if the store is active, and otherwise the value is false.|**boolean**|
|<a name="isproductadsenabled"></a>IsProductAdsEnabled|Reserved for internal use.|**boolean**|
|<a name="name"></a>Name|Defines the name of the store as defined in the Microsoft Merchant Center.|**string**|
|<a name="subtype"></a>SubType|The Microsoft Merchant Center store sub type.<br/><br/>This element is only applicable for Microsoft Merchant Center stores that support Shopping Campaigns for Brands, and will be nil for all other stores.<br/><br/>If the subtype is set to [CoOp](bmcstoresubtype.md#coop), then you have linked from a partner's store via Shopping Campaigns for Brands. When your partner retrieves the same store via [GetBMCStoresByCustomerId](getbmcstoresbycustomerid.md) the subtype would be nil, since from their perspective the store is not restricted to Shopping Campaigns for Brands.<br/><br/>If the subtype is set to [GlobalStore](bmcstoresubtype.md#globalstore), then it is the global store to use for all Shopping Campaigns for Brands under the current manager account.|[BMCStoreSubType](bmcstoresubtype.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetBMCStoresByCustomerId](getbmcstoresbycustomerid.md)  
