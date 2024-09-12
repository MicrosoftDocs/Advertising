---
title: KeyValueEntityOflongstring Data Object Test - Customer Billing
ms.service: bing-ads
ms.subservice: customer-billing-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a KeyValueEntityOflongstring data object.(test)
---
# KeyValueEntityOflongstring Data Object Test - Customer Billing
Defines a KeyValueEntityOflongstring data object.

# [XML](#tab/xml)

```xml
<xs:complexType name="KeyValueEntityOflongstring" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:annotation>
    <xs:appinfo>
      <GenericType Name="KeyValueEntityOf{0}{1}{#}" Namespace="https://bingads.microsoft.com/Customer/v13/Entities" xmlns="http://schemas.microsoft.com/2003/10/Serialization/">
        <GenericParameter Name="long" Namespace="http://www.w3.org/2001/XMLSchema" />
        <GenericParameter Name="string" Namespace="http://www.w3.org/2001/XMLSchema" />
      </GenericType>
    </xs:appinfo>
  </xs:annotation>
  <xs:sequence>
    <xs:element minOccurs="0" name="Key" type="xs:long" />
    <xs:element minOccurs="0" name="Value" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Key": "LongValueHere",
  "Value": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [KeyValueEntityOflongstring](keyvalueentityoflongstring.md) object has the following elements: [Key](#key), [Value](#value).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="key"></a>Key|Reserved.|**long**|
|<a name="value"></a>Value|Reserved.|**string**|

## Requirements
Service: [CustomerBillingService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/Billing/v13/CustomerBillingService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13/Entities  

## Used By
[ClaimFeatureAdoptionCoupons](claimfeatureadoptioncoupons.md)  
