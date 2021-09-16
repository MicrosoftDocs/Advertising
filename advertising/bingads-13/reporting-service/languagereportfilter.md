---
title: LanguageReportFilter Value Set - Reporting
ms.service: bing-ads-reporting-service
ms.topic: article
author: eric-urban
ms.author: eur
description: Defines the language values that you can use to filter the report data.
---
# LanguageReportFilter Value Set - Reporting
Defines the language values that you can use to filter the report data. These values are also used as column values in reports that include language, such as the keyword performance report.

## Syntax
```xml
<xs:simpleType name="LanguageReportFilter" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:list>
    <xs:simpleType>
      <xs:restriction base="xs:string">
        <xs:enumeration value="Danish" />
        <xs:enumeration value="Dutch" />
        <xs:enumeration value="English" />
        <xs:enumeration value="Finnish" />
        <xs:enumeration value="French" />
        <xs:enumeration value="German" />
        <xs:enumeration value="Italian" />
        <xs:enumeration value="Japanese" />
        <xs:enumeration value="Norwegian" />
        <xs:enumeration value="Portuguese" />
        <xs:enumeration value="Swedish" />
        <xs:enumeration value="Spanish" />
        <xs:enumeration value="Arabic" />
        <xs:enumeration value="Hebrew" />
        <xs:enumeration value="Korean" />
        <xs:enumeration value="Russian" />
        <xs:enumeration value="TraditionalChinese" />
        <xs:enumeration value="Greek" />
        <xs:enumeration value="Polish" />
        <xs:enumeration value="Czech" />
        <xs:enumeration value="Romanian" />
        <xs:enumeration value="Hungarian" />
        <xs:enumeration value="Slovak" />
        <xs:enumeration value="Bulgarian" />
        <xs:enumeration value="Croatian" />
        <xs:enumeration value="Lithuanian" />
        <xs:enumeration value="Slovenian" />
        <xs:enumeration value="Estonian" />
        <xs:enumeration value="Latvian" />
        <xs:enumeration value="Maltese" />
      </xs:restriction>
    </xs:simpleType>
  </xs:list>
</xs:simpleType>
```

## <a name="values"></a>Values

The [LanguageReportFilter](languagereportfilter.md) value set has the following values: [Arabic](#arabic), [Bulgarian](#bulgarian), [Croatian](#croatian), [Czech](#czech), [Danish](#danish), [Dutch](#dutch), [English](#english), [Estonian](#estonian), [Finnish](#finnish), [French](#french), [German](#german), [Greek](#greek), [Hebrew](#hebrew), [Hungarian](#hungarian), [Italian](#italian), [Japanese](#japanese), [Korean](#korean), [Latvian](#latvian), [Lithuanian](#lithuanian), [Maltese](#maltese), [Norwegian](#norwegian), [Polish](#polish), [Portuguese](#portuguese), [Romanian](#romanian), [Russian](#russian), [Slovak](#slovak), [Slovenian](#slovenian), [Spanish](#spanish), [Swedish](#swedish), [TraditionalChinese](#traditionalchinese).

|Value|Description|
|-----------|---------------|
|<a name="arabic"></a>Arabic|The report will contain data for ads that were viewed in Arabic.|
|<a name="bulgarian"></a>Bulgarian|The report will contain data for ads that were viewed in Bulgarian.|
|<a name="croatian"></a>Croatian|The report will contain data for ads that were viewed in Croatian.|
|<a name="czech"></a>Czech|The report will contain data for ads that were viewed in Czech.|
|<a name="danish"></a>Danish|The report will contain data for ads that were viewed in Danish.|
|<a name="dutch"></a>Dutch|The report will contain data for ads that were viewed in Dutch.|
|<a name="english"></a>English|The report will contain data for ads that were viewed in English.|
|<a name="estonian"></a>Estonian|The report will contain data for ads that were viewed in Estonian.|
|<a name="finnish"></a>Finnish|The report will contain data for ads that were viewed in Finnish.|
|<a name="french"></a>French|The report will contain data for ads that were viewed in French.|
|<a name="german"></a>German|The report will contain data for ads that were viewed in German.|
|<a name="greek"></a>Greek|The report will contain data for ads that were viewed in Greek.|
|<a name="hebrew"></a>Hebrew|The report will contain data for ads that were viewed in Hebrew.|
|<a name="hungarian"></a>Hungarian|The report will contain data for ads that were viewed in Hungarian.|
|<a name="italian"></a>Italian|The report will contain data for ads that were viewed in Italian.|
|<a name="japanese"></a>Japanese|The report will contain data for ads that were viewed in Japanese.|
|<a name="korean"></a>Korean|The report will contain data for ads that were viewed in Korean.|
|<a name="latvian"></a>Latvian|The report will contain data for ads that were viewed in Latvian.|
|<a name="lithuanian"></a>Lithuanian|The report will contain data for ads that were viewed in Lithuanian.|
|<a name="maltese"></a>Maltese|The report will contain data for ads that were viewed in Maltese.|
|<a name="norwegian"></a>Norwegian|The report will contain data for ads that were viewed in Norwegian.|
|<a name="polish"></a>Polish|The report will contain data for ads that were viewed in Polish.|
|<a name="portuguese"></a>Portuguese|The report will contain data for ads that were viewed in Portuguese.|
|<a name="romanian"></a>Romanian|The report will contain data for ads that were viewed in Romanian.|
|<a name="russian"></a>Russian|The report will contain data for ads that were viewed in Russian.|
|<a name="slovak"></a>Slovak|The report will contain data for ads that were viewed in Slovak.|
|<a name="slovenian"></a>Slovenian|The report will contain data for ads that were viewed in Slovenian.|
|<a name="spanish"></a>Spanish|The report will contain data for ads that were viewed in Spanish.|
|<a name="swedish"></a>Swedish|The report will contain data for ads that were viewed in Swedish.|
|<a name="traditionalchinese"></a>TraditionalChinese|The report will contain data for ads that were viewed in Traditional Chinese.|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[AdDynamicTextPerformanceReportFilter](addynamictextperformancereportfilter.md)  
[AdGroupPerformanceReportFilter](adgroupperformancereportfilter.md)  
[AdPerformanceReportFilter](adperformancereportfilter.md)  
[AgeGenderAudienceReportFilter](agegenderaudiencereportfilter.md)  
[DestinationUrlPerformanceReportFilter](destinationurlperformancereportfilter.md)  
[DSAAutoTargetPerformanceReportFilter](dsaautotargetperformancereportfilter.md)  
[DSACategoryPerformanceReportFilter](dsacategoryperformancereportfilter.md)  
[DSASearchQueryPerformanceReportFilter](dsasearchqueryperformancereportfilter.md)  
[GeographicPerformanceReportFilter](geographicperformancereportfilter.md)  
[KeywordPerformanceReportFilter](keywordperformancereportfilter.md)  
[ProductDimensionPerformanceReportFilter](productdimensionperformancereportfilter.md)  
[ProductPartitionPerformanceReportFilter](productpartitionperformancereportfilter.md)  
[ProductPartitionUnitPerformanceReportFilter](productpartitionunitperformancereportfilter.md)  
[ProductSearchQueryPerformanceReportFilter](productsearchqueryperformancereportfilter.md)  
[ProfessionalDemographicsAudienceReportFilter](professionaldemographicsaudiencereportfilter.md)  
[PublisherUsagePerformanceReportFilter](publisherusageperformancereportfilter.md)  
[SearchQueryPerformanceReportFilter](searchqueryperformancereportfilter.md)  
[ShareOfVoiceReportFilter](shareofvoicereportfilter.md)  
[UserLocationPerformanceReportFilter](userlocationperformancereportfilter.md)  
