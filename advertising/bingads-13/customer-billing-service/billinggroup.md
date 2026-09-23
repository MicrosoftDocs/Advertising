---
title: BillingGroup Data Object - Customer Billing
ms.service: bing-ads
ms.subservice: customer-billing-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the billing group data object.
---
# BillingGroup Data Object - Customer Billing
Defines the billing group data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="BillingGroup" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="BillingGroupId" type="xs:long" />
    <xs:element minOccurs="0" name="CustomerId" type="xs:long" />
    <xs:element minOccurs="0" name="Name" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Description" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "BillingGroupId": "LongValueHere",
  "CustomerId": "LongValueHere",
  "Description": "ValueHere",
  "Name": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [BillingGroup](billinggroup.md) object has the following elements: [BillingGroupId](#billinggroupid), [CustomerId](#customerid), [Description](#description), [Name](#name).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="billinggroupid"></a>BillingGroupId|The Microsoft Advertising identifier of the billing group.|**long**|
|<a name="customerid"></a>CustomerId|The Microsoft Advertising identifier of the customer that owns the billing group.|**long**|
|<a name="description"></a>Description|The billing group description.|**string**|
|<a name="name"></a>Name|The billing group name.|**string**|

## Requirements
Service: [CustomerBillingService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/Billing/v13/CustomerBillingService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13/Entities  

## Used By
[GetBillingGroups](getbillinggroups.md)  
