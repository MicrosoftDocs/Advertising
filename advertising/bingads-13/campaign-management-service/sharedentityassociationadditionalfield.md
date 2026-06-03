---
title: SharedEntityAssociationAdditionalField Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the shared entity association additional field value set.
---
# SharedEntityAssociationAdditionalField Value Set - Campaign Management
Defines the shared entity association additional field value set.

## Syntax
```xml
<xs:simpleType name="SharedEntityAssociationAdditionalField" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="BrandListFields" />
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [SharedEntityAssociationAdditionalField](sharedentityassociationadditionalfield.md) value set has the following values: [BrandListFields](#brandlistfields).

|Value|Description|
|-----------|---------------|
|<a name="brandlistfields"></a>BrandListFields|Reserved.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetSharedEntityAssociationsByEntityIds](getsharedentityassociationsbyentityids.md)  
[GetSharedEntityAssociationsBySharedEntityIds](getsharedentityassociationsbysharedentityids.md)  
