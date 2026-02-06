---
title: OfflineGoalDailySummary Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a data object for the granular, date-specific metrics for a conversion goal.
---
# OfflineGoalDailySummary Data Object - Campaign Management
Defines a data object for the granular, date-specific metrics for a conversion goal.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="OfflineGoalDailySummary" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="GoalId" type="xs:long" />
    <xs:element minOccurs="0" name="UploadDate" type="xs:dateTime" />
    <xs:element minOccurs="0" name="SuccessCount" type="xs:int" />
    <xs:element minOccurs="0" name="UnattributedCount" type="xs:int" />
    <xs:element minOccurs="0" name="SuccessRate" type="xs:decimal" />
    <xs:element minOccurs="0" name="Alerts" nillable="true" type="tns:ArrayOfOfflineConversionAlert" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Alerts": [
    {
      "Count": "LongValueHere",
      "UnattributedReason": "ValueHere"
    }
  ],
  "GoalId": "LongValueHere",
  "SuccessCount": IntValueHere,
  "SuccessRate": DecimalValueHere,
  "UnattributedCount": IntValueHere,
  "UploadDate": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [OfflineGoalDailySummary](offlinegoaldailysummary.md) object has the following elements: [Alerts](#alerts), [GoalId](#goalid), [SuccessCount](#successcount), [SuccessRate](#successrate), [UnattributedCount](#unattributedcount), [UploadDate](#uploaddate).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="alerts"></a>Alerts|Error alerts specific to this date's uploads.|[OfflineConversionAlert](offlineconversionalert.md) array|
|<a name="goalid"></a>GoalId|The unique identifier for the conversion goal.|**long**|
|<a name="successcount"></a>SuccessCount|Successful conversions for this specific date.|**int**|
|<a name="successrate"></a>SuccessRate|The success rate for this specific date, up to 6 decimal places.|**decimal**|
|<a name="unattributedcount"></a>UnattributedCount|Unattributed or failed conversions for this specific date.|**int**|
|<a name="uploaddate"></a>UploadDate|The specific date the conversions were processed.|**dateTime**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[OfflineGoalConversionSummary](offlinegoalconversionsummary.md)  
