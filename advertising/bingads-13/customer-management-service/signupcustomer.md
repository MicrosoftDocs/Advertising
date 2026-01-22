---
title: SignupCustomer Service Operation - Customer Management
ms.service: bing-ads
ms.subservice: customer-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
zone_pivot_groups: api-reference
description: Creates a new customer and account.
dev_langs: 
- csharp
- java
- php
- python
---
# SignupCustomer Service Operation - Customer Management
Creates a new customer and account.  

Typically you must be a user with aggregator [credentials](../guides/account-hierarchy-permissions.md#user-roles) to call this operation. In that case, the operation creates a new customer and account that roll up to your aggregator payment method. The [AdvertiserAccount](advertiseraccount.md) object must include the name of the account, the type of currency to use to settle the account, and the payment method identifier must be set to null. The operation generates an invoice account and sets the payment method identifier to the identifier associated with the aggregator's invoice. You are invoiced for all charges incurred by the customers that you manage.

> [!NOTE]
> The *SignupCustomer* service operation is now generally available to Microsoft Advertising customers.

> [!NOTE]
> Customers in the closed Unified smart campaigns pilot can sign up a new customer with an account for Unified smart campaigns. Optionally they can link to the new account as an agency. The super admin is provisioned by either setting the [UserId](#userid) or [UserInvitation](#userinvitation) element.

> [!Note]
> Customers in the seamlessly set up client account and PI pilot can sign up a new customer with an account and create an admin user simultaneously. The admin user is provisioned by setting the [User](#user) element. And the customer must complete sign up steps via the Microsoft Advertising UI on the Microsoft Advertising activating customer page.

::: zone pivot="soap"

## <a name="request"></a>Request Elements
The *SignupCustomerRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request. The elements must be in the same order as shown in the [Request SOAP](#request-soap). 

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="account"></a>Account|An [AdvertiserAccount](advertiseraccount.md) that specifies the details of the customer's primary account.<br/><br/>Customers in the closed Unified smart campaigns pilot must set the [AccountMode](advertiseraccount.md#accountmode) element to "UnifiedSmart".|[AdvertiserAccount](advertiseraccount.md)|
|<a name="customer"></a>Customer|A [Customer](customer.md) that specifies the details of the customer that you are adding.|[Customer](customer.md)|
|<a name="parentcustomerid"></a>ParentCustomerId|The customer identifier of the aggregator or agency that will manage the new child customer.<br/><br/>This element is required for aggregators but ignored for agencies when the [UserInvitation](#userinvitation) request element is set. Customers in the closed Unified smart campaigns pilot can link the new customer to the parent agency ID or leave this element empty.|**long**|
|<a name="user"></a>User|The user to create. You can fulfill this element if you want to sign up a new customer and create a new admin user simultaneously.<br/><br/>After the new customer is signed up, the newly created admin user must complete sign up steps via the Microsoft Advertising UI on the Microsoft Advertising activating customer page. The URL is https://ads.microsoft.com/ActivateCustomer?cid={new_customer_Id}&aid={new_account_Id} where *new_customer_Id* and *new_account_Id* are the IDs you get in the *SignupCustomerResponse*.<br/><br/>The AuthenticationToken in the User element is the OAuth access token that represents the credentials of the new admin user who will be created during signup.<br/><br/> Customers in the seamlessly set up client account and PI pilot must set one or more of the [UserId](#userid) or [UserInvitation](#userinvitation) or [User](#user).<br/><br/>The required fields in the [User](user.md) object are [ContactInfo.Email](contactinfo.md#email), [Name.FirstName](personname.md#firstname), [Name.LastName](personname.md#lastname) and [AuthenticationToken](user.md#authenticationtoken).|[User](user.md)|
|<a name="userid"></a>UserId|The identifier of an existing user who will be added as Super Admin in the new customer.<br/><br/>This element is only available for customers in the closed Unified smart campaigns pilot. One or more of the [UserId](#userid) or [UserInvitation](#userinvitation) element must be set.|**long**|
|<a name="userinvitation"></a>UserInvitation|The user invitation to send if you want to sign up a new customer on behalf of a client and optionally link to the new account as an agency.<br/><br/>A client Super Admin user must complete sign up steps via the Microsoft Advertising UI such as accept the terms and conditions.<br/><br/>This element is optional for agency customers in the Create Accounts on Behalf of Client pilot.<br/><br/>Customers in the closed Unified smart campaigns pilot must set one or more of the [UserId](#userid) or [UserInvitation](#userinvitation) element.|[UserInvitation](userinvitation.md)|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header.md)]

## <a name="response"></a>Response Elements
The *SignupCustomerResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response SOAP](#response-soap).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountid"></a>AccountId|A system-generated account identifier corresponding to the new account specified in the request.<br/><br/>Use this identifier with operation requests that require an *AccountId* body element and a *CustomerAccountId* SOAP header element.|**long**|
|<a name="accountnumber"></a>AccountNumber|The system-generated account number that is used to identify the account in the Microsoft Advertising web application.<br/><br/>The account number has the form *xxxxxxxx*, where *xxxxxxxx* is a series of any eight alphanumeric characters.|**string**|
|<a name="createtime"></a>CreateTime|The date and time that the account was added. The date and time value reflects the date and time at the server, not the client. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).|**dateTime**|
|<a name="customerid"></a>CustomerId|A system-generated customer identifier corresponding to the new customer specified in the request.<br/><br/>Use this identifier with operation requests that require a *CustomerId* SOAP header element.|**long**|
|<a name="customernumber"></a>CustomerNumber|A system-generated customer number that is used in the Microsoft Advertising web application.<br/><br/>The customer number has the form *xxxxxxxxxx*, where *xxxxxxxxxx* is a series of any ten alphanumeric characters.|**string**|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-soap"></a>Request SOAP
This template was generated by a tool to show the [order](../guides/services-protocol.md#element-order) of the [body](#request-body) and [header](#request-header) elements for the SOAP request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```xml
<s:Envelope xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
  <s:Header xmlns="https://bingads.microsoft.com/Customer/v13">
    <Action mustUnderstand="1">SignupCustomer</Action>
    <AuthenticationToken i:nil="false">ValueHere</AuthenticationToken>
    <DeveloperToken i:nil="false">ValueHere</DeveloperToken>
  </s:Header>
  <s:Body>
    <SignupCustomerRequest xmlns="https://bingads.microsoft.com/Customer/v13">
      <Customer xmlns:e595="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e595:CustomerFinancialStatus i:nil="false">ValueHere</e595:CustomerFinancialStatus>
        <e595:Id i:nil="false">ValueHere</e595:Id>
        <e595:Industry i:nil="false">ValueHere</e595:Industry>
        <e595:LastModifiedByUserId i:nil="false">ValueHere</e595:LastModifiedByUserId>
        <e595:LastModifiedTime i:nil="false">ValueHere</e595:LastModifiedTime>
        <e595:MarketCountry i:nil="false">ValueHere</e595:MarketCountry>
        <e595:ForwardCompatibilityMap xmlns:e596="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e596:KeyValuePairOfstringstring>
            <e596:key i:nil="false">ValueHere</e596:key>
            <e596:value i:nil="false">ValueHere</e596:value>
          </e596:KeyValuePairOfstringstring>
        </e595:ForwardCompatibilityMap>
        <e595:MarketLanguage i:nil="false">ValueHere</e595:MarketLanguage>
        <e595:Name i:nil="false">ValueHere</e595:Name>
        <e595:ServiceLevel i:nil="false">ValueHere</e595:ServiceLevel>
        <e595:CustomerLifeCycleStatus i:nil="false">ValueHere</e595:CustomerLifeCycleStatus>
        <e595:TimeStamp i:nil="false">ValueHere</e595:TimeStamp>
        <e595:Number i:nil="false">ValueHere</e595:Number>
        <e595:CustomerAddress i:nil="false">
          <e595:City i:nil="false">ValueHere</e595:City>
          <e595:CountryCode i:nil="false">ValueHere</e595:CountryCode>
          <e595:Id i:nil="false">ValueHere</e595:Id>
          <e595:Line1 i:nil="false">ValueHere</e595:Line1>
          <e595:Line2 i:nil="false">ValueHere</e595:Line2>
          <e595:Line3 i:nil="false">ValueHere</e595:Line3>
          <e595:Line4 i:nil="false">ValueHere</e595:Line4>
          <e595:PostalCode i:nil="false">ValueHere</e595:PostalCode>
          <e595:StateOrProvince i:nil="false">ValueHere</e595:StateOrProvince>
          <e595:TimeStamp i:nil="false">ValueHere</e595:TimeStamp>
          <e595:BusinessName i:nil="false">ValueHere</e595:BusinessName>
        </e595:CustomerAddress>
      </Customer>
      <Account xmlns:e597="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e597:BillToCustomerId i:nil="false">ValueHere</e597:BillToCustomerId>
        <e597:CurrencyCode i:nil="false">ValueHere</e597:CurrencyCode>
        <e597:AccountFinancialStatus i:nil="false">ValueHere</e597:AccountFinancialStatus>
        <e597:Id i:nil="false">ValueHere</e597:Id>
        <e597:Language i:nil="false">ValueHere</e597:Language>
        <e597:LastModifiedByUserId i:nil="false">ValueHere</e597:LastModifiedByUserId>
        <e597:LastModifiedTime i:nil="false">ValueHere</e597:LastModifiedTime>
        <e597:Name i:nil="false">ValueHere</e597:Name>
        <e597:Number i:nil="false">ValueHere</e597:Number>
        <e597:ParentCustomerId>ValueHere</e597:ParentCustomerId>
        <e597:PaymentMethodId i:nil="false">ValueHere</e597:PaymentMethodId>
        <e597:PaymentMethodType i:nil="false">ValueHere</e597:PaymentMethodType>
        <e597:PrimaryUserId i:nil="false">ValueHere</e597:PrimaryUserId>
        <e597:AccountLifeCycleStatus i:nil="false">ValueHere</e597:AccountLifeCycleStatus>
        <e597:TimeStamp i:nil="false">ValueHere</e597:TimeStamp>
        <e597:TimeZone i:nil="false">ValueHere</e597:TimeZone>
        <e597:PauseReason i:nil="false">ValueHere</e597:PauseReason>
        <e597:ForwardCompatibilityMap xmlns:e598="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e598:KeyValuePairOfstringstring>
            <e598:key i:nil="false">ValueHere</e598:key>
            <e598:value i:nil="false">ValueHere</e598:value>
          </e598:KeyValuePairOfstringstring>
        </e597:ForwardCompatibilityMap>
        <e597:LinkedAgencies i:nil="false">
          <e597:CustomerInfo>
            <e597:Id i:nil="false">ValueHere</e597:Id>
            <e597:Name i:nil="false">ValueHere</e597:Name>
          </e597:CustomerInfo>
        </e597:LinkedAgencies>
        <e597:SalesHouseCustomerId i:nil="false">ValueHere</e597:SalesHouseCustomerId>
        <e597:TaxInformation xmlns:e599="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e599:KeyValuePairOfstringstring>
            <e599:key i:nil="false">ValueHere</e599:key>
            <e599:value i:nil="false">ValueHere</e599:value>
          </e599:KeyValuePairOfstringstring>
        </e597:TaxInformation>
        <e597:BackUpPaymentInstrumentId i:nil="false">ValueHere</e597:BackUpPaymentInstrumentId>
        <e597:BillingThresholdAmount i:nil="false">ValueHere</e597:BillingThresholdAmount>
        <e597:BusinessAddress i:nil="false">
          <e597:City i:nil="false">ValueHere</e597:City>
          <e597:CountryCode i:nil="false">ValueHere</e597:CountryCode>
          <e597:Id i:nil="false">ValueHere</e597:Id>
          <e597:Line1 i:nil="false">ValueHere</e597:Line1>
          <e597:Line2 i:nil="false">ValueHere</e597:Line2>
          <e597:Line3 i:nil="false">ValueHere</e597:Line3>
          <e597:Line4 i:nil="false">ValueHere</e597:Line4>
          <e597:PostalCode i:nil="false">ValueHere</e597:PostalCode>
          <e597:StateOrProvince i:nil="false">ValueHere</e597:StateOrProvince>
          <e597:TimeStamp i:nil="false">ValueHere</e597:TimeStamp>
          <e597:BusinessName i:nil="false">ValueHere</e597:BusinessName>
        </e597:BusinessAddress>
        <e597:AutoTagType i:nil="false">ValueHere</e597:AutoTagType>
        <e597:SoldToPaymentInstrumentId i:nil="false">ValueHere</e597:SoldToPaymentInstrumentId>
        <e597:TaxCertificate i:nil="false">
          <e597:TaxCertificateBlobContainerName i:nil="false">ValueHere</e597:TaxCertificateBlobContainerName>
          <e597:TaxCertificates xmlns:e600="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
            <e600:KeyValuePairOfstringbase64Binary>
              <e600:key i:nil="false">ValueHere</e600:key>
              <e600:value i:nil="false">ValueHere</e600:value>
            </e600:KeyValuePairOfstringbase64Binary>
          </e597:TaxCertificates>
          <e597:Status i:nil="false">ValueHere</e597:Status>
        </e597:TaxCertificate>
        <e597:AccountMode i:nil="false">ValueHere</e597:AccountMode>
      </Account>
      <ParentCustomerId i:nil="false">ValueHere</ParentCustomerId>
      <UserInvitation xmlns:e601="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e601:Id>ValueHere</e601:Id>
        <e601:FirstName i:nil="false">ValueHere</e601:FirstName>
        <e601:LastName i:nil="false">ValueHere</e601:LastName>
        <e601:Email i:nil="false">ValueHere</e601:Email>
        <e601:CustomerId>ValueHere</e601:CustomerId>
        <e601:RoleId>ValueHere</e601:RoleId>
        <e601:AccountIds i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
          <a1:long>ValueHere</a1:long>
        </e601:AccountIds>
        <e601:ExpirationDate>ValueHere</e601:ExpirationDate>
        <e601:Lcid>ValueHere</e601:Lcid>
      </UserInvitation>
      <UserId i:nil="false">ValueHere</UserId>
      <User xmlns:e602="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e602:ContactInfo i:nil="false">
          <e602:Address i:nil="false">
            <e602:City i:nil="false">ValueHere</e602:City>
            <e602:CountryCode i:nil="false">ValueHere</e602:CountryCode>
            <e602:Id i:nil="false">ValueHere</e602:Id>
            <e602:Line1 i:nil="false">ValueHere</e602:Line1>
            <e602:Line2 i:nil="false">ValueHere</e602:Line2>
            <e602:Line3 i:nil="false">ValueHere</e602:Line3>
            <e602:Line4 i:nil="false">ValueHere</e602:Line4>
            <e602:PostalCode i:nil="false">ValueHere</e602:PostalCode>
            <e602:StateOrProvince i:nil="false">ValueHere</e602:StateOrProvince>
            <e602:TimeStamp i:nil="false">ValueHere</e602:TimeStamp>
            <e602:BusinessName i:nil="false">ValueHere</e602:BusinessName>
          </e602:Address>
          <e602:ContactByPhone i:nil="false">ValueHere</e602:ContactByPhone>
          <e602:ContactByPostalMail i:nil="false">ValueHere</e602:ContactByPostalMail>
          <e602:Email i:nil="false">ValueHere</e602:Email>
          <e602:EmailFormat i:nil="false">ValueHere</e602:EmailFormat>
          <e602:Fax i:nil="false">ValueHere</e602:Fax>
          <e602:HomePhone i:nil="false">ValueHere</e602:HomePhone>
          <e602:Id i:nil="false">ValueHere</e602:Id>
          <e602:Mobile i:nil="false">ValueHere</e602:Mobile>
          <e602:Phone1 i:nil="false">ValueHere</e602:Phone1>
          <e602:Phone2 i:nil="false">ValueHere</e602:Phone2>
        </e602:ContactInfo>
        <e602:CustomerId i:nil="false">ValueHere</e602:CustomerId>
        <e602:Id i:nil="false">ValueHere</e602:Id>
        <e602:JobTitle i:nil="false">ValueHere</e602:JobTitle>
        <e602:LastModifiedByUserId i:nil="false">ValueHere</e602:LastModifiedByUserId>
        <e602:LastModifiedTime i:nil="false">ValueHere</e602:LastModifiedTime>
        <e602:Lcid i:nil="false">ValueHere</e602:Lcid>
        <e602:Name i:nil="false">
          <e602:FirstName i:nil="false">ValueHere</e602:FirstName>
          <e602:LastName i:nil="false">ValueHere</e602:LastName>
          <e602:MiddleInitial i:nil="false">ValueHere</e602:MiddleInitial>
        </e602:Name>
        <e602:Password i:nil="false">ValueHere</e602:Password>
        <e602:SecretAnswer i:nil="false">ValueHere</e602:SecretAnswer>
        <e602:SecretQuestion>ValueHere</e602:SecretQuestion>
        <e602:UserLifeCycleStatus i:nil="false">ValueHere</e602:UserLifeCycleStatus>
        <e602:TimeStamp i:nil="false">ValueHere</e602:TimeStamp>
        <e602:UserName i:nil="false">ValueHere</e602:UserName>
        <e602:ForwardCompatibilityMap xmlns:e603="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e603:KeyValuePairOfstringstring>
            <e603:key i:nil="false">ValueHere</e603:key>
            <e603:value i:nil="false">ValueHere</e603:value>
          </e603:KeyValuePairOfstringstring>
        </e602:ForwardCompatibilityMap>
        <e602:AuthenticationToken i:nil="false">ValueHere</e602:AuthenticationToken>
      </User>
    </SignupCustomerRequest>
  </s:Body>
</s:Envelope>
```

## <a name="response-soap"></a>Response SOAP
This template was generated by a tool to show the order of the [body](#response-body) and [header](#response-header) elements for the SOAP response.

```xml
<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
  <s:Header xmlns="https://bingads.microsoft.com/Customer/v13">
    <TrackingId d3p1:nil="false" xmlns:d3p1="http://www.w3.org/2001/XMLSchema-instance">ValueHere</TrackingId>
  </s:Header>
  <s:Body>
    <SignupCustomerResponse xmlns="https://bingads.microsoft.com/Customer/v13">
      <CustomerId>ValueHere</CustomerId>
      <CustomerNumber d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">ValueHere</CustomerNumber>
      <AccountId d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">ValueHere</AccountId>
      <AccountNumber d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">ValueHere</AccountNumber>
      <CreateTime>ValueHere</CreateTime>
    </SignupCustomerResponse>
  </s:Body>
</s:Envelope>
```

## <a name="example"></a>Code Syntax
The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md). See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<SignupCustomerResponse> SignupCustomerAsync(
	Customer customer,
	AdvertiserAccount account,
	long? parentCustomerId,
	UserInvitation userInvitation,
	long? userId,
	User user)
{
	var request = new SignupCustomerRequest
	{
		Customer = customer,
		Account = account,
		ParentCustomerId = parentCustomerId,
		UserInvitation = userInvitation,
		UserId = userId,
		User = user
	};

	return (await CustomerManagementService.CallAsync((s, r) => s.SignupCustomerAsync(r), request));
}
```
```java
static SignupCustomerResponse signupCustomer(
	Customer customer,
	AdvertiserAccount account,
	java.lang.Long parentCustomerId,
	UserInvitation userInvitation,
	java.lang.Long userId,
	User user) throws RemoteException, Exception
{
	SignupCustomerRequest request = new SignupCustomerRequest();

	request.setCustomer(customer);
	request.setAccount(account);
	request.setParentCustomerId(parentCustomerId);
	request.setUserInvitation(userInvitation);
	request.setUserId(userId);
	request.setUser(user);

	return CustomerManagementService.getService().signupCustomer(request);
}
```
```php
static function SignupCustomer(
	$customer,
	$account,
	$parentCustomerId,
	$userInvitation,
	$userId,
	$user)
{

	$GLOBALS['Proxy'] = $GLOBALS['CustomerManagementProxy'];

	$request = new SignupCustomerRequest();

	$request->Customer = $customer;
	$request->Account = $account;
	$request->ParentCustomerId = $parentCustomerId;
	$request->UserInvitation = $userInvitation;
	$request->UserId = $userId;
	$request->User = $user;

	return $GLOBALS['CustomerManagementProxy']->GetService()->SignupCustomer($request);
}
```
```python
response=customermanagement_service.SignupCustomer(
	Customer=Customer,
	Account=Account,
	ParentCustomerId=ParentCustomerId,
	UserInvitation=UserInvitation,
	UserId=UserId,
	User=User)
```

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13  

::: zone-end

::: zone pivot="rest"

## <a name="url"></a>Request Url

# [Production URL](#tab/prod)

```POST
https://clientcenter.api.bingads.microsoft.com/CustomerManagement/v13/Customer/Signup
```

# [Sandbox URL](#tab/sandbox)

```POST
https://clientcenter.api.sandbox.bingads.microsoft.com/CustomerManagement/v13/Customer/Signup
```

-----

## <a name="request"></a>Request Elements
The *SignupCustomerRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request.

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="account"></a>Account|An [AdvertiserAccount](advertiseraccount.md) that specifies the details of the customer's primary account.<br/><br/>Customers in the closed Unified smart campaigns pilot must set the [AccountMode](advertiseraccount.md#accountmode) element to "UnifiedSmart".|[AdvertiserAccount](advertiseraccount.md)|
|<a name="customer"></a>Customer|A [Customer](customer.md) that specifies the details of the customer that you are adding.|[Customer](customer.md)|
|<a name="parentcustomerid"></a>ParentCustomerId|The customer identifier of the aggregator or agency that will manage the new child customer.<br/><br/>This element is required for aggregators but ignored for agencies when the [UserInvitation](#userinvitation) request element is set. Customers in the closed Unified smart campaigns pilot can link the new customer to the parent agency ID or leave this element empty.|**long**|
|<a name="user"></a>User|The user to create. You can fulfill this element if you want to sign up a new customer and create a new admin user simultaneously.<br/><br/>After the new customer is signed up, the newly created admin user must complete sign up steps via the Microsoft Advertising UI on the Microsoft Advertising activating customer page. The URL is https://ads.microsoft.com/ActivateCustomer?cid={new_customer_Id}&aid={new_account_Id} where *new_customer_Id* and *new_account_Id* are the IDs you get in the *SignupCustomerResponse*.<br/><br/>The AuthenticationToken in the User element is the OAuth access token that represents the credentials of the new admin user who will be created during signup.<br/><br/> Customers in the seamlessly set up client account and PI pilot must set one or more of the [UserId](#userid) or [UserInvitation](#userinvitation) or [User](#user).<br/><br/>The required fields in the [User](user.md) object are [ContactInfo.Email](contactinfo.md#email), [Name.FirstName](personname.md#firstname), [Name.LastName](personname.md#lastname) and [AuthenticationToken](user.md#authenticationtoken).|[User](user.md)|
|<a name="userid"></a>UserId|The identifier of an existing user who will be added as Super Admin in the new customer.<br/><br/>This element is only available for customers in the closed Unified smart campaigns pilot. One or more of the [UserId](#userid) or [UserInvitation](#userinvitation) element must be set.|**long**|
|<a name="userinvitation"></a>UserInvitation|The user invitation to send if you want to sign up a new customer on behalf of a client and optionally link to the new account as an agency.<br/><br/>A client Super Admin user must complete sign up steps via the Microsoft Advertising UI such as accept the terms and conditions.<br/><br/>This element is optional for agency customers in the Create Accounts on Behalf of Client pilot.<br/><br/>Customers in the closed Unified smart campaigns pilot must set one or more of the [UserId](#userid) or [UserInvitation](#userinvitation) element.|[UserInvitation](userinvitation.md)|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header-rest.md)]

## <a name="response"></a>Response Elements
The *SignupCustomerResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response JSON](#response-json).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountid"></a>AccountId|A system-generated account identifier corresponding to the new account specified in the request.<br/><br/>Use this identifier with operation requests that require an *AccountId* body element and a *CustomerAccountId* SOAP header element.|**long**|
|<a name="accountnumber"></a>AccountNumber|The system-generated account number that is used to identify the account in the Microsoft Advertising web application.<br/><br/>The account number has the form *xxxxxxxx*, where *xxxxxxxx* is a series of any eight alphanumeric characters.|**string**|
|<a name="createtime"></a>CreateTime|The date and time that the account was added. The date and time value reflects the date and time at the server, not the client. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).|**dateTime**|
|<a name="customerid"></a>CustomerId|A system-generated customer identifier corresponding to the new customer specified in the request.<br/><br/>Use this identifier with operation requests that require a *CustomerId* SOAP header element.|**long**|
|<a name="customernumber"></a>CustomerNumber|A system-generated customer number that is used in the Microsoft Advertising web application.<br/><br/>The customer number has the form *xxxxxxxxxx*, where *xxxxxxxxxx* is a series of any ten alphanumeric characters.|**string**|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-json"></a>Request JSON
This template was generated by a tool to show the [body](#request-body) and [header](#request-header) elements for the JSON request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```json
{
  "Customer": {
    "CustomerAddress": {
      "BusinessName": "ValueHere",
      "City": "ValueHere",
      "CountryCode": "ValueHere",
      "Id": "LongValueHere",
      "Line1": "ValueHere",
      "Line2": "ValueHere",
      "Line3": "ValueHere",
      "Line4": "ValueHere",
      "PostalCode": "ValueHere",
      "StateOrProvince": "ValueHere",
      "TimeStamp": "ValueHere"
    },
    "CustomerFinancialStatus": "ValueHere",
    "CustomerLifeCycleStatus": "ValueHere",
    "ForwardCompatibilityMap": [
      {
        "key": "ValueHere",
        "value": "ValueHere"
      }
    ],
    "Id": "LongValueHere",
    "Industry": "ValueHere",
    "LastModifiedByUserId": "LongValueHere",
    "LastModifiedTime": "ValueHere",
    "MarketCountry": "ValueHere",
    "MarketLanguage": "ValueHere",
    "Name": "ValueHere",
    "Number": "ValueHere",
    "ServiceLevel": "ValueHere",
    "TimeStamp": "ValueHere"
  },
  "Account": {
    "AccountFinancialStatus": "ValueHere",
    "AccountLifeCycleStatus": "ValueHere",
    "AccountMode": "ValueHere",
    "AutoTagType": "ValueHere",
    "BackUpPaymentInstrumentId": "LongValueHere",
    "BillingThresholdAmount": DecimalValueHere,
    "BillToCustomerId": "LongValueHere",
    "BusinessAddress": {
      "BusinessName": "ValueHere",
      "City": "ValueHere",
      "CountryCode": "ValueHere",
      "Id": "LongValueHere",
      "Line1": "ValueHere",
      "Line2": "ValueHere",
      "Line3": "ValueHere",
      "Line4": "ValueHere",
      "PostalCode": "ValueHere",
      "StateOrProvince": "ValueHere",
      "TimeStamp": "ValueHere"
    },
    "CurrencyCode": "ValueHere",
    "ForwardCompatibilityMap": [
      {
        "key": "ValueHere",
        "value": "ValueHere"
      }
    ],
    "Id": "LongValueHere",
    "Language": "ValueHere",
    "LastModifiedByUserId": "LongValueHere",
    "LastModifiedTime": "ValueHere",
    "LinkedAgencies": [
      {
        "Id": "LongValueHere",
        "Name": "ValueHere"
      }
    ],
    "Name": "ValueHere",
    "Number": "ValueHere",
    "ParentCustomerId": "LongValueHere",
    "PauseReason": "ValueHere",
    "PaymentMethodId": "LongValueHere",
    "PaymentMethodType": "ValueHere",
    "PrimaryUserId": "LongValueHere",
    "SalesHouseCustomerId": "LongValueHere",
    "SoldToPaymentInstrumentId": "LongValueHere",
    "TaxCertificate": {
      "Status": "ValueHere",
      "TaxCertificateBlobContainerName": "ValueHere",
      "TaxCertificates": [
        {
          "key": "ValueHere",
          "value": "ValueHere"
        }
      ]
    },
    "TaxInformation": [
      {
        "key": "ValueHere",
        "value": "ValueHere"
      }
    ],
    "TimeStamp": "ValueHere",
    "TimeZone": "ValueHere"
  },
  "ParentCustomerId": "LongValueHere",
  "UserInvitation": {
    "AccountIds": [
      "LongValueHere"
    ],
    "CustomerId": "LongValueHere",
    "Email": "ValueHere",
    "ExpirationDate": "ValueHere",
    "FirstName": "ValueHere",
    "Id": "LongValueHere",
    "LastName": "ValueHere",
    "Lcid": "ValueHere",
    "RoleId": IntValueHere
  },
  "UserId": "LongValueHere",
  "User": {
    "AuthenticationToken": "ValueHere",
    "ContactInfo": {
      "Address": {
        "BusinessName": "ValueHere",
        "City": "ValueHere",
        "CountryCode": "ValueHere",
        "Id": "LongValueHere",
        "Line1": "ValueHere",
        "Line2": "ValueHere",
        "Line3": "ValueHere",
        "Line4": "ValueHere",
        "PostalCode": "ValueHere",
        "StateOrProvince": "ValueHere",
        "TimeStamp": "ValueHere"
      },
      "ContactByPhone": "ValueHere",
      "ContactByPostalMail": "ValueHere",
      "Email": "ValueHere",
      "EmailFormat": "ValueHere",
      "Fax": "ValueHere",
      "HomePhone": "ValueHere",
      "Id": "LongValueHere",
      "Mobile": "ValueHere",
      "Phone1": "ValueHere",
      "Phone2": "ValueHere"
    },
    "CustomerId": "LongValueHere",
    "ForwardCompatibilityMap": [
      {
        "key": "ValueHere",
        "value": "ValueHere"
      }
    ],
    "Id": "LongValueHere",
    "JobTitle": "ValueHere",
    "LastModifiedByUserId": "LongValueHere",
    "LastModifiedTime": "ValueHere",
    "Lcid": "ValueHere",
    "Name": {
      "FirstName": "ValueHere",
      "LastName": "ValueHere",
      "MiddleInitial": "ValueHere"
    },
    "Password": "ValueHere",
    "SecretAnswer": "ValueHere",
    "SecretQuestion": "ValueHere",
    "TimeStamp": "ValueHere",
    "UserLifeCycleStatus": "ValueHere",
    "UserName": "ValueHere"
  }
}
```

## <a name="response-json"></a>Response JSON
This template was generated by a tool to show the [body](#response-body) and [header](#response-header) elements for the JSON response.

```json
{
  "CustomerId": "LongValueHere",
  "CustomerNumber": "ValueHere",
  "AccountId": "LongValueHere",
  "AccountNumber": "ValueHere",
  "CreateTime": "ValueHere"
}
```

## <a name="example"></a>Code Syntax
To call REST API through SDKs, you need to upgrade SDK to a certain version and configure the system parameters.The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md).
See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<SignupCustomerResponse> SignupCustomerAsync(
	Customer customer,
	AdvertiserAccount account,
	long? parentCustomerId,
	UserInvitation userInvitation,
	long? userId,
	User user)
{
	var request = new SignupCustomerRequest
	{
		Customer = customer,
		Account = account,
		ParentCustomerId = parentCustomerId,
		UserInvitation = userInvitation,
		UserId = userId,
		User = user
	};

	return (await CustomerManagementService.CallAsync((s, r) => s.SignupCustomerAsync(r), request));
}
```
```java
static SignupCustomerResponse signupCustomer(
	Customer customer,
	AdvertiserAccount account,
	java.lang.Long parentCustomerId,
	UserInvitation userInvitation,
	java.lang.Long userId,
	User user) throws RemoteException, Exception
{
	SignupCustomerRequest request = new SignupCustomerRequest();

	request.setCustomer(customer);
	request.setAccount(account);
	request.setParentCustomerId(parentCustomerId);
	request.setUserInvitation(userInvitation);
	request.setUserId(userId);
	request.setUser(user);

	return CustomerManagementService.getService().signupCustomer(request);
}
```
```php
static function SignupCustomer(
	$customer,
	$account,
	$parentCustomerId,
	$userInvitation,
	$userId,
	$user)
{

	$GLOBALS['Proxy'] = $GLOBALS['CustomerManagementProxy'];

	$request = new SignupCustomerRequest();

	$request->Customer = $customer;
	$request->Account = $account;
	$request->ParentCustomerId = $parentCustomerId;
	$request->UserInvitation = $userInvitation;
	$request->UserId = $userId;
	$request->User = $user;

	return $GLOBALS['CustomerManagementProxy']->GetService()->SignupCustomer($request);
}
```
```python
response=customermanagement_service.SignupCustomer(
	Customer=Customer,
	Account=Account,
	ParentCustomerId=ParentCustomerId,
	UserInvitation=UserInvitation,
	UserId=UserId,
	User=User)
```

::: zone-end
