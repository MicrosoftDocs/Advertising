---
title: DayTime Data Object - Campaign Management
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines a day of the week and time range for ad extension scheduling.
ms.subservice: campaign-management-api
---
# DayTime Data Object - Campaign Management
Defines a day of the week and time range for ad extension scheduling. 

## Syntax
```xml
<xs:complexType name="DayTime" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element name="Day" type="tns:Day" />
    <xs:element name="EndHour" type="xs:int" />
    <xs:element name="EndMinute" type="tns:Minute" />
    <xs:element name="StartHour" type="xs:int" />
    <xs:element name="StartMinute" type="tns:Minute" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [DayTime](daytime.md) object has the following elements: [Day](#day), [EndHour](#endhour), [EndMinute](#endminute), [StartHour](#starthour), [StartMinute](#startminute).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="day"></a>Day|The scheduled day of week.<br/><br/>**Add:** Required.<br/>**Update:** The *DayTime* object cannot be updated. |[Day](day.md)|
|<a name="endhour"></a>EndHour|The scheduled end hour.<br/><br/>The possible values range from 0 to 24, where *0* is equivalent to 12:00AM and *12* is 12:00PM.<br/><br/>**Add:** Required. <br/>**Update:** The *DayTime* object cannot be updated. |**int**|
|<a name="endminute"></a>EndMinute|The scheduled end minute.<br/><br/>The possible values range from 0 to 60.<br/><br/>**Add:** Required.<br/>**Update:** The *DayTime* object cannot be updated. |[Minute](minute.md)|
|<a name="starthour"></a>StartHour|The scheduled start hour.<br/><br/>The possible values range from 0 to 23, where *0* is equivalent to 12:00AM and *12* is 12:00PM.<br/><br/>**Add:** Required.<br/>**Update:** The *DayTime* object cannot be updated. |**int**|
|<a name="startminute"></a>StartMinute|The scheduled start minute.<br/><br/>The possible values range from 0 to 60.<br/><br/>**Add:** Required.<br/>**Update:** The *DayTime* object cannot be updated. |[Minute](minute.md)|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[Schedule](schedule.md)  
