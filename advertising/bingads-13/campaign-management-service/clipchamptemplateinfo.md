---
title: ClipchampTemplateInfo Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the clip champ template info data object.
---
# ClipchampTemplateInfo Data Object - Campaign Management
Defines the clip champ template info data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="ClipchampTemplateInfo" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AspectRatio" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Duration" type="xs:int" />
    <xs:element minOccurs="0" name="NumberOfImages" type="xs:int" />
    <xs:element minOccurs="0" name="NumberOfLogos" type="xs:int" />
    <xs:element minOccurs="0" name="NumberOfText" type="xs:int" />
    <xs:element minOccurs="0" name="TemplateDescription" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="TemplateId" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="TemplateName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="TemplatePreviewUrl" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="TemplateThumbnailUrl" nillable="true" type="xs:string" />
    <xs:element xmlns:q182="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="Themes" nillable="true" type="q182:ArrayOfstring" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AspectRatio": "ValueHere",
  "Duration": IntValueHere,
  "NumberOfImages": IntValueHere,
  "NumberOfLogos": IntValueHere,
  "NumberOfText": IntValueHere,
  "TemplateDescription": "ValueHere",
  "TemplateId": "ValueHere",
  "TemplateName": "ValueHere",
  "TemplatePreviewUrl": "ValueHere",
  "TemplateThumbnailUrl": "ValueHere",
  "Themes": [
    "ValueHere"
  ]
}
```

-----

## <a name="elements"></a>Elements

The [ClipchampTemplateInfo](clipchamptemplateinfo.md) object has the following elements: [AspectRatio](#aspectratio), [Duration](#duration), [NumberOfImages](#numberofimages), [NumberOfLogos](#numberoflogos), [NumberOfText](#numberoftext), [TemplateDescription](#templatedescription), [TemplateId](#templateid), [TemplateName](#templatename), [TemplatePreviewUrl](#templatepreviewurl), [TemplateThumbnailUrl](#templatethumbnailurl), [Themes](#themes).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="aspectratio"></a>AspectRatio|Reserved.|**string**|
|<a name="duration"></a>Duration|Reserved.|**int**|
|<a name="numberofimages"></a>NumberOfImages|Reserved.|**int**|
|<a name="numberoflogos"></a>NumberOfLogos|Reserved.|**int**|
|<a name="numberoftext"></a>NumberOfText|Reserved.|**int**|
|<a name="templatedescription"></a>TemplateDescription|Reserved.|**string**|
|<a name="templateid"></a>TemplateId|Reserved.|**string**|
|<a name="templatename"></a>TemplateName|Reserved.|**string**|
|<a name="templatepreviewurl"></a>TemplatePreviewUrl|Reserved.|**string**|
|<a name="templatethumbnailurl"></a>TemplateThumbnailUrl|Reserved.|**string**|
|<a name="themes"></a>Themes|Reserved.|**string** array|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetClipchampTemplates](getclipchamptemplates.md)  
