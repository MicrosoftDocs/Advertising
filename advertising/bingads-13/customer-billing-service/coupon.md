---
title: Coupon Data Object - Customer Billing
ms.service: bing-ads
ms.subservice: customer-billing-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a coupon.
---
# Coupon Data Object - Customer Billing
Defines a coupon.

## Syntax

# [XML](#tab/xml)

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
    <xs:element minOccurs="0" name="ClaimInfo" nillable="true" type="tns:CouponClaimInfo">
      <xs:annotation>
        <xs:appinfo>
          <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
        </xs:appinfo>
      </xs:annotation>
    </xs:element>
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "ActiveDuration": IntValueHere,
  "Amount": DoubleValueHere,
  "ClaimInfo": {
    "AccountId": "LongValueHere",
    "AccountNumber": "ValueHere",
    "ClaimDate": "ValueHere"
  },
  "ClassName": "ValueHere",
  "CouponCode": "ValueHere",
  "CouponType": "ValueHere",
  "CurrencyCode": "ValueHere",
  "EndDate": "ValueHere",
  "ExpirationDate": "ValueHere",
  "IsRedeemed": "ValueHere",
  "PercentOff": DoubleValueHere,
  "RedemptionInfo": {
    "AccountId": "LongValueHere",
    "AccountNumber": "ValueHere",
    "ActivationDate": "ValueHere",
    "Balance": DoubleValueHere,
    "CurrencyCode": "ValueHere",
    "ExpirationDate": "ValueHere",
    "RedemptionDate": "ValueHere",
    "SpendToThreshold": DoubleValueHere
  },
  "SendToDate": "ValueHere",
  "SendToEmail": "ValueHere",
  "SpendThreshold": DoubleValueHere,
  "StartDate": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [Coupon](coupon.md) object has the following elements: [ActiveDuration](#activeduration), [Amount](#amount), [ClaimInfo](#claiminfo), [ClassName](#classname), [CouponCode](#couponcode), [CouponType](#coupontype), [CurrencyCode](#currencycode), [EndDate](#enddate), [ExpirationDate](#expirationdate), [IsRedeemed](#isredeemed), [PercentOff](#percentoff), [RedemptionInfo](#redemptioninfo), [SendToDate](#sendtodate), [SendToEmail](#sendtoemail), [SpendThreshold](#spendthreshold), [StartDate](#startdate).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="activeduration"></a>ActiveDuration|Active days since coupon has been redeemed.<br/><br/>After these days, the coupon can't be consumed.|**int**|
|<a name="amount"></a>Amount|The value amount of the coupon.<br/><br/>The [CurrencyCode](#currencycode) element determines the currency.|**double**|
|<a name="claiminfo"></a>ClaimInfo|The *AccountId*, *AccountNumber*, and *ClaimDate* of the claim.|[CouponClaimInfo](couponclaiminfo.md)|
|<a name="classname"></a>ClassName|The class name that the coupon was minted from.|**string**|
|<a name="couponcode"></a>CouponCode|The code that can be used to redeem the coupon.|**string**|
|<a name="coupontype"></a>CouponType|The coupon's type.<br/><br/>Supported types include:<br/>**Acquisition:** Acquisition coupon is used to acquire new customers. Only new customers can redeem this coupon.<br/>**Retention:** Retention coupons can be used by both new and existing customers.|**string**|
|<a name="currencycode"></a>CurrencyCode|The currency of the coupon amount and spend threshold.<br/><br/>For possible values, see [Currencies](../guides/currencies.md).|**string**|
|<a name="enddate"></a>EndDate|The last date that the coupon can be redeemed.|**dateTime**|
|<a name="expirationdate"></a>ExpirationDate|The coupon expiration date.<br/><br/>After this date, the coupon can't be consumed.|**dateTime**|
|<a name="isredeemed"></a>IsRedeemed|Has the coupon been redeemed.<br/><br/>Value will be true if the coupon has been redeemed, and otherwise the value is false.|**boolean**|
|<a name="percentoff"></a>PercentOff|The percent off coupon value.<br/><br/>This is only applicable for a percentage coupon.<br/>For example, 10.0 represents a 10% discount.|**double**|
|<a name="redemptioninfo"></a>RedemptionInfo|Contains redemption and consuming details.<br/><br/>Returned only when the account where the coupon was redeemed bills to the coupon's owner customer.|[CouponRedemption](couponredemption.md)|
|<a name="sendtodate"></a>SendToDate|The date the coupon was emailed by the [DispatchCoupons](dispatchcoupons.md) operation.|**dateTime**|
|<a name="sendtoemail"></a>SendToEmail|The email address the coupon has been emailed by the [DispatchCoupons](dispatchcoupons.md) operation.|**string**|
|<a name="spendthreshold"></a>SpendThreshold|The coupon can't be consumed until the account's spend reaches this threshold from the time coupon was redeemed.<br/><br/>The [CurrencyCode](#currencycode) element determines the currency.|**double**|
|<a name="startdate"></a>StartDate|The coupon cannot be redeemed before the start date.|**dateTime**|

## Requirements
Service: [CustomerBillingService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/Billing/v13/CustomerBillingService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13/Entities  

## Used By
[SearchCoupons](searchcoupons.md)  
