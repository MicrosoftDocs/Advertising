---
title: FontTextAssetType Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: A value set for the font text asset type.
---
# FontTextAssetType Value Set - Campaign Management
A value set for the font text asset type.

## Syntax
```xml
<xs:simpleType name="FontTextAssetType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="ShortHeadline" />
    <xs:enumeration value="LongHeadline" />
    <xs:enumeration value="Description" />
    <xs:enumeration value="CallToAction" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [FontTextAssetType](fonttextassettype.md) value set has the following values: [CallToAction](#calltoaction), [Description](#description), [LongHeadline](#longheadline), [ShortHeadline](#shortheadline).

|Value|Description|
|-----------|---------------|
|<a name="calltoaction"></a>CallToAction|The font text asset type is a call to action.|
|<a name="description"></a>Description|The font text asset type is a description.|
|<a name="longheadline"></a>LongHeadline|The font text asset type is a long headline.|
|<a name="shortheadline"></a>ShortHeadline|The font text asset type is a short headline..|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[BrandKitFont](brandkitfont.md)  
