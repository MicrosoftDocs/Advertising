---
title: CustomerRole Data Object - Customer Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines account access rights for a person who acts on behalf of a specific customer.
ms.subservice: customer-management-api
---
# CustomerRole Data Object - Customer Management
Defines account access rights for a person who acts on behalf of a specific customer.  

A person can use the same login credentials to access accounts across multiple customers, and multiple [CustomerRole](customerrole.md) objects can be returned for one person via the [GetUser](getuser.md) operation. For example, two [CustomerRole](customerrole.md) objects are returned if user@contoso.com was invited to [Customer](customer.md#id) 123 and the user also has access to manage linked accounts under [Customer](customer.md#id) 234. 

Taken individually, a user has the same role on the [CustomerId](customerrole.md#customerid), [AccountIds](customerrole.md#accountids), and [LinkedAccountIds](customerrole.md#linkedaccountids) for a given [CustomerRole](customerrole.md); however, if a user has multiple customer roles then taken as a whole the effective permissions depend on the full set of [CustomerRoles](getuser.md#customerroles) returned by [GetUser](getuser.md). Several examples are provided below. 

> [!TIP]
> Please see the [Account Hierchy and User Permissions](../guides/account-hierarchy-permissions.md) guide for an overview of customer roles with examples. 

## Syntax
```xml
<xs:complexType name="CustomerRole" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="RoleId" type="xs:int" />
    <xs:element minOccurs="0" name="CustomerId" type="xs:long" />
    <xs:element minOccurs="0" name="AccountIds" nillable="true" type="q7:ArrayOflong" xmlns:q7="http://schemas.microsoft.com/2003/10/Serialization/Arrays" />
    <xs:element minOccurs="0" name="LinkedAccountIds" nillable="true" type="q8:ArrayOflong" xmlns:q8="http://schemas.microsoft.com/2003/10/Serialization/Arrays" />
    <xs:element minOccurs="0" name="CustomerLinkPermission" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [CustomerRole](customerrole.md) object has the following elements: [AccountIds](#accountids), [CustomerId](#customerid), [CustomerLinkPermission](#customerlinkpermission), [LinkedAccountIds](#linkedaccountids), [RoleId](#roleid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountids"></a>AccountIds|The list of accounts that the user can access in the customer.<br/><br/>If this element is nil, the user has access to all of the accounts (current and future) in the customer.|**long** array|
|<a name="customerid"></a>CustomerId|The identifier of the customer where the user has either signed up or has some [account hierarchy](../guides/account-hierarchy-permissions.md#account-hierarchy) relationship.|**long**|
|<a name="customerlinkpermission"></a>CustomerLinkPermission|Determines whether the user's access to the accounts is restricted by customer hierarchy i.e., customer level client linking.<br/><br/>The possible values include Administrative, Standard, and LinkedEntityOnly. It is also possible this field can be nil or empty.<br/><br/>If this field is nil or empty, the user is signed up directly on the [CustomerId](#customerid).<br/><br/>If this field is set to "Administrative", the user has access to the [CustomerId](#customerid) through an Administrative customer [link](clientlink.md).<br/><br/>If this field is set to "Standard", the user has access to the [CustomerId](#customerid) through a Standard customer [link](clientlink.md).<br/><br/>If this field is set to "LinkedEntityOnly", the user is signed up directly on the [CustomerId](#customerid) but cannot access its advertiser accounts. The [CustomerId](#customerid) is part of a customer [link](clientlink.md) hierarchy whereby the user can access other customers below it.<br/><br/>For more information, see the [User Roles](../guides/account-hierarchy-permissions.md#user-roles) technical guide.|**string**|
|<a name="linkedaccountids"></a>LinkedAccountIds|The list of linked accounts that the user can access through the [CustomerId](#customerid) as an agency on behalf of another customer.<br/><br/>If this element is nil, the user does not have access to individually linked advertiser accounts through the [CustomerId](#customerid). The user might have access to advertiser accounts in other linked customers, so be sure to take into account all [CustomerRoles](getuser.md#customerroles) returned by [GetUser](getuser.md).<br/><br/>Please note that accounts created as an aggregator via [SignupCustomer](signupcustomer.md) will also be returned in this element. You can delete aggregatee accounts via [DeleteAccount](deleteaccount.md), but you cannot delink them via [UpdateClientLinks](updateclientlinks.md). Call the [SearchClientLinks](searchclientlinks.md) operation to help determine which accounts can be delinked.|**long** array|
|<a name="roleid"></a>RoleId|The role that the user has when accessing advertiser accounts through the [CustomerId](#customerid).<br/><br/>Possible values include the following:<br/>16 - The user has the **Advertiser Campaign Manager** role.<br/>33 - The user has the **Aggregator** role.<br/>41 - The user has the **Super Admin** role.<br/>100 - The user has the **Viewer** role.<br/>203 - The user has the **Standard User** role.<br/><br/>For more information, see the [User Roles](../guides/account-hierarchy-permissions.md#user-roles) technical guide.|**int**|

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13/Entities  

## Used By
[GetUser](getuser.md)  
