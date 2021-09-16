---
title: BillingDocument Data Object - Customer Billing
ms.service: bing-ads-customer-billing-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines a billing document.
---
# BillingDocument Data Object - Customer Billing
Defines a billing document.

## Syntax
```xml
<xs:complexType name="BillingDocument" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Data" nillable="true" type="xs:base64Binary" />
    <xs:element minOccurs="0" name="Id" type="xs:long" />
    <xs:element minOccurs="0" name="Type" type="tns:DataType" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [BillingDocument](billingdocument.md) object has the following elements: [Data](#data), [Id](#id), [Type](#type).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="data"></a>Data|The billing document.|**base64Binary**|
|<a name="id"></a>Id|The identifier of the billing document.|**long**|
|<a name="type"></a>Type|The format of the billing document.|[DataType](datatype.md)|

## Requirements
Service: [CustomerBillingService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/Billing/v13/CustomerBillingService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13/Entities  

## Used By
[GetBillingDocuments](getbillingdocuments.md)  
