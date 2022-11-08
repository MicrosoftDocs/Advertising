---
title: DistanceUnit Value Set - Campaign Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the possible distance units of a geographical location.
ms.subservice: campaign-management-api
---
# DistanceUnit Value Set - Campaign Management
Defines the possible distance units of a geographical location.

## Syntax
```xml
<xs:simpleType name="DistanceUnit" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:annotation>
    <xs:appinfo>
      <ActualType Name="short" Namespace="http://www.w3.org/2001/XMLSchema" xmlns="http://schemas.microsoft.com/2003/10/Serialization/" />
    </xs:appinfo>
  </xs:annotation>
  <xs:restriction base="xs:string">
    <xs:enumeration value="Miles" />
    <xs:enumeration value="Kilometers" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [DistanceUnit](distanceunit.md) value set has the following values: [Kilometers](#kilometers), [Miles](#miles).

|Value|Description|
|-----------|---------------|
|<a name="kilometers"></a>Kilometers|The distance of the specified geographical location is specified in kilometers.|
|<a name="miles"></a>Miles|The distance of the specified geographical location is specified in miles.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[RadiusCriterion](radiuscriterion.md)  
