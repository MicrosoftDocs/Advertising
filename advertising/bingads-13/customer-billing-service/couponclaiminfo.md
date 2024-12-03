---
title: CouponClaimInfo Data Object - Customer Billing
ms.service: bing-ads
ms.subservice: customer-billing-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines an object containing coupon claim information.
---
# CouponClaimInfo Data Object - Customer Billing
Defines an object containing coupon claim information.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="CouponClaimInfo" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AccountId" type="xs:long" />
    <xs:element minOccurs="0" name="AccountNumber" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="ClaimDate" type="xs:dateTime" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AccountId": "LongValueHere",
  "AccountNumber": "ValueHere",
  "ClaimDate": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [CouponClaimInfo](couponclaiminfo.md) object has the following elements: [AccountId](#accountid), [AccountNumber](#accountnumber), [ClaimDate](#claimdate).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountid"></a>AccountId|The identifier of the account related to the claim.|**long**|
|<a name="accountnumber"></a>AccountNumber|The account number of the account related to the claim.|**string**|
|<a name="claimdate"></a>ClaimDate|The date of the claim.|**dateTime**|

## Requirements
Service: [CustomerBillingService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/Billing/v13/CustomerBillingService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13/Entities  

## Used By
[Coupon](coupon.md)  
