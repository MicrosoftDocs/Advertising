---
title: IdeaTextSearchParameter Data Object - Ad Insight
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: The idea text search parameter filter that you can include when requesting keyword ideas.
ms.subservice: ad-insight-api
---
# IdeaTextSearchParameter Data Object - Ad Insight
The idea text search parameter filter that you can include when requesting keyword ideas.

Use these options to refine what keywords are returned when calling [GetKeywordIdeas](getkeywordideas.md). You can limit the keyword ideas to include or exclude specific keywords. 

## Syntax
```xml
<xs:complexType name="IdeaTextSearchParameter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:SearchParameter">
      <xs:sequence>
        <xs:element minOccurs="0" name="Excluded" nillable="true" type="tns:ArrayOfKeyword" />
        <xs:element minOccurs="0" name="Included" nillable="true" type="tns:ArrayOfKeyword" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [IdeaTextSearchParameter](ideatextsearchparameter.md) object has the following elements: [Excluded](#excluded), [Included](#included).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="excluded"></a>Excluded|The list of keywords that you explicitly want excluded from the list of returned keyword ideas.<br/><br/>The match type of each keyword must be set to Broad.|[Keyword](keyword.md) array|
|<a name="included"></a>Included|The list of keywords that you explicitly want included in the list of returned keyword ideas.<br/><br/>The match type of each keyword must be set to Broad.|[Keyword](keyword.md) array|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

