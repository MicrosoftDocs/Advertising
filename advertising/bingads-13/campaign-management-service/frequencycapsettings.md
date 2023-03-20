---
title: FrequencyCapSettings Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Reserved.
---
# FrequencyCapSettings Data Object - Campaign Management
Reserved.

## Syntax
```xml
<xs:complexType name="FrequencyCapSettings" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="CapValue" type="xs:int" />
    <xs:element minOccurs="0" name="FrequencyCapUnit" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="TimeGranularity" type="tns:FrequencyCapTimeGranularity" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [FrequencyCapSettings](frequencycapsettings.md) object has the following elements: [CapValue](#capvalue), [FrequencyCapUnit](#frequencycapunit), [TimeGranularity](#timegranularity).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="capvalue"></a>CapValue|Reserved.|**int**|
|<a name="frequencycapunit"></a>FrequencyCapUnit|Reserved.|**string**|
|<a name="timegranularity"></a>TimeGranularity|Reserved.|[FrequencyCapTimeGranularity](frequencycaptimegranularity.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AdGroup](adgroup.md)  
