---
title: CallAdExtension Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an object that specifies a click-to-call phone number to include in a text ad.(test)
---
# CallAdExtension Data Object Test - Campaign Management
Defines an object that specifies a click-to-call phone number to include in a text ad.

You can associate a call ad extension with campaigns in the account. Each entity (campaign) can be associated with one call ad extension.

# [XML](#tab/xml)

```xml
<xs:complexType name="CallAdExtension" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:AdExtension">
      <xs:sequence>
        <xs:element minOccurs="0" name="CountryCode" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="IsCallOnly" nillable="true" type="xs:boolean" />
        <xs:element minOccurs="0" name="IsCallTrackingEnabled" nillable="true" type="xs:boolean" />
        <xs:element minOccurs="0" name="PhoneNumber" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="RequireTollFreeTrackingNumber" nillable="true" type="xs:boolean" />
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
  "Type": "CallAdExtension",
  "Version": IntValueHere,
  "CountryCode": "ValueHere",
  "IsCallOnly": "ValueHere",
  "IsCallTrackingEnabled": "ValueHere",
  "PhoneNumber": "ValueHere",
  "RequireTollFreeTrackingNumber": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [CallAdExtension](calladextension.md) object has the following elements: [CountryCode](#countrycode), [IsCallOnly](#iscallonly), [IsCallTrackingEnabled](#iscalltrackingenabled), [PhoneNumber](#phonenumber), [RequireTollFreeTrackingNumber](#requiretollfreetrackingnumber).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="countrycode"></a>CountryCode|The country code where the phone number is registered. The country code must contain a 2 character country code. The supported country code values include AR, AT, AU, BR, CA, CH, CL, CO, DE, DK, ES, FI, FR, GB, HK, ID, IE, IN, IT, MX, MY, NL, NZ, NO, PE, PH, SE, SG, TH, TW, US, VE, and VN.<br/><br/>**Add:** Required<br/>**Update:** Required|**string**|
|<a name="iscallonly"></a>IsCallOnly|The option to show both your phone number and website, or just your phone number, to people seeing your ads on a smartphone. You might want to show only your phone number if your business requires that you talk to each customer.<br/><br/>Set this property to *true* if you want the ad extension to only show the phone number without a link to your website, and otherwise if you want the ad extension include a link to your website in addition to the phone number set it to *false*.<br/><br/>**Add:** Optional. If you do not specify this element or leave it empty, the default value of *false* will be set and the ad extension will include a link to your website in addition to the phone number.<br/>**Update:** Optional|**boolean**|
|<a name="iscalltrackingenabled"></a>IsCallTrackingEnabled|Determines whether call tracking is enabled for the call ad extension.<br/><br/>Call tracking is only supported in the United States and United Kingdom.<br/><br/>Set this property to *true* to enable call tracking, and otherwise set it to *false*.<br/><br/>**Add:** Optional. If you do not specify this element or leave it empty, the default value of *false* will be set.<br/>**Update:** Optional|**boolean**|
|<a name="phonenumber"></a>PhoneNumber|The clickable phone number to include in the ad. <br/><br/>The phone number can contain a maximum of 35 characters and must be valid for the specified country or region.<br/><br/>If the campaign includes call and location ad extensions, this phone number will override the phone number specified in the location ad extensions.<br/><br/>Note that the phone number may be reformatted. For example, if you set phone number to 4255551212, it would be reformatted to (425) 555-1212.<br/><br/>**Add:** Required<br/>**Update:** Required|**string**|
|<a name="requiretollfreetrackingnumber"></a>RequireTollFreeTrackingNumber|You can either use your own phone number or use a Microsoft Advertising forwarding phone number. A Microsoft Advertising forwarding phone number is a unique phone number that is routed to your business phone number. With a Microsoft Advertising forwarding number, you can track all calls from your ad so that you can analyze the ad's performance. This element determines whether a toll-free Microsoft Advertising forwarding phone number should be created for call tracking. This element can only be set if *IsCallTrackingEnabled* is also true.<br/><br/>Prior to August 2017, clients could set this property to *true* if a Microsoft Advertising forwarding phone number should be created for call tracking. Since August 2017, clients can no longer create a new toll-free Microsoft Advertising forwarding phone number. If you set this value *true* then the operation will succeed; however, a toll-free number will not be created and when you retrieve the call ad extension this property will be set to *false*. If a toll-free forwarding number was provisioned prior to August 2017 then this property will be *true* if the number is still active when you retrieve the call ad extension.<br/><br/>**Add:** Optional. If you do not specify this element or leave it empty, the default value of *false* will be set.<br/>**Update:** Optional|**boolean**|

The [CallAdExtension](calladextension.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsadextension"></a>Inherited Elements from AdExtension
The [CallAdExtension](calladextension.md) object derives from the [AdExtension](adextension.md) object, and inherits the following elements: [DevicePreference](#devicepreference), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Id](#id), [Scheduling](#scheduling), [Status](#status), [Type](#type), [Version](#version). The descriptions below are specific to [CallAdExtension](calladextension.md), and might not apply to other objects that inherit the same elements from the [AdExtension](adextension.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="devicepreference"></a>DevicePreference|Not supported for this ad extension type.|**long**|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>There are currently no forward compatibility changes for the *AdExtension* object.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="id"></a>Id|The unique Microsoft Advertising identifier of the ad extension.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only and Required|**long**|
|<a name="scheduling"></a>Scheduling|Determines the calendar day and time ranges when the ad extension is eligible to be shown in ads.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If you set this element null, any existing scheduling set for the ad extension will remain unchanged. If you set this to any non-null [Schedule](schedule.md) object, you are effectively replacing existing scheduling settings for the ad extension. To remove all scheduling set this element to an empty [Schedule](schedule.md) object.|[Schedule](schedule.md)|
|<a name="status"></a>Status|The status of the ad extension. The value will always be *Active* because the Campaign Management service does not return deleted ad extensions.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[AdExtensionStatus](adextensionstatus.md)|
|<a name="type"></a>Type|The type of the ad extension. This value is *CallAdExtension* when you retrieve a call ad extension.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only<br/><br/>For more information about ad extension types, see the [Ad Extension Data Object Remarks](adextension.md#remarks).|**string**|
|<a name="version"></a>Version|Tracks the number of times the ad extension has been updated.<br/><br/>The version is set to *1* when the ad extension is created, and increments by one after each update.<br/><br/>**Add:** Not allowed<br/>**Update:** Not allowed|**int**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

