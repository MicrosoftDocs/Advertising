---
title: AgeEnum Value Set - Ad Insight
ms.service: bing-ads
ms.subservice: ad-insight-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a value set of age ranges.
---
# AgeEnum Value Set - Ad Insight
Defines a value set of age ranges.

## Syntax
```xml
<xs:simpleType name="AgeEnum" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Unknown" />
    <xs:enumeration value="ZeroToTwelve" />
    <xs:enumeration value="ThirteenToSevenTeen" />
    <xs:enumeration value="EighteenToTwentyFour" />
    <xs:enumeration value="TwentyFiveToThirtyFour" />
    <xs:enumeration value="ThirtyFiveToFourtyNine" />
    <xs:enumeration value="FiftyToSixtyFour" />
    <xs:enumeration value="SixtyFiveAndAbove" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AgeEnum](ageenum.md) value set has the following values: [EighteenToTwentyFour](#eighteentotwentyfour), [FiftyToSixtyFour](#fiftytosixtyfour), [SixtyFiveAndAbove](#sixtyfiveandabove), [ThirteenToSevenTeen](#thirteentoseventeen), [ThirtyFiveToFourtyNine](#thirtyfivetofourtynine), [TwentyFiveToThirtyFour](#twentyfivetothirtyfour), [Unknown](#unknown), [ZeroToTwelve](#zerototwelve).

|Value|Description|
|-----------|---------------|
|<a name="eighteentotwentyfour"></a>EighteenToTwentyFour|The age range is 18 to 24.|
|<a name="fiftytosixtyfour"></a>FiftyToSixtyFour|The age range is 50 to 64.|
|<a name="sixtyfiveandabove"></a>SixtyFiveAndAbove|The age range is above 65.|
|<a name="thirteentoseventeen"></a>ThirteenToSevenTeen|The age range is 13 to 17.|
|<a name="thirtyfivetofourtynine"></a>ThirtyFiveToFourtyNine|The age range is 35 to 49.|
|<a name="twentyfivetothirtyfour"></a>TwentyFiveToThirtyFour|The age range is 25 to 34.|
|<a name="unknown"></a>Unknown|The age range is unknown.|
|<a name="zerototwelve"></a>ZeroToTwelve|The age range is 0 to 12.|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[SelectionOfAgeEnum](selectionofageenum.md)  
