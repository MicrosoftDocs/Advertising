---
title: PerformanceInsightsMessage Data Object Test - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the message for performance insights.(test)
---
# PerformanceInsightsMessage Data Object Test - Ad Insight
Defines the message for performance insights.

# [XML](#tab/xml)

```xml
<xs:complexType name="PerformanceInsightsMessage" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="TemplateId" type="tns:PerformanceInsightsMessageTemplateId" />
    <xs:element minOccurs="0" name="Parameters" nillable="true" type="tns:ArrayOfPerformanceInsightsMessageParameter" />
    <xs:element minOccurs="0" name="IndentationLevel" type="xs:int" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "IndentationLevel": IntValueHere,
  "Parameters": [
    {
      "Type": "EntityParameter",
      "EntityCount": IntValueHere,
      "EntityDetails": [
        {
          "EntityId": "LongValueHere",
          "EntityName": "ValueHere"
        }
      ],
      "EntityType": "ValueHere",
      "SuggestedText": "ValueHere"
    }
  ],
  "TemplateId": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [PerformanceInsightsMessage](performanceinsightsmessage.md) object has the following elements: [IndentationLevel](#indentationlevel), [Parameters](#parameters), [TemplateId](#templateid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="indentationlevel"></a>IndentationLevel|Indentation distance or depth when displaying the message. By default, it is 0, which means no indentation distance.|**int**|
|<a name="parameters"></a>Parameters|Message parameters are used to fill in the template that renders the message string.|[PerformanceInsightsMessageParameter](performanceinsightsmessageparameter.md) array|
|<a name="templateid"></a>TemplateId|The message template ID.|[PerformanceInsightsMessageTemplateId](performanceinsightsmessagetemplateid.md)|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[PerformanceInsightsDetail](performanceinsightsdetail.md)  
