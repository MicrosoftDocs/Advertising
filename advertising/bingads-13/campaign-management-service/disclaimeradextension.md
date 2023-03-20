---
title: DisclaimerAdExtension Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an ad extension that specifies disclaimer text to include in an expanded text ad or responsive search ad.
---
# DisclaimerAdExtension Data Object - Campaign Management
Defines an ad extension that specifies disclaimer text to include in an expanded text ad or responsive search ad.

## Syntax
```xml
<xs:complexType name="DisclaimerAdExtension" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:AdExtension">
      <xs:sequence>
        <xs:element name="DisclaimerLayout" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="FinalAppUrls" nillable="true" type="tns:ArrayOfAppUrl" />
        <xs:element xmlns:q65="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="FinalMobileUrls" nillable="true" type="q65:ArrayOfstring" />
        <xs:element minOccurs="0" name="FinalUrlSuffix" nillable="true" type="xs:string" />
        <xs:element xmlns:q66="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="FinalUrls" nillable="true" type="q66:ArrayOfstring" />
        <xs:element minOccurs="0" name="LineText" nillable="true" type="xs:string" />
        <xs:element name="Name" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="PopupText" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="Title" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="TrackingUrlTemplate" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="UrlCustomParameters" nillable="true" type="tns:CustomParameters" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [DisclaimerAdExtension](disclaimeradextension.md) object has the following elements: [DisclaimerLayout](#disclaimerlayout), [FinalAppUrls](#finalappurls), [FinalMobileUrls](#finalmobileurls), [FinalUrls](#finalurls), [FinalUrlSuffix](#finalurlsuffix), [LineText](#linetext), [Name](#name), [PopupText](#popuptext), [Title](#title), [TrackingUrlTemplate](#trackingurltemplate), [UrlCustomParameters](#urlcustomparameters).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="disclaimerlayout"></a>DisclaimerLayout|The layout of the disclaimer. Can either be *additionalLine* or *popup*.|**string**|
|<a name="finalappurls"></a>FinalAppUrls|Reserved.|[AppUrl](appurl.md) array|
|<a name="finalmobileurls"></a>FinalMobileUrls|The landing page URL for mobile devices.<br/><br/>The following validation rules apply to Final URLs and Final Mobile URLs.<br/>- The length of the URL is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.<br/>- You may specify up to 10 list items for both [FinalUrls](#finalurls) and [FinalMobileUrls](#finalmobileurls); however, only the first item in each list is used for delivery. The service allows up to 10 list items for potential forward compatibility.<br/>- Usage of '{' and '}' is only allowed to delineate tags, for example *{lpurl}*.<br/>- Final URLs must each be a well-formed URL starting with either http:// or https://.<br/>- If you specify [FinalMobileUrls](#finalmobileurls), you must also specify [FinalUrls](#finalurls).<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this element to an empty list, the previous setting will be deleted.|**string** array|
|<a name="finalurls"></a>FinalUrls|The landing page URL.<br/><br/>The following validation rules apply to Final URLs and Final Mobile URLs.<br/>- The length of the URL is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.<br/>- You may specify up to 10 list items for both [FinalUrls](#finalurls) and [FinalMobileUrls](#finalmobileurls); however, only the first item in each list is used for delivery. The service allows up to 10 list items for potential forward compatibility.<br/>- Usage of '{' and '}' is only allowed to delineate tags, for example *{lpurl}*.<br/>- Final URLs must each be a well-formed URL starting with either http:// or https://.<br/>- If you specify [FinalMobileUrls](#finalmobileurls), you must also specify [FinalUrls](#finalurls).<br/><br/>**Add:** Required<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string** array|
|<a name="finalurlsuffix"></a>FinalUrlSuffix|The final URL suffix can include tracking parameters that will be appended to the end of your landing page URL. We recommend placing tracking parameters that your landing page requires in a final URL suffix so that your customers are always sent to your landing page. For more details and validation rules see [Final URL Suffix](../guides/url-tracking-upgraded-urls.md#finalurlsuffixvalidation) in the technical guides.<br/><br/>This feature is only available for customers in the Final URL Suffix Phase 3 pilot ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 636). If you are not in the pilot this property will be ignored and no error will be returned.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string**|
|<a name="linetext"></a>LineText|Required text if the disclaimer is in *additionalLine* layout.<br/><br/>Max. length: 80 characters.|**string**|
|<a name="name"></a>Name|The name of the disclaimer. This is only used for reporting to help identify the extension. <br/><br/>Max. length: 35 characters.|**string**|
|<a name="popuptext"></a>PopupText|Required text if the disclaimer is in *popup* layout. <br/><br/>Max. length: 500 characters.|**string**|
|<a name="title"></a>Title|The title of the popup in popup layout.<br/><br/>Max. length: 75 characters|**string**|
|<a name="trackingurltemplate"></a>TrackingUrlTemplate|The tracking template to use as a default for all [FinalUrls](#finalurls) and [FinalMobileUrls](#finalmobileurls).<br/><br/>The following validation rules apply to tracking templates. For more details about supported templates and parameters, see the Microsoft Advertising help article [What tracking or URL parameters can I use?](https://help.ads.microsoft.com/#apex/3/en/56799/2)<br/>- Tracking templates defined for lower level entities e.g. ads override those set for higher level entities e.g. campaign. For more information, see [Entity Limits](../guides/entity-hierarchy-limits.md).<br/>- The length of the tracking template is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.<br/>- The tracking template must be a well-formed URL beginning with one of the following: *http://*, *https://*, *{lpurl}*, or *{unescapedlpurl}*.<br/>- Microsoft Advertising does not validate whether custom parameters exist. If you use custom parameters in your tracking template and they do not exist, then the landing page URL will include the key and value placeholders of your custom parameters without substitution. For example, if your tracking template is *`https://tracker.example.com/?season={_season}&promocode={_promocode}&u={lpurl}`* and neither *{_season}* or *{_promocode}* are defined at the campaign, ad group, criterion, keyword, or ad level, then the landing page URL will be the same.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. If you set this element to an empty string (*""*), the previous setting will be deleted.|**string**|
|<a name="urlcustomparameters"></a>UrlCustomParameters|Your custom collection of key and value parameters for URL tracking.<br/><br/>Microsoft Advertising will accept the first 3 [CustomParameter](customparameter.md) objects that you include within the [CustomParameters](customparameters.md) object, and any additional custom parameters will be ignored. Each [CustomParameter](customparameter.md) includes [Key](customparameter.md#key) and [Value](customparameter.md#value) elements. For customers in the Custom Parameters Limit Increase Phase 3 pilot ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 635), Microsoft Advertising will accept the first 8 custom parameter key and value pairs that you include, and if you include more than 8 custom parameters an error will be returned.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. Set the [UrlCustomParameters](#urlcustomparameters) element to null or empty to retain any existing custom parameters. To remove all custom parameters, set the [Parameters](customparameters.md#parameters) element of the [CustomParameters](customparameters.md) object to null or empty. To remove a subset of custom parameters, specify the custom parameters that you want to keep in the [Parameters](customparameters.md#parameters) element of the [CustomParameters](customparameters.md) object.|[CustomParameters](customparameters.md)|

The [DisclaimerAdExtension](disclaimeradextension.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsadextension"></a>Inherited Elements from AdExtension
The [DisclaimerAdExtension](disclaimeradextension.md) object derives from the [AdExtension](adextension.md) object, and inherits the following elements: [DevicePreference](#devicepreference), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Id](#id), [Scheduling](#scheduling), [Status](#status), [Type](#type), [Version](#version). The descriptions below are specific to [DisclaimerAdExtension](disclaimeradextension.md), and might not apply to other objects that inherit the same elements from the [AdExtension](adextension.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="devicepreference"></a>DevicePreference|This element determines whether the preference is for the ad extension to be displayed on mobile devices or all devices.<br/><br/>To specify a preference for mobile devices, set this element to *30001*.<br/><br/>To specify all devices, set this element to *0* (zero) or leave the element nil. By default, this element will be nil.<br/><br/>This element is only applicable for the [AppAdExtension](appadextension.md) and [SitelinkAdExtension](sitelinkadextension.md) types.|**long**|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>Forward compatibility changes will be noted here in future releases. There are currently no forward compatibility changes for this object.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="id"></a>Id|The unique Microsoft Advertising identifier of the ad extension.|**long**|
|<a name="scheduling"></a>Scheduling|Determines the calendar day and time ranges when the ad extension is eligible to be shown in ads.|[Schedule](schedule.md)|
|<a name="status"></a>Status|The status of the ad extension. The value will always be *Active* because the Campaign Management service does not return deleted ad extensions.|[AdExtensionStatus](adextensionstatus.md)|
|<a name="type"></a>Type|The type of the ad extension. This value is *DisclaimerAdExtension* when you retrieve a location ad extension.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only<br/><br/>For more information about ad extension types, see the [Ad Extension Data Object Remarks](adextension.md#remarks).|**string**|
|<a name="version"></a>Version|Tracks the number of times the ad extension has been updated.<br/><br/>The version is set to *1* when the ad extension is created, and increments by one after each update.|**int**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

