---
title: AddAccount Service Operation Test - Customer Management
ms.service: bing-ads
ms.subservice: customer-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
zone_pivot_groups: api-reference
description: Creates a new account within an existing customer.(test)
dev_langs: 
- csharp
- java
- php
- python
---
# AddAccount Service Operation Test - Customer Management
Creates a new account within an existing customer. 

A user with Super Admin [credentials](../guides/account-hierarchy-permissions.md#user-roles) can add accounts under their own customer.  

> [!TIP]
> Resellers typically should call [SignupCustomer](signupcustomer.md) instead of [AddAccount](addaccount.md). For more details see the [Account Hierarchy](../guides/account-hierarchy-permissions.md#account-hierarchy) technical guide.  

> [!NOTE]
> Customers in the closed Unified smart campaigns pilot can add a new account for Unified smart campaigns. The [AccountMode](advertiseraccount.md#accountmode) must be set to "UnifiedSmart".

::: zone pivot="soap"

## <a name="request"></a>Request Elements
The *AddAccountRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request. The elements must be in the same order as shown in the [Request SOAP](#request-soap). 

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="account"></a>Account|The account that you want to add to the existing customer.<br/><br/>You must set the [ParentCustomerId](advertiseraccount.md#parentcustomerid) in the advertiser account object.|[AdvertiserAccount](advertiseraccount.md)|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header.md)]

## <a name="response"></a>Response Elements
The *AddAccountResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response SOAP](#response-soap).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountid"></a>AccountId|A system-generated account identifier corresponding to the new account specified in the request.<br/><br/>Use this identifier with operation requests that require an *AccountId* body element and a *CustomerAccountId* SOAP header element.|**long**|
|<a name="accountnumber"></a>AccountNumber|The system-generated account number that is used to identify the account in the Microsoft Advertising web application.<br/><br/>The account number has the form *xxxxxxxx*, where *xxxxxxxx* is a series of any eight alphanumeric characters.|**string**|
|<a name="createtime"></a>CreateTime|The date and time that the account was added. The date and time value reflects the date and time at the server, not the client. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).|**dateTime**|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-soap"></a>Request SOAP
This template was generated by a tool to show the [order](../guides/services-protocol.md#element-order) of the [body](#request-body) and [header](#request-header) elements for the SOAP request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```xml
<s:Envelope xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
  <s:Header xmlns="https://bingads.microsoft.com/Customer/v13">
    <Action mustUnderstand="1">AddAccount</Action>
    <AuthenticationToken i:nil="false">ValueHere</AuthenticationToken>
    <DeveloperToken i:nil="false">ValueHere</DeveloperToken>
  </s:Header>
  <s:Body>
    <AddAccountRequest xmlns="https://bingads.microsoft.com/Customer/v13">
      <Account xmlns:e433="https://bingads.microsoft.com/Customer/v13/Entities" i:nil="false">
        <e433:BillToCustomerId i:nil="false">ValueHere</e433:BillToCustomerId>
        <e433:CurrencyCode i:nil="false">ValueHere</e433:CurrencyCode>
        <e433:AccountFinancialStatus i:nil="false">ValueHere</e433:AccountFinancialStatus>
        <e433:Id i:nil="false">ValueHere</e433:Id>
        <e433:Language i:nil="false">ValueHere</e433:Language>
        <e433:LastModifiedByUserId i:nil="false">ValueHere</e433:LastModifiedByUserId>
        <e433:LastModifiedTime i:nil="false">ValueHere</e433:LastModifiedTime>
        <e433:Name i:nil="false">ValueHere</e433:Name>
        <e433:Number i:nil="false">ValueHere</e433:Number>
        <e433:ParentCustomerId>ValueHere</e433:ParentCustomerId>
        <e433:PaymentMethodId i:nil="false">ValueHere</e433:PaymentMethodId>
        <e433:PaymentMethodType i:nil="false">ValueHere</e433:PaymentMethodType>
        <e433:PrimaryUserId i:nil="false">ValueHere</e433:PrimaryUserId>
        <e433:AccountLifeCycleStatus i:nil="false">ValueHere</e433:AccountLifeCycleStatus>
        <e433:TimeStamp i:nil="false">ValueHere</e433:TimeStamp>
        <e433:TimeZone i:nil="false">ValueHere</e433:TimeZone>
        <e433:PauseReason i:nil="false">ValueHere</e433:PauseReason>
        <e433:ForwardCompatibilityMap xmlns:e434="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e434:KeyValuePairOfstringstring>
            <e434:key i:nil="false">ValueHere</e434:key>
            <e434:value i:nil="false">ValueHere</e434:value>
          </e434:KeyValuePairOfstringstring>
        </e433:ForwardCompatibilityMap>
        <e433:LinkedAgencies i:nil="false">
          <e433:CustomerInfo>
            <e433:Id i:nil="false">ValueHere</e433:Id>
            <e433:Name i:nil="false">ValueHere</e433:Name>
          </e433:CustomerInfo>
        </e433:LinkedAgencies>
        <e433:SalesHouseCustomerId i:nil="false">ValueHere</e433:SalesHouseCustomerId>
        <e433:TaxInformation xmlns:e435="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
          <e435:KeyValuePairOfstringstring>
            <e435:key i:nil="false">ValueHere</e435:key>
            <e435:value i:nil="false">ValueHere</e435:value>
          </e435:KeyValuePairOfstringstring>
        </e433:TaxInformation>
        <e433:BackUpPaymentInstrumentId i:nil="false">ValueHere</e433:BackUpPaymentInstrumentId>
        <e433:BillingThresholdAmount i:nil="false">ValueHere</e433:BillingThresholdAmount>
        <e433:BusinessAddress i:nil="false">
          <e433:City i:nil="false">ValueHere</e433:City>
          <e433:CountryCode i:nil="false">ValueHere</e433:CountryCode>
          <e433:Id i:nil="false">ValueHere</e433:Id>
          <e433:Line1 i:nil="false">ValueHere</e433:Line1>
          <e433:Line2 i:nil="false">ValueHere</e433:Line2>
          <e433:Line3 i:nil="false">ValueHere</e433:Line3>
          <e433:Line4 i:nil="false">ValueHere</e433:Line4>
          <e433:PostalCode i:nil="false">ValueHere</e433:PostalCode>
          <e433:StateOrProvince i:nil="false">ValueHere</e433:StateOrProvince>
          <e433:TimeStamp i:nil="false">ValueHere</e433:TimeStamp>
          <e433:BusinessName i:nil="false">ValueHere</e433:BusinessName>
        </e433:BusinessAddress>
        <e433:AutoTagType i:nil="false">ValueHere</e433:AutoTagType>
        <e433:SoldToPaymentInstrumentId i:nil="false">ValueHere</e433:SoldToPaymentInstrumentId>
        <e433:TaxCertificate i:nil="false">
          <e433:TaxCertificateBlobContainerName i:nil="false">ValueHere</e433:TaxCertificateBlobContainerName>
          <e433:TaxCertificates xmlns:e436="http://schemas.datacontract.org/2004/07/System.Collections.Generic" i:nil="false">
            <e436:KeyValuePairOfstringbase64Binary>
              <e436:key i:nil="false">ValueHere</e436:key>
              <e436:value i:nil="false">ValueHere</e436:value>
            </e436:KeyValuePairOfstringbase64Binary>
          </e433:TaxCertificates>
          <e433:Status i:nil="false">ValueHere</e433:Status>
        </e433:TaxCertificate>
        <e433:AccountMode i:nil="false">ValueHere</e433:AccountMode>
      </Account>
    </AddAccountRequest>
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
    <AddAccountResponse xmlns="https://bingads.microsoft.com/Customer/v13">
      <AccountId>ValueHere</AccountId>
      <AccountNumber d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">ValueHere</AccountNumber>
      <CreateTime>ValueHere</CreateTime>
    </AddAccountResponse>
  </s:Body>
</s:Envelope>
```

## <a name="example"></a>Code Syntax
The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md). See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<AddAccountResponse> AddAccountAsync(
	AdvertiserAccount account)
{
	var request = new AddAccountRequest
	{
		Account = account
	};

	return (await CustomerManagementService.CallAsync((s, r) => s.AddAccountAsync(r), request));
}
```
```java
static AddAccountResponse addAccount(
	AdvertiserAccount account) throws RemoteException, Exception
{
	AddAccountRequest request = new AddAccountRequest();

	request.setAccount(account);

	return CustomerManagementService.getService().addAccount(request);
}
```
```php
static function AddAccount(
	$account)
{

	$GLOBALS['Proxy'] = $GLOBALS['CustomerManagementProxy'];

	$request = new AddAccountRequest();

	$request->Account = $account;

	return $GLOBALS['CustomerManagementProxy']->GetService()->AddAccount($request);
}
```
```python
response=customermanagement_service.AddAccount(
	Account=Account)
```

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13  

::: zone-end

::: zone pivot="rest"

## <a name="url"></a>Request Url

# [Production URL](#tab/prod)

```Post
https://clientcenter.api.bingads.microsoft.com/CustomerManagement/v13/Account
```

# [Sandbox URL](#tab/sandbox)

```Post
https://clientcenter.api.sandbox.bingads.microsoft.com/CustomerManagement/v13/Account
```

-----

## <a name="request"></a>Request Elements
The *AddAccountRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request.

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="account"></a>Account|The account that you want to add to the existing customer.<br/><br/>You must set the [ParentCustomerId](advertiseraccount.md#parentcustomerid) in the advertiser account object.|[AdvertiserAccount](advertiseraccount.md)|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header-rest.md)]

## <a name="response"></a>Response Elements
The *AddAccountResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response JSON](#response-json).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountid"></a>AccountId|A system-generated account identifier corresponding to the new account specified in the request.<br/><br/>Use this identifier with operation requests that require an *AccountId* body element and a *CustomerAccountId* SOAP header element.|**long**|
|<a name="accountnumber"></a>AccountNumber|The system-generated account number that is used to identify the account in the Microsoft Advertising web application.<br/><br/>The account number has the form *xxxxxxxx*, where *xxxxxxxx* is a series of any eight alphanumeric characters.|**string**|
|<a name="createtime"></a>CreateTime|The date and time that the account was added. The date and time value reflects the date and time at the server, not the client. For information about the format of the date and time, see the dateTime entry in [Primitive XML Data Types](https://go.microsoft.com/fwlink/?linkid=859198).|**dateTime**|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-json"></a>Request JSON
This template was generated by a tool to show the [body](#request-body) and [header](#request-header) elements for the JSON request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```json
{
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
  }
}
```

## <a name="response-json"></a>Response JSON
This template was generated by a tool to show the [body](#response-body) and [header](#response-header) elements for the JSON response.

```json
{
  "AccountId": "LongValueHere",
  "AccountNumber": "ValueHere",
  "CreateTime": "ValueHere"
}
```

## <a name="example"></a>Code Syntax
The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md). See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<AddAccountResponse> AddAccountAsync(
	AdvertiserAccount account)
{
	var request = new AddAccountRequest
	{
		Account = account
	};

	return (await CustomerManagementService.CallAsync((s, r) => s.AddAccountAsync(r), request));
}
```
```java
static AddAccountResponse addAccount(
	AdvertiserAccount account) throws RemoteException, Exception
{
	AddAccountRequest request = new AddAccountRequest();

	request.setAccount(account);

	return CustomerManagementService.getService().addAccount(request);
}
```
```php
static function AddAccount(
	$account)
{

	$GLOBALS['Proxy'] = $GLOBALS['CustomerManagementProxy'];

	$request = new AddAccountRequest();

	$request->Account = $account;

	return $GLOBALS['CustomerManagementProxy']->GetService()->AddAccount($request);
}
```
```python
response=customermanagement_service.AddAccount(
	Account=Account)
```

::: zone-end
