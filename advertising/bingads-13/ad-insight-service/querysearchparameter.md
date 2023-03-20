---
title: QuerySearchParameter Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: The query search parameter that you can use as a seed for new keyword ideas.
---
# QuerySearchParameter Data Object - Ad Insight
The query search parameter that you can use as a seed for new keyword ideas.

## Syntax
```xml
<xs:complexType name="QuerySearchParameter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:SearchParameter">
      <xs:sequence>
        <xs:element minOccurs="0" name="Queries" nillable="true" type="q22:ArrayOfstring" xmlns:q22="http://schemas.microsoft.com/2003/10/Serialization/Arrays" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [QuerySearchParameter](querysearchparameter.md) object has the following elements: [Queries](#queries).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="queries"></a>Queries|Up to 200 words or phrases that describe what you're advertising.|**string** array|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

