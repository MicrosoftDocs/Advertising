---
title: AgeRange Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the possible age range values that you can use to target ads to people.
---
# AgeRange Value Set - Campaign Management
Defines the possible age range values that you can use to target ads to people.

## Syntax
```xml
<xs:simpleType name="AgeRange" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Unknown" />
    <xs:enumeration value="EighteenToTwentyFour" />
    <xs:enumeration value="TwentyFiveToThirtyFour" />
    <xs:enumeration value="ThirtyFiveToFourtyNine" />
    <xs:enumeration value="FiftyToSixtyFour" />
    <xs:enumeration value="SixtyFiveAndAbove" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AgeRange](agerange.md) value set has the following values: [EighteenToTwentyFour](#eighteentotwentyfour), [FiftyToSixtyFour](#fiftytosixtyfour), [SixtyFiveAndAbove](#sixtyfiveandabove), [ThirtyFiveToFourtyNine](#thirtyfivetofourtynine), [TwentyFiveToThirtyFour](#twentyfivetothirtyfour), [Unknown](#unknown).

|Value|Description|
|-----------|---------------|
|<a name="eighteentotwentyfour"></a>EighteenToTwentyFour|People from the ages of 18 through 24 years.|
|<a name="fiftytosixtyfour"></a>FiftyToSixtyFour|People from the ages of 50 through 64 years.|
|<a name="sixtyfiveandabove"></a>SixtyFiveAndAbove|People 65 years of age and older.|
|<a name="thirtyfivetofourtynine"></a>ThirtyFiveToFourtyNine|People from the ages of 35 through 49 years.|
|<a name="twentyfivetothirtyfour"></a>TwentyFiveToThirtyFour|People from the ages of 25 through 34 years.|
|<a name="unknown"></a>Unknown|People with unknown ages.<br/><br/>The unknown option is only available for ad groups in Audience campaigns.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AgeCriterion](agecriterion.md)  
