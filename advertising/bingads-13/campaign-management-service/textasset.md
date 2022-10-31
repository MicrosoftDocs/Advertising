---
title: TextAsset Data Object - Campaign Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: A text asset with a unique Microsoft Advertising identifier that can be reused across multiple ads.
ms.subservice: campaign-management-api
---
# TextAsset Data Object - Campaign Management
A text asset with a unique Microsoft Advertising identifier that can be reused across multiple ads. For example, see responsive search ad [Descriptions](responsivesearchad.md#descriptions) and [Headlines](responsivesearchad.md#headlines).

> [!NOTE]
> Not everyone has this feature yet. If you don't, don't worry. It's coming soon. 

## Syntax
```xml
<xs:complexType name="TextAsset" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Asset">
      <xs:sequence>
        <xs:element minOccurs="0" name="Text" nillable="true" type="xs:string" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [TextAsset](textasset.md) object has the following elements: [Text](#text).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="text"></a>Text|The meaning and business rules for the text asset vary depending on where it is used. For example, see responsive search ad [Descriptions](responsivesearchad.md#descriptions) and [Headlines](responsivesearchad.md#headlines).<br/><br/>**Add:** Required<br/>**Update:** Required|**string**|

The [TextAsset](textasset.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsasset"></a>Inherited Elements from Asset
The [TextAsset](textasset.md) object derives from the [Asset](asset.md) object, and inherits the following elements: [Id](#id), [Name](#name), [Type](#type). The descriptions below are specific to [TextAsset](textasset.md), and might not apply to other objects that inherit the same elements from the [Asset](asset.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="id"></a>Id|The unique Microsoft Advertising identifier for the asset in a Microsoft Advertising account.<br/><br/>The same asset can be used by multiple ads. For example if *Seemless Integration* is a text asset, it will have the same asset identifier across all ads in the same Microsoft Advertising account. After you link a text asset to an ad and then retrieve the ad e.g., via [GetAdsByIds](getadsbyids.md), the response will include the asset identifier e.g., `""id:""123`, whether the asset is new or already existed in the account's asset library. <br/><br/>**Add:** Read-only. Even if the asset already exists and you specify an invalid identifier, this value will be ignored.<br/>**Update:** Read-only. Even if the asset already exists and you specify an invalid identifier, this value will be ignored.|**long**|
|<a name="name"></a>Name|Reserved for future use.|**string**|
|<a name="type"></a>Type|The type of the asset. This value is *TextAsset* when you retrieve a text asset. For more information about asset types, see the [Asset Data Object Remarks](asset.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

