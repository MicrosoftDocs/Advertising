---
title: AccountAdditionalField Value Set - Customer Billing
ms.service: bing-ads
ms.subservice: customer-billing-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a value set for additional account fields.
---
# AccountAdditionalField Value Set - Customer Billing
Defines a value set for additional account fields.

## Syntax
```xml
<xs:simpleType name="AccountAdditionalField" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="TaxCertificate" />
        <xs:enumeration value="AccountMode" />
        <xs:enumeration value="CouponClaimInfo" />
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AccountAdditionalField](accountadditionalfield.md) value set has the following values: [AccountMode](#accountmode), [CouponClaimInfo](#couponclaiminfo), [TaxCertificate](#taxcertificate).

|Value|Description|
|-----------|---------------|
|<a name="accountmode"></a>AccountMode|Return *AccountMode* in the response.|
|<a name="couponclaiminfo"></a>CouponClaimInfo|Return *CouponClaimInfo* in the response.|
|<a name="taxcertificate"></a>TaxCertificate|Return *TaxCertificate* in the response.|

## Requirements
Service: [CustomerBillingService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/Billing/v13/CustomerBillingService.svc)  
Namespace: https\://bingads.microsoft.com/Billing/v13  

## Used By
[SearchCoupons](searchcoupons.md)  
