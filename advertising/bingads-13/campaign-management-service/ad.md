---
title: Ad Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the base object of an ad.
---
# Ad Data Object - Campaign Management
Defines the base object of an ad.

Do not try to instantiate an *Ad*. You can create one or more of the following objects that derive from it.
- [AppInstallAd](appinstallad.md)
- [DynamicSearchAd](dynamicsearchad.md)
- [ExpandedTextAd](expandedtextad.md)
- [TextAd](textad.md)
- [ProductAd](productad.md) 
- [ResponsiveAd](responsivead.md) 
- [ResponsiveSearchAd](responsivesearchad.md) 

## Syntax
```xml
<xs:complexType name="Ad" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AdFormatPreference" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="DevicePreference" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="EditorialStatus" nillable="true" type="tns:AdEditorialStatus" />
    <xs:element minOccurs="0" name="FinalAppUrls" nillable="true" type="tns:ArrayOfAppUrl" />
    <xs:element minOccurs="0" name="FinalMobileUrls" nillable="true" type="q1:ArrayOfstring" xmlns:q1="http://schemas.microsoft.com/2003/10/Serialization/Arrays" />
    <xs:element minOccurs="0" name="FinalUrlSuffix" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="FinalUrls" nillable="true" type="q2:ArrayOfstring" xmlns:q2="http://schemas.microsoft.com/2003/10/Serialization/Arrays" />
    <xs:element minOccurs="0" name="ForwardCompatibilityMap" nillable="true" type="q3:ArrayOfKeyValuePairOfstringstring" xmlns:q3="http://schemas.datacontract.org/2004/07/System.Collections.Generic" />
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="Status" nillable="true" type="tns:AdStatus" />
    <xs:element minOccurs="0" name="TrackingUrlTemplate" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Type" nillable="true" type="tns:AdType" />
    <xs:element minOccurs="0" name="UrlCustomParameters" nillable="true" type="tns:CustomParameters" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [Ad](ad.md) object has the following elements: [AdFormatPreference](#adformatpreference), [DevicePreference](#devicepreference), [EditorialStatus](#editorialstatus), [FinalAppUrls](#finalappurls), [FinalMobileUrls](#finalmobileurls), [FinalUrls](#finalurls), [FinalUrlSuffix](#finalurlsuffix), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Id](#id), [Status](#status), [TrackingUrlTemplate](#trackingurltemplate), [Type](#type), [UrlCustomParameters](#urlcustomparameters).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="adformatpreference"></a>AdFormatPreference|The Ad Format Preference is used to indicate whether or not you prefer the ad copy to be shown to users as a search or audience ad. Search ads tend to be written as a call to action, whereas audience ads should be written in more of an informational style. While you have the option to use search ads as audience ads, designating an ad as Audience ads preferred format allows you to optimize its messaging for native delivery.<br/><br/>Possible values are *AudienceAd* and *All*. If set to *All*, the ad will be eligible for both search and audience ad formats. If set to *AudienceAd*, the ad will only be eligible for the audience ad format.<br/><br/>Ad Format Preference is only supported for [ExpandedTextAd](expandedtextad.md) and [TextAd](textad.md) objects.|**string**|
|<a name="devicepreference"></a>DevicePreference|Determines the device preference for showing the ad. <br/><br/>Device preference is only supported for [AppInstallAd](appinstallad.md) and [TextAd](textad.md) objects.|**long**|
|<a name="editorialstatus"></a>EditorialStatus|The editorial review status of the ad, which indicates whether the ad is pending review, has been approved, or has been disapproved.|[AdEditorialStatus](adeditorialstatus.md)|
|<a name="finalappurls"></a>FinalAppUrls|Reserved for future use.|[AppUrl](appurl.md) array|
|<a name="finalmobileurls"></a>FinalMobileUrls|The mobile landing page URL. <br/><br/>This element is only supported for [ExpandedTextAd](expandedtextad.md), [ResponsiveAd](responsivead.md), [ResponsiveSearchAd](responsivesearchad.md), and [TextAd](textad.md) objects. It is not supported with the [AppInstallAd](appinstallad.md), [DynamicSearchAd](dynamicsearchad.md), and [ProductAd](productad.md) objects.|**string** array|
|<a name="finalurls"></a>FinalUrls|The last or final URL where a user is ultimately taken, whether or not the click to final URL path included any redirects.<br/><br/>This element is only supported for [AppInstallAd](appinstallad.md), [ExpandedTextAd](expandedtextad.md), [ResponsiveAd](responsivead.md), [ResponsiveSearchAd](responsivesearchad.md), and [TextAd](textad.md) objects. It is not supported with the [DynamicSearchAd](dynamicsearchad.md) and [ProductAd](productad.md) objects.|**string** array|
|<a name="finalurlsuffix"></a>FinalUrlSuffix|The final URL suffix can include tracking parameters that will be appended to the end of your landing page URL. We recommend placing tracking parameters that your landing page requires in a final URL suffix so that your customers are always sent to your landing page. For more details and validation rules see [Final URL Suffix](../guides/url-tracking-upgraded-urls.md#finalurlsuffixvalidation) in the technical guides.<br/><br/>This element is only supported for [AppInstallAd](appinstallad.md), [DynamicSearchAd](dynamicsearchad.md), [ExpandedTextAd](expandedtextad.md), [ResponsiveAd](responsivead.md), and [ResponsiveSearchAd](responsivesearchad.md) objects. It is not supported with the [ProductAd](productad.md) and and [TextAd](textad.md) objects.|**string**|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>Forward compatibility changes will be noted here in future releases. There are currently no forward compatibility changes for this object.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="id"></a>Id|The unique Microsoft Advertising identifier for the ad.|**long**|
|<a name="status"></a>Status|The status of the ad.<br/><br/>You can set the ad status to Active or Paused.|[AdStatus](adstatus.md)|
|<a name="trackingurltemplate"></a>TrackingUrlTemplate|The tracking template to use as a default for all landing page URLs.<br/><br/>This element is only supported for [AppInstallAd](appinstallad.md), [DynamicSearchAd](dynamicsearchad.md), [ExpandedTextAd](expandedtextad.md), [ResponsiveAd](responsivead.md), [ResponsiveSearchAd](responsivesearchad.md), and [TextAd](textad.md) objects. It is not supported with the [ProductAd](productad.md) object.|**string**|
|<a name="type"></a>Type|The type of the ad.<br/><br/>For more information about ad types, see the [Remarks](#remarks).|[AdType](adtype.md)|
|<a name="urlcustomparameters"></a>UrlCustomParameters|Your custom collection of key and value parameters for URL tracking.<br/><br/>This element is only supported for [AppInstallAd](appinstallad.md), [DynamicSearchAd](dynamicsearchad.md), [ExpandedTextAd](expandedtextad.md), [ResponsiveAd](responsivead.md), [ResponsiveSearchAd](responsivesearchad.md), and [TextAd](textad.md) objects. It is not supported with the [ProductAd](productad.md) object.|[CustomParameters](customparameters.md)|

## <a name="remarks"></a>Remarks
For Java and the .NET languages, do not set the *Type* element because the value is determined by whether you instantiate an expanded text ad or another ad type.

If you generate the SOAP manually, use the *type* attribute of the `<Ad>` node (as shown in the following example) to specify the type of ad.

```xml
<Ads xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
  <Ad i:type="ExpandedTextAd">
    <DevicePreference i:nil="true" />
    <EditorialStatus i:nil="true" />
    <ForwardCompatibilityMap i:nil="true" />
    <Id i:nil="true" />
    <Status i:nil="true" />
    <FinalUrls xmlns:a="http://schemas.microsoft.com/2003/10/Serialization/Arrays">
      <a:string>https://www.contoso.com/womenshoesale</a:string>
    </FinalUrls>
    <Path1>seattle</Path1>
    <Path2>shoe sale</Path2>
    <Text>Find New Customers & Increase Sales!</Text>
    <TextPart2>Start Advertising on Contoso Today.</TextPart2>
    <TitlePart1>Contoso</TitlePart1>
    <TitlePart2>Fast & Easy Setup</TitlePart2>
    <TitlePart3>Top Rated</TitlePart3>
  </Ad>
</Ads>
```

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AddAds](addads.md)  
[GetAdsByAdGroupId](getadsbyadgroupid.md)  
[GetAdsByEditorialStatus](getadsbyeditorialstatus.md)  
[GetAdsByIds](getadsbyids.md)  
[UpdateAds](updateads.md)  
