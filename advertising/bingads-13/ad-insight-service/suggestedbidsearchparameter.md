---
title: SuggestedBidSearchParameter Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: The suggested bid search parameter filter that you can include when requesting keyword ideas.
---
# SuggestedBidSearchParameter Data Object - Ad Insight
The suggested bid search parameter filter that you can include when requesting keyword ideas.

If you do not include the suggested bid search parameter when calling [GetKeywordIdeas](getkeywordideas.md), then keyword ideas will be returned regardless of suggested bid.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="SuggestedBidSearchParameter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:SearchParameter">
      <xs:sequence>
        <xs:element minOccurs="0" name="Maximum" nillable="true" type="xs:double" />
        <xs:element minOccurs="0" name="Minimum" nillable="true" type="xs:double" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "SuggestedBidSearchParameter",
  "Maximum": DoubleValueHere,
  "Minimum": DoubleValueHere
}
```

-----

## <a name="elements"></a>Elements

The [SuggestedBidSearchParameter](suggestedbidsearchparameter.md) object has the following elements: [Maximum](#maximum), [Minimum](#minimum).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="maximum"></a>Maximum|The maximum suggested bid that you want for keyword ideas.|**double**|
|<a name="minimum"></a>Minimum|The minimum suggested bid that you want for keyword ideas.|**double**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

