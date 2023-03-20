---
title: PerformanceMaxSetting Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Reserved.
---
# PerformanceMaxSetting Data Object - Campaign Management
Reserved.

## Syntax
```xml
<xs:complexType name="PerformanceMaxSetting" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Setting">
      <xs:sequence>
        <xs:element minOccurs="0" name="FinalUrlExpansionOptOut" type="xs:boolean" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [PerformanceMaxSetting](performancemaxsetting.md) object has the following elements: [FinalUrlExpansionOptOut](#finalurlexpansionoptout).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="finalurlexpansionoptout"></a>FinalUrlExpansionOptOut|Reserved.|**boolean**|

The [PerformanceMaxSetting](performancemaxsetting.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementssetting"></a>Inherited Elements from Setting
The [PerformanceMaxSetting](performancemaxsetting.md) object derives from the [Setting](setting.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [PerformanceMaxSetting](performancemaxsetting.md), and might not apply to other objects that inherit the same elements from the [Setting](setting.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|Reserved.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

