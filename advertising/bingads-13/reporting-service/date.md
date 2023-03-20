---
title: Date Data Object - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines a calendar date by month, day, and year.
---
# Date Data Object - Reporting
Defines a calendar date by month, day, and year.

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
|<a name="day"></a>Day|Specifies the day of the month.|**int**|
|<a name="month"></a>Month|Specifies the month.|**int**|
|<a name="year"></a>Year|Specifies the year.|**int**|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[ReportTime](reporttime.md)  
