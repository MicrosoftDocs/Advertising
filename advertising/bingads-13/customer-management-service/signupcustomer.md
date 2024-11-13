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
      <Customer xmlns:e551="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e551:CustomerFinancialStatus i:nil="false">ValueHere</e551:CustomerFinancialStatus>
        <e551:Id i:nil="false">ValueHere</e551:Id>
        <e551:Industry i:nil="false">ValueHere</e551:Industry>
        <e551:LastModifiedByUserId i:nil="false">ValueHere</e551:LastModifiedByUserId>
        <e551:LastModifiedTime i:nil="false">ValueHere</e551:LastModifiedTime>
        <e551:MarketCountry i:nil="false">ValueHere</e551:MarketCountry>
        <e551:ForwardCompatibilityMap xmlns:e552="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e552:KeyValuePairOfstringstring>
            <e552:key i:nil="false">ValueHere</e552:key>
            <e552:value i:nil="false">ValueHere</e552:value>
          </e552:KeyValuePairOfstringstring>
        </e551:ForwardCompatibilityMap>
        <e551:MarketLanguage i:nil="false">ValueHere</e551:MarketLanguage>
        <e551:Name i:nil="false">ValueHere</e551:Name>
        <e551:ServiceLevel i:nil="false">ValueHere</e551:ServiceLevel>
        <e551:CustomerLifeCycleStatus i:nil="false">ValueHere</e551:CustomerLifeCycleStatus>
        <e551:TimeStamp i:nil="false">ValueHere</e551:TimeStamp>
        <e551:Number i:nil="false">ValueHere</e551:Number>
        <e551:CustomerAddress i:nil="false">
          <e551:City i:nil="false">ValueHere</e551:City>
          <e551:CountryCode i:nil="false">ValueHere</e551:CountryCode>
          <e551:Id i:nil="false">ValueHere</e551:Id>
          <e551:Line1 i:nil="false">ValueHere</e551:Line1>
          <e551:Line2 i:nil="false">ValueHere</e551:Line2>
          <e551:Line3 i:nil="false">ValueHere</e551:Line3>
          <e551:Line4 i:nil="false">ValueHere</e551:Line4>
          <e551:PostalCode i:nil="false">ValueHere</e551:PostalCode>
          <e551:StateOrProvince i:nil="false">ValueHere</e551:StateOrProvince>
          <e551:TimeStamp i:nil="false">ValueHere</e551:TimeStamp>
          <e551:BusinessName i:nil="false">ValueHere</e551:BusinessName>
        </e551:CustomerAddress>
      </Customer>
      <Account xmlns:e553="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e553:BillToCustomerId i:nil="false">ValueHere</e553:BillToCustomerId>
        <e553:CurrencyCode i:nil="false">ValueHere</e553:CurrencyCode>
        <e553:AccountFinancialStatus i:nil="false">ValueHere</e553:AccountFinancialStatus>
        <e553:Id i:nil="false">ValueHere</e553:Id>
        <e553:Language i:nil="false">ValueHere</e553:Language>
        <e553:LastModifiedByUserId i:nil="false">ValueHere</e553:LastModifiedByUserId>
        <e553:LastModifiedTime i:nil="false">ValueHere</e553:LastModifiedTime>
        <e553:Name i:nil="false">ValueHere</e553:Name>
        <e553:Number i:nil="false">ValueHere</e553:Number>
        <e553:ParentCustomerId>ValueHere</e553:ParentCustomerId>
        <e553:PaymentMethodId i:nil="false">ValueHere</e553:PaymentMethodId>
        <e553:PaymentMethodType i:nil="false">ValueHere</e553:PaymentMethodType>
        <e553:PrimaryUserId i:nil="false">ValueHere</e553:PrimaryUserId>
        <e553:AccountLifeCycleStatus i:nil="false">ValueHere</e553:AccountLifeCycleStatus>
        <e553:TimeStamp i:nil="false">ValueHere</e553:TimeStamp>
        <e553:TimeZone i:nil="false">ValueHere</e553:TimeZone>
        <e553:PauseReason i:nil="false">ValueHere</e553:PauseReason>
        <e553:ForwardCompatibilityMap xmlns:e554="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e554:KeyValuePairOfstringstring>
            <e554:key i:nil="false">ValueHere</e554:key>
            <e554:value i:nil="false">ValueHere</e554:value>
          </e554:KeyValuePairOfstringstring>
        </e553:ForwardCompatibilityMap>
        <e553:LinkedAgencies i:nil="false">
          <e553:CustomerInfo>
            <e553:Id i:nil="false">ValueHere</e553:Id>
            <e553:Name i:nil="false">ValueHere</e553:Name>
          </e553:CustomerInfo>
        </e553:LinkedAgencies>
        <e553:SalesHouseCustomerId i:nil="false">ValueHere</e553:SalesHouseCustomerId>
        <e553:TaxInformation xmlns:e555="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e555:KeyValuePairOfstringstring>
            <e555:key i:nil="false">ValueHere</e555:key>
            <e555:value i:nil="false">ValueHere</e555:value>
          </e555:KeyValuePairOfstringstring>
        </e553:TaxInformation>
        <e553:BackUpPaymentInstrumentId i:nil="false">ValueHere</e553:BackUpPaymentInstrumentId>
        <e553:BillingThresholdAmount i:nil="false">ValueHere</e553:BillingThresholdAmount>
        <e553:BusinessAddress i:nil="false">
          <e553:City i:nil="false">ValueHere</e553:City>
          <e553:CountryCode i:nil="false">ValueHere</e553:CountryCode>
          <e553:Id i:nil="false">ValueHere</e553:Id>
          <e553:Line1 i:nil="false">ValueHere</e553:Line1>
          <e553:Line2 i:nil="false">ValueHere</e553:Line2>
          <e553:Line3 i:nil="false">ValueHere</e553:Line3>
          <e553:Line4 i:nil="false">ValueHere</e553:Line4>
          <e553:PostalCode i:nil="false">ValueHere</e553:PostalCode>
          <e553:StateOrProvince i:nil="false">ValueHere</e553:StateOrProvince>
          <e553:TimeStamp i:nil="false">ValueHere</e553:TimeStamp>
          <e553:BusinessName i:nil="false">ValueHere</e553:BusinessName>
        </e553:BusinessAddress>
        <e553:AutoTagType i:nil="false">ValueHere</e553:AutoTagType>
        <e553:SoldToPaymentInstrumentId i:nil="false">ValueHere</e553:SoldToPaymentInstrumentId>
        <e553:TaxCertificate i:nil="false">
          <e553:TaxCertificateBlobContainerName i:nil="false">ValueHere</e553:TaxCertificateBlobContainerName>
          <e553:TaxCertificates xmlns:e556="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
            <e556:KeyValuePairOfstringbase64Binary>
              <e556:key i:nil="false">ValueHere</e556:key>
              <e556:value i:nil="false">ValueHere</e556:value>
            </e556:KeyValuePairOfstringbase64Binary>
          </e553:TaxCertificates>
          <e553:Status i:nil="false">ValueHere</e553:Status>
        </e553:TaxCertificate>
        <e553:AccountMode i:nil="false">ValueHere</e553:AccountMode>
      </Account>
      <ParentCustomerId i:nil="false">ValueHere</ParentCustomerId>
      <UserInvitation xmlns:e557="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e557:Id>ValueHere</e557:Id>
        <e557:FirstName i:nil="false">ValueHere</e557:FirstName>
        <e557:LastName i:nil="false">ValueHere</e557:LastName>
        <e557:Email i:nil="false">ValueHere</e557:Email>
        <e557:CustomerId>ValueHere</e557:CustomerId>
        <e557:RoleId>ValueHere</e557:RoleId>
        <e557:AccountIds i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
          <a1:long>ValueHere</a1:long>
        </e557:AccountIds>
        <e557:ExpirationDate>ValueHere</e557:ExpirationDate>
        <e557:Lcid>ValueHere</e557:Lcid>
      </UserInvitation>
      <UserId i:nil="false">ValueHere</UserId>
      <User xmlns:e558="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e558:ContactInfo i:nil="false">
          <e558:Address i:nil="false">
            <e558:City i:nil="false">ValueHere</e558:City>
            <e558:CountryCode i:nil="false">ValueHere</e558:CountryCode>
            <e558:Id i:nil="false">ValueHere</e558:Id>
            <e558:Line1 i:nil="false">ValueHere</e558:Line1>
            <e558:Line2 i:nil="false">ValueHere</e558:Line2>
            <e558:Line3 i:nil="false">ValueHere</e558:Line3>
            <e558:Line4 i:nil="false">ValueHere</e558:Line4>
            <e558:PostalCode i:nil="false">ValueHere</e558:PostalCode>
            <e558:StateOrProvince i:nil="false">ValueHere</e558:StateOrProvince>
            <e558:TimeStamp i:nil="false">ValueHere</e558:TimeStamp>
            <e558:BusinessName i:nil="false">ValueHere</e558:BusinessName>
          </e558:Address>
          <e558:ContactByPhone i:nil="false">ValueHere</e558:ContactByPhone>
          <e558:ContactByPostalMail i:nil="false">ValueHere</e558:ContactByPostalMail>
          <e558:Email i:nil="false">ValueHere</e558:Email>
          <e558:EmailFormat i:nil="false">ValueHere</e558:EmailFormat>
          <e558:Fax i:nil="false">ValueHere</e558:Fax>
          <e558:HomePhone i:nil="false">ValueHere</e558:HomePhone>
          <e558:Id i:nil="false">ValueHere</e558:Id>
          <e558:Mobile i:nil="false">ValueHere</e558:Mobile>
          <e558:Phone1 i:nil="false">ValueHere</e558:Phone1>
          <e558:Phone2 i:nil="false">ValueHere</e558:Phone2>
        </e558:ContactInfo>
        <e558:CustomerId i:nil="false">ValueHere</e558:CustomerId>
        <e558:Id i:nil="false">ValueHere</e558:Id>
        <e558:JobTitle i:nil="false">ValueHere</e558:JobTitle>
        <e558:LastModifiedByUserId i:nil="false">ValueHere</e558:LastModifiedByUserId>
        <e558:LastModifiedTime i:nil="false">ValueHere</e558:LastModifiedTime>
        <e558:Lcid i:nil="false">ValueHere</e558:Lcid>
        <e558:Name i:nil="false">
          <e558:FirstName i:nil="false">ValueHere</e558:FirstName>
          <e558:LastName i:nil="false">ValueHere</e558:LastName>
          <e558:MiddleInitial i:nil="false">ValueHere</e558:MiddleInitial>
        </e558:Name>
        <e558:Password i:nil="false">ValueHere</e558:Password>
        <e558:SecretAnswer i:nil="false">ValueHere</e558:SecretAnswer>
        <e558:SecretQuestion>ValueHere</e558:SecretQuestion>
        <e558:UserLifeCycleStatus i:nil="false">ValueHere</e558:UserLifeCycleStatus>
        <e558:TimeStamp i:nil="false">ValueHere</e558:TimeStamp>
        <e558:UserName i:nil="false">ValueHere</e558:UserName>
        <e558:ForwardCompatibilityMap xmlns:e559="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e559:KeyValuePairOfstringstring>
            <e559:key i:nil="false">ValueHere</e559:key>
            <e559:value i:nil="false">ValueHere</e559:value>
          </e559:KeyValuePairOfstringstring>
        </e558:ForwardCompatibilityMap>
        <e558:AuthenticationToken i:nil="false">ValueHere</e558:AuthenticationToken>
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
