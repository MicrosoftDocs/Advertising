---
title: KeywordDemographicResult Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an object that contains the keyword and percentage of users by age and gender (if known) who searched for the specified keyword.
---
# KeywordDemographicResult Data Object - Ad Insight
Defines an object that contains the keyword and percentage of users by age and gender (if known) who searched for the specified keyword.

## Syntax
```xml
<xs:complexType name="KeywordDemographicResult" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Keyword" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="KeywordDemographics" nillable="true" type="tns:ArrayOfKeywordDemographic" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [KeywordDemographicResult](keyworddemographicresult.md) object has the following elements: [Keyword](#keyword), [KeywordDemographics](#keyworddemographics).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="keyword"></a>Keyword|The keyword.|**string**|
|<a name="keyworddemographics"></a>KeywordDemographics|An array of [KeywordDemographic](keyworddemographic.md) data objects that contains the percentage of users by age and gender (if known) that searched for the keyword on the device.|[KeywordDemographic](keyworddemographic.md) array|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetKeywordDemographics](getkeyworddemographics.md)  
