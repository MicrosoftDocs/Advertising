---
title: CompetitionSearchParameter Data Object - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: The competition search parameter filter that you can include when requesting keyword ideas.
---
# CompetitionSearchParameter Data Object - Ad Insight
The competition search parameter filter that you can include when requesting keyword ideas.

If you do not include the competition search parameter when calling [GetKeywordIdeas](getkeywordideas.md), then keyword ideas will be returned for all competition levels.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="CompetitionSearchParameter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:SearchParameter">
      <xs:sequence>
        <xs:element minOccurs="0" name="CompetitionLevels" nillable="true" type="tns:ArrayOfCompetitionLevel" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "CompetitionSearchParameter",
  "CompetitionLevels": [
    "ValueHere"
  ]
}
```

-----

## <a name="elements"></a>Elements

The [CompetitionSearchParameter](competitionsearchparameter.md) object has the following elements: [CompetitionLevels](#competitionlevels).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="competitionlevels"></a>CompetitionLevels|The competition levels that you want for the returned keyword ideas.<br/><br/>Competition levels are defined by the number of advertisers bidding on this keyword, relative to all other keywords across Microsoft Advertising. Possible values are *Low*, *Medium*, and *High*.|[CompetitionLevel](competitionlevel.md) array|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

