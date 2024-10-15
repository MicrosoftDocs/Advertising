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
      <Customer xmlns:e543="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e543:CustomerFinancialStatus i:nil="false">ValueHere</e543:CustomerFinancialStatus>
        <e543:Id i:nil="false">ValueHere</e543:Id>
        <e543:Industry i:nil="false">ValueHere</e543:Industry>
        <e543:LastModifiedByUserId i:nil="false">ValueHere</e543:LastModifiedByUserId>
        <e543:LastModifiedTime i:nil="false">ValueHere</e543:LastModifiedTime>
        <e543:MarketCountry i:nil="false">ValueHere</e543:MarketCountry>
        <e543:ForwardCompatibilityMap xmlns:e544="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e544:KeyValuePairOfstringstring>
            <e544:key i:nil="false">ValueHere</e544:key>
            <e544:value i:nil="false">ValueHere</e544:value>
          </e544:KeyValuePairOfstringstring>
        </e543:ForwardCompatibilityMap>
        <e543:MarketLanguage i:nil="false">ValueHere</e543:MarketLanguage>
        <e543:Name i:nil="false">ValueHere</e543:Name>
        <e543:ServiceLevel i:nil="false">ValueHere</e543:ServiceLevel>
        <e543:CustomerLifeCycleStatus i:nil="false">ValueHere</e543:CustomerLifeCycleStatus>
        <e543:TimeStamp i:nil="false">ValueHere</e543:TimeStamp>
        <e543:Number i:nil="false">ValueHere</e543:Number>
        <e543:CustomerAddress i:nil="false">
          <e543:City i:nil="false">ValueHere</e543:City>
          <e543:CountryCode i:nil="false">ValueHere</e543:CountryCode>
          <e543:Id i:nil="false">ValueHere</e543:Id>
          <e543:Line1 i:nil="false">ValueHere</e543:Line1>
          <e543:Line2 i:nil="false">ValueHere</e543:Line2>
          <e543:Line3 i:nil="false">ValueHere</e543:Line3>
          <e543:Line4 i:nil="false">ValueHere</e543:Line4>
          <e543:PostalCode i:nil="false">ValueHere</e543:PostalCode>
          <e543:StateOrProvince i:nil="false">ValueHere</e543:StateOrProvince>
          <e543:TimeStamp i:nil="false">ValueHere</e543:TimeStamp>
          <e543:BusinessName i:nil="false">ValueHere</e543:BusinessName>
        </e543:CustomerAddress>
      </Customer>
      <Account xmlns:e545="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e545:BillToCustomerId i:nil="false">ValueHere</e545:BillToCustomerId>
        <e545:CurrencyCode i:nil="false">ValueHere</e545:CurrencyCode>
        <e545:AccountFinancialStatus i:nil="false">ValueHere</e545:AccountFinancialStatus>
        <e545:Id i:nil="false">ValueHere</e545:Id>
        <e545:Language i:nil="false">ValueHere</e545:Language>
        <e545:LastModifiedByUserId i:nil="false">ValueHere</e545:LastModifiedByUserId>
        <e545:LastModifiedTime i:nil="false">ValueHere</e545:LastModifiedTime>
        <e545:Name i:nil="false">ValueHere</e545:Name>
        <e545:Number i:nil="false">ValueHere</e545:Number>
        <e545:ParentCustomerId>ValueHere</e545:ParentCustomerId>
        <e545:PaymentMethodId i:nil="false">ValueHere</e545:PaymentMethodId>
        <e545:PaymentMethodType i:nil="false">ValueHere</e545:PaymentMethodType>
        <e545:PrimaryUserId i:nil="false">ValueHere</e545:PrimaryUserId>
        <e545:AccountLifeCycleStatus i:nil="false">ValueHere</e545:AccountLifeCycleStatus>
        <e545:TimeStamp i:nil="false">ValueHere</e545:TimeStamp>
        <e545:TimeZone i:nil="false">ValueHere</e545:TimeZone>
        <e545:PauseReason i:nil="false">ValueHere</e545:PauseReason>
        <e545:ForwardCompatibilityMap xmlns:e546="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e546:KeyValuePairOfstringstring>
            <e546:key i:nil="false">ValueHere</e546:key>
            <e546:value i:nil="false">ValueHere</e546:value>
          </e546:KeyValuePairOfstringstring>
        </e545:ForwardCompatibilityMap>
        <e545:LinkedAgencies i:nil="false">
          <e545:CustomerInfo>
            <e545:Id i:nil="false">ValueHere</e545:Id>
            <e545:Name i:nil="false">ValueHere</e545:Name>
          </e545:CustomerInfo>
        </e545:LinkedAgencies>
        <e545:SalesHouseCustomerId i:nil="false">ValueHere</e545:SalesHouseCustomerId>
        <e545:TaxInformation xmlns:e547="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e547:KeyValuePairOfstringstring>
            <e547:key i:nil="false">ValueHere</e547:key>
            <e547:value i:nil="false">ValueHere</e547:value>
          </e547:KeyValuePairOfstringstring>
        </e545:TaxInformation>
        <e545:BackUpPaymentInstrumentId i:nil="false">ValueHere</e545:BackUpPaymentInstrumentId>
        <e545:BillingThresholdAmount i:nil="false">ValueHere</e545:BillingThresholdAmount>
        <e545:BusinessAddress i:nil="false">
          <e545:City i:nil="false">ValueHere</e545:City>
          <e545:CountryCode i:nil="false">ValueHere</e545:CountryCode>
          <e545:Id i:nil="false">ValueHere</e545:Id>
          <e545:Line1 i:nil="false">ValueHere</e545:Line1>
          <e545:Line2 i:nil="false">ValueHere</e545:Line2>
          <e545:Line3 i:nil="false">ValueHere</e545:Line3>
          <e545:Line4 i:nil="false">ValueHere</e545:Line4>
          <e545:PostalCode i:nil="false">ValueHere</e545:PostalCode>
          <e545:StateOrProvince i:nil="false">ValueHere</e545:StateOrProvince>
          <e545:TimeStamp i:nil="false">ValueHere</e545:TimeStamp>
          <e545:BusinessName i:nil="false">ValueHere</e545:BusinessName>
        </e545:BusinessAddress>
        <e545:AutoTagType i:nil="false">ValueHere</e545:AutoTagType>
        <e545:SoldToPaymentInstrumentId i:nil="false">ValueHere</e545:SoldToPaymentInstrumentId>
        <e545:TaxCertificate i:nil="false">
          <e545:TaxCertificateBlobContainerName i:nil="false">ValueHere</e545:TaxCertificateBlobContainerName>
          <e545:TaxCertificates xmlns:e548="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
            <e548:KeyValuePairOfstringbase64Binary>
              <e548:key i:nil="false">ValueHere</e548:key>
              <e548:value i:nil="false">ValueHere</e548:value>
            </e548:KeyValuePairOfstringbase64Binary>
          </e545:TaxCertificates>
          <e545:Status i:nil="false">ValueHere</e545:Status>
        </e545:TaxCertificate>
        <e545:AccountMode i:nil="false">ValueHere</e545:AccountMode>
      </Account>
      <ParentCustomerId i:nil="false">ValueHere</ParentCustomerId>
      <UserInvitation xmlns:e549="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e549:Id>ValueHere</e549:Id>
        <e549:FirstName i:nil="false">ValueHere</e549:FirstName>
        <e549:LastName i:nil="false">ValueHere</e549:LastName>
        <e549:Email i:nil="false">ValueHere</e549:Email>
        <e549:CustomerId>ValueHere</e549:CustomerId>
        <e549:RoleId>ValueHere</e549:RoleId>
        <e549:AccountIds i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
          <a1:long>ValueHere</a1:long>
        </e549:AccountIds>
        <e549:ExpirationDate>ValueHere</e549:ExpirationDate>
        <e549:Lcid>ValueHere</e549:Lcid>
      </UserInvitation>
      <UserId i:nil="false">ValueHere</UserId>
      <User xmlns:e550="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e550:ContactInfo i:nil="false">
          <e550:Address i:nil="false">
            <e550:City i:nil="false">ValueHere</e550:City>
            <e550:CountryCode i:nil="false">ValueHere</e550:CountryCode>
            <e550:Id i:nil="false">ValueHere</e550:Id>
            <e550:Line1 i:nil="false">ValueHere</e550:Line1>
            <e550:Line2 i:nil="false">ValueHere</e550:Line2>
            <e550:Line3 i:nil="false">ValueHere</e550:Line3>
            <e550:Line4 i:nil="false">ValueHere</e550:Line4>
            <e550:PostalCode i:nil="false">ValueHere</e550:PostalCode>
            <e550:StateOrProvince i:nil="false">ValueHere</e550:StateOrProvince>
            <e550:TimeStamp i:nil="false">ValueHere</e550:TimeStamp>
            <e550:BusinessName i:nil="false">ValueHere</e550:BusinessName>
          </e550:Address>
          <e550:ContactByPhone i:nil="false">ValueHere</e550:ContactByPhone>
          <e550:ContactByPostalMail i:nil="false">ValueHere</e550:ContactByPostalMail>
          <e550:Email i:nil="false">ValueHere</e550:Email>
          <e550:EmailFormat i:nil="false">ValueHere</e550:EmailFormat>
          <e550:Fax i:nil="false">ValueHere</e550:Fax>
          <e550:HomePhone i:nil="false">ValueHere</e550:HomePhone>
          <e550:Id i:nil="false">ValueHere</e550:Id>
          <e550:Mobile i:nil="false">ValueHere</e550:Mobile>
          <e550:Phone1 i:nil="false">ValueHere</e550:Phone1>
          <e550:Phone2 i:nil="false">ValueHere</e550:Phone2>
        </e550:ContactInfo>
        <e550:CustomerId i:nil="false">ValueHere</e550:CustomerId>
        <e550:Id i:nil="false">ValueHere</e550:Id>
        <e550:JobTitle i:nil="false">ValueHere</e550:JobTitle>
        <e550:LastModifiedByUserId i:nil="false">ValueHere</e550:LastModifiedByUserId>
        <e550:LastModifiedTime i:nil="false">ValueHere</e550:LastModifiedTime>
        <e550:Lcid i:nil="false">ValueHere</e550:Lcid>
        <e550:Name i:nil="false">
          <e550:FirstName i:nil="false">ValueHere</e550:FirstName>
          <e550:LastName i:nil="false">ValueHere</e550:LastName>
          <e550:MiddleInitial i:nil="false">ValueHere</e550:MiddleInitial>
        </e550:Name>
        <e550:Password i:nil="false">ValueHere</e550:Password>
        <e550:SecretAnswer i:nil="false">ValueHere</e550:SecretAnswer>
        <e550:SecretQuestion>ValueHere</e550:SecretQuestion>
        <e550:UserLifeCycleStatus i:nil="false">ValueHere</e550:UserLifeCycleStatus>
        <e550:TimeStamp i:nil="false">ValueHere</e550:TimeStamp>
        <e550:UserName i:nil="false">ValueHere</e550:UserName>
        <e550:ForwardCompatibilityMap xmlns:e551="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e551:KeyValuePairOfstringstring>
            <e551:key i:nil="false">ValueHere</e551:key>
            <e551:value i:nil="false">ValueHere</e551:value>
          </e551:KeyValuePairOfstringstring>
        </e550:ForwardCompatibilityMap>
        <e550:AuthenticationToken i:nil="false">ValueHere</e550:AuthenticationToken>
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
