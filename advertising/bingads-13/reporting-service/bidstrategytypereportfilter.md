---
title: BidStrategyTypeReportFilter Value Set - Reporting
ms.service: bing-ads
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the possible values that you can use to use to filter the report data by bid strategy type.
ms.subservice: reporting-api
---
# BidStrategyTypeReportFilter Value Set - Reporting
Defines the possible values that you can use to use to filter the report data by bid strategy type.

## Syntax
```xml
<xs:simpleType name="BidStrategyTypeReportFilter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="ManualCpc" />
        <xs:enumeration value="EnhancedCpc">
          <xs:annotation>
            <xs:appinfo>
              <EnumerationValue xmlns="http://schemas.microsoft.com/2003/10/Serialization/">16</EnumerationValue>
            </xs:appinfo>
          </xs:annotation>
        </xs:enumeration>
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [BidStrategyTypeReportFilter](bidstrategytypereportfilter.md) value set has the following values: [EnhancedCpc](#enhancedcpc), [ManualCpc](#manualcpc).

|Value|Description|
|-----------|---------------|
|<a name="enhancedcpc"></a>EnhancedCpc|The report will contain data related to keywords, ad groups, or campaigns that use the enhanced CPC bid strategy.|
|<a name="manualcpc"></a>ManualCpc|The report will contain data related to keywords, ad groups, or campaigns that use the manual CPC bid strategy.|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[DSAAutoTargetPerformanceReportFilter](dsaautotargetperformancereportfilter.md)  
[KeywordPerformanceReportFilter](keywordperformancereportfilter.md)  
[ShareOfVoiceReportFilter](shareofvoicereportfilter.md)  
