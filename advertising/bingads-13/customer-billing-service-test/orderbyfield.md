---
title: OrderByField Value Set Test - Customer Billing
ms.service: bing-ads
ms.subservice: customer-billing-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the field order of entities returned using one of the search operations, for example SearchCoupons or SearchInsertionOrders.(test)
---
# OrderByField Value Set Test - Customer Billing
Defines the field order of entities returned using one of the search operations, for example [SearchCoupons](searchcoupons.md) or [SearchInsertionOrders](searchinsertionorders.md).

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
|<a name="couponclassname"></a>CouponClassName|The order is determined by a predicate coupon class name.<br/><br/>This value is only supported with [SearchCoupons](searchcoupons.md).|
|<a name="couponstartdate"></a>CouponStartDate|The order is determined by a predicate coupon start date.<br/><br/>This value is only supported with [SearchCoupons](searchcoupons.md).|
|<a name="id"></a>Id|The order is determined by a predicate identifier.<br/><br/>This value is only supported with [SearchInsertionOrders](searchinsertionorders.md).|
|<a name="lifecyclestatus"></a>LifeCycleStatus|The order is determined by a predicate life cycle status.<br/><br/>This value is reserved for future use.|
|<a name="name"></a>Name|The order is determined by a predicate name.<br/><br/>This value is only supported with [SearchInsertionOrders](searchinsertionorders.md).|
|<a name="number"></a>Number|The order is determined by a predicate number.<br/><br/>This value is reserved for future use.|

## Requirements
Service: [CustomerBillingService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/Billing/v13/CustomerBillingService.svc)  
Namespace: https\://bingads.microsoft.com/Billing/v13  

## Used By
[OrderBy](orderby.md)  
