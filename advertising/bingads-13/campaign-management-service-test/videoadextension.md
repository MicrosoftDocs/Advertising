---
title: VideoAdExtension Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an ad extension with a video and call-to-action button.(test)
---
# VideoAdExtension Data Object Test - Campaign Management
Defines an ad extension with a video and call-to-action button.

# [XML](#tab/xml)

```xml
<xs:complexType name="VideoAdExtension" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:AdExtension">
      <xs:sequence>
        <xs:element minOccurs="0" name="ActionText" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="AlternativeText" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="DisplayText" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="FinalAppUrls" nillable="true" type="tns:ArrayOfAppUrl" />
        <xs:element xmlns:q65="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="FinalMobileUrls" nillable="true" type="q65:ArrayOfstring" />
        <xs:element minOccurs="0" name="FinalUrlSuffix" nillable="true" type="xs:string" />
        <xs:element xmlns:q66="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="FinalUrls" nillable="true" type="q66:ArrayOfstring" />
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

# [JSON](#tab/json)

```json
{
  "DevicePreference": "ValueHere",
  "ForwardCompatibilityMap": [
    {
      "key": "ValueHere",
      "value": "ValueHere"
    }
  ],
  "Id": "ValueHere",
  "Scheduling": {
    "DayTimeRanges": [
      {
        "Day": "ValueHere",
        "EndHour": "ValueHere",
        "EndMinute": "ValueHere",
        "StartHour": "ValueHere",
        "StartMinute": "ValueHere"
      }
    ],
    "EndDate": {
      "Day": "ValueHere",
      "Month": "ValueHere",
      "Year": "ValueHere"
    },
    "StartDate": {
      "Day": "ValueHere",
      "Month": "ValueHere",
      "Year": "ValueHere"
    },
    "UseSearcherTimeZone": "ValueHere"
  },
  "Status": "ValueHere",
  "Type": "VideoAdExtension",
  "Version": "ValueHere",
  "ActionText": "ValueHere",
  "AlternativeText": "ValueHere",
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
  "Name": "ValueHere",
  "ThumbnailId": "ValueHere",
  "ThumbnailUrl": "ValueHere",
  "TrackingUrlTemplate": "ValueHere",
  "UrlCustomParameters": {
    "Parameters": [
      {
        "Key": "ValueHere",
        "Value": "ValueHere"
      }
    ]
  },
  "VideoId": "ValueHere"
}
```

-----

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

