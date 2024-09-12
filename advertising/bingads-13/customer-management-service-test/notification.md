---
title: Notification Data Object Test - Customer Management
ms.service: bing-ads
ms.subservice: customer-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a Notification object.(test)
---
# Notification Data Object Test - Customer Management
Defines a Notification object.

# [XML](#tab/xml)

```xml
<xs:complexType name="Notification" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="TypeId" type="xs:int" />
    <xs:element minOccurs="0" name="Id" type="xs:long" />
    <xs:element minOccurs="0" name="Severity" type="xs:unsignedByte" />
    <xs:element minOccurs="0" name="Title" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Message" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="AdditionalInfo" nillable="true" type="tns:ArrayOfKeyValueEntityOfstringstring" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AdditionalInfo": [
    {
      "Key": "ValueHere",
      "Value": "ValueHere"
    }
  ],
  "Id": "LongValueHere",
  "Message": "ValueHere",
  "Severity": "ValueHere",
  "Title": "ValueHere",
  "TypeId": IntValueHere
}
```

-----

## <a name="elements"></a>Elements

The [Notification](notification.md) object has the following elements: [AdditionalInfo](#additionalinfo), [Id](#id), [Message](#message), [Severity](#severity), [Title](#title), [TypeId](#typeid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="additionalinfo"></a>AdditionalInfo|The supporting data of the *Notification*.|[KeyValueEntityOfstringstring](keyvalueentityofstringstring.md) array|
|<a name="id"></a>Id|The identifier of the *Notification*.|**long**|
|<a name="message"></a>Message|The message of the *Notification*. |**string**|
|<a name="severity"></a>Severity|The severity of the *Notification*. |**unsignedByte**|
|<a name="title"></a>Title|The title of the *Notification*. |**string**|
|<a name="typeid"></a>TypeId|The identifier of the type of *Notification*. |**int**|

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13/Entities  

## Used By
[GetNotifications](getnotifications.md)  
