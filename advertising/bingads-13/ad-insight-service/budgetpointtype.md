---
title: BudgetPointType Value Set - Ad Insight
ms.service: bing-ads-ad-insight-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the possible values of a campaign budget point.
---
# BudgetPointType Value Set - Ad Insight
Defines the possible values of a campaign budget point.

## Syntax
```xml
<xs:simpleType name="BudgetPointType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Current" />
    <xs:enumeration value="Suggested" />
    <xs:enumeration value="Maximum" />
    <xs:enumeration value="Other" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [BudgetPointType](budgetpointtype.md) value set has the following values: [Current](#current), [Maximum](#maximum), [Other](#other), [Suggested](#suggested).

|Value|Description|
|-----------|---------------|
|<a name="current"></a>Current|The budget point includes the current budget.|
|<a name="maximum"></a>Maximum|The budget point includes the proposed budget which is estimated to yield the maximum number of clicks.|
|<a name="other"></a>Other|The budget point includes a proposed budget other than current, maximum, or suggested.|
|<a name="suggested"></a>Suggested|The budget point includes the optimal suggested budget. The proposed budget is estimated to yield the optimal ratio of increased clicks to minimal budget increase.|

## Requirements
Service: [AdInsightService.svc v13](https://adinsight.api.bingads.microsoft.com/Api/Advertiser/AdInsight/v13/AdInsightService.svc)  
Namespace: https\://bingads.microsoft.com/AdInsight/v13  

## Used By
[BudgetPoint](budgetpoint.md)  
