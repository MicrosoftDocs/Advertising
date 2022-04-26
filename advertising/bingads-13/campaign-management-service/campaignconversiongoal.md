---
title: CampaignConversionGoal Data Object - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Reserved.
---
# CampaignConversionGoal Data Object - Campaign Management
<<<<<<< HEAD
Reserved.
=======

Defines the base object of a campaign conversion goal.

>>>>>>> 9d199a9 (campaign conversion goals)

## Syntax
```xml
<xs:complexType name="CampaignConversionGoal" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element name="CampaignId" type="xs:long" />
    <xs:element name="GoalId" type="xs:long" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [CampaignConversionGoal](campaignconversiongoal.md) object has the following elements: [CampaignId](#campaignid), [GoalId](#goalid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="campaignid"></a>CampaignId|Reserved.|**long**|
|<a name="goalid"></a>GoalId|Reserved.|**long**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AddCampaignConversionGoals](addcampaignconversiongoals.md)  
[DeleteCampaignConversionGoals](deletecampaignconversiongoals.md)  
