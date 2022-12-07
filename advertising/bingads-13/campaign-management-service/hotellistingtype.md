---
title: HotelListingType Value Set - Campaign Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the type of hotel listing.
ms.subservice: campaign-management-api
---
# HotelListingType Value Set - Campaign Management
Defines the type of hotel listing.

## Syntax
```xml
<xs:simpleType name="HotelListingType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Subdivision">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Unit">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [HotelListingType](hotellistingtype.md) value set has the following values: [Subdivision](#subdivision), [Unit](#unit).

|Value|Description|
|-----------|---------------|
|<a name="subdivision"></a>Subdivision|Reserved.|
|<a name="unit"></a>Unit|Reserved.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[HotelGroup](hotelgroup.md)  
