---
title: ImageAsset Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Applies crop settings to stored image media for a specific aspect ratio.
---
# ImageAsset Data Object - Campaign Management
Applies crop settings to stored image media for a specific aspect ratio. 

> [!NOTE]
> Not everyone has this feature yet. If you don't, don't worry. It's coming soon. 

If you do not specify crop settings, the service will automatically crop up to the maximum possible area from the center of the image. For example, given a 1000x1000 pixel [image](image.md), for the 1.91:1 aspect ratio, the auto crop setting will be [CropWidth](#cropwidth)=1000, [CropHeight](#cropheight)=524, [CropX](#cropx)=0, and [CropY](#cropy)=238. 

## Syntax
```xml
<xs:complexType name="ImageAsset" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Asset">
      <xs:sequence>
        <xs:element minOccurs="0" name="CropHeight" nillable="true" type="xs:int" />
        <xs:element minOccurs="0" name="CropWidth" nillable="true" type="xs:int" />
        <xs:element minOccurs="0" name="CropX" nillable="true" type="xs:int" />
        <xs:element minOccurs="0" name="CropY" nillable="true" type="xs:int" />
        <xs:element minOccurs="0" name="SubType" nillable="true" type="xs:string" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [ImageAsset](imageasset.md) object has the following elements: [CropHeight](#cropheight), [CropWidth](#cropwidth), [CropX](#cropx), [CropY](#cropy), [SubType](#subtype).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="cropheight"></a>CropHeight|The number of pixels to use from the image asset source, starting from the CropY position and moving upwards.<br/><br/>**Add:** Optional. If you do not set this element, the service will automatically crop according to the aspect ratio of the [SubType](#subtype).<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**int**|
|<a name="cropwidth"></a>CropWidth|The number of pixels to use from the image asset source, starting from the CropX position and moving to the right.<br/><br/>**Add:** Optional. If you do not set this element, the service will automatically crop according to the aspect ratio of the [SubType](#subtype).<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**int**|
|<a name="cropx"></a>CropX|Starting from the lower left corner of image asset source, this is the number of pixels to skip to the right on the x-axis before applying the CropWidth.<br/><br/>**Add:** Optional. If you do not set this element, the service will automatically crop according to the aspect ratio of the [SubType](#subtype).<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**int**|
|<a name="cropy"></a>CropY|Starting from the lower left corner of image asset source, this is the number of pixels to skip upwards on the y-axis before applying the CropHeight.<br/><br/>**Add:** Optional. If you do not set this element, the service will automatically crop according to the aspect ratio of the [SubType](#subtype).<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**int**|
|<a name="subtype"></a>SubType|Represents the aspect ratio for this image asset.<br/><br/>The aspect ratio for the sub type must match the effective image asset dimensions. If [CropHeight](#cropheight) and [CropWidth](#cropwidth) are not used then the aspect ratio for the sub type must match the aspect ratio of the stored image media. If [CropHeight](#cropheight) and [CropWidth](#cropwidth) are used then the true aspect ratio of the media that is stored in the account level media library can differ, so long as [CropHeight](#cropheight) and [CropWidth](#cropwidth) result in the correct aspect ratio. In either case the true aspect ratio of the media that is stored in the account level media library will remain unchanged.<br/><br/>The possible sub type values include LandscapeImageMedia, SquareImageMedia, LandscapeLogoMedia, SquareLogoMedia, ImageMedia169X100, ImageMedia93X100, ImageMedia15X10, ImageMedia155X100, ImageMedia133X100, ImageMedia178X100, ImageMedia1X2, and ImageMedia4X1. For more details see [ResponsiveAd Remarks](responsivead.md#remarks).<br/><br/>New sub types might be added in the future, so you should not take any dependency on a fixed set of values.<br/><br/>**Add:** Required<br/>**Update:** Read-only. You cannot update the sub type during update.|**string**|

The [ImageAsset](imageasset.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsasset"></a>Inherited Elements from Asset
The [ImageAsset](imageasset.md) object derives from the [Asset](asset.md) object, and inherits the following elements: [Id](#id), [Name](#name), [Type](#type). The descriptions below are specific to [ImageAsset](imageasset.md), and might not apply to other objects that inherit the same elements from the [Asset](asset.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="id"></a>Id|The unique Microsoft Advertising identifier for the asset in a Microsoft Advertising account.<br/><br/>The same image asset identifier can be used multiple times in the same ad for different aspect ratios, and can also be used by multiple ads in the same Microsoft Advertising account. The identifier of image asset with [SubType](#subtype) set to LandscapeImageMedia is used for all auto-generated image asset sub types within the same ad. Whether or not you let Microsoft Advertising automatically generate the cropped images, the [Id](imageasset.md#id) does not need to be unique among the image assets linked to the same ad.<br/><br/>You can create media for responsive ads via the [AddMedia](addmedia.md) service operation. Then you can use the returned media identifier as the image asset ID. The aspect ratio of the image that you added must be supported for the image asset [SubType](#subtype).<br/><br/>**Add:** Required<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**long**|
|<a name="name"></a>Name|Reserved for future use.<br/><br/>**Add:** Optional<br/>**Update:** Optional. If no value is set for the update, this setting is not changed.|**string**|
|<a name="type"></a>Type|The type of the asset. This value is *ImageAsset* when you retrieve an image asset. For more information about asset types, see the [Asset Data Object Remarks](asset.md#remarks).<br/><br/>**Add:** Read-only<br/>**Update:** Read-only|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[VideoAsset](videoasset.md)  
