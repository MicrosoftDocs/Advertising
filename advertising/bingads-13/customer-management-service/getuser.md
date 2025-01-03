---
title: GetUser Service Operation - Customer Management
ms.service: bing-ads
ms.subservice: customer-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
zone_pivot_groups: api-reference
description: Gets the details of a user.
dev_langs: 
- csharp
- java
- php
- python
---
# GetUser Service Operation - Customer Management
Gets the details of a user. 

> [!TIP]
> Please see the [Account Hierchy and User Permissions](../guides/account-hierarchy-permissions.md) guide for an overview with examples. 

::: zone pivot="soap"

## <a name="request"></a>Request Elements
The *GetUserRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request. The elements must be in the same order as shown in the [Request SOAP](#request-soap). 

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="userid"></a>UserId|The identifier of the user to get.<br/><br/>If this element is null or not provided, the response will include details for the authenticated user specified in the request header.|**long**|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header.md)]

## <a name="response"></a>Response Elements
The *GetUserResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response SOAP](#response-soap).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="customerroles"></a>CustomerRoles|The list of roles that a user has for each customer or list of accounts.<br/><br/>At minimum one list item will be returned. If a user's credentials can access multiple customers, then one [CustomerRole](customerrole.md) object per customer will be returned.<br/><br/>You can view all of your own roles across all customers; however, you will only see the roles of other users as it pertains to customers that you can access. For example let's say you@contoso.com and another-user@contoso.com can access Customer A. The other user might also have access to Customer B and C; however when you call this operation with their user identifier, you will only see their role under Customer A. When another-user@contoso.com calls this operation with their own credentials, the operation would return three [CustomerRole](customerrole.md) objects.|[CustomerRole](customerrole.md) array|
|<a name="user"></a>User|A user object that contains information about the user.|[User](user.md)|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-soap"></a>Request SOAP
This template was generated by a tool to show the [order](../guides/services-protocol.md#element-order) of the [body](#request-body) and [header](#request-header) elements for the SOAP request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```xml
<s:Envelope xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
  <s:Header xmlns="https://bingads.microsoft.com/Customer/v13">
    <Action mustUnderstand="1">GetUser</Action>
    <AuthenticationToken i:nil="false">ValueHere</AuthenticationToken>
    <DeveloperToken i:nil="false">ValueHere</DeveloperToken>
  </s:Header>
  <s:Body>
    <GetUserRequest xmlns="https://bingads.microsoft.com/Customer/v13">
      <UserId i:nil="false">ValueHere</UserId>
    </GetUserRequest>
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
    <GetUserResponse xmlns="https://bingads.microsoft.com/Customer/v13">
      <User xmlns:e45="https://bingads.microsoft.com/Customer/v13/Entities" d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <e45:ContactInfo d4p1:nil="false">
          <e45:Address d4p1:nil="false">
            <e45:City d4p1:nil="false">ValueHere</e45:City>
            <e45:CountryCode d4p1:nil="false">ValueHere</e45:CountryCode>
            <e45:Id d4p1:nil="false">ValueHere</e45:Id>
            <e45:Line1 d4p1:nil="false">ValueHere</e45:Line1>
            <e45:Line2 d4p1:nil="false">ValueHere</e45:Line2>
            <e45:Line3 d4p1:nil="false">ValueHere</e45:Line3>
            <e45:Line4 d4p1:nil="false">ValueHere</e45:Line4>
            <e45:PostalCode d4p1:nil="false">ValueHere</e45:PostalCode>
            <e45:StateOrProvince d4p1:nil="false">ValueHere</e45:StateOrProvince>
            <e45:TimeStamp d4p1:nil="false">ValueHere</e45:TimeStamp>
            <e45:BusinessName d4p1:nil="false">ValueHere</e45:BusinessName>
          </e45:Address>
          <e45:ContactByPhone d4p1:nil="false">ValueHere</e45:ContactByPhone>
          <e45:ContactByPostalMail d4p1:nil="false">ValueHere</e45:ContactByPostalMail>
          <e45:Email d4p1:nil="false">ValueHere</e45:Email>
          <e45:EmailFormat d4p1:nil="false">ValueHere</e45:EmailFormat>
          <e45:Fax d4p1:nil="false">ValueHere</e45:Fax>
          <e45:HomePhone d4p1:nil="false">ValueHere</e45:HomePhone>
          <e45:Id d4p1:nil="false">ValueHere</e45:Id>
          <e45:Mobile d4p1:nil="false">ValueHere</e45:Mobile>
          <e45:Phone1 d4p1:nil="false">ValueHere</e45:Phone1>
          <e45:Phone2 d4p1:nil="false">ValueHere</e45:Phone2>
        </e45:ContactInfo>
        <e45:CustomerId d4p1:nil="false">ValueHere</e45:CustomerId>
        <e45:Id d4p1:nil="false">ValueHere</e45:Id>
        <e45:JobTitle d4p1:nil="false">ValueHere</e45:JobTitle>
        <e45:LastModifiedByUserId d4p1:nil="false">ValueHere</e45:LastModifiedByUserId>
        <e45:LastModifiedTime d4p1:nil="false">ValueHere</e45:LastModifiedTime>
        <e45:Lcid d4p1:nil="false">ValueHere</e45:Lcid>
        <e45:Name d4p1:nil="false">
          <e45:FirstName d4p1:nil="false">ValueHere</e45:FirstName>
          <e45:LastName d4p1:nil="false">ValueHere</e45:LastName>
          <e45:MiddleInitial d4p1:nil="false">ValueHere</e45:MiddleInitial>
        </e45:Name>
        <e45:Password d4p1:nil="false">ValueHere</e45:Password>
        <e45:SecretAnswer d4p1:nil="false">ValueHere</e45:SecretAnswer>
        <e45:SecretQuestion>ValueHere</e45:SecretQuestion>
        <e45:UserLifeCycleStatus d4p1:nil="false">ValueHere</e45:UserLifeCycleStatus>
        <e45:TimeStamp d4p1:nil="false">ValueHere</e45:TimeStamp>
        <e45:UserName d4p1:nil="false">ValueHere</e45:UserName>
        <e45:ForwardCompatibilityMap xmlns:e46="http://schemas.datacontract.org/2004/07/System.Collections.Generic" d4p1:nil="false">
          <e46:KeyValuePairOfstringstring>
            <e46:key d4p1:nil="false">ValueHere</e46:key>
            <e46:value d4p1:nil="false">ValueHere</e46:value>
          </e46:KeyValuePairOfstringstring>
        </e45:ForwardCompatibilityMap>
        <e45:AuthenticationToken d4p1:nil="false">ValueHere</e45:AuthenticationToken>
      </User>
      <CustomerRoles xmlns:e47="https://bingads.microsoft.com/Customer/v13/Entities" d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <e47:CustomerRole>
          <e47:RoleId>ValueHere</e47:RoleId>
          <e47:CustomerId>ValueHere</e47:CustomerId>
          <e47:AccountIds d4p1:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
            <a1:long>ValueHere</a1:long>
          </e47:AccountIds>
          <e47:LinkedAccountIds d4p1:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
            <a1:long>ValueHere</a1:long>
          </e47:LinkedAccountIds>
          <e47:CustomerLinkPermission d4p1:nil="false">ValueHere</e47:CustomerLinkPermission>
        </e47:CustomerRole>
      </CustomerRoles>
    </GetUserResponse>
  </s:Body>
</s:Envelope>
```

## <a name="example"></a>Code Syntax
The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md). See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<GetUserResponse> GetUserAsync(
	long? userId)
{
	var request = new GetUserRequest
	{
		UserId = userId
	};

	return (await CustomerManagementService.CallAsync((s, r) => s.GetUserAsync(r), request));
}
```
```java
static GetUserResponse getUser(
	java.lang.Long userId) throws RemoteException, Exception
{
	GetUserRequest request = new GetUserRequest();

	request.setUserId(userId);

	return CustomerManagementService.getService().getUser(request);
}
```
```php
static function GetUser(
	$userId)
{

	$GLOBALS['Proxy'] = $GLOBALS['CustomerManagementProxy'];

	$request = new GetUserRequest();

	$request->UserId = $userId;

	return $GLOBALS['CustomerManagementProxy']->GetService()->GetUser($request);
}
```
```python
response=customermanagement_service.GetUser(
	UserId=UserId)
```

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13  

::: zone-end

::: zone pivot="rest"

## <a name="url"></a>Request Url

# [Production URL](#tab/prod)

```POST
https://clientcenter.api.bingads.microsoft.com/CustomerManagement/v13/User/Query
```

# [Sandbox URL](#tab/sandbox)

```POST
https://clientcenter.api.sandbox.bingads.microsoft.com/CustomerManagement/v13/User/Query
```

-----

## <a name="request"></a>Request Elements
The *GetUserRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request.

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="userid"></a>UserId|The identifier of the user to get.<br/><br/>If this element is null or not provided, the response will include details for the authenticated user specified in the request header.|**long**|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header-rest.md)]

## <a name="response"></a>Response Elements
The *GetUserResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response JSON](#response-json).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="customerroles"></a>CustomerRoles|The list of roles that a user has for each customer or list of accounts.<br/><br/>At minimum one list item will be returned. If a user's credentials can access multiple customers, then one [CustomerRole](customerrole.md) object per customer will be returned.<br/><br/>You can view all of your own roles across all customers; however, you will only see the roles of other users as it pertains to customers that you can access. For example let's say you@contoso.com and another-user@contoso.com can access Customer A. The other user might also have access to Customer B and C; however when you call this operation with their user identifier, you will only see their role under Customer A. When another-user@contoso.com calls this operation with their own credentials, the operation would return three [CustomerRole](customerrole.md) objects.|[CustomerRole](customerrole.md) array|
|<a name="user"></a>User|A user object that contains information about the user.|[User](user.md)|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-json"></a>Request JSON
This template was generated by a tool to show the [body](#request-body) and [header](#request-header) elements for the JSON request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```json
{
  "UserId": "LongValueHere"
}
```

## <a name="response-json"></a>Response JSON
This template was generated by a tool to show the [body](#response-body) and [header](#response-header) elements for the JSON response.

```json
{
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
  },
  "CustomerRoles": [
    {
      "AccountIds": [
        "LongValueHere"
      ],
      "CustomerId": "LongValueHere",
      "CustomerLinkPermission": "ValueHere",
      "LinkedAccountIds": [
        "LongValueHere"
      ],
      "RoleId": IntValueHere
    }
  ]
}
```

## <a name="example"></a>Code Syntax
To call REST API through SDKs, you need to upgrade SDK to a certain version and configure the system parameters.The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md).
See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<GetUserResponse> GetUserAsync(
	long? userId)
{
	var request = new GetUserRequest
	{
		UserId = userId
	};

	return (await CustomerManagementService.CallAsync((s, r) => s.GetUserAsync(r), request));
}
```
```java
static GetUserResponse getUser(
	java.lang.Long userId) throws RemoteException, Exception
{
	GetUserRequest request = new GetUserRequest();

	request.setUserId(userId);

	return CustomerManagementService.getService().getUser(request);
}
```
```php
static function GetUser(
	$userId)
{

	$GLOBALS['Proxy'] = $GLOBALS['CustomerManagementProxy'];

	$request = new GetUserRequest();

	$request->UserId = $userId;

	return $GLOBALS['CustomerManagementProxy']->GetService()->GetUser($request);
}
```
```python
response=customermanagement_service.GetUser(
	UserId=UserId)
```

::: zone-end
