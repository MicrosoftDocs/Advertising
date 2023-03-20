---
title: GetEstimatedPositionByKeywords Service Operation - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Gets the estimated position in the search results if the specified bid value would be used for the specified keywords.
dev_langs: 
  - csharp
  - java
  - php
  - python
---
# GetEstimatedPositionByKeywords Service Operation - Ad Insight
Gets the estimated position in the search results if the specified bid value would be used for the specified keywords. In addition, the operation provides estimates of clicks, average cost per click (CPC), and impressions that the keywords could be generated with the estimated bid.

The estimates are not a prediction or guarantee of future performance.

> [!NOTE]
> This operation is for search campaigns using the enhanced CPC bid strategy.  

## <a name="request"></a>Request Elements
The *GetEstimatedPositionByKeywordsRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request. The elements must be in the same order as shown in the [Request SOAP](#request-soap). 

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="adgroupid"></a>AdGroupId|The identifier of the ad group whose performance data is used to help determine how well the keyword might perform in the context of the ad group. Specifying an ad group helps improve the accuracy of the suggested position.<br/><br/>If you specify an ad group, you must specify the campaign that it belongs to.|**long**|
|<a name="campaignid"></a>CampaignId|The identifier of the campaign that owns the ad group specified in *AdGroupId*. If you do not specify an ad group, the campaign's performance data is used to help determine how well the keyword might perform in the context of the campaign.<br/><br/>Specifying a campaign and ad group helps improve the accuracy of the suggested position. If neither *AdGroupId* or *CampaignId* are specified, the operation uses the specified *CustomerAccountId* header element to help determine how well the keyword might perform in the context of the account.|**long**|
|<a name="currencycode"></a>CurrencyCode|The ISO code for the monetary unit to use to calculate the cost estimates and suggested bid value.<br/><br/>If not set, the service determines the currency from the account specified in the *CustomerAccountId* header element. If neither *Currency* or *CustomerAccountId* is set, the service uses USD.|[CurrencyCode](currencycode.md)|
|<a name="keywords"></a>Keywords|An array of keywords for which you want to get the estimated position in the search results, based on the specified bid value. You may specify a maximum of 1,000 keywords and each keyword can contains a maximum of 100 characters.|**string** array|
|<a name="language"></a>Language|The language used in parallel with location identifiers for estimating the position.<br/><br/>The language must be supported in each of the locations that you specify in [LocationIds](#locationids).<br/><br/>For possible language values, see [Ad Languages](../guides/ad-languages.md).<br/><br/>If you do not specify the language, the service operation uses the language of the specified [AdGroupId](#adgroupid) or [CampaignId](#campaignid). If none of these properties are set, then *EN* (English) is used by default.|**string**|
|<a name="locationids"></a>LocationIds|The identifier or identifiers of the geographical locations to use for estimating the position.<br/><br/>All of the locations must support the language specified in the [Language](#language) element. Although you can specify multiple location identifiers, as a best practice for the most accurate position estimates per location, you should specify only one location per service call.<br/><br/>For possible location identifiers, see [Geographical Location Codes](../guides/geographical-location-codes.md).<br/><br/>If you do not specify any locations, the service operation uses the location criterions of the specified [AdGroupId](#adgroupid) or [CampaignId](#campaignid). If none of these properties are set, then *190* (United States) is used by default.|**long** array|
|<a name="matchtypes"></a>MatchTypes|An array of unique match types for which you want to get estimates.<br/><br/>You may not specify the Content match type.|[MatchType](matchtype.md) array|
|<a name="maxbid"></a>MaxBid|The maximum bid value to use to determine the estimated position in the search results.|**double**|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header.md)]

## <a name="response"></a>Response Elements
The *GetEstimatedPositionByKeywordsResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response SOAP](#response-soap).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="keywordestimatedpositions"></a>KeywordEstimatedPositions|An array of [KeywordEstimatedPosition](keywordestimatedposition.md) data objects. The array contains an item for each keyword specified in the request. If the keyword is not valid, the corresponding item in the array will be null.<br/><br/>If data is available for the keyword, the [EstimatedPositionAndTraffic](estimatedpositionandtraffic.md)  will provide the estimated position in the search results where your ads could appear, based on the specified bid value. Otherwise, the *EstimatedPositions* element will be set to null.|[KeywordEstimatedPosition](keywordestimatedposition.md) array|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-soap"></a>Request SOAP
This template was generated by a tool to show the [order](../guides/services-protocol.md#element-order) of the [body](#request-body) and [header](#request-header) elements for the SOAP request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```xml
<s:Envelope xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
  <s:Header xmlns="https://bingads.microsoft.com/AdInsight/v13">
    <Action mustUnderstand="1">GetEstimatedPositionByKeywords</Action>
    <AuthenticationToken i:nil="false">ValueHere</AuthenticationToken>
    <CustomerAccountId i:nil="false">ValueHere</CustomerAccountId>
    <CustomerId i:nil="false">ValueHere</CustomerId>
    <DeveloperToken i:nil="false">ValueHere</DeveloperToken>
  </s:Header>
  <s:Body>
    <GetEstimatedPositionByKeywordsRequest xmlns="https://bingads.microsoft.com/AdInsight/v13">
      <Keywords i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
        <a1:string>ValueHere</a1:string>
      </Keywords>
      <MaxBid>ValueHere</MaxBid>
      <Language i:nil="false">ValueHere</Language>
      <LocationIds i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
        <a1:long>ValueHere</a1:long>
      </LocationIds>
      <CurrencyCode i:nil="false">ValueHere</CurrencyCode>
      <MatchTypes i:nil="false">
        <MatchType>ValueHere</MatchType>
      </MatchTypes>
      <CampaignId i:nil="false">ValueHere</CampaignId>
      <AdGroupId i:nil="false">ValueHere</AdGroupId>
    </GetEstimatedPositionByKeywordsRequest>
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
    <GetEstimatedPositionByKeywordsResponse xmlns="https://bingads.microsoft.com/AdInsight/v13">
      <KeywordEstimatedPositions d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <KeywordEstimatedPosition>
          <Keyword d4p1:nil="false">ValueHere</Keyword>
          <EstimatedPositions d4p1:nil="false">
            <EstimatedPositionAndTraffic>
              <MatchType>ValueHere</MatchType>
              <MinClicksPerWeek>ValueHere</MinClicksPerWeek>
              <MaxClicksPerWeek>ValueHere</MaxClicksPerWeek>
              <AverageCPC>ValueHere</AverageCPC>
              <MinImpressionsPerWeek>ValueHere</MinImpressionsPerWeek>
              <MaxImpressionsPerWeek>ValueHere</MaxImpressionsPerWeek>
              <CTR>ValueHere</CTR>
              <MinTotalCostPerWeek>ValueHere</MinTotalCostPerWeek>
              <MaxTotalCostPerWeek>ValueHere</MaxTotalCostPerWeek>
              <CurrencyCode>ValueHere</CurrencyCode>
              <EstimatedAdPosition>ValueHere</EstimatedAdPosition>
            </EstimatedPositionAndTraffic>
          </EstimatedPositions>
        </KeywordEstimatedPosition>
      </KeywordEstimatedPositions>
    </GetEstimatedPositionByKeywordsResponse>
  </s:Body>
</s:Envelope>
```

## <a name="example"></a>Code Syntax
The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md). See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<GetEstimatedPositionByKeywordsResponse> GetEstimatedPositionByKeywordsAsync(
	IList<string> keywords,
	double maxBid,
	string language,
	IList<long> locationIds,
	CurrencyCode? currencyCode,
	IList<MatchType> matchTypes,
	long? campaignId,
	long? adGroupId)
{
	var request = new GetEstimatedPositionByKeywordsRequest
	{
		Keywords = keywords,
		MaxBid = maxBid,
		Language = language,
		LocationIds = locationIds,
		CurrencyCode = currencyCode,
		MatchTypes = matchTypes,
		CampaignId = campaignId,
		AdGroupId = adGroupId
	};

	return (await AdInsightService.CallAsync((s, r) => s.GetEstimatedPositionByKeywordsAsync(r), request));
}
```
```java
static GetEstimatedPositionByKeywordsResponse getEstimatedPositionByKeywords(
	ArrayOfstring keywords,
	double maxBid,
	java.lang.String language,
	ArrayOflong locationIds,
	CurrencyCode currencyCode,
	ArrayOfMatchType matchTypes,
	java.lang.Long campaignId,
	java.lang.Long adGroupId) throws RemoteException, Exception
{
	GetEstimatedPositionByKeywordsRequest request = new GetEstimatedPositionByKeywordsRequest();

	request.setKeywords(keywords);
	request.setMaxBid(maxBid);
	request.setLanguage(language);
	request.setLocationIds(locationIds);
	request.setCurrencyCode(currencyCode);
	request.setMatchTypes(matchTypes);
	request.setCampaignId(campaignId);
	request.setAdGroupId(adGroupId);

	return AdInsightService.getService().getEstimatedPositionByKeywords(request);
}
```
```php
static function GetEstimatedPositionByKeywords(
	$keywords,
	$maxBid,
	$language,
	$locationIds,
	$currencyCode,
	$matchTypes,
	$campaignId,
	$adGroupId)
{

	$GLOBALS['Proxy'] = $GLOBALS['AdInsightProxy'];

	$request = new GetEstimatedPositionByKeywordsRequest();

	$request->Keywords = $keywords;
	$request->MaxBid = $maxBid;
	$request->Language = $language;
	$request->LocationIds = $locationIds;
	$request->CurrencyCode = $currencyCode;
	$request->MatchTypes = $matchTypes;
	$request->CampaignId = $campaignId;
	$request->AdGroupId = $adGroupId;

	return $GLOBALS['AdInsightProxy']->GetService()->GetEstimatedPositionByKeywords($request);
}
```
```python
response=adinsight_service.GetEstimatedPositionByKeywords(
	Keywords=Keywords,
	MaxBid=MaxBid,
	Language=Language,
	LocationIds=LocationIds,
	CurrencyCode=CurrencyCode,
	MatchTypes=MatchTypes,
	CampaignId=CampaignId,
	AdGroupId=AdGroupId)
```

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

