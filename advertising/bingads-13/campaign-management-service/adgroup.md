---
title: AdGroup Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines an ad group in an advertising campaign.
---
# AdGroup Data Object - Campaign Management
Defines an ad group in an advertising campaign.

> [!NOTE]
> As of July 2024, you can no longer set the search network where you want your ads to display to *SyndicatedSearchOnly*. If you attempt to set it to *SyndicatedSearchOnly*, the *CampaignServiceInvalidNetwork* error will be returned.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="AdGroup" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AdRotation" nillable="true" type="tns:AdRotation" />
    <xs:element minOccurs="0" name="AudienceAdsBidAdjustment" nillable="true" type="xs:int" />
    <xs:element minOccurs="0" name="BiddingScheme" nillable="true" type="tns:BiddingScheme" />
    <xs:element minOccurs="0" name="CommissionRate" nillable="true" type="tns:RateBid">
      <xs:annotation>
        <xs:appinfo>
          <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
        </xs:appinfo>
      </xs:annotation>
    </xs:element>
    <xs:element minOccurs="0" name="CpcBid" nillable="true" type="tns:Bid" />
    <xs:element minOccurs="0" name="EndDate" nillable="true" type="tns:Date" />
    <xs:element minOccurs="0" name="FinalUrlSuffix" nillable="true" type="xs:string" />
    <xs:element xmlns:q21="http://schemas.datacontract.org/2004/07/System.Collections.Generic" minOccurs="0" name="ForwardCompatibilityMap" nillable="true" type="q21:ArrayOfKeyValuePairOfstringstring" />
    <xs:element minOccurs="0" name="FrequencyCapSettings" nillable="true" type="tns:ArrayOfFrequencyCapSettings">
      <xs:annotation>
        <xs:appinfo>
          <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
        </xs:appinfo>
      </xs:annotation>
    </xs:element>
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="Language" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="MultimediaAdsBidAdjustment" nillable="true" type="xs:int">
      <xs:annotation>
        <xs:appinfo>
          <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
        </xs:appinfo>
      </xs:annotation>
    </xs:element>
    <xs:element minOccurs="0" name="Name" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Network" nillable="true" type="tns:Network" />
    <xs:element minOccurs="0" name="PercentCpcBid" nillable="true" type="tns:RateBid">
      <xs:annotation>
        <xs:appinfo>
          <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
        </xs:appinfo>
      </xs:annotation>
    </xs:element>
    <xs:element minOccurs="0" name="PrivacyStatus" nillable="true" type="tns:AdGroupPrivacyStatus" />
    <xs:element minOccurs="0" name="Settings" nillable="true" type="tns:ArrayOfSetting" />
    <xs:element minOccurs="0" name="StartDate" nillable="true" type="tns:Date" />
    <xs:element minOccurs="0" name="Status" nillable="true" type="tns:AdGroupStatus" />
    <xs:element minOccurs="0" name="TrackingUrlTemplate" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="UrlCustomParameters" nillable="true" type="tns:CustomParameters" />
    <xs:element minOccurs="0" name="UseOptimizedTargeting" nillable="true" type="xs:boolean">
      <xs:annotation>
        <xs:appinfo>
          <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
        </xs:appinfo>
      </xs:annotation>
    </xs:element>
    <xs:element minOccurs="0" name="UsePredictiveTargeting" nillable="true" type="xs:boolean">
      <xs:annotation>
        <xs:appinfo>
          <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
        </xs:appinfo>
      </xs:annotation>
    </xs:element>
    <xs:element minOccurs="0" name="AdScheduleUseSearcherTimeZone" nillable="true" type="xs:boolean">
      <xs:annotation>
        <xs:appinfo>
          <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
        </xs:appinfo>
      </xs:annotation>
    </xs:element>
    <xs:element minOccurs="0" name="AdGroupType" nillable="true" type="xs:string">
      <xs:annotation>
        <xs:appinfo>
          <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
        </xs:appinfo>
      </xs:annotation>
    </xs:element>
    <xs:element minOccurs="0" name="CpvBid" nillable="true" type="tns:Bid">
      <xs:annotation>
        <xs:appinfo>
          <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
        </xs:appinfo>
      </xs:annotation>
    </xs:element>
    <xs:element minOccurs="0" name="CpmBid" nillable="true" type="tns:Bid">
      <xs:annotation>
        <xs:appinfo>
          <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
        </xs:appinfo>
      </xs:annotation>
    </xs:element>
    <xs:element minOccurs="0" name="McpaBid" nillable="true" type="tns:Bid">
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
  "AdGroupType": "ValueHere",
  "AdRotation": {
    "EndDate": "ValueHere",
    "StartDate": "ValueHere",
    "Type": "ValueHere"
  },
  "AdScheduleUseSearcherTimeZone": "ValueHere",
  "AudienceAdsBidAdjustment": IntValueHere,
  "BiddingScheme": {
    "Type": "CommissionBiddingScheme",
    "CommissionRate": DoubleValueHere
  },
  "CommissionRate": {
    "RateAmount": {
      "Amount": DoubleValueHere
    }
  },
  "CpcBid": {
    "Amount": DoubleValueHere
  },
  "CpmBid": {
    "Amount": DoubleValueHere
  },
  "CpvBid": {
    "Amount": DoubleValueHere
  },
  "EndDate": {
    "Day": IntValueHere,
    "Month": IntValueHere,
    "Year": IntValueHere
  },
  "FinalUrlSuffix": "ValueHere",
  "ForwardCompatibilityMap": [
    {
      "key": "ValueHere",
      "value": "ValueHere"
    }
  ],
  "FrequencyCapSettings": [
    {
      "CapValue": IntValueHere,
      "TimeGranularity": "ValueHere"
    }
  ],
  "Id": "LongValueHere",
  "Language": "ValueHere",
  "McpaBid": {
    "Amount": DoubleValueHere
  },
  "MultimediaAdsBidAdjustment": IntValueHere,
  "Name": "ValueHere",
  "Network": "ValueHere",
  "PercentCpcBid": {
    "RateAmount": {
      "Amount": DoubleValueHere
    }
  },
  "PrivacyStatus": "ValueHere",
  "Settings": [
    {
      "Type": "AppSetting",
      "AppId": "ValueHere",
      "AppStore": "ValueHere"
    }
  ],
  "StartDate": {
    "Day": IntValueHere,
    "Month": IntValueHere,
    "Year": IntValueHere
  },
  "Status": "ValueHere",
  "TrackingUrlTemplate": "ValueHere",
  "UrlCustomParameters": {
    "Parameters": [
      {
        "Key": "ValueHere",
        "Value": "ValueHere"
      }
    ]
  },
  "UseOptimizedTargeting": "ValueHere",
  "UsePredictiveTargeting": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [AdGroup](adgroup.md) object has the following elements: [AdGroupType](#adgrouptype), [AdRotation](#adrotation), [AdScheduleUseSearcherTimeZone](#adscheduleusesearchertimezone), [AudienceAdsBidAdjustment](#audienceadsbidadjustment), [BiddingScheme](#biddingscheme), [CommissionRate](#commissionrate), [CpcBid](#cpcbid), [CpmBid](#cpmbid), [CpvBid](#cpvbid), [EndDate](#enddate), [FinalUrlSuffix](#finalurlsuffix), [ForwardCompatibilityMap](#forwardcompatibilitymap), [FrequencyCapSettings](#frequencycapsettings), [Id](#id), [Language](#language), [McpaBid](#mcpabid), [MultimediaAdsBidAdjustment](#multimediaadsbidadjustment), [Name](#name), [Network](#network), [PercentCpcBid](#percentcpcbid), [PrivacyStatus](#privacystatus), [Settings](#settings), [StartDate](#startdate), [Status](#status), [TrackingUrlTemplate](#trackingurltemplate), [UrlCustomParameters](#urlcustomparameters), [UseOptimizedTargeting](#useoptimizedtargeting), [UsePredictiveTargeting](#usepredictivetargeting).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="adgrouptype"></a>AdGroupType|The ad group type.<br/><br/>In a [mixed campaign](../guides/mixed-campaigns.md) where the [CampaignType](campaign.md#campaigntype) is "Search", the [ExperimentId](campaign.md#experimentid) is not set, and the [Settings](campaign.md#settings) already have a valid [DynamicSearchAdsSetting](dynamicsearchadssetting.md), the possible values are "SearchDynamic" and "SearchStandard". Otherwise the type of ad groups within "Search" campaigns can only be set to "SearchStandard". If the ad group type is "SearchDynamic", then you can only add dynamic search ads within this ad group. If the ad group type is "SearchStandard", then you can add expanded text ads or responsive search ads within this ad group.<br/><br/>The type of ad groups within "DynamicSearchAds" campaigns can only be set to "SearchDynamic". You don't need to set the ad group type for "DynamicSearchAds" campaigns, but please note when you retrieve ad groups this element will be set to "SearchDynamic".<br/><br/>This field can be set to *HotelAds* for "Hotel" or "Search" campaign types.<br/><br/>This element cannot be set for "Audience" or "Shopping" campaign types. When you retrieve an ad group within unsupported campaigns, this element will not be set.<br/><br/>**Add:** Optional. The default value for "Search" campaigns is "SearchStandard". The default value for "DynamicSearchAds" campaigns is "SearchDynamic".<br/>**Update:** Read-only. You cannot update the ad group type.|**string**|
|<a name="adrotation"></a>AdRotation|Ad rotation sets how often Microsoft Advertising selects which ads to serve, if you have multiple ads within an ad group. Since no more than one ad from your account can show at a time, ad rotation prioritizes ads that appear statistically more likely to perform better.<br/><br/>**Note**: Ad rotation does not apply to Product Ads.<br/><br/>Possible values for the ad rotation [Type](adrotation.md#type) are *OptimizeForClicks* and *RotateAdsEvenly*.<br/><br/>If set to *OptimizeForClicks*, Microsoft Advertising prioritizes the ad from the ad group that appears to have the best chance of performing well, based on auction characteristics or factors, such as keyword, search term, device or location. Better-performing ads will show more frequently, and others will be served less often, if at all.<br/><br/>If set to *RotateAdsEvenly*, Microsoft Advertising provides more balance in rotation between your ads. That is, the ads in a particular ad group have a similar chance of being displayed in response to a searcher's query. Ads are prioritized lower if they have lower ad quality, and therefore might display less often, or not at all.<br/>- The *RotateAdsEvenly* setting can allow lower-performing ads to display as often as better-performing ads. This might impact ad group performance.<br/>- The *RotateAdsEvenly* setting will be ignored if you use an automated bid strategy i.e., *MaxClicks*, *MaxConversions*, *TargetCpa*, or *TargetRoas*, as these bid strategies prioritize better-performing ads.<br/><br/>**Add:** Optional. The default value is *OptimizeForClicks*.<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|[AdRotation](adrotation.md)|
|<a name="adscheduleusesearchertimezone"></a>AdScheduleUseSearcherTimeZone|Determines whether to use the account time zone or the time zone of the search user where the ads could be delivered.<br/><br/>Set this property to *true* if you want the ads to be shown in the search user's time zone, and otherwise set it to *false*.<br/><br/>This element is not returned by default. To get this element, include the AdScheduleUseSearcherTimeZone value in the ReturnAdditionalFields element when you call the [GetAdGroupsByCampaignId](getadgroupsbycampaignid.md#returnadditionalfields) and [GetAdGroupsByIds](getadgroupsbyids.md#returnadditionalfields) service operations.<br/><br/>**Add:** Optional. If you do not specify this element or leave it empty, the default value of *true* will be set and the search user's time zone will be used. After September 30, 2020, if you do not specify this field or leave it empty, the default value of *false* is set and the account time zone is used.<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**boolean**|
|<a name="audienceadsbidadjustment"></a>AudienceAdsBidAdjustment|The percent amount by which to adjust your bid for audience ads above or below the base ad group or keyword bid.<br/><br/>This property is available in Search campaigns if the customer is enabled for the Microsoft Audience Network. This property is not available with [smart shopping campaigns](../guides/smart-shopping-campaigns.md).<br/><br/>Supported values are negative one hundred (-100) through positive nine hundred (900). Setting the bid adjustment to -100 percent will prevent audience ads from showing for this ad group.<br/><br/>Set this element to zero (0) if you do not want any bid adjustment for audience ads. If this element is null you will inherit the *AudienceAdsBidAdjustment* setting of the ad group's [Campaign](campaign.md).<br/><br/>**Add:** Optional<br/>**Update:** Optional. This property will only be updated if you also set the [UpdateAudienceAdsBidAdjustment](updateadgroups.md#updateaudienceadsbidadjustment) element to *true*, and otherwise this property will be ignored. If the ad group already has a native bid adjustment, and you want to remove it to effectively inherit the *AudienceAdsBidAdjustment* setting of the ad group's [Campaign](campaign.md), set this element to null.|**int**|
|<a name="biddingscheme"></a>BiddingScheme|The bid strategy type for how you want to manage your bids.<br/><br/>**NOTE:** As of April 2021, you cannot set any bid strategies for ad groups or keywords. If you attempt to set bid strategies for ad groups or keywords, the request will be ignored without error. Ad groups and keywords will inherit their campaign's bid strategy.<br/><br/>**Add:** Optional. If you do not set this element, then [InheritFromParentBiddingScheme](inheritfromparentbiddingscheme.md) is used by default.<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|[BiddingScheme](biddingscheme.md)|
|<a name="commissionrate"></a>CommissionRate|The commission rate charged to the advertiser when someone books a hotel and stays there.|[RateBid](ratebid.md)|
|<a name="cpcbid"></a>CpcBid|The default bid to use when the user's query and the ad group's keywords match by using either a broad, exact, or phrase match comparison.<br/><br/>The minimum and maximum bid range depends on the account's currency. For more information, see [Currencies](../guides/currencies.md).<br/><br/>Specifying a broad, exact, or phrase match bid at the keyword level overrides the ad group's Cpc bid value for the corresponding match type.<br/><br/>**Add:** Optional. If you do not set a bid, it will be set to the minimum depending on your account's currency.<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|[Bid](bid.md)|
|<a name="cpmbid"></a>CpmBid|The manual CPM bid strategy type. With the ManualCpm (manual cost per thousand) bid strategy, you set the highest amount that you'd like to pay per thousand impressions, and Microsoft Advertising uses these bids every time.<br/><br/>This element is not returned by default. To get this element, include the CpmBid value in the ReturnAdditionalFields element when you call the [GetAdGroupsByCampaignId](getadgroupsbycampaignid.md#returnadditionalfields) and [GetAdGroupsByIds](getadgroupsbyids.md#returnadditionalfields) service operations.|[Bid](bid.md)|
|<a name="cpvbid"></a>CpvBid|The manual CPV bid strategy type. With the ManualCpv (manual cost per view) bid strategy, you set the highest amount that you'd like to pay per view or per click on a video ad, and Microsoft Advertising uses these bids every time.<br/><br/>This element is not returned by default. To get this element, include the Cpv value in the ReturnAdditionalFields element when you call the [GetAdGroupsByCampaignId](getadgroupsbycampaignid.md#returnadditionalfields) and [GetAdGroupsByIds](getadgroupsbyids.md#returnadditionalfields) service operations.|[Bid](bid.md)|
|<a name="enddate"></a>EndDate|The date that the ads in the ad group will expire.<br/><br/>If you do not specify an end date, the ads will not expire. The end date can be extended to make an ad group's ads eligible for delivery, even after the ad group expires.<br/><br/>The end date is inclusive. For example, if you set *EndDate* to 12/31/2020, the ads in the ad group will expire at 11:59 PM on 12/31/2020. The time is based on the time zone that you specify at the campaign level.<br/><br/>**Add:** Optional. To set no end date when adding an ad group, set this element to null.<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. To delete the existing end date setting, and effectively set no end date when updating an ad group, set the end date equal to or later than January 2, 2050. When you retrieve the ad group next time, this element will be nil i.e. it will not be set to January 2, 2050.|[Date](date.md)|
|<a name="finalurlsuffix"></a>FinalUrlSuffix|The final URL suffix can include tracking parameters that will be appended to the end of your landing page URL. We recommend placing tracking parameters that your landing page requires in a final URL suffix so that your customers are always sent to your landing page. For more details and validation rules see [Final URL Suffix](../guides/url-tracking-upgraded-urls.md#finalurlsuffixvalidation) in the technical guides.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this element to an empty string (*""*), the previous setting will be deleted.|**string**|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>Forward compatibility changes will be noted here in future releases. There are currently no forward compatibility changes for this object.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="frequencycapsettings"></a>FrequencyCapSettings|Settings for the frequency cap.|[FrequencyCapSettings](frequencycapsettings.md) array|
|<a name="id"></a>Id|The system-generated identifier of the ad group.<br/><br/>**Add:** Not allowed.<br/>**Update:** Read-only and Required|**long**|
|<a name="language"></a>Language|Your [ad language](../guides/ad-languages.md#adlanguage) setting determines the language you will use when you write your ads and should be the language of your customers.<br/><br/>**IMPORTANT:** If languages are set at both the ad group and campaign level, the ad group level language will override the campaign level language.<br/><br/>The supported language strings for Search and Shopping campaigns are: Bulgarian, Croatian, Czech, Danish, Dutch, English, Estonian, Finnish, French, German, Greek, Hungarian, Italian, Latvian, Lithuanian, Maltese, Norwegian, Polish, Portuguese, Romanian, Slovak, Slovenian, Spanish, Swedish, and TraditionalChinese.<br/><br/>**NOTE:** The following languages are not yet available for everyone: Bulgarian, Croatian, Czech, Estonian, Greek, Hungarian, Latvian, Lithuanian, Maltese, Polish, Romanian, Slovak, Slovenian.<br/><br/>For Dynamic Search Ads campaigns, the campaign and ad group level language settings are ignored in favor of the website [domain language](dynamicsearchadssetting.md#language). You should set campaign [languages](campaign.md#languages) to "All" and leave the ad group level language empty.<br/><br/>For ad groups in Audience campaigns, ad group level language is not supported, and you must set the [Languages](campaign.md#languages) element of the ad group's campaign to "All".<br/><br/>**Add:** Optional if the campaign has one or more languages set, and otherwise the language is required for most campaign types. You are not allowed to set this element for ad groups in Audience campaigns.<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. To remove the language and defer to the campaign level languages, set this element to an empty string value (*""*).|**string**|
|<a name="mcpabid"></a>McpaBid|The manual CPA bid strategy type. With the ManualCpa (manual cost per action) bid strategy, you set your big per advertiser-specified action.|[Bid](bid.md)|
|<a name="multimediaadsbidadjustment"></a>MultimediaAdsBidAdjustment|The percent amount by which to adjust your bid for multimedia ads above or below the base ad group or keyword bid.|**int**|
|<a name="name"></a>Name|The name of the ad group.<br/><br/>The name must be unique among all active ad groups within the campaign. The name can contain a maximum of 256 characters.<br/><br/>**Add:** Required<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string**|
|<a name="network"></a>Network|The search networks where you want your ads to display.<br/><br/>Supported network values for ad groups within most campaign types are *OwnedAndOperatedAndSyndicatedSearch* and *OwnedAndOperatedOnly*.<br/><br/>For ad groups in Audience campaigns, ad group level network is not supported. The ad groups are in the Microsoft Audience Network.<br/><br/>For ad groups in [smart shopping campaigns](../guides/smart-shopping-campaigns.md), you cannot set the network. The service will set the network to *OwnedAndOperatedAndSyndicatedSearch*.<br/><br/>For ad groups in [shopping campaigns for brands](../guides/product-ads.md#setup-cooperative), the *InHousePromotion* network (Retailer Network only) is supported in addition to *OwnedAndOperatedAndSyndicatedSearch* and *OwnedAndOperatedOnly*.<br/><br/>If you select one of the syndicated search options, you can call the [SetNegativeSitesToAdGroups](setnegativesitestoadgroups.md) or [SetNegativeSitesToCampaigns](setnegativesitestocampaigns.md) operation to prevent the ads from displaying on specific syndicated search websites.<br/><br/>For more information about networks and ad distribution, see the [About Ad Distribution](https://help.ads.microsoft.com/#apex/3/en/50871/0) help article.<br/><br/>**Add:** Optional. The default is *OwnedAndOperatedAndSyndicatedSearch*.<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|[Network](network.md)|
|<a name="percentcpcbid"></a>PercentCpcBid|The percent CPC bid strategy type (total hotel price per night, including taxes and fees).|[RateBid](ratebid.md)|
|<a name="privacystatus"></a>PrivacyStatus|Indicates whether or not your ad group target criteria e.g., [ProfileCriterion](profilecriterion.md) are too narrow for ad groups in Audience campaigns.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[AdGroupPrivacyStatus](adgroupprivacystatus.md)|
|<a name="settings"></a>Settings|The ad group settings that typically vary by campaign type.<br/><br/>You can include a maximum of one object per setting type in the list of settings e.g., one [TargetSetting](targetsetting.md).<br/><br/>The [TargetSetting](targetsetting.md) can be used with any campaign type, and determines whether the Age, Audience, CompanyName, Gender, Industry, and JobFunction criterions associated with this ad group use the "target and bid" option or the "bid only" target option. Within the [TargetSetting](targetsetting.md) you can have multiple [TargetSettingDetail](targetsettingdetail.md) objects i.e., one per [CriterionTypeGroup](criteriontypegroup.md).<br/><br/>**Add:** Optional. If this element does not include a [TargetSetting](targetsetting.md) object, the default bid option for all criterion type groups is effectively "bid only".<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|[Setting](setting.md) array|
|<a name="startdate"></a>StartDate|The date that the ads in the ad group can begin serving; otherwise, the service can begin serving the ads in the ad group the day that the ad group becomes active.<br/><br/>The start date is inclusive. For example, if you set the start date to 5/5/2021, the ads in the ad group will start at 12:00 AM on 5/5/2021. The time is based on the time zone that you specify at the campaign level.<br/><br/>**Add:** Optional. If you do not set the start date, then it will default to today's date and the service can begin serving the ads in the ad group as soon as the ad group status is active.<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. The start date cannot be updated after the ad group is submitted i.e., once the start date has arrived.|[Date](date.md)|
|<a name="status"></a>Status|The status of the ad group.<br/><br/>Possible values are *Active*, *Expired*, and *Paused*. The *Expired* status is read-only.<br/><br/>**Add:** Optional. The default value is *Paused*.<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|[AdGroupStatus](adgroupstatus.md)|
|<a name="trackingurltemplate"></a>TrackingUrlTemplate|The tracking template to use as a default for all URLs in your ad group.<br/><br/>The following validation rules apply to tracking templates. For more details about supported templates and parameters, see the Microsoft Advertising help article [What tracking or URL parameters can I use?](https://help.ads.microsoft.com/#apex/3/en/56799/2)<br/>- Tracking templates defined for lower level entities e.g. ads override those set for higher level entities e.g. campaign. For more information, see [Entity Limits](../guides/entity-hierarchy-limits.md).<br/>- The length of the tracking template is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.<br/>- The tracking template must be a well-formed URL beginning with one of the following: *http://*, *https://*, *{lpurl}*, or *{unescapedlpurl}*.<br/>- Microsoft Advertising does not validate whether custom parameters exist. If you use custom parameters in your tracking template and they do not exist, then the landing page URL will include the key and value placeholders of your custom parameters without substitution. For example, if your tracking template is *`https://tracker.example.com/?season={_season}&promocode={_promocode}&u={lpurl}`* and neither *{_season}* or *{_promocode}* are defined at the campaign, ad group, criterion, keyword, or ad level, then the landing page URL will be the same.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this element to an empty string (*""*), the previous setting will be deleted.|**string**|
|<a name="urlcustomparameters"></a>UrlCustomParameters|Your custom collection of key and value parameters for URL tracking.<br/><br/>Microsoft Advertising will accept the first 8 [CustomParameter](customparameter.md) objects that you include within the [CustomParameters](customparameters.md) object, and if you include more than 8 custom parameters an error will be returned. Each [CustomParameter](customparameter.md) includes [Key](customparameter.md#key) and [Value](customparameter.md#value) elements.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. Set the *UrlCustomParameters* element to null or empty to retain any existing custom parameters. To remove all custom parameters, set the [Parameters](customparameters.md#parameters) element of the [CustomParameters](customparameters.md) object to null or empty. To remove a subset of custom parameters, specify the custom parameters that you want to keep in the [Parameters](customparameters.md#parameters) element of the [CustomParameters](customparameters.md) object.|[CustomParameters](customparameters.md)|
|<a name="useoptimizedtargeting"></a>UseOptimizedTargeting|This will be deprecated. Use *UsePredictiveTargeting* instead.|**boolean**|
|<a name="usepredictivetargeting"></a>UsePredictiveTargeting|Indicates if predictive targeting is enabled for an AdGroup.<br/><br/>*Note*: UsePredictiveTargeting is only available for Audience campaigns.<br/><br/>**Add:** Optional<br/>**Update:** Optional.|**boolean**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AddAdGroups](addadgroups.md)  
[GetAdGroupsByCampaignId](getadgroupsbycampaignid.md)  
[GetAdGroupsByIds](getadgroupsbyids.md)  
[UpdateAdGroups](updateadgroups.md)  
