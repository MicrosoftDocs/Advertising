---
title: LinkedInSegmentType Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: The LinkedIn segment type value set.
---
# LinkedInSegmentType Value Set - Campaign Management
The LinkedIn segment type value set.

## Syntax
```xml
<xs:simpleType name="LinkedInSegmentType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="CompanyList" />
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [LinkedInSegmentType](linkedinsegmenttype.md) value set has the following values: [CompanyList](#companylist).

|Value|Description|
|-----------|---------------|
|<a name="companylist"></a>CompanyList|The LinkedIn company list.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetLinkedInSegments](getlinkedinsegments.md)  
