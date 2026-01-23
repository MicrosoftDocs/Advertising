---
title: ImageAdExtension Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines an ad extension that specifies an image with alternative text to include in an expanded text ad.
---
# ImageAdExtension Data Object - Campaign Management
Defines an ad extension that specifies an image with alternative text to include in an expanded text ad.

You can associate an image ad extension with the account or with campaigns and ad groups in the account. For each account, only 1,000 campaigns and 1,000 ad groups can be associated with image ad extensions. Each entity (account, campaign, or ad group) can be associated with up to 6 image ad extensions.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="ImageAdExtension" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:AdExtension">
      <xs:sequence>
        <xs:element minOccurs="0" name="AlternativeText" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="Description" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="DestinationUrl" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="DisplayText" nillable="true" type="xs:string">
          <xs:annotation>
            <xs:appinfo>
              <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
            </xs:appinfo>
          </xs:annotation>
        </xs:element>
        <xs:element minOccurs="0" name="FinalAppUrls" nillable="true" type="tns:ArrayOfAppUrl" />
        <xs:element xmlns:q44="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="FinalMobileUrls" nillable="true" type="q44:ArrayOfstring" />
        <xs:element minOccurs="0" name="FinalUrlSuffix" nillable="true" type="xs:string" />
        <xs:element xmlns:q45="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="FinalUrls" nillable="true" type="q45:ArrayOfstring" />
        <xs:element xmlns:q46="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="ImageMediaIds" nillable="true" type="q46:ArrayOflong" />
        <xs:element minOccurs="0" name="Images" nillable="true" type="tns:ArrayOfAssetLink">
          <xs:annotation>
            <xs:appinfo>
              <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
            </xs:appinfo>
          </xs:annotation>
        </xs:element>
        <xs:element xmlns:q47="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="Layouts" nillable="true" type="q47:ArrayOfstring">
          <xs:annotation>
            <xs:appinfo>
              <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
            </xs:appinfo>
          </xs:annotation>
        </xs:element>
        <xs:element minOccurs="0" name="SourceType" nillable="true" type="xs:string">
          <xs:annotation>
            <xs:appinfo>
              <DefaultValue EmitDefaultValue="false" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
            </xs:appinfo>
          </xs:annotation>
        </xs:element>
        <xs:element minOccurs="0" name="TrackingUrlTemplate" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="UrlCustomParameters" nillable="true" type="tns:CustomParameters" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "DevicePreference": "LongValueHere",
  "ForwardCompatibilityMap": [
    {
      "key": "ValueHere",
      "value": "ValueHere"
    }
  ],
  "Id": "LongValueHere",
  "Scheduling": {
    "DayTimeRanges": [
      {
        "Day": "ValueHere",
        "EndHour": IntValueHere,
        "EndMinute": "ValueHere",
        "StartHour": IntValueHere,
        "StartMinute": "ValueHere"
      }
    ],
    "EndDate": {
      "Day": IntValueHere,
      "Month": IntValueHere,
      "Year": IntValueHere
    },
    "StartDate": {
      "Day": IntValueHere,
      "Month": IntValueHere,
      "Year": IntValueHere
    },
    "UseSearcherTimeZone": "ValueHere"
  },
  "Status": "ValueHere",
  "Type": "ImageAdExtension",
  "Version": IntValueHere,
  "AlternativeText": "ValueHere",
  "Description": "ValueHere",
  "DestinationUrl": "ValueHere",
  "DisplayText": "ValueHere",
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
  "ImageMediaIds": [
    "LongValueHere"
  ],
  "Images": [
    {
      "Asset": {
        "Id": "LongValueHere",
        "Name": "ValueHere",
        "Type": "ImageAsset",
        "CropHeight": IntValueHere,
        "CropWidth": IntValueHere,
        "CropX": IntValueHere,
        "CropY": IntValueHere,
        "SubType": "ValueHere",
        "TargetHeight": IntValueHere,
        "TargetWidth": IntValueHere
      },
      "AssetPerformanceLabel": "ValueHere",
      "EditorialStatus": "ValueHere",
      "PinnedField": "ValueHere"
    }
  ],
  "Layouts": [
    "ValueHere"
  ],
  "SourceType": "ValueHere",
  "TrackingUrlTemplate": "ValueHere",
  "UrlCustomParameters": {
    "Parameters": [
      {
        "Key": "ValueHere",
        "Value": "ValueHere"
      }
    ]
  }
}
```

-----

## <a name="elements"></a>Elements

The [ImageAdExtension](imageadextension.md) object has the following elements: [AlternativeText](#alternativetext), [Description](#description), [DestinationUrl](#destinationurl), [DisplayText](#displaytext), [FinalAppUrls](#finalappurls), [FinalMobileUrls](#finalmobileurls), [FinalUrls](#finalurls), [FinalUrlSuffix](#finalurlsuffix), [ImageMediaIds](#imagemediaids), [Images](#images), [Layouts](#layouts), [SourceType](#sourcetype), [TrackingUrlTemplate](#trackingurltemplate), [UrlCustomParameters](#urlcustomparameters).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="alternativetext"></a>AlternativeText|Alternative description of the image media for usability. If the image could not be displayed, the alternative text is used instead.<br/><br/>The maximum length for this element is 35 characters.<br/><br/>**Add:** Required<br/>**Update:** Required|**string**|
|<a name="description"></a>Description|Description that can be used by the advertiser, agency, or account manager to track, label, or manage image media.<br/><br/>This description is not displayed with the ad or image.<br/><br/>The maximum length for this element is 100 characters.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If you set this element null, the previous setting will be deleted.|**string**|
|<a name="destinationurl"></a>DestinationUrl|The URL of the webpage to take the user to when they click the image.<br/><br/>The URL can contain dynamic text strings such as {keyword}. For more information, see [What tracking or URL parameters can I use?](https://help.ads.microsoft.com/#apex/3/en/56799/2).<br/><br/>The URL can contain a maximum of 1,024 characters. If the URL does not specify a protocol, the system uses the HTTP protocol when a user clicks the ad. If the URL specifies the HTTP protocol when you add an ad, the service will remove the *http://* protocol string (the HTTP protocol string does not count against the 1,024 character limit); however, the service will not remove an HTTPS protocol string (https://) from the URL.<br/><br/>If the URL is not specified for the image ad extension, the URL of the ad is used.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If you set this element null, the previous setting will be deleted.|**string**|
|<a name="displaytext"></a>DisplayText|The display text of your image extension.<br/><br/>The maximum length for this element is 35 characters.<br/><br/>**Add:** Required when *Layouts* contains *SearchMultiple*, else Optional.<br/>**Update:** Required when *Layouts* contains *SearchMultiple*, else Optional. If you set this element null, the previous setting will be deleted.|**string**|
|<a name="finalappurls"></a>FinalAppUrls|For future use.|[AppUrl](appurl.md) array|
|<a name="finalmobileurls"></a>FinalMobileUrls|The landing page URL for mobile devices.<br/><br/>The following validation rules apply to Final URLs and Final Mobile URLs.<br/>- The length of the URL is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.<br/>- You may specify up to 10 list items for both [FinalUrls](#finalurls) and [FinalMobileUrls](#finalmobileurls); however, only the first item in each list is used for delivery. The service allows up to 10 list items for potential forward compatibility.<br/>- Usage of '{' and '}' is only allowed to delineate tags, for example *{lpurl}*.<br/>- Final URLs must each be a well-formed URL starting with either http:// or https://.<br/>- If you specify [FinalMobileUrls](#finalmobileurls), you must also specify [FinalUrls](#finalurls).<br/>- You may not specify [FinalMobileUrls](#finalmobileurls) if the [DevicePreference](#devicepreference) is set to *30001* (mobile).<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, the prior setting is removed.|**string** array|
|<a name="finalurls"></a>FinalUrls|The landing page URL.<br/><br/>The following validation rules apply to Final URLs and Final Mobile URLs.<br/>- The length of the URL is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.<br/>- You may specify up to 10 list items for both [FinalUrls](#finalurls) and [FinalMobileUrls](#finalmobileurls); however, only the first item in each list is used for delivery. The service allows up to 10 list items for potential forward compatibility.<br/>- Usage of '{' and '}' is only allowed to delineate tags, for example *{lpurl}*.<br/>- Final URLs must each be a well-formed URL starting with either http:// or https://.<br/>- If you specify [FinalMobileUrls](#finalmobileurls), you must also specify [FinalUrls](#finalurls).<br/>- You may not specify [FinalMobileUrls](#finalmobileurls) if the [DevicePreference](#devicepreference) is set to *30001* (mobile).<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, the prior setting is removed.|**string** array|
|<a name="finalurlsuffix"></a>FinalUrlSuffix|The final URL suffix can include tracking parameters that will be appended to the end of your landing page URL. We recommend placing tracking parameters that your landing page requires in a final URL suffix so that your customers are always sent to your landing page. For more details and validation rules see [Final URL Suffix](../guides/url-tracking-upgraded-urls.md#finalurlsuffixvalidation) in the technical guides.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, the prior setting is removed.|**string**|
|<a name="imagemediaids"></a>ImageMediaIds|The identifiers of the images to include in the ad. You may not specify media identifiers for more than one image of the same aspect ratio. In other words each of  the referenced images must have different aspect ratios.<br/><br/>You can specify up to four (4) image media  identifiers. While the minimum required is one image media ID, in order to qualify for all ad placements you must provide four image media identifiers, where each ID corresponds to an [Image](image.md) of one of the four supported [Media](media.md) types (aspect ratios). The supported aspect ratios for audience ads are 16:9, 1.5:1, 4:3, and 1.2:1. For more information see the [Image](image.md) data object reference documentation.<br/><br/>You can get the identifier of each [Image](image.md) when you add them to the image library by calling the [AddMedia](addmedia.md) operation. Otherwise after the media has been added to your image library you can get the media identifiers with the [GetMediaMetaDataByAccountId](getmediametadatabyaccountid.md) operation.<br/><br/>**Add:** Required<br/>**Update:** Required|**long** array|
|<a name="images"></a>Images|Image assets with different sizes and aspect ratios so they can flexibly display across a variety of publishers and placements.<br/><br/>Include one or more [AssetLink](assetlink.md) objects that each contain an [ImageAsset](imageasset.md) with [SubType](imageasset.md#subtype) and crop settings that match the desired aspect ratio.<br/><br/>**Add:** Required<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. If you include images during update, any previously set images will be replaced.|[AssetLink](assetlink.md) array|
|<a name="layouts"></a>Layouts|The list of eligible image layouts.<br/><br/>Supported values are SearchSingle and SearchMultiple. New layouts might be added in the future, so you should not take any dependency on a fixed set of values.<br/><br/>**Add:** Required<br/>**Update:** Optional. If no value is set for the update, this setting is not changed. If you include layouts during update, any previously set layouts will be replaced.|**string** array|
|<a name="sourcetype"></a>SourceType|The source type.|**string**|
|<a name="trackingurltemplate"></a>TrackingUrlTemplate|The tracking template to use as a default for all [FinalUrls](#finalurls) and [FinalMobileUrls](#finalmobileurls).<br/><br/>The following validation rules apply to tracking templates. For more details about supported templates and parameters, see the Microsoft Advertising help article [What tracking or URL parameters can I use?](https://help.ads.microsoft.com/#apex/3/en/56799/2)<br/>- Tracking templates defined for lower level entities e.g. ads override those set for higher level entities e.g. campaign. For more information, see [Entity Limits](../guides/entity-hierarchy-limits.md).<br/>- The length of the tracking template is limited to 2,048 characters. The HTTP or HTTPS protocol string does count towards the 2,048 character limit.<br/>- The tracking template must be a well-formed URL beginning with one of the following: *http://*, *https://*, *{lpurl}*, or *{unescapedlpurl}*.<br/>- Microsoft Advertising does not validate whether custom parameters exist. If you use custom parameters in your tracking template and they do not exist, then the landing page URL will include the key and value placeholders of your custom parameters without substitution. For example, if your tracking template is *`https://tracker.example.com/?season={_season}&promocode={_promocode}&u={lpurl}`* and neither *{_season}* or *{_promocode}* are defined at the campaign, ad group, criterion, keyword, or ad level, then the landing page URL will be the same.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, the prior setting is removed.|**string**|
|<a name="urlcustomparameters"></a>UrlCustomParameters|Your custom collection of key and value parameters for URL tracking.<br/><br/>Microsoft Advertising will accept the first 3 [CustomParameter](customparameter.md) objects that you include within the [CustomParameters](customparameters.md) object, and any additional custom parameters will be ignored. Each [CustomParameter](customparameter.md) includes [Key](customparameter.md#key) and [Value](customparameter.md#value) elements. For customers in the Custom Parameters Limit Increase Phase 3 pilot ([GetCustomerPilotFeatures](../customer-management-service/getcustomerpilotfeatures.md) returns 635), Microsoft Advertising will accept the first 8 custom parameter key and value pairs that you include, and if you include more than 8 custom parameters an error will be returned.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, the prior setting is removed.|[CustomParameters](customparameters.md)|

The [ImageAdExtension](imageadextension.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsadextension"></a>Inherited Elements from AdExtension
The [ImageAdExtension](imageadextension.md) object derives from the [AdExtension](adextension.md) object, and inherits the following elements: [DevicePreference](#devicepreference), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Id](#id), [Scheduling](#scheduling), [Status](#status), [Type](#type), [Version](#version). The descriptions below are specific to [ImageAdExtension](imageadextension.md), and might not apply to other objects that inherit the same elements from the [AdExtension](adextension.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="devicepreference"></a>DevicePreference|Not supported for this ad extension type.|**long**|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>There are currently no forward compatibility changes for the *AdExtension* object.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="id"></a>Id|The unique Microsoft Advertising identifier of the ad extension.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only and Required|**long**|
|<a name="scheduling"></a>Scheduling|Determines the calendar day and time ranges when the ad extension is eligible to be shown in ads.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If you set this element null, any existing scheduling set for the ad extension will remain unchanged. If you set this to any non-null [Schedule](schedule.md) object, you are effectively replacing existing scheduling settings for the ad extension. To remove all scheduling set this element to an empty [Schedule](schedule.md) object.|[Schedule](schedule.md)|
|<a name="status"></a>Status|The status of the ad extension. The value will always be *Active* because the Campaign Management service does not return deleted ad extensions.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[AdExtensionStatus](adextensionstatus.md)|
|<a name="type"></a>Type|The type of the ad extension. This value is *ImageAdExtension* when you retrieve an image ad extension. <br/><br/>**Add:** Read-only<br/>**Update:** Read-only<br/><br/>For more information about ad extension types, see the [Ad Extension Data Object Remarks](adextension.md#remarks).|**string**|
|<a name="version"></a>Version|Tracks the number of times the ad extension has been updated.<br/><br/>The version is set to *1* when the ad extension is created, and increments by one after each update.<br/><br/>**Add:** Not allowed<br/>**Update:** Not allowed|**int**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

