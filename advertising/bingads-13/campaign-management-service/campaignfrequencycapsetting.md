---
title: CampaignFrequencyCapSetting Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the campaign frequency cap setting data object.
---
# CampaignFrequencyCapSetting Data Object - Campaign Management
Defines the campaign frequency cap setting data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="CampaignFrequencyCapSetting" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:complexContent mixed="false">
    <xs:extension base="tns:Setting">
      <xs:sequence>
        <xs:element minOccurs="0" name="CapValue" type="xs:int" />
        <xs:element minOccurs="0" name="TimeGranularity" type="tns:FrequencyCapTimeGranularity" />
      </xs:sequence>
    </xs:extension>
  </xs:complexContent>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Type": "CampaignFrequencyCapSetting",
  "CapValue": IntValueHere,
  "TimeGranularity": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [CampaignFrequencyCapSetting](campaignfrequencycapsetting.md) object has the following elements: [CapValue](#capvalue), [TimeGranularity](#timegranularity).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="capvalue"></a>CapValue|Reserved.|**int**|
|<a name="timegranularity"></a>TimeGranularity|Reserved.|[FrequencyCapTimeGranularity](frequencycaptimegranularity.md)|

The [CampaignFrequencyCapSetting](campaignfrequencycapsetting.md) object has [Inherited Elements](#inheritedelements).

## <a name="inheritedelements"></a>Inherited Elements

### <a name="inheritedelementssetting"></a>Inherited Elements from Setting
The [CampaignFrequencyCapSetting](campaignfrequencycapsetting.md) object derives from the [Setting](setting.md) object, and inherits the following elements: [Type](#type). The descriptions below are specific to [CampaignFrequencyCapSetting](campaignfrequencycapsetting.md), and might not apply to other objects that inherit the same elements from the [Setting](setting.md) object.  

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="type"></a>Type|Reserved.|**string**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

