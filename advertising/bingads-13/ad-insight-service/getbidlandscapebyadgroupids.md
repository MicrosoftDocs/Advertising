---
title: GetBidLandscapeByAdGroupIds Service Operation - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
zone_pivot_groups: api-reference
description: Given a list of existing ad groups, this operation returns for each a list of suggested bids and estimated performance statistics.
dev_langs: 
- csharp
- java
- php
- python
---
# GetBidLandscapeByAdGroupIds Service Operation - Ad Insight
Given a list of existing ad groups, this operation returns for each a list of suggested bids and estimated performance statistics. You can use the landscape view of multiple bid points with estimated traffic for the same ad group to help make decisions about how to adjust your ad group level default bid to optimize for clicks, impressions, and cost. For example you might use the resulting data to visualize a clicks to cost curve or a bid to impressions curve. 

The estimates are based on the last 7 days of performance data, and not a prediction or guarantee of future performance.

> [!NOTE]
> This operation is for search campaigns using the enhanced CPC bid strategy.  

::: zone pivot="soap"

## <a name="request"></a>Request Elements
The *GetBidLandscapeByAdGroupIdsRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request. The elements must be in the same order as shown in the [Request SOAP](#request-soap). 

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="adgroupbidlandscapeinputs"></a>AdGroupBidLandscapeInputs|An array of ad group identifiers with corresponding bid landscape type input. A list of suggested bid values with estimated performance statistics will be returned for each input.<br/><br/>You may specify a maximum of 1,000 input elements.|[AdGroupBidLandscapeInput](adgroupbidlandscapeinput.md) array|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header.md)]

## <a name="response"></a>Response Elements
The *GetBidLandscapeByAdGroupIdsResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response SOAP](#response-soap).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="bidlandscape"></a>BidLandscape|An array of *AdGroupBidLandscape* objects. The array contains a *AdGroupBidLandscape* corresponding to each ad group and bid landscape type input specified in the request.  Duplicate input are allowed in the same call and will return the same results.<br/><br/>If the specified input is invalid or has no associated data results, all elements within the *AdGroupBidLandscape* will be nil except the *AdGroupId* which reflects the ad group identifier specified in the request.<br/><br/>If there is data available for the ad group, the *AdGroupBidLandscape* object will provide a list of suggested bids and estimated performance statistics.|[AdGroupBidLandscape](adgroupbidlandscape.md) array|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-soap"></a>Request SOAP
This template was generated by a tool to show the [order](../guides/services-protocol.md#element-order) of the [body](#request-body) and [header](#request-header) elements for the SOAP request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```xml
<s:Envelope xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
  <s:Header xmlns="https://bingads.microsoft.com/AdInsight/v13">
    <Action mustUnderstand="1">GetBidLandscapeByAdGroupIds</Action>
    <AuthenticationToken i:nil="false">ValueHere</AuthenticationToken>
    <CustomerAccountId i:nil="false">ValueHere</CustomerAccountId>
    <CustomerId i:nil="false">ValueHere</CustomerId>
    <DeveloperToken i:nil="false">ValueHere</DeveloperToken>
  </s:Header>
  <s:Body>
    <GetBidLandscapeByAdGroupIdsRequest xmlns="https://bingads.microsoft.com/AdInsight/v13">
      <AdGroupBidLandscapeInputs i:nil="false">
        <AdGroupBidLandscapeInput>
          <AdGroupBidLandscapeType>ValueHere</AdGroupBidLandscapeType>
          <AdGroupId>ValueHere</AdGroupId>
        </AdGroupBidLandscapeInput>
      </AdGroupBidLandscapeInputs>
    </GetBidLandscapeByAdGroupIdsRequest>
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
    <GetBidLandscapeByAdGroupIdsResponse xmlns="https://bingads.microsoft.com/AdInsight/v13">
      <BidLandscape d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <AdGroupBidLandscape>
          <AdGroupId>ValueHere</AdGroupId>
          <AdGroupBidLandscapeType>ValueHere</AdGroupBidLandscapeType>
          <StartDate d4p1:nil="false">
            <Day>ValueHere</Day>
            <Month>ValueHere</Month>
            <Year>ValueHere</Year>
          </StartDate>
          <EndDate d4p1:nil="false">
            <Day>ValueHere</Day>
            <Month>ValueHere</Month>
            <Year>ValueHere</Year>
          </EndDate>
          <BidLandscapePoints d4p1:nil="false">
            <BidLandscapePoint>
              <Bid>ValueHere</Bid>
              <Clicks d4p1:nil="false">ValueHere</Clicks>
              <Impressions>ValueHere</Impressions>
              <TopImpressions d4p1:nil="false">ValueHere</TopImpressions>
              <CurrencyCode>ValueHere</CurrencyCode>
              <Cost d4p1:nil="false">ValueHere</Cost>
              <MarginalCPC d4p1:nil="false">ValueHere</MarginalCPC>
            </BidLandscapePoint>
          </BidLandscapePoints>
        </AdGroupBidLandscape>
      </BidLandscape>
    </GetBidLandscapeByAdGroupIdsResponse>
  </s:Body>
</s:Envelope>
```

## <a name="example"></a>Code Syntax
The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md). See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<GetBidLandscapeByAdGroupIdsResponse> GetBidLandscapeByAdGroupIdsAsync(
	IList<AdGroupBidLandscapeInput> adGroupBidLandscapeInputs)
{
	var request = new GetBidLandscapeByAdGroupIdsRequest
	{
		AdGroupBidLandscapeInputs = adGroupBidLandscapeInputs
	};

	return (await AdInsightService.CallAsync((s, r) => s.GetBidLandscapeByAdGroupIdsAsync(r), request));
}
```
```java
static GetBidLandscapeByAdGroupIdsResponse getBidLandscapeByAdGroupIds(
	ArrayOfAdGroupBidLandscapeInput adGroupBidLandscapeInputs) throws RemoteException, Exception
{
	GetBidLandscapeByAdGroupIdsRequest request = new GetBidLandscapeByAdGroupIdsRequest();

	request.setAdGroupBidLandscapeInputs(adGroupBidLandscapeInputs);

	return AdInsightService.getService().getBidLandscapeByAdGroupIds(request);
}
```
```php
static function GetBidLandscapeByAdGroupIds(
	$adGroupBidLandscapeInputs)
{

	$GLOBALS['Proxy'] = $GLOBALS['AdInsightProxy'];

	$request = new GetBidLandscapeByAdGroupIdsRequest();

	$request->AdGroupBidLandscapeInputs = $adGroupBidLandscapeInputs;

	return $GLOBALS['AdInsightProxy']->GetService()->GetBidLandscapeByAdGroupIds($request);
}
```
```python
response=adinsight_service.GetBidLandscapeByAdGroupIds(
	AdGroupBidLandscapeInputs=AdGroupBidLandscapeInputs)
```

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

::: zone-end

::: zone pivot="rest"

## <a name="url"></a>Request Url

# [Production URL](#tab/prod)

```POST
https://adinsight.api.bingads.microsoft.com/AdInsight/v13/BidLandscape/QueryByAdGroupIds
```

# [Sandbox URL](#tab/sandbox)

```POST
https://adinsight.api.sandbox.bingads.microsoft.com/AdInsight/v13/BidLandscape/QueryByAdGroupIds
```

-----

## <a name="request"></a>Request Elements
The *GetBidLandscapeByAdGroupIdsRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request.

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="adgroupbidlandscapeinputs"></a>AdGroupBidLandscapeInputs|An array of ad group identifiers with corresponding bid landscape type input. A list of suggested bid values with estimated performance statistics will be returned for each input.<br/><br/>You may specify a maximum of 1,000 input elements.|[AdGroupBidLandscapeInput](adgroupbidlandscapeinput.md) array|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header-rest.md)]

## <a name="response"></a>Response Elements
The *GetBidLandscapeByAdGroupIdsResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response JSON](#response-json).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="bidlandscape"></a>BidLandscape|An array of *AdGroupBidLandscape* objects. The array contains a *AdGroupBidLandscape* corresponding to each ad group and bid landscape type input specified in the request.  Duplicate input are allowed in the same call and will return the same results.<br/><br/>If the specified input is invalid or has no associated data results, all elements within the *AdGroupBidLandscape* will be nil except the *AdGroupId* which reflects the ad group identifier specified in the request.<br/><br/>If there is data available for the ad group, the *AdGroupBidLandscape* object will provide a list of suggested bids and estimated performance statistics.|[AdGroupBidLandscape](adgroupbidlandscape.md) array|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-json"></a>Request JSON
This template was generated by a tool to show the [body](#request-body) and [header](#request-header) elements for the JSON request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```json
{
  "AdGroupBidLandscapeInputs": [
    {
      "AdGroupBidLandscapeType": "ValueHere",
      "AdGroupId": "LongValueHere"
    }
  ]
}
```

## <a name="response-json"></a>Response JSON
This template was generated by a tool to show the [body](#response-body) and [header](#response-header) elements for the JSON response.

```json
{
  "BidLandscape": [
    {
      "AdGroupBidLandscapeType": "ValueHere",
      "AdGroupId": "LongValueHere",
      "BidLandscapePoints": [
        {
          "Bid": DoubleValueHere,
          "Clicks": DoubleValueHere,
          "Cost": DoubleValueHere,
          "CurrencyCode": "ValueHere",
          "Impressions": "LongValueHere",
          "MarginalCPC": DoubleValueHere,
          "TopImpressions": "LongValueHere"
        }
      ],
      "EndDate": {
        "Day": IntValueHere,
        "Month": IntValueHere,
        "Year": IntValueHere
      },
      "StartDate": {
        "Day": IntValueHere,
        "Month": IntValueHere,
        "Year": IntValueHere
      }
    }
  ]
}
```

## <a name="example"></a>Code Syntax
To call REST API through SDKs, you need to upgrade SDK to a certain version and configure the system parameters.The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md).
See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<GetBidLandscapeByAdGroupIdsResponse> GetBidLandscapeByAdGroupIdsAsync(
	IList<AdGroupBidLandscapeInput> adGroupBidLandscapeInputs)
{
	var request = new GetBidLandscapeByAdGroupIdsRequest
	{
		AdGroupBidLandscapeInputs = adGroupBidLandscapeInputs
	};

	return (await AdInsightService.CallAsync((s, r) => s.GetBidLandscapeByAdGroupIdsAsync(r), request));
}
```
```java
static GetBidLandscapeByAdGroupIdsResponse getBidLandscapeByAdGroupIds(
	ArrayOfAdGroupBidLandscapeInput adGroupBidLandscapeInputs) throws RemoteException, Exception
{
	GetBidLandscapeByAdGroupIdsRequest request = new GetBidLandscapeByAdGroupIdsRequest();

	request.setAdGroupBidLandscapeInputs(adGroupBidLandscapeInputs);

	return AdInsightService.getService().getBidLandscapeByAdGroupIds(request);
}
```
```php
static function GetBidLandscapeByAdGroupIds(
	$adGroupBidLandscapeInputs)
{

	$GLOBALS['Proxy'] = $GLOBALS['AdInsightProxy'];

	$request = new GetBidLandscapeByAdGroupIdsRequest();

	$request->AdGroupBidLandscapeInputs = $adGroupBidLandscapeInputs;

	return $GLOBALS['AdInsightProxy']->GetService()->GetBidLandscapeByAdGroupIds($request);
}
```
```python
response=adinsight_service.GetBidLandscapeByAdGroupIds(
	AdGroupBidLandscapeInputs=AdGroupBidLandscapeInputs)
```

::: zone-end
