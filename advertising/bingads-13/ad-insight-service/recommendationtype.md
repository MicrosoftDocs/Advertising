---
title: RecommendationType Value Set - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the RecommendationType value set.
---
# RecommendationType Value Set - Ad Insight
Defines the RecommendationType value set.

## Syntax
```xml
<xs:simpleType name="RecommendationType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="CampaignBudgetRecommendation">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="KeywordRecommendation">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ResponsiveSearchAdRecommendation">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">3</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="RemoveConflictingNegativeKeywordRecommendation">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">4</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="UseBroadMatchKeywordRecommendation">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">5</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="ResponsiveSearchAdAssetRecommendation">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">6</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [RecommendationType](recommendationtype.md) value set has the following values: [CampaignBudgetRecommendation](#campaignbudgetrecommendation), [KeywordRecommendation](#keywordrecommendation), [RemoveConflictingNegativeKeywordRecommendation](#removeconflictingnegativekeywordrecommendation), [ResponsiveSearchAdAssetRecommendation](#responsivesearchadassetrecommendation), [ResponsiveSearchAdRecommendation](#responsivesearchadrecommendation), [UseBroadMatchKeywordRecommendation](#usebroadmatchkeywordrecommendation).

|Value|Description|
|-----------|---------------|
|<a name="campaignbudgetrecommendation"></a>CampaignBudgetRecommendation|Fix campaigns limited by budget.|
|<a name="keywordrecommendation"></a>KeywordRecommendation|Add new keywords from all sources.|
|<a name="removeconflictingnegativekeywordrecommendation"></a>RemoveConflictingNegativeKeywordRecommendation|Remove the recommendation for conflicting negative keywords.|
|<a name="responsivesearchadassetrecommendation"></a>ResponsiveSearchAdAssetRecommendation|Add bew responsive search ads set.|
|<a name="responsivesearchadrecommendation"></a>ResponsiveSearchAdRecommendation|Add new responsive search ad.|
|<a name="usebroadmatchkeywordrecommendation"></a>UseBroadMatchKeywordRecommendation|Use the broad match keyword recommendation.|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[RecommendationBase](recommendationbase.md)  
