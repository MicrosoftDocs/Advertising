---
title: BrandKitAdditionalField Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the brand kit additional field value set.
---
# BrandKitAdditionalField Value Set - Campaign Management
Defines the brand kit additional field value set.

## Syntax
```xml
<xs:simpleType name="BrandKitAdditionalField" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="BusinessName" />
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [BrandKitAdditionalField](brandkitadditionalfield.md) value set has the following values: [BusinessName](#businessname).

|Value|Description|
|-----------|---------------|
|<a name="businessname"></a>BusinessName|The name of the business.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetBrandKitsByAccountId](getbrandkitsbyaccountid.md)  
[GetBrandKitsByIds](getbrandkitsbyids.md)  
