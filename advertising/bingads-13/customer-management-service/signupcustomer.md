---
title: SignupCustomer Service Operation - Customer Management
ms.service: bing-ads
ms.subservice: customer-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
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
> Agency customers in the Create Accounts on Behalf of Client pilot ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 793) can sign up a new customer on behalf of a client and optionally link to the new account as an agency. In this case a [UserInvitation](userinvitation.md) is sent and the client must complete sign up steps via the Microsoft Advertising UI e.g., accept the terms and conditions.  

> [!NOTE]
> Customers in the closed Unified smart campaigns pilot can sign up a new customer with an account for Unified smart campaigns. Optionally they can link to the new account as an agency. The super admin is provisioned by either setting the [UserId](#userid) or [UserInvitation](#userinvitation) element.

> [!Note]
> Customers in the seamlessly set up client account and PI pilot can sign up a new customer with an account and create a user simultaneously. The super admin is provisioned by setting the [User](#user) element. And the customer must complete sign up steps via the Microsoft Advertising UI e.g., accept the terms and conditions.  

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
|<a name="userid"></a>UserId|The identifier of an existing user who will be added as Super Admin in the new customer.<br/><br/>This element is only available for customers in the closed Unified smart campaigns pilot. One or more of the [UserId](#userid) or [UserInvitation](#userinvitation) element must be set.|**long**|
|<a name="userinvitation"></a>UserInvitation|The user invitation to send if you want to sign up a new customer on behalf of a client and optionally link to the new account as an agency.<br/><br/>A client Super Admin user must complete sign up steps via the Microsoft Advertising UI e.g., accept the terms and conditions.<br/><br/>This element is optional for agency customers in the Create Accounts on Behalf of Client pilot.<br/><br/>Customers in the closed Unified smart campaigns pilot must set one or more of the [UserId](#userid) or [UserInvitation](#userinvitation) element.|[UserInvitation](userinvitation.md)|
|<a name="user"></a>User|The user to create if you want to sign up a new customer and create user simultaneously.<br/><br/>The newly created Admin user must complete sign up steps via the Microsoft Advertising UI e.g., accept the terms and conditions.<br/><br/>The AuthenticationToken in the User element is the OAuth access token that represents the credentials of the new user who will be created during signup. .<br/><br/> Customers in the seamlessly set up client account and PI pilot must set one or more of the [UserId](#userid) or [UserInvitation](#userinvitation) or [User](#user) .<br/><br/>The required fileds in the User are ContactInfo.Email, Name.FirstName, Name.LastName and AuthenticationToken|[User](User.md)|

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
      <Customer xmlns:e218="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e218:CustomerFinancialStatus i:nil="false">ValueHere</e218:CustomerFinancialStatus>
        <e218:Id i:nil="false">ValueHere</e218:Id>
        <e218:Industry i:nil="false">ValueHere</e218:Industry>
        <e218:LastModifiedByUserId i:nil="false">ValueHere</e218:LastModifiedByUserId>
        <e218:LastModifiedTime i:nil="false">ValueHere</e218:LastModifiedTime>
        <e218:MarketCountry i:nil="false">ValueHere</e218:MarketCountry>
        <e218:ForwardCompatibilityMap xmlns:e219="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e219:KeyValuePairOfstringstring>
            <e219:key i:nil="false">ValueHere</e219:key>
            <e219:value i:nil="false">ValueHere</e219:value>
          </e219:KeyValuePairOfstringstring>
        </e218:ForwardCompatibilityMap>
        <e218:MarketLanguage i:nil="false">ValueHere</e218:MarketLanguage>
        <e218:Name i:nil="false">ValueHere</e218:Name>
        <e218:ServiceLevel i:nil="false">ValueHere</e218:ServiceLevel>
        <e218:CustomerLifeCycleStatus i:nil="false">ValueHere</e218:CustomerLifeCycleStatus>
        <e218:TimeStamp i:nil="false">ValueHere</e218:TimeStamp>
        <e218:Number i:nil="false">ValueHere</e218:Number>
        <e218:CustomerAddress i:nil="false">
          <e218:City i:nil="false">ValueHere</e218:City>
          <e218:CountryCode i:nil="false">ValueHere</e218:CountryCode>
          <e218:Id i:nil="false">ValueHere</e218:Id>
          <e218:Line1 i:nil="false">ValueHere</e218:Line1>
          <e218:Line2 i:nil="false">ValueHere</e218:Line2>
          <e218:Line3 i:nil="false">ValueHere</e218:Line3>
          <e218:Line4 i:nil="false">ValueHere</e218:Line4>
          <e218:PostalCode i:nil="false">ValueHere</e218:PostalCode>
          <e218:StateOrProvince i:nil="false">ValueHere</e218:StateOrProvince>
          <e218:TimeStamp i:nil="false">ValueHere</e218:TimeStamp>
          <e218:BusinessName i:nil="false">ValueHere</e218:BusinessName>
        </e218:CustomerAddress>
      </Customer>
      <Account xmlns:e220="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e220:BillToCustomerId i:nil="false">ValueHere</e220:BillToCustomerId>
        <e220:CurrencyCode i:nil="false">ValueHere</e220:CurrencyCode>
        <e220:AccountFinancialStatus i:nil="false">ValueHere</e220:AccountFinancialStatus>
        <e220:Id i:nil="false">ValueHere</e220:Id>
        <e220:Language i:nil="false">ValueHere</e220:Language>
        <e220:LastModifiedByUserId i:nil="false">ValueHere</e220:LastModifiedByUserId>
        <e220:LastModifiedTime i:nil="false">ValueHere</e220:LastModifiedTime>
        <e220:Name i:nil="false">ValueHere</e220:Name>
        <e220:Number i:nil="false">ValueHere</e220:Number>
        <e220:ParentCustomerId>ValueHere</e220:ParentCustomerId>
        <e220:PaymentMethodId i:nil="false">ValueHere</e220:PaymentMethodId>
        <e220:PaymentMethodType i:nil="false">ValueHere</e220:PaymentMethodType>
        <e220:PrimaryUserId i:nil="false">ValueHere</e220:PrimaryUserId>
        <e220:AccountLifeCycleStatus i:nil="false">ValueHere</e220:AccountLifeCycleStatus>
        <e220:TimeStamp i:nil="false">ValueHere</e220:TimeStamp>
        <e220:TimeZone i:nil="false">ValueHere</e220:TimeZone>
        <e220:PauseReason i:nil="false">ValueHere</e220:PauseReason>
        <e220:ForwardCompatibilityMap xmlns:e221="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e221:KeyValuePairOfstringstring>
            <e221:key i:nil="false">ValueHere</e221:key>
            <e221:value i:nil="false">ValueHere</e221:value>
          </e221:KeyValuePairOfstringstring>
        </e220:ForwardCompatibilityMap>
        <e220:LinkedAgencies i:nil="false">
          <e220:CustomerInfo>
            <e220:Id i:nil="false">ValueHere</e220:Id>
            <e220:Name i:nil="false">ValueHere</e220:Name>
          </e220:CustomerInfo>
        </e220:LinkedAgencies>
        <e220:SalesHouseCustomerId i:nil="false">ValueHere</e220:SalesHouseCustomerId>
        <e220:TaxInformation xmlns:e222="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e222:KeyValuePairOfstringstring>
            <e222:key i:nil="false">ValueHere</e222:key>
            <e222:value i:nil="false">ValueHere</e222:value>
          </e222:KeyValuePairOfstringstring>
        </e220:TaxInformation>
        <e220:BackUpPaymentInstrumentId i:nil="false">ValueHere</e220:BackUpPaymentInstrumentId>
        <e220:BillingThresholdAmount i:nil="false">ValueHere</e220:BillingThresholdAmount>
        <e220:BusinessAddress i:nil="false">
          <e220:City i:nil="false">ValueHere</e220:City>
          <e220:CountryCode i:nil="false">ValueHere</e220:CountryCode>
          <e220:Id i:nil="false">ValueHere</e220:Id>
          <e220:Line1 i:nil="false">ValueHere</e220:Line1>
          <e220:Line2 i:nil="false">ValueHere</e220:Line2>
          <e220:Line3 i:nil="false">ValueHere</e220:Line3>
          <e220:Line4 i:nil="false">ValueHere</e220:Line4>
          <e220:PostalCode i:nil="false">ValueHere</e220:PostalCode>
          <e220:StateOrProvince i:nil="false">ValueHere</e220:StateOrProvince>
          <e220:TimeStamp i:nil="false">ValueHere</e220:TimeStamp>
          <e220:BusinessName i:nil="false">ValueHere</e220:BusinessName>
        </e220:BusinessAddress>
        <e220:AutoTagType i:nil="false">ValueHere</e220:AutoTagType>
        <e220:SoldToPaymentInstrumentId i:nil="false">ValueHere</e220:SoldToPaymentInstrumentId>
        <e220:TaxCertificate i:nil="false">
          <e220:TaxCertificateBlobContainerName i:nil="false">ValueHere</e220:TaxCertificateBlobContainerName>
          <e220:TaxCertificates xmlns:e223="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
            <e223:KeyValuePairOfstringbase64Binary>
              <e223:key i:nil="false">ValueHere</e223:key>
              <e223:value i:nil="false">ValueHere</e223:value>
            </e223:KeyValuePairOfstringbase64Binary>
          </e220:TaxCertificates>
          <e220:Status i:nil="false">ValueHere</e220:Status>
        </e220:TaxCertificate>
        <e220:AccountMode i:nil="false">ValueHere</e220:AccountMode>
      </Account>
      <ParentCustomerId i:nil="false">ValueHere</ParentCustomerId>
      <UserInvitation xmlns:e224="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e224:Id>ValueHere</e224:Id>
        <e224:FirstName i:nil="false">ValueHere</e224:FirstName>
        <e224:LastName i:nil="false">ValueHere</e224:LastName>
        <e224:Email i:nil="false">ValueHere</e224:Email>
        <e224:CustomerId>ValueHere</e224:CustomerId>
        <e224:RoleId>ValueHere</e224:RoleId>
        <e224:AccountIds i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
          <a1:long>ValueHere</a1:long>
        </e224:AccountIds>
        <e224:ExpirationDate>ValueHere</e224:ExpirationDate>
        <e224:Lcid>ValueHere</e224:Lcid>
      </UserInvitation>
      <UserId i:nil="false">ValueHere</UserId>
      <User xmlns:e225="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false"> 
        <e225:ContactInfo i:nil="false"> 
          <e225:Email i:nil="false">ValueHere</e225:Email> 
        </e225:ContactInfo> 
        <e225:Name i:nil="false"> 
          <e225:FirstName i:nil="false">ValueHere</e225:FirstName> 
          <e225:LastName i:nil="false">ValueHere</e225:LastName> 
        </e225:Name> 
        <e225:AuthenticationToken i:nil="false">ValueHere</AuthenticationToken> 
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
  User=user)
```

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13  

