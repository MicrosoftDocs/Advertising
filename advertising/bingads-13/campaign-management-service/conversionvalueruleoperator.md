---
title: ConversionValueRuleOperator Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Reserved.
---
# ConversionValueRuleOperator Value Set - Campaign Management
Reserved.

## Syntax
```xml
<xs:simpleType name="ConversionValueRuleOperator" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Add" />
    <xs:enumeration value="Multiply" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [ConversionValueRuleOperator](conversionvalueruleoperator.md) value set has the following values: [Add](#add), [Multiply](#multiply).

|Value|Description|
|-----------|---------------|
|<a name="add"></a>Add|Reserved.|
|<a name="multiply"></a>Multiply|Reserved.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[ConversionValueRule](conversionvaluerule.md)  
