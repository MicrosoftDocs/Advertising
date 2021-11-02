---
title: Date Data Object - Campaign Management
ms.service: bing-ads-campaign-management-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Represents a date.
---
# Date Data Object - Campaign Management
Represents a date.

## Syntax
```xml
<xs:complexType name="Date" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element name="Day" type="xs:int" />
    <xs:element name="Month" type="xs:int" />
    <xs:element name="Year" type="xs:int" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [Date](date.md) object has the following elements: [Day](#day), [Month](#month), [Year](#year).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="day"></a>Day|Specifies the day of the month.<br/><br/>**Add:** Required<br/>**Update:** Required|**int**|
|<a name="month"></a>Month|Specifies the month.<br/><br/>**Add:** Required<br/>**Update:** Required|**int**|
|<a name="year"></a>Year|Specifies the year.<br/><br/>**Add:** Required<br/>**Update:** Required|**int**|

## Requirements
Service: [CampaignManagementService.svc v13](https://campaign.api.bingads.microsoft.com/Api/Advertiser/CampaignManagement/v13/CampaignManagementService.svc)  
Namespace: https\://bingads.microsoft.com/CampaignManagement/v13  

## Used By
[AdGroup](adgroup.md)  
[Experiment](experiment.md)  
[PromotionAdExtension](promotionadextension.md)  
[Schedule](schedule.md)  
