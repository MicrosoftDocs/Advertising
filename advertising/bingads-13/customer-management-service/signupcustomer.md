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
> Agency customers in the Create Accounts on Behalf of Client pilot ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 793) can sign up a new customer on behalf of a client and optionally link to the new account as an agency. In this case a [UserInvitation](userinvitation.md) is sent and the client must complete sign up steps via the Microsoft Advertising UI such as accept the terms and conditions.  

> [!NOTE]
> Customers in the closed Unified smart campaigns pilot can sign up a new customer with an account for Unified smart campaigns. Optionally they can link to the new account as an agency. The super admin is provisioned by either setting the [UserId](#userid) or [UserInvitation](#userinvitation) element.

> [!Note]
> Customers in the seamlessly set up client account and PI pilot can sign up a new customer with an account and create an admin user simultaneously. The admin user is provisioned by setting the [User](#user) element. And the customer must complete sign up steps via the Microsoft Advertising UI on the Microsoft Advertising activating customer page.

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
      <Customer xmlns:e222="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e222:CustomerFinancialStatus i:nil="false">ValueHere</e222:CustomerFinancialStatus>
        <e222:Id i:nil="false">ValueHere</e222:Id>
        <e222:Industry i:nil="false">ValueHere</e222:Industry>
        <e222:LastModifiedByUserId i:nil="false">ValueHere</e222:LastModifiedByUserId>
        <e222:LastModifiedTime i:nil="false">ValueHere</e222:LastModifiedTime>
        <e222:MarketCountry i:nil="false">ValueHere</e222:MarketCountry>
        <e222:ForwardCompatibilityMap xmlns:e223="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e223:KeyValuePairOfstringstring>
            <e223:key i:nil="false">ValueHere</e223:key>
            <e223:value i:nil="false">ValueHere</e223:value>
          </e223:KeyValuePairOfstringstring>
        </e222:ForwardCompatibilityMap>
        <e222:MarketLanguage i:nil="false">ValueHere</e222:MarketLanguage>
        <e222:Name i:nil="false">ValueHere</e222:Name>
        <e222:ServiceLevel i:nil="false">ValueHere</e222:ServiceLevel>
        <e222:CustomerLifeCycleStatus i:nil="false">ValueHere</e222:CustomerLifeCycleStatus>
        <e222:TimeStamp i:nil="false">ValueHere</e222:TimeStamp>
        <e222:Number i:nil="false">ValueHere</e222:Number>
        <e222:CustomerAddress i:nil="false">
          <e222:City i:nil="false">ValueHere</e222:City>
          <e222:CountryCode i:nil="false">ValueHere</e222:CountryCode>
          <e222:Id i:nil="false">ValueHere</e222:Id>
          <e222:Line1 i:nil="false">ValueHere</e222:Line1>
          <e222:Line2 i:nil="false">ValueHere</e222:Line2>
          <e222:Line3 i:nil="false">ValueHere</e222:Line3>
          <e222:Line4 i:nil="false">ValueHere</e222:Line4>
          <e222:PostalCode i:nil="false">ValueHere</e222:PostalCode>
          <e222:StateOrProvince i:nil="false">ValueHere</e222:StateOrProvince>
          <e222:TimeStamp i:nil="false">ValueHere</e222:TimeStamp>
          <e222:BusinessName i:nil="false">ValueHere</e222:BusinessName>
        </e222:CustomerAddress>
      </Customer>
      <Account xmlns:e224="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e224:BillToCustomerId i:nil="false">ValueHere</e224:BillToCustomerId>
        <e224:CurrencyCode i:nil="false">ValueHere</e224:CurrencyCode>
        <e224:AccountFinancialStatus i:nil="false">ValueHere</e224:AccountFinancialStatus>
        <e224:Id i:nil="false">ValueHere</e224:Id>
        <e224:Language i:nil="false">ValueHere</e224:Language>
        <e224:LastModifiedByUserId i:nil="false">ValueHere</e224:LastModifiedByUserId>
        <e224:LastModifiedTime i:nil="false">ValueHere</e224:LastModifiedTime>
        <e224:Name i:nil="false">ValueHere</e224:Name>
        <e224:Number i:nil="false">ValueHere</e224:Number>
        <e224:ParentCustomerId>ValueHere</e224:ParentCustomerId>
        <e224:PaymentMethodId i:nil="false">ValueHere</e224:PaymentMethodId>
        <e224:PaymentMethodType i:nil="false">ValueHere</e224:PaymentMethodType>
        <e224:PrimaryUserId i:nil="false">ValueHere</e224:PrimaryUserId>
        <e224:AccountLifeCycleStatus i:nil="false">ValueHere</e224:AccountLifeCycleStatus>
        <e224:TimeStamp i:nil="false">ValueHere</e224:TimeStamp>
        <e224:TimeZone i:nil="false">ValueHere</e224:TimeZone>
        <e224:PauseReason i:nil="false">ValueHere</e224:PauseReason>
        <e224:ForwardCompatibilityMap xmlns:e225="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e225:KeyValuePairOfstringstring>
            <e225:key i:nil="false">ValueHere</e225:key>
            <e225:value i:nil="false">ValueHere</e225:value>
          </e225:KeyValuePairOfstringstring>
        </e224:ForwardCompatibilityMap>
        <e224:LinkedAgencies i:nil="false">
          <e224:CustomerInfo>
            <e224:Id i:nil="false">ValueHere</e224:Id>
            <e224:Name i:nil="false">ValueHere</e224:Name>
          </e224:CustomerInfo>
        </e224:LinkedAgencies>
        <e224:SalesHouseCustomerId i:nil="false">ValueHere</e224:SalesHouseCustomerId>
        <e224:TaxInformation xmlns:e226="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e226:KeyValuePairOfstringstring>
            <e226:key i:nil="false">ValueHere</e226:key>
            <e226:value i:nil="false">ValueHere</e226:value>
          </e226:KeyValuePairOfstringstring>
        </e224:TaxInformation>
        <e224:BackUpPaymentInstrumentId i:nil="false">ValueHere</e224:BackUpPaymentInstrumentId>
        <e224:BillingThresholdAmount i:nil="false">ValueHere</e224:BillingThresholdAmount>
        <e224:BusinessAddress i:nil="false">
          <e224:City i:nil="false">ValueHere</e224:City>
          <e224:CountryCode i:nil="false">ValueHere</e224:CountryCode>
          <e224:Id i:nil="false">ValueHere</e224:Id>
          <e224:Line1 i:nil="false">ValueHere</e224:Line1>
          <e224:Line2 i:nil="false">ValueHere</e224:Line2>
          <e224:Line3 i:nil="false">ValueHere</e224:Line3>
          <e224:Line4 i:nil="false">ValueHere</e224:Line4>
          <e224:PostalCode i:nil="false">ValueHere</e224:PostalCode>
          <e224:StateOrProvince i:nil="false">ValueHere</e224:StateOrProvince>
          <e224:TimeStamp i:nil="false">ValueHere</e224:TimeStamp>
          <e224:BusinessName i:nil="false">ValueHere</e224:BusinessName>
        </e224:BusinessAddress>
        <e224:AutoTagType i:nil="false">ValueHere</e224:AutoTagType>
        <e224:SoldToPaymentInstrumentId i:nil="false">ValueHere</e224:SoldToPaymentInstrumentId>
        <e224:TaxCertificate i:nil="false">
          <e224:TaxCertificateBlobContainerName i:nil="false">ValueHere</e224:TaxCertificateBlobContainerName>
          <e224:TaxCertificates xmlns:e227="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
            <e227:KeyValuePairOfstringbase64Binary>
              <e227:key i:nil="false">ValueHere</e227:key>
              <e227:value i:nil="false">ValueHere</e227:value>
            </e227:KeyValuePairOfstringbase64Binary>
          </e224:TaxCertificates>
          <e224:Status i:nil="false">ValueHere</e224:Status>
        </e224:TaxCertificate>
        <e224:AccountMode i:nil="false">ValueHere</e224:AccountMode>
      </Account>
      <ParentCustomerId i:nil="false">ValueHere</ParentCustomerId>
      <UserInvitation xmlns:e228="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e228:Id>ValueHere</e228:Id>
        <e228:FirstName i:nil="false">ValueHere</e228:FirstName>
        <e228:LastName i:nil="false">ValueHere</e228:LastName>
        <e228:Email i:nil="false">ValueHere</e228:Email>
        <e228:CustomerId>ValueHere</e228:CustomerId>
        <e228:RoleId>ValueHere</e228:RoleId>
        <e228:AccountIds i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
          <a1:long>ValueHere</a1:long>
        </e228:AccountIds>
        <e228:ExpirationDate>ValueHere</e228:ExpirationDate>
        <e228:Lcid>ValueHere</e228:Lcid>
      </UserInvitation>
      <UserId i:nil="false">ValueHere</UserId>
      <User xmlns:e229="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e229:ContactInfo i:nil="false">
          <e229:Address i:nil="false">
            <e229:City i:nil="false">ValueHere</e229:City>
            <e229:CountryCode i:nil="false">ValueHere</e229:CountryCode>
            <e229:Id i:nil="false">ValueHere</e229:Id>
            <e229:Line1 i:nil="false">ValueHere</e229:Line1>
            <e229:Line2 i:nil="false">ValueHere</e229:Line2>
            <e229:Line3 i:nil="false">ValueHere</e229:Line3>
            <e229:Line4 i:nil="false">ValueHere</e229:Line4>
            <e229:PostalCode i:nil="false">ValueHere</e229:PostalCode>
            <e229:StateOrProvince i:nil="false">ValueHere</e229:StateOrProvince>
            <e229:TimeStamp i:nil="false">ValueHere</e229:TimeStamp>
            <e229:BusinessName i:nil="false">ValueHere</e229:BusinessName>
          </e229:Address>
          <e229:ContactByPhone i:nil="false">ValueHere</e229:ContactByPhone>
          <e229:ContactByPostalMail i:nil="false">ValueHere</e229:ContactByPostalMail>
          <e229:Email i:nil="false">ValueHere</e229:Email>
          <e229:EmailFormat i:nil="false">ValueHere</e229:EmailFormat>
          <e229:Fax i:nil="false">ValueHere</e229:Fax>
          <e229:HomePhone i:nil="false">ValueHere</e229:HomePhone>
          <e229:Id i:nil="false">ValueHere</e229:Id>
          <e229:Mobile i:nil="false">ValueHere</e229:Mobile>
          <e229:Phone1 i:nil="false">ValueHere</e229:Phone1>
          <e229:Phone2 i:nil="false">ValueHere</e229:Phone2>
        </e229:ContactInfo>
        <e229:CustomerId i:nil="false">ValueHere</e229:CustomerId>
        <e229:Id i:nil="false">ValueHere</e229:Id>
        <e229:JobTitle i:nil="false">ValueHere</e229:JobTitle>
        <e229:LastModifiedByUserId i:nil="false">ValueHere</e229:LastModifiedByUserId>
        <e229:LastModifiedTime i:nil="false">ValueHere</e229:LastModifiedTime>
        <e229:Lcid i:nil="false">ValueHere</e229:Lcid>
        <e229:Name i:nil="false">
          <e229:FirstName i:nil="false">ValueHere</e229:FirstName>
          <e229:LastName i:nil="false">ValueHere</e229:LastName>
          <e229:MiddleInitial i:nil="false">ValueHere</e229:MiddleInitial>
        </e229:Name>
        <e229:Password i:nil="false">ValueHere</e229:Password>
        <e229:SecretAnswer i:nil="false">ValueHere</e229:SecretAnswer>
        <e229:SecretQuestion>ValueHere</e229:SecretQuestion>
        <e229:UserLifeCycleStatus i:nil="false">ValueHere</e229:UserLifeCycleStatus>
        <e229:TimeStamp i:nil="false">ValueHere</e229:TimeStamp>
        <e229:UserName i:nil="false">ValueHere</e229:UserName>
        <e229:ForwardCompatibilityMap xmlns:e230="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e230:KeyValuePairOfstringstring>
            <e230:key i:nil="false">ValueHere</e230:key>
            <e230:value i:nil="false">ValueHere</e230:value>
          </e230:KeyValuePairOfstringstring>
        </e229:ForwardCompatibilityMap>
        <e229:AuthenticationToken i:nil="false">ValueHere</e229:AuthenticationToken>
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

