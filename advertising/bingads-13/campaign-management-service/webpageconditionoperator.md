---
title: WebpageConditionOperator Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the possible operator values that can be applied to the argument of a webpage condition for dynamic search ads.
---
# WebpageConditionOperator Value Set - Campaign Management
Defines the possible operator values that can be applied to the argument of a webpage condition for dynamic search ads.

## Syntax
```xml
<xs:simpleType name="WebpageConditionOperator" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Unknown" />
    <xs:enumeration value="Equals" />
    <xs:enumeration value="Contains" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [WebpageConditionOperator](webpageconditionoperator.md) value set has the following values: [Contains](#contains), [Equals](#equals), [Unknown](#unknown).

|Value|Description|
|-----------|---------------|
|<a name="contains"></a>Contains|The property should contain the corresponding argument value.|
|<a name="equals"></a>Equals|The property should be equal to the corresponding argument value.|
|<a name="unknown"></a>Unknown|For future use.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[WebpageCondition](webpagecondition.md)  
