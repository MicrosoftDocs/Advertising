---
title: NetworkType Value Set - Ad Insight
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the possible networks used for keyword research.
ms.subservice: ad-insight-api
---
# NetworkType Value Set - Ad Insight
Defines the possible networks used for keyword research. 

You can specify a network type when calling the [GetKeywordIdeas](getkeywordideas.md) and [GetKeywordTrafficEstimates](getkeywordtrafficestimates.md) operations. For more information about networks and ad distribution, see the [About Ad Distribution](https://help.ads.microsoft.com/#apex/3/en/50871/0) help article.

## Syntax
```xml
<xs:simpleType name="NetworkType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="OwnedAndOperatedAndSyndicatedSearch" />
    <xs:enumeration value="OwnedAndOperatedOnly">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="SyndicatedSearchOnly">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">3</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [NetworkType](networktype.md) value set has the following values: [OwnedAndOperatedAndSyndicatedSearch](#ownedandoperatedandsyndicatedsearch), [OwnedAndOperatedOnly](#ownedandoperatedonly), [SyndicatedSearchOnly](#syndicatedsearchonly).

|Value|Description|
|-----------|---------------|
|<a name="ownedandoperatedandsyndicatedsearch"></a>OwnedAndOperatedAndSyndicatedSearch|Indicates that you want keyword ideas or traffic estimates for ads on owned and operated networks, as well as syndicated search networks.<br/><br/>Owned and operated and syndicated search refers to the entire Microsoft Advertising Network (recommended).|
|<a name="ownedandoperatedonly"></a>OwnedAndOperatedOnly|Indicates that you want keyword ideas or traffic estimates for ads on only owned and operated networks.<br/><br/>Owned and operated networks refer to Microsoft sites and select traffic.|
|<a name="syndicatedsearchonly"></a>SyndicatedSearchOnly|Indicates that you want keyword ideas or traffic estimates for ads on only syndicated search networks.<br/><br/>Syndicated search refers to only partner traffic.|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[NetworkCriterion](networkcriterion.md)  
