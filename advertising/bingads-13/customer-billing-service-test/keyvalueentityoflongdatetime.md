---
title: KeyValueEntityOflongdateTime Data Object Test - Customer Billing
ms.service: bing-ads
ms.subservice: customer-billing-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a KeyValueEntityOflongdateTime data object.(test)
---
# KeyValueEntityOflongdateTime Data Object Test - Customer Billing
Defines a KeyValueEntityOflongdateTime data object.

# [XML](#tab/xml)

```xml
<xs:complexType name="KeyValueEntityOflongdateTime" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:annotation>
    <xs:appinfo>
      <GenericType Name="KeyValueEntityOf{0}{1}{#}" Namespace="https://bingads.microsoft.com/Customer/v13/Entities" xmlns="http://schemas.microsoft.com/2003/10/Serialization/">
        <GenericParameter Name="long" Namespace="http://www.w3.org/2001/XMLSchema" />
        <GenericParameter Name="dateTime" Namespace="http://www.w3.org/2001/XMLSchema" />
      </GenericType>
    </xs:appinfo>
  </xs:annotation>
  <xs:sequence>
    <xs:element minOccurs="0" name="Key" type="xs:long" />
    <xs:element minOccurs="0" name="Value" type="xs:dateTime" />
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

The [KeyValueEntityOflongdateTime](keyvalueentityoflongdatetime.md) object has the following elements: [Key](#key), [Value](#value).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="key"></a>Key|Reserved.|**long**|
|<a name="value"></a>Value|Reserved.|**dateTime**|

## Requirements
Service: [CustomerBillingService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/Billing/v13/CustomerBillingService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13/Entities  

## Used By
[ClaimFeatureAdoptionCoupons](claimfeatureadoptioncoupons.md)  
