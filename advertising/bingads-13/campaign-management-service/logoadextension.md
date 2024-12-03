---
title: LogoAdExtension Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines an ad extension that specifies a business logo.
---
# LogoAdExtension Data Object - Campaign Management
Defines an ad extension that specifies a business logo.  

Logo Ad Extensions enable advertisers to display eye-catching logos in ads. Build brand recognition to drive more clicks and conversions on your website.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="LogoAdExtension" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:AdExtension">
      <xs:sequence>
        <xs:element minOccurs="0" name="BusinessLogo" nillable="true" type="xs:long" />
        <xs:element minOccurs="0" name="BusinessLogoUrl" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="BusinessName" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="DomainName" nillable="true" type="xs:string" />
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
  "Type": "LogoAdExtension",
  "Version": IntValueHere,
  "BusinessLogo": "LongValueHere",
  "BusinessLogoUrl": "ValueHere",
  "BusinessName": "ValueHere",
  "DomainName": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [LogoAdExtension](logoadextension.md) object has the following elements: [BusinessLogo](#businesslogo), [BusinessLogoUrl](#businesslogourl), [BusinessName](#businessname), [DomainName](#domainname).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="businesslogo"></a>BusinessLogo|The asset ID for the business logo.<br/><br/>The business logo must have a 1:1 aspect ratio. The minimum image size is 128px by 128px. The maximum image size is 5120 KB.<br/><br/>**Add**: Required<br/>**Update**: Required|**long**|
|<a name="businesslogourl"></a>BusinessLogoUrl|The URL of the business logo. This is used internally.<br/><br/>**Add**: Not allowed<br/>**Update**: Not allowed|**string**|
|<a name="businessname"></a>BusinessName|The business name. Maximum length is 25 characters.<br/><br/>**Add**: Required<br/>**Update**: Required|**string**|
|<a name="domainname"></a>DomainName|The domain name.<br/><br/>*Note*: Use the domain name, not a URL. For example, use "contoso.com", not "https://contoso.com". The maximum length is 50 characters.<br/><br/>**Add**: Optional<br/>**Update**: Optional|**string**|

The [LogoAdExtension](logoadextension.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsadextension"></a>Inherited Elements from AdExtension
The [LogoAdExtension](logoadextension.md) object derives from the [AdExtension](adextension.md) object, and inherits the following elements: [DevicePreference](#devicepreference), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Id](#id), [Scheduling](#scheduling), [Status](#status), [Type](#type), [Version](#version). The descriptions below are specific to [LogoAdExtension](logoadextension.md), and might not apply to other objects that inherit the same elements from the [AdExtension](adextension.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="devicepreference"></a>DevicePreference|Not supported for this ad extension type.|**long**|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>Forward compatibility changes will be noted here in future releases. There are currently no forward compatibility changes for this object.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="id"></a>Id|The unique Microsoft Advertising identifier of the ad extension.|**long**|
|<a name="scheduling"></a>Scheduling|Determines the calendar day and time ranges when the ad extension is eligible to be shown in ads.|[Schedule](schedule.md)|
|<a name="status"></a>Status|The status of the ad extension. The value will always be *Active* because the Campaign Management service does not return deleted ad extensions.|[AdExtensionStatus](adextensionstatus.md)|
|<a name="type"></a>Type|The type of ad extension. <br/><br/>For more information, see [Remarks](./adextension.md#remarks).|**string**|
|<a name="version"></a>Version|Tracks the number of times the ad extension has been updated.<br/><br/>The version is set to *1* when the ad extension is created, and increments by one after each update.|**int**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

