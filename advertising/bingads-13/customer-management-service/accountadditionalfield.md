---
title: AccountAdditionalField Value Set - Customer Management
ms.service: bing-ads-customer-management-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines a list of optional account properties that you can request when calling GetAccount, FindAccountsOrCustomersInfo, and SearchAccounts.
---
# AccountAdditionalField Value Set - Customer Management
Defines a list of optional account properties that you can request when calling [GetAccount](getaccount.md), [FindAccountsOrCustomersInfo](findaccountsorcustomersinfo.md), and [SearchAccounts](searchaccounts.md). The additional field values enable you to get the latest features using the current version of Customer Management API, and in the next version the corresponding properties will be included in the account by default.  

## Syntax
```xml
<xs:simpleType name="AccountAdditionalField" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="TaxCertificate" />
        <xs:enumeration value="AccountMode" />
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AccountAdditionalField](accountadditionalfield.md) value set has the following values: [AccountMode](#accountmode), [TaxCertificate](#taxcertificate).

|Value|Description|
|-----------|---------------|
|<a name="accountmode"></a>AccountMode|Request that the [AccountMode](advertiseraccount.md#accountmode) element be included within each returned [AdvertiserAccount](advertiseraccount.md) or [AccountInfoWithCustomerData](accountinfowithcustomerdata.md) object.|
|<a name="taxcertificate"></a>TaxCertificate|Request that the [TaxCertificate](advertiseraccount.md#taxcertificate) element be included within each returned [AdvertiserAccount](advertiseraccount.md) object.|

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13  

## Used By
[FindAccountsOrCustomersInfo](findaccountsorcustomersinfo.md)  
[GetAccount](getaccount.md)  
[SearchAccounts](searchaccounts.md)  
