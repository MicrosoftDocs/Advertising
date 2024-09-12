---
title: OrderBy Data Object Test - Customer Billing
ms.service: bing-ads
ms.subservice: customer-billing-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an order for the list of insertion orders returned using one of the search operations, for example SearchCoupons or SearchInsertionOrders.(test)
---
# OrderBy Data Object Test - Customer Billing
Defines an order for the list of insertion orders returned using one of the search operations, for example [SearchCoupons](searchcoupons.md) or [SearchInsertionOrders](searchinsertionorders.md).

# [XML](#tab/xml)

```xml
<xs:complexType name="OrderBy" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Field" type="tns:OrderByField" />
    <xs:element minOccurs="0" name="Order" type="tns:SortOrder" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Field": "ValueHere",
  "Order": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [OrderBy](orderby.md) object has the following elements: [Field](#field), [Order](#order).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="field"></a>Field|Determines the field to order the results. For example order the results by *Id*.|[OrderByField](orderbyfield.md)|
|<a name="order"></a>Order|Determines whether the results are ascending or descending.|[SortOrder](sortorder.md)|

## Requirements
Service: [CustomerBillingService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/Billing/v13/CustomerBillingService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13/Entities  

## Used By
[SearchCoupons](searchcoupons.md)  
[SearchInsertionOrders](searchinsertionorders.md)  
