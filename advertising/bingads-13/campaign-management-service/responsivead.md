---
title: ResponsiveAd Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: A responsive ad format for audience ads and multimedia ads.
---
# ResponsiveAd Data Object - Campaign Management
A responsive ad format for audience ads and multimedia ads.

The ResponsiveAd object is used for both [Multimedia ads](https://help.ads.microsoft.com/#apex/ads/en/60107/0) in the search network and [Audience ads](https://help.ads.microsoft.com/#apex/ads/en/56674/0) in the Microsoft Audience Network. See the [remarks](#remarks) section below for details about the key differentiators.

> [!NOTE]
> Duplicate responsive ads are allowed in the same ad group.

## Syntax
```xml
<xs:complexType name="ResponsiveAd" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Ad">
      <xs:sequence>
        <xs:element minOccurs="0" name="BusinessName" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="CallToAction" nillable="true" type="tns:CallToAction" />
        <xs:element minOccurs="0" name="CallToActionLanguage" nillable="true" type="tns:LanguageName" />
        <xs:element minOccurs="0" name="Descriptions" nillable="true" type="tns:ArrayOfAssetLink" />
        <xs:element minOccurs="0" name="Headline" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="Headlines" nillable="true" type="tns:ArrayOfAssetLink" />
        <xs:element minOccurs="0" name="Images" nillable="true" type="tns:ArrayOfAssetLink" />
        <xs:element xmlns:q4="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="ImpressionTrackingUrls" nillable="true" type="q4:ArrayOfstring">
          <xs:annotation>
            <xs:appinfo>
              <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
            </xs:appinfo>
          </xs:annotation>
        </xs:element>
        <xs:element minOccurs="0" name="LongHeadline" nillable="true" type="tns:AssetLink" />
        <xs:element minOccurs="0" name="LongHeadlineString" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="LongHeadlines" nillable="true" type="tns:ArrayOfAssetLink">
          <xs:annotation>
            <xs:appinfo>
              <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
            </xs:appinfo>
          </xs:annotation>
        </xs:element>
        <xs:element minOccurs="0" name="Text" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="Videos" nillable="true" type="tns:ArrayOfAssetLink">
          <xs:annotation>
            <xs:appinfo>
              <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
            </xs:appinfo>
          </xs:annotation>
        </xs:element>
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [ResponsiveAd](responsivead.md) object has the following elements: [BusinessName](#businessname), [CallToAction](#calltoaction), [CallToActionLanguage](#calltoactionlanguage), [Descriptions](#descriptions), [Headline](#headline), [Headlines](#headlines), [Images](#images), [ImpressionTrackingUrls](#impressiontrackingurls), [LongHeadline](#longheadline), [LongHeadlines](#longheadlines), [LongHeadlineString](#longheadlinestring), [Text](#text), [Videos](#videos).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="businessname"></a>BusinessName|The name of the business.<br/><br/>Your business's name may appear in your ad, depending on the ad placement.<br/><br/>The length of the string is limited to 25 characters.<br/><br/>**Add:** Required<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string**|
|<a name="calltoaction"></a>CallToAction|A brief, punchy reason for customers to click your ad right now.<br/><br/>This is displayed on your call to action button.<br/><br/>**Add:** Not applicable for audience ads; Required for multimedia ads<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|[CallToAction](calltoaction.md)|
|<a name="calltoactionlanguage"></a>CallToActionLanguage|The language that the call to action will be served in.<br/><br/>The call to action will always be served in this language, regardless of the campaign's language settings.<br/><br/>**Add:** Not applicable for audience ads; Required for multimedia ads<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|[LanguageName](languagename.md)|
|<a name="descriptions"></a>Descriptions|The descriptions that are shown below the path in your ad. To maximize impressions across all ad formats, the descriptions might not always be shown in your ad.<br/><br/>To maximize impressions across all ad formats the descriptions might not always be shown in your ad.<br/><br/>Unless you [pin](assetlink.md#pinnedfield) one of the descriptions to a specific position, Bing will optimize the ad layout dynamically with the best headlines and descriptions for the user's search query.<br/><br/>From a data model perspective the desriptions and headlines are each stored as text assets i.e., one [TextAsset](textasset.md) per [AssetLink](assetlink.md). The same asset can be used by multiple ads. For example if "Seamless Integration" is a text asset, it will have the same asset identifier across all ads in the same Microsoft Advertising account.<br/><br/>You must set between 1-5 descriptions. Each description's [Text](textasset.md#text) must contain at least one word. For efficient use of resources we recommend that you use dynamic text strings such as {keyword} instead of creating new ad copy for each keyword. For more information, see the Microsoft Advertising help article [Automatically customize your ads with dynamic text parameters](https://help.ads.microsoft.com/#apex/3/en/50811/1).<br/><br/>The maximum input length of each description's [Text](textasset.md#text) is 1,000 characters including dynamic text strings, and of those 1,000 no more than 90 final characters are allowed after substitution. The ad will fail to display or [default text](https://help.ads.microsoft.com/#apex/3/en/50811/1/#DefaultText) will be used if the length exceeds 90 characters after dynamic text substitution occurs. For languages with double-width characters e.g. Traditional Chinese the maximum input length is 500 characters including dynamic text strings, and of those 500 no more than 45 final characters are allowed after substitution. The ad will fail to display or [default text](https://help.ads.microsoft.com/#apex/3/en/50811/1/#DefaultText) will be used if the length exceeds 45 characters after dynamic text substitution occurs. The double-width characters are determined by the characters you use instead of the character set of the campaign or ad group language settings. Double-width characters include Korean, Japanese and Chinese languages characters as well as Emojis.<br/><br/>The [Text](textasset.md#text) cannot contain the newline (\n) character.<br/><br/>**Add:** Required for multimedia ads and audience ads. Not applicable for video ads. <br/>**Update:** Optional. To retain all of the existing asset links, set or leave this element nil. If you set this element, any descriptions that were previously linked to this ad will be replaced.|[AssetLink](assetlink.md) array|
|<a name="headline"></a>Headline|Headlines are the most prominent text that appears in your ad, so you should make the most out of the available characters. We require multiple headlines so the ad can flexibly display across a variety of publishers and placements.<br/><br/>The length of the string is limited to 30 characters.<br/><br/>**Add:** Required for video ads. Not applicable for multimedia ads and audience ads.<br/>**Update:** Optional. Deprecated for multimedia and audience ads. Use Headlines instead.|**string**|
|<a name="headlines"></a>Headlines|Headlines are the most prominent text that appears in your ad, so you should make the most out of the available characters. We require multiple headlines so the ad can flexibly display across a variety of publishers and placements.<br/><br/>Unless you [pin](assetlink.md#pinnedfield) one of the headlines to a specific position, Bing will optimize the ad layout dynamically with the best headlines and descriptions for the user's search query.<br/><br/>From a data model perspective the desriptions and headlines are each stored as text assets i.e., one [TextAsset](textasset.md) per [AssetLink](assetlink.md). The same asset can be used by multiple ads. For example if "Seamless Integration" is a text asset, it will have the same asset identifier across all ads in the same Microsoft Advertising account.<br/><br/>You must set between 1-15 headlines. Each headline's [Text](textasset.md#text) must contain at least one word. For efficient use of resources we recommend that you use dynamic text strings such as {keyword} instead of creating new ad copy for each keyword. For more information, see the Microsoft Advertising help article [Automatically customize your ads with dynamic text parameters](https://help.ads.microsoft.com/#apex/3/en/50811/1).<br/><br/>The maximum input length of each headline's [Text](textasset.md#text) is 1,000 characters including dynamic text strings, and of those 1,000 no more than 30 final characters are allowed after substitution. The ad will fail to display or [default text](https://help.ads.microsoft.com/#apex/3/en/50811/1/#DefaultText) will be used if the length exceeds 30 characters after dynamic text substitution occurs.<br/><br/>For languages with double-width characters e.g. Traditional Chinese the maximum input length is 500 characters including dynamic text strings, and of those 500 no more than 15 final characters are allowed after substitution. The ad will fail to display or [default text](https://help.ads.microsoft.com/#apex/3/en/50811/1/#DefaultText) will be used if the length exceeds 15 characters after dynamic text substitution occurs. The double-width characters are determined by the characters you use instead of the character set of the campaign or ad group language settings. Double-width characters include Korean, Japanese and Chinese languages characters as well as Emojis.<br/><br/>The [Text](textasset.md#text) cannot contain the newline (\n) character.<br/><br/>**Add:** Required for multimedia ads and audience ads. Not applicable for video ads.<br/>**Update:** Optional. To retain all of the existing asset links, set or leave this element nil. If you set this element, any headlines that were previously linked to this ad will be replaced.|[AssetLink](assetlink.md) array|
|<a name="images"></a>Images|Image assets with different sizes and aspect ratios so they can flexibly display across a variety of publishers and placements.<br/><br/>Include one or more [AssetLink](assetlink.md) objects that each contain an [ImageAsset](imageasset.md) with [SubType](imageasset.md#subtype) and crop settings that match the desired aspect ratio. For more information see the [remarks](#remarks) below.<br/><br/>**Add:** Required<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. If you include images during update, any previously set images will be replaced.|[AssetLink](assetlink.md) array|
|<a name="impressiontrackingurls"></a>ImpressionTrackingUrls|The URLs for 1x1 impression tracking pixels. Each pixel will report Microsoft Audience Network impressions to your third-party ad reporting tool.<br/><br/>You can include up to 2 impression tracking URLs for each responsive ad.<br/><br/>Each URL must be accessible. The length of the URL is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.<br/><br/>For each Microsoft Audience Network impression, Microsoft will ping the URL to enable impression tracking in your third party ad reporting tool. Advanced-level user tracking such as conversion tracking or tracking based on cookies or IP addresses is not supported.<br/><br/>This element is not returned by default. To get this element, include the ImpressionTrackingUrls value in the ReturnAdditionalFields element when you call the [GetAdsByAdGroupId](getadsbyadgroupid.md#returnadditionalfields), [GetAdsByEditorialStatus](getadsbyeditorialstatus.md#returnadditionalfields), and [GetAdsByIds](getadsbyids.md#returnadditionalfields) service operations.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. To remove impression tracking URLs set this element to an empty string array.|**string** array|
|<a name="longheadline"></a>LongHeadline|Reserved for future use.|[AssetLink](assetlink.md)|
|<a name="longheadlines"></a>LongHeadlines|Headlines are the most prominent text that appears in your ad, so you should make the most out of the available characters. We require multiple headlines so the ad can flexibly display across a variety of publishers and placements.<br/><br/>Unless you [pin](assetlink.md#pinnedfield) one of the headlines to a specific position, Bing will optimize the ad layout dynamically with the best headlines and descriptions for the user's search query.<br/><br/>From a data model perspective the desriptions and headlines are each stored as text assets i.e., one [TextAsset](textasset.md) per [AssetLink](assetlink.md). The same asset can be used by multiple ads. For example if "Seamless Integration" is a text asset, it will have the same asset identifier across all ads in the same Microsoft Advertising account.<br/><br/>You must set between 1-5 headlines. Each headline's [Text](textasset.md#text) must contain at least one word. For efficient use of resources we recommend that you use dynamic text strings such as {keyword} instead of creating new ad copy for each keyword. For more information, see the Microsoft Advertising help article [Automatically customize your ads with dynamic text parameters](https://help.ads.microsoft.com/#apex/3/en/50811/1).<br/><br/>The maximum input length of each headline's [Text](textasset.md#text) is 1,000 characters including dynamic text strings, and of those 1,000 no more than 30 final characters are allowed after substitution. The ad will fail to display or [default text](https://help.ads.microsoft.com/#apex/3/en/50811/1/#DefaultText) will be used if the length exceeds 30 characters after dynamic text substitution occurs.<br/><br/>For languages with double-width characters e.g. Traditional Chinese the maximum input length is 500 characters including dynamic text strings, and of those 500 no more than 15 final characters are allowed after substitution. The ad will fail to display or [default text](https://help.ads.microsoft.com/#apex/3/en/50811/1/#DefaultText) will be used if the length exceeds 15 characters after dynamic text substitution occurs. The double-width characters are determined by the characters you use instead of the character set of the campaign or ad group language settings. Double-width characters include Korean, Japanese and Chinese languages characters as well as Emojis.<br/><br/>The [Text](textasset.md#text) cannot contain the newline (\n) character.<br/><br/>**Add:** Required for multimedia ads and audience ads. Not applicable for video ads.<br/>**Update:** Optional. To retain all of the existing asset links, set or leave this element nil. If you set this element, any headlines that were previously linked to this ad will be replaced.|[AssetLink](assetlink.md) array|
|<a name="longheadlinestring"></a>LongHeadlineString|Headlines are the most prominent text that appears in your ad, so you should make the most out of the available characters. We require multiple headlines so the ad can flexibly display across a variety of publishers and placements.<br/><br/>The length of the string is limited to 90 characters.<br/><br/>**Add:** Required for audience ads and video ads. Not applicable for multimedia ads.<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string**|
|<a name="text"></a>Text|This text will appear below or adjacent to your ad's long or short headline, depending on the ad placement.<br/><br/>You have more character space to work with in the ad text than in the headline. So once the imagery and headline have a potential customer's attention, the ad text needs to convince them to click it. What sets your product or service apart?<br/><br/>The text must contain at least one word.<br/><br/>The length of the string is limited to 90 characters.<br/><br/>The text cannot contain the newline (\n) character.<br/><br/>**Add:** Required for video ads. Not applicable for multimedia ads and audience ads.<br/>**Update:** Optional for video ads. Use Descriptions instead for audience ads or multimedia ads (deprecated). |**string**|
|<a name="videos"></a>Videos|Video assets with different sizes and aspect ratios so they can flexibly display across a variety of publishers and placements.<br/><br/>Include one or more AssetLink objects that each contain a [VideoAsset](videoasset.md) with a [SubType](videoasset.md#subtype).<br/><br/>**Add:** Required for video ads<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. If you include videos during an update, any previously set videos will be replaced. |[AssetLink](assetlink.md) array|

The [ResponsiveAd](responsivead.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsad"></a>Inherited Elements from Ad
The [ResponsiveAd](responsivead.md) object derives from the [Ad](ad.md) object, and inherits the following elements: [AdFormatPreference](#adformatpreference), [DevicePreference](#devicepreference), [EditorialStatus](#editorialstatus), [FinalAppUrls](#finalappurls), [FinalMobileUrls](#finalmobileurls), [FinalUrls](#finalurls), [FinalUrlSuffix](#finalurlsuffix), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Id](#id), [Status](#status), [TrackingUrlTemplate](#trackingurltemplate), [Type](#type), [UrlCustomParameters](#urlcustomparameters). The descriptions below are specific to [ResponsiveAd](responsivead.md), and might not apply to other objects that inherit the same elements from the [Ad](ad.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="adformatpreference"></a>AdFormatPreference|Not supported for this ad type.|**string**|
|<a name="devicepreference"></a>DevicePreference|Not supported for this ad type.|**long**|
|<a name="editorialstatus"></a>EditorialStatus|The editorial review status of the ad, which indicates whether the ad is pending review, has been approved, or has been disapproved.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[AdEditorialStatus](adeditorialstatus.md)|
|<a name="finalappurls"></a>FinalAppUrls|Not supported for this ad type.|[AppUrl](appurl.md) array|
|<a name="finalmobileurls"></a>FinalMobileUrls|The mobile landing page URL.<br/><br/>The following validation rules apply to Final URLs and Final Mobile URLs.<br/>- The length of the URL is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.<br/>- You may specify up to 10 items for both [FinalUrls](#finalurls) and [FinalMobileUrls](#finalmobileurls); however, only the first item in each list is used for delivery. The service allows up to 10 for potential forward compatibility.<br/>- Usage of '{' and '}' is only allowed to delineate tags, for example *{lpurl}*.<br/>- Final URLs must each be a well-formed URL starting with either http:// or https://.<br/>- If you specify [FinalMobileUrls](#finalmobileurls), you must also specify [FinalUrls](#finalurls).<br/>- You may not specify [FinalMobileUrls](#finalmobileurls) if the device preference is set to mobile.<br/><br/>This URL is used only if the keyword does not specify a final mobile URL.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this element to an empty list, the previous setting will be deleted.|**string** array|
|<a name="finalurls"></a>FinalUrls|The landing page URL.<br/><br/>The domain portion of the URL in combination with the path 1 and path 2 strings cannot exceed 67 characters.<br/><br/>The following validation rules apply to Final URLs and Final Mobile URLs.<br/>- The length of the URL is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.<br/>- You may specify up to 10 items for both [FinalUrls](#finalurls) and [FinalMobileUrls](#finalmobileurls); however, only the first item in each list is used for delivery. The service allows up to 10 for potential forward compatibility.<br/>- Usage of '{' and '}' is only allowed to delineate tags, for example *{lpurl}*.<br/>- Final URLs must each be a well-formed URL starting with either http:// or https://.<br/>- If you specify [FinalMobileUrls](#finalmobileurls), you must also specify [FinalUrls](#finalurls).<br/>- You may not specify [FinalMobileUrls](#finalmobileurls) if the device preference is set to mobile. Also note that if this ad's *TrackingUrlTemplate* or *UrlCustomParameters* element are set, then at least one final URL is required.<br/><br/>This URL is used only if the keyword does not specify a final URL.<br/><br/>**Add:** Required<br/>**Update:** Optional|**string** array|
|<a name="finalurlsuffix"></a>FinalUrlSuffix|The final URL suffix can include tracking parameters that will be appended to the end of your landing page URL. We recommend placing tracking parameters that your landing page requires in a final URL suffix so that your customers are always sent to your landing page. For more details and validation rules see [Final URL Suffix](../guides/url-tracking-upgraded-urls.md#finalurlsuffixvalidation) in the technical guides.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this element to an empty string (*""*), the previous setting will be deleted.|**string**|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>Forward compatibility changes will be noted here in future releases. There are currently no forward compatibility changes for this object.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="id"></a>Id|The unique Microsoft Advertising identifier of the ad.<br/><br/>**Add:** Read-only<br/>**Update:** Required and Read-Only|**long**|
|<a name="status"></a>Status|The status of the ad.<br/><br/>You can set the ad status to Active or Paused.<br/><br/>**Add:** Optional<br/>**Update:** Optional|[AdStatus](adstatus.md)|
|<a name="trackingurltemplate"></a>TrackingUrlTemplate|The tracking template to use as a default for all landing page URLs.<br/><br/>The following validation rules apply to tracking templates. For more details about supported templates and parameters, see the Microsoft Advertising help article [What tracking or URL parameters can I use?](https://help.ads.microsoft.com/#apex/3/en/56799/2)<br/>- Tracking templates defined for lower level entities e.g. ads override those set for higher level entities e.g. campaign. For more information, see [Entity Limits](../guides/entity-hierarchy-limits.md).<br/>- The length of the tracking template is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.<br/>- The tracking template must be a well-formed URL beginning with one of the following: *http://*, *https://*, *{lpurl}*, or *{unescapedlpurl}*.<br/>- Microsoft Advertising does not validate whether custom parameters exist. If you use custom parameters in your tracking template and they do not exist, then the landing page URL will include the key and value placeholders of your custom parameters without substitution. For example, if your tracking template is *`https://tracker.example.com/?season={_season}&promocode={_promocode}&u={lpurl}`* and neither *{_season}* or *{_promocode}* are defined at the campaign, ad group, criterion, keyword, or ad level, then the landing page URL will be the same.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this element to an empty string (*""*), the previous setting will be deleted.|**string**|
|<a name="type"></a>Type|The type of the ad. This value is *ResponsiveAd* when you retrieve a responsive ad. For more information about ad types, see the [Ad Data Object Remarks](ad.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[AdType](adtype.md)|
|<a name="urlcustomparameters"></a>UrlCustomParameters|Your custom collection of key and value parameters for URL tracking.<br/><br/>Microsoft Advertising will accept the first 8 [CustomParameter](customparameter.md) objects that you include within the [CustomParameters](customparameters.md) object, and if you include more than 8 custom parameters an error will be returned. Each [CustomParameter](customparameter.md) includes [Key](customparameter.md#key) and [Value](customparameter.md#value) elements.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. Set the [UrlCustomParameters](#urlcustomparameters) element to null or empty to retain any existing custom parameters. To remove all custom parameters, set the [Parameters](customparameters.md#parameters) element of the [CustomParameters](customparameters.md) object to null or empty. To remove a subset of custom parameters, specify the custom parameters that you want to keep in the [Parameters](customparameters.md#parameters) element of the [CustomParameters](customparameters.md) object.|[CustomParameters](customparameters.md)|

## <a name="remarks"></a>Remarks
The ResponsiveAd object is used for [Multimedia ads](https://help.ads.microsoft.com/#apex/ads/en/60107/0) in the search network and [Audience ads](https://help.ads.microsoft.com/#apex/ads/en/56674/0) in the Microsoft Audience Network. 

Most supported properties are the same, but here are some of the key differentiators.

- For audience ads you'll set [BusinessName](#businessname), [Headlines](#headlines), [Images](#images), [ImpressionTrackingUrls](#impressiontrackingurls), [LongHeadlines](#longheadlines), and [Descriptions](#descriptions).
- For multimedia ads you'll set [BusinessName](#businessname), [CallToAction](#calltoaction), [CallToActionLanguage](#calltoactionlanguage), [Descriptions](#descriptions), [Headlines](#headlines), [Images](#images), and [LongHeadlines](#longheadlines).

> [!NOTE]
> The data for [Images](#images) are provisioned via the [AddMedia](addmedia.md) operation. You can use the GIF, JPEG, or PNG MIME types. Images with animation are not supported. Although you can only add media with a few aspect ratios via the [AddMedia](addmedia.md) operation, you can use [ImageAsset](imageasset.md) crop settings to determine the effective aspect ratio in the context of each responsive ad [AssetLink](assetlink.md). The aspect ratio of the stored image would be unchanged in the account level media library.
>
> The maximum file size is 5 MB. The maximum width and height in pixels are 2592 and 2048 independently, and you must still maintain one of the supported aspect ratios. For example if the image asset with sub type LandscapeImageMedia is 2592 in width, then the height must be 1357.

### Multimedia ad images

For multimedia ads you'll create multiple image assets with different sizes and aspect ratios. You need to add at least 1 image with 1.91:1 aspect ratio and 1 image with 1:1 aspect ratio.

In the [Images](#images) element include one or more [AssetLink](assetlink.md) objects. Each asset link contains an [ImageAsset](imageasset.md) with [SubType](imageasset.md#subtype) set to one of the string values in the table below.

|Sub Type|Aspect ratio|Minimum dimensions in pixels|
|--------|--------|--------|
|Image191x100|1.91:1|703 width x 368 height|
|Image4x1|4:1|608 width x 152 height|
|Image1x1|1:1|470 width x 470 height|
|Image1x2|1:2|470 width x 940 height|

### Multimedia ad logos

For multimedia ads you'll create multiple logo assets with different sizes, aspect ratios, and crop settings so they can flexibly displayed in the thumbnail list.

|Sub Type|Aspect ratio|Minimum dimensions in pixels|
|--------|--------|--------|
Image1x1|1:1|128 width x 128 height
Image4x1|4:1|512 width x 128 height

### Audience ad images

For audience ads you'll create multiple image assets with different sizes, aspect ratios, and crop settings so they can flexibly display across a variety of publishers and placements. 

In the [Images](#images) element include one or more [AssetLink](assetlink.md) objects. Each asset link contains an [ImageAsset](imageasset.md) with [SubType](imageasset.md#subtype) set to one of the string values in the table below.

|Sub Type|Aspect ratio|Minimum dimensions in pixels|
|--------|--------|--------|
|OriginalImage|N/A|703 width x 368 height|
|LandscapeImageMedia|1.91:1|300 width x 157 height|
|SquareImageMedia|1:1|114 width x 114 height|
|ImageMedia201X100|2.01:1|612 width x 304 height|
|ImageMedia120X100|1.2:1|300 width x 250 height|
|ImageMedia200X100|2:1|200 width x 100 height|
|ImageMedia169X100|1.69:1|628 width x 372 height|
|ImageMedia124X100|1.24:1|104 width x 84 height|
|ImageMedia153X100|1.53:1|306 width x 200 height|

You are only required to provide a default image OriginalImage image asset (the default image was previously LandscapeImageMedia). In the [Images](#images) element include an [AssetLink](assetlink.md) that contains one [ImageAsset](imageasset.md) with [SubType](imageasset.md#subtype) set to OriginalImage. The recommended dimensions for the OriginalImage are 1200 width x 628 height. Optionally you can include additional asset links, i.e., one image asset for each supported sub type. For any image asset sub types that you do not explicitly set, Microsoft Advertising will automatically create image asset links by cropping the LandscapeImageMedia. 

Given the [GetAdsByAdGroupId](getadsbyadgroupid.md) response example below, please take note of the following:

- The same image asset identifier (e.g., 1234567890000) is used for all auto-generated image asset sub types. Whether or not you let Microsoft Advertising automatically generate the cropped images, the [Id](imageasset.md#id) does not need to be unique among the image assets linked to the same ad.
- Because the ad in this example was created without crop settings for the OriginalImage image asset sub type, all image assets are cropped except for the OriginalImage associated image.
- Whether or not the OriginalImage has its own crop settings, Microsoft Advertising uses the true height of the landscape image for all of the default crop settings. In this example the crop height for all system-generated image assets is 628, and we can infer that the OriginalImage (OriginalImage sub type) with 1.91:1 aspect ratio has width and height of 1200x628. Even if the OriginalImage asset link had been created with crop settings e.g., 703x368, the crop settings of the auto-generated image assets are based on the full dimensions of the landscape image (again that would be 1200x628 in this example).

```xml
<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
	<s:Header>
		<h:TrackingId xmlns:h="https://bingads.microsoft.com/CampaignManagement/v12">3acf4989-d6a3-405f-9fd1-a2e8dd1b09f8</h:TrackingId>
	</s:Header>
	<s:Body>
		<GetAdsByAdGroupIdResponse xmlns="https://bingads.microsoft.com/CampaignManagement/v12">
			<Ads xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
				<Ad i:type="ResponsiveAd">
					<AdFormatPreference i:nil="true"/>
					<DevicePreference>0</DevicePreference>
					<EditorialStatus>Inactive</EditorialStatus>
					<FinalAppUrls i:nil="true"/>
					<FinalMobileUrls xmlns:a="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
						<a:string>https://mobile.contoso.com/womenshoesale</a:string>
					</FinalMobileUrls>
					<FinalUrls xmlns:a="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
						<a:string>https://www.contoso.com/womenshoesale</a:string>
					</FinalUrls>
					<ForwardCompatibilityMap xmlns:a="http://schemas.datacontract.org/2004/07/System.Collections.Generic"/>
					<Id>9876543210000</Id>
					<Status>Active</Status>
					<TrackingUrlTemplate i:nil="true"/>
					<Type>ResponsiveAd</Type>
					<UrlCustomParameters i:nil="true"/>
					<BusinessName>Contoso</BusinessName>
					<CallToAction>AddToCart</CallToAction>
					<Headline>Fast &amp; Easy Setup</Headline>
					<Images>
						<AssetLink>
							<Asset i:type="ImageAsset">
								<Id>1234567890000</Id>
								<Name i:nil="true"/>
								<Type>ImageAsset</Type>
								<CropHeight i:nil="true"/>
								<CropWidth i:nil="true"/>
								<CropX i:nil="true"/>
								<CropY i:nil="true"/>
								<SubType>OriginalImage</SubType>
							</Asset>
							<AssetPerformanceLabel i:nil="true"/>
							<EditorialStatus i:nil="true"/>
							<PinnedField i:nil="true"/>
						</AssetLink>
						<AssetLink>
							<Asset i:type="ImageAsset">
								<Id>1234567890000</Id>
								<Name i:nil="true"/>
								<Type>ImageAsset</Type>
								<CropHeight>628</CropHeight>
								<CropWidth>628</CropWidth>
								<CropX>286</CropX>
								<CropY>0</CropY>
								<SubType>SquareImageMedia</SubType>
							</Asset>
							<AssetPerformanceLabel i:nil="true"/>
							<EditorialStatus i:nil="true"/>
							<PinnedField i:nil="true"/>
						</AssetLink>
						<AssetLink>
							<Asset i:type="ImageAsset">
								<Id>1234567890000</Id>
								<Name i:nil="true"/>
								<Type>ImageAsset</Type>
								<CropHeight>628</CropHeight>
								<CropWidth>942</CropWidth>
								<CropX>129</CropX>
								<CropY>0</CropY>
								<SubType>ImageMedia15X10</SubType>
							</Asset>
							<AssetPerformanceLabel i:nil="true"/>
							<EditorialStatus i:nil="true"/>
							<PinnedField i:nil="true"/>
						</AssetLink>
						<AssetLink>
							<Asset i:type="ImageAsset">
								<Id>1234567890000</Id>
								<Name i:nil="true"/>
								<Type>ImageAsset</Type>
								<CropHeight>628</CropHeight>
								<CropWidth>835</CropWidth>
								<CropX>183</CropX>
								<CropY>0</CropY>
								<SubType>ImageMedia133X100</SubType>
							</Asset>
							<AssetPerformanceLabel i:nil="true"/>
							<EditorialStatus i:nil="true"/>
							<PinnedField i:nil="true"/>
						</AssetLink>
						<AssetLink>
							<Asset i:type="ImageAsset">
								<Id>1234567890000</Id>
								<Name i:nil="true"/>
								<Type>ImageAsset</Type>
								<CropHeight>628</CropHeight>
								<CropWidth>1118</CropWidth>
								<CropX>41</CropX>
								<CropY>0</CropY>
								<SubType>ImageMedia178X100</SubType>
							</Asset>
							<AssetPerformanceLabel i:nil="true"/>
							<EditorialStatus i:nil="true"/>
							<PinnedField i:nil="true"/>
						</AssetLink>
					</Images>
					<LandscapeImageMediaId>1234567890000</LandscapeImageMediaId>
					<LandscapeLogoMediaId i:nil="true"/>
					<LongHeadline>Find New Customers &amp; Increase Sales!</LongHeadline>
					<SquareImageMediaId>1234567890000</SquareImageMediaId>
					<SquareLogoMediaId i:nil="true"/>
					<Text>Find New Customers &amp; Increase Sales! Start Advertising on Contoso Today.</Text>
				</Ad>
			</Ads>
		</GetAdsByAdGroupIdResponse>
	</s:Body>
</s:Envelope>
```

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

