---
title: InsertionOrderAdditionalField Value Set - Customer Billing
ms.service: bing-ads
ms.subservice: customer-billing-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a value set for additional insertion order fields.
---
# InsertionOrderAdditionalField Value Set - Customer Billing
Defines a value set for additional insertion order fields.

## Syntax
```xml
<xs:simpleType name="InsertionOrderAdditionalField" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="None">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">0</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
        <xs:enumeration value="UnlimitedAndEndlessFlags">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [InsertionOrderAdditionalField](insertionorderadditionalfield.md) value set has the following values: [None](#none), [UnlimitedAndEndlessFlags](#unlimitedandendlessflags).

|Value|Description|
|-----------|---------------|
|<a name="none"></a>None|Reserved.|
|<a name="unlimitedandendlessflags"></a>UnlimitedAndEndlessFlags|Return *IsUnlimited* and *IsEndless* in the response.|

## Requirements
Service: [CustomerBillingService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/Billing/v13/CustomerBillingService.svc)  
Namespace: https\://bingads.microsoft.com/Billing/v13  

## Used By
[SearchInsertionOrders](searchinsertionorders.md)  
