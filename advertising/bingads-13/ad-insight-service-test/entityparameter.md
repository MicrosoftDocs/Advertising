---
title: EntityParameter Data Object Test - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines an object that provides parameter information for an entity.(test)
---
# EntityParameter Data Object Test - Ad Insight
Defines an object that provides parameter information for an entity.

# [XML](#tab/xml)

```xml
<xs:complexType name="EntityParameter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:PerformanceInsightsMessageParameter">
      <xs:sequence>
        <xs:element minOccurs="0" name="EntityCount" type="xs:int" />
        <xs:element minOccurs="0" name="EntityDetails" nillable="true" type="tns:ArrayOfEntityDetail" />
        <xs:element minOccurs="0" name="EntityType" type="tns:PerformanceInsightsEntityType" />
        <xs:element minOccurs="0" name="SuggestedText" nillable="true" type="xs:string" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
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
```

-----

## <a name="elements"></a>Elements

The [EntityParameter](entityparameter.md) object has the following elements: [EntityCount](#entitycount), [EntityDetails](#entitydetails), [EntityType](#entitytype), [SuggestedText](#suggestedtext).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="entitycount"></a>EntityCount|The number of entities.|**int**|
|<a name="entitydetails"></a>EntityDetails|The detail information for entities.|[EntityDetail](entitydetail.md) array|
|<a name="entitytype"></a>EntityType|The entity type.|[PerformanceInsightsEntityType](performanceinsightsentitytype.md)|
|<a name="suggestedtext"></a>SuggestedText|The suggested string value to substitute for the message.|**string**|

The [EntityParameter](entityparameter.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementsperformanceinsightsmessageparameter"></a>Inherited Elements from PerformanceInsightsMessageParameter
The [EntityParameter](entityparameter.md) object derives from the [PerformanceInsightsMessageParameter](performanceinsightsmessageparameter.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [EntityParameter](entityparameter.md), and might not apply to other objects that inherit the same elements from the [PerformanceInsightsMessageParameter](performanceinsightsmessageparameter.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|Defines a string for the type of parameter: string, URL, or a list of demand entities.|[ParameterType](parametertype.md)|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

