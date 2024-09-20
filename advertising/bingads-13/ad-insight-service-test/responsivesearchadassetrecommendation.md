---
title: ResponsiveSearchAdAssetRecommendation Data Object Test - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Reserved.(test-2)
---
# ResponsiveSearchAdAssetRecommendation Data Object Test - Ad Insight
Reserved.

# [XML](#tab/xml)

```xml
<xs:complexType name="ResponsiveSearchAdAssetRecommendation" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:RecommendationBase">
      <xs:sequence>
        <xs:element minOccurs="0" name="RecommendedResponsiveSearchAd" nillable="true" type="tns:SuggestedResponsiveSearchAd" />
        <xs:element minOccurs="0" name="ResponsiveSearchAdId" type="xs:long" />
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
  "Type": "ResponsiveSearchAdAssetRecommendation",
  "RecommendedResponsiveSearchAd": {
    "Descriptions": [
      "ValueHere"
    ],
    "FinalUrl": "ValueHere",
    "Headlines": [
      "ValueHere"
    ],
    "Path1": "ValueHere",
    "Path2": "ValueHere"
  },
  "ResponsiveSearchAdId": "LongValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [ResponsiveSearchAdAssetRecommendation](responsivesearchadassetrecommendation.md) object has the following elements: [RecommendedResponsiveSearchAd](#recommendedresponsivesearchad), [ResponsiveSearchAdId](#responsivesearchadid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="recommendedresponsivesearchad"></a>RecommendedResponsiveSearchAd|Reserved.|[SuggestedResponsiveSearchAd](suggestedresponsivesearchad.md)|
|<a name="responsivesearchadid"></a>ResponsiveSearchAdId|Reserved.|**long**|

The [ResponsiveSearchAdAssetRecommendation](responsivesearchadassetrecommendation.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsrecommendationbase"></a>Inherited Elements from RecommendationBase
The [ResponsiveSearchAdAssetRecommendation](responsivesearchadassetrecommendation.md) object derives from the [RecommendationBase](recommendationbase.md) object, and inherits the following elements: [AccountId](#accountid), [AccountName](#accountname), [AdGroupId](#adgroupid), [AdGroupName](#adgroupname), [CampaignId](#campaignid), [CampaignName](#campaignname), [CurrentClicks](#currentclicks), [CurrentConversions](#currentconversions), [CurrentCost](#currentcost), [CurrentImpressions](#currentimpressions), [Dismissed](#dismissed), [EstimatedIncreaseInClicks](#estimatedincreaseinclicks), [EstimatedIncreaseInConversions](#estimatedincreaseinconversions), [EstimatedIncreaseInCost](#estimatedincreaseincost), [EstimatedIncreaseInImpressions](#estimatedincreaseinimpressions), [RecommendationHash](#recommendationhash), [RecommendationId](#recommendationid), [RecommendationType](#recommendationtype), [Type](#type). The descriptions below are specific to [ResponsiveSearchAdAssetRecommendation](responsivesearchadassetrecommendation.md), and might not apply to other objects that inherit the same elements from the [RecommendationBase](recommendationbase.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="accountid"></a>AccountId|Reserved.|**long**|
|<a name="accountname"></a>AccountName|Reserved.|**string**|
|<a name="adgroupid"></a>AdGroupId|Reserved.|**long**|
|<a name="adgroupname"></a>AdGroupName|Reserved.|**string**|
|<a name="campaignid"></a>CampaignId|Reserved.|**long**|
|<a name="campaignname"></a>CampaignName|Reserved.|**string**|
|<a name="currentclicks"></a>CurrentClicks|Reserved.|**long**|
|<a name="currentconversions"></a>CurrentConversions|Reserved.|**long**|
|<a name="currentcost"></a>CurrentCost|Reserved.|**double**|
|<a name="currentimpressions"></a>CurrentImpressions|Reserved.|**long**|
|<a name="dismissed"></a>Dismissed|Reserved.|**boolean**|
|<a name="estimatedincreaseinclicks"></a>EstimatedIncreaseInClicks|Reserved.|**long**|
|<a name="estimatedincreaseinconversions"></a>EstimatedIncreaseInConversions|Reserved.|**long**|
|<a name="estimatedincreaseincost"></a>EstimatedIncreaseInCost|Reserved.|**double**|
|<a name="estimatedincreaseinimpressions"></a>EstimatedIncreaseInImpressions|Reserved.|**long**|
|<a name="recommendationhash"></a>RecommendationHash|Reserved.|**string**|
|<a name="recommendationid"></a>RecommendationId|Reserved.|**string**|
|<a name="recommendationtype"></a>RecommendationType|Reserved.|**string**|
|<a name="type"></a>Type|Reserved.|[RecommendationType](recommendationtype.md)|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  
