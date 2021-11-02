---
title: KeywordIdEstimatedBid Data Object - Ad Insight
ms.service: bing-ads-ad-insight-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines an object that contains the identifier of the keyword and the suggested bid value for the keyword and match type.
---
# KeywordIdEstimatedBid Data Object - Ad Insight
Defines an object that contains the identifier of the keyword and the suggested bid value for the keyword and match type.

> [!NOTE]
> The estimates are not a prediction or guarantee of future performance.

## Syntax
```xml
<xs:complexType name="KeywordIdEstimatedBid" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="KeywordId" type="xs:long" />
    <xs:element minOccurs="0" name="KeywordEstimatedBid" nillable="true" type="tns:KeywordEstimatedBid" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [KeywordIdEstimatedBid](keywordidestimatedbid.md) object has the following elements: [KeywordEstimatedBid](#keywordestimatedbid), [KeywordId](#keywordid).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="keywordestimatedbid"></a>KeywordEstimatedBid|An object that contains the keyword string and the suggested bid value for each match type.|[KeywordEstimatedBid](keywordestimatedbid.md)|
|<a name="keywordid"></a>KeywordId|The identifier of the keyword to which the suggested bid applies.|**long**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[GetEstimatedBidByKeywordIds](getestimatedbidbykeywordids.md)  
