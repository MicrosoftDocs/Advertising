---
title: UrlSearchParameter Data Object - Ad Insight
ms.service: bing-ads-ad-insight-service
ms.topic: article
author: eric-urban
ms.author: eur
description: The URL search parameter that you can use as a seed for new keyword ideas.
---
# UrlSearchParameter Data Object - Ad Insight
The URL search parameter that you can use as a seed for new keyword ideas.

## Syntax
```xml
<xs:complexType name="UrlSearchParameter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:SearchParameter">
      <xs:sequence>
        <xs:element minOccurs="0" name="Url" nillable="true" type="xs:string" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [UrlSearchParameter](urlsearchparameter.md) object has the following elements: [Url](#url).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="url"></a>Url|The URL of your website or a page on your website.<br/><br/>Microsoft Advertising extracts keywords from the HTML code on your website or landing page. If your HTML code contains Javascript, which generates content at runtime, Microsoft Advertising will not extract keywords rendered from the Javascript and you'll see fewer or no keywords.|**string**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

