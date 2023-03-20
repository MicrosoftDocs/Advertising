---
title: DataType Value Set - Customer Billing
ms.service: bing-ads
ms.subservice: customer-billing-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the possible formats in which to generate the billing document.
---
# DataType Value Set - Customer Billing
Defines the possible formats in which to generate the billing document.

## Syntax
```xml
<xs:simpleType name="DataType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Xml">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Pdf">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [DataType](datatype.md) value set has the following values: [Pdf](#pdf), [Xml](#xml).

|Value|Description|
|-----------|---------------|
|<a name="pdf"></a>Pdf|Use PDF format.|
|<a name="xml"></a>Xml|Use XML format.|

## Requirements
Service: [CustomerBillingService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/Billing/v13/CustomerBillingService.svc)  
Namespace: https\://bingads.microsoft.com/Billing/v13  

## Used By
[BillingDocument](billingdocument.md)  
[GetBillingDocuments](getbillingdocuments.md)  
