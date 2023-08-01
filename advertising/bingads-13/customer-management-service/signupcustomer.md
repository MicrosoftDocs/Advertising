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
      <Customer xmlns:e247="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e247:CustomerFinancialStatus i:nil="false">ValueHere</e247:CustomerFinancialStatus>
        <e247:Id i:nil="false">ValueHere</e247:Id>
        <e247:Industry i:nil="false">ValueHere</e247:Industry>
        <e247:LastModifiedByUserId i:nil="false">ValueHere</e247:LastModifiedByUserId>
        <e247:LastModifiedTime i:nil="false">ValueHere</e247:LastModifiedTime>
        <e247:MarketCountry i:nil="false">ValueHere</e247:MarketCountry>
        <e247:ForwardCompatibilityMap xmlns:e248="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e248:KeyValuePairOfstringstring>
            <e248:key i:nil="false">ValueHere</e248:key>
            <e248:value i:nil="false">ValueHere</e248:value>
          </e248:KeyValuePairOfstringstring>
        </e247:ForwardCompatibilityMap>
        <e247:MarketLanguage i:nil="false">ValueHere</e247:MarketLanguage>
        <e247:Name i:nil="false">ValueHere</e247:Name>
        <e247:ServiceLevel i:nil="false">ValueHere</e247:ServiceLevel>
        <e247:CustomerLifeCycleStatus i:nil="false">ValueHere</e247:CustomerLifeCycleStatus>
        <e247:TimeStamp i:nil="false">ValueHere</e247:TimeStamp>
        <e247:Number i:nil="false">ValueHere</e247:Number>
        <e247:CustomerAddress i:nil="false">
          <e247:City i:nil="false">ValueHere</e247:City>
          <e247:CountryCode i:nil="false">ValueHere</e247:CountryCode>
          <e247:Id i:nil="false">ValueHere</e247:Id>
          <e247:Line1 i:nil="false">ValueHere</e247:Line1>
          <e247:Line2 i:nil="false">ValueHere</e247:Line2>
          <e247:Line3 i:nil="false">ValueHere</e247:Line3>
          <e247:Line4 i:nil="false">ValueHere</e247:Line4>
          <e247:PostalCode i:nil="false">ValueHere</e247:PostalCode>
          <e247:StateOrProvince i:nil="false">ValueHere</e247:StateOrProvince>
          <e247:TimeStamp i:nil="false">ValueHere</e247:TimeStamp>
          <e247:BusinessName i:nil="false">ValueHere</e247:BusinessName>
        </e247:CustomerAddress>
      </Customer>
      <Account xmlns:e249="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e249:BillToCustomerId i:nil="false">ValueHere</e249:BillToCustomerId>
        <e249:CurrencyCode i:nil="false">ValueHere</e249:CurrencyCode>
        <e249:AccountFinancialStatus i:nil="false">ValueHere</e249:AccountFinancialStatus>
        <e249:Id i:nil="false">ValueHere</e249:Id>
        <e249:Language i:nil="false">ValueHere</e249:Language>
        <e249:LastModifiedByUserId i:nil="false">ValueHere</e249:LastModifiedByUserId>
        <e249:LastModifiedTime i:nil="false">ValueHere</e249:LastModifiedTime>
        <e249:Name i:nil="false">ValueHere</e249:Name>
        <e249:Number i:nil="false">ValueHere</e249:Number>
        <e249:ParentCustomerId>ValueHere</e249:ParentCustomerId>
        <e249:PaymentMethodId i:nil="false">ValueHere</e249:PaymentMethodId>
        <e249:PaymentMethodType i:nil="false">ValueHere</e249:PaymentMethodType>
        <e249:PrimaryUserId i:nil="false">ValueHere</e249:PrimaryUserId>
        <e249:AccountLifeCycleStatus i:nil="false">ValueHere</e249:AccountLifeCycleStatus>
        <e249:TimeStamp i:nil="false">ValueHere</e249:TimeStamp>
        <e249:TimeZone i:nil="false">ValueHere</e249:TimeZone>
        <e249:PauseReason i:nil="false">ValueHere</e249:PauseReason>
        <e249:ForwardCompatibilityMap xmlns:e250="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e250:KeyValuePairOfstringstring>
            <e250:key i:nil="false">ValueHere</e250:key>
            <e250:value i:nil="false">ValueHere</e250:value>
          </e250:KeyValuePairOfstringstring>
        </e249:ForwardCompatibilityMap>
        <e249:LinkedAgencies i:nil="false">
          <e249:CustomerInfo>
            <e249:Id i:nil="false">ValueHere</e249:Id>
            <e249:Name i:nil="false">ValueHere</e249:Name>
          </e249:CustomerInfo>
        </e249:LinkedAgencies>
        <e249:SalesHouseCustomerId i:nil="false">ValueHere</e249:SalesHouseCustomerId>
        <e249:TaxInformation xmlns:e251="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e251:KeyValuePairOfstringstring>
            <e251:key i:nil="false">ValueHere</e251:key>
            <e251:value i:nil="false">ValueHere</e251:value>
          </e251:KeyValuePairOfstringstring>
        </e249:TaxInformation>
        <e249:BackUpPaymentInstrumentId i:nil="false">ValueHere</e249:BackUpPaymentInstrumentId>
        <e249:BillingThresholdAmount i:nil="false">ValueHere</e249:BillingThresholdAmount>
        <e249:BusinessAddress i:nil="false">
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
        </e249:BusinessAddress>
        <e249:AutoTagType i:nil="false">ValueHere</e249:AutoTagType>
        <e249:SoldToPaymentInstrumentId i:nil="false">ValueHere</e249:SoldToPaymentInstrumentId>
        <e249:TaxCertificate i:nil="false">
          <e249:TaxCertificateBlobContainerName i:nil="false">ValueHere</e249:TaxCertificateBlobContainerName>
          <e249:TaxCertificates xmlns:e252="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
            <e252:KeyValuePairOfstringbase64Binary>
              <e252:key i:nil="false">ValueHere</e252:key>
              <e252:value i:nil="false">ValueHere</e252:value>
            </e252:KeyValuePairOfstringbase64Binary>
          </e249:TaxCertificates>
          <e249:Status i:nil="false">ValueHere</e249:Status>
        </e249:TaxCertificate>
        <e249:AccountMode i:nil="false">ValueHere</e249:AccountMode>
      </Account>
      <ParentCustomerId i:nil="false">ValueHere</ParentCustomerId>
      <UserInvitation xmlns:e253="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e253:Id>ValueHere</e253:Id>
        <e253:FirstName i:nil="false">ValueHere</e253:FirstName>
        <e253:LastName i:nil="false">ValueHere</e253:LastName>
        <e253:Email i:nil="false">ValueHere</e253:Email>
        <e253:CustomerId>ValueHere</e253:CustomerId>
        <e253:RoleId>ValueHere</e253:RoleId>
        <e253:AccountIds i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
          <a1:long>ValueHere</a1:long>
        </e253:AccountIds>
        <e253:ExpirationDate>ValueHere</e253:ExpirationDate>
        <e253:Lcid>ValueHere</e253:Lcid>
      </UserInvitation>
      <UserId i:nil="false">ValueHere</UserId>
      <User xmlns:e254="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e254:ContactInfo i:nil="false">
          <e254:Address i:nil="false">
            <e254:City i:nil="false">ValueHere</e254:City>
            <e254:CountryCode i:nil="false">ValueHere</e254:CountryCode>
            <e254:Id i:nil="false">ValueHere</e254:Id>
            <e254:Line1 i:nil="false">ValueHere</e254:Line1>
            <e254:Line2 i:nil="false">ValueHere</e254:Line2>
            <e254:Line3 i:nil="false">ValueHere</e254:Line3>
            <e254:Line4 i:nil="false">ValueHere</e254:Line4>
            <e254:PostalCode i:nil="false">ValueHere</e254:PostalCode>
            <e254:StateOrProvince i:nil="false">ValueHere</e254:StateOrProvince>
            <e254:TimeStamp i:nil="false">ValueHere</e254:TimeStamp>
            <e254:BusinessName i:nil="false">ValueHere</e254:BusinessName>
          </e254:Address>
          <e254:ContactByPhone i:nil="false">ValueHere</e254:ContactByPhone>
          <e254:ContactByPostalMail i:nil="false">ValueHere</e254:ContactByPostalMail>
          <e254:Email i:nil="false">ValueHere</e254:Email>
          <e254:EmailFormat i:nil="false">ValueHere</e254:EmailFormat>
          <e254:Fax i:nil="false">ValueHere</e254:Fax>
          <e254:HomePhone i:nil="false">ValueHere</e254:HomePhone>
          <e254:Id i:nil="false">ValueHere</e254:Id>
          <e254:Mobile i:nil="false">ValueHere</e254:Mobile>
          <e254:Phone1 i:nil="false">ValueHere</e254:Phone1>
          <e254:Phone2 i:nil="false">ValueHere</e254:Phone2>
        </e254:ContactInfo>
        <e254:CustomerId i:nil="false">ValueHere</e254:CustomerId>
        <e254:Id i:nil="false">ValueHere</e254:Id>
        <e254:JobTitle i:nil="false">ValueHere</e254:JobTitle>
        <e254:LastModifiedByUserId i:nil="false">ValueHere</e254:LastModifiedByUserId>
        <e254:LastModifiedTime i:nil="false">ValueHere</e254:LastModifiedTime>
        <e254:Lcid i:nil="false">ValueHere</e254:Lcid>
        <e254:Name i:nil="false">
          <e254:FirstName i:nil="false">ValueHere</e254:FirstName>
          <e254:LastName i:nil="false">ValueHere</e254:LastName>
          <e254:MiddleInitial i:nil="false">ValueHere</e254:MiddleInitial>
        </e254:Name>
        <e254:Password i:nil="false">ValueHere</e254:Password>
        <e254:SecretAnswer i:nil="false">ValueHere</e254:SecretAnswer>
        <e254:SecretQuestion>ValueHere</e254:SecretQuestion>
        <e254:UserLifeCycleStatus i:nil="false">ValueHere</e254:UserLifeCycleStatus>
        <e254:TimeStamp i:nil="false">ValueHere</e254:TimeStamp>
        <e254:UserName i:nil="false">ValueHere</e254:UserName>
        <e254:ForwardCompatibilityMap xmlns:e255="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e255:KeyValuePairOfstringstring>
            <e255:key i:nil="false">ValueHere</e255:key>
            <e255:value i:nil="false">ValueHere</e255:value>
          </e255:KeyValuePairOfstringstring>
        </e254:ForwardCompatibilityMap>
        <e254:AuthenticationToken i:nil="false">ValueHere</e254:AuthenticationToken>
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

