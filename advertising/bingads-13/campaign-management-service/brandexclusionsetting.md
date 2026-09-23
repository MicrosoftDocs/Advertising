---
title: BrandExclusionSetting Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a setting that controls whether product ads are excluded.
---
# BrandExclusionSetting Data Object - Campaign Management
Defines a setting that controls whether product ads are excluded.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="BrandExclusionSetting" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Setting">
      <xs:sequence>
        <xs:element minOccurs="0" name="ProductAdsOptOut" nillable="true" type="xs:boolean" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "BrandExclusionSetting",
  "ProductAdsOptOut": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [BrandExclusionSetting](brandexclusionsetting.md) object has the following elements: [ProductAdsOptOut](#productadsoptout).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="productadsoptout"></a>ProductAdsOptOut|Determines whether product ads are excluded.<br/><br/>**Add:** Optional<br/>**Update:** Optional|**boolean**|

The [BrandExclusionSetting](brandexclusionsetting.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementssetting"></a>Inherited Elements from Setting
The [BrandExclusionSetting](brandexclusionsetting.md) object derives from the [Setting](setting.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [BrandExclusionSetting](brandexclusionsetting.md), and might not apply to other objects that inherit the same elements from the [Setting](setting.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of setting. This value is *BrandExclusionSetting* when you retrieve a brand exclusion setting.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  
