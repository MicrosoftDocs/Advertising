---
title: Campaign Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a campaign.
---
# Campaign Data Object - Campaign Management
Defines a campaign.  

> [!NOTE]
> You can no longer add, update, or retrieve campaigns that only support dynamic search ads. The campaign type of your existing campaigns has been updated from "DynamicSearchAds" to "Search". The ad groups are now considered "dynamic" ad groups, but there are no structural changes i.e., they contain the same auto targets and dynamic search ads as before.  

> [!NOTE]
> As of April 2021, the manual CPC bid strategy can only be used with audience campaigns and Lodging campaigns. If you attempt to set manual CPC for any other campaign type, the request will be ignored without error and the bid strategy will be set to enhanced CPC.
>  
> As of April 2021, you cannot set any bid strategies for ad groups or keywords. Bid strategies can only be set at the campaign level. If you attempt to set bid strategies for ad groups or keywords, the request will be ignored without error. Ad groups and keywords will inherit their campaign's bid strategy.  

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="Campaign" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AudienceAdsBidAdjustment" nillable="true" type="xs:int" />
    <xs:element minOccurs="0" name="BiddingScheme" nillable="true" type="tns:BiddingScheme" />
    <xs:element minOccurs="0" name="BudgetType" nillable="true" type="tns:BudgetLimitType" />
    <xs:element minOccurs="0" name="DailyBudget" nillable="true" type="xs:double" />
    <xs:element xmlns:q9="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="DealIds" nillable="true" type="q9:ArrayOflong">
      <xs:annotation>
        <xs:appinfo>
          <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
        </xs:appinfo>
      </xs:annotation>
    </xs:element>
    <xs:element minOccurs="0" name="EndDate" nillable="true" type="xs:dateTime">
      <xs:annotation>
        <xs:appinfo>
          <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
        </xs:appinfo>
      </xs:annotation>
    </xs:element>
    <xs:element minOccurs="0" name="ExperimentId" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="FinalUrlSuffix" nillable="true" type="xs:string" />
    <xs:element xmlns:q10="http://schemas.datacontract.org/2004/07/System.Collections.Generic" minOccurs="0" name="ForwardCompatibilityMap" nillable="true" type="q10:ArrayOfKeyValuePairOfstringstring" />
    <xs:element xmlns:q11="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="GoalIds" nillable="true" type="q11:ArrayOflong">
      <xs:annotation>
        <xs:appinfo>
          <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
        </xs:appinfo>
      </xs:annotation>
    </xs:element>
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="IsDealCampaign" nillable="true" type="xs:boolean">
      <xs:annotation>
        <xs:appinfo>
          <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
        </xs:appinfo>
      </xs:annotation>
    </xs:element>
    <xs:element minOccurs="0" name="MultimediaAdsBidAdjustment" nillable="true" type="xs:int">
      <xs:annotation>
        <xs:appinfo>
          <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
        </xs:appinfo>
      </xs:annotation>
    </xs:element>
    <xs:element minOccurs="0" name="Name" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="StartDate" nillable="true" type="xs:dateTime">
      <xs:annotation>
        <xs:appinfo>
          <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
        </xs:appinfo>
      </xs:annotation>
    </xs:element>
    <xs:element minOccurs="0" name="Status" nillable="true" type="tns:CampaignStatus" />
    <xs:element minOccurs="0" name="SubType" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="TimeZone" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="TrackingUrlTemplate" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="UrlCustomParameters" nillable="true" type="tns:CustomParameters" />
    <xs:element minOccurs="0" name="UseCampaignLevelDates" nillable="true" type="xs:boolean">
      <xs:annotation>
        <xs:appinfo>
          <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
        </xs:appinfo>
      </xs:annotation>
    </xs:element>
    <xs:element minOccurs="0" name="CampaignType" nillable="true" type="tns:CampaignType" />
    <xs:element minOccurs="0" name="Settings" nillable="true" type="tns:ArrayOfSetting" />
    <xs:element minOccurs="0" name="BudgetId" nillable="true" type="xs:long" />
    <xs:element xmlns:q12="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="Languages" nillable="true" type="q12:ArrayOfstring" />
    <xs:element minOccurs="0" name="AdScheduleUseSearcherTimeZone" nillable="true" type="xs:boolean">
      <xs:annotation>
        <xs:appinfo>
          <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
        </xs:appinfo>
      </xs:annotation>
    </xs:element>
    <xs:element minOccurs="0" name="BidStrategyId" nillable="true" type="xs:long">
      <xs:annotation>
        <xs:appinfo>
          <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
        </xs:appinfo>
      </xs:annotation>
    </xs:element>
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AdScheduleUseSearcherTimeZone": "ValueHere",
  "AudienceAdsBidAdjustment": IntValueHere,
  "BiddingScheme": {
    "Type": "CommissionBiddingScheme",
    "CommissionRate": DoubleValueHere
  },
  "BidStrategyId": "LongValueHere",
  "BudgetId": "LongValueHere",
  "BudgetType": "ValueHere",
  "CampaignType": "ValueHere",
  "DailyBudget": DoubleValueHere,
  "DealIds": [
    "LongValueHere"
  ],
  "EndDate": "ValueHere",
  "ExperimentId": "LongValueHere",
  "FinalUrlSuffix": "ValueHere",
  "ForwardCompatibilityMap": [
    {
      "key": "ValueHere",
      "value": "ValueHere"
    }
  ],
  "GoalIds": [
    "LongValueHere"
  ],
  "Id": "LongValueHere",
  "IsDealCampaign": "ValueHere",
  "Languages": [
    "ValueHere"
  ],
  "MultimediaAdsBidAdjustment": IntValueHere,
  "Name": "ValueHere",
  "Settings": [
    {
      "Type": "AppSetting",
      "AppId": "ValueHere",
      "AppStore": "ValueHere"
    }
  ],
  "StartDate": "ValueHere",
  "Status": "ValueHere",
  "SubType": "ValueHere",
  "TimeZone": "ValueHere",
  "TrackingUrlTemplate": "ValueHere",
  "UrlCustomParameters": {
    "Parameters": [
      {
        "Key": "ValueHere",
        "Value": "ValueHere"
      }
    ]
  },
  "UseCampaignLevelDates": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [Campaign](campaign.md) object has the following elements: [AdScheduleUseSearcherTimeZone](#adscheduleusesearchertimezone), [AudienceAdsBidAdjustment](#audienceadsbidadjustment), [BiddingScheme](#biddingscheme), [BidStrategyId](#bidstrategyid), [BudgetId](#budgetid), [BudgetType](#budgettype), [CampaignType](#campaigntype), [DailyBudget](#dailybudget), [DealIds](#dealids), [EndDate](#enddate), [ExperimentId](#experimentid), [FinalUrlSuffix](#finalurlsuffix), [ForwardCompatibilityMap](#forwardcompatibilitymap), [GoalIds](#goalids), [Id](#id), [IsDealCampaign](#isdealcampaign), [Languages](#languages), [MultimediaAdsBidAdjustment](#multimediaadsbidadjustment), [Name](#name), [Settings](#settings), [StartDate](#startdate), [Status](#status), [SubType](#subtype), [TimeZone](#timezone), [TrackingUrlTemplate](#trackingurltemplate), [UrlCustomParameters](#urlcustomparameters), [UseCampaignLevelDates](#usecampaignleveldates).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="adscheduleusesearchertimezone"></a>AdScheduleUseSearcherTimeZone|Determines whether to use the account time zone or the time zone of the search user where the ads could be delivered.<br/><br/>Set this property to *true* if you want the ads to be shown in the search user's time zone, and otherwise set it to *false*.<br/><br/>This element is not returned by default. To get this element, include the AdScheduleUseSearcherTimeZone value in the ReturnAdditionalFields element when you call the [GetCampaignsByAccountId](getcampaignsbyaccountid.md#returnadditionalfields) and [GetCampaignsByIds](getcampaignsbyids.md#returnadditionalfields) service operations.<br/><br/>**Add:** Optional. If you do not specify this element or leave it empty, the default value of *false* will be set and the account time zone will be used.<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**boolean**|
|<a name="audienceadsbidadjustment"></a>AudienceAdsBidAdjustment|The percent amount by which to adjust your bid for audience ads above or below the base ad group or keyword bid.<br/><br/>This property is available in Search campaigns if the customer is enabled for the Microsoft Audience Network. This property is not available with [smart shopping campaigns](../guides/smart-shopping-campaigns.md).<br/><br/>Supported values are negative one hundred (-100) through positive nine hundred (900). Setting the bid adjustment to -100 will prevent audience ads from showing for this campaign.<br/><br/>Set this element to zero (0) if you want to use the base ad group or keyword bid instead of specifying any bid adjustment for audience ads.<br/><br/>As a best practice you should always specify a bid adjustment value. If you set this element to null the system default bid adjustment will be used. The system default bid adjustment is currently zero (0), and is subject to change.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**int**|
|<a name="biddingscheme"></a>BiddingScheme|The bid strategy type for how you want to manage your bids.<br/><br/>For details about supported bid strategies per campaign type, see [Budget and Bid Strategies](../guides/budget-bid-strategies.md).<br/><br/>**IMPORTANT:** For some bid strategy types your bid and ad rotation settings are ignored and conversion tracking (via [Universal Event Tracking](../guides/universal-event-tracking.md) tag and a conversion goal) is required. For more information including supported locations, see [Let Microsoft Advertising manage your bids with bid strategies](https://help.ads.microsoft.com/#apex/3/en/56786/1).<br/><br/>This element will be nil or empty by default if the campaign uses the [MaxConversionValueBiddingScheme](maxconversionvaluebiddingscheme.md) or [TargetImpressionShareBiddingScheme](targetimpressionsharebiddingscheme.md) bid strategy. To get the [MaxConversionValueBiddingScheme](maxconversionvaluebiddingscheme.md) or [TargetImpressionShareBiddingScheme](targetimpressionsharebiddingscheme.md) objects, include the respective [MaxConversionValueBiddingScheme](campaignadditionalfield.md#maxconversionvaluebiddingscheme) and [TargetImpressionShareBiddingScheme](campaignadditionalfield.md#targetimpressionsharebiddingscheme) values in the ReturnAdditionalFields element when you call the [GetCampaignsByAccountId](getcampaignsbyaccountid.md#returnadditionalfields) and [GetCampaignsByIds](getcampaignsbyids.md#returnadditionalfields) service operations.<br/><br/>*Note*: Starting August 4, 2025, the *BiddingScheme* will no longer support *TargetCpaBiddingScheme* and *TargetRoasBiddingScheme*. Any bid strategy set to [Target CPA](./targetcpabiddingscheme.md) will be silently converted to [Maximize Conversions](./maxconversionsbiddingscheme.md) using the [Target CPA value](./maxconversionsbiddingscheme.md#targetcpa). Any bid strategy set to Target ROAS will be silently converted to [Maximize Conversion Value](./maxconversionvaluebiddingscheme.md) using the [Target ROAS](./maxconversionvaluebiddingscheme.md#targetroas) value. Existing campaigns that use the Target CPA and Target ROAS bid strategies will remain unaffected.<br/><br/>**Add:** Optional. The default bid strategy type for Search and DynamicSearchAds campaigns is [EnhancedCpcBiddingScheme](enhancedcpcbiddingscheme.md). The default bid strategy type for most Shopping campaigns is [EnhancedCpcBiddingScheme](enhancedcpcbiddingscheme.md); however, the only supported bid strategy types for [smart shopping campaigns](../guides/smart-shopping-campaigns.md) are [MaxConversionsBiddingScheme](../campaign-management-service/maxconversionsbiddingscheme.md) and [MaxConversionValueBiddingScheme](maxconversionvaluebiddingscheme.md). The supported bid strategy types for Audience campaigns are [EnhancedCpcBiddingScheme](enhancedcpcbiddingscheme.md), [ManualCpcBiddingScheme](manualcpcbiddingscheme.md), [ManualCpmBiddingScheme](manualcpmbiddingscheme.md), and [TargetCpaBiddingScheme](targetcpabiddingscheme.md). The supported bid strategy types for lodging campaigns are [CommissionBiddingScheme](commissionbiddingscheme.md), [ManualCpcBiddingScheme](manualcpcbiddingscheme.md), and [PercentCpcBiddingScheme](percentcpcbiddingscheme.md). The supported bid strategies for Performance Max campaigns are [MaxConversionsBiddingScheme](../campaign-management-service/maxconversionsbiddingscheme.md) (with optional TCPA) and [MaxConversionValueBiddingScheme](../campaign-management-service/maxconversionvaluebiddingscheme.md) (with optional TROAS). The supported bid strategies for new Video campaigns are [ManualCpmBiddingScheme](../campaign-management-service/manualcpmbiddingscheme.md) and [ManualCpvBiddingScheme](../campaign-management-service/manualcpvbiddingscheme.md). **NOTE:** As of May 2024, you can no longer use the manual CPC bid strategy for audience native campaigns. You can only use manual CPC for audience display and video campaigns, and for lodging campaigns. We will automatically convert any existing manual CPC audience native campaigns to enhanced CPC. If you attempt to set manual CPC for any other campaign type, the request will be ignored without error and the bid strategy will be set to enhanced CPC. As of April 2021, you cannot set any bid strategies for ad groups or keywords. Bid strategies can only be set at the campaign level. If you attempt to set bid strategies for ad groups or keywords, the request will be ignored without error. Ad groups and keywords will inherit their campaign's bid strategy.<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|[BiddingScheme](biddingscheme.md)|
|<a name="bidstrategyid"></a>BidStrategyId|The system-generated identifier of the [BidStrategy](bidstrategy.md) that this campaign shares with other campaigns in the account.<br/><br/>If the field is empty, then the campaign is not using a portfolio bid strategy. If the field is not empty and the value is greater than zero, then the campaign is using a portfolio bid strategy. If the campaign is using a portfolio bid strategy, and you prefer that it use its own bid strategy, set this field to '0' (zero).<br/><br/>**Note:** Portfolio bid strategies are not supported with [smart shopping campaigns](../guides/smart-shopping-campaigns.md) or Performance Max campaigns.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**long**|
|<a name="budgetid"></a>BudgetId|The unique Microsoft Advertising identifier of the [Budget](budget.md) that this campaign shares with other campaigns in the account.<br/><br/>If the value is not null and greater than zero, then the campaign is using a shared budget. If the value is null, then the campaign is not using a shared budget. If the campaign is using a shared budget, and you prefer that it use its own budget e.g. [DailyBudget](#dailybudget) amount, set this element to '0' (zero) and set [DailyBudget](#dailybudget) to a valid budget amount.<br/><br/>**Note:** Shared budgets are not supported with [smart shopping campaigns](../guides/smart-shopping-campaigns.md) or Performance Max campaigns. With [smart shopping campaigns](../guides/smart-shopping-campaigns.md), you must set the [DailyBudget](#dailybudget) amount.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**long**|
|<a name="budgettype"></a>BudgetType|The budget type determines how the budget is spent.<br/><br/>The possible values are DailyBudgetAccelerated and DailyBudgetStandard. The DailyBudgetAccelerated budget type is only available for Audience campaigns that use unshared campaign-level budgets.<br/><br/>In the context of shared budgets, the budget type is a read-only property that is always returned regardless of whether or not the campaign uses a shared budget. To determine whether the campaign uses a shared budget, check the value of the [BudgetId](#budgetid) element as described above.<br/><br/>With experiment campaigns you cannot set the [Budget](#dailybudget), [BudgetType](#budgettype), or [Status](#status). The budget, and status of an experiment campaign are always inherited from the base campaign settings.<br/><br/>**Add:** Required if the [BudgetId](#budgetid) is not set. Read-only if the campaign uses a shared budget.<br/>**Update:** Optional if the [BudgetId](#budgetid) is not set. If no value is set for the update, this setting is not changed. Not allowed if the campaign uses a shared budget. If you try to update the budget type of a campaign that has a shared budget, the service will return the *CampaignServiceCannotUpdateSharedBudget* error code.|[BudgetLimitType](budgetlimittype.md)|
|<a name="campaigntype"></a>CampaignType|The campaign type determines whether the campaign is an Audience, Dynamic Search Ads, Search, Shopping campaign, Hotel Ads, or Performance Max.<br/><br/>**Add:** Optional. If not specified, then default value of *Search* is used.<br/>**Update:** Not allowed.|[CampaignType](campaigntype.md)|
|<a name="dailybudget"></a>DailyBudget|The amount to spend daily on the campaign.<br/><br/>You must set the daily budget amount if [BudgetId](#budgetid) is not set.<br/><br/>Your budget is a target; your actual spend might be higher or lower. Variations are caused by a number of factors, such as different traffic volumes in different days of the week, or automatic detection and refunding of fraud clicks that can give money back to a campaign within a few hours of the click. Microsoft Advertising anticipates and automatically compensates for the fluctuations, and usually keeps overspend to less than 100% above your daily limit.<br/><br/>Also note that Microsoft Advertising does not require your campaign budget to be higher than the ad group and keyword bids. In other words ad group and keyword bids are validated independently of the campaign budget.<br/><br/>In the context of shared budgets, the budget amount is a read-only property that is always returned regardless of whether or not the campaign uses a shared budget. When a campaign is associated to a shared budget the amount returned is that of the shared budget. To determine whether the campaign uses a shared budget, check the value of the [BudgetId](#budgetid) element as described above.<br/><br/>With experiment campaigns you cannot set the [Budget](#dailybudget), [BudgetType](#budgettype), or [Status](#status). The budget, and status of an experiment campaign are always inherited from the base campaign settings.<br/><br/>**Add:** Required if the [BudgetId](#budgetid) is not set. Read-only if the campaign uses a shared budget.<br/>**Update:** Optional if the [BudgetId](#budgetid) is not set. If no value is set for the update, this setting is not changed. Not allowed if the campaign uses a shared budget. If you try to update the budget amount of a campaign that has a shared budget, the service will return the *CampaignServiceCannotUpdateSharedBudget* error code.|**double**|
|<a name="dealids"></a>DealIds|A list of unique system identifiers corresponding to the deals that were added.<br/><br/>The list of identifiers corresponds directly to the list of deals in the request. Items of the list may be returned as null. For each list index where a deal was not added, the corresponding element will be null.|**long** array|
|<a name="enddate"></a>EndDate|The date when you want your campaign to stop serving.<br/><br/>If the budget type is *LifetimeBudgetStandard*, *EndDate* is required and can't be more than one year after the start date.<br/><br/>*EndDate* can be set or left unset for campaigns with a daily budget. To remove the existing end date and effectively configure the campaign with no end date, set *EndDate* to January 1, 2050, or a later date. When retrieving the campaign, this element will be null. This indicates that no predefined end date exists, and *EndDate* won't explicitly be set to January 1, 2050.<br/><br/>Note: Currently, this will only be honored for Audience campaigns.|**dateTime**|
|<a name="experimentid"></a>ExperimentId|The system-generated identifier of the [Experiment](experiment.md).<br/><br/>This element is only set for experiment campaigns i.e., campaigns that have been created for A/B testing based on another Search campaign.<br/><br/>Base campaigns will not contain an experiment ID. Likewise, after an experiment has been [Graduated](experiment.md#experimentstatus) to an independent campaign, this element will be empty, even though the campaign was previously an experiment campaign.<br/><br/>With experiment campaigns you cannot set the [Budget](#dailybudget), [BudgetType](#budgettype), or [Status](#status). The budget, and status of an experiment campaign are always inherited from the base campaign settings. If you want to change an experiment's budget, you will need to change the base campaign's budget. The change in value will then be split based on your experiment [TrafficSplitPercent](experiment.md#trafficsplitpercent) setting.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**long**|
|<a name="finalurlsuffix"></a>FinalUrlSuffix|The final URL suffix can include tracking parameters that will be appended to the end of your landing page URL. We recommend placing tracking parameters that your landing page requires in a final URL suffix so that your customers are always sent to your landing page. For more details and validation rules see [Final URL Suffix](../guides/url-tracking-upgraded-urls.md#finalurlsuffixvalidation) in the technical guides.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this element to an empty string (*""*), the previous setting will be deleted.|**string**|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>Forward compatibility changes will be noted here in future releases. There are currently no forward compatibility changes for this object.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="goalids"></a>GoalIds|A list of goal IDs.|**long** array|
|<a name="id"></a>Id|The unique Microsoft Advertising identifier of the campaign.<br/><br/>**Add:** Read-only<br/>**Update:** Required|**long**|
|<a name="isdealcampaign"></a>IsDealCampaign|The campaign is a deal campaign if *true*.|**boolean**|
|<a name="languages"></a>Languages|Your [ad language](../guides/ad-languages.md#adlanguage) setting determines the language you will use when you write your ads and should be the language of your customers.<br/><br/>**IMPORTANT:** If languages are set at both the ad group and campaign level, the ad group level language will override the campaign level language.<br/><br/>You can specify multiple languages individually in the list, or only include one list item set to All if you want to target all languages.<br/><br/>The supported language strings for Search and Shopping campaigns are: Albanian, Bulgarian, Croatian, Czech, Danish, Dutch, English, Estonian, Finnish, French, German, Greek, Hungarian, Italian, Japanese, Latvian, Lithuanian, Maltese, Norwegian, Polish, Portuguese, Romanian, Slovak, Slovenian, Spanish, Swedish, and TraditionalChinese.<br/><br/>**NOTE:** The following languages are not yet available for everyone: Bulgarian, Croatian, Czech, Estonian, Greek, Hungarian, Japanese, Latvian, Lithuanian, Maltese, Polish, Romanian, Slovak, Slovenian.<br/><br/>For Audience campaigns you must include all languages i.e., set this element to All.<br/><br/>For Dynamic Search Ads campaigns, the campaign and ad group level language settings are ignored in favor of the website [domain language](dynamicsearchadssetting.md#language). You should set campaign languages to "All" and leave the ad group level [language](adgroup.md#language) empty.<br/><br/>**Add:** Required for Audience campaigns, and otherwise this element is optional. If there is no campaign language set, then the language of each ad group within the campaign will be required.<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. Once campaign languages are set, you cannot delete all of them. The list of languages that you specify during update replaces the previous settings i.e. does not append to the existing set of languages.|**string** array|
|<a name="multimediaadsbidadjustment"></a>MultimediaAdsBidAdjustment|The percent amount by which to adjust your bid for multimedia ads above or below the base ad group or keyword bid|**int**|
|<a name="name"></a>Name|The name of the campaign. The name must be unique among all active or paused campaigns within the account. The name can contain a maximum of 128 characters.<br/><br/>The service performs a case-insensitive comparison when it compares the name to existing campaign names.<br/><br/>**Add:** Required<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string**|
|<a name="settings"></a>Settings|The supported settings that vary by campaign type.<br/><br/>*Note*: [VerifiedTrackingSetting](verifiedtrackingsetting.md) is not currently available.<br/><br/>You can include a maximum of one object per setting type in the list of settings e.g., one [TargetSetting](targetsetting.md).<br/><br/>If the [CampaignType](#campaigntype) is set to *Search* and if the [ExperimentId](#experimentid) element is not set, this list can optionally include a [DynamicSearchAdsSetting](dynamicsearchadssetting.md) object. Experiment campaigns and base campaigns of experiments cannot include dynamic search ads settings. If you intend to use this campaign for experiments, do not include dynamic search ads settings. If an existing experiment is already based on this campaign, you cannot update the campaign to include dynamic search ads settings.<br/><br/>If the [CampaignType](#campaigntype) is set to *Shopping*, this list must include a [ShoppingSetting](shoppingsetting.md) object.<br/><br/>If the [CampaignType](#campaigntype) is set to *Audience*, this list may or may not include a [ShoppingSetting](shoppingsetting.md) object, depending on whether or not the Audience campaign supports product ads.<br/><br/>If the [CampaignType](#campaigntype) is set to *DynamicSearchAds*, this list must include a [DynamicSearchAdsSetting](dynamicsearchadssetting.md) object.<br/><br/>If the [CampaignType](#campaigntype) is set to *Hotel*, this list must include a [HotelSetting](hotelsetting.md) object.<br/><br/>If the [CampaignType](#campaigntype) is set to *PerformanceMax*, this list must include a [PerformanceMaxSetting](performancemaxsetting.md) object. If the Performance Max campaign associates to a store, it also supports a [ShoppingSetting](shoppingsetting.md).<br/><br/>The [TargetSetting](targetsetting.md) can be used with any campaign type except Performace Max, and determines whether the Audience criterions associated with this campaign use the "target and bid" option or the "bid only" target option. Within the [TargetSetting](targetsetting.md) you can have one [TargetSettingDetail](targetsettingdetail.md) objects i.e., one per supported [CriterionTypeGroup](criteriontypegroup.md). The only criterion type value currently supported for the campaign level target setting is "Audience". The [TargetSetting](targetsetting.md) object is not returned by default. To get this object, include the [TargetSetting](campaignadditionalfield.md#targetsetting) value in the ReturnAdditionalFields element when you call the [GetCampaignsByAccountId](getcampaignsbyaccountid.md#returnadditionalfields) and [GetCampaignsByIds](getcampaignsbyids.md#returnadditionalfields) service operations.<br/><br/>**Add:** Required if the [CampaignType](#campaigntype) is set to *DynamicSearchAds* or *Shopping*, and otherwise this element is optional. If this element does not include a [TargetSetting](targetsetting.md) object, the default bid option for all criterion type groups is effectively "bid only".<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. The [DynamicSearchAdsSetting](dynamicsearchadssetting.md) and [ShoppingSetting](shoppingsetting.md) objects cannot be removed during update.|[Setting](setting.md) array|
|<a name="startdate"></a>StartDate|The date when you want your campaign to begin serving.<br/><br/>For campaigns with budget type *LifetimeBudgetStandard*, *StartDate* is mandatory. The start date can be updated as long as the campaign has not started serving.<br/><br/>Note: Currently, this will only be honored for Audience campaigns.|**dateTime**|
|<a name="status"></a>Status|The status of the campaign.<br/><br/>Possible values are *Active* and *Paused*.<br/><br/>The service will automatically pause the campaign if the budget is depleted.<br/><br/>With experiment campaigns you cannot set the [Budget](#dailybudget), [BudgetType](#budgettype), or [Status](#status) The budget, and status of an experiment campaign are always inherited from the base campaign settings.<br/><br/>**Add:** Optional. The default value is *Paused*.<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|[CampaignStatus](campaignstatus.md)|
|<a name="subtype"></a>SubType|The campaign sub type.<br/><br/>If the sub type is not set, the campaign is created according to the campaign type.<br/><br/>If the sub type is set to *AudienceVideoAds* and the campaign type is *Audience*, the campaign is a video audience campaign.<br/><br/>If the sub type is set to *ShoppingSmartAds*, the campaign is a Microsoft Smart Shopping campaign.<br/><br/>If the sub type is set to *ShoppingSponsoredProductAd*, the campaign is a Microsoft [shopping campaigns for brands](../guides/product-ads.md#setup-cooperative).<br/><br/>**Add:** Optional and not applicable for most campaign types. For Microsoft [smart shopping campaigns](../guides/smart-shopping-campaigns.md) you must set the sub type to *ShoppingSmartAds*. For Microsoft [shopping campaigns for brands](../guides/product-ads.md#setup-cooperative) you must set the sub type to *ShoppingSponsoredProductAd*.<br/>**Update:** Read-only|**string**|
|<a name="timezone"></a>TimeZone|**This column is deprecated.**<br/><br/> The time zone where the campaign operates.<br/><br/>The time zone is used for reporting and applying the start and end date of an ad group.<br/><br/>For possible values, see [Time Zones](../guides/time-zones.md).<br/><br/>With experiment campaigns you cannot set the [Budget](#dailybudget), [BudgetType](#budgettype), [Status](#status), or [TimeZone](#timezone). The budget, status, and time zone of an experiment campaign are always inherited from the base campaign settings.<br/><br/>**Add:** Required<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. You may not update the time zone if the campaign contains or has ever contained ad groups in the *Active* or *Paused* state.|**string**|
|<a name="trackingurltemplate"></a>TrackingUrlTemplate|The tracking template to use as a default for all URLs in your campaign.<br/><br/>The following validation rules apply to tracking templates. For more details about supported templates and parameters, see the Microsoft Advertising help article [What tracking or URL parameters can I use?](https://help.ads.microsoft.com/#apex/3/en/56799/2)<br/>- Tracking templates defined for lower level entities e.g. ads override those set for higher level entities e.g. campaign. For more information, see [Entity Limits](../guides/entity-hierarchy-limits.md).<br/>- The length of the tracking template is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.<br/>- The tracking template must be a well-formed URL beginning with one of the following: *http://*, *https://*, *{lpurl}*, or *{unescapedlpurl}*.<br/>- Microsoft Advertising does not validate whether custom parameters exist. If you use custom parameters in your tracking template and they do not exist, then the landing page URL will include the key and value placeholders of your custom parameters without substitution. For example, if your tracking template is *`https://tracker.example.com/?season={_season}&promocode={_promocode}&u={lpurl}`* and neither *{_season}* or *{_promocode}* are defined at the campaign, ad group, criterion, keyword, or ad level, then the landing page URL will be the same.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this element to an empty string (*""*), the previous setting will be deleted.|**string**|
|<a name="urlcustomparameters"></a>UrlCustomParameters|Your custom collection of key and value parameters for URL tracking.<br/><br/>Microsoft Advertising will accept the first 8 [CustomParameter](customparameter.md) objects that you include within the [CustomParameters](customparameters.md) object, and if you include more than 8 custom parameters an error will be returned. Each [CustomParameter](customparameter.md) includes [Key](customparameter.md#key) and [Value](customparameter.md#value) elements.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. Set the *UrlCustomParameters* element to null or empty to retain any existing custom parameters. To remove all custom parameters, set the [Parameters](customparameters.md#parameters) element of the [CustomParameters](customparameters.md) object to null or empty. To remove a subset of custom parameters, specify the custom parameters that you want to keep in the [Parameters](customparameters.md#parameters) element of the [CustomParameters](customparameters.md) object.|[CustomParameters](customparameters.md)|
|<a name="usecampaignleveldates"></a>UseCampaignLevelDates|Determines whether the dates should be managed at the campaign level or the ad group level. If set to *true*, campaign dates will be considered during serving. For the Lifetime Budget type, this field is required and must be set to *true*. For Daily Budget types, it can be set to either *true* or *false*, depending on whether you prefer to use campaign dates or ad group dates.|**boolean**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AddCampaigns](addcampaigns.md)  
[GetCampaignsByAccountId](getcampaignsbyaccountid.md)  
[GetCampaignsByIds](getcampaignsbyids.md)  
[UpdateCampaigns](updatecampaigns.md)  
