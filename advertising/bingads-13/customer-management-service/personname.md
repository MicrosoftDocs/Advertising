---
title: PersonName Data Object - Customer Management
ms.service: bing-ads-customer-management-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the name of a user.
---
# PersonName Data Object - Customer Management
Defines the name of a user.

## Syntax
```xml
<xs:complexType name="PersonName" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="FirstName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="LastName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="MiddleInitial" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [PersonName](personname.md) object has the following elements: [FirstName](#firstname), [LastName](#lastname), [MiddleInitial](#middleinitial).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="firstname"></a>FirstName|The first name of the user. The first name is limited to 100 characters.<br/><br/>**Add:** Required<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string**|
|<a name="lastname"></a>LastName|The last name of the user. The last name is limited to 100 characters.<br/><br/>**Add:** Required<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string**|
|<a name="middleinitial"></a>MiddleInitial|The middle initial of the user. The middle initial is limited to one character.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string**|

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13/Entities  

## Used By
[User](user.md)  
