---
title: WebpageConditionOperator Value Set - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Reserved.
---
# WebpageConditionOperator Value Set - Campaign Management
Reserved.

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
|<a name="contains"></a>Contains|Reserved.|
|<a name="equals"></a>Equals|Reserved.|
|<a name="unknown"></a>Unknown|Reserved.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[WebpageCondition](webpagecondition.md)  
