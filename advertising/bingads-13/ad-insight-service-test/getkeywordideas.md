---
title: GetKeywordIdeas Service Operation Test - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
zone_pivot_groups: api-reference
description: Gets the list of keyword ideas.(test)
dev_langs: 
- csharp
- java
- php
- python
---
# GetKeywordIdeas Service Operation Test - Ad Insight
Gets the list of keyword ideas.

Suggests new ad groups and keywords based on your existing keywords, website, and product category. You can also request historical statistics for keywords e.g., monthly searches, competition, average CPC, and ad impression share. You can use the returned suggested keyword bids as input to the [GetKeywordTrafficEstimates](getkeywordtrafficestimates.md) operation.  

> [!TIP]
> For an overview, see the [Keyword Ideas and Traffic Estimates](../guides/keyword-ideas-traffic-estimates.md) technical guide.  

::: zone pivot="soap"

## <a name="request"></a>Request Elements
The *GetKeywordIdeasRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request. The elements must be in the same order as shown in the [Request SOAP](#request-soap). 

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="expandideas"></a>ExpandIdeas|Determines whether you want new keyword ideas, or if you only want keyword attributes for the set of keywords that you specified in the *SearchParameters* list. If you set this element false, the [QuerySearchParameter](querysearchparameter.md) object must be included in the *SearchParameters* list. |**boolean**|
|<a name="ideaattributes"></a>IdeaAttributes|The keyword idea attributes that you want included in the response e.g., *Keyword*, *Competition*, *MonthlySearchCounts*, and *SuggestedBid*.<br/><br/>The *Competition* attribute is required.<br/><br/>The *Keyword* attribute will always be returned for each returned [KeywordIdea](keywordidea.md) whether or not you include the *Keyword* value in the requested list of idea attributes.|[KeywordIdeaAttribute](keywordideaattribute.md) array|
|<a name="searchparameters"></a>SearchParameters|The search parameters define your criteria and filters for the requested keyword ideas.<br/><br/>Do not try to instantiate a [SearchParameter](searchparameter.md). You can include one or more the following objects that derive from it: [CategorySearchParameter](categorysearchparameter.md), [CompetitionSearchParameter](competitionsearchparameter.md), [DateRangeSearchParameter](daterangesearchparameter.md), [DeviceSearchParameter](devicesearchparameter.md), [ExcludeAccountKeywordsSearchParameter](excludeaccountkeywordssearchparameter.md), [IdeaTextSearchParameter](ideatextsearchparameter.md), [ImpressionShareSearchParameter](impressionsharesearchparameter.md), [LanguageSearchParameter](languagesearchparameter.md), [LocationSearchParameter](locationsearchparameter.md), [NetworkSearchParameter](networksearchparameter.md), [QuerySearchParameter](querysearchparameter.md), [SearchVolumeSearchParameter](searchvolumesearchparameter.md), [SuggestedBidSearchParameter](suggestedbidsearchparameter.md) and [UrlSearchParameter](urlsearchparameter.md). Other objects that derive from [SearchParameter](searchparameter.md) are not valid for this operation.<br/><br/>You cannot include duplicates of any search parameter type.<br/><br/>The list must include all of these search parameters: [LanguageSearchParameter](languagesearchparameter.md), [LocationSearchParameter](locationsearchparameter.md), and [NetworkSearchParameter](networksearchparameter.md).<br/><br/>The list must include one or more of these search parameters: [CategorySearchParameter](categorysearchparameter.md), [QuerySearchParameter](querysearchparameter.md), or [UrlSearchParameter](urlsearchparameter.md). If the *ExpandIdeas* element is false, then the [QuerySearchParameter](querysearchparameter.md) is required whether or not you included additional search parameters.<br/><br/>It can take up to 72 hours for the previous calendar month's data to be available. For example, if you request keyword ideas on August 1st, 2nd or 3rd, and July's data is not ready, the response will be based on June's data. If you do not include the [DateRangeSearchParameter](daterangesearchparameter.md) in the [GetKeywordIdeas](getkeywordideas.md) request, then you will not be able to confirm whether the first list item is data for the previous month, or the month prior. If the date range is specified and the most recent month's data is not yet available, then [GetKeywordIdeas](getkeywordideas.md) will return an error.|[SearchParameter](searchparameter.md) array|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header.md)]

## <a name="response"></a>Response Elements
The *GetKeywordIdeasResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response SOAP](#response-soap).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="keywordideas"></a>KeywordIdeas|The list of keyword ideas.<br/><br/>Currently up to 3,000 list items can be returned although the limit is subject to change.|[KeywordIdea](keywordidea.md) array|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-soap"></a>Request SOAP
This template was generated by a tool to show the [order](../guides/services-protocol.md#element-order) of the [body](#request-body) and [header](#request-header) elements for the SOAP request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```xml
<s:Envelope xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
  <s:Header xmlns="https://bingads.microsoft.com/AdInsight/v13">
    <Action mustUnderstand="1">GetKeywordIdeas</Action>
    <AuthenticationToken i:nil="false">ValueHere</AuthenticationToken>
    <CustomerAccountId i:nil="false">ValueHere</CustomerAccountId>
    <CustomerId i:nil="false">ValueHere</CustomerId>
    <DeveloperToken i:nil="false">ValueHere</DeveloperToken>
  </s:Header>
  <s:Body>
    <GetKeywordIdeasRequest xmlns="https://bingads.microsoft.com/AdInsight/v13">
      <ExpandIdeas i:nil="false">ValueHere</ExpandIdeas>
      <IdeaAttributes i:nil="false">
        <KeywordIdeaAttribute>ValueHere</KeywordIdeaAttribute>
      </IdeaAttributes>
      <SearchParameters i:nil="false">
        <SearchParameter i:type="-- derived type specified here with the appropriate prefix --">
          <!--This field is applicable if the derived type attribute is set to QuerySearchParameter-->
          <Queries i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
            <a1:string>ValueHere</a1:string>
          </Queries>
          <!--This field is applicable if the derived type attribute is set to UrlSearchParameter-->
          <Url i:nil="false">ValueHere</Url>
          <!--This field is applicable if the derived type attribute is set to CategorySearchParameter-->
          <CategoryId>ValueHere</CategoryId>
          <!--These fields are applicable if the derived type attribute is set to SearchVolumeSearchParameter-->
          <Maximum i:nil="false">ValueHere</Maximum>
          <Minimum i:nil="false">ValueHere</Minimum>
          <!--These fields are applicable if the derived type attribute is set to SuggestedBidSearchParameter-->
          <Maximum i:nil="false">ValueHere</Maximum>
          <Minimum i:nil="false">ValueHere</Minimum>
          <!--These fields are applicable if the derived type attribute is set to IdeaTextSearchParameter-->
          <Excluded i:nil="false">
            <Keyword>
              <Id i:nil="false">ValueHere</Id>
              <MatchType>ValueHere</MatchType>
              <Text i:nil="false">ValueHere</Text>
            </Keyword>
          </Excluded>
          <Included i:nil="false">
            <Keyword>
              <Id i:nil="false">ValueHere</Id>
              <MatchType>ValueHere</MatchType>
              <Text i:nil="false">ValueHere</Text>
            </Keyword>
          </Included>
          <!--This field is applicable if the derived type attribute is set to ExcludeAccountKeywordsSearchParameter-->
          <ExcludeAccountKeywords>ValueHere</ExcludeAccountKeywords>
          <!--These fields are applicable if the derived type attribute is set to ImpressionShareSearchParameter-->
          <Maximum i:nil="false">ValueHere</Maximum>
          <Minimum i:nil="false">ValueHere</Minimum>
          <!--This field is applicable if the derived type attribute is set to LocationSearchParameter-->
          <Locations i:nil="false">
            <LocationCriterion>
              <LocationId>ValueHere</LocationId>
            </LocationCriterion>
          </Locations>
          <!--This field is applicable if the derived type attribute is set to NetworkSearchParameter-->
          <Network i:nil="false">
            <Network>ValueHere</Network>
          </Network>
          <!--This field is applicable if the derived type attribute is set to DeviceSearchParameter-->
          <Device i:nil="false">
            <DeviceName i:nil="false">ValueHere</DeviceName>
          </Device>
          <!--This field is applicable if the derived type attribute is set to LanguageSearchParameter-->
          <Languages i:nil="false">
            <LanguageCriterion>
              <Language i:nil="false">ValueHere</Language>
            </LanguageCriterion>
          </Languages>
          <!--This field is applicable if the derived type attribute is set to CompetitionSearchParameter-->
          <CompetitionLevels i:nil="false">
            <CompetitionLevel>ValueHere</CompetitionLevel>
          </CompetitionLevels>
          <!--These fields are applicable if the derived type attribute is set to DateRangeSearchParameter-->
          <EndDate i:nil="false">
            <Day>ValueHere</Day>
            <Month>ValueHere</Month>
            <Year>ValueHere</Year>
          </EndDate>
          <StartDate i:nil="false">
            <Day>ValueHere</Day>
            <Month>ValueHere</Month>
            <Year>ValueHere</Year>
          </StartDate>
        </SearchParameter>
      </SearchParameters>
    </GetKeywordIdeasRequest>
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
    <GetKeywordIdeasResponse xmlns="https://bingads.microsoft.com/AdInsight/v13">
      <KeywordIdeas d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <KeywordIdea>
          <AdGroupId d4p1:nil="false">ValueHere</AdGroupId>
          <AdGroupName d4p1:nil="false">ValueHere</AdGroupName>
          <AdImpressionShare d4p1:nil="false">ValueHere</AdImpressionShare>
          <Competition d4p1:nil="false">ValueHere</Competition>
          <Keyword d4p1:nil="false">ValueHere</Keyword>
          <MonthlySearchCounts d4p1:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
            <a1:long>ValueHere</a1:long>
          </MonthlySearchCounts>
          <Relevance d4p1:nil="false">ValueHere</Relevance>
          <Source d4p1:nil="false">ValueHere</Source>
          <SuggestedBid d4p1:nil="false">ValueHere</SuggestedBid>
        </KeywordIdea>
      </KeywordIdeas>
    </GetKeywordIdeasResponse>
  </s:Body>
</s:Envelope>
```

## <a name="example"></a>Code Syntax
The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md). See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<GetKeywordIdeasResponse> GetKeywordIdeasAsync(
	bool? expandIdeas,
	IList<KeywordIdeaAttribute> ideaAttributes,
	IList<SearchParameter> searchParameters)
{
	var request = new GetKeywordIdeasRequest
	{
		ExpandIdeas = expandIdeas,
		IdeaAttributes = ideaAttributes,
		SearchParameters = searchParameters
	};

	return (await AdInsightService.CallAsync((s, r) => s.GetKeywordIdeasAsync(r), request));
}
```
```java
static GetKeywordIdeasResponse getKeywordIdeas(
	boolean expandIdeas,
	ArrayOfKeywordIdeaAttribute ideaAttributes,
	ArrayOfSearchParameter searchParameters) throws RemoteException, Exception
{
	GetKeywordIdeasRequest request = new GetKeywordIdeasRequest();

	request.setExpandIdeas(expandIdeas);
	request.setIdeaAttributes(ideaAttributes);
	request.setSearchParameters(searchParameters);

	return AdInsightService.getService().getKeywordIdeas(request);
}
```
```php
static function GetKeywordIdeas(
	$expandIdeas,
	$ideaAttributes,
	$searchParameters)
{

	$GLOBALS['Proxy'] = $GLOBALS['AdInsightProxy'];

	$request = new GetKeywordIdeasRequest();

	$request->ExpandIdeas = $expandIdeas;
	$request->IdeaAttributes = $ideaAttributes;
	$request->SearchParameters = $searchParameters;

	return $GLOBALS['AdInsightProxy']->GetService()->GetKeywordIdeas($request);
}
```
```python
response=adinsight_service.GetKeywordIdeas(
	ExpandIdeas=ExpandIdeas,
	IdeaAttributes=IdeaAttributes,
	SearchParameters=SearchParameters)
```

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

::: zone-end

::: zone pivot="rest"

## <a name="url"></a>Request Url

# [Production URL](#tab/prod)

```Post
https://adinsight.api.bingads.microsoft.com/AdInsight/v13/KeywordIdeas/Query
```

# [Sandbox URL](#tab/sandbox)

```Post
https://adinsight.api.sandbox.bingads.microsoft.com/AdInsight/v13/KeywordIdeas/Query
```

-----

## <a name="request"></a>Request Elements
The *GetKeywordIdeasRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request.

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="expandideas"></a>ExpandIdeas|Determines whether you want new keyword ideas, or if you only want keyword attributes for the set of keywords that you specified in the *SearchParameters* list. If you set this element false, the [QuerySearchParameter](querysearchparameter.md) object must be included in the *SearchParameters* list. |**boolean**|
|<a name="ideaattributes"></a>IdeaAttributes|The keyword idea attributes that you want included in the response e.g., *Keyword*, *Competition*, *MonthlySearchCounts*, and *SuggestedBid*.<br/><br/>The *Competition* attribute is required.<br/><br/>The *Keyword* attribute will always be returned for each returned [KeywordIdea](keywordidea.md) whether or not you include the *Keyword* value in the requested list of idea attributes.|[KeywordIdeaAttribute](keywordideaattribute.md) array|
|<a name="searchparameters"></a>SearchParameters|The search parameters define your criteria and filters for the requested keyword ideas.<br/><br/>Do not try to instantiate a [SearchParameter](searchparameter.md). You can include one or more the following objects that derive from it: [CategorySearchParameter](categorysearchparameter.md), [CompetitionSearchParameter](competitionsearchparameter.md), [DateRangeSearchParameter](daterangesearchparameter.md), [DeviceSearchParameter](devicesearchparameter.md), [ExcludeAccountKeywordsSearchParameter](excludeaccountkeywordssearchparameter.md), [IdeaTextSearchParameter](ideatextsearchparameter.md), [ImpressionShareSearchParameter](impressionsharesearchparameter.md), [LanguageSearchParameter](languagesearchparameter.md), [LocationSearchParameter](locationsearchparameter.md), [NetworkSearchParameter](networksearchparameter.md), [QuerySearchParameter](querysearchparameter.md), [SearchVolumeSearchParameter](searchvolumesearchparameter.md), [SuggestedBidSearchParameter](suggestedbidsearchparameter.md) and [UrlSearchParameter](urlsearchparameter.md). Other objects that derive from [SearchParameter](searchparameter.md) are not valid for this operation.<br/><br/>You cannot include duplicates of any search parameter type.<br/><br/>The list must include all of these search parameters: [LanguageSearchParameter](languagesearchparameter.md), [LocationSearchParameter](locationsearchparameter.md), and [NetworkSearchParameter](networksearchparameter.md).<br/><br/>The list must include one or more of these search parameters: [CategorySearchParameter](categorysearchparameter.md), [QuerySearchParameter](querysearchparameter.md), or [UrlSearchParameter](urlsearchparameter.md). If the *ExpandIdeas* element is false, then the [QuerySearchParameter](querysearchparameter.md) is required whether or not you included additional search parameters.<br/><br/>It can take up to 72 hours for the previous calendar month's data to be available. For example, if you request keyword ideas on August 1st, 2nd or 3rd, and July's data is not ready, the response will be based on June's data. If you do not include the [DateRangeSearchParameter](daterangesearchparameter.md) in the [GetKeywordIdeas](getkeywordideas.md) request, then you will not be able to confirm whether the first list item is data for the previous month, or the month prior. If the date range is specified and the most recent month's data is not yet available, then [GetKeywordIdeas](getkeywordideas.md) will return an error.|[SearchParameter](searchparameter.md) array|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header.md)]

## <a name="response"></a>Response Elements
The *GetKeywordIdeasResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response JSON](#response-json).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="keywordideas"></a>KeywordIdeas|The list of keyword ideas.<br/><br/>Currently up to 3,000 list items can be returned although the limit is subject to change.|[KeywordIdea](keywordidea.md) array|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-json"></a>Request JSON
This template was generated by a tool to show the [body](#request-body) and [header](#request-header) elements for the JSON request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```json
{
  "ExpandIdeas": "ValueHere",
  "IdeaAttributes": [
    "ValueHere"
  ],
  "SearchParameters": [
    {
      "Queries": {
        "string": "ValueHere"
      },
      "Url": "ValueHere",
      "CategoryId": "ValueHere",
      "Maximum": [
        "ValueHere",
        "ValueHere",
        "ValueHere"
      ],
      "Minimum": [
        "ValueHere",
        "ValueHere",
        "ValueHere"
      ],
      "Excluded": {
        "Keyword": {
          "Id": "ValueHere",
          "MatchType": "ValueHere",
          "Text": "ValueHere"
        }
      },
      "Included": {
        "Keyword": {
          "Id": "ValueHere",
          "MatchType": "ValueHere",
          "Text": "ValueHere"
        }
      },
      "ExcludeAccountKeywords": "ValueHere",
      "Locations": {
        "LocationCriterion": {
          "LocationId": "ValueHere"
        }
      },
      "Network": {
        "Network": "ValueHere"
      },
      "Device": {
        "DeviceName": "ValueHere"
      },
      "Languages": {
        "LanguageCriterion": {
          "Language": "ValueHere"
        }
      },
      "CompetitionLevels": {
        "CompetitionLevel": "ValueHere"
      },
      "EndDate": {
        "Day": "ValueHere",
        "Month": "ValueHere",
        "Year": "ValueHere"
      },
      "StartDate": {
        "Day": "ValueHere",
        "Month": "ValueHere",
        "Year": "ValueHere"
      }
    }
  ]
}
```

## <a name="response-json"></a>Response JSON
This template was generated by a tool to show the [body](#response-body) and [header](#response-header) elements for the JSON response.

```json
{
  "KeywordIdeas": [
    {
      "AdGroupId": "LongValueHere",
      "AdGroupName": "ValueHere",
      "AdImpressionShare": DoubleValueHere,
      "Competition": "ValueHere",
      "Keyword": "ValueHere",
      "MonthlySearchCounts": [
        "LongValueHere"
      ],
      "Relevance": DoubleValueHere,
      "Source": "ValueHere",
      "SuggestedBid": DoubleValueHere
    }
  ]
}
```

## <a name="example"></a>Code Syntax
The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md). See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<GetKeywordIdeasResponse> GetKeywordIdeasAsync(
	bool? expandIdeas,
	IList<KeywordIdeaAttribute> ideaAttributes,
	IList<SearchParameter> searchParameters)
{
	var request = new GetKeywordIdeasRequest
	{
		ExpandIdeas = expandIdeas,
		IdeaAttributes = ideaAttributes,
		SearchParameters = searchParameters
	};

	return (await AdInsightService.CallAsync((s, r) => s.GetKeywordIdeasAsync(r), request));
}
```
```java
static GetKeywordIdeasResponse getKeywordIdeas(
	boolean expandIdeas,
	ArrayOfKeywordIdeaAttribute ideaAttributes,
	ArrayOfSearchParameter searchParameters) throws RemoteException, Exception
{
	GetKeywordIdeasRequest request = new GetKeywordIdeasRequest();

	request.setExpandIdeas(expandIdeas);
	request.setIdeaAttributes(ideaAttributes);
	request.setSearchParameters(searchParameters);

	return AdInsightService.getService().getKeywordIdeas(request);
}
```
```php
static function GetKeywordIdeas(
	$expandIdeas,
	$ideaAttributes,
	$searchParameters)
{

	$GLOBALS['Proxy'] = $GLOBALS['AdInsightProxy'];

	$request = new GetKeywordIdeasRequest();

	$request->ExpandIdeas = $expandIdeas;
	$request->IdeaAttributes = $ideaAttributes;
	$request->SearchParameters = $searchParameters;

	return $GLOBALS['AdInsightProxy']->GetService()->GetKeywordIdeas($request);
}
```
```python
response=adinsight_service.GetKeywordIdeas(
	ExpandIdeas=ExpandIdeas,
	IdeaAttributes=IdeaAttributes,
	SearchParameters=SearchParameters)
```

::: zone-end
