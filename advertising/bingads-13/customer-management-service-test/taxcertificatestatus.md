---
title: TaxCertificateStatus Value Set Test - Customer Management
ms.service: bing-ads
ms.subservice: customer-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the TaxCertificateStatus Value Set.(test)
---
# TaxCertificateStatus Value Set Test - Customer Management
Defines the TaxCertificateStatus Value Set.

## Syntax
```xml
<xs:simpleType name="TaxCertificateStatus" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Valid">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">174</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Invalid">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">175</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Pending">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">176</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [TaxCertificateStatus](taxcertificatestatus.md) value set has the following values: [Invalid](#invalid), [Pending](#pending), [Valid](#valid).

|Value|Description|
|-----------|---------------|
|<a name="invalid"></a>Invalid|Reserved.|
|<a name="pending"></a>Pending|Reserved.|
|<a name="valid"></a>Valid|Reserved.|

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13  

## Used By
[AccountTaxCertificate](accounttaxcertificate.md)  
