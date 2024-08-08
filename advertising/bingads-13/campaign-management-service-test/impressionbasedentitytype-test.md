---
title: ImpressionBasedEntityType Value Set Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Reserved.(test)
---
# ImpressionBasedEntityType Value Set Test - Campaign Management
Reserved.

## Syntax
```xml
<xs:simpleType name="ImpressionBasedEntityType" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="None" />
    <xs:enumeration value="Campaign" />
    <xs:enumeration value="AdGroup" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [ImpressionBasedEntityType](impressionbasedentitytype.md) value set has the following values: [AdGroup](#adgroup), [Campaign](#campaign), [None](#none).

|Value|Description|
|-----------|---------------|
|<a name="adgroup"></a>AdGroup|Reserved.|
|<a name="campaign"></a>Campaign|Reserved.|
|<a name="none"></a>None|Reserved.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[ImpressionBasedRemarketingList](impressionbasedremarketinglist.md)  
