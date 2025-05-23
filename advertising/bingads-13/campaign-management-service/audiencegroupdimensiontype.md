---
title: AudienceGroupDimensionType Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines an AudienceGroupDimensionType value set.
---
# AudienceGroupDimensionType Value Set - Campaign Management
Defines an AudienceGroupDimensionType value set. Contains Age, Audience, and Gender values.

## Syntax
```xml
<xs:simpleType name="AudienceGroupDimensionType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Age" />
    <xs:enumeration value="Gender" />
    <xs:enumeration value="Audience" />
    <xs:enumeration value="Profile" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AudienceGroupDimensionType](audiencegroupdimensiontype.md) value set has the following values: [Age](#age), [Audience](#audience), [Gender](#gender), [Profile](#profile).

|Value|Description|
|-----------|---------------|
|<a name="age"></a>Age|The age dimension type for an audience group.|
|<a name="audience"></a>Audience|The audience dimension type for an audience group.|
|<a name="gender"></a>Gender|The gender dimension type for an audience group.|
|<a name="profile"></a>Profile|Reserved.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AudienceGroupDimension](audiencegroupdimension.md)  
