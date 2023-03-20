---
title: KeywordSuggestion Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines an object that contains a list of suggested keywords that may perform better than the specified keyword.
---
# KeywordSuggestion Data Object - Ad Insight
Defines an object that contains a list of suggested keywords that may perform better than the specified keyword.

## Syntax
```xml
<xs:complexType name="KeywordSuggestion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Keyword" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="SuggestionsAndConfidence" nillable="true" type="tns:ArrayOfKeywordAndConfidence" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [KeywordSuggestion](keywordsuggestion.md) object has the following elements: [Keyword](#keyword), [SuggestionsAndConfidence](#suggestionsandconfidence).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="keyword"></a>Keyword|The keyword to which the suggested keywords apply.|**string**|
|<a name="suggestionsandconfidence"></a>SuggestionsAndConfidence|A [KeywordAndConfidence](keywordandconfidence.md) array that contains a list of suggested keywords and, for each keyword, a score that indicates the probability that using the keyword would result in an ad being included in the results of a search query.<br/><br/>The suggested keywords are sorted in order from keywords with the highest confidence score to those with the lowest confidence score.|[KeywordAndConfidence](keywordandconfidence.md) array|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[SuggestKeywordsFromExistingKeywords](suggestkeywordsfromexistingkeywords.md)  
