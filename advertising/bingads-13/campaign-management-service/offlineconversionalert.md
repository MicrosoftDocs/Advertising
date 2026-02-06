---
title: OfflineConversionAlert Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a data object for detailed information about unattributed conversions.



---
# OfflineConversionAlert Data Object - Campaign Management
Defines a data object for detailed information about unattributed conversions.


## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="OfflineConversionAlert" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="UnattributedReason" type="tns:OfflineConversionUnattributedReason" />
    <xs:element minOccurs="0" name="Count" type="xs:long" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Count": "LongValueHere",
  "UnattributedReason": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [OfflineConversionAlert](offlineconversionalert.md) object has the following elements: [Count](#count), [UnattributedReason](#unattributedreason).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="count"></a>Count|The number of times this specific error occurred.|**long**|
|<a name="unattributedreason"></a>UnattributedReason|The specific reason for the failure.|[OfflineConversionUnattributedReason](offlineconversionunattributedreason.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[OfflineGoalConversionSummary](offlinegoalconversionsummary.md)  
[OfflineGoalDailySummary](offlinegoaldailysummary.md)  
