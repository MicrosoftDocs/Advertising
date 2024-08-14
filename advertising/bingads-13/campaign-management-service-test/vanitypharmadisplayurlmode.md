---
title: VanityPharmaDisplayUrlMode Value Set Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a value set for VanityPharmaDisplayUrlMode.(test)
---
# VanityPharmaDisplayUrlMode Value Set Test - Campaign Management
Reserved.

## Syntax
```xml
<xs:simpleType name="VanityPharmaDisplayUrlMode" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="ManufacturerWebsiteUrl">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="WebsiteDescription">
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

The [VanityPharmaDisplayUrlMode](vanitypharmadisplayurlmode.md) value set has the following values: [ManufacturerWebsiteUrl](#manufacturerwebsiteurl), [WebsiteDescription](#websitedescription).

|Value|Description|
|-----------|---------------|
|<a name="manufacturerwebsiteurl"></a>ManufacturerWebsiteUrl|Reserved.|
|<a name="websitedescription"></a>WebsiteDescription|Reserved.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[VanityPharmaSetting](vanitypharmasetting.md)  
