---
title: CriterionAdditionalField Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a list of optional criterion properties that you can request when calling GetAdGroupCriterionsByIds and GetCampaignCriterionsByIds.
---
# CriterionAdditionalField Value Set - Campaign Management
Defines a list of optional criterion properties that you can request when calling [GetAdGroupCriterionsByIds](getadgroupcriterionsbyids.md) and [GetCampaignCriterionsByIds](getcampaigncriterionsbyids.md). The additional field values enable you to get the latest features using the current version of Campaign Management API, and in the next version the corresponding properties will be included in the conversion goal by default.

## Syntax
```xml
<xs:simpleType name="CriterionAdditionalField" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="CriterionCashback" />
        <xs:enumeration value="Operator" />
        <xs:enumeration value="Placement" />
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [CriterionAdditionalField](criterionadditionalfield.md) value set has the following values: [CriterionCashback](#criterioncashback), [Operator](#operator), [Placement](#placement).

|Value|Description|
|-----------|---------------|
|<a name="criterioncashback"></a>CriterionCashback|Request that the ```CriterionCashback``` element be included within each returned [BiddableAdGroupCriterion](biddableadgroupcriterion.md) or [BiddableCampaignCriterion](biddablecampaigncriterion.md) object.|
|<a name="operator"></a>Operator|Defines the relationship between the field and the value.|
|<a name="placement"></a>Placement|Reserved.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetAdGroupCriterionsByIds](getadgroupcriterionsbyids.md)  
[GetCampaignCriterionsByIds](getcampaigncriterionsbyids.md)  
