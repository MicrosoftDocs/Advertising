---
title: SortOrder Value Set - Customer Billing
ms.service: bing-ads
ms.subservice: customer-billing-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the ascending or descending sort order of results using one of the search operations, for example SearchCoupons or SearchInsertionOrders.
---
# SortOrder Value Set - Customer Billing
Defines the ascending or descending sort order of results using one of the search operations, for example [SearchCoupons](searchcoupons.md) or [SearchInsertionOrders](searchinsertionorders.md).

## Syntax
```xml
<xs:simpleType name="SortOrder" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Ascending" />
    <xs:enumeration value="Descending" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [SortOrder](sortorder.md) value set has the following values: [Ascending](#ascending), [Descending](#descending).

|Value|Description|
|-----------|---------------|
|<a name="ascending"></a>Ascending|The results will be sorted ascending.|
|<a name="descending"></a>Descending|The results will be sorted descending.|

## Requirements
Service: [CustomerBillingService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/Billing/v13/CustomerBillingService.svc)  
Namespace: https\://bingads.microsoft.com/Billing/v13  

## Used By
[OrderBy](orderby.md)  
