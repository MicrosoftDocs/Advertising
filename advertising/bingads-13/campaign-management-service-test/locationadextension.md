---
title: LocationAdExtension Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an ad extension that specifies a business address and phone number to include in a text ad.(test)
---
# LocationAdExtension Data Object Test - Campaign Management
Defines an ad extension that specifies a business address and phone number to include in a text ad.

You can associate a location ad extension with the account or with campaigns in the account. Each entity (account or campaign) can be associated with as many location ad extensions as you decide, up to the total number of location ad extensions in your account.

# [XML](#tab/xml)

```xml
<xs:complexType name="LocationAdExtension" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:AdExtension">
      <xs:sequence>
        <xs:element minOccurs="0" name="Address" nillable="true" type="tns:Address" />
        <xs:element minOccurs="0" name="CompanyName" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="GeoCodeStatus" nillable="true" type="tns:BusinessGeoCodeStatus" />
        <xs:element minOccurs="0" name="GeoPoint" nillable="true" type="tns:GeoPoint" />
        <xs:element minOccurs="0" name="PhoneNumber" nillable="true" type="xs:string" />
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
        "EndHour": NumbericValueHere,
        "EndMinute": "ValueHere",
        "StartHour": NumbericValueHere,
        "StartMinute": "ValueHere"
      }
    ],
    "EndDate": {
      "Day": NumbericValueHere,
      "Month": NumbericValueHere,
      "Year": NumbericValueHere
    },
    "StartDate": {
      "Day": NumbericValueHere,
      "Month": NumbericValueHere,
      "Year": NumbericValueHere
    },
    "UseSearcherTimeZone": "ValueHere"
  },
  "Status": "ValueHere",
  "Type": "LocationAdExtension",
  "Version": NumbericValueHere,
  "Address": {
    "CityName": "ValueHere",
    "CountryCode": "ValueHere",
    "PostalCode": "ValueHere",
    "ProvinceCode": "ValueHere",
    "ProvinceName": "ValueHere",
    "StreetAddress": "ValueHere",
    "StreetAddress2": "ValueHere"
  },
  "CompanyName": "ValueHere",
  "GeoCodeStatus": "ValueHere",
  "GeoPoint": {
    "LatitudeInMicroDegrees": NumbericValueHere,
    "LongitudeInMicroDegrees": NumbericValueHere
  },
  "PhoneNumber": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [LocationAdExtension](locationadextension.md) object has the following elements: [Address](#address), [CompanyName](#companyname), [GeoCodeStatus](#geocodestatus), [GeoPoint](#geopoint), [PhoneNumber](#phonenumber).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="address"></a>Address|The business address.<br/><br/>The supported country code values include AR, AT, AU, BR, CA, CH, CL, CO, DE, DK, ES, FI, FR, GB, HK, ID, IE, IN, IT, MX, MY, NL, NZ, NO, PE, PH, SE, SG, TH, TW, US, VE, and VN.<br/><br/>**Add:** Required<br/>**Update:** Required|[Address](address.md)|
|<a name="companyname"></a>CompanyName|The name of the business. The name can contain a maximum of 80 characters.<br/><br/>**Add:** Required<br/>**Update:** Required|**string**|
|<a name="geocodestatus"></a>GeoCodeStatus|A status value that indicates whether the business latitude and longitude coordinates have been determined.<br/><br/>If you provide the coordinates, the status will be set to Complete; otherwise, the status will indicate the progress of determining the coordinates of the specified business address.<br/><br/>**Add:** Not allowed<br/>**Update:** Not allowed|[BusinessGeoCodeStatus](businessgeocodestatus.md)|
|<a name="geopoint"></a>GeoPoint|The latitude and longitude coordinates of the  specified [Address](#address) element. The coordinates are used to mark the business location on Bing Maps when the user clicks the address on the ad. If the specified coordinates are not within the range of valid values, the service determines the coordinates based on the address.<br/><br/>If you specify the known coordinates, the service does not confirm whether the specified coordinates match the specified business address. If you do not provide the coordinates, the [AddAdExtensions](addadextensions.md) operation uses the business address to determine the coordinates.<br/><br/>When adding more than 10 location ad extensions, the service resolves coordinates offline, and otherwise resolves coordinates up front during execution of the service operation. The location will not be used in an ad until the coordinates are determined, which can take from seconds to minutes depending on the number of location ad extensions being added and the current demand.<br/><br/>To determine whether the coordinates have been resolved, call the [GetAdExtensionsByIds](getadextensionsbyids.md) operation and access the *GeoCodeStatus* element. For a list of possible status values see [BusinessGeoCodeStatus](businessgeocodestatus.md).<br/><br/>**Add:** Optional<br/>**Update:** Optional|[GeoPoint](geopoint.md)|
|<a name="phonenumber"></a>PhoneNumber|The business phone number to include in the ad. The phone number is clickable on hi-fi mobile devices.<br/><br/>The phone number can contain a maximum of 35 characters and must be valid for the specified country or region.<br/><br/>If the campaign also includes a call extension, the phone number in the call extension, will override this phone number.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If you set this element null, the previous setting will be deleted.|**string**|

The [LocationAdExtension](locationadextension.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsadextension"></a>Inherited Elements from AdExtension
The [LocationAdExtension](locationadextension.md) object derives from the [AdExtension](adextension.md) object, and inherits the following elements: [DevicePreference](#devicepreference), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Id](#id), [Scheduling](#scheduling), [Status](#status), [Type](#type), [Version](#version). The descriptions below are specific to [LocationAdExtension](locationadextension.md), and might not apply to other objects that inherit the same elements from the [AdExtension](adextension.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="devicepreference"></a>DevicePreference|Not supported for this ad extension type.|**long**|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>There are currently no forward compatibility changes for the *AdExtension* object.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="id"></a>Id|The unique Microsoft Advertising identifier of the ad extension.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only and Required|**long**|
|<a name="scheduling"></a>Scheduling|Determines the calendar day and time ranges when the ad extension is eligible to be shown in ads.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If you set this element null, any existing scheduling set for the ad extension will remain unchanged. If you set this to any non-null [Schedule](schedule.md) object, you are effectively replacing existing scheduling settings for the ad extension. To remove all scheduling set this element to an empty [Schedule](schedule.md) object.|[Schedule](schedule.md)|
|<a name="status"></a>Status|The status of the ad extension. The value will always be *Active* because the Campaign Management service does not return deleted ad extensions.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[AdExtensionStatus](adextensionstatus.md)|
|<a name="type"></a>Type|The type of the ad extension. This value is *LocationAdExtension* when you retrieve a location ad extension.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only<br/><br/>For more information about ad extension types, see the [Ad Extension Data Object Remarks](adextension.md#remarks).|**string**|
|<a name="version"></a>Version|Tracks the number of times the ad extension has been updated.<br/><br/>The version is set to *1* when the ad extension is created, and increments by one after each update.<br/><br/>**Add:** Not allowed<br/>**Update:** Not allowed|**int**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

