---
title: ResponsiveSearchAd Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: A responsive ad format for text ads in the Search network.(test)
---
# ResponsiveSearchAd Data Object Test - Campaign Management
A responsive ad format for text ads in the Search network.

> [!NOTE]
> Duplicate responsive search ads are allowed in the same ad group. 

Responsive search ads allow you to set between 3-15 unique ad headlines (a.k.a. "titles") and 2-4 ad descriptions within a single ad. From there, Bing will select the most relevant headline and description combination for each given query and corresponding search user. By allowing Bing AI to select the most relevant headline and description for each query, we ensure that the right message lands for each of your potential customers, at the right time, across all possible intent signals. 

The responsive ads shown to users appear identical to expanded text ads i.e., up to 3 headlines (title parts via expanded text ads) and 2 descriptions (text parts via expanded text ads). To maximize impressions across all ad formats the descriptions might not always be shown in your ad.

When you create responsive search ads the [Descriptions](#descriptions) and [Headlines](#headlines) lists are stored as text assets that can be shared by any responsive search ad within the account. For example if "Seamless Integration" is a text asset, you will observe that it has the same asset identifier across all ads that link to "Seamless Integration" in the same Microsoft Advertising account. The asset identifiers are not included in the [AddAds](addads.md) or [UpdateAds](updateads.md) response. With the Campaign Management service the only way to get the asset identifiers is by retrieving the ads you created. You can get the asset identifiers for descriptions and headlines by retrieving the ads in a subsequent service call e.g., via [GetAdsByAdGroupId](getadsbyadgroupid.md). With the Bulk service the asset identifiers are included in the bulk upload result file.

> [!NOTE]
> Responsive search ads can only be created in Search campaigns where the [AdGroupType](adgroup.md#adgrouptype) is set to "SearchStandard". If the [AdGroupType](adgroup.md#adgrouptype) is set to "SearchDynamic", then the ad group does not support responsive search ads.  

# [XML](#tab/xml)

```xml
<xs:complexType name="ResponsiveSearchAd" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Ad">
      <xs:sequence>
        <xs:element minOccurs="0" name="Descriptions" nillable="true" type="tns:ArrayOfAssetLink" />
        <xs:element minOccurs="0" name="Domain" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="Headlines" nillable="true" type="tns:ArrayOfAssetLink" />
        <xs:element minOccurs="0" name="Path1" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="Path2" nillable="true" type="xs:string" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AdFormatPreference": "ValueHere",
  "DevicePreference": "ValueHere",
  "EditorialStatus": "ValueHere",
  "FinalAppUrls": [
    {
      "OsType": "ValueHere",
      "Url": "ValueHere"
    }
  ],
  "FinalMobileUrls": [
    "ValueHere"
  ],
  "FinalUrls": [
    "ValueHere"
  ],
  "FinalUrlSuffix": "ValueHere",
  "ForwardCompatibilityMap": [
    {
      "key": "ValueHere",
      "value": "ValueHere"
    }
  ],
  "Id": "ValueHere",
  "Status": "ValueHere",
  "TrackingUrlTemplate": "ValueHere",
  "Type": "ResponsiveSearch",
  "UrlCustomParameters": {
    "Parameters": [
      {
        "Key": "ValueHere",
        "Value": "ValueHere"
      }
    ]
  },
  "Descriptions": [
    {
      "Asset": {
        "Id": "ValueHere",
        "Name": "ValueHere",
        "Type": "ImageAsset",
        "CropHeight": "ValueHere",
        "CropWidth": "ValueHere",
        "CropX": "ValueHere",
        "CropY": "ValueHere",
        "SubType": "ValueHere",
        "TargetHeight": "ValueHere",
        "TargetWidth": "ValueHere"
      },
      "AssetPerformanceLabel": "ValueHere",
      "EditorialStatus": "ValueHere",
      "PinnedField": "ValueHere"
    }
  ],
  "Domain": "ValueHere",
  "Headlines": [
    {
      "Asset": {
        "Id": "ValueHere",
        "Name": "ValueHere",
        "Type": "ImageAsset",
        "CropHeight": "ValueHere",
        "CropWidth": "ValueHere",
        "CropX": "ValueHere",
        "CropY": "ValueHere",
        "SubType": "ValueHere",
        "TargetHeight": "ValueHere",
        "TargetWidth": "ValueHere"
      },
      "AssetPerformanceLabel": "ValueHere",
      "EditorialStatus": "ValueHere",
      "PinnedField": "ValueHere"
    }
  ],
  "Path1": "ValueHere",
  "Path2": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [ResponsiveSearchAd](responsivesearchad.md) object has the following elements: [Descriptions](#descriptions), [Domain](#domain), [Headlines](#headlines), [Path1](#path1), [Path2](#path2).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="descriptions"></a>Descriptions|The list of descriptions that Bing can use to optimize the ad layout.<br/><br/>To maximize impressions across all ad formats the descriptions might not always be shown in your ad.<br/><br/>Unless you [pin](assetlink.md#pinnedfield) one of the descriptions to a specific position, Bing will optimize the ad layout dynamically with the best headlines and descriptions for the user's search query.<br/><br/>From a data model perspective the desriptions and headlines are each stored as text assets i.e., one [TextAsset](textasset.md) per [AssetLink](assetlink.md). The same asset can be used by multiple ads. For example if "Seamless Integration" is a text asset, it will have the same asset identifier across all ads in the same Microsoft Advertising account.<br/><br/>You must set between 2-4 descriptions. Each description's [Text](textasset.md#text) must contain at least one word. For efficient use of resources we recommend that you use dynamic text strings such as {keyword} instead of creating new ad copy for each keyword. For more information, see the Microsoft Advertising help article [Automatically customize your ads with dynamic text parameters](https://help.ads.microsoft.com/#apex/3/en/50811/1).<br/><br/>The maximum input length of each description's [Text](textasset.md#text) is 1,000 characters including dynamic text strings, and of those 1,000 no more than 90 final characters are allowed after substitution. The ad will fail to display or [default text](https://help.ads.microsoft.com/#apex/3/en/50811/1/#DefaultText) will be used if the length exceeds 90 characters after dynamic text substitution occurs. For languages with double-width characters e.g. Traditional Chinese the maximum input length is 500 characters including dynamic text strings, and of those 500 no more than 45 final characters are allowed after substitution. The ad will fail to display or [default text](https://help.ads.microsoft.com/#apex/3/en/50811/1/#DefaultText) will be used if the length exceeds 45 characters after dynamic text substitution occurs. The double-width characters are determined by the characters you use instead of the character set of the campaign or ad group language settings. Double-width characters include Korean, Japanese and Chinese languages characters as well as Emojis.<br/><br/>The [Text](textasset.md#text) cannot contain the newline (\n) character.<br/><br/>The text can contain [IF](https://help.ads.microsoft.com/#apex/3/en/56922/0) functions.<br/><br/>**Add:** Required<br/>**Update:** Optional. To retain all of the existing asset links, set or leave this element nil. If you set this element, any descriptions that were previously linked to this ad will be replaced.|[AssetLink](assetlink.md) array|
|<a name="domain"></a>Domain|The URL that will be displayed instead of the final URL. The final URL will still be used for the landing page URL.<br/><br/>Reserved for limited pilot usage e.g. pharmaceutical customers.<br/><br/>The domain portion of the URL in combination with the path 1 and path 2 strings cannot exceed 67 characters.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this element to an empty string (*""*), the previous setting will be deleted.|**string**|
|<a name="headlines"></a>Headlines|The list of ad titles that Bing can use to optimize the ad layout.<br/><br/>Unless you [pin](assetlink.md#pinnedfield) one of the headlines to a specific position, Bing will optimize the ad layout dynamically with the best headlines and descriptions for the user's search query.<br/><br/>From a data model perspective the desriptions and headlines are each stored as text assets i.e., one [TextAsset](textasset.md) per [AssetLink](assetlink.md). The same asset can be used by multiple ads. For example if "Seamless Integration" is a text asset, it will have the same asset identifier across all ads in the same Microsoft Advertising account.<br/><br/>You must set between 3-15 headlines. Each headline's [Text](textasset.md#text) must contain at least one word. For efficient use of resources we recommend that you use dynamic text strings such as {keyword} instead of creating new ad copy for each keyword. For more information, see the Microsoft Advertising help article [Automatically customize your ads with dynamic text parameters](https://help.ads.microsoft.com/#apex/3/en/50811/1).<br/><br/>The maximum input length of each headline's [Text](textasset.md#text) is 1,000 characters including dynamic text strings, and of those 1,000 no more than 30 final characters are allowed after substitution. The ad will fail to display or [default text](https://help.ads.microsoft.com/#apex/3/en/50811/1/#DefaultText) will be used if the length exceeds 30 characters after dynamic text substitution occurs.<br/><br/>For languages with double-width characters e.g. Traditional Chinese the maximum input length is 500 characters including dynamic text strings, and of those 500 no more than 15 final characters are allowed after substitution. The ad will fail to display or [default text](https://help.ads.microsoft.com/#apex/3/en/50811/1/#DefaultText) will be used if the length exceeds 15 characters after dynamic text substitution occurs. The double-width characters are determined by the characters you use instead of the character set of the campaign or ad group language settings. Double-width characters include Korean, Japanese and Chinese languages characters as well as Emojis.<br/><br/>The [Text](textasset.md#text) cannot contain the newline (\n) character.<br/><br/>The text can contain [IF](https://help.ads.microsoft.com/#apex/3/en/56922/0) functions.<br/><br/>**Add:** Required<br/>**Update:** Optional. To retain all of the existing asset links, set or leave this element nil. If you set this element, any headlines that were previously linked to this ad will be replaced.|[AssetLink](assetlink.md) array|
|<a name="path1"></a>Path1|The first part of the optional path that will be appended to the domain portion of your display URL. The domain portion of your display URL e.g. *https://www.contoso.com* will be generated from the domain of your Final URL ([FinalUrls](#finalurls) element).  Then if you have specified a value for [Path1](#path1) it will be appended to the display URL. If you have also specified a value for [Path2](#path2), then it will also be appended to the display URL after [Path1](#path1). For example if your [FinalUrls](#finalurls) contains *https://www.contoso.com*, [Path1](#path1) is set to *subdirectory1*, and [Path2](#path2) is set to *subdirectory2*, then the URL displayed will be *https://www.contoso.com/subdirectory1/subdirectory2*.<br/><br/>The path can contain dynamic parameters such as {MatchType}. For a list of supported parameters, see the Microsoft Advertising help article [What tracking or URL parameters can I use?](https://help.ads.microsoft.com/#apex/3/en/56799/2).<br/><br/>The maximum input length is 1,000 characters if you include dynamic text strings. No more than 15 final (not dynamic text) characters can be input. The ad will fail to display or the [default text](https://help.ads.microsoft.com/#apex/3/en/50811/1/#DefaultText) will be used if the length of the final URL domain and the paths combined exceed 67 characters.<br/><br/>For languages with double-width characters e.g. Traditional Chinese the maximum input length is 1,000 characters if you include dynamic text strings. No more than 7 final (not dynamic text) characters can be input. The ad will fail to display or the [default text](https://help.ads.microsoft.com/#apex/3/en/50811/1/#DefaultText) will be used if the length of the final URL domain and the paths combined exceed 33 characters. The double-width characters are determined by the characters you use instead of the character set of the campaign or ad group language settings. Double-width characters include Korean, Japanese and Chinese languages characters as well as Emojis.<br/><br/>The path cannot contain the forward slash (/) or newline (\n) characters.<br/><br/>If the path includes a space, it will be replaced with an underscore (_) when the ad is shown.<br/><br/>The path can contain [IF](https://help.ads.microsoft.com/#apex/3/en/56922/0) functions.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this element to an empty string (*""*), the previous setting will be deleted.|**string**|
|<a name="path2"></a>Path2|The second part of the optional path that will be appended to the domain portion of your display URL. The domain portion of your display URL e.g. *https://www.contoso.com* will be generated from the domain of your Final URL ([FinalUrls](#finalurls) element).  Then if you have specified a value for [Path1](#path1) it will be appended to the display URL. If you have also specified a value for [Path2](#path2), then it will also be appended to the display URL after [Path1](#path1). For example if your [FinalUrls](#finalurls) contains *https://www.contoso.com*, [Path1](#path1) is set to *subdirectory1*, and [Path2](#path2) is set to *subdirectory2*, then the URL displayed will be *https://www.contoso.com/subdirectory1/subdirectory2*.<br/><br/>You can only specify [Path2](#path2) if [Path1](#path1) is also set.<br/><br/>The path can contain dynamic parameters such as {MatchType}. For a list of supported parameters, see the Microsoft Advertising help article [What tracking or URL parameters can I use?](https://help.ads.microsoft.com/#apex/3/en/56799/2).<br/><br/>The maximum input length is 1,000 characters if you include dynamic text strings. No more than 15 final (not dynamic text) characters can be input. The ad will fail to display or the [default text](https://help.ads.microsoft.com/#apex/3/en/50811/1/#DefaultText) will be used if the length of the final URL domain and the paths combined exceed 67 characters.<br/><br/>For languages with double-width characters e.g. Traditional Chinese the maximum input length is 1,000 characters if you include dynamic text strings. No more than 7 final (not dynamic text) characters can be input. The ad will fail to display or the [default text](https://help.ads.microsoft.com/#apex/3/en/50811/1/#DefaultText) will be used if the length of the final URL domain and the paths combined exceed 33 characters. The double-width characters are determined by the characters you use instead of the character set of the campaign or ad group language settings. Double-width characters include Korean, Japanese and Chinese languages characters as well as Emojis.<br/><br/>The path cannot contain the forward slash (/) or newline (\n) characters.<br/><br/>If the path includes a space, it will be replaced with an underscore (_) when the ad is shown.<br/><br/>The path can contain [IF](https://help.ads.microsoft.com/#apex/3/en/56922/0) functions.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this element to an empty string (*""*), the previous setting will be deleted.|**string**|

The [ResponsiveSearchAd](responsivesearchad.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsad"></a>Inherited Elements from Ad
The [ResponsiveSearchAd](responsivesearchad.md) object derives from the [Ad](ad.md) object, and inherits the following elements: [AdFormatPreference](#adformatpreference), [DevicePreference](#devicepreference), [EditorialStatus](#editorialstatus), [FinalAppUrls](#finalappurls), [FinalMobileUrls](#finalmobileurls), [FinalUrls](#finalurls), [FinalUrlSuffix](#finalurlsuffix), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Id](#id), [Status](#status), [TrackingUrlTemplate](#trackingurltemplate), [Type](#type), [UrlCustomParameters](#urlcustomparameters). The descriptions below are specific to [ResponsiveSearchAd](responsivesearchad.md), and might not apply to other objects that inherit the same elements from the [Ad](ad.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="adformatpreference"></a>AdFormatPreference|Not supported for this ad type.|**string**|
|<a name="devicepreference"></a>DevicePreference|Not supported for this ad type.|**long**|
|<a name="editorialstatus"></a>EditorialStatus|The editorial review status of the ad, which indicates whether the ad is pending review, has been approved, or has been disapproved.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[AdEditorialStatus](adeditorialstatus.md)|
|<a name="finalappurls"></a>FinalAppUrls|Not supported for this ad type.|[AppUrl](appurl.md) array|
|<a name="finalmobileurls"></a>FinalMobileUrls|The mobile landing page URL.<br/><br/>The following validation rules apply to Final URLs and Final Mobile URLs.<br/>- The length of the URL is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.<br/>- You may specify up to 10 items for both [FinalUrls](#finalurls) and [FinalMobileUrls](#finalmobileurls); however, only the first item in each list is used for delivery. The service allows up to 10 for potential forward compatibility.<br/>- Usage of '{' and '}' is only allowed to delineate tags, for example *{lpurl}*.<br/>- Final URLs must each be a well-formed URL starting with either http:// or https://.<br/>- If you specify [FinalMobileUrls](#finalmobileurls), you must also specify [FinalUrls](#finalurls).<br/>- You may not specify [FinalMobileUrls](#finalmobileurls) if the device preference is set to mobile.<br/><br/>This URL is used only if the keyword does not specify a final mobile URL.<br/><br/>**Add:** Optional<br/>**Update:** Optional|**string** array|
|<a name="finalurls"></a>FinalUrls|The landing page URL.<br/><br/>The domain portion of the URL in combination with the path 1 and path 2 strings cannot exceed 67 characters.<br/><br/>The following validation rules apply to Final URLs and Final Mobile URLs.<br/>- The length of the URL is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.<br/>- You may specify up to 10 items for both [FinalUrls](#finalurls) and [FinalMobileUrls](#finalmobileurls); however, only the first item in each list is used for delivery. The service allows up to 10 for potential forward compatibility.<br/>- Usage of '{' and '}' is only allowed to delineate tags, for example *{lpurl}*.<br/>- Final URLs must each be a well-formed URL starting with either http:// or https://.<br/>- If you specify [FinalMobileUrls](#finalmobileurls), you must also specify [FinalUrls](#finalurls).<br/>- You may not specify [FinalMobileUrls](#finalmobileurls) if the device preference is set to mobile. Also note that  if this ad's [TrackingUrlTemplate](#trackingurltemplate) or [UrlCustomParameters](#urlcustomparameters) element are set, then at least one final URL is required.<br/><br/>This URL is used only if the keyword does not specify a final URL.<br/><br/>**Add:** Required<br/>**Update:** Optional|**string** array|
|<a name="finalurlsuffix"></a>FinalUrlSuffix|The final URL suffix can include tracking parameters that will be appended to the end of your landing page URL. We recommend placing tracking parameters that your landing page requires in a final URL suffix so that your customers are always sent to your landing page. For more details and validation rules see [Final URL Suffix](../guides/url-tracking-upgraded-urls.md#finalurlsuffixvalidation) in the technical guides.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this element to an empty string (*""*), the previous setting will be deleted.|**string**|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>Forward compatibility changes will be noted here in future releases. There are currently no forward compatibility changes for this object.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="id"></a>Id|The unique Microsoft Advertising identifier of the ad.<br/><br/>**Add:** Read-only<br/>**Update:** Required and Read-Only|**long**|
|<a name="status"></a>Status|The status of the ad.<br/><br/>You can set the ad status to Active or Paused.<br/><br/>**Add:** Optional<br/>**Update:** Optional|[AdStatus](adstatus.md)|
|<a name="trackingurltemplate"></a>TrackingUrlTemplate|The tracking template to use as a default for all landing page URLs.<br/><br/>The following validation rules apply to tracking templates. For more details about supported templates and parameters, see the Microsoft Advertising help article [What tracking or URL parameters can I use?](https://help.ads.microsoft.com/#apex/3/en/56799/2)<br/>- Tracking templates defined for lower level entities e.g. ads override those set for higher level entities e.g. campaign. For more information, see [Entity Limits](../guides/entity-hierarchy-limits.md).<br/>- The length of the tracking template is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.<br/>- The tracking template must be a well-formed URL beginning with one of the following: *http://*, *https://*, *{lpurl}*, or *{unescapedlpurl}*.<br/>- Microsoft Advertising does not validate whether custom parameters exist. If you use custom parameters in your tracking template and they do not exist, then the landing page URL will include the key and value placeholders of your custom parameters without substitution. For example, if your tracking template is *`https://tracker.example.com/?season={_season}&promocode={_promocode}&u={lpurl}`* and neither *{_season}* or *{_promocode}* are defined at the campaign, ad group, criterion, keyword, or ad level, then the landing page URL will be the same.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this element to an empty string (*""*), the previous setting will be deleted.|**string**|
|<a name="type"></a>Type|The type of the ad. This value is *ResponsiveSearch* when you retrieve a responsive search ad. For more information about ad types, see the [Ad Data Object Remarks](ad.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[AdType](adtype.md)|
|<a name="urlcustomparameters"></a>UrlCustomParameters|Your custom collection of key and value parameters for URL tracking.<br/><br/>Microsoft Advertising will accept the first 8 [CustomParameter](customparameter.md) objects that you include within the [CustomParameters](customparameters.md) object, and if you include more than 8 custom parameters an error will be returned. Each [CustomParameter](customparameter.md) includes [Key](customparameter.md#key) and [Value](customparameter.md#value) elements.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. Set the [UrlCustomParameters](#urlcustomparameters) element to null or empty to retain any existing custom parameters. To remove all custom parameters, set the [Parameters](customparameters.md#parameters) element of the [CustomParameters](customparameters.md) object to null or empty. To remove a subset of custom parameters, specify the custom parameters that you want to keep in the [Parameters](customparameters.md#parameters) element of the [CustomParameters](customparameters.md) object.|[CustomParameters](customparameters.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

