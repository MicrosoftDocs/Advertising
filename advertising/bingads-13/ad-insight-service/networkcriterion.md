---
title: NetworkCriterion Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: The network criterion that you can include when requesting keyword ideas or traffic estimates.
---
# NetworkCriterion Data Object - Ad Insight
The network criterion that you can include when requesting keyword ideas or traffic estimates.

# [XML](#tab/xml)

```xml
<xs:complexType name="NetworkCriterion" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Criterion">
      <xs:sequence>
        <xs:element minOccurs="0" name="Network" type="tns:NetworkType" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Network": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [NetworkCriterion](networkcriterion.md) object has the following elements: [Network](#network).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="network"></a>Network|The network that you want to target.<br/><br/>Possible values are *OwnedAndOperatedAndSyndicatedSearch*, *OwnedAndOperatedOnly*, and *SyndicatedSearchOnly*.<br/><br/>*Note*: As of July 2024, Microsoft no longer offers the *SyndicatedSearchOnly* option as an ad distribution setting. We highly recommend that you switch to "The entire Microsoft Advertising Network" and leverage auto-biding to let Microsoft help you manage your budget.|[NetworkType](networktype.md)|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[NetworkSearchParameter](networksearchparameter.md)  
