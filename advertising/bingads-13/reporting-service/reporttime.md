---
title: ReportTime Data Object - Reporting
ms.service: bing-ads
ms.subservice: reporting-api
ms.topic: article
author: rgaritta
ms.author: v-rgaritta
description: Defines the date range values of a report request.
---
# ReportTime Data Object - Reporting
Defines the date range values of a report request.

## Syntax
```xml
<xs:complexType name="ReportTime" xmlns:xs="http://www.w3.org/2001/XMLSchema">
  <xs:sequence>
    <xs:element minOccurs="0" name="CustomDateRangeEnd" nillable="true" type="tns:Date" />
    <xs:element minOccurs="0" name="CustomDateRangeStart" nillable="true" type="tns:Date" />
    <xs:element minOccurs="0" name="PredefinedTime" nillable="true" type="tns:ReportTimePeriod" />
    <xs:element minOccurs="0" name="ReportTimeZone" nillable="true" type="tns:ReportTimeZone" />
  </xs:sequence>
</xs:complexType>
```

## <a name="elements"></a>Elements

The [ReportTime](reporttime.md) object has the following elements: [CustomDateRangeEnd](#customdaterangeend), [CustomDateRangeStart](#customdaterangestart), [PredefinedTime](#predefinedtime), [ReportTimeZone](#reporttimezone).

|Element|Description|Data Type|
|-----------|---------------|-------------|
|<a name="customdaterangeend"></a>CustomDateRangeEnd|The end date of the custom date range. The end date cannot be later than today's date.|[Date](date.md)|
|<a name="customdaterangestart"></a>CustomDateRangeStart|The start date of the custom date range. The start date must be earlier than or the same as the end date.|[Date](date.md)|
|<a name="predefinedtime"></a>PredefinedTime|A predefined date range value. Each report request type specifies the predefined time periods that you can specify for each aggregation type.|[ReportTimePeriod](reporttimeperiod.md)|
|<a name="reporttimezone"></a>ReportTimeZone|Determines the time zone that is used to establish today's date.<br/><br/>When you submit the report request today's date can vary around the world depending on the time zone. The report time period that you choose e.g., 'Yesterday' is then relative to today's date.<br/><br/>If you do not choose a time zone, the Reporting service uses PacificTimeUSCanadaTijuana by default. For example, a report requested without a time zone specified at 2 AM EasternTimeUSCanada on 2/2/2019 for 'Yesterday' will be interpreted as a request for 1/31/2019. A report requested at the same time for 'Yesterday' with time zone set as EasternTimeUSCanada will be interpreted as a request for 2/1/2019.|[ReportTimeZone](reporttimezone.md)|

## Requirements
Service: [ReportingService.svc v13](https://reporting.api.bingads.microsoft.com/Api/Advertiser/Reporting/v13/ReportingService.svc)  
Namespace: https\://bingads.microsoft.com/Reporting/v13  

## Used By
[AccountPerformanceReportRequest](accountperformancereportrequest.md)  
[AdDynamicTextPerformanceReportRequest](addynamictextperformancereportrequest.md)  
[AdExtensionByAdReportRequest](adextensionbyadreportrequest.md)  
[AdExtensionByKeywordReportRequest](adextensionbykeywordreportrequest.md)  
[AdExtensionDetailReportRequest](adextensiondetailreportrequest.md)  
[AdGroupPerformanceReportRequest](adgroupperformancereportrequest.md)  
[AdPerformanceReportRequest](adperformancereportrequest.md)  
[AgeGenderAudienceReportRequest](agegenderaudiencereportrequest.md)  
[AudiencePerformanceReportRequest](audienceperformancereportrequest.md)  
[BudgetSummaryReportRequest](budgetsummaryreportrequest.md)  
[CallDetailReportRequest](calldetailreportrequest.md)  
[CampaignPerformanceReportRequest](campaignperformancereportrequest.md)  
[ConversionPerformanceReportRequest](conversionperformancereportrequest.md)  
[DestinationUrlPerformanceReportRequest](destinationurlperformancereportrequest.md)  
[DSAAutoTargetPerformanceReportRequest](dsaautotargetperformancereportrequest.md)  
[DSACategoryPerformanceReportRequest](dsacategoryperformancereportrequest.md)  
[DSASearchQueryPerformanceReportRequest](dsasearchqueryperformancereportrequest.md)  
[GeographicPerformanceReportRequest](geographicperformancereportrequest.md)  
[GoalsAndFunnelsReportRequest](goalsandfunnelsreportrequest.md)  
[HotelDimensionPerformanceReportRequest](hoteldimensionperformancereportrequest.md)  
[HotelGroupPerformanceReportRequest](hotelgroupperformancereportrequest.md)  
[KeywordPerformanceReportRequest](keywordperformancereportrequest.md)  
[ProductDimensionPerformanceReportRequest](productdimensionperformancereportrequest.md)  
[ProductMatchCountReportRequest](productmatchcountreportrequest.md)  
[ProductPartitionPerformanceReportRequest](productpartitionperformancereportrequest.md)  
[ProductPartitionUnitPerformanceReportRequest](productpartitionunitperformancereportrequest.md)  
[ProductSearchQueryPerformanceReportRequest](productsearchqueryperformancereportrequest.md)  
[ProfessionalDemographicsAudienceReportRequest](professionaldemographicsaudiencereportrequest.md)  
[PublisherUsagePerformanceReportRequest](publisherusageperformancereportrequest.md)  
[SearchCampaignChangeHistoryReportRequest](searchcampaignchangehistoryreportrequest.md)  
[SearchQueryPerformanceReportRequest](searchqueryperformancereportrequest.md)  
[ShareOfVoiceReportRequest](shareofvoicereportrequest.md)  
[UserLocationPerformanceReportRequest](userlocationperformancereportrequest.md)  
