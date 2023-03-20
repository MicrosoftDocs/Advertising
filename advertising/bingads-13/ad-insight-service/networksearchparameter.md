---
title: NetworkSearchParameter Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: The network search parameter filter that you can include when requesting keyword ideas.
---
# NetworkSearchParameter Data Object - Ad Insight
The network search parameter filter that you can include when requesting keyword ideas.

If you do not include the network search parameter when calling [GetKeywordIdeas](getkeywordideas.md), then keyword ideas will be returned for all networks.

## Syntax
```xml
<xs:complexType name="NetworkSearchParameter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:SearchParameter">
      <xs:sequence>
        <xs:element minOccurs="0" name="Network" nillable="true" type="tns:NetworkCriterion" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [NetworkSearchParameter](networksearchparameter.md) object has the following elements: [Network](#network).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="network"></a>Network|The network criterion for the returned keyword ideas.|[NetworkCriterion](networkcriterion.md)|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

