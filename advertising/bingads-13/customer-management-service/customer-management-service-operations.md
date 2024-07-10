---
title: Customer Management Service Operations
ms.service: bing-ads
ms.subservice: customer-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Service operations reference for the CustomerManagement service.
---
# Customer Management Service Operations
The Customer Management service defines the following service operations.

|Service Operation|Description|Request Limits|
|---|---|---|
|[AddAccount](addaccount.md)|Creates a new account within an existing customer.|1 *Account*|
|[AddClientLinks](addclientlinks.md)|Initiates the client link process to manage the accounts of another customer.|10 *ClientLink*|
|[DeleteAccount](deleteaccount.md)|Deletes an account.|1 *AccountId*|
|[DeleteCustomer](deletecustomer.md)|Deletes a customer.|1 *CustomerId*|
|[DeleteUser](deleteuser.md)|Deletes a user.|1 *UserId*|
|[DismissNotifications](dismissnotifications.md)|A service operation to dismiss notifications.|1 *NotificationTypePairs*|
|[FindAccounts](findaccounts.md)|Gets a list of accounts owned by the specified customer that match the specified filter criteria.|1 *CustomerId*|
|[FindAccountsOrCustomersInfo](findaccountsorcustomersinfo.md)|Gets a list of the accounts and customers that match the specified filter criteria.|Not applicable.|
|[GetAccount](getaccount.md)|Gets the details of an account.|1 *AccountId*|
|[GetAccountPilotFeatures](getaccountpilotfeatures.md)|Gets a list of the feature pilot IDs that are enabled for an ad account.|1 *AccountId*|
|[GetAccountsInfo](getaccountsinfo.md)|Gets the identifiers, names, and numbers of accounts that are accessible from the specified customer.|1 *CustomerId*|
|[GetCustomer](getcustomer.md)|Gets the details of a customer.|1 *CustomerId*|
|[GetCustomerPilotFeatures](getcustomerpilotfeatures.md)|Gets a list of the feature pilot IDs that are enabled for all ad accounts owned by a customer (manager account).|1 *CustomerId*|
|[GetCustomersInfo](getcustomersinfo.md)|Gets the identifiers and names of customers that are accessible to the current authenticated user.|Not applicable.|
|[GetLinkedAccountsAndCustomersInfo](getlinkedaccountsandcustomersinfo.md)|Gets the customer and account hierarchy under the specified customer.|1 *CustomerId*|
|[GetNotifications](getnotifications.md)|Gets a list of notification objects.|N/A.|
|[GetUser](getuser.md)|Gets the details of a user.|1 *UserId*|
|[GetUserMFAStatus](getusermfastatus.md)|Used to estimate adoption of multi-factor authentication (MFA) by users of your application.|Not applicable.|
|[GetUsersInfo](getusersinfo.md)|Gets a list of objects that contains user identification information, for example the user name and identifier of the user.|1 *CustomerId*|
|[SearchAccounts](searchaccounts.md)|Searches for accounts that match the request criteria.|1 *Predicates*|
|[SearchClientLinks](searchclientlinks.md)|Searches for the client links for the customer of the current authenticated user, filtered by the search criteria.|1 *Predicates*|
|[SearchCustomers](searchcustomers.md)|Searches for customers that match the request criteria.|10 *Predicates*|
|[SearchUserInvitations](searchuserinvitations.md)|Searches for user invitations that match the request criteria.|1 *Predicates*|
|[SendUserInvitation](senduserinvitation.md)|Sends an email invitation for a user to sign up for Microsoft Advertising.|1 *UserInvitation*|
|[SignupCustomer](signupcustomer.md)|Creates a new customer and account.|1 *Customer*<br/><br/>1 *Account*<br/><br/>1 *UserInvitation*|
|[UpdateAccount](updateaccount.md)|Updates the details of the specified account.|1 *Account*|
|[UpdateClientLinks](updateclientlinks.md)|Updates the status of the specified client links.|10 *ClientLink*|
|[UpdateCustomer](updatecustomer.md)|Updates the details of the specified customer.|1 *Customer*|
|[UpdateUser](updateuser.md)|Updates the personal and business contact information about a Microsoft Advertising user.|1 *User*|
|[UpdateUserRoles](updateuserroles.md)|Updates the roles of the specified user.|1 *NewRoleId*<br/><br/>1 *UserId*|
|[ValidateAddress](validateaddress.md)|Determines whether or not the submitted address is valid for Microsoft Advertising accounts.|1 *Address*|
