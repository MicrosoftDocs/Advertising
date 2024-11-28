---
title: LanguageCriterion Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: The language criterion that you can include when requesting keyword ideas or traffic estimates.
---
# LanguageCriterion Data Object - Ad Insight
The language criterion that you can include when requesting keyword ideas or traffic estimates.

Suggestions are customized for the language you select.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="LanguageCriterion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Criterion">
      <xs:sequence>
        <xs:element minOccurs="0" name="Language" nillable="true" type="xs:string" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "LanguageCriterion",
  "Language": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [LanguageCriterion](languagecriterion.md) object has the following elements: [Language](#language).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="language"></a>Language|The language that you require.<br/><br/>Possible case-sensitive values are *English*, *French*, and *German*.|**string**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[LanguageSearchParameter](languagesearchparameter.md)  
