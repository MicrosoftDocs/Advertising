---
title: PredicateOperator Value Set - Customer Billing
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the condition of results for insertion orders returned using one of the search operations, for example SearchCoupons or SearchInsertionOrders.
ms.subservice: customer-billing-api
---
# PredicateOperator Value Set - Customer Billing
Defines the condition of results for insertion orders returned using one of the search operations, for example [SearchCoupons](searchcoupons.md) or [SearchInsertionOrders](searchinsertionorders.md).

## Syntax
```xml
<xs:simpleType name="PredicateOperator" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Equals" />
    <xs:enumeration value="NotEquals" />
    <xs:enumeration value="Contains" />
    <xs:enumeration value="In" />
    <xs:enumeration value="GreaterThanEquals" />
    <xs:enumeration value="LessThanEquals" />
    <xs:enumeration value="StartsWith" />
    <xs:enumeration value="NotContains" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [PredicateOperator](predicateoperator.md) value set has the following values: [Contains](#contains), [Equals](#equals), [GreaterThanEquals](#greaterthanequals), [In](#in), [LessThanEquals](#lessthanequals), [NotContains](#notcontains), [NotEquals](#notequals), [StartsWith](#startswith).

|Value|Description|
|-----------|---------------|
|<a name="contains"></a>Contains|The field must contain the specified value.|
|<a name="equals"></a>Equals|The field must equal the specified value.|
|<a name="greaterthanequals"></a>GreaterThanEquals|The field must be greater than or equal to the specified value.|
|<a name="in"></a>In|The field must equal one of the specified comma separated values.<br/><br/>The maximum number of comma separated values that can be specified is 10.|
|<a name="lessthanequals"></a>LessThanEquals|The field must be less than or equal to the specified value.|
|<a name="notcontains"></a>NotContains|The field must not contain the specified value.<br/><br/>Not currently supported.|
|<a name="notequals"></a>NotEquals|The field must not equal the specified value.<br/><br/>Not currently supported.|
|<a name="startswith"></a>StartsWith|The field must start with the specified value.<br/><br/>Not currently supported.|

## Requirements
Service: [CustomerBillingService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/Billing/v13/CustomerBillingService.svc)  
Namespace: https\://bingads.microsoft.com/Billing/v13  

## Used By
[Predicate](predicate.md)  
