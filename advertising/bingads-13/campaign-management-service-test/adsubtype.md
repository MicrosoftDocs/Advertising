---
title: AdSubType Value Set Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the type of ad.(test)
---
# AdSubType Value Set Test - Campaign Management
Reserved.

## Syntax
```xml
<xs:simpleType name="AdSubType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="Video" />
        <xs:enumeration value="Display" />
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AdSubType](adsubtype.md) value set has the following values: [Display](#display), [Video](#video).

|Value|Description|
|-----------|---------------|
|<a name="display"></a>Display|Reserved.|
|<a name="video"></a>Video|Reserved.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[ResponsiveAd](responsivead.md)  
