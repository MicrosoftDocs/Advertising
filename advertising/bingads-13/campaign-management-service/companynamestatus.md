---
title: CompanyNameStatus Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the possible company name status values.
---
# CompanyNameStatus Value Set - Campaign Management
Defines the possible company name status values.

## Syntax
```xml
<xs:simpleType name="CompanyNameStatus" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="NotProcessed" />
    <xs:enumeration value="Matched" />
    <xs:enumeration value="NoMatch" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [CompanyNameStatus](companynamestatus.md) value set has the following values: [Matched](#matched), [NoMatch](#nomatch), [NotProcessed](#notprocessed).

|Value|Description|
|-----------|---------------|
|<a name="matched"></a>Matched|There is a company name match.|
|<a name="nomatch"></a>NoMatch|There is no company name match.|
|<a name="notprocessed"></a>NotProcessed|The company name match isn't processed.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[CompanyName](companyname.md)  
