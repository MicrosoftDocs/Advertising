---
title: KeywordEstimator Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Contains a keyword estimators with your keyword level filter criteria for traffic estimates.
---
# KeywordEstimator Data Object - Ad Insight
Contains a keyword estimators with your keyword level filter criteria for traffic estimates.

# [XML](#tab/xml)

```xml
<xs:complexType name="KeywordEstimator" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Keyword" nillable="true" type="tns:Keyword" />
    <xs:element minOccurs="0" name="MaxCpc" nillable="true" type="xs:double" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Keyword": {
    "Id": "LongValueHere",
    "MatchType": "ValueHere",
    "Text": "ValueHere"
  },
  "MaxCpc": DoubleValueHere
}
```

-----

## <a name="elements"></a>Elements

The [KeywordEstimator](keywordestimator.md) object has the following elements: [Keyword](#keyword), [MaxCpc](#maxcpc).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="keyword"></a>Keyword|The keyword used for traffic estimates.<br/><br/>You can request estimates for Phrase and Broad match types.|[Keyword](keyword.md)|
|<a name="maxcpc"></a>MaxCpc|The maximum cost per click filter criteria for the keyword.<br/><br/>You can set the default maximum CPC for all of the ad group's keywords using the *MaxCpc* element of the [AdGroupEstimator](adgroupestimator.md) object. Use the keyword estimator if you want to override the max CPC for a specific keyword.|**double**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[AdGroupEstimator](adgroupestimator.md)  
