---
title: EmailFormat Value Set - Customer Management
ms.service: bing-ads
ms.subservice: customer-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the possible formats of the body of an email message.
---
# EmailFormat Value Set - Customer Management
Defines the possible formats of the body of an email message.

## Syntax
```xml
<xs:simpleType name="EmailFormat" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Html">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Text">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [EmailFormat](emailformat.md) value set has the following values: [Html](#html), [Text](#text).

|Value|Description|
|-----------|---------------|
|<a name="html"></a>Html|The format of the body of the email message is HTML.|
|<a name="text"></a>Text|The format of the body of the email message is plain text.|

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13  

## Used By
[ContactInfo](contactinfo.md)  
