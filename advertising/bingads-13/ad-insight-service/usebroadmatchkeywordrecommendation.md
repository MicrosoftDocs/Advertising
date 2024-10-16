---
title: UseBroadMatchKeywordRecommendation Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines a data object for UseBroadMatchKeywordRecommendation.
---
# UseBroadMatchKeywordRecommendation Data Object - Ad Insight
Defines a data object for UseBroadMatchKeywordRecommendation.

## Syntax
```xml
<xs:complexType name="UseBroadMatchKeywordRecommendation" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:RecommendationBase">
      <xs:sequence>
        <xs:element minOccurs="0" name="CurrentMatchType" type="xs:int" />
        <xs:element minOccurs="0" name="CurrentStatus" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="Keyword" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="KeywordOrderItemId" type="xs:long" />
        <xs:element minOccurs="0" name="SuggestedBid" type="xs:double" />
        <xs:element minOccurs="0" name="SuggestedMatchType" type="xs:int" />
        <xs:element minOccurs="0" name="SuggestedStatus" nillable="true" type="xs:string" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [UseBroadMatchKeywordRecommendation](usebroadmatchkeywordrecommendation.md) object has the following elements: [CurrentMatchType](#currentmatchtype), [CurrentStatus](#currentstatus), [Keyword](#keyword), [KeywordOrderItemId](#keywordorderitemid), [SuggestedBid](#suggestedbid), [SuggestedMatchType](#suggestedmatchtype), [SuggestedStatus](#suggestedstatus).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="currentmatchtype"></a>CurrentMatchType|The current match type.|**int**|
|<a name="currentstatus"></a>CurrentStatus|The current status.|**string**|
|<a name="keyword"></a>Keyword|The keyword.|**string**|
|<a name="keywordorderitemid"></a>KeywordOrderItemId|The ID of the keyword order item.|**long**|
|<a name="suggestedbid"></a>SuggestedBid|The suggested bid.|**double**|
|<a name="suggestedmatchtype"></a>SuggestedMatchType|The suggested match type.|**int**|
|<a name="suggestedstatus"></a>SuggestedStatus|The suggested status.|**string**|

The [UseBroadMatchKeywordRecommendation](usebroadmatchkeywordrecommendation.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsrecommendationbase"></a>Inherited Elements from RecommendationBase
The [UseBroadMatchKeywordRecommendation](usebroadmatchkeywordrecommendation.md) object derives from the [RecommendationBase](recommendationbase.md) object, and inherits the following elements: [AccountId](#accountid), [AccountName](#accountname), [AdGroupId](#adgroupid), [AdGroupName](#adgroupname), [CampaignId](#campaignid), [CampaignName](#campaignname), [CurrentClicks](#currentclicks), [CurrentConversions](#currentconversions), [CurrentCost](#currentcost), [CurrentImpressions](#currentimpressions), [Dismissed](#dismissed), [EstimatedIncreaseInClicks](#estimatedincreaseinclicks), [EstimatedIncreaseInConversions](#estimatedincreaseinconversions), [EstimatedIncreaseInCost](#estimatedincreaseincost), [EstimatedIncreaseInImpressions](#estimatedincreaseinimpressions), [RecommendationHash](#recommendationhash), [RecommendationId](#recommendationid), [RecommendationType](#recommendationtype), [Type](#type). The descriptions below are specific to [UseBroadMatchKeywordRecommendation](usebroadmatchkeywordrecommendation.md), and might not apply to other objects that inherit the same elements from the [RecommendationBase](recommendationbase.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountid"></a>AccountId|The identifier of the account. Output only. |**long**|
|<a name="accountname"></a>AccountName|The name of the account. Output only.|**string**|
|<a name="adgroupid"></a>AdGroupId|The ad group ID targeted by this recommendation. This will be set only when the recommendation affects a single ad group. Output only.<br/><br/>This field will be set for the following recommendation types: KEYWORD, RESPONSIVE_SEARCH_AD.|**long**|
|<a name="adgroupname"></a>AdGroupName|The name of the ad group. Output only.|**string**|
|<a name="campaignid"></a>CampaignId|The campaign ID targeted by this recommendation. Output only.<br/><br/>This field will be set for the following recommendation types: KEYWORD, RESPONSIVE_SEARCH_AD|**long**|
|<a name="campaignname"></a>CampaignName|The name of the campaign. Output only.|**string**|
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

