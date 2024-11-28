---
title: Frequency Data Object - Campaign Management
ms.service: bing-ads
ms.subservice: campaign-management-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Determines whether an import job should be run once or scheduled on a recurring basis.
---
# Frequency Data Object - Campaign Management
Determines whether an import job should be run once or scheduled on a recurring basis.  

You can schedule a recurring import e.g., "Every Sunday at 4:00 PM" or you can run the import once.  

- Auto: Microsoft Advertising will run imports on a varying schedule that will best optimize your campaigns.  
- Now: Import once as soon as you call the [AddImportJobs](addimportjobs.md) operation.  
- Once: Import once at the time you specify.
- Daily: Import once per day at the time you specify.
- Weekly: Import once per week at the time you specify.
- Monthly: Import once per month at the time you specify.

To run the import "now", you can leave the Google import job [Frequency](googleimportjob.md#frequency) element nil or empty. For all other scheduling options, set the frequency [Type](#type) and [Cron](#cron) values. For details about supported frequency values, see the [Remarks](#remarks) below. 

## Syntax

# [XML](#tab/xml)

```xml
<xs:complexType name="Frequency" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="Cron" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="TimeZone" nillable="true" type="xs:string" />
    <xs:element minOccurs="0" name="Type" nillable="true" type="xs:string" />
  </xs:sequence>
</xs:complexType>
```

# [JSON](#tab/json)

```json
{
  "Cron": "ValueHere",
  "TimeZone": "ValueHere",
  "Type": "ValueHere"
}
```

-----

## <a name="elements"></a>Elements

The [Frequency](frequency.md) object has the following elements: [Cron](#cron), [TimeZone](#timezone), [Type](#type).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="cron"></a>Cron|Represents a simplified implementation of Cron frequency.<br/><br/>For example, set the string to "0 16 * * 3 *" if you want the import to run weekly, every Wednesday at 4:00 PM.<br/><br/>For details about supported frequency values, see the [Remarks](#remarks).<br/><br/>**Add:** Required if the [Type](#type) is set to "Scheduling", and otherwise the cron value is ignored.|**string**|
|<a name="timezone"></a>TimeZone|The time zone used for the import schedule.<br/><br/>For possible values, see [Time Zones](../guides/time-zones.md).<br/><br/>**Add:** Optional. If you do not set this element, then "GreenwichMeanTimeDublinEdinburghLisbonLondon" (UTC+0) will be used by default.|**string**|
|<a name="type"></a>Type|The scheduling frequency type.<br/><br/>Set this element to "Scheduling" if you want to choose a specific [Cron](#cron) value, whether the import job should run once or on a recurring basis.<br/><br/>Set this element to "Auto" if you want Microsoft Advertising to run imports on a varying schedule that will best optimize your campaigns.<br/><br/>If you want the import to run now, you can either set this element to "RunNow" or do not set the Google import job [Frequency](googleimportjob.md#frequency) element at all.<br/><br/>**Add:** Required|**string**|

## <a name="remarks"></a>Remarks
Scheduled imports support a simplified implementation of Cron with up to six ordered components. 

```txt
* * * * * *
- - - - - -
| | | | | | 
| | | | | +----- year (1 - 9999) 
| | | | +----- day of week (0 - 6) (Sunday=0)
| | | +------- month (1 - 12)
| | +--------- day of month (1 - 31)
| +----------- hour (0 - 23)
+------------- min (0)
```

Here are some valid examples.

|Cron string|Import frequency|
|-----|-----|
|"0 2 15 09 * 2020"|Run once on September 15, 2020 at 2:00AM|
|"0 16 * * * *"|Run daily at 4:00 PM|
|"0 16 * * 3 *"|Run weekly, every Wednesday at 4:00 PM|
|"0 16 1 * * *"|Run monthly, the 1st day of every month at 4:00 PM|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[ImportJob](importjob.md)  
