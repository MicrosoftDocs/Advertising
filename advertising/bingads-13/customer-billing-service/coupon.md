---
title: Coupon Data Object - Customer Billing
ms.service: bing-ads-customer-billing-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines the Coupon Data Object.
---
# Coupon Data Object - Customer Billing
Defines the Coupon Data Object.

## Syntax
```xml
<xs:complexType name="Coupon" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="CouponCode" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="ClassName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="CouponType" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Amount" type="xs:double" />
    <xs:element minOccurs="0" name="SpendThreshold" type="xs:double" />
    <xs:element minOccurs="0" name="CurrencyCode" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="PercentOff" nillable="true" type="xs:double" />
    <xs:element minOccurs="0" name="ActiveDuration" nillable="true" type="xs:int" />
    <xs:element minOccurs="0" name="ExpirationDate" nillable="true" type="xs:dateTime" />
    <xs:element minOccurs="0" name="StartDate" nillable="true" type="xs:dateTime" />
    <xs:element minOccurs="0" name="EndDate" nillable="true" type="xs:dateTime" />
    <xs:element minOccurs="0" name="SendToEmail" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="SendToDate" nillable="true" type="xs:dateTime" />
    <xs:element minOccurs="0" name="IsRedeemed" type="xs:boolean" />
    <xs:element minOccurs="0" name="RedemptionInfo" nillable="true" type="tns:CouponRedemption" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [Coupon](coupon.md) object has the following elements: [ActiveDuration](#activeduration), [Amount](#amount), [ClassName](#classname), [CouponCode](#couponcode), [CouponType](#coupontype), [CurrencyCode](#currencycode), [EndDate](#enddate), [ExpirationDate](#expirationdate), [IsRedeemed](#isredeemed), [PercentOff](#percentoff), [RedemptionInfo](#redemptioninfo), [SendToDate](#sendtodate), [SendToEmail](#sendtoemail), [SpendThreshold](#spendthreshold), [StartDate](#startdate).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="activeduration"></a>ActiveDuration|Coupon active days since coupon has been redeemed. After these days, Coupon can't be consumed.|**int**|
|<a name="amount"></a>Amount|The amount of coupon in coupon currency.|**double**|
|<a name="classname"></a>ClassName|The Coupon class that the coupon was minted from.|**string**|
|<a name="couponcode"></a>CouponCode|The code of coupon. Customer can use this code to redeem coupon.|**string**|
|<a name="coupontype"></a>CouponType|Support type:<br/>Acquisition: Acquisition coupon is used to acquire new customer. Only new customer can redeem this coupon.<br/>Retention: Retention coupon can be used by both new and old customer.|**string**|
|<a name="currencycode"></a>CurrencyCode|The currency of coupon amount and spend threshold. For possible values, see [Currencies](../guides/currencies.md).|**string**|
|<a name="enddate"></a>EndDate|The last date that the coupon can be redeemed.|**dateTime**|
|<a name="expirationdate"></a>ExpirationDate|Coupon expiry date. After this date, coupon can't be consumed.|**dateTime**|
|<a name="isredeemed"></a>IsRedeemed|Has the coupon been redeemed.|**boolean**|
|<a name="percentoff"></a>PercentOff|This is only valid to percent coupon.<br/>Example: PercentOff is 30. Account spend is 100$. Ads platform charges advertiser 70$=100$*(100%-30%). |**double**|
|<a name="redemptioninfo"></a>RedemptionInfo|Redemption contains redemption and consuming details. Return this only when the account that the coupon redeemed to bills to coupon's owner customer.|[CouponRedemption](couponredemption.md)|
|<a name="sendtodate"></a>SendToDate|The date the coupon was emailed by SendCouponCodes API.|**dateTime**|
|<a name="sendtoemail"></a>SendToEmail|The email address the coupon has been emailed in SendCouponCodes API.|**string**|
|<a name="spendthreshold"></a>SpendThreshold|The coupon can't be consumed until account's spend reaches this spend threshold from the time coupon redeemed.|**double**|
|<a name="startdate"></a>StartDate|The coupon cannot be redeemed before the start date.|**dateTime**|

## Requirements
Service: [CustomerBillingService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/Billing/v13/CustomerBillingService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13/Entities  

## Used By
[SearchCoupons](searchcoupons.md)  
