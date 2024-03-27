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
      <Customer xmlns:e264="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e264:CustomerFinancialStatus i:nil="false">ValueHere</e264:CustomerFinancialStatus>
        <e264:Id i:nil="false">ValueHere</e264:Id>
        <e264:Industry i:nil="false">ValueHere</e264:Industry>
        <e264:LastModifiedByUserId i:nil="false">ValueHere</e264:LastModifiedByUserId>
        <e264:LastModifiedTime i:nil="false">ValueHere</e264:LastModifiedTime>
        <e264:MarketCountry i:nil="false">ValueHere</e264:MarketCountry>
        <e264:ForwardCompatibilityMap xmlns:e265="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e265:KeyValuePairOfstringstring>
            <e265:key i:nil="false">ValueHere</e265:key>
            <e265:value i:nil="false">ValueHere</e265:value>
          </e265:KeyValuePairOfstringstring>
        </e264:ForwardCompatibilityMap>
        <e264:MarketLanguage i:nil="false">ValueHere</e264:MarketLanguage>
        <e264:Name i:nil="false">ValueHere</e264:Name>
        <e264:ServiceLevel i:nil="false">ValueHere</e264:ServiceLevel>
        <e264:CustomerLifeCycleStatus i:nil="false">ValueHere</e264:CustomerLifeCycleStatus>
        <e264:TimeStamp i:nil="false">ValueHere</e264:TimeStamp>
        <e264:Number i:nil="false">ValueHere</e264:Number>
        <e264:CustomerAddress i:nil="false">
          <e264:City i:nil="false">ValueHere</e264:City>
          <e264:CountryCode i:nil="false">ValueHere</e264:CountryCode>
          <e264:Id i:nil="false">ValueHere</e264:Id>
          <e264:Line1 i:nil="false">ValueHere</e264:Line1>
          <e264:Line2 i:nil="false">ValueHere</e264:Line2>
          <e264:Line3 i:nil="false">ValueHere</e264:Line3>
          <e264:Line4 i:nil="false">ValueHere</e264:Line4>
          <e264:PostalCode i:nil="false">ValueHere</e264:PostalCode>
          <e264:StateOrProvince i:nil="false">ValueHere</e264:StateOrProvince>
          <e264:TimeStamp i:nil="false">ValueHere</e264:TimeStamp>
          <e264:BusinessName i:nil="false">ValueHere</e264:BusinessName>
        </e264:CustomerAddress>
      </Customer>
      <Account xmlns:e266="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e266:BillToCustomerId i:nil="false">ValueHere</e266:BillToCustomerId>
        <e266:CurrencyCode i:nil="false">ValueHere</e266:CurrencyCode>
        <e266:AccountFinancialStatus i:nil="false">ValueHere</e266:AccountFinancialStatus>
        <e266:Id i:nil="false">ValueHere</e266:Id>
        <e266:Language i:nil="false">ValueHere</e266:Language>
        <e266:LastModifiedByUserId i:nil="false">ValueHere</e266:LastModifiedByUserId>
        <e266:LastModifiedTime i:nil="false">ValueHere</e266:LastModifiedTime>
        <e266:Name i:nil="false">ValueHere</e266:Name>
        <e266:Number i:nil="false">ValueHere</e266:Number>
        <e266:ParentCustomerId>ValueHere</e266:ParentCustomerId>
        <e266:PaymentMethodId i:nil="false">ValueHere</e266:PaymentMethodId>
        <e266:PaymentMethodType i:nil="false">ValueHere</e266:PaymentMethodType>
        <e266:PrimaryUserId i:nil="false">ValueHere</e266:PrimaryUserId>
        <e266:AccountLifeCycleStatus i:nil="false">ValueHere</e266:AccountLifeCycleStatus>
        <e266:TimeStamp i:nil="false">ValueHere</e266:TimeStamp>
        <e266:TimeZone i:nil="false">ValueHere</e266:TimeZone>
        <e266:PauseReason i:nil="false">ValueHere</e266:PauseReason>
        <e266:ForwardCompatibilityMap xmlns:e267="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e267:KeyValuePairOfstringstring>
            <e267:key i:nil="false">ValueHere</e267:key>
            <e267:value i:nil="false">ValueHere</e267:value>
          </e267:KeyValuePairOfstringstring>
        </e266:ForwardCompatibilityMap>
        <e266:LinkedAgencies i:nil="false">
          <e266:CustomerInfo>
            <e266:Id i:nil="false">ValueHere</e266:Id>
            <e266:Name i:nil="false">ValueHere</e266:Name>
          </e266:CustomerInfo>
        </e266:LinkedAgencies>
        <e266:SalesHouseCustomerId i:nil="false">ValueHere</e266:SalesHouseCustomerId>
        <e266:TaxInformation xmlns:e268="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e268:KeyValuePairOfstringstring>
            <e268:key i:nil="false">ValueHere</e268:key>
            <e268:value i:nil="false">ValueHere</e268:value>
          </e268:KeyValuePairOfstringstring>
        </e266:TaxInformation>
        <e266:BackUpPaymentInstrumentId i:nil="false">ValueHere</e266:BackUpPaymentInstrumentId>
        <e266:BillingThresholdAmount i:nil="false">ValueHere</e266:BillingThresholdAmount>
        <e266:BusinessAddress i:nil="false">
          <e266:City i:nil="false">ValueHere</e266:City>
          <e266:CountryCode i:nil="false">ValueHere</e266:CountryCode>
          <e266:Id i:nil="false">ValueHere</e266:Id>
          <e266:Line1 i:nil="false">ValueHere</e266:Line1>
          <e266:Line2 i:nil="false">ValueHere</e266:Line2>
          <e266:Line3 i:nil="false">ValueHere</e266:Line3>
          <e266:Line4 i:nil="false">ValueHere</e266:Line4>
          <e266:PostalCode i:nil="false">ValueHere</e266:PostalCode>
          <e266:StateOrProvince i:nil="false">ValueHere</e266:StateOrProvince>
          <e266:TimeStamp i:nil="false">ValueHere</e266:TimeStamp>
          <e266:BusinessName i:nil="false">ValueHere</e266:BusinessName>
        </e266:BusinessAddress>
        <e266:AutoTagType i:nil="false">ValueHere</e266:AutoTagType>
        <e266:SoldToPaymentInstrumentId i:nil="false">ValueHere</e266:SoldToPaymentInstrumentId>
        <e266:TaxCertificate i:nil="false">
          <e266:TaxCertificateBlobContainerName i:nil="false">ValueHere</e266:TaxCertificateBlobContainerName>
          <e266:TaxCertificates xmlns:e269="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
            <e269:KeyValuePairOfstringbase64Binary>
              <e269:key i:nil="false">ValueHere</e269:key>
              <e269:value i:nil="false">ValueHere</e269:value>
            </e269:KeyValuePairOfstringbase64Binary>
          </e266:TaxCertificates>
          <e266:Status i:nil="false">ValueHere</e266:Status>
        </e266:TaxCertificate>
        <e266:AccountMode i:nil="false">ValueHere</e266:AccountMode>
      </Account>
      <ParentCustomerId i:nil="false">ValueHere</ParentCustomerId>
      <UserInvitation xmlns:e270="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e270:Id>ValueHere</e270:Id>
        <e270:FirstName i:nil="false">ValueHere</e270:FirstName>
        <e270:LastName i:nil="false">ValueHere</e270:LastName>
        <e270:Email i:nil="false">ValueHere</e270:Email>
        <e270:CustomerId>ValueHere</e270:CustomerId>
        <e270:RoleId>ValueHere</e270:RoleId>
        <e270:AccountIds i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
          <a1:long>ValueHere</a1:long>
        </e270:AccountIds>
        <e270:ExpirationDate>ValueHere</e270:ExpirationDate>
        <e270:Lcid>ValueHere</e270:Lcid>
      </UserInvitation>
      <UserId i:nil="false">ValueHere</UserId>
      <User xmlns:e271="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e271:ContactInfo i:nil="false">
          <e271:Address i:nil="false">
            <e271:City i:nil="false">ValueHere</e271:City>
            <e271:CountryCode i:nil="false">ValueHere</e271:CountryCode>
            <e271:Id i:nil="false">ValueHere</e271:Id>
            <e271:Line1 i:nil="false">ValueHere</e271:Line1>
            <e271:Line2 i:nil="false">ValueHere</e271:Line2>
            <e271:Line3 i:nil="false">ValueHere</e271:Line3>
            <e271:Line4 i:nil="false">ValueHere</e271:Line4>
            <e271:PostalCode i:nil="false">ValueHere</e271:PostalCode>
            <e271:StateOrProvince i:nil="false">ValueHere</e271:StateOrProvince>
            <e271:TimeStamp i:nil="false">ValueHere</e271:TimeStamp>
            <e271:BusinessName i:nil="false">ValueHere</e271:BusinessName>
          </e271:Address>
          <e271:ContactByPhone i:nil="false">ValueHere</e271:ContactByPhone>
          <e271:ContactByPostalMail i:nil="false">ValueHere</e271:ContactByPostalMail>
          <e271:Email i:nil="false">ValueHere</e271:Email>
          <e271:EmailFormat i:nil="false">ValueHere</e271:EmailFormat>
          <e271:Fax i:nil="false">ValueHere</e271:Fax>
          <e271:HomePhone i:nil="false">ValueHere</e271:HomePhone>
          <e271:Id i:nil="false">ValueHere</e271:Id>
          <e271:Mobile i:nil="false">ValueHere</e271:Mobile>
          <e271:Phone1 i:nil="false">ValueHere</e271:Phone1>
          <e271:Phone2 i:nil="false">ValueHere</e271:Phone2>
        </e271:ContactInfo>
        <e271:CustomerId i:nil="false">ValueHere</e271:CustomerId>
        <e271:Id i:nil="false">ValueHere</e271:Id>
        <e271:JobTitle i:nil="false">ValueHere</e271:JobTitle>
        <e271:LastModifiedByUserId i:nil="false">ValueHere</e271:LastModifiedByUserId>
        <e271:LastModifiedTime i:nil="false">ValueHere</e271:LastModifiedTime>
        <e271:Lcid i:nil="false">ValueHere</e271:Lcid>
        <e271:Name i:nil="false">
          <e271:FirstName i:nil="false">ValueHere</e271:FirstName>
          <e271:LastName i:nil="false">ValueHere</e271:LastName>
          <e271:MiddleInitial i:nil="false">ValueHere</e271:MiddleInitial>
        </e271:Name>
        <e271:Password i:nil="false">ValueHere</e271:Password>
        <e271:SecretAnswer i:nil="false">ValueHere</e271:SecretAnswer>
        <e271:SecretQuestion>ValueHere</e271:SecretQuestion>
        <e271:UserLifeCycleStatus i:nil="false">ValueHere</e271:UserLifeCycleStatus>
        <e271:TimeStamp i:nil="false">ValueHere</e271:TimeStamp>
        <e271:UserName i:nil="false">ValueHere</e271:UserName>
        <e271:ForwardCompatibilityMap xmlns:e272="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e272:KeyValuePairOfstringstring>
            <e272:key i:nil="false">ValueHere</e272:key>
            <e272:value i:nil="false">ValueHere</e272:value>
          </e272:KeyValuePairOfstringstring>
        </e271:ForwardCompatibilityMap>
        <e271:AuthenticationToken i:nil="false">ValueHere</e271:AuthenticationToken>
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

