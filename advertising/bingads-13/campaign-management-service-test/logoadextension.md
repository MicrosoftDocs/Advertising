---
title: LogoAdExtension Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Reserved.(test)
---
# LogoAdExtension Data Object Test - Campaign Management
Reserved.

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
  "Type": "LogoAdExtension",
  "Version": "ValueHere",
  "BusinessLogo": "ValueHere",
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
|<a name="businesslogo"></a>BusinessLogo|Reserved.|**long**|
|<a name="businesslogourl"></a>BusinessLogoUrl|Reserved.|**string**|
|<a name="businessname"></a>BusinessName|Reserved.|**string**|
|<a name="domainname"></a>DomainName|Reserved.|**string**|

The [LogoAdExtension](logoadextension.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsadextension"></a>Inherited Elements from AdExtension
The [LogoAdExtension](logoadextension.md) object derives from the [AdExtension](adextension.md) object, and inherits the following elements: [DevicePreference](#devicepreference), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Id](#id), [Scheduling](#scheduling), [Status](#status), [Type](#type), [Version](#version). The descriptions below are specific to [LogoAdExtension](logoadextension.md), and might not apply to other objects that inherit the same elements from the [AdExtension](adextension.md) object.  

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

