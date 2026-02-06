---
title: OfflineGoalConversionSummary Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines a data object for a container that stores offline conversion metrics for a specific goal.
---
# OfflineGoalConversionSummary Data Object - Campaign Management
Defines a data object for a container that stores offline conversion metrics for a specific goal.

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="OfflineGoalConversionSummary" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="GoalId" type="xs:long" />
    <xs:element minOccurs="0" name="ConversionName" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="OverallSuccessCount" type="xs:long" />
    <xs:element minOccurs="0" name="OverallUnattributedCount" type="xs:long" />
    <xs:element minOccurs="0" name="OverallSuccessRate" type="xs:decimal" />
    <xs:element minOccurs="0" name="OverallAlerts" nillable="true" type="tns:ArrayOfOfflineConversionAlert" />
    <xs:element minOccurs="0" name="DailySummaries" nillable="true" type="tns:ArrayOfOfflineGoalDailySummary" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "ConversionName": "ValueHere",
  "DailySummaries": [
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
  ],
  "GoalId": "LongValueHere",
  "OverallAlerts": [
    {
      "Count": "LongValueHere",
      "UnattributedReason": "ValueHere"
    }
  ],
  "OverallSuccessCount": "LongValueHere",
  "OverallSuccessRate": DecimalValueHere,
  "OverallUnattributedCount": "LongValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [OfflineGoalConversionSummary](offlinegoalconversionsummary.md) object has the following elements: [ConversionName](#conversionname), [DailySummaries](#dailysummaries), [GoalId](#goalid), [OverallAlerts](#overallalerts), [OverallSuccessCount](#overallsuccesscount), [OverallSuccessRate](#overallsuccessrate), [OverallUnattributedCount](#overallunattributedcount).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="conversionname"></a>ConversionName|The user-defined name of the conversion goal.|**string**|
|<a name="dailysummaries"></a>DailySummaries|A breakdown of performance metrics for each individual day within the requested range.|[OfflineGoalDailySummary](offlinegoaldailysummary.md) array|
|<a name="goalid"></a>GoalId|The unique identifier for the conversion goal.|**long**|
|<a name="overallalerts"></a>OverallAlerts|A collection of aggregated error reasons explaining why conversions were unattributed.|[OfflineConversionAlert](offlineconversionalert.md) array|
|<a name="overallsuccesscount"></a>OverallSuccessCount|The total number of successful conversions attributed during the requested period.|**long**|
|<a name="overallsuccessrate"></a>OverallSuccessRate|The ratio of successful conversions to total uploads (*Success / Total*), represented with up to 6 decimal places.|**decimal**|
|<a name="overallunattributedcount"></a>OverallUnattributedCount|The total number of conversions that couldn't be attributed to a click or valid goal.|**long**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[GetOfflineConversionReportByGoalIds](getofflineconversionreportbygoalids.md)  
