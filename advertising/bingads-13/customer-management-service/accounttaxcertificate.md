---
title: AccountTaxCertificate Data Object - Customer Management
ms.service: bing-ads
ms.subservice: customer-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the AccountTaxCertificate Data Object.
---
# AccountTaxCertificate Data Object - Customer Management
Defines the AccountTaxCertificate Data Object.

## Syntax
```xml
<xs:complexType name="AccountTaxCertificate" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="TaxCertificateBlobContainerName" nillable="true" type="xs:string" />
    <xs:element xmlns:q3="http://schemas.datacontract.org/2004/07/System.Collections.Generic" minOccurs="0" name="TaxCertificates" nillable="true" type="q3:ArrayOfKeyValuePairOfstringbase64Binary" />
    <xs:element minOccurs="0" name="Status" nillable="true" type="tns:TaxCertificateStatus" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [AccountTaxCertificate](accounttaxcertificate.md) object has the following elements: [Status](#status), [TaxCertificateBlobContainerName](#taxcertificateblobcontainername), [TaxCertificates](#taxcertificates).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="status"></a>Status|The status of the tax certificate: *Valid*, *Invalid*, or *Pending*.|[TaxCertificateStatus](taxcertificatestatus.md)|
|<a name="taxcertificateblobcontainername"></a>TaxCertificateBlobContainerName|The container name of the tax certificate.|**string**|
|<a name="taxcertificates"></a>TaxCertificates|A list of tax certificates.|[KeyValuePairOfstringbase64Binary](keyvaluepairofstringbase64binary.md) array|

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13/Entities  

## Used By
[AdvertiserAccount](advertiseraccount.md)  
