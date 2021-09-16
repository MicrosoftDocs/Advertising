---
title: AdPosition Value Set - Ad Insight
ms.service: bing-ads-ad-insight-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines the possible positions of an ad in the search results.
---
# AdPosition Value Set - Ad Insight
Defines the possible positions of an ad in the search results.

> [!NOTE]
> Sidebar ads no longer serve on Bing owned and operated sites in the United States. If you only request first page data e.g., FirstPage1 for the United States (US), then the [KeywordKPIs](keywordhistoricalperformance.md#keywordkpis) element in the result will be nil/empty. If you include additional countries/regions e.g., US and CA in the same request, then any first page results are only attributed to countries/regions outside the United States.

## Syntax
```xml
<xs:simpleType name="AdPosition" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="All" />
    <xs:enumeration value="MainLine1" />
    <xs:enumeration value="MainLine2" />
    <xs:enumeration value="MainLine3" />
    <xs:enumeration value="MainLine4" />
    <xs:enumeration value="FirstPage1" />
    <xs:enumeration value="FirstPage2" />
    <xs:enumeration value="FirstPage3" />
    <xs:enumeration value="FirstPage4" />
    <xs:enumeration value="FirstPage5" />
    <xs:enumeration value="FirstPage6" />
    <xs:enumeration value="FirstPage7" />
    <xs:enumeration value="FirstPage8" />
    <xs:enumeration value="FirstPage9" />
    <xs:enumeration value="FirstPage10" />
    <xs:enumeration value="Aggregate" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AdPosition](adposition.md) value set has the following values: [Aggregate](#aggregate), [All](#all), [FirstPage1](#firstpage1), [FirstPage10](#firstpage10), [FirstPage2](#firstpage2), [FirstPage3](#firstpage3), [FirstPage4](#firstpage4), [FirstPage5](#firstpage5), [FirstPage6](#firstpage6), [FirstPage7](#firstpage7), [FirstPage8](#firstpage8), [FirstPage9](#firstpage9), [MainLine1](#mainline1), [MainLine2](#mainline2), [MainLine3](#mainline3), [MainLine4](#mainline4).

|Value|Description|
|-----------|---------------|
|<a name="aggregate"></a>Aggregate|Aggregates the data for all supported positions.<br/><br/>The following are examples of how the data is aggregated: Average bid would be the average bid of all the keywords in all the ad positions; Impressions is the sum of the number of impressions in all the ad positions; Clicks is the sum of the number of clicks in all the ad positions; Total cost is the sum of the cost of using the keywords in all the ad positions; AverageCTR is calculated by dividing the number of clicks by the number of impressions and multiplying the result by 100; AverageCPC is calculated by dividing the cost of all clicks by the number of clicks.|
|<a name="all"></a>All|Indicates all search result positions.|
|<a name="firstpage1"></a>FirstPage1|The first ad to appear on the right side of the first search results page.|
|<a name="firstpage10"></a>FirstPage10|The tenth ad to appear on the right side of the first search results page.|
|<a name="firstpage2"></a>FirstPage2|The second ad to appear on the right side of the first search results page.|
|<a name="firstpage3"></a>FirstPage3|The third ad to appear on the right side of the first search results page.|
|<a name="firstpage4"></a>FirstPage4|The fourth ad to appear on the right side of the first search results page.|
|<a name="firstpage5"></a>FirstPage5|The fifth ad to appear on the right side of the first search results page.|
|<a name="firstpage6"></a>FirstPage6|The sixth ad to appear on the right side of the first search results page.|
|<a name="firstpage7"></a>FirstPage7|The seventh ad to appear on the right side of the first search results page.|
|<a name="firstpage8"></a>FirstPage8|The eighth ad to appear on the right side of the first search results page.|
|<a name="firstpage9"></a>FirstPage9|The ninth ad to appear on the right side of the first search results page.|
|<a name="mainline1"></a>MainLine1|The first ad to appear at the top of the search results page.|
|<a name="mainline2"></a>MainLine2|The second ad to appear at the top of the search results page.|
|<a name="mainline3"></a>MainLine3|The third ad to appear at the top of the search results page.|
|<a name="mainline4"></a>MainLine4|The fourth ad to appear at the top of the search results page.|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetHistoricalKeywordPerformance](gethistoricalkeywordperformance.md)  
[KeywordKPI](keywordkpi.md)  
