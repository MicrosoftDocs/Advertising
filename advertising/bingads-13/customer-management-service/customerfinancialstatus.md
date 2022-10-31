---
title: CustomerFinancialStatus Value Set - Customer Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the possible financial status values of a customer.
ms.subservice: customer-management-api
---
# CustomerFinancialStatus Value Set - Customer Management
Defines the possible financial status values of a customer.

## Syntax
```xml
<xs:simpleType name="CustomerFinancialStatus" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="ProposalsOnly" />
    <xs:enumeration value="PendingCreditCheck" />
    <xs:enumeration value="ClearFinancialStatus" />
    <xs:enumeration value="SoldToOnly" />
    <xs:enumeration value="CreditHold" />
    <xs:enumeration value="CreditWarning" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [CustomerFinancialStatus](customerfinancialstatus.md) value set has the following values: [ClearFinancialStatus](#clearfinancialstatus), [CreditHold](#credithold), [CreditWarning](#creditwarning), [PendingCreditCheck](#pendingcreditcheck), [ProposalsOnly](#proposalsonly), [SoldToOnly](#soldtoonly).

|Value|Description|
|-----------|---------------|
|<a name="clearfinancialstatus"></a>ClearFinancialStatus|The customer is in good standing.|
|<a name="credithold"></a>CreditHold|One of the customer's accounts is past due.|
|<a name="creditwarning"></a>CreditWarning|Not used.|
|<a name="pendingcreditcheck"></a>PendingCreditCheck|The customer is undergoing a credit check as part of the customer sign-up process. The service will not deliver the customer's ads until the credit check is complete. This status applies only to premium customers.|
|<a name="proposalsonly"></a>ProposalsOnly|Not used.|
|<a name="soldtoonly"></a>SoldToOnly|The customer is considered to be a credit risk. You cannot set the `BillToCustomerId` element of the [AdvertiserAccount](advertiseraccount.md) for a customer that has this status. This status applies only to premium customers.|

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13  

## Used By
[Customer](customer.md)  
