---
title: GenderType Value Set Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the genders that are available for gender criterion.(test)
---
# GenderType Value Set Test - Campaign Management
Defines the genders that are available for gender criterion.

## Syntax
```xml
<xs:simpleType name="GenderType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Unknown" />
    <xs:enumeration value="Male" />
    <xs:enumeration value="Female" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [GenderType](gendertype.md) value set has the following values: [Female](#female), [Male](#male), [Unknown](#unknown).

|Value|Description|
|-----------|---------------|
|<a name="female"></a>Female|The gender is identified as female.|
|<a name="male"></a>Male|The gender is identified as male.|
|<a name="unknown"></a>Unknown|The gender is not known.<br/><br/>The unknown option is only available for ad groups in Audience campaigns.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GenderCriterion](gendercriterion.md)  
[GenderDimension](genderdimension.md)  
