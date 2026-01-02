---
title: EffectiveEditorialStatus Value Set - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the possible effective editorial status values.
---
# EffectiveEditorialStatus Value Set - Campaign Management
Defines the possible effective editorial status values.

## Syntax
```xml
<xs:simpleType name="EffectiveEditorialStatus" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Unknown" />
    <xs:enumeration value="Approved" />
    <xs:enumeration value="Rejected">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">3</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="Pending">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">4</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [EffectiveEditorialStatus](effectiveeditorialstatus.md) value set has the following values: [Approved](#approved), [Pending](#pending), [Rejected](#rejected), [Unknown](#unknown).

|Value|Description|
|-----------|---------------|
|<a name="approved"></a>Approved|The status is *Approved*.|
|<a name="pending"></a>Pending|The status is *Pending*.|
|<a name="rejected"></a>Rejected|The status is *Rejected*.|
|<a name="unknown"></a>Unknown|The status is *Unknown*.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[CustomSegmentCatalog](customsegmentcatalog.md)  
