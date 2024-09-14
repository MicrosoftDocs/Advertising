---
title: CampaignBudgetRecommendation Data Object Test - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the CampaignBudgetRecommendation data object.(test)
---
# CampaignBudgetRecommendation Data Object Test - Ad Insight
Defines the CampaignBudgetRecommendation data object.

# [XML](#tab/xml)

```xml
<xs:complexType name="CampaignBudgetRecommendation" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:RecommendationBase">
      <xs:sequence>
        <xs:element minOccurs="0" name="BudgetPoints" nillable="true" type="tns:ArrayOfBudgetPoint" />
        <xs:element minOccurs="0" name="BudgetType" type="tns:BudgetLimitType" />
        <xs:element minOccurs="0" name="CurrentBudget" type="xs:double" />
        <xs:element minOccurs="0" name="RecommendedBudget" type="xs:double" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "AccountId": "LongValueHere",
  "AccountName": "ValueHere",
  "AdGroupId": "LongValueHere",
  "AdGroupName": "ValueHere",
  "CampaignId": "LongValueHere",
  "CampaignName": "ValueHere",
  "CurrentClicks": "LongValueHere",
  "CurrentConversions": "LongValueHere",
  "CurrentCost": DoubleValueHere,
  "CurrentImpressions": "LongValueHere",
  "Dismissed": "ValueHere",
  "EstimatedIncreaseInClicks": "LongValueHere",
  "EstimatedIncreaseInConversions": "LongValueHere",
  "EstimatedIncreaseInCost": DoubleValueHere,
  "EstimatedIncreaseInImpressions": "LongValueHere",
  "RecommendationHash": "ValueHere",
  "RecommendationId": "ValueHere",
  "RecommendationType": "ValueHere",
  "Type": "CampaignBudgetRecommendation",
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
  "CurrentBudget": DoubleValueHere,
  "RecommendedBudget": DoubleValueHere
}
```

-----

## <a name="elements"></a>Elements

The [CampaignBudgetRecommendation](campaignbudgetrecommendation.md) object has the following elements: [BudgetPoints](#budgetpoints), [BudgetType](#budgettype), [CurrentBudget](#currentbudget), [RecommendedBudget](#recommendedbudget).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="budgetpoints"></a>BudgetPoints|The list of budget points with weekly impressions, clicks and cost estimates for the given budget amount. Output only.|[BudgetPoint](budgetpoint.md) array|
|<a name="budgettype"></a>BudgetType|The type of budget that the campaign uses. Output only. |[BudgetLimitType](budgetlimittype.md)|
|<a name="currentbudget"></a>CurrentBudget|The current budget amount. Output only.|**double**|
|<a name="recommendedbudget"></a>RecommendedBudget|The recommended budget amount based on the last 15 days of performance history for the corresponding campaign. Output only.|**double**|

The [CampaignBudgetRecommendation](campaignbudgetrecommendation.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsrecommendationbase"></a>Inherited Elements from RecommendationBase
The [CampaignBudgetRecommendation](campaignbudgetrecommendation.md) object derives from the [RecommendationBase](recommendationbase.md) object, and inherits the following elements: [AccountId](#accountid), [AccountName](#accountname), [AdGroupId](#adgroupid), [AdGroupName](#adgroupname), [CampaignId](#campaignid), [CampaignName](#campaignname), [CurrentClicks](#currentclicks), [CurrentConversions](#currentconversions), [CurrentCost](#currentcost), [CurrentImpressions](#currentimpressions), [Dismissed](#dismissed), [EstimatedIncreaseInClicks](#estimatedincreaseinclicks), [EstimatedIncreaseInConversions](#estimatedincreaseinconversions), [EstimatedIncreaseInCost](#estimatedincreaseincost), [EstimatedIncreaseInImpressions](#estimatedincreaseinimpressions), [RecommendationHash](#recommendationhash), [RecommendationId](#recommendationid), [RecommendationType](#recommendationtype), [Type](#type). The descriptions below are specific to [CampaignBudgetRecommendation](campaignbudgetrecommendation.md), and might not apply to other objects that inherit the same elements from the [RecommendationBase](recommendationbase.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountid"></a>AccountId|The identifier of the account. Output only. |**long**|
|<a name="accountname"></a>AccountName|Reserved.|**string**|
|<a name="adgroupid"></a>AdGroupId|The ad group ID targeted by this recommendation. This will be set only when the recommendation affects a single ad group. Output only.<br/><br/>This field will be set for the following recommendation types: KEYWORD, RESPONSIVE_SEARCH_AD.|**long**|
|<a name="adgroupname"></a>AdGroupName|Reserved.|**string**|
|<a name="campaignid"></a>CampaignId|The campaign ID targeted by this recommendation. Output only.<br/><br/>This field will be set for the following recommendation types: KEYWORD, RESPONSIVE_SEARCH_AD|**long**|
|<a name="campaignname"></a>CampaignName|Reserved.|**string**|
|<a name="currentclicks"></a>CurrentClicks|Actual clicks of the ad group in the past 7 days. Output only. |**long**|
|<a name="currentconversions"></a>CurrentConversions|Actual conversions of the ad group in the past 7 days. Output only. |**long**|
|<a name="currentcost"></a>CurrentCost|Actual spending of the ad group in the past 7 days, in the currency of this account.|**double**|
|<a name="currentimpressions"></a>CurrentImpressions|Actual impressions of the ad group in the past 7 days.|**long**|
|<a name="dismissed"></a>Dismissed|Whether the recommendation is dismissed or not. Output only. |**boolean**|
|<a name="estimatedincreaseinclicks"></a>EstimatedIncreaseInClicks|The estimated click opportunities corresponding to the suggested ad.|**long**|
|<a name="estimatedincreaseinconversions"></a>EstimatedIncreaseInConversions|The estimated impression opportunities corresponding to the suggested ad.|**long**|
|<a name="estimatedincreaseincost"></a>EstimatedIncreaseInCost|The estimated increase in spend corresponding to the suggested ad.|**double**|
|<a name="estimatedincreaseinimpressions"></a>EstimatedIncreaseInImpressions|The estimated impressions opportunities corresponding to the suggested ad.|**long**|
|<a name="recommendationhash"></a>RecommendationHash|The hash of the recommendation.|**string**|
|<a name="recommendationid"></a>RecommendationId|The identifier of the recommendation.|**string**|
|<a name="recommendationtype"></a>RecommendationType|The type of recommendation.<br/><br/>*Note*: We currently support *CAMPAIGN_BUDGET*, *KEYWORD*, and *RESPONSIVE_SEARCH_AD*. *RecommendationType* is output only.|**string**|
|<a name="type"></a>Type|The *RecommendationType* value set has the following values: *CampaignBudgetRecommendation*, *KeywordRecommendation*, *ResponsiveSearchAdRecommendation*.|[RecommendationType](recommendationtype.md)|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

