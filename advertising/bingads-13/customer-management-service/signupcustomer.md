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
      <Customer xmlns:e611="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e611:CustomerFinancialStatus i:nil="false">ValueHere</e611:CustomerFinancialStatus>
        <e611:Id i:nil="false">ValueHere</e611:Id>
        <e611:Industry i:nil="false">ValueHere</e611:Industry>
        <e611:LastModifiedByUserId i:nil="false">ValueHere</e611:LastModifiedByUserId>
        <e611:LastModifiedTime i:nil="false">ValueHere</e611:LastModifiedTime>
        <e611:MarketCountry i:nil="false">ValueHere</e611:MarketCountry>
        <e611:ForwardCompatibilityMap xmlns:e612="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e612:KeyValuePairOfstringstring>
            <e612:key i:nil="false">ValueHere</e612:key>
            <e612:value i:nil="false">ValueHere</e612:value>
          </e612:KeyValuePairOfstringstring>
        </e611:ForwardCompatibilityMap>
        <e611:MarketLanguage i:nil="false">ValueHere</e611:MarketLanguage>
        <e611:Name i:nil="false">ValueHere</e611:Name>
        <e611:ServiceLevel i:nil="false">ValueHere</e611:ServiceLevel>
        <e611:CustomerLifeCycleStatus i:nil="false">ValueHere</e611:CustomerLifeCycleStatus>
        <e611:TimeStamp i:nil="false">ValueHere</e611:TimeStamp>
        <e611:Number i:nil="false">ValueHere</e611:Number>
        <e611:CustomerAddress i:nil="false">
          <e611:City i:nil="false">ValueHere</e611:City>
          <e611:CountryCode i:nil="false">ValueHere</e611:CountryCode>
          <e611:Id i:nil="false">ValueHere</e611:Id>
          <e611:Line1 i:nil="false">ValueHere</e611:Line1>
          <e611:Line2 i:nil="false">ValueHere</e611:Line2>
          <e611:Line3 i:nil="false">ValueHere</e611:Line3>
          <e611:Line4 i:nil="false">ValueHere</e611:Line4>
          <e611:PostalCode i:nil="false">ValueHere</e611:PostalCode>
          <e611:StateOrProvince i:nil="false">ValueHere</e611:StateOrProvince>
          <e611:TimeStamp i:nil="false">ValueHere</e611:TimeStamp>
          <e611:BusinessName i:nil="false">ValueHere</e611:BusinessName>
        </e611:CustomerAddress>
      </Customer>
      <Account xmlns:e613="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e613:BillToCustomerId i:nil="false">ValueHere</e613:BillToCustomerId>
        <e613:CurrencyCode i:nil="false">ValueHere</e613:CurrencyCode>
        <e613:AccountFinancialStatus i:nil="false">ValueHere</e613:AccountFinancialStatus>
        <e613:Id i:nil="false">ValueHere</e613:Id>
        <e613:Language i:nil="false">ValueHere</e613:Language>
        <e613:LastModifiedByUserId i:nil="false">ValueHere</e613:LastModifiedByUserId>
        <e613:LastModifiedTime i:nil="false">ValueHere</e613:LastModifiedTime>
        <e613:Name i:nil="false">ValueHere</e613:Name>
        <e613:Number i:nil="false">ValueHere</e613:Number>
        <e613:ParentCustomerId>ValueHere</e613:ParentCustomerId>
        <e613:PaymentMethodId i:nil="false">ValueHere</e613:PaymentMethodId>
        <e613:PaymentMethodType i:nil="false">ValueHere</e613:PaymentMethodType>
        <e613:PrimaryUserId i:nil="false">ValueHere</e613:PrimaryUserId>
        <e613:AccountLifeCycleStatus i:nil="false">ValueHere</e613:AccountLifeCycleStatus>
        <e613:TimeStamp i:nil="false">ValueHere</e613:TimeStamp>
        <e613:TimeZone i:nil="false">ValueHere</e613:TimeZone>
        <e613:PauseReason i:nil="false">ValueHere</e613:PauseReason>
        <e613:ForwardCompatibilityMap xmlns:e614="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e614:KeyValuePairOfstringstring>
            <e614:key i:nil="false">ValueHere</e614:key>
            <e614:value i:nil="false">ValueHere</e614:value>
          </e614:KeyValuePairOfstringstring>
        </e613:ForwardCompatibilityMap>
        <e613:LinkedAgencies i:nil="false">
          <e613:CustomerInfo>
            <e613:Id i:nil="false">ValueHere</e613:Id>
            <e613:Name i:nil="false">ValueHere</e613:Name>
          </e613:CustomerInfo>
        </e613:LinkedAgencies>
        <e613:SalesHouseCustomerId i:nil="false">ValueHere</e613:SalesHouseCustomerId>
        <e613:TaxInformation xmlns:e615="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e615:KeyValuePairOfstringstring>
            <e615:key i:nil="false">ValueHere</e615:key>
            <e615:value i:nil="false">ValueHere</e615:value>
          </e615:KeyValuePairOfstringstring>
        </e613:TaxInformation>
        <e613:BackUpPaymentInstrumentId i:nil="false">ValueHere</e613:BackUpPaymentInstrumentId>
        <e613:BillingThresholdAmount i:nil="false">ValueHere</e613:BillingThresholdAmount>
        <e613:BusinessAddress i:nil="false">
          <e613:City i:nil="false">ValueHere</e613:City>
          <e613:CountryCode i:nil="false">ValueHere</e613:CountryCode>
          <e613:Id i:nil="false">ValueHere</e613:Id>
          <e613:Line1 i:nil="false">ValueHere</e613:Line1>
          <e613:Line2 i:nil="false">ValueHere</e613:Line2>
          <e613:Line3 i:nil="false">ValueHere</e613:Line3>
          <e613:Line4 i:nil="false">ValueHere</e613:Line4>
          <e613:PostalCode i:nil="false">ValueHere</e613:PostalCode>
          <e613:StateOrProvince i:nil="false">ValueHere</e613:StateOrProvince>
          <e613:TimeStamp i:nil="false">ValueHere</e613:TimeStamp>
          <e613:BusinessName i:nil="false">ValueHere</e613:BusinessName>
        </e613:BusinessAddress>
        <e613:AutoTagType i:nil="false">ValueHere</e613:AutoTagType>
        <e613:SoldToPaymentInstrumentId i:nil="false">ValueHere</e613:SoldToPaymentInstrumentId>
        <e613:TaxCertificate i:nil="false">
          <e613:TaxCertificateBlobContainerName i:nil="false">ValueHere</e613:TaxCertificateBlobContainerName>
          <e613:TaxCertificates xmlns:e616="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
            <e616:KeyValuePairOfstringbase64Binary>
              <e616:key i:nil="false">ValueHere</e616:key>
              <e616:value i:nil="false">ValueHere</e616:value>
            </e616:KeyValuePairOfstringbase64Binary>
          </e613:TaxCertificates>
          <e613:Status i:nil="false">ValueHere</e613:Status>
        </e613:TaxCertificate>
        <e613:AccountMode i:nil="false">ValueHere</e613:AccountMode>
        <e613:ParentCustomerNumber i:nil="false">ValueHere</e613:ParentCustomerNumber>
      </Account>
      <ParentCustomerId i:nil="false">ValueHere</ParentCustomerId>
      <UserInvitation xmlns:e617="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e617:Id>ValueHere</e617:Id>
        <e617:FirstName i:nil="false">ValueHere</e617:FirstName>
        <e617:LastName i:nil="false">ValueHere</e617:LastName>
        <e617:Email i:nil="false">ValueHere</e617:Email>
        <e617:CustomerId>ValueHere</e617:CustomerId>
        <e617:RoleId>ValueHere</e617:RoleId>
        <e617:AccountIds i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
          <a1:long>ValueHere</a1:long>
        </e617:AccountIds>
        <e617:ExpirationDate>ValueHere</e617:ExpirationDate>
        <e617:Lcid>ValueHere</e617:Lcid>
      </UserInvitation>
      <UserId i:nil="false">ValueHere</UserId>
      <User xmlns:e618="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e618:ContactInfo i:nil="false">
          <e618:Address i:nil="false">
            <e618:City i:nil="false">ValueHere</e618:City>
            <e618:CountryCode i:nil="false">ValueHere</e618:CountryCode>
            <e618:Id i:nil="false">ValueHere</e618:Id>
            <e618:Line1 i:nil="false">ValueHere</e618:Line1>
            <e618:Line2 i:nil="false">ValueHere</e618:Line2>
            <e618:Line3 i:nil="false">ValueHere</e618:Line3>
            <e618:Line4 i:nil="false">ValueHere</e618:Line4>
            <e618:PostalCode i:nil="false">ValueHere</e618:PostalCode>
            <e618:StateOrProvince i:nil="false">ValueHere</e618:StateOrProvince>
            <e618:TimeStamp i:nil="false">ValueHere</e618:TimeStamp>
            <e618:BusinessName i:nil="false">ValueHere</e618:BusinessName>
          </e618:Address>
          <e618:ContactByPhone i:nil="false">ValueHere</e618:ContactByPhone>
          <e618:ContactByPostalMail i:nil="false">ValueHere</e618:ContactByPostalMail>
          <e618:Email i:nil="false">ValueHere</e618:Email>
          <e618:EmailFormat i:nil="false">ValueHere</e618:EmailFormat>
          <e618:Fax i:nil="false">ValueHere</e618:Fax>
          <e618:HomePhone i:nil="false">ValueHere</e618:HomePhone>
          <e618:Id i:nil="false">ValueHere</e618:Id>
          <e618:Mobile i:nil="false">ValueHere</e618:Mobile>
          <e618:Phone1 i:nil="false">ValueHere</e618:Phone1>
          <e618:Phone2 i:nil="false">ValueHere</e618:Phone2>
        </e618:ContactInfo>
        <e618:CustomerId i:nil="false">ValueHere</e618:CustomerId>
        <e618:Id i:nil="false">ValueHere</e618:Id>
        <e618:JobTitle i:nil="false">ValueHere</e618:JobTitle>
        <e618:LastModifiedByUserId i:nil="false">ValueHere</e618:LastModifiedByUserId>
        <e618:LastModifiedTime i:nil="false">ValueHere</e618:LastModifiedTime>
        <e618:Lcid i:nil="false">ValueHere</e618:Lcid>
        <e618:Name i:nil="false">
          <e618:FirstName i:nil="false">ValueHere</e618:FirstName>
          <e618:LastName i:nil="false">ValueHere</e618:LastName>
          <e618:MiddleInitial i:nil="false">ValueHere</e618:MiddleInitial>
        </e618:Name>
        <e618:Password i:nil="false">ValueHere</e618:Password>
        <e618:SecretAnswer i:nil="false">ValueHere</e618:SecretAnswer>
        <e618:SecretQuestion>ValueHere</e618:SecretQuestion>
        <e618:UserLifeCycleStatus i:nil="false">ValueHere</e618:UserLifeCycleStatus>
        <e618:TimeStamp i:nil="false">ValueHere</e618:TimeStamp>
        <e618:UserName i:nil="false">ValueHere</e618:UserName>
        <e618:ForwardCompatibilityMap xmlns:e619="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e619:KeyValuePairOfstringstring>
            <e619:key i:nil="false">ValueHere</e619:key>
            <e619:value i:nil="false">ValueHere</e619:value>
          </e619:KeyValuePairOfstringstring>
        </e618:ForwardCompatibilityMap>
        <e618:AuthenticationToken i:nil="false">ValueHere</e618:AuthenticationToken>
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
    "ParentCustomerNumber": "ValueHere",
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
