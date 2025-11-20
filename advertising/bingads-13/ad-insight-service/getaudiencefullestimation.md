---
title: GetAudienceFullEstimation Service Operation - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
zone_pivot_groups: api-reference
description: Gets the audience full estimation.
dev_langs: 
- csharp
- java
- php
- python
---
# GetAudienceFullEstimation Service Operation - Ad Insight
Gets the audience full estimation.

::: zone pivot="soap"

## <a name="request"></a>Request Elements
The *GetAudienceFullEstimationRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request. The elements must be in the same order as shown in the [Request SOAP](#request-soap). 

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="age"></a>Age|The selection of age targeting. Possible values are: *EighteenToTwentyFour*, *TwentyFiveToThirtyFour*, *ThirtyFiveToFourtyNine*, *FiftyToSixtyFour*, *SixtyFiveAndAbove*, *Unknown*.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[SelectionOfAgeEnum](selectionofageenum.md)|
|<a name="audience"></a>Audience|The selection of audience targeting. Supported audience types are: Custom audiences, Combined lists, Customer match lists, Dynamic remarketing lists, In-market audiences, Remarketing lists, and Similar audiences. The values stored in the selection refer to segment IDs.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[SelectionOflong](selectionoflong.md)|
|<a name="bid"></a>Bid|The desired bid setting value. If set to null, the suggested bid is used to perform estimation.<br/><br/>**Add:** Optional <br/>**Update:** Optional|**decimal**|
|<a name="campaignbiddingstrategy"></a>CampaignBiddingStrategy|Indicates the desired bidding strategy for estimation response. Supported values are: *5: EnhancedCPC*, *12: ManualCP*.<br/><br/>**Add:** Optional. The default value is *Manual*. <br/>**Update:** Optional|**int**|
|<a name="campaignsubtype"></a>CampaignSubType|Indicate the desired ad type for estimation response. Supported values are: *0: StaticAds, *1: FeedBasedAds*, *2: DynamicFeedBasedAds*.<br/><br/>**Add:** Optional. The default value is *StaticAds*. <br/>**Update:** Optional|**int**|
|<a name="company"></a>Company|The company of LinkedIn profile targeting. The values stored in the selection refer to segment IDs.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[SelectionOflong](selectionoflong.md)|
|<a name="currency"></a>Currency|The currency of *DailyBudget* and *Bid*. If null, the currency of account setting will be used.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[Currency](currency.md)|
|<a name="dailybudget"></a>DailyBudget|The daily campaign budget value. If set to null, the suggested budget is used to perform estimation.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|**decimal**|
|<a name="device"></a>Device|The type of device.|[SelectionOfDeviceEnum](selectionofdeviceenum.md)|
|<a name="enddate"></a>EndDate|The end date of the date range that identifies the data that you want to use to determine the audience full estimation.<br/><br/>This date must be later than or the same as the specified end date.|**dateTime**|
|<a name="feed"></a>Feed|Respect this parameter only when CampaignSubType is *FeedBasedAds* or *DynamicFeedBasedAds*. It specifies the desired feed traffic to count as estimation.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[Feed](feed.md)|
|<a name="gender"></a>Gender|The gender to target. Possible values are: *Male*, *Female*, *Unknown*.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[SelectionOfGenderEnum](selectionofgenderenum.md)|
|<a name="includeimpressionsbreakdown"></a>IncludeImpressionsBreakdown|Include impressions in the audience breakdown.|**boolean**|
|<a name="industry"></a>Industry|The industry of LinkedIn profile targeting. The values stored in the selection refer to segment IDs.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[SelectionOflong](selectionoflong.md)|
|<a name="jobfunction"></a>JobFunction|The job function The industry of LinkedIn profile targeting. The values stored in the selection refer to segment IDs.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[SelectionOflong](selectionoflong.md)|
|<a name="location"></a>Location|The selection of location targeting. The values stored in selection refer to location IDs.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[SelectionOflong](selectionoflong.md)|
|<a name="multiadtypes"></a>MultiAdTypes|The audience full estimation ad type. Possible values indlude: *DisplayAds*, *StaticAds*, *VideoAds*.<br/><br/>**Add:** Optional.<br/>**Update:** Optional|**int**|
|<a name="placement"></a>Placement|Reserved.|[SelectionOflong](selectionoflong.md)|
|<a name="radiustargets"></a>RadiusTargets|Represents the desired geographical area in terms of miles/kilometers.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[RadiusTarget](radiustarget.md) array|
|<a name="startdate"></a>StartDate|The start date of the date range that identifies the data that you want to use to determine the audience full estimation.<br/><br/>This date must be earlier than or the same as the specified end date.|**dateTime**|
|<a name="topic"></a>Topic|Reserved.|[SelectionOflong](selectionoflong.md)|
|<a name="totalbudget"></a>TotalBudget|The total budget.|**decimal**|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header.md)]

## <a name="response"></a>Response Elements
The *GetAudienceFullEstimationResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response SOAP](#response-soap).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="currency"></a>Currency|The currency of *DailyBudget* and *Bid*. If null, the currency of account setting will be used.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[Currency](currency.md)|
|<a name="estaudiencesize"></a>EstAudienceSize|Monthly estimated reach user count with rounded results. Output only.|[RangeResultOfDecimalRoundedResult](rangeresultofdecimalroundedresult.md)|
|<a name="estclick"></a>EstClick|Monthly estimated user count with range result. Output only.|[RangeResultOfDecimalRoundedResult](rangeresultofdecimalroundedresult.md)|
|<a name="estclickbytype"></a>EstClickByType|The estimated user count by type.|[DecimalRoundedRangeResultByType](decimalroundedrangeresultbytype.md) array|
|<a name="estcostperevent"></a>EstCostPerEvent|Indicates the estimated cost per event. The field meaning varies with *CampaignBiddingStrategy* request field. Output only.<br/><br/>EnhancedCPC: CPC<br/>ManualCPM: CPM|[RangeResultOfDecimalRoundedResult](rangeresultofdecimalroundedresult.md)|
|<a name="estcostpereventbytype"></a>EstCostPerEventByType|The estimated cost per event by type.|[DecimalRoundedRangeResultByType](decimalroundedrangeresultbytype.md) array|
|<a name="estcpcbytype"></a>EstCPCByType|The estimated cost per click by type.|[DecimalRoundedRangeResultByType](decimalroundedrangeresultbytype.md) array|
|<a name="estctr"></a>EstCTR|Estimated click-through rate (CTR) with range result. Output only.|[RangeResultOfdouble](rangeresultofdouble.md)|
|<a name="estctrbytype"></a>EstCTRByType|The estimated click-through rate by type.|[RangeResultByTypeOfdouble](rangeresultbytypeofdouble.md) array|
|<a name="estimpression"></a>EstImpression|Monthly estimated impression with range result. Output only.|[RangeResultOfDecimalRoundedResult](rangeresultofdecimalroundedresult.md)|
|<a name="estimpressionbytype"></a>EstImpressionByType|The estimated impressions by type.|[DecimalRoundedRangeResultByType](decimalroundedrangeresultbytype.md) array|
|<a name="estreachaudiencesize"></a>EstReachAudienceSize|Monthly estimated user count with range result. Output only.|[DecimalRoundedResult](decimalroundedresult.md)|
|<a name="estreachimpression"></a>EstReachImpression|Monthly estimated impression with range result. Output only.|[DecimalRoundedResult](decimalroundedresult.md)|
|<a name="estreachimpressionbytype"></a>EstReachImpressionByType|The estimated reach of impressions by type.|[DecimalRoundedByType](decimalroundedbytype.md) array|
|<a name="estspend"></a>EstSpend|Monthly estimated spend with range result. Output only.|[RangeResultOfDecimalRoundedResult](rangeresultofdecimalroundedresult.md)|
|<a name="estspendbytype"></a>EstSpendByType|The estimated spend by type.|[DecimalRoundedRangeResultByType](decimalroundedrangeresultbytype.md) array|
|<a name="estviewbytype"></a>EstViewByType|The estimated views by type.|[DecimalRoundedRangeResultByType](decimalroundedrangeresultbytype.md) array|
|<a name="eventslosttobid"></a>EventsLostToBid|Indicates event lost count due to insufficient input bid. The event lost type varies with *CampaignBiddingStrategy* request field. Output only.<br/><br/>EnhancedCPC: Click<br/>ManualCPM: Impression|**int**|
|<a name="eventslosttobudget"></a>EventsLostToBudget|Indicates the event lost count due to insufficient input budget. The event lost type varies with *CampaignBiddingStrategy* request field. Output only.<br/><br/>EnhancedCPC: Click<br/>ManualCPM: Impression|**int**|
|<a name="suggestedbid"></a>SuggestedBid|Suggested bid value under the current targeting. Output only.|**decimal**|
|<a name="suggestedbudget"></a>SuggestedBudget|Suggested daily budget value under the current targeting and bid. Output only.|**decimal**|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-soap"></a>Request SOAP
This template was generated by a tool to show the [order](../guides/services-protocol.md#element-order) of the [body](#request-body) and [header](#request-header) elements for the SOAP request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```xml
<s:Envelope xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
  <s:Header xmlns="https://bingads.microsoft.com/AdInsight/v13">
    <Action mustUnderstand="1">GetAudienceFullEstimation</Action>
    <AuthenticationToken i:nil="false">ValueHere</AuthenticationToken>
    <CustomerAccountId i:nil="false">ValueHere</CustomerAccountId>
    <CustomerId i:nil="false">ValueHere</CustomerId>
    <DeveloperToken i:nil="false">ValueHere</DeveloperToken>
  </s:Header>
  <s:Body>
    <GetAudienceFullEstimationRequest xmlns="https://bingads.microsoft.com/AdInsight/v13">
      <Age i:nil="false">
        <Includes i:nil="false">
          <AgeEnum>ValueHere</AgeEnum>
        </Includes>
        <Excludes i:nil="false">
          <AgeEnum>ValueHere</AgeEnum>
        </Excludes>
      </Age>
      <Gender i:nil="false">
        <Includes i:nil="false">
          <GenderEnum>ValueHere</GenderEnum>
        </Includes>
        <Excludes i:nil="false">
          <GenderEnum>ValueHere</GenderEnum>
        </Excludes>
      </Gender>
      <Audience i:nil="false">
        <Includes i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
          <a1:long>ValueHere</a1:long>
        </Includes>
        <Excludes i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
          <a1:long>ValueHere</a1:long>
        </Excludes>
      </Audience>
      <Company i:nil="false">
        <Includes i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
          <a1:long>ValueHere</a1:long>
        </Includes>
        <Excludes i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
          <a1:long>ValueHere</a1:long>
        </Excludes>
      </Company>
      <Industry i:nil="false">
        <Includes i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
          <a1:long>ValueHere</a1:long>
        </Includes>
        <Excludes i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
          <a1:long>ValueHere</a1:long>
        </Excludes>
      </Industry>
      <JobFunction i:nil="false">
        <Includes i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
          <a1:long>ValueHere</a1:long>
        </Includes>
        <Excludes i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
          <a1:long>ValueHere</a1:long>
        </Excludes>
      </JobFunction>
      <Location i:nil="false">
        <Includes i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
          <a1:long>ValueHere</a1:long>
        </Includes>
        <Excludes i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
          <a1:long>ValueHere</a1:long>
        </Excludes>
      </Location>
      <Placement i:nil="false">
        <Includes i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
          <a1:long>ValueHere</a1:long>
        </Includes>
        <Excludes i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
          <a1:long>ValueHere</a1:long>
        </Excludes>
      </Placement>
      <Device i:nil="false">
        <Includes i:nil="false">
          <DeviceEnum>ValueHere</DeviceEnum>
        </Includes>
        <Excludes i:nil="false">
          <DeviceEnum>ValueHere</DeviceEnum>
        </Excludes>
      </Device>
      <Topic i:nil="false">
        <Includes i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
          <a1:long>ValueHere</a1:long>
        </Includes>
        <Excludes i:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
          <a1:long>ValueHere</a1:long>
        </Excludes>
      </Topic>
      <RadiusTargets i:nil="false">
        <RadiusTarget>
          <Radius>ValueHere</Radius>
          <RadiusUnit>ValueHere</RadiusUnit>
          <CenterLatitude>ValueHere</CenterLatitude>
          <CenterLongitude>ValueHere</CenterLongitude>
        </RadiusTarget>
      </RadiusTargets>
      <CampaignBiddingStrategy i:nil="false">ValueHere</CampaignBiddingStrategy>
      <CampaignSubType i:nil="false">ValueHere</CampaignSubType>
      <Feed i:nil="false">
        <StoreId i:nil="false">ValueHere</StoreId>
        <FeedId i:nil="false">ValueHere</FeedId>
        <FeedType i:nil="false">ValueHere</FeedType>
      </Feed>
      <DailyBudget i:nil="false">ValueHere</DailyBudget>
      <Bid i:nil="false">ValueHere</Bid>
      <Currency i:nil="false">ValueHere</Currency>
      <MultiAdTypes i:nil="false">ValueHere</MultiAdTypes>
      <StartDate i:nil="false">ValueHere</StartDate>
      <EndDate i:nil="false">ValueHere</EndDate>
      <TotalBudget i:nil="false">ValueHere</TotalBudget>
      <IncludeImpressionsBreakdown i:nil="false">ValueHere</IncludeImpressionsBreakdown>
    </GetAudienceFullEstimationRequest>
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
    <GetAudienceFullEstimationResponse xmlns="https://bingads.microsoft.com/AdInsight/v13">
      <EstImpression d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <High d4p1:nil="false">
          <Value d4p1:nil="false">ValueHere</Value>
          <Unit d4p1:nil="false">ValueHere</Unit>
        </High>
        <Low d4p1:nil="false">
          <Value d4p1:nil="false">ValueHere</Value>
          <Unit d4p1:nil="false">ValueHere</Unit>
        </Low>
      </EstImpression>
      <EstAudienceSize d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <High d4p1:nil="false">
          <Value d4p1:nil="false">ValueHere</Value>
          <Unit d4p1:nil="false">ValueHere</Unit>
        </High>
        <Low d4p1:nil="false">
          <Value d4p1:nil="false">ValueHere</Value>
          <Unit d4p1:nil="false">ValueHere</Unit>
        </Low>
      </EstAudienceSize>
      <EstClick d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <High d4p1:nil="false">
          <Value d4p1:nil="false">ValueHere</Value>
          <Unit d4p1:nil="false">ValueHere</Unit>
        </High>
        <Low d4p1:nil="false">
          <Value d4p1:nil="false">ValueHere</Value>
          <Unit d4p1:nil="false">ValueHere</Unit>
        </Low>
      </EstClick>
      <EstSpend d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <High d4p1:nil="false">
          <Value d4p1:nil="false">ValueHere</Value>
          <Unit d4p1:nil="false">ValueHere</Unit>
        </High>
        <Low d4p1:nil="false">
          <Value d4p1:nil="false">ValueHere</Value>
          <Unit d4p1:nil="false">ValueHere</Unit>
        </Low>
      </EstSpend>
      <EstCostPerEvent d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <High d4p1:nil="false">
          <Value d4p1:nil="false">ValueHere</Value>
          <Unit d4p1:nil="false">ValueHere</Unit>
        </High>
        <Low d4p1:nil="false">
          <Value d4p1:nil="false">ValueHere</Value>
          <Unit d4p1:nil="false">ValueHere</Unit>
        </Low>
      </EstCostPerEvent>
      <EstCTR d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <High>ValueHere</High>
        <Low>ValueHere</Low>
      </EstCTR>
      <SuggestedBid d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">ValueHere</SuggestedBid>
      <SuggestedBudget d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">ValueHere</SuggestedBudget>
      <EventsLostToBid d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">ValueHere</EventsLostToBid>
      <EventsLostToBudget d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">ValueHere</EventsLostToBudget>
      <EstReachAudienceSize d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <Value d4p1:nil="false">ValueHere</Value>
        <Unit d4p1:nil="false">ValueHere</Unit>
      </EstReachAudienceSize>
      <EstReachImpression d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <Value d4p1:nil="false">ValueHere</Value>
        <Unit d4p1:nil="false">ValueHere</Unit>
      </EstReachImpression>
      <Currency d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">ValueHere</Currency>
      <EstImpressionByType d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <DecimalRoundedRangeResultByType>
        </DecimalRoundedRangeResultByType>
      </EstImpressionByType>
      <EstClickByType d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <DecimalRoundedRangeResultByType>
        </DecimalRoundedRangeResultByType>
      </EstClickByType>
      <EstSpendByType d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <DecimalRoundedRangeResultByType>
        </DecimalRoundedRangeResultByType>
      </EstSpendByType>
      <EstCostPerEventByType d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <DecimalRoundedRangeResultByType>
        </DecimalRoundedRangeResultByType>
      </EstCostPerEventByType>
      <EstCPCByType d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <DecimalRoundedRangeResultByType>
        </DecimalRoundedRangeResultByType>
      </EstCPCByType>
      <EstViewByType d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <DecimalRoundedRangeResultByType>
        </DecimalRoundedRangeResultByType>
      </EstViewByType>
      <EstCTRByType d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <RangeResultByTypeOfdouble>
        </RangeResultByTypeOfdouble>
      </EstCTRByType>
      <EstReachImpressionByType d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <DecimalRoundedByType>
        </DecimalRoundedByType>
      </EstReachImpressionByType>
    </GetAudienceFullEstimationResponse>
  </s:Body>
</s:Envelope>
```

## <a name="example"></a>Code Syntax
The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md). See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<GetAudienceFullEstimationResponse> GetAudienceFullEstimationAsync(
	SelectionOfAgeEnum age,
	SelectionOfGenderEnum gender,
	SelectionOflong audience,
	SelectionOflong company,
	SelectionOflong industry,
	SelectionOflong jobFunction,
	SelectionOflong location,
	SelectionOflong placement,
	SelectionOfDeviceEnum device,
	SelectionOflong topic,
	IList<RadiusTarget> radiusTargets,
	int? campaignBiddingStrategy,
	int? campaignSubType,
	Feed feed,
	decimal? dailyBudget,
	decimal? bid,
	Currency? currency,
	int? multiAdTypes,
	DateTime? startDate,
	DateTime? endDate,
	decimal? totalBudget,
	bool? includeImpressionsBreakdown)
{
	var request = new GetAudienceFullEstimationRequest
	{
		Age = age,
		Gender = gender,
		Audience = audience,
		Company = company,
		Industry = industry,
		JobFunction = jobFunction,
		Location = location,
		Placement = placement,
		Device = device,
		Topic = topic,
		RadiusTargets = radiusTargets,
		CampaignBiddingStrategy = campaignBiddingStrategy,
		CampaignSubType = campaignSubType,
		Feed = feed,
		DailyBudget = dailyBudget,
		Bid = bid,
		Currency = currency,
		MultiAdTypes = multiAdTypes,
		StartDate = startDate,
		EndDate = endDate,
		TotalBudget = totalBudget,
		IncludeImpressionsBreakdown = includeImpressionsBreakdown
	};

	return (await AdInsightService.CallAsync((s, r) => s.GetAudienceFullEstimationAsync(r), request));
}
```
```java
static GetAudienceFullEstimationResponse getAudienceFullEstimation(
	SelectionOfAgeEnum age,
	SelectionOfGenderEnum gender,
	SelectionOflong audience,
	SelectionOflong company,
	SelectionOflong industry,
	SelectionOflong jobFunction,
	SelectionOflong location,
	SelectionOflong placement,
	SelectionOfDeviceEnum device,
	SelectionOflong topic,
	ArrayOfRadiusTarget radiusTargets,
	int campaignBiddingStrategy,
	int campaignSubType,
	Feed feed,
	decimal dailyBudget,
	decimal bid,
	Currency currency,
	int multiAdTypes,
	Calendar startDate,
	Calendar endDate,
	decimal totalBudget,
	boolean includeImpressionsBreakdown) throws RemoteException, Exception
{
	GetAudienceFullEstimationRequest request = new GetAudienceFullEstimationRequest();

	request.setAge(age);
	request.setGender(gender);
	request.setAudience(audience);
	request.setCompany(company);
	request.setIndustry(industry);
	request.setJobFunction(jobFunction);
	request.setLocation(location);
	request.setPlacement(placement);
	request.setDevice(device);
	request.setTopic(topic);
	request.setRadiusTargets(radiusTargets);
	request.setCampaignBiddingStrategy(campaignBiddingStrategy);
	request.setCampaignSubType(campaignSubType);
	request.setFeed(feed);
	request.setDailyBudget(dailyBudget);
	request.setBid(bid);
	request.setCurrency(currency);
	request.setMultiAdTypes(multiAdTypes);
	request.setStartDate(startDate);
	request.setEndDate(endDate);
	request.setTotalBudget(totalBudget);
	request.setIncludeImpressionsBreakdown(includeImpressionsBreakdown);

	return AdInsightService.getService().getAudienceFullEstimation(request);
}
```
```php
static function GetAudienceFullEstimation(
	$age,
	$gender,
	$audience,
	$company,
	$industry,
	$jobFunction,
	$location,
	$placement,
	$device,
	$topic,
	$radiusTargets,
	$campaignBiddingStrategy,
	$campaignSubType,
	$feed,
	$dailyBudget,
	$bid,
	$currency,
	$multiAdTypes,
	$startDate,
	$endDate,
	$totalBudget,
	$includeImpressionsBreakdown)
{

	$GLOBALS['Proxy'] = $GLOBALS['AdInsightProxy'];

	$request = new GetAudienceFullEstimationRequest();

	$request->Age = $age;
	$request->Gender = $gender;
	$request->Audience = $audience;
	$request->Company = $company;
	$request->Industry = $industry;
	$request->JobFunction = $jobFunction;
	$request->Location = $location;
	$request->Placement = $placement;
	$request->Device = $device;
	$request->Topic = $topic;
	$request->RadiusTargets = $radiusTargets;
	$request->CampaignBiddingStrategy = $campaignBiddingStrategy;
	$request->CampaignSubType = $campaignSubType;
	$request->Feed = $feed;
	$request->DailyBudget = $dailyBudget;
	$request->Bid = $bid;
	$request->Currency = $currency;
	$request->MultiAdTypes = $multiAdTypes;
	$request->StartDate = $startDate;
	$request->EndDate = $endDate;
	$request->TotalBudget = $totalBudget;
	$request->IncludeImpressionsBreakdown = $includeImpressionsBreakdown;

	return $GLOBALS['AdInsightProxy']->GetService()->GetAudienceFullEstimation($request);
}
```
```python
response=adinsight_service.GetAudienceFullEstimation(
	Age=Age,
	Gender=Gender,
	Audience=Audience,
	Company=Company,
	Industry=Industry,
	JobFunction=JobFunction,
	Location=Location,
	Placement=Placement,
	Device=Device,
	Topic=Topic,
	RadiusTargets=RadiusTargets,
	CampaignBiddingStrategy=CampaignBiddingStrategy,
	CampaignSubType=CampaignSubType,
	Feed=Feed,
	DailyBudget=DailyBudget,
	Bid=Bid,
	Currency=Currency,
	MultiAdTypes=MultiAdTypes,
	StartDate=StartDate,
	EndDate=EndDate,
	TotalBudget=TotalBudget,
	IncludeImpressionsBreakdown=IncludeImpressionsBreakdown)
```

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

::: zone-end

::: zone pivot="rest"

## <a name="url"></a>Request Url

# [Production URL](#tab/prod)

```POST
https://adinsight.api.bingads.microsoft.com/AdInsight/v13/AudienceFullEstimation/Query
```

# [Sandbox URL](#tab/sandbox)

```POST
https://adinsight.api.sandbox.bingads.microsoft.com/AdInsight/v13/AudienceFullEstimation/Query
```

-----

## <a name="request"></a>Request Elements
The *GetAudienceFullEstimationRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request.

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="age"></a>Age|The selection of age targeting. Possible values are: *EighteenToTwentyFour*, *TwentyFiveToThirtyFour*, *ThirtyFiveToFourtyNine*, *FiftyToSixtyFour*, *SixtyFiveAndAbove*, *Unknown*.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[SelectionOfAgeEnum](selectionofageenum.md)|
|<a name="audience"></a>Audience|The selection of audience targeting. Supported audience types are: Custom audiences, Combined lists, Customer match lists, Dynamic remarketing lists, In-market audiences, Remarketing lists, and Similar audiences. The values stored in the selection refer to segment IDs.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[SelectionOflong](selectionoflong.md)|
|<a name="bid"></a>Bid|The desired bid setting value. If set to null, the suggested bid is used to perform estimation.<br/><br/>**Add:** Optional <br/>**Update:** Optional|**decimal**|
|<a name="campaignbiddingstrategy"></a>CampaignBiddingStrategy|Indicates the desired bidding strategy for estimation response. Supported values are: *5: EnhancedCPC*, *12: ManualCP*.<br/><br/>**Add:** Optional. The default value is *Manual*. <br/>**Update:** Optional|**int**|
|<a name="campaignsubtype"></a>CampaignSubType|Indicate the desired ad type for estimation response. Supported values are: *0: StaticAds, *1: FeedBasedAds*, *2: DynamicFeedBasedAds*.<br/><br/>**Add:** Optional. The default value is *StaticAds*. <br/>**Update:** Optional|**int**|
|<a name="company"></a>Company|The company of LinkedIn profile targeting. The values stored in the selection refer to segment IDs.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[SelectionOflong](selectionoflong.md)|
|<a name="currency"></a>Currency|The currency of *DailyBudget* and *Bid*. If null, the currency of account setting will be used.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[Currency](currency.md)|
|<a name="dailybudget"></a>DailyBudget|The daily campaign budget value. If set to null, the suggested budget is used to perform estimation.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|**decimal**|
|<a name="device"></a>Device|The type of device.|[SelectionOfDeviceEnum](selectionofdeviceenum.md)|
|<a name="enddate"></a>EndDate|The end date of the date range that identifies the data that you want to use to determine the audience full estimation.<br/><br/>This date must be later than or the same as the specified end date.|**dateTime**|
|<a name="feed"></a>Feed|Respect this parameter only when CampaignSubType is *FeedBasedAds* or *DynamicFeedBasedAds*. It specifies the desired feed traffic to count as estimation.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[Feed](feed.md)|
|<a name="gender"></a>Gender|The gender to target. Possible values are: *Male*, *Female*, *Unknown*.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[SelectionOfGenderEnum](selectionofgenderenum.md)|
|<a name="includeimpressionsbreakdown"></a>IncludeImpressionsBreakdown|Include impressions in the audience breakdown.|**boolean**|
|<a name="industry"></a>Industry|The industry of LinkedIn profile targeting. The values stored in the selection refer to segment IDs.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[SelectionOflong](selectionoflong.md)|
|<a name="jobfunction"></a>JobFunction|The job function The industry of LinkedIn profile targeting. The values stored in the selection refer to segment IDs.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[SelectionOflong](selectionoflong.md)|
|<a name="location"></a>Location|The selection of location targeting. The values stored in selection refer to location IDs.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[SelectionOflong](selectionoflong.md)|
|<a name="multiadtypes"></a>MultiAdTypes|The audience full estimation ad type. Possible values indlude: *DisplayAds*, *StaticAds*, *VideoAds*.<br/><br/>**Add:** Optional.<br/>**Update:** Optional|**int**|
|<a name="placement"></a>Placement|Reserved.|[SelectionOflong](selectionoflong.md)|
|<a name="radiustargets"></a>RadiusTargets|Represents the desired geographical area in terms of miles/kilometers.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[RadiusTarget](radiustarget.md) array|
|<a name="startdate"></a>StartDate|The start date of the date range that identifies the data that you want to use to determine the audience full estimation.<br/><br/>This date must be earlier than or the same as the specified end date.|**dateTime**|
|<a name="topic"></a>Topic|Reserved.|[SelectionOflong](selectionoflong.md)|
|<a name="totalbudget"></a>TotalBudget|The total budget.|**decimal**|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header-rest.md)]

## <a name="response"></a>Response Elements
The *GetAudienceFullEstimationResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response JSON](#response-json).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="currency"></a>Currency|The currency of *DailyBudget* and *Bid*. If null, the currency of account setting will be used.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[Currency](currency.md)|
|<a name="estaudiencesize"></a>EstAudienceSize|Monthly estimated reach user count with rounded results. Output only.|[RangeResultOfDecimalRoundedResult](rangeresultofdecimalroundedresult.md)|
|<a name="estclick"></a>EstClick|Monthly estimated user count with range result. Output only.|[RangeResultOfDecimalRoundedResult](rangeresultofdecimalroundedresult.md)|
|<a name="estclickbytype"></a>EstClickByType|The estimated user count by type.|[DecimalRoundedRangeResultByType](decimalroundedrangeresultbytype.md) array|
|<a name="estcostperevent"></a>EstCostPerEvent|Indicates the estimated cost per event. The field meaning varies with *CampaignBiddingStrategy* request field. Output only.<br/><br/>EnhancedCPC: CPC<br/>ManualCPM: CPM|[RangeResultOfDecimalRoundedResult](rangeresultofdecimalroundedresult.md)|
|<a name="estcostpereventbytype"></a>EstCostPerEventByType|The estimated cost per event by type.|[DecimalRoundedRangeResultByType](decimalroundedrangeresultbytype.md) array|
|<a name="estcpcbytype"></a>EstCPCByType|The estimated cost per click by type.|[DecimalRoundedRangeResultByType](decimalroundedrangeresultbytype.md) array|
|<a name="estctr"></a>EstCTR|Estimated click-through rate (CTR) with range result. Output only.|[RangeResultOfdouble](rangeresultofdouble.md)|
|<a name="estctrbytype"></a>EstCTRByType|The estimated click-through rate by type.|[RangeResultByTypeOfdouble](rangeresultbytypeofdouble.md) array|
|<a name="estimpression"></a>EstImpression|Monthly estimated impression with range result. Output only.|[RangeResultOfDecimalRoundedResult](rangeresultofdecimalroundedresult.md)|
|<a name="estimpressionbytype"></a>EstImpressionByType|The estimated impressions by type.|[DecimalRoundedRangeResultByType](decimalroundedrangeresultbytype.md) array|
|<a name="estreachaudiencesize"></a>EstReachAudienceSize|Monthly estimated user count with range result. Output only.|[DecimalRoundedResult](decimalroundedresult.md)|
|<a name="estreachimpression"></a>EstReachImpression|Monthly estimated impression with range result. Output only.|[DecimalRoundedResult](decimalroundedresult.md)|
|<a name="estreachimpressionbytype"></a>EstReachImpressionByType|The estimated reach of impressions by type.|[DecimalRoundedByType](decimalroundedbytype.md) array|
|<a name="estspend"></a>EstSpend|Monthly estimated spend with range result. Output only.|[RangeResultOfDecimalRoundedResult](rangeresultofdecimalroundedresult.md)|
|<a name="estspendbytype"></a>EstSpendByType|The estimated spend by type.|[DecimalRoundedRangeResultByType](decimalroundedrangeresultbytype.md) array|
|<a name="estviewbytype"></a>EstViewByType|The estimated views by type.|[DecimalRoundedRangeResultByType](decimalroundedrangeresultbytype.md) array|
|<a name="eventslosttobid"></a>EventsLostToBid|Indicates event lost count due to insufficient input bid. The event lost type varies with *CampaignBiddingStrategy* request field. Output only.<br/><br/>EnhancedCPC: Click<br/>ManualCPM: Impression|**int**|
|<a name="eventslosttobudget"></a>EventsLostToBudget|Indicates the event lost count due to insufficient input budget. The event lost type varies with *CampaignBiddingStrategy* request field. Output only.<br/><br/>EnhancedCPC: Click<br/>ManualCPM: Impression|**int**|
|<a name="suggestedbid"></a>SuggestedBid|Suggested bid value under the current targeting. Output only.|**decimal**|
|<a name="suggestedbudget"></a>SuggestedBudget|Suggested daily budget value under the current targeting and bid. Output only.|**decimal**|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-json"></a>Request JSON
This template was generated by a tool to show the [body](#request-body) and [header](#request-header) elements for the JSON request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```json
{
  "Age": {
    "Excludes": [
      "ValueHere"
    ],
    "Includes": [
      "ValueHere"
    ]
  },
  "Gender": {
    "Excludes": [
      "ValueHere"
    ],
    "Includes": [
      "ValueHere"
    ]
  },
  "Audience": {
    "Excludes": [
      "LongValueHere"
    ],
    "Includes": [
      "LongValueHere"
    ]
  },
  "Company": {
    "Excludes": [
      "LongValueHere"
    ],
    "Includes": [
      "LongValueHere"
    ]
  },
  "Industry": {
    "Excludes": [
      "LongValueHere"
    ],
    "Includes": [
      "LongValueHere"
    ]
  },
  "JobFunction": {
    "Excludes": [
      "LongValueHere"
    ],
    "Includes": [
      "LongValueHere"
    ]
  },
  "Location": {
    "Excludes": [
      "LongValueHere"
    ],
    "Includes": [
      "LongValueHere"
    ]
  },
  "Placement": {
    "Excludes": [
      "LongValueHere"
    ],
    "Includes": [
      "LongValueHere"
    ]
  },
  "Device": {
    "Excludes": [
      "ValueHere"
    ],
    "Includes": [
      "ValueHere"
    ]
  },
  "Topic": {
    "Excludes": [
      "LongValueHere"
    ],
    "Includes": [
      "LongValueHere"
    ]
  },
  "RadiusTargets": [
    {
      "CenterLatitude": DoubleValueHere,
      "CenterLongitude": DoubleValueHere,
      "Radius": IntValueHere,
      "RadiusUnit": "ValueHere"
    }
  ],
  "CampaignBiddingStrategy": IntValueHere,
  "CampaignSubType": IntValueHere,
  "Feed": {
    "FeedId": "LongValueHere",
    "FeedType": "LongValueHere",
    "StoreId": "LongValueHere"
  },
  "DailyBudget": DecimalValueHere,
  "Bid": DecimalValueHere,
  "Currency": "ValueHere",
  "MultiAdTypes": IntValueHere,
  "StartDate": "ValueHere",
  "EndDate": "ValueHere",
  "TotalBudget": DecimalValueHere,
  "IncludeImpressionsBreakdown": "ValueHere"
}
```

## <a name="response-json"></a>Response JSON
This template was generated by a tool to show the [body](#response-body) and [header](#response-header) elements for the JSON response.

```json
{
  "EstImpression": {
    "High": {
      "Unit": "ValueHere",
      "Value": DoubleValueHere
    },
    "Low": {
      "Unit": "ValueHere",
      "Value": DoubleValueHere
    }
  },
  "EstAudienceSize": {
    "High": {
      "Unit": "ValueHere",
      "Value": DoubleValueHere
    },
    "Low": {
      "Unit": "ValueHere",
      "Value": DoubleValueHere
    }
  },
  "EstClick": {
    "High": {
      "Unit": "ValueHere",
      "Value": DoubleValueHere
    },
    "Low": {
      "Unit": "ValueHere",
      "Value": DoubleValueHere
    }
  },
  "EstSpend": {
    "High": {
      "Unit": "ValueHere",
      "Value": DoubleValueHere
    },
    "Low": {
      "Unit": "ValueHere",
      "Value": DoubleValueHere
    }
  },
  "EstCostPerEvent": {
    "High": {
      "Unit": "ValueHere",
      "Value": DoubleValueHere
    },
    "Low": {
      "Unit": "ValueHere",
      "Value": DoubleValueHere
    }
  },
  "EstCTR": {
    "High": DoubleValueHere,
    "Low": DoubleValueHere
  },
  "SuggestedBid": DecimalValueHere,
  "SuggestedBudget": DecimalValueHere,
  "EventsLostToBid": IntValueHere,
  "EventsLostToBudget": IntValueHere,
  "EstReachAudienceSize": {
    "Unit": "ValueHere",
    "Value": DoubleValueHere
  },
  "EstReachImpression": {
    "Unit": "ValueHere",
    "Value": DoubleValueHere
  },
  "Currency": "ValueHere",
  "EstImpressionByType": [
    ""
  ],
  "EstClickByType": [
    ""
  ],
  "EstSpendByType": [
    ""
  ],
  "EstCostPerEventByType": [
    ""
  ],
  "EstCPCByType": [
    ""
  ],
  "EstViewByType": [
    ""
  ],
  "EstCTRByType": [
    ""
  ],
  "EstReachImpressionByType": [
    ""
  ]
}
```

## <a name="example"></a>Code Syntax
To call REST API through SDKs, you need to upgrade SDK to a certain version and configure the system parameters.The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md).
See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<GetAudienceFullEstimationResponse> GetAudienceFullEstimationAsync(
	SelectionOfAgeEnum age,
	SelectionOfGenderEnum gender,
	SelectionOflong audience,
	SelectionOflong company,
	SelectionOflong industry,
	SelectionOflong jobFunction,
	SelectionOflong location,
	SelectionOflong placement,
	SelectionOfDeviceEnum device,
	SelectionOflong topic,
	IList<RadiusTarget> radiusTargets,
	int? campaignBiddingStrategy,
	int? campaignSubType,
	Feed feed,
	decimal? dailyBudget,
	decimal? bid,
	Currency? currency,
	int? multiAdTypes,
	DateTime? startDate,
	DateTime? endDate,
	decimal? totalBudget,
	bool? includeImpressionsBreakdown)
{
	var request = new GetAudienceFullEstimationRequest
	{
		Age = age,
		Gender = gender,
		Audience = audience,
		Company = company,
		Industry = industry,
		JobFunction = jobFunction,
		Location = location,
		Placement = placement,
		Device = device,
		Topic = topic,
		RadiusTargets = radiusTargets,
		CampaignBiddingStrategy = campaignBiddingStrategy,
		CampaignSubType = campaignSubType,
		Feed = feed,
		DailyBudget = dailyBudget,
		Bid = bid,
		Currency = currency,
		MultiAdTypes = multiAdTypes,
		StartDate = startDate,
		EndDate = endDate,
		TotalBudget = totalBudget,
		IncludeImpressionsBreakdown = includeImpressionsBreakdown
	};

	return (await AdInsightService.CallAsync((s, r) => s.GetAudienceFullEstimationAsync(r), request));
}
```
```java
static GetAudienceFullEstimationResponse getAudienceFullEstimation(
	SelectionOfAgeEnum age,
	SelectionOfGenderEnum gender,
	SelectionOflong audience,
	SelectionOflong company,
	SelectionOflong industry,
	SelectionOflong jobFunction,
	SelectionOflong location,
	SelectionOflong placement,
	SelectionOfDeviceEnum device,
	SelectionOflong topic,
	ArrayOfRadiusTarget radiusTargets,
	int campaignBiddingStrategy,
	int campaignSubType,
	Feed feed,
	decimal dailyBudget,
	decimal bid,
	Currency currency,
	int multiAdTypes,
	Calendar startDate,
	Calendar endDate,
	decimal totalBudget,
	boolean includeImpressionsBreakdown) throws RemoteException, Exception
{
	GetAudienceFullEstimationRequest request = new GetAudienceFullEstimationRequest();

	request.setAge(age);
	request.setGender(gender);
	request.setAudience(audience);
	request.setCompany(company);
	request.setIndustry(industry);
	request.setJobFunction(jobFunction);
	request.setLocation(location);
	request.setPlacement(placement);
	request.setDevice(device);
	request.setTopic(topic);
	request.setRadiusTargets(radiusTargets);
	request.setCampaignBiddingStrategy(campaignBiddingStrategy);
	request.setCampaignSubType(campaignSubType);
	request.setFeed(feed);
	request.setDailyBudget(dailyBudget);
	request.setBid(bid);
	request.setCurrency(currency);
	request.setMultiAdTypes(multiAdTypes);
	request.setStartDate(startDate);
	request.setEndDate(endDate);
	request.setTotalBudget(totalBudget);
	request.setIncludeImpressionsBreakdown(includeImpressionsBreakdown);

	return AdInsightService.getService().getAudienceFullEstimation(request);
}
```
```php
static function GetAudienceFullEstimation(
	$age,
	$gender,
	$audience,
	$company,
	$industry,
	$jobFunction,
	$location,
	$placement,
	$device,
	$topic,
	$radiusTargets,
	$campaignBiddingStrategy,
	$campaignSubType,
	$feed,
	$dailyBudget,
	$bid,
	$currency,
	$multiAdTypes,
	$startDate,
	$endDate,
	$totalBudget,
	$includeImpressionsBreakdown)
{

	$GLOBALS['Proxy'] = $GLOBALS['AdInsightProxy'];

	$request = new GetAudienceFullEstimationRequest();

	$request->Age = $age;
	$request->Gender = $gender;
	$request->Audience = $audience;
	$request->Company = $company;
	$request->Industry = $industry;
	$request->JobFunction = $jobFunction;
	$request->Location = $location;
	$request->Placement = $placement;
	$request->Device = $device;
	$request->Topic = $topic;
	$request->RadiusTargets = $radiusTargets;
	$request->CampaignBiddingStrategy = $campaignBiddingStrategy;
	$request->CampaignSubType = $campaignSubType;
	$request->Feed = $feed;
	$request->DailyBudget = $dailyBudget;
	$request->Bid = $bid;
	$request->Currency = $currency;
	$request->MultiAdTypes = $multiAdTypes;
	$request->StartDate = $startDate;
	$request->EndDate = $endDate;
	$request->TotalBudget = $totalBudget;
	$request->IncludeImpressionsBreakdown = $includeImpressionsBreakdown;

	return $GLOBALS['AdInsightProxy']->GetService()->GetAudienceFullEstimation($request);
}
```
```python
response=adinsight_service.GetAudienceFullEstimation(
	Age=Age,
	Gender=Gender,
	Audience=Audience,
	Company=Company,
	Industry=Industry,
	JobFunction=JobFunction,
	Location=Location,
	Placement=Placement,
	Device=Device,
	Topic=Topic,
	RadiusTargets=RadiusTargets,
	CampaignBiddingStrategy=CampaignBiddingStrategy,
	CampaignSubType=CampaignSubType,
	Feed=Feed,
	DailyBudget=DailyBudget,
	Bid=Bid,
	Currency=Currency,
	MultiAdTypes=MultiAdTypes,
	StartDate=StartDate,
	EndDate=EndDate,
	TotalBudget=TotalBudget,
	IncludeImpressionsBreakdown=IncludeImpressionsBreakdown)
```

::: zone-end
