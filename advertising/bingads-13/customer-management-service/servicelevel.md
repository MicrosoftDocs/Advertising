---
title: ServiceLevel Value Set - Customer Management
ms.service: bing-ads-customer-management-service
ms.topic: article
author: eric-urban
ms.author: eur
description: For internal use only.
---
# ServiceLevel Value Set - Customer Management
For internal use only.

## Syntax
```xml
<xs:simpleType name="ServiceLevel" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="SelfServe" />
    <xs:enumeration value="SelfServeTrusted" />
    <xs:enumeration value="Premium" />
    <xs:enumeration value="Internal" />
    <xs:enumeration value="Select" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [ServiceLevel](servicelevel.md) value set has the following values: [Internal](#internal), [Premium](#premium), [Select](#select), [SelfServe](#selfserve), [SelfServeTrusted](#selfservetrusted).

|Value|Description|
|-----------|---------------|
|<a name="internal"></a>Internal|For internal use only.|
|<a name="premium"></a>Premium|For internal use only.|
|<a name="select"></a>Select|For internal use only.|
|<a name="selfserve"></a>SelfServe|For internal use only.|
|<a name="selfservetrusted"></a>SelfServeTrusted|For internal use only.|

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13  

## Used By
[Customer](customer.md)  
