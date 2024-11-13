---
title: CustomerListItem Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a CustomerListItem data object.
---
# CustomerListItem Data Object - Campaign Management
Defines a CustomerListItem data object.

> [!WARNING]
> The CustomerListItem data object is for internal use only. You can't access it via the public API.

## Syntax
```xml
<xs:complexType name="CustomerListItem" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="CustomerListItemSubType" type="tns:CustomerListItemSubType" />
    <xs:element minOccurs="0" name="ItemValue" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [CustomerListItem](customerlistitem.md) object has the following elements: [CustomerListItemSubType](#customerlistitemsubtype), [ItemValue](#itemvalue).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="customerlistitemsubtype"></a>CustomerListItemSubType|The user data type of the customer list item.|[CustomerListItemSubType](customerlistitemsubtype.md)|
|<a name="itemvalue"></a>ItemValue|The customer list item value.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[CustomerList](customerlist.md)  
