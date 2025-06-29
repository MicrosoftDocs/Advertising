---
title: GetUsersInfo Service Operation - Customer Management
ms.service: bing-ads
ms.subservice: customer-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
zone_pivot_groups: api-reference
description: Gets a list of objects that contains user identification information, for example the user name and identifier of the user.
dev_langs: 
- csharp
- java
- php
- python
---
# GetUsersInfo Service Operation - Customer Management
Gets a list of objects that contains user identification information, for example the user name and identifier of the user.

::: zone pivot="soap"

## <a name="request"></a>Request Elements
The *GetUsersInfoRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request. The elements must be in the same order as shown in the [Request SOAP](#request-soap). 

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="customerid"></a>CustomerId|The identifier of the customer to which the users belong.|**long**|
|<a name="statusfilter"></a>StatusFilter|The status value that the operation uses to filter the list of users that it returns. The operation returns only those users with the specified status.|[UserLifeCycleStatus](userlifecyclestatus.md)|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header.md)]

## <a name="response"></a>Response Elements
The *GetUsersInfoResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response SOAP](#response-soap).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="usersinfo"></a>UsersInfo|A list of *UserInfo* objects that identifies the list of users who meet the filter criteria.<br/><br/>To get the user data for a user in the list, access the *Id* element of the *UserInfo* object and use it to call [GetUser](getuser.md).|[UserInfo](userinfo.md) array|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-soap"></a>Request SOAP
This template was generated by a tool to show the [order](../guides/services-protocol.md#element-order) of the [body](#request-body) and [header](#request-header) elements for the SOAP request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```xml
<s:Envelope xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
  <s:Header xmlns="https://bingads.microsoft.com/Customer/v13">
    <Action mustUnderstand="1">GetUsersInfo</Action>
    <AuthenticationToken i:nil="false">ValueHere</AuthenticationToken>
    <DeveloperToken i:nil="false">ValueHere</DeveloperToken>
  </s:Header>
  <s:Body>
    <GetUsersInfoRequest xmlns="https://bingads.microsoft.com/Customer/v13">
      <CustomerId>ValueHere</CustomerId>
      <StatusFilter i:nil="false">ValueHere</StatusFilter>
    </GetUsersInfoRequest>
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
    <GetUsersInfoResponse xmlns="https://bingads.microsoft.com/Customer/v13">
      <UsersInfo xmlns:e533="https://bingads.microsoft.com/Customer/v13/Entities" d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <e533:UserInfo>
          <e533:Id>ValueHere</e533:Id>
          <e533:UserName d4p1:nil="false">ValueHere</e533:UserName>
        </e533:UserInfo>
      </UsersInfo>
    </GetUsersInfoResponse>
  </s:Body>
</s:Envelope>
```

## <a name="example"></a>Code Syntax
The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md). See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<GetUsersInfoResponse> GetUsersInfoAsync(
	long customerId,
	UserLifeCycleStatus? statusFilter)
{
	var request = new GetUsersInfoRequest
	{
		CustomerId = customerId,
		StatusFilter = statusFilter
	};

	return (await CustomerManagementService.CallAsync((s, r) => s.GetUsersInfoAsync(r), request));
}
```
```java
static GetUsersInfoResponse getUsersInfo(
	java.lang.Long customerId,
	UserLifeCycleStatus statusFilter) throws RemoteException, Exception
{
	GetUsersInfoRequest request = new GetUsersInfoRequest();

	request.setCustomerId(customerId);
	request.setStatusFilter(statusFilter);

	return CustomerManagementService.getService().getUsersInfo(request);
}
```
```php
static function GetUsersInfo(
	$customerId,
	$statusFilter)
{

	$GLOBALS['Proxy'] = $GLOBALS['CustomerManagementProxy'];

	$request = new GetUsersInfoRequest();

	$request->CustomerId = $customerId;
	$request->StatusFilter = $statusFilter;

	return $GLOBALS['CustomerManagementProxy']->GetService()->GetUsersInfo($request);
}
```
```python
response=customermanagement_service.GetUsersInfo(
	CustomerId=CustomerId,
	StatusFilter=StatusFilter)
```

## Requirements
Service: [CustomerManagementService.svc v13](https://clientcenter.api.bingads.microsoft.com/Api/CustomerManagement/v13/CustomerManagementService.svc)  
Namespace: https\://bingads.microsoft.com/Customer/v13  

::: zone-end

::: zone pivot="rest"

## <a name="url"></a>Request Url

# [Production URL](#tab/prod)

```POST
https://clientcenter.api.bingads.microsoft.com/CustomerManagement/v13/UsersInfo/Query
```

# [Sandbox URL](#tab/sandbox)

```POST
https://clientcenter.api.sandbox.bingads.microsoft.com/CustomerManagement/v13/UsersInfo/Query
```

-----

## <a name="request"></a>Request Elements
The *GetUsersInfoRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request.

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="customerid"></a>CustomerId|The identifier of the customer to which the users belong.|**long**|
|<a name="statusfilter"></a>StatusFilter|The status value that the operation uses to filter the list of users that it returns. The operation returns only those users with the specified status.|[UserLifeCycleStatus](userlifecyclestatus.md)|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header-rest.md)]

## <a name="response"></a>Response Elements
The *GetUsersInfoResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response JSON](#response-json).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="usersinfo"></a>UsersInfo|A list of *UserInfo* objects that identifies the list of users who meet the filter criteria.<br/><br/>To get the user data for a user in the list, access the *Id* element of the *UserInfo* object and use it to call [GetUser](getuser.md).|[UserInfo](userinfo.md) array|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-json"></a>Request JSON
This template was generated by a tool to show the [body](#request-body) and [header](#request-header) elements for the JSON request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```json
{
  "CustomerId": "LongValueHere",
  "StatusFilter": "ValueHere"
}
```

## <a name="response-json"></a>Response JSON
This template was generated by a tool to show the [body](#response-body) and [header](#response-header) elements for the JSON response.

```json
{
  "UsersInfo": [
    {
      "Id": "LongValueHere",
      "UserName": "ValueHere"
    }
  ]
}
```

## <a name="example"></a>Code Syntax
To call REST API through SDKs, you need to upgrade SDK to a certain version and configure the system parameters.The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md).
See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<GetUsersInfoResponse> GetUsersInfoAsync(
	long customerId,
	UserLifeCycleStatus? statusFilter)
{
	var request = new GetUsersInfoRequest
	{
		CustomerId = customerId,
		StatusFilter = statusFilter
	};

	return (await CustomerManagementService.CallAsync((s, r) => s.GetUsersInfoAsync(r), request));
}
```
```java
static GetUsersInfoResponse getUsersInfo(
	java.lang.Long customerId,
	UserLifeCycleStatus statusFilter) throws RemoteException, Exception
{
	GetUsersInfoRequest request = new GetUsersInfoRequest();

	request.setCustomerId(customerId);
	request.setStatusFilter(statusFilter);

	return CustomerManagementService.getService().getUsersInfo(request);
}
```
```php
static function GetUsersInfo(
	$customerId,
	$statusFilter)
{

	$GLOBALS['Proxy'] = $GLOBALS['CustomerManagementProxy'];

	$request = new GetUsersInfoRequest();

	$request->CustomerId = $customerId;
	$request->StatusFilter = $statusFilter;

	return $GLOBALS['CustomerManagementProxy']->GetService()->GetUsersInfo($request);
}
```
```python
response=customermanagement_service.GetUsersInfo(
	CustomerId=CustomerId,
	StatusFilter=StatusFilter)
```

::: zone-end
