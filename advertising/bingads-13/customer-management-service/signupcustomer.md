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
      <Customer xmlns:e252="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e252:CustomerFinancialStatus i:nil="false">ValueHere</e252:CustomerFinancialStatus>
        <e252:Id i:nil="false">ValueHere</e252:Id>
        <e252:Industry i:nil="false">ValueHere</e252:Industry>
        <e252:LastModifiedByUserId i:nil="false">ValueHere</e252:LastModifiedByUserId>
        <e252:LastModifiedTime i:nil="false">ValueHere</e252:LastModifiedTime>
        <e252:MarketCountry i:nil="false">ValueHere</e252:MarketCountry>
        <e252:ForwardCompatibilityMap xmlns:e253="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e253:KeyValuePairOfstringstring>
            <e253:key i:nil="false">ValueHere</e253:key>
            <e253:value i:nil="false">ValueHere</e253:value>
          </e253:KeyValuePairOfstringstring>
        </e252:ForwardCompatibilityMap>
        <e252:MarketLanguage i:nil="false">ValueHere</e252:MarketLanguage>
        <e252:Name i:nil="false">ValueHere</e252:Name>
        <e252:ServiceLevel i:nil="false">ValueHere</e252:ServiceLevel>
        <e252:CustomerLifeCycleStatus i:nil="false">ValueHere</e252:CustomerLifeCycleStatus>
        <e252:TimeStamp i:nil="false">ValueHere</e252:TimeStamp>
        <e252:Number i:nil="false">ValueHere</e252:Number>
        <e252:CustomerAddress i:nil="false">
          <e252:City i:nil="false">ValueHere</e252:City>
          <e252:CountryCode i:nil="false">ValueHere</e252:CountryCode>
          <e252:Id i:nil="false">ValueHere</e252:Id>
          <e252:Line1 i:nil="false">ValueHere</e252:Line1>
          <e252:Line2 i:nil="false">ValueHere</e252:Line2>
          <e252:Line3 i:nil="false">ValueHere</e252:Line3>
          <e252:Line4 i:nil="false">ValueHere</e252:Line4>
          <e252:PostalCode i:nil="false">ValueHere</e252:PostalCode>
          <e252:StateOrProvince i:nil="false">ValueHere</e252:StateOrProvince>
          <e252:TimeStamp i:nil="false">ValueHere</e252:TimeStamp>
          <e252:BusinessName i:nil="false">ValueHere</e252:BusinessName>
        </e252:CustomerAddress>
      </Customer>
      <Account xmlns:e254="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e254:BillToCustomerId i:nil="false">ValueHere</e254:BillToCustomerId>
        <e254:CurrencyCode i:nil="false">ValueHere</e254:CurrencyCode>
        <e254:AccountFinancialStatus i:nil="false">ValueHere</e254:AccountFinancialStatus>
        <e254:Id i:nil="false">ValueHere</e254:Id>
        <e254:Language i:nil="false">ValueHere</e254:Language>
        <e254:LastModifiedByUserId i:nil="false">ValueHere</e254:LastModifiedByUserId>
        <e254:LastModifiedTime i:nil="false">ValueHere</e254:LastModifiedTime>
        <e254:Name i:nil="false">ValueHere</e254:Name>
        <e254:Number i:nil="false">ValueHere</e254:Number>
        <e254:ParentCustomerId>ValueHere</e254:ParentCustomerId>
        <e254:PaymentMethodId i:nil="false">ValueHere</e254:PaymentMethodId>
        <e254:PaymentMethodType i:nil="false">ValueHere</e254:PaymentMethodType>
        <e254:PrimaryUserId i:nil="false">ValueHere</e254:PrimaryUserId>
        <e254:AccountLifeCycleStatus i:nil="false">ValueHere</e254:AccountLifeCycleStatus>
        <e254:TimeStamp i:nil="false">ValueHere</e254:TimeStamp>
        <e254:TimeZone i:nil="false">ValueHere</e254:TimeZone>
        <e254:PauseReason i:nil="false">ValueHere</e254:PauseReason>
        <e254:ForwardCompatibilityMap xmlns:e255="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e255:KeyValuePairOfstringstring>
            <e255:key i:nil="false">ValueHere</e255:key>
            <e255:value i:nil="false">ValueHere</e255:value>
          </e255:KeyValuePairOfstringstring>
        </e254:ForwardCompatibilityMap>
        <e254:LinkedAgencies i:nil="false">
          <e254:CustomerInfo>
            <e254:Id i:nil="false">ValueHere</e254:Id>
            <e254:Name i:nil="false">ValueHere</e254:Name>
          </e254:CustomerInfo>
        </e254:LinkedAgencies>
        <e254:SalesHouseCustomerId i:nil="false">ValueHere</e254:SalesHouseCustomerId>
        <e254:TaxInformation xmlns:e256="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e256:KeyValuePairOfstringstring>
            <e256:key i:nil="false">ValueHere</e256:key>
            <e256:value i:nil="false">ValueHere</e256:value>
          </e256:KeyValuePairOfstringstring>
        </e254:TaxInformation>
        <e254:BackUpPaymentInstrumentId i:nil="false">ValueHere</e254:BackUpPaymentInstrumentId>
        <e254:BillingThresholdAmount i:nil="false">ValueHere</e254:BillingThresholdAmount>
        <e254:BusinessAddress i:nil="false">
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
        </e254:BusinessAddress>
        <e254:AutoTagType i:nil="false">ValueHere</e254:AutoTagType>
        <e254:SoldToPaymentInstrumentId i:nil="false">ValueHere</e254:SoldToPaymentInstrumentId>
        <e254:TaxCertificate i:nil="false">
          <e254:TaxCertificateBlobContainerName i:nil="false">ValueHere</e254:TaxCertificateBlobContainerName>
          <e254:TaxCertificates xmlns:e257="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
            <e257:KeyValuePairOfstringbase64Binary>
              <e257:key i:nil="false">ValueHere</e257:key>
              <e257:value i:nil="false">ValueHere</e257:value>
            </e257:KeyValuePairOfstringbase64Binary>
          </e254:TaxCertificates>
          <e254:Status i:nil="false">ValueHere</e254:Status>
        </e254:TaxCertificate>
        <e254:AccountMode i:nil="false">ValueHere</e254:AccountMode>
      </Account>
      <ParentCustomerId i:nil="false">ValueHere</ParentCustomerId>
      <UserInvitation xmlns:e258="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e258:Id>ValueHere</e258:Id>
        <e258:FirstName i:nil="false">ValueHere</e258:FirstName>
        <e258:LastName i:nil="false">ValueHere</e258:LastName>
        <e258:Email i:nil="false">ValueHere</e258:Email>
        <e258:CustomerId>ValueHere</e258:CustomerId>
        <e258:RoleId>ValueHere</e258:RoleId>
        <e258:AccountIds i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
          <a1:long>ValueHere</a1:long>
        </e258:AccountIds>
        <e258:ExpirationDate>ValueHere</e258:ExpirationDate>
        <e258:Lcid>ValueHere</e258:Lcid>
      </UserInvitation>
      <UserId i:nil="false">ValueHere</UserId>
      <User xmlns:e259="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e259:ContactInfo i:nil="false">
          <e259:Address i:nil="false">
            <e259:City i:nil="false">ValueHere</e259:City>
            <e259:CountryCode i:nil="false">ValueHere</e259:CountryCode>
            <e259:Id i:nil="false">ValueHere</e259:Id>
            <e259:Line1 i:nil="false">ValueHere</e259:Line1>
            <e259:Line2 i:nil="false">ValueHere</e259:Line2>
            <e259:Line3 i:nil="false">ValueHere</e259:Line3>
            <e259:Line4 i:nil="false">ValueHere</e259:Line4>
            <e259:PostalCode i:nil="false">ValueHere</e259:PostalCode>
            <e259:StateOrProvince i:nil="false">ValueHere</e259:StateOrProvince>
            <e259:TimeStamp i:nil="false">ValueHere</e259:TimeStamp>
            <e259:BusinessName i:nil="false">ValueHere</e259:BusinessName>
          </e259:Address>
          <e259:ContactByPhone i:nil="false">ValueHere</e259:ContactByPhone>
          <e259:ContactByPostalMail i:nil="false">ValueHere</e259:ContactByPostalMail>
          <e259:Email i:nil="false">ValueHere</e259:Email>
          <e259:EmailFormat i:nil="false">ValueHere</e259:EmailFormat>
          <e259:Fax i:nil="false">ValueHere</e259:Fax>
          <e259:HomePhone i:nil="false">ValueHere</e259:HomePhone>
          <e259:Id i:nil="false">ValueHere</e259:Id>
          <e259:Mobile i:nil="false">ValueHere</e259:Mobile>
          <e259:Phone1 i:nil="false">ValueHere</e259:Phone1>
          <e259:Phone2 i:nil="false">ValueHere</e259:Phone2>
        </e259:ContactInfo>
        <e259:CustomerId i:nil="false">ValueHere</e259:CustomerId>
        <e259:Id i:nil="false">ValueHere</e259:Id>
        <e259:JobTitle i:nil="false">ValueHere</e259:JobTitle>
        <e259:LastModifiedByUserId i:nil="false">ValueHere</e259:LastModifiedByUserId>
        <e259:LastModifiedTime i:nil="false">ValueHere</e259:LastModifiedTime>
        <e259:Lcid i:nil="false">ValueHere</e259:Lcid>
        <e259:Name i:nil="false">
          <e259:FirstName i:nil="false">ValueHere</e259:FirstName>
          <e259:LastName i:nil="false">ValueHere</e259:LastName>
          <e259:MiddleInitial i:nil="false">ValueHere</e259:MiddleInitial>
        </e259:Name>
        <e259:Password i:nil="false">ValueHere</e259:Password>
        <e259:SecretAnswer i:nil="false">ValueHere</e259:SecretAnswer>
        <e259:SecretQuestion>ValueHere</e259:SecretQuestion>
        <e259:UserLifeCycleStatus i:nil="false">ValueHere</e259:UserLifeCycleStatus>
        <e259:TimeStamp i:nil="false">ValueHere</e259:TimeStamp>
        <e259:UserName i:nil="false">ValueHere</e259:UserName>
        <e259:ForwardCompatibilityMap xmlns:e260="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e260:KeyValuePairOfstringstring>
            <e260:key i:nil="false">ValueHere</e260:key>
            <e260:value i:nil="false">ValueHere</e260:value>
          </e260:KeyValuePairOfstringstring>
        </e259:ForwardCompatibilityMap>
        <e259:AuthenticationToken i:nil="false">ValueHere</e259:AuthenticationToken>
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

