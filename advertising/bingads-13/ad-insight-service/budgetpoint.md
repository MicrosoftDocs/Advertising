---
title: BudgetPoint Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines an object that contains a budget amount and an estimate of weekly impressions, clicks, and cost for this budget amount.
---
# BudgetPoint Data Object - Ad Insight
Defines an object that contains a budget amount and an estimate of weekly impressions, clicks, and cost for this budget amount.

> [!NOTE]
> The budget point is an estimate based on the last 15 days of performance data, and not a prediction or guarantee of future performance.

## Syntax
```xml
<xs:complexType name="BudgetPoint" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="BudgetAmount" type="xs:double" />
    <xs:element minOccurs="0" name="BudgetPointType" type="tns:BudgetPointType" />
    <xs:element minOccurs="0" name="EstimatedWeeklyClicks" type="xs:double" />
    <xs:element minOccurs="0" name="EstimatedWeeklyCost" type="xs:double" />
    <xs:element minOccurs="0" name="EstimatedWeeklyImpressions" type="xs:double" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [BudgetPoint](budgetpoint.md) object has the following elements: [BudgetAmount](#budgetamount), [BudgetPointType](#budgetpointtype), [EstimatedWeeklyClicks](#estimatedweeklyclicks), [EstimatedWeeklyCost](#estimatedweeklycost), [EstimatedWeeklyImpressions](#estimatedweeklyimpressions).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="budgetamount"></a>BudgetAmount|A potential new budget.<br/><br/>This budget amount is your current campaign budget if the *BudgetPointType* value is *Current*.|**double**|
|<a name="budgetpointtype"></a>BudgetPointType|The type of budget relative to a list of budget points. For example, if the budget point type is *Current* then this object's *BudgetAmount* element would be equal to the corresponding campaign's daily budget.|[BudgetPointType](budgetpointtype.md)|
|<a name="estimatedweeklyclicks"></a>EstimatedWeeklyClicks|The estimated weekly  clicks for the given budget amount.|**double**|
|<a name="estimatedweeklycost"></a>EstimatedWeeklyCost|The estimated weekly cost for the given budget amount.|**double**|
|<a name="estimatedweeklyimpressions"></a>EstimatedWeeklyImpressions|The estimated weekly impressions for the given budget amount.|**double**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[BudgetOpportunity](budgetopportunity.md)  
