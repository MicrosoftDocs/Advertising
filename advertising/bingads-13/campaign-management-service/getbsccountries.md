---
title: GetBSCCountries Service Operation - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
zone_pivot_groups: api-reference
description: Gets the list of supported sales country codes for Microsoft Shopping Campaigns.
dev_langs: 
- csharp
- java
- php
- python
---
# GetBSCCountries Service Operation - Campaign Management
Gets the list of supported sales country codes for Microsoft Shopping Campaigns.

::: zone pivot="soap"

## <a name="request"></a>Request Elements
The *GetBSCCountriesRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request. The elements must be in the same order as shown in the [Request SOAP](#request-soap). 

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements
There are not any elements in the operation's request body.

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header.md)]

## <a name="response"></a>Response Elements
The *GetBSCCountriesResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response SOAP](#response-soap).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="countrycodes"></a>CountryCodes|The list of supported sales country codes for Microsoft Shopping Campaigns.<br/><br/>For example, supported country codes include AD (Andorra), AL (Albania), AR (Argentina), AW (Aruba), AT (Austria), AU (Australia), BS (Bahamas), BD (Bangladesh), BA (Bosnia and Herzegovina), BE (Belgium), BO (Bolivia), BG (Bulgaria), BR (Brazil), BN (Brunei), CA (Canada), KY (Cayman Islands), CH (Switzerland), CL (Chile), CO (Colombia), CR (Costa Rica), CY (Cyprus), CZ (Czech Republic), DE (Germany), DK (Denmark), DM (Dominica), DO (Dominican Republic), EC (Ecuador), SV (El Salvador), EE (Estonia), ES (Spain), FJ (Fiji), FI (Finland), FR (France), GF (French Guiana), PF (French Polynesia), GB (Great Britain), GR (Greece), GU (Guam), GT (Guatemala), GY (Guyana), HT (Haiti), HN (Honduras), HR (Croatia), HU (Hungary),ID (Indonesia), IE (Ireland), IN (India), IS (Iceland), IT (Italy), LI (Liechtenstein), LT (Lithuania), LU (Luxembourg), LV (Latvia), MV (Maldives), MC (Monaco), ME (Montenegro), MK (North Macedonia), MT (Malta), MQ (Martinique),MY (Malaysia), MX (Mexico), MN (Mongolia), MS (Montserrat), NP (Nepal), NL (Netherlands), NC (New Caledonia), NO (Norway), NZ (New Zealand), PA (Panama), PG (Papua New Guinea), PH (Philippines), PY (Paraguay), PE (Peru), PL (Poland), PT (Portugal), PR (Puerto Rico), RO (Romania), RS (Serbia), LK (Sri Lanka), SE (Sweden), SG (Singapore), SI (Slovenia), SK (Slovakia), SM (San Marino), TH (Thailand), TT (Trinidad and Tobago), TR (Turkey), US (United States), UT (Uruguay), VA (Vatican City), VE (Venezuela),VN (Vietnam), ZA (South Africa). You can pass any one of the returned values in the [SalesCountryCode](shoppingsetting.md#salescountrycode) element of a [ShoppingSetting](shoppingsetting.md) object.|**string** array|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-soap"></a>Request SOAP
This template was generated by a tool to show the [order](../guides/services-protocol.md#element-order) of the [body](#request-body) and [header](#request-header) elements for the SOAP request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```xml
<s:Envelope xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
  <s:Header xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
    <Action mustUnderstand="1">GetBSCCountries</Action>
    <AuthenticationToken i:nil="false">ValueHere</AuthenticationToken>
    <CustomerAccountId i:nil="false">ValueHere</CustomerAccountId>
    <CustomerId i:nil="false">ValueHere</CustomerId>
    <DeveloperToken i:nil="false">ValueHere</DeveloperToken>
  </s:Header>
  <s:Body>
    <GetBSCCountriesRequest xmlns="https://bingads.microsoft.com/CampaignManagement/v13" />
  </s:Body>
</s:Envelope>
```

## <a name="response-soap"></a>Response SOAP
This template was generated by a tool to show the order of the [body](#response-body) and [header](#response-header) elements for the SOAP response.

```xml
<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
  <s:Header xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
    <TrackingId d3p1:nil="false" xmlns:d3p1="http://www.w3.org/2001/XMLSchema-instance">ValueHere</TrackingId>
  </s:Header>
  <s:Body>
    <GetBSCCountriesResponse xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
      <CountryCodes d4p1:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <a1:string>ValueHere</a1:string>
      </CountryCodes>
    </GetBSCCountriesResponse>
  </s:Body>
</s:Envelope>
```

## <a name="example"></a>Code Syntax
The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md). See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<GetBSCCountriesResponse> GetBSCCountriesAsync()
{
	var request = new GetBSCCountriesRequest
	{
	};

	return (await CampaignManagementService.CallAsync((s, r) => s.GetBSCCountriesAsync(r), request));
}
```
```java
static GetBSCCountriesResponse getBSCCountries() throws RemoteException, Exception
{
	GetBSCCountriesRequest request = new GetBSCCountriesRequest();


	return CampaignManagementService.getService().getBSCCountries(request);
}
```
```php
static function GetBSCCountries()
{

	$GLOBALS['Proxy'] = $GLOBALS['CampaignManagementProxy'];

	$request = new GetBSCCountriesRequest();


	return $GLOBALS['CampaignManagementProxy']->GetService()->GetBSCCountries($request);
}
```
```python
response=campaignmanagement_service.GetBSCCountries()
```

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

::: zone-end

::: zone pivot="rest"

## <a name="url"></a>Request Url

# [Production URL](#tab/prod)

```POST
https://campaign.api.bingads.microsoft.com/CampaignManagement/v13/BSCCountries/Query
```

# [Sandbox URL](#tab/sandbox)

```POST
https://campaign.api.sandbox.bingads.microsoft.com/CampaignManagement/v13/BSCCountries/Query
```

-----

## <a name="request"></a>Request Elements
The *GetBSCCountriesRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request.

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements
There are not any elements in the operation's request body.

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header-rest.md)]

## <a name="response"></a>Response Elements
The *GetBSCCountriesResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response JSON](#response-json).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="countrycodes"></a>CountryCodes|The list of supported sales country codes for Microsoft Shopping Campaigns.<br/><br/>For example, supported country codes include AD (Andorra), AL (Albania), AR (Argentina), AW (Aruba), AT (Austria), AU (Australia), BS (Bahamas), BD (Bangladesh), BA (Bosnia and Herzegovina), BE (Belgium), BO (Bolivia), BG (Bulgaria), BR (Brazil), BN (Brunei), CA (Canada), KY (Cayman Islands), CH (Switzerland), CL (Chile), CO (Colombia), CR (Costa Rica), CY (Cyprus), CZ (Czech Republic), DE (Germany), DK (Denmark), DM (Dominica), DO (Dominican Republic), EC (Ecuador), SV (El Salvador), EE (Estonia), ES (Spain), FJ (Fiji), FI (Finland), FR (France), GF (French Guiana), PF (French Polynesia), GB (Great Britain), GR (Greece), GU (Guam), GT (Guatemala), GY (Guyana), HT (Haiti), HN (Honduras), HR (Croatia), HU (Hungary),ID (Indonesia), IE (Ireland), IN (India), IS (Iceland), IT (Italy), LI (Liechtenstein), LT (Lithuania), LU (Luxembourg), LV (Latvia), MV (Maldives), MC (Monaco), ME (Montenegro), MK (North Macedonia), MT (Malta), MQ (Martinique),MY (Malaysia), MX (Mexico), MN (Mongolia), MS (Montserrat), NP (Nepal), NL (Netherlands), NC (New Caledonia), NO (Norway), NZ (New Zealand), PA (Panama), PG (Papua New Guinea), PH (Philippines), PY (Paraguay), PE (Peru), PL (Poland), PT (Portugal), PR (Puerto Rico), RO (Romania), RS (Serbia), LK (Sri Lanka), SE (Sweden), SG (Singapore), SI (Slovenia), SK (Slovakia), SM (San Marino), TH (Thailand), TT (Trinidad and Tobago), TR (Turkey), US (United States), UT (Uruguay), VA (Vatican City), VE (Venezuela),VN (Vietnam), ZA (South Africa). You can pass any one of the returned values in the [SalesCountryCode](shoppingsetting.md#salescountrycode) element of a [ShoppingSetting](shoppingsetting.md) object.|**string** array|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-json"></a>Request JSON
This template was generated by a tool to show the [body](#request-body) and [header](#request-header) elements for the JSON request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```json
{}
```

## <a name="response-json"></a>Response JSON
This template was generated by a tool to show the [body](#response-body) and [header](#response-header) elements for the JSON response.

```json
{
  "CountryCodes": [
    "ValueHere"
  ]
}
```

## <a name="example"></a>Code Syntax
To call REST API through SDKs, you need to upgrade SDK to a certain version and configure the system parameters.The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md).
See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<GetBSCCountriesResponse> GetBSCCountriesAsync()
{
	var request = new GetBSCCountriesRequest
	{
	};

	return (await CampaignManagementService.CallAsync((s, r) => s.GetBSCCountriesAsync(r), request));
}
```
```java
static GetBSCCountriesResponse getBSCCountries() throws RemoteException, Exception
{
	GetBSCCountriesRequest request = new GetBSCCountriesRequest();


	return CampaignManagementService.getService().getBSCCountries(request);
}
```
```php
static function GetBSCCountries()
{

	$GLOBALS['Proxy'] = $GLOBALS['CampaignManagementProxy'];

	$request = new GetBSCCountriesRequest();


	return $GLOBALS['CampaignManagementProxy']->GetService()->GetBSCCountries($request);
}
```
```python
response=campaignmanagement_service.GetBSCCountries()
```

::: zone-end
