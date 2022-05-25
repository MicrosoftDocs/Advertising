---
title: AutoApplyRecommendationsInfo Data Object - Ad Insight
ms.service: bing-ads-ad-insight-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Auto-apply opt-in status for specific recommendation type.
---
# AutoApplyRecommendationsInfo Data Object - Ad Insight

Defines the auto-apply opt-in status for specific recommendation type. 
## Syntax
```xml
<xs:complexType name="AutoApplyRecommendationsInfo" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AAROptInStatus" type="xs:boolean" />
    <xs:element minOccurs="0" name="RecommendationType" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [AutoApplyRecommendationsInfo](autoapplyrecommendationsinfo.md) object has the following elements: [AAROptInStatus](#aaroptinstatus), [RecommendationType](#recommendationtype).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="aaroptinstatus"></a>AAROptInStatus|True for opt-in, False for opt-out.|**boolean**|
|<a name="recommendationtype"></a>RecommendationType|Supported recommendation types in auto-apply mode. We will keep the list updated once new recommendations support auto-apply.<ul><li>Add responsive search ads <li>Add multimedia ads <li>Remove conflicting negative keywords <li>Fix conversion goal setting issue <li>Create conversion goal</ul>To set the auto-apply opt-in status to the supported recommendation types above, please use the following keys as below: <ul><li>ResponsiveSearchAdsOpportunity <li>MultiMediaAdsOpportunity <li>RemoveConflictingNegativeKeywordOpportunity <li>FixConversionGoalSettingsOpportunity <li>CreateConversionGoalOpportunity .|**string**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetAutoApplyOptInStatus](getautoapplyoptinstatus.md)  
