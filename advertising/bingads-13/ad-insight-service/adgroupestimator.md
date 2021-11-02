---
title: AdGroupEstimator Data Object - Ad Insight
ms.service: bing-ads-ad-insight-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Contains a list of keyword estimators with your keyword level filter criteria for traffic estimates.
---
# AdGroupEstimator Data Object - Ad Insight
Contains a list of keyword estimators with your keyword level filter criteria for traffic estimates.

## Syntax
```xml
<xs:complexType name="AdGroupEstimator" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="AdGroupId" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="KeywordEstimators" nillable="true" type="tns:ArrayOfKeywordEstimator" />
    <xs:element minOccurs="0" name="MaxCpc" type="xs:double" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [AdGroupEstimator](adgroupestimator.md) object has the following elements: [AdGroupId](#adgroupid), [KeywordEstimators](#keywordestimators), [MaxCpc](#maxcpc).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="adgroupid"></a>AdGroupId|The ad group identifier.<br/><br/>This element is reserved for future use. The returned estimates are not based on any specific ad group.|**long**|
|<a name="keywordestimators"></a>KeywordEstimators|The list of keyword estimators with your keyword level filter criteria for traffic estimates.|[KeywordEstimator](keywordestimator.md) array|
|<a name="maxcpc"></a>MaxCpc|The maximum cost per click filter criteria for all keyword estimates in the ad group.<br/><br/>You can override this setting for specific keywords with the corresponding keyword estimators.|**double**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[CampaignEstimator](campaignestimator.md)  
