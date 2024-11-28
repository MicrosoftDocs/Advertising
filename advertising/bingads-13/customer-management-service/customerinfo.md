---
title: CustomerInfo Data Object - Customer Management
ms.service: bing-ads
ms.subservice: customer-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines an object that contains a customer's identifier and name.
---
# CustomerInfo Data Object - Customer Management
Defines an object that contains a customer's identifier and name.  

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="CustomerInfo" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="Name" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Id": "LongValueHere",
  "Name": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [CustomerInfo](customerinfo.md) object has the following elements: [Id](#id), [Name](#name).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="id"></a>Id|The system-generated identifier of the customer.|**long**|
|<a name="name"></a>Name|The name of the customer.|**string**|

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13/Entities  

## Used By
[AdvertiserAccount](advertiseraccount.md)  
[GetCustomersInfo](getcustomersinfo.md)  
[GetLinkedAccountsAndCustomersInfo](getlinkedaccountsandcustomersinfo.md)  
