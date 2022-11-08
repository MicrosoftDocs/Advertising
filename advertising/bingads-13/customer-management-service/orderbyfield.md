---
title: OrderByField Value Set - Customer Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the field order of entities returned using one of the search operations, for example SearchAccounts, SearchClientLinks, or SearchCustomers.
ms.subservice: customer-management-api
---
# OrderByField Value Set - Customer Management
Defines the field order of entities returned using one of the search operations, for example [SearchAccounts](searchaccounts.md), [SearchClientLinks](searchclientlinks.md), or [SearchCustomers](searchcustomers.md).

## Syntax
```xml
<xs:simpleType name="OrderByField" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Id" />
    <xs:enumeration value="Name" />
    <xs:enumeration value="Number" />
    <xs:enumeration value="LifeCycleStatus" />
    <xs:enumeration value="CouponClassName" />
    <xs:enumeration value="CouponStartDate" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [OrderByField](orderbyfield.md) value set has the following values: [CouponClassName](#couponclassname), [CouponStartDate](#couponstartdate), [Id](#id), [LifeCycleStatus](#lifecyclestatus), [Name](#name), [Number](#number).

|Value|Description|
|-----------|---------------|
|<a name="couponclassname"></a>CouponClassName|This value is not supported with the customer management service.|
|<a name="couponstartdate"></a>CouponStartDate|This value is not supported with the customer management service.|
|<a name="id"></a>Id|The order is determined by a predicate identifier.|
|<a name="lifecyclestatus"></a>LifeCycleStatus|The order is determined by a predicate life cycle status.|
|<a name="name"></a>Name|The order is determined by a predicate name.|
|<a name="number"></a>Number|The order is determined by a predicate number.|

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13  

## Used By
[OrderBy](orderby.md)  
