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
> Agency customers in the Create Accounts on Behalf of Client pilot ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 793) can sign up a new customer on behalf of a client and optionally link to the new account as an agency. In this case a [UserInvitation](userinvitation.md) is sent and the client must complete sign up steps via the Microsoft Advertising UI such as accept the terms and conditions.  

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
      <Customer xmlns:e577="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e577:CustomerFinancialStatus i:nil="false">ValueHere</e577:CustomerFinancialStatus>
        <e577:Id i:nil="false">ValueHere</e577:Id>
        <e577:Industry i:nil="false">ValueHere</e577:Industry>
        <e577:LastModifiedByUserId i:nil="false">ValueHere</e577:LastModifiedByUserId>
        <e577:LastModifiedTime i:nil="false">ValueHere</e577:LastModifiedTime>
        <e577:MarketCountry i:nil="false">ValueHere</e577:MarketCountry>
        <e577:ForwardCompatibilityMap xmlns:e578="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e578:KeyValuePairOfstringstring>
            <e578:key i:nil="false">ValueHere</e578:key>
            <e578:value i:nil="false">ValueHere</e578:value>
          </e578:KeyValuePairOfstringstring>
        </e577:ForwardCompatibilityMap>
        <e577:MarketLanguage i:nil="false">ValueHere</e577:MarketLanguage>
        <e577:Name i:nil="false">ValueHere</e577:Name>
        <e577:ServiceLevel i:nil="false">ValueHere</e577:ServiceLevel>
        <e577:CustomerLifeCycleStatus i:nil="false">ValueHere</e577:CustomerLifeCycleStatus>
        <e577:TimeStamp i:nil="false">ValueHere</e577:TimeStamp>
        <e577:Number i:nil="false">ValueHere</e577:Number>
        <e577:CustomerAddress i:nil="false">
          <e577:City i:nil="false">ValueHere</e577:City>
          <e577:CountryCode i:nil="false">ValueHere</e577:CountryCode>
          <e577:Id i:nil="false">ValueHere</e577:Id>
          <e577:Line1 i:nil="false">ValueHere</e577:Line1>
          <e577:Line2 i:nil="false">ValueHere</e577:Line2>
          <e577:Line3 i:nil="false">ValueHere</e577:Line3>
          <e577:Line4 i:nil="false">ValueHere</e577:Line4>
          <e577:PostalCode i:nil="false">ValueHere</e577:PostalCode>
          <e577:StateOrProvince i:nil="false">ValueHere</e577:StateOrProvince>
          <e577:TimeStamp i:nil="false">ValueHere</e577:TimeStamp>
          <e577:BusinessName i:nil="false">ValueHere</e577:BusinessName>
        </e577:CustomerAddress>
      </Customer>
      <Account xmlns:e579="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e579:BillToCustomerId i:nil="false">ValueHere</e579:BillToCustomerId>
        <e579:CurrencyCode i:nil="false">ValueHere</e579:CurrencyCode>
        <e579:AccountFinancialStatus i:nil="false">ValueHere</e579:AccountFinancialStatus>
        <e579:Id i:nil="false">ValueHere</e579:Id>
        <e579:Language i:nil="false">ValueHere</e579:Language>
        <e579:LastModifiedByUserId i:nil="false">ValueHere</e579:LastModifiedByUserId>
        <e579:LastModifiedTime i:nil="false">ValueHere</e579:LastModifiedTime>
        <e579:Name i:nil="false">ValueHere</e579:Name>
        <e579:Number i:nil="false">ValueHere</e579:Number>
        <e579:ParentCustomerId>ValueHere</e579:ParentCustomerId>
        <e579:PaymentMethodId i:nil="false">ValueHere</e579:PaymentMethodId>
        <e579:PaymentMethodType i:nil="false">ValueHere</e579:PaymentMethodType>
        <e579:PrimaryUserId i:nil="false">ValueHere</e579:PrimaryUserId>
        <e579:AccountLifeCycleStatus i:nil="false">ValueHere</e579:AccountLifeCycleStatus>
        <e579:TimeStamp i:nil="false">ValueHere</e579:TimeStamp>
        <e579:TimeZone i:nil="false">ValueHere</e579:TimeZone>
        <e579:PauseReason i:nil="false">ValueHere</e579:PauseReason>
        <e579:ForwardCompatibilityMap xmlns:e580="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e580:KeyValuePairOfstringstring>
            <e580:key i:nil="false">ValueHere</e580:key>
            <e580:value i:nil="false">ValueHere</e580:value>
          </e580:KeyValuePairOfstringstring>
        </e579:ForwardCompatibilityMap>
        <e579:LinkedAgencies i:nil="false">
          <e579:CustomerInfo>
            <e579:Id i:nil="false">ValueHere</e579:Id>
            <e579:Name i:nil="false">ValueHere</e579:Name>
          </e579:CustomerInfo>
        </e579:LinkedAgencies>
        <e579:SalesHouseCustomerId i:nil="false">ValueHere</e579:SalesHouseCustomerId>
        <e579:TaxInformation xmlns:e581="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e581:KeyValuePairOfstringstring>
            <e581:key i:nil="false">ValueHere</e581:key>
            <e581:value i:nil="false">ValueHere</e581:value>
          </e581:KeyValuePairOfstringstring>
        </e579:TaxInformation>
        <e579:BackUpPaymentInstrumentId i:nil="false">ValueHere</e579:BackUpPaymentInstrumentId>
        <e579:BillingThresholdAmount i:nil="false">ValueHere</e579:BillingThresholdAmount>
        <e579:BusinessAddress i:nil="false">
          <e579:City i:nil="false">ValueHere</e579:City>
          <e579:CountryCode i:nil="false">ValueHere</e579:CountryCode>
          <e579:Id i:nil="false">ValueHere</e579:Id>
          <e579:Line1 i:nil="false">ValueHere</e579:Line1>
          <e579:Line2 i:nil="false">ValueHere</e579:Line2>
          <e579:Line3 i:nil="false">ValueHere</e579:Line3>
          <e579:Line4 i:nil="false">ValueHere</e579:Line4>
          <e579:PostalCode i:nil="false">ValueHere</e579:PostalCode>
          <e579:StateOrProvince i:nil="false">ValueHere</e579:StateOrProvince>
          <e579:TimeStamp i:nil="false">ValueHere</e579:TimeStamp>
          <e579:BusinessName i:nil="false">ValueHere</e579:BusinessName>
        </e579:BusinessAddress>
        <e579:AutoTagType i:nil="false">ValueHere</e579:AutoTagType>
        <e579:SoldToPaymentInstrumentId i:nil="false">ValueHere</e579:SoldToPaymentInstrumentId>
        <e579:TaxCertificate i:nil="false">
          <e579:TaxCertificateBlobContainerName i:nil="false">ValueHere</e579:TaxCertificateBlobContainerName>
          <e579:TaxCertificates xmlns:e582="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
            <e582:KeyValuePairOfstringbase64Binary>
              <e582:key i:nil="false">ValueHere</e582:key>
              <e582:value i:nil="false">ValueHere</e582:value>
            </e582:KeyValuePairOfstringbase64Binary>
          </e579:TaxCertificates>
          <e579:Status i:nil="false">ValueHere</e579:Status>
        </e579:TaxCertificate>
        <e579:AccountMode i:nil="false">ValueHere</e579:AccountMode>
      </Account>
      <ParentCustomerId i:nil="false">ValueHere</ParentCustomerId>
      <UserInvitation xmlns:e583="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e583:Id>ValueHere</e583:Id>
        <e583:FirstName i:nil="false">ValueHere</e583:FirstName>
        <e583:LastName i:nil="false">ValueHere</e583:LastName>
        <e583:Email i:nil="false">ValueHere</e583:Email>
        <e583:CustomerId>ValueHere</e583:CustomerId>
        <e583:RoleId>ValueHere</e583:RoleId>
        <e583:AccountIds i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
          <a1:long>ValueHere</a1:long>
        </e583:AccountIds>
        <e583:ExpirationDate>ValueHere</e583:ExpirationDate>
        <e583:Lcid>ValueHere</e583:Lcid>
      </UserInvitation>
      <UserId i:nil="false">ValueHere</UserId>
      <User xmlns:e584="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e584:ContactInfo i:nil="false">
          <e584:Address i:nil="false">
            <e584:City i:nil="false">ValueHere</e584:City>
            <e584:CountryCode i:nil="false">ValueHere</e584:CountryCode>
            <e584:Id i:nil="false">ValueHere</e584:Id>
            <e584:Line1 i:nil="false">ValueHere</e584:Line1>
            <e584:Line2 i:nil="false">ValueHere</e584:Line2>
            <e584:Line3 i:nil="false">ValueHere</e584:Line3>
            <e584:Line4 i:nil="false">ValueHere</e584:Line4>
            <e584:PostalCode i:nil="false">ValueHere</e584:PostalCode>
            <e584:StateOrProvince i:nil="false">ValueHere</e584:StateOrProvince>
            <e584:TimeStamp i:nil="false">ValueHere</e584:TimeStamp>
            <e584:BusinessName i:nil="false">ValueHere</e584:BusinessName>
          </e584:Address>
          <e584:ContactByPhone i:nil="false">ValueHere</e584:ContactByPhone>
          <e584:ContactByPostalMail i:nil="false">ValueHere</e584:ContactByPostalMail>
          <e584:Email i:nil="false">ValueHere</e584:Email>
          <e584:EmailFormat i:nil="false">ValueHere</e584:EmailFormat>
          <e584:Fax i:nil="false">ValueHere</e584:Fax>
          <e584:HomePhone i:nil="false">ValueHere</e584:HomePhone>
          <e584:Id i:nil="false">ValueHere</e584:Id>
          <e584:Mobile i:nil="false">ValueHere</e584:Mobile>
          <e584:Phone1 i:nil="false">ValueHere</e584:Phone1>
          <e584:Phone2 i:nil="false">ValueHere</e584:Phone2>
        </e584:ContactInfo>
        <e584:CustomerId i:nil="false">ValueHere</e584:CustomerId>
        <e584:Id i:nil="false">ValueHere</e584:Id>
        <e584:JobTitle i:nil="false">ValueHere</e584:JobTitle>
        <e584:LastModifiedByUserId i:nil="false">ValueHere</e584:LastModifiedByUserId>
        <e584:LastModifiedTime i:nil="false">ValueHere</e584:LastModifiedTime>
        <e584:Lcid i:nil="false">ValueHere</e584:Lcid>
        <e584:Name i:nil="false">
          <e584:FirstName i:nil="false">ValueHere</e584:FirstName>
          <e584:LastName i:nil="false">ValueHere</e584:LastName>
          <e584:MiddleInitial i:nil="false">ValueHere</e584:MiddleInitial>
        </e584:Name>
        <e584:Password i:nil="false">ValueHere</e584:Password>
        <e584:SecretAnswer i:nil="false">ValueHere</e584:SecretAnswer>
        <e584:SecretQuestion>ValueHere</e584:SecretQuestion>
        <e584:UserLifeCycleStatus i:nil="false">ValueHere</e584:UserLifeCycleStatus>
        <e584:TimeStamp i:nil="false">ValueHere</e584:TimeStamp>
        <e584:UserName i:nil="false">ValueHere</e584:UserName>
        <e584:ForwardCompatibilityMap xmlns:e585="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e585:KeyValuePairOfstringstring>
            <e585:key i:nil="false">ValueHere</e585:key>
            <e585:value i:nil="false">ValueHere</e585:value>
          </e585:KeyValuePairOfstringstring>
        </e584:ForwardCompatibilityMap>
        <e584:AuthenticationToken i:nil="false">ValueHere</e584:AuthenticationToken>
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
