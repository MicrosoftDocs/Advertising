---
title: AccountTaxCertificate Data Object Test - Customer Management
ms.service: bing-ads
ms.subservice: customer-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the AccountTaxCertificate Data Object.(test)
---
# AccountTaxCertificate Data Object Test - Customer Management
Defines the AccountTaxCertificate Data Object.

# [XML](#tab/xml)

```xml
<xs:complexType name="AccountTaxCertificate" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="TaxCertificateBlobContainerName" nillable="true" type="xs:string" />
    <xs:element xmlns:q3="http://schemas.datacontract.org/2004/07/System.Collections.Generic" minOccurs="0" name="TaxCertificates" nillable="true" type="q3:ArrayOfKeyValuePairOfstringbase64Binary" />
    <xs:element minOccurs="0" name="Status" nillable="true" type="tns:TaxCertificateStatus" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Status": "ValueHere",
  "TaxCertificateBlobContainerName": "ValueHere",
  "TaxCertificates": [
    {
      "key": "ValueHere",
      "value": "ValueHere"
    }
  ]
}
```

-----

## <a name="elements"></a>Elements

The [AccountTaxCertificate](accounttaxcertificate.md) object has the following elements: [Status](#status), [TaxCertificateBlobContainerName](#taxcertificateblobcontainername), [TaxCertificates](#taxcertificates).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="status"></a>Status|Reserved.|[TaxCertificateStatus](taxcertificatestatus.md)|
|<a name="taxcertificateblobcontainername"></a>TaxCertificateBlobContainerName|Reserved.|**string**|
|<a name="taxcertificates"></a>TaxCertificates|Reserved.|[KeyValuePairOfstringbase64Binary](keyvaluepairofstringbase64binary.md) array|

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13/Entities  

## Used By
[AdvertiserAccount](advertiseraccount.md)  
