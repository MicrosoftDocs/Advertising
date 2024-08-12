---
title: DynamicSearchAdsSource Value Set Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the possible targeting source values for dynamic search ads campaigns.(test)
---
# DynamicSearchAdsSource Value Set Test - Campaign Management
Defines the possible targeting source values for dynamic search ads campaigns.

## Syntax
```xml
<xs:simpleType name="DynamicSearchAdsSource" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="All" />
    <xs:enumeration value="SystemIndex" />
    <xs:enumeration value="AdvertiserSuppliedUrls" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [DynamicSearchAdsSource](dynamicsearchadssource.md) value set has the following values: [AdvertiserSuppliedUrls](#advertisersuppliedurls), [All](#all), [SystemIndex](#systemindex).

|Value|Description|
|-----------|---------------|
|<a name="advertisersuppliedurls"></a>AdvertiserSuppliedUrls|Use URLs from my page feed only. Only URLs specified in the feed file will be served from this campaign. Please note that if you choose this option and [page feeds IDs](dynamicsearchadssetting.md#pagefeedids) are not set, then the campaign will not serve dynamic search ads. We recommend using this option for highly specific campaigns with tailored ad copy.|
|<a name="all"></a>All|Use URLs from both Bing's index of my website and my page feed. Pages from both sources will be used but URLs within the feed file will be given priority.|
|<a name="systemindex"></a>SystemIndex|Use Bing's index of my website. This is the default behavior of dynamic search ad campaigns on Bing.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[DynamicSearchAdsSetting](dynamicsearchadssetting.md)  
