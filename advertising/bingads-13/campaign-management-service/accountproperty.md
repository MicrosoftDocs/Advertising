---
title: AccountProperty Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Maps an account level property name to a string value.
---
# AccountProperty Data Object - Campaign Management
Maps an account level property name to a string value.

## Syntax
```xml
<xs:complexType name="AccountProperty" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Name" type="tns:AccountPropertyName" />
    <xs:element minOccurs="0" name="Value" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [AccountProperty](accountproperty.md) object has the following elements: [Name](#name), [Value](#value).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="name"></a>Name|The name of the account property.|[AccountPropertyName](accountpropertyname.md)|
|<a name="value"></a>Value|The value of the named account property.<br/><br/>The value will vary by account property name. For more information, see [Account Property Values](#accountpropertyvalues) in the section below.|**string**|

## <a name="remarks"></a>Remarks
### <a name="accountpropertyvalues"></a>Account Property Values
#### <a name="adclickparalleltracking"></a>AdClickParallelTracking
Determines whether parallel tracking is enabled. 

If you use URL tracking, when customers click your ad, they usually have to go through a number of redirects before reaching your page. This is known as sequential tracking.

With parallel tracking, when customers click your ad, they immediately see your landing page. Simultaneously, Microsoft Advertising runs your tracking URLs in the background. So your customers' user experience is improved and you still get the same great measurement tracking. 

You need to have {lpurl} or one of its variants in your URL's tracking template for parallel tracking to work. For more information see [Parallel tracking gets customers to your landing page more quickly](https://help.ads.microsoft.com/#apex/ads/en/56918/2) and [What tracking or URL parameters can I use?](https://help.ads.microsoft.com/#apex/3/en/56799/2-500).

If the [Name](#name) element is set to *AdClickParallelTracking*, then the returned [Value](#value) can be either *true* or *false*. If the value is *true*, then parallel tracking is enabled. 

> [!IMPORTANT]
> Parallel tracking is required for all accounts created after May 31st, 2020. Until January 2021 you can enable and disable the feature for accounts created prior to June 1st, 2020 i.e., set the property to *true* or *false*. By the middle of January 2021 all accounts will be enabled for parallel tracking, and the value can only be set to *true*. 

#### <a name="allowimageautoretrieve"></a>AllowImageAutoRetrieve
Determines whether Microsoft Advertising is allowed to use images from your domain to enhance your ads on the Microsoft Audience Network.  

> [!IMPORTANT]
> By opting-in, you agree that any images or creative content retrieved from the Advertiser landing page is content "provided by" the Advertiser under the content usage license in the [Advertising Agreement](https://about.ads.microsoft.com/en-us/resources/policies/microsoft-advertising-agreement) (Section 2) and that the Advertiser agrees that Microsoft can use that content for auto-creating ads and extensions for them.

[!INCLUDE[coming-soon](./includes/coming-soon.md)]

If the [Name](#name) element is set to *AllowImageAutoRetrieve*, then the [Value](#value) can be set to either *true* or *false*. If the value is *true*, then the image auto-retrieve feature is enabled. 

#### <a name="autoapplyrecommendations"></a>AutoApplyRecommendations

Determines whether Microsoft Advertising is allowed to automatically apply ad recommendations meant to help you boost ad performance.  

> [!WARNING]
> AutoApplyRecommendations in Campaign Management API will be deprecated by November 30, 2022. We strongly encourage you to use the new [Auto-apply Management interface](../guides/ad-insights-auto-apply-management.md) in Ad Insight API.

[!INCLUDE[coming-soon](./includes/coming-soon.md)]

We'll let you know when suggested ads are ready for you to review. You can find ad recommendations on the Recommendations page. If you don't take action, we'll automatically apply them after the review period:

- Multimedia ads: 7 days
- All others: 14 days

You can change your auto-apply options at any time. If you don't choose to auto-apply ad recommendations, you'll still be able to apply recommendations manually.

If the [Name](#name) element is set to *AutoApplyRecommendations*, then the [Value](#value) can include a list of recommendation types.  

Within the [Value](#value) element, the list of key and value pairs are delimited with a semicolon (;). In this example, auto-apply ad recommendations is enabled for multimedia ads but not for responsive search ads or expanded text ads.  

```xml
<SetAccountPropertiesRequest xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
  <AccountProperties xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
    <AccountProperty>
      <Name>AutoApplyRecommendations</Name>
      <Value>MultimediaAdsAutoApply=true;ResponsiveSearchAdsAutoApply=false;ExpandedTextAdsAutoApply=false</Value>
    </AccountProperty>
  </AccountProperties>
</SetAccountPropertiesRequest>
```

The default key and value pairs are:

- MultimediaAdsAutoApply=true;
- ResponsiveSearchAdsAutoApply=false;
- ExpandedTextAdsAutoApply=false;

If the value of a key is set to *true*, then the auto-apply feature is enabled for the recommendation type.  

You can choose to set only the key and value pairs that you want to update. If no value is set for the update, this setting is not changed. 


#### <a name="businessattributes"></a>BusinessAttributes
Allows you to highlight key business values meant to help you boost ad performance. 

Business attributes are optional and you can choose one or more attributes that apply to your business.  

If the [Name](#name) element is set to *BusinessAttributes*, then the [Value](#value) can include a list of attribute types.  

Within the [Value](#value) element, the list of business attributes are delimited with a semicolon (;). The possible values include: AlcoholFree, AllergyFriendly, AsianOwned, BlackOwned, CarbonNegative, CarbonNeutral, CrueltyFree, DiabeticFriendly, EcoFriendly, FamilyFriendly, FamilyOwned, GlutenFree, Halal, HearingAssistance, Kosher, LatinOwned, LocalBusiness, LGBTQIFriendly, LGBTQIOwned, MinorityOwned, MobilityAssistance, NoContactDelivery, Nonprofit, PetFriendly, SmallBusiness, SupportACure, SupportDiseaseResearch, Sustainable, Vegan, Vegetarian, VisualAssistance, TouchlessPickup, Unisex, WebAccessibility, WheelchairAccessible, and WomenOwned.

In this example, Alcohol-free, Family-owned, and Vegan are the selected business attributes. 

```xml
<SetAccountPropertiesRequest xmlns="https://bingads.microsoft.com/CampaignManagement/v13">
  <AccountProperties xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
    <AccountProperty>
      <Name>BusinessAttributes</Name>
      <Value>AlcoholFree;FamilyOwned;Vegan</Value>
    </AccountProperty>
  </AccountProperties>
</SetAccountPropertiesRequest>
```

If the attribute appears in the value property, then it is selected; if the attribute does not appear in the value property, then it is not selected. 

To delete the account's business attributes, set the [Name](#name) to *BusinessAttributes* and the [Value](#value) to "" (empty string).

You can choose to set only the business attributes that you want to update. If no value is set for the update, this setting is not changed. 


#### <a name="finalurlsuffix"></a>FinalUrlSuffix
If the [Name](#name) element is set to *FinalUrlSuffix*, then the [Value](#value) represents your account's Final URL Suffix. 

The final URL suffix can include tracking parameters that will be appended to the end of your landing page URL. We recommend placing tracking parameters that your landing page requires in a final URL suffix so that your customers are always sent to your landing page. For more details and validation rules see [Final URL Suffix](../guides/url-tracking-upgraded-urls.md#finalurlsuffixvalidation) in the technical guides. 

To delete the account's Final URL Suffix set the [Name](#name) to *FinalUrlSuffix* and the *Value* to *""* (empty string).

#### <a name="includeviewthroughconversions"></a>IncludeViewThroughConversions
Determines whether you want to include view-through conversions for campaigns in the account. 

View-through conversions are conversions that people make after they have seen your ad, even though they did not click the ad.

If the [Name](#name) element is set to *IncludeViewThroughConversions*, then the [Value](#value) can be set to either *true* or *false*. If the value is *true*, then view-through conversions will be included. By default, if you are in the feature pilot ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 616) this property is set *true*, meaning that the values in the "All" conversions columns of your performance reports will include view-through conversions. You can choose to disable it if you don't want to include view-through conversions. 

> [!NOTE]
> View-through conversions require a [UETTag](uettag.md), so this property is not applicable for the [AppInstallGoal](appinstallgoal.md), [InStoreTransactionGoal](instoretransactiongoal.md), and [OfflineConversionGoal](offlineconversiongoal.md). 

#### <a name="msclkidautotaggingenabled"></a>MSCLKIDAutoTaggingEnabled
Determines whether auto-tagging of the MSCLKID query string parameter is enabled. The MSCLKID is a 32-character GUID that is unique for each ad click.

If the [Name](#name) element is set to *MSCLKIDAutoTaggingEnabled*, then the [Value](#value) can be set to either *true* or *false*. If the value is *true*, then the MSCLKID auto tagging feature is enabled. You might want to enable auto-tagging of MSCLKID for tracking leads via offline conversion goals. If auto-tagging of MSCLKID is enabled, the MSCLKID is automatically appended to the landing page URL when a customer clicks on your ad. For example, *www.contoso.com/?msclkid={msclkid}*. The click ID is unique for each ad click and multiple clicks on the same ad from the same user will result in multiple click IDs.

> [!IMPORTANT]
> The MSCLKIDAutoTaggingEnabled value will be set to *true* by default when a new account is created. You can manually turn if off. Every time you add or update a new [DurationGoal](durationgoal.md), [EventGoal](eventgoal.md), [OfflineConversionGoal](offlineconversiongoal.md), [PagesViewedPerVisitGoal](pagesviewedpervisitgoal.md) or [UrlGoal](urlgoal.md) via either the Microsoft Advertising web application or Campaign Management API, the *MSCLKIDAutoTaggingEnabled* value of the corresponding [AccountProperty](accountproperty.md) is set to *true* automatically. If the Scope of the goal is set to *Customer* level, then the [AccountProperty](accountproperty.md) for all existing accounts under the Customer will be set. 

#### <a name="profileexpansionenabled"></a>ProfileExpansionEnabled
Determines whether to expand LinkedIn profile targeting across your account to reach additional customers similar to the ones you currently target. 

Enabling profile targeting expansion allows Microsoft Advertising to show your ads to additional customers similar to the ones you currently target. For example, if you target a specific LinkedIn audience segment, we will also target Bing users who don't have a confirmed LinkedIn account but who share the same characteristics as LinkedIn users in that segment. 

If the [Name](#name) element is set to *ProfileExpansionEnabled*, then the [Value](#value) can be set to either *true* or *false*. If the value is *true*, then the LinkedIn profile targeting expansion feature is enabled. 

#### <a name="trackingurltemplate"></a>TrackingUrlTemplate
If the [Name](#name) element is set to *TrackingUrlTemplate*, then the [Value](#value) represents your account's tracking template to use as a default for all URLs in your account. The value of the *TrackingUrlTemplate* key can be set to any valid string as described below.

- Tracking templates defined for lower level entities e.g. keyword override those set for higher level entities e.g. campaign. For more information, see [Entity Limits](https://go.microsoft.com/fwlink/?LinkID=627130).

- The length of the tracking template is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.

- The tracking template must be a well-formed URL beginning with one of the following: *http://*, *https://*, *{lpurl}*, or *{unescapedlpurl}*.

- You must include at least one of the following landing page URL parameters: *{lpurl}*, *{lpurl+2}*, *{lpurl+3}*, *{unescapedlpurl}*, *{escapedlpurl}*. Additionally, you can use any dynamic parameter supported by Microsoft Advertising. For a list of supported parameters, see the *Available parameters* sections within the Microsoft Advertising help article [Set up a tracking template](https://help.ads.microsoft.com/#apex/3/en/56772/-1).

- Microsoft Advertising does not validate whether custom parameters exist. If you use custom parameters in your tracking template and they do not exist, then the final URL will include the key and value placeholders of your custom parameters without substitution. For example if your tracking template is  for example *`https://tracker.example.com/?season={_season}&promocode={_promocode}&u={lpurl}`*, and neither {_season} or {_promocode}  are defined at the campaign, ad group, keyword, or ad level, then the final URL will be the same.

To delete the account's tracking template set the [Name](#name) to *TrackingUrlTemplate* and the *Value* to *""* (empty string).

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetAccountProperties](getaccountproperties.md)  
[SetAccountProperties](setaccountproperties.md)  
