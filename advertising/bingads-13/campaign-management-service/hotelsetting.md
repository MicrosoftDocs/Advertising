---
title: HotelSetting Data Object - Campaign Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines which ads to target (HPA or PPA).
ms.subservice: campaign-management-api
---
# HotelSetting Data Object - Campaign Management
Defines whether ad group will target Hotel Price Ads (HPA) or Property Price Ads (PPA). If *HotelSetting* is not specified, ad group will target its hotel for both HPA and PPA ads

## Syntax
```xml
<xs:complexType name="HotelSetting" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Setting">
      <xs:sequence>
        <xs:element minOccurs="0" name="HotelAdGroupType" type="tns:HotelAdGroupType" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [HotelSetting](hotelsetting.md) object has the following elements: [HotelAdGroupType](#hoteladgrouptype).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="hoteladgrouptype"></a>HotelAdGroupType|The type of ad. Can either by HPA or PPA.|[HotelAdGroupType](hoteladgrouptype.md)|

The [HotelSetting](hotelsetting.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementssetting"></a>Inherited Elements from Setting
The [HotelSetting](hotelsetting.md) object derives from the [Setting](setting.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [HotelSetting](hotelsetting.md), and might not apply to other objects that inherit the same elements from the [Setting](setting.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The type of setting.<br/><br/>For more information, see [Setting Data Object Remarks](setting.md#remarks).|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

