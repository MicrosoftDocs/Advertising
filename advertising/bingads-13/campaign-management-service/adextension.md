---
title: AdExtension Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the base object of an ad extension.
---
# AdExtension Data Object - Campaign Management
Defines the base object of an ad extension.

Do not try to instantiate an *AdExtension*. You can create one or more of the following objects that derive from it.
- [ActionAdExtension](actionadextension.md)  
- [AppAdExtension](appadextension.md)  
- [CallAdExtension](calladextension.md)  
- [CalloutAdExtension](calloutadextension.md)  
- [FilterLinkAdExtension](filterlinkadextension.md)  
- [FlyerAdExtension](flyeradextension.md)  
- [ImageAdExtension](imageadextension.md)  
- [LocationAdExtension](locationadextension.md)  
- [LogoAdExtension](logoadextension.md)  
- [PriceAdExtension](priceadextension.md)  
- [PromotionAdExtension](promotionadextension.md)  
- [ReviewAdExtension](reviewadextension.md)  
- [SitelinkAdExtension](sitelinkadextension.md)  
- [StructuredSnippetAdExtension](structuredsnippetadextension.md)  

## Syntax
```xml
<xs:complexType name="AdExtension" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="DevicePreference" nillable="true" type="xs:long" />
    <xs:element xmlns:q42="http://schemas.datacontract.org/2004/07/System.Collections.Generic" minOccurs="0" name="ForwardCompatibilityMap" nillable="true" type="q42:ArrayOfKeyValuePairOfstringstring" />
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="Scheduling" nillable="true" type="tns:Schedule" />
    <xs:element minOccurs="0" name="Status" nillable="true" type="tns:AdExtensionStatus" />
    <xs:element minOccurs="0" name="Type" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Version" nillable="true" type="xs:int" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [AdExtension](adextension.md) object has the following elements: [DevicePreference](#devicepreference), [ForwardCompatibilityMap](#forwardcompatibilitymap), [Id](#id), [Scheduling](#scheduling), [Status](#status), [Type](#type), [Version](#version).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="devicepreference"></a>DevicePreference|This element determines whether the preference is for the ad extension to be displayed on mobile devices or all devices.<br/><br/>To specify a preference for mobile devices, set this element to *30001*.<br/><br/>To specify all devices, set this element to *0* (zero) or leave the element nil. By default, this element will be nil.<br/><br/>This element is only applicable for the [AppAdExtension](appadextension.md) and [SitelinkAdExtension](sitelinkadextension.md) types.|**long**|
|<a name="forwardcompatibilitymap"></a>ForwardCompatibilityMap|The list of key and value strings for forward compatibility to avoid otherwise breaking changes when new elements are added in the current API version.<br/><br/>Forward compatibility changes will be noted here in future releases. There are currently no forward compatibility changes for this object.|[KeyValuePairOfstringstring](keyvaluepairofstringstring.md) array|
|<a name="id"></a>Id|The unique Microsoft Advertising identifier of the ad extension.|**long**|
|<a name="scheduling"></a>Scheduling|Determines the calendar day and time ranges when the ad extension is eligible to be shown in ads.|[Schedule](schedule.md)|
|<a name="status"></a>Status|The status of the ad extension. The value will always be *Active* because the Campaign Management service does not return deleted ad extensions.|[AdExtensionStatus](adextensionstatus.md)|
|<a name="type"></a>Type|The type of ad extension. <br/><br/>For more information, see [Remarks](#remarks).|**string**|
|<a name="version"></a>Version|Tracks the number of times the ad extension has been updated.<br/><br/>The version is set to *1* when the ad extension is created, and increments by one after each update.|**int**|

## <a name="remarks"></a>Remarks
If you generate the SOAP manually, use the *type* attribute of the `<AdExtension>` node as shown in the following example to specify the type of ad extension.

```xml
<AdExtension i:type="ReviewAdExtension" xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
    <Id i:nil="true" />
    <Status i:nil="true" />
      . . .
</AdExtension>
```

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AddAdExtensions](addadextensions.md)  
[AdExtensionAssociation](adextensionassociation.md)  
[GetAdExtensionsByIds](getadextensionsbyids.md)  
[UpdateAdExtensions](updateadextensions.md)  
