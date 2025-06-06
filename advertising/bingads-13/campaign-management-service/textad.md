---
title: TextAd Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a text ad.
---
# TextAd Data Object - Campaign Management
Defines a text ad.

> [!IMPORTANT]
> 
> Beginning April 2020, delivery of standart text ads (STA) is not supported.  
> 
> Standard Text Ads have been deprecated in favor of Expanded Text Ads (EXTAs). Support for adding and updating standard text ads (STAs) ended on July 31, 2017. Now, advertisers can get and delete, but can no longer add new STAs or update existing standard text ads. One exception to the rule, is that you can still update the STA status e.g. from *Active* to *Paused*. Otherwise attempts to add or update STAs will result in the *CampaignServiceAdTypeInvalid* error. 

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="TextAd" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Ad">
      <xs:sequence>
        <xs:element minOccurs="0" name="DestinationUrl" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="DisplayUrl" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="Text" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="Title" nillable="true" type="xs:string" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AdFormatPreference": "ValueHere",
  "DevicePreference": "LongValueHere",
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
  "Id": "LongValueHere",
  "Status": "ValueHere",
  "TrackingUrlTemplate": "ValueHere",
  "Type": "Text",
  "UrlCustomParameters": {
    "Parameters": [
      {
        "Key": "ValueHere",
        "Value": "ValueHere"
      }
    ]
  },
  "DestinationUrl": "ValueHere",
  "DisplayUrl": "ValueHere",
  "Text": "ValueHere",
  "Title": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [TextAd](textad.md) object has the following elements: [DestinationUrl](#destinationurl), [DisplayUrl](#displayurl), [Text](#text), [Title](#title).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="destinationurl"></a>DestinationUrl|The URL of the webpage to take the user to when they click the ad.<br/><br/>The URL can contain dynamic parameters such as {MatchType}.<br/><br/>For a list of supported parameters, see the Microsoft Advertising help article [What tracking or URL parameters can I use?](https://help.ads.microsoft.com/#apex/3/en/56799/2).<br/><br/>The URL can contain a maximum of 1,024 characters. If the URL does not specify a protocol, the system uses the HTTP protocol when a user clicks the ad. If the URL specifies the HTTP protocol when you add an ad, the service will remove the http:// protocol string (the HTTP protocol string does not count against the 1,024 character limit); however, the service will not remove an HTTPS protocol string (https://) from the URL.<br/><br/>**Important:** If you are currently using Destination URLs, you must replace them with Final URLs. For more information, see [URL Tracking with Upgraded URLs](../guides/url-tracking-upgraded-urls.md).<br/><br/>This URL is used only if the keyword does not specify a destination URL.<br/><br/>**Add:** Not supported<br/>**Update:** Not supported|**string**|
|<a name="displayurl"></a>DisplayUrl|The URL to display in the ad.<br/><br/>The subdirectory of the display URL can contain dynamic text strings such as {keyword}; however, the URL hostname cannot contain dynamic text. For more information, see the Microsoft Advertising help article [Automatically customize your ads with dynamic text parameters](https://help.ads.microsoft.com/#apex/3/en/50811/1).<br/><br/>The maximum input length of the URL is 200 characters, and can contain dynamic text strings. The ad will fail to display or [default text](https://help.ads.microsoft.com/#apex/3/en/50811/1/#DefaultText) will be used if the length exceeds 35 characters after dynamic text substitution occurs.<br/><br/>**Add:** Not supported<br/>**Update:** Not supported|**string**|
|<a name="text"></a>Text|The ad copy. The copy must contain at least one word. The ad's copy and title combined must total at least three words.<br/><br/>The text can contain dynamic text strings such as {keyword}. For more information, see the Microsoft Advertising help article [Automatically customize your ads with dynamic text parameters](https://help.ads.microsoft.com/#apex/3/en/50811/1).<br/><br/>The maximum input length of the copy is 300 characters, and can contain dynamic text strings. The ad will fail to display or [default text](https://help.ads.microsoft.com/#apex/3/en/50811/1/#DefaultText) will be used if the length exceeds 71 characters after dynamic text substitution occurs. Note that for ad groups that use Traditional Chinese, the text is limited to 38 characters after substitution.<br/><br/>The text cannot contain the newline (\n) character.<br/><br/>**Add:** Not supported<br/>**Update:** Not supported|**string**|
|<a name="title"></a>Title|The title of the ad. The title must contain at least one word. The ad's copy and title combined must total at least three words.<br/><br/>The title can contain dynamic text strings such as {keyword}. For more information, see the Microsoft Advertising help article [Automatically customize your ads with dynamic text parameters](https://help.ads.microsoft.com/#apex/3/en/50811/1).<br/><br/>The maximum input length of the title is 80 characters, and can contain dynamic text strings. The ad will fail to display or [default text](https://help.ads.microsoft.com/#apex/3/en/50811/1/#DefaultText) will be used if the length exceeds 25 characters after dynamic text substitution occurs. Note that for ad groups that use Traditional Chinese, the title is limited to 15 characters after substitution.<br/><br/>The title cannot contain the newline (\n) character.<br/><br/>**Add:** Not supported<br/>**Update:** Not supported|**string**|

The [TextAd](textad.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsad"></a>Inherited Elements from Ad
The [TextAd](textad.md) object derives from the [Ad](ad.md) object, and inherits the following elements: [AdFormatPreference](#adformatpreference), [DevicePreference](#devicepreference), [EditorialStatus](#editorialstatus), [FinalAppUrls](#finalappurls), [FinalMobileUrls](#finalmobileurls), [FinalUrls](#finalurls), [FinalUrlSuffix](#finalurlsuffix), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Id](#id), [Status](#status), [TrackingUrlTemplate](#trackingurltemplate), [Type](#type), [UrlCustomParameters](#urlcustomparameters). The descriptions below are specific to [TextAd](textad.md), and might not apply to other objects that inherit the same elements from the [Ad](ad.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="adformatpreference"></a>AdFormatPreference|The Ad Format Preference is used to indicate whether or not you prefer the ad copy to be shown to users as a search or audience ad. Search ads tend to be written as a call to action, whereas audience ads should be written in more of an informational style. While you have the option to use search text ads as audience ads, designating an ad as Audience ads preferred format allows you to optimize its messaging for native delivery.<br/><br/>**IMPORTANT:** You must define at least one text ad per ad group that does not prefer audience ads, otherwise the ad copy of all text ads will be eligible for both search and audience ads.<br/><br/>Possible values are *AudienceAd* and *All*. If set to *All*, the ad will be eligible for both search and audience ad formats. If set to *AudienceAd*, the ad will only be eligible for the audience ad format.<br/><br/>**Add:** Not supported<br/>**Update:** Not supported|**string**|
|<a name="devicepreference"></a>DevicePreference|This element determines whether the preference is for text ads to be displayed on mobile devices or all devices.<br/><br/>To specify a preference for mobile devices, set this element to *30001*.<br/><br/>To specify all devices, set this element to *0* (zero) or leave the element nil. By default, this element will be nil. You must define at least one text ad per ad group that is not mobile preferred, otherwise the ad will be eligible for all devices.<br/><br/>**Add:** Not supported<br/>**Update:** Not supported|**long**|
|<a name="editorialstatus"></a>EditorialStatus|The editorial review status of the ad, which indicates whether the ad is pending review, has been approved, or has been disapproved.<br/><br/>**Add:** Not supported<br/>**Update:** Not supported|[AdEditorialStatus](adeditorialstatus.md)|
|<a name="finalappurls"></a>FinalAppUrls|Not supported for text ads.|[AppUrl](appurl.md) array|
|<a name="finalmobileurls"></a>FinalMobileUrls|The mobile landing page URL.<br/><br/>This URL is used only if the keyword does not specify a final mobile URL.<br/><br/>The following validation rules apply to Final URLs and Final Mobile URLs.<br/>- The length of the URL is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.<br/>- You may specify up to 10 items for both [FinalUrls](#finalurls) and [FinalMobileUrls](#finalmobileurls); however, only the first item in each list is used for delivery. The service allows up to 10 for potential forward compatibility.<br/>- Usage of '{' and '}' is only allowed to delineate tags, for example *{lpurl}*.<br/>- Final URLs must each be a well-formed URL starting with either http:// or https://.<br/>- If you specify [FinalMobileUrls](#finalmobileurls), you must also specify [FinalUrls](#finalurls).<br/>- You may not specify [FinalMobileUrls](#finalmobileurls) if the device preference is set to mobile. Also note that for [TextAd](textad.md) objects you may not specify *FinalMobileUrls* if the *DevicePreference* is set to *30001* (mobile).<br/><br/>**Add:** Not supported<br/>**Update:** Not supported|**string** array|
|<a name="finalurls"></a>FinalUrls|The landing page URL.<br/><br/>This URL is used only if the keyword does not specify a final URL.<br/><br/>The following validation rules apply to Final URLs and Final Mobile URLs.<br/>- The length of the URL is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.<br/>- You may specify up to 10 items for both [FinalUrls](#finalurls) and [FinalMobileUrls](#finalmobileurls); however, only the first item in each list is used for delivery. The service allows up to 10 for potential forward compatibility.<br/>- Usage of '{' and '}' is only allowed to delineate tags, for example *{lpurl}*.<br/>- Final URLs must each be a well-formed URL starting with either http:// or https://.<br/>- If you specify [FinalMobileUrls](#finalmobileurls), you must also specify [FinalUrls](#finalurls).<br/>- You may not specify [FinalMobileUrls](#finalmobileurls) if the device preference is set to mobile. Also note that  if this ad's *TrackingUrlTemplate* or *UrlCustomParameters* element are set, then at least one final URL is required.<br/><br/>**Add:** Not supported<br/>**Update:** Not supported|**string** array|
|<a name="finalurlsuffix"></a>FinalUrlSuffix|Not supported for text ads.|**string**|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>Forward compatibility changes will be noted here in future releases. There are currently no forward compatibility changes for this object.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="id"></a>Id|The unique Microsoft Advertising identifier for the ad.<br/><br/>**Add:** Not supported<br/>**Update:** Required and Read-only|**long**|
|<a name="status"></a>Status|The status of the ad.<br/><br/>You can set the ad status to Active or Paused.<br/><br/>**Add:** Not supported<br/>**Update:** Optional|[AdStatus](adstatus.md)|
|<a name="trackingurltemplate"></a>TrackingUrlTemplate|The tracking template to use as a default for all landing page URLs.<br/><br/>The following validation rules apply to tracking templates. For more details about supported templates and parameters, see the Microsoft Advertising help article [What tracking or URL parameters can I use?](https://help.ads.microsoft.com/#apex/3/en/56799/2)<br/>- Tracking templates defined for lower level entities e.g. ads override those set for higher level entities e.g. campaign. For more information, see [Entity Limits](../guides/entity-hierarchy-limits.md).<br/>- The length of the tracking template is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.<br/>- The tracking template must be a well-formed URL beginning with one of the following: *http://*, *https://*, *{lpurl}*, or *{unescapedlpurl}*.<br/>- Microsoft Advertising does not validate whether custom parameters exist. If you use custom parameters in your tracking template and they do not exist, then the landing page URL will include the key and value placeholders of your custom parameters without substitution. For example, if your tracking template is *`https://tracker.example.com/?season={_season}&promocode={_promocode}&u={lpurl}`* and neither *{_season}* or *{_promocode}* are defined at the campaign, ad group, criterion, keyword, or ad level, then the landing page URL will be the same.<br/><br/>**Add:** Not supported<br/>**Update:** Not supported|**string**|
|<a name="type"></a>Type|The type of the ad. This value is *Text* when you retrieve a text ad. For more information about ad types, see the [Ad Data Object Remarks](ad.md#remarks).<br/><br/>**Add:** Not supported<br/>**Update:** Not supported|[AdType](adtype.md)|
|<a name="urlcustomparameters"></a>UrlCustomParameters|Your custom collection of key and value parameters for URL tracking.<br/><br/>Microsoft Advertising will accept the first 8 [CustomParameter](customparameter.md) objects that you include within the [CustomParameters](customparameters.md) object, and if you include more than 8 custom parameters an error will be returned. Each [CustomParameter](customparameter.md) includes [Key](customparameter.md#key) and [Value](customparameter.md#value) elements.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. Set the *UrlCustomParameters* element to null or empty to retain any existing custom parameters. To remove all custom parameters, set the [Parameters](customparameters.md#parameters) element of the [CustomParameters](customparameters.md) object to null or empty. To remove a subset of custom parameters, specify the custom parameters that you want to keep in the [Parameters](customparameters.md#parameters) element of the [CustomParameters](customparameters.md) object.|[CustomParameters](customparameters.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

