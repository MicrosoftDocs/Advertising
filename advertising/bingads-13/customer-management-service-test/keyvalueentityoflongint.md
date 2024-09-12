---
title: KeyValueEntityOflongint Data Object Test - Customer Management
ms.service: bing-ads
ms.subservice: customer-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: The key and value entity of long and int values.(test)
---
# KeyValueEntityOflongint Data Object Test - Customer Management
The key and value entity of long and int values.

# [XML](#tab/xml)

```xml
<xs:complexType name="KeyValueEntityOflongint" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:annotation>
    <xs:appinfo>
      <GenericType Name="KeyValueEntityOf{0}{1}{#}" Namespace="https://bingads.microsoft.com/Customer/v13/Entities" xmlns="http://schemas.microsoft.com/2003/10/Serialization/">
        <GenericParameter Name="long" Namespace="http://www.w3.org/2001/XMLSchema" />
        <GenericParameter Name="int" Namespace="http://www.w3.org/2001/XMLSchema" />
      </GenericType>
    </xs:appinfo>
  </xs:annotation>
  <xs:sequence>
    <xs:element minOccurs="0" name="Key" type="xs:long" />
    <xs:element minOccurs="0" name="Value" type="xs:int" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Key": "LongValueHere",
  "Value": IntValueHere
}
```

-----

## <a name="elements"></a>Elements

The [KeyValueEntityOflongint](keyvalueentityoflongint.md) object has the following elements: [Key](#key), [Value](#value).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="key"></a>Key|The key of the setting.|**long**|
|<a name="value"></a>Value|The value of the setting.|**int**|

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13/Entities  

## Used By
[DismissNotifications](dismissnotifications.md)  
