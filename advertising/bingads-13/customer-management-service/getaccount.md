---
title: GetAccount Service Operation - Customer Management
ms.service: bing-ads
ms.subservice: customer-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Gets the details of an account.
dev_langs: 
- csharp
- java
- php
- python
---
# GetAccount Service Operation - Customer Management
Gets the details of an account.

## <a name="request"></a>Request Elements
The *GetAccountRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request. The elements must be in the same order as shown in the [Request SOAP](#request-soap). 

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountid"></a>AccountId|The identifier of the account to get.|**long**|
|<a name="returnadditionalfields"></a>ReturnAdditionalFields|The list of additional properties that you want included within each returned account. The additional field values enable you to get the latest features using the current version of Customer Management API, and in the next version the corresponding elements will be included by default.<br/><br/>This request element is optional.|[AccountAdditionalField](accountadditionalfield.md)|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header.md)]

## <a name="response"></a>Response Elements
The *GetAccountResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response SOAP](#response-soap).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="account"></a>Account|An account object that contains information about the account, such as payment method, account type, and parent customer.|[AdvertiserAccount](advertiseraccount.md)|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-soap"></a>Request SOAP
This template was generated by a tool to show the [order](../guides/services-protocol.md#element-order) of the [body](#request-body) and [header](#request-header) elements for the SOAP request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```xml
<s:Envelope xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
  <s:Header xmlns="https://bingads.microsoft.com/Customer/v13">
    <Action mustUnderstand="1">GetAccount</Action>
    <AuthenticationToken i:nil="false">ValueHere</AuthenticationToken>
    <DeveloperToken i:nil="false">ValueHere</DeveloperToken>
  </s:Header>
  <s:Body>
    <GetAccountRequest xmlns="https://bingads.microsoft.com/Customer/v13">
      <AccountId>ValueHere</AccountId>
      <ReturnAdditionalFields i:nil="false">ValueHere</ReturnAdditionalFields>
    </GetAccountRequest>
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
    <GetAccountResponse xmlns="https://bingads.microsoft.com/Customer/v13">
      <Account xmlns:e228="https://bingads.microsoft.com/Customer/v13/Entities" d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <e228:BillToCustomerId d4p1:nil="false">ValueHere</e228:BillToCustomerId>
        <e228:CurrencyCode d4p1:nil="false">ValueHere</e228:CurrencyCode>
        <e228:AccountFinancialStatus d4p1:nil="false">ValueHere</e228:AccountFinancialStatus>
        <e228:Id d4p1:nil="false">ValueHere</e228:Id>
        <e228:Language d4p1:nil="false">ValueHere</e228:Language>
        <e228:LastModifiedByUserId d4p1:nil="false">ValueHere</e228:LastModifiedByUserId>
        <e228:LastModifiedTime d4p1:nil="false">ValueHere</e228:LastModifiedTime>
        <e228:Name d4p1:nil="false">ValueHere</e228:Name>
        <e228:Number d4p1:nil="false">ValueHere</e228:Number>
        <e228:ParentCustomerId>ValueHere</e228:ParentCustomerId>
        <e228:PaymentMethodId d4p1:nil="false">ValueHere</e228:PaymentMethodId>
        <e228:PaymentMethodType d4p1:nil="false">ValueHere</e228:PaymentMethodType>
        <e228:PrimaryUserId d4p1:nil="false">ValueHere</e228:PrimaryUserId>
        <e228:AccountLifeCycleStatus d4p1:nil="false">ValueHere</e228:AccountLifeCycleStatus>
        <e228:TimeStamp d4p1:nil="false">ValueHere</e228:TimeStamp>
        <e228:TimeZone d4p1:nil="false">ValueHere</e228:TimeZone>
        <e228:PauseReason d4p1:nil="false">ValueHere</e228:PauseReason>
        <e228:ForwardCompatibilityMap xmlns:e229="http://schemas.datacontract.org/2004/07/System.Collections.Generic" d4p1:nil="false">
          <e229:KeyValuePairOfstringstring>
            <e229:key d4p1:nil="false">ValueHere</e229:key>
            <e229:value d4p1:nil="false">ValueHere</e229:value>
          </e229:KeyValuePairOfstringstring>
        </e228:ForwardCompatibilityMap>
        <e228:LinkedAgencies d4p1:nil="false">
          <e228:CustomerInfo>
            <e228:Id d4p1:nil="false">ValueHere</e228:Id>
            <e228:Name d4p1:nil="false">ValueHere</e228:Name>
          </e228:CustomerInfo>
        </e228:LinkedAgencies>
        <e228:SalesHouseCustomerId d4p1:nil="false">ValueHere</e228:SalesHouseCustomerId>
        <e228:TaxInformation xmlns:e230="http://schemas.datacontract.org/2004/07/System.Collections.Generic" d4p1:nil="false">
          <e230:KeyValuePairOfstringstring>
            <e230:key d4p1:nil="false">ValueHere</e230:key>
            <e230:value d4p1:nil="false">ValueHere</e230:value>
          </e230:KeyValuePairOfstringstring>
        </e228:TaxInformation>
        <e228:BackUpPaymentInstrumentId d4p1:nil="false">ValueHere</e228:BackUpPaymentInstrumentId>
        <e228:BillingThresholdAmount d4p1:nil="false">ValueHere</e228:BillingThresholdAmount>
        <e228:BusinessAddress d4p1:nil="false">
          <e228:City d4p1:nil="false">ValueHere</e228:City>
          <e228:CountryCode d4p1:nil="false">ValueHere</e228:CountryCode>
          <e228:Id d4p1:nil="false">ValueHere</e228:Id>
          <e228:Line1 d4p1:nil="false">ValueHere</e228:Line1>
          <e228:Line2 d4p1:nil="false">ValueHere</e228:Line2>
          <e228:Line3 d4p1:nil="false">ValueHere</e228:Line3>
          <e228:Line4 d4p1:nil="false">ValueHere</e228:Line4>
          <e228:PostalCode d4p1:nil="false">ValueHere</e228:PostalCode>
          <e228:StateOrProvince d4p1:nil="false">ValueHere</e228:StateOrProvince>
          <e228:TimeStamp d4p1:nil="false">ValueHere</e228:TimeStamp>
          <e228:BusinessName d4p1:nil="false">ValueHere</e228:BusinessName>
        </e228:BusinessAddress>
        <e228:AutoTagType d4p1:nil="false">ValueHere</e228:AutoTagType>
        <e228:SoldToPaymentInstrumentId d4p1:nil="false">ValueHere</e228:SoldToPaymentInstrumentId>
        <e228:TaxCertificate d4p1:nil="false">
          <e228:TaxCertificateBlobContainerName d4p1:nil="false">ValueHere</e228:TaxCertificateBlobContainerName>
          <e228:TaxCertificates xmlns:e231="http://schemas.datacontract.org/2004/07/System.Collections.Generic" d4p1:nil="false">
            <e231:KeyValuePairOfstringbase64Binary>
              <e231:key d4p1:nil="false">ValueHere</e231:key>
              <e231:value d4p1:nil="false">ValueHere</e231:value>
            </e231:KeyValuePairOfstringbase64Binary>
          </e228:TaxCertificates>
          <e228:Status d4p1:nil="false">ValueHere</e228:Status>
        </e228:TaxCertificate>
        <e228:AccountMode d4p1:nil="false">ValueHere</e228:AccountMode>
      </Account>
    </GetAccountResponse>
  </s:Body>
</s:Envelope>
```

## <a name="example"></a>Code Syntax
The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md). See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<GetAccountResponse> GetAccountAsync(
	long accountId,
	AccountAdditionalField? returnAdditionalFields)
{
	var request = new GetAccountRequest
	{
		AccountId = accountId,
		ReturnAdditionalFields = returnAdditionalFields
	};

	return (await CustomerManagementService.CallAsync((s, r) => s.GetAccountAsync(r), request));
}
```
```java
static GetAccountResponse getAccount(
	java.lang.Long accountId,
	ArrayList<AccountAdditionalField> returnAdditionalFields) throws RemoteException, Exception
{
	GetAccountRequest request = new GetAccountRequest();

	request.setAccountId(accountId);
	request.setReturnAdditionalFields(returnAdditionalFields);

	return CustomerManagementService.getService().getAccount(request);
}
```
```php
static function GetAccount(
	$accountId,
	$returnAdditionalFields)
{

	$GLOBALS['Proxy'] = $GLOBALS['CustomerManagementProxy'];

	$request = new GetAccountRequest();

	$request->AccountId = $accountId;
	$request->ReturnAdditionalFields = $returnAdditionalFields;

	return $GLOBALS['CustomerManagementProxy']->GetService()->GetAccount($request);
}
```
```python
response=customermanagement_service.GetAccount(
	AccountId=AccountId,
	ReturnAdditionalFields=ReturnAdditionalFields)
```

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13  

