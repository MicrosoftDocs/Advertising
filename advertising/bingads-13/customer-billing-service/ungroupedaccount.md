---
title: UngroupedAccount Data Object - Customer Billing
ms.service: bing-ads
ms.subservice: customer-billing-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the ungrouped account data object.
---
# UngroupedAccount Data Object - Customer Billing
Defines the ungrouped account data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="UngroupedAccount" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AccountId" type="xs:long" />
    <xs:element minOccurs="0" name="AccountNumber" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="AccountName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="PotentialBillingGroups" nillable="true" type="tns:ArrayOfKeyValueEntityOflongstring" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AccountId": "LongValueHere",
  "AccountName": "ValueHere",
  "AccountNumber": "ValueHere",
  "PotentialBillingGroups": [
    {
      "Key": "LongValueHere",
      "Value": "ValueHere"
    }
  ]
}
```

-----

## <a name="elements"></a>Elements

The [UngroupedAccount](ungroupedaccount.md) object has the following elements: [AccountId](#accountid), [AccountName](#accountname), [AccountNumber](#accountnumber), [PotentialBillingGroups](#potentialbillinggroups).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountid"></a>AccountId|Reserved.|**long**|
|<a name="accountname"></a>AccountName|Reserved.|**string**|
|<a name="accountnumber"></a>AccountNumber|Reserved.|**string**|
|<a name="potentialbillinggroups"></a>PotentialBillingGroups|Reserved.|[KeyValueEntityOflongstring](keyvalueentityoflongstring.md) array|

## Requirements
Service: [CustomerBillingService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/Billing/v13/CustomerBillingService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13/Entities  

## Used By
[GetUngroupedAccounts](getungroupedaccounts.md)  
