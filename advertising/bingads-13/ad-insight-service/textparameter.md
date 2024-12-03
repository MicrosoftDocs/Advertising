---
title: TextParameter Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the text parameter for use with performance insights.
---
# TextParameter Data Object - Ad Insight
Defines the text parameter for use with performance insights. Derives from *PerformanceInsightsMessageParameter*.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="TextParameter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:PerformanceInsightsMessageParameter">
      <xs:sequence>
        <xs:element minOccurs="0" name="SuggestedText" nillable="true" type="xs:string" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "Text",
  "SuggestedText": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [TextParameter](textparameter.md) object has the following elements: [SuggestedText](#suggestedtext).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="suggestedtext"></a>SuggestedText|The suggested string value to substitute for the message.|**string**|

The [TextParameter](textparameter.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsperformanceinsightsmessageparameter"></a>Inherited Elements from PerformanceInsightsMessageParameter
The [TextParameter](textparameter.md) object derives from the [PerformanceInsightsMessageParameter](performanceinsightsmessageparameter.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [TextParameter](textparameter.md), and might not apply to other objects that inherit the same elements from the [PerformanceInsightsMessageParameter](performanceinsightsmessageparameter.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|Defines the type of parameter: string, URL, or a list of demand entities.|[ParameterType](parametertype.md)|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

