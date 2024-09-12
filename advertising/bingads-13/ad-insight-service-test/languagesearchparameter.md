---
title: LanguageSearchParameter Data Object Test - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: The language search parameter filter that you can include when requesting keyword ideas.(test)
---
# LanguageSearchParameter Data Object Test - Ad Insight
The language search parameter filter that you can include when requesting keyword ideas.

If you do not include the language search parameter when calling [GetKeywordIdeas](getkeywordideas.md), then keyword ideas will be returned for all languages.

# [XML](#tab/xml)

```xml
<xs:complexType name="LanguageSearchParameter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:SearchParameter">
      <xs:sequence>
        <xs:element minOccurs="0" name="Languages" nillable="true" type="tns:ArrayOfLanguageCriterion" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Languages": [
    {
      "Language": "ValueHere"
    }
  ]
}
```

-----

## <a name="elements"></a>Elements

The [LanguageSearchParameter](languagesearchparameter.md) object has the following elements: [Languages](#languages).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="languages"></a>Languages|The language criterion list for the returned keyword ideas.|[LanguageCriterion](languagecriterion.md) array|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

