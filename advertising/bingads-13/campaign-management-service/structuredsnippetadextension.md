---
title: StructuredSnippetAdExtension Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines an object that pairs one header with between 3 and 10 snippet values that tell customers more about your business.
---
# StructuredSnippetAdExtension Data Object - Campaign Management
Defines an object that pairs one header with between 3 and 10 snippet values that tell customers more about your business.

In the following example, *Courses* is the header, and *.NET*, *Java*, *Python*, and *PHP* are examples of individual values.

**Courses: .NET, Java, Python, PHP**

You can associate a structured snippet ad extension with the account or with campaigns and ad groups in the account. Each entity (account, campaign, or ad group) can be associated with up to 20 structured snippet ad extensions. An expanded text ad will only include one structured snippet (one headline with 3 - 10 values) per impression.

## Syntax
```xml
<xs:complexType name="StructuredSnippetAdExtension" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:AdExtension">
      <xs:sequence>
        <xs:element minOccurs="0" name="Header" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="Values" nillable="true" type="q51:ArrayOfstring" xmlns:q51="http://schemas.microsoft.com/2003/10/Serialization/Arrays" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [StructuredSnippetAdExtension](structuredsnippetadextension.md) object has the following elements: [Header](#header), [Values](#values).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="header"></a>Header|The header that is appended with a colon (*:*) and precedes the snippet values.<br/><br/>Structured Snippet headers must be specified in the same language that you intend it to be shown. For example, if you want header *Amenities* in English you must specify the header as *Amenities*.  If you want header *Ausstattung* in German you must specify the header as *Ausstattung* (*Amenities* in German). For a list of supported headers per language, please see [Ad Extension Header Languages](../guides/ad-languages.md#adextensionheaders).<br/><br/>**Add:** Required<br/>**Update:** Required|**string**|
|<a name="values"></a>Values|The snippet values that follow after the [Header](#header) component of the ad that is shown.<br/><br/>Each text value that you choose can have a maximum length of 25 characters. Note that for Traditional Chinese characters, each value can have a maximum length of 12 characters.<br/><br/>**Add:** Required<br/>**Update:** Required|**string** array|

The [StructuredSnippetAdExtension](structuredsnippetadextension.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsadextension"></a>Inherited Elements from AdExtension
The [StructuredSnippetAdExtension](structuredsnippetadextension.md) object derives from the [AdExtension](adextension.md) object, and inherits the following elements: [DevicePreference](#devicepreference), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Id](#id), [Scheduling](#scheduling), [Status](#status), [Type](#type), [Version](#version). The descriptions below are specific to [StructuredSnippetAdExtension](structuredsnippetadextension.md), and might not apply to other objects that inherit the same elements from the [AdExtension](adextension.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="devicepreference"></a>DevicePreference|Not supported for this ad extension type.|**long**|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>There are currently no forward compatibility changes for the *AdExtension* object.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="id"></a>Id|The unique Microsoft Advertising identifier of the ad extension.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only and Required|**long**|
|<a name="scheduling"></a>Scheduling|Determines the calendar day and time ranges when the ad extension is eligible to be shown in ads.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If you set this element null, any existing scheduling set for the ad extension will remain unchanged. If you set this to any non-null [Schedule](schedule.md) object, you are effectively replacing existing scheduling settings for the ad extension. To remove all scheduling set this element to an empty [Schedule](schedule.md) object.|[Schedule](schedule.md)|
|<a name="status"></a>Status|The status of the ad extension. The value will always be *Active* because the Campaign Management service does not return deleted ad extensions.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|[AdExtensionStatus](adextensionstatus.md)|
|<a name="type"></a>Type|The type of the ad extension. This value is *StructuredSnippetAdExtension* when you retrieve a structured snippet ad extension.<br/><br/>**Add:** Read-only<br/>**Update:** Read-only<br/><br/>For more information about ad extension types, see the [Ad Extension Data Object Remarks](adextension.md#remarks).|**string**|
|<a name="version"></a>Version|Tracks the number of times the ad extension has been updated.<br/><br/>The version is set to *1* when the ad extension is created, and increments by one after each update.<br/><br/>**Add:** Not allowed<br/>**Update:** Not allowed|**int**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

