---
title: ChangeTypeReportFilter Value Set - Reporting
ms.service: bing-ads-reporting-service
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the types of changes to entities by which you can filter the report data.
---
# ChangeTypeReportFilter Value Set - Reporting
Defines the types of changes to entities by which you can filter the report data. These values are also used as column values in the `HowChanged` column of the campaign change history report. For more information, see [SearchCampaignChangeHistoryReportColumn](searchcampaignchangehistoryreportcolumn.md).

## Syntax
```xml
<xs:simpleType name="ChangeTypeReportFilter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="Added" />
        <xs:enumeration value="Deleted" />
        <xs:enumeration value="Changed" />
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [ChangeTypeReportFilter](changetypereportfilter.md) value set has the following values: [Added](#added), [Changed](#changed), [Deleted](#deleted).

|Value|Description|
|-----------|---------------|
|<a name="added"></a>Added|The report will include data for entities that have been added.|
|<a name="changed"></a>Changed|The report will include data for elements of entities whose values have been updated.|
|<a name="deleted"></a>Deleted|The report will include data for entities that have been deleted.|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[SearchCampaignChangeHistoryReportFilter](searchcampaignchangehistoryreportfilter.md)  
