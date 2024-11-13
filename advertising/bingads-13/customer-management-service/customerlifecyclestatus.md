---
title: CustomerLifeCycleStatus Value Set - Customer Management
ms.service: bing-ads
ms.subservice: customer-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the possible status values of a customer.
---
# CustomerLifeCycleStatus Value Set - Customer Management
Defines the possible status values of a customer.

## Syntax
```xml
<xs:simpleType name="CustomerLifeCycleStatus" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Active" />
    <xs:enumeration value="Inactive" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [CustomerLifeCycleStatus](customerlifecyclestatus.md) value set has the following values: [Active](#active), [Inactive](#inactive).

|Value|Description|
|-----------|---------------|
|<a name="active"></a>Active|The customer is active.|
|<a name="inactive"></a>Inactive|The customer is inactive, which means that the customer was deleted.|

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13  

## Used By
[Customer](customer.md)  
