---
title: LinkedInSegmentStatus Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the possible LinkedIn segment status values.
---
# LinkedInSegmentStatus Value Set - Campaign Management
Defines the possible LinkedIn segment status values.

## Syntax
```xml
<xs:simpleType name="LinkedInSegmentStatus" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Building" />
    <xs:enumeration value="Ready" />
    <xs:enumeration value="ReachTooSmall" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [LinkedInSegmentStatus](linkedinsegmentstatus.md) value set has the following values: [Building](#building), [ReachTooSmall](#reachtoosmall), [Ready](#ready).

|Value|Description|
|-----------|---------------|
|<a name="building"></a>Building|The status is *Building*.|
|<a name="reachtoosmall"></a>ReachTooSmall|The status is *ReachTooSmall*.|
|<a name="ready"></a>Ready|The status is *Ready*.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[LinkedInSegment](linkedinsegment.md)  
