---
title: SignupCustomer Service Operation Test - Customer Management
ms.service: bing-ads
ms.subservice: customer-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
zone_pivot_groups: api-reference
description: Creates a new customer and account.(test)
dev_langs: 
- csharp
- java
- php
- python
---
# SignupCustomer Service Operation Test - Customer Management
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
      <Customer xmlns:e527="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e527:CustomerFinancialStatus i:nil="false">ValueHere</e527:CustomerFinancialStatus>
        <e527:Id i:nil="false">ValueHere</e527:Id>
        <e527:Industry i:nil="false">ValueHere</e527:Industry>
        <e527:LastModifiedByUserId i:nil="false">ValueHere</e527:LastModifiedByUserId>
        <e527:LastModifiedTime i:nil="false">ValueHere</e527:LastModifiedTime>
        <e527:MarketCountry i:nil="false">ValueHere</e527:MarketCountry>
        <e527:ForwardCompatibilityMap xmlns:e528="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e528:KeyValuePairOfstringstring>
            <e528:key i:nil="false">ValueHere</e528:key>
            <e528:value i:nil="false">ValueHere</e528:value>
          </e528:KeyValuePairOfstringstring>
        </e527:ForwardCompatibilityMap>
        <e527:MarketLanguage i:nil="false">ValueHere</e527:MarketLanguage>
        <e527:Name i:nil="false">ValueHere</e527:Name>
        <e527:ServiceLevel i:nil="false">ValueHere</e527:ServiceLevel>
        <e527:CustomerLifeCycleStatus i:nil="false">ValueHere</e527:CustomerLifeCycleStatus>
        <e527:TimeStamp i:nil="false">ValueHere</e527:TimeStamp>
        <e527:Number i:nil="false">ValueHere</e527:Number>
        <e527:CustomerAddress i:nil="false">
          <e527:City i:nil="false">ValueHere</e527:City>
          <e527:CountryCode i:nil="false">ValueHere</e527:CountryCode>
          <e527:Id i:nil="false">ValueHere</e527:Id>
          <e527:Line1 i:nil="false">ValueHere</e527:Line1>
          <e527:Line2 i:nil="false">ValueHere</e527:Line2>
          <e527:Line3 i:nil="false">ValueHere</e527:Line3>
          <e527:Line4 i:nil="false">ValueHere</e527:Line4>
          <e527:PostalCode i:nil="false">ValueHere</e527:PostalCode>
          <e527:StateOrProvince i:nil="false">ValueHere</e527:StateOrProvince>
          <e527:TimeStamp i:nil="false">ValueHere</e527:TimeStamp>
          <e527:BusinessName i:nil="false">ValueHere</e527:BusinessName>
        </e527:CustomerAddress>
      </Customer>
      <Account xmlns:e529="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e529:BillToCustomerId i:nil="false">ValueHere</e529:BillToCustomerId>
        <e529:CurrencyCode i:nil="false">ValueHere</e529:CurrencyCode>
        <e529:AccountFinancialStatus i:nil="false">ValueHere</e529:AccountFinancialStatus>
        <e529:Id i:nil="false">ValueHere</e529:Id>
        <e529:Language i:nil="false">ValueHere</e529:Language>
        <e529:LastModifiedByUserId i:nil="false">ValueHere</e529:LastModifiedByUserId>
        <e529:LastModifiedTime i:nil="false">ValueHere</e529:LastModifiedTime>
        <e529:Name i:nil="false">ValueHere</e529:Name>
        <e529:Number i:nil="false">ValueHere</e529:Number>
        <e529:ParentCustomerId>ValueHere</e529:ParentCustomerId>
        <e529:PaymentMethodId i:nil="false">ValueHere</e529:PaymentMethodId>
        <e529:PaymentMethodType i:nil="false">ValueHere</e529:PaymentMethodType>
        <e529:PrimaryUserId i:nil="false">ValueHere</e529:PrimaryUserId>
        <e529:AccountLifeCycleStatus i:nil="false">ValueHere</e529:AccountLifeCycleStatus>
        <e529:TimeStamp i:nil="false">ValueHere</e529:TimeStamp>
        <e529:TimeZone i:nil="false">ValueHere</e529:TimeZone>
        <e529:PauseReason i:nil="false">ValueHere</e529:PauseReason>
        <e529:ForwardCompatibilityMap xmlns:e530="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e530:KeyValuePairOfstringstring>
            <e530:key i:nil="false">ValueHere</e530:key>
            <e530:value i:nil="false">ValueHere</e530:value>
          </e530:KeyValuePairOfstringstring>
        </e529:ForwardCompatibilityMap>
        <e529:LinkedAgencies i:nil="false">
          <e529:CustomerInfo>
            <e529:Id i:nil="false">ValueHere</e529:Id>
            <e529:Name i:nil="false">ValueHere</e529:Name>
          </e529:CustomerInfo>
        </e529:LinkedAgencies>
        <e529:SalesHouseCustomerId i:nil="false">ValueHere</e529:SalesHouseCustomerId>
        <e529:TaxInformation xmlns:e531="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e531:KeyValuePairOfstringstring>
            <e531:key i:nil="false">ValueHere</e531:key>
            <e531:value i:nil="false">ValueHere</e531:value>
          </e531:KeyValuePairOfstringstring>
        </e529:TaxInformation>
        <e529:BackUpPaymentInstrumentId i:nil="false">ValueHere</e529:BackUpPaymentInstrumentId>
        <e529:BillingThresholdAmount i:nil="false">ValueHere</e529:BillingThresholdAmount>
        <e529:BusinessAddress i:nil="false">
          <e529:City i:nil="false">ValueHere</e529:City>
          <e529:CountryCode i:nil="false">ValueHere</e529:CountryCode>
          <e529:Id i:nil="false">ValueHere</e529:Id>
          <e529:Line1 i:nil="false">ValueHere</e529:Line1>
          <e529:Line2 i:nil="false">ValueHere</e529:Line2>
          <e529:Line3 i:nil="false">ValueHere</e529:Line3>
          <e529:Line4 i:nil="false">ValueHere</e529:Line4>
          <e529:PostalCode i:nil="false">ValueHere</e529:PostalCode>
          <e529:StateOrProvince i:nil="false">ValueHere</e529:StateOrProvince>
          <e529:TimeStamp i:nil="false">ValueHere</e529:TimeStamp>
          <e529:BusinessName i:nil="false">ValueHere</e529:BusinessName>
        </e529:BusinessAddress>
        <e529:AutoTagType i:nil="false">ValueHere</e529:AutoTagType>
        <e529:SoldToPaymentInstrumentId i:nil="false">ValueHere</e529:SoldToPaymentInstrumentId>
        <e529:TaxCertificate i:nil="false">
          <e529:TaxCertificateBlobContainerName i:nil="false">ValueHere</e529:TaxCertificateBlobContainerName>
          <e529:TaxCertificates xmlns:e532="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
            <e532:KeyValuePairOfstringbase64Binary>
              <e532:key i:nil="false">ValueHere</e532:key>
              <e532:value i:nil="false">ValueHere</e532:value>
            </e532:KeyValuePairOfstringbase64Binary>
          </e529:TaxCertificates>
          <e529:Status i:nil="false">ValueHere</e529:Status>
        </e529:TaxCertificate>
        <e529:AccountMode i:nil="false">ValueHere</e529:AccountMode>
      </Account>
      <ParentCustomerId i:nil="false">ValueHere</ParentCustomerId>
      <UserInvitation xmlns:e533="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e533:Id>ValueHere</e533:Id>
        <e533:FirstName i:nil="false">ValueHere</e533:FirstName>
        <e533:LastName i:nil="false">ValueHere</e533:LastName>
        <e533:Email i:nil="false">ValueHere</e533:Email>
        <e533:CustomerId>ValueHere</e533:CustomerId>
        <e533:RoleId>ValueHere</e533:RoleId>
        <e533:AccountIds i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
          <a1:long>ValueHere</a1:long>
        </e533:AccountIds>
        <e533:ExpirationDate>ValueHere</e533:ExpirationDate>
        <e533:Lcid>ValueHere</e533:Lcid>
      </UserInvitation>
      <UserId i:nil="false">ValueHere</UserId>
      <User xmlns:e534="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e534:ContactInfo i:nil="false">
          <e534:Address i:nil="false">
            <e534:City i:nil="false">ValueHere</e534:City>
            <e534:CountryCode i:nil="false">ValueHere</e534:CountryCode>
            <e534:Id i:nil="false">ValueHere</e534:Id>
            <e534:Line1 i:nil="false">ValueHere</e534:Line1>
            <e534:Line2 i:nil="false">ValueHere</e534:Line2>
            <e534:Line3 i:nil="false">ValueHere</e534:Line3>
            <e534:Line4 i:nil="false">ValueHere</e534:Line4>
            <e534:PostalCode i:nil="false">ValueHere</e534:PostalCode>
            <e534:StateOrProvince i:nil="false">ValueHere</e534:StateOrProvince>
            <e534:TimeStamp i:nil="false">ValueHere</e534:TimeStamp>
            <e534:BusinessName i:nil="false">ValueHere</e534:BusinessName>
          </e534:Address>
          <e534:ContactByPhone i:nil="false">ValueHere</e534:ContactByPhone>
          <e534:ContactByPostalMail i:nil="false">ValueHere</e534:ContactByPostalMail>
          <e534:Email i:nil="false">ValueHere</e534:Email>
          <e534:EmailFormat i:nil="false">ValueHere</e534:EmailFormat>
          <e534:Fax i:nil="false">ValueHere</e534:Fax>
          <e534:HomePhone i:nil="false">ValueHere</e534:HomePhone>
          <e534:Id i:nil="false">ValueHere</e534:Id>
          <e534:Mobile i:nil="false">ValueHere</e534:Mobile>
          <e534:Phone1 i:nil="false">ValueHere</e534:Phone1>
          <e534:Phone2 i:nil="false">ValueHere</e534:Phone2>
        </e534:ContactInfo>
        <e534:CustomerId i:nil="false">ValueHere</e534:CustomerId>
        <e534:Id i:nil="false">ValueHere</e534:Id>
        <e534:JobTitle i:nil="false">ValueHere</e534:JobTitle>
        <e534:LastModifiedByUserId i:nil="false">ValueHere</e534:LastModifiedByUserId>
        <e534:LastModifiedTime i:nil="false">ValueHere</e534:LastModifiedTime>
        <e534:Lcid i:nil="false">ValueHere</e534:Lcid>
        <e534:Name i:nil="false">
          <e534:FirstName i:nil="false">ValueHere</e534:FirstName>
          <e534:LastName i:nil="false">ValueHere</e534:LastName>
          <e534:MiddleInitial i:nil="false">ValueHere</e534:MiddleInitial>
        </e534:Name>
        <e534:Password i:nil="false">ValueHere</e534:Password>
        <e534:SecretAnswer i:nil="false">ValueHere</e534:SecretAnswer>
        <e534:SecretQuestion>ValueHere</e534:SecretQuestion>
        <e534:UserLifeCycleStatus i:nil="false">ValueHere</e534:UserLifeCycleStatus>
        <e534:TimeStamp i:nil="false">ValueHere</e534:TimeStamp>
        <e534:UserName i:nil="false">ValueHere</e534:UserName>
        <e534:ForwardCompatibilityMap xmlns:e535="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e535:KeyValuePairOfstringstring>
            <e535:key i:nil="false">ValueHere</e535:key>
            <e535:value i:nil="false">ValueHere</e535:value>
          </e535:KeyValuePairOfstringstring>
        </e534:ForwardCompatibilityMap>
        <e534:AuthenticationToken i:nil="false">ValueHere</e534:AuthenticationToken>
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

```Post
https://clientcenter.api.bingads.microsoft.com/CustomerManagement/v13/Customer/Signup
```

# [Sandbox URL](#tab/sandbox)

```Post
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

::: zone-end
