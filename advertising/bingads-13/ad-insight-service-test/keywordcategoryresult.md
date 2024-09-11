---
title: KeywordCategoryResult Data Object Test - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an object that contains the keyword and a list of keyword categories that the keyword might belong to.(test)
---
# KeywordCategoryResult Data Object Test - Ad Insight
Defines an object that contains the keyword and a list of keyword categories that the keyword might belong to.

# [XML](#tab/xml)

```xml
<xs:complexType name="KeywordCategoryResult" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Keyword" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="KeywordCategories" nillable="true" type="tns:ArrayOfKeywordCategory" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Keyword": "ValueHere",
  "KeywordCategories": [
    {
      "Category": "ValueHere",
      "ConfidenceScore": DoubleValueHere
    }
  ]
}
```

-----

## <a name="elements"></a>Elements

The [KeywordCategoryResult](keywordcategoryresult.md) object has the following elements: [Keyword](#keyword), [KeywordCategories](#keywordcategories).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="keyword"></a>Keyword|The keyword being categorized.|**string**|
|<a name="keywordcategories"></a>KeywordCategories|An array of [KeywordCategory](keywordcategory.md) objects that contains a keyword category and a score that indicates the confidence that the keyword belongs to that keyword category.|[KeywordCategory](keywordcategory.md) array|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetKeywordCategories](getkeywordcategories.md)  
