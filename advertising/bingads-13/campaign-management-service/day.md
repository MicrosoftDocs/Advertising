---
title: Day Value Set - Campaign Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the day values that you can specify for day and time criterion.
ms.subservice: campaign-management-api
---
# Day Value Set - Campaign Management
Defines the day values that you can specify for day and time criterion.

## Syntax
```xml
<xs:simpleType name="Day" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Sunday" />
    <xs:enumeration value="Monday" />
    <xs:enumeration value="Tuesday" />
    <xs:enumeration value="Wednesday" />
    <xs:enumeration value="Thursday" />
    <xs:enumeration value="Friday" />
    <xs:enumeration value="Saturday" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [Day](day.md) value set has the following values: [Friday](#friday), [Monday](#monday), [Saturday](#saturday), [Sunday](#sunday), [Thursday](#thursday), [Tuesday](#tuesday), [Wednesday](#wednesday).

|Value|Description|
|-----------|---------------|
|<a name="friday"></a>Friday|The day is Friday.|
|<a name="monday"></a>Monday|The day is Monday.|
|<a name="saturday"></a>Saturday|The day is Saturday.|
|<a name="sunday"></a>Sunday|The day is Sunday.|
|<a name="thursday"></a>Thursday|The day is Thursday.|
|<a name="tuesday"></a>Tuesday|The day is Tuesday.|
|<a name="wednesday"></a>Wednesday|The day is Wednesday.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[DayTime](daytime.md)  
[DayTimeCriterion](daytimecriterion.md)  
