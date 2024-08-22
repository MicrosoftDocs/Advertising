---
title: CampaignConversionGoal Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the base object of a campaign conversion goal.(test)
---
# CampaignConversionGoal Data Object Test - Campaign Management
Defines the base object of a campaign conversion goal.

# [XML](#tab/xml)

```xml
<xs:complexType name="CampaignConversionGoal" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element name="CampaignId" type="xs:long" />
    <xs:element name="GoalId" type="xs:long" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "CampaignId": "LongValueHere",
  "GoalId": "LongValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [CampaignConversionGoal](campaignconversiongoal.md) object has the following elements: [CampaignId](#campaignid), [GoalId](#goalid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="campaignid"></a>CampaignId|The Microsoft Advertising assigned identifier of a campaign.|**long**|
|<a name="goalid"></a>GoalId|The Microsoft Advertising assigned identifier of a conversion goal.|**long**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AddCampaignConversionGoals](addcampaignconversiongoals.md)  
[DeleteCampaignConversionGoals](deletecampaignconversiongoals.md)  
