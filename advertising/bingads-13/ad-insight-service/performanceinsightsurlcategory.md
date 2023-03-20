---
title: PerformanceInsightsUrlCategory Value Set - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the URL category for performance insights.
---
# PerformanceInsightsUrlCategory Value Set - Ad Insight
Defines the URL category for performance insights.

## Syntax
```xml
<xs:simpleType name="PerformanceInsightsUrlCategory" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Recommendation">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Setting">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Report">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">3</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="HelpDoc">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">4</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [PerformanceInsightsUrlCategory](performanceinsightsurlcategory.md) value set has the following values: [HelpDoc](#helpdoc), [Recommendation](#recommendation), [Report](#report), [Setting](#setting).

|Value|Description|
|-----------|---------------|
|<a name="helpdoc"></a>HelpDoc|The URL is for help documents.|
|<a name="recommendation"></a>Recommendation|The url is for recommendations.|
|<a name="report"></a>Report|The url is for reports.|
|<a name="setting"></a>Setting|The url is for demand settings.|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[UrlParameter](urlparameter.md)  
