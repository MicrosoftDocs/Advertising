---
title: AccountInfoWithCustomerData Data Object - Customer Management
ms.service: bing-ads
ms.subservice: customer-management-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines an object that contains information that identifies an account and the customer that manages or owns the account.
---
# AccountInfoWithCustomerData Data Object - Customer Management
Defines an object that contains information that identifies an account and the customer that manages or owns the account.

## Syntax
```xml
<xs:complexType name="AccountInfoWithCustomerData" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="CustomerId" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="CustomerName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="AccountId" type="xs:long" />
    <xs:element minOccurs="0" name="AccountName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="AccountNumber" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="AccountLifeCycleStatus" type="tns:AccountLifeCycleStatus" />
    <xs:element minOccurs="0" name="PauseReason" nillable="true" type="xs:unsignedByte" />
    <xs:element minOccurs="0" name="AccountMode" nillable="true" type="xs:string">
      <xs:annotation>
        <xs:appinfo>
          <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
        </xs:appinfo>
      </xs:annotation>
    </xs:element>
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [AccountInfoWithCustomerData](accountinfowithcustomerdata.md) object has the following elements: [AccountId](#accountid), [AccountLifeCycleStatus](#accountlifecyclestatus), [AccountMode](#accountmode), [AccountName](#accountname), [AccountNumber](#accountnumber), [CustomerId](#customerid), [CustomerName](#customername), [PauseReason](#pausereason).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountid"></a>AccountId|The system-generated identifier of the account.|**long**|
|<a name="accountlifecyclestatus"></a>AccountLifeCycleStatus|The status of the account.|[AccountLifeCycleStatus](accountlifecyclestatus.md)|
|<a name="accountmode"></a>AccountMode|The account mode distinguishes between smart and expert accounts.<br/><br/>The possible values include, but are not limited to:<br/><br/>Expert - Expert Mode is the full-feature Microsoft Advertising experience. It gives you more control over campaign management, lets you add more content to your ads, and provides much more in the way of performance reporting and tracking.<br/><br/>Smart - Microsoft Advertising will use Microsoft AI to create ads and manage your advertising campaign for you.<br/><br/>UnifiedSmart - The account supports advertising across Bing, Google, and Facebook. You can also manage your social network presence on Facebook, Instagram, LinkedIn, and Twitter.<br/><br/>Most Bing Ads API operations are only supported with Expert accounts. Accounts with any account mode are returned when you request account information e.g., [FindAccountsOrCustomersInfo](findaccountsorcustomersinfo.md), [GetAccount](getaccount.md), [GetAccountsInfo](getaccountsinfo.md), [GetUser](getuser.md), and [SearchAccounts](searchaccounts.md).<br/><br/>**Add:** Read-only for most accounts. Customers in the closed Unified smart campaigns pilot can set the account mode to "UnifiedSmart".<br/>**Update:** Read-only|**string**|
|<a name="accountname"></a>AccountName|The name of the account.|**string**|
|<a name="accountnumber"></a>AccountNumber|The system-generated account number that is used to identify the account in the Microsoft Advertising web application.<br/><br/>The account number has the form *xxxxxxxx*, where *xxxxxxxx* is a series of any eight alphanumeric characters.|**string**|
|<a name="customerid"></a>CustomerId|The system-generated identifier of the customer that manages or owns the account.<br/><br/>If this account is the result of an account match using the [FindAccountsOrCustomersInfo](findaccountsorcustomersinfo.md), the customer identifier is that of the customer that owns the account. However, if the account is the result of a customer match, the customer identifier is that of the aggregator that manages the account, if the account is managed by an aggregator; otherwise, the identifier is that of the customer that owns the account.|**long**|
|<a name="customername"></a>CustomerName|The name of the customer that manages or owns the account.|**string**|
|<a name="pausereason"></a>PauseReason|A flag value that indicates who paused the account. The following are the possible values:<br/><br/>1 - The user paused the account.<br/><br/>2 - The billing service paused the account.<br/><br/>4 - The user and billing service paused the account.|**unsignedByte**|

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13/Entities  

## Used By
[FindAccountsOrCustomersInfo](findaccountsorcustomersinfo.md)  
