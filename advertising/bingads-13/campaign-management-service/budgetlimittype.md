---
title: BudgetLimitType Value Set - Campaign Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the possible budget limit types that you can specify for a campaign.
ms.subservice: campaign-management-api
---
# BudgetLimitType Value Set - Campaign Management
Defines the possible budget limit types that you can specify for a campaign.

## Syntax
```xml
<xs:simpleType name="BudgetLimitType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="DailyBudgetAccelerated" />
    <xs:enumeration value="DailyBudgetStandard" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [BudgetLimitType](budgetlimittype.md) value set has the following values: [DailyBudgetAccelerated](#dailybudgetaccelerated), [DailyBudgetStandard](#dailybudgetstandard).

|Value|Description|
|-----------|---------------|
|<a name="dailybudgetaccelerated"></a>DailyBudgetAccelerated|A daily budget that is spent until it is depleted. Depending on the activity, the complete budget could be spent within a couple of minutes, hours, or not at all.<br/><br/>The daily spend will not exceed the daily budget limit and the accumulated daily spend will not exceed the calculated monthly budget limit.<br/><br/>This budget type is only available for Audience campaigns that use unshared campaign-level budgets.|
|<a name="dailybudgetstandard"></a>DailyBudgetStandard|A daily budget that is spread throughout the day.<br/><br/>The daily spend can exceed the daily budget limit by up to 20%; however, the accumulated daily spend will not exceed the calculated monthly budget limit.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[Budget](budget.md)  
[Campaign](campaign.md)  
