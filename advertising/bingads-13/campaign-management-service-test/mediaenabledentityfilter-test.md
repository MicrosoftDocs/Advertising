---
title: MediaEnabledEntityFilter Value Set Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the possible values representing entities that are enabled for media such as images.(test)
---
# MediaEnabledEntityFilter Value Set Test - Campaign Management
Defines the possible values representing entities that are enabled for media such as images.

## Syntax
```xml
<xs:simpleType name="MediaEnabledEntityFilter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="ImageAdExtension" />
        <xs:enumeration value="ResponsiveAd" />
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [MediaEnabledEntityFilter](mediaenabledentityfilter.md) value set has the following values: [ImageAdExtension](#imageadextension), [ResponsiveAd](#responsivead).

|Value|Description|
|-----------|---------------|
|<a name="imageadextension"></a>ImageAdExtension|The media enabled entity is an [ImageAdExtension](imageadextension.md).|
|<a name="responsivead"></a>ResponsiveAd|The media enabled entity is an [ResponsiveAd](responsivead.md).|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetMediaAssociations](getmediaassociations.md)  
[GetMediaMetaDataByAccountId](getmediametadatabyaccountid.md)  
[MediaAssociation](mediaassociation.md)  
