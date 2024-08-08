---
title: AssetGroupAdditionalField Value Set Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Reserved.(test)
---
# AssetGroupAdditionalField Value Set Test - Campaign Management
Reserved.

## Syntax
```xml
<xs:simpleType name="AssetGroupAdditionalField" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="AssetGroupSearchThemes" />
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AssetGroupAdditionalField](assetgroupadditionalfield.md) value set has the following values: [AssetGroupSearchThemes](#assetgroupsearchthemes).

|Value|Description|
|-----------|---------------|
|<a name="assetgroupsearchthemes"></a>AssetGroupSearchThemes|Reserved.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetAssetGroupsByCampaignId](getassetgroupsbycampaignid.md)  
[GetAssetGroupsByIds](getassetgroupsbyids.md)  
