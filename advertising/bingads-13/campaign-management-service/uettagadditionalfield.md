---
title: UetTagAdditionalField Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a list of optional UET tag properties that you can request when calling GetUetTagsByIds.
---
# UetTagAdditionalField Value Set - Campaign Management
Defines a list of optional UET tag properties that you can request when calling GetUetTagsByIds.

## Syntax
```xml
<xs:simpleType name="UetTagAdditionalField" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="Industry" />
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [UetTagAdditionalField](uettagadditionalfield.md) value set has the following values: [Industry](#industry).

|Value|Description|
|-----------|---------------|
|<a name="industry"></a>Industry|The UET tag industry.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetUetTagsByIds](getuettagsbyids.md)  
