---
title: CampaignPrivacyStatus Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the campaign privacy status value set.
---
# CampaignPrivacyStatus Value Set - Campaign Management
Defines the campaign privacy status value set.

## Syntax
```xml
<xs:simpleType name="CampaignPrivacyStatus" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Unknown" />
    <xs:enumeration value="Active" />
    <xs:enumeration value="TargetingTooNarrow" />
    <xs:enumeration value="Pending" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [CampaignPrivacyStatus](campaignprivacystatus.md) value set has the following values: [Active](#active), [Pending](#pending), [TargetingTooNarrow](#targetingtoonarrow), [Unknown](#unknown).

|Value|Description|
|-----------|---------------|
|<a name="active"></a>Active|The status is *Active*.|
|<a name="pending"></a>Pending|The status is *Pending*.|
|<a name="targetingtoonarrow"></a>TargetingTooNarrow|The status is *TargetingToonArrow*.|
|<a name="unknown"></a>Unknown|The status is *Unknown*.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[Campaign](campaign.md)  
