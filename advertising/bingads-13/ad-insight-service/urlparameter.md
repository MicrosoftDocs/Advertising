---
title: UrlParameter Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the URL parameter for use with performance insights.
---
# UrlParameter Data Object - Ad Insight
Defines the URL parameter for use with performance insights. Derives from *PerformanceInsightsMessageParameter*.

## Syntax
```xml
<xs:complexType name="UrlParameter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:PerformanceInsightsMessageParameter">
      <xs:sequence>
        <xs:element minOccurs="0" name="SuggestedText" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="SuggestedUrl" nillable="true" type="xs:string" />
        <xs:element minOccurs="0" name="UrlCategory" type="tns:PerformanceInsightsUrlCategory" />
        <xs:element minOccurs="0" name="UrlId" type="tns:PerformanceInsightsUrlId" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [UrlParameter](urlparameter.md) object has the following elements: [SuggestedText](#suggestedtext), [SuggestedUrl](#suggestedurl), [UrlCategory](#urlcategory), [UrlId](#urlid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="suggestedtext"></a>SuggestedText|The suggested string value to substitute for the message.|**string**|
|<a name="suggestedurl"></a>SuggestedUrl|THe Suggested URL.|**string**|
|<a name="urlcategory"></a>UrlCategory|The main category of the URL.|[PerformanceInsightsUrlCategory](performanceinsightsurlcategory.md)|
|<a name="urlid"></a>UrlId|The specified type of the URL.|[PerformanceInsightsUrlId](performanceinsightsurlid.md)|

The [UrlParameter](urlparameter.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsperformanceinsightsmessageparameter"></a>Inherited Elements from PerformanceInsightsMessageParameter
The [UrlParameter](urlparameter.md) object derives from the [PerformanceInsightsMessageParameter](performanceinsightsmessageparameter.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [UrlParameter](urlparameter.md), and might not apply to other objects that inherit the same elements from the [PerformanceInsightsMessageParameter](performanceinsightsmessageparameter.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|Defines the type of parameter: string, URL, or a list of demand entities.|[ParameterType](parametertype.md)|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

