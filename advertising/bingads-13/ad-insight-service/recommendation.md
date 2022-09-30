---
title: Recommendation Data Object - Ad Insight
ms.service: bing-ads-ad-insight-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the base object of Recommendation.
---
# Recommendation Data Object - Ad Insight
Defines the base object of Recommendation. The [ResponsiveSearchAdsRecommendation](responsivesearchadsrecommendation.md) object derives from it.

## Syntax
```xml
<xs:complexType name="Recommendation" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AccountId" type="xs:long" />
    <xs:element minOccurs="0" name="AdGroupId" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="CampaignId" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="CurrentClicks" type="xs:long" />
    <xs:element minOccurs="0" name="CurrentConversions" type="xs:long" />
    <xs:element minOccurs="0" name="CurrentCost" type="xs:double" />
    <xs:element minOccurs="0" name="CurrentImpressions" type="xs:long" />
    <xs:element minOccurs="0" name="EstimatedIncreaseInClicks" type="xs:long" />
    <xs:element minOccurs="0" name="EstimatedIncreaseInConversions" type="xs:long" />
    <xs:element minOccurs="0" name="EstimatedIncreaseInCost" type="xs:double" />
    <xs:element minOccurs="0" name="EstimatedIncreaseInImpressions" type="xs:long" />
    <xs:element minOccurs="0" name="RecommendationHash" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="RecommendationId" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="RecommendationType" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [Recommendation](recommendation.md) object has the following elements: [AccountId](#accountid), [AdGroupId](#adgroupid), [CampaignId](#campaignid), [CurrentClicks](#currentclicks), [CurrentConversions](#currentconversions), [CurrentCost](#currentcost), [CurrentImpressions](#currentimpressions), [EstimatedIncreaseInClicks](#estimatedincreaseinclicks), [EstimatedIncreaseInConversions](#estimatedincreaseinconversions), [EstimatedIncreaseInCost](#estimatedincreaseincost), [EstimatedIncreaseInImpressions](#estimatedincreaseinimpressions), [RecommendationHash](#recommendationhash), [RecommendationId](#recommendationid), [RecommendationType](#recommendationtype).

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

## Used By
[GetRecommendations](getrecommendations.md)  
