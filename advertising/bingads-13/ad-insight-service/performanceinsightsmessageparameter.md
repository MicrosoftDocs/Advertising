---
title: PerformanceInsightsMessageParameter Data Object - Ad Insight
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the message parameters for performance insights.
ms.subservice: ad-insight-api
---
# PerformanceInsightsMessageParameter Data Object - Ad Insight
Defines the message parameters for performance insights. Do not try to instantiate a PerformanceInsightsMessageParameter. You can create one or more objects that derive from it.

## Syntax
```xml
<xs:complexType name="PerformanceInsightsMessageParameter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Type" type="tns:ParameterType" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [PerformanceInsightsMessageParameter](performanceinsightsmessageparameter.md) object has the following elements: [Type](#type).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|The supported types are: *text*, *URL*, and *entities*.|[ParameterType](parametertype.md)|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[PerformanceInsightsMessage](performanceinsightsmessage.md)  
