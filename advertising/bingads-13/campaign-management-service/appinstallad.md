---
title: AppInstallAd Data Object - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines an app install ad.
---
# AppInstallAd Data Object - Campaign Management
Defines an app install ad. 

App Install Ads are similar to text ads but provide direct links to your apps with a button, sending customers directly to the applicable store to download the application. This is an ideal solution for advertisers wanting to manage and drive downloads of their apps, rather than website traffic.

App Install Ads automatically detect the customer's mobile device and operating system, sending them to the corresponding Apple App Store or Google Play. You can also track conversions with the same conversion tracking partners as App Extensions: AppsFlyer, Kochava, Tune, Singular, Adjust, and Branch. 

> [!NOTE]
> App Install Ads are available in Australia, Brazil, Canada, France, Germany, India, the United Kingdom, and the United States on iOS and Android only. Only apps available in the United States in the Apple App Store and Google Play Store are currently supported. There is no support for Windows or Windows Phone. 
> 
> Not everyone has this feature yet. If you don't, don't worry. It's coming soon.  

> [!NOTE]
> App install ads can only be created in Search campaigns where the [AdGroupType](adgroup.md#adgrouptype) is set to "SearchStandard". If the [AdGroupType](adgroup.md#adgrouptype) is set to "SearchDynamic", then the ad group does not support app install ads.  

The combination of the AppPlatform, AppStoreId, Text, and Title elements make the app install ad unique.

## Syntax
```xml
<xs:complexType name="AppInstallAd" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Ad">
      <xs:sequence>
        <xs:element minOccurs="0" name="AppPlatform" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="AppStoreId" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="Text" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="Title" nillable="true" type="xs:string" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [AppInstallAd](appinstallad.md) object has the following elements: [AppPlatform](#appplatform), [AppStoreId](#appstoreid), [Text](#text), [Title](#title).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="appplatform"></a>AppPlatform|The application platform.<br/><br/>Possible values include *iOS* and *Android*.<br/><br/>**Add:** Required<br/>**Update:** Optional|**string**|
|<a name="appstoreid"></a>AppStoreId|The application identifier provided by the app store.<br/><br/>If the application is new, please expect to wait 4-7 days before the ad will be eligible to deliver.<br/><br/>**Add:** Required<br/>**Update:** Optional|**string**|
|<a name="text"></a>Text|The ad copy. The copy must contain at least one word. The ad's copy and title combined must total at least three words.<br/><br/>The ad copy cannot contain dynamic text strings such as {keyword}. <br/><br/>The maximum input length of the copy is 71 characters. Note that for ad groups that use Traditional Chinese, the text is limited to 38 characters.<br/><br/>The ad copy cannot contain the newline (\n) character.<br/><br/>**Add:** Required<br/>**Update:** Optional|**string**|
|<a name="title"></a>Title|The title of the ad. The title must contain at least one word. The ad's copy and title combined must total at least three words.<br/><br/>The title cannot contain dynamic text strings such as {keyword}.<br/><br/>The maximum input length of the title is 25 characters. Note that for ad groups that use Traditional Chinese, the title is limited to 15 characters.<br/><br/>The title cannot contain the newline (\n) character.<br/><br/>**Add:** Required<br/>**Update:** Optional|**string**|

The [AppInstallAd](appinstallad.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsad"></a>Inherited Elements from Ad
The [AppInstallAd](appinstallad.md) object derives from the [Ad](ad.md) object, and inherits the following elements: [AdFormatPreference](#adformatpreference), [DevicePreference](#devicepreference), [EditorialStatus](#editorialstatus), [FinalAppUrls](#finalappurls), [FinalMobileUrls](#finalmobileurls), [FinalUrls](#finalurls), [FinalUrlSuffix](#finalurlsuffix), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Id](#id), [Status](#status), [TrackingUrlTemplate](#trackingurltemplate), [Type](#type), [UrlCustomParameters](#urlcustomparameters). The descriptions below are specific to [AppInstallAd](appinstallad.md), and might not apply to other objects that inherit the same elements from the [Ad](ad.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="adformatpreference"></a>AdFormatPreference|Not supported for this ad type.|**string**|
|<a name="devicepreference"></a>DevicePreference|This element determines whether the preference is for app install ads to be displayed on mobile and tablet devices or only on mobile devices. (App install ads are not currently supported on desktop computers.)<br/><br/>To specify a preference for mobile devices only (i.e. excluding tablets), set this element to *30001*.<br/><br/>To specify a preference for both mobile and tablet devices, set this element to *0* (zero) or leave the element nil. By default, this element will be nil. <br/><br/>**Add:** Optional<br/>**Update:** Optional|**long**|
|<a name="editorialstatus"></a>EditorialStatus|The editorial review status of the ad, which indicates whether the ad is pending review, has been approved, or has been disapproved.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[AdEditorialStatus](adeditorialstatus.md)|
|<a name="finalappurls"></a>FinalAppUrls|Not supported for app install ads.|[AppUrl](appurl.md) array|
|<a name="finalmobileurls"></a>FinalMobileUrls|Not supported for app install ads.|**string** array|
|<a name="finalurls"></a>FinalUrls|The URL where a search user lands and can choose to install an app.<br/><br/>**Add:** Required<br/>**Update:** Optional|**string** array|
|<a name="finalurlsuffix"></a>FinalUrlSuffix|The final URL suffix can include tracking parameters that will be appended to the end of your landing page URL. We recommend placing tracking parameters that your landing page requires in a final URL suffix so that your customers are always sent to your landing page. For more details and validation rules see [Final URL Suffix](../guides/url-tracking-upgraded-urls.md#finalurlsuffixvalidation) in the technical guides.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this element to an empty string (*""*), the previous setting will be deleted.|**string**|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>There are currently not any ForwardCompatibilityMap key and value pairs that are applicable for this object.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="id"></a>Id|The unique Microsoft Advertising identifier for the ad.<br/><br/>**Add:** Read-only<br/>**Update:** Required and Read-only|**long**|
|<a name="status"></a>Status|The status of the ad.<br/><br/>You can set the ad status to Active or Paused.<br/><br/>**Add:** Optional<br/>**Update:** Optional|[AdStatus](adstatus.md)|
|<a name="trackingurltemplate"></a>TrackingUrlTemplate|The tracking template to use as a default for the URL specified with *FinalUrls*.<br/><br/>The following validation rules apply to tracking templates. For more details about supported templates and parameters, see the Microsoft Advertising help article [What tracking or URL parameters can I use?](https://help.ads.microsoft.com/#apex/3/en/56799/2)<br/>- Tracking templates defined for lower level entities e.g. ads override those set for higher level entities e.g. campaign. For more information, see [Entity Limits](../guides/entity-hierarchy-limits.md).<br/>- The length of the tracking template is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.<br/>- The tracking template must be a well-formed URL beginning with one of the following: *http://*, *https://*, *{lpurl}*, or *{unescapedlpurl}*.<br/>- Microsoft Advertising does not validate whether custom parameters exist. If you use custom parameters in your tracking template and they do not exist, then the landing page URL will include the key and value placeholders of your custom parameters without substitution. For example, if your tracking template is *`https://tracker.example.com/?season={_season}&promocode={_promocode}&u={lpurl}`* and neither *{_season}* or *{_promocode}* are defined at the campaign, ad group, criterion, keyword, or ad level, then the landing page URL will be the same.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this element to an empty string (*""*), the previous setting will be deleted.|**string**|
|<a name="type"></a>Type|The type of the ad. This value is *AppInstall* when you retrieve an app install ad. For more information about ad types, see the [Ad Data Object Remarks](ad.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[AdType](adtype.md)|
|<a name="urlcustomparameters"></a>UrlCustomParameters|Your custom collection of key and value parameters for URL tracking.<br/><br/>Microsoft Advertising will accept the first 8 [CustomParameter](customparameter.md) objects that you include within the [CustomParameters](customparameters.md) object, and if you include more than 8 custom parameters an error will be returned. Each [CustomParameter](customparameter.md) includes [Key](customparameter.md#key) and [Value](customparameter.md#value) elements.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. Set the *UrlCustomParameters* element to null or empty to retain any existing custom parameters. To remove all custom parameters, set the [Parameters](customparameters.md#parameters) element of the [CustomParameters](customparameters.md) object to null or empty. To remove a subset of custom parameters, specify the custom parameters that you want to keep in the [Parameters](customparameters.md#parameters) element of the [CustomParameters](customparameters.md) object.|[CustomParameters](customparameters.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

