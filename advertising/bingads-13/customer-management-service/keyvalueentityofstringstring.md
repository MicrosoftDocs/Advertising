---
title: KeyValueEntityOfstringstring Data Object - Customer Management
ms.service: bing-ads
ms.subservice: customer-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: The key and value entity of string and string values.
---
# KeyValueEntityOfstringstring Data Object - Customer Management
The key and value entity of string and string values.

# [XML](#tab/xml)

```xml
<xs:complexType name="KeyValueEntityOfstringstring" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:annotation>
    <xs:appinfo>
      <GenericType Name="KeyValueEntityOf{0}{1}{#}" Namespace="https://bingads.microsoft.com/Customer/v13/Entities" xmlns="http://schemas.microsoft.com/2003/10/Serialization/">
        <GenericParameter Name="string" Namespace="http://www.w3.org/2001/XMLSchema" />
        <GenericParameter Name="string" Namespace="http://www.w3.org/2001/XMLSchema" />
      </GenericType>
    </xs:appinfo>
  </xs:annotation>
  <xs:sequence>
    <xs:element minOccurs="0" name="Key" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Value" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Key": "ValueHere",
  "Value": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [KeyValueEntityOfstringstring](keyvalueentityofstringstring.md) object has the following elements: [Key](#key), [Value](#value).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="key"></a>Key|The name of the setting.|**string**|
|<a name="value"></a>Value|The value of the setting.|**string**|

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13/Entities  

## Used By
[Notification](notification.md)  
