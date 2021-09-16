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
|<a name="activeduration"></a>ActiveDuration|Reserved.|**int**|
|<a name="amount"></a>Amount|Reserved.|**double**|
|<a name="classname"></a>ClassName|Reserved.|**string**|
|<a name="couponcode"></a>CouponCode|Reserved.|**string**|
|<a name="coupontype"></a>CouponType|Reserved.|**string**|
|<a name="currencycode"></a>CurrencyCode|Reserved.|**string**|
|<a name="enddate"></a>EndDate|Reserved.|**dateTime**|
|<a name="expirationdate"></a>ExpirationDate|Reserved.|**dateTime**|
|<a name="isredeemed"></a>IsRedeemed|Reserved.|**boolean**|
|<a name="percentoff"></a>PercentOff|Reserved.|**double**|
|<a name="redemptioninfo"></a>RedemptionInfo|Reserved.|[CouponRedemption](couponredemption.md)|
|<a name="sendtodate"></a>SendToDate|Reserved.|**dateTime**|
|<a name="sendtoemail"></a>SendToEmail|Reserved.|**string**|
|<a name="spendthreshold"></a>SpendThreshold|Reserved.|**double**|
|<a name="startdate"></a>StartDate|Reserved.|**dateTime**|

## Requirements
Service: [CustomerBillingService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/Billing/v13/CustomerBillingService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13/Entities  

## Used By
[SearchCoupons](searchcoupons.md)  
