---
title: AppealStatus Value Set - Campaign Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the values that you use to determine whether an editorial issue is appealable.
ms.subservice: campaign-management-api
---
# AppealStatus Value Set - Campaign Management
Defines the values that you use to determine whether an editorial issue is appealable.

## Syntax
```xml
<xs:simpleType name="AppealStatus" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="Appealable">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">1</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="AppealPending">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">2</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
    <xs:enumeration value="NotAppealable">
      <xs:annotation>
        <xs:appinfo>
          <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">3</EnumerationValue>
        </xs:appinfo>
      </xs:annotation>
    </xs:enumeration>
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AppealStatus](appealstatus.md) value set has the following values: [Appealable](#appealable), [AppealPending](#appealpending), [NotAppealable](#notappealable).

|Value|Description|
|-----------|---------------|
|<a name="appealable"></a>Appealable|The editorial issue is appealable.|
|<a name="appealpending"></a>AppealPending|The editorial issue is appealable and an appeal has been submitted.|
|<a name="notappealable"></a>NotAppealable|The editorial issue is not appealable.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[EditorialReasonCollection](editorialreasoncollection.md)  
