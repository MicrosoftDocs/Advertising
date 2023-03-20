---
title: KeywordHistoricalPerformance Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an object that contains the key performance index data for the specified keyword.
---
# KeywordHistoricalPerformance Data Object - Ad Insight
Defines an object that contains the key performance index data for the specified keyword.

## Syntax
```xml
<xs:complexType name="KeywordHistoricalPerformance" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Keyword" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="KeywordKPIs" nillable="true" type="tns:ArrayOfKeywordKPI" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [KeywordHistoricalPerformance](keywordhistoricalperformance.md) object has the following elements: [Keyword](#keyword), [KeywordKPIs](#keywordkpis).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="keyword"></a>Keyword|The keyword to which the keyword performance data applies.|**string**|
|<a name="keywordkpis"></a>KeywordKPIs|An array of [KeywordKPI](keywordkpi.md) objects that contains the performance data.<br/><br/>For each requested keyword that has no available data, the [KeywordKPI](keywordkpi.md) element will be nil.<br/><br/>If the request specified a specific target position, the array will contain only one item per requested keyword. If the request specified All for the target position, then for each requested keyword the array will contain an item for each possible position in the search results.<br/><br/>Sidebar ads no longer serve on Bing owned and operated sites in the United States. If you only request first page data e.g., FirstPage1 for the United States (US), then this element will be nil/empty. If you include additional countries/regions e.g., US and CA in the same request, then any first page results are only attributed to countries/regions outside the United States.|[KeywordKPI](keywordkpi.md) array|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetHistoricalKeywordPerformance](gethistoricalkeywordperformance.md)  
