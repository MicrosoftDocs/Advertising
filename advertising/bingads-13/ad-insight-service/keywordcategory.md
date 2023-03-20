---
title: KeywordCategory Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an object that contains a keyword category and a confidence score.
---
# KeywordCategory Data Object - Ad Insight
Defines an object that contains a keyword category and a confidence score. The confidence score indicates the likelihood that the keyword belongs to the keyword category.

## Syntax
```xml
<xs:complexType name="KeywordCategory" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Category" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="ConfidenceScore" type="xs:double" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [KeywordCategory](keywordcategory.md) object has the following elements: [Category](#category), [ConfidenceScore](#confidencescore).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="category"></a>Category|The keyword category that the keyword might belong to.<br/><br/>If the category is undetermined, this element is set to Unknown Category and the ConfidenceScore element is set to 0.0.|**string**|
|<a name="confidencescore"></a>ConfidenceScore|A score from 0.0 to 1.0 that indicates the likelihood that the keyword belongs to the category.|**double**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[KeywordCategoryResult](keywordcategoryresult.md)  
