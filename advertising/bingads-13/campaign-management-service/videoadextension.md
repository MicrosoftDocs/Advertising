---
title: VideoAdExtension Data Object - Campaign Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines an ad extension with a video and call-to-action button.
ms.subservice: campaign-management-api
---
# VideoAdExtension Data Object - Campaign Management
Defines an ad extension with a video and call-to-action button.

## Syntax
```xml
<xs:complexType name="VideoAdExtension" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:AdExtension">
      <xs:sequence>
        <xs:element minOccurs="0" name="ActionText" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="AlternativeText" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="DisplayText" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="FinalAppUrls" nillable="true" type="tns:ArrayOfAppUrl" />
        <xs:element minOccurs="0" name="FinalMobileUrls" nillable="true" type="q63:ArrayOfstring" xmlns:q63="http://schemas.microsoft.com/2003/10/Serialization/Arrays" />
        <xs:element minOccurs="0" name="FinalUrlSuffix" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="FinalUrls" nillable="true" type="q64:ArrayOfstring" xmlns:q64="http://schemas.microsoft.com/2003/10/Serialization/Arrays" />
        <xs:element minOccurs="0" name="Name" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="ThumbnailId" nillable="true" type="xs:long" />
        <xs:element minOccurs="0" name="ThumbnailUrl" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="TrackingUrlTemplate" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="UrlCustomParameters" nillable="true" type="tns:CustomParameters" />
        <xs:element minOccurs="0" name="VideoId" nillable="true" type="xs:long" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [VideoAdExtension](videoadextension.md) object has the following elements: [ActionText](#actiontext), [AlternativeText](#alternativetext), [DisplayText](#displaytext), [FinalAppUrls](#finalappurls), [FinalMobileUrls](#finalmobileurls), [FinalUrls](#finalurls), [FinalUrlSuffix](#finalurlsuffix), [Name](#name), [ThumbnailId](#thumbnailid), [ThumbnailUrl](#thumbnailurl), [TrackingUrlTemplate](#trackingurltemplate), [UrlCustomParameters](#urlcustomparameters), [VideoId](#videoid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="actiontext"></a>ActionText|Reserved.|**string**|
|<a name="alternativetext"></a>AlternativeText|Reserved.|**string**|
|<a name="displaytext"></a>DisplayText|Reserved.|**string**|
|<a name="finalappurls"></a>FinalAppUrls|Reserved.|[AppUrl](appurl.md) array|
|<a name="finalmobileurls"></a>FinalMobileUrls|Reserved.|**string** array|
|<a name="finalurls"></a>FinalUrls|Reserved.|**string** array|
|<a name="finalurlsuffix"></a>FinalUrlSuffix|Reserved.|**string**|
|<a name="name"></a>Name|Reserved.|**string**|
|<a name="thumbnailid"></a>ThumbnailId|Reserved.|**long**|
|<a name="thumbnailurl"></a>ThumbnailUrl|Reserved.|**string**|
|<a name="trackingurltemplate"></a>TrackingUrlTemplate|Reserved.|**string**|
|<a name="urlcustomparameters"></a>UrlCustomParameters|Reserved.|[CustomParameters](customparameters.md)|
|<a name="videoid"></a>VideoId|Reserved.|**long**|

The [VideoAdExtension](videoadextension.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsadextension"></a>Inherited Elements from AdExtension
The [VideoAdExtension](videoadextension.md) object derives from the [AdExtension](adextension.md) object, and inherits the following elements: [DevicePreference](#devicepreference), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Id](#id), [Scheduling](#scheduling), [Status](#status), [Type](#type), [Version](#version). The descriptions below are specific to [VideoAdExtension](videoadextension.md), and might not apply to other objects that inherit the same elements from the [AdExtension](adextension.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="devicepreference"></a>DevicePreference|Reserved.|**long**|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|Reserved.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="id"></a>Id|Reserved.|**long**|
|<a name="scheduling"></a>Scheduling|Reserved.|[Schedule](schedule.md)|
|<a name="status"></a>Status|Reserved.|[AdExtensionStatus](adextensionstatus.md)|
|<a name="type"></a>Type|Reserved.|**string**|
|<a name="version"></a>Version|Reserved.|**int**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

