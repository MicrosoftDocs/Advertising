---
title: CouponInfoData Data Object - Customer Billing
ms.service: bing-ads
ms.subservice: customer-billing-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines an object containing coupon info.
---
# CouponInfoData Data Object - Customer Billing
Defines an object containing coupon info.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="CouponInfoData" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AccountId" type="xs:int" />
    <xs:element minOccurs="0" name="CouponId" nillable="true" type="xs:int" />
    <xs:element minOccurs="0" name="ClaimDate" nillable="true" type="xs:dateTime" />
    <xs:element minOccurs="0" name="Status" nillable="true" type="xs:unsignedByte" />
    <xs:element minOccurs="0" name="RedemptionDate" nillable="true" type="xs:dateTime" />
    <xs:element minOccurs="0" name="ExpirationDate" nillable="true" type="xs:dateTime" />
    <xs:element minOccurs="0" name="PercentOff" nillable="true" type="xs:double" />
    <xs:element minOccurs="0" name="CouponValue" nillable="true" type="xs:decimal" />
    <xs:element minOccurs="0" name="UpfrontSpending" nillable="true" type="xs:decimal" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AccountId": IntValueHere,
  "ClaimDate": "ValueHere",
  "CouponId": IntValueHere,
  "CouponValue": DecimalValueHere,
  "ExpirationDate": "ValueHere",
  "PercentOff": DoubleValueHere,
  "RedemptionDate": "ValueHere",
  "Status": "ValueHere",
  "UpfrontSpending": DecimalValueHere
}
```

-----

## <a name="elements"></a>Elements

The [CouponInfoData](couponinfodata.md) object has the following elements: [AccountId](#accountid), [ClaimDate](#claimdate), [CouponId](#couponid), [CouponValue](#couponvalue), [ExpirationDate](#expirationdate), [PercentOff](#percentoff), [RedemptionDate](#redemptiondate), [Status](#status), [UpfrontSpending](#upfrontspending).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountid"></a>AccountId|The account ID.|**int**|
|<a name="claimdate"></a>ClaimDate|The coupon's claim date.|**dateTime**|
|<a name="couponid"></a>CouponId|The coupon ID.|**int**|
|<a name="couponvalue"></a>CouponValue|The coupon's value.|**decimal**|
|<a name="expirationdate"></a>ExpirationDate|The coupon's expiration date.|**dateTime**|
|<a name="percentoff"></a>PercentOff|The coupon's discount percentage.|**double**|
|<a name="redemptiondate"></a>RedemptionDate|The date the coupon was redeemed.|**dateTime**|
|<a name="status"></a>Status|The coupon's status.|**unsignedByte**|
|<a name="upfrontspending"></a>UpfrontSpending|The value of the upfront spending coupon.|**decimal**|

## Requirements
Service: [CustomerBillingService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/Billing/v13/CustomerBillingService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13/Entities  

## Used By
[GetCouponInfo](getcouponinfo.md)  
