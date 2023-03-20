---
title: CriterionCashback Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the CriterionCashback Data Object.
---
# CriterionCashback Data Object - Campaign Management
Defines the CriterionCashback Data Object.

## Syntax
```xml
<xs:complexType name="CriterionCashback" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Type" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [CriterionCashback](criterioncashback.md) object has the following elements: [Type](#type).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|Reserved.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[BiddableAdGroupCriterion](biddableadgroupcriterion.md)  
[BiddableCampaignCriterion](biddablecampaigncriterion.md)  
