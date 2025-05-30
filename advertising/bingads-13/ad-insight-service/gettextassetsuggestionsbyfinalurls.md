---
title: GetTextAssetSuggestionsByFinalUrls Service Operation - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
zone_pivot_groups: api-reference
description: Gets text asset suggestions by final URLs.
dev_langs: 
- csharp
- java
- php
- python
---
# GetTextAssetSuggestionsByFinalUrls Service Operation - Ad Insight
Gets text asset suggestions by final URLs. 

::: zone pivot="soap"

## <a name="request"></a>Request Elements
The *GetTextAssetSuggestionsByFinalUrlsRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request. The elements must be in the same order as shown in the [Request SOAP](#request-soap). 

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="finalurls"></a>FinalUrls|The last or final URL where a user is ultimately taken, whether or not the click to final URL path included any redirects.<br /><br />The maximum array limit of FinalUrls for each request is 5.|**string** array|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header.md)]

## <a name="response"></a>Response Elements
The *GetTextAssetSuggestionsByFinalUrlsResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response SOAP](#response-soap).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="partialerrors"></a>PartialErrors|An array [BatchError](batcherror.md) that contain details for any request items that were not successful. <br>The list of errors do not correspond directly to the list of items in the request. The list can be empty if there were no errors, or can include one or more error objects corresponding to each unsuccessful list item in the request.|[BatchError](batcherror.md) array|
|<a name="textassetsuggestions"></a>TextAssetSuggestions|The suggested string value to use for the text asset.|[TextAssetSuggestions](textassetsuggestions.md) array|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-soap"></a>Request SOAP
This template was generated by a tool to show the [order](../guides/services-protocol.md#element-order) of the [body](#request-body) and [header](#request-header) elements for the SOAP request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```xml
<s:Envelope xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
  <s:Header xmlns="https://bingads.microsoft.com/AdInsight/v13">
    <Action mustUnderstand="1">GetTextAssetSuggestionsByFinalUrls</Action>
    <AuthenticationToken i:nil="false">ValueHere</AuthenticationToken>
    <CustomerAccountId i:nil="false">ValueHere</CustomerAccountId>
    <CustomerId i:nil="false">ValueHere</CustomerId>
    <DeveloperToken i:nil="false">ValueHere</DeveloperToken>
  </s:Header>
  <s:Body>
    <GetTextAssetSuggestionsByFinalUrlsRequest xmlns="https://bingads.microsoft.com/AdInsight/v13">
      <FinalUrls i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
        <a1:string>ValueHere</a1:string>
      </FinalUrls>
    </GetTextAssetSuggestionsByFinalUrlsRequest>
  </s:Body>
</s:Envelope>
```

## <a name="response-soap"></a>Response SOAP
This template was generated by a tool to show the order of the [body](#response-body) and [header](#response-header) elements for the SOAP response.

```xml
<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
  <s:Header xmlns="https://bingads.microsoft.com/AdInsight/v13">
    <TrackingId d3p1:nil="false" xmlns:d3p1="http://www.w3.org/2001/XMLSchema-instance">ValueHere</TrackingId>
  </s:Header>
  <s:Body>
    <GetTextAssetSuggestionsByFinalUrlsResponse xmlns="https://bingads.microsoft.com/AdInsight/v13">
      <TextAssetSuggestions d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <TextAssetSuggestions>
          <FinalUrl d4p1:nil="false">ValueHere</FinalUrl>
          <TextAssets d4p1:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
            <a1:string>ValueHere</a1:string>
          </TextAssets>
        </TextAssetSuggestions>
      </TextAssetSuggestions>
      <PartialErrors d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <BatchError>
          <Code>ValueHere</Code>
          <Details d4p1:nil="false">ValueHere</Details>
          <ErrorCode d4p1:nil="false">ValueHere</ErrorCode>
          <Index>ValueHere</Index>
          <Message d4p1:nil="false">ValueHere</Message>
        </BatchError>
      </PartialErrors>
    </GetTextAssetSuggestionsByFinalUrlsResponse>
  </s:Body>
</s:Envelope>
```

## <a name="example"></a>Code Syntax
The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md). See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<GetTextAssetSuggestionsByFinalUrlsResponse> GetTextAssetSuggestionsByFinalUrlsAsync(
	IList<string> finalUrls)
{
	var request = new GetTextAssetSuggestionsByFinalUrlsRequest
	{
		FinalUrls = finalUrls
	};

	return (await AdInsightService.CallAsync((s, r) => s.GetTextAssetSuggestionsByFinalUrlsAsync(r), request));
}
```
```java
static GetTextAssetSuggestionsByFinalUrlsResponse getTextAssetSuggestionsByFinalUrls(
	ArrayOfstring finalUrls) throws RemoteException, Exception
{
	GetTextAssetSuggestionsByFinalUrlsRequest request = new GetTextAssetSuggestionsByFinalUrlsRequest();

	request.setFinalUrls(finalUrls);

	return AdInsightService.getService().getTextAssetSuggestionsByFinalUrls(request);
}
```
```php
static function GetTextAssetSuggestionsByFinalUrls(
	$finalUrls)
{

	$GLOBALS['Proxy'] = $GLOBALS['AdInsightProxy'];

	$request = new GetTextAssetSuggestionsByFinalUrlsRequest();

	$request->FinalUrls = $finalUrls;

	return $GLOBALS['AdInsightProxy']->GetService()->GetTextAssetSuggestionsByFinalUrls($request);
}
```
```python
response=adinsight_service.GetTextAssetSuggestionsByFinalUrls(
	FinalUrls=FinalUrls)
```

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

::: zone-end

::: zone pivot="rest"

## <a name="url"></a>Request Url

# [Production URL](#tab/prod)

```POST
https://adinsight.api.bingads.microsoft.com/AdInsight/v13/TextAssetSuggestions/QueryByFinalUrls
```

# [Sandbox URL](#tab/sandbox)

```POST
https://adinsight.api.sandbox.bingads.microsoft.com/AdInsight/v13/TextAssetSuggestions/QueryByFinalUrls
```

-----

## <a name="request"></a>Request Elements
The *GetTextAssetSuggestionsByFinalUrlsRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request.

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="finalurls"></a>FinalUrls|The last or final URL where a user is ultimately taken, whether or not the click to final URL path included any redirects.<br /><br />The maximum array limit of FinalUrls for each request is 5.|**string** array|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header-rest.md)]

## <a name="response"></a>Response Elements
The *GetTextAssetSuggestionsByFinalUrlsResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response JSON](#response-json).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="partialerrors"></a>PartialErrors|An array [BatchError](batcherror.md) that contain details for any request items that were not successful. <br>The list of errors do not correspond directly to the list of items in the request. The list can be empty if there were no errors, or can include one or more error objects corresponding to each unsuccessful list item in the request.|[BatchError](batcherror.md) array|
|<a name="textassetsuggestions"></a>TextAssetSuggestions|The suggested string value to use for the text asset.|[TextAssetSuggestions](textassetsuggestions.md) array|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-json"></a>Request JSON
This template was generated by a tool to show the [body](#request-body) and [header](#request-header) elements for the JSON request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```json
{
  "FinalUrls": [
    "ValueHere"
  ]
}
```

## <a name="response-json"></a>Response JSON
This template was generated by a tool to show the [body](#response-body) and [header](#response-header) elements for the JSON response.

```json
{
  "TextAssetSuggestions": [
    {
      "FinalUrl": "ValueHere",
      "TextAssets": [
        "ValueHere"
      ]
    }
  ],
  "PartialErrors": [
    {
      "Code": IntValueHere,
      "Details": "ValueHere",
      "ErrorCode": "ValueHere",
      "Index": IntValueHere,
      "Message": "ValueHere"
    }
  ]
}
```

## <a name="example"></a>Code Syntax
To call REST API through SDKs, you need to upgrade SDK to a certain version and configure the system parameters.The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md).
See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<GetTextAssetSuggestionsByFinalUrlsResponse> GetTextAssetSuggestionsByFinalUrlsAsync(
	IList<string> finalUrls)
{
	var request = new GetTextAssetSuggestionsByFinalUrlsRequest
	{
		FinalUrls = finalUrls
	};

	return (await AdInsightService.CallAsync((s, r) => s.GetTextAssetSuggestionsByFinalUrlsAsync(r), request));
}
```
```java
static GetTextAssetSuggestionsByFinalUrlsResponse getTextAssetSuggestionsByFinalUrls(
	ArrayOfstring finalUrls) throws RemoteException, Exception
{
	GetTextAssetSuggestionsByFinalUrlsRequest request = new GetTextAssetSuggestionsByFinalUrlsRequest();

	request.setFinalUrls(finalUrls);

	return AdInsightService.getService().getTextAssetSuggestionsByFinalUrls(request);
}
```
```php
static function GetTextAssetSuggestionsByFinalUrls(
	$finalUrls)
{

	$GLOBALS['Proxy'] = $GLOBALS['AdInsightProxy'];

	$request = new GetTextAssetSuggestionsByFinalUrlsRequest();

	$request->FinalUrls = $finalUrls;

	return $GLOBALS['AdInsightProxy']->GetService()->GetTextAssetSuggestionsByFinalUrls($request);
}
```
```python
response=adinsight_service.GetTextAssetSuggestionsByFinalUrls(
	FinalUrls=FinalUrls)
```

::: zone-end
