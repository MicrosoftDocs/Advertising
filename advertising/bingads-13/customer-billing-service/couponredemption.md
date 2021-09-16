---
title: CouponRedemption Data Object - Customer Billing
ms.service: bing-ads-customer-billing-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines the CouponRedemption Data Object.
---
# CouponRedemption Data Object - Customer Billing
Defines the CouponRedemption Data Object.

## Syntax
```xml
<xs:complexType name="CouponRedemption" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AccountId" type="xs:long" />
    <xs:element minOccurs="0" name="AccountNumber" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="SpendToThreshold" type="xs:double" />
    <xs:element minOccurs="0" name="Balance" type="xs:double" />
    <xs:element minOccurs="0" name="CurrencyCode" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="RedemptionDate" type="xs:dateTime" />
    <xs:element minOccurs="0" name="ExpirationDate" type="xs:dateTime" />
    <xs:element minOccurs="0" name="ActivationDate" nillable="true" type="xs:dateTime" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [CouponRedemption](couponredemption.md) object has the following elements: [AccountId](#accountid), [AccountNumber](#accountnumber), [ActivationDate](#activationdate), [Balance](#balance), [CurrencyCode](#currencycode), [ExpirationDate](#expirationdate), [RedemptionDate](#redemptiondate), [SpendToThreshold](#spendtothreshold).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountid"></a>AccountId|Reserved.|**long**|
|<a name="accountnumber"></a>AccountNumber|Reserved.|**string**|
|<a name="activationdate"></a>ActivationDate|Reserved.|**dateTime**|
|<a name="balance"></a>Balance|Reserved.|**double**|
|<a name="currencycode"></a>CurrencyCode|Reserved.|**string**|
|<a name="expirationdate"></a>ExpirationDate|Reserved.|**dateTime**|
|<a name="redemptiondate"></a>RedemptionDate|Reserved.|**dateTime**|
|<a name="spendtothreshold"></a>SpendToThreshold|Reserved.|**double**|

## Requirements
Service: [CustomerBillingService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/Billing/v13/CustomerBillingService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13/Entities  

## Used By
[Coupon](coupon.md)  
