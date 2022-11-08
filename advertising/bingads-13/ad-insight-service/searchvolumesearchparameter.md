---
title: SearchVolumeSearchParameter Data Object - Ad Insight
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: The search volume search parameter filter that you can include when requesting keyword ideas.
ms.subservice: ad-insight-api
---
# SearchVolumeSearchParameter Data Object - Ad Insight
The search volume search parameter filter that you can include when requesting keyword ideas.

If you do not include the search volume search parameter when calling [GetKeywordIdeas](getkeywordideas.md), then keyword ideas will be returned regardless of search volume.

## Syntax
```xml
<xs:complexType name="SearchVolumeSearchParameter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:SearchParameter">
      <xs:sequence>
        <xs:element minOccurs="0" name="Maximum" nillable="true" type="xs:long" />
        <xs:element minOccurs="0" name="Minimum" nillable="true" type="xs:long" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [SearchVolumeSearchParameter](searchvolumesearchparameter.md) object has the following elements: [Maximum](#maximum), [Minimum](#minimum).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="maximum"></a>Maximum|The maximum search volume that you want for keyword ideas.|**long**|
|<a name="minimum"></a>Minimum|The minimum search volume that you want for keyword ideas.|**long**|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

