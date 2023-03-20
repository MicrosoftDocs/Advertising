---
title: Predicate Data Object - Customer Billing
ms.service: bing-ads
ms.subservice: customer-billing-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a predicate for the list of insertion orders returned using one of the search operations, for example SearchCoupons or SearchInsertionOrders.
---
# Predicate Data Object - Customer Billing
Defines a predicate for the list of insertion orders returned using one of the search operations, for example [SearchCoupons](searchcoupons.md) or [SearchInsertionOrders](searchinsertionorders.md).

## Syntax
```xml
<xs:complexType name="Predicate" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Field" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Operator" type="tns:PredicateOperator" />
    <xs:element minOccurs="0" name="Value" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [Predicate](predicate.md) object has the following elements: [Field](#field), [Operator](#operator), [Value](#value).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="field"></a>Field|The name of the element for  the object you are searching.<br/><br/>For possible values, see the [SearchInsertionOrders](searchinsertionorders.md) operation.|**string**|
|<a name="operator"></a>Operator|Defines the relationship between the field and the value.|[PredicateOperator](predicateoperator.md)|
|<a name="value"></a>Value|The string to search in the specified field.<br/><br/>The length of this string must be four or greater, unless the field is set to MarketCountry or MarketLanguage.|**string**|

## <a name="remarks"></a>Remarks
The supported Field element and Operator elements of a Predicate object for each service operation are provided in detail below. 


### <a name="searchcoupons"></a>SearchCoupons Predicates
For the [SearchCoupons](searchcoupons.md) service operation, the following are supported Field element and Operator elements of a Predicate object.

|Field|Operator|Description|
|---------|------------|---------------|
|CustomerId|Equals|Use this field to search by the coupon class's owner customer.<br/><br/>This predicate field is required.|
|CouponClassName|Equals|Use this field to search by the coupon class name.|
|IsRedeemed|Equals|Use this field to search by the coupon's IsRedeemed element.|
|StartDate|GreaterThanEquals|Use this field to search by coupon start date.<br/><br/>The date is stored in Coordinated Universal Time (UTC). Only the month, day, and year of the specified string are used for search. If you specify the hour, minutes, and seconds of a date they will be ignored.<br/><br/>For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).|

### <a name="searchinsertionorders"></a>SearchInsertionOrders Predicates
For the [SearchInsertionOrders](searchinsertionorders.md) service operation, the following are supported Field element and Operator elements of a Predicate object.

|Field|Operator|Description|
|---------|------------|---------------|
|AccountId|Equals|Use this field to search by the insertion order's account identifier.<br/><br/>This predicate field is required.|
|EndDate|GreaterThanEquals<br/><br/>LessThanEquals|Use this field to search by insertion order end date. The date is stored in Coordinated Universal Time (UTC). Only the month, day, and year of the specified string are used for search. If you specify the hour, minutes, and seconds of a date they will be ignored.<br/><br/>For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).|
|InsertionOrderIds|Equals<br/><br/>In|Use this field to search by insertion order IDs.|
|StartDate|GreaterThanEquals<br/><br/>LessThanEquals|Use this field to search by insertion order start date.<br/><br/>The date is stored in Coordinated Universal Time (UTC). Only the month, day, and year of the specified string are used for search. If you specify the hour, minutes, and seconds of a date they will be ignored.<br/><br/>For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).|

## Requirements
Service: [CustomerBillingService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/Billing/v13/CustomerBillingService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13/Entities  

## Used By
[SearchCoupons](searchcoupons.md)  
[SearchInsertionOrders](searchinsertionorders.md)  
