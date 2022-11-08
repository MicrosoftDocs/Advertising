---
title: ExcludeAccountKeywordsSearchParameter Data Object - Ad Insight
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: The exclude account keywords search parameter filter that you can include when requesting keyword ideas.
ms.subservice: ad-insight-api
---
# ExcludeAccountKeywordsSearchParameter Data Object - Ad Insight
The exclude account keywords search parameter filter that you can include when requesting keyword ideas.

If you do not include the exclude account keywords search parameter when calling [GetKeywordIdeas](getkeywordideas.md), then keyword ideas will be returned whether or not they already exist in your account.

## Syntax
```xml
<xs:complexType name="ExcludeAccountKeywordsSearchParameter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:SearchParameter">
      <xs:sequence>
        <xs:element minOccurs="0" name="ExcludeAccountKeywords" type="xs:boolean" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [ExcludeAccountKeywordsSearchParameter](excludeaccountkeywordssearchparameter.md) object has the following elements: [ExcludeAccountKeywords](#excludeaccountkeywords).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="excludeaccountkeywords"></a>ExcludeAccountKeywords|Determines whether or not to exclude existing account keywords from the returned keyword ideas.<br/><br/>By default your existing account keywords will be included with the keyword idea data e.g., suggested bid. If you set the element *True* then the keyword ideas will not include any keywords for the same match type that already exist in your account.|**boolean**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

