---
title: CampaignConversionGoal Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description:  Defines the base object of a campaign conversion goal..
---
# CampaignConversionGoal Data Object - Campaign Management

Defines the base object of a campaign conversion goal.

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
