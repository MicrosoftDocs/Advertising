---
title: ResponsiveSearchAdsRecommendation Data Object - Ad Insight
ms.service: bing-ads-ad-insight-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines an object that contains the responsive search ads to be suggested.
---
# ResponsiveSearchAdsRecommendation Data Object - Ad Insight
Defines an object that contains the responsive search ads to be suggested.

## Syntax
```xml
<xs:complexType name="ResponsiveSearchAdsRecommendation" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Recommendation">
      <xs:sequence>
        <xs:element minOccurs="0" name="SuggestedAd" nillable="true" type="tns:SuggestedResponsiveSearchAd" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [ResponsiveSearchAdsRecommendation](responsivesearchadsrecommendation.md) object has the following elements: [SuggestedAd](#suggestedad).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="suggestedad"></a>SuggestedAd|The ad info in the recommendation.|[SuggestedResponsiveSearchAd](suggestedresponsivesearchad.md)|

The [ResponsiveSearchAdsRecommendation](responsivesearchadsrecommendation.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsrecommendation"></a>Inherited Elements from Recommendation
The [ResponsiveSearchAdsRecommendation](responsivesearchadsrecommendation.md) object derives from the [Recommendation](recommendation.md) object, and inherits the following elements: [AccountId](#accountid), [AdGroupId](#adgroupid), [CampaignId](#campaignid), [CurrentClicks](#currentclicks), [CurrentConversions](#currentconversions), [CurrentCost](#currentcost), [CurrentImpressions](#currentimpressions), [EstimatedIncreaseInClicks](#estimatedincreaseinclicks), [EstimatedIncreaseInConversions](#estimatedincreaseinconversions), [EstimatedIncreaseInCost](#estimatedincreaseincost), [EstimatedIncreaseInImpressions](#estimatedincreaseinimpressions), [RecommendationHash](#recommendationhash), [RecommendationId](#recommendationid), [RecommendationType](#recommendationtype). The descriptions below are specific to [ResponsiveSearchAdsRecommendation](responsivesearchadsrecommendation.md), and might not apply to other objects that inherit the same elements from the [Recommendation](recommendation.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountid"></a>AccountId|The identifier of the account. |**long**|
|<a name="adgroupid"></a>AdGroupId|The identifier of the ad group that owns the recommendation. |**long**|
|<a name="campaignid"></a>CampaignId|The identifier of the campaign for the ad group that owns the recommendation.|**long**|
|<a name="currentclicks"></a>CurrentClicks|Actual clicks of the ad group in the past 7 days. |**long**|
|<a name="currentconversions"></a>CurrentConversions|Actual conversions of the ad group in the past 7 days. |**long**|
|<a name="currentcost"></a>CurrentCost|Actual spending of the ad group in the past 7 days, in the currency of this account. |**double**|
|<a name="currentimpressions"></a>CurrentImpressions|Actual impressions of the ad group in the past 7 days. |**long**|
|<a name="estimatedincreaseinclicks"></a>EstimatedIncreaseInClicks|The estimated click opportunities corresponding to the suggested ad. |**long**|
|<a name="estimatedincreaseinconversions"></a>EstimatedIncreaseInConversions|The estimated impression opportunities corresponding to the suggested ad. |**long**|
|<a name="estimatedincreaseincost"></a>EstimatedIncreaseInCost|The estimated increase in spend corresponding to the suggested ad. |**double**|
|<a name="estimatedincreaseinimpressions"></a>EstimatedIncreaseInImpressions|The estimated impressions opportunities corresponding to the suggested ad. |**long**|
|<a name="recommendationhash"></a>RecommendationHash|The hash of the recommendation. |**string**|
|<a name="recommendationid"></a>RecommendationId|The identifier of the recommendation. |**string**|
|<a name="recommendationtype"></a>RecommendationType|The type of recommendation. |**string**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

