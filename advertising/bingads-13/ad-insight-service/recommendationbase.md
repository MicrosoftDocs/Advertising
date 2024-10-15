---
title: RecommendationBase Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the RecommendationBase data object.
---
# RecommendationBase Data Object - Ad Insight
Defines the RecommendationBase data object.

## Syntax
```xml
<xs:complexType name="RecommendationBase" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AccountId" type="xs:long" />
    <xs:element minOccurs="0" name="AccountName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="AdGroupId" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="AdGroupName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="CampaignId" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="CampaignName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="CurrentClicks" type="xs:long" />
    <xs:element minOccurs="0" name="CurrentConversions" type="xs:long" />
    <xs:element minOccurs="0" name="CurrentCost" type="xs:double" />
    <xs:element minOccurs="0" name="CurrentImpressions" type="xs:long" />
    <xs:element minOccurs="0" name="Dismissed" type="xs:boolean" />
    <xs:element minOccurs="0" name="EstimatedIncreaseInClicks" type="xs:long" />
    <xs:element minOccurs="0" name="EstimatedIncreaseInConversions" type="xs:long" />
    <xs:element minOccurs="0" name="EstimatedIncreaseInCost" type="xs:double" />
    <xs:element minOccurs="0" name="EstimatedIncreaseInImpressions" type="xs:long" />
    <xs:element minOccurs="0" name="RecommendationHash" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="RecommendationId" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="RecommendationType" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Type" type="tns:RecommendationType" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [RecommendationBase](recommendationbase.md) object has the following elements: [AccountId](#accountid), [AccountName](#accountname), [AdGroupId](#adgroupid), [AdGroupName](#adgroupname), [CampaignId](#campaignid), [CampaignName](#campaignname), [CurrentClicks](#currentclicks), [CurrentConversions](#currentconversions), [CurrentCost](#currentcost), [CurrentImpressions](#currentimpressions), [Dismissed](#dismissed), [EstimatedIncreaseInClicks](#estimatedincreaseinclicks), [EstimatedIncreaseInConversions](#estimatedincreaseinconversions), [EstimatedIncreaseInCost](#estimatedincreaseincost), [EstimatedIncreaseInImpressions](#estimatedincreaseinimpressions), [RecommendationHash](#recommendationhash), [RecommendationId](#recommendationid), [RecommendationType](#recommendationtype), [Type](#type).

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

## Used By
[RetrieveRecommendations](retrieverecommendations.md)  
