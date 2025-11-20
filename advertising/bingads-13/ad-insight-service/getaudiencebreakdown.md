---
title: GetAudienceBreakdown Service Operation - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
zone_pivot_groups: api-reference
description: Gets the audience breakdown.
dev_langs: 
- csharp
- java
- php
- python
---
# GetAudienceBreakdown Service Operation - Ad Insight
Gets the audience breakdown.

::: zone pivot="soap"

## <a name="request"></a>Request Elements
The *GetAudienceBreakdownRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request. The elements must be in the same order as shown in the [Request SOAP](#request-soap). 

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="age"></a>Age|The selection of age targeting. Possible values are: *EighteenToTwentyFour*, *TwentyFiveToThirtyFour*, *ThirtyFiveToFourtyNine*, *FiftyToSixtyFour*, *SixtyFiveAndAbove*, *Unknown*.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[SelectionOfAgeEnum](selectionofageenum.md)|
|<a name="audience"></a>Audience|The selection of audience targeting. Supported audience types are: Custom audiences, Combined lists, Customer match lists, Dynamic remarketing lists, In-market audiences, Remarketing lists, and Similar audiences. The values stored in the selection refer to segment IDs.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[SelectionOflong](selectionoflong.md)|
|<a name="breakdownreturncategory"></a>BreakdownReturnCategory|The category of audience breakdown. Possible values include: *All*,  *Demographics*, *Device*, *Location*, *Interest*.<br/><br/>**Add:** Optional.<br/>**Update:** Optional|[BreakdownCategory](breakdowncategory.md)|
|<a name="campaignbiddingstrategy"></a>CampaignBiddingStrategy|Indicates the desired bidding strategy for estimation response. Supported values are: *5: EnhancedCPC*, *12: ManualCP*.<br/><br/>**Add:** Optional. The default value is *Manual*. <br/>**Update:** Optional|**int**|
|<a name="campaignsubtype"></a>CampaignSubType|Indicate the desired ad type for estimation response. Supported values are: *0: StaticAds, *1: FeedBasedAds*, *2: DynamicFeedBasedAds*.<br/><br/>**Add:** Optional. The default value is *StaticAds*. <br/>**Update:** Optional|**int**|
|<a name="company"></a>Company|The company of LinkedIn profile targeting. The values stored in the selection refer to segment IDs.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[SelectionOflong](selectionoflong.md)|
|<a name="device"></a>Device|The type of device.|[SelectionOfDeviceEnum](selectionofdeviceenum.md)|
|<a name="feed"></a>Feed|Respect this parameter only when CampaignSubType is *FeedBasedAds* or *DynamicFeedBasedAds*. It specifies the desired feed traffic to count as estimation.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[Feed](feed.md)|
|<a name="gender"></a>Gender|The gender to target. Possible values are: *Male*, *Female*, *Unknown*.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[SelectionOfGenderEnum](selectionofgenderenum.md)|
|<a name="industry"></a>Industry|The industry of LinkedIn profile targeting. The values stored in the selection refer to segment IDs.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[SelectionOflong](selectionoflong.md)|
|<a name="jobfunction"></a>JobFunction|The job function The industry of LinkedIn profile targeting. The values stored in the selection refer to segment IDs.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[SelectionOflong](selectionoflong.md)|
|<a name="lcid"></a>Lcid|The locale identifier.<br/><br/>**Add:** Optional.<br/>**Update:** Optional|**int**|
|<a name="location"></a>Location|The selection of location targeting. The values stored in selection refer to location IDs.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[SelectionOflong](selectionoflong.md)|
|<a name="multiadtypes"></a>MultiAdTypes|The audience breakdown ad type. Possible values indlude: *DisplayAds*, *StaticAds*, *VideoAds*.<br/><br/>**Add:** Optional.<br/>**Update:** Optional|**int**|
|<a name="placement"></a>Placement|Reserved.|[SelectionOflong](selectionoflong.md)|
|<a name="radiustargets"></a>RadiusTargets|Represents the desired geographical area in terms of miles/kilometers.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[RadiusTarget](radiustarget.md) array|
|<a name="topic"></a>Topic|Reserved.|[SelectionOflong](selectionoflong.md)|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header.md)]

## <a name="response"></a>Response Elements
The *GetAudienceBreakdownResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response SOAP](#response-soap).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="breakdowns"></a>Breakdowns|The audience breakdown categories.|[Breakdowns](breakdowns.md)|
|<a name="currency"></a>Currency|The currency of *DailyBudget* and *Bid*. If null, the currency of account setting will be used.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[Currency](currency.md)|
|<a name="estaudiencesize"></a>EstAudienceSize|Monthly estimated reach user count with rounded results. Output only.|[DecimalRoundedResult](decimalroundedresult.md)|
|<a name="estimpression"></a>EstImpression|Monthly estimated impression with range result. Output only.|[DecimalRoundedResult](decimalroundedresult.md)|
|<a name="isimpressiontoospecific"></a>IsImpressionTooSpecific|Indicates if the impression is too specific.|**boolean**|
|<a name="isprivacycheckpassed"></a>IsPrivacyCheckPassed|Indicates if the estimated audience size passes the privacy check.|**boolean**|
|<a name="suggestedbid"></a>SuggestedBid|Suggested bid value under the current targeting. Output only.|**decimal**|

### <a name="response-header"></a>Response Header Elements
[!INCLUDE[response-header](./includes/response-header.md)]

## <a name="request-soap"></a>Request SOAP
This template was generated by a tool to show the [order](../guides/services-protocol.md#element-order) of the [body](#request-body) and [header](#request-header) elements for the SOAP request. For supported types that you can use with this service operation, see the [Request Body Elements](#request-body) reference above.

```xml
<s:Envelope xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
  <s:Header xmlns="https://bingads.microsoft.com/AdInsight/v13">
    <Action mustUnderstand="1">GetAudienceBreakdown</Action>
    <AuthenticationToken i:nil="false">ValueHere</AuthenticationToken>
    <CustomerAccountId i:nil="false">ValueHere</CustomerAccountId>
    <CustomerId i:nil="false">ValueHere</CustomerId>
    <DeveloperToken i:nil="false">ValueHere</DeveloperToken>
  </s:Header>
  <s:Body>
    <GetAudienceBreakdownRequest xmlns="https://bingads.microsoft.com/AdInsight/v13">
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
      <Lcid i:nil="false">ValueHere</Lcid>
      <BreakdownReturnCategory>ValueHere</BreakdownReturnCategory>
      <MultiAdTypes i:nil="false">ValueHere</MultiAdTypes>
    </GetAudienceBreakdownRequest>
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
    <GetAudienceBreakdownResponse xmlns="https://bingads.microsoft.com/AdInsight/v13">
      <EstAudienceSize d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <Value d4p1:nil="false">ValueHere</Value>
        <Unit d4p1:nil="false">ValueHere</Unit>
      </EstAudienceSize>
      <EstImpression d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <Value d4p1:nil="false">ValueHere</Value>
        <Unit d4p1:nil="false">ValueHere</Unit>
      </EstImpression>
      <IsImpressionTooSpecific d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">ValueHere</IsImpressionTooSpecific>
      <IsPrivacyCheckPassed d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">ValueHere</IsPrivacyCheckPassed>
      <SuggestedBid d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">ValueHere</SuggestedBid>
      <Currency d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">ValueHere</Currency>
      <Breakdowns d4p1:nil="false" xmlns:d4p1="http://www.w3.org/2001/XMLSchema-instance">
        <Age d4p1:nil="false" d4p1:type="-- derived type specified here with the appropriate prefix --">
          <Keys d4p1:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
            <a1:string>ValueHere</a1:string>
          </Keys>
          <Values d4p1:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
            <a1:int>ValueHere</a1:int>
          </Values>
          <GlobalValues d4p1:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
            <a1:int>ValueHere</a1:int>
          </GlobalValues>
          <!--This field is applicable if the derived type attribute is set to LocationBreakdown-->
          <Info d4p1:nil="false">
            <LocationInfo>
              <Name d4p1:nil="false">ValueHere</Name>
            </LocationInfo>
          </Info>
        </Age>
        <Device d4p1:nil="false" d4p1:type="-- derived type specified here with the appropriate prefix --">
          <Keys d4p1:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
            <a1:string>ValueHere</a1:string>
          </Keys>
          <Values d4p1:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
            <a1:int>ValueHere</a1:int>
          </Values>
          <GlobalValues d4p1:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
            <a1:int>ValueHere</a1:int>
          </GlobalValues>
          <!--This field is applicable if the derived type attribute is set to LocationBreakdown-->
          <Info d4p1:nil="false">
            <LocationInfo>
              <Name d4p1:nil="false">ValueHere</Name>
            </LocationInfo>
          </Info>
        </Device>
        <Gender d4p1:nil="false" d4p1:type="-- derived type specified here with the appropriate prefix --">
          <Keys d4p1:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
            <a1:string>ValueHere</a1:string>
          </Keys>
          <Values d4p1:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
            <a1:int>ValueHere</a1:int>
          </Values>
          <GlobalValues d4p1:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
            <a1:int>ValueHere</a1:int>
          </GlobalValues>
          <!--This field is applicable if the derived type attribute is set to LocationBreakdown-->
          <Info d4p1:nil="false">
            <LocationInfo>
              <Name d4p1:nil="false">ValueHere</Name>
            </LocationInfo>
          </Info>
        </Gender>
        <InMarket d4p1:nil="false" d4p1:type="-- derived type specified here with the appropriate prefix --">
          <Keys d4p1:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
            <a1:string>ValueHere</a1:string>
          </Keys>
          <Values d4p1:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
            <a1:int>ValueHere</a1:int>
          </Values>
          <GlobalValues d4p1:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
            <a1:int>ValueHere</a1:int>
          </GlobalValues>
          <!--This field is applicable if the derived type attribute is set to LocationBreakdown-->
          <Info d4p1:nil="false">
            <LocationInfo>
              <Name d4p1:nil="false">ValueHere</Name>
            </LocationInfo>
          </Info>
        </InMarket>
        <Industry d4p1:nil="false" d4p1:type="-- derived type specified here with the appropriate prefix --">
          <Keys d4p1:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
            <a1:string>ValueHere</a1:string>
          </Keys>
          <Values d4p1:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
            <a1:int>ValueHere</a1:int>
          </Values>
          <GlobalValues d4p1:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
            <a1:int>ValueHere</a1:int>
          </GlobalValues>
          <!--This field is applicable if the derived type attribute is set to LocationBreakdown-->
          <Info d4p1:nil="false">
            <LocationInfo>
              <Name d4p1:nil="false">ValueHere</Name>
            </LocationInfo>
          </Info>
        </Industry>
        <JobFunction d4p1:nil="false" d4p1:type="-- derived type specified here with the appropriate prefix --">
          <Keys d4p1:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
            <a1:string>ValueHere</a1:string>
          </Keys>
          <Values d4p1:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
            <a1:int>ValueHere</a1:int>
          </Values>
          <GlobalValues d4p1:nil="false" xmlns:a1="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
            <a1:int>ValueHere</a1:int>
          </GlobalValues>
          <!--This field is applicable if the derived type attribute is set to LocationBreakdown-->
          <Info d4p1:nil="false">
            <LocationInfo>
              <Name d4p1:nil="false">ValueHere</Name>
            </LocationInfo>
          </Info>
        </JobFunction>
        <LocationCountry d4p1:nil="false">
          <Info d4p1:nil="false">
            <LocationInfo>
              <Name d4p1:nil="false">ValueHere</Name>
            </LocationInfo>
          </Info>
        </LocationCountry>
        <Location d4p1:nil="false">
          <Info d4p1:nil="false">
            <LocationInfo>
              <Name d4p1:nil="false">ValueHere</Name>
            </LocationInfo>
          </Info>
        </Location>
        <LocationSubGeography d4p1:nil="false">
          <Info d4p1:nil="false">
            <LocationInfo>
              <Name d4p1:nil="false">ValueHere</Name>
            </LocationInfo>
          </Info>
        </LocationSubGeography>
        <LocationMetroArea d4p1:nil="false">
          <Info d4p1:nil="false">
            <LocationInfo>
              <Name d4p1:nil="false">ValueHere</Name>
            </LocationInfo>
          </Info>
        </LocationMetroArea>
        <LocationCity d4p1:nil="false">
          <Info d4p1:nil="false">
            <LocationInfo>
              <Name d4p1:nil="false">ValueHere</Name>
            </LocationInfo>
          </Info>
        </LocationCity>
        <LocationPostalCode d4p1:nil="false">
          <Info d4p1:nil="false">
            <LocationInfo>
              <Name d4p1:nil="false">ValueHere</Name>
            </LocationInfo>
          </Info>
        </LocationPostalCode>
        <LocationCounty d4p1:nil="false">
          <Info d4p1:nil="false">
            <LocationInfo>
              <Name d4p1:nil="false">ValueHere</Name>
            </LocationInfo>
          </Info>
        </LocationCounty>
      </Breakdowns>
    </GetAudienceBreakdownResponse>
  </s:Body>
</s:Envelope>
```

## <a name="example"></a>Code Syntax
The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md). See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<GetAudienceBreakdownResponse> GetAudienceBreakdownAsync(
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
	int? lcid,
	BreakdownCategory breakdownReturnCategory,
	int? multiAdTypes)
{
	var request = new GetAudienceBreakdownRequest
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
		Lcid = lcid,
		BreakdownReturnCategory = breakdownReturnCategory,
		MultiAdTypes = multiAdTypes
	};

	return (await AdInsightService.CallAsync((s, r) => s.GetAudienceBreakdownAsync(r), request));
}
```
```java
static GetAudienceBreakdownResponse getAudienceBreakdown(
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
	int lcid,
	BreakdownCategory breakdownReturnCategory,
	int multiAdTypes) throws RemoteException, Exception
{
	GetAudienceBreakdownRequest request = new GetAudienceBreakdownRequest();

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
	request.setLcid(lcid);
	request.setBreakdownReturnCategory(breakdownReturnCategory);
	request.setMultiAdTypes(multiAdTypes);

	return AdInsightService.getService().getAudienceBreakdown(request);
}
```
```php
static function GetAudienceBreakdown(
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
	$lcid,
	$breakdownReturnCategory,
	$multiAdTypes)
{

	$GLOBALS['Proxy'] = $GLOBALS['AdInsightProxy'];

	$request = new GetAudienceBreakdownRequest();

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
	$request->Lcid = $lcid;
	$request->BreakdownReturnCategory = $breakdownReturnCategory;
	$request->MultiAdTypes = $multiAdTypes;

	return $GLOBALS['AdInsightProxy']->GetService()->GetAudienceBreakdown($request);
}
```
```python
response=adinsight_service.GetAudienceBreakdown(
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
	Lcid=Lcid,
	BreakdownReturnCategory=BreakdownReturnCategory,
	MultiAdTypes=MultiAdTypes)
```

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

::: zone-end

::: zone pivot="rest"

## <a name="url"></a>Request Url

# [Production URL](#tab/prod)

```POST
https://adinsight.api.bingads.microsoft.com/AdInsight/v13/AudienceBreakdown/Query
```

# [Sandbox URL](#tab/sandbox)

```POST
https://adinsight.api.sandbox.bingads.microsoft.com/AdInsight/v13/AudienceBreakdown/Query
```

-----

## <a name="request"></a>Request Elements
The *GetAudienceBreakdownRequest* object defines the [body](#request-body) and [header](#request-header) elements of the service operation request.

> [!NOTE]
> Unless otherwise noted below, all request elements are required.

### <a name="request-body"></a>Request Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="age"></a>Age|The selection of age targeting. Possible values are: *EighteenToTwentyFour*, *TwentyFiveToThirtyFour*, *ThirtyFiveToFourtyNine*, *FiftyToSixtyFour*, *SixtyFiveAndAbove*, *Unknown*.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[SelectionOfAgeEnum](selectionofageenum.md)|
|<a name="audience"></a>Audience|The selection of audience targeting. Supported audience types are: Custom audiences, Combined lists, Customer match lists, Dynamic remarketing lists, In-market audiences, Remarketing lists, and Similar audiences. The values stored in the selection refer to segment IDs.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[SelectionOflong](selectionoflong.md)|
|<a name="breakdownreturncategory"></a>BreakdownReturnCategory|The category of audience breakdown. Possible values include: *All*,  *Demographics*, *Device*, *Location*, *Interest*.<br/><br/>**Add:** Optional.<br/>**Update:** Optional|[BreakdownCategory](breakdowncategory.md)|
|<a name="campaignbiddingstrategy"></a>CampaignBiddingStrategy|Indicates the desired bidding strategy for estimation response. Supported values are: *5: EnhancedCPC*, *12: ManualCP*.<br/><br/>**Add:** Optional. The default value is *Manual*. <br/>**Update:** Optional|**int**|
|<a name="campaignsubtype"></a>CampaignSubType|Indicate the desired ad type for estimation response. Supported values are: *0: StaticAds, *1: FeedBasedAds*, *2: DynamicFeedBasedAds*.<br/><br/>**Add:** Optional. The default value is *StaticAds*. <br/>**Update:** Optional|**int**|
|<a name="company"></a>Company|The company of LinkedIn profile targeting. The values stored in the selection refer to segment IDs.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[SelectionOflong](selectionoflong.md)|
|<a name="device"></a>Device|The type of device.|[SelectionOfDeviceEnum](selectionofdeviceenum.md)|
|<a name="feed"></a>Feed|Respect this parameter only when CampaignSubType is *FeedBasedAds* or *DynamicFeedBasedAds*. It specifies the desired feed traffic to count as estimation.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[Feed](feed.md)|
|<a name="gender"></a>Gender|The gender to target. Possible values are: *Male*, *Female*, *Unknown*.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[SelectionOfGenderEnum](selectionofgenderenum.md)|
|<a name="industry"></a>Industry|The industry of LinkedIn profile targeting. The values stored in the selection refer to segment IDs.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[SelectionOflong](selectionoflong.md)|
|<a name="jobfunction"></a>JobFunction|The job function The industry of LinkedIn profile targeting. The values stored in the selection refer to segment IDs.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[SelectionOflong](selectionoflong.md)|
|<a name="lcid"></a>Lcid|The locale identifier.<br/><br/>**Add:** Optional.<br/>**Update:** Optional|**int**|
|<a name="location"></a>Location|The selection of location targeting. The values stored in selection refer to location IDs.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[SelectionOflong](selectionoflong.md)|
|<a name="multiadtypes"></a>MultiAdTypes|The audience breakdown ad type. Possible values indlude: *DisplayAds*, *StaticAds*, *VideoAds*.<br/><br/>**Add:** Optional.<br/>**Update:** Optional|**int**|
|<a name="placement"></a>Placement|Reserved.|[SelectionOflong](selectionoflong.md)|
|<a name="radiustargets"></a>RadiusTargets|Represents the desired geographical area in terms of miles/kilometers.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[RadiusTarget](radiustarget.md) array|
|<a name="topic"></a>Topic|Reserved.|[SelectionOflong](selectionoflong.md)|

### <a name="request-header"></a>Request Header Elements
[!INCLUDE[request-header](./includes/request-header-rest.md)]

## <a name="response"></a>Response Elements
The *GetAudienceBreakdownResponse* object defines the [body](#response-body) and [header](#response-header) elements of the service operation response. The elements are returned in the same order as shown in the [Response JSON](#response-json).

### <a name="response-body"></a>Response Body Elements

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="breakdowns"></a>Breakdowns|The audience breakdown categories.|[Breakdowns](breakdowns.md)|
|<a name="currency"></a>Currency|The currency of *DailyBudget* and *Bid*. If null, the currency of account setting will be used.<br/><br/>**Add:** Optional. The default value is *null*. <br/>**Update:** Optional|[Currency](currency.md)|
|<a name="estaudiencesize"></a>EstAudienceSize|Monthly estimated reach user count with rounded results. Output only.|[DecimalRoundedResult](decimalroundedresult.md)|
|<a name="estimpression"></a>EstImpression|Monthly estimated impression with range result. Output only.|[DecimalRoundedResult](decimalroundedresult.md)|
|<a name="isimpressiontoospecific"></a>IsImpressionTooSpecific|Indicates if the impression is too specific.|**boolean**|
|<a name="isprivacycheckpassed"></a>IsPrivacyCheckPassed|Indicates if the estimated audience size passes the privacy check.|**boolean**|
|<a name="suggestedbid"></a>SuggestedBid|Suggested bid value under the current targeting. Output only.|**decimal**|

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
  "Lcid": IntValueHere,
  "BreakdownReturnCategory": "ValueHere",
  "MultiAdTypes": IntValueHere
}
```

## <a name="response-json"></a>Response JSON
This template was generated by a tool to show the [body](#response-body) and [header](#response-header) elements for the JSON response.

Below is an example that is applicable if the type of [Breakdown](breakdown.md) is [LocationBreakdown](locationbreakdown.md).

```json
{
  "EstAudienceSize": {
    "Unit": "ValueHere",
    "Value": DoubleValueHere
  },
  "EstImpression": {
    "Unit": "ValueHere",
    "Value": DoubleValueHere
  },
  "IsImpressionTooSpecific": "ValueHere",
  "IsPrivacyCheckPassed": "ValueHere",
  "SuggestedBid": DecimalValueHere,
  "Currency": "ValueHere",
  "Breakdowns": {
    "Age": {
      "GlobalValues": [
        IntValueHere
      ],
      "Keys": [
        "ValueHere"
      ],
      "Values": [
        IntValueHere
      ],
      "Type": "LocationBreakdown",
      "Info": [
        {
          "Name": "ValueHere"
        }
      ]
    },
    "Device": {
      "GlobalValues": [
        IntValueHere
      ],
      "Keys": [
        "ValueHere"
      ],
      "Values": [
        IntValueHere
      ],
      "Type": "LocationBreakdown",
      "Info": [
        {
          "Name": "ValueHere"
        }
      ]
    },
    "Gender": {
      "GlobalValues": [
        IntValueHere
      ],
      "Keys": [
        "ValueHere"
      ],
      "Values": [
        IntValueHere
      ],
      "Type": "LocationBreakdown",
      "Info": [
        {
          "Name": "ValueHere"
        }
      ]
    },
    "Industry": {
      "GlobalValues": [
        IntValueHere
      ],
      "Keys": [
        "ValueHere"
      ],
      "Values": [
        IntValueHere
      ],
      "Type": "LocationBreakdown",
      "Info": [
        {
          "Name": "ValueHere"
        }
      ]
    },
    "InMarket": {
      "GlobalValues": [
        IntValueHere
      ],
      "Keys": [
        "ValueHere"
      ],
      "Values": [
        IntValueHere
      ],
      "Type": "LocationBreakdown",
      "Info": [
        {
          "Name": "ValueHere"
        }
      ]
    },
    "JobFunction": {
      "GlobalValues": [
        IntValueHere
      ],
      "Keys": [
        "ValueHere"
      ],
      "Values": [
        IntValueHere
      ],
      "Type": "LocationBreakdown",
      "Info": [
        {
          "Name": "ValueHere"
        }
      ]
    },
    "Location": {
      "Info": [
        {
          "Name": "ValueHere"
        }
      ]
    },
    "LocationCity": {
      "Info": [
        {
          "Name": "ValueHere"
        }
      ]
    },
    "LocationCountry": {
      "Info": [
        {
          "Name": "ValueHere"
        }
      ]
    },
    "LocationCounty": {
      "Info": [
        {
          "Name": "ValueHere"
        }
      ]
    },
    "LocationMetroArea": {
      "Info": [
        {
          "Name": "ValueHere"
        }
      ]
    },
    "LocationPostalCode": {
      "Info": [
        {
          "Name": "ValueHere"
        }
      ]
    },
    "LocationSubGeography": {
      "Info": [
        {
          "Name": "ValueHere"
        }
      ]
    }
  }
}
```

## <a name="example"></a>Code Syntax
To call REST API through SDKs, you need to upgrade SDK to a certain version and configure the system parameters.The example syntax can be used with [Bing Ads SDKs](../guides/client-libraries.md).
See [Bing Ads API Code Examples](../guides/code-examples.md) for more examples.
```csharp
public async Task<GetAudienceBreakdownResponse> GetAudienceBreakdownAsync(
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
	int? lcid,
	BreakdownCategory breakdownReturnCategory,
	int? multiAdTypes)
{
	var request = new GetAudienceBreakdownRequest
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
		Lcid = lcid,
		BreakdownReturnCategory = breakdownReturnCategory,
		MultiAdTypes = multiAdTypes
	};

	return (await AdInsightService.CallAsync((s, r) => s.GetAudienceBreakdownAsync(r), request));
}
```
```java
static GetAudienceBreakdownResponse getAudienceBreakdown(
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
	int lcid,
	BreakdownCategory breakdownReturnCategory,
	int multiAdTypes) throws RemoteException, Exception
{
	GetAudienceBreakdownRequest request = new GetAudienceBreakdownRequest();

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
	request.setLcid(lcid);
	request.setBreakdownReturnCategory(breakdownReturnCategory);
	request.setMultiAdTypes(multiAdTypes);

	return AdInsightService.getService().getAudienceBreakdown(request);
}
```
```php
static function GetAudienceBreakdown(
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
	$lcid,
	$breakdownReturnCategory,
	$multiAdTypes)
{

	$GLOBALS['Proxy'] = $GLOBALS['AdInsightProxy'];

	$request = new GetAudienceBreakdownRequest();

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
	$request->Lcid = $lcid;
	$request->BreakdownReturnCategory = $breakdownReturnCategory;
	$request->MultiAdTypes = $multiAdTypes;

	return $GLOBALS['AdInsightProxy']->GetService()->GetAudienceBreakdown($request);
}
```
```python
response=adinsight_service.GetAudienceBreakdown(
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
	Lcid=Lcid,
	BreakdownReturnCategory=BreakdownReturnCategory,
	MultiAdTypes=MultiAdTypes)
```

::: zone-end
