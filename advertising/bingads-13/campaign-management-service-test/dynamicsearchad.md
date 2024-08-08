---
title: DynamicSearchAd Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a dynamic search ad.(test)
---
# DynamicSearchAd Data Object Test - Campaign Management
Defines a dynamic search ad.  

With dynamic search ads, the headline and display URL are generated automatically based on the website domain and language that you want to target. The combination of the Path1, Path2, and Text elements make the dynamic search ad unique. Optionally you can supply a static headline using [page feeds](../guides/page-feeds.md).  

> [!NOTE]
> This feature is currently available in the following countries or regions: Albania (AL), Andorra (AD), Argentina (AR), Aruba, Australia (AU), Austria (AT), Bahamas (BS), Bangladesh(BD), Belgium (BE), Bolivia(BO), Bosnia and Herzegovina (BA), Brazil (BR), Brunei(BN), Bulgaria (BG), Canada (CA), Cayman Islands(KY), Chile(CL), Colombia(CO), Costa Rica(CR), Croatia (HR), Cyprus (CY), Czech Republic (CZ), Denmark (DK), Dominica(DM), Dominican Republic(DO), Ecuador(EC), El Salvador(SV), Estonia (EE), Fiji (FJ), Finland (FI), France (FR), French Guiana(GF), French Polynesia (PF), Germany (DE), Greece (GR), Guam (GU), Guatemala (GT), Guyana (GY), Haiti (HT), Honduras (HN), Hungary (HU), Iceland (IS), India (IN), Indonesia (ID), Ireland (IE), Italy (IT), Latvia (LV), Liechtenstein (LI), Lithuania (LT), Luxembourg (LU), Malaysia (MY), Maldives (MV), Malta (MT), Martinique (MQ), Mexico (MX), Monaco (MC), Mongolia (MN), Montenegro (ME), Montserrat (MS), Nepal (NP), Netherlands (NL), New Caledonia (NC), New Zealand (NZ), Republic of North Macedonia (MK), Norway (NO), Panama (PA), Paraguay (PY), Papua New Guinea (PG), Peru (PE), Philippines (PH),  Poland (PO), Portugal (PT), Puerto Rico,  Romania (RO), San Marino (SM), Serbia (RS), Singapore(SG), Slovakia (SK), Slovenia (SI), South Africa (ZA), Spain (ES), Spain(ES), Sri Lanka(LK), Sweden (SE), Switzerland (CH), Thailand(TH), Trinidad and Tobago(TT), Turkey (TR), Vatican City (VA), Vietnam(VN), United Kingdom (UK), United States (US), Uruguay(UY), and Venezuela(VE).  

Dynamic search ads can only be created within search campaigns that have a [DynamicSearchAdsSetting](dynamicsearchadssetting.md).  The campaign's [ExperimentId](campaign.md#experimentid) element can't be set and the [AdGroupType](adgroup.md#adgrouptype) must be set to "SearchDynamic".  

> [!NOTE]
> You can no longer add, update, or retrieve campaigns that only support dynamic search ads. The campaign type of your existing campaigns has been updated from "DynamicSearchAds" to "Search". The ad groups are now considered "dynamic" ad groups, but there are no structural changes i.e., they contain the same auto targets and dynamic search ads as before.  

# [XML](#tab/xml)

```xml
<xs:complexType name="DynamicSearchAd" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Ad">
      <xs:sequence>
        <xs:element minOccurs="0" name="Path1" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="Path2" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="Text" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="TextPart2" nillable="true" type="xs:string" />
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
  "Type": "DynamicSearch",
  "UrlCustomParameters": {
    "Parameters": [
      {
        "Key": "ValueHere",
        "Value": "ValueHere"
      }
    ]
  },
  "Path1": "ValueHere",
  "Path2": "ValueHere",
  "Text": "ValueHere",
  "TextPart2": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [DynamicSearchAd](dynamicsearchad.md) object has the following elements: [Path1](#path1), [Path2](#path2), [Text](#text), [TextPart2](#textpart2).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="path1"></a>Path1|The first part of the optional path that will be appended to the domain portion of your display URL. The display URL e.g. *www.contoso.com* will be generated from the domain of your display URL. Then if you have specified a value for *Path 1* it will be appended to the display URL. If you have also specified a value for *Path 2*, then it will also be appended to the display URL after *Path 1*. For example if your domain is *contoso.com*, *Path 1* is set to *subdirectory1*, and *Path 2* is set to *subdirectory2*, then the URL displayed will be *www.contoso.com/subdirectory1/subdirectory2*. <br/><br/>The maximum input length of the path is 15 characters. Note that for languages with double-width characters e.g. Traditional Chinese the maximum input length of the path is 7 characters.<br/><br/>The path can contain [IF](https://help.ads.microsoft.com/#apex/3/en/56922/0) and [countdown](https://help.ads.microsoft.com/#apex/3/en/56853/0-500) functions. Regardless of the total length of all unsubstituted countdown parameters, the final displayed countdown will always use 8 characters out of the total characters available. For more details see [Countdown Customizers](../guides/countdown-customizers.md).<br/><br/>The path cannot contain the forward slash (/) or newline (\n) characters.<br/><br/>If the path includes a space, it will be replaced with an underscore (_) when the ad is shown.<br/><br/>**Add:** Optional<br/>**Update:** Optional|**string**|
|<a name="path2"></a>Path2|The second part of the optional path that will be appended to the domain portion of your display URL. The display URL e.g. *www.contoso.com* will be generated from the domain of your dynamic search ads campaign level settings. Then if you have specified a value for *Path 1* it will be appended to the display URL. If you have also specified a value for *Path 2*, then it will also be appended to the display URL after *Path 1*. For example if your domain is *contoso.com*, *Path 1* is set to *subdirectory1*, and *Path 2* is set to *subdirectory2*, then the URL displayed will be *www.contoso.com/subdirectory1/subdirectory2*.<br/><br/>You can only specify *Path2* if *Path1* is also set. <br/><br/>The maximum input length of the path is 15 characters. Note that for languages with double-width characters e.g. Traditional Chinese the maximum input length of the path is 7 characters.<br/><br/>The path can contain [IF](https://help.ads.microsoft.com/#apex/3/en/56922/0) and [countdown](https://help.ads.microsoft.com/#apex/3/en/56853/0-500) functions. Regardless of the total length of all unsubstituted countdown parameters, the final displayed countdown will always use 8 characters out of the total characters available. For more details see [Countdown Customizers](../guides/countdown-customizers.md).<br/><br/>The path cannot contain the forward slash (/) or newline (\n) characters.<br/><br/>If the path includes a space, it will be replaced with an underscore (_) when the ad is shown.<br/><br/>**Add:** Optional<br/>**Update:** Optional|**string**|
|<a name="text"></a>Text|The first part of the ad description.<br/><br/>The text must contain at least one word.<br/><br/>The maximum input length of the copy is 90 characters. Note that for ad groups that use Traditional Chinese the maximum input length of the copy is 45 characters.<br/><br/>The text can contain [IF](https://help.ads.microsoft.com/#apex/3/en/56922/0) and [countdown](https://help.ads.microsoft.com/#apex/3/en/56853/0-500) functions. Regardless of the total length of all unsubstituted countdown parameters, the final displayed countdown will always use 8 characters out of the total characters available. For more details see [Countdown Customizers](../guides/countdown-customizers.md).<br/><br/>The text cannot contain the newline (\n) character.<br/><br/>**Add:** Required<br/>**Update:** Optional|**string**|
|<a name="textpart2"></a>TextPart2|The second part of the ad description.<br/><br/>The text must contain at least one word.<br/><br/>The maximum input length of the copy is 90 characters. Note that for ad groups that use Traditional Chinese the maximum input length of the copy is 45 characters.<br/><br/>The text can contain [IF](https://help.ads.microsoft.com/#apex/3/en/56922/0) and [countdown](https://help.ads.microsoft.com/#apex/3/en/56853/0-500) functions. Regardless of the total length of all unsubstituted countdown parameters, the final displayed countdown will always use 8 characters out of the total characters available. For more details see [Countdown Customizers](../guides/countdown-customizers.md).<br/><br/>The text cannot contain the newline (\n) character.<br/><br/>**Add:** Optional<br/>**Update:** Optional|**string**|

The [DynamicSearchAd](dynamicsearchad.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsad"></a>Inherited Elements from Ad
The [DynamicSearchAd](dynamicsearchad.md) object derives from the [Ad](ad.md) object, and inherits the following elements: [AdFormatPreference](#adformatpreference), [DevicePreference](#devicepreference), [EditorialStatus](#editorialstatus), [FinalAppUrls](#finalappurls), [FinalMobileUrls](#finalmobileurls), [FinalUrls](#finalurls), [FinalUrlSuffix](#finalurlsuffix), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Id](#id), [Status](#status), [TrackingUrlTemplate](#trackingurltemplate), [Type](#type), [UrlCustomParameters](#urlcustomparameters). The descriptions below are specific to [DynamicSearchAd](dynamicsearchad.md), and might not apply to other objects that inherit the same elements from the [Ad](ad.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="adformatpreference"></a>AdFormatPreference|Not supported for this ad type.|**string**|
|<a name="devicepreference"></a>DevicePreference|Not supported for this ad type.|**long**|
|<a name="editorialstatus"></a>EditorialStatus|The editorial review status of the ad, which indicates whether the ad is pending review, has been approved, or has been disapproved.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[AdEditorialStatus](adeditorialstatus.md)|
|<a name="finalappurls"></a>FinalAppUrls|Not supported for this ad type.|[AppUrl](appurl.md) array|
|<a name="finalmobileurls"></a>FinalMobileUrls|Not supported for this ad type.|**string** array|
|<a name="finalurls"></a>FinalUrls|Not supported for this ad type.|**string** array|
|<a name="finalurlsuffix"></a>FinalUrlSuffix|The final URL suffix can include tracking parameters that will be appended to the end of your landing page URL. We recommend placing tracking parameters that your landing page requires in a final URL suffix so that your customers are always sent to your landing page. For more details and validation rules see [Final URL Suffix](../guides/url-tracking-upgraded-urls.md#finalurlsuffixvalidation) in the technical guides.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this element to an empty string (*""*), the previous setting will be deleted.|**string**|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>Currently there are no supported forward compatibility map key and value pairs for dynamic search ads.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="id"></a>Id|The unique Microsoft Advertising identifier of the ad.<br/><br/>**Add:** Read-only<br/>**Update:** Required and Read-Only|**long**|
|<a name="status"></a>Status|The status of the ad.<br/><br/>You can set the ad status to Active or Paused.<br/><br/>**Add:** Optional<br/>**Update:** Optional|[AdStatus](adstatus.md)|
|<a name="trackingurltemplate"></a>TrackingUrlTemplate|The tracking template to use as a default for all landing page URLs.<br/><br/>The following validation rules apply to tracking templates. For more details about supported templates and parameters, see the Microsoft Advertising help article [What tracking or URL parameters can I use?](https://help.ads.microsoft.com/#apex/3/en/56799/2)<br/>- Tracking templates defined for lower level entities e.g. ads override those set for higher level entities e.g. campaign. For more information, see [Entity Limits](../guides/entity-hierarchy-limits.md).<br/>- The length of the tracking template is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.<br/>- The tracking template must be a well-formed URL beginning with one of the following: *http://*, *https://*, *{lpurl}*, or *{unescapedlpurl}*.<br/>- Microsoft Advertising does not validate whether custom parameters exist. If you use custom parameters in your tracking template and they do not exist, then the landing page URL will include the key and value placeholders of your custom parameters without substitution. For example, if your tracking template is *`https://tracker.example.com/?season={_season}&promocode={_promocode}&u={lpurl}`* and neither *{_season}* or *{_promocode}* are defined at the campaign, ad group, criterion, keyword, or ad level, then the landing page URL will be the same.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this element to an empty string (*""*), the previous setting will be deleted.|**string**|
|<a name="type"></a>Type|The type of the ad. This value is *DynamicSearch* when you retrieve an dynamic search ad. For more information about ad types, see the [Ad Data Object Remarks](ad.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[AdType](adtype.md)|
|<a name="urlcustomparameters"></a>UrlCustomParameters|Your custom collection of key and value parameters for URL tracking.<br/><br/>Microsoft Advertising will accept the first 8 [CustomParameter](customparameter.md) objects that you include within the [CustomParameters](customparameters.md) object, and if you include more than 8 custom parameters an error will be returned. Each [CustomParameter](customparameter.md) includes [Key](customparameter.md#key) and [Value](customparameter.md#value) elements.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. Set the *UrlCustomParameters* element to null or empty to retain any existing custom parameters. To remove all custom parameters, set the [Parameters](customparameters.md#parameters) element of the [CustomParameters](customparameters.md) object to null or empty. To remove a subset of custom parameters, specify the custom parameters that you want to keep in the [Parameters](customparameters.md#parameters) element of the [CustomParameters](customparameters.md) object.|[CustomParameters](customparameters.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

