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
      <Customer xmlns:e242="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e242:CustomerFinancialStatus i:nil="false">ValueHere</e242:CustomerFinancialStatus>
        <e242:Id i:nil="false">ValueHere</e242:Id>
        <e242:Industry i:nil="false">ValueHere</e242:Industry>
        <e242:LastModifiedByUserId i:nil="false">ValueHere</e242:LastModifiedByUserId>
        <e242:LastModifiedTime i:nil="false">ValueHere</e242:LastModifiedTime>
        <e242:MarketCountry i:nil="false">ValueHere</e242:MarketCountry>
        <e242:ForwardCompatibilityMap xmlns:e243="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e243:KeyValuePairOfstringstring>
            <e243:key i:nil="false">ValueHere</e243:key>
            <e243:value i:nil="false">ValueHere</e243:value>
          </e243:KeyValuePairOfstringstring>
        </e242:ForwardCompatibilityMap>
        <e242:MarketLanguage i:nil="false">ValueHere</e242:MarketLanguage>
        <e242:Name i:nil="false">ValueHere</e242:Name>
        <e242:ServiceLevel i:nil="false">ValueHere</e242:ServiceLevel>
        <e242:CustomerLifeCycleStatus i:nil="false">ValueHere</e242:CustomerLifeCycleStatus>
        <e242:TimeStamp i:nil="false">ValueHere</e242:TimeStamp>
        <e242:Number i:nil="false">ValueHere</e242:Number>
        <e242:CustomerAddress i:nil="false">
          <e242:City i:nil="false">ValueHere</e242:City>
          <e242:CountryCode i:nil="false">ValueHere</e242:CountryCode>
          <e242:Id i:nil="false">ValueHere</e242:Id>
          <e242:Line1 i:nil="false">ValueHere</e242:Line1>
          <e242:Line2 i:nil="false">ValueHere</e242:Line2>
          <e242:Line3 i:nil="false">ValueHere</e242:Line3>
          <e242:Line4 i:nil="false">ValueHere</e242:Line4>
          <e242:PostalCode i:nil="false">ValueHere</e242:PostalCode>
          <e242:StateOrProvince i:nil="false">ValueHere</e242:StateOrProvince>
          <e242:TimeStamp i:nil="false">ValueHere</e242:TimeStamp>
          <e242:BusinessName i:nil="false">ValueHere</e242:BusinessName>
        </e242:CustomerAddress>
      </Customer>
      <Account xmlns:e244="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e244:BillToCustomerId i:nil="false">ValueHere</e244:BillToCustomerId>
        <e244:CurrencyCode i:nil="false">ValueHere</e244:CurrencyCode>
        <e244:AccountFinancialStatus i:nil="false">ValueHere</e244:AccountFinancialStatus>
        <e244:Id i:nil="false">ValueHere</e244:Id>
        <e244:Language i:nil="false">ValueHere</e244:Language>
        <e244:LastModifiedByUserId i:nil="false">ValueHere</e244:LastModifiedByUserId>
        <e244:LastModifiedTime i:nil="false">ValueHere</e244:LastModifiedTime>
        <e244:Name i:nil="false">ValueHere</e244:Name>
        <e244:Number i:nil="false">ValueHere</e244:Number>
        <e244:ParentCustomerId>ValueHere</e244:ParentCustomerId>
        <e244:PaymentMethodId i:nil="false">ValueHere</e244:PaymentMethodId>
        <e244:PaymentMethodType i:nil="false">ValueHere</e244:PaymentMethodType>
        <e244:PrimaryUserId i:nil="false">ValueHere</e244:PrimaryUserId>
        <e244:AccountLifeCycleStatus i:nil="false">ValueHere</e244:AccountLifeCycleStatus>
        <e244:TimeStamp i:nil="false">ValueHere</e244:TimeStamp>
        <e244:TimeZone i:nil="false">ValueHere</e244:TimeZone>
        <e244:PauseReason i:nil="false">ValueHere</e244:PauseReason>
        <e244:ForwardCompatibilityMap xmlns:e245="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e245:KeyValuePairOfstringstring>
            <e245:key i:nil="false">ValueHere</e245:key>
            <e245:value i:nil="false">ValueHere</e245:value>
          </e245:KeyValuePairOfstringstring>
        </e244:ForwardCompatibilityMap>
        <e244:LinkedAgencies i:nil="false">
          <e244:CustomerInfo>
            <e244:Id i:nil="false">ValueHere</e244:Id>
            <e244:Name i:nil="false">ValueHere</e244:Name>
          </e244:CustomerInfo>
        </e244:LinkedAgencies>
        <e244:SalesHouseCustomerId i:nil="false">ValueHere</e244:SalesHouseCustomerId>
        <e244:TaxInformation xmlns:e246="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e246:KeyValuePairOfstringstring>
            <e246:key i:nil="false">ValueHere</e246:key>
            <e246:value i:nil="false">ValueHere</e246:value>
          </e246:KeyValuePairOfstringstring>
        </e244:TaxInformation>
        <e244:BackUpPaymentInstrumentId i:nil="false">ValueHere</e244:BackUpPaymentInstrumentId>
        <e244:BillingThresholdAmount i:nil="false">ValueHere</e244:BillingThresholdAmount>
        <e244:BusinessAddress i:nil="false">
          <e244:City i:nil="false">ValueHere</e244:City>
          <e244:CountryCode i:nil="false">ValueHere</e244:CountryCode>
          <e244:Id i:nil="false">ValueHere</e244:Id>
          <e244:Line1 i:nil="false">ValueHere</e244:Line1>
          <e244:Line2 i:nil="false">ValueHere</e244:Line2>
          <e244:Line3 i:nil="false">ValueHere</e244:Line3>
          <e244:Line4 i:nil="false">ValueHere</e244:Line4>
          <e244:PostalCode i:nil="false">ValueHere</e244:PostalCode>
          <e244:StateOrProvince i:nil="false">ValueHere</e244:StateOrProvince>
          <e244:TimeStamp i:nil="false">ValueHere</e244:TimeStamp>
          <e244:BusinessName i:nil="false">ValueHere</e244:BusinessName>
        </e244:BusinessAddress>
        <e244:AutoTagType i:nil="false">ValueHere</e244:AutoTagType>
        <e244:SoldToPaymentInstrumentId i:nil="false">ValueHere</e244:SoldToPaymentInstrumentId>
        <e244:TaxCertificate i:nil="false">
          <e244:TaxCertificateBlobContainerName i:nil="false">ValueHere</e244:TaxCertificateBlobContainerName>
          <e244:TaxCertificates xmlns:e247="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
            <e247:KeyValuePairOfstringbase64Binary>
              <e247:key i:nil="false">ValueHere</e247:key>
              <e247:value i:nil="false">ValueHere</e247:value>
            </e247:KeyValuePairOfstringbase64Binary>
          </e244:TaxCertificates>
          <e244:Status i:nil="false">ValueHere</e244:Status>
        </e244:TaxCertificate>
        <e244:AccountMode i:nil="false">ValueHere</e244:AccountMode>
      </Account>
      <ParentCustomerId i:nil="false">ValueHere</ParentCustomerId>
      <UserInvitation xmlns:e248="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e248:Id>ValueHere</e248:Id>
        <e248:FirstName i:nil="false">ValueHere</e248:FirstName>
        <e248:LastName i:nil="false">ValueHere</e248:LastName>
        <e248:Email i:nil="false">ValueHere</e248:Email>
        <e248:CustomerId>ValueHere</e248:CustomerId>
        <e248:RoleId>ValueHere</e248:RoleId>
        <e248:AccountIds i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
          <a1:long>ValueHere</a1:long>
        </e248:AccountIds>
        <e248:ExpirationDate>ValueHere</e248:ExpirationDate>
        <e248:Lcid>ValueHere</e248:Lcid>
      </UserInvitation>
      <UserId i:nil="false">ValueHere</UserId>
      <User xmlns:e249="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e249:ContactInfo i:nil="false">
          <e249:Address i:nil="false">
            <e249:City i:nil="false">ValueHere</e249:City>
            <e249:CountryCode i:nil="false">ValueHere</e249:CountryCode>
            <e249:Id i:nil="false">ValueHere</e249:Id>
            <e249:Line1 i:nil="false">ValueHere</e249:Line1>
            <e249:Line2 i:nil="false">ValueHere</e249:Line2>
            <e249:Line3 i:nil="false">ValueHere</e249:Line3>
            <e249:Line4 i:nil="false">ValueHere</e249:Line4>
            <e249:PostalCode i:nil="false">ValueHere</e249:PostalCode>
            <e249:StateOrProvince i:nil="false">ValueHere</e249:StateOrProvince>
            <e249:TimeStamp i:nil="false">ValueHere</e249:TimeStamp>
            <e249:BusinessName i:nil="false">ValueHere</e249:BusinessName>
          </e249:Address>
          <e249:ContactByPhone i:nil="false">ValueHere</e249:ContactByPhone>
          <e249:ContactByPostalMail i:nil="false">ValueHere</e249:ContactByPostalMail>
          <e249:Email i:nil="false">ValueHere</e249:Email>
          <e249:EmailFormat i:nil="false">ValueHere</e249:EmailFormat>
          <e249:Fax i:nil="false">ValueHere</e249:Fax>
          <e249:HomePhone i:nil="false">ValueHere</e249:HomePhone>
          <e249:Id i:nil="false">ValueHere</e249:Id>
          <e249:Mobile i:nil="false">ValueHere</e249:Mobile>
          <e249:Phone1 i:nil="false">ValueHere</e249:Phone1>
          <e249:Phone2 i:nil="false">ValueHere</e249:Phone2>
        </e249:ContactInfo>
        <e249:CustomerId i:nil="false">ValueHere</e249:CustomerId>
        <e249:Id i:nil="false">ValueHere</e249:Id>
        <e249:JobTitle i:nil="false">ValueHere</e249:JobTitle>
        <e249:LastModifiedByUserId i:nil="false">ValueHere</e249:LastModifiedByUserId>
        <e249:LastModifiedTime i:nil="false">ValueHere</e249:LastModifiedTime>
        <e249:Lcid i:nil="false">ValueHere</e249:Lcid>
        <e249:Name i:nil="false">
          <e249:FirstName i:nil="false">ValueHere</e249:FirstName>
          <e249:LastName i:nil="false">ValueHere</e249:LastName>
          <e249:MiddleInitial i:nil="false">ValueHere</e249:MiddleInitial>
        </e249:Name>
        <e249:Password i:nil="false">ValueHere</e249:Password>
        <e249:SecretAnswer i:nil="false">ValueHere</e249:SecretAnswer>
        <e249:SecretQuestion>ValueHere</e249:SecretQuestion>
        <e249:UserLifeCycleStatus i:nil="false">ValueHere</e249:UserLifeCycleStatus>
        <e249:TimeStamp i:nil="false">ValueHere</e249:TimeStamp>
        <e249:UserName i:nil="false">ValueHere</e249:UserName>
        <e249:ForwardCompatibilityMap xmlns:e250="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e250:KeyValuePairOfstringstring>
            <e250:key i:nil="false">ValueHere</e250:key>
            <e250:value i:nil="false">ValueHere</e250:value>
          </e250:KeyValuePairOfstringstring>
        </e249:ForwardCompatibilityMap>
        <e249:AuthenticationToken i:nil="false">ValueHere</e249:AuthenticationToken>
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

