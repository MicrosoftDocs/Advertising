---
title: BudgetOpportunity Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines an object that contains the suggested budget with estimated clicks and impressions opportunities.
---
# BudgetOpportunity Data Object - Ad Insight
Defines an object that contains the suggested budget with estimated clicks and impressions opportunities. Additionally, the object contains a list of budget points with weekly impressions, clicks and cost estimates for the given budget amount.

> [!NOTE]
> The budget opportunity is an estimate based on the last 15 days of performance data, and not a prediction or guarantee of future performance.

# [XML](#tab/xml)

```xml
<xs:complexType name="BudgetOpportunity" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Opportunity">
      <xs:sequence>
        <xs:element minOccurs="0" name="BudgetPoints" nillable="true" type="tns:ArrayOfBudgetPoint" />
        <xs:element minOccurs="0" name="BudgetType" type="tns:BudgetLimitType" />
        <xs:element minOccurs="0" name="CampaignId" type="xs:long" />
        <xs:element minOccurs="0" name="CurrentBudget" type="xs:double" />
        <xs:element minOccurs="0" name="IncreaseInClicks" type="xs:double" />
        <xs:element minOccurs="0" name="IncreaseInImpressions" type="xs:long" />
        <xs:element minOccurs="0" name="PercentageIncreaseInClicks" type="xs:int" />
        <xs:element minOccurs="0" name="PercentageIncreaseInImpressions" type="xs:int" />
        <xs:element minOccurs="0" name="RecommendedBudget" type="xs:double" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "OpportunityKey": "ValueHere",
  "Type": "BudgetOpportunity",
  "BudgetPoints": [
    {
      "BudgetAmount": DoubleValueHere,
      "BudgetPointType": "ValueHere",
      "EstimatedWeeklyClicks": DoubleValueHere,
      "EstimatedWeeklyCost": DoubleValueHere,
      "EstimatedWeeklyImpressions": DoubleValueHere
    }
  ],
  "BudgetType": "ValueHere",
  "CampaignId": "LongValueHere",
  "CurrentBudget": DoubleValueHere,
  "IncreaseInClicks": DoubleValueHere,
  "IncreaseInImpressions": "LongValueHere",
  "PercentageIncreaseInClicks": IntValueHere,
  "PercentageIncreaseInImpressions": IntValueHere,
  "RecommendedBudget": DoubleValueHere
}
```

-----

## <a name="elements"></a>Elements

The [BudgetOpportunity](budgetopportunity.md) object has the following elements: [BudgetPoints](#budgetpoints), [BudgetType](#budgettype), [CampaignId](#campaignid), [CurrentBudget](#currentbudget), [IncreaseInClicks](#increaseinclicks), [IncreaseInImpressions](#increaseinimpressions), [PercentageIncreaseInClicks](#percentageincreaseinclicks), [PercentageIncreaseInImpressions](#percentageincreaseinimpressions), [RecommendedBudget](#recommendedbudget).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="budgetpoints"></a>BudgetPoints|The list of budget points with weekly impressions, clicks and cost estimates for the given budget amount.|[BudgetPoint](budgetpoint.md) array|
|<a name="budgettype"></a>BudgetType|The type of budget that the campaign uses.|[BudgetLimitType](budgetlimittype.md)|
|<a name="campaignid"></a>CampaignId|The identifier of the campaign to which the suggested budget applies.|**long**|
|<a name="currentbudget"></a>CurrentBudget|The campaign's current budget.|**double**|
|<a name="increaseinclicks"></a>IncreaseInClicks|The estimated clicks opportunities corresponding to the suggested budget.|**double**|
|<a name="increaseinimpressions"></a>IncreaseInImpressions|The estimated impressions opportunities corresponding to the suggested budget.|**long**|
|<a name="percentageincreaseinclicks"></a>PercentageIncreaseInClicks|The estimated percentage increase in clicks corresponding to the suggested budget.|**int**|
|<a name="percentageincreaseinimpressions"></a>PercentageIncreaseInImpressions|The estimated percentage increase in impressions corresponding to the suggested budget.|**int**|
|<a name="recommendedbudget"></a>RecommendedBudget|The suggested budget based on the last 15 days of performance history for the corresponding campaign.|**double**|

The [BudgetOpportunity](budgetopportunity.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsopportunity"></a>Inherited Elements from Opportunity
The [BudgetOpportunity](budgetopportunity.md) object derives from the [Opportunity](opportunity.md) object, and inherits the following elements: [OpportunityKey](#opportunitykey). The descriptions below are specific to [BudgetOpportunity](budgetopportunity.md), and might not apply to other objects that inherit the same elements from the [Opportunity](opportunity.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="opportunitykey"></a>OpportunityKey|An identifier that uniquely identifies the opportunity.|**string**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetBudgetOpportunities](getbudgetopportunities.md)  
