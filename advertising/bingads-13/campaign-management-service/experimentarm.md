---
title: ExperimentArm Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the experiment arm data object.
---
# ExperimentArm Data Object - Campaign Management
Defines the experiment arm data object.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="ExperimentArm" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element xmlns:q143="http://schemas.microsoft.com/2003/10/Serialization/Arrays" minOccurs="0" name="CampaignIds" nillable="true" type="q143:ArrayOflong" />
    <xs:element minOccurs="0" name="Id" nillable="true" type="xs:long" />
    <xs:element minOccurs="0" name="IsControlArm" type="xs:boolean" />
    <xs:element minOccurs="0" name="TrafficSplit" type="xs:int" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "CampaignIds": [
    "LongValueHere"
  ],
  "Id": "LongValueHere",
  "IsControlArm": "ValueHere",
  "TrafficSplit": IntValueHere
}
```

-----

## <a name="elements"></a>Elements

The [ExperimentArm](experimentarm.md) object has the following elements: [CampaignIds](#campaignids), [Id](#id), [IsControlArm](#iscontrolarm), [TrafficSplit](#trafficsplit).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="campaignids"></a>CampaignIds|The campaign IDs.|**long** array|
|<a name="id"></a>Id|The experiment arm ID.|**long**|
|<a name="iscontrolarm"></a>IsControlArm|The experiment arm is a control arm.|**boolean**|
|<a name="trafficsplit"></a>TrafficSplit|The traffic split number.|**int**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[Experiment](experiment.md)  
