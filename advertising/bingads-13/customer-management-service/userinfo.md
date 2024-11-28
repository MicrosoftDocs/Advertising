---
title: UserInfo Data Object - Customer Management
ms.service: bing-ads
ms.subservice: customer-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a user identification object that contains information that identifies a user.
---
# UserInfo Data Object - Customer Management
Defines a user identification object that contains information that identifies a user.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="UserInfo" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Id" type="xs:long" />
    <xs:element minOccurs="0" name="UserName" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Id": "LongValueHere",
  "UserName": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [UserInfo](userinfo.md) object has the following elements: [Id](#id), [UserName](#username).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="id"></a>Id|The system-generated identifier of the user.|**long**|
|<a name="username"></a>UserName|The logon user name of the user.|**string**|

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13/Entities  

## Used By
[GetUsersInfo](getusersinfo.md)  
