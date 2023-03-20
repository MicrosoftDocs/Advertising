---
title: ExpressionOperator Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the operators that can be applied to expressions within a conversion goal.
---
# ExpressionOperator Value Set - Campaign Management
Defines the operators that can be applied to expressions within a conversion goal. 

## Syntax
```xml
<xs:simpleType name="ExpressionOperator" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Equals" />
    <xs:enumeration value="BeginsWith" />
    <xs:enumeration value="RegularExpression" />
    <xs:enumeration value="Contains" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [ExpressionOperator](expressionoperator.md) value set has the following values: [BeginsWith](#beginswith), [Contains](#contains), [Equals](#equals), [RegularExpression](#regularexpression).

|Value|Description|
|-----------|---------------|
|<a name="beginswith"></a>BeginsWith|The property should begin with the corresponding fixed string expression.|
|<a name="contains"></a>Contains|The property should contain the corresponding fixed string expression.|
|<a name="equals"></a>Equals|The property should be equal to the corresponding fixed string expression.|
|<a name="regularexpression"></a>RegularExpression|The property should match the corresponding regular expression.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[EventGoal](eventgoal.md)  
[UrlGoal](urlgoal.md)  
