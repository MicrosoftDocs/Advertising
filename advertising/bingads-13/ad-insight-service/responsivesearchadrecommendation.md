---
title: ResponsiveSearchAdRecommendation Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a ResponsiveSearchAdRecommendation data object.
---
# ResponsiveSearchAdRecommendation Data Object - Ad Insight
Defines a ResponsiveSearchAdRecommendation data object.

# [XML](#tab/xml)

```xml
<xs:complexType name="ResponsiveSearchAdRecommendation" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:RecommendationBase">
      <xs:sequence>
        <xs:element minOccurs="0" name="SuggestedAd" nillable="true" type="tns:SuggestedResponsiveSearchAd" />
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
  "Type": "ResponsiveSearchAdRecommendation",
  "SuggestedAd": {
    "Descriptions": [
      "ValueHere"
    ],
    "FinalUrl": "ValueHere",
    "Headlines": [
      "ValueHere"
    ],
    "Path1": "ValueHere",
    "Path2": "ValueHere"
  }
}
```

-----

## <a name="elements"></a>Elements

The [ResponsiveSearchAdRecommendation](responsivesearchadrecommendation.md) object has the following elements: [SuggestedAd](#suggestedad).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="suggestedad"></a>SuggestedAd|The ad info in the recommendation. Output only.|[SuggestedResponsiveSearchAd](suggestedresponsivesearchad.md)|

The [ResponsiveSearchAdRecommendation](responsivesearchadrecommendation.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsrecommendationbase"></a>Inherited Elements from RecommendationBase
The [ResponsiveSearchAdRecommendation](responsivesearchadrecommendation.md) object derives from the [RecommendationBase](recommendationbase.md) object, and inherits the following elements: [AccountId](#accountid), [AccountName](#accountname), [AdGroupId](#adgroupid), [AdGroupName](#adgroupname), [CampaignId](#campaignid), [CampaignName](#campaignname), [CurrentClicks](#currentclicks), [CurrentConversions](#currentconversions), [CurrentCost](#currentcost), [CurrentImpressions](#currentimpressions), [Dismissed](#dismissed), [EstimatedIncreaseInClicks](#estimatedincreaseinclicks), [EstimatedIncreaseInConversions](#estimatedincreaseinconversions), [EstimatedIncreaseInCost](#estimatedincreaseincost), [EstimatedIncreaseInImpressions](#estimatedincreaseinimpressions), [RecommendationHash](#recommendationhash), [RecommendationId](#recommendationid), [RecommendationType](#recommendationtype), [Type](#type). The descriptions below are specific to [ResponsiveSearchAdRecommendation](responsivesearchadrecommendation.md), and might not apply to other objects that inherit the same elements from the [RecommendationBase](recommendationbase.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountid"></a>AccountId|The identifier of the account. Output only. |**long**|
|<a name="accountname"></a>AccountName|The account name. Output only.|**string**|
|<a name="adgroupid"></a>AdGroupId|The ad group ID targeted by this recommendation. This will be set only when the recommendation affects a single ad group. Output only.<br/><br/>This field will be set for the following recommendation types: KEYWORD, RESPONSIVE_SEARCH_AD.|**long**|
|<a name="adgroupname"></a>AdGroupName|The ad group name. Output only.|**string**|
|<a name="campaignid"></a>CampaignId|The campaign ID targeted by this recommendation. Output only.<br/><br/>This field will be set for the following recommendation types: KEYWORD, RESPONSIVE_SEARCH_AD|**long**|
|<a name="campaignname"></a>CampaignName|The campaign name. Output only.|**string**|
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

