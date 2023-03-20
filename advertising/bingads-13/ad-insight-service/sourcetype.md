---
title: SourceType Value Set - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the source or seed for the keyword idea.
---
# SourceType Value Set - Ad Insight
Defines the source or seed for the keyword idea. 

You can request that the source be returned in the [KeywordIdea](keywordidea.md) object when calling the [GetKeywordIdeas](getkeywordideas.md) operation.

## Syntax
```xml
<xs:simpleType name="SourceType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Unknown" />
    <xs:enumeration value="Seed" />
    <xs:enumeration value="SuggestionFromKeyword" />
    <xs:enumeration value="SuggestionFromUrl" />
    <xs:enumeration value="SuggestionFromCategory" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [SourceType](sourcetype.md) value set has the following values: [Seed](#seed), [SuggestionFromCategory](#suggestionfromcategory), [SuggestionFromKeyword](#suggestionfromkeyword), [SuggestionFromUrl](#suggestionfromurl), [Unknown](#unknown).

|Value|Description|
|-----------|---------------|
|<a name="seed"></a>Seed|The keyword idea source is a seed that you provided such as the query search parameter.|
|<a name="suggestionfromcategory"></a>SuggestionFromCategory|The keyword idea is sourced from a provided category.|
|<a name="suggestionfromkeyword"></a>SuggestionFromKeyword|The keyword idea is sourced from a provided keyword.|
|<a name="suggestionfromurl"></a>SuggestionFromUrl|The keyword idea is sourced from a provided URL.|
|<a name="unknown"></a>Unknown|The keyword idea source is unknown.|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[KeywordIdea](keywordidea.md)  
