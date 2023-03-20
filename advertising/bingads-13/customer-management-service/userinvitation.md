---
title: UserInvitation Data Object - Customer Management
ms.service: bing-ads
ms.subservice: customer-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an invitation for a user to sign up for Microsoft Advertising.
---
# UserInvitation Data Object - Customer Management
Defines an invitation for a user to sign up for Microsoft Advertising. The invitation limits account access and permissions. 

> [!IMPORTANT]
> When the invitation is sent, you can opt to limit user access to a subset of advertiser accounts that are directly under your customer. If an [agency hierarchy](../guides/account-hierarchy-permissions.md#agency-hierarchy) is setup (now or in the future) under the customer where the user is invited, and if you do not limit access to specific accounts, the user will have access to all accounts in the hierarchy. 

It is possible to have multiple pending invitations sent to the same email address, which have not yet expired. It is also possible for those invitations to have specified different user roles, for example if you sent an invitation with an incorrect user role and then sent a second invitation with the correct user role. The recipient can accept any of the invitations, and can sign up with credentials that differ from the invitation email address. Microsoft Advertising users can accept invitations to multiple customers with the same credentials. For more information, see the [Multi-User Credentials](../guides/account-hierarchy-permissions.md#multi-user-credentials) technical guide.

You can search for pending invitations by [invitation ID](senduserinvitation.md#userinvitationid) and find out whether or not the invitation has been accepted or has expired. The [SearchUserInvitations](searchuserinvitations.md) operation returns all pending invitations, whether or not they have expired. Accepted invitations are not included in the [SearchUserInvitations](searchuserinvitations.md) response.  

After the invitation has been accepted, you can call [GetUsersInfo](getusersinfo.md) and [GetUser](getuser.md) to access the Microsoft Advertising user details. However, since a recipient can accept the invitation and sign up with credentials that differ from the invitation email address, you cannot determine with certainty the mapping from a [UserInvitation](userinvitation.md) to a [User](user.md) or [UserInfo](userinfo.md) object. With the user ID returned by [GetUsersInfo](getusersinfo.md) or [GetUser](getuser.md), you can call [DeleteUser](deleteuser.md) to remove the user as needed. The Bing Ads API does not support any operations to delete pending user invitations. After you invite a user, the only way to cancel the invitation is through the Microsoft Advertising web application. You can find both pending and accepted invitations in the **Users** section of **Accounts & Billing**.  

## Syntax
```xml
<xs:complexType name="UserInvitation" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Id" type="xs:long" />
    <xs:element minOccurs="0" name="FirstName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="LastName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Email" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="CustomerId" type="xs:long" />
    <xs:element minOccurs="0" name="RoleId" type="xs:int" />
    <xs:element minOccurs="0" name="AccountIds" nillable="true" type="q5:ArrayOflong" xmlns:q5="http://schemas.microsoft.com/2003/10/Serialization/Arrays" />
    <xs:element minOccurs="0" name="ExpirationDate" type="xs:dateTime" />
    <xs:element minOccurs="0" name="Lcid" type="tns:LCID" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [UserInvitation](userinvitation.md) object has the following elements: [AccountIds](#accountids), [CustomerId](#customerid), [Email](#email), [ExpirationDate](#expirationdate), [FirstName](#firstname), [Id](#id), [LastName](#lastname), [Lcid](#lcid), [RoleId](#roleid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountids"></a>AccountIds|An array of identifiers of the accounts that the user can manage. To specify that the user can manage all current and future accounts of the customer to which the user belongs, set to NULL.<br/><br/>Users with account level roles such as Advertiser Campaign Manager can be restricted to specific accounts. Users with customer level roles such as Super Admin can access all accounts within the user's customer, and their access cannot be restricted to specific accounts.<br/><br/>When attempting to restrict customer level user roles, for example attempting to restrict a Super Admin to specific accounts, the operation will not fail and the user will be granted access for all accounts within the specified customer.<br/><br/>**Send:** Optional<br/>**Signup:** Optional|**long** array|
|<a name="customerid"></a>CustomerId|The identifier of the customer this user is invited to manage. The *AccountIds* element determines which customer accounts the user can manage.<br/><br/>**Send:** Required<br/>**Signup:** Read-only|**long**|
|<a name="email"></a>Email|The email address corresponding to the user's Microsoft account. The address can contain a maximum of 100 characters.<br/><br/>**Send:** Required<br/>**Signup:** Required|**string**|
|<a name="expirationdate"></a>ExpirationDate|The date and time that the user invitation will expire. The value is in Coordinated Universal Time (UTC).<br/><br/>The duration of a user invitation is subject to change, and currently set at 30 days. You cannot set or update this value.<br/><br/>**Send:** Read-only<br/>**Signup:** Read-only|**dateTime**|
|<a name="firstname"></a>FirstName|The first name of the user.<br/><br/>The first name is limited to 40 characters.<br/><br/>**Send:** Required<br/>**Signup:** Required|**string**|
|<a name="id"></a>Id|A system-generated unique identifier for the user invitation.<br/><br/>**Send:** Read-only<br/>**Signup:** Read-only|**long**|
|<a name="lastname"></a>LastName|The last name of the user.<br/><br/>The last name is limited to 40 characters.<br/><br/>**Send:** Required<br/>**Signup:** Required|**string**|
|<a name="lcid"></a>Lcid|The locale to use when sending correspondence to the user by email or postal mail.<br/><br/>The default is EnglishUS.<br/><br/>**Send:** Required<br/>**Signup:** Required|[LCID](lcid.md)|
|<a name="roleid"></a>RoleId|The role that the user has for each customer or list of accounts.<br/><br/>Possible values include the following:<br/>16 - The user has the **Advertiser Campaign Manager** role.<br/>33 - The user has the **Aggregator** role.<br/>41 - The user has the **Super Admin** role.<br/>100 - The user has the **Viewer** role.<br/>203 - The user has the **Standard User** role.<br/><br/>For more information, see the [User Roles](../guides/account-hierarchy-permissions.md#user-roles) technical guide.<br/>**Send:** Required<br/>**Signup:** Required. The role ID must be set to 41 or 203.|**int**|

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13/Entities  

## Used By
[SearchUserInvitations](searchuserinvitations.md)  
[SendUserInvitation](senduserinvitation.md)  
[SignupCustomer](signupcustomer.md)  
