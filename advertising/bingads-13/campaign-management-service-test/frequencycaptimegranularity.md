---
title: FrequencyCapTimeGranularity Value Set Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the possible values for FrequencyCapTimeGranularity.(test)
---
# FrequencyCapTimeGranularity Value Set Test - Campaign Management
Defines the possible values for FrequencyCapTimeGranularity.

## Syntax
```xml
<xs:simpleType name="FrequencyCapTimeGranularity" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:restriction base="xs:string">
    <xs:enumeration value="HOUR" />
    <xs:enumeration value="DAY" />
    <xs:enumeration value="WEEK" />
  </xs:restriction>
</xs:simpleType>
```

## <a name="values"></a>Values

The [FrequencyCapTimeGranularity](frequencycaptimegranularity.md) value set has the following values: [DAY](#day), [HOUR](#hour), [WEEK](#week).

|Value|Description|
|-----------|---------------|
|<a name="day"></a>DAY|The number of days to limit ad serves by.|
|<a name="hour"></a>HOUR|The number of hours to limit ad serves by.|
|<a name="week"></a>WEEK|The number of weeks to limit ad serves by.|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[FrequencyCapSettings](frequencycapsettings.md)  
