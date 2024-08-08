---
title: FrequencyCapSettings Data Object Test - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
description: Defines the FrequencyCapSettings object.(test)
---
# FrequencyCapSettings Data Object Test - Campaign Management
Defines the FrequencyCapSettings object.

# [XML](#tab/xml)

```xml
<xs:complexType name="FrequencyCapSettings" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="CapValue" type="xs:int" />
    <xs:element minOccurs="0" name="TimeGranularity" type="tns:FrequencyCapTimeGranularity" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "CapValue": "ValueHere",
  "TimeGranularity": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [FrequencyCapSettings](frequencycapsettings.md) object has the following elements: [CapValue](#capvalue), [TimeGranularity](#timegranularity).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="capvalue"></a>CapValue|A limit to the number of times an ad is shown.|**int**|
|<a name="timegranularity"></a>TimeGranularity|The smallest time interval to limit ad serves. Values are *Hour*, *Day*, *Week*.|[FrequencyCapTimeGranularity](frequencycaptimegranularity.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AdGroup](adgroup.md)  
