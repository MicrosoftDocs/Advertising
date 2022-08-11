---
title: DisclaimerAdExtension Data Object - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the DisclaimerAdExtension Data Object.
---
# DisclaimerAdExtension Data Object - Campaign Management
Defines the DisclaimerAdExtension Data Object.

> [!NOTE]
> Not everyone has this feature yet. If you don't, don't worry - it's coming soon!

## Syntax
```xml
<xs:complexType name="DisclaimerAdExtension" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:AdExtension">
      <xs:sequence>
        <xs:element name="DisclaimerLayout" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="FinalAppUrls" nillable="true" type="tns:ArrayOfAppUrl" />
        <xs:element minOccurs="0" name="FinalMobileUrls" nillable="true" type="q65:ArrayOfstring" xmlns:q65="http://schemas.microsoft.com/2003/10/Serialization/Arrays" />
        <xs:element minOccurs="0" name="FinalUrlSuffix" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="FinalUrls" nillable="true" type="q66:ArrayOfstring" xmlns:q66="http://schemas.microsoft.com/2003/10/Serialization/Arrays" />
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
|<a name="finalmobileurls"></a>FinalMobileUrls|Reserved.|**string** array|
|<a name="finalurls"></a>FinalUrls|Reserved.|**string** array|
|<a name="finalurlsuffix"></a>FinalUrlSuffix|Reserved.|**string**|
|<a name="linetext"></a>LineText|Required text if the disclaimer is in *additionalLine* layout.|**string**|
|<a name="name"></a>Name|The name of the disclaimer. This is only used for reporting to help identify the extension. <br/><br/>Max. length: 35 characters.|**string**|
|<a name="popuptext"></a>PopupText|Required text if the disclaimer is in *popup* layout. <br/><br/>Max. length: 500 characters.|**string**|
|<a name="title"></a>Title|The title of the popup in popup layout.<br/><br/>Max. length: 75 characters|**string**|
|<a name="trackingurltemplate"></a>TrackingUrlTemplate|Reserved.|**string**|
|<a name="urlcustomparameters"></a>UrlCustomParameters|Reserved.|[CustomParameters](customparameters.md)|

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

