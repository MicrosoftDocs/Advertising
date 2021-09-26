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
|<a name="accountid"></a>AccountId|The identifier of the account to which the coupon was redeemed.|**long**|
|<a name="accountnumber"></a>AccountNumber|The account number.|**string**|
|<a name="activationdate"></a>ActivationDate|The date that the coupon is ready to be consumed.|**dateTime**|
|<a name="balance"></a>Balance|The remaining amount of the coupon in account currency.|**double**|
|<a name="currencycode"></a>CurrencyCode|The currency of the account. For possible values, see [Currencies](../guides/currencies.md).|**string**|
|<a name="expirationdate"></a>ExpirationDate|Coupon expiry date. After this date, the coupon can't be consumed.|**dateTime**|
|<a name="redemptiondate"></a>RedemptionDate|The date that coupon was redeemed to the account.|**dateTime**|
|<a name="spendtothreshold"></a>SpendToThreshold|Spend of the account before the coupon's spend threshold are reached. It is in account currency.|**double**|

## Requirements
Service: [CustomerBillingService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/Billing/v13/CustomerBillingService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13/Entities  

## Used By
[Coupon](coupon.md)  
