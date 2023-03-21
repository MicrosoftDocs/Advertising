---
title: AdType Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the type of ad.
---
# AdType Value Set - Campaign Management
Defines the type of ad.

## Syntax
```xml
<xs:simpleType name="AdType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Text" />
    <xs:enumeration value="Image" />
    <xs:enumeration value="Product" />
    <xs:enumeration value="AppInstall" />
    <xs:enumeration value="ExpandedText" />
    <xs:enumeration value="DynamicSearch" />
    <xs:enumeration value="ResponsiveAd" />
    <xs:enumeration value="ResponsiveSearch" />
    <xs:enumeration value="Hotel" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AdType](adtype.md) value set has the following values: [AppInstall](#appinstall), [DynamicSearch](#dynamicsearch), [ExpandedText](#expandedtext), [Hotel](#hotel), [Image](#image), [Product](#product), [ResponsiveAd](#responsivead), [ResponsiveSearch](#responsivesearch), [Text](#text).

|Value|Description|
|-----------|---------------|
|<a name="appinstall"></a>AppInstall|Refers to an [AppInstallAd](appinstallad.md).|
|<a name="dynamicsearch"></a>DynamicSearch|Refers to a [DynamicSearchAd](dynamicsearchad.md).|
|<a name="expandedtext"></a>ExpandedText|Refers to an [ExpandedTextAd](expandedtextad.md).|
|<a name="hotel"></a>Hotel|Refers to a [HotelAd](hotelad.md).|
|<a name="image"></a>Image|Reserved for future use.|
|<a name="product"></a>Product|Refers to a [ProductAd](productad.md).|
|<a name="responsivead"></a>ResponsiveAd|Refers to a [ResponsiveAd](responsivead.md).|
|<a name="responsivesearch"></a>ResponsiveSearch|Refers to a [ResponsiveSearchAd](responsivesearchad.md).|
|<a name="text"></a>Text|Refers to a [TextAd](textad.md).|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[Ad](ad.md)  
[GetAdsByAdGroupId](getadsbyadgroupid.md)  
[GetAdsByEditorialStatus](getadsbyeditorialstatus.md)  
[GetAdsByIds](getadsbyids.md)  
