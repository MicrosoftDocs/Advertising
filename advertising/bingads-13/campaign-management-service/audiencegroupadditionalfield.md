---
title: AudienceGroupAdditionalField Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a list of optional audience group properties that you can request when calling GetAudienceGroupsByIds.
---
# AudienceGroupAdditionalField Value Set - Campaign Management
Defines a list of optional audience group properties that you can request when calling GetAudienceGroupsByIds.

## Syntax
```xml
<xs:simpleType name="AudienceGroupAdditionalField" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="ProfileDimension" />
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AudienceGroupAdditionalField](audiencegroupadditionalfield.md) value set has the following values: [ProfileDimension](#profiledimension).

|Value|Description|
|-----------|---------------|
|<a name="profiledimension"></a>ProfileDimension|Reserved.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetAudienceGroupsByIds](getaudiencegroupsbyids.md)  
