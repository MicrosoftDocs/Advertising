---
title: AudienceGroupDimensionType Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Reserved.
---
# AudienceGroupDimensionType Value Set - Campaign Management
Reserved.

## Syntax
```xml
<xs:simpleType name="AudienceGroupDimensionType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Age" />
    <xs:enumeration value="Gender" />
    <xs:enumeration value="Audience" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AudienceGroupDimensionType](audiencegroupdimensiontype.md) value set has the following values: [Age](#age), [Audience](#audience), [Gender](#gender).

|Value|Description|
|-----------|---------------|
|<a name="age"></a>Age|Reserved.|
|<a name="audience"></a>Audience|Reserved.|
|<a name="gender"></a>Gender|Reserved.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AudienceGroupDimension](audiencegroupdimension.md)  
