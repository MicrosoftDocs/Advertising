---
title: CalloutAdExtension Data Object - Campaign Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines an object that specifies additional text about your business, products, or services to include in a text ad.
ms.subservice: campaign-management-api
---
# CalloutAdExtension Data Object - Campaign Management
Defines an object that specifies additional text about your business, products, or services to include in a text ad.

You can associate an app ad extension with the account or with campaigns and ad groups in the account. You must associate between 2 and 20 callout ad extensions per entity (account, campaign, or ad group). If you associate one or fewer callout extensions with your account, campaign, or ad group, then no callout text will serve with your ad. An ad may include between 2 to 4 callouts per impression.

Ad extensions that are associated at the ad group level will override ad extensions of the same type that are associated at the campaign level. For example if you have 2 callout extensions set for *Campaign A*, zero callout extensions associated with *Ad Group AA*, and one callout extension associated with *Ad Group AB*, then only *Ad Group AA* is eligible to have its text ads decorated with callouts.

## Syntax
```xml
<xs:complexType name="CalloutAdExtension" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:AdExtension">
      <xs:sequence>
        <xs:element minOccurs="0" name="Text" nillable="true" type="xs:string" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [CalloutAdExtension](calloutadextension.md) object has the following elements: [Text](#text).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="text"></a>Text|Additional callout text about your business, products, or services to include in a text ad. The callout extension text must be different than the text of your ad.<br/><br/>The length of this string must be between 1 and 25 characters. Note that for Traditional Chinese characters, the length of this string must be between 1 and 12 characters.<br/><br/>**Add:** Required<br/>**Update:** Required|**string**|

The [CalloutAdExtension](calloutadextension.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsadextension"></a>Inherited Elements from AdExtension
The [CalloutAdExtension](calloutadextension.md) object derives from the [AdExtension](adextension.md) object, and inherits the following elements: [DevicePreference](#devicepreference), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Id](#id), [Scheduling](#scheduling), [Status](#status), [Type](#type), [Version](#version). The descriptions below are specific to [CalloutAdExtension](calloutadextension.md), and might not apply to other objects that inherit the same elements from the [AdExtension](adextension.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="devicepreference"></a>DevicePreference|Not supported for this ad extension type.|**long**|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>There are currently no forward compatibility changes for the *AdExtension* object.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="id"></a>Id|The unique Microsoft Advertising identifier of the ad extension.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only and Required|**long**|
|<a name="scheduling"></a>Scheduling|Determines the calendar day and time ranges when the ad extension is eligible to be shown in ads.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If you set this element null, any existing scheduling set for the ad extension will remain unchanged. If you set this to any non-null [Schedule](schedule.md) object, you are effectively replacing existing scheduling settings for the ad extension. To remove all scheduling set this element to an empty [Schedule](schedule.md) object.|[Schedule](schedule.md)|
|<a name="status"></a>Status|The status of the ad extension. The value will always be *Active* because the Campaign Management service does not return deleted ad extensions.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[AdExtensionStatus](adextensionstatus.md)|
|<a name="type"></a>Type|The type of the ad extension. This value is *CalloutAdExtension* when you retrieve a callout ad extension.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only<br/><br/>For more information about ad extension types, see the [Ad Extension Data Object Remarks](adextension.md#remarks).|**string**|
|<a name="version"></a>Version|Tracks the number of times the ad extension has been updated.<br/><br/>The version is set to *1* when the ad extension is created, and increments by one after each update.<br/><br/>**Add:** Not allowed<br/>**Update:** Not allowed|**int**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

