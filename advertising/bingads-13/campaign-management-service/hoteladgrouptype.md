---
title: HotelAdGroupType Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: The ad group type for hotel campaigns.
---
# HotelAdGroupType Value Set - Campaign Management
The ad group type for hotel campaigns.

## Syntax
```xml
<xs:simpleType name="HotelAdGroupType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="HotelAd" />
        <xs:enumeration value="PropertyAd" />
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [HotelAdGroupType](hoteladgrouptype.md) value set has the following values: [HotelAd](#hotelad), [PropertyAd](#propertyad).

|Value|Description|
|-----------|---------------|
|<a name="hotelad"></a>HotelAd|The default ad group type for hotel campaigns.|
|<a name="propertyad"></a>PropertyAd|The ad group type for promoted hotel ad groups.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[HotelSetting](hotelsetting.md)  
