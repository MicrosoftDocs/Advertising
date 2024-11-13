---
title: AccountStatusReportFilter Value Set - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: jonmeyers
ms.author: jonmeyers
ms.date: 11/13/2024
description: Defines the account status values that you can use to filter the report data.
---
# AccountStatusReportFilter Value Set - Reporting
Defines the account status values that you can use to filter the report data. These values are also used as column values in reports that include account status, such as the account performance report.

## Syntax
```xml
<xs:simpleType name="AccountStatusReportFilter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="Active" />
        <xs:enumeration value="Paused" />
        <xs:enumeration value="Inactive" />
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [AccountStatusReportFilter](accountstatusreportfilter.md) value set has the following values: [Active](#active), [Inactive](#inactive), [Paused](#paused).

|Value|Description|
|-----------|---------------|
|<a name="active"></a>Active|The report will contain accounts that are active.|
|<a name="inactive"></a>Inactive|The report will contain accounts that are not active.|
|<a name="paused"></a>Paused|The report will contain accounts that are paused.|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[AccountPerformanceReportFilter](accountperformancereportfilter.md)  
[AdDynamicTextPerformanceReportFilter](addynamictextperformancereportfilter.md)  
[AdExtensionByAdReportFilter](adextensionbyadreportfilter.md)  
[AdExtensionByKeywordReportFilter](adextensionbykeywordreportfilter.md)  
[AdExtensionDetailReportFilter](adextensiondetailreportfilter.md)  
[AdGroupPerformanceReportFilter](adgroupperformancereportfilter.md)  
[AdPerformanceReportFilter](adperformancereportfilter.md)  
[AgeGenderAudienceReportFilter](agegenderaudiencereportfilter.md)  
[AssetGroupPerformanceReportFilter](assetgroupperformancereportfilter.md)  
[AudiencePerformanceReportFilter](audienceperformancereportfilter.md)  
[CallDetailReportFilter](calldetailreportfilter.md)  
[CampaignPerformanceReportFilter](campaignperformancereportfilter.md)  
[ConversionPerformanceReportFilter](conversionperformancereportfilter.md)  
[DestinationUrlPerformanceReportFilter](destinationurlperformancereportfilter.md)  
[DSAAutoTargetPerformanceReportFilter](dsaautotargetperformancereportfilter.md)  
[DSACategoryPerformanceReportFilter](dsacategoryperformancereportfilter.md)  
[DSASearchQueryPerformanceReportFilter](dsasearchqueryperformancereportfilter.md)  
[GeographicPerformanceReportFilter](geographicperformancereportfilter.md)  
[GoalsAndFunnelsReportFilter](goalsandfunnelsreportfilter.md)  
[HotelDimensionPerformanceReportFilter](hoteldimensionperformancereportfilter.md)  
[HotelGroupPerformanceReportFilter](hotelgroupperformancereportfilter.md)  
[KeywordPerformanceReportFilter](keywordperformancereportfilter.md)  
[NegativeKeywordConflictReportFilter](negativekeywordconflictreportfilter.md)  
[ProductDimensionPerformanceReportFilter](productdimensionperformancereportfilter.md)  
[ProductNegativeKeywordConflictReportFilter](productnegativekeywordconflictreportfilter.md)  
[ProductPartitionPerformanceReportFilter](productpartitionperformancereportfilter.md)  
[ProductPartitionUnitPerformanceReportFilter](productpartitionunitperformancereportfilter.md)  
[ProductSearchQueryPerformanceReportFilter](productsearchqueryperformancereportfilter.md)  
[ProfessionalDemographicsAudienceReportFilter](professionaldemographicsaudiencereportfilter.md)  
[PublisherUsagePerformanceReportFilter](publisherusageperformancereportfilter.md)  
[SearchInsightPerformanceReportFilter](searchinsightperformancereportfilter.md)  
[SearchQueryPerformanceReportFilter](searchqueryperformancereportfilter.md)  
[ShareOfVoiceReportFilter](shareofvoicereportfilter.md)  
